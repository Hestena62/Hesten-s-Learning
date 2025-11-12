<?php
// This is the main file you will edit to add or change content.
// Simply add a new element to the $wikiTopics array for each new article.

$wikiTopics = [
    [
        'slug' => 'history-of-computing',
        'title' => 'History of Computing',
        'content' => <<<HTML
        <p class="mb-4">The history of computing is longer than the history of computing hardware and modern computing technology and includes the history of methods intended for pen and paper or for chalk and slate, with or without the aid of tables.</p>

<h2 class="text-2xl font-semibold mb-3">Early Calculating Devices</h2>
<p class="mb-4">Computing is intimately tied to the representation of numbers. But long before abstractions like the number existed, there were mathematical concepts to serve the purposes of civilization. These concepts are implicit in concrete practices such as the one-to-one correspondence, a key concept of counting, implicit in the use of tally sticks for managing the shipping of goods, or the organized accounting of items for consumption in a storehouse.</p>
<p class="mb-4">The abacus was an early tool for mathematical calculations. Its earliest form was in use in Sumeria from 2700–2300 BC. The Sumerian abacus consisted of a table of successive columns which delimited the successive orders of magnitude of their sexagesimal (base 60) number system.</p>

<!-- PAGEBREAK -->

<h2 class="text-2xl font-semibold mb-3">The 19th Century</h2>
<p class="mb-4">Charles Babbage, an English mechanical engineer and polymath, originated the concept of a programmable computer. Considered the "father of the computer", he conceptualized and invented the first mechanical computer in the early 19th century.</p>
<p class="mb-4">After working on his revolutionary difference engine, designed to aid in navigational calculations, in 1833 he realized that a much more general design, an Analytical Engine, was possible. The input of programs and data was to be provided to the machine via punched cards, a method being used at the time to direct mechanical looms such as the Jacquard loom.</p>
<p class="mb-4">Ada Lovelace, an English mathematician, was the first to recognize that the machine had applications beyond pure calculation, and published the first algorithm intended to be carried out by such a machine. As a result, she is often regarded as the first computer programmer.</p>

<!-- PAGEBREAK -->

<h2 class="text-2xl font-semibold mb-3">The 20th Century: Dawn of Electronic Computing</h2>
<p class="mb-4">The mid-20th century saw the dawn of the electronic digital computer. The Atanasoff–Berry Computer (ABC) was the first automatic electronic digital computer, an early electronic digital computing device that used binary arithmetic.</p>
<p class="mb-4">During World War II, the British codebreakers at Bletchley Park built Colossus, the world's first programmable, electronic, digital computer. It was used to help decrypt intercepted high-level German messages.</p>
<p class="mb-4">Following the war, the ENIAC (Electronic Numerical Integrator and Computer) was built in the United States. It was the first electronic, programmable, general-purpose digital computer. Its development and construction were financed by the United States Army during World War II.</p>
HTML
    ],
    [
        'slug' => 'artificial-intelligence',
        'title' => 'Artificial Intelligence',
        'content' => <<<HTML
<p class="mb-4">Artificial intelligence (AI) is the intelligence of machines or software, as opposed to the intelligence of humans or animals. It is a field of study in computer science that develops and studies intelligent machines. "AI" is also used to refer to the machines themselves.</p>
<p class="mb-4">AI technology is widely used throughout industry, government, and science. Some high-profile applications are: advanced web search engines (e.g., Google Search), recommendation systems (used by YouTube, Amazon, and Netflix), understanding human speech (such as Siri and Alexa), self-driving cars (e.g., Waymo), generative or creative tools (e.g., ChatGPT and AI art), and competing at the highest level in strategic games (such as chess and Go).</p>

<!-- PAGEBREAK -->

<h2 class="text-2xl font-semibold mb-3">Goals</h2>
<p class="mb-4">The general problem of simulating (or creating) intelligence has been broken down into sub-problems. These consist of particular traits or capabilities that researchers expect an intelligent system to display. The traits described below have received the most attention.</p>
<ul class="list-disc list-inside mb-4 pl-4">
    <li class="mb-2"><strong>Reasoning, problem-solving:</strong> Early researchers developed algorithms that imitated step-by-step reasoning that humans use when they solve puzzles or make logical deductions.</li>
    <li class="mb-2"><strong>Knowledge representation:</strong> Knowledge representation and knowledge engineering are central to classical AI research.</li>
    <li class="mb-2"><strong>Planning:</strong> Intelligent agents must be able to set goals and achieve them. They need a way to visualize the future.</li>
    <li class="mb-2"><strong>Learning:</strong> Machine learning (ML), a fundamental concept of AI research since the field's inception, is the study of computer algorithms that improve automatically through experience.</li>
</ul>

<!-- PAGEBREAK -->

<h2 class="text-2xl font-semibold mb-3">Machine Learning</h2>
<p class="mb-4">Machine learning is the primary driver of recent advances in AI. It is a subfield of AI that focuses on algorithms that can learn from data. Instead of being explicitly programmed with rules, a machine learning model learns patterns and relationships from a training dataset.</p>
<p class="mb-4">There are several types of machine learning:</p>
<ul class="list-disc list-inside mb-4 pl-4">
    <li class="mb-2"><strong>Supervised learning:</strong> The algorithm is given examples of inputs and their desired outputs, and the goal is to learn a general rule that maps inputs to outputs.</li>
    <li class="mb-2"><strong>Unsupervised learning:</strong> No labels are given to the learning algorithm, leaving it on its own to find structure in its input.</li>
    <li class="mb-2"><strong>Reinforcement learning:</strong> The algorithm interacts with a dynamic environment, and it receives feedback in the form of rewards or punishments, which it uses to learn a policy (a strategy for action).</li>
</ul>
HTML
    ],
    [
        'slug' => 'web-development',
        'title' => 'Web D evelopment',
        'content' => <<<HTML
<p class="mb-4">Web development refers to the work involved in developing a website for the Internet (World Wide Web) or an intranet (a private network). Web development can range from developing a simple single static page of plain text to complex web applications, electronic businesses, and social network services.</p>
<p class="mb-4">A more comprehensive list of tasks to which web development commonly refers may include web engineering, web design, web content development, client liaison, client-side/server-side scripting, web server and network security configuration, and e-commerce development.</p>

<!-- PAGEBREAK -->

<h2 class="text-2xl font-semibold mb-3">Client-Side (Frontend)</h2>
<p class="mb-4">Client-side scripting refers to the code that is executed by the user's web browser. The "holy trinity" of frontend development is:</p>
<ul class="list-disc list-inside mb-4 pl-4">
    <li class="mb-2"><strong>HTML (HyperText Markup Language):</strong> The fundamental structure and content of the web page.</li>
    <li class="mb-2"><strong>CSS (Cascading Style Sheets):</strong> Responsible for the presentation, styling, layout, and look of the content.</li>
    <li class="mb-2"><strong>JavaScript (JS):</strong> A programming language that enables interactive elements, dynamic content updates, and complex functionality within the browser.</li>
</ul>
<p class="mb-4">Modern frontend development often involves frameworks and libraries like React, Angular, or Vue.js, which help manage complexity and build sophisticated user interfaces.</p>

<!-- PAGEBREAK -->

<h2 class="text-2xl font-semibold mb-3">Server-Side (Backend)</h2>
<p class="mb-4">Server-side scripting refers to the code that is executed on the web server before the content is sent to the user's browser. This is responsible for handling data, user authentication, database interactions, and business logic.</p>
<p class="mb-4">Common backend technologies include:</p>
<ul class="list-disc list-inside mb-4 pl-4">
    <li class="mb-2"><strong>Programming Languages:</strong> PHP (like this site!), Python (with frameworks like Django or Flask), Node.js (JavaScript on the server), Ruby (with Ruby on Rails), and Java.</li>
    <li class="mb-2"><strong>Databases:</strong> MySQL, PostgreSQL, MongoDB, and SQLite are used to store and retrieve data.</li>
    <li class="mb-2"><strong>Servers:</strong> Apache and Nginx are popular web servers that handle requests from the browser and serve the appropriate files.</li>
</ul>
HTML
    ],
];

// Function to find a topic by its slug
function getTopicBySlug($slug, $topics) {
    foreach ($topics as $topic) {
        if ($topic['slug'] === $slug) {
            return $topic;
        }
    }
    return null;
}

// Function to get a random topic
function getRandomTopic($topics) {
    $randomIndex = array_rand($topics);
    return $topics[$randomIndex];
}

?>