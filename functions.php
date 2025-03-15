<?php
/**
 * ProSEOKit functions and definitions
 */

if (!defined('PROSEOKIT_VERSION')) {
    define('PROSEOKIT_VERSION', '1.0.0');
}

/**
 * Set up theme defaults and register support for various WordPress features.
 */
function proseokit_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
}
add_action('after_setup_theme', 'proseokit_setup');

/**
 * Enqueue scripts and styles.
 */
function proseokit_scripts() {
    // Enqueue Tailwind CSS
    wp_enqueue_style('tailwindcss', get_template_directory_uri() . '/assets/css/tailwind.css', array(), PROSEOKIT_VERSION);
    
    // Enqueue theme style
    wp_enqueue_style('proseokit-style', get_stylesheet_uri(), array('tailwindcss'), PROSEOKIT_VERSION);
    
    // Enqueue theme scripts
    wp_enqueue_script('proseokit-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), PROSEOKIT_VERSION, true);
    
    // Enqueue React and other dependencies
    wp_enqueue_script('react', 'https://unpkg.com/react@17/umd/react.production.min.js', array(), '17.0.0', true);
    wp_enqueue_script('react-dom', 'https://unpkg.com/react-dom@17/umd/react-dom.production.min.js', array('react'), '17.0.0', true);
    
    // Enqueue your custom scripts
    wp_enqueue_script('proseokit-main', get_template_directory_uri() . '/assets/js/main.js', array('react', 'react-dom'), PROSEOKIT_VERSION, true);
    
    // Pass WordPress data to JavaScript
    wp_localize_script('proseokit-main', 'proseokit', array(
        'siteUrl' => get_site_url(),
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('proseokit-nonce'),
    ));

    // Add inline script to prevent FOUC (Flash of Unstyled Content)
    wp_add_inline_script('proseokit-main', 'document.documentElement.className = document.documentElement.className.replace("no-js", "js");', 'after');
}
add_action('wp_enqueue_scripts', 'proseokit_scripts');

/**
 * Add preload for critical assets
 */
function proseokit_preload_assets() {
    echo '<link rel="preload" href="' . get_template_directory_uri() . '/assets/css/tailwind.css" as="style">';
}
add_action('wp_head', 'proseokit_preload_assets', 1);

/**
 * Register widget area.
 */
function proseokit_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'proseokit'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'proseokit'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'proseokit_widgets_init');

/**
 * Register custom post types for SEO tools
 */
function proseokit_register_post_types() {
    register_post_type('seo_tool', array(
        'labels' => array(
            'name' => __('SEO Tools', 'proseokit'),
            'singular_name' => __('SEO Tool', 'proseokit'),
        ),
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-chart-area',
    ));
}
add_action('init', 'proseokit_register_post_types');

/**
 * Register custom taxonomies for SEO tools
 */
function proseokit_register_taxonomies() {
    register_taxonomy('tool_category', 'seo_tool', array(
        'labels' => array(
            'name' => __('Tool Categories', 'proseokit'),
            'singular_name' => __('Tool Category', 'proseokit'),
        ),
        'hierarchical' => true,
        'show_in_rest' => true,
    ));
}
add_action('init', 'proseokit_register_taxonomies');

/**
 * Add REST API endpoints for SEO tools
 */
function proseokit_register_rest_routes() {
    register_rest_route('proseokit/v1', '/tools', array(
        'methods' => 'GET',
        'callback' => 'proseokit_get_tools',
        'permission_callback' => '__return_true',
    ));
}
add_action('rest_api_init', 'proseokit_register_rest_routes');

function proseokit_get_tools() {
    $tools = get_posts(array(
        'post_type' => 'seo_tool',
        'posts_per_page' => -1,
    ));
    
    return rest_ensure_response($tools);
}

/**
 * Add custom menu locations
 */
function proseokit_register_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'proseokit'),
        'footer' => __('Footer Menu', 'proseokit'),
    ));
}
add_action('init', 'proseokit_register_menus');

/**
 * Include the custom nav walker
 */
require_once get_template_directory() . '/inc/class-proseokit-nav-walker.php'; 