<!--
  src/footer.php
  Top 1% Accessible Footer: Theme-aware, Responsive, robust Modal logic, and Back-to-Top.
-->
<?php $currentYear = date("Y"); ?>

  <!-- Back to Top Button -->
  <button id="back-to-top" 
    class="fixed bottom-24 right-6 z-40 p-4 bg-gray-800 text-white rounded-full shadow-lg opacity-0 translate-y-10 transition-all duration-300 pointer-events-none focus:outline-none focus:ring-4 focus:ring-accent hover:bg-gray-700 no-print"
    aria-label="Scroll back to top">
    <i class="fas fa-arrow-up"></i>
  </button>

  <!-- Footer Wrapper -->
  <footer class="bg-gradient-to-r from-footer-bg-from to-footer-bg-to text-white py-12 px-4 rounded-t-[2rem] shadow-[0_-10px_40px_rgba(0,0,0,0.1)] transition-all duration-300 mt-auto">
    
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-10">
      
      <!-- About Column -->
      <div>
        <h3 class="text-xl font-bold mb-4 flex items-center text-white/90">
          <i class="fas fa-graduation-cap mr-3 text-accent text-2xl"></i> About
        </h3>
        <p class="text-sm leading-relaxed text-blue-100">
          Empowering students with learning disabilities through personalized, accessible, and engaging learning experiences.
        </p>
        <a href="/about-us.php" class="inline-block mt-4 text-sm font-bold text-accent hover:text-white underline decoration-2 underline-offset-4 transition-colors focus:ring-2 focus:ring-white rounded px-1">
            Read our mission &rarr;
        </a>
      </div>

      <!-- Quick Links -->
      <div>
        <h3 class="text-lg font-bold mb-4 text-white/90 border-b border-white/20 pb-2 inline-block">Quick Links</h3>
        <ul class="space-y-3 text-sm">
          <li>
            <a href="/curriculum.php" class="flex items-center text-blue-100 hover:text-white hover:translate-x-1 transition-all focus:outline-none focus:ring-2 focus:ring-white rounded p-1">
                <i class="fas fa-scroll w-6 text-center text-accent"></i> Curriculum
            </a>
          </li>
          <li>
            <a href="/library/" class="flex items-center text-blue-100 hover:text-white hover:translate-x-1 transition-all focus:outline-none focus:ring-2 focus:ring-white rounded p-1">
                <i class="fas fa-book-reader w-6 text-center text-accent"></i> Library
            </a>
          </li>
          <li>
            <a href="/research" class="flex items-center text-blue-100 hover:text-white hover:translate-x-1 transition-all focus:outline-none focus:ring-2 focus:ring-white rounded p-1">
                <i class="fas fa-flask w-6 text-center text-accent"></i> Research
            </a>
          </li>
          <li>
            <a href="/standards" class="flex items-center text-blue-100 hover:text-white hover:translate-x-1 transition-all focus:outline-none focus:ring-2 focus:ring-white rounded p-1">
                <i class="fas fa-chart-line w-6 text-center text-accent"></i> Standards
            </a>
          </li>
        </ul>
      </div>

      <!-- Support -->
      <div>
        <h3 class="text-lg font-bold mb-4 text-white/90 border-b border-white/20 pb-2 inline-block">Support</h3>
        <ul class="space-y-3 text-sm">
          <li>
            <a href="/contact.html" class="flex items-center text-blue-100 hover:text-white hover:translate-x-1 transition-all focus:outline-none focus:ring-2 focus:ring-white rounded p-1">
                <i class="fas fa-envelope w-6 text-center text-accent"></i> Contact Us
            </a>
          </li>
          <li>
            <a href="/students.php" class="flex items-center text-blue-100 hover:text-white hover:translate-x-1 transition-all focus:outline-none focus:ring-2 focus:ring-white rounded p-1">
                <i class="fas fa-user-graduate w-6 text-center text-accent"></i> For Students
            </a>
          </li>
          <li>
            <a href="/parents.php" class="flex items-center text-blue-100 hover:text-white hover:translate-x-1 transition-all focus:outline-none focus:ring-2 focus:ring-white rounded p-1">
                <i class="fas fa-users w-6 text-center text-accent"></i> For Parents
            </a>
          </li>
          <li>
            <a href="#" class="flex items-center text-blue-100 hover:text-white hover:translate-x-1 transition-all focus:outline-none focus:ring-2 focus:ring-white rounded p-1">
                <i class="fas fa-chalkboard-teacher w-6 text-center text-accent"></i> For Teachers
            </a>
          </li>
        </ul>
      </div>

      <!-- Legal & Settings -->
      <div>
        <h3 class="text-lg font-bold mb-4 text-white/90 border-b border-white/20 pb-2 inline-block">Legal</h3>
        <ul class="space-y-3 text-sm">
          <li>
            <a href="/privacy.html" class="flex items-center text-blue-100 hover:text-white hover:translate-x-1 transition-all focus:outline-none focus:ring-2 focus:ring-white rounded p-1">
                <i class="fas fa-user-shield w-6 text-center text-accent"></i> Privacy Policy
            </a>
          </li>
          <li>
            <a href="/terms.html" class="flex items-center text-blue-100 hover:text-white hover:translate-x-1 transition-all focus:outline-none focus:ring-2 focus:ring-white rounded p-1">
                <i class="fas fa-file-contract w-6 text-center text-accent"></i> Terms of Use
            </a>
          </li>
          <li>
            <button onclick="document.getElementById('a11y-toggle-button').click()" class="flex items-center text-left text-blue-100 hover:text-white hover:translate-x-1 transition-all focus:outline-none focus:ring-2 focus:ring-white rounded p-1 w-full">
                <i class="fas fa-universal-access w-6 text-center text-accent"></i> Accessibility
            </button>
          </li>
        </ul>
      </div>
    </div>

    <!-- Copyright & Credits -->
    <div class="mt-12 pt-8 border-t border-white/20 text-center text-sm text-blue-100">
      <p class="mb-4">
        &copy; <?php echo $currentYear; ?> <?php echo isset($pageTitle) ? $pageTitle : "Hesten's Learning"; ?>. 
        Made with <i class="fas fa-heart text-red-400 mx-1 animate-pulse" aria-label="love"></i> for inclusive education.
      </p>
      
      <p class="text-xs opacity-80 mb-6">
        <a href="http://hestena62.com" class="hover:text-white underline">Hesten's Learning</a> by 
        <a href="/about-me.php" class="hover:text-white underline">Hesten Allison</a> is licensed under 
        <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank" rel="noopener" class="hover:text-white underline">CC BY-NC-SA 4.0</a>
      </p>

      <!-- Buy Me A Coffee (Accessible Wrapper) -->
      <div class="flex justify-center">
        <a href="https://www.buymeacoffee.com/hestena62l" target="_blank" rel="noopener noreferrer"
           class="inline-block hover:opacity-90 transition-opacity focus:ring-4 focus:ring-white rounded-lg">
          <img src="https://img.buymeacoffee.com/button-api/?text=Buy me a coffee&emoji=&slug=hestena62&button_colour=BD5FFF&font_colour=ffffff&font_family=Cookie&outline_colour=000000&coffee_colour=FFDD00" 
               alt="Support me on Buy Me a Coffee" class="h-10" />
        </a>
      </div>
    </div>
  </footer>

  <!-- --- GLOBAL MODALS --- -->

  <!-- Message Box -->
  <div id="message-box" class="fixed inset-0 bg-black bg-opacity-80 hidden items-center justify-center z-[100]"
       role="alertdialog" aria-modal="true" aria-labelledby="message-title">
    <div class="bg-content-bg rounded-2xl shadow-2xl p-8 max-w-sm w-full text-center transform scale-100 transition-all border border-gray-200 dark:border-gray-700">
      <div class="w-16 h-16 bg-blue-100 text-primary rounded-full flex items-center justify-center mx-auto mb-4 text-3xl">
          <i class="fas fa-info"></i>
      </div>
      <h4 id="message-title" class="text-2xl font-bold mb-3 text-text-default">Notification</h4>
      <p id="message-text" class="mb-8 text-text-secondary leading-relaxed">Message goes here.</p>
      <button id="message-ok-button" class="w-full bg-primary text-white py-3 rounded-lg font-bold hover:bg-secondary focus:ring-4 focus:ring-primary/50 transition-colors">
        OK
      </button>
    </div>
  </div>

  <!-- Confirmation Modal -->
  <div id="confirmation-modal" class="fixed inset-0 bg-black bg-opacity-80 hidden items-center justify-center z-[100]"
       role="dialog" aria-modal="true" aria-labelledby="confirmation-title">
    <div class="bg-content-bg rounded-2xl shadow-2xl p-8 max-w-sm w-full text-center border border-gray-200 dark:border-gray-700">
      <div class="w-16 h-16 bg-yellow-100 text-yellow-600 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl">
          <i class="fas fa-question"></i>
      </div>
      <h4 id="confirmation-title" class="text-2xl font-bold mb-3 text-text-default">Confirm Action</h4>
      <p id="confirmation-text" class="mb-8 text-text-secondary">Are you sure?</p>
      <div class="flex gap-4">
        <button id="confirm-no-button" class="flex-1 bg-gray-200 text-gray-800 py-3 rounded-lg font-bold hover:bg-gray-300 focus:ring-4 focus:ring-gray-400 transition-colors">
          Cancel
        </button>
        <button id="confirm-yes-button" class="flex-1 bg-primary text-white py-3 rounded-lg font-bold hover:bg-secondary focus:ring-4 focus:ring-primary/50 transition-colors">
          Confirm
        </button>
      </div>
    </div>
  </div>

  <!-- Javascript for Modals & Accessibility -->
  <script>
    // --- Focus Trap Utility ---
    function trapFocus(element) {
        const focusableElements = element.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
        const firstElement = focusableElements[0];
        const lastElement = focusableElements[focusableElements.length - 1];

        element.addEventListener('keydown', function(e) {
            const isTabPressed = (e.key === 'Tab' || e.keyCode === 9);
            if (!isTabPressed) return;

            if (e.shiftKey) { // Shift + Tab
                if (document.activeElement === firstElement) {
                    lastElement.focus();
                    e.preventDefault();
                }
            } else { // Tab
                if (document.activeElement === lastElement) {
                    firstElement.focus();
                    e.preventDefault();
                }
            }
        });
        firstElement.focus();
    }

    // --- Modal Functions ---
    let lastFocusedElement;

    function showMessageBox(msg, title = "Notification") {
        lastFocusedElement = document.activeElement;
        const box = document.getElementById('message-box');
        document.getElementById('message-text').innerText = msg;
        document.getElementById('message-title').innerText = title;
        
        box.classList.remove('hidden');
        box.classList.add('flex');
        trapFocus(box);

        document.getElementById('message-ok-button').onclick = function() {
            box.classList.add('hidden');
            box.classList.remove('flex');
            if(lastFocusedElement) lastFocusedElement.focus();
        };
    }

    function showConfirmationModal(msg, callback) {
        lastFocusedElement = document.activeElement;
        const modal = document.getElementById('confirmation-modal');
        document.getElementById('confirmation-text').innerText = msg;
        
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        trapFocus(modal);

        const close = (result) => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            if(lastFocusedElement) lastFocusedElement.focus();
            if(callback) callback(result);
        };

        document.getElementById('confirm-yes-button').onclick = () => close(true);
        document.getElementById('confirm-no-button').onclick = () => close(false);
    }

    // --- Back to Top Logic ---
    const backToTopBtn = document.getElementById("back-to-top");
    if(backToTopBtn) {
        window.addEventListener("scroll", () => {
            if (window.scrollY > 300) {
                backToTopBtn.classList.remove("opacity-0", "translate-y-10", "pointer-events-none");
            } else {
                backToTopBtn.classList.add("opacity-0", "translate-y-10", "pointer-events-none");
            }
        });

        backToTopBtn.addEventListener("click", () => {
            window.scrollTo({ top: 0, behavior: "smooth" });
        });
    }
  </script>

</body>
</html>