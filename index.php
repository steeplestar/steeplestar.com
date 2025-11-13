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
  <meta charset="UTF-8" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0" >

  <!-- Page Title & Description -->
  <title><?php echo htmlspecialchars($page_title); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>" >

  <!-- Canonical URL -->
  <link rel="canonical" href="<?php echo htmlspecialchars($page_url); ?>" >

  <!-- SteepleStar Head Icons & Meta Tags (favicons, mask icon, theme-color, etc.) -->
  <?php include __DIR__ . '/partials/head-icons.php'; ?>

  <!-- Open Graph Tags -->
  <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>" >
  <meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>" >
  <meta property="og:type" content="website" >
  <meta property="og:url" content="<?php echo htmlspecialchars($page_url); ?>" >

  <!-- Twitter Card Tags -->
  <meta name="twitter:card" content="summary" >
  <meta name="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>" >
  <meta name="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>" >

  <!-- Shared Component CSS (in order) -->
  <link rel="stylesheet" href="../shared-components/base/tokens.css" >
  <link rel="stylesheet" href="../shared-components/base/utilities.css" >
  <link rel="stylesheet" href="../shared-components/base/typography.css" >
  <link rel="stylesheet" href="../shared-components/base/containers.css" >
  <link rel="stylesheet" href="../shared-components/navbar/navbar.css" >
  <link rel="stylesheet" href="../shared-components/footer/footer.css" >

  <!-- SteepleStar-Specific CSS -->
  <link rel="stylesheet" href="css/steeplestar-tokens.css" >
  <link rel="stylesheet" href="css/steeplestar-style.css" >

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
        <h1>SteepleStar</h1>
        <p>Building better digital products</p>
      </section>

      <!-- About Section -->
      <div class="text-content-panel section-spacing">
        <h2>Who We Are</h2>
        <p>SteepleStar is not owned by any media giant or corporation. We're a small, independent operation building meaningful digital products that respect users.</p>
        
        <h2>Our Story</h2>
        <p>We built SteepleStar in 2025 because we remember an internet that used to be cool. These days, the internet is heavy on data collection, clickbait, misleading content, aggressive ads, and divisive algorithms.</p>
        
        <p>We believe in doing things differently, and we're ready to prove that, one project at a time. Our flagship and first is <a href="<?php echo htmlspecialchars($zeitgeist_url); ?>" class="inline-nav" target="_blank" rel="noopener noreferrer">Zeitgeist Cloud</a>, a real-time shared digital experience. We bring our values to everything we build, and we stand behind every one of our <a href="projects.php" class="inline-nav">projects</a>.</p>
      </div>

    </main>

    <!-- Shared Footer -->
    <?php include __DIR__ . '/../shared-components/footer/footer.php'; ?>

  </div>
</body>
</html>