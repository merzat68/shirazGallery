<h1>Shiraz Gallery Theme Option</h1>
<?php

settings_errors();

if (isset($_POST['submit'])) {
    if (empty(shiraz_get_option('shiraz_gallery_title'))) {
        shiraz_add_option('shiraz_gallery_title', $_POST['title']);
    } else {
        shiraz_update_option('shiraz_gallery_title', $_POST['title']);
    }
    if (empty(shiraz_get_option('shiraz_gallery_caption'))) {
        shiraz_add_option('shiraz_gallery_caption', $_POST['caption']);
    } else {
        shiraz_update_option('shiraz_gallery_caption', $_POST['caption']);
    }
}
?>

<form method="post" action="" enctype="multipart/form-data">
    <?php settings_fields('shiraz-settings-group') ?>
    <?php do_settings_sections('shiraz_options') ?>
    <?php submit_button() ?>
</form>