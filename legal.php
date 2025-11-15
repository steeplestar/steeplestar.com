<?php
/**
 * SteepleStar LLC - Legal & Privacy Page
 * 
 * Purpose: Combined privacy policy and terms of service
 * Project: Digital Assets Phase 4
 */

// Load SteepleStar standalone configuration
require_once __DIR__ . '/config.php';

// TEMPORARY DEBUG - Remove after confirming it works
echo "<!-- DEBUG: ENV = " . SS_ENV . " -->\n";
echo "<!-- DEBUG: BASE_URL = " . SS_BASE_URL . " -->\n";
echo "<!-- DEBUG: SHARED_URL = " . SS_SHARED_URL . " -->\n";

// Page-specific meta information
$page_title = 'Legal & Privacy - SteepleStar LLC';
$page_description = 'Privacy policy and terms of service for SteepleStar LLC.';
$page_url = canonical_url('legal.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo htmlspecialchars($page_title); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
  
  <!-- Canonical URL -->
  <link rel="canonical" href="<?php echo htmlspecialchars($page_url); ?>">

  <!-- Do not index or preview this page -->
  <meta name="robots" content="noindex, nofollow">

  <!-- SteepleStar Head Icons & Meta Tags -->
  <?php include __DIR__ . '/partials/head-icons.php'; ?>

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
</head>

<body>
  <div class="page-wrapper">
    
    <!-- SteepleStar Navigation Bar -->
    <?php include __DIR__ . '/partials/navbar.php'; ?>

    <!-- Main Content -->
    <main id="main-content">
      
      <!-- Hero Section -->
      <section class="hero-section">
        <h1>Legal & Privacy</h1>
      </section>

      <!-- Main content panel -->
      <article class="text-content-panel section-spacing" role="document" aria-label="Legal and Privacy Information">

        <section>
          <h2>SteepleStar Legal Information</h2>
          <p>
            SteepleStar LLC is an independent digital products company. By using this website, you agree to these terms.
          </p>
        </section>

        <section>
          <h2>Privacy & Data</h2>
          <ul>
            <li>We do not collect personal information through this website.</li>
            <li>We do not know who you are: no accounts and no personal identifiers.</li>
            <li>If you make a financial contribution via PayPal, your payment is processed by PayPal under their privacy policy.</li>
            <li>We do not sell, share, or distribute any information about visitors.</li>
          </ul>
        </section>

        <section>
          <h2>Financial Contributions</h2>
          <p>
            We accept voluntary financial contributions via PayPal to support our projects.
          </p>
          <ul>
            <li>SteepleStar LLC is a for-profit company. Contributions are not tax-deductible.</li>
            <li>All contributions are voluntary, non-refundable, and create no obligations on our part.</li>
            <li>You receive no goods, services, equity, or rewards. This is not an investment.</li>
          </ul>
        </section>

        <section>
          <h2>Legal Stuff</h2>
          <ul>
            <li>The site is provided "as is," without warranties.</li>
            <li>We are not liable for losses or damages arising from your use of the site. Our maximum liability for anything is $100.</li>
            <li>Any legal disputes will be handled in Minnesota courts under Minnesota law (that's where our company is).</li>
          </ul>
        </section>

        <section>
          <h2>Our Projects</h2>
          <p>
            SteepleStar operates multiple digital products. Each project has its own terms and privacy policies. Please review the legal information for each project you use.
          </p>
        </section>

        <section>
          <h2>Changes</h2>
          <p>We may update these terms at any time. Continued use means acceptance.</p>
        </section>

        <section>
          <h2>Contact</h2>
          <p>SteepleStar LLC – <a href="mailto:contact@steeplestar.com">contact@steeplestar.com</a></p>
        </section>

      </article>
      
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
