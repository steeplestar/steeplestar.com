<?php
/**
 * SteepleStar LLC - Support Page
 * 
 * Purpose: Solicit voluntary financial support for independent development
 * Project: Digital Assets Phase 4
 * 
 * IMPORTANT: This page includes legal disclaimers about for-profit contributions.
 * Contributions are NOT tax-deductible and create no obligations.
 */

// Load SteepleStar standalone configuration
require_once __DIR__ . '/config.php';

// Page-specific meta information
$page_title = 'Support SteepleStar - Independent Digital Products';
$page_description = 'Support independent digital product development. Help keep SteepleStar projects running.';
$page_url = canonical_url('support');
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
  
  <!-- Shared Component CSS (in order) - FIXED to use shared_asset() -->
  <link rel="stylesheet" href="<?php echo shared_asset('base/tokens.css'); ?>">
  <link rel="stylesheet" href="<?php echo shared_asset('base/utilities.css'); ?>">
  <link rel="stylesheet" href="<?php echo shared_asset('base/typography.css'); ?>">
  <link rel="stylesheet" href="<?php echo shared_asset('base/containers.css'); ?>">
  <link rel="stylesheet" href="<?php echo shared_asset('navbar/navbar.css'); ?>">
  <link rel="stylesheet" href="<?php echo shared_asset('footer/footer.css'); ?>">
  
  <!-- SteepleStar-Specific CSS with automatic minification -->
  <link rel="stylesheet" href="<?php echo css_file('steeplestar-tokens'); ?>">
  <link rel="stylesheet" href="<?php echo css_file('steeplestar-style'); ?>">
  
  <!-- PayPal Button Styles (moved from body for HTML5 validation) -->
  <style>
    .pp-5X5PATFW88T28 {
      text-align: center;
      border: none;
      border-radius: 0.25rem;
      min-width: 11.625rem;
      padding: 0 2rem;
      height: 2.625rem;
      font-weight: bold;
      background-color: #FFD140;
      color: #000000;
      font-family: "Helvetica Neue", Arial, sans-serif;
      font-size: 1rem;
      line-height: 1.25rem;
      cursor: pointer;
    }
    
    .pp-ND94Q2ZTFDLJS {
      text-align: center;
      border: none;
      border-radius: 0.25rem;
      min-width: 11.625rem;
      padding: 0 2rem;
      height: 2.625rem;
      font-weight: bold;
      background-color: #FFD140;
      color: #000000;
      font-family: "Helvetica Neue", Arial, sans-serif;
      font-size: 1rem;
      line-height: 1.25rem;
      cursor: pointer;
    }
    
    .pp-K4CBWSEHU7J8C {
      text-align: center;
      border: none;
      border-radius: 0.25rem;
      min-width: 11.625rem;
      padding: 0 2rem;
      height: 2.625rem;
      font-weight: bold;
      background-color: #FFD140;
      color: #000000;
      font-family: "Helvetica Neue", Arial, sans-serif;
      font-size: 1rem;
      line-height: 1.25rem;
      cursor: pointer;
    }
  </style>
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
              <form action="https://www.paypal.com/ncp/payment/5X5PATFW88T28" method="post" target="_blank" style="display:inline-grid;justify-items:center;align-content:start;gap:0.5rem;">
                <input class="pp-5X5PATFW88T28" type="submit" value="Pay Now">
                <img src="https://www.paypalobjects.com/images/Debit_Credit_APM.svg" alt="cards">
                <div style="font-size: 0.75rem;"> Powered by <img src="https://www.paypalobjects.com/paypal-ui/logos/svg/paypal-wordmark-color.svg" alt="paypal" style="height:0.875rem;vertical-align:middle;"></div>
              </form>
            </div>
          </div>
          
          <!-- $20 Contribution -->
          <div class="payment-option">
            <p class="payment-label">Contribute $20</p>
            <div>
              <form action="https://www.paypal.com/ncp/payment/ND94Q2ZTFDLJS" method="post" target="_blank" style="display:inline-grid;justify-items:center;align-content:start;gap:0.5rem;">
                <input class="pp-ND94Q2ZTFDLJS" type="submit" value="Pay Now">
                <img src="https://www.paypalobjects.com/images/Debit_Credit_APM.svg" alt="cards">
                <div style="font-size: 0.75rem;"> Powered by <img src="https://www.paypalobjects.com/paypal-ui/logos/svg/paypal-wordmark-color.svg" alt="paypal" style="height:0.875rem;vertical-align:middle;"></div>
              </form>
            </div>
          </div>
          
          <!-- $100 Contribution -->
          <div class="payment-option">
            <p class="payment-label">Contribute $100</p>
            <div>
              <form action="https://www.paypal.com/ncp/payment/K4CBWSEHU7J8C" method="post" target="_blank" style="display:inline-grid;justify-items:center;align-content:start;gap:0.5rem;">
                <input class="pp-K4CBWSEHU7J8C" type="submit" value="Pay Now">
                <img src="https://www.paypalobjects.com/images/Debit_Credit_APM.svg" alt="cards">
                <div style="font-size: 0.75rem;"> Powered by <img src="https://www.paypalobjects.com/paypal-ui/logos/svg/paypal-wordmark-color.svg" alt="paypal" style="height:0.875rem;vertical-align:middle;"></div>
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
    <?php include __DIR__ . '/shared-components/footer/footer.php'; ?>
    
  </div>
</body>
</html>