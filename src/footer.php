<!--
  Reusable Footer File (footer.php)
  Contains: Footer, Modals, and closing </body> and </html> tags
-->
<?php
  // Define variables that are only used in the footer
  $currentYear = date("Y"); 
?>
  <!-- Footer -->
  <!-- Gradient is now controlled by theme variables -->
  <footer
    class="bg-gradient-to-r from-footer-bg-from to-footer-bg-to text-white py-10 px-4 rounded-t-xl shadow-lg transition-colors duration-300">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">
      <!-- About -->
      <div>
        <h3 class="text-lg font-semibold mb-3 flex items-center">
          <i class="fas fa-graduation-cap mr-2" aria-hidden="true"></i> About
        </h3>
        <p class="text-sm opacity-90">
          Empowering students with learning disabilities through personalized
          learning experiences.
          <a href="/about.html"
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
              <a href="/curriculum"
                class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                  class="fas fa-book mr-2" aria-hidden="true"></i>Curriculum</a>
            </li>
            <li>
              <a href="/research/index.html"
                class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                  class="fas fa-flask mr-2" aria-hidden="true"></i>Research</a>
            </li>
            <li>
              <a href="/standard"
                class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                  class="fas fa-chart-line mr-2" aria-hidden="true"></i>Standards</a>
            </li>
            <li>
              <a href="/help"
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
              <a href="/contact.html"
                class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                  class="fas fa-envelope mr-2" aria-hidden="true"></i>Contact Us</a>
            </li>
            <li>
              <a href="/students.html"
                class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                  class="fas fa-home mr-2" aria-hidden="true"></i>For Students</a>
            </li>
            <li>
              <a href="/parents.html"
                class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                  class="fas fa-users mr-2" aria-hidden="true"></i>For Parents</a>
            </li>
            <li>
              <a href="/teachers.html"
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
              <a href="/privacy.html"
                class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                  class="fas fa-shield-alt mr-2" aria-hidden="true"></i>Privacy Policy</a>
            </li>
            <li>
              <a href="/terms.html"
                class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                  class="fas fa-file-contract mr-2" aria-hidden="true"></i>Terms of Use</a>
            </li>
            <li>
              <a href="/accessibility.html"
                class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                  class="fas fa-universal-access mr-2" aria-hidden="true"></i>Accessibility</a>
            </li>
            <li>
              <a href="/about-us.html"
                class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                  class="fas fa-info-circle mr-2" aria-hidden="true"></i>About Us</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="mt-10 border-t border-accent pt-6 text-center text-sm opacity-90">
      <p>
        &copy; <span id="year"><?php echo $currentYear; ?></span> <?php echo $pageTitle; ?>. All rights reserved.
        <span class="mx-2" aria-hidden="true">|</span>
        Made with <i class="fas fa-heart text-red-400" aria-label="love"></i> for education
      </p>
      <p class="mt-2">
        <a property="dct:title" rel="cc:attributionURL" href="http://hestena62.com"
          class="text-accent underline hover:text-white focus:outline-none focus:ring-2 focus:ring-white rounded">Hesten's
          Learning</a>
        by
        <a rel="cc:attributionURL dct:creator" property="cc:attributionName" href="http://hestena62.com/about-me.html"
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
          alt_flags: { en: "usa" },
        };
      </script>
      <script src="https://cdn.gtranslate.net/widgets/latest/popup.js" defer></script>
      <div class="mt-4 flex justify-center items-center gap-4">
        <a href="#"
          onclick="window.open('https://www.sitelock.com/verify.php?site=hestena62.com','SiteLock','width=600,height=600,left=160,top=170');"
          title="SiteLock" class="focus:outline-none focus:ring-2 focus:ring-white rounded">
          <img alt="SiteLock" src="https://shield.sitelock.com/shield/hestena62.com"
            class="h-8 w-auto rounded shadow" />
        </a>

        <a href="https://www.buymeacoffee.com/hestena62"
          class="focus:outline-none focus:ring-2 focus:ring-white rounded">
          <img
            src="https://img.buymeacoffee.com/button-api/?text=Buy me a coffee&emoji=&slug=hestena62&button_colour=BD5FFF&font_colour=ffffff&font_family=Cookie&outline_colour=000000&coffee_colour=FFDD00"
            alt="Buy me a coffee" />
        </a>

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

    // Note: currentSettings is already loaded and applied by this point.
    // We just need to initialize the controls to match.

    // Theme Buttons
    document.getElementById('theme-light')?.addEventListener('click', () => saveSettings({ ...currentSettings, theme: 'light' }));
    document.getElementById('theme-dark')?.addEventListener('click', () => saveSettings({ ...currentSettings, theme: 'dark' }));
    document.getElementById('theme-contrast')?.addEventListener('click', () => saveSettings({ ...currentSettings, theme: 'high-contrast' }));

    // Dyslexia Font Toggle
    const dyslexiaToggle = document.getElementById('toggle-dyslexia');
    if (dyslexiaToggle) {
      dyslexiaToggle.checked = currentSettings.dyslexiaFont;
      dyslexiaToggle.setAttribute('aria-checked', currentSettings.dyslexiaFont);
      dyslexiaToggle.addEventListener('change', (e) => {
        e.target.setAttribute('aria-checked', e.target.checked);
        saveSettings({ ...currentSettings, dyslexiaFont: e.target.checked });
      });
    }

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
        // [FIX] Use the defaultSettings object, not a new literal
        saveSettings({ ...defaultSettings }); // Save and apply defaults

        // Update UI elements to reflect reset
        if (fontSizeSlider) fontSizeSlider.value = defaultSettings.fontSize;
        if (fontSizeValue) fontSizeValue.textContent = Math.round(defaultSettings.fontSize * 100);
        if (lineHeightSlider) lineHeightSlider.value = defaultSettings.lineHeight;
        if (lineHeightValue) lineHeightValue.textContent = defaultSettings.lineHeight.toFixed(1);
        if (dyslexiaToggle) {
          dyslexiaToggle.checked = defaultSettings.dyslexiaFont;
          dyslexiaToggle.setAttribute('aria-checked', defaultSettings.dyslexiaFont);
        }
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
