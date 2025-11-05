<?php
  // --- Page-Specific Variables ---

  // Set the page title for the <title> tag and header
  $pageTitle = "Book Title Here | Hesten's Learning"; 
  
  // (Optional) Set a description for SEO
  $pageDescription = "Read [Book Title Here] online at Hesten's Learning e-library, with full accessibility support.";

  // (Optional) Set keywords for SEO
  $pageKeywords = "ebook, online reader, [Book Title], [Author Name], accessible reading";

  // (Optional) Set the author for SEO
  $pageAuthor = "[Author Name]";

  // --- Welcome Popup Variables (from header.php) ---
  // You can customize these or remove them if you don't want the popup on this page.
  $welcomeMessage = "Welcome to the Reader";
  $welcomeParagraph = "Use the accessibility panel (bottom-right icon) to adjust your reading settings.";

  // --- INCLUDE THE HEADER ---
  // This line brings in the <head>, <body>, navigation, and all A11y styles/scripts.
  include 'src/header.php';
?>

<!-- 
  MAIN CONTENT
  All accessibility settings (font size, line height, theme, font family)
  from header.php will automatically apply to the text inside this <main> tag.
-->
<main id="main-content" class="container mx-auto p-4 md:p-8" tabindex="-1">

  <!-- 
    The bg-content-bg and text-text-default classes ensure
    this container respects the user's chosen theme.
  -->
  <div class="bg-content-bg text-text-default rounded-xl shadow-lg p-6 md:p-10 transition-colors duration-300">

    <!-- Book Header -->
    <header class="border-b border-gray-300 dark:border-gray-600 pb-4 mb-6">
      <h1 id="book-title" class="text-3xl md:text-4xl font-bold text-primary mb-2">
        <!-- 
          [TEMPLATE] REPLACE THIS
          This is where your book's title goes.
        -->
        Placeholder Book Title
      </h1>
      <p class="text-lg text-text-secondary">
        by
        <!-- 
          [TEMPLATE] REPLACE THIS
          This is where your book's author goes.
        -->
        A.N. Author
      </p>
    </header>

    <!-- Reader Navigation -->
    <nav class="flex flex-col sm:flex-row justify-between items-center mb-6 space-y-4 sm:space-y-0" aria-label="Book Navigation">
      <button
        class="w-full sm:w-auto bg-primary text-white px-5 py-2 rounded-lg font-semibold hover:bg-secondary transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-accent"
        aria-label="Previous Chapter">
        <i class="fas fa-arrow-left mr-2" aria-hidden="true"></i>
        Previous
      </button>

      <div class="text-text-secondary font-medium" role="status">
        <!-- 
          [TEMPLATE] REPLACE THIS
          Update this with the current chapter.
        -->
        Chapter 1: The Beginning
      </div>

      <button
        class="w-full sm:w-auto bg-primary text-white px-5 py-2 rounded-lg font-semibold hover:bg-secondary transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-accent"
        aria-label="Next Chapter">
        Next
        <i class="fas fa-arrow-right ml-2" aria-hidden="true"></i>
      </button>
    </nav>

    <!-- Book Content -->
    <!-- 
      The 'prose' classes from Tailwind are a good starting point for styling text.
      The dark:prose-invert class makes it work well in dark mode.
      All text inside this article will be controlled by the A11y panel.
    -->
    <article
      class="prose prose-lg dark:prose-invert max-w-none text-text-default"
      aria-labelledby="book-title">
      
      <!-- 
        [TEMPLATE] REPLACE THIS
        This is where your actual book content (the chapter text) goes.
        I've added placeholder text.
      -->
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed
        elementum magna, et sodales nisl. Praesent eleifend condimentum
        sapien, nec ultrices eros facilisis non. Vestibulum vel semper
        massa, sit amet.
      </p>

      <h2>A New Section</h2>
      <p>
        Vivamus eget facilisis nisl. Nulla id ante et eros
        ultrices
        <a href="#" class="text-link hover:underline">volutpat nec</a>
        non orci. Nullam tincidunt, justo non feugiat elementum, magna nisl
        ultrices erat, ac accumsan massa tortor nec dui. Donec at
        condimentum augue.
      </p>
      <ul>
        <li>First item in the list.</li>
        <li>Second item in the list.</li>
        <li>Third item, which might be a bit longer.</li>
      </ul>
      <p>
        Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
        cupidatat non proident, sunt in culpa qui officia deserunt mollit
        anim id est laborum.
      </p>
      <blockquote>
        "This is a blockquote. It's a great way to highlight a specific
        passage or quote from the text."
      </blockquote>
      <p>
        Curabitur blandit tempus porttitor. Integer posuere erat a ante
        venenatis dapibus posuere velit aliquet. Cras justo odio, dapibus ac
        facilisis in, egestas eget quam.
      </p>

      <!-- End of placeholder content -->

    </article>

    <!-- Reader Navigation (Bottom) -->
    <nav class="flex flex-col sm:flex-row justify-between items-center mt-8 pt-6 border-t border-gray-300 dark:border-gray-600 space-y-4 sm:space-y-0" aria-label="Book Navigation Footer">
      <button
        class="w-full sm:w-auto bg-primary text-white px-5 py-2 rounded-lg font-semibold hover:bg-secondary transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-accent"
        aria-label="Previous Chapter">
        <i class="fas fa-arrow-left mr-2" aria-hidden="true"></i>
        Previous
      </button>

      <a href="/elibrary-toc.php" 
         class="w-full sm:w-auto text-center bg-gray-200 text-gray-800 dark:bg-gray-700 dark:text-white px-5 py-2 rounded-lg font-semibold hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-accent"
         aria-label="Back to Table of Contents">
         Table of Contents
      </a>

      <button
        class="w-full sm:w-auto bg-primary text-white px-5 py-2 rounded-lg font-semibold hover:bg-secondary transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-accent"
        aria-label="Next Chapter">
        Next
        <i class="fas fa-arrow-right ml-2" aria-hidden="true"></i>
      </button>
    </nav>

  </div>
</main>

<?php
  // --- INCLUDE THE FOOTER ---
  // This line brings in the footer, modals, and all the A11y panel JavaScript.
  // It also closes the </body> and </html> tags.
  include '..\src\footer.php';
?>