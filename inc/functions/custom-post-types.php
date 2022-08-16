<?php
function posttypes()
{
    // Set UI labels for Custom Post Type
    $sliderLabels = array(
        'name' => 'Slider',
        'singular_name' => 'Slider',
        'menu_name' => 'Slider',
        'parent_item_colon' => 'Parent Slider',
        'all_items' => 'All Slider',
        'view_item' => 'View Slider',
        'add_new_item' => 'Add New Slider',
        'add_new' => 'Add New',
        'edit_item' => 'Edit Slider',
        'update_item' => 'Update Slider',
        'search_items' => 'Search Slider',
        'not_found' => 'Not Found',
        'not_found_in_trash' => 'Not found in Trash',
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
        'name' => 'Course',
        'singular_name' => 'Course',
        'menu_name' => 'Course',
        'parent_item_colon' => 'Parent Course',
        'all_items' => 'All Course',
        'view_item' => 'View Course',
        'add_new_item' => 'Add New Course',
        'add_new' => 'Add New',
        'edit_item' => 'Edit Course',
        'update_item' => 'Update Course',
        'search_items' => 'Search Course',
        'not_found' => 'Not Found',
        'not_found_in_trash' => 'Not found in Trash',
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
        'name' => 'Event',
        'singular_name' => 'Event',
        'menu_name' => 'Event',
        'parent_item_colon' => 'Parent Event',
        'all_items' => 'All Event',
        'view_item' => 'View Event',
        'add_new_item' => 'Add New Event',
        'add_new' => 'Add New',
        'edit_item' => 'Edit Event',
        'update_item' => 'Update Event',
        'search_items' => 'Search Event',
        'not_found' => 'Not Found',
        'not_found_in_trash' => 'Not found in Trash',
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
