<?php

function shiraz_get_option($optionName)
{
    global $wpdb;
    $tableName =  $wpdb->prefix . "shirazgallery";

    $value = $wpdb->get_results($wpdb->prepare(
        "SELECT * FROM {$tableName} WHERE options_name = %s",
        $optionName
    ));

    $wpdb->flush();

    if (empty($value)) {
        return 'گالری شیراز';
    } else {
        return $value[0]->options_value;
    }
}

function shiraz_update_option($optionName, $optionValue)
{
    global $wpdb;
    $tableName =  $wpdb->prefix . "shirazgallery";

    $wpdb->query($wpdb->prepare(
        "UPDATE {$tableName} SET options_value='{$optionValue}' WHERE options_name = %s",
        $optionName
    ));

    $wpdb->flush();
}

function shiraz_add_option($optionName, $optionValue)
{
    global $wpdb;
    $tablename =  $wpdb->prefix . "shirazgallery";

    $wpdb->insert(
        $tablename,
        array(
            'options_id' => '',
            'options_name' => $optionName,
            'options_value' => $optionValue,
        ),
        array('%s', '%s', '%s')
    );

    $wpdb->flush();
}

function shiraz_delete_option($optionName)
{
    global $wpdb;
    $tablename =  $wpdb->prefix . "shirazgallery";

    $wpdb->query(
        'DELETE  FROM ' . $tablename . ' WHERE options_name = "' . $optionName . '"'
    );

    $wpdb->flush();
}
