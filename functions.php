<?php

/**
 * Include Theme Functions
 *
 * @package GeneratePress Child Theme
 * @subpackage Functions
 * @version 1.0.0
 */

/**
 * Setup Child Theme
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// Set our theme version.
define('CHILD_THEME_NAME', 'your_theme_name');
define('THEME_VERSION', wp_get_theme()->get('Version'));


function your_theme_name_setup_child_theme()
{
    // Add Child Theme Text Domain.
    load_child_theme_textdomain('generatepress', get_stylesheet_directory() . '/languages');
    add_theme_support('editor-styles');
    add_editor_style('gutenberg/block-editor.css');
}

add_action('after_setup_theme', 'your_theme_name_setup_child_theme', 99);


/**
 * Get all necessary theme files
 */
$child_theme_dir = get_stylesheet_directory();

/**
 * Enqueue Child Theme Assets
 */
function your_theme_name_child_assets()
{

    if (!is_admin()) {
        wp_enqueue_style('your_theme_name_child_css', trailingslashit(get_stylesheet_directory_uri()) . 'style.css');
    }
    wp_enqueue_style('dashicons');
    wp_enqueue_script("your_theme_name-main-js", get_stylesheet_directory_uri() . "/assets/js/main.js", array('jquery'), THEME_VERSION);
}

add_action('wp_enqueue_scripts', 'your_theme_name_child_assets', 99);

/* Apply style for Gutenberg editor */
add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_style('your_theme_name_gblock_css', get_stylesheet_directory_uri() . "/assets/css/block-editor.css", false, '1.0', 'all');
});