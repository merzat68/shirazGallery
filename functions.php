<?php
include get_template_directory() . './inc/custom-functions.php';
include get_template_directory() . '/jdf.php';
//include get_template_directory() . '/inc/search-route.php';

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

add_action('wp_enqueue_scripts', 'shiraz_files');

function shiraz_features()
{
    register_nav_menu('headerMenu', 'Header Menu');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('professorImage', 400, 260, false);
    add_image_size('smallImage', 150, 150, false);
}

add_action('after_setup_theme', 'shiraz_features');

function shiraz_adjust_queries($query)
{
    if (!is_admin() && is_post_type_archive('program') && $query->is_main_query()) {
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
        $query->set('posts_per_page', 3);
    }

    $today = date('Y-m-d');
    if (!is_admin() && is_post_type_archive('event') && $query->is_main_query()) {
        $query->set('posts_per_page', 2);
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value');
        $query->set('order', 'ASC');
        $query->set('meta_type', 'DATE');
        $query->set('meta_query', array(
            array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'DATE'
            )
        ));
    }
}

add_action('pre_get_posts', 'shiraz_adjust_queries');


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
function posttypes()
{
    // Set UI labels for Custom Post Type
    $sliderLabels = array(
        'name'                => 'Slider',
        'singular_name'       => 'Slider',
        'menu_name'           => 'Slider',
        'parent_item_colon'   => 'Parent Slider',
        'all_items'           => 'All Slider',
        'view_item'           => 'View Slider',
        'add_new_item'        => 'Add New Slider',
        'add_new'             => 'Add New',
        'edit_item'           => 'Edit Slider',
        'update_item'         => 'Update Slider',
        'search_items'        => 'Search Slider',
        'not_found'           => 'Not Found',
        'not_found_in_trash'  => 'Not found in Trash',
    );

    register_post_type(
        'slider',
        // CPT Options
        array(
            'labels' => $sliderLabels,
            'supports' => array('title', 'excerpt', 'custom-fields'),
            'public' => true,
            'label' => 'slider',
            'menu_icon' => 'dashicons-slides'
        ),
    );

    $courseLabels = array(
        'name'                => 'Course',
        'singular_name'       => 'Course',
        'menu_name'           => 'Course',
        'parent_item_colon'   => 'Parent Course',
        'all_items'           => 'All Course',
        'view_item'           => 'View Course',
        'add_new_item'        => 'Add New Course',
        'add_new'             => 'Add New',
        'edit_item'           => 'Edit Course',
        'update_item'         => 'Update Course',
        'search_items'        => 'Search Course',
        'not_found'           => 'Not Found',
        'not_found_in_trash'  => 'Not found in Trash',
    );

    register_post_type(
        'course',
        // CPT Options
        array(
            'labels' => $courseLabels,
            'supports' => array('title', 'excerpt', 'custom-fields'),
            'public' => true,
            'label' => 'course',
            'menu_icon' => 'dashicons-welcome-learn-more'
        ),
    );

    $eventLabels = array(
        'name'                => 'Event',
        'singular_name'       => 'Event',
        'menu_name'           => 'Event',
        'parent_item_colon'   => 'Parent Event',
        'all_items'           => 'All Event',
        'view_item'           => 'View Event',
        'add_new_item'        => 'Add New Event',
        'add_new'             => 'Add New',
        'edit_item'           => 'Edit Event',
        'update_item'         => 'Update Event',
        'search_items'        => 'Search Event',
        'not_found'           => 'Not Found',
        'not_found_in_trash'  => 'Not found in Trash',
    );

    register_post_type(
        'event',
        // CPT Options
        array(
            'labels' => $eventLabels,
            'supports' => array('title', 'excerpt', 'custom-fields'),
            'public' => true,
            'label' => 'event',
            'menu_icon' => 'dashicons-calendar'
        ),
    );
}
add_action('init', 'posttypes');


add_action("after_switch_theme", "shirazCustomDB");

function shirazCustomDB()
{
    global $wpdb;

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    $table_name = $wpdb->prefix . "shirazGallery";  //get the database table prefix to create my new table

    $sql = "CREATE TABLE $table_name (
      options_id int(10) unsigned NOT NULL AUTO_INCREMENT,
      options_name varchar(255) NOT NULL,
      options_value varchar(255) NOT NULL,
      PRIMARY KEY  (options_id),
      KEY Index_2 (options_name),
      KEY Index_3 (options_value)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

    dbDelta($sql);
}



add_action('admin_menu', 'shiraz_admin_page');

function shiraz_admin_page()
{
    add_menu_page('Theme Options', 'Shiraz Gallery', 'manage_options', 'shiraz_options', 'shiraz_theme_create_page');

    add_submenu_page('shiraz_options', 'Program & Goals Settings', 'Program & Goals', 'manage_options', "PG-settings", 'shiraz_theme_create_page');

    add_action('admin_init', 'Shiraz_custom_setting');
}

function Shiraz_custom_setting()
{
    register_setting('shiraz-settings-group', 'shiraz_gallery_title');
    register_setting('shiraz-settings-group', 'shiraz_gallery_caption');
    add_settings_section('shiraz-gp-options', 'Program & Goals Section Settings', 'programsGoalsOptions', 'shiraz_options');
    add_settings_field('shiraz-gp-title', 'Program & Goals Title', 'programGoalTitle', 'shiraz_options', 'shiraz-gp-options');
    add_settings_field('shiraz-gp-caption', 'Program & Goals Caption', 'programGoalCaption', 'shiraz_options', 'shiraz-gp-options');
}

function programsGoalsOptions()
{
}

function programGoalTitle()
{
    $shirazPGTitle = esc_attr(shiraz_get_option('shiraz_gallery_title'));
    echo "<input type='text' name='title' id='title' value='{$shirazPGTitle}' placeholder='title'/>";
}
function programGoalCaption()
{
    $shirazPGCaption = esc_attr(shiraz_get_option('shiraz_gallery_caption'));
    echo "<textarea rows='5' cols='80' name='caption'>" . $shirazPGCaption . "</textarea>";
}

function shiraz_theme_create_page()
{
    require_once(get_template_directory() . '/inc/templates/shriaz-admin.php');
}
