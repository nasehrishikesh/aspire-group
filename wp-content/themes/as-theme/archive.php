<?php
/**
 * The template for displaying archive pages
 *
 * @package AS_Theme
 */

get_header();
?>

<header class="page-header">
    <?php
    the_archive_title('<h1 class="page-title">', '</h1>');
    the_archive_description('<div class="archive-description">', '</div>');
    ?>
</header>

<div class="archive-content">
    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
                </header>

                <div class="entry-summary">
                    <?php the_excerpt(); ?>
                </div>

                <footer class="entry-footer">
                    <span class="posted-on"><?php echo get_the_date(); ?></span>
                </footer>
            </article>
        <?php endwhile; ?>

        <?php the_posts_navigation(); ?>

    <?php else : ?>

        <p><?php esc_html_e('No posts found.', 'as-theme'); ?></p>

    <?php endif; ?>
</div>

<?php
get_footer();
