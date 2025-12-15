<?php
// --- Page Configuration ---
$pageTitle       = "Our Mission & Vision";
$pageDescription = "The story behind Hesten's Learning. Dedicated to accessible, privacy-focused, and personalized education for students with learning disabilities.";
$pageKeywords    = "education mission, non-profit education, accessibility, learning disabilities, inclusive edtech";
$pageAuthor      = "Hesten's Learning";

include 'src/header.php';
?>

<!-- Hero Section -->
<div
    class="relative bg-gradient-to-br from-indigo-600 via-blue-600 to-purple-600 dark:from-indigo-900 dark:via-blue-900 dark:to-purple-900 text-white pt-20 pb-20 px-4 rounded-b-[2.5rem] shadow-2xl overflow-hidden mb-12 border-b border-white/10">
    <!-- Animated Background -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none opacity-10">
        <i class="fas fa-heart absolute top-20 left-10 text-9xl animate-pulse text-pink-300"></i>
        <i class="fas fa-globe-americas absolute bottom-10 right-20 text-[12rem] rotate-12 text-blue-300"></i>
        <i class="fas fa-seedling absolute top-1/3 right-1/4 text-8xl -rotate-12 text-green-300"></i>
        <div
            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-white/5 rounded-full blur-3xl">
        </div>
    </div>

    <div class="relative z-10 max-w-4xl mx-auto text-center">
        <span
            class="inline-block py-2 px-4 rounded-full bg-white/10 border border-white/20 text-sm font-bold mb-6 uppercase tracking-wider backdrop-blur-md shadow-lg">
            About Hesten's Learning
        </span>
        <h1 class="text-5xl md:text-7xl font-extrabold mb-8 tracking-tight drop-shadow-lg">
            Education is a Right, <br />
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-purple-200">Not a
                Privilege.</span>
        </h1>
        <p class="text-xl md:text-2xl text-blue-50 mb-10 font-light max-w-2xl mx-auto leading-relaxed">
            We are building a world where learning disabilities are not barriers, but unique pathways to success.
        </p>
    </div>
</div>

<main class="container mx-auto px-4 mb-24" id="main-content">

    <!-- Mission & Vision Split -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-24">
        <!-- Mission -->
        <section
            class="bg-content-bg p-10 rounded-3xl shadow-lg border-t-8 border-primary relative overflow-hidden group hover:-translate-y-1 transition-transform duration-300">
            <div class="absolute top-0 right-0 p-8 opacity-5 group-hover:opacity-10 transition-opacity">
                <i class="fas fa-bullseye text-9xl text-primary"></i>
            </div>
            <h2 class="text-3xl font-bold text-text-default mb-6 flex items-center gap-3">
                <i class="fas fa-rocket text-primary"></i> Our Mission
            </h2>
            <p class="text-text-secondary text-lg leading-relaxed mb-6">
                To empower students with learning disabilities by providing free, high-quality, and deeply personalized
                educational tools. We bridge the gap between complex curriculum standards and individual learning needs
                through technology that adapts to the student, not the other way around.
            </p>
        </section>

        <!-- Vision -->
        <section
            class="bg-content-bg p-10 rounded-3xl shadow-lg border-t-8 border-accent relative overflow-hidden group hover:-translate-y-1 transition-transform duration-300">
            <div class="absolute top-0 right-0 p-8 opacity-5 group-hover:opacity-10 transition-opacity">
                <i class="fas fa-eye text-9xl text-accent"></i>
            </div>
            <h2 class="text-3xl font-bold text-text-default mb-6 flex items-center gap-3">
                <i class="fas fa-lightbulb text-accent"></i> Our Vision
            </h2>
            <p class="text-text-secondary text-lg leading-relaxed mb-6">
                A future where every classroom is inclusive by design. We envision an educational landscape where
                "accessibility" isn't an afterthought or a special accommodation, but the default standard for how all
                knowledge is shared.
            </p>
        </section>
    </div>

    <!-- Core Values -->
    <div class="mb-24">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-text-default mb-4">Our Core Values</h2>
            <div class="w-24 h-1 bg-primary mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Value 1 -->
            <div
                class="bg-content-bg p-8 rounded-2xl shadow-md text-center hover:shadow-xl transition-shadow border border-gray-100 dark:border-gray-700">
                <div
                    class="w-16 h-16 mx-auto bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-3xl mb-6">
                    <i class="fas fa-universal-access"></i>
                </div>
                <h3 class="text-xl font-bold text-text-default mb-3">Radical Accessibility</h3>
                <p class="text-text-secondary text-sm">Design for the edges, and you reach everyone. Dyslexia-friendly
                    fonts and screen reader support are our baseline.</p>
            </div>

            <!-- Value 2 -->
            <div
                class="bg-content-bg p-8 rounded-2xl shadow-md text-center hover:shadow-xl transition-shadow border border-gray-100 dark:border-gray-700">
                <div
                    class="w-16 h-16 mx-auto bg-green-100 text-green-600 rounded-full flex items-center justify-center text-3xl mb-6">
                    <i class="fas fa-user-shield"></i>
                </div>
                <h3 class="text-xl font-bold text-text-default mb-3">Privacy First</h3>
                <p class="text-text-secondary text-sm">We believe education shouldn't cost your data. No trackers, no
                    required logins, and no selling student information.</p>
            </div>

            <!-- Value 3 -->
            <div
                class="bg-content-bg p-8 rounded-2xl shadow-md text-center hover:shadow-xl transition-shadow border border-gray-100 dark:border-gray-700">
                <div
                    class="w-16 h-16 mx-auto bg-purple-100 text-purple-600 rounded-full flex items-center justify-center text-3xl mb-6">
                    <i class="fas fa-hand-holding-heart"></i>
                </div>
                <h3 class="text-xl font-bold text-text-default mb-3">Always Free</h3>
                <p class="text-text-secondary text-sm">Quality education resources should be open to all, regardless of
                    economic status or school budget.</p>
            </div>

            <!-- Value 4 -->
            <div
                class="bg-content-bg p-8 rounded-2xl shadow-md text-center hover:shadow-xl transition-shadow border border-gray-100 dark:border-gray-700">
                <div
                    class="w-16 h-16 mx-auto bg-orange-100 text-orange-600 rounded-full flex items-center justify-center text-3xl mb-6">
                    <i class="fas fa-brain"></i>
                </div>
                <h3 class="text-xl font-bold text-text-default mb-3">Neurodiversity</h3>
                <p class="text-text-secondary text-sm">We celebrate different ways of thinking. Our tools are built to
                    support unique processing styles.</p>
            </div>
        </div>
    </div>

    <!-- The "Why" Story Section -->
    <section class="bg-primary rounded-[3rem] p-8 md:p-16 text-white relative overflow-hidden shadow-2xl">
        <div class="absolute top-0 right-0 w-full h-full opacity-10 pointer-events-none">
            <i class="fas fa-quote-right absolute bottom-10 right-10 text-[15rem]"></i>
        </div>

        <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="text-blue-200 font-bold tracking-widest uppercase text-sm mb-2 block">The Origin
                    Story</span>
                <h2 class="text-4xl font-bold mb-6">Why Hesten's Learning Exists</h2>
                <div class="space-y-6 text-lg text-blue-50 leading-relaxed font-light">
                    <p>
                        The traditional education system is built for the "average" student. But averages don't exist in
                        real life. When a student struggles with standard text or rigid timelines, they aren't
                        failing—the system is failing them.
                    </p>
                    <p>
                        I created Hesten's Learning to fill the gap between rigid academic standards and the flexible
                        needs of real students. I wanted a place where a 7th grader could practice 4th-grade math
                        concepts without feeling "behind," and where visual clutter wouldn't get in the way of learning.
                    </p>
                    <p class="font-bold text-white">
                        This isn't just a website; it's a commitment to every student who has ever felt like they didn't
                        fit the mold.
                    </p>
                </div>
                <div class="mt-8">
                    <img src="Images/signature-placeholder.png" alt="Hesten Allison" class="h-12 opacity-80"
                        onerror="this.style.display='none'">
                    <p class="font-bold text-xl mt-2">Hesten Allison</p>
                    <p class="text-blue-200 text-sm">Founder & Developer</p>
                </div>
            </div>

            <!-- Visual Element -->
            <div class="hidden lg:flex justify-center">
                <div class="relative w-80 h-96">
                    <div
                        class="absolute top-0 left-4 w-full h-full bg-blue-500 rounded-2xl transform -rotate-6 opacity-50">
                    </div>
                    <div
                        class="absolute top-0 right-4 w-full h-full bg-indigo-500 rounded-2xl transform rotate-3 opacity-50">
                    </div>
                    <div
                        class="absolute inset-0 bg-white/10 backdrop-blur-lg border border-white/20 rounded-2xl p-8 flex flex-col justify-center items-center text-center shadow-xl">
                        <i class="fas fa-users text-6xl mb-6 text-white"></i>
                        <h3 class="text-2xl font-bold mb-2">Community Driven</h3>
                        <p class="text-blue-100">Built with feedback from real teachers, parents, and students.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <div class="mt-24 text-center">
        <h2 class="text-3xl font-bold text-text-default mb-6">Ready to start learning?</h2>
        <div class="flex justify-center gap-4">
            <a href="/"
                class="bg-primary text-white px-8 py-4 rounded-full font-bold text-lg shadow-lg hover:bg-secondary hover:scale-105 transition-all">
                Browse Curriculum
            </a>
            <a href="/contact.html"
                class="bg-content-bg text-text-default border border-gray-300 dark:border-gray-600 px-8 py-4 rounded-full font-bold text-lg shadow-sm hover:bg-gray-50 dark:hover:bg-gray-800 transition-all">
                Get Involved
            </a>
        </div>
    </div>

</main>

<?php include 'src/footer.php'; ?>