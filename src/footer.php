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
<button id="scroll-to-top"
  class="fixed bottom-24 right-6 z-40 w-12 h-12 bg-primary text-white rounded-full shadow-xl hover:bg-secondary hover:scale-110 focus:outline-none focus:ring-4 focus:ring-accent transition-all duration-300 transform translate-y-20 opacity-0 flex items-center justify-center print:hidden"
  aria-label="Scroll to top of page">
  <i class="fas fa-arrow-up"></i>
</button>

<!-- Footer -->
<!-- Gradient is now controlled by theme variables -->
<footer
  class="bg-gradient-to-r from-footer-bg-from to-footer-bg-to text-white py-10 px-4 rounded-t-xl shadow-lg transition-colors duration-300 mt-auto">
  <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">
    <!-- About -->
    <div>
      <h3 class="text-lg font-semibold mb-3 flex items-center">
        <i class="fas fa-graduation-cap mr-2" aria-hidden="true"></i> About
      </h3>
      <p class="text-sm opacity-90">
        Empowering students with learning disabilities through personalized
        learning experiences.
        <a href="/mission.php"
          class="text-accent underline hover:text-white ml-1 focus:outline-none focus:ring-2 focus:ring-white">Learn
          more</a>
      </p>
    </div>
    <!-- Quick Links -->
    <div>
      <h3 class="text-lg font-semibold mb-3 flex items-center" id="quick-links-heading">
        <i class="fas fa-link mr-2" aria-hidden="true"></i> Quick Links
      </h3>
      <nav aria-labelledby="quick-links-heading">
        <ul class="space-y-2">
          <li>
            <a href="/curriculum.php"
              class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                class="fas fa-book mr-2" aria-hidden="true"></i>Curriculum</a>
          </li>
          <li>
            <a href="/research"
              class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                class="fas fa-flask mr-2" aria-hidden="true"></i>Research</a>
          </li>
          <li>
            <a href="/standard.php"
              class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                class="fas fa-chart-line mr-2" aria-hidden="true"></i>Standards</a>
          </li>
          <li>
            <a href="/help-center.php"
              class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                class="fas fa-question-circle mr-2" aria-hidden="true"></i>Help Center</a>
          </li>
        </ul>
      </nav>
    </div>
    <!-- Support -->
    <div>
      <h3 class="text-lg font-semibold mb-3 flex items-center" id="support-heading">
        <i class="fas fa-hands-helping mr-2" aria-hidden="true"></i> Support
      </h3>
      <nav aria-labelledby="support-heading">
        <ul class="space-y-2">
          <li>
            <a href="/contact.php"
              class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                class="fas fa-envelope mr-2" aria-hidden="true"></i>Contact Us</a>
          </li>
          <li>
            <a href="/students.php"
              class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                class="fas fa-home mr-2" aria-hidden="true"></i>For Students</a>
          </li>
          <li>
            <a href="/parents.php"
              class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                class="fas fa-users mr-2" aria-hidden="true"></i>For Parents</a>
          </li>
          <li>
            <a href="/teachers.php"
              class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                class="fas fa-chalkboard-teacher mr-2" aria-hidden="true"></i>For Teachers</a>
          </li>
        </ul>
      </nav>
    </div>
    <!-- Legal & Settings -->
    <div>
      <h3 class="text-lg font-semibold mb-3 flex items-center" id="legal-heading">
        <i class="fas fa-balance-scale mr-2" aria-hidden="true"></i> Legal & Settings
      </h3>
      <nav aria-labelledby="legal-heading">
        <ul class="space-y-2">
          <li>
            <a href="/privacy-policy.php"
              class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                class="fas fa-shield-alt mr-2" aria-hidden="true"></i>Privacy Policy</a>
          </li>
          <li>
            <a href="/terms-of-use.php"
              class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                class="fas fa-file-contract mr-2" aria-hidden="true"></i>Terms of Use</a>
          </li>
          <li>
            <a href="/settings.php"
              class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                class="fas fa-universal-access mr-2" aria-hidden="true"></i>Accessibility</a>
          </li>
          <li>
            <a href="/about-us.php"
              class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                class="fas fa-info-circle mr-2" aria-hidden="true"></i>About Us</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <div class="mt-10 border-t border-accent pt-6 text-center text-sm opacity-90">
    <p>
      &copy; <span id="year"><?php echo $currentYear; ?></span> <?php echo isset($pageTitle) ? $pageTitle : "Hesten's Learning"; ?>. All rights reserved.
      <span class="mx-2" aria-hidden="true">|</span>
      Made with <i class="fas fa-heart text-red-400" aria-label="love"></i> for education
    </p>
    <p class="mt-2">
      <a property="dct:title" rel="cc:attributionURL" href="http://hestena62.com"
        class="text-accent underline hover:text-white focus:outline-none focus:ring-2 focus:ring-white rounded">Hesten's
        Learning</a>
      by
      <a rel="cc:attributionURL dct:creator" property="cc:attributionName" href="/about-me.php"
        class="text-accent underline hover:text-white focus:outline-none focus:ring-2 focus:ring-white rounded">Hesten
        Allison</a>
      is licensed under
      <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/?ref=chooser-v1" target="_blank"
        rel="license noopener noreferrer"
        class="text-accent underline hover:text-white focus:outline-none focus:ring-2 focus:ring-white rounded">CC
        BY-NC-SA 4.0</a>
    </p>
    <div class="gtranslate_wrapper mt-4"></div>
    <script>
      window.gtranslateSettings = {
        default_language: "en",
        native_language_names: true,
        detect_browser_language: true,
        wrapper_selector: ".gtranslate_wrapper",
        flag_style: "3d",
        alt_flags: {
          en: "usa"
        },
      };
    </script>
    <script src="https://cdn.gtranslate.net/widgets/latest/popup.js" defer></script>
    <div class="mt-4 flex justify-center items-center gap-4">

      <a href="https://www.buymeacoffee.com/hestena62l"
        class="focus:outline-none focus:ring-2 focus:ring-white rounded">
        <img
          src="https://img.buymeacoffee.com/button-api/?text=Buy me a coffee&emoji=&slug=hestena62&button_colour=BD5FFF&font_colour=ffffff&font_family=Cookie&outline_colour=000000&coffee_colour=FFDD00"
          alt="Buy me a coffee" />
      </a>

    </div>
  </div>


</footer>

<!-- Global Modals (Message & Confirmation) -->
<div id="message-box" class="fixed inset-0 bg-black/75 backdrop-blur-sm hidden items-center justify-center z-[100]"
  role="alertdialog" aria-modal="true" aria-labelledby="message-title">
  <div class="bg-content-bg rounded-xl shadow-2xl p-6 max-w-sm w-full text-center transform scale-100 transition-transform duration-300 border border-gray-200 dark:border-gray-700">
    <h4 id="message-title" class="text-xl font-bold mb-4 text-primary">Notification</h4>
    <p id="message-text" class="mb-6 text-text-default">This is a general message.</p>
    <button id="message-ok-button"
      class="bg-primary text-white px-6 py-2 rounded-lg font-semibold hover:bg-secondary transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-accent">
      OK
    </button>
  </div>
</div>

<div id="confirmation-modal" class="fixed inset-0 bg-black/75 backdrop-blur-sm hidden items-center justify-center z-[100]"
  role="dialog" aria-modal="true" aria-labelledby="confirmation-title">
  <div class="bg-content-bg rounded-xl shadow-2xl p-6 max-w-sm w-full text-center transform scale-100 transition-transform duration-300 border border-gray-200 dark:border-gray-700">
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
        scrollTopBtn.classList.remove("translate-y-20", "opacity-0");
      } else {
        scrollTopBtn.classList.add("translate-y-20", "opacity-0");
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

    const handleFocusTrap = function(e) {
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

  window.showMessageBox = function(message) {
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

  window.showConfirmationModal = function(message, onConfirm) {
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
    navToggle.addEventListener("click", function() {
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
    closeAnnouncementBtn.addEventListener("click", function() {
      announcementBar.style.display = "none";
      // Optional: Save to session storage so it doesn't pop up again this session
      try { sessionStorage.setItem('hl_announcement_dismissed', 'true'); } catch(e){}
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
  document.getElementById('theme-light')?.addEventListener('click', () => saveSettings({...currentSettings, theme: 'light'}));
  document.getElementById('theme-dark')?.addEventListener('click', () => saveSettings({...currentSettings, theme: 'dark'}));
  document.getElementById('theme-contrast')?.addEventListener('click', () => saveSettings({...currentSettings, theme: 'high-contrast'}));

  // Font Selection
  const fontButtonsContainer = document.getElementById('font-selection-buttons');
  if (fontButtonsContainer) {
    // Init UI
    updateFontButtonUI(currentSettings.fontFamily || 'Inter');
    fontButtonsContainer.querySelectorAll('.font-selector').forEach(button => {
      button.addEventListener('click', (e) => {
        const newFont = e.currentTarget.dataset.font;
        saveSettings({...currentSettings, fontFamily: newFont});
        updateFontButtonUI(newFont);
      });
    });
  }

  // Reduced Motion
  const motionToggle = document.getElementById('toggle-reduced-motion');
  if (motionToggle) {
    motionToggle.checked = currentSettings.reducedMotion;
    motionToggle.addEventListener('change', (e) => {
      saveSettings({...currentSettings, reducedMotion: e.target.checked});
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
    fontSizeSlider.addEventListener('change', (e) => saveSettings({...currentSettings, fontSize: parseFloat(e.target.value)}));
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
    lineHeightSlider.addEventListener('change', (e) => saveSettings({...currentSettings, lineHeight: parseFloat(e.target.value)}));
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
      saveSettings({...defaultSettings});
      location.reload(); 
    });
  }
</script>

</body>
</html>