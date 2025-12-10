<?php $currentYear = date("Y"); ?>

<footer class="mt-auto bg-slate-900 text-slate-400 relative border-t-4 border-blue-600">
    <!-- Decorative Glow -->
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-blue-400/30 to-transparent"></div>

    <div class="container mx-auto px-6 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
            <!-- Brand -->
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-lg flex items-center justify-center text-white font-bold text-xl shadow-lg">H</div>
                    <span class="text-2xl font-bold text-white tracking-tight">Hesten's</span>
                </div>
                <p class="text-sm leading-relaxed text-slate-400">Making education accessible, engaging, and personal for everyone.</p>
                <div class="flex gap-3 pt-2">
                    <a href="mailto:admin@hestena62.com" class="w-8 h-8 rounded bg-slate-800 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all"><i class="fas fa-envelope"></i></a>
                    <a href="#" class="w-8 h-8 rounded bg-slate-800 flex items-center justify-center hover:bg-sky-500 hover:text-white transition-all"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="w-8 h-8 rounded bg-slate-800 flex items-center justify-center hover:bg-pink-600 hover:text-white transition-all"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <!-- Links -->
            <div>
                <h4 class="text-white font-bold mb-5 text-xs uppercase tracking-widest border-l-2 border-blue-600 pl-3">Explore</h4>
                <ul class="space-y-3 text-sm font-medium">
                    <li><a href="/curriculum.php" class="hover:text-blue-400 hover:pl-2 transition-all">Curriculum</a></li>
                    <li><a href="/research" class="hover:text-blue-400 hover:pl-2 transition-all">Research</a></li>
                    <li><a href="/standard.php" class="hover:text-blue-400 hover:pl-2 transition-all">Standards</a></li>
                    <li><a href="/games.php" class="hover:text-blue-400 hover:pl-2 transition-all">Games</a></li>
                </ul>
            </div>

            <!-- Support -->
            <div>
                <h4 class="text-white font-bold mb-5 text-xs uppercase tracking-widest border-l-2 border-purple-600 pl-3">Support</h4>
                <ul class="space-y-3 text-sm font-medium">
                    <li><a href="/help-center.php" class="hover:text-purple-400 hover:pl-2 transition-all">Help Center</a></li>
                    <li><a href="/contact.php" class="hover:text-purple-400 hover:pl-2 transition-all">Contact Us</a></li>
                    <li><a href="/privacy-policy.php" class="hover:text-purple-400 hover:pl-2 transition-all">Privacy Policy</a></li>
                    <li><a href="/settings.php" class="hover:text-purple-400 hover:pl-2 transition-all">Accessibility</a></li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div>
                <h4 class="text-white font-bold mb-5 text-xs uppercase tracking-widest border-l-2 border-emerald-600 pl-3">Stay Updated</h4>
                <form onsubmit="event.preventDefault(); document.getElementById('sub-msg').classList.remove('hidden');" class="mb-4">
                    <div class="relative">
                        <input type="email" placeholder="Email address" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-3 text-sm focus:outline-none focus:border-blue-500 text-white transition-colors">
                        <button type="submit" class="absolute right-2 top-1.5 bg-blue-600 text-white w-8 h-8 rounded-md hover:bg-blue-500 transition-colors flex items-center justify-center"><i class="fas fa-arrow-right"></i></button>
                    </div>
                    <p id="sub-msg" class="hidden text-emerald-400 text-xs mt-2 font-bold"><i class="fas fa-check-circle"></i> You're on the list!</p>
                </form>
                <div class="gtranslate_wrapper"></div>
            </div>
        </div>

        <div class="border-t border-slate-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center text-xs text-slate-500">
            <p>&copy; <?php echo $currentYear; ?> Hesten's Learning. All rights reserved.</p>
            <div class="mt-4 md:mt-0">
                <a href="https://www.buymeacoffee.com/hestena62l" target="_blank" class="inline-flex items-center gap-2 bg-[#FFDD00] text-black px-4 py-2 rounded-full font-bold hover:bg-[#ffe44d] transition-all">
                    <img src="https://cdn.buymeacoffee.com/buttons/bmc-new-btn-logo.svg" alt="" class="h-4"> 
                    <span>Buy me a coffee</span>
                </a>
            </div>
        </div>
    </div>
</footer>

<button id="scroll-to-top" class="fixed bottom-24 right-6 z-40 w-12 h-12 bg-white/10 backdrop-blur border border-white/20 text-white rounded-full shadow-2xl hover:bg-blue-600 hidden items-center justify-center transition-all" aria-label="Scroll to top">
    <i class="fas fa-arrow-up"></i>
</button>

<!-- Translate Script -->
<script>
    window.gtranslateSettings = { default_language: "en", native_language_names: true, detect_browser_language: true, wrapper_selector: ".gtranslate_wrapper", flag_style: "3d", alt_flags: { en: "usa" } };
</script>
<script src="https://cdn.gtranslate.net/widgets/latest/popup.js" defer></script>

<script>
    // Header Mobile Toggle Logic (Ensuring it works globally)
    document.addEventListener('DOMContentLoaded', () => {
        const navToggle = document.getElementById('nav-toggle');
        const navContent = document.getElementById('nav-content');
        if(navToggle && navContent) {
            navToggle.addEventListener('click', () => {
                navContent.classList.toggle('hidden');
                navContent.classList.toggle('flex');
                navContent.classList.toggle('flex-col'); // Stack vertically on mobile
                navContent.classList.toggle('pb-4'); 
            });
        }
    });

    // Scroll to Top
    const scrollBtn = document.getElementById("scroll-to-top");
    window.addEventListener("scroll", () => {
        if (window.scrollY > 300) { scrollBtn.classList.remove("hidden"); scrollBtn.classList.add("flex"); } 
        else { scrollBtn.classList.add("hidden"); scrollBtn.classList.remove("flex"); }
    });
    scrollBtn.addEventListener("click", () => window.scrollTo({ top: 0, behavior: "smooth" }));
    
    // Reading Guide Follow Mouse (Desktop)
    document.addEventListener('mousemove', (e) => {
        const guide = document.getElementById('reading-guide');
        if (guide && guide.style.display !== 'none') {
            guide.style.top = (e.clientY - 30) + 'px';
        }
    });
</script>