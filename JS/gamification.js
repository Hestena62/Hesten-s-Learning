
/**
 * Hesten's Learning: Gamification & Achievement System
 * Handles XP, Levels, and Badges using LocalStorage.
 */

const GAMIFICATION_KEY = 'hl_gamification_data';

const badgeDefinitions = [
    { id: 'first_step', title: 'First Step', desc: 'Started your first lesson', icon: 'fas fa-shoe-prints', color: 'text-blue-500' },
    { id: 'early_bird', title: 'Early Bird', desc: 'Study before 8 AM', icon: 'fas fa-sun', color: 'text-yellow-500' },
    { id: 'night_owl', title: 'Night Owl', desc: 'Study after 8 PM', icon: 'fas fa-moon', color: 'text-indigo-400' },
    { id: 'scholar', title: 'Scholar', desc: 'Completed 5 lessons', icon: 'fas fa-graduation-cap', color: 'text-purple-500' },
    { id: 'assistant_fan', title: 'AI Explorer', desc: 'Asked 5 questions to the Assistant', icon: 'fas fa-robot', color: 'text-cyan-500' },
    { id: 'notetaker', title: 'Great Notes', desc: 'Used the scratchpad for the first time', icon: 'fas fa-pen-nib', color: 'text-amber-500' },
    { id: 'timer_pro', title: 'Focus Master', desc: 'Completed a timer session', icon: 'fas fa-stopwatch', color: 'text-green-500' },
];

let userData = {
    xp: 0,
    level: 1,
    badges: [],
    streak: 0,
    lastActive: null,
    stats: {
        lessonsCompleted: 0,
        questionsAsked: 0,
        notesTaken: 0
    }
};

document.addEventListener('DOMContentLoaded', () => {
    loadGamificationData();
    injectLevelHUD();
    checkTimeBasedBadges();
});

function loadGamificationData() {
    try {
        const stored = localStorage.getItem(GAMIFICATION_KEY);
        if (stored) {
            userData = { ...userData, ...JSON.parse(stored) };
        }
    } catch (e) {
        console.error('Failed to load gamification data', e);
    }
}

function saveGamificationData() {
    localStorage.setItem(GAMIFICATION_KEY, JSON.stringify(userData));
    updateHUD();
<<<<<<< Updated upstream
=======
    // Dispatch event for dashboard updates
    window.dispatchEvent(new CustomEvent('gamification-updated', { detail: userData }));
}

function checkStreakLogic() {
    const today = new Date().toDateString();
    const lastVisit = localStorage.getItem('hl_last_visit');
    const streakCount = parseInt(localStorage.getItem('hl_streak') || '0');

    if (lastVisit !== today) {
        const yesterday = new Date();
        yesterday.setDate(yesterday.getDate() - 1);

        if (lastVisit === yesterday.toDateString()) {
            userData.streak = streakCount + 1;
        } else {
            userData.streak = 1;
        }
        localStorage.setItem('hl_streak', userData.streak);
        localStorage.setItem('hl_last_visit', today);
        saveGamificationData();
    } else {
        userData.streak = streakCount;
    }
>>>>>>> Stashed changes
}

/**
 * Add XP to user and handle level ups
 */
<<<<<<< Updated upstream
=======
window.getBadgeDefinitions = () => badgeDefinitions;
window.getGamificationData = () => userData;
window.getNextLevelXP = (level) => level * 100;

>>>>>>> Stashed changes
window.addXP = function (amount, reason) {
    userData.xp += amount;
    const nextLevelXP = userData.level * 100;

    if (userData.xp >= nextLevelXP) {
        userData.level++;
        userData.xp -= nextLevelXP;
        triggerLevelUpCelebration(userData.level);
    }

    saveGamificationData();
    if (reason) showXPPopup(amount, reason);
};

<<<<<<< Updated upstream
/**
 * Award a badge if the user doesn't already have it
 */
=======
>>>>>>> Stashed changes
window.awardBadge = function (badgeId) {
    if (!userData.badges.includes(badgeId)) {
        userData.badges.push(badgeId);
        const badge = badgeDefinitions.find(b => b.id === badgeId);
        if (badge) {
            showBadgeNotification(badge);
            window.triggerConfetti();
        }
        saveGamificationData();
    }
};

<<<<<<< Updated upstream
/**
 * Increment a specific stat and check for rewards
 */
=======
>>>>>>> Stashed changes
window.incrementStat = function (statName, amount = 1) {
    if (userData.stats[statName] !== undefined) {
        userData.stats[statName] += amount;

<<<<<<< Updated upstream
        // Logical checks
=======
>>>>>>> Stashed changes
        if (statName === 'questionsAsked' && userData.stats.questionsAsked >= 5) awardBadge('assistant_fan');
        if (statName === 'lessonsCompleted' && userData.stats.lessonsCompleted >= 1) awardBadge('first_step');
        if (statName === 'lessonsCompleted' && userData.stats.lessonsCompleted >= 5) awardBadge('scholar');
        if (statName === 'notesTaken' && userData.stats.notesTaken >= 1) awardBadge('notetaker');

        saveGamificationData();
    }
};

function injectLevelHUD() {
    const nav = document.querySelector('nav');
    if (!nav) return;

    const hud = document.createElement('div');
    hud.id = 'hl-level-hud';
    hud.className = 'flex items-center gap-3 bg-white/10 backdrop-blur-md px-4 py-1.5 rounded-full border border-white/20 shadow-sm ml-4 order-last lg:order-none';
    hud.innerHTML = `
        <div class="relative w-8 h-8 flex items-center justify-center font-black text-xs text-white bg-gradient-to-br from-primary to-secondary rounded-lg shadow-inner" id="hud-level-box">
            ${userData.level}
        </div>
        <div class="hidden sm:block w-24 h-2 bg-black/10 rounded-full overflow-hidden">
            <div id="hud-xp-bar" class="h-full bg-gradient-to-r from-primary to-secondary transition-all duration-500" style="width: ${(userData.xp / (userData.level * 100)) * 100}%"></div>
        </div>
        <div class="text-[10px] font-bold text-text-default uppercase tracking-widest opacity-70 cursor-help" id="hud-xp-text" title="Next level at ${userData.level * 100} XP">${userData.xp} XP</div>
    `;

<<<<<<< Updated upstream
    // Insert before search or at end
=======
>>>>>>> Stashed changes
    const searchForm = nav.querySelector('form');
    if (searchForm) {
        nav.insertBefore(hud, searchForm);
    } else {
        nav.appendChild(hud);
    }
}

function updateHUD() {
    const levelBox = document.getElementById('hud-level-box');
    const xpBar = document.getElementById('hud-xp-bar');
    const xpText = document.getElementById('hud-xp-text');

    if (levelBox) levelBox.textContent = userData.level;
    if (xpBar) xpBar.style.width = `${(userData.xp / (userData.level * 100)) * 100}%`;
    if (xpText) {
        xpText.textContent = `${userData.xp} XP`;
        xpText.title = `Next level at ${userData.level * 100} XP`;
    }
}

function showXPPopup(amount, reason) {
    const popup = document.createElement('div');
    popup.className = 'fixed bottom-24 left-1/2 -translate-x-1/2 z-[100] bg-primary text-white px-4 py-2 rounded-full font-bold shadow-xl animate-fade-in-up flex items-center gap-2 pointer-events-none';
    popup.innerHTML = `<i class="fas fa-plus-circle"></i> ${amount} XP <span class="opacity-70 font-medium text-sm">| ${reason}</span>`;
    document.body.appendChild(popup);
    setTimeout(() => {
        popup.style.opacity = '0';
        popup.style.transform = 'translate(-50%, -20px)';
        popup.style.transition = 'all 0.5s ease-out';
        setTimeout(() => popup.remove(), 500);
    }, 2000);
}

function showBadgeNotification(badge) {
    const notify = document.createElement('div');
    notify.className = 'fixed top-24 left-1/2 -translate-x-1/2 z-[150] bg-content-bg border-2 border-primary rounded-2xl p-4 shadow-2xl animate-bounce-short flex items-center gap-4 max-w-sm w-full';
    notify.innerHTML = `
        <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center text-2xl ${badge.color}">
            <i class="${badge.icon}"></i>
        </div>
        <div>
            <div class="text-[10px] font-bold text-primary uppercase tracking-widest">Achievement Unlocked!</div>
            <div class="font-black text-text-default text-lg">${badge.title}</div>
            <div class="text-xs text-text-secondary">${badge.desc}</div>
        </div>
    `;
    document.body.appendChild(notify);
    setTimeout(() => {
        notify.style.opacity = '0';
        notify.style.transform = 'translate(-50%, -20px)';
        notify.style.transition = 'all 0.5s ease-in';
        setTimeout(() => notify.remove(), 500);
    }, 5000);
}

function triggerLevelUpCelebration(level) {
    window.triggerConfetti();
    if (window.showMessageBox) {
        window.showMessageBox(`⭐ LEVEL UP! You are now Level ${level}! Keep up the amazing work!`);
    }
}

function checkTimeBasedBadges() {
    const hours = new Date().getHours();
    if (hours < 8) awardBadge('early_bird');
    if (hours >= 20) awardBadge('night_owl');
}
