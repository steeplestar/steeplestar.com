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
        <p>Help keep SteepleStar projects running without intrusive tracking or exploitative practices.</p>
      </section>
      
      <!-- Support Section -->
      <div class="text-content-panel support-section section-spacing">
        <h2>Why Support Matters</h2>
        <p>SteepleStar LLC is an independent, one-person operation creating digital products that respect your privacy and data. Unlike corporate-backed platforms, I rely on community support to keep projects running without intrusive advertising or data harvesting.</p>
        
        <p>Most of the internet is funded by surveillance—tracking everything you do and selling that information to advertisers. I'm proving there's another way: building useful tools that don't exploit users. But that only works if people who value privacy-respecting products are willing to chip in.</p>
      </div>
      
      <!-- What Support Enables -->
      <div class="text-content-panel support-section section-spacing">
        <h2>What Your Support Enables</h2>
        <p>Every dollar contributed goes directly toward:</p>
        <ul>
          <li><strong>Server hosting and infrastructure</strong> - Keeping projects online and accessible</li>
          <li><strong>Domain registration</strong> - Maintaining SteepleStar.com and project domains</li>
          <li><strong>Development time</strong> - Building new features and fixing bugs</li>
          <li><strong>New projects</strong> - Creating additional privacy-focused digital products</li>
          <li><strong>Maintaining independence</strong> - No need to seek venture capital or corporate backing</li>
        </ul>
        
        <p>There are no tiers, no perks, no rewards. Just honest financial support for independent work.</p>
      </div>
      
      <!-- PayPal Donation Section -->
      <div class="text-content-panel support-section section-spacing">
        <h2>How to Support</h2>
        <p>Contributions are accepted via PayPal. Any amount helps, and there are no obligations—this is purely voluntary support.</p>
        
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
      
      <!-- Legal Disclaimer (CRITICAL) -->
      <div class="text-content-panel support-section section-spacing">
        <div class="legal-disclaimer">
          <h3>Important Legal Notice</h3>
          <p><strong>SteepleStar LLC is a for-profit company.</strong> Contributions are voluntary, non-refundable, and <strong>not tax-deductible</strong>.</p>
          
          <p><strong>No goods, services, equity, or rewards are provided in exchange for contributions.</strong> You are under no obligation to contribute, and contributions create no legal obligations for SteepleStar LLC beyond standard transaction processing.</p>
          
          <p>By contributing, you acknowledge that you understand these terms and are making a voluntary financial contribution to support independent digital product development.</p>
          
          <p><strong>This is not an investment.</strong> You receive no ownership stake, no financial returns, and no promises of any kind beyond a sincere thank you for supporting independent development.</p>
        </div>
      </div>
      
      <!-- Transparency Section -->
      <div class="text-content-panel support-section section-spacing">
        <h2>Transparency & Honesty</h2>
        <p>100% of contributions go toward SteepleStar operations. Here's what that means in practice:</p>
        
        <h3>Server & Infrastructure Costs</h3>
        <p>Domain registration, web hosting, database services, and CDN costs to keep projects online and fast.</p>
        
        <h3>Development Time</h3>
        <p>Time spent building features, fixing bugs, responding to issues, and maintaining projects. This is a one-person operation, and development time is the biggest "cost" in terms of opportunity.</p>
        
        <h3>Future Projects</h3>
        <p>Any surplus goes toward creating new digital products with the same privacy-first, user-respecting philosophy.</p>
        
        <h3>What Doesn't Happen</h3>
        <p>Your contribution doesn't fund surveillance tools, data harvesting infrastructure, or advertising platforms. It doesn't go to investors or venture capital returns. It simply supports the work of building better digital products.</p>
      </div>
      
      <!-- Alternatives Section -->
      <div class="text-content-panel support-section section-spacing">
        <h2>Other Ways to Help</h2>
        <p>Financial support isn't the only way to help SteepleStar projects succeed:</p>
        
        <ul>
          <li><strong>Use the products</strong> - Every user matters, especially for word cloud projects that need participation</li>
          <li><strong>Share with others</strong> - Tell people about privacy-respecting alternatives</li>
          <li><strong>Provide feedback</strong> - Report bugs, suggest features, or share your experience</li>
          <li><strong>Spread the word</strong> - Help others discover that ethical digital products exist</li>
        </ul>
        
        <p>Whatever you can contribute—whether financial or not—it makes a difference.</p>
      </div>
      
      <!-- Thank You Section -->
      <div class="text-content-panel support-section">
        <h2>Thank You</h2>
        <p>Whether you choose to contribute financially or simply use and share SteepleStar projects, thank you for believing that the internet can be better than it is today. Every person who values privacy, transparency, and ethical development helps prove that another way is possible.</p>
        
        <p>I'm committed to building digital products that respect users. Your support—in whatever form—makes that possible.</p>
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