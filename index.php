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
        <p>Creating tools that respect your privacy, your data, and your rights. No tracking. No exploitation. Just honest digital products.</p>
      </section>

      <!-- About Section -->
      <div class="text-content-panel section-spacing">
        <h2>Who We Are</h2>
        <p>SteepleStar LLC is a small and fiercely independent operation. We're not backed by venture capital or corporate interests, which means we can focus on building digital products that serve people, not advertisers.</p>
        
        <p>We believe the internet can be better. Digital products can be useful and sustainable without invasive tracking or exploitative practices.</p>
      </div>

      <!-- Principles Section -->
      <div class="text-content-panel section-spacing">
        <h2>How We Build</h2>
        
        <h3>Privacy First</h3>
        <p>We collect only the minimum data needed to make our products work. No behavioral tracking, no selling information, no shadow profiles.</p>

        <h3>Transparent & Honest</h3>
        <p>We're upfront about how we make money, what data we collect, and how our products work. No dark patterns or hidden terms.</p>

        <h3>Ethically Monetized</h3>
        <p>Creators deserve to be paid for their work, but not at the expense of user privacy. Our monetization is straightforward and respectful.</p>
      </div>

      <!-- Zeitgeist Cloud Section -->
      <div class="text-content-panel section-spacing">
        <h2>Zeitgeist Cloud</h2>
        <p>Our first project is a real-time community word cloud. Users submit single words that grow larger as more people submit them, creating a collective visualization of what's on everyone's mind.</p>

        <p><strong>What makes it different:</strong> Minimal data collection, no user accounts required, fully accessible, and built with respect for users.</p>

        <div class="btn-container">
          <?php if ($zeitgeist_available): ?>
            <a href="<?php echo htmlspecialchars($zeitgeist_url); ?>" class="btn-zeitgeist" target="_blank" rel="noopener noreferrer">Visit Zeitgeist Cloud</a>
          <?php else: ?>
            <span class="btn-zeitgeist" style="opacity: 0.6; cursor: not-allowed;" aria-disabled="true" title="Coming Soon">Zeitgeist Cloud (Coming Soon)</span>
          <?php endif; ?>
        </div>
      </div>

    </main>

    <!-- Shared Footer -->
    <?php include __DIR__ . '/../shared-components/footer/footer.php'; ?>

  </div>
</body>
</html>