/**
 * Hesten's Learning - Site-Wide Permalinks
 * Automatically adds link icons to headings and sections for easy sharing.
 */

(function () {
    const permalinkStyles = `
        .permalink-icon {
            opacity: 0;
            margin-left: 0.5rem;
            color: var(--color-primary);
            transition: opacity 0.2s ease, transform 0.2s ease;
            cursor: pointer;
            font-size: 0.8em;
            display: inline-flex;
            align-items: center;
            vertical-align: middle;
            text-decoration: none !important;
        }

        h1:hover .permalink-icon,
        h2:hover .permalink-icon,
        h3:hover .permalink-icon,
        h4:hover .permalink-icon,
        h5:hover .permalink-icon,
        h6:hover .permalink-icon {
            opacity: 0.6;
        }

        .permalink-icon:hover {
            opacity: 1 !important;
            transform: scale(1.1);
        }

        @media print {
            .permalink-icon {
                display: none !important;
            }
        }
    `;

    function initPermalinks() {
        // Inject Styles
        const styleTag = document.createElement('style');
        styleTag.textContent = permalinkStyles;
        document.head.appendChild(styleTag);

        // Select all headings
        const headings = document.querySelectorAll('h1, h2, h3, h4, h5, h6');

        headings.forEach(heading => {
            // Skip headings that already have a permalink or are inside specific excluded containers
            if (heading.querySelector('.permalink-icon') || heading.closest('.no-permalink')) return;

            // 1. Ensure ID exists
            if (!heading.id) {
                const text = heading.textContent.trim().toLowerCase()
                    .replace(/[^\w\s-]/g, '') // remove non-alphanumeric
                    .replace(/\s+/g, '-')     // replace spaces with dashes
                    .substring(0, 50);        // limit length

                // Avoid duplicate IDs
                let finalId = text;
                let counter = 1;
                while (document.getElementById(finalId)) {
                    finalId = `${text}-${counter}`;
                    counter++;
                }
                heading.id = finalId;
            }

            // 2. Create Icon
            const icon = document.createElement('a');
            icon.href = `#${heading.id}`;
            icon.className = 'permalink-icon';
            icon.setAttribute('aria-label', 'Permalink to this section');
            icon.setAttribute('title', 'Copy link to this section');
            icon.innerHTML = '<i class="fas fa-link"></i>';

            // 3. Click handler for copying URL
            icon.addEventListener('click', (e) => {
                e.preventDefault();
                const url = new URL(window.location.href);
                url.hash = heading.id;

                copyToClipboard(url.toString());

                // Show notification using existing site functionality
                if (window.showMessageBox) {
                    window.showMessageBox('Link copied to clipboard!');
                    if (window.triggerConfetti) {
                        window.triggerConfetti();
                    }
                } else {
                    alert('Link copied to clipboard!');
                }

                // Smooth scroll to the element to confirm
                heading.scrollIntoView({ behavior: 'smooth' });
                window.history.pushState(null, null, `#${heading.id}`);
            });

            heading.appendChild(icon);
        });
    }

    function copyToClipboard(text) {
        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(text);
        } else {
            // Fallback
            const textArea = document.createElement("textarea");
            textArea.value = text;
            textArea.style.position = "fixed";
            textArea.style.left = "-999999px";
            textArea.style.top = "-999999px";
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();
            try {
                document.execCommand('copy');
            } catch (err) {
                console.error('Fallback: Unable to copy', err);
            }
            document.body.removeChild(textArea);
        }
    }

    // Initialize
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initPermalinks);
    } else {
        initPermalinks();
    }
})();
