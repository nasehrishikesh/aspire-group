<?php
/**
 * The template for displaying all single posts
 *
 * @package AS_Theme
 */

get_header();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <header class="entry-header">
            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
            <div class="entry-meta">
                <span class="posted-on"><?php echo get_the_date(); ?></span>
                <span class="byline"> by <?php the_author(); ?></span>
            </div>
        </header>

        <div class="entry-content">
            <?php the_content(); ?>
        </div>

        <footer class="entry-footer">
            <?php
            $categories_list = get_the_category_list(', ');
            if ($categories_list) {
                echo '<span class="cat-links">Categories: ' . $categories_list . '</span>';
            }

            $tags_list = get_the_tag_list('', ', ');
            if ($tags_list) {
                echo '<span class="tags-links">Tags: ' . $tags_list . '</span>';
            }
            ?>
        </footer>

    <?php endwhile; endif; ?>
</article>

<?php
get_footer();
