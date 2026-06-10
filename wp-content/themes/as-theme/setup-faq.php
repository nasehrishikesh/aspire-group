<?php
/**
 * FAQ Page Setup Script
 *
 * Creates the FAQ WordPress page, assigns the FAQ template, and populates
 * the ACF fields with default content from the reference site.
 *
 * Run once (as admin) by visiting:
 *   /wp-content/themes/as-theme/setup-faq.php
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
        require_once $path;
        break;
    }
}

$is_cli = (php_sapi_name() === 'cli');
$secret_token = isset($_GET['token']) ? $_GET['token'] : '';
$allowed_token = 'aspire-faq-setup-2025';

if (!$is_cli && !current_user_can('manage_options') && $secret_token !== $allowed_token) {
    wp_die('You must be an administrator to run this script, or pass ?token=aspire-faq-setup-2025');
}

// If token is used, elevate to admin user temporarily
if (!$is_cli && !current_user_can('manage_options') && $secret_token === $allowed_token) {
    $admin_users = get_users(array('role' => 'administrator', 'number' => 1));
    if (!empty($admin_users)) {
        wp_set_current_user($admin_users[0]->ID);
    }
}
if (!function_exists('update_field')) {
    wp_die('ACF Pro must be installed and active to run this script.');
}

// ── 1. Find or create the FAQ page ───────────────────────────────────────────
$existing = get_posts(array(
    'post_type'      => 'page',
    'meta_key'       => '_wp_page_template',
    'meta_value'     => 'template-faq.php',
    'posts_per_page' => 1,
    'post_status'    => 'any',
));

if (!empty($existing)) {
    $page_id = $existing[0]->ID;
    echo "<p>✅ FAQ page already exists (ID: {$page_id}). Updating ACF data.</p>";
} else {
    $page_id = wp_insert_post(array(
        'post_title'   => 'FAQ',
        'post_name'    => 'faq',
        'post_status'  => 'publish',
        'post_type'    => 'page',
        'post_content' => '',
        'meta_input'   => array(
            '_wp_page_template' => 'template-faq.php',
        ),
    ));

    if (is_wp_error($page_id)) {
        wp_die('Error creating FAQ page: ' . $page_id->get_error_message());
    }
    echo "<p>✅ Created FAQ page (ID: {$page_id}).</p>";
}

// Ensure template is set
update_post_meta($page_id, '_wp_page_template', 'template-faq.php');

// ── 2. Section header fields ──────────────────────────────────────────────────
update_field('faq_section_subtitle', 'Got questions?', $page_id);
update_field('faq_section_title', 'Frequently Asked Questions', $page_id);
echo "<p>✅ Section header fields set.</p>";

// ── 3. FAQ repeater items ─────────────────────────────────────────────────────
$faq_items = array(
    array(
        'faq_question' => 'What is Aspire Group and how long have you been in real estate?',
        'faq_answer'   => 'Aspire Group is a trusted real estate developer in Pune with over 10 years of experience. We\'ve successfully completed projects spanning 825,000+ sq.ft. with a turnover of ₹375 Crore, specialising in both residential and commercial developments.',
    ),
    array(
        'faq_question' => 'Where are your current projects located?',
        'faq_answer'   => 'Our ongoing projects are strategically located in prime Pune locations including Ambegaon Bk., Kondhwa Bk., Dhankawadi, Hadapsar, and Katraj-Kondhwa Road. We carefully select locations with good connectivity and growth potential.',
    ),
    array(
        'faq_question' => 'Are Aspire Group projects RERA registered?',
        'faq_answer'   => 'Yes, all our ongoing projects are RERA registered. We strictly comply with all regulatory requirements to ensure complete transparency and legal protection for our customers.',
    ),
    array(
        'faq_question' => 'What types of properties do you offer?',
        'faq_answer'   => 'We offer premium residential apartments (1BHK, 2BHK, 3BHK) and commercial spaces. Our projects feature modern amenities, thoughtful designs, and high-quality construction standards to suit various lifestyle and business needs.',
    ),
    array(
        'faq_question' => 'How does Aspire Group ensure construction quality?',
        'faq_answer'   => 'We maintain rigorous quality control through: experienced in-house architects and engineers, premium construction materials, regular quality audits, and third-party structural audits. Quality is our top priority in every project.',
    ),
    array(
        'faq_question' => 'How can I book a site visit or get more information?',
        'faq_answer'   => 'You can call us at +91 98902 73861, visit our office, or fill out the contact form on our website. Our sales team will arrange a convenient time for a site visit and provide detailed information about our projects.',
    ),
);

// Delete existing rows then repopulate
delete_field('faq_items', $page_id);
foreach ($faq_items as $item) {
    add_row('faq_items', $item, $page_id);
}
echo "<p>✅ " . count($faq_items) . " FAQ items seeded.</p>";

// ── 4. Add to nav menu (primary menu, if it exists) ───────────────────────────
$menus = wp_get_nav_menus();
if (!empty($menus)) {
    $menu = $menus[0]; // Use the first registered menu
    $menu_items = wp_get_nav_menu_items($menu->term_id);
    $already_in_menu = false;
    if ($menu_items) {
        foreach ($menu_items as $mi) {
            if ((int) $mi->object_id === $page_id) {
                $already_in_menu = true;
                break;
            }
        }
    }
    if (!$already_in_menu) {
        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title'     => 'FAQ',
            'menu-item-object'    => 'page',
            'menu-item-object-id' => $page_id,
            'menu-item-type'      => 'post_type',
            'menu-item-status'    => 'publish',
        ));
        echo "<p>✅ Added FAQ to the '{$menu->name}' nav menu.</p>";
    } else {
        echo "<p>ℹ️ FAQ is already in the '{$menu->name}' nav menu.</p>";
    }
}

// ── 5. Done ───────────────────────────────────────────────────────────────────
$faq_url = get_permalink($page_id);
echo "<p><strong>All done!</strong> View the FAQ page: <a href='{$faq_url}' target='_blank'>{$faq_url}</a></p>";
