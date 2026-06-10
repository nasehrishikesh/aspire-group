<?php
/**
 * Template part for displaying the FAQ page content.
 *
 * @package AS_Theme
 */

// ACF fields
$faq_subtitle = get_field('faq_section_subtitle') ?: 'Got questions?';
$faq_title    = get_field('faq_section_title')    ?: 'Frequently Asked Questions';

// Default FAQ items — shown when no ACF data is saved yet
$default_faq_items = array(
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

// Use ACF repeater if available, otherwise fall back to defaults
$faq_items = array();
if (have_rows('faq_items')) {
    while (have_rows('faq_items')) {
        the_row();
        $faq_items[] = array(
            'faq_question' => get_sub_field('faq_question'),
            'faq_answer'   => get_sub_field('faq_answer'),
        );
    }
}
if (empty($faq_items)) {
    $faq_items = $default_faq_items;
}
?>

<div id="page" class="hfeed site elementor-faq">

    <!-- Breadcrumb -->
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

    <!-- FAQ Section -->
    <section class="faq-section" id="faq">
        <div class="faq-container">

            <div class="faq-header">
                <?php if ($faq_subtitle) : ?>
                    <span class="faq-subtitle"><?php echo esc_html($faq_subtitle); ?></span>
                <?php endif; ?>
                <h2 class="faq-title"><?php echo esc_html($faq_title); ?></h2>
            </div>

            <?php if (!empty($faq_items)) : ?>
            <div class="faq-accordion" role="list">
                <?php foreach ($faq_items as $index => $item) :
                    $item_id = 'faq-item-' . ($index + 1);
                ?>
                <div class="faq-item<?php echo $index === 0 ? ' faq-item--open' : ''; ?>" role="listitem">
                    <button
                        class="faq-question"
                        aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>"
                        aria-controls="<?php echo esc_attr($item_id); ?>"
                    >
                        <span class="faq-question-text"><?php echo esc_html($item['faq_question']); ?></span>
                        <span class="faq-icon" aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path class="faq-icon-h" d="M4 10h12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                <path class="faq-icon-v" d="M10 4v12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </span>
                    </button>
                    <div
                        class="faq-answer"
                        id="<?php echo esc_attr($item_id); ?>"
                        role="region"
                    >
                        <div class="faq-answer-inner">
                            <p><?php echo nl2br(esc_html($item['faq_answer'])); ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

        </div>
    </section>

</div><!-- #page -->

<script>
(function () {
    var items = document.querySelectorAll('.faq-item');
    items.forEach(function (item) {
        var btn    = item.querySelector('.faq-question');
        var answer = item.querySelector('.faq-answer');

        // Set initial heights
        if (item.classList.contains('faq-item--open')) {
            answer.style.maxHeight = answer.scrollHeight + 'px';
        } else {
            answer.style.maxHeight = '0';
        }

        btn.addEventListener('click', function () {
            var isOpen = item.classList.contains('faq-item--open');

            // Close all
            items.forEach(function (i) {
                i.classList.remove('faq-item--open');
                i.querySelector('.faq-question').setAttribute('aria-expanded', 'false');
                i.querySelector('.faq-answer').style.maxHeight = '0';
            });

            // Open clicked if it was closed
            if (!isOpen) {
                item.classList.add('faq-item--open');
                btn.setAttribute('aria-expanded', 'true');
                answer.style.maxHeight = answer.scrollHeight + 'px';
            }
        });
    });
})();
</script>
