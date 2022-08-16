<?php
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
    add_menu_page('Theme Options', 'Shiraz Gallery', 'manage_options', 'shiraz_options', 'shiraz_theme_create_page', get_template_directory_uri() . './Images/shiraz-them-icon.png');

    add_submenu_page('shiraz_options', 'Program & Goals Settings', 'Program & Goals', 'manage_options', "PG-settings", 'shiraz_theme_PG_option');

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
    echo '';
}

function shiraz_theme_PG_option()
{
    require_once(get_template_directory() . './inc/theme/shriaz-PG-menu.php');
}
