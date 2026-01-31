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
