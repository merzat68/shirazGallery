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

class ShirazGallery
{
    function __construct()
    {
        add_action('admin_menu', array($this, 'shiraz_admin_page'));
        add_action('admin_init', array($this, 'Shiraz_custom_setting'));
        add_action('init', array($this, 'languages'));
    }

    function languages()
    {
        load_plugin_textdomain('shirazdomain', false, dirname(plugin_basename(__FILE__)) . '/languages');
    }

    function Shiraz_custom_setting()
    {
        add_settings_section('shiraz-gp-options', null, null, 'shiraz_options');

        add_settings_field('shiraz-gp-title', __('Title', 'shirazdomain'), array($this, 'programGoalsTitle'), 'shiraz_options', 'shiraz-gp-options');
        register_setting('shiraz-settings-group', 'shiraz-gp-title', array('sanitize_callback' => 'sanitize_text_field', 'default' => 'title'));

        add_settings_field('shiraz-gp-caption', __('caption', 'shirazdomain'), array($this, 'programGoalsCaption'), 'shiraz_options', 'shiraz-gp-options');
        register_setting('shiraz-settings-group', 'shiraz-gp-caption', array('sanitize_callback' => 'sanitize_text_field', 'default' => 'caption'));

        add_settings_field('shiraz-gp-image-ru', __('Image UpRight', 'shirazdomain'), array($this, 'programGoalsImage'), 'shiraz_options', 'shiraz-gp-options', array('name' => 'shiraz_gallery_image-ru'));
        register_setting('shiraz-settings-group', 'shiraz-gp-image-ru');

        add_settings_field('shiraz-gp-image-rd', 'Image DownRight', array($this, 'programGoalsImage'), 'shiraz_options', 'shiraz-gp-options', array('name' => 'shiraz_gallery_image-rd'));
        register_setting('shiraz-settings-group', 'shiraz-gp-image-rd');

        add_settings_field('shiraz-gp-image-lu', 'Image UpLeft', array($this, 'programGoalsImage'), 'shiraz_options', 'shiraz-gp-options', array('name' => 'shiraz_gallery_image-lu'));
        register_setting('shiraz-settings-group', 'shiraz-gp-image-lu');

        add_settings_field('shiraz-gp-image-ld', 'Image DownLeft', array($this, 'programGoalsImage'), 'shiraz_options', 'shiraz-gp-options', array('name' => 'shiraz_gallery_image-ld'));
        register_setting('shiraz-settings-group', 'shiraz-gp-image-ld');
    }

    function programGoalsTitle()
    {
        $shirazPG = esc_attr(shiraz_get_option('shiraz_gallery_title'));
        echo "<input type='text' name='title' id='title' value='{$shirazPG}' placeholder='title'/>";
    }

    function programGoalsCaption()
    {
        $shirazPG = esc_attr(shiraz_get_option('shiraz_gallery_caption'));
        echo "<textarea rows='5' cols='80' name='caption'>" . $shirazPG . "</textarea>";
    }

    function programGoalsImage($args)
    {
        // var_dump($args);
        $imageURl = empty(shiraz_get_option("{$args['name']}")) ? '' : wp_get_attachment_image_src(shiraz_get_option("{$args['name']}"), 'PG-icon')[0];
        echo "<div class='themeOption__image'><input type='file' name='" . $args['name'] . "'/>
    <img class='' src='" . $imageURl . "' alt='' /></div>";
    }

    function shiraz_admin_page()
    {
        add_menu_page('Theme Options', 'Theme Option', 'manage_options', 'shiraz_options', array($this, 'shiraz_theme_general_page'), get_template_directory_uri() . '/Images/shiraz-them-icon.png');
        add_submenu_page('shiraz_options', 'Theme Options', 'General options', 'manage_options', "shiraz_options", array($this, 'shiraz_theme_general_page'));
        add_submenu_page('shiraz_options', 'Program & Goals Settings', 'Program & Goals', 'manage_options', "PG-settings", array($this, 'shiraz_theme_PG_option'));
    }

    function shiraz_theme_general_page()
    {
        echo 'asasas';
    }

    function shiraz_theme_PG_option()
    {
        require_once(get_template_directory() . './inc/theme/shriaz-PG-menu.php');
    }
}

$shirazThemeOptions = new ShirazGallery();

/* 
function programsGoalsOptions()
{ ?>
    asdkajskdhakjsdhkjahsdkjh
<?php
}

function programGoalImage()
{
    $numargs = func_num_args();
    echo "Number of arguments: $numargs \n";
    $imageURl = empty(shiraz_get_option('shiraz_gallery_image-ru')) ? '' : wp_get_attachment_image_src(shiraz_get_option('shiraz_gallery_image-ru'), 'medium')[0];
    echo "<div class='themeOption__image'><input type='file' name='Image-ru'/>
    <img class='' src='" . $imageURl . "' alt='' /></div>";
}

function programGoalImageRD()
{
    $imageURl = empty(shiraz_get_option('shiraz_gallery_image-rd')) ? '' : wp_get_attachment_image_src(shiraz_get_option('shiraz_gallery_image-rd'), 'medium')[0];
    echo "<div class='themeOption__image'><input type='file' name='Image-rd'/>
    <img class='' src='" . $imageURl . "' alt='' /></div>";
}

function programGoalImageLU()
{
    $imageURl = empty(shiraz_get_option('shiraz_gallery_image-lu')) ? '' : wp_get_attachment_image_src(shiraz_get_option('shiraz_gallery_image-lu'), 'medium')[0];
    echo "<div class='themeOption__image'><input type='file' name='Image-lu'/>
    <img class='' src='" . $imageURl . "' alt='' /></div>";
}

function programGoalImageLD()
{
    $imageURl = empty(shiraz_get_option('shiraz_gallery_image-ld')) ? '' : wp_get_attachment_image_src(shiraz_get_option('shiraz_gallery_image-ld'), 'medium')[0];
    echo "<div class='themeOption__image'><input type='file' name='Image-ld'/>
    <img class='' src='" . $imageURl . "' alt='' /></div>";
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
 */