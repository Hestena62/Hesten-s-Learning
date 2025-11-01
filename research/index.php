<?php
  // --- Page-Specific Variables ---
  // These variables are used by header.php to set <title>, <meta> tags, etc.
  $pageTitle = "Hesten's Learning - Research";
  $pageDescription = "Explore our peer-reviewed journals on dyslexia, dysgraphia, and other learning disability research.";
  $pageKeywords = "research, journals, dyslexia, dysgraphia, learning disabilities, education";
  $pageAuthor = "Hesten Allison";

  // --- Welcome Popup Messages (from header.php) ---
  // These are specific to this page and will be shown in the popup
  $welcomeMessage = "Welcome to Research";
  $welcomeParagraph = "Discover the latest findings and journals from Hesten's Learning. Explore our research on learning disabilities and educational technology.";

  // --- 1. INCLUDE HEADER ---
  // This file contains the DOCTYPE, <head>, and main navigation <header>
  // It uses all the $page... variables defined above
  include 'src/header.php';
?>

<!--
  --- 2. Page-Specific Styles ---
  These styles make the journal cards from your original index.html
  compatible with the theme-switching system from header.php.
-->
<style>
  /*
   * Use CSS variables from header.php for theme compatibility
   * --color-card-bg: The background color for cards (theme-aware)
   * --color-text-default: The main text color (theme-aware)
  */
  .journal-card {
    background-color: var(--color-card-bg, #FFFFFF);
    color: var(--color-text-default, #1F2937);
    transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
  }

  .journal-card:hover {
    transform: translateY(-5px);
    /* A subtle shadow that works well in light mode */
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
  }

  /* Specific hover shadow for dark mode */
  .dark .journal-card:hover {
    box-shadow: 0 10px 15px -3px rgba(255, 255, 255, 0.07), 0 4px 6px -2px rgba(255, 255, 255, 0.04);
  }

  /* Add border and shadow for high-contrast mode for visibility */
  .high-contrast .journal-card {
    border: 2px solid var(--color-primary, #FFFF00);
  }

  .high-contrast .journal-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 0 10px var(--color-primary, #FFFF00);
  }
</style>

<!--
  --- 3. Main Page Content ---
  This is the <main> section from your original index.html.
  I've updated the text color classes (e.g., text-gray-800)
  to use the theme-aware classes (e.g., text-text-default) from header.php.
-->
<main class="flex-grow max-w-7xl mx-auto p-6 w-full">
  <!--
    The main navigation header is already included from header.php.
    This h2 is the main heading for this specific page's content.
  -->
  <h2 class="text-3xl font-bold text-text-default mb-8 text-center">
    Explore Our Journals
  </h2>

  <div id="journalsGrid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
    <!-- Journal cards will be dynamically loaded here by the script below -->

    <!-- Added a screen-reader-friendly loading message for better UX -->
    <p id="loading-journals" class="text-text-secondary text-center col-span-full" aria-live="polite">
      <i class="fas fa-spinner fa-spin mr-2" aria-hidden="true"></i>Loading journals...
    </p>
  </div>
</main>

<!--
  --- 4. Page-Specific JavaScript ---
  This is the <script> from your original index.html, moved here.
  It's best to place page-specific scripts just before the footer.
  I've updated the generated HTML to use theme-aware classes.
-->
<script>
  // Wait for the DOM to be fully loaded before running the script
  document.addEventListener("DOMContentLoaded", () => {
    // Sample Journal Data
    const journalsData = [{
      id: "dyslexia-Research",
      title: "Dyslexia & Learning Disabilities Research",
      cover: "https://placehold.co/300x400/a78bfa/ffffff?text=Dyslexia+Research",
      description: "A peer-reviewed journal focusing on the latest research in dyslexia and other learning disabilities, exploring innovative teaching methods and interventions.",
      link: "DLDR/", // Updated link
    }, {
      id: "Dysgraphia-Research",
      title: "Dysgraphia & Writing Skills Research",
      cover: "https://placehold.co/300x400/67e8f9/1f2937?text=Dysgraphia+Research",
      description: "A peer-reviewed journal dedicated to dysgraphia research, focusing on the latest findings in writing skills development and interventions for students with dysgraphia.",
      link: "journal_detail.html?journalId=edu-tech",
    }, {
      id: "env-sustain",
      title: "Environmental Sustainability Review",
      cover: "https://placehold.co/300x400/4ade80/1f2937?text=Env+Sustain+Review",
      description: "A peer-reviewed journal focusing on sustainable practices, climate change, and ecological research.",
      link: "journal_detail.html?journalId=env-sustain",
    }, {
      id: "data-science",
      title: "Advanced Data Science Quarterly",
      cover: "https://placehold.co/300x400/fcd34d/1f2937?text=Data+Science+Quarterly",
      description: "Covers cutting-edge research in big data analytics, machine learning algorithms, and data visualization.",
      link: "journal_detail.html?journalId=data-science",
    }, ];

    const journalsGrid = document.getElementById("journalsGrid");
    const loadingMessage = document.getElementById("loading-journals");

    // Function to render journal cards
    function renderJournals() {
      if (!journalsGrid) {
        console.error("Journals grid not found!");
        return; // Safety check
      }

      // Clear loading message
      if (loadingMessage) {
        loadingMessage.remove();
      }

      journalsData.forEach((journal) => {
        const card = document.createElement("a");
        card.href = journal.link;
        // Use 'rounded-base-rounded' from the theme system instead of 'rounded-lg'
        // The 'journal-card' class applies the theme-aware background color
        card.className = "journal-card block rounded-base-rounded shadow-md overflow-hidden hover:shadow-xl cursor-pointer flex flex-col";

        // --- IMPROVED HTML ---
        // Updated to use theme-aware text and link color variables:
        // - text-text-default: for headings
        // - text-text-secondary: for descriptions
        // - text-primary: for links
        card.innerHTML = `
          <img src="${journal.cover}" alt="${journal.title} Cover" class="w-full h-64 object-cover" onerror="this.onerror=null; this.src='https://placehold.co/300x400/6366F1/FFFFFF?text=Image+Error';">
          <div class="p-4 flex-grow flex flex-col justify-between">
              <h3 class="text-xl font-semibold text-text-default mb-2">${journal.title}</h3>
              <p class="text-text-secondary text-sm">${journal.description}</p>
              <span class="mt-4 text-primary hover:underline font-medium self-end">View Entries &rarr;</span>
          </div>
        `;
        journalsGrid.appendChild(card);
      });
    }

    // Render the journals
    renderJournals();
  });
</script>

<?php
  // --- 5. INCLUDE FOOTER ---
  // This file contains the <footer>, all global modals,
  // global JavaScript, and closes the </body> and </html> tags.
  include 'src/footer.php';
?>
