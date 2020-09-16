<?php


function change_post_content_type( $field ) { 
    if($field['type'] == 'wysiwyg') {
        $field['tabs'] = 'visual';
        $field['toolbar'] = 'basic';
        $field['media_upload'] = 0;
    }
    return $field;
}

add_filter( 'acf/get_valid_field', 'change_post_content_type');

// Change Title Lable
function change_title_label( $field ) {
    $field['label'] = 'Your Name / Family Name';
    return $field;
}
add_filter('acf/load_field/name=_post_title', 'change_title_label');
// Change Content Label 
function change_content_label( $field ) {
    $field['label'] = 'Your Memory';
    return $field;
}
add_filter('acf/load_field/name=_post_content', 'change_content_label');