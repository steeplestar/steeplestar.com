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
$page_title = 'Support SteepleStar - Independent Digital Products';
$page_description = 'Support independent digital product development. Help keep SteepleStar projects running.';
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
        <h1>Support SteepleStar</h1>
        <p>Voluntary contributions show support for our work.</p>
      </section>
      
      <!-- Main Content Panel -->
      <div class="text-content-panel support-section section-spacing">
        <h2>Why Support</h2>
        <p>SteepleStar operates on a small scale. Servers, domains, bandwidth, and development all cost money. Financial contributions help offset expenses.</p>
        
        <p>Your contribution matters.</p>
      </div>
      
      <!-- PayPal & Legal Section Combined -->
      <div class="text-content-panel support-section section-spacing">
        <h2>How to Contribute</h2>
        <p>Contribute any amount via PayPal. Financial support is welcome and appreciated.</p>
        
        <!-- Legal Disclaimer -->
        <div class="legal-disclaimer">
          <h3>Legal Notice</h3>
          <p><strong>SteepleStar LLC is a for-profit company.</strong> Contributions are voluntary, non-refundable, and <strong>not tax-deductible</strong>.</p>
          
          <p>No goods, services, equity, or rewards are provided. This is not an investment.</p>
        </div>
        
        <!-- PayPal Button Container -->
        <div class="payment-container">
          
          <!-- $5 Contribution -->
          <div class="payment-option">
            <p class="payment-label">Contribute $5</p>
            <div>
              <style>.pp-5X5PATFW88T28{text-align:center;border:none;border-radius:0.25rem;min-width:11.625rem;padding:0 2rem;height:2.625rem;font-weight:bold;background-color:#FFD140;color:#000000;font-family:"Helvetica Neue",Arial,sans-serif;font-size:1rem;line-height:1.25rem;cursor:pointer;}</style>
              <form action="https://www.paypal.com/ncp/payment/5X5PATFW88T28" method="post" target="_blank" style="display:inline-grid;justify-items:center;align-content:start;gap:0.5rem;">
                <input class="pp-5X5PATFW88T28" type="submit" value="Pay Now" />
                <img src=https://www.paypalobjects.com/images/Debit_Credit_APM.svg alt="cards" />
                <section style="font-size: 0.75rem;"> Powered by <img src="https://www.paypalobjects.com/paypal-ui/logos/svg/paypal-wordmark-color.svg" alt="paypal" style="height:0.875rem;vertical-align:middle;"/></section>
              </form>
            </div>
          </div>
          
          <!-- $20 Contribution -->
          <div class="payment-option">
            <p class="payment-label">Contribute $20</p>
            <div>
              <style>.pp-ND94Q2ZTFDLJS{text-align:center;border:none;border-radius:0.25rem;min-width:11.625rem;padding:0 2rem;height:2.625rem;font-weight:bold;background-color:#FFD140;color:#000000;font-family:"Helvetica Neue",Arial,sans-serif;font-size:1rem;line-height:1.25rem;cursor:pointer;}</style>
              <form action="https://www.paypal.com/ncp/payment/ND94Q2ZTFDLJS" method="post" target="_blank" style="display:inline-grid;justify-items:center;align-content:start;gap:0.5rem;">
                <input class="pp-ND94Q2ZTFDLJS" type="submit" value="Pay Now" />
                <img src=https://www.paypalobjects.com/images/Debit_Credit_APM.svg alt="cards" />
                <section style="font-size: 0.75rem;"> Powered by <img src="https://www.paypalobjects.com/paypal-ui/logos/svg/paypal-wordmark-color.svg" alt="paypal" style="height:0.875rem;vertical-align:middle;"/></section>
              </form>
            </div>
          </div>
          
          <!-- $100 Contribution -->
          <div class="payment-option">
            <p class="payment-label">Contribute $100</p>
            <div>
              <style>.pp-K4CBWSEHU7J8C{text-align:center;border:none;border-radius:0.25rem;min-width:11.625rem;padding:0 2rem;height:2.625rem;font-weight:bold;background-color:#FFD140;color:#000000;font-family:"Helvetica Neue",Arial,sans-serif;font-size:1rem;line-height:1.25rem;cursor:pointer;}</style>
              <form action="https://www.paypal.com/ncp/payment/K4CBWSEHU7J8C" method="post" target="_blank" style="display:inline-grid;justify-items:center;align-content:start;gap:0.5rem;">
                <input class="pp-K4CBWSEHU7J8C" type="submit" value="Pay Now" />
                <img src=https://www.paypalobjects.com/images/Debit_Credit_APM.svg alt="cards" />
                <section style="font-size: 0.75rem;"> Powered by <img src="https://www.paypalobjects.com/paypal-ui/logos/svg/paypal-wordmark-color.svg" alt="paypal" style="height:0.875rem;vertical-align:middle;"/></section>
              </form>
            </div>
          </div>
          
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