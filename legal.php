<?php
/**
 * SteepleStar LLC - Projects Page
 * 
 * Purpose: Showcase current and future digital products
 * Project: Digital Assets Phase 4
 * 
 * DEPLOYMENT NOTE:
 * When Zeitgeist Cloud goes live, change line 25:
 * $zeitgeist_deployed = false;  →  $zeitgeist_deployed = true;
 * This will make project links point to the live site.
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

// Load SteepleStar configuration
require_once __DIR__ . '/config.php';

// Define IS_LOCALHOST if not already defined by config.php
if (!defined('IS_LOCALHOST')) {
  define('IS_LOCALHOST', 
    $_SERVER['SERVER_NAME'] === 'localhost' || 
    $_SERVER['SERVER_ADDR'] === '127.0.0.1' ||
    $_SERVER['SERVER_ADDR'] === '::1'
  );
}

// Cross-project link: Zeitgeist Cloud
// Set this to TRUE when Zeitgeist Cloud is deployed to production
$zeitgeist_deployed = false;

if (IS_LOCALHOST) {
  $zeitgeist_url = 'http://localhost/WordCloudProject/';
  $zeitgeist_available = true;
} elseif ($zeitgeist_deployed) {
  $zeitgeist_url = 'https://zeitgeist.cloud';
  $zeitgeist_available = true;
} else {
  $zeitgeist_url = '#';
  $zeitgeist_available = false;
}

// Page-specific meta information
$page_title = 'Our Projects - SteepleStar Digital Products';
$page_description = 'Explore SteepleStar\'s portfolio of privacy-focused digital products, including Zeitgeist Cloud word cloud platform and upcoming projects.';
$page_url = canonical_url('projects.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Page Title & Description -->
  <title><?php echo htmlspecialchars($page_title); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
  
  <!-- Canonical URL -->
  <link rel="canonical" href="<?php echo htmlspecialchars($page_url); ?>">
  
  <!-- SteepleStar Head Icons & Meta Tags -->
  <?php include __DIR__ . '/partials/head-icons.php'; ?>
  
  <!-- Open Graph Tags -->
  <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
  <meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo htmlspecialchars($page_url); ?>">
  
  <!-- Twitter Card Tags -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>">
  <meta name="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>">
  
  <!-- Shared Component CSS (in order) -->
  <link rel="stylesheet" href="<?php echo shared_asset('base/tokens.css'); ?>">
  <link rel="stylesheet" href="<?php echo shared_asset('base/utilities.css'); ?>">
  <link rel="stylesheet" href="<?php echo shared_asset('base/typography.css'); ?>">
  <link rel="stylesheet" href="<?php echo shared_asset('base/containers.css'); ?>">
  <link rel="stylesheet" href="<?php echo shared_asset('navbar/navbar.css'); ?>">
  <link rel="stylesheet" href="<?php echo shared_asset('footer/footer.css'); ?>">
  
  <!-- SteepleStar-Specific CSS -->
  <link rel="stylesheet" href="<?php echo css_file('steeplestar-tokens'); ?>">
  <link rel="stylesheet" href="<?php echo css_file('steeplestar-style'); ?>">
  
  <!-- Structured Data (JSON-LD) -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "CollectionPage",
    "name": "SteepleStar Projects",
    "description": "Portfolio of privacy-focused digital products by SteepleStar LLC",
    "url": "<?php echo htmlspecialchars($page_url); ?>",
    "publisher": {
      "@type": "Organization",
      "name": "SteepleStar LLC"
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
        <h1>Our Projects</h1>
        <p>Here's what we're building.</p>
      </section>
      
      <!-- Introduction -->
      <div class="text-content-panel section-spacing">
        <p>We're just getting started. Explore what's live now, and check back to see what's next.</p>
      </div>
      
      <!-- Projects Grid -->
      <div class="projects-grid section-spacing">
        
        <!-- Project 1: Zeitgeist Cloud -->
        <div class="project-card">
          <span class="project-status">Coming Soon</span>
          <h3>Zeitgeist Cloud</h3>
          <p>A real-time community word cloud. Submit a word, watch it grow as others submit the same one. See what's on everyone's mind right now.</p>
          
          <div class="project-image">
            <img src="images/zeitgeist-preview.jpg" alt="Zeitgeist Cloud word cloud visualization" loading="lazy">
          </div>
          
          <?php if ($zeitgeist_available): ?>
            <a href="<?php echo htmlspecialchars($zeitgeist_url); ?>" class="btn-zeitgeist" target="_blank" rel="noopener noreferrer" style="margin-top: 1rem;">Visit Zeitgeist Cloud</a>
          <?php else: ?>
            <span class="btn-zeitgeist" style="opacity: 0.6; cursor: not-allowed; margin-top: 1rem;" aria-disabled="true" title="Coming Soon">Zeitgeist Cloud (Coming Soon)</span>
          <?php endif; ?>
        </div>
        
        <!-- Project 2: Future Project (Placeholder) -->
        <div class="project-card">
          <span class="project-status coming-soon">Up Ahead</span>
          <h3>Project #2</h3>
          <p>We're figuring out what's next. Stay tuned.</p>
        </div>
        
        <!-- Project 3: Future Project (Placeholder) -->
        <div class="project-card">
          <span class="project-status coming-soon">Up Ahead</span>
          <h3>Project #3</h3>
          <p>More to come. We're taking our time to get it right.</p>
        </div>
        
      </div>
      
      <!-- Back to Home -->
      <div class="text-content-panel">
        <p class="text-center"><a href="index.php">← Back to Home</a></p>
      </div>
      
    </main>
    
    <!-- Shared Footer -->
    <?php include shared_asset('footer/footer.php'); ?>
    
  </div>
</body>
</html>