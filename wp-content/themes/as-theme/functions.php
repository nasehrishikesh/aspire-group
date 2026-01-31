<?php
/**
 * AS Theme functions and definitions
 *
 * @package AS_Theme
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Define theme constants
 */
define('AS_THEME_VERSION', '1.0.0');
define('AS_THEME_DIR', get_template_directory());
define('AS_THEME_URI', get_template_directory_uri());

/**
 * Include Contact Form 7 integration
 */
if (file_exists(AS_THEME_DIR . '/inc/contact-form-7-templates.php')) {
    require_once AS_THEME_DIR . '/inc/contact-form-7-templates.php';
}

/**
 * Include ACF Fields registration
 */
if (file_exists(AS_THEME_DIR . '/inc/acf-fields.php')) {
    require_once AS_THEME_DIR . '/inc/acf-fields.php';
}

/**
 * Theme setup
 */
function as_theme_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary'          => __('Primary Menu', 'as-theme'),
        'hamburger-main'   => __('Hamburger Main Menu', 'as-theme'),
        'hamburger-secondary' => __('Hamburger Secondary Menu', 'as-theme'),
        'mobile'           => __('Mobile Menu', 'as-theme'),
        'footer-explore'   => __('Footer Explore Menu', 'as-theme'),
        'footer-links'     => __('Footer Links Menu', 'as-theme'),
    ));

    // Add support for HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Set content width
    if (!isset($content_width)) {
        $content_width = 1200;
    }
}
add_action('after_setup_theme', 'as_theme_setup');

/**
 * Enqueue styles
 */
function as_theme_enqueue_styles() {
    // Main theme stylesheet (for WordPress recognition)
    wp_enqueue_style('as-theme-style', get_stylesheet_uri(), array(), AS_THEME_VERSION);

    // CSS Files from assets
    wp_enqueue_style('as-hfe-widgets', AS_THEME_URI . '/assets/css/hfe-widgets-style.css', array(), AS_THEME_VERSION);
    wp_enqueue_style('as-gutenberg-blocks', AS_THEME_URI . '/assets/css/gutenberg-blocks.css', array(), AS_THEME_VERSION);
    // wp_enqueue_style('as-contact-form-7', AS_THEME_URI . '/assets/css/contact-form-7.css', array(), AS_THEME_VERSION);
    wp_enqueue_style('as-opal-demo', AS_THEME_URI . '/assets/css/opal-demo.css', array(), AS_THEME_VERSION);
    wp_enqueue_style('as-hfe-style', AS_THEME_URI . '/assets/css/hfe-style.css', array(), AS_THEME_VERSION);
    wp_enqueue_style('as-elementor-frontend', AS_THEME_URI . '/assets/css/elementor-frontend.css', array(), AS_THEME_VERSION);
    wp_enqueue_style('as-swiper', AS_THEME_URI . '/assets/css/swiper.min.css', array(), AS_THEME_VERSION);
    wp_enqueue_style('as-elementor-post-4', AS_THEME_URI . '/assets/css/elementor-post-4.css', array(), AS_THEME_VERSION);
    wp_enqueue_style('as-elementor-global', AS_THEME_URI . '/assets/css/elementor-global.css', array(), AS_THEME_VERSION);
    wp_enqueue_style('as-elementor-post-36', AS_THEME_URI . '/assets/css/elementor-post-36.css', array(), AS_THEME_VERSION);
    wp_enqueue_style('as-elementor-post-46', AS_THEME_URI . '/assets/css/elementor-post-46.css', array(), AS_THEME_VERSION);
    wp_enqueue_style('as-elementor-post-34', AS_THEME_URI . '/assets/css/elementor-post-34.css', array(), AS_THEME_VERSION);
    wp_enqueue_style('as-easto-style', AS_THEME_URI . '/assets/css/easto-style.css', array(), AS_THEME_VERSION);
    wp_enqueue_style('as-elementor-post-3758', AS_THEME_URI . '/assets/css/elementor-post-3758.css', array(), AS_THEME_VERSION);
    wp_enqueue_style('as-easto-elementor', AS_THEME_URI . '/assets/css/easto-elementor.css', array(), AS_THEME_VERSION);
    wp_enqueue_style('as-home', AS_THEME_URI . '/assets/css/home.css', array(), AS_THEME_VERSION);

    // Additional CSS files loaded in footer originally
    wp_enqueue_style('as-elementor-post-2295', AS_THEME_URI . '/assets/css/elementor-post-2295.css', array(), AS_THEME_VERSION);
    wp_enqueue_style('as-magnific-popup', AS_THEME_URI . '/assets/css/magnific-popup.css', array(), AS_THEME_VERSION);
    wp_enqueue_style('as-elementor-post-1782', AS_THEME_URI . '/assets/css/elementor-post-1782.css', array(), AS_THEME_VERSION);
    wp_enqueue_style('as-e-animations', AS_THEME_URI . '/assets/css/e-animations.css', array(), AS_THEME_VERSION);
    wp_enqueue_style('as-widget-icon-list', AS_THEME_URI . '/assets/css/widget-icon-list.css', array(), AS_THEME_VERSION);
    wp_enqueue_style('as-widget-icon-box', AS_THEME_URI . '/assets/css/widget-icon-box.css', array(), AS_THEME_VERSION);

    // Helper utility classes (Bootstrap-like)
    wp_enqueue_style('as-helpers', AS_THEME_URI . '/assets/css/helpers.css', array(), AS_THEME_VERSION);
}
add_action('wp_enqueue_scripts', 'as_theme_enqueue_styles');

/**
 * Enqueue scripts
 */
function as_theme_enqueue_scripts() {
    // jQuery is already included in WordPress
    wp_enqueue_script('jquery');

    // Vimeo Player API
    wp_enqueue_script('as-vimeo-player', AS_THEME_URI . '/assets/js/vimeo-player.js', array(), AS_THEME_VERSION, false);

    // jQuery Migrate
    wp_enqueue_script('as-jquery-migrate', AS_THEME_URI . '/assets/js/jquery-migrate.min.js', array('jquery'), AS_THEME_VERSION, true);

    // Contact Form 7 scripts
    // wp_enqueue_script('as-swv', AS_THEME_URI . '/assets/js/swv.js', array(), AS_THEME_VERSION, true);
    // wp_enqueue_script('as-contact-form-7', AS_THEME_URI . '/assets/js/contact-form-7.js', array('jquery', 'as-swv'), AS_THEME_VERSION, true);

    // Underscore and WP Util
    wp_enqueue_script('underscore');
    wp_enqueue_script('wp-util');

    // Theme scripts
    wp_enqueue_script('as-home', AS_THEME_URI . '/assets/js/home.js', array('jquery'), AS_THEME_VERSION, true);
    wp_enqueue_script('as-easto-main', AS_THEME_URI . '/assets/js/easto-main.min.js', array('jquery'), AS_THEME_VERSION, true);
    wp_enqueue_script('as-imagesloaded', AS_THEME_URI . '/assets/js/imagesloaded.min.js', array('jquery'), AS_THEME_VERSION, true);
    wp_enqueue_script('as-skip-link-focus', AS_THEME_URI . '/assets/js/skip-link-focus-fix.min.js', array(), AS_THEME_VERSION, true);
    wp_enqueue_script('as-scroll-smooth', AS_THEME_URI . '/assets/js/scroll-smooth.min.js', array('jquery'), AS_THEME_VERSION, true);
    wp_enqueue_script('as-search-popup', AS_THEME_URI . '/assets/js/search-popup.min.js', array('jquery'), AS_THEME_VERSION, true);
    wp_enqueue_script('as-sticky-kit', AS_THEME_URI . '/assets/js/jquery.sticky-kit.min.js', array('jquery'), AS_THEME_VERSION, true);
    wp_enqueue_script('as-text-editor', AS_THEME_URI . '/assets/js/text-editor.min.js', array('jquery'), AS_THEME_VERSION, true);
    wp_enqueue_script('as-nav-mobile', AS_THEME_URI . '/assets/js/nav-mobile.min.js', array('jquery'), AS_THEME_VERSION, true);
    wp_enqueue_script('as-megamenu-frontend', AS_THEME_URI . '/assets/js/megamenu-frontend.js', array('jquery'), AS_THEME_VERSION, true);
    wp_enqueue_script('as-login', AS_THEME_URI . '/assets/js/login.js', array('jquery'), AS_THEME_VERSION, true);

    // Elementor scripts
    wp_enqueue_script('as-elementor-webpack-runtime', AS_THEME_URI . '/assets/js/elementor-webpack-runtime.min.js', array(), AS_THEME_VERSION, true);
    wp_enqueue_script('as-elementor-frontend-modules', AS_THEME_URI . '/assets/js/elementor-frontend-modules.min.js', array('jquery'), AS_THEME_VERSION, true);
    wp_enqueue_script('as-waypoints', AS_THEME_URI . '/assets/js/waypoints.min.js', array('jquery'), AS_THEME_VERSION, true);
    wp_enqueue_script('as-jquery-ui-core', AS_THEME_URI . '/assets/js/jquery-ui-core.min.js', array('jquery'), AS_THEME_VERSION, true);
    wp_enqueue_script('as-elementor-frontend', AS_THEME_URI . '/assets/js/elementor-frontend.min.js', array('jquery'), AS_THEME_VERSION, true);

    // Widget scripts
    wp_enqueue_script('as-link-showcase', AS_THEME_URI . '/assets/js/link-showcase.min.js', array('jquery'), AS_THEME_VERSION, true);
    wp_enqueue_script('as-button-popup', AS_THEME_URI . '/assets/js/button-popup.min.js', array('jquery'), AS_THEME_VERSION, true);
    wp_enqueue_script('as-magnific-popup', AS_THEME_URI . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), AS_THEME_VERSION, true);
    wp_enqueue_script('as-nav-menu', AS_THEME_URI . '/assets/js/nav-menu.min.js', array('jquery'), AS_THEME_VERSION, true);
    wp_enqueue_script('as-jquery-numerator', AS_THEME_URI . '/assets/js/jquery-numerator.min.js', array('jquery'), AS_THEME_VERSION, true);
    wp_enqueue_script('as-panoramic-views', AS_THEME_URI . '/assets/js/panoramic-views.min.js', array('jquery'), AS_THEME_VERSION, true);
    wp_enqueue_script('as-apartments', AS_THEME_URI . '/assets/js/apartments.min.js', array('jquery'), AS_THEME_VERSION, true);
    wp_enqueue_script('as-easto-swiper', AS_THEME_URI . '/assets/js/easto-swiper.min.js', array('jquery'), AS_THEME_VERSION, true);
    wp_enqueue_script('as-places-list', AS_THEME_URI . '/assets/js/places-list.min.js', array('jquery'), AS_THEME_VERSION, true);
    wp_enqueue_script('as-easto-elementor-frontend', AS_THEME_URI . '/assets/js/easto-elementor-frontend.min.js', array('jquery'), AS_THEME_VERSION, true);
    wp_enqueue_script('as-elementor-sticky', AS_THEME_URI . '/assets/js/elementor-sticky.js', array('jquery'), AS_THEME_VERSION, true);
    wp_enqueue_script('as-sticky', AS_THEME_URI . '/assets/js/sticky.js', array('jquery'), AS_THEME_VERSION, true);
    wp_enqueue_script('as-motion-fx', AS_THEME_URI . '/assets/js/motion-fx.js', array('jquery'), AS_THEME_VERSION, true);
    wp_enqueue_script('as-jarallax', AS_THEME_URI . '/assets/js/jarallax.min.js', array('jquery'), AS_THEME_VERSION, true);
    wp_enqueue_script('as-swiper', AS_THEME_URI . '/assets/js/swiper.min.js', array('jquery'), AS_THEME_VERSION, true);
}
add_action('wp_enqueue_scripts', 'as_theme_enqueue_scripts');

/**
 * Custom Walker for Primary Menu
 */
class AS_Theme_Walker_Nav_Menu extends Walker_Nav_Menu {

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        // Check if item has children
        if (in_array('menu-item-has-children', $classes)) {
            $classes[] = 'has-mega-menu';
            $classes[] = 'has-stretchwidth';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id_attr = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
        $id_attr = $id_attr ? ' id="' . esc_attr($id_attr) . '"' : '';

        $output .= $indent . '<li' . $id_attr . $class_names . '>';

        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
        $atts['href']   = !empty($item->url) ? $item->url : '';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters('the_title', $item->title, $item->ID);
        $title = apply_filters('nav_menu_item_title', $title, $item, $args, $depth);

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= '<span class="menu-title" data-name="' . esc_attr($title) . '"><span>' . $args->link_before . $title . $args->link_after . '</span></span>';
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

/**
 * Custom Walker for Mobile Menu
 */
class AS_Theme_Walker_Mobile_Menu extends Walker_Nav_Menu {

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= $indent . '<li' . $class_names . '>';

        $atts = array();
        $atts['href'] = !empty($item->url) ? $item->url : '';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters('the_title', $item->title, $item->ID);

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>' . $title . '</a>';

        // Add dropdown toggle for items with children
        if (in_array('menu-item-has-children', $classes)) {
            $item_output .= '<button class="dropdown-toggle"></button>';
        }

        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

/**
 * Custom Walker for Footer Menu
 */
class AS_Theme_Walker_Footer_Menu extends Walker_Nav_Menu {

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $output .= '<li class="elementor-icon-list-item">';
        $output .= '<a href="' . esc_url($item->url) . '">';
        $output .= '<span class="elementor-icon-list-text">' . esc_html($item->title) . '</span>';
        $output .= '</a>';
    }

    public function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= '</li>';
    }
}

/**
 * Custom Walker for Hamburger Showcase Menu
 * This creates the link showcase style menu in the hamburger popup
 */
class AS_Theme_Walker_Hamburger_Showcase extends Walker_Nav_Menu {
    private $counter = 0;
    private $images = array();

    public function __construct() {
        // Default images - can be overridden with menu item description field
        $this->images = array(
            AS_THEME_URI . '/assets/images/popupmenu_img1.jpg',
            AS_THEME_URI . '/assets/images/popupmenu_img2.jpg',
            AS_THEME_URI . '/assets/images/popupmenu_img3.jpg',
            AS_THEME_URI . '/assets/images/popupmenu_img4.jpg',
            AS_THEME_URI . '/assets/images/popupmenu_img5.jpg',
            AS_THEME_URI . '/assets/images/popupmenu_img6.jpg',
        );
    }

    public function start_lvl(&$output, $depth = 0, $args = null) {
        // No sub-menu wrapper needed for showcase style
    }

    public function end_lvl(&$output, $depth = 0, $args = null) {
        // No sub-menu wrapper needed for showcase style
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $this->counter++;
        $active_class = ($this->counter === 1) ? ' elementor-active' : '';
        $item_id = 'elementor-link-showcase-title-' . $this->counter;

        // Get image from menu item description or use default
        $image_url = !empty($item->description) ? $item->description : (isset($this->images[$this->counter - 1]) ? $this->images[$this->counter - 1] : $this->images[0]);

        // Store for later use in end output
        $args->walker->menu_items[] = array(
            'counter' => $this->counter,
            'title' => $item->title,
            'url' => $item->url,
            'image' => $image_url,
            'active_class' => $active_class,
        );

        $output .= '<div id="' . esc_attr($item_id) . '" class="elementor-link-showcase-title' . $active_class . ' elementor-repeater-item-' . $item->ID . '" data-tab="' . $this->counter . '" role="tab">';
        $output .= '<div class="link-showcase-title">';
        $output .= '<a href="' . esc_url($item->url) . '"><span data-name="' . esc_attr($item->title) . '">' . esc_html($item->title) . '</span></a>';
        $output .= '</div>';
        $output .= '</div>';
    }

    public function end_el(&$output, $item, $depth = 0, $args = null) {
        // Element closed in start_el
    }
}

/**
 * Custom Walker for Hamburger Secondary Menu
 */
class AS_Theme_Walker_Hamburger_Secondary extends Walker_Nav_Menu {

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $output .= '<li class="elementor-icon-list-item">';
        $output .= '<a href="' . esc_url($item->url) . '">';
        $output .= '<span class="elementor-icon-list-text">' . esc_html($item->title) . '</span>';
        $output .= '</a>';
    }

    public function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= '</li>';
    }
}

/**
 * Render hamburger showcase menu with images
 */
function as_theme_render_hamburger_showcase_menu() {
    if (!has_nav_menu('hamburger-main')) {
        return;
    }

    $menu_locations = get_nav_menu_locations();
    $menu_id = $menu_locations['hamburger-main'];
    $menu_items = wp_get_nav_menu_items($menu_id);

    if (empty($menu_items)) {
        return;
    }

    $default_images = array(
        AS_THEME_URI . '/assets/images/popupmenu_img1.jpg',
        AS_THEME_URI . '/assets/images/popupmenu_img2.jpg',
        AS_THEME_URI . '/assets/images/popupmenu_img3.jpg',
        AS_THEME_URI . '/assets/images/popupmenu_img4.jpg',
        AS_THEME_URI . '/assets/images/popupmenu_img5.jpg',
        AS_THEME_URI . '/assets/images/popupmenu_img6.jpg',
    );

    $counter = 0;
    ?>
    <div class="elementor-link-showcase-wrapper">
        <div class="elementor-link-showcase-inner" role="tablist">
            <div class="link-showcase-item link-showcase-title-wrapper">
                <div class="link-showcase-title-inner">
                    <?php foreach ($menu_items as $item) :
                        if ($item->menu_item_parent != 0) continue; // Skip sub-items
                        $counter++;
                        $active_class = ($counter === 1) ? ' elementor-active' : '';
                    ?>
                    <div id="elementor-link-showcase-title-<?php echo $counter; ?>" class="elementor-link-showcase-title<?php echo $active_class; ?> elementor-repeater-item-<?php echo $item->ID; ?>" data-tab="<?php echo $counter; ?>" role="tab">
                        <div class="link-showcase-title">
                            <a href="<?php echo esc_url($item->url); ?>"><span data-name="<?php echo esc_attr($item->title); ?>"><?php echo esc_html($item->title); ?></span></a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="link-showcase-item link-showcase-content-wrapper">
                <div class="link-showcase-content-inner">
                    <?php
                    $counter = 0;
                    foreach ($menu_items as $item) :
                        if ($item->menu_item_parent != 0) continue; // Skip sub-items
                        $counter++;
                        $active_class = ($counter === 1) ? ' elementor-active' : '';
                        // Use description field for custom image URL, or fall back to default
                        $image_url = !empty($item->description) ? $item->description : (isset($default_images[$counter - 1]) ? $default_images[$counter - 1] : $default_images[0]);
                    ?>
                    <div id="elementor-link-showcase-content-<?php echo $counter; ?>" class="elementor-link-showcase-content elementor-repeater-item-<?php echo $item->ID; ?><?php echo $active_class; ?>" data-tab="<?php echo $counter; ?>" role="tab">
                        <img width="440" height="600" src="<?php echo esc_url($image_url); ?>" class="attachment-full size-full" alt="<?php echo esc_attr($item->title); ?>">
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Add body classes
 */
function as_theme_body_classes($classes) {
    $classes[] = 'home';
    $classes[] = 'page-template';
    $classes[] = 'page-template-template-homepage';
    $classes[] = 'page-template-template-homepage-php';
    $classes[] = 'page';
    $classes[] = 'wp-custom-logo';
    $classes[] = 'wp-embed-responsive';
    $classes[] = 'ehf-header';
    $classes[] = 'ehf-footer';
    $classes[] = 'ehf-template-easto';
    $classes[] = 'ehf-stylesheet-easto';
    $classes[] = 'theme-easto';
    $classes[] = 'no-wc-breadcrumb';
    $classes[] = 'elementor-default';
    $classes[] = 'elementor-kit-4';
    $classes[] = 'has-scrollbar';

    return $classes;
}
add_filter('body_class', 'as_theme_body_classes');

/**
 * Get Contact Form 7 shortcode
 */
function as_theme_get_contact_form($form_id = null) {
    if ($form_id && shortcode_exists('contact-form-7')) {
        return do_shortcode('[contact-form-7 id="' . intval($form_id) . '"]');
    }
    return '';
}

/**
 * Register widget areas
 */
function as_theme_widgets_init() {
    register_sidebar(array(
        'name'          => __('Footer Widget Area', 'as-theme'),
        'id'            => 'footer-widget',
        'description'   => __('Add widgets here.', 'as-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ));
}
add_action('widgets_init', 'as_theme_widgets_init');

/**
 * Add theme customizer options
 */
function as_theme_customize_register($wp_customize) {
    // Logo Settings Section
    $wp_customize->add_section('as_theme_logos', array(
        'title'    => __('Logo Settings', 'as-theme'),
        'priority' => 30,
    ));

    // Header Logo
    $wp_customize->add_setting('header_logo', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_logo', array(
        'label'       => __('Header Logo', 'as-theme'),
        'description' => __('Upload the logo to display in the header', 'as-theme'),
        'section'     => 'as_theme_logos',
        'settings'    => 'header_logo',
    )));

    // Footer Logo
    $wp_customize->add_setting('footer_logo', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
        'label'       => __('Footer Logo', 'as-theme'),
        'description' => __('Upload the logo to display in the footer (can be different from header logo)', 'as-theme'),
        'section'     => 'as_theme_logos',
        'settings'    => 'footer_logo',
    )));

    // Contact Form Section
    $wp_customize->add_section('as_theme_contact_form', array(
        'title'    => __('Contact Form Settings', 'as-theme'),
        'priority' => 130,
    ));

    // Schedule Tour Form ID
    $wp_customize->add_setting('schedule_tour_form_id', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('schedule_tour_form_id', array(
        'label'       => __('Schedule Tour Form ID', 'as-theme'),
        'description' => __('Enter the Contact Form 7 form ID for Schedule a Tour popup', 'as-theme'),
        'section'     => 'as_theme_contact_form',
        'type'        => 'number',
    ));

    // Main Contact Form ID
    $wp_customize->add_setting('main_contact_form_id', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('main_contact_form_id', array(
        'label'       => __('Main Contact Form ID', 'as-theme'),
        'description' => __('Enter the Contact Form 7 form ID for the main contact section', 'as-theme'),
        'section'     => 'as_theme_contact_form',
        'type'        => 'number',
    ));

    // Contact Info Section
    $wp_customize->add_section('as_theme_contact_info', array(
        'title'    => __('Contact Information', 'as-theme'),
        'priority' => 131,
    ));

    // Address
    $wp_customize->add_setting('site_address', array(
        'default'           => '2972 Westheimer Rd. Santa Ana, Illinois 85486',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('site_address', array(
        'label'   => __('Address', 'as-theme'),
        'section' => 'as_theme_contact_info',
        'type'    => 'text',
    ));

    // Phone
    $wp_customize->add_setting('site_phone', array(
        'default'           => '(084) 123 - 456 88',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('site_phone', array(
        'label'   => __('Phone Number', 'as-theme'),
        'section' => 'as_theme_contact_info',
        'type'    => 'text',
    ));

    // Email
    $wp_customize->add_setting('site_email', array(
        'default'           => 'contact@example.com',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('site_email', array(
        'label'   => __('Email Address', 'as-theme'),
        'section' => 'as_theme_contact_info',
        'type'    => 'email',
    ));

    // Social Media Section
    $wp_customize->add_section('as_theme_social', array(
        'title'    => __('Social Media Links', 'as-theme'),
        'priority' => 132,
    ));

    // Facebook
    $wp_customize->add_setting('social_facebook', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_facebook', array(
        'label'   => __('Facebook URL', 'as-theme'),
        'section' => 'as_theme_social',
        'type'    => 'url',
    ));

    // Instagram
    $wp_customize->add_setting('social_instagram', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_instagram', array(
        'label'   => __('Instagram URL', 'as-theme'),
        'section' => 'as_theme_social',
        'type'    => 'url',
    ));

    // Twitter/X
    $wp_customize->add_setting('social_twitter', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_twitter', array(
        'label'   => __('Twitter/X URL', 'as-theme'),
        'section' => 'as_theme_social',
        'type'    => 'url',
    ));

    // YouTube
    $wp_customize->add_setting('social_youtube', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_youtube', array(
        'label'   => __('YouTube URL', 'as-theme'),
        'section' => 'as_theme_social',
        'type'    => 'url',
    ));
}
add_action('customize_register', 'as_theme_customize_register');

/**
 * Helper function to get theme mod with default
 */
function as_theme_get_option($option, $default = '') {
    return get_theme_mod($option, $default);
}
