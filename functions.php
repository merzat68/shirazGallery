<?php

include get_template_directory() . './inc/functions/custom-db-query.php';
include get_template_directory() . './inc/functions/custom-post-types.php';
include get_template_directory() . './inc/shiraz-theme-option.php';
include get_template_directory() . '/jdf.php';
//include get_template_directory() . '/inc/search-route.php';

if (!defined('ABSPATH')) exit;

add_action('wp_enqueue_scripts', 'shiraz_files');

function shiraz_files()
{
    wp_enqueue_style('font-awesome', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css');
    wp_enqueue_style('shiraz_main_style', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('shiraz_main_extra_style', get_theme_file_uri('/build/index.css'));
    wp_enqueue_script('main-shiraz-js', get_theme_file_uri('/build/index.js'), NULL, '1.0', true);

    wp_localize_script('main-shiraz-js', 'shirazData', array(
        'root_url' => get_site_url(),
        'nonce' => wp_create_nonce('wp_rest')
    ));
}



add_action('after_setup_theme', 'shiraz_features');

function shiraz_features()
{
    register_nav_menu('headerMenu', 'Header Menu');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('PG-icon', 37, 48, true);
}



add_action('admin_init', 'redirectSubsToFrontend');

function redirectSubsToFrontend()
{
    $ourCurrentUser = wp_get_current_user();

    if (count($ourCurrentUser->roles) == 1 && $ourCurrentUser->roles[0] == 'subscriber') {
        wp_redirect(site_url('/'));
        exit;
    }
}

add_action('wp_loaded', 'noSubsAdminBar');

function noSubsAdminBar()
{
    $ourCurrentUser = wp_get_current_user();

    if (count($ourCurrentUser->roles) == 1 && $ourCurrentUser->roles[0] == 'subscriber') {
        show_admin_bar(false);
    }
}

add_action('admin_enqueue_scripts', 'load_admin_style');

function load_admin_style()
{
    wp_enqueue_style('admin_css', get_template_directory_uri() . './build/admin.css', true, '1.0.0');
}
