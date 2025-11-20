<?php
/**
 * SteepleStar LLC - Projects Page
 * 
 * Purpose: Showcase current and future digital products
 * Project: Digital Assets Phase 4
 * 
 * ✅ SIMPLIFIED - Zeitgeist Cloud link always points to production
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

// Zeitgeist Cloud link - ALWAYS points to production
$zeitgeist_url = 'https://zeitgeistcloud.com';

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
  <link rel="stylesheet" href="../shared-components/base/tokens.css">
  <link rel="stylesheet" href="../shared-components/base/utilities.css">
  <link rel="stylesheet" href="../shared-components/base/typography.css">
  <link rel="stylesheet" href="../shared-components/base/containers.css">
  <link rel="stylesheet" href="../shared-components/navbar/navbar.css">
  <link rel="stylesheet" href="../shared-components/footer/footer.css">
  
  <!-- SteepleStar-Specific CSS -->
  <link rel="stylesheet" href="css/steeplestar-tokens.css">
  <link rel="stylesheet" href="css/steeplestar-style.css">
  
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
          <span class="project-status">In Beta Testing</span>
          <h3>Zeitgeist Cloud</h3>
          <p>A real-time community word cloud. Submit a word, watch it grow as others submit the same one. See what's on everyone's mind right now.</p>
          
          <div class="project-image">
            <img src="images/zeitgeist-preview.jpg" alt="Zeitgeist Cloud word cloud visualization" loading="lazy">
          </div>
          
          <a href="<?php echo htmlspecialchars($zeitgeist_url); ?>" class="btn-zeitgeist" target="_blank" rel="noopener noreferrer" style="margin-top: 1rem;">Visit Zeitgeist Cloud</a>
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
    <?php include __DIR__ . '/../shared-components/footer/footer.php'; ?>
    
  </div>
</body>
</html>