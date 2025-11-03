<?php
/**
 * SteepleStar LLC - Home Page
 *
 * Purpose: Company introduction and welcome page
 * Project: Digital Assets Phase 4
 *
 * DEPLOYMENT NOTE:
 * When Zeitgeist Cloud goes live, set $zeitgeist_deployed = true;
 * (or set environment variable ZEITGEIST_DEPLOYED=true)
 *
 * This page uses shared-components from Zeitgeist Cloud:
 * - config.php (environment detection)
 * - head-icons.php (meta tags, favicons)
 * - footer.php (footer with logo)
 * - All 6 shared CSS files (including navbar.css for styling)
 *
 * Plus SteepleStar-specific:
 * - partials/navbar.php (navigation with SteepleStar links)
 */

// Load shared configuration
require_once __DIR__ . '/../shared-components/base/config.php';

// Define IS_LOCALHOST if not already defined by config.php
if (!defined('IS_LOCALHOST')) {
  $serverName = $_SERVER['SERVER_NAME'] ?? '';
  $serverAddr = $_SERVER['SERVER_ADDR'] ?? '';
  $remoteAddr = $_SERVER['REMOTE_ADDR'] ?? '';
  define('IS_LOCALHOST',
    $serverName === 'localhost' ||
    in_array($serverAddr, ['127.0.0.1', '::1'], true) ||
    in_array($remoteAddr, ['127.0.0.1', '::1'], true)
  );
}

// Cross-project link: Zeitgeist Cloud
// Toggle to TRUE when Zeitgeist Cloud is deployed to production
$zeitgeist_deployed = (getenv('ZEITGEIST_DEPLOYED') === 'true') ? true : false;

// Automatically works in all deployment scenarios:
// - Both in localhost: links to localhost version
// - SteepleStar live, Zeitgeist pending: shows "Coming Soon"
// - Both live: links to production version
if (IS_LOCALHOST) {
  // In WAMP: always link to local Zeitgeist
  $zeitgeist_url = 'http://localhost/WordCloudProject/';
  $zeitgeist_available = true;
} elseif ($zeitgeist_deployed) {
  // In production AND Zeitgeist is deployed: link to live site (canonical .com)
  $zeitgeist_url = 'https://zeitgeistcloud.com';
  $zeitgeist_available = true;
} else {
  // In production BUT Zeitgeist not deployed yet: disabled link
  $zeitgeist_url = '#';
  $zeitgeist_available = false;
}

// Page-specific meta information
$page_title = 'SteepleStar LLC - Independent Digital Products';
$page_description = 'Independent digital products built with privacy and ethics in mind. Creating tools that respect your data and your rights.';
$page_url = canonical_url('index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Page Title & Description -->
  <title><?php echo htmlspecialchars($page_title); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>" />

  <!-- Canonical URL -->
  <link rel="canonical" href="<?php echo htmlspecialchars($page_url); ?>" />

  <!-- SteepleStar Head Icons & Meta Tags (favicons, mask icon, theme-color, etc.) -->
  <?php include __DIR__ . '/partials/head-icons.php'; ?>

  <!-- Open Graph Tags -->
  <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>" />
  <meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?php echo htmlspecialchars($page_url); ?>" />

  <!-- Twitter Card Tags -->
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>" />
  <meta name="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>" />

  <!-- Shared Component CSS (in order) -->
  <link rel="stylesheet" href="../shared-components/base/tokens.css" />
  <link rel="stylesheet" href="../shared-components/base/utilities.css" />
  <link rel="stylesheet" href="../shared-components/base/typography.css" />
  <link rel="stylesheet" href="../shared-components/base/containers.css" />
  <link rel="stylesheet" href="../shared-components/navbar/navbar.css" />
  <link rel="stylesheet" href="../shared-components/footer/footer.css" />

  <!-- SteepleStar-Specific CSS -->
  <link rel="stylesheet" href="css/steeplestar-tokens.css" />
  <link rel="stylesheet" href="css/steeplestar-style.css" />

  <!-- Structured Data (JSON-LD) -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "SteepleStar LLC",
    "description": "Independent digital products with privacy and ethics at the core",
    "url": "<?php echo htmlspecialchars(base_url()); ?>",
    "foundingDate": "2025-03-06",
    "foundingLocation": {
      "@type": "Place",
      "address": {
        "@type": "PostalAddress",
        "addressRegion": "Minnesota",
        "addressCountry": "US"
      }
    }
  }
  </script>
</head>

<body>
  <div class="page-wrapper">

    <!-- SteepleStar Navigation Bar -->
    <?php include __DIR__ . '/partials/navbar.php'; ?>

    <!-- Main Content -->
    <main id="main-content">

      <!-- Hero Section -->
      <section class="hero-section">
        <h1>Independent Digital Products, Built Right</h1>
        <p>Creating tools that respect your privacy, your data, and your rights. No corporate overlords. No tracking everything you do. Just honest, ethical digital products.</p>
      </section>

      <!-- Who We Are Section -->
      <div class="text-content-panel section-spacing">
        <h2>Who We Are</h2>
        <p>SteepleStar LLC is a one-person, independent operation based in Minnesota. We're not backed by venture capital, corporate media, or anyone else who might compromise our values. That means we can focus on what matters: building digital products that actually serve people, not advertisers.</p>

        <p>We believe the internet can be better than it is today. It doesn't have to be a surveillance machine that tracks your every move and sells your data to the highest bidder. Digital products can be useful, respectful, and sustainable without resorting to invasive practices.</p>
      </div>

      <!-- Our Approach Section -->
      <div class="text-content-panel section-spacing">
        <h2>Our Approach</h2>
        <p>Everything we build follows three core principles:</p>

        <h3>Privacy First</h3>
        <p>We collect the bare minimum data needed to make our products work. No behavioral tracking. No selling your information. No building shadow profiles. Your data stays yours.</p>

        <h3>Transparent & Honest</h3>
        <p>We're upfront about how we make money, what data we collect, and how our products work. No dark patterns. No hidden terms. No tricks.</p>

        <h3>Ethically Monetized</h3>
        <p>We believe creators deserve to be paid for their work, but not at the expense of user privacy or dignity. Our monetization strategies are straightforward and don't involve exploiting users.</p>
      </div>

      <!-- Current Projects Section -->
      <div class="text-content-panel section-spacing">
        <h2>Our First Project</h2>

        <h3>Zeitgeist Cloud</h3>
        <p>A real-time community word cloud where people submit single words that grow larger as more people submit them. It's a simple idea: see what's on everyone's mind right now, captured in one collective visualization.</p>

        <p><strong>What makes it different:</strong> Minimal data collection (just the word, timestamp, and hashed IP for rate limiting), no user accounts required, accessible from the smallest phones to the largest monitors, and built with actual respect for users.</p>

        <p>Zeitgeist Cloud is live now, and it's just the beginning. We have more ideas, more products, and more ways to show that ethical digital development is possible.</p>

        <div class="btn-container">
          <?php if ($zeitgeist_available): ?>
            <a href="<?php echo htmlspecialchars($zeitgeist_url); ?>" class="btn btn-large" target="_blank" rel="noopener noreferrer">Visit Zeitgeist Cloud</a>
          <?php else: ?>
            <span class="btn btn-large" style="opacity: 0.6; cursor: not-allowed;" aria-disabled="true" title="Coming Soon">Zeitgeist Cloud (Coming Soon)</span>
          <?php endif; ?>
        </div>
      </div>

      <!-- Why This Matters Section -->
      <div class="text-content-panel section-spacing">
        <h2>Why This Matters</h2>
        <p>Most of the internet is controlled by a handful of massive corporations whose business model is surveillance. They offer "free" services in exchange for harvesting every detail of your life to sell to advertisers. That's not an inevitable feature of the internet—it's a choice.</p>

        <p>We're making a different choice. Small, independent creators can build sustainable digital products without resorting to invasive tracking or exploitative practices. It's harder, sure, but it's possible. And we're proving it.</p>

        <p>If you believe the internet should respect users instead of exploiting them, we'd love your support.</p>

        <div class="btn-container">
          <a href="support.php" class="btn btn-primary btn-large">Support Our Work</a>
        </div>
      </div>

      <!-- Future Section -->
      <div class="text-content-panel section-spacing">
        <h2>What's Next</h2>
        <p>Zeitgeist Cloud is our first project, but not our last. We're exploring new ideas for digital products that put users first. Stay tuned—we're just getting started.</p>

        <p>Interested in seeing what we're building? Check out our <a href="projects.php">projects page</a> to see what's live and what's coming soon.</p>
      </div>

    </main>

    <!-- Shared Footer -->
    <?php include __DIR__ . '/../shared-components/footer/footer.php'; ?>

  </div>
</body>
</html>