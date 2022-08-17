<h1>Talent Option</h1>
<?php

settings_errors();


if (isset($_POST['submit'])) {
    // Get the Title
    textHandler($_POST["title"], "shiraz_talent_title");

    // Get the Caption
    textHandler($_POST["caption"], "shiraz_talent_caption");

    // Get the Image
    textHandler($_POST["shiraz_talent_image"], "shiraz_talent_image");
}

function filesHandler($fileName, $fileTmpName, $locations)
{
    if (empty(shiraz_get_option($locations)) && !empty($fileName)) {

        shiraz_add_option($locations, upload_image($fileName, $fileTmpName));
    } elseif (!empty($fileName)) {
        shiraz_update_option($locations, upload_image($fileName, $fileTmpName));
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
    <?php settings_fields('shiraz-talent-settings') ?>
    <?php do_settings_sections('shiraz_options_talent') ?>
    <?php submit_button() ?>
</form>