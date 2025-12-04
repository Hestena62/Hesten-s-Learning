<?php
// --- Page Configuration ---
$pageTitle = "Contact Us";
$pageDescription = "Get in touch with Hesten's Learning. We are here to help students, parents, and teachers.";
$pageKeywords = "contact, support, help, email, education feedback";
$pageAuthor = "Hesten's Learning";

// --- Form Processing Logic ---
$messageSent = false;
$errorMsg = "";

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Simple Anti-Spam (Honey-pot)
    // If the hidden field 'website_check' is filled, it's a bot.
    if (!empty($_POST['website_check'])) {
        die(); // Stop execution silently
    }

    // 2. Sanitize Inputs
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // 3. Validation
    if (empty($name) || empty($email) || empty($message)) {
        $errorMsg = "Please fill in all required fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = "Please enter a valid email address.";
    } else {
        // 4. Send Email (Simulation)
        // In a real server environment, you would use:
        // mail("admin@hestena62.com", "New Message: $subject", $message, "From: $email");
        
        // For this demo, we set the success flag
        $messageSent = true;
    }
}

include 'src/header.php';
?>

<!-- Hero Section -->
<div class="relative bg-gradient-to-br from-primary to-purple-900 text-white pt-24 pb-32 px-4 mb-12 shadow-xl overflow-hidden rounded-b-[4rem]">
    <!-- Animated Background -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none opacity-20">
        <i class="fas fa-paper-plane absolute top-20 right-20 text-9xl animate-pulse text-white/30"></i>
        <i class="fas fa-envelope-open-text absolute bottom-10 left-10 text-[10rem] -rotate-12 text-white/10"></i>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-white/5 rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 max-w-4xl mx-auto text-center">
        <span class="inline-block py-2 px-4 rounded-full bg-white/10 border border-white/20 text-sm font-bold mb-6 uppercase tracking-wider backdrop-blur-md shadow-lg">
            Get in Touch
        </span>
        <h1 class="text-4xl md:text-6xl font-extrabold mb-6 tracking-tight drop-shadow-md">
            We'd Love to Hear from You
        </h1>
        <p class="text-xl text-blue-100 max-w-2xl mx-auto font-light leading-relaxed">
            Have a suggestion, a question about our curriculum, or just want to say hello? Drop us a line below.
        </p>
    </div>
</div>

<main class="container mx-auto px-4 mb-24" id="main-content">

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 max-w-6xl mx-auto">
        
        <!-- Contact Information Column -->
        <div class="space-y-8 animate-fade-in-up">
            <div class="bg-content-bg p-8 rounded-3xl shadow-lg border-l-8 border-primary relative overflow-hidden">
                <h2 class="text-2xl font-bold text-text-default mb-6">Contact Information</h2>
                <p class="text-text-secondary mb-8 leading-relaxed">
                    We are a small, passionate team dedicated to accessible education. We try to respond to all inquiries within 48 hours.
                </p>

                <div class="space-y-6">
                    <!-- Email -->
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-blue-100 text-primary flex items-center justify-center text-xl shrink-0">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-text-default text-lg">Email Us</h3>
                            <a href="mailto:admin@hestena62.com" class="text-primary hover:underline text-lg">admin@hestena62.com</a>
                            <p class="text-sm text-text-secondary mt-1">Best for specific curriculum questions.</p>
                        </div>
                    </div>

                    <!-- Location (Generic) -->
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-xl shrink-0">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-text-default text-lg">Location</h3>
                            <p class="text-text-secondary">Based in the Cloud ☁️</p>
                            <p class="text-sm text-text-secondary mt-1">Serving students worldwide.</p>
                        </div>
                    </div>

                    <!-- Socials -->
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center text-xl shrink-0">
                            <i class="fas fa-share-alt"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-text-default text-lg">Follow Us</h3>
                            <div class="flex gap-4 mt-2">
                                <a href="#" class="w-10 h-10 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center text-text-secondary hover:bg-primary hover:text-white transition-all" aria-label="Twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="w-10 h-10 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center text-text-secondary hover:bg-primary hover:text-white transition-all" aria-label="Facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="w-10 h-10 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center text-text-secondary hover:bg-primary hover:text-white transition-all" aria-label="Instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Teaser -->
            <div class="bg-gradient-to-r from-secondary to-accent p-8 rounded-3xl shadow-lg text-white text-center">
                <h3 class="text-xl font-bold mb-2">Need a quick answer?</h3>
                <p class="mb-6 opacity-90">Check our Help Center for guides on accessibility and curriculum.</p>
                <a href="/help.php" class="inline-block bg-white text-primary px-6 py-3 rounded-full font-bold hover:bg-blue-50 transition-colors shadow-md">
                    Visit Help Center
                </a>
            </div>
        </div>

        <!-- Contact Form Column -->
        <div class="animate-fade-in-up" style="animation-delay: 0.1s;">
            <div class="bg-content-bg p-8 md:p-10 rounded-3xl shadow-xl border border-gray-100 dark:border-gray-700">
                
                <?php if ($messageSent): ?>
                    <!-- Success State -->
                    <div class="text-center py-10">
                        <div class="w-20 h-20 bg-green-100 text-green-500 rounded-full flex items-center justify-center mx-auto mb-6 text-4xl animate-bounce">
                            <i class="fas fa-check"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-text-default mb-4">Message Sent!</h2>
                        <p class="text-text-secondary mb-8">Thank you for reaching out, <?php echo $name; ?>. We'll get back to you at <strong><?php echo $email; ?></strong> shortly.</p>
                        <a href="/" class="bg-primary text-white px-8 py-3 rounded-full font-bold hover:bg-secondary transition-colors">Return Home</a>
                    </div>
                <?php else: ?>
                    <!-- Form State -->
                    <h2 class="text-2xl font-bold text-text-default mb-6">Send us a Message</h2>
                    
                    <?php if ($errorMsg): ?>
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-r" role="alert">
                            <p class="font-bold">Oops!</p>
                            <p><?php echo $errorMsg; ?></p>
                        </div>
                    <?php endif; ?>

                    <form action="https://formsubmit.co/84436699b129e7e146c26f5459f15a56" method="POST" class="space-y-6" novalidate>
                        
                        <!-- Anti-Spam Honey Pot (Hidden) -->
                        <div class="hidden">
                            <label for="website_check">Leave this empty</label>
                            <input type="text" id="website_check" name="website_check">
                        </div>

                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-bold text-text-default mb-2">Your Name</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                    <i class="fas fa-user"></i>
                                </div>
                                <input type="text" id="name" name="name" required 
                                    class="w-full pl-11 pr-4 py-3 bg-base-bg border border-gray-300 dark:border-gray-600 rounded-xl text-text-default placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                    placeholder="Jane Doe">
                            </div>
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-bold text-text-default mb-2">Email Address</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <input type="email" id="email" name="email" required 
                                    class="w-full pl-11 pr-4 py-3 bg-base-bg border border-gray-300 dark:border-gray-600 rounded-xl text-text-default placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                    placeholder="jane@example.com">
                            </div>
                        </div>

                        <!-- Subject -->
                        <div>
                            <label for="subject" class="block text-sm font-bold text-text-default mb-2">Subject</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                    <i class="fas fa-tag"></i>
                                </div>
                                <select id="subject" name="subject" 
                                    class="w-full pl-11 pr-4 py-3 bg-base-bg border border-gray-300 dark:border-gray-600 rounded-xl text-text-default focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all appearance-none cursor-pointer">
                                    <option value="General Inquiry">General Inquiry</option>
                                    <option value="Support Request">Support / Technical Issue</option>
                                    <option value="Feedback">Feedback or Suggestion</option>
                                    <option value="Partnership">Partnership Opportunity</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-text-secondary">
                                    <i class="fas fa-chevron-down text-xs"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Message -->
                        <div>
                            <label for="message" class="block text-sm font-bold text-text-default mb-2">Message</label>
                            <textarea id="message" name="message" rows="5" required
                                class="w-full p-4 bg-base-bg border border-gray-300 dark:border-gray-600 rounded-xl text-text-default placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all resize-y"
                                placeholder="How can we help you today?"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" 
                            class="w-full bg-primary text-white font-bold text-lg py-4 rounded-xl shadow-lg hover:bg-secondary hover:-translate-y-1 transition-all focus:outline-none focus:ring-4 focus:ring-primary/40 flex items-center justify-center gap-2">
                            <span>Send Message</span>
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php include 'src/footer.php'; ?>