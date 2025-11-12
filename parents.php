<?php
// FILE: parents.php
// DESCRIPTION: This PHP file serves as a resource hub (wiki) for parents, 
// using the site-wide header and footer templates.
// It provides information, tools, and support for their child's learning journey.

// --- Page-Specific Variables for Header ---
$pageTitle = 'Parents Wiki - Hesten\'s Learning';
$pageDescription = 'Parent resource hub and wiki for Hesten\'s Learning. Find guides, tools, and homeschool laws.';
$pageKeywords = 'parents, wiki, resource, homeschool, learning support, hesten\'s learning';
$pageAuthor = 'Hesten\'s Learning';

// Welcome popup messages (defined in header.php)
$welcomeMessage = 'Welcome Parents!';
$welcomeParagraph = 'This is your resource hub for supporting your child\'s learning journey.';

// --- Include Header Template ---
// This will add the <!DOCTYPE>, <head>, and navigation bar
include 'src/header.php';
?>

<!-- 
  MAIN CONTENT START
  Updated to a two-column layout (sidebar + main content) for a "wiki" feel.
-->
<style>
    /* Add smooth scrolling for anchor links */
    html {
        scroll-behavior: smooth;
    }
</style>

<div class="container mx-auto my-8 flex flex-col md:flex-row gap-8 px-4 sm:px-0">

    <!-- Sidebar (Table of Contents) -->
    <aside class="w-full md:w-1/4 lg:w-1/5 md:sticky md:top-8 self-start">
        <div class="bg-content-bg text-text-default rounded-base-rounded shadow-lg p-6">
            <h2 class="text-xl font-bold text-primary mb-4 border-b border-gray-300 dark:border-gray-600 pb-2">On this page</h2>
            <nav aria-label="Table of Contents">
                <ul class="space-y-3">
                    <li>
                        <a href="#resources" class="font-medium text-text-secondary hover:text-primary hover:underline transition-colors duration-200">
                            Resources
                        </a>
                    </li>
                    <li>
                        <a href="#tools" class="font-medium text-text-secondary hover:text-primary hover:underline transition-colors duration-200">
                            Helpful Tools
                        </a>
                    </li>
                    <li>
                        <a href="#laws" class="font-medium text-text-secondary hover:text-primary hover:underline transition-colors duration-200">
                            Homeschool Laws
                        </a>
                    </li>
                    <li>
                        <a href="#feedback" class="font-medium text-text-secondary hover:text-primary hover:underline transition-colors duration-200">
                            Give Feedback
                        </a>
                    </li>
                    <li>
                        <a href="#contact" class="font-medium text-text-secondary hover:text-primary hover:underline transition-colors duration-200">
                            Contact Us
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="w-full md:w-3/4 lg:w-4/5">
        <div class="bg-content-bg text-text-default rounded-base-rounded shadow-lg p-6 md:p-8">

            <p class="text-text-secondary mb-6 text-lg">This is your hub for understanding your child's learning journey and accessing essential support tools.</p>

            <!-- Resources for Parents -->
            <!-- 
              Using <section> for semantics and scroll-mt-24 to offset for any sticky headers 
              when jumping to an anchor link.
            -->
            <section id="resources" class="resources scroll-mt-24">
                <h2 class="text-2xl font-bold text-primary mb-3 border-b border-gray-200 dark:border-gray-700 pb-2">Resources for Parents</h2>
                <ul class="list-disc list-inside space-y-2">
                    <li><a href="https://example.com/parent-guide.pdf" target="_blank" class="text-link hover:underline">Parent Guide (PDF)</a></li>
                    <li><a href="https://example.com/learning-tips" target="_blank" class="text-link hover:underline">Learning Tips for Kids</a></li>
                    <li><a href="https://example.com/faq" target="_blank" class="text-link hover:underline">Frequently Asked Questions</a></li>
                    <li><a href="https://example.com/online-safety" target="_blank" class="text-link hover:underline">Online Safety Tips</a></li>
                    <li><a href="https://example.com/digital-literacy" target="_blank" class="text-link hover:underline">Digital Literacy for Parents</a></li>
                    <li><a href="https://example.com/mental-health" target="_blank" class="text-link hover:underline">Supporting Mental Health</a></li>
                    <li><a href="https://example.com/family-activities" target="_blank" class="text-link hover:underline">Educational Family Activities</a></li>
                    <li><a href="https://example.com/parent-webinars" target="_blank" class="text-link hover:underline">Upcoming Webinars & Events</a></li>
                </ul>
            </section>

            <!-- Helpful Tools -->
            <section id="tools" class="tools mt-8 scroll-mt-24">
                <h2 class="text-2xl font-bold text-primary mb-3 border-b border-gray-200 dark:border-gray-700 pb-2">Helpful Tools</h2>
                <ul class="list-disc list-inside space-y-2">
                    <li><a href="https://example.com/grade-tracker" target="_blank" class="text-link hover:underline">Grade & Progress Tracker</a></li>
                    <li><a href="https://example.com/parent-dashboard" target="_blank" class="text-link hover:underline">Parent Dashboard Login</a></li>
                    <li><a href="https://example.com/schedule-template" target="_blank" class="text-link hover:underline">Daily Schedule Template</a></li>
                </ul>
            </section>

            <!-- Homeschool Laws by State -->
            <section id="laws" class="homeschool-laws mt-8 scroll-mt-24">
                <h2 class="text-2xl font-bold text-primary mb-3 border-b border-gray-200 dark:border-gray-700 pb-2">Homeschool Laws by State</h2>
                <!-- Tailwind-styled search input -->
                <label for="stateSearch" class="sr-only">Search for your state</label>
                <input class="w-full p-3 border border-gray-300 rounded-lg bg-base-bg text-text-default focus:outline-none focus:ring-2 focus:ring-primary mb-4 dark:border-gray-600" type="text" id="stateSearch" placeholder="Search for your state...">
                
                <ul id="stateList" class="list-disc list-inside space-y-2 max-h-96 overflow-y-auto border rounded-lg p-4 dark:border-gray-600 bg-base-bg">
                    <li><a href="https://hslda.org/legal/alabama" target="_blank" class="text-link hover:underline">Alabama Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/alaska" target="_blank" class="text-link hover:underline">Alaska Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/arizona" target="_blank" class="text-link hover:underline">Arizona Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/arkansas" target="_blank" class="text-link hover:underline">Arkansas Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/california" target="_blank" class="text-link hover:underline">California Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/colorado" target="_blank" class="text-link hover:underline">Colorado Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/connecticut" target="_blank" class="text-link hover:underline">Connecticut Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/delaware" target="_blank" class="text-link hover:underline">Delaware Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/florida" target="_blank" class="text-link hover:underline">Florida Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/georgia" target="_blank" class="text-link hover:underline">Georgia Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/hawaii" target="_blank" class="text-link hover:underline">Hawaii Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/idaho" target="_blank" class="text-link hover:underline">Idaho Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/illinois" target="_blank" class="text-link hover:underline">Illinois Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/indiana" target="_blank" class="text-link hover:underline">Indiana Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/iowa" target="_blank" class="text-link hover:underline">Iowa Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/kansas" target="_blank" class="text-link hover:underline">Kansas Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/kentucky" target="_blank" class="text-link hover:underline">Kentucky Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/louisiana" target="_blank" class="text-link hover:underline">Louisiana Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/maine" target="_blank" class="text-link hover:underline">Maine Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/maryland" target="_blank" class="text-link hover:underline">Maryland Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/massachusetts" target="_blank" class="text-link hover:underline">Massachusetts Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/michigan" target="_blank" class="text-link hover:underline">Michigan Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/minnesota" target="_blank" class="text-link hover:underline">Minnesota Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/mississippi" target="_blank" class="text-link hover:underline">Mississippi Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/missouri" target="_blank" class="text-link hover:underline">Missouri Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/montana" target="_blank" class="text-link hover:underline">Montana Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/nebraska" target="_blank" class="text-link hover:underline">Nebraska Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/nevada" target="_blank" class="text-link hover:underline">Nevada Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/new-hampshire" target="_blank" class="text-link hover:underline">New Hampshire Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/new-jersey" target="_blank" class="text-link hover:underline">New Jersey Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/new-mexico" target="_blank" class="text-link hover:underline">New Mexico Homeschool Laws & Forms</a></li>
                    <li><a href="httpsfor "https://hslda.org/legal/new-york" target="_blank" class="text-link hover:underline">New York Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/north-carolina" target="_blank" class="text-link hover:underline">North Carolina Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/north-dakota" target="_blank" class="text-link hover:underline">North Dakota Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/ohio" target="_blank" class="text-link hover:underline">Ohio Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/oklahoma" target="_blank" class="text-link hover:underline">Oklahoma Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/oregon" target="_blank" class="text-link hover:underline">Oregon Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/pennsylvania" target="_blank" class="text-link hover:underline">Pennsylvania Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/rhode-island" target="_blank" class="text-link hover:underline">Rhode Island Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/south-carolina" target="_blank" class="text-link hover:underline">South Carolina Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/south-dakota" target="_blank" class="text-link hover:underline">South Dakota Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/tennessee" target="_blank" class="text-link hover:underline">Tennessee Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/texas" target="_blank" class="text-link hover:underline">Texas Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/utah" target="_blank" class="text-link hover:underline">Utah Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/vermont" target="_blank" class="text-link hover:underline">Vermont Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/virginia" target="_blank" class="text-link hover:underline">Virginia Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/washington" target="_blank" class="text-link hover:underline">Washington Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/west-virginia" target="_blank" class="text-link hover:underline">West Virginia Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/wisconsin" target="_blank" class="text-link hover:underline">Wisconsin Homeschool Laws & Forms</a></li>
                    <li><a href="https://hslda.org/legal/wyoming" target="_blank" class="text-link hover:underline">Wyoming Homeschool Laws & Forms</a></li>
                </ul>
                <p class="text-text-secondary text-sm mt-2">Links provided by HSLDA (Home School Legal Defense Association)</p>
            </section>

            <!-- Feedback Form -->
            <section id="feedback" class="feedback mt-8 scroll-mt-24">
                <h2 class="text-2xl font-bold text-primary mb-3 border-b border-gray-200 dark:border-gray-700 pb-2">Give Us Your Feedback</h2>
                <!-- Tailwind-styled form -->
                <form id="feedbackForm" action="https://formsubmit.co/84436699b129e7e146c26f5459f15a56" method="POST" target="_blank" class="space-y-4">
                    <input type="hidden" name="_next" value="https://hestena62.com/thanks.html">
                    <input type="hidden" name="_subject" value="New Feedback Submission">
                    <input type="hidden" name="_captcha" value="true">
                    <input type="hidden" name="_blacklist" value="spammy pattern, banned term, phrase">
                    <input type="text" name="honey_check" style="display:none">
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-text-secondary">Your Email</label>
                        <input type="email" class="w-full p-3 mt-1 border border-gray-300 rounded-lg bg-base-bg text-text-default focus:outline-none focus:ring-2 focus:ring-primary dark:border-gray-600" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    
                    <div>
                        <label for="feedbackText" class="block text-sm font-medium text-text-secondary">Comments or Suggestions</label>
                        <textarea class="w-full p-3 mt-1 border border-gray-300 rounded-lg bg-base-bg text-text-default focus:outline-none focus:ring-2 focus:ring-primary dark:border-gray-600" id="feedbackText" name="feedback" rows="4" placeholder="We value your input..."></textarea>
                    </div>
                    
                    <!-- Tailwind-styled button -->
                    <button type="submit" class="px-6 py-2 bg-primary text-white font-semibold rounded-lg hover:bg-secondary transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-accent">Submit Feedback</button>
                </form>
            </section>

            <!-- Contact Information -->
            <section id="contact" class="contact mt-8 border-t border-gray-200 dark:border-gray-700 pt-6 scroll-mt-24">
                <h2 class="text-2xl font-bold text-primary mb-3">Contact Us</h2>
                <p class="mb-1 text-text-secondary">Email: <a href="mailto:support@elearningplatform.com" class="text-link hover:underline">support@elearningplatform.com</a></p>
                <p class="text-text-secondary">Phone: +1 (555) 123-4567</p>
            </section>

        </div> <!-- Close main content inner div -->
    </main>

</div>
<!-- MAIN CONTENT END -->


<!-- 
  PAGE-SPECIFIC JAVASCRIPT
  This script applies only to the elements on this page.
-->
<script>
    // Client-side validation for feedback form
    document.getElementById('feedbackForm').addEventListener('submit', function (event) {
        const feedback = document.getElementById('feedbackText').value.trim();
        if (!feedback) {
            event.preventDefault(); // Prevent form submission
            
            // Use the modal function from footer.php instead of alert()
            if(typeof showMessageBox === 'function') {
                showMessageBox('Please enter your feedback before submitting.');
            } else {
                // Fallback just in case
                console.error('Feedback cannot be empty.');
            }
        }
    });

    // Homeschool state search filter
    const searchInput = document.getElementById('stateSearch');
    const listItems = document.querySelectorAll('#stateList li');

    if (searchInput && listItems) {
        searchInput.addEventListener('input', function () {
            const value = this.value.toLowerCase();
            listItems.forEach(item => {
                if (item && item.textContent) {
                    item.style.display = item.textContent.toLowerCase().includes(value) ? '' : 'none';
                }
            });
        });
    }

    // Note: Smooth scrolling is handled by the CSS <style> block above.
</script>

<?php
// --- Include Footer Template ---
// This will add the <footer>, modals, and closing </body> and </html> tags
include 'src/footer.php';
?>