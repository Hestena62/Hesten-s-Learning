<?php

/**
 * Top 10% E-Learning Web Libraries for Learning Differences (Dyslexia, ADHD, Cognitive Accessibility)
 * * This file renders a list of the gold-standard libraries required to build
 * a highly accessible, cognitive-friendly e-learning platform.
 */

$libraries = [
    'Media & Video Playback' => [
        [
            'name' => 'Able Player',
            'url' => 'https://ableplayer.github.io/ableplayer/',
            'description' => 'The gold standard for accessible HTML5 media. Supports synchronized transcripts, audio description, and variable playback speed (essential for ADHD/Auditory Processing issues).'
        ],
        [
            'name' => 'Plyr',
            'url' => 'https://plyr.io/',
            'description' => 'A lightweight, accessible, and customizable media player that supports captions and screen readers out of the box.'
        ]
    ],
    'Reading & Typography (Dyslexia Support)' => [
        [
            'name' => 'Lexend (Google Fonts)',
            'url' => 'https://fonts.google.com/specimen/Lexend',
            'description' => 'A variable font family empirically shown to significantly improve reading proficiency. It reduces visual stress by improving character spacing.'
        ],
        [
            'name' => 'OpenDyslexic',
            'url' => 'https://opendyslexic.org/',
            'description' => 'A typeface designed against some common symptoms of dyslexia, featuring weighted bottoms to prevent letter flipping.'
        ],
        [
            'name' => 'Bionic Reading API',
            'url' => 'https://bionic-reading.com/',
            'description' => 'An API that revises text to highlight the initial letters of words, guiding the eye and helping users with ADHD focus on reading.'
        ]
    ],
    'Accessible UI Primitives & Interaction' => [
        [
            'name' => 'React Aria',
            'url' => 'https://react-spectrum.adobe.com/react-aria/',
            'description' => 'A library of React Hooks that provides accessible UI primitives for your design system. Handles complex keyboard interactions automatically.'
        ],
        [
            'name' => 'Headless UI',
            'url' => 'https://headlessui.com/',
            'description' => 'Unstyled, fully accessible UI components (menus, switches, dialogs) designed to integrate perfectly with Tailwind CSS.'
        ],
        [
            'name' => 'Focus Visible (Polyfill)',
            'url' => 'https://github.com/WICG/focus-visible',
            'description' => 'Helps manage focus indicators, showing them only when necessary (keyboard navigation) to reduce visual clutter for mouse users while protecting power users.'
        ]
    ],
    'Interactive Content & Math' => [
        [
            'name' => 'H5P',
            'url' => 'https://h5p.org/',
            'description' => 'Open source framework for creating rich, accessible interactive HTML5 content (quizzes, flashcards, interactive videos).'
        ],
        [
            'name' => 'MathJax',
            'url' => 'https://www.mathjax.org/',
            'description' => 'The standard for displaying accessible mathematics. Allows equations to be scaled and read by screen readers.'
        ]
    ],
    'Cognitive Accessibility & Text-to-Speech' => [
        [
            'name' => 'Web Speech API (MDN)',
            'url' => 'https://developer.mozilla.org/en-US/docs/Web/API/Web_Speech_API',
            'description' => 'Native browser API for text-to-speech (Synthesis) and speech recognition. No external heavy library required for basic "Read Aloud" features.'
        ],
        [
            'name' => 'Tota11y',
            'url' => 'https://khan.github.io/tota11y/',
            'description' => 'An accessibility visualization toolkit that helps developers see their site through the lens of assistive technology.'
        ]
    ]
];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top E-Learning Libraries for Accessibility</title>
    <style>
        :root {
            --bg-color: #f9fafb;
            --card-bg: #ffffff;
            --text-main: #111827;
            --text-muted: #4b5563;
            --primary: #2563eb;
            --border: #e5e7eb;
        }

        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            line-height: 1.6;
            background-color: var(--bg-color);
            color: var(--text-main);
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        p.subtitle {
            color: var(--text-muted);
            margin-bottom: 2rem;
        }

        .category {
            margin-bottom: 2.5rem;
        }

        .category-title {
            font-size: 1.25rem;
            font-weight: 600;
            border-bottom: 2px solid var(--border);
            padding-bottom: 0.5rem;
            margin-bottom: 1rem;
        }

        .resource-list {
            list-style: none;
            padding: 0;
        }

        .resource-item {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 1.25rem;
            margin-bottom: 1rem;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .resource-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .resource-link {
            display: block;
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
            margin-bottom: 0.5rem;
        }

        .resource-link:hover {
            text-decoration: underline;
        }

        .resource-desc {
            color: var(--text-muted);
            font-size: 0.95rem;
            margin: 0;
        }
    </style>
</head>

<body>

    <header>
        <h1>Inclusive E-Learning Stack</h1>
        <p class="subtitle">Curated libraries for building cognitive-friendly and accessible learning platforms.</p>
    </header>

    <main>
        <?php foreach ($libraries as $category => $items): ?>
            <section class="category">
                <h2 class="category-title"><?php echo htmlspecialchars($category); ?></h2>
                <ul class="resource-list">
                    <?php foreach ($items as $item): ?>
                        <li class="resource-item">
                            <a href="<?php echo htmlspecialchars($item['url']); ?>" class="resource-link" target="_blank" rel="noopener noreferrer">
                                <?php echo htmlspecialchars($item['name']); ?> &rarr;
                            </a>
                            <p class="resource-desc"><?php echo htmlspecialchars($item['description']); ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        <?php endforeach; ?>
    </main>

    <footer>
        <p style="text-align: center; color: var(--text-muted); margin-top: 3rem; font-size: 0.9rem;">
            Generated for accessible development.
        </p>
    </footer>

</body>

</html>