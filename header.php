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
      <?php /* REMOVED: Solutions Mega Dropdown */ ?>
      <li><a href="<?php echo home_url(); ?>/case-studies/">Case Studies</a></li>
      <li><a href="<?php echo home_url(); ?>/about/">About</a></li>
      <li><a href="<?php echo home_url(); ?>/faq/">FAQ</a></li>
      <li><a href="<?php echo home_url(); ?>#pricing">Pricing</a></li>
      <li><a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">Blog</a></li>
      <li><a href="<?php echo home_url(); ?>/pilot-signup/">Pilot Signup</a></li>
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
    <?php /* REMOVED: Solutions accordion */ ?>
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
    <li><a class="m-row" href="<?php echo home_url(); ?>/pilot-signup/">Pilot Signup</a></li>
  </ul>
  <a href="<?php echo home_url(); ?>#contact" class="cta-button">Get Started</a>
</div>

