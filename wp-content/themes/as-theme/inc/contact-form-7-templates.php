<?php
/**
 * Contact Form 7 Form Templates
 *
 * This file provides the Contact Form 7 form configurations
 * that match the design of the original Easto theme.
 *
 * After installing Contact Form 7 plugin, create two forms
 * using the templates below, then configure the form IDs in:
 * Appearance > Customize > Contact Form Settings
 *
 * @package AS_Theme
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Schedule a Tour Form Template
 *
 * Create a new form in Contact Form 7 with this structure:
 * Title: Schedule a Tour
 *
 * Form Template:
 * ---------------
 * <div class="wpcf7-form">
 *     <div class="column-name">
 *         <p>[text* your-name placeholder "Name *"]</p>
 *     </div>
 *     <div class="column-email">
 *         <p>[email* your-email placeholder "Email *"]</p>
 *     </div>
 *     <div class="column-number">
 *         <p>[tel* your-number placeholder "Phone *"]</p>
 *     </div>
 *     <div class="column-date">
 *         <p>[date* your-date]</p>
 *     </div>
 *     <div class="column-time">
 *         <p>[select* your-time "7:00 AM" "9:00 AM" "11:00 AM" "1:00 PM" "3:00 PM" "5:00 PM"]</p>
 *     </div>
 *     <div class="column-message">
 *         <p>[textarea your-message placeholder "Message"]</p>
 *     </div>
 *     <div class="wpcf7-button">
 *         <p>[submit class:wpcf7-submit "submit"]</p>
 *     </div>
 * </div>
 *
 * Mail Template:
 * --------------
 * To: your-email@example.com
 * Subject: New Tour Scheduling Request from [your-name]
 * Body:
 * You have received a new tour scheduling request.
 *
 * Name: [your-name]
 * Email: [your-email]
 * Phone: [your-number]
 * Preferred Date: [your-date]
 * Preferred Time: [your-time]
 * Message: [your-message]
 */

/**
 * Main Contact Form Template
 *
 * Create a new form in Contact Form 7 with this structure:
 * Title: Main Contact Form
 *
 * Form Template:
 * ---------------
 * <div class="wpcf7-inquire">
 *     <div class="row">
 *         <div class="column-fn">
 *             <p>[text* first-name placeholder "First Name *"]</p>
 *         </div>
 *         <div class="column-ln">
 *             <p>[text* last-name placeholder "Last Name *"]</p>
 *         </div>
 *     </div>
 *     <div class="column-num">
 *         <p>[tel* your-number placeholder "Phone *"]</p>
 *     </div>
 *     <div class="column-email">
 *         <p>[email* your-email placeholder "Email *"]</p>
 *     </div>
 *     <p class="form-text">Type of residence you are interested in</p>
 *     <p>[radio radio-366 default:1 "1 Bedroom" "2 Bedroom" "3 Bedroom" "Studio"]</p>
 *     <p class="form-text">Are you a broker?</p>
 *     <p>[radio radio-377 default:1 "Yes" "No"]</p>
 *     <div class="column-message">
 *         <p>[textarea your-message placeholder "Message"]</p>
 *     </div>
 *     <div class="cf-btn">
 *         <p class="sub-text">Field with <span class="color-primary" style="font-weight: 500;">* required</span></p>
 *         <div class="wpcf7-button">
 *             <p>[submit class:wpcf7-submit "submit"]</p>
 *         </div>
 *     </div>
 * </div>
 *
 * Mail Template:
 * --------------
 * To: your-email@example.com
 * Subject: New Inquiry from [first-name] [last-name]
 * Body:
 * You have received a new inquiry.
 *
 * Name: [first-name] [last-name]
 * Email: [your-email]
 * Phone: [your-number]
 * Residence Type: [radio-366]
 * Is Broker: [radio-377]
 * Message: [your-message]
 */

/**
 * Add custom CSS class to CF7 submit button
 */
add_filter('wpcf7_form_elements', 'as_theme_cf7_custom_submit');
function as_theme_cf7_custom_submit($content) {
    // Add SVG icon to submit buttons
    $svg_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" class="btn-icon__icon"></path><path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" class="btn-icon__icon"></path></svg>';

    // This is a simple example - you may need to adjust based on your specific needs
    return $content;
}

/* -------------------------------------------------------------------------
 * Project Inquiry Form
 *
 * One reusable Contact Form 7 form (Project Name [auto], Name, Email, Phone)
 * shared by:
 *   - Floor Plan popup
 *   - Download Brochure popup
 *   - Contact Us section at the bottom of the Project Detail page
 * ------------------------------------------------------------------------*/

/**
 * Programmatically create the Project Inquiry CF7 form once and remember its ID.
 *
 * Runs late on init (after CF7 registers its post type and helpers).
 */
function as_theme_ensure_project_inquiry_form() {
    if (!class_exists('WPCF7_ContactForm') || !function_exists('wpcf7_save_contact_form')) {
        return 0;
    }

    $stored_id = (int) get_option('as_theme_project_inquiry_form_id', 0);
    if ($stored_id && get_post($stored_id)) {
        return $stored_id;
    }

    // Look up by slug in case it was already created previously.
    $existing = get_posts(array(
        'post_type'   => 'wpcf7_contact_form',
        'name'        => 'project-inquiry-form',
        'post_status' => 'any',
        'numberposts' => 1,
    ));
    if (!empty($existing)) {
        update_option('as_theme_project_inquiry_form_id', $existing[0]->ID);
        return $existing[0]->ID;
    }

    $form_body = <<<HTML
<div class="wpcf7-form-inner project-inquiry-form">
    <div class="column-project-name">
        <label for="project-name"><strong>Project</strong></label>
        <p>[text project-name readonly class:project-name-input]</p>
    </div>
    <div class="column-name">
        <p>[text* your-name placeholder "Name *"]</p>
    </div>
    <div class="column-email">
        <p>[email* your-email placeholder "Email *"]</p>
    </div>
    <div class="column-number">
        <p>[tel* your-number placeholder "Phone Number *"]</p>
    </div>
    <div class="wpcf7-button">
        <p>[submit class:wpcf7-submit "Submit"]</p>
    </div>
</div>
HTML;

    $admin_email = get_option('admin_email');

    $post_id = wp_insert_post(array(
        'post_title'   => 'Project Inquiry Form',
        'post_name'    => 'project-inquiry-form',
        'post_status'  => 'publish',
        'post_type'    => 'wpcf7_contact_form',
        'post_content' => '',
    ));

    if (is_wp_error($post_id) || !$post_id) {
        return 0;
    }

    // CF7 stores form template + mail templates as serialized post meta.
    update_post_meta($post_id, '_form', $form_body);

    update_post_meta($post_id, '_mail', array(
        'active'           => true,
        'subject'          => sprintf('[%s] New project inquiry for [project-name]', get_bloginfo('name')),
        'sender'           => '[your-name] <' . $admin_email . '>',
        'recipient'        => $admin_email,
        'body'             => "You have received a new project inquiry.\n\n"
            . "Project: [project-name]\n"
            . "Name: [your-name]\n"
            . "Email: [your-email]\n"
            . "Phone: [your-number]\n",
        'additional_headers' => "Reply-To: [your-email]",
        'attachments'      => '',
        'use_html'         => false,
        'exclude_blank'    => false,
    ));

    update_post_meta($post_id, '_mail_2', array(
        'active'           => false,
        'subject'          => '',
        'sender'           => '',
        'recipient'        => '',
        'body'             => '',
        'additional_headers' => '',
        'attachments'      => '',
        'use_html'         => false,
        'exclude_blank'    => false,
    ));

    // Use CF7's documented default messages helper when available, else fall
    // back to an empty array (CF7 fills in defaults at render time).
    $default_messages = array();
    if (function_exists('wpcf7_messages')) {
        foreach (wpcf7_messages() as $key => $msg) {
            $default_messages[$key] = isset($msg['default']) ? $msg['default'] : '';
        }
    }
    update_post_meta($post_id, '_messages', $default_messages);

    update_post_meta($post_id, '_additional_settings', "skip_mail: off");

    update_option('as_theme_project_inquiry_form_id', $post_id);

    return $post_id;
}
add_action('init', 'as_theme_ensure_project_inquiry_form', 20);

/**
 * Public accessor — returns the Project Inquiry form ID (creating it lazily).
 */
function as_theme_get_project_inquiry_form_id() {
    $id = (int) get_option('as_theme_project_inquiry_form_id', 0);
    if (!$id) {
        $id = as_theme_ensure_project_inquiry_form();
    }
    return $id;
}

/**
 * Inject the current Project Detail post's title into the CF7 form.
 *
 * Uses the `wpcf7_form_tag` filter to set the dynamic default value of the
 * `project-name` text field whenever it's rendered on a single `projects` post.
 */
add_filter('wpcf7_form_tag', 'as_theme_cf7_dynamic_project_name', 10, 2);
function as_theme_cf7_dynamic_project_name($tag, $unused = null) {
    if (!is_array($tag) || empty($tag['name']) || $tag['name'] !== 'project-name') {
        return $tag;
    }
    if (is_singular('projects')) {
        $tag['values'] = array(get_the_title());
    }
    return $tag;
}
