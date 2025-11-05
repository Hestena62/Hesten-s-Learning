<?php
// --- Page-Specific Variables ---
// These variables are used by header.php to populate the <head> tag
$pageTitle = "Journal Entries - Hesten's Learning";
$pageDescription = "Browse and read detailed research papers and journal entries on various learning topics.";
$pageKeywords = "Journal, Research, Papers, Dyslexia, Learning, Education";
$pageAuthor = "Hesten Allison";

// Variables for the welcome popup (defined in header.php)
$welcomeMessage = "Welcome to the Journals";
$welcomeParagraph = "Here you can find research papers and articles. Select a journal to get started.";

// --- Include Header ---
// This file includes the DOCTYPE, <head>, and main site navigation <header>
include '..\..\src\header.php';
?>

<!-- 
  Page-Specific Styles 
  These styles from the original index.html are for the paper entries.
  We include them here, after header.php, so they are inside the <head>.
  (header.php closes the <head> tag)
-->
<style>
  /* Define CSS variables for easier theme management (from original index.html) */
  :root {
    --primary-blue: #2563eb;
    /* Tailwind blue-600 */
    --darker-blue: #1d4ed8;
    /* Tailwind blue-700 */
    --text-color: #334155;
    /* Tailwind slate-700 */
    /* background-color is handled by the theme in header.php */
    --border-color: #e2e8f0;
    /* Tailwind gray-200 */
    --shadow-color-light: rgba(0, 0, 0, 0.06);
    --shadow-color-dark: rgba(0, 0, 0, 0.1);
  }

  /* Apply base text colors (background is now theme-aware) */
  body {
    color: var(--text-color);
  }

  /* Styling for individual paper entries */
  .paper-entry {
    transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out,
      border-color 0.2s ease-in-out;
    border-left: 5px solid var(--border-color);
    /* Subtle left border */
    border-radius: 0.5rem;
    /* Rounded corners */
    /* Use theme-aware background color for content */
    background-color: var(--color-content-bg, #FFFFFF);
    color: var(--color-text-default, #334155);
  }

  /* Hover effects for paper entries */
  .paper-entry:hover {
    transform: translateX(5px);
    /* Slight shift */
    box-shadow: 0 4px 10px -1px var(--shadow-color-dark),
      0 2px 6px -1px var(--shadow-color-light);
    /* More pronounced shadow */
    border-left-color: var(--primary-blue);
    /* Highlight border on hover */
  }

  /* Styling for paper links (CTA) */
  .paper-link {
    display: inline-flex;
    /* Allows icon and text to sit together */
    align-items: center;
    /* Vertically align icon and text */
    gap: 8px;
    /* Space between text and icon */
    color: var(--darker-blue);
    /* Darker blue for prominence */
    text-decoration: none;
    /* Remove default underline */
    font-weight: 600;
    /* Bolder text for links */
    transition: color 0.2s ease-in-out;
    /* Smooth color transition */
  }

  .paper-link:hover {
    color: var(--primary-blue);
    /* Lighter blue on hover */
    text-decoration: underline;
    /* Underline on hover */
  }
  
  /* Use theme-aware text colors for abstract and metadata */
  .paper-entry .text-gray-600 {
    color: var(--color-text-secondary, #6B7280);
  }
  .paper-entry .text-gray-700 {
     color: var(--color-text-default, #334155);
  }
  .paper-entry .text-blue-700 {
    color: var(--primary-blue);
  }


  /* Abstract truncation and expansion */
  .abstract-truncate {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    /* Limit to 3 lines */
    line-clamp: 3;
    /* Standard property */
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    /* Add ellipsis */
  }

  .abstract-full {
    display: block;
    /* Show full abstract */
  }

  /* Styling for "Read More" / "Show Less" button */
  .read-more-btn {
    color: var(--primary-blue);
    font-weight: 500;
    cursor: pointer;
    display: inline-block;
    margin-top: 8px;
    transition: color 0.2s ease-in-out;
  }

  .read-more-btn:hover {
    color: var(--darker-blue);
  }

  /* Page-specific header styling */
  .page-specific-header {
    /* Use theme-aware background and shadow */
    background-color: var(--color-content-bg, #FFFFFF);
    color: var(--color-text-default, #1F2937);
  }
  .page-specific-header h1 {
    color: var(--color-text-default, #1F2937);
  }
  .page-specific-header a {
    color: var(--color-primary, #2563eb);
  }
  .page-specific-header a:hover {
    color: var(--color-secondary, #1d4ed8);
  }
  .breadcrumb-text {
    color: var(--color-text-secondary, #6B7280);
  }
  .breadcrumb-text a {
     color: var(--color-primary, #2563eb);
  }

</style>

<!-- 
  START of page-specific content from index.html
  This content is placed *after* header.php
-->

<!-- Page-Specific Header Section -->
<header class="page-specific-header shadow-sm py-4 px-6 sticky top-0 z-40 rounded-b-lg">
  <div class="max-w-7xl mx-auto flex justify-between items-center">
    <h1 class="text-3xl font-bold" id="journalTitleHeader">
      Journal Entries
    </h1>
    <nav>
      <!-- Back to Journals link with icon -->
      <a href="/" class="font-medium px-3 py-2 rounded-md transition duration-200 flex items-center gap-2">
        <i class="fas fa-arrow-left"></i> Back to Journals
      </a>
    </nav>
  </div>
</header>

<!-- Main Content Area -->
<main class="flex-grow max-w-7xl mx-auto p-6 w-full">
  <!-- Breadcrumbs for navigation -->
  <div class="breadcrumb-text text-sm mb-4">
    <a href="/" class="hover:underline">Journals</a>
    <span class="mx-1">&gt;</span> <span id="breadcrumbJournalName"></span>
  </div>

  <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center" id="journalDetailHeading"></h2>

  <div id="paperList" class="space-y-6">
    <!-- Paper entries will be dynamically loaded here by the script below -->
    <!-- Loading Skeleton -->
    <div class="paper-entry bg-white p-6 rounded-lg shadow-md border border-gray-200 animate-pulse">
        <div class="h-6 bg-gray-300 rounded w-3/4 mb-3"></div>
        <div class="h-4 bg-gray-300 rounded w-1/2 mb-2"></div>
        <div class="h-4 bg-gray-300 rounded w-1/3 mb-4"></div>
        <div class="h-4 bg-gray-300 rounded mb-2"></div>
        <div class="h-4 bg-gray-300 rounded mb-2"></div>
        <div class="h-4 bg-gray-300 rounded w-5/6"></div>
    </div>
  </div>
</main>

<!-- 
  END of page-specific content from index.html
-->


<!-- 
  Page-Specific JavaScript 
  This script from the original index.html loads the journal entries.
  We include it here, *before* footer.php, so it is inside the <body>.
-->
<script>
  document.addEventListener("DOMContentLoaded", () => {
    // Sample Data for Papers (linked to journals by journalId)
    // In a real application, this data would be fetched from an API or database.
    const allPapersData = {
      "dyslexia-research": [{
        id: "PA-Rhyming-Impact",
        title: "Phonological Awareness: Rhyming and Its Impact on Students with Dyslexia",
        authors: "Heston A",
        date: "July 15, 2025",
        abstract: "This paper provides a comprehensive review of phonological awareness, with a specific focus on rhyming ability, and its critical relationship to developmental dyslexia. Phonological awareness, the conscious ability to manipulate the sound structure of spoken language, is a foundational skill for literacy acquisition. Rhyming, an early component of onset-rime awareness, serves as a significant predictor of later reading success. A core tenet of dyslexia research, the Phonological Deficit Hypothesis, posits that individuals with dyslexia experience a primary impairment in phonological processing, consistently manifesting as persistent difficulties with rhyming and, more profoundly, with phonemic awareness. This review details the multifaceted impact of these deficits on decoding, encoding, and ultimately, reading comprehension. It further outlines key formal and informal assessment methods for identifying phonological awareness weaknesses and presents evidence-based intervention strategies, emphasizing explicit, systematic, and multisensory approaches. The paper concludes by highlighting the imperative for early identification, targeted intervention, and collaborative support to mitigate the adverse effects of phonological deficits on students with dyslexia, thereby fostering their literacy development.",
        link: "/research/DLDR/texts/PA-Rhyming-Impact.php",
      }, ],
      // Add more journal data here if needed for demonstration
    };

    // Sample Journal Data (for displaying titles)
    const journalsData = [{
      id: "dyslexia-research",
      title: "Dyslexia Learning Disability Research"
    },
      // Add other journal titles here for potential future use
    ];

    // Get DOM elements
    const journalTitleHeader =
      document.getElementById("journalTitleHeader");
    const journalDetailHeading = document.getElementById(
      "journalDetailHeading"
    );
    const paperList = document.getElementById("paperList");
    const journalDetailPageTitle = document.getElementById(
      "journalDetailPageTitle"
    );
    const breadcrumbJournalName = document.getElementById(
      "breadcrumbJournalName"
    );
    // Grab the <title> tag (which was output by header.php)
    const pageTitleElement = document.querySelector("title");


    // Get journalId from URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    let journalId = urlParams.get("journalId");

    // Default to 'dyslexia-research' if no journalId is provided or if it's invalid
    if (!journalId || !allPapersData[journalId]) {
      journalId = "dyslexia-research"; // Set a default journal ID
    }

    // Retrieve papers for the selected journal
    const papers = allPapersData[journalId];
    // Find the journal name from the journalsData array
    const journalName =
      journalsData.find((j) => j.id === journalId)?.title ||
      "Journal Entries";

    // Update page titles and headings
    journalTitleHeader.textContent = journalName;
    journalDetailHeading.textContent = `Papers in ${journalName}`;
    // Update the main <title> tag in the <head>
    if(pageTitleElement) {
        pageTitleElement.textContent = `${journalName} - Entries`;
    }
    breadcrumbJournalName.textContent = journalName; // Set breadcrumb text
    
    // Clear the loading skeleton
    paperList.innerHTML = '';

    // Dynamically load paper entries
    if (papers && papers.length > 0) {
      papers.forEach((paper) => {
        const paperEntry = document.createElement("div");
        paperEntry.classList.add(
          "paper-entry",
          "p-6",
          "rounded-lg",
          "shadow-md",
          "border"
          // Note: bg-white and border-gray-200 are handled by the new CSS rules
        );

        const abstractText = paper.abstract;
        // Determine if truncation is needed (e.g., if abstract is longer than 200 characters)
        const TRUNCATE_LENGTH = 200;
        const needsTruncation = abstractText.length > TRUNCATE_LENGTH;
        const truncatedAbstract = needsTruncation ?
          abstractText.substring(0, TRUNCATE_LENGTH) + "..." :
          abstractText;

        paperEntry.innerHTML = `
            <h3 class="text-xl font-semibold text-blue-700 mb-2">
                <a href="${paper.link}" class="paper-link">
                    <i class="fas fa-file-alt"></i> ${paper.title}
                </a>
            </h3>
            <p class="text-gray-600 text-sm mb-1"><strong><i class="fas fa-user-friends"></i> Authors:</strong> ${
              paper.authors
            }</p>
            <p class="text-gray-600 text-sm mb-3"><strong><i class="fas fa-calendar-alt"></i> Published:</strong> ${
              paper.date
            }</p>
            <p class="text-gray-700 text-base ${
              needsTruncation
                ? "abstract-truncate"
                : "abstract-full"
            }" data-full-abstract="${abstractText}">${truncatedAbstract}</p>
            ${
              needsTruncation
                ? '<span class="read-more-btn">Read More</span>'
                : ""
            }
        `;
        paperList.appendChild(paperEntry);

        // Add event listener for "Read More" / "Show Less" functionality
        if (needsTruncation) {
          const readMoreBtn = paperEntry.querySelector(".read-more-btn");
          const abstractParagraph = paperEntry.querySelector(
            ".abstract-truncate, .abstract-full"
          ); // Select based on initial class

          readMoreBtn.addEventListener("click", () => {
            if (abstractParagraph.classList.contains("abstract-truncate")) {
              // Expand abstract
              abstractParagraph.classList.remove("abstract-truncate");
              abstractParagraph.classList.add("abstract-full");
              abstractParagraph.textContent =
                abstractParagraph.dataset.fullAbstract;
              readMoreBtn.textContent = "Show Less";
            } else {
              // Truncate abstract
              abstractParagraph.classList.remove("abstract-full");
              abstractParagraph.classList.add("abstract-truncate");
              abstractParagraph.textContent = truncatedAbstract;
              readMoreBtn.textContent = "Read More";
            }
          });
        }
      });
    } else {
      // Enhanced empty state message
      paperList.innerHTML = `
        <div class="text-gray-600 text-center py-10 border border-gray-300 rounded-lg bg-white shadow-sm">
            <i class="fas fa-book-open text-5xl text-gray-400 mb-4"></i>
            <p class="text-xl font-semibold">No papers found for this journal yet.</p>
            <p class="text-base mt-2">We're working hard to bring you new research. Please check back soon!</p>
            <a href="/" class="mt-4 inline-block bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition duration-300">
                Explore Other Journals
            </a>
        </div>
    `;
    }
  });
</script>

<?php
// --- Include Footer ---
// This file includes the main site <footer>, modals, global JS,
// and closes the </body> and </html> tags.
include '..\..\src\footer.php';
?>
