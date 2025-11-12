<?php
// Define page-specific variables for the header
$pageTitle = "Documentation";
$pageDescription = "Your guide to using the Hesten's Learning platform. Find getting started guides, how-to articles, and more.";
$pageKeywords = "docs, documentation, guides, how-to, getting started, instructions";
$pageAuthor = "Hesten Allison";

// Welcome popup messages (from header.php)
$welcomeMessage = "Welcome to the Docs!";
$welcomeParagraph = "Find all the information you need to use the site effectively.";

// Include the header
require_once '..\src\header.php';
?>

<!-- Main Content Area -->
<div class="container mx-auto px-4 py-10 flex flex-col md:flex-row gap-8 min-h-screen">

    <!-- Sidebar Navigation -->
    <aside class="w-full md:w-1/4 lg:w-1/5">
        <div class="bg-content-bg text-text-default rounded-xl shadow-lg p-6 sticky top-10">
            <h2 class="text-xl font-bold text-primary mb-4 border-b border-gray-300 dark:border-gray-600 pb-2">
                Navigation
            </h2>
            <nav aria-label="Documentation sections">
                <ul class="space-y-3">
                    <li>
                        <a href="#getting-started" 
                           class="font-semibold text-text-secondary hover:text-primary transition-colors duration-200">
                           <i class="fas fa-rocket w-5 mr-2" aria-hidden="true"></i>
                           Getting Started
                        </a>
                        <ul class="pl-6 space-y-2 mt-2 text-sm">
                            <li><a href="#creating-account" class="text-text-secondary hover:text-primary">Creating an Account</a></li>
                            <li><a href="#dashboard-overview" class="text-text-secondary hover:text-primary">Dashboard Overview</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#how-to-use" 
                           class="font-semibold text-text-secondary hover:text-primary transition-colors duration-200">
                           <i class="fas fa-book-open w-5 mr-2" aria-hidden="true"></i>
                           How to Use the Site
                        </a>
                         <ul class="pl-6 space-y-2 mt-2 text-sm">
                            <li><a href="#navigating-content" class="text-text-secondary hover:text-primary">Navigating Content</a></li>
                            <li><a href="#accessibility-panel" class="text-text-secondary hover:text-primary">Accessibility Panel</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#account-settings" 
                           class="font-semibold text-text-secondary hover:text-primary transition-colors duration-200">
                           <i class="fas fa-user-cog w-5 mr-2" aria-hidden="true"></i>
                           Account Settings
                        </a>
                         <ul class="pl-6 space-y-2 mt-2 text-sm">
                            <li><a href="#updating-profile" class="text-text-secondary hover:text-primary">Updating Your Profile</a></li>
                            <li><a href="#managing-subscriptions" class="text-text-secondary hover:text-primary">Subscriptions</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#faq" 
                           class="font-semibold text-text-secondary hover:text-primary transition-colors duration-200">
                           <i class="fas fa-question-circle w-5 mr-2" aria-hidden="true"></i>
                           FAQ
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Main Documentation Content -->
    <main class="w-full md:w-3/4 lg:w-4/5">
        <div class="bg-content-bg text-text-default rounded-xl shadow-lg p-8 md:p-12 space-y-12">

            <!-- Section: Getting Started -->
            <section id="getting-started" class="scroll-mt-20">
                <h2 class="text-3xl font-bold text-primary mb-4 border-b border-gray-300 dark:border-gray-600 pb-3">
                    <i class="fas fa-rocket mr-3" aria-hidden="true"></i>
                    Getting Started
                </h2>
                <div class="space-y-6 text-text-secondary leading-relaxed">
                    <p>Welcome to the documentation for Hesten's Learning platform. This guide will walk you through the initial steps to get you up and running.</p>
                    
                    <h3 id="creating-account" class="text-2xl font-semibold text-text-default pt-4 scroll-mt-20">Creating Your Account</h3>
                    <p>First, you'll want to create an account. You can do this by clicking the "Sign Up" button in the header (if available) or by visiting the registration page directly. Once your account is created, you can log in to access all the features.</p>
                    
                    <!-- Screenshot Placeholder -->
                    <div class="my-4 p-4 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-800 text-center">
                        <p class="text-text-secondary italic">
                            <!-- Add your screenshot here -->
                            <img src="https://placehold.co/600x300/818CF8/FFFFFF?text=Screenshot+of+Sign+Up+Button" 
                                 alt="Screenshot of Sign Up Button" 
                                 class="w-full max-w-lg mx-auto rounded-md shadow-md"
                                 onerror="this.onerror=null; this.src='https://placehold.co/600x300/818CF8/FFFFFF?text=Screenshot+Placeholder';">
                            <span class="block mt-2 text-sm">Example: Screenshot of the registration form.</span>
                        </p>
                    </div>
                    
                    <h3 id="dashboard-overview" class="text-2xl font-semibold text-text-default pt-4 scroll-mt-20">Your Dashboard</h3>
                    <p>After logging in, you will be taken to your personal dashboard. This is your central hub for all activities on the site. From here, you can access your courses, view your progress, and manage your settings.</p>
                    <p>The main sections of the dashboard include:</p>
                    <ul class="list-disc list-inside pl-4 space-y-1">
                        <li><strong>My Courses:</strong> A list of all courses you are currently enrolled in.</li>
                        <li><strong>Recent Activity:</strong> A feed of your recent achievements and site updates.</li>
                        <li><strong>Account Shortcuts:</strong> Quick links to edit your profile or view settings.</li>
                    </ul>

                    <!-- "Need Help?" Block -->
                    <div class="mt-8 p-4 bg-blue-50 dark:bg-gray-800 rounded-lg border border-blue-200 dark:border-blue-700">
                        <h4 class="font-semibold text-primary"><i class="fas fa-question-circle mr-2"></i>Stuck on this step?</h4>
                        <p class="text-sm text-text-secondary mt-1">If you're having trouble creating an account, please email our support team at <a href="mailto:admin@hestena62.com" class="text-primary underline">admin@hestena62.com</a> for assistance.</p>
                    </div>
                </div>
            </section>

            <!-- Section: How to Use the Site -->
            <section id="how-to-use" class="scroll-mt-20">
                <h2 class="text-3xl font-bold text-primary mb-4 border-b border-gray-300 dark:border-gray-600 pb-3">
                    <i class="fas fa-book-open mr-3" aria-hidden="true"></i>
                    How to Use the Site
                </h2>
                <div class="space-y-6 text-text-secondary leading-relaxed">
                    <p>This section covers the main features of the website and how to interact with them.</p>
                    
                    <h3 id="navigating-content" class="text-2xl font-semibold text-text-default pt-4 scroll-mt-20">Navigating Content</h3>
                    <p>Use the main navigation bar at the top of the page to browse different sections like "Home," "Learning," and "Assessment." The sidebar on this documentation page helps you jump to different topics quickly.</p>
                    
                    <h3 id="accessibility-panel" class="text-2xl font-semibold text-text-default pt-4 scroll-mt-20">Using the Accessibility Panel</h3>
                    <p>We are committed to accessibility. Click the <i class="fas fa-universal-access" aria-hidden="true"></i> icon in the bottom-right corner to open the accessibility panel. This panel allows you to customize the site to your needs.</p>
                    
                    <!-- Screenshot Placeholder -->
                    <div class="my-4 p-4 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-800 text-center">
                        <p class="text-text-secondary italic">
                            <!-- Add your screenshot here -->
                            <img src="https://placehold.co/600x400/818CF8/FFFFFF?text=Screenshot+of+Accessibility+Panel" 
                                 alt="Screenshot of Accessibility Panel" 
                                 class="w-full max-w-lg mx-auto rounded-md shadow-md"
                                 onerror="this.onerror=null; this.src='https://placehold.co/600x400/818CF8/FFFFFF?text=Screenshot+Placeholder';">
                            <span class="block mt-2 text-sm">Example: The accessibility panel and its options.</span>
                        </p>
                    </div>

                    <p>From here, you can change:</p>
                    <ul class="list-disc list-inside pl-4 space-y-1">
                        <li><strong>Display Mode:</strong> Switch between Light, Dark, and High-Contrast themes.</li>
                        <li><strong>Reading Font:</strong> Choose between Default, Dyslexic-friendly, and Monospace fonts.</li>
                        <li><strong>Text Size & Spacing:</strong> Adjust the font size and line height to your comfort.</li>
                        <li><strong>Reduced Motion:</strong> Disable animations and transitions for a smoother experience.</li>
                        <li><strong>Reading Guide:</strong> Enable a draggable guide to help focus on lines of text.</li>
                    </ul>

                    <!-- "Need Help?" Block -->
                    <div class="mt-8 p-4 bg-blue-50 dark:bg-gray-800 rounded-lg border border-blue-200 dark:border-blue-700">
                        <h4 class="font-semibold text-primary"><i class="fas fa-question-circle mr-2"></i>Questions about features?</h4>
                        <p class="text-sm text-text-secondary mt-1">If you have questions about a specific feature or accessibility option, let us know at <a href="mailto:admin@hestena62.com" class="text-primary underline">admin@hestena62.com</a>.</p>
                    </div>
                </div>
            </section>

            <!-- Section: Account Settings -->
            <section id="account-settings" class="scroll-mt-20">
                <h2 class="text-3xl font-bold text-primary mb-4 border-b border-gray-300 dark:border-gray-600 pb-3">
                    <i class="fas fa-user-cog mr-3" aria-hidden="true"></i>
                    Account Settings
                </h2>
                <div class="space-y-6 text-text-secondary leading-relaxed">
                    <p>You can manage your account settings by clicking on your profile icon in the header and selecting "Profile" or "Settings" (if available).</p>
                    
                    <h3 id="updating-profile" class="text-2xl font-semibold text-text-default pt-4 scroll-mt-20">Updating Your Profile</h3>
                    <p>In your profile section, you can update personal information, change your password, and set your communication preferences. Keeping your profile up-to-date ensures you receive important notifications.</p>
                    
                    <h3 id="managing-subscriptions" class="text-2xl font-semibold text-text-default pt-4 scroll-mt-20">Managing Subscriptions</h3>
                    <p>If your site involves subscriptions, this is where you would instruct users on how to manage their payment methods, upgrade or downgrade their plan, or cancel their subscription.</p>
                    <p>To manage your subscription:</p>
                    <ol class="list-decimal list-inside pl-4 space-y-1">
                        <li>Navigate to "Account Settings".</li>
                        <li>Click on the "Subscription" or "Billing" tab.</li>
                        <li>From here, you can view your current plan, update payment details, or make changes to your subscription.</li>
                    </ol>

                    <!-- "Need Help?" Block -->
                    <div class="mt-8 p-4 bg-blue-50 dark:bg-gray-800 rounded-lg border border-blue-200 dark:border-blue-700">
                        <h4 class="font-semibold text-primary"><i class="fas fa-question-circle mr-2"></i>Billing or Account Issues?</h4>
                        <p class="text-sm text-text-secondary mt-1">For any problems related to your account or billing, please contact our dedicated support team at <a href="mailto:admin@hestena62.com" class="text-primary underline">admin@hestena62.com</a>.</p>
                    </div>
                </div>
            </section>

            <!-- Section: FAQ -->
            <section id="faq" class="scroll-mt-20">
                <h2 class="text-3xl font-bold text-primary mb-4 border-b border-gray-300 dark:border-gray-600 pb-3">
                    <i class="fas fa-question-circle mr-3" aria-hidden="true"></i>
                    Frequently Asked Questions (FAQ)
                </h2>
                <div class="space-y-8">
                    <!-- FAQ Item 1 -->
                    <div class="text-text-secondary">
                        <h3 class="text-lg font-semibold text-text-default">Q: How do I reset my password?</h3>
                        <p class="leading-relaxed mt-1">If you've forgotten your password, you can click the "Forgot Password" link on the login page. You will receive an email with instructions to reset it. If you don't receive an email, please check your spam folder or contact us at <a href="mailto:admin@hestena62.com" class="text-primary underline">admin@hestena62.com</a>.</p>
                    </div>
                    <!-- FAQ Item 2 -->
                    <div class="text-text-secondary">
                        <h3 class="text-lg font-semibold text-text-default">Q: Is the site mobile-friendly?</h3>
                        <p class="leading-relaxed mt-1">Yes! The website is fully responsive and should work great on all devices, including mobile phones and tablets. All features, including the accessibility panel, are available on mobile.</p>
                    </div>
                    <!-- FAQ Item 3 -->
                    <div class="text-text-secondary">
                        <h3 class="text-lg font-semibold text-text-default">Q: Who can I contact for help?</h3>
                        <p class="leading-relaxed mt-1">If you need further assistance, please visit the "Contact Us" page (linked in the footer) or email us directly at <a href="mailto:admin@hestena62.com" class="text-primary underline">admin@hestena62.com</a>. We try to respond to all inquiries within 24 hours.</p>
                    </div>
                    <!-- FAQ Item 4 -->
                    <div class="text-text-secondary">
                        <h3 class="text-lg font-semibold text-text-default">Q: How do I report a bug or suggest a feature?</h3>
                        <p class="leading-relaxed mt-1">We appreciate your feedback! Please send any bug reports or feature suggestions to <a href="mailto:admin@hestena6s.com" class="text-primary underline">admin@hestena62.com</a>. If reporting a bug, please include what device and browser you are using.</p>
                    </div>
                </div>
            </section>

        </div>
    </main>

</div>
<!-- End Main Content Area -->

<?php
// Include the footer
require_once '..\src\footer.php';
?>