// Load settings (this code would be the same as in your settings.html)
document.addEventListener("DOMContentLoaded", function () {
    const isDarkMode = localStorage.getItem("darkMode") === "true";
    const selectedFont = localStorage.getItem("fontFamily") || "Roboto";
    const themeColor = localStorage.getItem("themeColor") || "#0056b3";

    // ... (code to apply styles as in your settings.html) ...
    document.body.classList.toggle("bg-dark", isDarkMode);
    document.body.classList.toggle("text-white", isDarkMode);

    const navbar = document.querySelector("header .navbar");
    navbar.classList.toggle("bg-dark", isDarkMode);
    navbar.classList.toggle("navbar-dark", isDarkMode);
    navbar.classList.toggle("bg-white", !isDarkMode);
    navbar.classList.toggle("navbar-light", !isDarkMode);

    document.getElementById("font-select").value = selectedFont;
    document.body.style.fontFamily = selectedFont;

    document.getElementById("color-picker").value = themeColor;
    document.documentElement.style.setProperty("--bs-primary", themeColor);
});

// ... (code to save settings as in your settings.html, but without the save button handler) ...
document.getElementById("dark-mode-toggle").addEventListener("change", function () {
    // ...
});

document.getElementById("font-select").addEventListener("change", function () {
    // ...
});

document.getElementById("color-picker").addEventListener("input", function () {
    // ...
});