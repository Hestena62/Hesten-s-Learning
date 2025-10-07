// This script manages dynamic styling, user preferences, and interactive elements
// for a web application's settings page. It leverages CSS custom properties (variables)
// for theme customization and localStorage for client-side persistence of user choices.

// --- Global CSS Variable Definitions ---
// Define CSS variables on the document's root element (<html>).
// These variables are designed to be picked up by Tailwind CSS classes (e.g., `bg-[var(--color-primary)]`)
// and allow for dynamic, JavaScript-driven theme changes without reloading stylesheets.
// Initial values are typically set in the accompanying HTML or a base CSS file.
document.documentElement.style.setProperty("--color-primary", "#4F46E5"); // Primary brand color (e.g., for accents, buttons)
document.documentElement.style.setProperty(
    "--color-secondary",
    "#6366F1" // Secondary brand color, often used in gradients or less prominent elements
);
document.documentElement.style.setProperty("--color-accent", "#818CF8"); // A lighter accent color, for highlights
document.documentElement.style.setProperty("--color-dark", "#1F2937");   // Dark text/background color
document.documentElement.style.setProperty("--color-light", "#F3F4F6");  // Light background/text color
document.documentElement.style.setProperty(
    "--color-header-bg",
    "#1F2937" // Background color specifically for the header section
);
document.documentElement.style.setProperty(
    "--color-footer-bg-from",
    "#4F46E5" // Starting color for the footer's background gradient
);
document.documentElement.style.setProperty(
    "--color-footer-bg-to",
    "#6366F1" // Ending color for the footer's background gradient
);
document.documentElement.style.setProperty(
    "--color-link",
    "#4F46E5" // Default color for hyperactive links
);
document.documentElement.style.setProperty(
    "--color-card-bg",
    "#FFFFFF" // Default background color for card-like UI elements
);
document.documentElement.style.setProperty(
    "--border-radius-base",
    "0.75rem" // Base border-radius, equivalent to Tailwind's `rounded-xl`
);

// References to the root HTML element and the body element for applying global styles.
const root = document.documentElement; // Represents the <html> element
const bodyElement = document.body;     // Represents the <body> element

// --- Custom Message Box and Confirmation Modal Functions ---
// These elements provide custom UI for alerts and confirmations,
// replacing browser-native `alert()` and `confirm()` which are often
// visually disruptive and cannot be styled.

// Message Box elements
const messageBox = document.getElementById('message-box');        // The modal container for messages
const messageText = document.getElementById('message-text');      // The paragraph where the message content is displayed
const messageOkButton = document.getElementById('message-ok-button'); // The 'OK' button to close the message box

/**
 * Displays a custom message box to the user.
 * @param {string} message - The text content to display in the message box.
 */
function showMessageBox(message) {
    messageText.textContent = message; // Set the message text
    messageBox.classList.remove('hidden'); // Make the message box visible
    // Attach an event listener to the 'OK' button to hide the message box when clicked.
    // Using `onclick` directly overwrites any previous handler, ensuring only one active handler.
    messageOkButton.onclick = () => messageBox.classList.add('hidden');
}

// Confirmation Modal elements
const confirmationModal = document.getElementById('confirmation-modal'); // The modal container for confirmations
const confirmationText = document.getElementById('confirmation-text');   // The paragraph for the confirmation question
const confirmYesButton = document.getElementById('confirm-yes-button'); // The 'Yes' button
const confirmNoButton = document.getElementById('confirm-no-button');   // The 'No' button

/**
 * Displays a custom confirmation modal to the user.
 * @param {string} message - The text content for the confirmation question.
 * @param {function(boolean): void} onConfirm - A callback function to execute after the user makes a choice.
 * It receives `true` if 'Yes' is clicked, `false` if 'No' is clicked.
 */
function showConfirmationModal(message, onConfirm) {
    confirmationText.textContent = message; // Set the confirmation message
    confirmationModal.classList.remove('hidden'); // Make the confirmation modal visible

    // Attach event listeners for 'Yes' and 'No' buttons.
    // When 'Yes' is clicked, hide the modal and call `onConfirm` with `true`.
    confirmYesButton.onclick = () => {
        confirmationModal.classList.add('hidden');
        onConfirm(true);
    };
    // When 'No' is clicked, hide the modal and call `onConfirm` with `false`.
    confirmNoButton.onclick = () => {
        confirmationModal.classList.add('hidden');
        onConfirm(false);
    };
}

/**
 * Helper function to set a CSS custom property (variable) on the root element
 * and persist its value in localStorage.
 * @param {string} varName - The name of the CSS variable (e.g., '--color-primary').
 * @param {string} value - The value to set for the CSS variable (e.g., '#FF0000').
 * @param {string} localStorageKey - The key to use when storing the value in localStorage.
 */
function setCssVarAndSave(varName, value, localStorageKey) {
    root.style.setProperty(varName, value); // Apply the style directly to the root element
    localStorage.setItem(localStorageKey, value); // Save the value for persistence
}

/**
 * Helper function to load a CSS variable's value from localStorage, apply it
 * to the root element, and update an associated input element and an optional display element.
 * This is used during page load to restore user preferences.
 * @param {string} varName - The name of the CSS variable.
 * @param {HTMLElement} inputElement - The HTML input element (e.g., color picker, select)
 * whose value should be set.
 * @param {string} localStorageKey - The key used to retrieve the value from localStorage.
 * @param {HTMLElement} [displayElement=null] - An optional element (e.g., a <span>)
 * to display the current value (e.g., hex code).
 */
function loadCssVarAndSetInput(varName, inputElement, localStorageKey, displayElement = null) {
    const storedValue = localStorage.getItem(localStorageKey);
    if (storedValue) {
        setCssVarAndSave(varName, storedValue, localStorageKey); // Apply the stored value
        inputElement.value = storedValue; // Set the input field's value
        if (displayElement) {
            displayElement.textContent = storedValue.toUpperCase(); // Update display if provided
        }
    }
}

// --- DOM Element Selections (grouped for clarity) ---

// Mobile Navigation
const navToggle = document.getElementById('nav-toggle');
const navContent = document.getElementById('nav-content');

// Profile Dropdown
const profileMenuButton = document.getElementById('profile-menu-button');
const profileDropdown = document.getElementById('profile-dropdown');

// General Settings
const landingPageSelect = document.getElementById('landing-page-select');
const usernameDisplayInput = document.getElementById('username-display-input');
const languageSelect = document.getElementById('language-select');
const timezoneSelect = document.getElementById('timezone-select');
const profileVisibilityToggle = document.getElementById('profile-visibility-toggle');

// Appearance Settings
const darkModeToggle = document.getElementById('dark-mode-toggle');
const fontFamilySelect = document.getElementById('font-family-select');
const accentColorPicker = document.getElementById('accent-color-picker');
const accentColorValue = document.getElementById('accent-color-value');
const textColorPicker = document.getElementById('text-color-picker');
const textColorValue = document.getElementById('text-color-value');
const backgroundColorPicker = document.getElementById('background-color-picker');
const backgroundColorValue = document.getElementById('background-color-value');
const headerColorPicker = document.getElementById('header-color-picker');
const headerColorValue = document.getElementById('header-color-value');
const footerColorFromPicker = document.getElementById('footer-color-from-picker');
const footerColorFromValue = document.getElementById('footer-color-from-value');
const footerColorToPicker = document.getElementById('footer-color-to-picker');
const footerColorToValue = document.getElementById('footer-color-to-value');
const linkColorPicker = document.getElementById('link-color-picker');
const linkColorValue = document.getElementById('link-color-value');
const cardBgColorPicker = document.getElementById('card-bg-color-picker');
const cardBgColorValue = document.getElementById('card-bg-color-value');
const borderRadiusRange = document.getElementById('border-radius-range');
const borderRadiusValue = document.getElementById('border-radius-value');

// Content & Learning Preferences
const learningPaceSelect = document.getElementById('learning-pace-select');
const subjectInterestsCheckboxes = document.querySelectorAll('input[type="checkbox"][value="math"], input[type="checkbox"][value="ela"], input[type="checkbox"][value="science"], input[type="checkbox"][value="history"]');
const contentDifficultySelect = document.getElementById('content-difficulty-select');
const mediaTypePreferenceCheckboxes = document.querySelectorAll('input[type="checkbox"][value="videos"], input[type="checkbox"][value="text"], input[type="checkbox"][value="interactive"]');
const completionDisplaySelect = document.getElementById('completion-display-select');
const quizTimerToggle = document.getElementById('quiz-timer-toggle');
const instantFeedbackToggle = document.getElementById('instant-feedback-toggle');
const recommendationsToggle = document.getElementById('recommendations-toggle');

// Accessibility Settings
const contrastModeToggle = document.getElementById('contrast-mode-toggle');
const reducedMotionToggle = document.getElementById('reduced-motion-toggle');
const fontSizeRange = document.getElementById('font-size-range');
const fontSizeValue = document.getElementById('font-size-value');
const lineHeightRange = document.getElementById('line-height-range');
const lineHeightValue = document.getElementById('line-height-value');
const letterSpacingRange = document.getElementById('letter-spacing-range');
const letterSpacingValue = document.getElementById('letter-spacing-value');
const screenReaderToggle = document.getElementById('screen-reader-toggle');
const focusIndicatorColorPicker = document.getElementById('focus-indicator-color-picker');
const focusIndicatorColorValue = document.getElementById('focus-indicator-color-value');
const animationsToggle = document.getElementById('animations-toggle');

// Privacy & Data Settings
const dataSharingToggle = document.getElementById('data-sharing-toggle');
const personalizedContentToggle = document.getElementById('personalized-content-toggle');
const thirdPartyToggle = document.getElementById('third-party-toggle');
const downloadDataButton = document.getElementById('download-data-button');

// Notifications Settings
const emailNotificationsToggle = document.getElementById('email-notifications-toggle');
const pushNotificationsToggle = document.getElementById('push-notifications-toggle');
const notificationSoundToggle = document.getElementById('notification-sound-toggle');
const inAppDisplaySelect = document.getElementById('in-app-display-select');
const notificationFrequencySelect = document.getElementById('notification-frequency-select');

// Save and Delete Account Buttons
const saveSettingsButton = document.getElementById('save-settings-button');
const deleteAccountButton = document.getElementById('delete-account-button');


// --- Event Listeners ---

// --- Footer Year Update ---
// Dynamically sets the current year in the footer's copyright notice.
// This ensures the copyright year is always up-to-date without manual intervention.
document.getElementById("year").textContent = new Date().getFullYear();

// --- Mobile Navigation Toggle Functionality ---
// Adds an event listener to the mobile navigation toggle button.
// When clicked, it toggles the 'hidden' Tailwind class on the navigation content,
// effectively showing or hiding the mobile menu.
navToggle.addEventListener('click', function () {
    navContent.classList.toggle('hidden');
});

// --- User Profile Dropdown Functionality ---
// Adds an event listener to the profile menu button.
profileMenuButton.addEventListener('click', function (event) {
    // Prevents the click event from bubbling up to the document, which would
    // immediately trigger the document-wide click listener and close the dropdown.
    event.stopPropagation();
    // Toggles the 'hidden' class to show or hide the profile dropdown.
    profileDropdown.classList.toggle('hidden');
});

// Adds a global click event listener to the document.
// This listener is responsible for closing the profile dropdown if a click occurs
// anywhere outside of the profile menu button or the dropdown content itself.
document.addEventListener('click', function (event) {
    // Checks if the clicked element is NOT the profile menu button AND NOT within the dropdown content.
    if (!profileMenuButton.contains(event.target) && !profileDropdown.contains(event.target)) {
        // If the click is outside, hide the dropdown.
        profileDropdown.classList.add('hidden');
    }
});

// --- General Settings Event Listeners ---
landingPageSelect.addEventListener('change', function () {
    localStorage.setItem('defaultLandingPage', this.value);
});

usernameDisplayInput.addEventListener('input', function () {
    localStorage.setItem('usernameDisplay', this.value);
    document.getElementById('profile-name').textContent = this.value || 'User';
});

languageSelect.addEventListener('change', function () {
    localStorage.setItem('userLanguage', this.value);
});

timezoneSelect.addEventListener('change', function () {
    localStorage.setItem('userTimezone', this.value);
});

profileVisibilityToggle.addEventListener('change', function () {
    localStorage.setItem('profileVisibility', this.checked);
});

// --- Appearance Settings Event Listeners ---
darkModeToggle.addEventListener('change', function () {
    if (this.checked) {
        bodyElement.classList.add('dark-mode');
        localStorage.setItem('darkMode', 'true');
    } else {
        bodyElement.classList.remove('dark-mode');
        localStorage.setItem('darkMode', 'false');
    }
    if (this.checked && contrastModeToggle.checked) {
        contrastModeToggle.checked = false;
        bodyElement.classList.remove('high-contrast');
        localStorage.setItem('highContrastMode', 'false');
    }
});

fontFamilySelect.addEventListener('change', function () {
    setCssVarAndSave('--site-font', this.value, 'userFontFamily');
});

accentColorPicker.addEventListener('input', function () {
    setCssVarAndSave('--color-primary', this.value, 'userAccentColor');
    accentColorValue.textContent = this.value.toUpperCase();
});

textColorPicker.addEventListener('input', function () {
    setCssVarAndSave('--color-dark', this.value, 'userTextColor');
    textColorValue.textContent = this.value.toUpperCase();
});

backgroundColorPicker.addEventListener('input', function () {
    setCssVarAndSave('--color-light', this.value, 'userBackgroundColor');
    backgroundColorValue.textContent = this.value.toUpperCase();
});

headerColorPicker.addEventListener('input', function () {
    setCssVarAndSave('--color-header-bg', this.value, 'userHeaderColor');
    headerColorValue.textContent = this.value.toUpperCase();
});

footerColorFromPicker.addEventListener('input', function () {
    setCssVarAndSave('--color-footer-bg-from', this.value, 'userFooterColorFrom');
    footerColorFromValue.textContent = this.value.toUpperCase();
});

footerColorToPicker.addEventListener('input', function () {
    setCssVarAndSave('--color-footer-bg-to', this.value, 'userFooterColorTo');
    footerColorToValue.textContent = this.value.toUpperCase();
});

linkColorPicker.addEventListener('input', function () {
    setCssVarAndSave('--color-link', this.value, 'userLinkColor');
    linkColorValue.textContent = this.value.toUpperCase();
});

cardBgColorPicker.addEventListener('input', function () {
    setCssVarAndSave('--color-card-bg', this.value, 'userCardBgColor');
    cardBgColorValue.textContent = this.value.toUpperCase();
});

borderRadiusRange.addEventListener('input', function () {
    const radius = this.value + 'px';
    setCssVarAndSave('--border-radius-base', radius, 'userBorderRadius');
    borderRadiusValue.textContent = radius;
});

// --- Content & Learning Preferences Event Listeners ---
learningPaceSelect.addEventListener('change', function () {
    localStorage.setItem('learningPace', this.value);
});

subjectInterestsCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function () {
        const selectedSubjects = Array.from(subjectInterestsCheckboxes)
            .filter(cb => cb.checked)
            .map(cb => cb.value);
        localStorage.setItem('subjectInterests', JSON.stringify(selectedSubjects));
    });
});

contentDifficultySelect.addEventListener('change', function () {
    localStorage.setItem('contentDifficulty', this.value);
});

mediaTypePreferenceCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function () {
        const selectedMediaTypes = Array.from(mediaTypePreferenceCheckboxes)
            .filter(cb => cb.checked)
            .map(cb => cb.value);
        localStorage.setItem('mediaTypePreference', JSON.stringify(selectedMediaTypes));
    });
});

completionDisplaySelect.addEventListener('change', function () {
    localStorage.setItem('completionDisplay', this.value);
});

quizTimerToggle.addEventListener('change', function () {
    localStorage.setItem('quizTimerEnabled', this.checked);
});

instantFeedbackToggle.addEventListener('change', function () {
    localStorage.setItem('instantFeedbackEnabled', this.checked);
});

recommendationsToggle.addEventListener('change', function () {
    localStorage.setItem('recommendationsEnabled', this.checked);
});

// --- Accessibility Settings Event Listeners ---
contrastModeToggle.addEventListener('change', function () {
    if (this.checked) {
        bodyElement.classList.add('high-contrast');
        localStorage.setItem('highContrastMode', 'true');
    } else {
        bodyElement.classList.remove('high-contrast');
        localStorage.setItem('highContrastMode', 'false');
    }
    if (this.checked && darkModeToggle.checked) {
        darkModeToggle.checked = false;
        bodyElement.classList.remove('dark-mode');
        localStorage.setItem('darkMode', 'false');
    }
});

reducedMotionToggle.addEventListener('change', function () {
    if (this.checked) {
        bodyElement.classList.add('reduced-motion');
        localStorage.setItem('reducedMotion', 'true');
    } else {
        bodyElement.classList.remove('reduced-motion');
        localStorage.setItem('reducedMotion', 'false');
    }
});

fontSizeRange.addEventListener('input', function () {
    const size = this.value + 'px';
    root.style.fontSize = size;
    fontSizeValue.textContent = size;
    localStorage.setItem('userFontSize', size);
});

lineHeightRange.addEventListener('input', function () {
    const height = this.value;
    setCssVarAndSave('--site-line-height', height, 'userLineHeight');
    lineHeightValue.textContent = height;
});

letterSpacingRange.addEventListener('input', function () {
    const spacing = this.value + 'em';
    setCssVarAndSave('--site-letter-spacing', spacing, 'userLetterSpacing');
    letterSpacingValue.textContent = spacing;
});

screenReaderToggle.addEventListener('change', function () {
    localStorage.setItem('screenReaderOptimization', this.checked);
});

focusIndicatorColorPicker.addEventListener('input', function () {
    localStorage.setItem('focusIndicatorColor', this.value);
    focusIndicatorColorValue.textContent = this.value.toUpperCase();
});

animationsToggle.addEventListener('change', function () {
    localStorage.setItem('animationsEnabled', this.checked);
});

// --- Privacy & Data Settings Event Listeners ---
dataSharingToggle.addEventListener('change', function () {
    localStorage.setItem('dataSharingEnabled', this.checked);
});

personalizedContentToggle.addEventListener('change', function () {
    localStorage.setItem('personalizedContentEnabled', this.checked);
});

thirdPartyToggle.addEventListener('change', function () {
    localStorage.setItem('thirdPartyIntegrationsEnabled', this.checked);
});

downloadDataButton.addEventListener('click', function () {
    showMessageBox("Your data download has been initiated. Please check your email for the link (placeholder).");
});

// --- Notifications Settings Event Listeners ---
emailNotificationsToggle.addEventListener('change', function () {
    localStorage.setItem('emailNotificationsEnabled', this.checked);
});

pushNotificationsToggle.addEventListener('change', function () {
    localStorage.setItem('pushNotificationsEnabled', this.checked);
});

notificationSoundToggle.addEventListener('change', function () {
    localStorage.setItem('notificationSoundEnabled', this.checked);
});

inAppDisplaySelect.addEventListener('change', function () {
    localStorage.setItem('inAppNotificationDisplay', this.value);
});

notificationFrequencySelect.addEventListener('change', function () {
    localStorage.setItem('notificationFrequency', this.value);
});

// --- Save and Delete Account Buttons Event Listeners ---
saveSettingsButton.addEventListener('click', function () {
    console.log('Settings saved!');
    showMessageBox("Settings saved successfully!");
});

deleteAccountButton.addEventListener('click', function () {
    showConfirmationModal("Are you sure you want to delete your account? This action cannot be undone.", (confirmed) => {
        if (confirmed) {
            console.log('Account deletion initiated.');
            showMessageBox("Account deletion process started. This is a placeholder action.");
        } else {
            console.log('Account deletion cancelled.');
            showMessageBox("Account deletion cancelled.");
        }
    });
});

// --- Initialize all settings on page load ---
// This block ensures that user preferences are loaded from localStorage
// and applied to the UI elements and CSS variables when the page first loads.
window.addEventListener('load', () => {
    // --- General Settings Initialization ---
    // Restore default landing page selection, defaulting to '/index.html' if not set.
    landingPageSelect.value = localStorage.getItem('defaultLandingPage') || '/index.html';
    // Restore username display, defaulting to an empty string.
    usernameDisplayInput.value = localStorage.getItem('usernameDisplay') || '';
    // Update the profile name displayed in the header based on the restored username.
    document.getElementById('profile-name').textContent = usernameDisplayInput.value || 'User';
    // Restore language selection, defaulting to 'en'.
    languageSelect.value = localStorage.getItem('userLanguage') || 'en';
    // Restore timezone selection, defaulting to 'EST'.
    timezoneSelect.value = localStorage.getItem('userTimezone') || 'EST';
    // Restore profile visibility toggle state.
    profileVisibilityToggle.checked = localStorage.getItem('profileVisibility') === 'true';

    // --- Appearance Settings Initialization ---
    // Restore dark mode state.
    const isDarkMode = localStorage.getItem('darkMode') === 'true';
    darkModeToggle.checked = isDarkMode;
    if (isDarkMode) bodyElement.classList.add('dark-mode'); // Apply dark mode class if enabled.

    // Restore custom font family using the helper function.
    loadCssVarAndSetInput('--site-font', fontFamilySelect, 'userFontFamily');
    // Restore custom accent color, updating both the picker and its display value.
    loadCssVarAndSetInput('--color-primary', accentColorPicker, 'userAccentColor', accentColorValue);
    // Restore custom text color.
    loadCssVarAndSetInput('--color-dark', textColorPicker, 'userTextColor', textColorValue);
    // Restore custom background color.
    loadCssVarAndSetInput('--color-light', backgroundColorPicker, 'userBackgroundColor', backgroundColorValue);
    // Restore custom header background color.
    loadCssVarAndSetInput('--color-header-bg', headerColorPicker, 'userHeaderColor', headerColorValue);
    // Restore custom footer gradient start color.
    loadCssVarAndSetInput('--color-footer-bg-from', footerColorFromPicker, 'userFooterColorFrom', footerColorFromValue);
    // Restore custom footer gradient end color.
    loadCssVarAndSetInput('--color-footer-bg-to', footerColorToPicker, 'userFooterColorTo', footerColorToValue);
    // Restore custom link color.
    loadCssVarAndSetInput('--color-link', linkColorPicker, 'userLinkColor', linkColorValue);
    // Restore custom card background color.
    loadCssVarAndSetInput('--color-card-bg', cardBgColorPicker, 'userCardBgColor', cardBgColorValue);

    // Restore border radius. Special handling because the input value is an integer, but CSS variable needs 'px'.
    const storedBorderRadius = localStorage.getItem('userBorderRadius');
    if (storedBorderRadius) {
        setCssVarAndSave('--border-radius-base', storedBorderRadius, 'userBorderRadius');
        // Parse the integer value from the stored string (e.g., "12px" -> 12) for the range input.
        borderRadiusRange.value = parseInt(storedBorderRadius);
        borderRadiusValue.textContent = storedBorderRadius;
    }

    // --- Content & Learning Settings Initialization ---
    // Restore learning pace, defaulting to 'standard'.
    learningPaceSelect.value = localStorage.getItem('learningPace') || 'standard';
    // Restore subject interests. Parse the JSON string back into an array.
    const storedSubjectInterests = JSON.parse(localStorage.getItem('subjectInterests')) || [];
    subjectInterestsCheckboxes.forEach(checkbox => {
        checkbox.checked = storedSubjectInterests.includes(checkbox.value);
    });
    // Restore content difficulty, defaulting to 'beginner'.
    contentDifficultySelect.value = localStorage.getItem('contentDifficulty') || 'beginner';
    // Restore media type preferences. Parse the JSON string back into an array.
    const storedMediaTypes = JSON.parse(localStorage.getItem('mediaTypePreference')) || [];
    mediaTypePreferenceCheckboxes.forEach(checkbox => {
        checkbox.checked = storedMediaTypes.includes(checkbox.value);
    });
    // Restore completion display format, defaulting to 'percentage'.
    completionDisplaySelect.value = localStorage.getItem('completionDisplay') || 'percentage';
    // Restore quiz timer toggle state.
    quizTimerToggle.checked = localStorage.getItem('quizTimerEnabled') === 'true';
    // Restore instant feedback toggle state.
    instantFeedbackToggle.checked = localStorage.getItem('instantFeedbackEnabled') === 'true';
    // Restore recommendations toggle state. Default to true if not explicitly false.
    recommendationsToggle.checked = localStorage.getItem('recommendationsEnabled') !== 'false';

    // --- Accessibility Settings Initialization ---
    // Restore high contrast mode state.
    const isHighContrast = localStorage.getItem('highContrastMode') === 'true';
    contrastModeToggle.checked = isHighContrast;
    if (isHighContrast) bodyElement.classList.add('high-contrast'); // Apply high contrast class if enabled.

    // Restore reduced motion state.
    const isReducedMotion = localStorage.getItem('reducedMotion') === 'true';
    reducedMotionToggle.checked = isReducedMotion;
    if (isReducedMotion) bodyElement.classList.add('reduced-motion'); // Apply reduced motion class if enabled.

    // Restore font size.
    const storedFontSize = localStorage.getItem('userFontSize');
    if (storedFontSize) {
        root.style.fontSize = storedFontSize;
        fontSizeRange.value = parseInt(storedFontSize);
        fontSizeValue.textContent = storedFontSize;
    }
    // Restore line height.
    const storedLineHeight = localStorage.getItem('userLineHeight');
    if (storedLineHeight) {
        setCssVarAndSave('--site-line-height', storedLineHeight, 'userLineHeight');
        lineHeightRange.value = parseFloat(storedLineHeight);
        lineHeightValue.textContent = storedLineHeight;
    }
    // Restore letter spacing.
    const storedLetterSpacing = localStorage.getItem('userLetterSpacing');
    if (storedLetterSpacing) {
        setCssVarAndSave('--site-letter-spacing', storedLetterSpacing, 'userLetterSpacing');
        letterSpacingRange.value = parseFloat(storedLetterSpacing);
        letterSpacingValue.textContent = storedLetterSpacing;
    }
    // Restore screen reader optimization toggle state.
    screenReaderToggle.checked = localStorage.getItem('screenReaderOptimization') === 'true';
    // Restore focus indicator color.
    loadCssVarAndSetInput('--focus-indicator-color', focusIndicatorColorPicker, 'focusIndicatorColor', focusIndicatorColorValue);
    // Restore animations toggle state. Default to true if not explicitly false.
    animationsToggle.checked = localStorage.getItem('animationsEnabled') !== 'false';

    // --- Privacy & Data Settings Initialization ---
    // Restore data sharing toggle state. Default to true if not explicitly false.
    dataSharingToggle.checked = localStorage.getItem('dataSharingEnabled') !== 'false';
    // Restore personalized content toggle state. Default to true if not explicitly false.
    personalizedContentToggle.checked = localStorage.getItem('personalizedContentEnabled') !== 'false';
    // Restore third-party integrations toggle state. Default to true if not explicitly false.
    thirdPartyToggle.checked = localStorage.getItem('thirdPartyIntegrationsEnabled') !== 'false';

    // --- Notifications Settings Initialization ---
    // Restore email notifications toggle state. Default to true if not explicitly false.
    emailNotificationsToggle.checked = localStorage.getItem('emailNotificationsEnabled') !== 'false';
    // Restore push notifications toggle state. Default to true if not explicitly false.
    pushNotificationsToggle.checked = localStorage.getItem('pushNotificationsEnabled') !== 'false';
    // Restore notification sound toggle state. Default to true if not explicitly false.
    notificationSoundToggle.checked = localStorage.getItem('notificationSoundEnabled') !== 'false';
    // Restore in-app notification display, defaulting to 'banner'.
    inAppDisplaySelect.value = localStorage.getItem('inAppNotificationDisplay') || 'banner';
    // Restore notification frequency, defaulting to 'daily'.
    notificationFrequencySelect.value = localStorage.getItem('notificationFrequency') || 'daily';

    // Final conflict resolution check on load: If both high contrast and dark mode
    // were somehow enabled in localStorage, ensure high contrast takes precedence.
    if (isHighContrast) {
        bodyElement.classList.remove('dark-mode'); // Remove dark mode class
        darkModeToggle.checked = false; // Uncheck dark mode toggle
    }
});
