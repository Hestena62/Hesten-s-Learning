<!--
  Reusable Footer File (footer.php)
  Refactored to use Bootstrap and custom CSS classes.
-->
<?php
  // Define variables that are only used in the footer
  $currentYear = date("Y"); 
?>
<!-- Footer -->
<footer
  class="bg-gradient-primary text-white py-5 px-4 rounded-top rounded-base shadow-lg transition-colors">
  <div class="container-xl mx-auto">
    <div class="row g-4">
      <!-- About -->
      <div class="col-12 col-md-3">
        <h3 class="fs-5 fw-semibold mb-3 d-flex align-items-center">
          <i class="fas fa-graduation-cap me-2" aria-hidden="true"></i> About
        </h3>
        <p class="small opacity-90">
          Empowering students with learning disabilities through personalized
          learning experiences.
          <a href="/about.php"
            class="text-accent text-decoration-underline hover-white ms-1">Learn
            more</a>
        </p>
      </div>
      <!-- Quick Links -->
      <div class="col-12 col-md-3">
        <h3 class="fs-5 fw-semibold mb-3 d-flex align-items-center" id="quick-links-heading">
          <i class="fas fa-link me-2" aria-hidden="true"></i> Quick Links
        </h3>
        <nav aria-labelledby="quick-links-heading">
          <ul class="list-unstyled space-y-2 small">
            <li>
              <a href="/curriculum.php"
                class="text-white text-decoration-none hover-accent transition rounded-2"><i
                  class="fas fa-book me-2" aria-hidden="true"></i>Curriculum</a>
            </li>
            <li>
              <a href="/research"
                class="text-white text-decoration-none hover-accent transition rounded-2"><i
                  class="fas fa-flask me-2" aria-hidden="true"></i>Research</a>
            </li>
            <li>
              <a href="/library"
                class="text-white text-decoration-none hover-accent transition rounded-2"><i
                  class="fas fa-book me-2" aria-hidden="true"></i>Library</a>
            </li>
            <li>
              <a href="/help.html"
                class="text-white text-decoration-none hover-accent transition rounded-2"><i
                  class="fas fa-question-circle me-2" aria-hidden="true"></i>Help Center</a>
            </li>
          </ul>
        </nav>
      </div>
      <!-- Support -->
      <div class="col-12 col-md-3">
        <h3 class="fs-5 fw-semibold mb-3 d-flex align-items-center" id="support-heading">
          <i class="fas fa-hands-helping me-2" aria-hidden="true"></i> Support
        </h3>
        <nav aria-labelledby="support-heading">
          <ul class="list-unstyled space-y-2 small">
            <li>
              <a href="/contact.html"
                class="text-white text-decoration-none hover-accent transition rounded-2"><i
                  class="fas fa-envelope me-2" aria-hidden="true"></i>Contact Us</a>
            </li>
            <li>
              <a href="/students.php"
                class="text-white text-decoration-none hover-accent transition rounded-2"><i
                  class="fas fa-home me-2" aria-hidden="true"></i>For Students</a>
            </li>
            <li>
              <a href="/parents.php"
                class="text-white text-decoration-none hover-accent transition rounded-2"><i
                  class="fas fa-users me-2" aria-hidden="true"></i>For Parents</a>
            </li>
            <li>
              <a href="#"
                class="text-white text-decoration-none hover-accent transition rounded-2"><i
                  class="fas fa-chalkboard-teacher me-2" aria-hidden="true"></i>For Teachers</a>
            </li>
          </ul>
        </nav>
      </div>
      <!-- Legal & Settings -->
      <div class="col-12 col-md-3">
        <h3 class="fs-5 fw-semibold mb-3 d-flex align-items-center" id="legal-heading">
          <i class="fas fa-balance-scale me-2" aria-hidden="true"></i> Legal & Settings
        </h3>
        <nav aria-labelledby="legal-heading">
          <ul class="list-unstyled space-y-2 small">
            <li>
              <a href="#"
                class="text-white text-decoration-none hover-accent transition rounded-2"><i
                  class="fas fa-shield-alt me-2" aria-hidden="true"></i>Privacy Policy</a>
            </li>
            <li>
              <a href="#"
                class="text-white text-decoration-none hover-accent transition rounded-2"><i
                  class="fas fa-file-contract me-2" aria-hidden="true"></i>Terms of Use</a>
            </li>
            <li>
              <a href="#"
                class="text-white text-decoration-none hover-accent transition rounded-2"><i
                  class="fas fa-universal-access me-2" aria-hidden="true"></i>Accessibility</a>
            </li>
            <li>
              <a href="/about-us.php"
                class="text-white text-decoration-none hover-accent transition rounded-2"><i
                  class="fas fa-info-circle me-2" aria-hidden="true"></i>About Us</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="mt-5 pt-3 border-top border-accent text-center small opacity-90" style="--bs-border-color: var(--color-accent);">
      <p>
        &copy; <span id="year">
          <?php echo $currentYear; ?>
        </span>
        <?php echo $pageTitle; ?>. All rights reserved.
        <span class="mx-2" aria-hidden="true">|</span>
        Made with <i class="fas fa-heart text-danger" aria-label="love"></i> for education
      </p>
      <p class="mt-2">
        <a property="dct:title" rel="cc:attributionURL" href="http://hestena62.com"
          class="text-accent text-decoration-underline hover-white rounded-2">Hesten's
          Learning</a>
        by
        <a rel="cc:attributionURL dct:creator" property="cc:attributionName" href="/about-me.php"
          class="text-accent text-decoration-underline hover-white rounded-2">Hesten
          Allison</a>
        is licensed under
        <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/?ref=chooser-v1" target="_blank"
          rel="license noopener noreferrer"
          class="text-accent text-decoration-underline hover-white rounded-2">CC
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
      <div class="mt-4 d-flex justify-content-center align-items-center gap-3">

        <a href="https://www.buymeacoffee.com/hestena62l"
          class="rounded-2">
          <img
            src="https://img.buymeacoffee.com/button-api/?text=Buy me a coffee&emoji=&slug=hestena62&button_colour=BD5FFF&font_colour=ffffff&font_family=Cookie&outline_colour=000000&coffee_colour=FFDD00"
            alt="Buy me a coffee" />
        </a>

      </div>
    </div>
  </div>


</footer>

<!-- Message Box Modal -->
<div id="message-box" class="modal-dialog modal-dialog-centered position-fixed top-0 start-0 w-100 h-100 bg-black bg-opacity-75 d-none justify-content-center align-items-center z-3"
  role="alertdialog" aria-modal="true" aria-labelledby="message-title">
  <!-- bg-content makes this theme-aware -->
  <div
    class="bg-content rounded-base shadow-lg p-4 max-w-sm w-100 text-center transform scale-100 transition-transform" style="max-width: 350px;">
    <h4 id="message-title" class="fs-5 fw-bold mb-3 text-primary">Notification</h4>
    <p id="message-text" class="mb-4 text-text-default">This is a general message.</p>
    <button id="message-ok-button"
      class="btn btn-primary text-white px-4 py-2 rounded-3 fw-semibold transition-colors"
      style="--bs-btn-bg: var(--color-primary); --bs-btn-hover-bg: var(--color-secondary);">
      OK
    </button>
  </div>
</div>

<!-- Confirmation Modal -->
<div id="confirmation-modal" class="modal-dialog modal-dialog-centered position-fixed top-0 start-0 w-100 h-100 bg-black bg-opacity-75 d-none justify-content-center align-items-center z-3"
  role="dialog" aria-modal="true" aria-labelledby="confirmation-title">
  <!-- bg-content makes this theme-aware -->
  <div
    class="bg-content rounded-base shadow-lg p-4 max-w-sm w-100 text-center transform scale-100 transition-transform" style="max-width: 350px;">
    <h4 id="confirmation-title" class="fs-5 fw-bold mb-3 text-danger">Confirm Action</h4>
    <p id="confirmation-text" class="mb-4 text-text-default">Are you sure you want to proceed?</p>
    <div class="d-flex justify-content-center gap-3">
      <button id="confirm-yes-button"
        class="btn btn-danger text-white px-4 py-2 rounded-3 fw-semibold transition-colors">
        Yes
      </button>
      <button id="confirm-no-button"
        class="btn btn-secondary text-gray-800 px-4 py-2 rounded-3 fw-semibold transition-colors">
        No
      </button>
    </div>
  </div>
</div>

<!-- === Site-wide Script (Vanilla JS) === -->
<!-- Includes Bootstrap's JS bundle for functionality like the Offcanvas and Navbar Toggle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
  crossorigin="anonymous"></script>
<script>
  // Access global settings state from the script in <head>
  // currentSettings, loadSettings, saveSettings, applyHeadSettings, applyBodySettings, THEME_COLORS, STORAGE_KEY are available

  // --- GLOBAL MODAL FUNCTIONS (with focus trap) ---
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
      'button, [href], input:not([type="hidden"]), select, textarea, [tabindex]:not([tabindex="-1"])'
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


  function showMessageBox(message) {
    if (!messageBox || !messageText || !messageOkButton) return;

    lastFocusedElement = document.activeElement;
    messageText.textContent = message;
    messageBox.classList.remove("d-none");
    messageBox.classList.add("d-flex");

    trapFocus(messageBox);

    messageOkButton.onclick = () => {
      messageBox.classList.remove("d-flex");
      messageBox.classList.add("d-none");
      removeTrapFocus(messageBox);
      if (lastFocusedElement) lastFocusedElement.focus();
    };
  }

  function showConfirmationModal(message, onConfirm) {
    if (!confirmationModal || !confirmationText || !confirmYesButton || !confirmNoButton) return;

    lastFocusedElement = document.activeElement;
    confirmationText.textContent = message;
    confirmationModal.classList.remove("d-none");
    confirmationModal.classList.add("d-flex");

    trapFocus(confirmationModal);
    if (confirmNoButton) confirmNoButton.focus();

    const handleConfirmation = (result) => {
      confirmationModal.classList.remove("d-flex");
      confirmationModal.classList.add("d-none");
      removeTrapFocus(confirmationModal);
      if (lastFocusedElement) lastFocusedElement.focus();
      onConfirm(result);
    };

    confirmYesButton.onclick = () => handleConfirmation(true);
    confirmNoButton.onclick = () => handleConfirmation(false);
  }

  // --- UI Interactions (Announcement) ---

  // Announcement Bar Close
  const closeAnnouncementBtn = document.getElementById("close-announcement");
  const announcementBar = document.getElementById("announcement-bar");
  if (closeAnnouncementBtn && announcementBar) {
    closeAnnouncementBtn.addEventListener("click", function () {
      announcementBar.style.display = "none";
    });
  }


  // --- ADVANCED ACCESSIBILITY PANEL LOGIC (Refactored for Bootstrap Offcanvas) ---

  const a11yPanel = document.getElementById('a11y-settings-panel');
  const a11yToggleButton = document.getElementById('a11y-toggle-button');
  
  if (a11yPanel && a11yToggleButton) {
    // Note: We access the Bootstrap object here, which is available after the JS bundle loads.
    // We can't rely on `new bootstrap.Offcanvas(a11yPanel)` before DOMContentLoaded sometimes, 
    // but here it is loaded from the script tag right before this block.
    
    // We use data-bs-toggle/target in HTML for basic toggle, and JS for focus control.
    const offcanvas = new bootstrap.Offcanvas(a11yPanel);

    a11yPanel.addEventListener('shown.bs.offcanvas', () => {
      trapFocus(a11yPanel);
    });

    a11yPanel.addEventListener('hidden.bs.offcanvas', () => {
      removeTrapFocus(a11yPanel);
      a11yToggleButton.focus();
    });
  }


  // --- ACCESSIBILITY SETTINGS CONTROLS ---

  function updateThemeButtonUI(selectedTheme) {
    ['light', 'dark', 'contrast'].forEach(id => {
      const btn = document.getElementById(`theme-${id}`);
      if (!btn) return;
      const themeName = id === 'contrast' ? 'high-contrast' : id;

      if (themeName === selectedTheme) {
        btn.classList.add('btn-primary', 'text-white');
        btn.classList.remove('btn-outline-secondary');
      } else {
        btn.classList.remove('btn-primary', 'text-white');
        btn.classList.add('btn-outline-secondary');
      }
    });
  }

  function updateFontButtonUI(selectedFont) {
    const fontSelectors = document.querySelectorAll('.font-selector');
    fontSelectors.forEach(btn => {
      const selectedFontName = (selectedFont || 'Inter').replace(/"/g, '');
      const btnFontName = btn.dataset.font.replace(/"/g, '');

      if (btnFontName === selectedFontName) {
        btn.classList.add('btn-primary', 'text-white');
        btn.classList.remove('btn-outline-secondary');
      } else {
        btn.classList.remove('btn-primary', 'text-white');
        btn.classList.add('btn-outline-secondary');
      }
    });
  }

  // Theme Buttons
  document.getElementById('theme-light')?.addEventListener('click', () => {
    saveSettings({ ...currentSettings, theme: 'light' });
    updateThemeButtonUI('light');
  });
  document.getElementById('theme-dark')?.addEventListener('click', () => {
    saveSettings({ ...currentSettings, theme: 'dark' });
    updateThemeButtonUI('dark');
  });
  document.getElementById('theme-contrast')?.addEventListener('click', () => {
    saveSettings({ ...currentSettings, theme: 'high-contrast' });
    updateThemeButtonUI('high-contrast');
  });

  // Font Selection Logic
  const fontButtonsContainer = document.getElementById('font-selection-buttons');
  if (fontButtonsContainer) {
    updateFontButtonUI(currentSettings.fontFamily);

    fontButtonsContainer.querySelectorAll('.font-selector').forEach(button => {
      button.addEventListener('click', (e) => {
        const newFont = e.currentTarget.dataset.font;
        saveSettings({ ...currentSettings, fontFamily: newFont });
        updateFontButtonUI(newFont);
      });
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
      document.documentElement.style.setProperty('--site-font-size', `${value}rem`);
    });
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
      document.documentElement.style.setProperty('--site-line-height', value);
    });
    lineHeightSlider.addEventListener('change', (e) => {
      saveSettings({ ...currentSettings, lineHeight: parseFloat(e.target.value) });
    });
  }

  // Letter Spacing Slider
  const letterSpacingSlider = document.getElementById('letter-spacing-slider');
  const letterSpacingValue = document.getElementById('letter-spacing-value');
  if (letterSpacingSlider && letterSpacingValue) {
    letterSpacingSlider.value = currentSettings.letterSpacing;
    letterSpacingValue.textContent = currentSettings.letterSpacing.toFixed(1);

    letterSpacingSlider.addEventListener('input', (e) => {
      const value = parseFloat(e.target.value);
      letterSpacingValue.textContent = value.toFixed(1);
      document.documentElement.style.setProperty('--site-letter-spacing', `${value}px`);
    });
    letterSpacingSlider.addEventListener('change', (e) => {
      saveSettings({ ...currentSettings, letterSpacing: parseFloat(e.target.value) });
    });
  }

  // Word Spacing Slider
  const wordSpacingSlider = document.getElementById('word-spacing-slider');
  const wordSpacingValue = document.getElementById('word-spacing-value');
  if (wordSpacingSlider && wordSpacingValue) {
    wordSpacingSlider.value = currentSettings.wordSpacing;
    wordSpacingValue.textContent = currentSettings.wordSpacing.toFixed(1);

    wordSpacingSlider.addEventListener('input', (e) => {
      const value = parseFloat(e.target.value);
      wordSpacingValue.textContent = value.toFixed(1);
      document.documentElement.style.setProperty('--site-word-spacing', `${value}px`);
    });
    wordSpacingSlider.addEventListener('change', (e) => {
      saveSettings({ ...currentSettings, wordSpacing: parseFloat(e.target.value) });
    });
  }

  // Highlight Links Toggle
  const highlightLinksToggle = document.getElementById('toggle-highlight-links');
  if (highlightLinksToggle) {
    highlightLinksToggle.checked = currentSettings.highlightLinks;
    highlightLinksToggle.setAttribute('aria-checked', currentSettings.highlightLinks);
    highlightLinksToggle.addEventListener('change', (e) => {
      e.target.setAttribute('aria-checked', e.target.checked);
      saveSettings({ ...currentSettings, highlightLinks: e.target.checked });
    });
  }

  // Readable Width Toggle
  const readableWidthToggle = document.getElementById('toggle-readable-width');
  if (readableWidthToggle) {
    readableWidthToggle.checked = currentSettings.readableWidth;
    readableWidthToggle.setAttribute('aria-checked', currentSettings.readableWidth);
    readableWidthToggle.addEventListener('change', (e) => {
      e.target.setAttribute('aria-checked', e.target.checked);
      saveSettings({ ...currentSettings, readableWidth: e.target.checked });
    });
  }


  // Reading Mask Logic
  const readingMaskToggle = document.getElementById('toggle-reading-mask');
  const readingMask = document.getElementById('reading-mask');
  const readingGuide = document.getElementById('reading-guide');
  let isDragging = false;

  if (readingMaskToggle && readingMask && readingGuide) {
    readingMaskToggle.checked = false; // Mask is not persistent
    readingMaskToggle.setAttribute('aria-checked', 'false');

    readingMaskToggle.addEventListener('change', (e) => {
      e.target.setAttribute('aria-checked', e.target.checked);
      if (e.target.checked) {
        readingMask.classList.remove('d-none');
        readingMask.classList.add('d-flex');
      } else {
        readingMask.classList.remove('d-flex');
        readingMask.classList.add('d-none');
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
      let newTop = (clientY / window.innerHeight) * 100;
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

      currentSettings = defaultSettings;
      saveSettings({ ...defaultSettings }); // Save and apply defaults

      // Update UI elements to reflect reset
      if (fontSizeSlider) fontSizeSlider.value = defaultSettings.fontSize;
      if (fontSizeValue) fontSizeValue.textContent = Math.round(defaultSettings.fontSize * 100);

      if (lineHeightSlider) lineHeightSlider.value = defaultSettings.lineHeight;
      if (lineHeightValue) lineHeightValue.textContent = defaultSettings.lineHeight.toFixed(1);

      if (letterSpacingSlider) letterSpacingSlider.value = defaultSettings.letterSpacing;
      if (letterSpacingValue) letterSpacingValue.textContent = defaultSettings.letterSpacing.toFixed(1);

      if (wordSpacingSlider) wordSpacingSlider.value = defaultSettings.wordSpacing;
      if (wordSpacingValue) wordSpacingValue.textContent = defaultSettings.wordSpacing.toFixed(1);

      updateFontButtonUI(defaultSettings.fontFamily);
      updateThemeButtonUI(defaultSettings.theme);

      if (motionToggle) {
        motionToggle.checked = defaultSettings.reducedMotion;
        motionToggle.setAttribute('aria-checked', defaultSettings.reducedMotion);
      }

      if (highlightLinksToggle) {
        highlightLinksToggle.checked = defaultSettings.highlightLinks;
        highlightLinksToggle.setAttribute('aria-checked', defaultSettings.highlightLinks);
      }
      if (readableWidthToggle) {
        readableWidthToggle.checked = defaultSettings.readableWidth;
        readableWidthToggle.setAttribute('aria-checked', defaultSettings.readableWidth);
      }


      if (readingMaskToggle) {
        readingMaskToggle.checked = false;
        readingMaskToggle.setAttribute('aria-checked', 'false');
      }
      if (readingMask) {
        readingMask.classList.remove('d-flex');
        readingMask.classList.add('d-none');
      }

      showMessageBox("Settings have been reset to default values.");
    });
  }

  // Initial UI setup on load
  document.addEventListener('DOMContentLoaded', () => {
    updateThemeButtonUI(currentSettings.theme);
    updateFontButtonUI(currentSettings.fontFamily);
    if(highlightLinksToggle) highlightLinksToggle.checked = currentSettings.highlightLinks;
    if(readableWidthToggle) readableWidthToggle.checked = currentSettings.readableWidth;
  });
</script>

</body>

</html>