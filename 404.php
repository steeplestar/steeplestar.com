<?php
/**
 * SteepleStar LLC - 404 Error Page
 * 
 * Elite 404 with brand-consistent messaging, full accessibility,
 * and automatic CSS minification switching
 */

// Load shared configuration
require_once __DIR__ . '/../shared-components/base/config.php';

// Define IS_LOCALHOST if not already defined by config.php
if (!defined('IS_LOCALHOST')) {
  define('IS_LOCALHOST', 
    $_SERVER['SERVER_NAME'] === 'localhost' || 
    $_SERVER['SERVER_ADDR'] === '127.0.0.1' ||
    $_SERVER['SERVER_ADDR'] === '::1'
  );
}

// Page-specific meta information
$page_title = '404 - Page Not Found | SteepleStar';
$page_description = 'The page you\'re looking for doesn\'t exist. Find what you need from our main pages.';
$page_url = canonical_url('404.php');

// Set proper 404 HTTP status code
http_response_code(404);
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
  
  <!-- Robots: Don't index error pages -->
  <meta name="robots" content="noindex, follow">
  
  <!-- SteepleStar Head Icons & Meta Tags -->
  <?php include __DIR__ . '/partials/head-icons.php'; ?>
  
  <!-- Shared Component CSS (in order) -->
  <link rel="stylesheet" href="../shared-components/base/tokens.css">
  <link rel="stylesheet" href="../shared-components/base/utilities.css">
  <link rel="stylesheet" href="../shared-components/base/typography.css">
  <link rel="stylesheet" href="../shared-components/base/containers.css">
  <link rel="stylesheet" href="../shared-components/navbar/navbar.css">
  <link rel="stylesheet" href="../shared-components/footer/footer.css">
  
  <!-- SteepleStar-Specific CSS with automatic minification -->
  <link rel="stylesheet" href="css/<?php echo css_file('steeplestar-tokens'); ?>">
  <link rel="stylesheet" href="css/<?php echo css_file('steeplestar-style'); ?>">
</head>

<body>
  <div class="page-wrapper">
    
    <!-- Skip to main content for accessibility -->
    <a href="#main-content" class="skip-link">Skip to main content</a>
    
    <!-- SteepleStar Navigation Bar -->
    <?php include __DIR__ . '/partials/navbar.php'; ?>
    
    <!-- Main Content -->
    <main id="main-content">
      
      <!-- Hero Section -->
      <section class="hero-section" role="banner" aria-labelledby="error-heading">
        <h1 id="error-heading">404</h1>
        <p class="hero-subheading">Page Not Found</p>
      </section>
      
      <!-- Error Message & Navigation -->
      <div class="text-content-panel section-spacing">
        <div class="content-width-limiter">
          
          <p class="lead-text">
            The page you're looking for doesn't exist. It might have been moved, 
            deleted, or the URL might be incorrect.
          </p>
          
          <h2 class="section-heading">Where would you like to go?</h2>
          
          <nav aria-label="Recovery navigation" class="error-nav">
            <ul class="navigation-list">
              <li>
                <a href="index.php" class="nav-link-primary">
                  <strong>Home</strong> – Learn about SteepleStar
                </a>
              </li>
              <li>
                <a href="projects.php" class="nav-link-primary">
                  <strong>Projects</strong> – See what we're building
                </a>
              </li>
              <li>
                <a href="support.php" class="nav-link-primary">
                  <strong>Support</strong> – Help keep us independent
                </a>
              </li>
              <li>
                <a href="legal.php" class="nav-link-primary">
                  <strong>Legal & Privacy</strong> – Our commitments to you
                </a>
              </li>
            </ul>
          </nav>
          
          <div class="help-section">
            <p class="small-text">
              <strong>Still can't find what you need?</strong><br>
              We're a small, independent team. If something's broken, we want to know about it.
            </p>
          </div>
          
        </div>
      </div>
      
    </main>
    
    <!-- Shared Footer -->
    <?php include __DIR__ . '/../shared-components/footer/footer.php'; ?>
    
  </div>
  
  <style>
    /* 404-specific styles for navigation list */
    .navigation-list {
      list-style: none;
      padding: 0;
      margin: 2rem 0;
    }
    
    .navigation-list li {
      margin-bottom: 1.25rem;
    }
    
    .nav-link-primary {
      display: block;
      padding: 1rem 1.25rem;
      background: var(--surface-secondary, #f8f9fa);
      border-left: 4px solid var(--brand-primary, #6366f1);
      border-radius: 4px;
      text-decoration: none;
      color: var(--text-primary, #1a1a1a);
      transition: all 0.2s ease;
    }
    
    .nav-link-primary:hover,
    .nav-link-primary:focus {
      background: var(--surface-tertiary, #e9ecef);
      border-left-width: 6px;
      transform: translateX(4px);
    }
    
    .nav-link-primary strong {
      color: var(--brand-primary, #6366f1);
      display: block;
      margin-bottom: 0.25rem;
      font-size: 1.1em;
    }
    
    .help-section {
      margin-top: 3rem;
      padding: 1.5rem;
      background: var(--surface-info, #e7f3ff);
      border-radius: 8px;
      border-left: 4px solid var(--color-info, #0066cc);
    }
    
    .help-section p {
      margin: 0;
    }
    
    .lead-text {
      font-size: 1.125rem;
      line-height: 1.7;
      margin-bottom: 2rem;
      color: var(--text-secondary, #4a5568);
    }
    
    .section-heading {
      font-size: 1.5rem;
      font-weight: 600;
      color: var(--text-primary, #1a1a1a);
      margin: 2rem 0 1rem;
    }
    
    .small-text {
      font-size: 0.95rem;
      line-height: 1.6;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
      .nav-link-primary {
        padding: 0.875rem 1rem;
      }
      
      .lead-text {
        font-size: 1rem;
      }
    }
  </style>
</body>
</html>