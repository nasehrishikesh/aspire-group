<?php
   /**
    * Template part for displaying Project Detail page content
    *
    * @package AS_Theme
    */
   
   // Get ACF fields
   $welcome_subtitle = get_field('project_welcome_subtitle');
   $welcome_title = get_field('project_welcome_title');
   $welcome_description = get_field('project_welcome_description');
   $welcome_button_text = get_field('project_welcome_button_text');
   $welcome_button_action = get_field('project_welcome_button_action');
   $welcome_button_url = get_field('project_welcome_button_url');
   $welcome_image = get_field('project_welcome_image');

   // Amenities section
   $amenities_heading = get_field('project_amenities_heading');
   $amenities_items = get_field('project_amenities_items');

   // Iconic Landmark section
   $landmark_subtitle = get_field('project_landmark_subtitle');
   $landmark_title = get_field('project_landmark_title');
   $landmark_description = get_field('project_landmark_description');
   $landmark_button_text = get_field('project_landmark_button_text');
   $landmark_button_action = get_field('project_landmark_button_action');
   $landmark_button_url = get_field('project_landmark_button_url');
   $landmark_counters = get_field('project_landmark_counters');

   // Neighborhood section
   $neighborhood_title = get_field('project_neighborhood_title');
   $neighborhood_map = get_field('project_neighborhood_map_embed');
   $neighborhood_categories = get_field('project_neighborhood_categories');

   // Floor Plan section
   $floor_plan_subtitle    = get_field('project_floor_plan_subtitle') ?: 'FLOOR PLAN';
   $floor_plan_title       = get_field('project_floor_plan_title') ?: 'Perfect Layouts';
   $floor_plan_description = get_field('project_floor_plan_description');
   $floor_plan_image       = get_field('project_floor_plan_image');
   $floor_plan_button_text = get_field('project_floor_plan_button_text') ?: 'Get Floor Plan';

   // Property Details
   $pd_heading    = get_field('project_property_details_heading') ?: 'Property Details';
   $pd_type       = get_field('project_property_type');
   $pd_units      = get_field('project_property_units');
   $pd_price      = get_field('project_property_price');
   $pd_city       = get_field('project_property_city');
   $pd_tower      = get_field('project_property_tower');
   $pd_possession = get_field('project_property_possession');
   $pd_status     = get_field('project_property_status');
   $pd_parking    = get_field('project_property_parking');
   $pd_maharera   = get_field('project_property_maharera');

   // Brochure section
   $brochure_subtitle    = get_field('project_brochure_subtitle') ?: 'BROCHURE';
   $brochure_title       = get_field('project_brochure_title') ?: 'Download Resources';
   $brochure_description = get_field('project_brochure_description');
   $brochure_background  = get_field('project_brochure_background');
   $brochure_button_text = get_field('project_brochure_button_text') ?: 'Download Brochure';
   $brochure_file        = get_field('project_brochure_file');

   // Gallery section
   $gallery_subtitle = get_field('project_gallery_subtitle') ?: 'GALLERY';
   $gallery_title    = get_field('project_gallery_title') ?: 'Project Gallery';
   $gallery_images   = get_field('project_gallery_images');

   // Contact Us section
   $contact_subtitle    = get_field('project_contact_subtitle') ?: 'CONTACT US';
   $contact_title       = get_field('project_contact_title') ?: 'Get in Touch';
   $contact_description = get_field('project_contact_description');

   // Shared Project Inquiry CF7 form ID
   $project_inquiry_form_id = function_exists('as_theme_get_project_inquiry_form_id')
       ? as_theme_get_project_inquiry_form_id()
       : 0;

   // Per-page unique IDs for the two popups
   $floor_plan_popup_id = 'easto-button-popup-floor-plan-' . get_the_ID();
   $brochure_popup_id   = 'easto-button-popup-brochure-' . get_the_ID();
   ?>
<div id="page" class="hfeed site elementor-5841 elementor-36">
   <!-- Breadcrumb Section -->
   <div class="breadcrumb-wrap">
      <div class="breadcrumb-overlay"></div>
      <div data-elementor-type="wp-post" data-elementor-id="727" class="elementor elementor-727">
         <div class="elementor-element elementor-element-f23f9c9 e-con-full e-flex e-con e-parent e-lazyloaded about-hero" data-id="f23f9c9" data-element_type="container">
            <div class="elementor-element elementor-element-4140e1d elementor-widget elementor-widget-easto-breadcrumb" data-id="4140e1d" data-element_type="widget" data-widget_type="easto-breadcrumb.default">
               <div class="elementor-widget-container">
                  <div class="breadcrumb" typeof="BreadcrumbList" vocab="https://schema.org/">
                     <h1 class="easto-title"><?php the_title(); ?></h1>
                     <div class="breadcrumb-listItem">
                        <span property="itemListElement" typeof="ListItem">
                           <a property="item" typeof="WebPage" title="<?php esc_attr_e('Go to Home.', 'as-theme'); ?>" href="<?php echo esc_url(home_url('/')); ?>" class="home">
                           <span property="name"><?php esc_html_e('Home', 'as-theme'); ?></span>
                           </a>
                           <meta property="position" content="1">
                        </span>
                        ⋅
                        <span property="itemListElement" typeof="ListItem">
                           <span property="name" class="post post-page current-item"><?php the_title(); ?></span>
                           <meta property="url" content="<?php the_permalink(); ?>">
                           <meta property="position" content="2">
                        </span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Welcome Home Section -->
   <div id="content" class="site-content clear mb-0" tabindex="-1">
      <div id="primary">
         <main id="main" class="site-main">
            <div class="elementor-element elementor-element-aadbbc7 e-flex e-con-boxed e-con e-parent mt-150" data-id="aadbbc7" data-element_type="container">
               <div class="e-con-inner">
                  <div class="elementor-element elementor-element-2b111ff e-con-full e-flex e-con e-child" data-id="2b111ff" data-element_type="container" data-settings='{"background_background":"classic"}'>
                     <div class="elementor-element elementor-element-b3291a3 e-transform animated-fast elementor-widget elementor-widget-text-editor animated opal-move-left" data-id="b3291a3" data-element_type="widget" data-settings='{"_animation":"opal-move-left"}' data-widget_type="text-editor.default">
                        <div class="elementor-widget-container">
                           <?php echo esc_html($welcome_subtitle); ?>
                        </div>
                     </div>
                     <div class="elementor-element elementor-element-a2d0ada animated-fast elementor-widget elementor-widget-heading animated opal-move-left" data-id="a2d0ada" data-element_type="widget" data-settings='{"_animation":"opal-move-left"}' data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                           <h2 class="elementor-heading-title elementor-size-default"><?php echo esc_html($welcome_title); ?></h2>
                        </div>
                     </div>
                     <div class="elementor-element elementor-element-0025587 animated-fast elementor-widget elementor-widget-text-editor animated opal-move-left" data-id="0025587" data-element_type="widget" data-settings='{"_animation":"opal-move-left"}' data-widget_type="text-editor.default">
                        <div class="elementor-widget-container">
                           <?php echo wp_kses_post($welcome_description); ?>
                        </div>
                     </div>
                     <?php
                        $welcome_btn_url = ($welcome_button_action === 'link') ? $welcome_button_url : '#easto-button-popup-8feb59a';
                        $welcome_popup_class = ($welcome_button_action === 'popup') ? ' button-popup' : '';
                        $welcome_popup_effect = ($welcome_button_action === 'popup') ? ' data-effect="mfp-zoom-in"' : '';
                        ?>
                     <div class="elementor-element elementor-element-aba3cb1 elementor-button-type-link animated-fast elementor-mobile-align-center elementor-widget elementor-widget-button animated opal-move-left" data-id="aba3cb1" data-element_type="widget" data-settings='{"_animation":"opal-move-left"}' data-widget_type="button.default">
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
                  <div class="elementor-element elementor-element-6022562 e-con-full animated-fast e-flex e-con e-child animated opal-move-right" data-id="6022562" data-element_type="container" data-settings='{"background_background":"classic","animation":"opal-move-right"}' style="background-image: url('<?php echo esc_url($welcome_image); ?>');"></div>
               </div>
            </div>
            <div data-elementor-type="wp-page" data-elementor-id="5990" class="elementor elementor-5990">
               <div class="elementor-element elementor-element-a97a29b e-con-full pl-vw e-flex e-con e-parent e-lazyloaded" data-id="a97a29b" data-element_type="container">
                  <div class="elementor-element elementor-element-7adec53 e-con-full e-flex e-con e-child" data-id="7adec53" data-element_type="container">
                     <div class="elementor-element elementor-element-f7f4a64 elementor-widget elementor-widget-heading animated opal-move-right" data-id="f7f4a64" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;opal-move-right&quot;}" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                           <div class="elementor-heading-title elementor-size-default"><?php echo esc_html($landmark_subtitle ?: 'an iconic landmark'); ?></div>
                        </div>
                     </div>
                     <div class="elementor-element elementor-element-ce7ffe8 elementor-widget__width-initial animated-fast elementor-widget elementor-widget-heading animated opal-move-right" data-id="ce7ffe8" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;opal-move-right&quot;}" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                           <h2 class="elementor-heading-title elementor-size-default"><?php echo esc_html($landmark_title ?: 'Landmark style reinvented'); ?></h2>
                        </div>
                     </div>
                     <div class="elementor-element elementor-element-e4e28db animated-fast elementor-widget elementor-widget-text-editor animated opal-move-right" data-id="e4e28db" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;opal-move-right&quot;}" data-widget_type="text-editor.default">
                        <div class="elementor-widget-container">
                           <style>/*! elementor - v3.22.0 - 17-06-2024 */
                              .elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap{background-color:#69727d;color:#fff}.elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap{color:#69727d;border:3px solid;background-color:transparent}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap{margin-top:8px}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter{width:1em;height:1em}.elementor-widget-text-editor .elementor-drop-cap{float:left;text-align:center;line-height:1;font-size:50px}.elementor-widget-text-editor .elementor-drop-cap-letter{display:inline-block}
                           </style>
                           <?php echo esc_html($landmark_description ?: 'This all-encompassing condominium brings your favorite amenities and lifestyle services together in one experience.'); ?>
                        </div>
                     </div>
                     <div class="elementor-element elementor-element-c74437d elementor-button-type-link animated-fast elementor-widget elementor-widget-button animated opal-move-right" data-id="c74437d" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;opal-move-right&quot;}" data-widget_type="button.default">
                        <div class="elementor-widget-container">
                           <div class="elementor-button-wrapper">
                              <a class="elementor-button elementor-button-link elementor-size-sm" href="<?php echo esc_url($landmark_button_url ?: '#'); ?>">
                                 <span class="elementor-button-content-wrapper">
                                    <span class="elementor-button-icon">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                          <path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" class="btn-icon__icon"></path>
                                          <path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" class="btn-icon__icon"></path>
                                       </svg>
                                    </span>
                                    <span class="elementor-button-text"><?php echo esc_html($landmark_button_text ?: 'explore residences'); ?></span>
                                 </span>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php if ($landmark_counters) : $counter_delay = 0; foreach ($landmark_counters as $counter) : $delay_settings = $counter_delay > 0 ? '{&quot;animation&quot;:&quot;opal-move-up&quot;,&quot;animation_delay&quot;:' . $counter_delay . '}' : '{&quot;animation&quot;:&quot;opal-move-up&quot;}'; ?>
                  <div class="elementor-element elementor-element-ea02959 e-con-full animated-fast e-flex e-con e-child animated opal-move-up" data-id="ea02959" data-element_type="container" data-settings="<?php echo $delay_settings; ?>">
                     <div class="elementor-element elementor-element-f8963da elementor-widget elementor-widget-easto-counter" data-id="f8963da" data-element_type="widget" data-widget_type="easto-counter.default">
                        <div class="elementor-widget-container">
                           <div class="elementor-counter">
                              <div class="elementor-counter-number-wrapper">
                                 <span class="elementor-counter-number-prefix"></span>
                                 <span class="elementor-odometer-number odometer odometer-auto-theme" data-count="<?php echo esc_attr($counter['number']); ?>">
                                    <div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span></div>
                                 </span>
                                 <span class="elementor-counter-number-suffix"><?php echo esc_html($counter['suffix']); ?></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="elementor-element elementor-element-48fe02b elementor-widget__width-initial elementor-widget elementor-widget-text-editor" data-id="48fe02b" data-element_type="widget" data-widget_type="text-editor.default">
                        <div class="elementor-widget-container">
                           <?php echo esc_html($counter['description']); ?>
                        </div>
                     </div>
                  </div>
                  <?php $counter_delay += 300; endforeach; endif; ?>
               </div>
            </div>
            <?php if ($amenities_items) : ?>
            <div data-elementor-type="wp-page" data-elementor-id="6134" class="elementor elementor-6134" id="amenities-sync-section">
               <div class="elementor-element elementor-element-e1bb64b e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="e1bb64b" data-element_type="container" data-settings='{"background_background":"classic"}'>
                  <div class="e-con-inner">
                     <div class="elementor-element elementor-element-889c980 e-con-full e-flex e-con e-child" data-id="889c980" data-element_type="container">
                        <div class="elementor-element elementor-element-a7cdd39 animated-fast elementor-widget elementor-widget-heading animated opal-move-up" data-id="a7cdd39" data-element_type="widget" data-settings='{"_animation":"opal-move-up"}' data-widget_type="heading.default">
                           <div class="elementor-widget-container">
                              <h2 class="elementor-heading-title elementor-size-default"><?php echo esc_html($amenities_heading ?: 'Wellness'); ?></h2>
                           </div>
                        </div>
                        <div class="elementor-element elementor-element-567e8cf animated-fast elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list animated opal-move-up" data-id="567e8cf" data-element_type="widget" data-settings='{"_animation":"opal-move-up"}' data-widget_type="icon-list.default">
                           <div class="elementor-widget-container">
                              <ul class="elementor-icon-list-items amenities-nav-list">
                                 <?php foreach ($amenities_items as $index => $item) : ?>
                                 <li class="elementor-icon-list-item amenities-nav-item<?php echo $index === 0 ? ' active' : ''; ?>" data-slide-index="<?php echo esc_attr($index); ?>">
                                    <span class="elementor-icon-list-text"><?php echo esc_html($item['title']); ?></span>
                                 </li>
                                 <?php endforeach; ?>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="elementor-element elementor-element-22cc55a e-con-full e-flex e-con e-child" data-id="22cc55a" data-element_type="container">
                        <div class="elementor-element elementor-element-b6dc845 elementor-pagination-position-inside overflow-to-none elementor-widget elementor-widget-easto-image-carousel e-widget-swiper" data-id="b6dc845" data-element_type="widget" data-widget_type="easto-image-carousel.default">
                           <div class="elementor-widget-container">
                              <div class="easto-swiper amenities-swiper swiper" dir="ltr">
                                 <div class="swiper-wrapper">
                                    <?php foreach ($amenities_items as $index => $item) : ?>
                                    <div class="image-carousel-item grid-item swiper-slide" data-swiper-slide-index="<?php echo esc_attr($index); ?>" role="group" aria-label="<?php echo ($index + 1) . ' / ' . count($amenities_items); ?>">
                                       <a class="elementor-clickable">
                                       <img decoding="async" src="<?php echo esc_url($item['image']); ?>" alt="<?php echo esc_attr($item['title']); ?>">
                                       <p class="gallery-title"><?php echo esc_html($item['title']); ?></p>
                                       </a>
                                    </div>
                                    <?php endforeach; ?>
                                 </div>
                              </div>
                              <div class="amenities-swiper-pagination swiper-pagination"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php endif; ?>

            <!-- Neighborhood Section -->
            <?php if ($neighborhood_categories) : ?>
               <div data-elementor-type="wp-page" data-elementor-id="6134" class="elementor-element elementor-element-aadbbc7 e-flex e-con-boxed e-con e-parent mt-150 e-lazyloaded" id="neighborhood-sync-section">
            <div class="elementor-element elementor-element-e1bb64b e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="e1bb64b" data-element_type="container" data-settings='{"background_background":"classic"}'>
                  <div class="e-con-inner">
            <div class="neighborhood-section" id="neighborhood-section">
               <div class="elementor-element e-flex e-con-boxed e-con e-parent e-lazyloaded">
                  <div class="e-con-inner">
                     <div class="neighborhood-heading">
                        <h2 class="elementor-heading-title elementor-size-default"><?php echo esc_html($neighborhood_title ?: 'Discover nearby places'); ?></h2>
                     </div>
                     <div class="neighborhood-content">
                        <div class="neighborhood-accordions">
                           <?php foreach ($neighborhood_categories as $cat_index => $category) : ?>
                           <div class="neighborhood-accordion<?php echo $cat_index === 0 ? ' active' : ''; ?>">
                              <div class="neighborhood-accordion-header" data-accordion="<?php echo esc_attr($cat_index); ?>">
                                 <span class="accordion-category-name"><?php echo esc_html($category['category_name']); ?></span>
                                 <span class="accordion-toggle-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                 </span>
                              </div>
                              <div class="neighborhood-accordion-body"<?php echo $cat_index === 0 ? ' style="display:block;"' : ''; ?>>
                                 <?php if (!empty($category['category_places'])) : ?>
                                 <ul class="neighborhood-places-list">
                                    <?php foreach ($category['category_places'] as $place) : ?>
                                    <li class="neighborhood-place-item">
                                       <span class="place-distance"><?php echo esc_html($place['distance']); ?></span>
                                       <span class="place-name"><?php echo esc_html($place['place_name']); ?></span>
                                    </li>
                                    <?php endforeach; ?>
                                 </ul>
                                 <?php endif; ?>
                              </div>
                           </div>
                           <?php endforeach; ?>
                        </div>
                        <div class="neighborhood-map">
                           <?php if ($neighborhood_map) : ?>
                           <iframe src="<?php echo esc_url($neighborhood_map); ?>" width="100%" height="100%" style="border:0; min-height:450px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                           <?php else : ?>
                           <div class="neighborhood-map-placeholder">
                              <p>Map will be displayed here</p>
                           </div>
                           <?php endif; ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            </div>
                           </div>
                           </div>
            <?php endif; ?>

            <!-- ============================================================
                 Floor Plan Section
            ============================================================== -->
            <?php if ($floor_plan_image || $floor_plan_title) : ?>
            <section class="project-extra-section project-floor-plan-section" id="floor-plan-section">
               <div class="project-extra-container">
                  <header class="project-extra-header elementor elementor-5990">
                     <?php if ($floor_plan_subtitle) : ?>
                     <div class="elementor-element elementor-element-f7f4a64 elementor-widget elementor-widget-heading" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                           <div class="elementor-heading-title elementor-size-default"><?php echo esc_html($floor_plan_subtitle); ?></div>
                        </div>
                     </div>
                     <?php endif; ?>
                     <?php if ($floor_plan_title) : ?>
                     <div class="elementor-element elementor-element-ce7ffe8 elementor-widget__width-initial elementor-widget elementor-widget-heading" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                           <h2 class="elementor-heading-title elementor-size-default"><?php echo esc_html($floor_plan_title); ?></h2>
                        </div>
                     </div>
                     <?php endif; ?>
                     <?php if ($floor_plan_description) : ?>
                     <div class="elementor-element elementor-element-e4e28db elementor-widget elementor-widget-text-editor" data-element_type="widget" data-widget_type="text-editor.default">
                        <div class="elementor-widget-container">
                           <?php echo esc_html($floor_plan_description); ?>
                        </div>
                     </div>
                     <?php endif; ?>
                  </header>

                  <div class="floor-plan-card">
                     <div class="floor-plan-image-wrap"
                          <?php if ($floor_plan_image) : ?>style="background-image:url('<?php echo esc_url($floor_plan_image); ?>')"<?php endif; ?>>
                        <div class="floor-plan-overlay" aria-hidden="true"></div>
                     </div>
                      <div class="elementor-element elementor-widget elementor-widget-button" data-element_type="widget" data-widget_type="button.default">
                         <div class="elementor-widget-container">
                            <div class="elementor-button-wrapper">
                               <a class="elementor-button button-popup floor-plan-trigger"
                                  href="#<?php echo esc_attr($floor_plan_popup_id); ?>"
                                  role="button"
                                  data-effect="mfp-zoom-in"
                                  data-download-url="<?php echo esc_url($floor_plan_image); ?>"
                                  data-download-name="<?php echo esc_attr(sanitize_title(get_the_title())); ?>-floor-plan">
                                  <span class="elementor-button-content-wrapper">
                                     <span class="elementor-button-icon elementor-align-icon-right">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                           <path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" class="btn-icon__icon"></path>
                                           <path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" class="btn-icon__icon"></path>
                                        </svg>
                                     </span>
                                     <span class="elementor-button-text"><?php echo esc_html($floor_plan_button_text); ?></span>
                                  </span>
                               </a>
                            </div>
                         </div>
                      </div>
                  </div>
               </div>
            </section>
            <?php endif; ?>

            <!-- ============================================================
                 Property Details Section
            ============================================================== -->
            <?php
               $pd_rows = array();
               if ($pd_type)       $pd_rows[] = array('label' => 'Property Type',  'value' => $pd_type);
               if (!empty($pd_units) && is_array($pd_units)) $pd_rows[] = array('label' => 'Property Units', 'value' => implode(', ', $pd_units));
               if ($pd_price)      $pd_rows[] = array('label' => 'Price',          'value' => $pd_price);
               if ($pd_city)       $pd_rows[] = array('label' => 'City',           'value' => $pd_city);
               if ($pd_tower)      $pd_rows[] = array('label' => 'Tower',          'value' => $pd_tower);
               if ($pd_possession) $pd_rows[] = array('label' => 'Possession',     'value' => $pd_possession);
               if ($pd_status)     $pd_rows[] = array('label' => 'Property Status','value' => $pd_status);
               if ($pd_parking)    $pd_rows[] = array('label' => 'Parking',        'value' => $pd_parking);
               if ($pd_maharera)   $pd_rows[] = array('label' => 'MahaRERA',       'value' => $pd_maharera);
            ?>
            <?php if (!empty($pd_rows)) : ?>
            <section class="project-extra-section project-property-details-section" id="property-details-section">
               <div class="project-extra-container">
                  <header class="project-extra-header property-details-header elementor elementor-5990">
                     <div class="elementor-element elementor-element-ce7ffe8 elementor-widget__width-initial elementor-widget elementor-widget-heading" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                           <h2 class="elementor-heading-title elementor-size-default"><?php echo esc_html($pd_heading ?: 'Property Details'); ?></h2>
                        </div>
                     </div>
                  </header>
                  <div class="property-details-grid">
                     <?php foreach ($pd_rows as $row) : ?>
                        <div class="property-details-item">
                           <span class="property-details-label"><?php echo esc_html($row['label']); ?></span>
                           <span class="property-details-value"><?php echo esc_html($row['value']); ?></span>
                        </div>
                     <?php endforeach; ?>
                  </div>
               </div>
            </section>
            <?php endif; ?>

            <!-- ============================================================
                 Gallery Section
            ============================================================== -->
            <?php if (!empty($gallery_images) && is_array($gallery_images)) : ?>
            <section class="project-extra-section project-gallery-section" id="gallery-section">
               <div class="project-extra-container">
                  <header class="project-extra-header elementor elementor-5990">
                     <?php if ($gallery_subtitle) : ?>
                     <div class="elementor-element elementor-element-f7f4a64 elementor-widget elementor-widget-heading" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                           <div class="elementor-heading-title elementor-size-default"><?php echo esc_html($gallery_subtitle); ?></div>
                        </div>
                     </div>
                     <?php endif; ?>
                     <?php if ($gallery_title) : ?>
                     <div class="elementor-element elementor-element-ce7ffe8 elementor-widget__width-initial elementor-widget elementor-widget-heading" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                           <h2 class="elementor-heading-title elementor-size-default"><?php echo esc_html($gallery_title); ?></h2>
                        </div>
                     </div>
                     <?php endif; ?>
                  </header>

                  <div class="project-gallery-wrap">
                     <div class="project-gallery-slider" id="project-gallery-slider-<?php echo (int) get_the_ID(); ?>">
                        <div class="project-gallery-track">
                           <?php foreach ($gallery_images as $idx => $img) :
                              $src = is_array($img) ? ($img['url'] ?? '') : (string) $img;
                              $alt = is_array($img) ? ($img['alt'] ?? '') : '';
                           ?>
                           <div class="project-gallery-slide<?php echo $idx === 0 ? ' is-active' : ''; ?>" data-index="<?php echo (int) $idx; ?>">
                              <img src="<?php echo esc_url($src); ?>" alt="<?php echo esc_attr($alt); ?>" loading="lazy">
                           </div>
                           <?php endforeach; ?>
                        </div>

                        <?php if (count($gallery_images) > 1) : ?>
                           <button type="button" class="project-gallery-nav project-gallery-prev" aria-label="Previous image">
                              <i class="easto-icon-arrow-left"></i>
                           </button>
                           <button type="button" class="project-gallery-nav project-gallery-next" aria-label="Next image">
                              <i class="easto-icon-arrow-right"></i>
                           </button>
                        <?php endif; ?>
                     </div>

                     <?php if (count($gallery_images) > 1) : ?>
                        <div class="project-gallery-dots">
                           <?php foreach ($gallery_images as $idx => $img) : ?>
                              <button type="button" class="project-gallery-dot<?php echo $idx === 0 ? ' is-active' : ''; ?>" data-index="<?php echo (int) $idx; ?>" aria-label="Go to image <?php echo (int) ($idx + 1); ?>"></button>
                           <?php endforeach; ?>
                        </div>
                     <?php endif; ?>
                  </div>
               </div>
            </section>
            <?php endif; ?>

            <!-- ============================================================
                 Download Brochure Section
            ============================================================== -->
            <?php if ($brochure_title || $brochure_background || $brochure_file) : ?>
            <section class="project-extra-section project-brochure-section"
                     id="brochure-section"
                     <?php if ($brochure_background) : ?>style="background-image:url('<?php echo esc_url($brochure_background); ?>')"<?php endif; ?>>
               <div class="project-brochure-overlay" aria-hidden="true"></div>
               <div class="project-extra-container project-brochure-inner elementor elementor-5990">
                  <?php if ($brochure_subtitle) : ?>
                  <div class="elementor-element elementor-element-f7f4a64 elementor-widget elementor-widget-heading" data-element_type="widget" data-widget_type="heading.default">
                     <div class="elementor-widget-container">
                        <div class="elementor-heading-title elementor-size-default project-brochure-subtitle"><?php echo esc_html($brochure_subtitle); ?></div>
                     </div>
                  </div>
                  <?php endif; ?>
                  <?php if ($brochure_title) : ?>
                  <div class="elementor-element elementor-element-ce7ffe8 elementor-widget__width-initial elementor-widget elementor-widget-heading" data-element_type="widget" data-widget_type="heading.default">
                     <div class="elementor-widget-container">
                        <h2 class="elementor-heading-title elementor-size-default project-brochure-title"><?php echo esc_html($brochure_title); ?></h2>
                     </div>
                  </div>
                  <?php endif; ?>
                  <?php if ($brochure_description) : ?>
                  <div class="elementor-element elementor-element-e4e28db elementor-widget elementor-widget-text-editor" data-element_type="widget" data-widget_type="text-editor.default">
                     <div class="elementor-widget-container project-brochure-description">
                        <?php echo esc_html($brochure_description); ?>
                     </div>
                  </div>
                  <?php endif; ?>

                  <div class="elementor-element elementor-widget elementor-widget-button" data-element_type="widget" data-widget_type="button.default">
                     <div class="elementor-widget-container">
                        <div class="elementor-button-wrapper">
                           <a class="elementor-button elementor-button-link elementor-size-sm button-popup brochure-trigger"
                              href="#<?php echo esc_attr($brochure_popup_id); ?>"
                              role="button"
                              data-effect="mfp-zoom-in"
                              data-download-url="<?php echo esc_url($brochure_file); ?>"
                              data-download-name="<?php echo esc_attr(sanitize_title(get_the_title())); ?>-brochure">
                              <span class="elementor-button-content-wrapper">
                                 <span class="elementor-button-icon elementor-align-icon-right">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                       <path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" class="btn-icon__icon"></path>
                                       <path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" class="btn-icon__icon"></path>
                                    </svg>
                                 </span>
                                 <span class="elementor-button-text"><?php echo esc_html($brochure_button_text); ?></span>
                              </span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <?php endif; ?>

            <!-- ============================================================
                 Contact Us Section
            ============================================================== -->
            <?php if ($project_inquiry_form_id) : ?>
            <section class="project-extra-section project-contact-section" id="contact-section">
               <div class="project-extra-container">
                  <header class="project-extra-header elementor elementor-5990">
                     <?php if ($contact_subtitle) : ?>
                     <div class="elementor-element elementor-element-f7f4a64 elementor-widget elementor-widget-heading" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                           <div class="elementor-heading-title elementor-size-default"><?php echo esc_html($contact_subtitle); ?></div>
                        </div>
                     </div>
                     <?php endif; ?>
                     <?php if ($contact_title) : ?>
                     <div class="elementor-element elementor-element-ce7ffe8 elementor-widget__width-initial elementor-widget elementor-widget-heading" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                           <h2 class="elementor-heading-title elementor-size-default"><?php echo esc_html($contact_title); ?></h2>
                        </div>
                     </div>
                     <?php endif; ?>
                     <?php if ($contact_description) : ?>
                     <div class="elementor-element elementor-element-e4e28db elementor-widget elementor-widget-text-editor" data-element_type="widget" data-widget_type="text-editor.default">
                        <div class="elementor-widget-container">
                           <?php echo esc_html($contact_description); ?>
                        </div>
                     </div>
                     <?php endif; ?>
                  </header>
                  <div class="project-contact-form-wrap">
                     <div class="elementor-element elementor-widget elementor-widget-easto-contactform project-inquiry-widget" data-element_type="widget" data-widget_type="easto-contactform.default">
                        <div class="elementor-widget-container">
                           <?php echo do_shortcode('[contact-form-7 id="' . (int) $project_inquiry_form_id . '" title="Project Inquiry Form"]'); ?>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <?php endif; ?>

         </main>
         <!-- #main -->
      </div>
      <!-- #primary -->
   </div>
   <!-- #content -->
</div>

<!-- ============================================================
     Popups: Floor Plan + Brochure (Magnific Popup hidden targets)
     Markup mirrors the existing Schedule-a-Tour popup in header.php
     so the form picks up the same Elementor / CF7 styling.
============================================================== -->
<?php if ($project_inquiry_form_id) :
   $project_popups = array(
      array(
         'id'       => $floor_plan_popup_id,
         'heading'  => __('Get Floor Plan', 'as-theme'),
         'subtitle' => __('Submit your details and we\'ll send you the floor plan instantly.', 'as-theme'),
         'extra'    => 'floor-plan-popup',
      ),
      array(
         'id'       => $brochure_popup_id,
         'heading'  => __('Download Brochure', 'as-theme'),
         'subtitle' => __('Submit your details to download the project brochure.', 'as-theme'),
         'extra'    => 'brochure-popup',
      ),
   );
   foreach ($project_popups as $popup) : ?>
<div class="mfp-hide button-popup-content project-inquiry-popup-content <?php echo esc_attr($popup['extra']); ?>" id="<?php echo esc_attr($popup['id']); ?>">
   <div class="button-popup-content-inner">
      <button title="<?php esc_attr_e('Close (Esc)', 'as-theme'); ?>" type="button" class="mfp-close">
         <span class="elementor-button-content-wrapper">
            <span class="elementor-close-button-icon elementor-align-icon-left">
               <i aria-hidden="true" class="easto-icon- easto-icon-times"></i>
            </span>
         </span>
      </button>
      <div data-elementor-type="container" data-elementor-id="1782" class="elementor elementor-1782 elementor-project-inquiry">
         <div class="elementor-element elementor-element-8c8dd6d e-flex e-con-boxed e-con e-parent" data-id="8c8dd6d" data-element_type="container">
            <div class="e-con-inner">
               <div class="elementor-element elementor-element-b46281a elementor-widget elementor-widget-heading" data-id="b46281a" data-element_type="widget" data-widget_type="heading.default">
                  <div class="elementor-widget-container">
                     <h4 class="elementor-heading-title elementor-size-default"><?php echo esc_html($popup['heading']); ?></h4>
                     <?php if (!empty($popup['subtitle'])) : ?>
                        <p class="project-inquiry-popup-subtitle"><?php echo esc_html($popup['subtitle']); ?></p>
                     <?php endif; ?>
                  </div>
               </div>
               <div class="elementor-element elementor-element-f646522 elementor-widget elementor-widget-easto-contactform project-inquiry-widget" data-id="f646522" data-element_type="widget" data-widget_type="easto-contactform.default">
                  <div class="elementor-widget-container">
                     <?php echo do_shortcode('[contact-form-7 id="' . (int) $project_inquiry_form_id . '" title="Project Inquiry Form"]'); ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php endforeach; endif; ?>

<!-- ============================================================
     Project Detail extras: styles + JS
============================================================== -->
<style>
   /* Section primitives - shared across new sections */
   .project-extra-section { position: relative; padding: 100px 0; background: #fff; }
   .project-extra-section *,
   .project-extra-section *::before,
   .project-extra-section *::after { box-sizing: border-box; }
   .project-extra-container { width: 100%; max-width: 1320px; margin: 0 auto; padding: 0 24px; position: relative; z-index: 2; }
   .project-extra-container .elementor-5990 .elementor-element.elementor-element-f7f4a64.elementor-element
   {
      --align-self: center!important;
   }   
   .project-extra-header { 
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center; 
      max-width: 100%; 
      margin: 0 0 50px; 
   }
   .project-extra-subtitle {
      display: inline-block;
      font-size: 12px;
      font-weight: 500;
      letter-spacing: .22em;
      text-transform: uppercase;
      color: var(--e-global-color-primary, #96796E);
      margin-bottom: 14px;
   }
   .project-extra-title {
      font-size: 36px;
      line-height: 1.2;
      font-weight: 400;
      color: #1a1a1a;
      margin: 0 0 14px;
   }
   .project-extra-description { font-size: 15px; line-height: 1.7; color: #555; margin: 0; }

   /* ----- Floor Plan ----- */
   .project-floor-plan-section { background: #faf7f3; }
   .floor-plan-card {
      position: relative;
      max-width: 1100px;
      margin: 0 auto;
      border-radius: 4px;
      overflow: hidden;
      box-shadow: 0 30px 60px -30px rgba(0,0,0,.18);
   }
   .floor-plan-image-wrap {
      position: relative;
      aspect-ratio: 16 / 9;
      background-color: #ece4d8;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      filter: blur(14px) saturate(.95);
      transform: scale(1.05);
   }
   .floor-plan-overlay {
      position: absolute; inset: 0;
      background: linear-gradient(180deg, rgba(15,15,15,.18) 0%, rgba(15,15,15,.45) 100%);
   }
   .floor-plan-cta-wrap {
      position: absolute; inset: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 2;
   }
   .floor-plan-card .elementor-widget-button{
      position:absolute;
      top:50%;
      left:50%;
      transform:translate(-50%,-50%);
   }

   /* ----- Property Details ----- */
   .project-property-details-section { background: #fff; }
   .property-details-header { margin-bottom: 40px; }
   .property-details-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 0;
      border-top: 1px solid rgba(0,0,0,.08);
      border-left: 1px solid rgba(0,0,0,.08);
      max-width: 1100px;
      margin: 0 auto;
   }
   @media (max-width: 900px) { .property-details-grid { grid-template-columns: repeat(2, 1fr); } }
   @media (max-width: 540px) { .property-details-grid { grid-template-columns: 1fr; } }
   .property-details-item {
      padding: 22px 28px;
      border-right: 1px solid rgba(0,0,0,.08);
      border-bottom: 1px solid rgba(0,0,0,.08);
      display: flex;
      flex-direction: column;
      gap: 6px;
      background: #fff;
   }
   .property-details-label {
      font-size: 11px;
      font-weight: 600;
      letter-spacing: .18em;
      text-transform: uppercase;
      color: var(--e-global-color-primary, #96796E);
   }
   .property-details-value {
      font-size: 16px;
      line-height: 1.45;
      color: #1a1a1a;
      word-break: break-word;
   }

   /* ----- Brochure ----- */
   .project-brochure-section {
      position: relative;
      background: #2b2624;
      background-size: cover;
      background-position: center;
      color: #fff;
      padding: 120px 0;
      overflow: hidden;
   }
   .project-brochure-overlay {
      position: absolute; inset: 0;
      background: linear-gradient(180deg, rgba(20,20,20,.45) 0%, rgba(20,20,20,.65) 100%);
      z-index: 1;
   }
   .project-brochure-inner { 
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center; 
      max-width: 1200px; 
   }
   
   .project-brochure-section .project-brochure-subtitle { color: #c9a25a !important; }
   .project-brochure-section .project-brochure-title,
   .project-brochure-section .project-brochure-description { color: #fff !important; }
   .project-brochure-section .elementor-button { margin-top: 30px; background: #c9a25a; color: #1a1a1a; }
   .project-brochure-section .elementor-button:hover { background: #fff; }

   #brochure-section .elementor-5990 .elementor-element.elementor-element-f7f4a64.elementor-element{
      --align-self: center!important;
   }

   /* ----- Gallery ----- */
   .project-gallery-section { background: #fafafa; }
   .project-gallery-wrap { max-width: 1100px; margin: 0 auto; }
   .project-gallery-slider {
      position: relative;
      aspect-ratio: 16 / 9;
      overflow: hidden;
      border-radius: 4px;
      background: #1a1a1a;
   }
   .project-gallery-track { position: absolute; inset: 0; }
   .project-gallery-slide {
      position: absolute; inset: 0;
      opacity: 0;
      transition: opacity .55s ease;
   }
   .project-gallery-slide.is-active { opacity: 1; z-index: 1; }
   .project-gallery-slide img { width: 100%; height: 100%; object-fit: cover; display: block; }
   .project-gallery-nav {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      width: 48px; height: 58px;
      border-radius: 50%;
      border: 0;
      background: rgba(255,255,255,.92);
      color: #1a1a1a;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      z-index: 3;
      transition: background .2s ease, transform .2s ease;
   }
    .project-gallery-nav i {
       font-size: 24px;
       display: inline-flex;
       align-items: center;
       justify-content: center;
       line-height: 1;
    }
   .project-gallery-nav:hover { background: #fff; transform: translateY(-50%) scale(1.06); }
   .project-gallery-prev { left: 20px; }
   .project-gallery-next { right: 20px; }
   .project-gallery-dots {
      display: flex;
      justify-content: center;
      gap: 8px;
      margin-top: 22px;
   }
   .project-gallery-dot {
      width: 10px; height: 10px;
      border-radius: 50%;
      border: 0;
      background: rgba(0,0,0,.18);
      cursor: pointer;
      padding: 0;
      transition: background .2s ease, transform .2s ease;
   }
   .project-gallery-dot.is-active { background: var(--e-global-color-primary, #96796E); transform: scale(1.25); }

   /* ----- Contact section ----- */
   .project-contact-section { background: #fff; }
   .project-contact-form-wrap { max-width: 640px; margin: 0 auto; }
   .project-contact-form-wrap .elementor-widget-easto-contactform { display: block; }

   /* ----- Project Inquiry popup chrome ----- */
   .mfp-wrap .project-inquiry-popup-content .project-inquiry-popup-subtitle {
      font-size: 14px;
      color: #666;
      margin: 0 0 26px;
      text-align: center;
   }
   .mfp-wrap .project-inquiry-popup-content .mfp-close { top: 0; right: 0; border-radius:0px!important}

   /* Project Name field: tiny visual tweak so it reads as "context, not input" */
   .project-inquiry-widget .project-inquiry-form .column-project-name { margin-bottom: 8px; }
   .project-inquiry-widget .project-inquiry-form .column-project-name label {
      display: block;
      font-size: 11px;
      font-weight: 600;
      letter-spacing: .2em;
      text-transform: uppercase;
      color: var(--e-global-color-primary, #96796E);
      margin-bottom: 2px;
   }
   .project-inquiry-widget .project-inquiry-form input.project-name-input { color:#1a1a1a; opacity:.85; cursor:not-allowed; }

   @media (max-width: 992px) 
    {
      .floor-plan-card .elementor-widget-button{
         width: 210px;
      }

      .floor-plan-card .elementor-widget-button .elementor-button{
         font-size: 10px;
      }

    }
</style>

<script>
(function () {
   // -------- Magnific Popup init for our custom CTAs --------
   //
   // The theme's `button-popup.min.js` only binds MFP to triggers that are
   // wrapped in an Elementor `easto-button-popup` widget. Our Floor Plan and
   // Brochure CTAs are plain anchors, so we initialize MFP manually here.
   function initProjectPopups() {
      if (!window.jQuery || !window.jQuery.fn || !window.jQuery.fn.magnificPopup) {
         // jQuery / Magnific Popup not ready yet — retry shortly.
         return setTimeout(initProjectPopups, 150);
      }
      var $ = window.jQuery;
      var $triggers = $('.floor-plan-trigger, .brochure-trigger');
      if (!$triggers.length) return;
      $triggers.each(function () {
         var $t = $(this);
         if ($t.data('mfp-bound')) return;
         $t.data('mfp-bound', true);
         $t.magnificPopup({
            type: 'inline',
            removalDelay: 500,
            closeBtnInside: true,
            showCloseBtn: true,
            mainClass: 'mfp-button-popup mfp-zoom-in',
            midClick: true,
         });
      });
   }
   if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', initProjectPopups);
   } else {
      initProjectPopups();
   }

   // -------- Gallery slider --------
   document.querySelectorAll('.project-gallery-slider').forEach(function (slider) {
      var slides = slider.querySelectorAll('.project-gallery-slide');
      var dots   = slider.parentElement.querySelectorAll('.project-gallery-dot');
      if (!slides.length) return;
      var current = 0;

      function go(to) {
         to = (to + slides.length) % slides.length;
         slides[current].classList.remove('is-active');
         if (dots[current]) dots[current].classList.remove('is-active');
         current = to;
         slides[current].classList.add('is-active');
         if (dots[current]) dots[current].classList.add('is-active');
      }

      var prev = slider.querySelector('.project-gallery-prev');
      var next = slider.querySelector('.project-gallery-next');
      if (prev) prev.addEventListener('click', function () { go(current - 1); });
      if (next) next.addEventListener('click', function () { go(current + 1); });
      dots.forEach(function (dot) {
         dot.addEventListener('click', function () {
            go(parseInt(dot.getAttribute('data-index'), 10) || 0);
         });
      });

      // Auto-advance every 6s
      var autoplay = setInterval(function () { go(current + 1); }, 6000);
      slider.addEventListener('mouseenter', function () { clearInterval(autoplay); });
   });

   // -------- CF7 success → download trigger --------
   //
   // When a Project Inquiry form submits successfully inside the Floor Plan
   // or Brochure popup, we read the `data-download-url` and `data-download-name`
   // off the trigger that opened the popup and force a browser download.
   var pendingDownload = null;

   // Capture the last clicked trigger so we know which download to fire.
   document.addEventListener('click', function (event) {
      var trigger = event.target.closest('.floor-plan-trigger, .brochure-trigger');
      if (!trigger) return;
      var url  = trigger.getAttribute('data-download-url');
      var name = trigger.getAttribute('data-download-name') || 'download';
      if (url) pendingDownload = { url: url, name: name };
   }, true);

   document.addEventListener('wpcf7mailsent', function (event) {
      if (!pendingDownload || !pendingDownload.url) return;
      var a = document.createElement('a');
      a.href = pendingDownload.url;
      a.download = pendingDownload.name;
      a.rel = 'noopener';
      a.target = '_blank';
      document.body.appendChild(a);
      a.click();
      document.body.removeChild(a);
      pendingDownload = null;

      // Close the magnific popup if it's open.
      if (window.jQuery && window.jQuery.magnificPopup) {
         window.jQuery.magnificPopup.close();
      }
   });
}());
</script>