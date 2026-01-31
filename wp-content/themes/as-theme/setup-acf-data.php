<?php
/**
 * Setup ACF Data Script
 *
 * This script populates ACF fields with existing homepage content data.
 * Run this once via browser or WP-CLI to populate fields.
 *
 * Usage: Access this URL in browser while logged in as admin
 * /wp-content/themes/as-theme/setup-acf-data.php
 *
 * @package AS_Theme
 */

// Load WordPress
$wp_load_paths = array(
    dirname(__FILE__) . '/../../../../wp-load.php',
    dirname(__FILE__) . '/../../../wp-load.php',
);

foreach ($wp_load_paths as $path) {
    if (file_exists($path)) {
        require_once($path);
        break;
    }
}

// Check if user is admin (bypass for CLI)
$is_cli = (php_sapi_name() === 'cli');
if (!$is_cli && !current_user_can('manage_options')) {
    wp_die('You must be an administrator to run this script.');
}

// Check if ACF is active
if (!function_exists('update_field')) {
    wp_die('ACF Pro must be installed and active to run this script.');
}

// Find the Home page with Homepage Template
$home_page = get_page_by_title('Home');
if (!$home_page) {
    // Try to find page with homepage template
    $pages = get_posts(array(
        'post_type' => 'page',
        'meta_key' => '_wp_page_template',
        'meta_value' => 'template-home.php',
        'posts_per_page' => 1,
    ));

    if (!empty($pages)) {
        $home_page = $pages[0];
    }
}

// If no home page exists, create one
if (!$home_page) {
    $home_page_id = wp_insert_post(array(
        'post_title' => 'Home',
        'post_name' => 'home',
        'post_status' => 'publish',
        'post_type' => 'page',
        'post_content' => '',
        'meta_input' => array(
            '_wp_page_template' => 'template-home.php',
        ),
    ));
    $home_page = get_post($home_page_id);
    echo "<p>Created Home page with ID: {$home_page_id}</p>";
} else {
    // Make sure the template is set
    update_post_meta($home_page->ID, '_wp_page_template', 'template-home.php');
    echo "<p>Using existing Home page with ID: {$home_page->ID}</p>";
}

$page_id = $home_page->ID;

// Hero Section
update_field('hero_title_line_1', 'A New Standard in', $page_id);
update_field('hero_title_line_2', 'Living', $page_id);
update_field('hero_video_url', 'https://vimeo.com/952306062', $page_id);
update_field('hero_video_link', '#', $page_id);
update_field('hero_video_button_text', 'explore now', $page_id);
update_field('hero_subtitle', 'An incredible addition to the sparkling skyline of downtown.', $page_id);
update_field('hero_background_image', '', $page_id);
echo "<p>Hero Section fields populated.</p>";

// Welcome Section
update_field('welcome_subtitle', 'welcome home', $page_id);
update_field('welcome_title', "Your place to live the way you've always wanted", $page_id);
update_field('welcome_description', 'With no more than three homes per floor, a semi-private or private landing affords a discreet front door experience. Each residence is designed with expansive windows to <span style="font-weight: 500;">take advantage of corner</span> exposures and mesmerizing views. Superior quality and craftsmanship abound at every touchpoint, and with individual climate controls, year–round comfort is assured.', $page_id);
update_field('welcome_button_text', 'explore residences', $page_id);
update_field('welcome_button_url', '#', $page_id);
update_field('welcome_image', '', $page_id);
echo "<p>Welcome Section fields populated.</p>";

// Stats Section
update_field('stats_heading_1', 'Light.', $page_id);
update_field('stats_heading_2', 'Space.', $page_id);
update_field('stats_heading_3', 'Flexibility.', $page_id);

$stats_counters = array(
    array(
        'prefix' => '1',
        'number' => 250,
        'suffix' => '',
        'description' => 'contemporary residential units for sale',
    ),
    array(
        'prefix' => '',
        'number' => 746,
        'suffix' => '',
        'description' => 'valet parking spaces available for rent',
    ),
    array(
        'prefix' => '',
        'number' => 24,
        'suffix' => '',
        'description' => 'high speed passenger elevators',
    ),
);
update_field('stats_counters', $stats_counters, $page_id);
echo "<p>Stats Section fields populated.</p>";

// Residences Section
update_field('residences_subtitle', 'Refined Residences', $page_id);
update_field('residences_title', 'Modern condos in downtown', $page_id);
update_field('residences_description', "Defined by unrivaled attention to detail, The Easto's modern residences offer effortless sophistication and urban ease.", $page_id);
update_field('residences_image', '', $page_id);
update_field('residences_button_text', 'availability', $page_id);
update_field('residences_button_url', '#', $page_id);

$residences_cards = array(
    array(
        'title' => 'Living Rooms',
        'description' => 'Thoughtfully considered with modern design and awe-inspiring views for relaxing, reflecting and entertaining.',
        'image' => '',
    ),
    array(
        'title' => 'Primary bedroom',
        'description' => 'A serene oasis, the bedroom blends classic refinement with modern luxury, for unprecedented comfort and relaxation.',
        'image' => '',
    ),
    array(
        'title' => 'Kitchen',
        'description' => 'The kitchen exemplifies extraordinary detail, pairing honed imported Dolit marble with imported washed walnut wood cabinetry and Miele appliances.',
        'image' => '',
    ),
    array(
        'title' => 'Bathroom',
        'description' => 'The bathroom suite marvelously connects imported honed natural stone tile with a custom white caesarstone vanity top and refined matte black hardware.',
        'image' => '',
    ),
);
update_field('residences_cards', $residences_cards, $page_id);
echo "<p>Residences Section fields populated.</p>";

// Panoramic Views Section
$panoramic_views = array(
    array(
        'name' => 'North',
        'image' => '',
    ),
    array(
        'name' => 'West',
        'image' => '',
    ),
    array(
        'name' => 'East',
        'image' => '',
    ),
    array(
        'name' => 'South',
        'image' => '',
    ),
);
update_field('panoramic_views', $panoramic_views, $page_id);
echo "<p>Panoramic Views Section fields populated.</p>";

// Testimonial Section
update_field('testimonial_quote', '"The large windows perfectly frame endless views of City."', $page_id);
update_field('testimonial_author', 'Kevin White', $page_id);
update_field('testimonial_company', 'Nikko architecture firm', $page_id);
echo "<p>Testimonial Section fields populated.</p>";

// Amenities Section
update_field('amenities_subtitle', 'amenities', $page_id);
update_field('amenities_title', 'Resort-inspired amenities & services', $page_id);
update_field('amenities_description', 'This all-encompassing condominium brings your favorite amenities and lifestyle services together in one experience.', $page_id);
update_field('amenities_image', '', $page_id);
update_field('amenities_button_text', 'explore all services', $page_id);
update_field('amenities_button_url', '#', $page_id);

$amenities_banners = array(
    array(
        'title' => 'Rooftop Pool Club',
        'description' => 'Lounge in the sun and take in the beautiful city views, with a few added bonuses such as grilling BBQ stations, our rooftop lawn, and private cabanas.',
        'media_type' => 'video',
        'video_url' => '',
        'image' => '',
        'link' => '',
    ),
    array(
        'title' => 'The Fitness Center',
        'description' => "Award-winning personal training guru, The Wright Fit, will oversee the fitness center's day-to-day operations and offer a full menu of fitness and wellness training.",
        'media_type' => 'image',
        'video_url' => '',
        'image' => '',
        'link' => '',
    ),
    array(
        'title' => "Game Room & Residents' Lounge",
        'description' => 'The pristine, sunlit atrium features a 60-foot, L-shaped pool, perfect for swimming laps or just a casual dip, as well as an adjacent hot tub for relaxation.',
        'media_type' => 'image',
        'video_url' => '',
        'image' => '',
        'link' => '',
    ),
    array(
        'title' => "Children's Play Areas",
        'description' => 'Thoughtfully considered with modern design and awe-inspiring views for relaxing, reflecting and entertaining.',
        'media_type' => 'image',
        'video_url' => '',
        'image' => '',
        'link' => '',
    ),
);
update_field('amenities_banners', $amenities_banners, $page_id);
echo "<p>Amenities Section fields populated.</p>";

// Features Grid Section
$wellness_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none"><mask id="mask0_66_95" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="64" height="64"><path d="M0 3.8147e-06H64V64H0V3.8147e-06Z" fill="white"></path></mask><g mask="url(#mask0_66_95)"><path d="M57.2475 17.3881C57.2166 15.7615 57.1871 14.2248 57.1871 12.7383C57.1871 11.5735 56.2431 10.6294 55.0782 10.6294C46.0594 10.6294 39.1927 8.03725 33.469 2.47213C32.6502 1.67575 31.3472 1.67613 30.5287 2.47213C24.8056 8.03725 17.9401 10.6294 8.92186 10.6294C7.75711 10.6294 6.81286 11.5735 6.81286 12.7383C6.81286 14.2251 6.78374 15.7624 6.75249 17.3894C6.46349 32.5273 6.06761 53.2595 31.3081 62.0085C31.532 62.0861 31.7654 62.125 31.9987 62.125C32.2321 62.125 32.4657 62.0861 32.6894 62.0085C57.9319 53.2591 57.5366 32.5264 57.2475 17.3881Z" stroke="#96796E" stroke-miterlimit="10"></path><path d="M35.7422 27.6314V19.7226H28.259V27.6314H20.3496V35.1147H28.259V43.0234H35.7422V35.1147H43.6505V27.6314H35.7422Z" stroke="#96796E" stroke-miterlimit="10" stroke-linejoin="round"></path></g></svg>';

$work_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none"><g clip-path="url(#clip0_66_139)"><mask id="mask0_66_139" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="64" height="64"><path d="M0 3.8147e-06H64V64H0V3.8147e-06Z" fill="white"></path></mask><g mask="url(#mask0_66_139)"><path d="M35.3688 44.6253C35.3688 46.4771 33.8676 47.9785 32.0157 47.9785C30.1637 47.9785 28.6626 46.4771 28.6626 44.6253C28.6626 42.7734 30.1637 41.2721 32.0157 41.2721C33.8676 41.2721 35.3688 42.7734 35.3688 44.6253Z" stroke="#96796E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><path d="M15.5344 47.0727V55.1367" stroke="#96796E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><path d="M48.497 55.1367V36.8851C48.497 35.2363 47.1607 33.9081 45.5199 33.9081H18.5114C16.8673 33.9081 15.5344 35.241 15.5344 36.8851V42.6381" stroke="#96796E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><path d="M51.389 58.6973C52.0225 58.0329 52.4116 57.1331 52.4116 56.1426C52.4116 55.5871 51.9612 55.1369 51.4057 55.1369H12.6259C12.0704 55.1369 11.6201 55.5871 11.6201 56.1426C11.6201 57.1331 12.009 58.0329 12.6425 58.6973" stroke="#96796E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><path d="M60.8274 58.6971H3.17298C1.96736 58.6971 0.990234 59.6743 0.990234 60.8798C0.990234 62.0853 1.96736 63.0625 3.17298 63.0625H60.8274C62.0329 63.0625 63.01 62.0853 63.01 60.8798C63.01 59.6743 62.0329 58.6971 60.8274 58.6971Z" stroke="#96796E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path></g></g></svg>';

$play_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none"><path d="M55.5684 17.9094C55.0043 17.9094 54.4692 18.0321 53.9867 18.2506C53.1556 16.5762 51.4292 15.4248 49.4332 15.4248C47.4686 15.4248 45.7656 16.5404 44.9199 18.1721C44.4873 18.0031 44.0169 17.9093 43.5244 17.9093C41.4041 17.9093 39.6851 19.6282 39.6851 21.7487C39.6851 23.8691 41.4039 25.5881 43.5244 25.5881C44.5862 25.5881 54.4541 25.5881 55.5684 25.5881C57.6888 25.5881 59.4078 23.8691 59.4078 21.7487C59.4077 19.6283 57.6888 17.9094 55.5684 17.9094Z" stroke="#96796E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><path d="M34.8414 5.01921C34.4732 5.01921 34.1239 5.09921 33.809 5.24184C33.2665 4.14896 32.1397 3.39746 30.8369 3.39746C29.5545 3.39746 28.443 4.12559 27.891 5.19059C27.6086 5.08034 27.3016 5.01909 26.9801 5.01909C25.5961 5.01909 24.4741 6.14109 24.4741 7.52509C24.4741 8.90909 25.5961 10.0311 26.9801 10.0311C27.6731 10.0311 34.114 10.0311 34.8412 10.0311C36.2252 10.0311 37.3472 8.90909 37.3472 7.52509C37.3474 6.14121 36.2254 5.01921 34.8414 5.01921Z" stroke="#96796E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><path d="M27.22 60.6019H1.807C1.32675 60.6019 0.9375 60.2126 0.9375 59.7324V38.9642C0.9375 38.484 1.32675 38.0947 1.807 38.0947H26.3505C26.8308 38.0947 27.22 38.484 27.22 38.9642V60.6019Z" stroke="#96796E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path></svg>';

$features_categories = array(
    array(
        'title' => 'Wellness',
        'icon_svg' => $wellness_icon,
        'items' => array(
            array('text' => 'Sauna, and Steam Rooms'),
            array('text' => 'Salt Rooms'),
            array('text' => 'Experience Shower'),
            array('text' => 'Fitness Center'),
            array('text' => 'Rooftop Pool and Terrace'),
            array('text' => "Children's Wading Pool"),
        ),
    ),
    array(
        'title' => 'Work',
        'icon_svg' => $work_icon,
        'items' => array(
            array('text' => 'Podcast and Music Room'),
            array('text' => 'Expansive Work Hub'),
            array('text' => 'Private Work Areas'),
            array('text' => 'Conference Rooms'),
            array('text' => 'Communal Work'),
            array('text' => 'Table Library'),
        ),
    ),
    array(
        'title' => 'Play',
        'icon_svg' => $play_icon,
        'items' => array(
            array('text' => 'Full Basketball Court'),
            array('text' => 'Golf Simulators'),
            array('text' => 'Bowling Alleys'),
            array('text' => 'Billiards Room'),
            array('text' => 'Teen Game Room'),
            array('text' => 'Screening Rooms'),
        ),
    ),
);
update_field('features_categories', $features_categories, $page_id);
echo "<p>Features Grid Section fields populated.</p>";

// Scrolling Text Section
$scrolling_text_items = array(
    array('text' => 'elevated lifestyle'),
    array('text' => '·'),
    array('text' => 'World-Class services'),
    array('text' => '·'),
    array('text' => 'Perfect Balance'),
    array('text' => '·'),
    array('text' => 'Community'),
    array('text' => '·'),
);
update_field('scrolling_text_items', $scrolling_text_items, $page_id);
echo "<p>Scrolling Text Section fields populated.</p>";

// Apartments Section
update_field('apartments_subtitle', 'apartments', $page_id);
update_field('apartments_title', 'A place to call home', $page_id);
update_field('apartments_description', 'Our residences feature smart home technology, premium finishes, and stunning city views that make every day feel extraordinary.', $page_id);
update_field('apartments_button_text', 'view all', $page_id);
update_field('apartments_button_url', '#', $page_id);

$apartments_slider = array(
    array(
        'title' => 'Penthouse',
        'image' => '',
        'beds' => 3,
        'baths' => 2,
        'sqft' => '1,245',
        'link' => '#',
    ),
    array(
        'title' => 'Premium Apartment',
        'image' => '',
        'beds' => 3,
        'baths' => 2,
        'sqft' => '1,245',
        'link' => '#',
    ),
    array(
        'title' => '3 Bedroom',
        'image' => '',
        'beds' => 3,
        'baths' => 3,
        'sqft' => '1,245',
        'link' => '#',
    ),
    array(
        'title' => '2 Bedroom',
        'image' => '',
        'beds' => 2,
        'baths' => 1,
        'sqft' => '1,245',
        'link' => '#',
    ),
    array(
        'title' => '1 Bedroom',
        'image' => '',
        'beds' => 1,
        'baths' => 1,
        'sqft' => '1,245',
        'link' => '#',
    ),
    array(
        'title' => 'Modern Suite',
        'image' => '',
        'beds' => 3,
        'baths' => 3,
        'sqft' => '1,245',
        'link' => '#',
    ),
);
update_field('apartments_slider', $apartments_slider, $page_id);
echo "<p>Apartments Section fields populated.</p>";

// Neighborhood Section
update_field('neighborhood_subtitle', 'neighborhood', $page_id);
update_field('neighborhood_title', 'A vibrant neighborhood', $page_id);
update_field('neighborhood_description', 'Central Midtown location offers direct access to the best of a rich cosmopolitan landscape, including international cultural institutions, landmark architecture, fine dining and nightlife, and world-class performing arts and entertainment.', $page_id);
update_field('neighborhood_button_text', 'explore nearby places', $page_id);
update_field('neighborhood_button_url', '#', $page_id);

$neighborhood_places = array(
    array(
        'title' => 'Restaurants',
        'image' => '',
        'content' => '<p>Chiptole – <em>0.5km</em><br>Dunkin Donut – <em>1.2km</em><br>Golden Palace – <em>2km</em><br>Istanbul Restaurant – <em>1.5km</em><br>La Casa Bella – <em>0.5km</em><br>LaoJie Hotpot – <em>1.4km</em></p>',
    ),
    array(
        'title' => 'Shopping',
        'image' => '',
        'content' => '<p>Fine and Dandy Shop – <em>1.5km</em><br>LaDuca Shoes – <em>1.4km</em><br>Home Depot – <em>1.8km</em><br>Stop and Shop – <em>0.8km</em><br>Top Hill Auto – <em>1.6km</em></p>',
    ),
    array(
        'title' => 'Landmarks',
        'image' => '',
        'content' => "<p>Clinton Court – <em>0.5km</em><br>Actor's Studio – <em>1.2km</em><br>Landmark Tavern – <em>2km</em><br>The Intrepid – <em>1.5km</em><br>La Casa Bella – <em>0.5km</em><br>Clinton Garden – <em>1.4km</em></p>",
    ),
    array(
        'title' => 'Transportation',
        'image' => '',
        'content' => "<p>Clinton Court – <em>0.5km</em><br>Actor's Studio – <em>1.2km</em><br>Landmark Tavern – <em>2km</em><br>The Intrepid – <em>1.5km</em><br>La Casa Bella – <em>0.5km</em><br>Clinton Garden – <em>1.4km</em></p>",
    ),
    array(
        'title' => 'Park & Active',
        'image' => '',
        'content' => '<p>Fine and Dandy Shop – <em>1.5km</em><br>LaDuca Shoes – <em>1.4km</em><br>Home Depot – <em>1.8km</em><br>Stop and Shop – <em>0.8km</em><br>Top Hill Auto – <em>1.6km</em></p>',
    ),
    array(
        'title' => 'Art & Culture',
        'image' => '',
        'content' => "<p>Clinton Court – <em>0.5km</em><br>Actor's Studio – <em>1.2km</em><br>Landmark Tavern – <em>2km</em><br>The Intrepid – <em>1.5km</em><br>La Casa Bella – <em>0.5km</em><br>Clinton Garden – <em>1.4km</em></p>",
    ),
);
update_field('neighborhood_places', $neighborhood_places, $page_id);
echo "<p>Neighborhood Section fields populated.</p>";

// About Section
update_field('about_subtitle', 'About us', $page_id);
update_field('about_title', 'People behind the creation', $page_id);
update_field('about_description', "In a joint collaborative venture, three of New York's most prominent real estate companies bring the very best of development, management and innovation.", $page_id);
update_field('about_button_text', 'meet our team', $page_id);
update_field('about_button_url', '#', $page_id);
update_field('about_image_1', '', $page_id);
update_field('about_image_2', '', $page_id);
echo "<p>About Section fields populated.</p>";

// Contact Section
update_field('contact_form_heading', 'Kindly share your details to learn more', $page_id);
update_field('contact_form_id', get_theme_mod('main_contact_form_id', ''), $page_id);
update_field('contact_subtitle', 'Get in touch', $page_id);
update_field('contact_title', 'Exclusive marketing & sales agent', $page_id);
update_field('contact_description', "We'd love to share more with you, please complete this form and our dedicated team will get back to you shortly.", $page_id);
update_field('agent_image', '', $page_id);
update_field('agent_name', 'Connor Flores', $page_id);
update_field('agent_title', 'certified agent', $page_id);
update_field('agent_phone', '+(406) 555-0120-88', $page_id);
update_field('agent_email', 'agent.name@example.com', $page_id);
echo "<p>Contact Section fields populated.</p>";

// Set this page as the front page
update_option('show_on_front', 'page');
update_option('page_on_front', $page_id);
echo "<p>Home page set as front page.</p>";

echo "<hr>";
echo "<h2>ACF Data Population Complete!</h2>";
echo "<p>All homepage content has been populated into ACF fields.</p>";
echo "<p>You can now edit the fields in the WordPress admin by going to Pages > Home.</p>";
echo "<p><a href='" . admin_url('post.php?post=' . $page_id . '&action=edit') . "'>Edit Home Page</a></p>";
echo "<p><a href='" . home_url() . "'>View Homepage</a></p>";
