// theme-initializer.js
// This script applies user preferences saved in localStorage to the current page.
// It should be included on all pages where settings need to take effect.

// Get references to the root HTML element (<html>) and the body element (<body>).
const root = document.documentElement;
const bodyElement = document.body;

/**
 * Helper function to load a CSS custom property (variable) value from localStorage
 * and apply it to the document's root element.
 * This is used for dynamic theme colors, fonts, and border-radius.
 * @param {string} varName - The name of the CSS variable (e.g., '--color-primary').
 * @param {string} localStorageKey - The key used to retrieve the value from localStorage.
 */
function loadCssVar(varName, localStorageKey) {
    const storedValue = localStorage.getItem(localStorageKey);
    if (storedValue) {
        root.style.setProperty(varName, storedValue);
    }
}

/**
 * The main function to apply all saved user settings from localStorage.
 * This function is called once the DOM content is fully loaded.
 */
function applySavedSettings() {
    // --- Appearance Settings Initialization ---
    // Restore dark mode state.
    const isDarkMode = localStorage.getItem('darkMode') === 'true';
    if (isDarkMode) {
        bodyElement.classList.add('dark-mode');
    } else {
        bodyElement.classList.remove('dark-mode');
    }

    // Apply custom CSS variables for colors, font, and border-radius.
    loadCssVar('--site-font', 'userFontFamily');
    loadCssVar('--color-primary', 'userAccentColor');
    loadCssVar('--color-dark', 'userTextColor');
    loadCssVar('--color-light', 'userBackgroundColor');
    loadCssVar('--color-header-bg', 'userHeaderColor');
    loadCssVar('--color-footer-bg-from', 'userFooterColorFrom');
    loadCssVar('--color-footer-bg-to', 'userFooterColorTo');
    loadCssVar('--color-link', 'userLinkColor');
    loadCssVar('--color-card-bg', 'userCardBgColor');

    const storedBorderRadius = localStorage.getItem('userBorderRadius');
    if (storedBorderRadius) {
        root.style.setProperty('--border-radius-base', storedBorderRadius);
    }

    // --- Accessibility Settings Initialization ---
    // Restore high contrast mode state.
    const isHighContrast = localStorage.getItem('highContrastMode') === 'true';
    if (isHighContrast) {
        bodyElement.classList.add('high-contrast');
    } else {
        bodyElement.classList.remove('high-contrast');
    }

    // Restore reduced motion state.
    const isReducedMotion = localStorage.getItem('reducedMotion') === 'true';
    if (isReducedMotion) {
        bodyElement.classList.add('reduced-motion');
    } else {
        bodyElement.classList.remove('reduced-motion');
    }

    // Restore font size.
    const storedFontSize = localStorage.getItem('userFontSize');
    if (storedFontSize) {
        root.style.fontSize = storedFontSize;
    }
    loadCssVar('--site-line-height', 'userLineHeight');
    loadCssVar('--site-letter-spacing', 'userLetterSpacing');

    // Restore focus indicator color (though actual application might require more complex CSS injection).
    loadCssVar('--focus-indicator-color', 'focusIndicatorColor');

    // Restore animations preference.
    const animationsEnabled = localStorage.getItem('animationsEnabled');
    if (animationsEnabled === 'false') { // Only add class if animations are explicitly disabled
        bodyElement.classList.add('reduced-motion'); // Re-using reduced-motion for animation control
    } else {
        bodyElement.classList.remove('reduced-motion');
    }


    // --- General Settings (for header display) ---
    // Update the profile name in the header if a custom username is set.
    const usernameDisplay = localStorage.getItem('usernameDisplay');
    const profileNameElement = document.getElementById('profile-name');
    if (profileNameElement) {
        profileNameElement.textContent = usernameDisplay || 'User';
    }

    // Final conflict resolution check on load: If both high contrast and dark mode
    // were somehow enabled in localStorage, ensure high contrast takes precedence.
    if (isHighContrast) {
        bodyElement.classList.remove('dark-mode'); // Remove dark mode class
    }

    // Note: Other settings like learning pace, subject interests, etc., are primarily
    // used by content-specific logic and don't directly affect global styling.
    // If they impact UI elements on non-settings pages, you would add logic here
    // to read their localStorage values and update the relevant elements.
}

// Run the function when the DOM is fully loaded for any page.
// Using 'DOMContentLoaded' ensures all HTML elements are available before script execution.
window.addEventListener('DOMContentLoaded', applySavedSettings);
