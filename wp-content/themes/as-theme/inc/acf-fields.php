<?php
/**
 * ACF Field Groups Registration
 *
 * Registers all ACF field groups for the Homepage Template
 *
 * @package AS_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register ACF Field Groups for Homepage
 */
function as_theme_register_acf_fields() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    // Hero Section Field Group
    acf_add_local_field_group(array(
        'key' => 'group_hero_section',
        'title' => 'Hero Section',
        'fields' => array(
            array(
                'key' => 'field_hero_display_type',
                'label' => 'Display Type',
                'name' => 'hero_display_type',
                'type' => 'select',
                'instructions' => 'Choose between a single banner or slider',
                'choices' => array(
                    'single' => 'Single Banner',
                    'slider' => 'Hero Slider',
                ),
                'default_value' => 'single',
                'return_format' => 'value',
            ),
            // Single Banner Fields
            array(
                'key' => 'field_hero_title_line_1',
                'label' => 'Title Line 1',
                'name' => 'hero_title_line_1',
                'type' => 'text',
                'default_value' => 'A New Standard in',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_hero_display_type',
                            'operator' => '==',
                            'value' => 'single',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_hero_title_line_2',
                'label' => 'Title Line 2',
                'name' => 'hero_title_line_2',
                'type' => 'text',
                'default_value' => 'Living',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_hero_display_type',
                            'operator' => '==',
                            'value' => 'single',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_hero_video_url',
                'label' => 'Video URL',
                'name' => 'hero_video_url',
                'type' => 'url',
                'default_value' => 'https://vimeo.com/952306062',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_hero_display_type',
                            'operator' => '==',
                            'value' => 'single',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_hero_video_link',
                'label' => 'Video Link URL',
                'name' => 'hero_video_link',
                'type' => 'url',
                'instructions' => 'Where the video button links to',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_hero_display_type',
                            'operator' => '==',
                            'value' => 'single',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_hero_video_button_text',
                'label' => 'Video Button Text',
                'name' => 'hero_video_button_text',
                'type' => 'text',
                'default_value' => 'explore now',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_hero_display_type',
                            'operator' => '==',
                            'value' => 'single',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_hero_subtitle',
                'label' => 'Subtitle',
                'name' => 'hero_subtitle',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'An incredible addition to the sparkling skyline of downtown.',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_hero_display_type',
                            'operator' => '==',
                            'value' => 'single',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_hero_background_image',
                'label' => 'Background Image',
                'name' => 'hero_background_image',
                'type' => 'image',
                'return_format' => 'url',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_hero_display_type',
                            'operator' => '==',
                            'value' => 'single',
                        ),
                    ),
                ),
            ),
            // Slider Fields
            array(
                'key' => 'field_hero_slides',
                'label' => 'Hero Slides',
                'name' => 'hero_slides',
                'type' => 'repeater',
                'instructions' => 'Add slides for the hero slider',
                'min' => 1,
                'max' => 10,
                'layout' => 'block',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_hero_display_type',
                            'operator' => '==',
                            'value' => 'slider',
                        ),
                    ),
                ),
                'sub_fields' => array(
                    array(
                        'key' => 'field_slide_title_line_1',
                        'label' => 'Title Line 1',
                        'name' => 'title_line_1',
                        'type' => 'text',
                        'wrapper' => array('width' => '50'),
                    ),
                    array(
                        'key' => 'field_slide_title_line_2',
                        'label' => 'Title Line 2',
                        'name' => 'title_line_2',
                        'type' => 'text',
                        'wrapper' => array('width' => '50'),
                    ),
                    array(
                        'key' => 'field_slide_subtitle',
                        'label' => 'Subtitle',
                        'name' => 'subtitle',
                        'type' => 'textarea',
                        'rows' => 2,
                    ),
                    array(
                        'key' => 'field_slide_background_image',
                        'label' => 'Background Image',
                        'name' => 'background_image',
                        'type' => 'image',
                        'return_format' => 'url',
                        'wrapper' => array('width' => '50'),
                    ),
                    array(
                        'key' => 'field_slide_video_url',
                        'label' => 'Video URL (optional)',
                        'name' => 'video_url',
                        'type' => 'url',
                        'instructions' => 'Vimeo or YouTube URL for background video',
                        'wrapper' => array('width' => '50'),
                    ),
                    array(
                        'key' => 'field_slide_button_text',
                        'label' => 'Button Text',
                        'name' => 'button_text',
                        'type' => 'text',
                        'wrapper' => array('width' => '33'),
                    ),
                    array(
                        'key' => 'field_slide_button_action',
                        'label' => 'Button Action',
                        'name' => 'button_action',
                        'type' => 'select',
                        'choices' => array(
                            'link' => 'Open Link',
                            'popup' => 'Open Popup Form',
                        ),
                        'default_value' => 'link',
                        'wrapper' => array('width' => '33'),
                    ),
                    array(
                        'key' => 'field_slide_button_url',
                        'label' => 'Button URL',
                        'name' => 'button_url',
                        'type' => 'url',
                        'wrapper' => array('width' => '33'),
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_slide_button_action',
                                    'operator' => '==',
                                    'value' => 'link',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            // Slider Settings
            array(
                'key' => 'field_hero_slider_autoplay',
                'label' => 'Autoplay',
                'name' => 'hero_slider_autoplay',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_hero_display_type',
                            'operator' => '==',
                            'value' => 'slider',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_hero_slider_autoplay_delay',
                'label' => 'Autoplay Delay (ms)',
                'name' => 'hero_slider_autoplay_delay',
                'type' => 'number',
                'default_value' => 5000,
                'min' => 1000,
                'max' => 15000,
                'step' => 500,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_hero_display_type',
                            'operator' => '==',
                            'value' => 'slider',
                        ),
                        array(
                            'field' => 'field_hero_slider_autoplay',
                            'operator' => '==',
                            'value' => 1,
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_hero_slider_effect',
                'label' => 'Transition Effect',
                'name' => 'hero_slider_effect',
                'type' => 'select',
                'choices' => array(
                    'slide' => 'Slide',
                    'fade' => 'Fade',
                ),
                'default_value' => 'fade',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_hero_display_type',
                            'operator' => '==',
                            'value' => 'slider',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_hero_slider_speed',
                'label' => 'Transition Speed (ms)',
                'name' => 'hero_slider_speed',
                'type' => 'number',
                'default_value' => 1000,
                'min' => 300,
                'max' => 3000,
                'step' => 100,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_hero_display_type',
                            'operator' => '==',
                            'value' => 'slider',
                        ),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-home.php',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
    ));

    // Welcome Home Section Field Group
    acf_add_local_field_group(array(
        'key' => 'group_welcome_section',
        'title' => 'Welcome Home Section',
        'fields' => array(
            array(
                'key' => 'field_welcome_subtitle',
                'label' => 'Subtitle',
                'name' => 'welcome_subtitle',
                'type' => 'text',
                'default_value' => 'welcome home',
            ),
            array(
                'key' => 'field_welcome_title',
                'label' => 'Title',
                'name' => 'welcome_title',
                'type' => 'text',
                'default_value' => 'Your place to live the way you\'ve always wanted',
            ),
            array(
                'key' => 'field_welcome_description',
                'label' => 'Description',
                'name' => 'welcome_description',
                'type' => 'wysiwyg',
                'media_upload' => 0,
            ),
            array(
                'key' => 'field_welcome_button_text',
                'label' => 'Button Text',
                'name' => 'welcome_button_text',
                'type' => 'text',
                'default_value' => 'explore residences',
            ),
            array(
                'key' => 'field_welcome_button_action',
                'label' => 'Button Action',
                'name' => 'welcome_button_action',
                'type' => 'select',
                'choices' => array(
                    'link' => 'Open Link',
                    'popup' => 'Open Popup Form',
                ),
                'default_value' => 'link',
            ),
            array(
                'key' => 'field_welcome_button_url',
                'label' => 'Button URL',
                'name' => 'welcome_button_url',
                'type' => 'url',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_welcome_button_action',
                            'operator' => '==',
                            'value' => 'link',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_welcome_image',
                'label' => 'Section Image',
                'name' => 'welcome_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-home.php',
                ),
            ),
        ),
        'menu_order' => 1,
        'position' => 'normal',
        'style' => 'default',
    ));

    // Stats Section Field Group
    acf_add_local_field_group(array(
        'key' => 'group_stats_section',
        'title' => 'Stats Section',
        'fields' => array(
            array(
                'key' => 'field_stats_background_image',
                'label' => 'Background Image',
                'name' => 'stats_background_image',
                'type' => 'image',
                'return_format' => 'url',
                'instructions' => 'Background image for the stats section',
            ),
            array(
                'key' => 'field_stats_heading_1',
                'label' => 'Heading 1',
                'name' => 'stats_heading_1',
                'type' => 'text',
                'default_value' => 'Light.',
            ),
            // array(
            //     'key' => 'field_stats_heading_2',
            //     'label' => 'Heading 2',
            //     'name' => 'stats_heading_2',
            //     'type' => 'text',
            //     'default_value' => 'Space.',
            // ),
            // array(
            //     'key' => 'field_stats_heading_3',
            //     'label' => 'Heading 3',
            //     'name' => 'stats_heading_3',
            //     'type' => 'text',
            //     'default_value' => 'Flexibility.',
            // ),
            array(
                'key' => 'field_stats_counters',
                'label' => 'Counters',
                'name' => 'stats_counters',
                'type' => 'repeater',
                'min' => 1,
                'max' => 6,
                'layout' => 'table',
                'sub_fields' => array(
                    array(
                        'key' => 'field_counter_prefix',
                        'label' => 'Prefix',
                        'name' => 'prefix',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_counter_number',
                        'label' => 'Number',
                        'name' => 'number',
                        'type' => 'number',
                    ),
                    array(
                        'key' => 'field_counter_suffix',
                        'label' => 'Suffix',
                        'name' => 'suffix',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_counter_description',
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'text',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-home.php',
                ),
            ),
        ),
        'menu_order' => 2,
        'position' => 'normal',
        'style' => 'default',
    ));

    // Refined Residences Section Field Group
    acf_add_local_field_group(array(
        'key' => 'group_residences_section',
        'title' => 'Refined Residences Section',
        'fields' => array(
            array(
                'key' => 'field_residences_subtitle',
                'label' => 'Subtitle',
                'name' => 'residences_subtitle',
                'type' => 'text',
                'default_value' => 'Refined Residences',
            ),
            array(
                'key' => 'field_residences_title',
                'label' => 'Title',
                'name' => 'residences_title',
                'type' => 'text',
                'default_value' => 'Modern condos in downtown',
            ),
            array(
                'key' => 'field_residences_description',
                'label' => 'Description',
                'name' => 'residences_description',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_residences_image',
                'label' => 'Section Image',
                'name' => 'residences_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_residences_button_text',
                'label' => 'Button Text',
                'name' => 'residences_button_text',
                'type' => 'text',
                'default_value' => 'availability',
            ),
            array(
                'key' => 'field_residences_button_action',
                'label' => 'Button Action',
                'name' => 'residences_button_action',
                'type' => 'select',
                'choices' => array(
                    'link' => 'Open Link',
                    'popup' => 'Open Popup Form',
                ),
                'default_value' => 'link',
            ),
            array(
                'key' => 'field_residences_button_url',
                'label' => 'Button URL',
                'name' => 'residences_button_url',
                'type' => 'url',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_residences_button_action',
                            'operator' => '==',
                            'value' => 'link',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_residences_cards',
                'label' => 'Residence Cards',
                'name' => 'residences_cards',
                'type' => 'repeater',
                'min' => 1,
                'max' => 8,
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_residence_card_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_residence_card_description',
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'textarea',
                        'rows' => 3,
                    ),
                    array(
                        'key' => 'field_residence_card_image',
                        'label' => 'Background Image',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'url',
                    ),
                    array(
                        'key' => 'field_residence_card_button_text',
                        'label' => 'Button Text',
                        'name' => 'button_text',
                        'type' => 'text',
                        'default_value' => 'Learn More',
                    ),
                    array(
                        'key' => 'field_residence_card_button_action',
                        'label' => 'Button Action',
                        'name' => 'button_action',
                        'type' => 'select',
                        'choices' => array(
                            'link' => 'Open Link',
                            'popup' => 'Open Popup Form',
                        ),
                        'default_value' => 'link',
                    ),
                    array(
                        'key' => 'field_residence_card_button_url',
                        'label' => 'Button URL',
                        'name' => 'button_url',
                        'type' => 'url',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_residence_card_button_action',
                                    'operator' => '==',
                                    'value' => 'link',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-home.php',
                ),
            ),
        ),
        'menu_order' => 3,
        'position' => 'normal',
        'style' => 'default',
    ));

    // Panoramic Views Section Field Group
    acf_add_local_field_group(array(
        'key' => 'group_panoramic_section',
        'title' => 'Panoramic Views Section',
        'fields' => array(
            array(
                'key' => 'field_panoramic_views',
                'label' => 'Views',
                'name' => 'panoramic_views',
                'type' => 'repeater',
                'min' => 1,
                'max' => 8,
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_panoramic_view_name',
                        'label' => 'Direction Name',
                        'name' => 'name',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_panoramic_view_image',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'url',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-home.php',
                ),
            ),
        ),
        'menu_order' => 4,
        'position' => 'normal',
        'style' => 'default',
    ));

    // Testimonial Section Field Group
    acf_add_local_field_group(array(
        'key' => 'group_testimonial_section',
        'title' => 'Testimonial Section',
        'fields' => array(
            array(
                'key' => 'field_testimonial_quote',
                'label' => 'Quote',
                'name' => 'testimonial_quote',
                'type' => 'textarea',
                'rows' => 4,
            ),
            array(
                'key' => 'field_testimonial_author',
                'label' => 'Author Name',
                'name' => 'testimonial_author',
                'type' => 'text',
            ),
            array(
                'key' => 'field_testimonial_company',
                'label' => 'Author Company/Title',
                'name' => 'testimonial_company',
                'type' => 'text',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-home.php',
                ),
            ),
        ),
        'menu_order' => 5,
        'position' => 'normal',
        'style' => 'default',
    ));

    // Amenities Section Field Group
    acf_add_local_field_group(array(
        'key' => 'group_amenities_section',
        'title' => 'Amenities Section',
        'fields' => array(
            array(
                'key' => 'field_amenities_subtitle',
                'label' => 'Subtitle',
                'name' => 'amenities_subtitle',
                'type' => 'text',
                'default_value' => 'Our amenities',
            ),
            array(
                'key' => 'field_amenities_title',
                'label' => 'Title',
                'name' => 'amenities_title',
                'type' => 'text',
            ),
            array(
                'key' => 'field_amenities_description',
                'label' => 'Description',
                'name' => 'amenities_description',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_amenities_image',
                'label' => 'Section Image',
                'name' => 'amenities_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_amenities_button_text',
                'label' => 'Button Text',
                'name' => 'amenities_button_text',
                'type' => 'text',
                'default_value' => 'explore amenities',
            ),
            array(
                'key' => 'field_amenities_button_action',
                'label' => 'Button Action',
                'name' => 'amenities_button_action',
                'type' => 'select',
                'choices' => array(
                    'link' => 'Open Link',
                    'popup' => 'Open Popup Form',
                ),
                'default_value' => 'link',
            ),
            array(
                'key' => 'field_amenities_button_url',
                'label' => 'Button URL',
                'name' => 'amenities_button_url',
                'type' => 'url',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_amenities_button_action',
                            'operator' => '==',
                            'value' => 'link',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_amenities_banners',
                'label' => 'Amenity Banners',
                'name' => 'amenities_banners',
                'type' => 'repeater',
                'min' => 1,
                'max' => 8,
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_amenity_banner_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_amenity_banner_location',
                        'label' => 'Location',
                        'name' => 'location',
                        'type' => 'text',
                        'instructions' => 'e.g., Floor 2, Rooftop, Ground Floor',
                    ),
                    array(
                        'key' => 'field_amenity_banner_description',
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'textarea',
                        'rows' => 3,
                    ),
                    array(
                        'key' => 'field_amenity_banner_media_type',
                        'label' => 'Media Type',
                        'name' => 'media_type',
                        'type' => 'select',
                        'choices' => array(
                            'image' => 'Image',
                            'video' => 'Video',
                        ),
                        'default_value' => 'image',
                    ),
                    array(
                        'key' => 'field_amenity_banner_image',
                        'label' => 'Background Image',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'url',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_amenity_banner_media_type',
                                    'operator' => '==',
                                    'value' => 'image',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_amenity_banner_video',
                        'label' => 'Video URL',
                        'name' => 'video_url',
                        'type' => 'url',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_amenity_banner_media_type',
                                    'operator' => '==',
                                    'value' => 'video',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_amenity_banner_link',
                        'label' => 'Link URL',
                        'name' => 'link',
                        'type' => 'url',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-home.php',
                ),
            ),
        ),
        'menu_order' => 6,
        'position' => 'normal',
        'style' => 'default',
    ));

    // Features Grid Section Field Group
    acf_add_local_field_group(array(
        'key' => 'group_features_section',
        'title' => 'Features Grid Section',
        'fields' => array(
            array(
                'key' => 'field_features_categories',
                'label' => 'Feature Categories',
                'name' => 'features_categories',
                'type' => 'repeater',
                'min' => 1,
                'max' => 6,
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_feature_category_title',
                        'label' => 'Category Title',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_feature_category_icon',
                        'label' => 'Icon SVG Code',
                        'name' => 'icon_svg',
                        'type' => 'textarea',
                        'rows' => 4,
                        'instructions' => 'Paste SVG code for the category icon',
                    ),
                    array(
                        'key' => 'field_feature_category_items',
                        'label' => 'Feature Items',
                        'name' => 'items',
                        'type' => 'repeater',
                        'min' => 1,
                        'max' => 10,
                        'layout' => 'table',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_feature_item_text',
                                'label' => 'Item Text',
                                'name' => 'text',
                                'type' => 'text',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-home.php',
                ),
            ),
        ),
        'menu_order' => 7,
        'position' => 'normal',
        'style' => 'default',
    ));

    // Scrolling Text Section Field Group
    acf_add_local_field_group(array(
        'key' => 'group_scrolling_text_section',
        'title' => 'Scrolling Text Section',
        'fields' => array(
            array(
                'key' => 'field_scrolling_text_items',
                'label' => 'Scrolling Text Items (RTL - Row 1)',
                'name' => 'scrolling_text_items',
                'type' => 'repeater',
                'instructions' => 'First row of scrolling text (scrolls right to left)',
                'min' => 1,
                'max' => 20,
                'layout' => 'table',
                'sub_fields' => array(
                    array(
                        'key' => 'field_scrolling_text_item',
                        'label' => 'Text',
                        'name' => 'text',
                        'type' => 'text',
                    ),
                ),
            ),
            array(
                'key' => 'field_scrolling_text_items_2',
                'label' => 'Scrolling Text Items (LTR - Row 2)',
                'name' => 'scrolling_text_items_2',
                'type' => 'repeater',
                'instructions' => 'Second row of scrolling text (scrolls left to right)',
                'min' => 1,
                'max' => 20,
                'layout' => 'table',
                'sub_fields' => array(
                    array(
                        'key' => 'field_scrolling_text_item_2',
                        'label' => 'Text',
                        'name' => 'text',
                        'type' => 'text',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-home.php',
                ),
            ),
        ),
        'menu_order' => 8,
        'position' => 'normal',
        'style' => 'default',
    ));

    // Apartments Section Field Group
    acf_add_local_field_group(array(
        'key' => 'group_apartments_section',
        'title' => 'Apartments Section',
        'fields' => array(
            array(
                'key' => 'field_apartments_subtitle',
                'label' => 'Subtitle',
                'name' => 'apartments_subtitle',
                'type' => 'text',
                'default_value' => 'apartments',
            ),
            array(
                'key' => 'field_apartments_title',
                'label' => 'Title',
                'name' => 'apartments_title',
                'type' => 'text',
            ),
            array(
                'key' => 'field_apartments_description',
                'label' => 'Description',
                'name' => 'apartments_description',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_apartments_button_text',
                'label' => 'Button Text',
                'name' => 'apartments_button_text',
                'type' => 'text',
                'default_value' => 'view all',
            ),
            array(
                'key' => 'field_apartments_button_url',
                'label' => 'Button URL',
                'name' => 'apartments_button_url',
                'type' => 'url',
            ),
            array(
                'key' => 'field_apartments_slider',
                'label' => 'Apartment Slides',
                'name' => 'apartments_slider',
                'type' => 'repeater',
                'min' => 1,
                'max' => 12,
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_apartment_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_apartment_image',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'url',
                    ),
                    array(
                        'key' => 'field_apartment_beds',
                        'label' => 'Bedrooms',
                        'name' => 'beds',
                        'type' => 'number',
                    ),
                    array(
                        'key' => 'field_apartment_baths',
                        'label' => 'Bathrooms',
                        'name' => 'baths',
                        'type' => 'number',
                    ),
                    array(
                        'key' => 'field_apartment_sqft',
                        'label' => 'Square Feet',
                        'name' => 'sqft',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_apartment_link',
                        'label' => 'Link URL',
                        'name' => 'link',
                        'type' => 'url',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-home.php',
                ),
            ),
        ),
        'menu_order' => 9,
        'position' => 'normal',
        'style' => 'default',
    ));

    // Neighborhood Section Field Group
    acf_add_local_field_group(array(
        'key' => 'group_neighborhood_section',
        'title' => 'Neighborhood Section',
        'fields' => array(
            array(
                'key' => 'field_neighborhood_subtitle',
                'label' => 'Subtitle',
                'name' => 'neighborhood_subtitle',
                'type' => 'text',
                'default_value' => 'neighborhood',
            ),
            array(
                'key' => 'field_neighborhood_title',
                'label' => 'Title',
                'name' => 'neighborhood_title',
                'type' => 'text',
            ),
            array(
                'key' => 'field_neighborhood_description',
                'label' => 'Description',
                'name' => 'neighborhood_description',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_neighborhood_button_text',
                'label' => 'Button Text',
                'name' => 'neighborhood_button_text',
                'type' => 'text',
                'default_value' => 'explore nearby places',
            ),
            array(
                'key' => 'field_neighborhood_button_action',
                'label' => 'Button Action',
                'name' => 'neighborhood_button_action',
                'type' => 'select',
                'choices' => array(
                    'link' => 'Open Link',
                    'popup' => 'Open Popup Form',
                ),
                'default_value' => 'link',
            ),
            array(
                'key' => 'field_neighborhood_button_url',
                'label' => 'Button URL',
                'name' => 'neighborhood_button_url',
                'type' => 'url',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_neighborhood_button_action',
                            'operator' => '==',
                            'value' => 'link',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_neighborhood_google_map',
                'label' => 'Google Map Embed URL',
                'name' => 'neighborhood_google_map',
                'type' => 'url',
                'instructions' => 'Enter the Google Maps embed URL. Go to Google Maps > Share > Embed a map > Copy the src URL from the iframe code.',
            ),
            array(
                'key' => 'field_neighborhood_places',
                'label' => 'Nearby Places',
                'name' => 'neighborhood_places',
                'type' => 'repeater',
                'min' => 1,
                'max' => 10,
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_place_title',
                        'label' => 'Category Title',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_place_image',
                        'label' => 'Background Image',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'url',
                    ),
                    array(
                        'key' => 'field_place_content',
                        'label' => 'Places List',
                        'name' => 'content',
                        'type' => 'wysiwyg',
                        'media_upload' => 0,
                        'toolbar' => 'basic',
                        'instructions' => 'List places with distances, e.g., "Place Name – 0.5km"',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-home.php',
                ),
            ),
        ),
        'menu_order' => 10,
        'position' => 'normal',
        'style' => 'default',
    ));

    // About Us Section Field Group
    acf_add_local_field_group(array(
        'key' => 'group_about_section',
        'title' => 'About Us Section',
        'fields' => array(
            array(
                'key' => 'field_about_subtitle',
                'label' => 'Subtitle',
                'name' => 'about_subtitle',
                'type' => 'text',
                'default_value' => 'About us',
            ),
            array(
                'key' => 'field_about_title',
                'label' => 'Title',
                'name' => 'about_title',
                'type' => 'text',
            ),
            array(
                'key' => 'field_about_description',
                'label' => 'Description',
                'name' => 'about_description',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_about_button_text',
                'label' => 'Button Text',
                'name' => 'about_button_text',
                'type' => 'text',
                'default_value' => 'meet our team',
            ),
            array(
                'key' => 'field_about_button_action',
                'label' => 'Button Action',
                'name' => 'about_button_action',
                'type' => 'select',
                'choices' => array(
                    'link' => 'Open Link',
                    'popup' => 'Open Popup Form',
                ),
                'default_value' => 'link',
            ),
            array(
                'key' => 'field_about_button_url',
                'label' => 'Button URL',
                'name' => 'about_button_url',
                'type' => 'url',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_about_button_action',
                            'operator' => '==',
                            'value' => 'link',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_about_image_1',
                'label' => 'Main Image',
                'name' => 'about_image_1',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_about_image_2',
                'label' => 'Secondary Image',
                'name' => 'about_image_2',
                'type' => 'image',
                'return_format' => 'url',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-home.php',
                ),
            ),
        ),
        'menu_order' => 11,
        'position' => 'normal',
        'style' => 'default',
    ));

    // Contact Section Field Group
    acf_add_local_field_group(array(
        'key' => 'group_contact_section',
        'title' => 'Contact Section',
        'fields' => array(
            array(
                'key' => 'field_contact_form_heading',
                'label' => 'Form Heading',
                'name' => 'contact_form_heading',
                'type' => 'text',
                'default_value' => 'Kindly share your details to learn more',
            ),
            array(
                'key' => 'field_contact_form_id',
                'label' => 'Contact Form 7 ID',
                'name' => 'contact_form_id',
                'type' => 'number',
                'instructions' => 'Enter the Contact Form 7 form ID',
            ),
            array(
                'key' => 'field_contact_subtitle',
                'label' => 'Section Subtitle',
                'name' => 'contact_subtitle',
                'type' => 'text',
                'default_value' => 'Get in touch',
            ),
            array(
                'key' => 'field_contact_title',
                'label' => 'Section Title',
                'name' => 'contact_title',
                'type' => 'text',
                'default_value' => 'Exclusive marketing & sales agent',
            ),
            array(
                'key' => 'field_contact_description',
                'label' => 'Description',
                'name' => 'contact_description',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_agent_image',
                'label' => 'Agent Photo',
                'name' => 'agent_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_agent_name',
                'label' => 'Agent Name',
                'name' => 'agent_name',
                'type' => 'text',
            ),
            array(
                'key' => 'field_agent_title',
                'label' => 'Agent Title',
                'name' => 'agent_title',
                'type' => 'text',
                'default_value' => 'certified agent',
            ),
            array(
                'key' => 'field_agent_phone',
                'label' => 'Agent Phone',
                'name' => 'agent_phone',
                'type' => 'text',
            ),
            array(
                'key' => 'field_agent_email',
                'label' => 'Agent Email',
                'name' => 'agent_email',
                'type' => 'email',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-home.php',
                ),
            ),
        ),
        'menu_order' => 12,
        'position' => 'normal',
        'style' => 'default',
    ));
}
add_action('acf/init', 'as_theme_register_acf_fields');

/**
 * Register ACF Field Groups for About Page
 */
function as_theme_register_about_acf_fields() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    // About Page Hero Images Section
    acf_add_local_field_group(array(
        'key' => 'group_about_hero_images',
        'title' => 'Hero Images Section',
        'fields' => array(
            array(
                'key' => 'field_about_hero_image_1',
                'label' => 'Left Image',
                'name' => 'about_hero_image_1',
                'type' => 'image',
                'return_format' => 'array',
                'instructions' => 'Main left image for hero section',
            ),
            array(
                'key' => 'field_about_hero_image_2',
                'label' => 'Right Image',
                'name' => 'about_hero_image_2',
                'type' => 'image',
                'return_format' => 'array',
                'instructions' => 'Main right image for hero section',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-about.php',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
    ));

    // About Page Vision Section
    acf_add_local_field_group(array(
        'key' => 'group_about_vision',
        'title' => 'Vision Section',
        'fields' => array(
            array(
                'key' => 'field_about_vision_subtitle',
                'label' => 'Subtitle',
                'name' => 'about_vision_subtitle',
                'type' => 'text',
                'default_value' => 'A bold vision',
            ),
            array(
                'key' => 'field_about_vision_title',
                'label' => 'Main Title',
                'name' => 'about_vision_title',
                'type' => 'text',
                'default_value' => 'Exceptional value remarkable quality',
            ),
            array(
                'key' => 'field_about_vision_image',
                'label' => 'Side Image',
                'name' => 'about_vision_image',
                'type' => 'image',
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_about_vision_counter_number',
                'label' => 'Counter Number',
                'name' => 'about_vision_counter_number',
                'type' => 'number',
                'default_value' => 40,
            ),
            array(
                'key' => 'field_about_vision_counter_suffix',
                'label' => 'Counter Suffix',
                'name' => 'about_vision_counter_suffix',
                'type' => 'text',
                'default_value' => '+',
            ),
            array(
                'key' => 'field_about_vision_counter_label',
                'label' => 'Counter Label',
                'name' => 'about_vision_counter_label',
                'type' => 'text',
                'default_value' => 'Years Experience',
            ),
            array(
                'key' => 'field_about_vision_description',
                'label' => 'Description',
                'name' => 'about_vision_description',
                'type' => 'wysiwyg',
                'media_upload' => 0,
                'toolbar' => 'basic',
            ),
            array(
                'key' => 'field_about_vision_button_text',
                'label' => 'Button Text',
                'name' => 'about_vision_button_text',
                'type' => 'text',
                'default_value' => 'contact us',
            ),
            array(
                'key' => 'field_about_vision_button_url',
                'label' => 'Button URL',
                'name' => 'about_vision_button_url',
                'type' => 'url',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-about.php',
                ),
            ),
        ),
        'menu_order' => 1,
        'position' => 'normal',
        'style' => 'default',
    ));

    // About Page Values Section
    acf_add_local_field_group(array(
        'key' => 'group_about_values',
        'title' => 'Values Section',
        'fields' => array(
            array(
                'key' => 'field_about_values_items',
                'label' => 'Values',
                'name' => 'about_values_items',
                'type' => 'repeater',
                'min' => 1,
                'max' => 6,
                'layout' => 'block',
                'button_label' => 'Add Value',
                'sub_fields' => array(
                    array(
                        'key' => 'field_about_value_icon_class',
                        'label' => 'Icon Class',
                        'name' => 'icon_class',
                        'type' => 'text',
                        'instructions' => 'Icon class (e.g., easto-icon-creative-idea, easto-icon-logo, easto-icon-quality)',
                        'default_value' => 'easto-icon-creative-idea',
                    ),
                    array(
                        'key' => 'field_about_value_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_about_value_description',
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'textarea',
                        'rows' => 3,
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-about.php',
                ),
            ),
        ),
        'menu_order' => 2,
        'position' => 'normal',
        'style' => 'default',
    ));

    // About Page Background Section
    acf_add_local_field_group(array(
        'key' => 'group_about_background',
        'title' => 'Background Section',
        'fields' => array(
            array(
                'key' => 'field_about_background_image',
                'label' => 'Background Image',
                'name' => 'about_background_image',
                'type' => 'image',
                'return_format' => 'url',
                'instructions' => 'Full width background image section',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-about.php',
                ),
            ),
        ),
        'menu_order' => 3,
        'position' => 'normal',
        'style' => 'default',
    ));

    // About Page Team Section
    acf_add_local_field_group(array(
        'key' => 'group_about_team',
        'title' => 'Team Section',
        'fields' => array(
            array(
                'key' => 'field_about_team_subtitle',
                'label' => 'Subtitle',
                'name' => 'about_team_subtitle',
                'type' => 'text',
                'default_value' => 'Meet our leader',
            ),
            array(
                'key' => 'field_about_team_title',
                'label' => 'Title',
                'name' => 'about_team_title',
                'type' => 'text',
                'default_value' => 'The team',
            ),
            array(
                'key' => 'field_about_team_members',
                'label' => 'Team Members',
                'name' => 'about_team_members',
                'type' => 'repeater',
                'min' => 1,
                'max' => 20,
                'layout' => 'block',
                'button_label' => 'Add Team Member',
                'sub_fields' => array(
                    array(
                        'key' => 'field_team_member_photo',
                        'label' => 'Photo',
                        'name' => 'photo',
                        'type' => 'image',
                        'return_format' => 'array',
                    ),
                    array(
                        'key' => 'field_team_member_name',
                        'label' => 'Name',
                        'name' => 'name',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_team_member_position',
                        'label' => 'Position',
                        'name' => 'position',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_team_member_facebook',
                        'label' => 'Facebook URL',
                        'name' => 'facebook',
                        'type' => 'url',
                    ),
                    array(
                        'key' => 'field_team_member_instagram',
                        'label' => 'Instagram URL',
                        'name' => 'instagram',
                        'type' => 'url',
                    ),
                    array(
                        'key' => 'field_team_member_youtube',
                        'label' => 'YouTube URL',
                        'name' => 'youtube',
                        'type' => 'url',
                    ),
                    array(
                        'key' => 'field_team_member_twitter',
                        'label' => 'Twitter URL',
                        'name' => 'twitter',
                        'type' => 'url',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-about.php',
                ),
            ),
        ),
        'menu_order' => 4,
        'position' => 'normal',
        'style' => 'default',
    ));

    // About Page Stats Section
    acf_add_local_field_group(array(
        'key' => 'group_about_stats',
        'title' => 'Statistics Section',
        'fields' => array(
            array(
                'key' => 'field_about_stats_counters',
                'label' => 'Statistics',
                'name' => 'about_stats_counters',
                'type' => 'repeater',
                'min' => 1,
                'max' => 6,
                'layout' => 'table',
                'button_label' => 'Add Statistic',
                'sub_fields' => array(
                    array(
                        'key' => 'field_about_stat_number',
                        'label' => 'Number',
                        'name' => 'number',
                        'type' => 'number',
                    ),
                    array(
                        'key' => 'field_about_stat_suffix',
                        'label' => 'Suffix',
                        'name' => 'suffix',
                        'type' => 'text',
                        'instructions' => 'e.g., K, M, +',
                    ),
                    array(
                        'key' => 'field_about_stat_label',
                        'label' => 'Label',
                        'name' => 'label',
                        'type' => 'text',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-about.php',
                ),
            ),
        ),
        'menu_order' => 5,
        'position' => 'normal',
        'style' => 'default',
    ));
}
add_action('acf/init', 'as_theme_register_about_acf_fields');

/**
 * Register ACF Field Groups for Contact Page
 */
function as_theme_register_contact_acf_fields() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    // Contact Page Hero Images Section
    acf_add_local_field_group(array(
        'key' => 'group_contact_hero_images',
        'title' => 'Hero Images Section',
        'fields' => array(
            array(
                'key' => 'field_contact_hero_image_1',
                'label' => 'Left Image',
                'name' => 'contact_hero_image_1',
                'type' => 'image',
                'return_format' => 'array',
                'instructions' => 'Main left image for hero section',
            ),
            array(
                'key' => 'field_contact_hero_image_2',
                'label' => 'Right Image',
                'name' => 'contact_hero_image_2',
                'type' => 'image',
                'return_format' => 'array',
                'instructions' => 'Right image for hero section',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-contact.php',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
    ));

// Contact Form Section
    acf_add_local_field_group(array(
        'key' => 'group_contact_form',
        'title' => 'Contact Form Section',
        'fields' => array(
            array(
                'key' => 'field_contact_form_title',
                'label' => 'Form Title',
                'name' => 'contact_form_title',
                'type' => 'text',
                'instructions' => 'Form section heading',
                'default_value' => 'Drop us a line',
            ),
            array(
                'key' => 'field_contact_form_description',
                'label' => 'Form Description',
                'name' => 'contact_form_description',
                'type' => 'text',
                'instructions' => 'Text above the form',
                'default_value' => 'Your email address will not be published. Required fields are marked *',
            ),
            array(
                'key' => 'field_contact_form_shortcode',
                'label' => 'Contact Form Shortcode',
                'name' => 'contact_form_shortcode',
                'type' => 'text',
                'instructions' => 'Contact Form 7 shortcode (e.g., [contact-form-7 id="123"])',
            ),
            array(
                'key' => 'field_contact_building_address_label',
                'label' => 'Building Address Label',
                'name' => 'contact_building_address_label',
                'type' => 'text',
                'default_value' => 'BUILDING ADDRESS',
            ),
            array(
                'key' => 'field_contact_building_address',
                'label' => 'Building Address',
                'name' => 'contact_building_address',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => '4140 Parker Rd. Allentown, New Mexico 31134',
            ),
            array(
                'key' => 'field_contact_leasing_office_label',
                'label' => 'Leasing Office Label',
                'name' => 'contact_leasing_office_label',
                'type' => 'text',
                'default_value' => 'Leasing Office',
            ),
            array(
                'key' => 'field_contact_leasing_office',
                'label' => 'Leasing Office Address',
                'name' => 'contact_leasing_office',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => '2464 Royal Ln. Mesa, New Jersey 45463',
            ),
            array(
                'key' => 'field_contact_general_inquiries_label',
                'label' => 'General Inquiries Label',
                'name' => 'contact_general_inquiries_label',
                'type' => 'text',
                'default_value' => 'GENERAL INQUIRIES',
            ),
            array(
                'key' => 'field_contact_phone',
                'label' => 'Phone Number',
                'name' => 'contact_phone',
                'type' => 'text',
                'default_value' => '(084) 123 – 456 88',
            ),
            array(
                'key' => 'field_contact_email',
                'label' => 'Email Address',
                'name' => 'contact_email',
                'type' => 'email',
                'default_value' => 'contact@example.com',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-contact.php',
                ),
            ),
        ),
        'menu_order' => 1,
        'position' => 'normal',
        'style' => 'default',
    ));

    // Map Section
    acf_add_local_field_group(array(
        'key' => 'group_contact_map',
        'title' => 'Map Section',
        'fields' => array(
            array(
                'key' => 'field_contact_map_url',
                'label' => 'Google Map Embed URL',
                'name' => 'contact_map_url',
                'type' => 'url',
                'instructions' => 'Google Maps embed URL (e.g., https://maps.google.com/maps?q=...&output=embed)',
                'default_value' => 'https://maps.google.com/maps?q=London%20Eye%2C%20London%2C%20United%20Kingdom&t=m&z=10&output=embed&iwloc=near',
            ),
            array(
                'key' => 'field_contact_show_map',
                'label' => 'Show Map',
                'name' => 'contact_show_map',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-contact.php',
                ),
            ),
        ),
        'menu_order' => 2,
        'position' => 'normal',
        'style' => 'default',
    ));
}
add_action('acf/init', 'as_theme_register_contact_acf_fields');
