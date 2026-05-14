<?php
/**
 * Archive template for the `projects` Custom Post Type.
 *
 * Reuses the Projects Listing layout (template-parts/content-projects.php)
 * so visiting /projects/ shows the same tabbed listing as a page that
 * uses the "Projects Listing Template".
 *
 * @package AS_Theme
 */

get_header();
?>

<?php get_template_part('template-parts/content', 'projects'); ?>

<?php
get_footer();
