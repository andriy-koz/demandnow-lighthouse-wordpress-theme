<?php
/**
 * DemandNow.AI Theme functions and definitions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Theme setup
function demandnow_theme_setup() {
    // Add theme support for title tag
    add_theme_support('title-tag');
    
    // Add theme support for HTML5 markup
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Add theme support for post thumbnails
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'demandnow_theme_setup');

// Enqueue styles and scripts
function demandnow_theme_scripts() {
    $version = wp_get_theme()->get('Version');

    // Use minified stylesheet in production when available
    $style_uri = file_exists( get_template_directory() . '/style.min.css' ) && ! WP_DEBUG
        ? get_template_directory_uri() . '/style.min.css'
        : get_stylesheet_uri();

    wp_enqueue_style( 'demandnow-style', $style_uri, array(), $version );

    // Preload stylesheet and switch rel after load (non-blocking render)
    if ( function_exists( 'wp_style_add_data' ) ) {
        wp_style_add_data( 'demandnow-style', 'rel', 'preload' );
        wp_style_add_data( 'demandnow-style', 'as', 'style' );
        wp_style_add_data( 'demandnow-style', 'onload', "this.rel='stylesheet'" );
    }

    // Use minified JS in production when available
    $script_uri = file_exists( get_template_directory() . '/js/mobile-menu.min.js' ) && ! WP_DEBUG
        ? get_template_directory_uri() . '/js/mobile-menu.min.js'
        : get_template_directory_uri() . '/js/mobile-menu.js';

    wp_enqueue_script( 'demandnow-mobile-menu', $script_uri, array(), $version, true );

    // Defer JS parsing
    if ( function_exists( 'wp_script_add_data' ) ) {
        wp_script_add_data( 'demandnow-mobile-menu', 'defer', true );
    }
}
add_action( 'wp_enqueue_scripts', 'demandnow_theme_scripts' );

// Remove Gutenberg & global styles on the frontend to avoid render-blocking CSS
function demandnow_remove_wp_block_css() {
    if ( ! is_admin() ) {
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'wp-block-library-theme' );
        wp_dequeue_style( 'global-styles' );
        wp_dequeue_style( 'classic-theme-styles' );
    }
}
add_action( 'wp_enqueue_scripts', 'demandnow_remove_wp_block_css', 100 );

// Disable Dashicons & Emoji scripts for unauthenticated users to cut requests
function demandnow_cleanup_assets() {
    if ( ! is_user_logged_in() ) {
        wp_deregister_style( 'dashicons' );
    }

    // Remove emoji scripts & styles
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    add_filter( 'emoji_svg_url', '__return_false' );
}
add_action( 'init', 'demandnow_cleanup_assets' );

// Add custom body classes
function demandnow_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'landing-page';
    }
    return $classes;
}
add_filter('body_class', 'demandnow_body_classes');

// Customize the title separator
function demandnow_title_separator() {
    return '|';
}
add_filter('document_title_separator', 'demandnow_title_separator');

// Remove unnecessary WordPress features for landing page theme
function demandnow_remove_wp_features() {
    // Remove admin bar from front-end
    show_admin_bar(false);
}
add_action('init', 'demandnow_remove_wp_features');

// Custom excerpt length (if needed later)
function demandnow_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'demandnow_excerpt_length');

// Send comprehensive security headers
function demandnow_security_headers( $headers ) {
    // Content Security Policy - more restrictive
    $csp = "default-src 'self'; " .
           "script-src 'self' 'unsafe-inline' https://fonts.googleapis.com; " .
           "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; " .
           "font-src 'self' https://fonts.gstatic.com data:; " .
           "img-src 'self' data: https:; " .
           "object-src 'none'; " .
           "base-uri 'self'; " .
           "form-action 'self'; " .
           "frame-ancestors 'self'";
    
    $headers['Content-Security-Policy'] = $csp;
    $headers['Strict-Transport-Security'] = 'max-age=31536000; includeSubDomains; preload';
    $headers['Cross-Origin-Opener-Policy'] = 'same-origin';
    $headers['Cross-Origin-Embedder-Policy'] = 'require-corp';
    $headers['Permissions-Policy'] = 'accelerometer=(), autoplay=(), camera=(), geolocation=(), microphone=(), payment=(), usb=()';
    $headers['Referrer-Policy'] = 'strict-origin-when-cross-origin';
    $headers['X-Content-Type-Options'] = 'nosniff';
    $headers['X-Frame-Options'] = 'SAMEORIGIN';
    $headers['X-XSS-Protection'] = '1; mode=block';
    
    return $headers;
}
add_filter( 'wp_headers', 'demandnow_security_headers' );

// Add SameSite cookie attributes for enhanced security
function demandnow_secure_cookies() {
    if ( ! is_admin() && ! wp_doing_ajax() ) {
        ini_set( 'session.cookie_samesite', 'Lax' );
        ini_set( 'session.cookie_secure', '1' );
        ini_set( 'session.cookie_httponly', '1' );
    }
}
add_action( 'init', 'demandnow_secure_cookies', 1 );

// Basic rate limiting for form submissions (simple approach)
function demandnow_rate_limit_forms() {
    if ( isset( $_POST['custom_lead_form'] ) ) {
        $ip = $_SERVER['REMOTE_ADDR'] ?? '';
        $limit_key = 'form_submit_' . md5( $ip );
        
        // Check if already submitted in last 60 seconds
        if ( get_transient( $limit_key ) ) {
            wp_die( 'Form submitted too quickly. Please wait a minute before trying again.', 'Rate Limited', array( 'response' => 429 ) );
        }
        
        // Set transient for 60 seconds
        set_transient( $limit_key, time(), 60 );
    }
}
add_action( 'init', 'demandnow_rate_limit_forms', 5 );

// Output Organization schema JSON-LD
function demandnow_output_schema() {
    $org = [
        '@context' => 'https://schema.org',
        '@type'    => 'Organization',
        'name'     => get_bloginfo( 'name' ),
        'url'      => home_url(),
        'logo'     => get_template_directory_uri() . '/screenshot.png',
    ];
    echo "\n<script type=\"application/ld+json\">" . wp_json_encode( $org ) . "</script>\n";
}
add_action( 'wp_head', 'demandnow_output_schema', 90 );

// Security: Remove WordPress version from head
remove_action('wp_head', 'wp_generator');

// DEBUG: Add template debugging (remove after fixing)
function debug_template_info() {
    if (current_user_can('administrator')) {
        global $wp_query;
        echo '<!-- DEBUG INFO: ';
        echo 'is_home: ' . (is_home() ? 'true' : 'false') . ', ';
        echo 'is_front_page: ' . (is_front_page() ? 'true' : 'false') . ', ';
        echo 'is_page: ' . (is_page() ? 'true' : 'false') . ', ';
        if (is_page()) {
            echo 'page_slug: ' . get_post_field('post_name', get_queried_object_id()) . ', ';
        }
        echo 'template: ' . get_page_template_slug() . ' ';
        echo '-->';
    }
}
if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
    add_action( 'wp_head', 'debug_template_info' );
}

// Fix blog URL issue by ensuring proper rewrite rules
function demandnow_fix_blog_rewrite() {
    $blog_page_id = get_option('page_for_posts');
    if ($blog_page_id) {
        $blog_page = get_post($blog_page_id);
        if ($blog_page && $blog_page->post_name === 'blog') {
            // Force flush rewrite rules if blog page exists
            flush_rewrite_rules();
        }
    }
}
add_action('init', 'demandnow_fix_blog_rewrite');

// Capture form submissions
add_action('init', function() {
    if (isset($_POST['custom_lead_form']) && !empty($_POST['email'])) {
        // Sanitize input data
        $lead_data = array(
            'first_name' => sanitize_text_field($_POST['first_name'] ?? ''),
            'last_name' => sanitize_text_field($_POST['last_name'] ?? ''),
            'email' => sanitize_email($_POST['email']),
            'company' => sanitize_text_field($_POST['company'] ?? ''),
            'message' => sanitize_textarea_field($_POST['message'] ?? ''),
            'source' => sanitize_text_field($_POST['source_url'] ?? $_SERVER['HTTP_REFERER']),
            'date' => current_time('mysql')
        );

        // Store in WordPress options table
        $leads = get_option('custom_leads_database', array());
        $leads[] = $lead_data;
        update_option('custom_leads_database', $leads);

        // Optional: Send email notification
        $message = "New lead submission:\n\n";
        foreach($lead_data as $key => $value) {
            $message .= ucfirst(str_replace('_', ' ', $key)) . ": $value\n";
        }
        wp_mail('sales@demandnow.ai', 'New Website Lead', $message);
        
        // Redirect to prevent form resubmission
        $redirect_url = add_query_arg('form_success', '1', $_SERVER['REQUEST_URI']);
        wp_redirect($redirect_url);
        exit;
    }
});

// Create admin page for leads
add_action('admin_menu', function() {
    add_menu_page('Leads', 'Leads', 'manage_options', 'custom-leads', function() {
        $leads = get_option('custom_leads_database', array());
        echo '<div class="wrap"><h1>Leads</h1>';
        
        if (empty($leads)) {
            echo '<p>No leads found</p>';
        } else {
            echo '<table class="wp-list-table widefat fixed striped">';
            echo '<thead><tr>
                <th>Date</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Company</th>
                <th>Source</th>
            </tr></thead>';
            foreach (array_reverse($leads) as $lead) {
                echo "<tr>
                    <td>{$lead['date']}</td>
                    <td>{$lead['first_name']}</td>
                    <td>{$lead['last_name']}</td>
                    <td>{$lead['email']}</td>
                    <td>{$lead['company']}</td>
                    <td>{$lead['source']}</td>
                </tr>";
            }
            echo '</table>';
        }
        echo '</div>';
    });
});

?> 