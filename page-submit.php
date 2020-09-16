<?php
/**
 * Template Name: Submit
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mccreerys-memorial
 */

acf_form_head();
get_header();
?>
<div class="container py-3">
    <div id="primary">
        <div id="content" role="main">

            <?php /* The loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>

            <h1><?php the_title(); ?></h1>

            <?php acf_form(array(
                'post_id'       => 'new_post',
                'post_title' => true,
                'post_content' => true,
                'new_post'      => array(
                    'post_type'     => 'post',
                    'post_status'   => 'pending'
                ),
                'uploader' => 'basic',
                'submit_value' => __("Submit Memory", 'acf'),
                'updated_message' => __("Thank you for sharing your memory!", 'acf'),
                'html_submit_button'  => '<input type="submit" class="btn btn-primary" value="%s" />',
            )); ?>

            <?php endwhile; ?>

        </div><!-- #content -->
    </div><!-- #primary -->

</div><!-- #primary -->

<?php get_footer(); ?>