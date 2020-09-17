<?php

// change excerpt length

function wpdocs_custom_excerpt_length( $length ) {
    return 100;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


add_filter( 'the_content', 'insert_featured_image', 1 );

function insert_featured_image( $content ) {
    $image = get_field('image', $post->ID);
    if(is_single() && is_main_query()) {
		$new_content = '<img class="img-fluid pt-3" src="' . $image['url'] . '">';
		$content .= $new_content;	
	}	
	return $content;
}