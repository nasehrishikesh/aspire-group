<?php
   /**
    * Template part for displaying About page content
    *
    * @package AS_Theme
    */
   
   // Get ACF fields
   $hero_image_1 = get_field('about_hero_image_1');
   $hero_image_2 = get_field('about_hero_image_2');
   $vision_subtitle = get_field('about_vision_subtitle');
   $vision_title = get_field('about_vision_title');
   $vision_image = get_field('about_vision_image');
   $vision_counter = get_field('about_vision_counter_number');
   $vision_counter_suffix = get_field('about_vision_counter_suffix');
   $vision_counter_label = get_field('about_vision_counter_label');
   $vision_description = get_field('about_vision_description');
   $vision_button_text = get_field('about_vision_button_text');
   $vision_button_url = get_field('about_vision_button_url');
   $values_items = get_field('about_values_items');
   $background_image = get_field('about_background_image');
   $team_subtitle = get_field('about_team_subtitle');
   $team_title = get_field('about_team_title');
   $team_members = get_field('about_team_members');
   $stats_counters = get_field('about_stats_counters');
   ?>
<div id="page" class="hfeed site elementor-5841">
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
   <div id="content" class="site-content clear" tabindex="-1">
         <div id="primary">
            <main id="main" class="site-main">
               <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                  <div class="entry-content">
                     <div data-elementor-type="wp-page" data-elementor-id="<?php the_ID(); ?>" class="elementor elementor-<?php the_ID(); ?>">
                        <!-- Hero Images Section -->
                        <?php if ($hero_image_1 || $hero_image_2) : ?>
                        <div class="elementor-element elementor-element-f954724 e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="f954724" data-element_type="container">
                           <div class="e-con-inner col-full">
                              <?php if ($hero_image_1) : ?>
                              <div class="elementor-element elementor-element-a4fa438 e-con-full e-flex e-con e-child" data-id="a4fa438" data-element_type="container">
                                 <div class="elementor-element elementor-element-ff53f14 elementor-widget-mobile__width-inherit animated-fast elementor-widget elementor-widget-image animated opal-move-right" data-id="ff53f14" data-element_type="widget" data-settings='{"_animation":"opal-move-right"}' data-widget_type="image.default">
                                    <div class="elementor-widget-container">
                                       <img fetchpriority="high" decoding="async" width="<?php echo esc_attr($hero_image_1['width']); ?>" height="<?php echo esc_attr($hero_image_1['height']); ?>" src="<?php echo esc_url($hero_image_1['url']); ?>" class="attachment-full size-full wp-image-<?php echo esc_attr($hero_image_1['ID']); ?>" alt="<?php echo esc_attr($hero_image_1['alt']); ?>" <?php if (!empty($hero_image_1['sizes'])) : ?>srcset="<?php echo esc_attr($hero_image_1['sizes']['medium']); ?> 300w, <?php echo esc_url($hero_image_1['url']); ?> <?php echo esc_attr($hero_image_1['width']); ?>w" sizes="(max-width: <?php echo esc_attr($hero_image_1['width']); ?>px) 100vw, <?php echo esc_attr($hero_image_1['width']); ?>px"<?php endif; ?>>
                                    </div>
                                 </div>
                              </div>
                              <?php endif; ?>
                              <?php if ($hero_image_2) : ?>
                              <div class="elementor-element elementor-element-ba2209c e-con-full e-flex e-con e-child" data-id="ba2209c" data-element_type="container">
                                 <div class="elementor-element elementor-element-8d4aa79 elementor-widget-mobile__width-inherit animated-fast elementor-widget elementor-widget-image animated opal-move-left" data-id="8d4aa79" data-element_type="widget" data-settings='{"_animation":"opal-move-left"}' data-widget_type="image.default">
                                    <div class="elementor-widget-container">
                                       <img decoding="async" width="<?php echo esc_attr($hero_image_2['width']); ?>" height="<?php echo esc_attr($hero_image_2['height']); ?>" src="<?php echo esc_url($hero_image_2['url']); ?>" class="attachment-full size-full wp-image-<?php echo esc_attr($hero_image_2['ID']); ?>" alt="<?php echo esc_attr($hero_image_2['alt']); ?>" <?php if (!empty($hero_image_2['sizes'])) : ?>srcset="<?php echo esc_attr($hero_image_2['sizes']['medium']); ?> 300w, <?php echo esc_url($hero_image_2['url']); ?> <?php echo esc_attr($hero_image_2['width']); ?>w" sizes="(max-width: <?php echo esc_attr($hero_image_2['width']); ?>px) 100vw, <?php echo esc_attr($hero_image_2['width']); ?>px"<?php endif; ?>>
                                    </div>
                                 </div>
                              </div>
                              <?php endif; ?>
                           </div>
                        </div>
                        <?php endif; ?>
                        <!-- Vision Section -->
                        <div class="elementor-element elementor-element-fe527f5 e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="fe527f5" data-element_type="container">
                           <div class="e-con-inner col-full">
                              <div class="elementor-element elementor-element-4d7171c e-con-full e-flex e-con e-child" data-id="4d7171c" data-element_type="container">
                                 <?php if ($vision_subtitle) : ?>
                                 <div class="elementor-element elementor-element-1bf8015 animated-fast elementor-widget elementor-widget-heading animated opal-move-right" data-id="1bf8015" data-element_type="widget" data-settings='{"_animation":"opal-move-right"}' data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                       <span class="elementor-heading-title elementor-size-default"><?php echo esc_html($vision_subtitle); ?></span>
                                    </div>
                                 </div>
                                 <?php endif; ?>
                                 <?php if ($vision_title) : ?>
                                 <div class="elementor-element elementor-element-df95531 animated-fast elementor-widget elementor-widget-heading animated opal-move-right" data-id="df95531" data-element_type="widget" data-settings='{"_animation":"opal-move-right"}' data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                       <h2 class="elementor-heading-title elementor-size-default"><?php echo esc_html($vision_title); ?></h2>
                                    </div>
                                 </div>
                                 <?php endif; ?>
                                 <div class="elementor-element elementor-element-c8b9d41 e-con-full e-flex e-con e-child" data-id="c8b9d41" data-element_type="container">
                                    <?php if ($vision_image) : ?>
                                    <div class="elementor-element elementor-element-b2b4314 e-con-full e-flex e-con e-child" data-id="b2b4314" data-element_type="container">
                                       <div class="elementor-element elementor-element-962b19d elementor-widget-mobile__width-inherit animated-fast elementor-widget elementor-widget-image animated opal-move-right" data-id="962b19d" data-element_type="widget" data-settings='{"_animation":"opal-move-right"}' data-widget_type="image.default">
                                          <div class="elementor-widget-container">
                                             <img decoding="async" width="<?php echo esc_attr($vision_image['width']); ?>" height="<?php echo esc_attr($vision_image['height']); ?>" src="<?php echo esc_url($vision_image['url']); ?>" class="attachment-full size-full wp-image-<?php echo esc_attr($vision_image['ID']); ?>" alt="<?php echo esc_attr($vision_image['alt']); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if ($vision_counter) : ?>
                                    <!-- <div class="elementor-element elementor-element-cae85bd e-con-full e-flex e-con e-child" data-id="cae85bd" data-element_type="container">
                                       <div class="elementor-element elementor-element-7dbd524 elementor-widget elementor-widget-easto-counter" data-id="7dbd524" data-element_type="widget" data-widget_type="easto-counter.default">
                                           <div class="elementor-widget-container">
                                               <div class="elementor-counter">
                                                   <div class="elementor-counter-number-wrapper">
                                                       <span class="elementor-counter-number-prefix"></span>
                                                       <span class="elementor-odometer-number odometer odometer-auto-theme" data-count="<?php echo esc_attr($vision_counter); ?>">
                                                           <div class="odometer-inside">
                                                               <?php
                                          $counter_str = (string)$vision_counter;
                                          for ($i = 0; $i < strlen($counter_str); $i++) :
                                              $digit = $counter_str[$i];
                                          ?>
                                                               <span class="odometer-digit">
                                                                  
                                                                   <span class="odometer-digit-inner">
                                                                       <span class="odometer-ribbon">
                                                                           <span class="odometer-ribbon-inner">
                                                                               <span class="odometer-value"><?php echo esc_html($digit); ?></span>
                                                                           </span>
                                                                       </span>
                                                                   </span>
                                                               </span>
                                                               <?php endfor; ?>
                                                           </div>
                                                       </span>
                                                       <span class="elementor-counter-number-suffix"><?php echo esc_html($vision_counter_suffix); ?></span>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       <?php if ($vision_counter_label) : ?>
                                       <div class="elementor-element elementor-element-64646da elementor-widget elementor-widget-icon-box" data-id="64646da" data-element_type="widget" data-widget_type="icon-box.default">
                                           <div class="elementor-widget-container">
                                               <div class="elementor-icon-box-wrapper">
                                                   <div class="elementor-icon-box-content">
                                                       <h3 class="elementor-icon-box-title">
                                                           <span>+</span>
                                                       </h3>
                                                       <p class="elementor-icon-box-description">
                                                           <?php echo nl2br(esc_html($vision_counter_label)); ?>
                                                       </p>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       <?php endif; ?>
                                       </div> -->
                                    <div class="elementor-element elementor-element-cae85bd e-con-full e-flex e-con e-child" data-id="cae85bd" data-element_type="container">
                                       <div class="elementor-element elementor-element-7dbd524 elementor-widget elementor-widget-easto-counter" data-id="7dbd524" data-element_type="widget" data-widget_type="easto-counter.default">
                                          <div class="elementor-widget-container">
                                             <div class="elementor-counter">
                                                <div class="elementor-counter-number-wrapper">
                                                   <span class="elementor-counter-number-prefix"></span>
                                                   <span class="elementor-odometer-number odometer odometer-auto-theme" data-count="40">
                                                      <div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">4</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span></div>
                                                   </span>
                                                   <span class="elementor-counter-number-suffix"></span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="elementor-element elementor-element-64646da elementor-widget elementor-widget-icon-box" data-id="64646da" data-element_type="widget" data-widget_type="icon-box.default">
                                          <div class="elementor-widget-container">
                                             <link rel="stylesheet" href="https://demo2.wpopal.com/easto/wp-content/uploads/elementor/css/custom-widget-icon-box.min.css?ver=1719281532">
                                             <div class="elementor-icon-box-wrapper">
                                                <div class="elementor-icon-box-content">
                                                   <h3 class="elementor-icon-box-title">
                                                      <span>
                                                      +						</span>
                                                   </h3>
                                                   <p class="elementor-icon-box-description">
                                                      Years <br>
                                                      Experience					
                                                   </p>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <?php endif; ?>
                                 </div>
                              </div>
                              <div class="elementor-element elementor-element-a490bb7 e-con-full e-flex e-con e-child" data-id="a490bb7" data-element_type="container">
                                 <?php if ($vision_description) : ?>
                                 <div class="elementor-element elementor-element-3247f5e animated-fast elementor-widget elementor-widget-text-editor animated opal-move-left" data-id="3247f5e" data-element_type="widget" data-settings='{"_animation":"opal-move-left"}' data-widget_type="text-editor.default">
                                    <div class="elementor-widget-container">
                                       <?php echo wp_kses_post($vision_description); ?>
                                    </div>
                                 </div>
                                 <?php endif; ?>
                                 <?php if ($vision_button_text && $vision_button_url) : ?>
                                 <div class="elementor-element elementor-element-a8924e7 elementor-button-type-link animated-fast elementor-widget elementor-widget-button animated opal-move-left" data-id="a8924e7" data-element_type="widget" data-settings='{"_animation":"opal-move-left"}' data-widget_type="button.default">
                                    <div class="elementor-widget-container">
                                       <div class="elementor-button-wrapper">
                                          <a class="elementor-button elementor-button-link elementor-size-sm" href="<?php echo esc_url($vision_button_url); ?>">
                                             <span class="elementor-button-content-wrapper">
                                                <span class="elementor-button-icon">
                                                   <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                                      <path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" class="btn-icon__icon"></path>
                                                      <path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" class="btn-icon__icon"></path>
                                                   </svg>
                                                </span>
                                                <span class="elementor-button-text"><?php echo esc_html($vision_button_text); ?></span>
                                             </span>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                                 <?php endif; ?>
                              </div>
                           </div>
                        </div>
                        <!-- Values Section -->
                        <?php if ($values_items) : ?>
                        <div class="elementor-element elementor-element-fd5c142 e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="fd5c142" data-element_type="container">
                           <div class="e-con-inner col-full">
                              <?php foreach ($values_items as $index => $value) : ?>
                              <div class="elementor-element elementor-element-4b78c5e e-con-full e-flex e-con e-child" data-id="4b78c5e-<?php echo $index; ?>" data-element_type="container">
                                 <div class="elementor-element elementor-element-ce6842f animated-fast elementor-view-default elementor-position-top elementor-mobile-position-top elementor-widget elementor-widget-icon-box animated opal-move-up" data-id="ce6842f-<?php echo $index; ?>" data-element_type="widget" data-settings='{"_animation":"opal-move-up"}' data-widget_type="icon-box.default">
                                    <div class="elementor-widget-container">
                                       <div class="elementor-icon-box-wrapper">
                                          <?php if (!empty($value['icon_class'])) : ?>
                                          <div class="elementor-icon-box-icon">
                                             <span class="elementor-icon elementor-animation-">
                                             <i aria-hidden="true" class="easto-icon- <?php echo esc_attr($value['icon_class']); ?>"></i>
                                             </span>
                                          </div>
                                          <?php endif; ?>
                                          <div class="elementor-icon-box-content">
                                             <?php if (!empty($value['title'])) : ?>
                                             <h5 class="elementor-icon-box-title">
                                                <span><?php echo esc_html($value['title']); ?></span>
                                             </h5>
                                             <?php endif; ?>
                                             <?php if (!empty($value['description'])) : ?>
                                             <p class="elementor-icon-box-description">
                                                <?php echo esc_html($value['description']); ?>
                                             </p>
                                             <?php endif; ?>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php endforeach; ?>
                           </div>
                        </div>
                        <?php endif; ?>
                        <!-- Background Section -->
                        <?php if ($background_image) : ?>
                        <div class="elementor-element elementor-element-19ddd38 e-con-full e-flex e-con e-parent e-lazyloaded" data-id="19ddd38" data-element_type="container" >
                           <img src="<?php echo esc_url($background_image); ?>" alt="">
                        </div>
                        <?php endif; ?>
                        <!-- Team Section -->
                        <?php if ($team_members) : ?>
                        <div class="elementor-element elementor-element-82a602e e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="82a602e" data-element_type="container">
                           <div class="e-con-inner col-full">
                              <?php if ($team_subtitle) : ?>
                              <div class="elementor-element elementor-element-bcda7de e-transform animated-fast elementor-widget elementor-widget-text-editor animated opal-move-up" data-id="bcda7de" data-element_type="widget" data-settings='{"_animation":"opal-move-up"}' data-widget_type="text-editor.default">
                                 <div class="elementor-widget-container">
                                    <?php echo esc_html($team_subtitle); ?>
                                 </div>
                              </div>
                              <?php endif; ?>
                              <?php if ($team_title) : ?>
                              <div class="elementor-element elementor-element-a4536f3 animated-fast elementor-widget elementor-widget-heading animated opal-move-up" data-id="a4536f3" data-element_type="widget" data-settings='{"_animation":"opal-move-up"}' data-widget_type="heading.default">
                                 <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title elementor-size-default"><?php echo esc_html($team_title); ?></h2>
                                 </div>
                              </div>
                              <?php endif; ?>
                              <div class="elementor-element elementor-element-52dbac9 animated-fast elementor-widget-mobile__width-inherit elementor-widget elementor-widget-easto-team-box animated opal-move-up" data-id="52dbac9" data-element_type="widget" data-settings='{"_animation":"opal-move-up"}' data-widget_type="easto-team-box.default">
                                 <div class="elementor-widget-container">
                                    <div class="elementor-teambox-item-wrapper">
                                       <div class="elementor-teambox-wrapper-inner">
                                          <div class="d-grid">
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
                        <?php endif; ?>
                        <!-- Statistics Section -->
                        <?php if ($stats_counters) : ?>
                        <div class="elementor-element elementor-element-8c98de4 e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="8c98de4" data-element_type="container">
                           <div class="e-con-inner col-full">
                              <?php foreach ($stats_counters as $index => $stat) : ?>
                              <div class="elementor-element elementor-element-87d59bf-<?php echo $index; ?> e-con-full e-flex e-con e-child justify-content-md-center" data-id="87d59bf-<?php echo $index; ?>" data-element_type="container">
                                 <div class="elementor-element elementor-element-ba64156 elementor-widget__width-inherit elementor-widget-laptop__width-auto elementor-widget elementor-widget-easto-counter" data-id="ba64156-<?php echo $index; ?>" data-element_type="widget" data-widget_type="easto-counter.default">
                                    <div class="elementor-widget-container">
                                       <div class="elementor-counter">
                                          <div class="elementor-counter-number-wrapper">
                                             <span class="elementor-counter-number-prefix"></span>
                                             <span class="elementor-odometer-number odometer odometer-auto-theme" data-count="<?php echo esc_attr($stat['number']); ?>">
                                                <div class="odometer-inside">
                                                   <?php
                                                      $stat_str = (string)$stat['number'];
                                                      for ($i = 0; $i < strlen($stat_str); $i++) :
                                                          $digit = $stat_str[$i];
                                                      ?>
                                                   <span class="odometer-digit">
                                                   <span class="odometer-digit-spacer">8</span>
                                                   <span class="odometer-digit-inner">
                                                   <span class="odometer-ribbon">
                                                   <span class="odometer-ribbon-inner">
                                                   <span class="odometer-value"><?php echo esc_html($digit); ?></span>
                                                   </span>
                                                   </span>
                                                   </span>
                                                   </span>
                                                   <?php endfor; ?>
                                                </div>
                                             </span>
                                             <span class="elementor-counter-number-suffix"><?php echo esc_html($stat['suffix']); ?></span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <?php if (!empty($stat['label'])) : ?>
                                 <div class="elementor-element elementor-element-d67877d elementor-absolute elementor-widget elementor-widget-heading" data-id="d67877d-<?php echo $index; ?>" data-element_type="widget" data-settings='{"_position":"absolute"}' data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                       <h6 class="elementor-heading-title elementor-size-default mb-0"><?php echo esc_html($stat['label']); ?></h6>
                                    </div>
                                 </div>
                                 <?php endif; ?>
                              </div>
                              <?php endforeach; ?>
                           </div>
                        </div>
                        <?php endif; ?>
                     </div>
                  </div>
               </article>
            </main>
         </div>
   </div>
</div>