<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="profile" href="//gmpg.org/xfn/11">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> style="--scroll-bar: 15px" data-elementor-device-mode="desktop">

<div id="page" class="hfeed site">
    <header id="masthead" itemscope="itemscope" itemtype="https://schema.org/WPHeader">
        <p class="main-title bhf-hidden" itemprop="headline"><a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
        <div data-elementor-type="wp-post" data-elementor-id="46" class="elementor elementor-46 header-absolute">
            <div class="elementor-element elementor-element-73008ba e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="73008ba" data-element_type="container">
                <div class="e-con-inner">
                    <div class="elementor-element elementor-element-4e6f65c elementor-widget elementor-widget-site-logo" data-id="4e6f65c" data-element_type="widget" data-widget_type="site-logo.default">
                        <div class="elementor-widget-container">
                            <div class="hfe-site-logo">
                                <a data-elementor-open-lightbox="" class="elementor-clickable" href="<?php echo esc_url(home_url('/')); ?>">
                                    <div class="hfe-site-logo-set">
                                        <div class="hfe-site-logo-container">
                                            <?php
                                            $header_logo = get_theme_mod('header_logo');
                                            if ($header_logo) : ?>
                                                <img class="hfe-site-logo-img elementor-animation-" src="<?php echo esc_url($header_logo); ?>" alt="<?php bloginfo('name'); ?>">
                                            <?php elseif (has_custom_logo()) : ?>
                                                <?php the_custom_logo(); ?>
                                            <?php else : ?>
                                                <img class="hfe-site-logo-img elementor-animation-" src="<?php echo esc_url(AS_THEME_URI . '/assets/images/logo_white.svg'); ?>" alt="<?php bloginfo('name'); ?>">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="elementor-element elementor-element-14ff079 e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="14ff079" data-element_type="container">
                <div class="e-con-inner">
                    <!-- Mobile Menu Button -->
                    <div class="elementor-element elementor-element-3c75054 elementor-hidden-desktop elementor-hidden-laptop elementor-hidden-tablet_extra elementor-widget-tablet__width-initial elementor-widget-mobile_extra__width-initial easto-canvas-menu-layout-2 elementor-widget elementor-widget-easto-menu-canvas" data-id="3c75054" data-element_type="widget" data-widget_type="easto-menu-canvas.default">
                        <div class="elementor-widget-container">
                            <div class="elementor-canvas-menu-wrapper">
                                <a href="#" class="menu-mobile-nav-button">
                                    <span class="toggle-text screen-reader-text"><?php esc_html_e('Menu', 'as-theme'); ?></span>
                                    <div class="easto-icon">
                                        <i class="easto-icon-bars"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Button Popup -->
                    <div class="elementor-element elementor-element-7b08c31 elementor-widget__width-initial elementor-widget elementor-widget-easto-button-popup" data-id="7b08c31" data-element_type="widget" data-widget_type="easto-button-popup.default">
                        <div class="elementor-widget-container">
                            <div class="easto-button-popup">
                                <a class="button-popup elementor-button" href="#easto-button-popup-7b08c31" role="button" data-effect="mfp-slide-bottom-special">
                                    <span class="elementor-button-content-wrapper">
                                        <span class="line-container">
                                            <span class="line line1"></span>
                                            <span class="line line2"></span>
                                        </span>
                                    </span>
                                </a>
                            </div>
                            <div class="mfp-hide button-popup-content button-popup-content-7b08c31" id="easto-button-popup-7b08c31">
                                <div class="button-popup-content-inner">
                                    <button title="<?php esc_attr_e('Close (Esc)', 'as-theme'); ?>" type="button" class="mfp-close">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-close-button-icon elementor-align-icon-">
                                                <i aria-hidden="true" class="easto-icon- easto-icon-times"></i>
                                            </span>
                                            <span class="elementor-close-button-text"><?php esc_html_e('Close', 'as-theme'); ?></span>
                                        </span>
                                    </button>
                                    <div data-elementor-type="container" data-elementor-id="2295" class="elementor elementor-2295">
                                        <div class="elementor-element elementor-element-7a9d298 e-flex e-con-boxed e-con e-parent" data-id="7a9d298" data-element_type="container">
                                            <div class="e-con-inner">
                                                <div class="elementor-element elementor-element-c6a517f elementor-widget elementor-widget-site-logo" data-id="c6a517f" data-element_type="widget" data-widget_type="site-logo.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="hfe-site-logo">
                                                            <a data-elementor-open-lightbox="" class="elementor-clickable" href="<?php echo esc_url(home_url('/')); ?>">
                                                                <div class="hfe-site-logo-set">
                                                                    <div class="hfe-site-logo-container">
                                                                        <?php
                                                                        $header_logo = get_theme_mod('header_logo');
                                                                        if ($header_logo) : ?>
                                                                            <img class="hfe-site-logo-img elementor-animation-" src="<?php echo esc_url($header_logo); ?>" alt="<?php bloginfo('name'); ?>">
                                                                        <?php else : ?>
                                                                            <img class="hfe-site-logo-img elementor-animation-" src="<?php echo esc_url(AS_THEME_URI . '/assets/images/logo_white.svg'); ?>" alt="<?php bloginfo('name'); ?>">
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-1181c90 e-flex e-con-boxed e-con e-child" data-id="1181c90" data-element_type="container">
                                                    <div class="e-con-inner">
                                                        <div class="elementor-element elementor-element-d5d8f3d showcase_layout-1 elementor-widget elementor-widget-easto-link-showcase" data-id="d5d8f3d" data-element_type="widget" data-widget_type="easto-link-showcase.default">
                                                            <div class="elementor-widget-container">
                                                                <?php
                                                                if (has_nav_menu('hamburger-main')) {
                                                                    as_theme_render_hamburger_showcase_menu();
                                                                } else {
                                                                    // Fallback static menu when no menu assigned
                                                                    ?>
                                                                    <div class="elementor-link-showcase-wrapper">
                                                                        <div class="elementor-link-showcase-inner" role="tablist">
                                                                            <div class="link-showcase-item link-showcase-title-wrapper">
                                                                                <div class="link-showcase-title-inner">
                                                                                    <div id="elementor-link-showcase-title-1" class="elementor-link-showcase-title elementor-active" data-tab="1" role="tab">
                                                                                        <div class="link-showcase-title">
                                                                                            <a href="#"><span data-name="Building">Building</span></a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div id="elementor-link-showcase-title-2" class="elementor-link-showcase-title" data-tab="2" role="tab">
                                                                                        <div class="link-showcase-title">
                                                                                            <a href="#"><span data-name="Residences">Residences</span></a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div id="elementor-link-showcase-title-3" class="elementor-link-showcase-title" data-tab="3" role="tab">
                                                                                        <div class="link-showcase-title">
                                                                                            <a href="#"><span data-name="Amenities">Amenities</span></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="link-showcase-item link-showcase-content-wrapper">
                                                                                <div class="link-showcase-content-inner">
                                                                                    <div id="elementor-link-showcase-content-1" class="elementor-link-showcase-content elementor-active" data-tab="1" role="tab">
                                                                                        <img width="440" height="600" src="<?php echo esc_url(AS_THEME_URI . '/assets/images/popupmenu_img1.jpg'); ?>" class="attachment-full size-full" alt="">
                                                                                    </div>
                                                                                    <div id="elementor-link-showcase-content-2" class="elementor-link-showcase-content" data-tab="2" role="tab">
                                                                                        <img width="440" height="600" src="<?php echo esc_url(AS_THEME_URI . '/assets/images/popupmenu_img2.jpg'); ?>" class="attachment-full size-full" alt="">
                                                                                    </div>
                                                                                    <div id="elementor-link-showcase-content-3" class="elementor-link-showcase-content" data-tab="3" role="tab">
                                                                                        <img width="440" height="600" src="<?php echo esc_url(AS_THEME_URI . '/assets/images/popupmenu_img3.jpg'); ?>" class="attachment-full size-full" alt="">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-670840f elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="670840f" data-element_type="widget" data-widget_type="icon-list.default">
                                                            <div class="elementor-widget-container">
                                                                <?php
                                                                if (has_nav_menu('hamburger-secondary')) {
                                                                    wp_nav_menu(array(
                                                                        'theme_location' => 'hamburger-secondary',
                                                                        'menu_class'     => 'elementor-icon-list-items',
                                                                        'container'      => false,
                                                                        'walker'         => new AS_Theme_Walker_Hamburger_Secondary(),
                                                                    ));
                                                                } else {
                                                                    // Fallback static menu
                                                                    ?>
                                                                    <ul class="elementor-icon-list-items">
                                                                        <li class="elementor-icon-list-item">
                                                                            <a href="#">
                                                                                <span class="elementor-icon-list-text"><?php esc_html_e('About', 'as-theme'); ?></span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="elementor-icon-list-item">
                                                                            <a href="#">
                                                                                <span class="elementor-icon-list-text"><?php esc_html_e('Blog', 'as-theme'); ?></span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="elementor-icon-list-item">
                                                                            <a href="#">
                                                                                <span class="elementor-icon-list-text"><?php esc_html_e('Contact', 'as-theme'); ?></span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main Navigation -->
                    <div class="elementor-element elementor-element-f8a447c elementor-hidden-tablet elementor-hidden-mobile_extra elementor-hidden-mobile elementor-widget-mobile_extra__width-initial elementor-widget elementor-widget-easto-nav-menu" data-id="f8a447c" data-element_type="widget" data-widget_type="easto-nav-menu.default">
                        <div class="elementor-widget-container">
                            <div class="elementor-nav-menu-wrapper">
                                <nav class="main-navigation">
                                    <div class="primary-navigation">
                                        <?php
                                        if (has_nav_menu('primary')) {
                                            wp_nav_menu(array(
                                                'theme_location' => 'primary',
                                                'menu_class'     => 'menu',
                                                'container'      => false,
                                                'walker'         => new AS_Theme_Walker_Nav_Menu(),
                                            ));
                                        } else {
                                            // Fallback menu
                                            ?>
                                            <ul class="menu">
                                                <li class="menu-item menu-item-home current-menu-item">
                                                    <a href="<?php echo esc_url(home_url('/')); ?>"><span class="menu-title" data-name="Home"><span>Home</span></span></a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="#"><span class="menu-title" data-name="Building"><span>Building</span></span></a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="#"><span class="menu-title" data-name="Apartments"><span>Apartments</span></span></a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="#"><span class="menu-title" data-name="Amenities"><span>Amenities</span></span></a>
                                                </li>
                                                <li class="menu-item menu-item-has-children">
                                                    <a href="#"><span class="menu-title" data-name="Pages"><span>Pages</span></span></a>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item"><a href="#"><span class="menu-title" data-name="Residences"><span>Residences</span></span></a></li>
                                                        <li class="menu-item"><a href="#"><span class="menu-title" data-name="Neighborhood"><span>Neighborhood</span></span></a></li>
                                                        <li class="menu-item"><a href="#"><span class="menu-title" data-name="About Us"><span>About Us</span></span></a></li>
                                                        <li class="menu-item"><a href="#"><span class="menu-title" data-name="Gallery"><span>Gallery</span></span></a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="#"><span class="menu-title" data-name="Contact"><span>Contact</span></span></a>
                                                </li>
                                            </ul>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <!-- Schedule Tour Button -->
                    <div class="elementor-element elementor-element-8feb59a elementor-widget elementor-widget-easto-button-popup" data-id="8feb59a" data-element_type="widget" data-widget_type="easto-button-popup.default">
                        <div class="elementor-widget-container">
                            <div class="easto-button-popup">
                                <a class="button-popup elementor-button" href="#easto-button-popup-8feb59a" role="button" data-effect="mfp-zoom-in">
                                    <span class="elementor-button-content-wrapper">
                                        <span class="elementor-button-icon elementor-align-icon-right">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                                <path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" class="btn-icon__icon"></path>
                                                <path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" class="btn-icon__icon"></path>
                                            </svg>
                                        </span>
                                        <span class="elementor-button-text"><?php esc_html_e('schedule a tour', 'as-theme'); ?></span>
                                    </span>
                                </a>
                            </div>
                            <div class="mfp-hide button-popup-content button-popup-content-8feb59a" id="easto-button-popup-8feb59a">
                                <div class="button-popup-content-inner">
                                    <button title="<?php esc_attr_e('Close (Esc)', 'as-theme'); ?>" type="button" class="mfp-close">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-close-button-icon elementor-align-icon-left">
                                                <i aria-hidden="true" class="easto-icon- easto-icon-times"></i>
                                            </span>
                                        </span>
                                    </button>
                                    <div data-elementor-type="container" data-elementor-id="1782" class="elementor elementor-1782">
                                        <div class="elementor-element elementor-element-8c8dd6d e-flex e-con-boxed e-con e-parent" data-id="8c8dd6d" data-element_type="container">
                                            <div class="e-con-inner">
                                                <div class="elementor-element elementor-element-b46281a elementor-widget elementor-widget-heading" data-id="b46281a" data-element_type="widget" data-widget_type="heading.default">
                                                    <div class="elementor-widget-container">
                                                        <h4 class="elementor-heading-title elementor-size-default"><?php esc_html_e('Schedule a tour', 'as-theme'); ?></h4>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-f646522 elementor-widget elementor-widget-easto-contactform" data-id="f646522" data-element_type="widget" data-widget_type="easto-contactform.default">
                                                    <div class="elementor-widget-container">
                                                        <?php
                                                        $schedule_form_id = get_theme_mod('schedule_tour_form_id');
                                                        if ($schedule_form_id && shortcode_exists('contact-form-7')) {
                                                            echo do_shortcode('[contact-form-7 id="' . intval($schedule_form_id) . '" title="Schedule a Tour"]');
                                                        } else {
                                                            // Fallback static form
                                                            ?>
                                                            <div class="wpcf7 js" id="wpcf7-schedule-tour" lang="en-US" dir="ltr">
                                                                <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="wpcf7-form init" aria-label="<?php esc_attr_e('Contact form', 'as-theme'); ?>" novalidate="novalidate" data-status="init">
                                                                    <input type="hidden" name="action" value="as_theme_schedule_tour">
                                                                    <?php wp_nonce_field('as_theme_schedule_tour', 'schedule_tour_nonce'); ?>
                                                                    <div class="wpcf7-form">
                                                                        <div class="column-name">
                                                                            <p><input size="40" maxlength="80" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" placeholder="<?php esc_attr_e('Name *', 'as-theme'); ?>" value="" type="text" name="your-name"></p>
                                                                        </div>
                                                                        <div class="column-email">
                                                                            <p><input size="40" maxlength="80" class="wpcf7-form-control wpcf7-email wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-email" aria-required="true" placeholder="<?php esc_attr_e('Email *', 'as-theme'); ?>" value="" type="email" name="your-email"></p>
                                                                        </div>
                                                                        <div class="column-number">
                                                                            <p><input size="40" maxlength="80" class="wpcf7-form-control wpcf7-tel wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-tel" aria-required="true" placeholder="<?php esc_attr_e('Phone *', 'as-theme'); ?>" value="" type="tel" name="your-number"></p>
                                                                        </div>
                                                                        <div class="column-date">
                                                                            <p><input class="wpcf7-form-control wpcf7-date wpcf7-validates-as-required wpcf7-validates-as-date" aria-required="true" value="" type="date" name="your-date"></p>
                                                                        </div>
                                                                        <div class="column-time">
                                                                            <p>
                                                                                <select class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required" id="time" aria-required="true" name="your-time">
                                                                                    <option value="7:00 AM">7:00 AM</option>
                                                                                    <option value="9:00 AM">9:00 AM</option>
                                                                                    <option value="11:00 AM">11:00 AM</option>
                                                                                    <option value="1:00 PM">1:00 PM</option>
                                                                                    <option value="3:00 PM">3:00 PM</option>
                                                                                    <option value="5:00 PM">5:00 PM</option>
                                                                                </select>
                                                                            </p>
                                                                        </div>
                                                                        <div class="column-message">
                                                                            <p><textarea cols="40" rows="3" maxlength="400" class="wpcf7-form-control wpcf7-textarea" placeholder="<?php esc_attr_e('Message', 'as-theme'); ?>" name="your-message"></textarea></p>
                                                                        </div>
                                                                        <div class="wpcf7-button">
                                                                            <p>
                                                                                <button class="wpcf7-form-control wpcf7-submit" type="submit"><?php esc_html_e('submit', 'as-theme'); ?>
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                                                                        <path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" class="btn-icon__icon"></path>
                                                                                        <path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" class="btn-icon__icon"></path>
                                                                                    </svg>
                                                                                </button>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="breadcrumb-wrap"><div class="breadcrumb-overlay"></div></div>
    <div id="content" class="site-content-page clear" tabindex="-1">
        <div class="col-fluid">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
