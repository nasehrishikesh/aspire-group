<?php
/**
 * The template for displaying all pages
 *
 * @package AS_Theme
 */

get_header();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div class="page-content">
            <?php the_content(); ?>
        </div>

    <?php endwhile; endif; ?>
</article>

<?php
get_footer();
