<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package AS_Theme
 */

get_header();
?>

<div class="error-404 not-found">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'as-theme'); ?></h1>
    </header>

    <div class="page-content">
        <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try a search?', 'as-theme'); ?></p>
        <?php get_search_form(); ?>
    </div>
</div>

<?php
get_footer();
