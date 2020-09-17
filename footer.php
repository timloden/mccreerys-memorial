<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package underscores
 */
$rows = get_field('mp3_files', 'options');
?>
</div><!-- #content -->

<footer class="site-footer py-5">
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>
<?php if ($rows) :?>

<script>
var sound = new Howl({
    src: [
        <?php foreach($rows as $row) {
            $file = $row['file'];
            echo "'" . $file['url'] . "',";
        } ?>

    ],
    //autoplay: true,
    loop: true,
    volume: 0.5
});
</script>
<?php endif; ?>
</body>

</html>