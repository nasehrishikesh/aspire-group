<?php
   /**
    * Template part for displaying homepage content with ACF fields
    *
    * @package AS_Theme
    */
   
   if (!defined('ABSPATH')) {
       exit;
   }
   
   // Get ACF fields with fallback defaults
   // Hero Section - Display Type
   $hero_display_type = get_field('hero_display_type') ;

   // Single Banner Fields
   $hero_title_1 = get_field('hero_title_line_1') ;
   $hero_title_2 = get_field('hero_title_line_2') ;
   $hero_video_url = get_field('hero_video_url') ;
   $hero_video_link = get_field('hero_video_link') ;
   $hero_video_button_text = get_field('hero_video_button_text') ;
   $hero_subtitle = get_field('hero_subtitle') ;
   $hero_bg_image = get_field('hero_background_image') ;

   // Slider Settings
   $hero_slider_autoplay = get_field('hero_slider_autoplay');
   $hero_slider_autoplay_delay = get_field('hero_slider_autoplay_delay') ;
   $hero_slider_effect = get_field('hero_slider_effect') ;
   $hero_slider_speed = get_field('hero_slider_speed') ;

   // Default slides for slider mode
   $default_hero_slides = array(
       array(
           'title_line_1' => 'A New Standard in',
           'title_line_2' => 'Living',
           'subtitle' => 'An incredible addition to the sparkling skyline of downtown.',
           'background_image' => '',
           'video_url' => '',
           'button_text' => 'explore now',
           'button_url' => '#',
       ),
   );

   // Get hero slides repeater
   $hero_slides = array();
   if (have_rows('hero_slides')) {
       while (have_rows('hero_slides')) {
           the_row();
           $hero_slides[] = array(
               'title_line_1' => get_sub_field('title_line_1'),
               'title_line_2' => get_sub_field('title_line_2'),
               'subtitle' => get_sub_field('subtitle'),
               'background_image' => get_sub_field('background_image'),
               'video_url' => get_sub_field('video_url'),
               'button_text' => get_sub_field('button_text'),
               'button_url' => get_sub_field('button_url'),
           );
       }
   }
   if (empty($hero_slides)) {
       $hero_slides = $default_hero_slides;
   }
   
   // Welcome section
   $welcome_subtitle = get_field('welcome_subtitle') ;
   $welcome_title = get_field('welcome_title') ;
   $welcome_description = get_field('welcome_description') ;
   $welcome_button_text = get_field('welcome_button_text') ;
   $welcome_button_action = get_field('welcome_button_action') ?: 'link';
   $welcome_button_url = get_field('welcome_button_url') ;
   $welcome_image = get_field('welcome_image') ;
   
   // Stats section
   $stats_background_image = get_field('stats_background_image') ;
   $stats_heading_1 = get_field('stats_heading_1') ;
   $stats_heading_2 = get_field('stats_heading_2') ;
   $stats_heading_3 = get_field('stats_heading_3') ;
   
   // Residences section
   $residences_subtitle = get_field('residences_subtitle') ;
   $residences_title = get_field('residences_title') ;
   $residences_description = get_field('residences_description') ;
   $residences_image = get_field('residences_image') ;
   $residences_button_text = get_field('residences_button_text') ;
   $residences_button_action = get_field('residences_button_action') ?: 'link';
   $residences_button_url = get_field('residences_button_url') ;
   
   // Testimonial section
   $testimonial_quote = get_field('testimonial_quote') ;
   $testimonial_author = get_field('testimonial_author') ;
   $testimonial_company = get_field('testimonial_company') ;
   
   // Amenities section
   $amenities_subtitle = get_field('amenities_subtitle') ;
   $amenities_title = get_field('amenities_title') ;
   $amenities_description = get_field('amenities_description') ;
   $amenities_image = get_field('amenities_image') ;
   $amenities_button_text = get_field('amenities_button_text') ;
   $amenities_button_action = get_field('amenities_button_action') ?: 'link';
   $amenities_button_url = get_field('amenities_button_url') ;
   
   // Why Aspire Group section
   $why_aspire_title = get_field('why_aspire_title') ?: 'Why Aspire Group?';
   
   // Neighborhood section
   $neighborhood_subtitle = get_field('neighborhood_subtitle') ;
   $neighborhood_title = get_field('neighborhood_title') ;
   $neighborhood_description = get_field('neighborhood_description') ;
   $neighborhood_button_text = get_field('neighborhood_button_text') ;
   $neighborhood_button_action = get_field('neighborhood_button_action') ?: 'link';
   $neighborhood_button_url = get_field('neighborhood_button_url') ;
   $neighborhood_google_map = get_field('neighborhood_google_map') ;

   // About section
   $about_subtitle = get_field('about_subtitle') ;
   $about_title = get_field('about_title') ;
   $about_description = get_field('about_description') ;
   $about_button_text = get_field('about_button_text') ;
   $about_button_action = get_field('about_button_action') ?: 'link';
   $about_button_url = get_field('about_button_url') ;
   $about_image_1 = get_field('about_image_1') ;
   $about_image_2 = get_field('about_image_2') ;

   // Meet Our Leader (Team) Section - mirrors the About Us page
   $team_subtitle = get_field('about_team_subtitle');
   $team_title    = get_field('about_team_title');
   $team_members  = get_field('about_team_members');
   
   // Contact section
   $contact_form_heading = get_field('contact_form_heading') ;
   $contact_form_id = get_field('contact_form_id') ;
   $contact_subtitle = get_field('contact_subtitle') ;
   $contact_title = get_field('contact_title') ;
   $contact_description = get_field('contact_description') ;
   $agent_image = get_field('agent_image') ;
   $agent_name = get_field('agent_name') ;
   $agent_title = get_field('agent_title') ;
   $agent_phone = get_field('agent_phone') ;
   $agent_email = get_field('agent_email') ;
   
   // Default data arrays for repeater fields
   $default_stats_counters = array(
       array('prefix' => '1', 'number' => 250, 'suffix' => '', 'description' => 'contemporary residential units for sale'),
       array('prefix' => '', 'number' => 746, 'suffix' => '', 'description' => 'valet parking spaces available for rent'),
       array('prefix' => '', 'number' => 24, 'suffix' => '', 'description' => 'high speed passenger elevators'),
   );
   
   $default_residences_cards = array(
       array('title' => 'Living Rooms', 'description' => 'Thoughtfully considered with modern design and awe-inspiring views for relaxing, reflecting and entertaining.', 'image' => ''),
       array('title' => 'Primary bedroom', 'description' => 'A serene oasis, the bedroom blends classic refinement with modern luxury, for unprecedented comfort and relaxation.', 'image' => ''),
       array('title' => 'Kitchen', 'description' => 'The kitchen exemplifies extraordinary detail, pairing honed imported Dolit marble with imported washed walnut wood cabinetry and Miele appliances.', 'image' => ''),
       array('title' => 'Bathroom', 'description' => 'The bathroom suite marvelously connects imported honed natural stone tile with a custom white caesarstone vanity top and refined matte black hardware.', 'image' => ''),
   );
   
   $default_panoramic_views = array(
       array('name' => 'North', 'image' => ''),
       array('name' => 'East', 'image' => ''),
       array('name' => 'South', 'image' => ''),
   );
   
   $default_amenities_banners = array(
       array('title' => 'Rooftop Pool Club', 'description' => 'Lounge in the sun and take in the beautiful city views, with a few added bonuses such as grilling BBQ stations, our rooftop lawn, and private cabanas.', 'media_type' => 'video', 'video_url' => 'https://cms.547west47.com/uploads/videos/Residence-Club/V1-0002_C0009.mp4', 'image' => ''),
       array('title' => 'The Fitness Center', 'description' => 'Award-winning personal training guru, The Wright Fit, will oversee the fitness center\'s day-to-day operations and offer a full menu of fitness and wellness training.', 'media_type' => 'image', 'video_url' => '', 'image' => ''),
       array('title' => 'Game Room & Residents\' Lounge', 'description' => 'The pristine, sunlit atrium features a 60-foot, L-shaped pool, perfect for swimming laps or just a casual dip, as well as an adjacent hot tub for relaxation.', 'media_type' => 'image', 'video_url' => '', 'image' => ''),
       array('title' => 'Children\'s Play Areas', 'description' => 'Thoughtfully considered with modern design and awe-inspiring views for relaxing, reflecting and entertaining.', 'media_type' => 'image', 'video_url' => '', 'image' => ''),
   );
   
   $default_features_categories = array(
       array(
           'title' => 'Wellness',
           'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none"><mask id="mask0_66_95" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="64" height="64"><path d="M0 3.8147e-06H64V64H0V3.8147e-06Z" fill="white"></path></mask><g mask="url(#mask0_66_95)"><path d="M57.2475 17.3881C57.2166 15.7615 57.1871 14.2248 57.1871 12.7383C57.1871 11.5735 56.2431 10.6294 55.0782 10.6294C46.0594 10.6294 39.1927 8.03725 33.469 2.47213C32.6502 1.67575 31.3472 1.67613 30.5287 2.47213C24.8056 8.03725 17.9401 10.6294 8.92186 10.6294C7.75711 10.6294 6.81286 11.5735 6.81286 12.7383C6.81286 14.2251 6.78374 15.7624 6.75249 17.3894C6.46349 32.5273 6.06761 53.2595 31.3081 62.0085C31.532 62.0861 31.7654 62.125 31.9987 62.125C32.2321 62.125 32.4657 62.0861 32.6894 62.0085C57.9319 53.2591 57.5366 32.5264 57.2475 17.3881Z" stroke="#96796E" stroke-miterlimit="10"></path><path d="M35.7422 27.6314V19.7226H28.259V27.6314H20.3496V35.1147H28.259V43.0234H35.7422V35.1147H43.6505V27.6314H35.7422Z" stroke="#96796E" stroke-miterlimit="10" stroke-linejoin="round"></path></g></svg>',
           'items' => array('Sauna, and Steam Rooms', 'Salt Rooms', 'Experience Shower', 'Fitness Center', 'Rooftop Pool and Terrace', 'Children\'s Wading Pool'),
       ),
       array(
           'title' => 'Work',
           'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none"><g clip-path="url(#clip0_66_139)"><mask id="mask0_66_139" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="64" height="64"><path d="M0 3.8147e-06H64V64H0V3.8147e-06Z" fill="white"></path></mask><g mask="url(#mask0_66_139)"><path d="M35.3688 44.6253C35.3688 46.4771 33.8676 47.9785 32.0157 47.9785C30.1637 47.9785 28.6626 46.4771 28.6626 44.6253C28.6626 42.7734 30.1637 41.2721 32.0157 41.2721C33.8676 41.2721 35.3688 42.7734 35.3688 44.6253Z" stroke="#96796E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><path d="M15.5344 47.0727V55.1367" stroke="#96796E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><path d="M48.497 55.1367V36.8851C48.497 35.2363 47.1607 33.9081 45.5199 33.9081H18.5114C16.8673 33.9081 15.5344 35.241 15.5344 36.8851V42.6381" stroke="#96796E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path></g></g></svg>',
           'items' => array('Podcast and Music Room', 'Expansive Work Hub', 'Private Work Areas', 'Conference Rooms', 'Communal Work', 'Table Library'),
       ),
       array(
           'title' => 'Play',
           'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none"><path d="M55.5684 17.9094C55.0043 17.9094 54.4692 18.0321 53.9867 18.2506C53.1556 16.5762 51.4292 15.4248 49.4332 15.4248C47.4686 15.4248 45.7656 16.5404 44.9199 18.1721C44.4873 18.0031 44.0169 17.9093 43.5244 17.9093C41.4041 17.9093 39.6851 19.6282 39.6851 21.7487C39.6851 23.8691 41.4039 25.5881 43.5244 25.5881C44.5862 25.5881 54.4541 25.5881 55.5684 25.5881C57.6888 25.5881 59.4078 23.8691 59.4078 21.7487C59.4077 19.6283 57.6888 17.9094 55.5684 17.9094Z" stroke="#96796E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path></svg>',
           'items' => array('Full Basketball Court', 'Golf Simulators', 'Bowling Alleys', 'Billiards Room', 'Teen Game Room', 'Screening Rooms'),
       ),
   );
   
   $default_scrolling_text = array(
       array('text' => 'elevated lifestyle'),
       array('text' => '·'),
       array('text' => 'World-Class services'),
       array('text' => '·'),
       array('text' => 'Perfect Balance'),
       array('text' => '·'),
       array('text' => 'Community'),
       array('text' => '·'),
   );
   
   $default_scrolling_text_2 = array(
       array('text' => 'Private'),
       array('text' => '·'),
       array('text' => 'Naturally Entertaining'),
       array('text' => '·'),
       array('text' => 'Ultimate Convenience'),
       array('text' => '·'),
       array('text' => 'Exclusive Benefits'),
       array('text' => '·'),
   );
   
   $why_aspire_icons_uri = get_template_directory_uri() . '/assets/images/why-aspire';
   $default_why_aspire_features = array(
       array(
           'icon' => $why_aspire_icons_uri . '/Quality.png',
           'icon_svg' => '<svg width="64" height="64" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70.63 95.17" xmlns:xlink="http://www.w3.org/1999/xlink"> <defs> <style type="text/css"> <![CDATA[ .fil0 {fill:#96796E;fill-rule:nonzero} ]]> </style> </defs> <g id="Layer_x0020_1"> <metadata id="CorelCorpID_0Corel-Layer"/> <g id="medal.svg"> <g> <path class="fil0" d="M7.44 35.32c0,15.38 12.51,27.88 27.88,27.88 15.37,0 27.88,-12.51 27.88,-27.88 0,-15.37 -12.51,-27.88 -27.88,-27.88 -15.37,0 -27.88,12.51 -27.88,27.88zm27.88 -24.16c13.32,0 24.16,10.84 24.16,24.16 0,13.32 -10.84,24.16 -24.16,24.16 -13.32,0 -24.16,-10.84 -24.16,-24.16 0,-13.32 10.84,-24.16 24.16,-24.16zm0 0z"/> <path class="fil0" d="M18.1 32l7.2 7.1 -1.66 9.98c-0.12,0.7 0.17,1.39 0.74,1.81 0.57,0.41 1.32,0.47 1.95,0.15l8.98 -4.66 8.98 4.66c0.62,0.32 1.37,0.27 1.95,-0.15 0.57,-0.41 0.86,-1.11 0.74,-1.81l-1.66 -9.98 7.2 -7.1c0.5,-0.49 0.68,-1.23 0.46,-1.9 -0.22,-0.67 -0.8,-1.16 -1.49,-1.26l-10 -1.51 -4.52 -9.05c-0.31,-0.63 -0.96,-1.03 -1.66,-1.03 -0.7,0 -1.35,0.4 -1.66,1.03l-4.52 9.05 -10 1.51c-0.7,0.1 -1.27,0.59 -1.49,1.26 -0.22,0.67 -0.04,1.41 0.46,1.9zm12.53 -1.14c0.6,-0.09 1.12,-0.47 1.39,-1.01l3.29 -6.59 3.29 6.59c0.27,0.54 0.79,0.92 1.39,1.01l7.28 1.1 -5.24 5.17c-0.43,0.42 -0.63,1.03 -0.53,1.63l1.21 7.26 -6.53 -3.39c-0.27,-0.14 -0.56,-0.21 -0.86,-0.21 -0.29,0 -0.59,0.07 -0.86,0.21l-6.53 3.39 1.21 -7.26c0.1,-0.6 -0.1,-1.2 -0.53,-1.63l-5.24 -5.17 7.28 -1.1zm0 0z"/> <path class="fil0" d="M37.18 1.86c0,1.03 -0.83,1.86 -1.86,1.86 -1.03,0 -1.86,-0.83 -1.86,-1.86 0,-1.03 0.83,-1.86 1.86,-1.86 1.03,0 1.86,0.83 1.86,1.86zm0 0z"/> <path class="fil0" d="M26.56 1.1c-15.64,3.99 -26.56,18.06 -26.56,34.22 0,10.04 4.22,19.49 11.63,26.19l-11.2 19.74c-0.36,0.64 -0.31,1.42 0.11,2.01 0.43,0.59 1.17,0.87 1.88,0.73l12.72 -2.64 4.47 12.6c0.24,0.69 0.86,1.17 1.59,1.23 0.72,0.07 1.42,-0.3 1.78,-0.93l12.34 -21.7 12.34 21.7c0.33,0.58 0.95,0.94 1.62,0.94 0.05,0 0.11,-0 0.16,-0.01 0.73,-0.06 1.35,-0.54 1.59,-1.23l4.47 -12.6 12.72 2.64c0.71,0.15 1.45,-0.14 1.88,-0.73 0.43,-0.59 0.47,-1.38 0.11,-2.01l-11.2 -19.74c7.41,-6.7 11.63,-16.15 11.63,-26.19 0,-16.16 -10.92,-30.23 -26.56,-34.22 -1,-0.25 -2.01,0.35 -2.26,1.34 -0.25,1 0.35,2.01 1.34,2.26 13.99,3.57 23.76,16.16 23.76,30.62 0,17.6 -14.29,31.6 -31.6,31.6 -17.32,0 -31.6,-14.02 -31.6,-31.6 0,-14.46 9.77,-27.05 23.76,-30.62 1,-0.25 1.6,-1.27 1.34,-2.26 -0.25,-0.99 -1.27,-1.59 -2.26,-1.34zm-4.8 87.77l-3.65 -10.29c-0.31,-0.88 -1.22,-1.39 -2.13,-1.2l-10.28 2.14 8.86 -15.62c5.17,3.76 11.29,6.05 17.65,6.61l-10.45 18.36zm32.91 -11.49c-0.91,-0.19 -1.82,0.32 -2.13,1.2l-3.65 10.29 -10.45 -18.36c6.36,-0.57 12.48,-2.86 17.65,-6.61l8.86 15.62 -10.29 -2.14zm0 0z"/> </g> </g> </g> </svg>',
           'title' => 'Quality First',
           'description' => 'Premium materials, superior engineering, and uncompromising construction standards.',
       ),
       array(
           'icon' => $why_aspire_icons_uri . '/coustomer.png',
           'icon_svg' => '<svg width="64" height="64" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 93.7 78.66" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512.016 512.016"> <defs> <style type="text/css"> <![CDATA[ .fil0 {fill:#96796E;fill-rule:nonzero} ]]> </style> </defs> <g id="Layer_x0020_1"> <metadata id="CorelCorpID_0Corel-Layer"/> <g id="social-care.svg"> <g> <path class="fil0" d="M50.67 60.58l-4.44 4.45 -2.62 -2.62c-0.74,-0.74 -1.94,-0.74 -2.68,0 -0.74,0.74 -0.74,1.94 0,2.68l3.96 3.96c0.74,0.74 1.94,0.74 2.68,0l5.79 -5.79c0.74,-0.74 0.74,-1.94 0,-2.68 -0.74,-0.74 -1.94,-0.74 -2.68,0l-0 0z"/> <path class="fil0" d="M25.58 47.57l0 14.66 -6.01 0c-1.05,0 -1.9,0.85 -1.9,1.9 0,1.05 0.85,1.9 1.9,1.9l12.87 0c0.93,7.12 7.03,12.63 14.4,12.63 7.37,0 13.47,-5.51 14.4,-12.63l27.48 0c2.74,0 4.97,-2.23 4.97,-4.97l0 -9.93c0,-6.44 -3.77,-12.55 -9.88,-15.36 3.01,-2.18 4.97,-5.72 4.97,-9.71 0,-6.6 -5.37,-11.97 -11.97,-11.97 -6.6,0 -11.97,5.37 -11.97,11.97 0,4 1.97,7.55 5,9.72 -1.36,0.63 -2.63,1.44 -3.79,2.41 -2.26,-4.72 -6.3,-8.6 -11.31,-10.62 4.21,-2.64 7.02,-7.32 7.02,-12.65 0,-8.23 -6.69,-14.92 -14.92,-14.92 -8.23,0 -14.92,6.7 -14.92,14.92 0,5.34 2.82,10.04 7.06,12.67 -4.92,2 -8.94,5.82 -11.26,10.61 -1.17,-0.99 -2.46,-1.81 -3.84,-2.44 3.01,-2.18 4.97,-5.71 4.97,-9.7 0,-6.6 -5.37,-11.97 -11.97,-11.97 -6.6,0 -11.97,5.37 -11.97,11.97 0,3.99 1.97,7.53 4.98,9.71 -5.85,2.7 -9.89,8.67 -9.89,15.57l0 9.71c0,2.74 2.23,4.97 4.97,4.97l5.76 0c1.05,0 1.9,-0.85 1.9,-1.9 0,-1.05 -0.85,-1.9 -1.9,-1.9l-5.76 0c-0.65,0 -1.18,-0.53 -1.18,-1.18l0 -9.71c0,-7.09 5.45,-12.93 12.4,-13.29 3.72,-0.19 7.38,1.17 10.1,4.01 -0.48,1.82 -0.71,3.74 -0.71,5.51l0 0zm43.06 -21.51c0,-4.51 3.67,-8.18 8.18,-8.18 4.51,0 8.18,3.67 8.18,8.18 0,4.5 -3.65,8.16 -8.15,8.18 -0.03,0 -0.05,0 -0.08,0 -4.49,-0.02 -8.14,-3.68 -8.14,-8.18l0 0zm7.49 11.99c7.43,-0.39 13.78,5.56 13.78,13.07l0 9.93c0,0.65 -0.53,1.17 -1.18,1.17l-20.62 0 0 -14.91c0,-1.8 -0.25,-3.66 -0.66,-5.26 2.3,-2.42 5.35,-3.83 8.67,-4zm-29.28 36.81c-5.92,0 -10.74,-4.82 -10.74,-10.74 0,-5.92 4.82,-10.74 10.74,-10.74 5.92,0 10.74,4.82 10.74,10.74 -0,5.92 -4.82,10.74 -10.74,10.74zm-11.13 -59.94c0,-6.14 4.99,-11.13 11.13,-11.13 6.14,0 11.13,4.99 11.13,11.13 0,6.13 -4.98,11.11 -11.1,11.13 -0.01,0 -0.02,-0 -0.03,-0 -0.02,0 -0.03,0 -0.05,0 -6.12,-0.02 -11.09,-5.01 -11.09,-11.13zm-6.34 32.65c0,-9.71 7.79,-17.6 17.24,-17.73 9.82,-0.13 17.71,7.87 17.71,17.47l0 14.91 -3.07 0c-0.94,-7.15 -7.09,-12.63 -14.41,-12.63 -7.35,0 -13.47,5.5 -14.41,12.63l-3.07 0 0 -14.66 0 0zm-12.46 -13.33c-0.02,0 -0.03,0 -0.05,0 -4.5,-0.01 -8.17,-3.68 -8.17,-8.18 0,-4.51 3.67,-8.18 8.18,-8.18 4.51,0 8.18,3.67 8.18,8.18 0,4.5 -3.65,8.16 -8.15,8.18z"/> </g> </g> </g> </svg>',
           'title' => 'Customer-Centric Approach',
           'description' => 'Every decision is guided by customer needs and expectations.',
       ),
       array(
           'icon' => $why_aspire_icons_uri . '/time-to-delivery.png',
           'icon_svg' => '<svg width="64" height="64" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 722.27 754.56" xmlns:xlink="http://www.w3.org/1999/xlink"> <defs> <style type="text/css"> <![CDATA[ .fil0 {fill:#96796E} ]]> </style> </defs> <g id="Layer_x0020_1"> <metadata id="CorelCorpID_0Corel-Layer"/> <path class="fil0" d="M210.74 700.03c0,-36.86 -1.62,-51.14 15.72,-85.97 8.64,-17.37 18.19,-28.22 31.06,-41.16 10.7,-10.75 28.44,-22.08 43.74,-28.47 74.35,-31.06 157.85,-0.58 193.94,68.63 17.48,33.52 16.19,50.81 16.19,86.98 0,8.75 -5.53,19 -10.86,23.03 -6.98,5.29 -14.29,7.91 -25.98,7.91l-226.95 0c-20.48,0 -36.85,-11.24 -36.85,-30.94zm138.53 -688.24l0 45.68c0,12.33 23.58,12.33 23.58,0l0 -45.68c0,-7.29 -5,-11.21 -10.4,-11.79l-2.78 0c-5.41,0.58 -10.4,4.5 -10.4,11.79zm129.69 50.11c-6.93,0 -8.01,1.23 -12.2,5.49l-46.4 42.06c-7.2,9.41 1.21,29.51 20.11,14.19l46.28 -42.16c6.19,-7.23 3.64,-19.57 -7.8,-19.57zm-247.59 11.79c0,7.7 16.74,19.65 22.47,24.7l25.3 23.32c6.36,5.03 12.23,11.81 20.91,4.48 15.53,-13.11 -12.32,-28.3 -27.81,-43.26 -3.13,-3.02 -4.93,-5.36 -8.23,-7.99 -11.37,-9.07 -11.06,-13.04 -20.86,-13.04 -6.98,0 -11.79,5.99 -11.79,11.79zm50.11 114.95c12.51,0 18.81,-1.59 30.94,-1.48 31.31,0.28 28.83,-5.4 38.32,-29.47 1.99,-5.02 8.44,-20.21 8.84,-25.05l2.95 0c0.39,4.78 6.28,18.58 8.41,24.01 9.49,24.25 7.38,30.79 37.27,30.53 12.82,-0.12 19.56,1.47 32.43,1.47l-34.13 27.77c-20.34,16.08 0.88,37.45 3.17,65.07 -49.08,-25.97 -36.48,-39.54 -73.68,-14.74 -5.13,3.43 -18.16,13.29 -23.58,14.74 0.57,-6.79 4.24,-17.55 6.2,-24.75 11.36,-41.67 8.56,-28.37 -37.15,-68.09zm41.26 -26.53c-13.52,0 -33.48,1.36 -45.9,2.74 -8.08,0.89 -15.51,-0.57 -21.83,1.75 -10.23,3.74 -17.2,19.23 -0.92,31.75 5.77,4.44 10.26,8.23 15.6,12.39 6.33,4.95 25.91,19.72 29.48,25.06 -3.57,15.31 -16.22,51.82 -16.22,64.84 0,8.52 8.49,16.21 16.22,16.21 8.71,0 48.13,-29.55 61.9,-36.84l29.77 18.87c6.02,4.01 24.89,17.97 32.13,17.97 8.65,0 16.22,-7.31 16.22,-19.15 0,-6.89 -5.78,-23.18 -7.68,-30.64 -2.51,-9.85 -6.18,-21.17 -8.54,-31.26 3.41,-5.09 8.62,-8.48 13.9,-12.62l30.33 -24.2c17.62,-13.47 9.66,-28.26 0.99,-31.97 -4.9,-2.1 -60.91,-4.9 -68.79,-4.9 -5.51,-11.46 -9.91,-26.09 -14.74,-38.32 -5.31,-13.46 -8.15,-30.95 -23.58,-30.95 -19.97,0 -24.52,40.52 -38.32,69.27zm185.69 425.91c24.76,-16.58 40.66,-25.05 76.64,-25.05 53.04,0 98.36,39.11 110.53,91.37l-157.69 0c-6.95,-1.5 -3.56,-6.26 -9.01,-23.41 -5,-15.74 -12.03,-30.31 -20.47,-42.91zm-481.9 66.31c13.1,-56.22 58.05,-91.37 117.9,-91.37 30.01,0 51.18,12.94 69.27,25.05 -10.31,15.4 -19.33,35.33 -23.59,54.52 -1.31,5.86 -0.31,9.87 -4.7,11.51l-158.88 0.28zm558.54 -116.43l-7.37 0c-24.37,0 -48.63,-23.7 -48.63,-48.63l0 -8.84c0,-37.7 51.74,-67.1 88.82,-34.29 21.08,18.65 22.42,54.37 2.96,74.48 -8.62,8.92 -18.88,17.28 -35.77,17.28zm-445.06 -106.11c28.8,0 53.05,24.48 53.05,47.17l0 10.31c0,24.74 -24.32,48.63 -48.63,48.63 -20.51,0 -28.44,-2.39 -42.41,-16.54 -32.16,-32.59 -7.59,-89.57 37.99,-89.57zm150.32 4.43c0,-70.43 100.53,-98.98 134.64,-28.53 23.12,47.76 -16.74,99.27 -56.52,99.27 -23.02,0 -42.05,-2.11 -59.32,-21.74 -9.89,-11.25 -18.79,-28.41 -18.79,-49zm-23.58 -5.9c0,28.67 4.89,51.54 25.41,71.86 9.54,9.44 12.88,9.46 14.38,15.09 -20.23,1.68 -66.08,33.63 -78.1,51.58 -6.5,-4.35 -10.71,-8.3 -18.65,-12.3l-21.15 -9.8c7.7,-11.5 29.48,-21.36 29.48,-63.37 0,-38.89 -34.68,-75.16 -72.21,-75.16 -26.8,0 -41.68,4.08 -60.06,22.46 -31.7,31.7 -28.69,83.61 0.74,110.54 3.91,3.58 3.27,1.45 6.26,5.53 -6.17,2.95 -12.3,4.25 -18.56,7.96 -6.12,3.63 -10.37,6.43 -16.24,10.3 -28.91,19.04 -58.05,64.01 -58.05,102.59 0,5.77 5.49,10.31 11.79,10.31l173.9 0c0,22.92 -1.02,40.52 14.37,57.85 8.23,9.27 21.87,18.79 38.68,18.79l244.65 0c29.94,0 53.05,-28.14 53.05,-58.95l0 -17.69 173.9 0c29.24,0 -2.58,-68.33 -18.11,-86.53 -8.46,-9.91 -15.99,-18.33 -27.26,-25.79 -23.93,-15.82 -15.37,-9.09 -35.69,-18.83 2.7,-3.69 6.42,-5.19 10.34,-10.3 3.29,-4.3 6.35,-7.45 9.31,-12.79 29.58,-53.57 -11.23,-115.44 -62.38,-115.44 -26.08,0 -41.89,4.18 -60.83,23.18 -27.43,27.52 -29.28,76.88 -2.95,103.96 3.97,4.08 7.71,6.9 10.72,11.39 -24.96,11.97 -12.39,3.76 -39.8,22.1 -7.88,-11.77 -22.42,-22.14 -34.1,-30.74 -7.93,-5.84 -32.58,-19.9 -44.01,-20.84 1.45,-5.41 5.06,-5.84 13.64,-14.36 6.11,-6.07 7.41,-8.43 12.31,-15.69 17.56,-26.07 18.45,-64.59 4.05,-92.8 -22.74,-44.53 -73.01,-63.94 -122.04,-44.35 -10.28,4.11 -20.06,11.31 -27.7,17.98 -7.2,6.29 -14.83,17.6 -19.31,26.37 -4.92,9.6 -9.8,22.1 -9.8,35.89z"/> </g> </svg>',
           'title' => 'Timely Delivery',
           'description' => 'Commitment to delivering projects on schedule.',
       ),
       array(
           'icon' => $why_aspire_icons_uri . '/location.png',
           'icon_svg' => '<svg width="64" height="64" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 93.21 94.5" xmlns:xlink="http://www.w3.org/1999/xlink"> <defs> <style type="text/css"> <![CDATA[ .fil0 {fill:#96796E} ]]> </style> </defs> <g id="Layer_x0020_1"> <metadata id="CorelCorpID_0Corel-Layer"/> <path class="fil0" d="M26.58 31.19c-1.47,0 -1.48,-0.67 -1.48,-1.85 0,-0.6 6.17,-6.44 6.69,-6.97 2.15,-2.15 17.45,-17.74 18.97,-18.69 1.49,-0.93 3.88,-0.98 5.4,-0.05 1.96,1.2 16.63,16.26 19.1,18.73 0.94,0.94 6.69,6.31 6.69,7.15 0,1.17 -0.57,1.66 -1.66,1.66 -1.01,0 -2.52,-1.88 -3.55,-2.91l-16.24 -16.24c-1.22,-1.22 -5.5,-6.09 -6.96,-6.1 -1.62,-0.02 -2.81,1.76 -3.74,2.69l-21.23 21.22c-0.53,0.53 -1.04,1.34 -1.98,1.34zm40.42 -24.36c0,2.72 2.78,2.81 3.1,0.15 0.1,-0.83 -0.15,-0.59 0.34,-1.14 0.6,-0.68 1.87,-0.49 3.02,-0.49 2.04,0 1.48,2.8 1.48,5.72 0,1.23 -0.01,2.47 -0.01,3.7 0.01,3.32 3.15,2.64 3.15,0.18l0 -7.57c0,-7.11 -11.07,-6.72 -11.07,-0.55zm-24.36 33.59c0,2.46 -0.49,4.8 1.48,4.8 3.48,0 -0.32,-7.01 3.69,-7.01l10.89 0c3,0 2.4,3.3 2.4,5.17 0,1.29 0.01,2.59 -0.01,3.88 -0.03,3.78 3.14,2.76 3.14,0.18 0,-3.62 0.5,-7.98 -1.31,-10.32 -0.81,-1.05 -2.38,-2.05 -4.23,-2.05l-10.7 0c-2.86,0 -5.35,2.49 -5.35,5.35zm-38.94 25.66c0.17,-0.23 6.18,-4.98 7.38,-4.98 3.49,0 3.47,0.93 6.33,4.75 1.47,1.96 2.78,3.77 4.24,5.72l7.39 9.96c1.8,3.2 -0.46,4.7 -2.44,6.18 -1.43,1.07 -2.8,2.13 -4.27,3.11l-13.97 -18.51c-1.57,-2.1 -3.24,-4.09 -4.67,-6.22zm18.49 28.42l-0.59 0c-0.49,-0.14 -0.9,-0.64 -1.51,-1.45l-17.48 -23.31c-0.68,-0.9 -2.61,-3 -2.61,-4.03 0,-0.85 0.47,-1.02 1,-1.4l4.01 -3c1.91,-1.44 3.93,-3.16 6.25,-3.16 4.14,0 5.37,1.93 7.54,4.83 1.66,2.21 3.2,4.33 4.88,6.56 1.7,2.27 3.28,4.37 4.98,6.64 2.64,3.51 4.97,5.54 3.51,9.7 -0.28,0.81 -0.51,1.19 -0.94,1.83 -1.15,1.71 -5.56,4.5 -7.53,5.94 -0.64,0.47 -1.12,0.75 -1.52,0.84zm-4.65 -38.39c0,0.89 0.52,1.66 1.48,1.66 1.15,0 1.53,-1.05 2.16,-1.71 2.06,-2.15 3.9,-3.77 6.5,-5.31 1.64,-0.97 3.25,-2.04 5.74,-2.2 6.51,-0.41 7.66,1.64 11.25,4.24 1.71,1.24 3.11,1.86 6.09,1.84 3.39,-0.01 8.89,-0.68 10.76,1.06 1.25,1.16 1.66,3.33 0.71,4.88l-1 1.58c-1.64,1.81 -14.16,-0.93 -14.16,1.9 0,0.96 0.22,1.85 1.48,1.85l10.71 0c2.61,0 3.83,-1.56 4.59,-2.06l8.68 -2.58c2.14,-0.71 4.25,-1.64 6.24,-2.62 2.94,-1.46 5.48,-3.91 9.36,-2.03 1.96,0.95 1.96,1.22 1.96,2.47 0,0.73 -4.4,3.85 -5.2,4.39 -5.88,4 -11.9,8.11 -18.9,10.44 -2.19,0.73 -3.7,0.94 -5.92,1.28 -1.6,0.24 -11.96,0.5 -14.27,0.49 -1.07,-0 -1.35,0.14 -2.21,0.19 -1.59,0.09 -3.41,-0.12 -4.97,0.01 -1.29,0.11 -3.77,0.09 -4.31,0.49 -1.05,0.79 -0.74,2.56 0.97,2.65l4.62 -0.2c0.79,0 1.63,0.03 2.41,0.01 0.96,-0.03 1.26,-0.2 2.39,-0.2 3.43,0.01 6.2,-0.2 9.6,-0.18l4.61 -0.18c8.68,-0.46 17.32,-5.52 24.21,-10.12 2.02,-1.35 3.8,-2.6 5.74,-4.04 2.51,-1.88 4.38,-3.03 4.38,-5.96 0,-3.44 -5.01,-5.35 -7.94,-5.35 -1.94,0 -3.89,0.8 -5.17,1.47 -3.69,1.93 -4.51,2.65 -9.25,4.22 -1.2,0.4 -4.04,1.47 -5.33,1.5 0,-0.97 0.11,-1.71 -0.04,-2.72 -0.08,-0.52 -0.27,-1.24 -0.52,-1.7 -3.78,-7.25 -12.76,-1.76 -17.94,-4.77 -2.12,-1.23 -1.9,-1.92 -5.5,-3.73 -4.45,-2.25 -10.16,-2.04 -14.29,0.47 -1.01,0.61 -1.78,1.07 -2.73,1.7 -1.64,1.1 -6.97,5.48 -6.97,6.87zm35.42 -56.11l0.15 0c2.68,0.01 4.37,0.41 6.38,2.35 7.22,6.97 15.27,15.28 22.51,22.52 1.06,1.06 2.91,2.52 2.91,4.48 0,4.55 -4.03,5.43 -5.35,4.8l0 14.77c0.03,4.65 -2.55,3.06 -2.96,2.22 -0.5,-1.02 0.13,-17.54 -0.22,-18.79 -0.19,-0.68 -13.77,-13.95 -14.58,-14.76 -1.25,-1.25 -7.64,-7.82 -8.44,-8.35 -0.51,0.76 -6.2,6.29 -7.34,7.43 -4.86,4.86 -9.48,9.83 -14.49,14.67 -1.13,1.1 -0.89,0.75 -0.88,2.82 0.01,1.23 0,2.46 0,3.69 0,2.08 0.64,5.72 -1.48,5.72 -1.18,0 -1.66,-0.52 -1.66,-1.85l0 -7.57 -1.48 0c-2.16,0 -4.06,-1.9 -4.06,-4.61 0,-2.13 1.86,-3.43 3,-4.57l18.92 -18.92c2.09,-2.09 5.21,-6.03 9.07,-6.04z"/> </g> </svg>',
           'title' => 'Prime Locations',
           'description' => 'Strategically selected locations with excellent connectivity.',
       ),
       array(
           'icon' => $why_aspire_icons_uri . '/transperancy.png',
           'icon_svg' => '<svg width="64" height="64" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 77.17 77.17" xmlns:xlink="http://www.w3.org/1999/xlink"> <defs> <style type="text/css"> <![CDATA[ .fil0 {fill:#96796E;fill-rule:nonzero} ]]> </style> </defs> <g id="Layer_x0020_1"> <metadata id="CorelCorpID_0Corel-Layer"/> <g id="balance.svg"> <g> <g> <path class="fil0" d="M77.04 47.06l0.01 -0 -12.67 -27.65 3.07 -1.53 -1.15 -2.3 -3 1.49 -0.41 -0.88c-0.3,-0.65 -1.06,-0.93 -1.71,-0.63 -0.28,0.13 -0.5,0.35 -0.63,0.63l-0.36 0.79c-2.18,-1.01 -4.55,-1.54 -6.96,-1.54l-10.8 0 0 -2.57 2.57 0 0 -2.57 -2.21 0 0.93 -3.7c0.71,-2.84 -1.02,-5.72 -3.86,-6.43 -2.84,-0.71 -5.72,1.02 -6.43,3.86 -0.21,0.84 -0.21,1.73 0,2.57l0.93 3.7 -2.21 0 0 2.57 2.57 0 0 2.57 -10.8 0c-2.41,0 -4.78,0.53 -6.96,1.54l-0.36 -0.79c-0.3,-0.65 -1.06,-0.93 -1.71,-0.63 -0.28,0.13 -0.51,0.35 -0.63,0.63l-0.4 0.88 -3 -1.5 -1.15 2.31 3.07 1.54 -12.67 27.64c-0.08,0.17 -0.12,0.35 -0.12,0.54 0.01,4.97 4.03,9 9,9l12.86 0c4.97,-0.01 9,-4.03 9,-9 -0,-0.18 -0.05,-0.37 -0.13,-0.53l-12.71 -27.75c1.85,-0.86 3.86,-1.3 5.89,-1.3l10.8 0 0 47.06 -4.39 4.39 -4.61 0c-3.55,0 -6.43,2.88 -6.43,6.43 0,0.71 0.58,1.29 1.29,1.29l36.01 0c0.71,0 1.29,-0.58 1.29,-1.29 -0,-3.55 -2.88,-6.43 -6.43,-6.43l-4.61 0 -4.39 -4.39 0 -47.06 10.8 0c2.04,-0 4.05,0.44 5.89,1.3l-12.72 27.75c-0.08,0.17 -0.12,0.35 -0.12,0.54 0.01,4.97 4.03,9 9,9l12.86 0c4.97,-0.01 9,-4.03 9,-9 -0,-0.18 -0.05,-0.37 -0.13,-0.53zm-55.18 6.96l-12.86 0c-3.05,-0 -5.69,-2.15 -6.3,-5.15l25.47 0c-0.61,2.99 -3.25,5.14 -6.3,5.15zm5.71 -7.72l-24.29 0 11.81 -25.78c0.22,0.06 0.44,0.06 0.66,0l11.81 25.78zm8.86 -42.68c1,-1.19 2.78,-1.34 3.97,-0.34 0.12,0.1 0.24,0.22 0.34,0.34 0.52,0.66 0.7,1.53 0.5,2.34l-1.08 4.32 -3.14 0 -1.08 -4.32c-0.21,-0.82 -0.02,-1.68 0.5,-2.34zm0.87 11.81l0 -2.57 2.57 0 0 2.57 -2.57 0zm2.57 2.57l0 46.3 -2.57 0 0 -46.3 2.57 0zm11.58 54.02c1.64,0 3.09,1.03 3.64,2.57l-33 0c0.55,-1.54 2,-2.57 3.64,-2.57l25.72 0zm-8.25 -2.57l-9.22 0 2.57 -2.57 4.08 0 2.57 2.57zm18.21 -48.92c0.21,0.07 0.45,0.06 0.65,-0.03l11.83 25.8 -24.29 0 11.81 -25.77zm6.76 33.49l-12.86 0c-3.05,-0 -5.69,-2.15 -6.3,-5.15l25.47 0c-0.61,2.99 -3.25,5.14 -6.3,5.15z"/> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </g> </g> </svg>',
           'title' => 'Transparent Practices',
           'description' => 'Clear communication and complete transparency throughout the buying journey.',
       ),
       array(
           'icon' => $why_aspire_icons_uri . '/future-ready-Design.png',
           'icon_svg' => '<svg width="64" height="64" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 225.33 241.72" xmlns:xlink="http://www.w3.org/1999/xlink"> <defs> <style type="text/css"> <![CDATA[ .fil0 {fill:#96796E} ]]> </style> </defs> <g id="Layer_x0020_1"> <metadata id="CorelCorpID_0Corel-Layer"/> <path class="fil0" d="M97.74 219.57l29.85 0c0,7.64 -5.3,13.96 -11.55,13.96 -5.61,0 -11.02,0.79 -15.02,-4.24 -2,-2.52 -3.28,-5.33 -3.28,-9.72zm26 -155.51c0,4.63 10.01,6.26 10.11,6.26 3.55,0 6.8,-5.22 0,-8.18 -2.95,-1.29 -10.11,-4.22 -10.11,1.93zm-14.93 -60.19l0 15.41c0,5.17 7.71,5.17 7.71,0l0 -15.41c0,-5.17 -7.71,-5.17 -7.71,0zm-77.03 65.96c3.27,0 3.85,-2.31 3.85,-4.81 0,-2.31 -14.38,-10.59 -17.81,-10.59 -0.4,0 -8.15,3.37 1.95,9.12 1.98,1.13 3.84,2.09 5.85,3.3 1.5,0.9 4.26,2.99 6.16,2.99zm157.92 -4.81c0,9.72 9.79,1.99 15.86,-1.47 1.72,-0.98 4.24,-2.16 4.97,-4.24 0.7,-2.01 -0.25,-4.88 -3.98,-4.88 -0.99,0 -16.85,7.77 -16.85,10.59zm-170.92 105.92c1.16,0 11.34,-6.11 13.7,-7.48 6.85,-3.99 1.51,-9.69 -2.76,-7.61l-7.37 4.23c-1.69,1 -6.21,3.29 -7.06,4.52 -1.94,2.84 0.3,6.34 3.48,6.34zm35.63 -153.11c0,2.7 5.57,11.54 7.41,14.74 3.12,5.39 7.99,3.25 7.99,-1.25 0,-1.86 -5.56,-10.35 -7.21,-13.49 -3.51,-6.69 -8.19,-1.71 -8.19,0.01zm135.29 140.59c0,4.33 1.49,3.99 7.43,7.5 1.08,0.64 8.6,5.02 8.94,5.02 3.26,0 5.69,-2.69 4.32,-5.71 -0.87,-1.9 -4.79,-3.56 -6.82,-4.79 -2.99,-1.8 -8.74,-5.78 -11.07,-5.02 -1.13,0.37 -2.8,1.73 -2.8,3zm-34.19 -127.11c0,4.61 4.9,6.4 7.82,1.55 1.36,-2.25 7.59,-12.93 7.59,-14.07 0,-4.17 -5.11,-6.56 -7.87,-1.61 -1.28,2.3 -7.54,12.43 -7.54,14.13zm-155.51 80.89c0,2.38 1.95,4.33 4.33,4.33l14.93 0c5.02,0 5.91,-8.18 -1.45,-8.18 -6.3,0 -17.81,-1.49 -17.81,3.85zm202.22 -0.48c0,6.68 5.09,4.81 18.78,4.81 5,0 7.2,-8.18 -1.93,-8.18 -4.72,0 -16.85,-1.32 -16.85,3.37zm-61.63 -39c0,4.21 2.42,3.08 7.64,9.69 5.58,7.06 4.87,9.09 9.21,9.09 1.41,0 3.37,-2.4 3.37,-3.85 0,-3.41 -10.52,-15.6 -14.04,-17.75 -2.51,-1.53 -6.18,-0.86 -6.18,2.82zm-65 44.78l0 -4.33c20.78,0 31.78,9.97 31.78,32.26 -15.04,0 -23.99,-3.95 -29.37,-15.88 -1.18,-2.62 -2.4,-8.18 -2.4,-12.04zm42.85 27.93l-2.89 0c0,-16.88 4.26,-32.07 21.48,-37.74 6.38,-2.1 11.61,-2.7 18.97,-2.7 0,26.32 -12.26,40.44 -37.56,40.44zm-7.22 -22.63l-0.96 0c-1.05,-4.54 -8.09,-10.47 -12.03,-12.53 -8.98,-4.69 -16.34,-4.8 -26.49,-4.8 -5.24,0 -4.33,6.3 -4.33,10.59 0,5.2 1.52,12.31 3.08,16.18 5.97,14.8 19.13,21.38 36.88,21.38l0 16.85c0,5.78 8.18,5.88 8.18,0l0 -16.85c14.89,0 26.83,-3.84 35.01,-10.73 1.83,-1.54 4,-4.22 5.35,-6.21 6.59,-9.67 6.6,-16.77 7.92,-26.74 0.31,-2.35 0.47,-7.98 -0.44,-10.42 -1.51,-4.04 -11.87,-2.3 -14.14,-2.23 -4.79,0.15 -10.24,1.22 -14.58,2.76 -10.63,3.75 -20.88,11.68 -23.46,22.76zm-20.7 68.37l44.29 0 0 20.7 -44.29 0 0 -20.7zm-42.85 -82.81c0,-16.24 7.46,-33.22 18.66,-44.41 1.39,-1.39 2.43,-2.49 3.84,-3.86 3.32,-3.21 10.08,-7.24 14.25,-9.34 29.01,-14.6 63.1,-3.66 81.21,21.99 10.35,14.65 14.31,31.6 10.57,49.56 -2.19,10.49 -7.85,22.39 -15.02,29.75 -2.71,2.78 -3.29,4.03 -7.57,7.35l-8.83 6.1c-5.65,3.46 -11.74,11.63 -11.88,17.97l-40.44 0c-0.14,-6.41 -6.38,-14.2 -11.94,-17.92 -3.17,-2.12 -5.87,-3.95 -8.78,-6.15 -7.39,-5.58 -15.45,-16.66 -19.05,-25.73 -2.98,-7.5 -5.01,-17.06 -5.01,-25.32zm-7.71 -2.41c0,12.15 0.52,18.65 5.09,30.06 5.53,13.83 13.7,23.59 25.11,32.19 3.73,2.81 8.72,4.92 11.8,9.86 4.82,7.74 0.37,5.08 0.37,9.74l0 27.44c0,5.08 4.43,4.33 7.7,4.33l0 2.89c0,9.62 10.05,19.26 19.74,19.26l5.78 0c9.69,0 19.74,-9.64 19.74,-19.26l0 -2.89c3.28,0 7.7,0.74 7.7,-4.33 0,-4.54 0.69,-27.2 -0.58,-29.75 -0.59,-1.19 -0.47,-1.18 -1.83,-1.54 1.64,-3.41 1.38,-5.29 5.27,-9.17 4.21,-4.21 12.61,-6.58 23.69,-20.12 7.44,-9.1 15.82,-26.07 15.82,-42.44 0,-14.08 -1.15,-21.55 -7.55,-34.34 -2.43,-4.86 -6.85,-11.96 -10.62,-15.86 -7.33,-7.58 -9.83,-10.27 -19.54,-16.09 -2.12,-1.27 -3.63,-2.1 -5.94,-3.21 -24.48,-11.78 -54.4,-6.95 -74.87,9.72l-4.87 4.28c-4.21,4.24 -8.61,9.58 -11.71,14.77 -5.55,9.28 -10.31,22.51 -10.31,34.47z"/> </g> </svg>',
           'title' => 'Future-Ready Design',
           'description' => 'Modern architecture and thoughtful planning for evolving lifestyles.',
       ),
   );
   
   $default_neighborhood_places = array(
       array('title' => 'Restaurants', 'image' => '', 'content' => '<p>Chiptole – <em>0.5km</em><br>Dunkin Donut – <em>1.2km</em><br>Golden Palace – <em>2km</em><br>Istanbul Restaurant – <em>1.5km</em><br>La Casa Bella – <em>0.5km</em><br>LaoJie Hotpot – <em>1.4km</em></p>'),
       array('title' => 'Shopping', 'image' => '', 'content' => '<p>Fine and Dandy Shop – <em>1.5km</em><br>LaDuca Shoes – <em>1.4km</em><br>Home Depot – <em>1.8km</em><br>Stop and Shop – <em>0.8km</em><br>Top Hill Auto – <em>1.6km</em></p>'),
       array('title' => 'Landmarks', 'image' => '', 'content' => '<p>Clinton Court – <em>0.5km</em><br>Actor\'s Studio – <em>1.2km</em><br>Landmark Tavern – <em>2km</em><br>The Intrepid – <em>1.5km</em><br>La Casa Bella – <em>0.5km</em><br>Clinton Garden – <em>1.4km</em></p>'),
       array('title' => 'Transportation', 'image' => '', 'content' => '<p>Clinton Court – <em>0.5km</em><br>Actor\'s Studio – <em>1.2km</em><br>Landmark Tavern – <em>2km</em><br>The Intrepid – <em>1.5km</em><br>La Casa Bella – <em>0.5km</em><br>Clinton Garden – <em>1.4km</em></p>'),
       array('title' => 'Park & Active', 'image' => '', 'content' => '<p>Fine and Dandy Shop – <em>1.5km</em><br>LaDuca Shoes – <em>1.4km</em><br>Home Depot – <em>1.8km</em><br>Stop and Shop – <em>0.8km</em><br>Top Hill Auto – <em>1.6km</em></p>'),
       array('title' => 'Art & Culture', 'image' => '', 'content' => '<p>Clinton Court – <em>0.5km</em><br>Actor\'s Studio – <em>1.2km</em><br>Landmark Tavern – <em>2km</em><br>The Intrepid – <em>1.5km</em><br>La Casa Bella – <em>0.5km</em><br>Clinton Garden – <em>1.4km</em></p>'),
   );
   
   // Get repeater fields or use defaults
   $stats_counters = have_rows('stats_counters') ? array() : $default_stats_counters;
   if (have_rows('stats_counters')) {
       while (have_rows('stats_counters')) {
           the_row();
           $stats_counters[] = array(
               'prefix' => get_sub_field('prefix'),
               'number' => get_sub_field('number'),
               'suffix' => get_sub_field('suffix'),
               'description' => get_sub_field('description'),
           );
       }
   }
   
   $residences_cards = have_rows('residences_cards') ? array() : $default_residences_cards;
   if (have_rows('residences_cards')) {
       while (have_rows('residences_cards')) {
           the_row();
           $residences_cards[] = array(
               'title' => get_sub_field('title'),
               'description' => get_sub_field('description'),
               'image' => get_sub_field('image'),
           );
       }
   }
   
   $panoramic_views = have_rows('panoramic_views') ? array() : $default_panoramic_views;
   if (have_rows('panoramic_views')) {
       while (have_rows('panoramic_views')) {
           the_row();
           $panoramic_views[] = array(
               'name' => get_sub_field('name'),
               'image' => get_sub_field('image'),
           );
       }
   }
   
   $amenities_banners = have_rows('amenities_banners') ? array() : $default_amenities_banners;
   if (have_rows('amenities_banners')) {
       while (have_rows('amenities_banners')) {
           the_row();
           $amenities_banners[] = array(
               'title' => get_sub_field('title'),
               'location' => get_sub_field('location'),
               'description' => get_sub_field('description'),
               'media_type' => get_sub_field('media_type'),
               'video_url' => get_sub_field('video_url'),
               'image' => get_sub_field('image'),
               'link' => get_sub_field('link'),
           );
       }
   }
   
   $features_categories = have_rows('features_categories') ? array() : $default_features_categories;
   if (have_rows('features_categories')) {
       while (have_rows('features_categories')) {
           the_row();
           $items = array();
           if (have_rows('items')) {
               while (have_rows('items')) {
                   the_row();
                   $items[] = get_sub_field('text');
               }
           }
           $features_categories[] = array(
               'title' => get_sub_field('title'),
               'icon_svg' => get_sub_field('icon_svg'),
               'items' => $items,
           );
       }
   }
   
   $scrolling_text_items = have_rows('scrolling_text_items') ? array() : $default_scrolling_text;
   if (have_rows('scrolling_text_items')) {
       while (have_rows('scrolling_text_items')) {
           the_row();
           $scrolling_text_items[] = array(
               'text' => get_sub_field('text'),
           );
       }
   }
   
   $scrolling_text_items_2 = have_rows('scrolling_text_items_2') ? array() : $default_scrolling_text_2;
   if (have_rows('scrolling_text_items_2')) {
       while (have_rows('scrolling_text_items_2')) {
           the_row();
           $scrolling_text_items_2[] = array(
               'text' => get_sub_field('text'),
           );
       }
   }
   
   $why_aspire_features = have_rows('why_aspire_features') ? array() : $default_why_aspire_features;
   if (have_rows('why_aspire_features')) {
       while (have_rows('why_aspire_features')) {
           the_row();
           $why_aspire_features[] = array(
               'icon' => get_sub_field('icon'),
               'icon_svg' => get_sub_field('icon_svg'),
               'title' => get_sub_field('title'),
               'description' => get_sub_field('description'),
           );
       }
   }
   
   $neighborhood_places = have_rows('neighborhood_places') ? array() : $default_neighborhood_places;
   if (have_rows('neighborhood_places')) {
       while (have_rows('neighborhood_places')) {
           the_row();
           $neighborhood_places[] = array(
               'title' => get_sub_field('title'),
               'image' => get_sub_field('image'),
               'content' => get_sub_field('content'),
           );
       }
   }

   /**
    * Pull selected Project Detail posts for each Home page project section.
    * If projects are selected on the Home page, they override the legacy
    * repeater content. Otherwise, the existing default content is preserved.
    */
   $home_ongoing_ids  = get_field('home_ongoing_projects');
   $home_upcoming_ids = get_field('home_upcoming_projects');

   if (!empty($home_ongoing_ids) && is_array($home_ongoing_ids)) {
       $residences_cards = array();
       foreach ($home_ongoing_ids as $pid) {
           $residences_cards[] = array(
               'title'         => get_the_title($pid),
               'description'   => get_field('project_card_description', $pid),
               'image'         => get_field('project_card_image', $pid),
               'button_text'   => get_field('project_card_button_text', $pid) ?: 'Learn More',
               'button_action' => 'link',
               'button_url'    => get_permalink($pid),
           );
       }
   }

   if (!empty($home_upcoming_ids) && is_array($home_upcoming_ids)) {
       $amenities_banners = array();
       foreach ($home_upcoming_ids as $pid) {
           $amenities_banners[] = array(
               'title'       => get_the_title($pid),
               'location'    => get_field('project_card_location', $pid),
               'description' => get_field('project_card_description', $pid),
               'media_type'  => get_field('project_card_media_type', $pid) ?: 'image',
               'video_url'   => get_field('project_card_video_url', $pid),
               'image'       => get_field('project_card_image', $pid),
               'link'        => get_permalink($pid),
           );
       }
   }

   ?>
<div data-elementor-type="wp-page" data-elementor-id="36" class="elementor elementor-36">
   <!-- Hero Section -->
   <?php if ($hero_display_type === 'slider') : ?>
   <!-- Hero Slider Mode -->
   <?php
   $slider_settings = array(
       'slidesPerView' => 1,
       'effect' => $hero_slider_effect,
       'speed' => (int) $hero_slider_speed,
       'loop' => true,
   );
   if ($hero_slider_autoplay) {
       $slider_settings['autoplay'] = array(
           'delay' => (int) $hero_slider_autoplay_delay,
           'disableOnInteraction' => false,
       );
   }
   if ($hero_slider_effect === 'fade') {
       $slider_settings['fadeEffect'] = array('crossFade' => true);
   }
   ?>
   <div class="elementor-element elementor-element-3aea32a hero-slider-wrapper e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="3aea32a" data-element_type="container" style="z-index: 0;">
      <div class="swiper hero-swiper" data-settings='<?php echo wp_json_encode($slider_settings); ?>'>
         <div class="swiper-wrapper">
            <?php foreach ($hero_slides as $index => $slide) : ?>
            <div class="swiper-slide">
               <div class="hero-slide-inner e-con-inner" style="<?php if (!empty($slide['background_image'])) : ?>background-image: url('<?php echo esc_url($slide['background_image']); ?>');<?php endif; ?>">
                  <?php if (!empty($slide['video_url'])) : ?>
                  <div class="elementor-background-video-container" data-vimeo-initialized="true">
                     <div class="elementor-background-video-embed" data-video-url="<?php echo esc_url($slide['video_url']); ?>"></div>
                  </div>
                  <?php endif; ?>
                  <div class="hero-slide-content">
                     <?php if (!empty($slide['title_line_1'])) : ?>
                     <div class="elementor-element elementor-element-2feb0bc animated-fast elementor-widget-tablet__width-initial elementor-widget elementor-widget-heading hero-animate hero-animate-up" data-id="2feb0bc" data-element_type="widget" data-settings='{"_animation":"opal-move-up"}' data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                           <h1 class="elementor-heading-title elementor-size-default mb-0"><?php echo esc_html($slide['title_line_1']); ?></h1>
                        </div>
                     </div>
                     <?php endif; ?>
                     <div class="elementor-element elementor-element-efc9b3e e-flex e-con-boxed e-con e-child" data-id="efc9b3e" data-element_type="container">
                        <div class="e-con-inner">
                           <?php if (!empty($slide['title_line_2'])) : ?>
                           <div class="elementor-element elementor-element-3d60cb1 animated-fast elementor-widget-mobile__width-inherit elementor-widget elementor-widget-heading hero-animate hero-animate-right" data-id="3d60cb1" data-element_type="widget" data-settings='{"_animation":"opal-move-right"}' data-widget_type="heading.default" style="animation-delay: 0.1s;">
                              <div class="elementor-widget-container">
                                 <h1 class="elementor-heading-title elementor-size-default"><?php echo esc_html($slide['title_line_2']); ?></h1>
                              </div>
                           </div>
                           <?php endif; ?>
                           <?php if (!empty($slide['button_text'])) :
                              $slide_button_action = $slide['button_action'] ?? 'link';
                              $slide_btn_url = ($slide_button_action === 'link') ? ($slide['button_url'] ?? '#') : (($slide_button_action === 'page') ? ($slide['button_page'] ?? '#') : '#easto-button-popup-8feb59a');
                              $slide_popup_class = ($slide_button_action === 'popup') ? ' button-popup' : '';
                              $slide_popup_effect = ($slide_button_action === 'popup') ? ' data-effect="mfp-zoom-in"' : '';
                           ?>
                           <a class="elementor-element elementor-element-c7249c0 e-con-full animated-fast e-flex e-con e-child hero-animate hero-animate-left hero-slide-button<?php echo esc_attr($slide_popup_class); ?>" data-id="c7249c0" data-element_type="container" data-settings='{"animation":"opal-move-left"}' href="<?php echo esc_url($slide_btn_url); ?>"<?php echo $slide_popup_effect; ?> style="animation-delay: 0.2s;">
                              <div class="elementor-element elementor-element-c600517 elementor-widget elementor-widget-heading" data-id="c600517" data-element_type="widget" data-widget_type="heading.default">
                                 <div class="elementor-widget-container">
                                    <h6 class="elementor-heading-title elementor-size-default"><?php echo esc_html($slide['button_text']); ?></h6>
                                 </div>
                              </div>
                           </a>
                           <?php endif; ?>
                        </div>
                     </div>
                     <?php if (!empty($slide['subtitle'])) : ?>
                     <div class="elementor-element elementor-element-a872378 animated-fast elementor-widget elementor-widget-text-editor hero-animate hero-animate-up" data-id="a872378" data-element_type="widget" data-settings='{"_animation":"opal-move-up"}' data-widget_type="text-editor.default" style="animation-delay: 0.3s;">
                        <div class="elementor-widget-container">
                           <?php echo esc_html($slide['subtitle']); ?>
                        </div>
                     </div>
                     <?php endif; ?>
                  </div>
               </div>
            </div>
            <?php endforeach; ?>
         </div>
         <!-- Slider Navigation -->
         <div class="hero-swiper-pagination swiper-pagination"></div>
         <div class="hero-swiper-button-prev swiper-button-prev"></div>
         <div class="hero-swiper-button-next swiper-button-next"></div>
      </div>
   </div>
   <?php else : ?>
   <!-- Single Banner Mode -->
   <div class="elementor-element elementor-element-3aea32a e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="3aea32a" data-element_type="container" data-settings='{"background_background":"classic"}' style="z-index: 0; background-image: none;">
      <div class="e-con-inner">
         <div class="elementor-element elementor-element-2feb0bc animated-fast elementor-widget-tablet__width-initial elementor-widget elementor-widget-heading animated opal-move-up" data-id="2feb0bc" data-element_type="widget" data-settings='{"_animation":"opal-move-up"}' data-widget_type="heading.default">
            <div class="elementor-widget-container">
               <h1 class="elementor-heading-title elementor-size-default mb-0"><?php echo esc_html($hero_title_1); ?></h1>
            </div>
         </div>
         <div class="elementor-element elementor-element-efc9b3e e-flex e-con-boxed e-con e-child" data-id="efc9b3e" data-element_type="container">
            <div class="e-con-inner">
               <div class="elementor-element elementor-element-3d60cb1 animated-fast elementor-widget-mobile__width-inherit elementor-widget elementor-widget-heading animated opal-move-right" data-id="3d60cb1" data-element_type="widget" data-settings='{"_animation":"opal-move-right"}' data-widget_type="heading.default">
                  <div class="elementor-widget-container">
                     <h1 class="elementor-heading-title elementor-size-default"><?php echo esc_html($hero_title_2); ?></h1>
                  </div>
               </div>
               <a class="elementor-element elementor-element-c7249c0 e-con-full animated-fast e-flex e-con e-child animated opal-move-left" data-id="c7249c0" data-element_type="container" data-settings='{"background_background":"video","background_video_link":"<?php echo esc_url($hero_video_url); ?>","background_video_start":10,"background_play_on_mobile":"yes","animation":"opal-move-left"}' href="<?php echo esc_url($hero_video_link); ?>">
                  <div class="elementor-background-video-container" data-vimeo-initialized="true">
                     <div class="elementor-background-video-embed"></div>
                  </div>
                  <div class="elementor-element elementor-element-c600517 elementor-widget elementor-widget-heading" data-id="c600517" data-element_type="widget" data-widget_type="heading.default">
                     <div class="elementor-widget-container">
                        <h6 class="elementor-heading-title elementor-size-default"><?php echo esc_html($hero_video_button_text); ?></h6>
                     </div>
                  </div>
               </a>
            </div>
         </div>
         <div class="elementor-element elementor-element-a872378 animated-fast elementor-invisible elementor-widget elementor-widget-text-editor" data-id="a872378" data-element_type="widget" data-settings='{"_animation":"opal-move-up"}' data-widget_type="text-editor.default">
            <div class="elementor-widget-container">
               <?php echo esc_html($hero_subtitle); ?>
            </div>
         </div>
      </div>
      <div id="jarallax-container-0" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; z-index: -100;">
         <div style="background-position: 50% 0%; background-size: cover; background-repeat: no-repeat; background-image: url('<?php echo esc_url($hero_bg_image); ?>'); position: fixed; top: 0px; left: 0px; width: 1905px; height: 1288.4px; overflow: hidden; pointer-events: none; margin-top: -483.2px; transform: translate3d(0px, 418.8px, 0px);"></div>
      </div>
   </div>
   <?php endif; ?>
   <!-- Welcome Home Section -->
   <div class="elementor-element elementor-element-aadbbc7 e-flex e-con-boxed e-con e-parent" data-id="aadbbc7" data-element_type="container">
      <div class="e-con-inner">
         <div class="elementor-element elementor-element-2b111ff e-con-full e-flex e-con e-child" data-id="2b111ff" data-element_type="container" data-settings='{"background_background":"classic"}'>
            <div class="elementor-element elementor-element-b3291a3 e-transform animated-fast elementor-invisible elementor-widget elementor-widget-text-editor" data-id="b3291a3" data-element_type="widget" data-settings='{"_animation":"opal-move-left"}' data-widget_type="text-editor.default">
               <div class="elementor-widget-container">
                  <?php echo esc_html($welcome_subtitle); ?>
               </div>
            </div>
            <div class="elementor-element elementor-element-a2d0ada animated-fast elementor-invisible elementor-widget elementor-widget-heading" data-id="a2d0ada" data-element_type="widget" data-settings='{"_animation":"opal-move-left"}' data-widget_type="heading.default">
               <div class="elementor-widget-container">
                  <h2 class="elementor-heading-title elementor-size-default"><?php echo esc_html($welcome_title); ?></h2>
               </div>
            </div>
            <div class="elementor-element elementor-element-0025587 animated-fast elementor-invisible elementor-widget elementor-widget-text-editor" data-id="0025587" data-element_type="widget" data-settings='{"_animation":"opal-move-left"}' data-widget_type="text-editor.default">
               <div class="elementor-widget-container">
                  <?php echo wp_kses_post($welcome_description); ?>
               </div>
            </div>
            <?php
            $welcome_btn_url = ($welcome_button_action === 'link') ? $welcome_button_url : (($welcome_button_action === 'page') ? get_field('welcome_button_page') : '#easto-button-popup-8feb59a');
            $welcome_popup_class = ($welcome_button_action === 'popup') ? ' button-popup' : '';
            $welcome_popup_effect = ($welcome_button_action === 'popup') ? ' data-effect="mfp-zoom-in"' : '';
            ?>
            <div class="elementor-element elementor-element-aba3cb1 elementor-button-type-link animated-fast elementor-mobile-align-center elementor-invisible elementor-widget elementor-widget-button" data-id="aba3cb1" data-element_type="widget" data-settings='{"_animation":"opal-move-left"}' data-widget_type="button.default">
               <div class="elementor-widget-container">
                  <div class="elementor-button-wrapper">
                     <a class="elementor-button elementor-button-link elementor-size-sm<?php echo esc_attr($welcome_popup_class); ?>" href="<?php echo esc_url($welcome_btn_url); ?>"<?php echo $welcome_popup_effect; ?>>
                        <span class="elementor-button-content-wrapper">
                           <span class="elementor-button-icon">
                              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                 <path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" class="btn-icon__icon"></path>
                                 <path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" class="btn-icon__icon"></path>
                              </svg>
                           </span>
                           <span class="elementor-button-text"><?php echo esc_html($welcome_button_text); ?></span>
                        </span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
         <div class="elementor-element elementor-element-6022562 e-con-full animated-fast e-flex elementor-invisible e-con e-child" data-id="6022562" data-element_type="container" data-settings='{"background_background":"classic","animation":"opal-move-right"}' style="background-image: url('<?php echo esc_url($welcome_image); ?>');"></div>
      </div>
   </div>
   <!-- Stats Section -->
   <div class="elementor-element elementor-element-9e63b1c e-flex e-con-boxed e-con e-parent" data-id="9e63b1c" data-element_type="container"  data-settings='{"background_background":"classic"}' style="<?php if ($stats_background_image) : ?>background-image: url(<?php echo esc_url($stats_background_image); ?>);<?php endif; ?>">
      <div class="e-con-inner">
         <div class="elementor-element elementor-element-e9fada7 e-con-full e-flex e-con e-child" data-id="e9fada7" data-element_type="container">
            <div class="elementor-element elementor-element-510b40f elementor-widget__width-initial animated-fast elementor-invisible elementor-widget elementor-widget-heading" data-id="510b40f" data-element_type="widget" data-settings='{"_animation":"opal-move-right"}' data-widget_type="heading.default">
               <div class="elementor-widget-container">
                  <h2 class="elementor-heading-title elementor-size-default"><?php echo esc_html($stats_heading_1); ?></h2>
               </div>
            </div>
            <div class="elementor-element elementor-element-bb54ffa e-grid e-con-full e-con e-child" data-id="bb54ffa" data-element_type="container">
            <?php foreach ($stats_counters as $index => $counter) : ?>
            <div class="elementor-element elementor-element-cee1b7e animated-fast elementor-widget elementor-widget-counter animated opal-move-up" data-id="cee1b7e" data-element_type="widget" data-settings='{"_animation":"opal-move-up","_animation_delay":<?php echo $index * 50; ?>}' data-widget_type="counter.default">
               <div class="elementor-widget-container">
                  <style>/*! elementor - v3.22.0 - 17-06-2024 */
                     .elementor-counter{display:flex;justify-content:center;align-items:stretch;flex-direction:column-reverse}.elementor-counter .elementor-counter-number{flex-grow:var(--counter-number-grow,0)}.elementor-counter .elementor-counter-number-wrapper{flex:1;display:flex;font-size:69px;font-weight:600;line-height:1;text-align:center}.elementor-counter .elementor-counter-number-prefix{text-align:end;flex-grow:var(--counter-prefix-grow,1);white-space:pre-wrap}.elementor-counter .elementor-counter-number-suffix{text-align:start;flex-grow:var(--counter-suffix-grow,1);white-space:pre-wrap}.elementor-counter .elementor-counter-title{flex:1;display:flex;justify-content:center;align-items:center;margin:0;padding:0;font-size:19px;font-weight:400;line-height:2.5}
                  </style>
                  <div class="elementor-counter">
                     <div class="elementor-counter-title"><?php echo esc_html($counter['description']); ?></div>
                     <div class="elementor-counter-number-wrapper">
                        <span class="elementor-counter-number-prefix"><?php echo esc_html($counter['prefix']); ?></span>
                        <span class="elementor-counter-number" data-duration="2000" data-to-value="<?php echo esc_html($counter['number']); ?>" data-from-value="0" data-delimiter=","><?php echo esc_html($counter['number']); ?></span>
                        <span class="elementor-counter-number-suffix"><?php echo esc_html($counter['suffix']); ?></span>
                     </div>
                  </div>
               </div>
            </div>
            <?php endforeach; ?>
         </div>
         </div>
         
      </div>
   </div>
   <!-- Refined Residences Section -->
   <div class="elementor-element elementor-element-65c0070 e-flex e-con-boxed e-con e-parent" data-id="65c0070" data-element_type="container">
      <div class="e-con-inner">
         <div class="elementor-element elementor-element-453ae96 e-con-full e-flex e-con e-child" data-id="453ae96" data-element_type="container">
            <?php foreach ($residences_cards as $card) : ?>
            <div class="elementor-element elementor-element-836890a elementor-cta--layout-image-left elementor-cta--valign-top elementor-widget__width-initial elementor-cta--mobile-layout-image-above elementor-cta--skin-classic button-style-theme-default elementor-animated-content elementor-animated-content elementor-bg-transform elementor-bg-transform-zoom-in elementor-widget elementor-widget-easto-banner" data-id="836890a" data-element_type="widget" data-widget_type="easto-banner.default">
               <div class="elementor-widget-container">
                  <div class="elementor-cta">
                     <div class="elementor-cta__bg-wrapper">
                        <div class="elementor-cta__bg elementor-bg" style="background-image: url(<?php echo esc_url($card['image']); ?>);"></div>
                        <div class="elementor-cta__bg-overlay"></div>
                     </div>
                     <div class="elementor-cta__content">
                        <div class="elementor-cta__content-inner h-100">
                           <div class="elementor-content-wrapper redefine-residences-card-content">
                              <div>
                                 <h5 class="elementor-cta__title elementor-cta__content-item elementor-content-item"><?php echo esc_html($card['title']); ?></h5>
                                 <div class="elementor-cta__description elementor-cta__content-item elementor-content-item">
                                    <?php echo esc_html($card['description']); ?>                            
                                 </div>
                              </div>
                              <?php
                              $button_action = $card['button_action'] ?? 'link';
                              $button_url = ($button_action === 'link') ? ($card['button_url'] ?? '#') : (($button_action === 'page') ? ($card['button_page'] ?? '#') : '#easto-button-popup-8feb59a');
                              $popup_class = ($button_action === 'popup') ? ' button-popup' : '';
                              $popup_effect = ($button_action === 'popup') ? ' data-effect="mfp-zoom-in"' : '';
                              ?>
                              <div class="elementor-element elementor-element-e950585 elementor-button-type-link  elementor-widget elementor-widget-button" data-id="e950585" data-element_type="widget"  data-widget_type="button.default">
                                 <div class="elementor-widget-container">
                                    <div class="elementor-button-wrapper">
                                       <a class="elementor-button elementor-button-link elementor-size-sm btn-hover-rm color-text-light<?php echo esc_attr($popup_class); ?>" href="<?php echo esc_url($button_url); ?>"<?php echo $popup_effect; ?>>
                                          <span class="elementor-button-content-wrapper">
                                             <span class="elementor-button-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                                   <path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" class="btn-icon__icon"></path>
                                                   <path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" class="btn-icon__icon"></path>
                                                </svg>
                                             </span>
                                             <span class="elementor-button-text"><?php echo esc_html($card['button_text'] ?? 'Learn More'); ?></span>
                                          </span>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php endforeach; ?>
         </div>
         <div class="elementor-element elementor-element-1a6bc67 e-con-full e-flex e-con e-child elementor-sticky" data-id="1a6bc67" data-element_type="container" data-settings='{"sticky_on":["desktop","laptop","tablet_extra","tablet"],"sticky_parent":"yes","sticky":"top","sticky_offset":60,"sticky_effects_offset":0}'>
            <div class="elementor-element elementor-element-e9daa8c animated-fast elementor-invisible elementor-widget elementor-widget-text-editor" data-id="e9daa8c" data-element_type="widget" data-settings='{"_animation":"opal-move-up"}' data-widget_type="text-editor.default">
               <div class="elementor-widget-container">
                  <?php echo esc_html($residences_subtitle); ?>
               </div>
            </div>
            <div class="elementor-element elementor-element-3abeef4 animated-fast elementor-invisible elementor-widget elementor-widget-heading" data-id="3abeef4" data-element_type="widget" data-settings='{"_animation":"opal-move-up"}' data-widget_type="heading.default">
               <div class="elementor-widget-container">
                  <h2 class="elementor-heading-title elementor-size-default"><?php echo esc_html($residences_title); ?></h2>
               </div>
            </div>
            <div class="elementor-element elementor-element-88a9298 animated-fast elementor-invisible elementor-widget elementor-widget-text-editor" data-id="88a9298" data-element_type="widget" data-settings='{"_animation":"opal-move-up"}' data-widget_type="text-editor.default">
               <div class="elementor-widget-container">
                  <?php echo esc_html($residences_description); ?>
               </div>
            </div>
            <div class="elementor-element elementor-element-cdc068f animated-fast elementor-invisible elementor-widget elementor-widget-image" data-id="cdc068f" data-element_type="widget" data-settings='{"_animation":"opal-move-up"}' data-widget_type="image.default">
               <div class="elementor-widget-container">
                  <img fetchpriority="high" decoding="async" width="440" height="260" src="<?php echo esc_url($residences_image); ?>" class="attachment-full size-full wp-image-290" alt="">
               </div>
            </div>
            <!-- <div class="elementor-element elementor-element-e950585 elementor-button-type-link animated-fast elementor-invisible elementor-widget elementor-widget-button" data-id="e950585" data-element_type="widget" data-settings='{"_animation":"opal-move-up"}' data-widget_type="button.default">
               <div class="elementor-widget-container">
                  <div class="elementor-button-wrapper">
                     <a class="elementor-button elementor-button-link elementor-size-sm" href="<?php echo esc_url($residences_button_url); ?>">
                        <span class="elementor-button-content-wrapper">
                           <span class="elementor-button-icon">
                              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                 <path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" class="btn-icon__icon"></path>
                                 <path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" class="btn-icon__icon"></path>
                              </svg>
                           </span>
                           <span class="elementor-button-text"><?php echo esc_html($residences_button_text); ?></span>
                        </span>
                     </a>
                  </div>
               </div>
            </div> -->
         </div>
      </div>
   </div>
   <!-- Panoramic Views Section -->
   <div class="elementor-element elementor-element-b8c09ca e-con-full e-flex e-con e-parent" data-id="b8c09ca" data-element_type="container">
      <div class="elementor-element elementor-element-078db3b e-con-full e-flex e-con e-child" data-id="078db3b" data-element_type="container">
         <div class="elementor-element elementor-element-9451336 panoramic-style-1 elementor-widget elementor-widget-easto-panoramic-views e-widget-swiper" data-id="9451336" data-element_type="widget" data-widget_type="easto-panoramic-views.default">
            <div class="elementor-widget-container">
               <div class="elementor-panoramic-views-wrapper">
                  <div class="panoramic-icon"><i class="easto-icon-chevron-left"></i><i class="easto-icon-chevron-right"></i></div>
                  <div class="easto-swiper swiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-free-mode swiper-backface-hidden">
                     <div class="swiper-wrapper" aria-live="polite">
                        <?php foreach ($panoramic_views as $index => $view) : ?>
                        <div class="swiper-slide<?php echo $index === 0 ? ' swiper-slide-active' : ''; ?>" data-goto="<?php echo $index; ?>" role="group" aria-label="<?php echo ($index + 1) . ' / ' . count($panoramic_views); ?>">
                           <div class="elementor-panoramic-item">
                              <div class="panoramic-image">
                                 <img decoding="async" width="1920" height="800" src="<?php echo esc_url($view['image']); ?>" class="attachment-full size-full" alt="">
                              </div>
                              <div class="panoramic-name"><?php echo esc_html($view['name']); ?></div>
                           </div>
                        </div>
                        <?php endforeach; ?>
                     </div>
                     <div class="elementor-swiper-button elementor-swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide">
                        <i class="easto-icon-chevron-left" aria-hidden="true"></i>
                        <span class="elementor-screen-only">Previous</span>
                     </div>
                     <div class="elementor-swiper-button elementor-swiper-button-next" tabindex="0" role="button" aria-label="Next slide">
                        <i class="easto-icon-chevron-right" aria-hidden="true"></i>
                        <span class="elementor-screen-only">Next</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Testimonial Section -->
      <div class="elementor-element elementor-element-90a0c45 e-con-full e-flex e-con e-child" data-id="90a0c45" data-element_type="container" data-settings='{"background_background":"classic"}'>
         <div class="elementor-element elementor-element-5e8050f animated-fast elementor-invisible elementor-widget elementor-widget-text-editor" data-id="5e8050f" data-element_type="widget" data-settings='{"_animation":"opal-move-up"}' data-widget_type="text-editor.default">
            <div class="elementor-widget-container">
               <!-- The Views -->
            </div>
         </div>
         <div class="elementor-element elementor-element-b4cb29b e-flex e-con-boxed e-con e-child" data-id="b4cb29b" data-element_type="container">
            <div class="e-con-inner">
               <div class="elementor-element elementor-element-09a4575 elementor-invisible elementor-widget elementor-widget-heading" data-id="09a4575" data-element_type="widget" data-settings='{"_animation":"opal-move-up"}' data-widget_type="heading.default">
                  <div class="elementor-widget-container">
                     <h3 class="elementor-heading-title elementor-size-default"><?php echo esc_html($testimonial_quote); ?></h3>
                  </div>
               </div>
               <div class="elementor-element elementor-element-4e688a3 animated-fast elementor-invisible elementor-widget elementor-widget-heading" data-id="4e688a3" data-element_type="widget" data-settings='{"_animation":"opal-move-up"}' data-widget_type="heading.default">
                  <div class="elementor-widget-container">
                     <h6 class="elementor-heading-title elementor-size-default"><?php echo esc_html($testimonial_author); ?></h6>
                  </div>
               </div>
               <div class="elementor-element elementor-element-8d33a39 animated-fast elementor-invisible elementor-widget elementor-widget-heading" data-id="8d33a39" data-element_type="widget" data-settings='{"_animation":"opal-move-up"}' data-widget_type="heading.default">
                  <div class="elementor-widget-container">
                     <h6 class="elementor-heading-title elementor-size-default"><?php echo esc_html($testimonial_company); ?></h6>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Amenities Section -->
   <div class="elementor-element elementor-element-a8558b1 e-flex e-con-boxed e-con e-parent" data-id="a8558b1" data-element_type="container">
      <div class="e-con-inner">
         <div class="elementor-element elementor-element-94926ca e-con-full e-flex e-con e-child elementor-sticky" data-id="94926ca" data-element_type="container" data-settings='{"sticky":"top","sticky_on":["desktop","laptop","tablet_extra","tablet"],"sticky_offset":60,"sticky_parent":"yes","sticky_effects_offset":0}'>
            <div class="elementor-element elementor-element-4051d77 animated-fast elementor-invisible elementor-widget elementor-widget-text-editor" data-id="4051d77" data-element_type="widget" data-settings='{"_animation":"opal-move-up"}' data-widget_type="text-editor.default">
               <div class="elementor-widget-container">
                  <?php echo esc_html($amenities_subtitle); ?>
               </div>
            </div>
            <div class="elementor-element elementor-element-5285c10 animated-fast elementor-invisible elementor-widget elementor-widget-heading" data-id="5285c10" data-element_type="widget" data-settings='{"_animation":"opal-move-up"}' data-widget_type="heading.default">
               <div class="elementor-widget-container">
                  <h2 class="elementor-heading-title elementor-size-default"><?php echo wp_kses_post($amenities_title); ?></h2>
               </div>
            </div>
            <div class="elementor-element elementor-element-3502424 animated-fast elementor-invisible elementor-widget elementor-widget-text-editor" data-id="3502424" data-element_type="widget" data-settings='{"_animation":"opal-move-up"}' data-widget_type="text-editor.default">
               <div class="elementor-widget-container">
                  <?php echo esc_html($amenities_description); ?>
               </div>
            </div>
            <div class="elementor-element elementor-element-4108164 animated-fast elementor-invisible elementor-widget elementor-widget-image" data-id="4108164" data-element_type="widget" data-settings='{"_animation":"opal-move-up"}' data-widget_type="image.default">
               <div class="elementor-widget-container">
                  <img loading="lazy" decoding="async" width="440" height="260" src="<?php echo esc_url($amenities_image); ?>" class="attachment-full size-full" alt="">
               </div>
            </div>
            <?php
            $amenities_btn_url = ($amenities_button_action === 'link') ? $amenities_button_url : (($amenities_button_action === 'page') ? get_field('amenities_button_page') : '#easto-button-popup-8feb59a');
            $amenities_popup_class = ($amenities_button_action === 'popup') ? ' button-popup' : '';
            $amenities_popup_effect = ($amenities_button_action === 'popup') ? ' data-effect="mfp-zoom-in"' : '';
            ?>
            <div class="elementor-element elementor-element-3bf19d2 elementor-button-type-link animated-fast elementor-invisible elementor-widget elementor-widget-button" data-id="3bf19d2" data-element_type="widget" data-settings='{"_animation":"opal-move-up"}' data-widget_type="button.default">
               <div class="elementor-widget-container">
                  <div class="elementor-button-wrapper">
                     <a class="elementor-button elementor-button-link elementor-size-sm<?php echo esc_attr($amenities_popup_class); ?>" href="<?php echo esc_url($amenities_btn_url); ?>"<?php echo $amenities_popup_effect; ?>>
                        <span class="elementor-button-content-wrapper">
                           <span class="elementor-button-icon">
                              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                 <path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" class="btn-icon__icon"></path>
                                 <path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" class="btn-icon__icon"></path>
                              </svg>
                           </span>
                           <span class="elementor-button-text"><?php echo esc_html($amenities_button_text); ?></span>
                        </span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
         <div class="elementor-element elementor-element-6f18329 e-con-full e-flex e-con e-child" data-id="6f18329" data-element_type="container">
            <?php foreach ($amenities_banners as $index => $banner) : ?>
            <?php if ($banner['media_type'] === 'video' && !empty($banner['video_url'])) : ?>
            <div class="elementor-element elementor-element-ce521e2 e-con-full e-flex e-con e-child" data-id="ce521e2" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;video&quot;}">
               <div class="elementor-element elementor-element-12bdc97 e-con-full e-flex e-con e-child" data-id="12bdc97" data-element_type="container">
                  <div class="elementor-element elementor-element-c2cfb80 elementor-cta--layout-image-right elementor-widget__width-initial elementor-cta--mobile-layout-image-above elementor-cta--mobile_extra-layout-image-right elementor-cta--valign-top content-stretch-yes elementor-cta--skin-classic button-style-theme-default elementor-animated-content elementor-animated-content elementor-bg-transform elementor-bg-transform-zoom-in elementor-widget elementor-widget-easto-banner" data-id="c2cfb80" data-element_type="widget" data-widget_type="easto-banner.default">
                     <div class="elementor-widget-container">
                        <div class="elementor-cta">
                           <div class="elementor-cta__content">
                              <div class="elementor-cta__content-inner">
                                 <div class="elementor-content-wrapper">
                                    <h5 class="elementor-cta__title elementor-cta__content-item elementor-content-item"><?php echo esc_html($banner['title']); ?></h5>
                                    <?php if (!empty($banner['location'])) : ?>
                                    <div class="elementor-cta__location elementor-cta__content-item elementor-content-item">
                                       <?php echo esc_html($banner['location']); ?>
                                    </div>
                                    <?php endif; ?>
                                    <div class="elementor-cta__description elementor-cta__content-item elementor-content-item">
                                       <?php echo esc_html($banner['description']); ?>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="elementor-element elementor-element-67b747d e-con-full e-flex e-con e-child" data-id="67b747d" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;video&quot;,&quot;background_video_link&quot;:&quot;<?php echo esc_url($banner['video_url']); ?>&quot;,&quot;background_play_on_mobile&quot;:&quot;yes&quot;}">
                  <div class="elementor-background-video-container">
                     <video class="elementor-background-video-hosted elementor-html5-video" autoplay="" muted="" playsinline="" loop="" src="<?php echo esc_url($banner['video_url']); ?>" style="width: 1066.67px; height: 600px;"></video>
                  </div>
               </div>
            </div>
            <?php else : ?>
            <div class="elementor-element elementor-element-76c3845 elementor-cta--layout-image-right elementor-cta--valign-top elementor-widget__width-initial elementor-cta--mobile-layout-image-above elementor-cta--mobile_extra-layout-image-right elementor-cta--skin-classic button-style-theme-default elementor-animated-content elementor-animated-content elementor-bg-transform elementor-bg-transform-zoom-in elementor-widget elementor-widget-easto-banner" data-id="76c3845" data-element_type="widget" data-widget_type="easto-banner.default">
               <div class="elementor-widget-container">
                  <div class="elementor-cta">
                     <div class="elementor-cta__bg-wrapper">
                        <div class="elementor-cta__bg elementor-bg" style="background-image: url(<?php echo esc_url($banner['image']); ?>);"></div>
                        <div class="elementor-cta__bg-overlay"></div>
                     </div>
                     <div class="elementor-cta__content">
                        <div class="elementor-cta__content-inner">
                           <div class="elementor-content-wrapper text-center">
                              <h5 class="elementor-cta__title elementor-cta__content-item elementor-content-item "><?php echo esc_html($banner['title']); ?></h5>
                              <?php if (!empty($banner['location'])) : ?>
                              <div class="elementor-cta__description elementor-cta__content-item elementor-content-item py-1" style="border-block: 1px solid var(--e-global-color-text_light);">
                                 <?php echo esc_html($banner['location']); ?>
                              </div>
                              <?php endif; ?>
                              <div class="elementor-cta__description elementor-cta__content-item elementor-content-item py-1">
                                 <?php echo esc_html($banner['description']); ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
         </div>
      </div>
   </div>
   <!-- Features Grid Section -->
   <div class="elementor-element elementor-element-887b6d7 e-con-full e-flex e-con e-parent e-lazyloaded d-none" data-id="887b6d7" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
      <div class="elementor-element elementor-element-8705a42 e-grid e-con-boxed e-con e-child" data-id="8705a42" data-element_type="container">
         <div class="e-con-inner">
            <?php foreach ($features_categories as $index => $category) : ?>
            <?php
               // Define container data-ids for each category
               $container_ids = array('3f18f6a', 'aea1969', '437c742');
               $icon_ids = array('004dc64', '4fa3481', '29e1274');
               $heading_ids = array('c3618ef', '6f23a59', '7a76d53');
               $list_ids = array('d94dc01', '56a93ce', '0d84bcb');
               $container_id = isset($container_ids[$index]) ? $container_ids[$index] : $container_ids[0];
               $icon_id = isset($icon_ids[$index]) ? $icon_ids[$index] : $icon_ids[0];
               $heading_id = isset($heading_ids[$index]) ? $heading_ids[$index] : $heading_ids[0];
               $list_id = isset($list_ids[$index]) ? $list_ids[$index] : $list_ids[0];
               ?>
            <div class="elementor-element elementor-element-<?php echo $container_id; ?> e-flex e-con-boxed e-con e-child" data-id="<?php echo $container_id; ?>" data-element_type="container">
               <div class="e-con-inner">
                  <div class="elementor-element elementor-element-<?php echo $icon_id; ?> elementor-view-stacked elementor-shape-circle elementor-widget elementor-widget-icon" data-id="<?php echo $icon_id; ?>" data-element_type="widget" data-widget_type="icon.default">
                     <div class="elementor-widget-container">
                        <div class="elementor-icon-wrapper">
                           <div class="elementor-icon">
                              <?php echo $category['icon_svg']; ?>			
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="elementor-element elementor-element-<?php echo $heading_id; ?> elementor-widget elementor-widget-heading" data-id="<?php echo $heading_id; ?>" data-element_type="widget" data-widget_type="heading.default">
                     <div class="elementor-widget-container">
                        <h4 class="elementor-heading-title elementor-size-default"><?php echo esc_html($category['title']); ?></h4>
                     </div>
                  </div>
                  <div class="elementor-element elementor-element-<?php echo $list_id; ?> elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="<?php echo $list_id; ?>" data-element_type="widget" data-widget_type="icon-list.default">
                     <div class="elementor-widget-container">
                        <ul class="elementor-icon-list-items">
                           <?php foreach ($category['items'] as $item) : ?>
                           <li class="elementor-icon-list-item">
                              <span class="elementor-icon-list-text"><?php echo esc_html($item); ?></span>
                           </li>
                           <?php endforeach; ?>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <?php endforeach; ?>
         </div>
      </div>
      <!-- Scrolling Text RTL -->
      <div class="elementor-element elementor-element-1e078a8 easto-scrolling-rtl e-transform elementor-widget elementor-widget-easto-slide-scrolling" data-id="1e078a8" data-element_type="widget" data-settings="{&quot;_transform_rotateZ_effect&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:5,&quot;sizes&quot;:[]},&quot;_transform_rotateZ_effect_mobile&quot;:{&quot;unit&quot;:&quot;deg&quot;,&quot;size&quot;:10,&quot;sizes&quot;:[]},&quot;_transform_rotateZ_effect_laptop&quot;:{&quot;unit&quot;:&quot;deg&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_rotateZ_effect_tablet_extra&quot;:{&quot;unit&quot;:&quot;deg&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_rotateZ_effect_tablet&quot;:{&quot;unit&quot;:&quot;deg&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_rotateZ_effect_mobile_extra&quot;:{&quot;unit&quot;:&quot;deg&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}" data-widget_type="easto-slide-scrolling.default">
         <div class="elementor-widget-container">
            <div class="elementor-scrolling">
               <div class="elementor-scrolling-wrapper">
                  <?php
                     // Define repeater item classes for scrolling items
                     $scrolling_item_classes = array('319d001', '3871f0f', '6f95dd7', '7bd318a', '38a7da5', '136c421', '610ff60', '8596e20');
                     ?>
                  <?php for ($repeat = 0; $repeat < 4; $repeat++) : ?>
                  <div class="elementor-scrolling-inner">
                     <?php foreach ($scrolling_text_items as $idx => $item) : ?>
                     <?php $item_class = isset($scrolling_item_classes[$idx]) ? $scrolling_item_classes[$idx] : $scrolling_item_classes[0]; ?>
                     <div class="elementor-scrolling-item">
                        <div class="elementor-scrolling-item-inner">
                           <div class="scrolling-title elementor-repeater-item-<?php echo $item_class; ?>">
                              <a href="#" title="<?php echo esc_attr($item['text']); ?>"><span><?php echo esc_html($item['text']); ?></span></a>
                           </div>
                        </div>
                     </div>
                     <?php endforeach; ?>
                  </div>
                  <?php endfor; ?>
               </div>
            </div>
         </div>
      </div>
      <!-- Scrolling Text LTR -->
      <div class="elementor-element elementor-element-f1ac1d9 e-transform easto-scrolling-ltr elementor-widget elementor-widget-easto-slide-scrolling" data-id="f1ac1d9" data-element_type="widget" data-settings="{&quot;_transform_rotateZ_effect&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:-5,&quot;sizes&quot;:[]},&quot;_transform_rotateZ_effect_mobile&quot;:{&quot;unit&quot;:&quot;deg&quot;,&quot;size&quot;:-10,&quot;sizes&quot;:[]},&quot;_transform_rotateZ_effect_laptop&quot;:{&quot;unit&quot;:&quot;deg&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_rotateZ_effect_tablet_extra&quot;:{&quot;unit&quot;:&quot;deg&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_rotateZ_effect_tablet&quot;:{&quot;unit&quot;:&quot;deg&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_rotateZ_effect_mobile_extra&quot;:{&quot;unit&quot;:&quot;deg&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}" data-widget_type="easto-slide-scrolling.default">
         <div class="elementor-widget-container">
            <div class="elementor-scrolling">
               <div class="elementor-scrolling-wrapper">
                  <?php
                     // Second scrolling text uses different item class for last item
                     $scrolling_item_classes_2 = array('319d001', '3871f0f', '6f95dd7', '7bd318a', '38a7da5', '136c421', '610ff60', '41c130a');
                     ?>
                  <?php for ($repeat = 0; $repeat < 4; $repeat++) : ?>
                  <div class="elementor-scrolling-inner">
                     <?php foreach ($scrolling_text_items_2 as $idx => $item) : ?>
                     <?php $item_class = isset($scrolling_item_classes_2[$idx]) ? $scrolling_item_classes_2[$idx] : $scrolling_item_classes_2[0]; ?>
                     <div class="elementor-scrolling-item">
                        <div class="elementor-scrolling-item-inner">
                           <div class="scrolling-title elementor-repeater-item-<?php echo $item_class; ?>">
                              <a href="#" title="<?php echo esc_attr($item['text']); ?>"><span><?php echo esc_html($item['text']); ?></span></a>
                           </div>
                        </div>
                     </div>
                     <?php endforeach; ?>
                  </div>
                  <?php endfor; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Why Aspire Group Section -->
   <section class="why-aspire-section" id="why-aspire">
      <div class="why-aspire-container">
         <h2 class="why-aspire-title"><?php echo esc_html($why_aspire_title); ?></h2>
         <div class="why-aspire-grid">
            <?php foreach ($why_aspire_features as $feature) : ?>
               <div class="why-aspire-card">
                  <div class="why-aspire-icon">
                     <?php if (!empty($feature['icon_svg'])) : ?>
                        <?php echo $feature['icon_svg']; // inline SVG allowed ?>
                     <?php elseif (!empty($feature['icon'])) : ?>
                        <img src="<?php echo esc_url($feature['icon']); ?>" alt="<?php echo esc_attr($feature['title']); ?>" loading="lazy" />
                     <?php endif; ?>
                  </div>
                  <h3 class="why-aspire-card-title"><?php echo esc_html($feature['title']); ?></h3>
                  <p class="why-aspire-card-desc"><?php echo esc_html($feature['description']); ?></p>
               </div>
            <?php endforeach; ?>
         </div>
      </div>
   </section>
   <!-- Neighborhood Section -->
   <div class="elementor-element elementor-element-a92668b e-flex e-con-boxed e-con e-parent mb-80 mb-md-150 " data-id="a92668b" data-element_type="container" id="neighborhood" data-settings='{"background_background":"classic"}'>
      <div class="e-con-inner pb-md-150 pb-80">
         <div class="elementor-element elementor-element-db28fad e-flex e-con-boxed e-con e-child" data-id="db28fad" data-element_type="container">
            <div class="e-con-inner">
               <div class="elementor-element elementor-element-9d32b5d e-con-full e-flex e-con e-child" data-id="9d32b5d" data-element_type="container">
                  <div class="elementor-element elementor-element-442b172 elementor-widget elementor-widget-text-editor" data-id="442b172" data-element_type="widget" data-widget_type="text-editor.default">
                     <div class="elementor-widget-container">
                        <?php echo esc_html($neighborhood_subtitle); ?>
                     </div>
                  </div>
                  <div class="elementor-element elementor-element-60e5e7d elementor-widget elementor-widget-heading" data-id="60e5e7d" data-element_type="widget" data-widget_type="heading.default">
                     <div class="elementor-widget-container">
                        <h2 class="elementor-heading-title elementor-size-default"><?php echo esc_html($neighborhood_title); ?></h2>
                     </div>
                  </div>
                  <div class="elementor-element elementor-element-2a9127a elementor-widget elementor-widget-text-editor" data-id="2a9127a" data-element_type="widget" data-widget_type="text-editor.default">
                     <div class="elementor-widget-container">
                        <?php echo esc_html($neighborhood_description); ?>
                     </div>
                  </div>
                  <?php
                  $neighborhood_btn_url = ($neighborhood_button_action === 'link') ? $neighborhood_button_url : (($neighborhood_button_action === 'page') ? get_field('neighborhood_button_page') : '#easto-button-popup-8feb59a');
                  $neighborhood_popup_class = ($neighborhood_button_action === 'popup') ? ' button-popup' : '';
                  $neighborhood_popup_effect = ($neighborhood_button_action === 'popup') ? ' data-effect="mfp-zoom-in"' : '';
                  ?>
                  <div class="elementor-element elementor-element-4b98246 elementor-button-type-link elementor-widget elementor-widget-button" data-id="4b98246" data-element_type="widget" data-widget_type="button.default">
                     <div class="elementor-widget-container">
                        <div class="elementor-button-wrapper">
                           <a class="elementor-button elementor-button-link elementor-size-sm<?php echo esc_attr($neighborhood_popup_class); ?>" href="<?php echo esc_url($neighborhood_btn_url); ?>"<?php echo $neighborhood_popup_effect; ?>>
                              <span class="elementor-button-content-wrapper">
                                 <span class="elementor-button-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                       <path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" class="btn-icon__icon"></path>
                                       <path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" class="btn-icon__icon"></path>
                                    </svg>
                                 </span>
                                 <span class="elementor-button-text"><?php echo esc_html($neighborhood_button_text); ?></span>
                              </span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="elementor-element elementor-element-3664d71 e-con-full e-flex e-con e-child" data-id="3664d71" data-element_type="container" data-settings='{"background_background":"classic"}'>
                  <?php if ($neighborhood_google_map) : ?>
                  <div class="elementor-element elementor-widget elementor-widget-google-maps neighborhood-google-map" data-element_type="widget" data-widget_type="google_maps.default">
                     <div class="elementor-widget-container">
                        <div class="elementor-custom-embed">
                           <iframe loading="lazy" src="<?php echo esc_url($neighborhood_google_map); ?>" width="100%" height="100%" frameborder="0" style="border:0; position: absolute; top: 0; left: 0; width: 100%; height: 100%;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                     </div>
                  </div>
                  <?php else : ?>
                  <div class="elementor-element elementor-view-stacked animated-fast elementor-shape-circle elementor-invisible elementor-widget elementor-widget-icon" data-element_type="widget" data-settings='{"_animation":"bounceInDown"}' data-widget_type="icon.default">
                     <div class="elementor-widget-container">
                        <div class="elementor-icon-wrapper">
                           <div class="elementor-icon">
                              <svg xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 24" fill="none">
                                 <path d="M5.50767 0L0 3.83655V24H5.56564V1.12645L7.58834 2.23965V24H8.52883V1.65654L5.50767 0Z" fill="white"></path>
                                 <path d="M15.4924 6.00293L12.4712 7.65947V23.9996H13.4117V8.24258L15.4344 7.12938V23.9996H21V9.83948L15.4924 6.00293Z" fill="white"></path>
                                 <path d="M5.56567 1.12598L7.58837 2.23917V23.9995V2.23917L5.56567 1.12598Z" fill="white"></path>
                              </svg>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Neighborhood Places -->
   <!-- <div class="elementor-element elementor-element-e95d56f e-flex e-con-boxed e-con e-parent" data-id="e95d56f" data-element_type="container" data-settings='{"background_background":"classic"}'>
      <div class="e-con-inner">
         <div class="elementor-element elementor-element-76c72f8 easto-scroll-effect-yes elementor-widget elementor-widget-easto-places-list" data-id="76c72f8" data-element_type="widget" data-widget_type="easto-places-list.default">
            <div class="elementor-widget-container">
               <div class="elementor-places-list-wrapper">
                  <div class="elementor-places-list-inner d-flex" data-relative="#neighborhood">
                     <?php foreach ($neighborhood_places as $place) : ?>
                     <div class="grid-item elementor-places-list-item">
                        <div class="places-list-inner">
                           <div class="places-list-bg">
                              <img loading="lazy" decoding="async" width="410" height="520" src="<?php echo esc_url($place['image']); ?>" class="attachment-full size-full" alt="">
                           </div>
                           <div class="places-list-content">
                              <div class="places-list-content-inner">
                                 <div class="places-title"><?php echo esc_html($place['title']); ?></div>
                                 <div class="places-content">
                                    <?php echo wp_kses_post($place['content']); ?>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php endforeach; ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div> -->
   <!-- Meet Our Leader (Team) Section -->
   <?php if ($team_members) : ?>
   <div class="elementor elementor-5841 home-meet-our-leader">
   <div class="elementor-element elementor-element-82a602e e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="82a602e" data-element_type="container">
      <div class="e-con-inner col-full">
         <div class="elementor-element elementor-element-52dbac9 animated-fast elementor-widget-mobile__width-inherit elementor-widget elementor-widget-easto-team-box animated opal-move-up" data-id="52dbac9" data-element_type="widget" data-settings='{"_animation":"opal-move-up"}' data-widget_type="easto-team-box.default">
            <div class="elementor-widget-container">
               <div class="elementor-teambox-item-wrapper">
                  <div class="elementor-teambox-wrapper-inner">
                     <div class="d-grid team-custom-grid">
                        <div class="team-header-block grid-item">
                            <?php if ($team_subtitle) : ?>
                            <div class="team-subtitle"><?php echo esc_html($team_subtitle); ?></div>
                            <?php endif; ?>
                            <?php if ($team_title) : ?>
                            <h2 class="team-title"><?php echo nl2br(esc_html($team_title)); ?></h2>
                            <?php endif; ?>
                        </div>
                        <?php foreach ($team_members as $index => $member) : ?>
                        <div class="elementor-teambox-item grid-item" data-goto="<?php echo $index; ?>">
                           <div class="teambox-item-inner">
                              <?php if (!empty($member['photo'])) : ?>
                              <div class="team-image">
                                 <div class="team-image-inner">
                                    <img loading="lazy" decoding="async" width="<?php echo esc_attr($member['photo']['width']); ?>" height="<?php echo esc_attr($member['photo']['height']); ?>" src="<?php echo esc_url($member['photo']['url']); ?>" class="attachment-full size-full wp-image-<?php echo esc_attr($member['photo']['ID']); ?>" alt="<?php echo esc_attr($member['photo']['alt']); ?>" <?php if (!empty($member['photo']['sizes'])) : ?>srcset="<?php echo esc_attr($member['photo']['sizes']['medium']); ?> 251w, <?php echo esc_url($member['photo']['url']); ?> <?php echo esc_attr($member['photo']['width']); ?>w" sizes="(max-width: <?php echo esc_attr($member['photo']['width']); ?>px) 100vw, <?php echo esc_attr($member['photo']['width']); ?>px"<?php endif; ?>>
                                 </div>
                              </div>
                              <?php endif; ?>
                              <div class="team-content">
                                 <div class="team-content-header">
                                    <?php if (!empty($member['name'])) : ?>
                                    <div class="team-name heading omega"><?php echo esc_html($member['name']); ?></div>
                                    <?php endif; ?>
                                    <?php if (!empty($member['position'])) : ?>
                                    <div class="team-job heading sigma"><?php echo esc_html($member['position']); ?></div>
                                    <?php endif; ?>
                                 </div>
                                 <?php if (!empty($member['facebook']) || !empty($member['instagram']) || !empty($member['youtube']) || !empty($member['twitter'])) : ?>
                                 <div class="team-box-socials">
                                    <div class="team-click">
                                       <i class="easto-icon-plus-1"></i>
                                       <i class="easto-icon-times-1"></i>
                                    </div>
                                    <div class="team-icon-socials">
                                       <?php if (!empty($member['facebook'])) : ?>
                                       <a class="heading sigma" href="<?php echo esc_url($member['facebook']); ?>" target="_blank">FB</a>
                                       <?php endif; ?>
                                       <?php if (!empty($member['instagram'])) : ?>
                                       <a class="heading sigma" href="<?php echo esc_url($member['instagram']); ?>" target="_blank">IN</a>
                                       <?php endif; ?>
                                       <?php if (!empty($member['youtube'])) : ?>
                                       <a class="heading sigma" href="<?php echo esc_url($member['youtube']); ?>" target="_blank">YT</a>
                                       <?php endif; ?>
                                       <?php if (!empty($member['twitter'])) : ?>
                                       <a class="heading sigma" href="<?php echo esc_url($member['twitter']); ?>" target="_blank">TW</a>
                                       <?php endif; ?>
                                    </div>
                                 </div>
                                 <?php endif; ?>
                              </div>
                           </div>
                        </div>
                        <?php endforeach; ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div><!-- /.elementor-5841 wrapper for team section styles -->
   <?php endif; ?>
   <!-- Contact Section -->
   <div class="elementor-element elementor-element-2c7104c e-flex e-con-boxed e-con e-parent" data-id="2c7104c" data-element_type="container" data-settings='{"background_background":"classic"}'>
      <div class="e-con-inner">
         <div class="elementor-element elementor-element-e1a3f06 e-con-full e-flex e-con e-child" data-id="e1a3f06" data-element_type="container" data-settings='{"background_background":"classic"}'>
            <div class="elementor-element elementor-element-317003d elementor-widget elementor-widget-heading" data-id="317003d" data-element_type="widget" data-widget_type="heading.default">
               <div class="elementor-widget-container">
                  <h6 class="elementor-heading-title elementor-size-default"><?php echo esc_html($contact_form_heading); ?></h6>
               </div>
            </div>
            <div class="elementor-element elementor-element-3879021 elementor-widget elementor-widget-easto-contactform" data-id="3879021" data-element_type="widget" data-widget_type="easto-contactform.default">
               <div class="elementor-widget-container">
                  <?php
                     if ($contact_form_id && shortcode_exists('contact-form-7')) {
                         echo do_shortcode('[contact-form-7 id="' . intval($contact_form_id) . '" title="Main Contact Form"]');
                     } else {
                         // Fallback static form
                         ?>
                  <!-- <div class="wpcf7 js" id="wpcf7-main-contact" lang="en-US" dir="ltr">
                     <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="wpcf7-form init" aria-label="Contact form" novalidate="novalidate" data-status="init">
                        <input type="hidden" name="action" value="as_theme_contact_form">
                        <?php wp_nonce_field('as_theme_contact_form', 'contact_form_nonce'); ?>
                        <div class="wpcf7-inquire">
                           <div class="row">
                              <div class="column-fn">
                                 <p><span class="wpcf7-form-control-wrap" data-name="first-name"><input size="40" maxlength="80" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="First Name *" value="" type="text" name="first-name"></span></p>
                              </div>
                              <div class="column-ln">
                                 <p><span class="wpcf7-form-control-wrap" data-name="last-name"><input size="40" maxlength="80" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Last Name *" value="" type="text" name="last-name"></span></p>
                              </div>
                           </div>
                           <div class="column-num">
                              <p><span class="wpcf7-form-control-wrap" data-name="your-number"><input size="40" maxlength="80" class="wpcf7-form-control wpcf7-tel wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-tel" aria-required="true" aria-invalid="false" placeholder="Phone *" value="" type="tel" name="your-number"></span></p>
                           </div>
                           <div class="column-email">
                              <p><span class="wpcf7-form-control-wrap" data-name="your-email"><input size="40" maxlength="80" class="wpcf7-form-control wpcf7-email wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Email *" value="" type="email" name="your-email"></span></p>
                           </div>
                           <p class="form-text">Type of residence you are interested in</p>
                           <p><span class="wpcf7-form-control-wrap" data-name="radio-366"><span class="wpcf7-form-control wpcf7-radio"><span class="wpcf7-list-item first"><label><input type="radio" name="radio-366" value="1 Bedroom" checked="checked"><span class="wpcf7-list-item-label">1 Bedroom</span></label></span><span class="wpcf7-list-item"><label><input type="radio" name="radio-366" value="2 Bedroom"><span class="wpcf7-list-item-label">2 Bedroom</span></label></span><span class="wpcf7-list-item"><label><input type="radio" name="radio-366" value="3 Bedroom"><span class="wpcf7-list-item-label">3 Bedroom</span></label></span><span class="wpcf7-list-item last"><label><input type="radio" name="radio-366" value="Studio"><span class="wpcf7-list-item-label">Studio</span></label></span></span></span></p>
                           <p class="form-text">Are you a broker?</p>
                           <p><span class="wpcf7-form-control-wrap" data-name="radio-377"><span class="wpcf7-form-control wpcf7-radio"><span class="wpcf7-list-item first"><label><input type="radio" name="radio-377" value="Yes" checked="checked"><span class="wpcf7-list-item-label">Yes</span></label></span><span class="wpcf7-list-item last"><label><input type="radio" name="radio-377" value="No"><span class="wpcf7-list-item-label">No</span></label></span></span></span></p>
                           <div class="column-message">
                              <p><span class="wpcf7-form-control-wrap" data-name="your-message"><textarea cols="40" rows="2" maxlength="400" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Message" name="your-message"></textarea></span></p>
                           </div>
                           <div class="cf-btn">
                              <p class="sub-text">Field with <span class="color-primary" style="font-weight: 500;">* required</span></p>
                              <div class="wpcf7-button">
                                 <p>
                                    <button class="wpcf7-form-control wpcf7-submit" type="submit">
                                       submit
                                       <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                          <path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" class="btn-icon__icon"></path>
                                          <path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" class="btn-icon__icon"></path>
                                       </svg>
                                    </button>
                                 </p>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div> -->
                  <?php
                     }
                     ?>
               </div>
            </div>
         </div>
         <div class="elementor-element elementor-element-16fa029 e-con-full e-flex e-con e-child" data-id="16fa029" data-element_type="container">
            <div class="elementor-element elementor-element-c937211 elementor-widget elementor-widget-text-editor" data-id="c937211" data-element_type="widget" data-widget_type="text-editor.default">
               <div class="elementor-widget-container">
                  <?php echo esc_html($contact_subtitle); ?>
               </div>
            </div>
            <div class="elementor-element elementor-element-a1ec145 elementor-widget-mobile__width-inherit elementor-widget elementor-widget-heading" data-id="a1ec145" data-element_type="widget" data-widget_type="heading.default">
               <div class="elementor-widget-container">
                  <h2 class="elementor-heading-title elementor-size-default"><?php echo wp_kses_post($contact_title); ?></h2>
               </div>
            </div>
            <div class="elementor-element elementor-element-de4a7c3 elementor-widget__width-initial elementor-widget elementor-widget-text-editor" data-id="de4a7c3" data-element_type="widget" data-widget_type="text-editor.default">
               <div class="elementor-widget-container">
                  <?php echo esc_html($contact_description); ?>
               </div>
            </div>
            <div class="elementor-element elementor-element-8142407 elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="8142407" data-element_type="widget" data-widget_type="divider.default">
               <div class="elementor-widget-container">
                  <div class="elementor-divider">
                     <span class="elementor-divider-separator"></span>
                  </div>
               </div>
            </div>
            <div class="elementor-element elementor-element-e67e17b e-con-full e-flex e-con e-child" data-id="e67e17b" data-element_type="container">
               <div class="elementor-element elementor-element-a2fdbbd elementor-widget elementor-widget-image" data-id="a2fdbbd" data-element_type="widget" data-widget_type="image.default">
                  <div class="elementor-widget-container">
                     <img loading="lazy" decoding="async" width="80" height="80" src="<?php echo esc_url($agent_image); ?>" class="attachment-full size-full" alt="">
                  </div>
               </div>
               <div class="elementor-element elementor-element-e5a7c97 e-con-full e-flex e-con e-child" data-id="e5a7c97" data-element_type="container">
                  <div class="elementor-element elementor-element-ad5597b elementor-widget elementor-widget-heading" data-id="ad5597b" data-element_type="widget" data-widget_type="heading.default">
                     <div class="elementor-widget-container">
                        <h6 class="elementor-heading-title elementor-size-default"><?php echo esc_html($agent_name); ?></h6>
                     </div>
                  </div>
                  <div class="elementor-element elementor-element-c8d2710 elementor-widget elementor-widget-heading" data-id="c8d2710" data-element_type="widget" data-widget_type="heading.default">
                     <div class="elementor-widget-container">
                        <h6 class="elementor-heading-title elementor-size-default"><?php echo esc_html($agent_title); ?></h6>
                     </div>
                  </div>
                  <div class="elementor-element elementor-element-4daf5c8 elementor-widget elementor-widget-text-editor" data-id="4daf5c8" data-element_type="widget" data-widget_type="text-editor.default">
                     <div class="elementor-widget-container">
                        <?php echo esc_html($agent_phone); ?>
                     </div>
                  </div>
                  <div class="elementor-element elementor-element-6d61ce9 elementor-widget elementor-widget-text-editor" data-id="6d61ce9" data-element_type="widget" data-widget_type="text-editor.default">
                     <div class="elementor-widget-container">
                        <?php echo esc_html($agent_email); ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>