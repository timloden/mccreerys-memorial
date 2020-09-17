<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package underscores
 */

get_header();
$post_date = get_the_date( 'F j, Y' );
$categories = get_the_category();
?>

<div id="primary" class="content-area article-single">
    <main id="main" class="site-main">

        <div class="container pt-5">
            <h1><?php echo esc_html( get_the_title() );?></h1>
            <?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content-single', get_post_type() );

		endwhile; // End of the loop.
		?>
        </div>



    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();