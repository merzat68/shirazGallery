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

    function shiraz_admin_page()
    {
        add_menu_page('Theme Options', 'Theme Option', 'manage_options', 'shiraz_options', array($this, 'shiraz_theme_general_page'), get_template_directory_uri() . '/Images/shiraz-them-icon.png');
        add_submenu_page('shiraz_options', 'Theme Options', 'General options', 'manage_options', "shiraz_options", array($this, 'shiraz_theme_general_page'));
        $programHookSuffix = add_submenu_page('shiraz_options', 'Program & Goals Settings', 'Program & Goals', 'manage_options', "program-goals-settings", array($this, 'shiraz_theme_progrma_goals_option'));
        $talentHookSuffix = add_submenu_page('shiraz_options', 'Shiraz Talent settings', 'Shiraz Talent', 'manage_options', "shiraz-talent-settings", array($this, 'shiraz_theme_talent_option'));
        add_action('load-' . $programHookSuffix, array($this, 'shiraz_program_settings_page_load'));
        add_action('load-' . $talentHookSuffix, array($this, 'shiraz_talent_settings_page_load'));
    }

    function shiraz_talent_settings_page_load()
    {
        wp_enqueue_media();
        wp_enqueue_script('my-script', get_template_directory_uri() . '/src/js/shirazSection.js', null, '1', true);
        add_action('wp_ajax_myprefix_get_image', array($this, 'myprefix_get_image'));
    }

    function shiraz_program_settings_page_load()
    {
        wp_enqueue_media();
        wp_enqueue_script('my-script', get_template_directory_uri() . '/src/js/shirazSection.js', null, '1', true);
        add_action('wp_ajax_myprefix_get_image', array($this, 'myprefix_get_image'));
    }

    function myprefix_get_image()
    {
        if (isset($_GET['id'])) {
            $image = wp_get_attachment_image(filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT), 'medium', false, array('id' => 'myprefix-preview-image'));
            $data = array(
                'image'    => $image,
            );
            wp_send_json_success($data);
        } else {
            wp_send_json_error();
        }
    }

    function Shiraz_custom_setting()
    {
        add_settings_section('shiraz-program-goals-options', null, null, 'shiraz_options_program_Goals');
        add_settings_section('shiraz-talent-options', null, null, 'shiraz_options_talent');

        // Shiraz Programs And Goals Option
        add_settings_field('shiraz-program-goals-title', __('Title', 'shirazdomain'), array($this, 'programGoalsTitle'), 'shiraz_options_program_Goals', 'shiraz-program-goals-options');
        register_setting('shiraz-program-goals-settings', 'shiraz-program-goals-title', array('sanitize_callback' => 'sanitize_text_field', 'default' => 'title'));

        add_settings_field('shiraz-program-goals-caption', __('caption', 'shirazdomain'), array($this, 'programGoalsCaption'), 'shiraz_options_program_Goals', 'shiraz-program-goals-options');
        register_setting('shiraz-program-goals-settings', 'shiraz-program-goals-caption', array('sanitize_callback' => 'sanitize_text_field', 'default' => 'caption'));

        add_settings_field('shiraz-program-goals-image-ru', __('Image UpRight', 'shirazdomain'), array($this, 'getImage'), 'shiraz_options_program_Goals', 'shiraz-program-goals-options', array('name' => 'shiraz_gallery_image-ru'));
        register_setting('shiraz-program-goals-settings', 'shiraz-program-goals-image-ru');

        add_settings_field('shiraz-program-goals-image-rd', 'Image DownRight', array($this, 'getImage'), 'shiraz_options_program_Goals', 'shiraz-program-goals-options', array('name' => 'shiraz_gallery_image-rd'));
        register_setting('shiraz-program-goals-settings', 'shiraz-program-goals-image-rd');

        add_settings_field('shiraz-program-goals-image-lu', 'Image UpLeft', array($this, 'getImage'), 'shiraz_options_program_Goals', 'shiraz-program-goals-options', array('name' => 'shiraz_gallery_image-lu'));
        register_setting('shiraz-program-goals-settings', 'shiraz-program-goals-image-lu');

        add_settings_field('shiraz-program-goals-image-ld', 'Image DownLeft', array($this, 'programGoalsImage'), 'shiraz_options_program_Goals', 'shiraz-program-goals-options', array('name' => 'shiraz_gallery_image-ld'));
        register_setting('shiraz-program-goals-settings', 'shiraz-program-goals-image-ld');

        add_settings_field('shiraz-program-goals-text-ru', __('text UpRight', 'shirazdomain'), array($this, 'programGoalstext'), 'shiraz_options_program_Goals', 'shiraz-program-goals-options', array('name' => 'shiraz_gallery_text-ru'));
        register_setting('shiraz-program-goals-settings', 'shiraz-program-goals-text-ru');

        add_settings_field('shiraz-program-goals-text-rd', 'text DownRight', array($this, 'programGoalstext'), 'shiraz_options_program_Goals', 'shiraz-program-goals-options', array('name' => 'shiraz_gallery_text-rd'));
        register_setting('shiraz-program-goals-settings', 'shiraz-program-goals-text-rd');

        add_settings_field('shiraz-program-goals-text-lu', 'text UpLeft', array($this, 'programGoalstext'), 'shiraz_options_program_Goals', 'shiraz-program-goals-options', array('name' => 'shiraz_gallery_text-lu'));
        register_setting('shiraz-program-goals-settings', 'shiraz-program-goals-text-lu');

        add_settings_field('shiraz-program-goals-text-ld', 'text DownLeft', array($this, 'programGoalstext'), 'shiraz_options_program_Goals', 'shiraz-program-goals-options', array('name' => 'shiraz_gallery_text-ld'));
        register_setting('shiraz-program-goals-settings', 'shiraz-program-goals-text-ld');

        // Shiraz Talent Options
        add_settings_field('shiraz-talent-title', 'title', array($this, 'talentTitle'), 'shiraz_options_talent', 'shiraz-talent-options',);
        register_setting('shiraz-talent-settings', 'shiraz-talent-title');

        add_settings_field('shiraz-talent-caption', 'caption', array($this, 'talentCaption'), 'shiraz_options_talent', 'shiraz-talent-options');
        register_setting('shiraz-talent-settings', 'shiraz-talent-caption');

        add_settings_field('shiraz-talent-image', 'image', array($this, 'getImage'), 'shiraz_options_talent', 'shiraz-talent-options', array('name' => 'shiraz_talent_image'));
        register_setting('shiraz-talent-settings', 'shiraz-talent-image');
    }

    function talentTitle()
    {
        $shirazTalentsSection = esc_html(shiraz_get_option('shiraz_talent_title'));
        echo "<input type='text' name='title' id='title' value='{$shirazTalentsSection}' placeholder='title'/>";
    }

    function talentCaption()
    {
        $shirazTalentsSection = esc_html(shiraz_get_option('shiraz_talent_caption'));
        echo "<textarea rows='5' cols='80' name='caption'>{$shirazTalentsSection}</textarea>";
    }

    function getImage($args)
    {
        $image_id = empty(shiraz_get_option("{$args['name']}")) ? '' : shiraz_get_option("{$args['name']}");
        if (!empty($image_id)) {
            // Change with the image size you want to use
            $image = wp_get_attachment_image($image_id, 'medium', false, array('id' => 'myprefix-preview-image'));
        } else {
            // Some default image
            $image = '<img id="myprefix-preview-image" src="https://some.default.image.jpg" />';
        }
        echo "<div class=''><input type='hidden' name='" . $args['name'] . "' id='myprefix_image_id' value='asdasd' class='regular-text' />
        <input type='button' class='button-primary' value='upload image' id='myprefix_media_manager'/>";
        echo $image . "</div>";
    }

    function programGoalstext($args)
    {
        $shirazProgramGoalsSection = empty(shiraz_get_option("{$args['name']}")) ? '' : shiraz_get_option("{$args['name']}");
        echo "<input type='text' name='" . $args['name'] . "' value='$shirazProgramGoalsSection' required/>";
    }

    function programGoalsTitle()
    {
        $shirazProgramGoalsSection = esc_html(shiraz_get_option('shiraz_gallery_title'));
        echo "<input type='text' name='title' id='title' value='{$shirazProgramGoalsSection}' placeholder='title'/>";
    }

    function programGoalsCaption()
    {
        $shirazProgramGoalsSection = esc_html(shiraz_get_option('shiraz_gallery_caption'));
        echo "<textarea rows='5' cols='80' name='caption'>" . $shirazProgramGoalsSection . "</textarea>";
    }

    function programGoalsImage($args)
    {
        $shirazProgramGoalsSection = empty(shiraz_get_option("{$args['name']}")) ? '' : wp_get_attachment_image_src(shiraz_get_option("{$args['name']}"), 'PG-icon')[0];
        echo "<div class='themeOption__image'><input class='themeOption__required' type='file' name='" . $args['name'] . "'>
        <img class='' src='" . $shirazProgramGoalsSection . "' alt='' /></div>";
    }


    function shiraz_theme_general_page()
    {
        echo 'asasas';
    }

    function shiraz_theme_progrma_goals_option()
    {
        require_once(get_template_directory() . './inc/theme/shriaz-program-goals-menu.php');
    }

    function shiraz_theme_talent_option()
    {
        require_once(get_template_directory() . './inc/theme/shiraz-talent-menu.php');
    }

    function languages()
    {
        load_plugin_textdomain('shirazdomain', false, dirname(plugin_basename(__FILE__)) . '/languages');
    }
}

$shirazThemeOptions = new ShirazGallery();
