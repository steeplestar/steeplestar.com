<?php
/**
 * SteepleStar LLC - 404 Error Page
 * 
 * Custom 404 page that matches site styling and uses shared components
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
$page_title = '404 - Page Not Found - SteepleStar';
$page_description = 'The page you\'re looking for doesn\'t exist.';
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
  
  <!-- SteepleStar-Specific CSS -->
  <link rel="stylesheet" href="css/steeplestar-tokens.css">
  <link rel="stylesheet" href="css/steeplestar-style.css">
</head>

<body>
  <div class="page-wrapper">
    
    <!-- SteepleStar Navigation Bar -->
    <?php include __DIR__ . '/partials/navbar.php'; ?>
    
    <!-- Main Content -->
    <main id="main-content">
      
      <!-- Hero Section -->
      <section class="hero-section">
        <h1>404</h1>
        <p>Page Not Found</p>
      </section>
      
      <!-- Error Message -->
      <div class="text-content-panel section-spacing">
        <p>Sorry, the page you're looking for doesn't exist.</p>
        <p>It might have been moved or deleted.</p>
        <p><a href="index.php">← Return to Home</a></p>
      </div>
      
    </main>
    
    <!-- Shared Footer -->
    <?php include __DIR__ . '/../shared-components/footer/footer.php'; ?>
    
  </div>
</body>
</html>
