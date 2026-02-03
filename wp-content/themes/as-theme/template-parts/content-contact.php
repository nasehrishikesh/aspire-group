<?php
/**
 * Template part for displaying Contact page content
 *
 * @package AS_Theme
 */

// Get ACF fields
$hero_image_1 = get_field('contact_hero_image_1');
$hero_image_2 = get_field('contact_hero_image_2');
$form_title = get_field('contact_form_title');
$form_description = get_field('contact_form_description');
$form_shortcode = get_field('contact_form_shortcode');
$building_address_label = get_field('contact_building_address_label');
$building_address = get_field('contact_building_address');
$leasing_office_label = get_field('contact_leasing_office_label');
$leasing_office = get_field('contact_leasing_office');
$general_inquiries_label = get_field('contact_general_inquiries_label');
$contact_phone = get_field('contact_phone');
$contact_email = get_field('contact_email');
$map_url = get_field('contact_map_url');
$show_map = get_field('contact_show_map');
?>
<div id="page" class="hfeed site elementor-contact">
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
   <div id="content" class="site-content clear mb-0 mt-0" tabindex="-1">
         <div id="primary">
            <main id="main" class="site-main">
              <article id="post-62" class="post-62 page type-page status-publish hentry">
                  <div class="entry-content">
                     <div data-elementor-type="wp-page" data-elementor-id="62" class="elementor elementor-62">
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

                        <!-- Contact Form Section -->
                        <div class="elementor-element elementor-element-a807940 e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="a807940" data-element_type="container">
                           <div class="e-con-inner">
                              <div class="elementor-element elementor-element-b2b2c61 e-con-full e-flex e-con e-child" data-id="b2b2c61" data-element_type="container">
                                 <?php if ($form_title) : ?>
                                 <div class="elementor-element elementor-element-688e351 elementor-widget elementor-widget-heading" data-id="688e351" data-element_type="widget" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                       <h3 class="elementor-heading-title elementor-size-default"><?php echo esc_html($form_title); ?></h3>
                                    </div>
                                 </div>
                                 <?php endif; ?>

                                 <?php if ($form_description) : ?>
                                 <div class="elementor-element elementor-element-31d4bf0 elementor-widget elementor-widget-text-editor" data-id="31d4bf0" data-element_type="widget" data-widget_type="text-editor.default">
                                    <div class="elementor-widget-container">
                                       <?php echo esc_html($form_description); ?>
                                    </div>
                                 </div>
                                 <?php endif; ?>

                                 <?php if ($form_shortcode) : ?>
                                 <div class="elementor-element elementor-element-cf33a52 elementor-widget elementor-widget-easto-contactform" data-id="cf33a52" data-element_type="widget" data-widget_type="easto-contactform.default">
                                    <div class="elementor-widget-container">
                                       <?php echo do_shortcode($form_shortcode); ?>
                                    </div>
                                 </div>
                                 <?php endif; ?>
                              </div>
                              <div class="elementor-element elementor-element-738760d e-con-full e-flex e-con e-child" data-id="738760d" data-element_type="container">
                                 <?php if ($building_address_label) : ?>
                                 <div class="elementor-element elementor-element-7d6bd2c elementor-widget elementor-widget-heading" data-id="7d6bd2c" data-element_type="widget" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                       <div class="elementor-heading-title elementor-size-default"><?php echo esc_html($building_address_label); ?></div>
                                    </div>
                                 </div>
                                 <?php endif; ?>

                                 <?php if ($building_address) : ?>
                                 <div class="elementor-element elementor-element-630b872 elementor-widget elementor-widget-heading" data-id="630b872" data-element_type="widget" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                       <h5 class="elementor-heading-title elementor-size-default"><?php echo nl2br(esc_html($building_address)); ?></h5>
                                    </div>
                                 </div>
                                 <?php endif; ?>

                                 <?php if ($leasing_office_label) : ?>
                                 <div class="elementor-element elementor-element-5ac0055 elementor-widget elementor-widget-heading" data-id="5ac0055" data-element_type="widget" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                       <div class="elementor-heading-title elementor-size-default"><?php echo esc_html($leasing_office_label); ?></div>
                                    </div>
                                 </div>
                                 <?php endif; ?>

                                 <?php if ($leasing_office) : ?>
                                 <div class="elementor-element elementor-element-e3ae0b6 elementor-widget elementor-widget-heading" data-id="e3ae0b6" data-element_type="widget" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                       <h5 class="elementor-heading-title elementor-size-default"><?php echo nl2br(esc_html($leasing_office)); ?></h5>
                                    </div>
                                 </div>
                                 <?php endif; ?>

                                 <?php if ($general_inquiries_label) : ?>
                                 <div class="elementor-element elementor-element-41330fd elementor-widget elementor-widget-heading" data-id="41330fd" data-element_type="widget" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                       <div class="elementor-heading-title elementor-size-default"><?php echo esc_html($general_inquiries_label); ?></div>
                                    </div>
                                 </div>
                                 <?php endif; ?>

                                 <?php if ($contact_phone || $contact_email) : ?>
                                 <div class="elementor-element elementor-element-c00bcd8 elementor-widget elementor-widget-heading" data-id="c00bcd8" data-element_type="widget" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                       <h5 class="elementor-heading-title elementor-size-default">
                                          <?php if ($contact_phone) : ?><?php echo esc_html($contact_phone); ?><?php endif; ?>
                                          <?php if ($contact_phone && $contact_email) : ?><br><?php endif; ?>
                                          <?php if ($contact_email) : ?><span style="text-decoration: underline;"><?php echo esc_html($contact_email); ?></span><?php endif; ?>
                                       </h5>
                                    </div>
                                 </div>
                                 <?php endif; ?>
                              </div>
                           </div>
                        </div>
                        <?php if ($show_map && $map_url) : ?>
                        <div class="elementor-element elementor-element-a7f43ee e-con-full e-flex e-con e-parent" data-id="a7f43ee" data-element_type="container">
                           <div class="elementor-element elementor-element-c401f92 elementor-widget elementor-widget-google_maps" data-id="c401f92" data-element_type="widget" data-widget_type="google_maps.default">
                              <div class="elementor-widget-container">
                                 <style>/*! elementor - v3.22.0 - 17-06-2024 */
                                    .elementor-widget-google_maps .elementor-widget-container{overflow:hidden}.elementor-widget-google_maps .elementor-custom-embed{line-height:0}.elementor-widget-google_maps iframe{height:300px}
                                 </style>
                                 <div class="elementor-custom-embed">
                                    <iframe loading="lazy" src="<?php echo esc_url($map_url); ?>" title="Google Map" aria-label="Google Map"></iframe>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php endif; ?>
                     </div>
                  </div>
                  <!-- .entry-content -->
               </article>
            </main>
         </div>
   </div>
</div>
