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
   
   // Apartments section
   $apartments_subtitle = get_field('apartments_subtitle') ;
   $apartments_title = get_field('apartments_title') ;
   $apartments_description = get_field('apartments_description') ;
   $apartments_button_text = get_field('apartments_button_text') ;
   $apartments_button_url = get_field('apartments_button_url') ;
   
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
   
   $default_apartments = array(
       array('title' => 'Penthouse', 'image' => '', 'beds' => 3, 'baths' => 2, 'sqft' => '1,245', 'link' => '#'),
       array('title' => 'Premium Apartment', 'image' => '', 'beds' => 3, 'baths' => 2, 'sqft' => '1,245', 'link' => '#'),
       array('title' => '3 Bedroom', 'image' => '', 'beds' => 3, 'baths' => 3, 'sqft' => '1,245', 'link' => '#'),
       array('title' => '2 Bedroom', 'image' => '', 'beds' => 2, 'baths' => 1, 'sqft' => '1,245', 'link' => '#'),
       array('title' => '1 Bedroom', 'image' => '', 'beds' => 1, 'baths' => 1, 'sqft' => '1,245', 'link' => '#'),
       array('title' => 'Modern Suite', 'image' => '', 'beds' => 3, 'baths' => 3, 'sqft' => '1,245', 'link' => '#'),
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
   
   $apartments_slider = have_rows('apartments_slider') ? array() : $default_apartments;
   if (have_rows('apartments_slider')) {
       while (have_rows('apartments_slider')) {
           the_row();
           $apartments_slider[] = array(
               'title' => get_sub_field('title'),
               'image' => get_sub_field('image'),
               'beds' => get_sub_field('beds'),
               'baths' => get_sub_field('baths'),
               'sqft' => get_sub_field('sqft'),
               'link' => get_sub_field('link'),
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
                              $slide_btn_url = ($slide_button_action === 'link') ? ($slide['button_url'] ?? '#') : '#easto-button-popup-8feb59a';
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
            $welcome_btn_url = ($welcome_button_action === 'link') ? $welcome_button_url : '#easto-button-popup-8feb59a';
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
                              $button_url = ($button_action === 'link') ? ($card['button_url'] ?? '#') : '#easto-button-popup-8feb59a';
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
            $amenities_btn_url = ($amenities_button_action === 'link') ? $amenities_button_url : '#easto-button-popup-8feb59a';
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
   <!-- Apartments Section -->
   <div class="elementor-element elementor-element-e915e81 e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="e915e81" data-element_type="container">
      <div class="e-con-inner">
         <div class="elementor-element elementor-element-c553f86 animated-fast elementor-widget elementor-widget-text-editor animated opal-move-up" data-id="c553f86" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;opal-move-up&quot;}" data-widget_type="text-editor.default">
            <div class="elementor-widget-container">
               <?php echo esc_html($apartments_subtitle); ?>						
            </div>
         </div>
         <div class="elementor-element elementor-element-8e9a0f2 animated-fast elementor-widget elementor-widget-heading animated opal-move-up" data-id="8e9a0f2" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;opal-move-up&quot;}" data-widget_type="heading.default">
            <div class="elementor-widget-container">
               <h2 class="elementor-heading-title elementor-size-default"><?php echo esc_html($apartments_title); ?></h2>
            </div>
         </div>
         <div class="elementor-element elementor-element-5b704ba animated-fast elementor-apartment-style-1 overflow-to-none elementor-pagination-position-outside elementor-widget elementor-widget-easto-apartments e-widget-swiper animated opal-move-up" data-id="5b704ba" data-element_type="widget" data-settings="{&quot;slides_to_show&quot;:3,&quot;slides_to_show_laptop&quot;:&quot;3&quot;,&quot;slides_to_show_tablet_extra&quot;:&quot;3&quot;,&quot;slides_to_show_tablet&quot;:&quot;2&quot;,&quot;slides_to_show_mobile_extra&quot;:&quot;2&quot;,&quot;slides_to_show_mobile&quot;:&quot;1&quot;,&quot;spaceBetween_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:30,&quot;sizes&quot;:[]},&quot;spaceBetween_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:30,&quot;sizes&quot;:[]},&quot;spaceBetween_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:30,&quot;sizes&quot;:[]},&quot;spaceBetween_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:30,&quot;sizes&quot;:[]},&quot;spaceBetween_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:15,&quot;sizes&quot;:[]},&quot;navigation&quot;:&quot;dots&quot;,&quot;_animation&quot;:&quot;opal-move-up&quot;,&quot;spaceBetween&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:30,&quot;sizes&quot;:[]},&quot;swiper_overflow&quot;:&quot;none&quot;,&quot;enable_scrollbar&quot;:&quot;no&quot;,&quot;autoplay&quot;:&quot;yes&quot;,&quot;pause_on_hover&quot;:&quot;yes&quot;,&quot;pause_on_interaction&quot;:&quot;yes&quot;,&quot;autoplay_speed&quot;:5000,&quot;infinite&quot;:&quot;yes&quot;,&quot;speed&quot;:500}" data-widget_type="easto-apartments.default">
            <div class="elementor-widget-container">
               <div class="elementor-apartment-wrapper apartment-archive easto-swiper swiper swiper-initialized swiper-horizontal swiper-pointer-events" dir="ltr">
                  <div class="swiper-wrapper" id="swiper-wrapper-ed05dd4f6013172a" aria-live="off">
                     <?php $total_apartments = count($apartments_slider); ?>
                     <?php foreach ($apartments_slider as $index => $apartment) : ?>
                     <div class="grid-item swiper-slide<?php echo $index === 0 ? ' swiper-slide-active' : ''; ?>" data-swiper-slide-index="<?php echo $index; ?>" style="width: 420px; margin-right: 30px;" role="group" aria-label="<?php echo ($index + 1) . ' / ' . $total_apartments; ?>">
                        <div class="apartment-item">
                           <div class="apartment-inner">
                              <div class="apartment-post-thumbnail">
                                 <a class="thumbnail-link" href="<?php echo esc_url($apartment['link']); ?>">
                                 <img loading="lazy" decoding="async" width="768" height="392" src="<?php echo esc_url($apartment['image']); ?>" class="attachment-medium_large size-medium_large wp-post-image" alt="" sizes="(max-width: 768px) 100vw, 768px">                            </a>
                                 <a class="apartment-more-link" href="<?php echo esc_url($apartment['link']); ?>">
                                    <span>explore </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                       <path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" class="btn-icon__icon"></path>
                                       <path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" class="btn-icon__icon"></path>
                                    </svg>
                                 </a>
                              </div>
                              <div class="apartment-content">
                                 <h4 class="apartment-title omega"><a href="<?php echo esc_url($apartment['link']); ?>"><?php echo esc_html($apartment['title']); ?></a></h4>
                                 <div class="apartment-meta">
                                    <div class="apartment-meta-inner">
                                       <div class="meta-item"><span class="name">bed</span><span class="value"><?php echo intval($apartment['beds']); ?></span></div>
                                       <div class="meta-item"><span class="name">bath</span><span class="value"><?php echo intval($apartment['baths']); ?></span></div>
                                       <div class="meta-item"><span class="name">sqft</span><span class="value"><?php echo esc_html($apartment['sqft']); ?></span></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php endforeach; ?>
                  </div>
                  <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
               </div>
               <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal"><?php for ($i = 0; $i < $total_apartments; $i++) : ?><span class="swiper-pagination-bullet<?php echo $i === 0 ? ' swiper-pagination-bullet-active' : ''; ?>" data-number="<?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?>" tabindex="0"<?php echo $i === 0 ? ' aria-current="true"' : ''; ?>></span><?php endfor; ?></div>
            </div>
         </div>
      </div>
   </div>
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
                  $neighborhood_btn_url = ($neighborhood_button_action === 'link') ? $neighborhood_button_url : '#easto-button-popup-8feb59a';
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
   <!-- About Section -->
   <div class="elementor-element elementor-element-d5588ad e-flex e-con-boxed e-con e-parent" data-id="d5588ad" data-element_type="container">
      <div class="e-con-inner">
         <div class="elementor-element elementor-element-0ea523c e-con-full e-flex e-con e-child" data-id="0ea523c" data-element_type="container">
            <div class="elementor-element elementor-element-e9ca48e elementor-widget elementor-widget-text-editor" data-id="e9ca48e" data-element_type="widget" data-widget_type="text-editor.default">
               <div class="elementor-widget-container">
                  <?php echo esc_html($about_subtitle); ?>
               </div>
            </div>
         </div>
         <div class="elementor-element elementor-element-502e545 e-con-full e-flex e-con e-child" data-id="502e545" data-element_type="container">
            <div class="elementor-element elementor-element-93eb514 elementor-widget__width-initial elementor-widget elementor-widget-heading" data-id="93eb514" data-element_type="widget" data-widget_type="heading.default">
               <div class="elementor-widget-container">
                  <h2 class="elementor-heading-title elementor-size-default"><?php echo nl2br(esc_html($about_title)); ?></h2>
               </div>
            </div>
            <div class="elementor-element elementor-element-d8c629d elementor-widget elementor-widget-image" data-id="d8c629d" data-element_type="widget" data-widget_type="image.default">
               <div class="elementor-widget-container">
                  <img loading="lazy" decoding="async" width="520" height="600" src="<?php echo esc_url($about_image_1); ?>" class="attachment-full size-full" alt="">
               </div>
            </div>
         </div>
         <div class="elementor-element elementor-element-d0d7530 e-con-full e-flex e-con e-child" data-id="d0d7530" data-element_type="container">
            <div class="elementor-element elementor-element-4af490b elementor-hidden-mobile elementor-widget elementor-widget-image" data-id="4af490b" data-element_type="widget" data-widget_type="image.default">
               <div class="elementor-widget-container">
                  <img loading="lazy" decoding="async" width="330" height="220" src="<?php echo esc_url($about_image_2); ?>" class="attachment-full size-full" alt="">
               </div>
            </div>
            <div class="elementor-element elementor-element-10e7392 elementor-widget elementor-widget-text-editor" data-id="10e7392" data-element_type="widget" data-widget_type="text-editor.default">
               <div class="elementor-widget-container">
                  <?php echo esc_html($about_description); ?>
               </div>
            </div>
            <?php
            $about_btn_url = ($about_button_action === 'link') ? $about_button_url : '#easto-button-popup-8feb59a';
            $about_popup_class = ($about_button_action === 'popup') ? ' button-popup' : '';
            $about_popup_effect = ($about_button_action === 'popup') ? ' data-effect="mfp-zoom-in"' : '';
            ?>
            <div class="elementor-element elementor-element-cba87ba elementor-button-type-link elementor-widget elementor-widget-button" data-id="cba87ba" data-element_type="widget" data-widget_type="button.default">
               <div class="elementor-widget-container">
                  <div class="elementor-button-wrapper">
                     <a class="elementor-button elementor-button-link elementor-size-sm<?php echo esc_attr($about_popup_class); ?>" href="<?php echo esc_url($about_btn_url); ?>"<?php echo $about_popup_effect; ?>>
                        <span class="elementor-button-content-wrapper">
                           <span class="elementor-button-icon">
                              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                 <path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" class="btn-icon__icon"></path>
                                 <path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" class="btn-icon__icon"></path>
                              </svg>
                           </span>
                           <span class="elementor-button-text"><?php echo esc_html($about_button_text); ?></span>
                        </span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
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