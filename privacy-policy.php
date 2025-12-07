<?php
// --- Page Configuration ---
$pageTitle       = "Privacy Notice | Hesten's Learning";
$pageDescription = "We value your privacy. Learn how Hesten's Learning protects your data and ensures a safe educational environment.";
$pageKeywords    = "privacy policy, data protection, student privacy, education safety, no tracking";
$pageAuthor      = "Hesten's Learning";

include 'src/header.php';
?>

<div
    class="relative bg-gradient-to-br from-primary to-blue-800 text-white pt-16 pb-20 px-4 mb-12 shadow-xl overflow-hidden rounded-b-[3rem]">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none opacity-10">
        <i class="fas fa-user-shield absolute top-10 right-10 text-9xl animate-pulse"></i>
        <div
            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-white/10 rounded-full blur-3xl">
        </div>
    </div>

    <div class="relative z-10 max-w-3xl mx-auto text-center">
        <span
            class="inline-block py-1 px-3 rounded-full bg-white/10 border border-white/20 text-sm font-bold mb-4 uppercase tracking-wider backdrop-blur-md">
            Legal & Trust
        </span>
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4 tracking-tight">Privacy Notice</h1>
        <p class="text-xl text-blue-100 font-light">
            Transparency is key. Here is how we handle your data (spoiler: we don't collected it).
        </p>
    </div>
</div>

<main class="container mx-auto px-4 mb-20 max-w-4xl">

    <div
        class="bg-content-bg rounded-2xl shadow-xl p-8 md:p-12 border border-gray-100 dark:border-gray-700 animate-fade-in-up">

        <!-- Section 1 -->
        <section class="mb-10">
            <h2 class="text-2xl font-bold text-primary mb-4 flex items-center gap-3">
                <i class="fas fa-user-secret text-accent"></i> No Site Tracking
            </h2>
            <p class="text-text-secondary leading-relaxed text-lg">
                We do not use any site tracking technologies such as cookies, web beacons, or analytics services to
                track your activity on our site.
                Please note, however, that our DNS resolver, <strong>Cloudflare</strong>, may log your IP address as
                part of their service to ensure our website is accessible and secure.
            </p>
        </section>

        <!-- Section 2 -->
        <section class="mb-10">
            <h2 class="text-2xl font-bold text-primary mb-4 flex items-center gap-3">
                <i class="fas fa-database text-accent"></i> Information We Collect
            </h2>
            <p class="text-text-secondary leading-relaxed text-lg">
                We do not actively collect personal information on this site unless you choose to provide it to us, such
                as through a contact form.
                In that case, we would collect information like your name and email address <span
                    class="font-bold text-text-default">solely for the purpose of responding to your inquiry</span>.
            </p>
        </section>

        <!-- Section 3 -->
        <section class="mb-10">
            <h2 class="text-2xl font-bold text-primary mb-4 flex items-center gap-3">
                <i class="fas fa-lock text-accent"></i> Data Security
            </h2>
            <p class="text-text-secondary leading-relaxed text-lg">
                We take data security seriously and implement appropriate measures to protect your personal information.
                These measures include using secure protocols (HTTPS) for data transmission and restricting access to
                personal data to authorized personnel only.
                Despite our best efforts, it's important to recognize that no method of transmission over the internet
                or electronic storage is 100% secure.
            </p>
        </section>

        <!-- Section 4 -->
        <section class="mb-10">
            <h2 class="text-2xl font-bold text-primary mb-4 flex items-center gap-3">
                <i class="fas fa-project-diagram text-accent"></i> Third-Party Services
            </h2>
            <p class="text-text-secondary leading-relaxed text-lg mb-4">
                We utilize Cloudflare as our DNS resolver and security layer, which may log your IP address. We
                encourage you to review their privacy policy for more information on how they handle data.
            </p>
            <a href="https://www.cloudflare.com/privacypolicy/" target="_blank"
                class="inline-flex items-center gap-2 text-primary hover:text-secondary font-bold underline decoration-2 underline-offset-2 transition-colors">
                Cloudflare Privacy Policy <i class="fas fa-external-link-alt text-sm"></i>
            </a>
        </section>

        <!-- Section 5 -->
        <section class="mb-10">
            <h2 class="text-2xl font-bold text-primary mb-4 flex items-center gap-3">
                <i class="fas fa-gavel text-accent"></i> Your Rights
            </h2>
            <p class="text-text-secondary leading-relaxed text-lg">
                Depending on your location, you may have the right to request access to, correct, or delete any personal
                information we hold about you.
                If you wish to exercise these rights, please contact us using the details provided below.
            </p>
        </section>

        <!-- Section 6 -->
        <section class="mb-12">
            <h2 class="text-2xl font-bold text-primary mb-4 flex items-center gap-3">
                <i class="fas fa-sync-alt text-accent"></i> Changes to This Notice
            </h2>
            <p class="text-text-secondary leading-relaxed text-lg">
                We may update this privacy notice periodically. We will notify you of any changes by posting the new
                notice on this page.
                We encourage you to review this notice regularly to stay informed about how we are protecting your
                information.
            </p>
        </section>

        <!-- Contact CTA -->
        <div class="bg-base-bg rounded-xl p-8 border-l-4 border-green-500">
            <h3 class="text-xl font-bold text-text-default mb-2">Have questions?</h3>
            <p class="text-text-secondary mb-4">If you have any concerns about our privacy practices, please feel free
                to reach out.</p>
            <a href="/contact.php"
                class="bg-primary text-white px-6 py-3 rounded-lg font-bold hover:bg-secondary transition-colors inline-block shadow-lg">
                Contact Us
            </a>
        </div>

    </div>
</main>

<?php include 'src/footer.php'; ?>