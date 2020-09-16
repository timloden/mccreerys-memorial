<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package restoration-performance
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); 
?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <header
            class="header w-100 py-3 <?php if (is_front_page()) { echo 'grad-bg position-absolute'; } else { echo 'bg-primary'; } ?>">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center flex-column flex-md-row">
                    <div class="logo text-center text-md-left">
                        <a href="<?php echo site_url(); ?>">
                            <p class="mb-0">Celebrating the life of</p>
                            <p class="mb-0 font-weight-bold" style="font-size: 28px; line-height: 1;">Thomas McCreery
                            </p>
                        </a>
                    </div>
                    <div class="submit-memory pt-3 pt-md-0 text-center text-md-right d-flex align-items-center">
                        <a style="font-size: 24px;" href="#" onclick="sound.play();"><i class="las la-play"></i></a>
                        <a style="font-size: 24px;" href="#" onclick="sound.pause();" class="mr-3"><i
                                class="las la-pause"></i></a>
                        <a class="font-weight-bold" href="<?php echo site_url(); ?>/submit-a-memory">Submit
                            a
                            Memory</a>
                    </div>
                </div>
            </div>
        </header>

        <div id="content" class="site-content">