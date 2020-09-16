<?php
/**
 * Template Name: Home
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mccreerys-memorial
 */

get_header();
?>
<?php if( have_rows('slideshow') ): ?>
<div class="slide-show-wrapper position-relative">
    <div class="slide-show">
        <?php while( have_rows('slideshow') ): the_row(); 
            $image = get_sub_field('image');
        ?>
        <div
            style="background-image: url(<?php echo esc_url($image['url']); ?>); height: 70vh; background-position: center center; background-size: cover;">

        </div>
        <?php endwhile; ?>
    </div>
    <div class="d-flex justify-content-between w-100 position-absolute slider-arrows">
        <a class="left-arrow text-white pl-2"><i class="las la-angle-left"></i></a>
        <a class="right-arrow text-white pr-2"><i class="las la-angle-right"></i></a>
    </div>
</div>
<div class="bg-primary quote">
    <div class="container pt-3 pb-5">
        <div class="row">
            <div class="col-12">
                <p class="font-serif text-white" style="font-size: 24px;">"<?php the_field('bible_verse_quote'); ?>"</p>
                <p class="mb-0 font-serif text-white text-right"><?php the_field('bible_verse_author'); ?></p>
            </div>
        </div>
    </div>
</div>
<div class="memories">
    <div class="container">
        <div class="row">
            <div class="col-12" style="margin-top: -1em;">
                <?php echo do_shortcode('[ajax_load_more post_type="post" category="memories"]'); ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<div class="container py-3">
    <?php
		while ( have_posts() ) :
			the_post();
			//get_template_part( 'template-parts/content', 'page' );
		endwhile; // End of the loop.
	?>
</div><!-- #primary -->

<?php get_footer(); ?>

<script>
var slider = tns({
    container: '.slide-show',
    items: 1,
    mode: 'gallery',
    gutter: 0,
    edgePadding: 0,
    controls: true,
    prevButton: '.left-arrow',
    nextButton: '.right-arrow',
    nav: false,
    autoplay: true,
    autoplayButtonOutput: false,
});
</script>