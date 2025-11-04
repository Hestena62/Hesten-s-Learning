<?php
// We don't need session_start() for this simple version, but it could be
// added later if you want to store chat history per user.

/**
 * --- API HANDLING LOGIC ---
 *
 * This block checks if the page is being called by our JavaScript 'fetch' request.
 * If it is (a POST request with a 'question'), it handles the API call,
 * sends back a JSON response, and stops.
 */
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['question'])) {
    
    // Tell the browser we're sending back JSON
    header('Content-Type: application/json');

    // --- START: cURL Check ---
    // This checks if the cURL extension is installed, which is needed for API calls.
    if (!function_exists('curl_init')) {
        echo json_encode(['error' => 'The cURL PHP extension is not installed or enabled on your server. This extension is required for the assistant to make API calls. Please contact your web host or server administrator to enable it.']);
        exit;
    }
    // --- END: cURL Check ---

    // --- START: Gemini API Call ---
    
    // !!! IMPORTANT !!!
    // Replace 'YOUR_GEMINI_API_KEY' with your actual Google Gemini API key.
    // Get one for free from Google AI Studio.
    $apiKey = 'AIzaSyCnNSOVMVcPmUV1JQAX08IFUWuLfngHZIw'; 
    
    // We'll use the gemini-2.5-flash-preview model, which is fast and capable.
    $apiUrl = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash-preview-09-2025:generateContent?key=' . $apiKey;

    $userQuestion = $_POST['question'];
    
    // This system prompt guides the AI to be a helpful learning assistant
    $systemPrompt = "You are an expert learning assistant. Your role is to help users understand complex topics across all core learning subjects (Math, Science, History, Literature, etc.). Explain concepts clearly, provide step-by-step solutions for problems, and answer factual questions. Be encouraging and supportive. Your responses should be formatted with Markdown for readability (e.g., use lists, bold text, etc.).";

    // Build the payload for the API
    $payload = [
        'contents' => [
            [
                'parts' => [
                    ['text' => $userQuestion]
                ]
            ]
        ],
        'systemInstruction' => [
            'parts' => [
                ['text' => $systemPrompt]
            ]
        ],
        'tools' => [
            [
                // Enable Google Search to get up-to-date information
                'google_search' => new stdClass() 
            ]
        ]
    ];

    $jsonData = json_encode($payload);

    // --- Use cURL to make the API request ---
    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Content-Length: ' . strlen($jsonData)
    ]);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30); // 30 second timeout

    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);

    // --- Process the API Response ---
    if ($httpcode == 200 && $response) {
        $result = json_decode($response, true);
        
        if (isset($result['candidates'][0]['content']['parts'][0]['text'])) {
            $generatedText = $result['candidates'][0]['content']['parts'][0]['text'];
            
            // Check for and extract grounding metadata (sources)
            $sources = [];
            if (isset($result['candidates'][0]['groundingMetadata']['groundingAttributions'])) {
                foreach ($result['candidates'][0]['groundingMetadata']['groundingAttributions'] as $attribution) {
                    if (isset($attribution['web']['uri']) && isset($attribution['web']['title'])) {
                        $sources[] = [
                            'uri' => $attribution['web']['uri'],
                            'title' => $attribution['web']['title']
                        ];
                    }
                }
            }
            
            // Send the reply and sources back to the JavaScript
            echo json_encode(['reply' => $generatedText, 'sources' => $sources]);

        } else {
            // Handle cases where the API response format is unexpected
            echo json_encode(['error' => 'Invalid API response structure. Full response: ' . $response]);
        }
    } else {
        // Handle cURL errors or non-200 API responses
        echo json_encode(['error' => "API call failed with HTTP code $httpcode. Error: $error. Response: $response"]);
    }
    
    // Stop the script. Only the JSON response is sent.
    exit; 
}

/**
 * --- PAGE RENDERING LOGIC ---
 *
 * If it's a normal page visit (not an API call),
 * set the page variables and include the header,
 * page content, and footer.
 */

// Set page variables (used by your header.php and footer.php)
$pageTitle = "Learning Assistant";
$pageDescription = "An AI-powered learning assistant to help you with all core learning subjects.";
$pageKeywords = "learning, assistant, AI, PHP, math, science, history, literature";
$pageAuthor = "Hesten's Learning"; // From your footer
$welcomeMessage = "Welcome to the Learning Assistant!"; // From your header popup
$welcomeParagraph = "Ask me anything about your school subjects, and I'll do my best to help you understand!"; // From your header popup

// 1. Include your header.php file
// Make sure 'header.php' is in the same directory or update the path.
include 'src/header.php'; 
?>

<!-- Main Content for the Learning Assistant -->
<!-- We use Tailwind classes defined in your header.php -->
<main class="container mx-auto mt-10 mb-20 px-4">
    <div
        class="bg-content-bg shadow-lg rounded-xl max-w-3xl mx-auto overflow-hidden transition-colors duration-300 border border-gray-200 dark:border-gray-700">
        
        <!-- Chat Header -->
        <header class="bg-primary/10 dark:bg-primary/20 p-4 border-b border-gray-200 dark:border-gray-700">
            <h1 class="text-2xl font-bold text-primary flex items-center">
                <i class="fas fa-brain mr-3"></i>
                Learning Assistant
            </h1>
            <p class="text-text-secondary">Powered by PHP &amp; Google Gemini</p>
        </header>
        
        <!-- Chat Message Display Area -->
        <!-- h-96 sets a fixed height, overflow-y-auto makes it scrollable -->
        <div id="chat-box" class="p-6 h-96 overflow-y-auto space-y-4">
            <!-- Initial welcome message from the bot -->
            <div class="flex">
                <div
                    class="flex-shrink-0 h-10 w-10 rounded-full bg-primary text-white flex items-center justify-center mr-3">
                    <i class="fas fa-robot"></i>
                </div>
                <div
                    class="bg-gray-100 dark:bg-gray-700 p-3 rounded-lg rounded-tl-none shadow max-w-lg">
                    <p class="text-text-default">Hello! I'm your learning assistant. How can I help you today? Ask me a question about math, science, history, or any other subject!</p>
                </div>
            </div>
            <!-- New messages will be appended here by JavaScript -->
        </div>

        <!-- Loading Indicator (hidden by default) -->
        <div id="loading-indicator" class="px-6 pb-2 text-text-secondary hidden">
             <div class="flex items-center">
                <div
                    class="flex-shrink-0 h-10 w-10 rounded-full bg-primary text-white flex items-center justify-center mr-3">
                    <i class="fas fa-robot animate-pulse"></i>
                </div>
                <div
                    class="bg-gray-100 dark:bg-gray-700 p-3 rounded-lg rounded-tl-none shadow">
                    <span class="italic text-text-secondary">Typing...</span>
                </div>
            </div>
        </div>
        
        <!-- Chat Input Form -->
        <form id="chat-form" class="p-4 bg-gray-50 dark:bg-gray-900/50 border-t border-gray-200 dark:border-gray-700">
            <label for="message-input" class="sr-only">Your message</label>
            <div class="flex items-center space-x-3">
                <textarea id="message-input" rows="1"
                    class="flex-1 p-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-200"
                    placeholder="Type your question here... (e.g., 'What is photosynthesis?')"></textarea>
                <button type="submit"
                    class="bg-primary text-white rounded-lg w-12 h-12 flex-shrink-0 flex items-center justify-center font-bold text-lg hover:bg-secondary transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-accent"
                    aria-label="Send message">
                    <i class="fas fa-paper-plane"></i>
                    <span class="sr-only">Send</span>
                </button>
            </div>
        </form>
    </div>
</main>

<!-- JavaScript for Chat Functionality -->
<script>
    // Wait until the full page is loaded before running script
    document.addEventListener('DOMContentLoaded', function () {
        
        // Get references to our HTML elements
        const chatForm = document.getElementById('chat-form');
        const messageInput = document.getElementById('message-input');
        const chatBox = document.getElementById('chat-box');
        const loadingIndicator = document.getElementById('loading-indicator');

        // We need a library to safely parse Markdown (from the AI) into HTML
        // This adds the 'marked.js' library to the page.
        const markedScript = document.createElement('script');
        markedScript.src = 'https://cdn.jsdelivr.net/npm/marked/marked.min.js';
        document.body.appendChild(markedScript);

        // Auto-resize the text area as the user types
        messageInput.addEventListener('input', function () {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });

        // Add 'Enter' key submission (Shift+Enter for new line)
        messageInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault(); // Prevent new line
                chatForm.dispatchEvent(new Event('submit')); // Trigger form submit
            }
        });

        // Handle the form submission
        chatForm.addEventListener('submit', async function (e) {
            e.preventDefault(); // Stop the page from reloading
            
            const question = messageInput.value.trim();
            if (question === '') {
                return; // Don't send empty messages
            }

            // 1. Display the user's message immediately
            appendMessage(question, 'user');
            
            // 2. Clear the input box and reset its height
            messageInput.value = '';
            messageInput.style.height = 'auto';
            messageInput.focus();
            
            // 3. Show the "Typing..." indicator
            loadingIndicator.classList.remove('hidden');

            try {
                // 4. Send the question to our own PHP script
                const formData = new FormData();
                formData.append('question', question);

                // 'assistant.php' will catch this POST request at the top of the file
                const response = await fetch('assistant.php', {
                    method: 'POST',
                    body: formData
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const result = await response.json();

                // 5. Hide the loading indicator
                loadingIndicator.classList.add('hidden');

                if (result.error) {
                    // 6a. Display an error message from the API
                    appendMessage(`Sorry, I encountered an error: ${result.error}`, 'bot-error');
                } else {
                    // 6b. Display the bot's reply
                    let replyContent = result.reply;
                    
                    // Add sources if the AI provided them
                    if (result.sources && result.sources.length > 0) {
                        replyContent += '\n\n**Sources:**\n';
                        result.sources.forEach((source, index) => {
                            // Format as a Markdown list
                            replyContent += `${index + 1}. [${source.title}](${source.uri})\n`;
                        });
                    }

                    appendMessage(replyContent, 'bot');
                }

            } catch (error) {
                // 6c. Handle network errors
                loadingIndicator.classList.add('hidden');
                appendMessage(`Sorry, I'm having trouble connecting. Please try again. Error: ${error.message}`, 'bot-error');
                console.error('Fetch error:', error);
            }
        });

        /**
         * Appends a new message to the chat box.
         * @param {string} text - The message content.
         * @param {'user' | 'bot' | 'bot-error'} sender - Who sent the message.
         */
        function appendMessage(text, sender) {
            const messageDiv = document.createElement('div');
            messageDiv.className = 'flex'; // Base class for all messages

            let messageContent = '';
            
            if (sender === 'user') {
                messageDiv.classList.add('justify-end'); // Align user messages to the right
                messageContent = `
                    <div class="bg-primary text-white p-3 rounded-lg rounded-br-none shadow max-w-lg">
                        <p>${escapeHTML(text)}</p>
                    </div>
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300 dark:bg-gray-600 text-text-default flex items-center justify-center ml-3">
                        <i class="fas fa-user"></i>
                    </div>
                `;
            } else { // 'bot' or 'bot-error'
                const icon = sender === 'bot-error' ? 'fa-exclamation-triangle' : 'fa-robot';
                const bgColor = sender === 'bot-error' ? 'bg-red-100 dark:bg-red-900' : 'bg-gray-100 dark:bg-gray-700';
                const textColor = sender === 'bot-error' ? 'text-red-700 dark:text-red-200' : 'text-text-default';

                messageContent = `
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-primary text-white flex items-center justify-center mr-3">
                        <i class="fas ${icon}"></i>
                    </div>
                    <div class="${bgColor} p-3 rounded-lg rounded-tl-none shadow max-w-lg">
                        <!-- 'prose' gives us nice formatting for Markdown -->
                        <div class="${textColor} prose dark:prose-invert max-w-none">
                            ${formatText(text)}
                        </div>
                    </div>
                `;
            }

            messageDiv.innerHTML = messageContent;
            chatBox.appendChild(messageDiv);
            
            // Automatically scroll to the new message
            chatBox.scrollTop = chatBox.scrollHeight;
        }

        /**
         * Formats the text from the AI.
         * Uses 'marked' library if loaded, otherwise falls back to basic formatting.
         * @param {string} text
         */
        function formatText(text) {
             if (window.marked && window.marked.parse) {
                // Use marked to parse Markdown into HTML
                // This handles lists, bold, code blocks, etc.
                return window.marked.parse(text, { breaks: true, gfm: true });
            } else {
                // Fallback if marked.js hasn't loaded yet
                return escapeHTML(text).replace(/\n/g, '<br>');
            }
        }

        /**
         * A simple function to escape HTML special characters
         * This prevents XSS attacks from user input (though user input isn't rendered as HTML here)
         * and ensures text displays correctly.
         * @param {string} str
         */
        function escapeHTML(str) {
            return str.replace(/[&<>"']/g, function(m) {
                return {
                    '&': '&amp;',
                    '<': '&lt;',
                    '>': '&gt;',
                    '"': '&quot;',
                    "'": '&#039;'
                }[m];
            });
        }

    });
</script>

<?php
// 2. Include your footer.php file
// Make sure 'footer.php' is in the same directory or update the path.
include 'src/footer.php'; 
?>
