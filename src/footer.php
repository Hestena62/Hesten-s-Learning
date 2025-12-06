<!--
  Reusable Footer File (footer.php)
  Contains: Footer, Modals, and closing </body> and </html> tags
-->
<?php
// Define variables that are only used in the footer
$currentYear = date("Y");
?>

<!-- Scroll to Top Button -->
<!-- Placed at bottom-24 to sit above the Accessibility Toggle (which is at bottom-6) -->
<!-- Scroll to Top Button -->
<button id="scroll-to-top"
  class="fixed bottom-8 right-8 z-50 w-12 h-12 bg-white/10 backdrop-blur-md border border-white/20 text-white rounded-full shadow-2xl hover:bg-white/20 hover:scale-110 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300 transform translate-y-24 opacity-0 flex items-center justify-center print:hidden group">
  <i class="fas fa-arrow-up group-hover:animate-bounce-short"></i>
</button>

<!-- Footer -->
<footer class="mt-auto bg-slate-900 text-slate-300 relative overflow-hidden font-sans border-t border-slate-800/50">

  <!-- Decorative Elements -->
  <div
    class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 shadow-[0_0_20px_rgba(79,70,229,0.5)]">
  </div>
  <div
    class="absolute -top-[400px] -right-[400px] w-[800px] h-[800px] bg-blue-600/10 rounded-full blur-[100px] pointer-events-none">
  </div>
  <div
    class="absolute bottom-0 left-0 w-full h-full bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5 pointer-events-none">
  </div>

  <div class="container mx-auto px-6 py-16 relative z-10">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12">

      <!-- Brand Section (Col Span 4) -->
      <div class="lg:col-span-4 space-y-6">
        <div class="flex items-center gap-3 group">
          <div
            class="w-12 h-12 bg-gradient-to-br from-blue-600 to-purple-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-900/20 group-hover:rotate-6 transition-transform duration-300">
            <span class="text-white font-bold text-2xl font-serif">H</span>
          </div>
          <div class="flex flex-col">
            <span
              class="text-2xl font-bold text-white tracking-tight leading-none group-hover:text-blue-400 transition-colors">Hesten's
              Learning</span>
            <span class="text-xs text-slate-500 uppercase tracking-widest font-semibold mt-1">Education for All</span>
          </div>
        </div>
        <p class="text-slate-400 leading-relaxed text-sm pr-4">
          Empowering students with learning disabilities through personalized, accessible, and engaging educational
          experiences meant for everyone.
        </p>
        <div class="flex gap-3 pt-2">
          <!-- Social Placeholders -->
          <a href="#"
            class="w-10 h-10 rounded-lg bg-slate-800/50 border border-slate-700 flex items-center justify-center text-slate-400 hover:bg-blue-600 hover:text-white hover:border-blue-500 transition-all duration-300 group"
            aria-label="Twitter">
            <i class="fab fa-twitter text-lg group-hover:scale-110 transition-transform"></i>
          </a>
          <a href="#"
            class="w-10 h-10 rounded-lg bg-slate-800/50 border border-slate-700 flex items-center justify-center text-slate-400 hover:bg-blue-800 hover:text-white hover:border-blue-700 transition-all duration-300 group"
            aria-label="Facebook">
            <i class="fab fa-facebook-f text-lg group-hover:scale-110 transition-transform"></i>
          </a>
          <a href="#"
            class="w-10 h-10 rounded-lg bg-slate-800/50 border border-slate-700 flex items-center justify-center text-slate-400 hover:bg-pink-600 hover:text-white hover:border-pink-500 transition-all duration-300 group"
            aria-label="Instagram">
            <i class="fab fa-instagram text-lg group-hover:scale-110 transition-transform"></i>
          </a>
          <a href="mailto:admin@hestena62.com"
            class="w-10 h-10 rounded-lg bg-slate-800/50 border border-slate-700 flex items-center justify-center text-slate-400 hover:bg-emerald-600 hover:text-white hover:border-emerald-500 transition-all duration-300 group"
            aria-label="Email Us">
            <i class="fas fa-envelope text-lg group-hover:scale-110 transition-transform"></i>
          </a>
        </div>
      </div>

      <!-- Quick Links (Col Span 2) -->
      <div class="lg:col-span-2">
        <h4
          class="text-white font-bold text-lg mb-6 flex items-center gap-2 uppercase tracking-wide text-sm opacity-80">
          <i class="fas fa-compass text-blue-500 text-xs"></i> Explore
        </h4>
        <ul class="space-y-3 text-sm font-medium">
          <li><a href="/curriculum.php"
              class="text-slate-400 hover:text-blue-400 transition-colors flex items-center gap-2 group"><span
                class="w-1.5 h-1.5 rounded-full bg-slate-600 group-hover:bg-blue-400 transition-colors"></span>
              Curriculum</a></li>
          <li><a href="/research"
              class="text-slate-400 hover:text-blue-400 transition-colors flex items-center gap-2 group"><span
                class="w-1.5 h-1.5 rounded-full bg-slate-600 group-hover:bg-blue-400 transition-colors"></span>
              Research</a></li>
          <li><a href="/standard.php"
              class="text-slate-400 hover:text-blue-400 transition-colors flex items-center gap-2 group"><span
                class="w-1.5 h-1.5 rounded-full bg-slate-600 group-hover:bg-blue-400 transition-colors"></span>
              Standards</a></li>
          <li><a href="/games.html"
              class="text-slate-400 hover:text-blue-400 transition-colors flex items-center gap-2 group"><span
                class="w-1.5 h-1.5 rounded-full bg-slate-600 group-hover:bg-blue-400 transition-colors"></span>
              Games</a></li>
        </ul>
      </div>

      <!-- Support (Col Span 2) -->
      <div class="lg:col-span-2">
        <h4
          class="text-white font-bold text-lg mb-6 flex items-center gap-2 uppercase tracking-wide text-sm opacity-80">
          <i class="fas fa-life-ring text-purple-500 text-xs"></i> Support
        </h4>
        <ul class="space-y-3 text-sm font-medium">
          <li><a href="/help-center.php"
              class="text-slate-400 hover:text-purple-400 transition-colors flex items-center gap-2 group"><span
                class="w-1.5 h-1.5 rounded-full bg-slate-600 group-hover:bg-purple-400 transition-colors"></span> Help
              Center</a></li>
          <li><a href="/contact.php"
              class="text-slate-400 hover:text-purple-400 transition-colors flex items-center gap-2 group"><span
                class="w-1.5 h-1.5 rounded-full bg-slate-600 group-hover:bg-purple-400 transition-colors"></span>
              Contact Us</a></li>
          <li><a href="/privacy-policy.php"
              class="text-slate-400 hover:text-purple-400 transition-colors flex items-center gap-2 group"><span
                class="w-1.5 h-1.5 rounded-full bg-slate-600 group-hover:bg-purple-400 transition-colors"></span>
              Privacy Policy</a></li>
          <li><a href="/settings.php"
              class="text-slate-400 hover:text-purple-400 transition-colors flex items-center gap-2 group"><span
                class="w-1.5 h-1.5 rounded-full bg-slate-600 group-hover:bg-purple-400 transition-colors"></span>
              Accessibility</a></li>
        </ul>
      </div>

      <!-- Newsletter (Col Span 4) -->
      <div class="lg:col-span-4 bg-white/5 rounded-2xl p-6 border border-white/10 backdrop-blur-sm">
        <h4 class="text-white font-bold text-lg mb-4 flex items-center gap-2">
          <i class="fas fa-paper-plane text-pink-500"></i> Stay Connected
        </h4>
        <p class="text-slate-400 text-sm mb-4">Join our community to get the latest updates, learning resources, and
          tips directly to your inbox.</p>
        <form class="space-y-3"
          onsubmit="event.preventDefault(); document.getElementById('newsletter-success').classList.remove('hidden');">
          <div class="relative">
            <input type="email" required placeholder="Enter your email address"
              class="w-full bg-slate-900/50 border border-slate-600 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all placeholder-slate-500 text-white">
            <i class="fas fa-envelope absolute right-4 top-1/2 -translate-y-1/2 text-slate-500"></i>
          </div>
          <button type="submit"
            class="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-500 hover:to-purple-500 text-white font-bold py-3 rounded-xl shadow-lg hover:shadow-blue-500/25 transition-all transform hover:-translate-y-0.5 active:scale-95">
            Subscribe Now
          </button>
          <p id="newsletter-success" class="hidden text-green-400 text-xs text-center font-bold animate-pulse"><i
              class="fas fa-check-circle"></i> Thanks for subscribing!</p>
        </form>
      </div>

    </div>

    <!-- Divider -->
    <div class="h-px bg-gradient-to-r from-transparent via-slate-700 to-transparent my-10"></div>

    <!-- Bottom Bar -->
    <div class="flex flex-col md:flex-row justify-between items-center gap-6 text-sm text-slate-500">
      <div class="text-center md:text-left space-y-2">
        <p>&copy; <span id="year"><?php echo $currentYear; ?></span> <span
            class="text-slate-300 font-semibold"><?php echo isset($pageTitle) ? $pageTitle : "Hesten's Learning"; ?></span>.
          All rights reserved.</p>
        <p class="text-xs">
          Made with <i class="fas fa-heart text-red-500 animate-pulse"></i> for education by <a href="/about-me.php"
            class="text-slate-400 hover:text-white underline decoration-slate-600 hover:decoration-white underline-offset-2 transition-all">Hesten
            Allison</a>.
        </p>
      </div>

      <div class="flex flex-wrap justify-center items-center gap-6">
        <div class="gtranslate_wrapper"></div>

        <a href="https://www.buymeacoffee.com/hestena62l" target="_blank" rel="noopener noreferrer"
          class="group relative inline-flex items-center gap-2 bg-[#FFDD00] text-black px-5 py-2.5 rounded-full font-bold font-['Cookie',cursive] text-lg hover:bg-[#ffe44d] transition-all shadow-lg hover:shadow-[#FFDD00]/30 transform hover:-translate-y-1">
          <img src="https://cdn.buymeacoffee.com/buttons/bmc-new-btn-logo.svg" alt="" class="h-5 w-5">
          <span>Buy me a coffee</span>
          <div
            class="absolute inset-0 rounded-full ring-2 ring-white/50 group-hover:ring-4 transition-all opacity-0 group-hover:opacity-100">
          </div>
        </a>
      </div>
    </div>
  </div>

  <!-- Scripts -->
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
</footer>

<!-- Global Modals (Message & Confirmation) -->
<div id="message-box" class="fixed inset-0 bg-black/75 backdrop-blur-sm hidden items-center justify-center z-[100]"
  role="alertdialog" aria-modal="true" aria-labelledby="message-title">
  <div
    class="bg-content-bg rounded-xl shadow-2xl p-6 max-w-sm w-full text-center transform scale-100 transition-transform duration-300 border border-gray-200 dark:border-gray-700">
    <h4 id="message-title" class="text-xl font-bold mb-4 text-primary">Notification</h4>
    <p id="message-text" class="mb-6 text-text-default">This is a general message.</p>
    <button id="message-ok-button"
      class="bg-primary text-white px-6 py-2 rounded-lg font-semibold hover:bg-secondary transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-accent">
      OK
    </button>
  </div>
</div>

<div id="confirmation-modal"
  class="fixed inset-0 bg-black/75 backdrop-blur-sm hidden items-center justify-center z-[100]" role="dialog"
  aria-modal="true" aria-labelledby="confirmation-title">
  <div
    class="bg-content-bg rounded-xl shadow-2xl p-6 max-w-sm w-full text-center transform scale-100 transition-transform duration-300 border border-gray-200 dark:border-gray-700">
    <h4 id="confirmation-title" class="text-xl font-bold mb-4 text-red-500">Confirm Action</h4>
    <p id="confirmation-text" class="mb-6 text-text-default">Are you sure you want to proceed?</p>
    <div class="flex justify-center space-x-4">
      <button id="confirm-yes-button"
        class="bg-red-500 text-white px-6 py-2 rounded-lg font-semibold hover:bg-red-600 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-red-400">
        Yes
      </button>
      <button id="confirm-no-button"
        class="bg-gray-300 text-gray-800 px-6 py-2 rounded-lg font-semibold hover:bg-gray-400 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500">
        No
      </button>
    </div>
  </div>
</div>

<script>
  // --- SCROLL TO TOP LOGIC ---
  const scrollTopBtn = document.getElementById("scroll-to-top");
  if (scrollTopBtn) {
    window.addEventListener("scroll", () => {
      // Show button after scrolling down 300px
      if (window.scrollY > 300) {
        scrollTopBtn.classList.remove("translate-y-24", "opacity-0");
      } else {
        scrollTopBtn.classList.add("translate-y-24", "opacity-0");
      }
    });

    scrollTopBtn.addEventListener("click", () => {
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
    });
  }

  // --- GLOBAL MODAL FUNCTIONS ---
  const messageBox = document.getElementById("message-box");
  const messageText = document.getElementById("message-text");
  const messageOkButton = document.getElementById("message-ok-button");
  const confirmationModal = document.getElementById("confirmation-modal");
  const confirmationText = document.getElementById("confirmation-text");
  const confirmYesButton = document.getElementById("confirm-yes-button");
  const confirmNoButton = document.getElementById("confirm-no-button");

  let lastFocusedElement = null;

  function trapFocus(modalElement) {
    const focusableElements = modalElement.querySelectorAll(
      'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
    );
    if (focusableElements.length === 0) return;

    const firstFocusableElement = focusableElements[0];
    const lastFocusableElement = focusableElements[focusableElements.length - 1];

    const handleFocusTrap = function (e) {
      if (e.key !== 'Tab') return;
      if (e.shiftKey) { // Shift + Tab
        if (document.activeElement === firstFocusableElement) {
          lastFocusableElement.focus();
          e.preventDefault();
        }
      } else { // Tab
        if (document.activeElement === lastFocusableElement) {
          firstFocusableElement.focus();
          e.preventDefault();
        }
      }
    };

    modalElement._handleFocusTrap = handleFocusTrap;
    modalElement.addEventListener('keydown', modalElement._handleFocusTrap);
    firstFocusableElement.focus();
  }

  function removeTrapFocus(modalElement) {
    if (modalElement && modalElement._handleFocusTrap) {
      modalElement.removeEventListener('keydown', modalElement._handleFocusTrap);
      delete modalElement._handleFocusTrap;
    }
  }

  window.showMessageBox = function (message) {
    if (!messageBox || !messageText || !messageOkButton) return;
    lastFocusedElement = document.activeElement;
    messageText.textContent = message;
    messageBox.classList.remove("hidden");
    messageBox.style.display = 'flex';
    trapFocus(messageBox);

    messageOkButton.onclick = () => {
      messageBox.classList.add("hidden");
      messageBox.style.display = 'none';
      removeTrapFocus(messageBox);
      if (lastFocusedElement) lastFocusedElement.focus();
    };
  }

  window.showConfirmationModal = function (message, onConfirm) {
    if (!confirmationModal) return;
    lastFocusedElement = document.activeElement;
    confirmationText.textContent = message;
    confirmationModal.classList.remove("hidden");
    confirmationModal.style.display = 'flex';
    trapFocus(confirmationModal);

    // Focus NO button by default for safety
    if (confirmNoButton) confirmNoButton.focus();

    const closeConfirm = () => {
      confirmationModal.classList.add("hidden");
      confirmationModal.style.display = 'none';
      removeTrapFocus(confirmationModal);
      if (lastFocusedElement) lastFocusedElement.focus();
    };

    confirmYesButton.onclick = () => {
      closeConfirm();
      onConfirm(true);
    };
    confirmNoButton.onclick = () => {
      closeConfirm();
      onConfirm(false);
    };
  }

  // --- UI Interactions ---
  // Mobile Nav
  const navToggle = document.getElementById("nav-toggle");
  const navContent = document.getElementById("nav-content");
  if (navToggle && navContent) {
    navToggle.addEventListener("click", function () {
      const isHidden = navContent.classList.toggle("hidden");
      this.setAttribute('aria-expanded', isHidden ? 'false' : 'true');
      navContent.setAttribute('aria-hidden', isHidden ? 'true' : 'false');
    });
  }

  // Accessibility Panel Logic (if elements exist)
  const a11yPanel = document.getElementById('a11y-settings-panel');
  const a11yToggleButton = document.getElementById('a11y-toggle-button');
  const a11yCloseButton = document.getElementById('a11y-close-button');

  if (a11yPanel && a11yToggleButton) {
    a11yToggleButton.addEventListener('click', () => {
      a11yPanel.classList.remove('translate-x-full');
      a11yPanel.setAttribute('aria-hidden', 'false');
      // Small delay to allow transition before trapping focus
      setTimeout(() => trapFocus(a11yPanel), 100);
    });

    const closeA11y = () => {
      a11yPanel.classList.add('translate-x-full');
      a11yPanel.setAttribute('aria-hidden', 'true');
      removeTrapFocus(a11yPanel);
      a11yToggleButton.focus();
    };

    if (a11yCloseButton) a11yCloseButton.addEventListener('click', closeA11y);

    // Close on Escape
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && !a11yPanel.classList.contains('translate-x-full')) {
        closeA11y();
      }
    });
  }

  // Announcement Bar
  const closeAnnouncementBtn = document.getElementById("close-announcement");
  const announcementBar = document.getElementById("announcement-bar");
  if (closeAnnouncementBtn && announcementBar) {
    closeAnnouncementBtn.addEventListener("click", function () {
      announcementBar.style.display = "none";
      // Optional: Save to session storage so it doesn't pop up again this session
      try { sessionStorage.setItem('hl_announcement_dismissed', 'true'); } catch (e) { }
    });
  }

  // --- ACCESSIBILITY SETTINGS CONTROLS ---
  function updateFontButtonUI(selectedFont) {
    const fontSelectors = document.querySelectorAll('.font-selector');
    fontSelectors.forEach(btn => {
      const selectedFontName = selectedFont.replace(/"/g, '');
      const btnFontName = btn.dataset.font.replace(/"/g, '');
      if (btnFontName === selectedFontName) {
        btn.classList.add('bg-primary', 'text-white', 'border-primary');
        btn.classList.remove('bg-white', 'text-gray-800', 'dark:bg-gray-700', 'dark:text-white');
      } else {
        btn.classList.remove('bg-primary', 'text-white', 'border-primary');
        btn.classList.add('bg-white', 'text-gray-800', 'dark:bg-gray-700', 'dark:text-white');
      }
    });
  }

  // Theme Buttons
  document.getElementById('theme-light')?.addEventListener('click', () => saveSettings({ ...currentSettings, theme: 'light' }));
  document.getElementById('theme-dark')?.addEventListener('click', () => saveSettings({ ...currentSettings, theme: 'dark' }));
  document.getElementById('theme-contrast')?.addEventListener('click', () => saveSettings({ ...currentSettings, theme: 'high-contrast' }));

  // Font Selection
  const fontButtonsContainer = document.getElementById('font-selection-buttons');
  if (fontButtonsContainer) {
    // Init UI
    updateFontButtonUI(currentSettings.fontFamily || 'Inter');
    fontButtonsContainer.querySelectorAll('.font-selector').forEach(button => {
      button.addEventListener('click', (e) => {
        const newFont = e.currentTarget.dataset.font;
        saveSettings({ ...currentSettings, fontFamily: newFont });
        updateFontButtonUI(newFont);
      });
    });
  }

  // Reduced Motion
  const motionToggle = document.getElementById('toggle-reduced-motion');
  if (motionToggle) {
    motionToggle.checked = currentSettings.reducedMotion;
    motionToggle.addEventListener('change', (e) => {
      saveSettings({ ...currentSettings, reducedMotion: e.target.checked });
    });
  }

  // Font Size
  const fontSizeSlider = document.getElementById('font-size-slider');
  const fontSizeValue = document.getElementById('font-size-value');
  if (fontSizeSlider && fontSizeValue) {
    fontSizeSlider.value = currentSettings.fontSize;
    fontSizeValue.textContent = Math.round(currentSettings.fontSize * 100);
    fontSizeSlider.addEventListener('input', (e) => {
      const value = parseFloat(e.target.value);
      fontSizeValue.textContent = Math.round(value * 100);
      document.documentElement.style.setProperty('--site-font-size', `${value}rem`);
    });
    fontSizeSlider.addEventListener('change', (e) => saveSettings({ ...currentSettings, fontSize: parseFloat(e.target.value) }));
  }

  // Line Height
  const lineHeightSlider = document.getElementById('line-height-slider');
  const lineHeightValue = document.getElementById('line-height-value');
  if (lineHeightSlider && lineHeightValue) {
    lineHeightSlider.value = currentSettings.lineHeight;
    lineHeightValue.textContent = currentSettings.lineHeight.toFixed(1);
    lineHeightSlider.addEventListener('input', (e) => {
      const value = parseFloat(e.target.value);
      lineHeightValue.textContent = value.toFixed(1);
      document.documentElement.style.setProperty('--site-line-height', value);
    });
    lineHeightSlider.addEventListener('change', (e) => saveSettings({ ...currentSettings, lineHeight: parseFloat(e.target.value) }));
  }

  // Reading Mask
  const readingMaskToggle = document.getElementById('toggle-reading-mask');
  const readingMask = document.getElementById('reading-mask');
  const readingGuide = document.getElementById('reading-guide');
  let isDragging = false;

  if (readingMaskToggle && readingMask && readingGuide) {
    readingMaskToggle.checked = false;
    readingMaskToggle.addEventListener('change', (e) => {
      if (e.target.checked) readingMask.classList.remove('hidden');
      else readingMask.classList.add('hidden');
    });

    const startDrag = (e) => { isDragging = true; readingGuide.style.cursor = 'grabbing'; e.preventDefault(); };
    const stopDrag = () => { isDragging = false; readingGuide.style.cursor = 'ns-resize'; };
    const dragGuide = (clientY) => {
      if (!isDragging) return;
      let newTop = (clientY / window.innerHeight) * 100;
      newTop = Math.max(10, Math.min(90, newTop));
      readingGuide.style.top = `${newTop}%`;
    };

    readingGuide.addEventListener('mousedown', startDrag);
    document.addEventListener('mousemove', (e) => dragGuide(e.clientY));
    document.addEventListener('mouseup', stopDrag);
    readingGuide.addEventListener('touchstart', (e) => startDrag(e.touches[0]));
    document.addEventListener('touchmove', (e) => dragGuide(e.touches[0].clientY));
    document.addEventListener('touchend', stopDrag);
  }

  // Reset Button
  const resetA11yBtn = document.getElementById('reset-a11y-settings');
  if (resetA11yBtn) {
    resetA11yBtn.addEventListener('click', () => {
      localStorage.removeItem(STORAGE_KEY);
      currentSettings = defaultSettings;
      saveSettings({ ...defaultSettings });
      location.reload();
    });
  }
</script>

</body>

</html>