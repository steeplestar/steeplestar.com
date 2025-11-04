<?php
/**
 * SteepleStar LLC - Support Page
 * 
 * Purpose: Solicit voluntary financial support for independent development
 * Project: Digital Assets Phase 4
 * 
 * IMPORTANT: This page includes legal disclaimers about for-profit contributions.
 * Contributions are NOT tax-deductible and create no obligations.
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
  define('IS_LOCALHOST', 
    $_SERVER['SERVER_NAME'] === 'localhost' || 
    $_SERVER['SERVER_ADDR'] === '127.0.0.1' ||
    $_SERVER['SERVER_ADDR'] === '::1'
  );
}

// Page-specific meta information
$page_title = 'Support Independent Development - SteepleStar LLC';
$page_description = 'Support independent digital product development. Help keep SteepleStar projects running without intrusive tracking or exploitative practices.';
$page_url = canonical_url('support.php');
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
</head>

<body>
  <div class="page-wrapper">
    
    <!-- SteepleStar Navigation Bar -->
    <?php include __DIR__ . '/partials/navbar.php'; ?>
    
    <!-- Main Content -->
    <main id="main-content">
      
      <!-- Hero Section -->
      <section class="hero-section">
        <h1>Support Independent Development</h1>
        <p>Help keep privacy-respecting digital products online and growing.</p>
      </section>
      
      <!-- Main Support Section -->
      <div class="text-content-panel support-section section-spacing">
        <h2>Why Support</h2>
        <p>SteepleStar is a one-person operation building digital products without surveillance or exploitation. Financial support helps cover hosting, domains, and development time while maintaining independence from corporate interests.</p>
        
        <p>Contributions go toward:</p>
        <ul>
          <li><strong>Infrastructure</strong> - Hosting, domains, and services</li>
          <li><strong>Development</strong> - Time spent building and maintaining projects</li>
          <li><strong>Growth</strong> - Creating new privacy-focused products</li>
        </ul>
      </div>
      
      <!-- PayPal Section -->
      <div class="text-content-panel support-section section-spacing">
        <h2>How to Contribute</h2>
        <p>Contributions are accepted via PayPal. Any amount is appreciated, and there are no obligations or rewards.</p>
        
        <!-- PayPal Button Container -->
        <div class="payment-container">
          <!-- 
            ============================================
            PAYPAL BUTTON INSTALLATION INSTRUCTIONS
            ============================================
            
            To add your PayPal Donate button:
            
            1. Go to: https://www.paypal.com/donate/buttons
            2. Log in to your PayPal Business account
            3. Create a "Donate" button
            4. Customize the button text if desired
            5. Copy the generated HTML code
            6. Paste it here, replacing this comment block
            
            The button code will look something like:
            
            <form action="https://www.paypal.com/donate" method="post" target="_top">
              <input type="hidden" name="business" value="YOUR_PAYPAL_EMAIL">
              <input type="hidden" name="no_recurring" value="0">
              <input type="hidden" name="currency_code" value="USD">
              <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" 
                     border="0" name="submit" title="PayPal - The safer, easier way to pay online!" 
                     alt="Donate with PayPal button">
            </form>
            
            ============================================
          -->
          
          <p><strong>PayPal button will be installed here.</strong></p>
          <p style="font-size: 0.875rem; color: #6B7280;">See HTML comments in source code for installation instructions.</p>
        </div>
      </div>
      
      <!-- Legal Disclaimer -->
      <div class="text-content-panel support-section section-spacing">
        <div class="legal-disclaimer">
          <h3>Legal Notice</h3>
          <p><strong>SteepleStar LLC is a for-profit company.</strong> Contributions are voluntary, non-refundable, and <strong>not tax-deductible</strong>.</p>
          
          <p>No goods, services, equity, or rewards are provided. Contributions create no legal obligations beyond standard transaction processing. This is not an investment.</p>
        </div>
      </div>
      
      <!-- Other Ways to Help -->
      <div class="text-content-panel support-section section-spacing">
        <h2>Other Ways to Help</h2>
        <p>Not interested in financial support? You can help by using the products, sharing them with others, or providing feedback.</p>
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