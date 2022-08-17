<h1>Program and Goals Option</h1>
<?php

settings_errors();

if (isset($_POST['submit'])) {

    $locations = ['ru', 'rd', 'lu', 'ld'];

    // Get the Title
    if (empty(shiraz_get_option('shiraz_gallery_title')) && !empty($_POST['title'])) {
        shiraz_add_option('shiraz_gallery_title', $_POST['title']);
    } elseif (!empty($_POST['title'])) {
        shiraz_update_option('shiraz_gallery_title', $_POST['title']);
    }

    // Get the Caption
    if (empty(shiraz_get_option('shiraz_gallery_caption')) && !empty($_POST['caption'])) {
        shiraz_add_option('shiraz_gallery_caption', $_POST['caption']);
    } elseif (!empty($_POST['caption'])) {
        shiraz_update_option('shiraz_gallery_caption', $_POST['caption']);
    }

    foreach ($locations as $locs) {

        // Get the Files
        textHandler($_POST["shiraz_gallery_image-$locs"], "shiraz_gallery_image-$locs");

        // Get the Item Titles
        textHandler($_POST["shiraz_gallery_text-$locs"], "shiraz_gallery_text-$locs");
    }
}

function textHandler($text, $locations)
{
    if (empty(shiraz_get_option($locations)) && !empty($text)) {
        shiraz_add_option($locations, $text);
    } elseif (!empty($text)) {
        shiraz_update_option($locations, $text);
    }
}
?>

<form method="post" action="" enctype="multipart/form-data">
    <?php settings_fields('shiraz-program-goals-settings') ?>
    <?php do_settings_sections('shiraz_options_program_Goals') ?>
    <?php submit_button() ?>
</form>