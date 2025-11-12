<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
<!-- Preconnect to Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<!-- Google Fonts Inter with font-display swap -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<link rel="icon" type="image/x-icon" href="/favicon.ico">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	
<!-- Preload main stylesheet to avoid render-blocking -->
<?php $style_uri = file_exists( get_template_directory() . '/style.min.css' ) ? get_template_directory_uri() . '/style.min.css' : get_stylesheet_uri(); ?>
<link rel="preload" href="<?php echo esc_url( $style_uri ); ?>" as="style" onload="this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?php echo esc_url( $style_uri ); ?>"></noscript>

<!-- Critical CSS for above-the-fold (keep small!) -->
<style id="critical-css">
body{margin:0;font-family:'Inter',-apple-system,BlinkMacSystemFont,sans-serif;color:#171717;}
header{position:fixed;top:0;width:100%;padding:16px 0;background:rgba(255,255,255,.8);backdrop-filter:blur(12px);border-bottom:1px solid #E5E5E5;}
</style>
<?php
// Dynamic meta description with fallbacks
if ( is_singular() ) {
  $meta_desc = wp_strip_all_tags( get_the_excerpt(), true );
  if ( empty( $meta_desc ) ) {
    $meta_desc = 'Discover AI-powered growth marketing strategies and insights to scale your business from 6 to 7 figures with DemandNow.ai.';
  }
} elseif ( is_home() || is_page_template( 'home.php' ) ) {
  $meta_desc = 'Latest insights and strategies in AI-powered growth marketing. Learn how to transform your content into customers with DemandNow.ai blog.';
} elseif ( is_front_page() ) {
  $meta_desc = 'Turn content into customers with AI-driven marketing. Scale from 6 to 7 figures with DemandNow.ai - proven growth marketing solutions.';
} else {
  $meta_desc = get_bloginfo( 'description' );
  if ( empty( $meta_desc ) ) {
    $meta_desc = 'AI-powered growth marketing solutions to help companies scale from 6 to 7 figures through content that converts browsers into buyers.';
  }
}
?>
<meta name="description" content="<?php echo esc_attr( $meta_desc ); ?>">
<link rel="canonical" href="<?php echo esc_url( get_permalink() ); ?>">
<!-- Open Graph / Twitter -->
<meta property="og:title" content="<?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?>">
<meta property="og:description" content="<?php echo esc_attr( $meta_desc ); ?>">
<meta property="og:url" content="<?php echo esc_url( get_permalink() ); ?>">
<?php if ( has_post_thumbnail() ) { $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); ?>
<meta property="og:image" content="<?php echo esc_url( $thumb[0] ); ?>">
<?php } ?>
<?php wp_head(); ?>
	<meta name="google-site-verification" content="VGm4AvYapLNJDr1VnYXbvjtmJqj43c6DOpLyyZoSBFI" />
</head>
<body <?php body_class(); ?>>
<a class="skip-link screen-reader-text" href="#main-content">Skip to Content</a>

<!-- Header -->
<header>
  <nav aria-label="Primary">
    <!-- Logo -->
    <a href="<?php echo home_url(); ?>" class="logo">
      <div class="logo-icon">⚡</div>
      DemandNow.ai
    </a>

    <!-- Desktop Nav Links -->
    <ul class="nav-links">
      <!-- Solutions Mega Dropdown -->
      <li class="solutions-dropdown">
        <a href="#" class="solutions-dropdown-toggle" onclick="toggleSolutionsDropdown(event)">
          Solutions
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
          </svg>
        </a>
        <div class="solutions-dropdown-panel">
          <div class="solutions-dropdown-content">
            <div class="solutions-grid">
              <!-- BY GROWTH STAGE -->
              <div class="solutions-category">
                <h3>BY GROWTH STAGE</h3>
                <div class="solutions-list">
                  <a href="#" class="solution-item">
                    <div class="solution-icon icon-blue">
                      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                      </svg>
                    </div>
                    <div class="solution-content">
                      <h4>Scale-ups (Series A-C)</h4>
                      <p>Full-funnel demand generation to scale from $1M to $10M ARR</p>
                    </div>
                  </a>
                  <a href="#" class="solution-item">
                    <div class="solution-icon icon-green">
                      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                      </svg>
                    </div>
                    <div class="solution-content">
                      <h4>Growth-stage (6-7 figures)</h4>
                      <p>AI-powered marketing systems for predictable revenue growth</p>
                    </div>
                  </a>
                </div>
              </div>

              <!-- BY MARKETING CHALLENGE -->
              <div class="solutions-category">
                <h3>BY MARKETING CHALLENGE</h3>
                <div class="solutions-list">
                  <a href="#" class="solution-item">
                    <div class="solution-icon icon-purple">
                      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                      </svg>
                    </div>
                    <div class="solution-content">
                      <h4>AI-First SEO & GEO</h4>
                      <p>Optimize for both Google and ChatGPT discovery in 2025</p>
                    </div>
                  </a>
                  <a href="#" class="solution-item">
                    <div class="solution-icon icon-orange">
                      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                      </svg>
                    </div>
                    <div class="solution-content">
                      <h4>Content Velocity at Scale</h4>
                      <p>AI-accelerated content that converts 3x faster</p>
                    </div>
                  </a>
                  <a href="#" class="solution-item">
                    <div class="solution-icon icon-red">
                      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                      </svg>
                    </div>
                    <div class="solution-content">
                      <h4>Full-Funnel Revenue Engine</h4>
                      <p>Integrated strategy from awareness to expansion</p>
                    </div>
                  </a>
                </div>
              </div>

              <!-- BY OUTCOME -->
              <div class="solutions-category">
                <h3>BY OUTCOME</h3>
                <div class="solutions-list">
                  <a href="#" class="solution-item">
                    <div class="solution-icon icon-indigo">
                      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                      </svg>
                    </div>
                    <div class="solution-content">
                      <h4>Pipeline Acceleration</h4>
                      <p>Generate 10x more qualified opportunities</p>
                    </div>
                  </a>
                  <a href="#" class="solution-item">
                    <div class="solution-icon icon-teal">
                      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                      </svg>
                    </div>
                    <div class="solution-content">
                      <h4>Search Dominance</h4>
                      <p>Own your category in AI and traditional search</p>
                    </div>
                  </a>
                  <a href="#" class="solution-item">
                    <div class="solution-icon icon-emerald">
                      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                      </svg>
                    </div>
                    <div class="solution-content">
                      <h4>Content ROI Optimization</h4>
                      <p>Turn content into measurable revenue</p>
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- Case Study Banner -->
            <div class="case-study-banner">
              <div class="case-study-content">
                <div class="case-study-icon">
                  <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                  </svg>
                </div>
                <div class="case-study-text">
                  <h4>See how companies scale from $1M to $10M ARR with AI-powered content</h4>
                  <p>40% organic traffic growth • 180% conversion improvement • $1.2M new revenue</p>
                </div>
              </div>
              <a href="#" class="case-study-button">
                Read case study
                <span>→</span>
              </a>
            </div>
          </div>
        </div>
      </li>
      <li><a href="<?php echo home_url(); ?>/case-studies/">Case Studies</a></li>
      <li><a href="<?php echo home_url(); ?>/about/">About</a></li>
      <li><a href="<?php echo home_url(); ?>/faq/">FAQ</a></li>
      <li><a href="<?php echo home_url(); ?>#pricing">Pricing</a></li>
      <li><a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">Blog</a></li>
      <li><a href="<?php echo home_url(); ?>#contact">Contact</a></li>
    </ul>

    <!-- Desktop CTA -->
    <a href="<?php echo home_url(); ?>#contact" class="cta-button">Get Started</a>

    <!-- Hamburger Button -->
    <button class="mobile-menu-toggle" aria-label="Toggle mobile menu" aria-expanded="false" aria-controls="mobile-navigation">
      <div class="hamburger">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </button>
  </nav>
</header>

<!-- Mobile Navigation -->
<div class="mobile-nav-overlay"></div>
<div id="mobile-navigation" class="mobile-nav-menu" role="dialog" aria-modal="true" aria-label="Mobile navigation menu">
  <ul class="m-nav">
    <li class="m-acc">
      <button class="m-acc-toggle" aria-expanded="false" aria-controls="m-solutions">
        Solutions <span class="m-chevron" aria-hidden="true">▾</span>
      </button>
    <div id="m-solutions" class="m-acc-panel" hidden>
  <h4>By Growth Stage</h4>
  <a href="#" class="m-item">
    <span class="m-ico icon-blue">
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
      </svg>
    </span>
    <span class="m-text">Scale-ups (Series A–C)</span>
  </a>
  <a href="#" class="m-item">
    <span class="m-ico icon-green">
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
      </svg>
    </span>
    <span class="m-text">Growth-stage (6–7 figures)</span>
  </a>

  <h4>By Marketing Challenge</h4>
  <a href="#" class="m-item">
    <span class="m-ico icon-purple">
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
      </svg>
    </span>
    <span class="m-text">AI-First SEO & GEO</span>
  </a>
  <a href="#" class="m-item">
    <span class="m-ico icon-orange">
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
      </svg>
    </span>
    <span class="m-text">Content Velocity at Scale</span>
  </a>
  <a href="#" class="m-item">
    <span class="m-ico icon-red">
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path>
      </svg>
    </span>
    <span class="m-text">Full-Funnel Revenue Engine</span>
  </a>

  <h4>By Outcome</h4>
  <a href="#" class="m-item">
    <span class="m-ico icon-indigo">
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
      </svg>
    </span>
    <span class="m-text">Pipeline Acceleration</span>
  </a>
  <a href="#" class="m-item">
    <span class="m-ico icon-teal">
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
      </svg>
    </span>
    <span class="m-text">Search Dominance</span>
  </a>
  <a href="#" class="m-item">
    <span class="m-ico icon-emerald">
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
      </svg>
    </span>
    <span class="m-text">Content ROI Optimization</span>
  </a>

  <a href="#" class="m-cta-inline">Read case study →</a>
</div>

    </li>
    <li class="m-acc">
      <button class="m-acc-toggle" aria-expanded="false" aria-controls="m-resources">
        Resources <span class="m-chevron" aria-hidden="true">▾</span>
      </button>
      <div id="m-resources" class="m-acc-panel" hidden>
        <a href="<?php echo home_url(); ?>/case-studies/" class="m-link">Case Studies</a>
        <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="m-link">Blog</a>
      </div>
    </li>
    <li class="m-acc">
      <button class="m-acc-toggle" aria-expanded="false" aria-controls="m-company">
        Company <span class="m-chevron" aria-hidden="true">▾</span>
      </button>
      <div id="m-company" class="m-acc-panel" hidden>
        <a href="<?php echo home_url(); ?>/about/" class="m-link">About</a>
        <a href="<?php echo home_url(); ?>/faq/" class="m-link">FAQ</a>
        <a href="<?php echo home_url(); ?>/#contact" class="m-link">Contact</a>
      </div>
    </li>
    <li><a class="m-row" href="<?php echo home_url(); ?>/#pricing">Pricing</a></li>
    <li><a class="m-row" href="<?php echo get_permalink(get_option('page_for_posts')); ?>">Blog</a></li>
  </ul>
  <a href="<?php echo home_url(); ?>#contact" class="cta-button">Get Started</a>
</div>

