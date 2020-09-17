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
<?php endif; ?>
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
                <?php //echo do_shortcode('[ajax_load_more post_type="post" category="memories"]'); ?>
                <?php // WP_Query arguments
                $args = array (
                    'post_status'            => array( 'publish' ),
                    'posts_per_page'         => -1,
                    'nopaging'               => true
                    //'order'                  => 'ASC',
                    //'orderby'                => 'menu_order',
                );

                // The Query
                $query = new WP_Query( $args ); 
                if ( $query->have_posts() ) :
                ?>
                <div class="card-columns p-0 mb-5">
                <?php while ( $query->have_posts() ) : $query->the_post(); 
                    $family = get_the_title();
                    $id = get_the_ID();
                    $image = get_field( "image" );
                ?>
                    <div class="card shadow">
                        <div class="card-body position-relative">
                            <div class="excerpt position-relative">
                                <p class="card-text"><?php the_excerpt(); ?></p>
                                <div class="position-absolute w-100 white-grad-bg h-100" style="height: 200px; left: 0; top: 0;"></div>
                            </div>
                            <div class="text-center" style="bottom: 0; left: 0;">
                                <a class="d-block bg-white font-weight-bold" href="<?php the_permalink(); ?>" data-toggle="modal" data-target="#modal-<?php echo $id; ?>">
                                Read the full memory from<br><?php echo $family; ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="modal-<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle"><?php echo $family; ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php the_content(); ?>
                            <?php if ($image) : ?>
                                <img class="img-fluid" src="<?php echo $image['url']; ?>">
                            <?php endif; ?>
                        </div>
                        </div>
                    </div>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>

                <?php else : ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>



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