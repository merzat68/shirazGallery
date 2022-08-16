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

    if (empty(shiraz_get_option('shiraz_gallery_image-ru'))) {
        shiraz_add_option('shiraz_gallery_image-ru', upload_image($_FILES['shiraz_gallery_image-ru']['name'], $_FILES['shiraz_gallery_image-ru']['tmp_name']));
    } elseif (!empty($_FILES['shiraz_gallery_image-ru']['name'])) {
        shiraz_update_option('shiraz_gallery_image-ru', upload_image($_FILES['shiraz_gallery_image-ru']['name'], $_FILES['shiraz_gallery_image-ru']['tmp_name']));
    }

    if (empty(shiraz_get_option('shiraz_gallery_image-rd'))) {
        shiraz_add_option('shiraz_gallery_image-rd', upload_image($_FILES['shiraz_gallery_image-rd']['name'], $_FILES['shiraz_gallery_image-rd']['tmp_name']));
    } elseif (!empty($_FILES['shiraz_gallery_image-rd']['name'])) {
        shiraz_update_option('shiraz_gallery_image-rd', upload_image($_FILES['shiraz_gallery_image-rd']['name'], $_FILES['shiraz_gallery_image-rd']['tmp_name']));
    }

    if (empty(shiraz_get_option('shiraz_gallery_image-lu'))) {
        shiraz_add_option('shiraz_gallery_image-lu', upload_image($_FILES['shiraz_gallery_image-lu']['name'], $_FILES['shiraz_gallery_image-lu']['tmp_name']));
    } elseif (!empty($_FILES['shiraz_gallery_image-lu']['name'])) {
        shiraz_update_option('shiraz_gallery_image-lu', upload_image($_FILES['shiraz_gallery_image-lu']['name'], $_FILES['shiraz_gallery_image-lu']['tmp_name']));
    }

    if (empty(shiraz_get_option('shiraz_gallery_image-ld'))) {
        shiraz_add_option('shiraz_gallery_image-ld', upload_image($_FILES['shiraz_gallery_image-ld']['name'], $_FILES['shiraz_gallery_image-ld']['tmp_name']));
    } elseif (!empty($_FILES['shiraz_gallery_image-ld']['name'])) {
        shiraz_update_option('shiraz_gallery_image-ld', upload_image($_FILES['shiraz_gallery_image-ld']['name'], $_FILES['shiraz_gallery_image-ld']['tmp_name']));
    }
}

function upload_image($file_name, $file_temp)
{
    $upload_dir = wp_upload_dir();
    $image_data = file_get_contents($file_temp);
    $filename = basename($file_name);
    $filetype = wp_check_filetype($file_name);
    $filename = time() . '.' . $filetype['ext'];

    if (wp_mkdir_p($upload_dir['path'])) {
        $file = $upload_dir['path'] . '/' . $filename;
    } else {
        $file = $upload_dir['basedir'] . '/' . $filename;
    }

    // print_r($upload_dir['url'] . '/' . $filename);
    file_put_contents($file, $image_data);
    $wp_filetype = wp_check_filetype($filename, null);
    $attachment = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => sanitize_file_name($filename),
        'post_content' => '',
        'post_status' => 'inherit'
    );

    $attach_id = wp_insert_attachment($attachment, $file);
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $attach_data = wp_generate_attachment_metadata($attach_id, $file);
    wp_update_attachment_metadata($attach_id, $attach_data);

    return $attach_id;
}
?>

<form method="post" action="" enctype="multipart/form-data">
    <?php settings_fields('shiraz-settings-group') ?>
    <?php do_settings_sections('shiraz_options') ?>
    <?php submit_button() ?>
</form>