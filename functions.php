<?php
/**
 * Salon Concierge Theme functions and definitions
 */

require_once get_template_directory() . '/inc/constants.php';

function salon_concierge_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'salon-concierge'),
    ));
}
add_action('after_setup_theme', 'salon_concierge_setup');

function salon_concierge_scripts() {
    // Enqueue Tailwind CSS v4 Browser Script (load in footer)
    wp_enqueue_script('tailwind-cdn', 'https://unpkg.com/@tailwindcss/browser@4', array(), null, true);
    
    // Enqueue Lucide Icons (load in footer)
    wp_enqueue_script('lucide', 'https://unpkg.com/lucide@latest', array(), null, true);
    
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Noto+Serif+JP:wght@700&display=swap', array(), null);
    
    // Theme Styles
    wp_enqueue_style('salon-concierge-styles', get_stylesheet_uri());
    
    // Update Lucide initialization to wait for DOM and Tailwind processing
    wp_add_inline_script('lucide', '
        document.addEventListener("DOMContentLoaded", function() {
            lucide.createIcons();
            // Re-run after a short delay to catch dynamically rendered / Tailwind processed icons
            setTimeout(function() { lucide.createIcons(); }, 500);
        });
    ');
}
add_action('wp_enqueue_scripts', 'salon_concierge_scripts');

// Helper function to render Lucide icons in PHP
function salon_icon($name, $class = "") {
    echo salon_icon_html($name, $class);
}

function salon_icon_html($name, $class = "") {
    return '<i data-lucide="' . $name . '" class="' . $class . '"></i>';
}

// Helper function for theme images
function salon_img($path) {
    return get_template_directory_uri() . $path;
}
