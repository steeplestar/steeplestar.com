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
          <h2>Privacy &amp; Data</h2>
          <p>
            We try to keep data collection to the bare minimum.
          </p>
          <p>
            Like most websites, our hosting environment automatically creates basic server logs when you visit. These logs
            can include your IP address, the pages requested, and general browser or device information. They exist mainly
            so the site can function, stay secure, and be debugged when something breaks. We do not use this information to
            try to figure out who you are, and we do not sell or trade it.
          </p>
          <p>
            Payments processed by PayPal are subject to PayPal’s own terms and privacy practices, which are outside of our
            control. You can read more in the
            <a href="https://www.paypal.com/us/legalhub/paypal/privacy-full"
               target="_blank" rel="noopener noreferrer">PayPal Privacy Statement</a>.
          </p>
        </section>

        <section>
          <h2>Contributions</h2>
          <p>
            We accept voluntary financial contributions via PayPal to support our projects. SteepleStar LLC is a for-profit
            company, and contributions are not tax-deductible.
          </p>
          <p>
            Contributions are non-refundable and do not create any obligations on our part. You do not receive goods,
            services, equity, or rewards in exchange for a contribution. This is not an investment.
          </p>
        </section>

        <section>
          <h2>Legal Stuff</h2>
          <p>
            This site is provided "as is," without warranties of any kind, express or implied. To the fullest extent allowed
            by law, we are not liable for losses or damages arising from your use of the site. Our maximum liability for
            anything related to the site is $100.
          </p>
          <p>
            Any legal disputes will be handled in Minnesota courts under Minnesota law (that's where our company is).
          </p>
        </section>

        <section>
          <h2>Our Projects</h2>
          <p>
            SteepleStar operates multiple digital products, and each project may have its own specific terms and privacy
            details. When you use a particular project, please review the legal or privacy information provided for that
            project, as it may describe additional practices beyond this general page.
          </p>
        </section>

        <section>
          <h2>Changes</h2>
          <p>
            We may update these terms at any time. Continued use of this site after changes are posted means you accept the
            updated terms.
          </p>
        </section>

        <section>
          <h2>Contact</h2>
          <p>
            SteepleStar LLC – <a href="mailto:contact@steeplestar.com">contact@steeplestar.com</a>
          </p>
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
