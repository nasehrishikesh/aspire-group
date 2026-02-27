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
         </main>
         <!-- #main -->
      </div>
      <!-- #primary -->
   </div>
   <!-- #content -->
</div>