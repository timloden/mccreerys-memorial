<?php

/**
 * Enqueue scripts and styles.
 */
function scripts_and_styles() {
	wp_enqueue_style( 'base-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'vendor-js', get_template_directory_uri() . '/assets/js/vendor.min.js', array(), '', true );
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/assets/js/custom.min.js', array(), '', true );

}

add_action( 'wp_enqueue_scripts', 'scripts_and_styles' );


add_action('login_enqueue_scripts', 'custom_login_logo');

function custom_login_logo()
{
    $general_settings = get_field('general_settings', 'option');
    $logo = $general_settings['organization_logo'];
    ?>

<style type="text/css">
#login h1 {
    display: none;
}
</style>
<?php }