<?php $currentYear = date("Y"); ?>

<!-- Styled Footer -->
<footer class="mt-auto bg-slate-900 text-slate-400 relative border-t-4 border-primary">
    
    <!-- Decorative Glow -->
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-white/20 to-transparent"></div>

    <div class="container mx-auto px-6 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            
            <!-- Brand -->
            <div class="lg:col-span-1 space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-lg flex items-center justify-center text-white font-bold shadow-lg">H</div>
                    <span class="text-2xl font-bold text-white tracking-tight">Hesten's</span>
                </div>
                <p class="text-sm leading-relaxed text-slate-400">
                    Empowering students with learning disabilities through personalized, accessible, and engaging educational experiences.
                </p>
                <div class="flex gap-4 pt-2">
                    <a href="mailto:admin@hestena62.com" class="w-8 h-8 rounded bg-slate-800 flex items-center justify-center hover:bg-primary hover:text-white transition-all"><i class="fas fa-envelope"></i></a>
                    <!-- Placeholder Socials -->
                    <a href="#" class="w-8 h-8 rounded bg-slate-800 flex items-center justify-center hover:bg-blue-400 hover:text-white transition-all"><i class="fab fa-twitter"></i></a>
                </div>
            </div>

            <!-- Links -->
            <div>
                <h4 class="text-white font-bold mb-6 text-sm uppercase tracking-wider">Explore</h4>
                <ul class="space-y-3 text-sm font-medium">
                    <li><a href="/curriculum.php" class="hover:text-white hover:translate-x-1 transition-all inline-block">Curriculum</a></li>
                    <li><a href="/research" class="hover:text-white hover:translate-x-1 transition-all inline-block">Research</a></li>
                    <li><a href="/standard.php" class="hover:text-white hover:translate-x-1 transition-all inline-block">Standards</a></li>
                    <li><a href="/games.php" class="hover:text-white hover:translate-x-1 transition-all inline-block">Games</a></li>
                </ul>
            </div>

            <!-- Support -->
            <div>
                <h4 class="text-white font-bold mb-6 text-sm uppercase tracking-wider">Support</h4>
                <ul class="space-y-3 text-sm font-medium">
                    <li><a href="/help-center.php" class="hover:text-white hover:translate-x-1 transition-all inline-block">Help Center</a></li>
                    <li><a href="/contact.php" class="hover:text-white hover:translate-x-1 transition-all inline-block">Contact Us</a></li>
                    <li><a href="/privacy-policy.php" class="hover:text-white hover:translate-x-1 transition-all inline-block">Privacy Policy</a></li>
                    <li><a href="/settings.php" class="hover:text-white hover:translate-x-1 transition-all inline-block">Accessibility</a></li>
                </ul>
            </div>

            <!-- Newsletter & Translation -->
            <div>
                <h4 class="text-white font-bold mb-6 text-sm uppercase tracking-wider">Updates</h4>
                <form onsubmit="event.preventDefault(); document.getElementById('sub-msg').classList.remove('hidden');" class="mb-6">
                    <div class="relative">
                        <input type="email" placeholder="Email address" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-3 text-sm focus:outline-none focus:border-primary text-white transition-colors">
                        <button type="submit" class="absolute right-2 top-1.5 bg-primary text-white p-1.5 rounded-md hover:bg-blue-500 transition-colors"><i class="fas fa-arrow-right"></i></button>
                    </div>
                    <p id="sub-msg" class="hidden text-green-400 text-xs mt-2 font-bold"><i class="fas fa-check-circle"></i> Subscribed!</p>
                </form>
                
                <!-- Google Translate -->
                <div class="gtranslate_wrapper"></div>
            </div>
        </div>

        <div class="border-t border-slate-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center text-xs text-slate-500">
            <p>&copy; <?php echo $currentYear; ?> Hesten's Learning.</p>
            <p class="mt-2 md:mt-0 flex items-center gap-1">
                Made with <i class="fas fa-heart text-rose-500 animate-pulse"></i> by Hesten Allison
                <span class="mx-2">|</span>
                <a href="https://www.buymeacoffee.com/hestena62l" target="_blank" class="hover:text-yellow-400 transition-colors">Buy me a coffee</a>
            </p>
        </div>
    </div>
</footer>

<!-- Scroll to Top -->
<button id="scroll-to-top" class="fixed bottom-24 right-6 z-40 w-12 h-12 bg-white/10 backdrop-blur border border-white/20 text-white rounded-full shadow-2xl hover:bg-primary hover:scale-110 hidden items-center justify-center transition-all group" aria-label="Scroll to top">
    <i class="fas fa-arrow-up group-hover:-translate-y-1 transition-transform"></i>
</button>

<!-- Modals -->
<div id="message-box" class="fixed inset-0 bg-black/80 backdrop-blur-sm hidden items-center justify-center z-[60]" role="alertdialog" aria-modal="true">
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl p-8 max-w-sm w-full mx-4 text-center transform scale-100 transition-transform">
        <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
            <i class="fas fa-bell"></i>
        </div>
        <h4 class="text-xl font-bold mb-2 text-gray-900 dark:text-white">Notification</h4>
        <p id="message-text" class="text-gray-600 dark:text-gray-300 mb-8">Message content.</p>
        <button onclick="document.getElementById('message-box').classList.add('hidden'); document.getElementById('message-box').classList.remove('flex');" class="w-full bg-primary text-white py-3 rounded-xl font-bold hover:bg-blue-600 transition-colors shadow-lg shadow-blue-500/30">Got it</button>
    </div>
</div>

<!-- Translate Script -->
<script>
    window.gtranslateSettings = {
      default_language: "en",
      native_language_names: true,
      detect_browser_language: true,
      wrapper_selector: ".gtranslate_wrapper",
      flag_style: "3d",
      alt_flags: { en: "usa" },
    };
</script>
<script src="https://cdn.gtranslate.net/widgets/latest/popup.js" defer></script>

<script>
    // Scroll To Top
    const scrollBtn = document.getElementById("scroll-to-top");
    window.addEventListener("scroll", () => {
        if (window.scrollY > 300) {
            scrollBtn.classList.remove("hidden");
            scrollBtn.classList.add("flex");
        } else {
            scrollBtn.classList.add("hidden");
            scrollBtn.classList.remove("flex");
        }
    });
    scrollBtn.addEventListener("click", () => window.scrollTo({ top: 0, behavior: "smooth" }));

    // Global Message
    window.showMessageBox = function(msg) {
        document.getElementById('message-text').textContent = msg;
        const box = document.getElementById('message-box');
        box.classList.remove('hidden');
        box.classList.add('flex');
    };
</script>