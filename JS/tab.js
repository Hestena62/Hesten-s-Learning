// Create tabs functionality using vanilla JavaScript
function initializeTabs() {
    // Ensure we don't duplicate if run multiple times
    if(document.querySelector('.tabs-generated-container')) return;

    const tabsContainer = document.createElement('div');
    tabsContainer.className = 'tabs-generated-container p-4 border rounded shadow bg-white';
    
    const tabButtons = document.createElement('div');
    const tabContent = document.createElement('div');

    // Set up structure
    tabsContainer.appendChild(tabButtons);
    tabsContainer.appendChild(tabContent);
    
    // Add classes
    tabButtons.className = 'flex border-b mb-4';
    tabContent.className = 'tab-content-container';

    // Create tab buttons
    const button1 = createTabButton('Tab 1', 'tab1');
    const button2 = createTabButton('Tab 2', 'tab2');
    const button3 = createTabButton('Tab 3', 'tab3');

    tabButtons.appendChild(button1);
    tabButtons.appendChild(button2);
    tabButtons.appendChild(button3);

    // Create tab content sections
    const tab1Content = createTabContent('tab1', '<h2>Tab 1 Content</h2><p>This is the first section.</p>');
    const tab2Content = createTabContent('tab2', '<h2>Tab 2 Content</h2><p>This is the second section.</p>');
    const tab3Content = createTabContent('tab3', '<h2>Tab 3 Content</h2><p>This is the third section.</p>');

    tabContent.appendChild(tab1Content);
    tabContent.appendChild(tab2Content);
    tabContent.appendChild(tab3Content);

    // Add to document body (or specific container if preferred)
    // Checking if a specific container exists, otherwise append to body
    const target = document.getElementById('tabs-target') || document.body;
    target.appendChild(tabsContainer);
    
    // Show first tab by default
    openTab('tab1');
}

function createTabButton(text, id) {
    const btn = document.createElement('button');
    btn.textContent = text;
    btn.className = 'px-4 py-2 text-gray-600 hover:text-blue-500 border-b-2 border-transparent focus:outline-none transition-colors tab-button';
    btn.onclick = () => openTab(id);
    btn.dataset.target = id;
    return btn;
}

function createTabContent(id, html) {
    const div = document.createElement('div');
    div.id = id;
    div.className = 'tab-pane hidden animate-fade-in-up';
    div.innerHTML = html;
    return div;
}

function openTab(tabId) {
    // Hide all tab content
    const tabContents = document.querySelectorAll('.tab-pane');
    tabContents.forEach(content => content.classList.add('hidden'));

    // Remove active state from buttons
    const buttons = document.querySelectorAll('.tab-button');
    buttons.forEach(btn => {
        btn.classList.remove('border-blue-500', 'text-blue-600', 'font-bold');
        btn.classList.add('border-transparent', 'text-gray-600');
    });

    // Show selected content
    const activeContent = document.getElementById(tabId);
    if(activeContent) activeContent.classList.remove('hidden');

    // Highlight button
    const activeBtn = document.querySelector(`.tab-button[data-target="${tabId}"]`);
    if(activeBtn) {
        activeBtn.classList.remove('border-transparent', 'text-gray-600');
        activeBtn.classList.add('border-blue-500', 'text-blue-600', 'font-bold');
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', initializeTabs);