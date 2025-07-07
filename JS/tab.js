// Create tabs functionality using vanilla JavaScript
function initializeTabs() {
    const tabsContainer = document.createElement('div');
    const tabButtons = document.createElement('div');
    const tabContent = document.createElement('div');

    // Set up structure
    tabsContainer.appendChild(tabButtons);
    tabsContainer.appendChild(tabContent);
    
    // Add classes
    tabButtons.className = 'tabs';
    tabContent.className = 'tab-content';

    // Create tab buttons
    const button1 = document.createElement('button');
    const button2 = document.createElement('button');
        const butto3 = document.createElement('button');

    
    button1.textContent = 'Tab 1';
    button2.textContent = 'Tab 2';
        button2.textContent = 'Tab 3';

    
    
    button1.onclick = () => openTab('tab1');
    button2.onclick = () => openTab('tab2');
        button3.onclick = () => openTab('tab3');

    tabButtons.appendChild(button1);
    tabButtons.appendChild(button2);
        tabButtons.appendChild(button3);


    // Create tab content sections
    const tab1Content = document.createElement('div');
    const tab2Content = document.createElement('div');
        const tab3Content = document.createElement('div');

    
    tab1Content.id = 'tab1';
    tab2Content.id = 'tab2';
    tab2Content.id = 'tab3';
    
    tab1Content.className = 'tab-content';
    tab2Content.className = 'tab-content';
        tab3Content.className = 'tab-content';


    // Add content to tabs (replace with your actual content)
    tab1Content.innerHTML = '<h2>Tab 1 Content</h2>';
    tab2Content.innerHTML = '<h2>Tab 2 Content</h2>';
        tab3Content.innerHTML = '<h2>Tab 3 Content</h2>';


    tabContent.appendChild(tab1Content);
    tabContent.appendChild(tab2Content);
        tabContent.appendChild(tab3Content);


    // Add to document
    document.body.appendChild(tabsContainer);
    
    // Show first tab by default
    openTab('tab1');
}

function openTab(tabId) {
    // Hide all tab content
    const tabContents = document.querySelectorAll('.tab-content');
    tabContents.forEach(content => content.classList.remove('active'));

    // Show the selected tab content
    document.getElementById(tabId).classList.add('active');
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', initializeTabs);