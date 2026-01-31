<?php
/**
 * Template Name: Homepage Template
 *
 * This template displays the main homepage content.
 * Assign this template to your "Home" page in the WordPress admin.
 *
 * @package AS_Theme
 */

get_header();
?>

<?php get_template_part('template-parts/content', 'home'); ?>

<?php
get_footer();
