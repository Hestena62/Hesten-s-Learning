<!--
  Reusable Footer File (footer.php)
  Contains: Footer, Modals, and closing </body> and </html> tags
-->
<?php
// Define variables that are only used in the footer
$currentYear = date("Y");
?>
<!-- FULL FOOTER -->
<footer
  class="mt-auto bg-slate-900 text-slate-300 relative overflow-hidden font-sans border-t border-slate-800/50 w-full">
  <!-- Decoration -->
  <div
    class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 shadow-[0_0_20px_rgba(79,70,229,0.5)]">
  </div>
  <div
    class="absolute -top-[400px] -right-[400px] w-[800px] h-[800px] bg-blue-600/10 rounded-full blur-[100px] pointer-events-none overflow-hidden">
  </div>

  <div class="container mx-auto px-6 py-16 relative z-10">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
      <!-- Column 1: About -->
      <div class="space-y-6">
        <h4
          class="text-white font-bold text-lg mb-6 flex items-center gap-2 uppercase tracking-wide text-sm opacity-90">
          <i class="fas fa-graduation-cap text-blue-500"></i> About
        </h4>
        <div class="flex items-center gap-3 group">
          <div
            class="w-10 h-10 bg-gradient-to-br from-blue-600 to-purple-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-900/20 group-hover:rotate-6 transition-transform duration-300">
            <span class="text-white font-bold text-xl font-serif">H</span>
          </div>
          <div class="flex flex-col">
            <span
              class="text-lg font-bold text-white tracking-tight leading-none group-hover:text-blue-400 transition-colors">Hesten's
              Learning</span>
            <span class="text-[10px] text-slate-500 uppercase tracking-widest font-semibold mt-1">Education for
              All</span>
          </div>
        </div>
        <p class="text-slate-400 leading-relaxed text-sm">
          Empowering students with learning disabilities through
          personalized learning experiences.
          <a href="#"
            class="text-blue-400 hover:text-blue-300 underline decoration-blue-500/30 hover:decoration-blue-300">Learn
            more</a>
        </p>
      </div>

      <!-- Column 2: Quick Links -->
      <div>
        <h4
          class="text-white font-bold text-lg mb-6 flex items-center gap-2 uppercase tracking-wide text-sm opacity-90">
          <i class="fas fa-link text-teal-500"></i> Quick Links
        </h4>
        <ul class="space-y-4 text-sm font-medium">
          <li>
            <a href="/curriculum.php"
              class="text-slate-400 hover:text-teal-400 transition-colors flex items-center gap-3 group"><i
                class="fas fa-book text-slate-600 group-hover:text-teal-500 transition-colors"></i>
              Curriculum</a>
          </li>
          <li>
            <a href="/research"
              class="text-slate-400 hover:text-teal-400 transition-colors flex items-center gap-3 group"><i
                class="fas fa-flask text-slate-600 group-hover:text-teal-500 transition-colors"></i>
              Research</a>
          </li>
          <li>
            <a href="/library"
              class="text-slate-400 hover:text-teal-400 transition-colors flex items-center gap-3 group"><i
                class="fas fa-book-open text-slate-600 group-hover:text-teal-500 transition-colors"></i>
              Library</a>
          </li>
          <li>
            <a href="/help-center.php"
              class="text-slate-400 hover:text-teal-400 transition-colors flex items-center gap-3 group"><i
                class="fas fa-question-circle text-slate-600 group-hover:text-teal-500 transition-colors"></i>
              Help Center</a>
          </li>
        </ul>
      </div>

      <!-- Column 3: Support -->
      <div>
        <h4
          class="text-white font-bold text-lg mb-6 flex items-center gap-2 uppercase tracking-wide text-sm opacity-90">
          <i class="fas fa-hand-holding-heart text-purple-500"></i> Support
        </h4>
        <ul class="space-y-4 text-sm font-medium">
          <li>
            <a href="/contact.php"
              class="text-slate-400 hover:text-purple-400 transition-colors flex items-center gap-3 group"><i
                class="fas fa-envelope text-slate-600 group-hover:text-purple-500 transition-colors"></i>
              Contact Us</a>
          </li>
          <li>
            <a href="/students.php"
              class="text-slate-400 hover:text-purple-400 transition-colors flex items-center gap-3 group"><i
                class="fas fa-home text-slate-600 group-hover:text-purple-500 transition-colors"></i>
              For Students</a>
          </li>
          <li>
            <a href="/parents.php"
              class="text-slate-400 hover:text-purple-400 transition-colors flex items-center gap-3 group"><i
                class="fas fa-users text-slate-600 group-hover:text-purple-500 transition-colors"></i>
              For Parents</a>
          </li>
          <li>
            <a href="/teachers.php"
              class="text-slate-400 hover:text-purple-400 transition-colors flex items-center gap-3 group"><i
                class="fas fa-chalkboard-teacher text-slate-600 group-hover:text-purple-500 transition-colors"></i>
              For Teachers</a>
          </li>
        </ul>
      </div>

      <!-- Column 4: Legal -->
      <div>
        <h4
          class="text-white font-bold text-lg mb-6 flex items-center gap-2 uppercase tracking-wide text-sm opacity-90">
          <i class="fas fa-balance-scale text-rose-500"></i> Legal &
          Settings
        </h4>
        <ul class="space-y-4 text-sm font-medium">
          <li>
            <a href="/privacy-policy.php"
              class="text-slate-400 hover:text-rose-400 transition-colors flex items-center gap-3 group"><i
                class="fas fa-shield-alt text-slate-600 group-hover:text-rose-500 transition-colors"></i>
              Privacy Policy</a>
          </li>
          <li>
            <a href="/terms-of-use.php"
              class="text-slate-400 hover:text-rose-400 transition-colors flex items-center gap-3 group"><i
                class="fas fa-file-contract text-slate-600 group-hover:text-rose-500 transition-colors"></i>
              Terms of Use</a>
          </li>
          <li>
            <a href="/settings.php"
              class="text-slate-400 hover:text-rose-400 transition-colors flex items-center gap-3 group"><i
                class="fas fa-universal-access text-slate-600 group-hover:text-rose-500 transition-colors"></i>
              Accessibility</a>
          </li>
          <li>
            <a href="/about.php"
              class="text-slate-400 hover:text-rose-400 transition-colors flex items-center gap-3 group"><i
                class="fas fa-info-circle text-slate-600 group-hover:text-rose-500 transition-colors"></i>
              About Us</a>
          </li>
        </ul>
      </div>
    </div>

    <div class="h-px bg-gradient-to-r from-transparent via-slate-700 to-transparent my-10"></div>

    <div class="flex flex-col md:flex-row justify-between items-center gap-6 text-sm text-slate-500">
      <div class="text-center md:text-left space-y-2">
        <p>
          &copy; <span id="year">2025</span>
          <span class="text-slate-300 font-semibold">Hesten's Learning</span>. All rights reserved. | Made with
          <i class="fas fa-heart text-red-500 animate-pulse mx-1"></i> for
          education
        </p>
        <p class="text-xs">
          <a href="#" class="text-slate-400 hover:text-white transition-colors">Hesten's Learning</a>
          by
          <a href="/about-me.php" class="text-slate-400 hover:text-white transition-colors">Hesten Allison</a>
          is licensed under
          <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/?ref=chooser-v1" target="_blank"
            rel="license noopener noreferrer"
            class="inline-flex items-center gap-1 text-slate-400 hover:text-white transition-colors underline decoration-slate-600 hover:decoration-white underline-offset-2">
            CC BY-NC-SA 4.0
            <img style="
                    height: 16px !important;
                    margin-left: 3px;
                    vertical-align: text-bottom;
                  " src="https://mirrors.creativecommons.org/presskit/icons/cc.svg?ref=chooser-v1" alt="" />
            <img style="
                    height: 16px !important;
                    margin-left: 3px;
                    vertical-align: text-bottom;
                  " src="https://mirrors.creativecommons.org/presskit/icons/by.svg?ref=chooser-v1" alt="" />
            <img style="
                    height: 16px !important;
                    margin-left: 3px;
                    vertical-align: text-bottom;
                  " src="https://mirrors.creativecommons.org/presskit/icons/nc.svg?ref=chooser-v1" alt="" />
            <img style="
                    height: 16px !important;
                    margin-left: 3px;
                    vertical-align: text-bottom;
                  " src="https://mirrors.creativecommons.org/presskit/icons/sa.svg?ref=chooser-v1" alt="" />
          </a>
        </p>
      </div>

      <div class="flex flex-wrap justify-center items-center gap-6">
        <div class="gtranslate_wrapper"></div>
        <a href="https://www.buymeacoffee.com/hestena62l" target="_blank" rel="noopener noreferrer"
          class="group relative inline-flex items-center gap-2 bg-[#FFDD00] text-black px-5 py-2.5 rounded-full font-bold font-['Cookie',cursive] text-lg hover:bg-[#ffe44d] transition-all shadow-lg hover:shadow-[#FFDD00]/30 transform hover:-translate-y-1 font-handwriting">
          <img src="https://cdn.buymeacoffee.com/buttons/bmc-new-btn-logo.svg" alt="" class="h-5 w-5" loading="lazy" />
          <span>Buy me a coffee</span>
        </a>
      </div>
    </div>
  </div>
</footer>



<!-- REPLACED MODALS with new theme-aware and focus-trapping versions -->

<!-- Message Box Modal -->
<div id="message-box" class="fixed inset-0 bg-black bg-opacity-75 hidden items-center justify-center z-[100]"
  role="alertdialog" aria-modal="true" aria-labelledby="message-title">
  <!-- bg-content-bg makes this theme-aware -->
  <div
    class="bg-content-bg rounded-xl shadow-2xl p-6 max-w-sm w-full text-center transform scale-100 transition-transform duration-300">
    <h4 id="message-title" class="text-xl font-bold mb-4 text-primary">Notification</h4>
    <p id="message-text" class="mb-6 text-text-default">This is a general message.</p>
    <button id="message-ok-button"
      class="bg-primary text-white px-6 py-2 rounded-lg font-semibold hover:bg-secondary transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-accent">
      OK
    </button>
  </div>
</div>

<!-- Confirmation Modal -->
<div id="confirmation-modal" class="fixed inset-0 bg-black bg-opacity-75 hidden items-center justify-center z-[100]"
  role="dialog" aria-modal="true" aria-labelledby="confirmation-title">
  <!-- bg-content-bg makes this theme-aware -->
  <div
    class="bg-content-bg rounded-xl shadow-2xl p-6 max-w-sm w-full text-center transform scale-100 transition-transform duration-300">
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

<!-- REPLACED SCRIPT with new comprehensive script -->
<script>
  // --- GLOBAL MODAL FUNCTIONS (New versions with focus trap) ---
  const messageBox = document.getElementById("message-box");
  const messageText = document.getElementById("message-text");
  const messageOkButton = document.getElementById("message-ok-button");
  const confirmationModal = document.getElementById("confirmation-modal");
  const confirmationText = document.getElementById("confirmation-text");
  const confirmYesButton = document.getElementById("confirm-yes-button");
  const confirmNoButton = document.getElementById("confirm-no-button");

  // Helper to manage focus for accessibility when modals are open
  let lastFocusedElement = null;

  // A11Y: Function to handle focus trap in modals
  // [FIX] Updated function to properly add/remove its event listener
  function trapFocus(modalElement) {
    const focusableElements = modalElement.querySelectorAll(
      'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
    );
    if (focusableElements.length === 0) return;

    const firstFocusableElement = focusableElements[0];
    const lastFocusableElement = focusableElements[focusableElements.length - 1];

    // [FIX] Define a named handler to add/remove
    const handleFocusTrap = function (e) {
      if (e.key !== 'Tab') {
        return;
      }

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

    // [FIX] Store the handler on the element so we can remove it later
    modalElement._handleFocusTrap = handleFocusTrap;
    modalElement.addEventListener('keydown', modalElement._handleFocusTrap);

    // Focus the first element
    firstFocusableElement.focus();
  }

  // [FIX] Helper to remove the focus trap listener
  function removeTrapFocus(modalElement) {
    if (modalElement && modalElement._handleFocusTrap) {
      modalElement.removeEventListener('keydown', modalElement._handleFocusTrap);
      delete modalElement._handleFocusTrap;
    }
  }


  function showMessageBox(message) {
    if (!messageBox || !messageText || !messageOkButton) return;

    lastFocusedElement = document.activeElement; // Store focus
    messageText.textContent = message;
    messageBox.classList.remove("hidden");
    messageBox.style.display = 'flex';

    // A11Y: Focus the OK button and trap focus
    trapFocus(messageBox);

    messageOkButton.onclick = () => {
      messageBox.classList.add("hidden");
      messageBox.style.display = 'none';
      removeTrapFocus(messageBox); // [FIX] Remove listener
      if (lastFocusedElement) lastFocusedElement.focus(); // Restore focus
    };
  }

  function showConfirmationModal(message, onConfirm) {
    if (!confirmationModal || !confirmationText || !confirmYesButton || !confirmNoButton) return;

    lastFocusedElement = document.activeElement; // Store focus
    confirmationText.textContent = message;
    confirmationModal.classList.remove("hidden");
    confirmationModal.style.display = 'flex';

    // A11Y: Focus the "No" button by default and trap focus
    trapFocus(confirmationModal);
    if (confirmNoButton) confirmNoButton.focus();

    const handleConfirmation = (result) => {
      confirmationModal.classList.add("hidden");
      confirmationModal.style.display = 'none';
      removeTrapFocus(confirmationModal); // [FIX] Remove listener
      if (lastFocusedElement) lastFocusedElement.focus(); // Restore focus
      onConfirm(result);
    };

    confirmYesButton.onclick = () => handleConfirmation(true);
    confirmNoButton.onclick = () => handleConfirmation(false);
  }

  // --- UI Interactions (Navigation, Dropdown, Announcement) ---

  // Mobile Navigation Toggle
  const navToggle = document.getElementById("nav-toggle");
  const navContent = document.getElementById("nav-content");

  if (navToggle && navContent) {
    navToggle.addEventListener("click", function () {
      const isHidden = navContent.classList.toggle("hidden");
      this.setAttribute('aria-expanded', isHidden ? 'false' : 'true');
      navContent.setAttribute('aria-hidden', isHidden ? 'true' : 'false');
    });
  }

  // Profile Dropdown Toggle
  const profileMenuButton = document.getElementById("profile-menu-button");
  const profileDropdown = document.getElementById("profile-dropdown");

  if (profileMenuButton && profileDropdown) {
    profileMenuButton.addEventListener("click", function (event) {
      event.stopPropagation();
      const isHidden = profileDropdown.classList.toggle("hidden");
      this.setAttribute('aria-expanded', isHidden ? 'false' : 'true');
    });
  }

  document.addEventListener("click", function (event) {
    if (profileMenuButton && profileDropdown && !profileMenuButton.contains(event.target) && !profileDropdown.contains(event.target)) {
      profileDropdown.classList.add("hidden");
      profileMenuButton.setAttribute('aria-expanded', 'false');
    }
  });

  // Announcement Bar Close
  const closeAnnouncementBtn = document.getElementById("close-announcement");
  const announcementBar = document.getElementById("announcement-bar");
  if (closeAnnouncementBtn && announcementBar) {
    closeAnnouncementBtn.addEventListener("click", function () {
      announcementBar.style.display = "none";
    });
  }


  // --- ADVANCED ACCESSIBILITY PANEL LOGIC ---

  const a11yPanel = document.getElementById('a11y-settings-panel');
  const a11yToggleButton = document.getElementById('a11y-toggle-button');
  const a11yCloseButton = document.getElementById('a11y-close-button');

  if (a11yPanel && a11yToggleButton && a11yCloseButton) {
    // Panel open/close
    a11yToggleButton.addEventListener('click', () => {
      a11yPanel.classList.remove('translate-x-full');
      a11yPanel.setAttribute('aria-hidden', 'false');
      trapFocus(a11yPanel);
    });

    a11yCloseButton.addEventListener('click', () => {
      a11yPanel.classList.add('translate-x-full');
      a11yPanel.setAttribute('aria-hidden', 'true');
      removeTrapFocus(a11yPanel); // [FIX] Remove listener
      a11yToggleButton.focus();
    });

    // Close on escape key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && !a11yPanel.classList.contains('translate-x-full')) {
        a11yPanel.classList.add('translate-x-full');
        a11yPanel.setAttribute('aria-hidden', 'true');
        removeTrapFocus(a11yPanel); // [FIX] Remove listener
        a11yToggleButton.focus();
      }
    });
  }


  // --- ACCESSIBILITY SETTINGS CONTROLS ---

  // Function to apply active style to the selected font button
  function updateFontButtonUI(selectedFont) {
    const fontSelectors = document.querySelectorAll('.font-selector');
    fontSelectors.forEach(btn => {
      // Use the font family string from settings, which might contain quotes
      const selectedFontName = selectedFont.replace(/"/g, '');
      if (btn.dataset.font.replace(/"/g, '') === selectedFontName) {
        btn.classList.add('bg-primary', 'text-white', 'border-primary');
        btn.classList.remove('bg-white', 'text-gray-800', 'dark:bg-gray-700', 'dark:text-white', 'hover:bg-gray-100', 'dark:hover:bg-gray-600');
      } else {
        btn.classList.remove('bg-primary', 'text-white', 'border-primary');
        btn.classList.add('bg-white', 'text-gray-800', 'dark:bg-gray-700', 'dark:text-white', 'hover:bg-gray-100', 'dark:hover:bg-gray-600');
      }
    });
  }

  // Theme Buttons
  document.getElementById('theme-light')?.addEventListener('click', () => saveSettings({ ...currentSettings, theme: 'light' }));
  document.getElementById('theme-dark')?.addEventListener('click', () => saveSettings({ ...currentSettings, theme: 'dark' }));
  document.getElementById('theme-contrast')?.addEventListener('click', () => saveSettings({ ...currentSettings, theme: 'high-contrast' }));

  // Font Selection Logic
  const fontButtonsContainer = document.getElementById('font-selection-buttons');
  if (fontButtonsContainer) {
    // Initialize UI on load
    // currentSettings.fontFamily will be either 'Inter', 'Open Dyslexic', or 'Roboto Mono'
    // If currentSettings.fontFamily is not present (e.g., old settings), default to 'Inter'
    updateFontButtonUI(currentSettings.fontFamily || 'Inter');

    fontButtonsContainer.querySelectorAll('.font-selector').forEach(button => {
      button.addEventListener('click', (e) => {
        const newFont = e.target.dataset.font;
        // Save font family. Note: we save the clean string, the header applies quotes if necessary.
        saveSettings({ ...currentSettings, fontFamily: newFont });
        // Update buttons visually
        updateFontButtonUI(newFont);
      });
    });
  }

  // --- REMOVED: Dyslexia Font Toggle logic ---
  // The previous dyslexiaToggle element and its listener are removed.

  // Reduced Motion Toggle
  const motionToggle = document.getElementById('toggle-reduced-motion');
  if (motionToggle) {
    motionToggle.checked = currentSettings.reducedMotion;
    motionToggle.setAttribute('aria-checked', currentSettings.reducedMotion);
    motionToggle.addEventListener('change', (e) => {
      e.target.setAttribute('aria-checked', e.target.checked);
      saveSettings({ ...currentSettings, reducedMotion: e.target.checked });
    });
  }

  // Font Size Slider
  const fontSizeSlider = document.getElementById('font-size-slider');
  const fontSizeValue = document.getElementById('font-size-value');
  if (fontSizeSlider && fontSizeValue) {
    fontSizeSlider.value = currentSettings.fontSize;
    fontSizeValue.textContent = Math.round(currentSettings.fontSize * 100);

    fontSizeSlider.addEventListener('input', (e) => {
      const value = parseFloat(e.target.value);
      fontSizeValue.textContent = Math.round(value * 100);
      // Apply immediately for visual feedback
      document.documentElement.style.setProperty('--site-font-size', `${value}rem`);
    });
    // Save on release
    fontSizeSlider.addEventListener('change', (e) => {
      saveSettings({ ...currentSettings, fontSize: parseFloat(e.target.value) });
    });
  }

  // Line Height Slider
  const lineHeightSlider = document.getElementById('line-height-slider');
  const lineHeightValue = document.getElementById('line-height-value');
  if (lineHeightSlider && lineHeightValue) {
    lineHeightSlider.value = currentSettings.lineHeight;
    lineHeightValue.textContent = currentSettings.lineHeight.toFixed(1);

    lineHeightSlider.addEventListener('input', (e) => {
      const value = parseFloat(e.target.value);
      lineHeightValue.textContent = value.toFixed(1);
      // Apply immediately for visual feedback
      document.documentElement.style.setProperty('--site-line-height', value);
    });
    // Save on release
    lineHeightSlider.addEventListener('change', (e) => {
      saveSettings({ ...currentSettings, lineHeight: parseFloat(e.target.value) });
    });
  }

  // Reading Mask Logic
  const readingMaskToggle = document.getElementById('toggle-reading-mask');
  const readingMask = document.getElementById('reading-mask');
  const readingGuide = document.getElementById('reading-guide');
  let isDragging = false;

  if (readingMaskToggle && readingMask && readingGuide) {
    readingMaskToggle.checked = false; // Mask is not persistent across sessions for usability
    readingMaskToggle.setAttribute('aria-checked', 'false');

    readingMaskToggle.addEventListener('change', (e) => {
      e.target.setAttribute('aria-checked', e.target.checked);
      if (e.target.checked) {
        readingMask.classList.remove('hidden');
      } else {
        readingMask.classList.add('hidden');
      }
    });

    // Draggable reading guide logic (Touch and Mouse)
    const startDrag = (e) => {
      isDragging = true;
      readingGuide.style.cursor = 'grabbing';
      e.preventDefault();
    };

    const dragGuide = (clientY) => {
      if (!isDragging) return;
      // Calculate new top percentage based on mouse/touch position
      let newTop = (clientY / window.innerHeight) * 100;
      // Clamp value to prevent dragging outside of visible area (10% to 90%)
      newTop = Math.max(10, Math.min(90, newTop));
      readingGuide.style.top = `${newTop}%`;
    };

    const stopDrag = () => {
      isDragging = false;
      readingGuide.style.cursor = 'pointer';
    };

    // Mouse Events
    readingGuide.addEventListener('mousedown', startDrag);
    document.addEventListener('mousemove', (e) => dragGuide(e.clientY));
    document.addEventListener('mouseup', stopDrag);

    // Touch Events
    readingGuide.addEventListener('touchstart', (e) => startDrag(e.touches[0]));
    document.addEventListener('touchmove', (e) => dragGuide(e.touches[0].clientY));
    document.addEventListener('touchend', stopDrag);
  }

  // Reset Button
  const resetA11yBtn = document.getElementById('reset-a11y-settings');
  if (resetA11yBtn) {
    resetA11yBtn.addEventListener('click', () => {
      localStorage.removeItem(STORAGE_KEY);

      // NOTE: We MUST reload the settings after clearing, as 'currentSettings' is now stale
      // Assuming defaultSettings in header.php now uses 'fontFamily: "Inter"'
      currentSettings = defaultSettings; // Reset the live state
      saveSettings({ ...defaultSettings }); // Save and apply defaults

      // Update UI elements to reflect reset
      if (fontSizeSlider) fontSizeSlider.value = defaultSettings.fontSize;
      if (fontSizeValue) fontSizeValue.textContent = Math.round(defaultSettings.fontSize * 100);
      if (lineHeightSlider) lineHeightSlider.value = defaultSettings.lineHeight;
      if (lineHeightValue) lineHeightValue.textContent = defaultSettings.lineHeight.toFixed(1);

      // Update font selection UI
      updateFontButtonUI(defaultSettings.fontFamily || 'Inter');

      if (motionToggle) {
        motionToggle.checked = defaultSettings.reducedMotion;
        motionToggle.setAttribute('aria-checked', defaultSettings.reducedMotion);
      }

      // Force reset of non-persistent mask
      if (readingMaskToggle) {
        readingMaskToggle.checked = false;
        readingMaskToggle.setAttribute('aria-checked', 'false');
      }
      if (readingMask) readingMask.classList.add('hidden');

      showMessageBox("Settings have been reset to default values.");
    });
  }

</script>

</body>

</html>