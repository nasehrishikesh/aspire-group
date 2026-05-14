<?php
/**
 * Template part for displaying the Projects Listing page.
 *
 * Renders an About-style breadcrumb banner, three category tabs
 * (Upcoming / Ongoing / Completed) and project cards under each tab
 * pulled dynamically from the Project Detail ACF fields.
 *
 * @package AS_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

// Detect whether we're rendering on a Page (template-projects.php) or on the
// `projects` CPT archive. ACF fields only exist on the page; the archive uses
// sensible defaults.
$is_projects_archive = is_post_type_archive('projects');

if ($is_projects_archive) {
    $banner_title    = __('Projects', 'as-theme');
    $banner_subtitle = '';
    $intro_text      = '';
    $current_url     = get_post_type_archive_link('projects');
} else {
    $banner_title    = get_field('projects_banner_title');
    $banner_subtitle = get_field('projects_banner_subtitle');
    $intro_text      = get_field('projects_intro_text');
    if (!$banner_title) {
        $banner_title = get_the_title();
    }
    $current_url = get_permalink();
}

// Status / Tab definitions.
$tabs = array(
    'upcoming'  => __('Upcoming Project', 'as-theme'),
    'ongoing'   => __('Ongoing Project', 'as-theme'),
    'completed' => __('Completed Project', 'as-theme'),
);

// Group all projects by their `project_status` ACF value.
$projects_by_status = array(
    'upcoming'  => array(),
    'ongoing'   => array(),
    'completed' => array(),
);

$query = new WP_Query(array(
    'post_type'      => 'projects',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order title',
    'order'          => 'ASC',
));

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        $status = get_field('project_status');
        if (!$status || !isset($projects_by_status[$status])) {
            // Default unset statuses to "ongoing" so nothing is silently dropped.
            $status = 'ongoing';
        }
        $projects_by_status[$status][] = get_the_ID();
    }
    wp_reset_postdata();
}

// Determine the initial active tab. Prefer the first non-empty tab.
$active_tab = 'upcoming';
foreach ($tabs as $slug => $label) {
    if (!empty($projects_by_status[$slug])) {
        $active_tab = $slug;
        break;
    }
}
?>
<div id="page" class="hfeed site elementor-5841">
   <!-- Breadcrumb / Banner Section (About-style) -->
   <div class="breadcrumb-wrap">
      <div class="breadcrumb-overlay"></div>
      <div data-elementor-type="wp-post" data-elementor-id="727" class="elementor elementor-727">
         <div class="elementor-element elementor-element-f23f9c9 e-con-full e-flex e-con e-parent e-lazyloaded about-hero" data-id="f23f9c9" data-element_type="container">
            <div class="elementor-element elementor-element-4140e1d elementor-widget elementor-widget-easto-breadcrumb" data-id="4140e1d" data-element_type="widget" data-widget_type="easto-breadcrumb.default">
               <div class="elementor-widget-container">
                  <div class="breadcrumb" typeof="BreadcrumbList" vocab="https://schema.org/">
                     <h1 class="easto-title"><?php echo esc_html($banner_title); ?></h1>
                     <?php if ($banner_subtitle) : ?>
                        <p class="easto-subtitle"><?php echo esc_html($banner_subtitle); ?></p>
                     <?php endif; ?>
                     <div class="breadcrumb-listItem">
                        <span property="itemListElement" typeof="ListItem">
                           <a property="item" typeof="WebPage" title="<?php esc_attr_e('Go to Home.', 'as-theme'); ?>" href="<?php echo esc_url(home_url('/')); ?>" class="home">
                              <span property="name"><?php esc_html_e('Home', 'as-theme'); ?></span>
                           </a>
                           <meta property="position" content="1">
                        </span>
                        ⋅
                        <span property="itemListElement" typeof="ListItem">
                           <span property="name" class="post post-page current-item"><?php echo esc_html($banner_title); ?></span>
                           <meta property="url" content="<?php echo esc_url($current_url); ?>">
                           <meta property="position" content="2">
                        </span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div id="content" class="site-content clear mb-0" tabindex="-1">
      <div id="primary">
         <main id="main" class="site-main">
            <?php
               $page_id_attr = $is_projects_archive ? 0 : get_the_ID();
               $article_classes = $is_projects_archive ? 'post type-page projects-listing-archive' : join(' ', get_post_class());
            ?>
            <article id="post-<?php echo (int) $page_id_attr; ?>" class="<?php echo esc_attr($article_classes); ?>">
               <div class="entry-content">
                  <section class="projects-listing-section">
                     <div class="projects-listing-container">

                        <?php if ($intro_text) : ?>
                           <div class="projects-listing-intro">
                              <p><?php echo esc_html($intro_text); ?></p>
                           </div>
                        <?php endif; ?>

                        <!-- Category Tabs -->
                        <div class="projects-tabs" role="tablist">
                           <?php foreach ($tabs as $slug => $label) : ?>
                              <?php $count = count($projects_by_status[$slug]); ?>
                              <button type="button"
                                      class="projects-tab<?php echo $slug === $active_tab ? ' is-active' : ''; ?>"
                                      data-tab="<?php echo esc_attr($slug); ?>"
                                      role="tab"
                                      aria-selected="<?php echo $slug === $active_tab ? 'true' : 'false'; ?>"
                                      aria-controls="projects-tab-panel-<?php echo esc_attr($slug); ?>">
                                 <span class="projects-tab-label"><?php echo esc_html($label); ?></span>
                                 <span class="projects-tab-count">(<?php echo (int) $count; ?>)</span>
                              </button>
                           <?php endforeach; ?>
                        </div>

                        <!-- Tab Panels -->
                        <div class="projects-tabs-panels">
                           <?php foreach ($tabs as $slug => $label) : ?>
                              <div id="projects-tab-panel-<?php echo esc_attr($slug); ?>"
                                   class="projects-tab-panel<?php echo $slug === $active_tab ? ' is-active' : ''; ?>"
                                   role="tabpanel"
                                   data-tab-panel="<?php echo esc_attr($slug); ?>">

                                 <?php if (empty($projects_by_status[$slug])) : ?>
                                    <div class="projects-empty-state">
                                       <p><?php
                                          /* translators: %s: status label */
                                          printf(esc_html__('No %s available yet. Check back soon.', 'as-theme'), esc_html(strtolower($label)) . 's');
                                       ?></p>
                                    </div>
                                 <?php else : ?>
                                    <div class="projects-grid">
                                       <?php foreach ($projects_by_status[$slug] as $pid) :
                                          $p_title       = get_the_title($pid);
                                          $p_permalink   = get_permalink($pid);
                                          $p_image       = get_field('project_card_image', $pid);
                                          if (!$p_image) {
                                              $p_image = get_the_post_thumbnail_url($pid, 'large');
                                          }
                                          $p_subtitle    = get_field('project_card_subtitle', $pid);
                                          $p_location    = get_field('project_card_location', $pid);
                                          $p_description = get_field('project_card_description', $pid);
                                          $p_beds        = get_field('project_card_beds', $pid);
                                          $p_baths       = get_field('project_card_baths', $pid);
                                          $p_sqft        = get_field('project_card_sqft', $pid);
                                          $p_btn_text    = get_field('project_card_button_text', $pid) ?: __('Explore', 'as-theme');
                                          $has_meta      = ($p_beds !== '' && $p_beds !== null) || ($p_baths !== '' && $p_baths !== null) || $p_sqft;
                                       ?>
                                       <article class="projects-card">
                                          <a class="projects-card-image-link" href="<?php echo esc_url($p_permalink); ?>">
                                             <div class="projects-card-image-wrap">
                                                <?php if ($p_image) : ?>
                                                   <img loading="lazy" decoding="async" src="<?php echo esc_url($p_image); ?>" alt="<?php echo esc_attr($p_title); ?>">
                                                <?php else : ?>
                                                   <div class="projects-card-image-placeholder" aria-hidden="true"></div>
                                                <?php endif; ?>
                                                <span class="projects-card-badge projects-card-badge-<?php echo esc_attr($slug); ?>">
                                                   <?php echo esc_html($label); ?>
                                                </span>
                                             </div>
                                          </a>
                                          <div class="projects-card-content">
                                             <?php if ($p_subtitle) : ?>
                                                <div class="projects-card-subtitle"><?php echo esc_html($p_subtitle); ?></div>
                                             <?php endif; ?>
                                             <h4 class="projects-card-title">
                                                <a href="<?php echo esc_url($p_permalink); ?>"><?php echo esc_html($p_title); ?></a>
                                             </h4>
                                             <?php if ($p_location) : ?>
                                                <div class="projects-card-location">
                                                   <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 21s-7-7.5-7-12a7 7 0 1 1 14 0c0 4.5-7 12-7 12z"/><circle cx="12" cy="9" r="2.5"/></svg>
                                                   <span><?php echo esc_html($p_location); ?></span>
                                                </div>
                                             <?php endif; ?>
                                             <?php if ($p_description) : ?>
                                                <p class="projects-card-description"><?php echo esc_html($p_description); ?></p>
                                             <?php endif; ?>
                                             <?php if ($has_meta) : ?>
                                                <ul class="projects-card-meta">
                                                   <?php if ($p_beds !== '' && $p_beds !== null) : ?>
                                                      <li><span class="meta-label">Bed</span><span class="meta-value"><?php echo intval($p_beds); ?></span></li>
                                                   <?php endif; ?>
                                                   <?php if ($p_baths !== '' && $p_baths !== null) : ?>
                                                      <li><span class="meta-label">Bath</span><span class="meta-value"><?php echo intval($p_baths); ?></span></li>
                                                   <?php endif; ?>
                                                   <?php if ($p_sqft) : ?>
                                                      <li><span class="meta-label">Sqft</span><span class="meta-value"><?php echo esc_html($p_sqft); ?></span></li>
                                                   <?php endif; ?>
                                                </ul>
                                             <?php endif; ?>
                                             <a class="projects-card-link" href="<?php echo esc_url($p_permalink); ?>">
                                                <span><?php echo esc_html($p_btn_text); ?></span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 32 32" aria-hidden="true">
                                                   <path d="M18.4 6l-1.68 1.75 6.72 7h-19.44v2.5h19.44l-6.72 7 1.68 1.75 9.6-10-9.6-10z" fill="currentColor"/>
                                                </svg>
                                             </a>
                                          </div>
                                       </article>
                                       <?php endforeach; ?>
                                    </div>
                                 <?php endif; ?>
                              </div>
                           <?php endforeach; ?>
                        </div>

                     </div>
                  </section>
               </div>
            </article>
         </main>
      </div>
   </div>
</div>

<style>
   /* ---------- Projects Listing ---------- */
   .projects-listing-section {
      display: block;
      padding: 90px 0 120px;
      background: #fff;
   }
   .projects-listing-section *,
   .projects-listing-section *::before,
   .projects-listing-section *::after { box-sizing: border-box; }

   .projects-listing-container {
      display: block;
      width: 100%;
      max-width: 1320px;
      margin: 0 auto;
      padding: 0 24px;
   }

   .projects-listing-intro {
      max-width: 760px;
      margin: 0 auto 40px;
      text-align: center;
   }
   .projects-listing-intro p {
      font-size: 16px;
      line-height: 1.75;
      color: var(--e-global-color-text, #555);
      margin: 0;
   }

   /* ---------- Tabs ---------- */
   .projects-tabs {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 0;
      margin: 0 auto 60px;
      border-bottom: 1px solid rgba(0,0,0,.08);
   }
   .projects-tab {
      font-family: inherit;
      font-size: 13px;
      font-weight: 500;
      letter-spacing: .18em;
      text-transform: uppercase;
      background: transparent;
      border: 0;
      cursor: pointer;
      padding: 18px 30px;
      color: var(--e-global-color-text, #666);
      position: relative;
      transition: color .25s ease;
      line-height: 1;
   }
   .projects-tab:hover { color: var(--e-global-color-primary, #96796E); }
   .projects-tab.is-active { color: var(--e-global-color-primary, #96796E); }
   .projects-tab.is-active::after {
      content: "";
      position: absolute;
      left: 24px;
      right: 24px;
      bottom: -1px;
      height: 2px;
      background: var(--e-global-color-primary, #96796E);
   }
   .projects-tab-count {
      margin-left: 6px;
      opacity: .55;
      font-size: 11px;
      letter-spacing: .12em;
   }
   .projects-tab-panel { display: none; }
   .projects-tab-panel.is-active { display: block; }

   /* ---------- Grid ---------- */
   .projects-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 36px 30px;
   }
   @media (max-width: 1024px) { .projects-grid { grid-template-columns: repeat(2, 1fr); } }
   @media (max-width: 640px)  { .projects-grid { grid-template-columns: 1fr; gap: 28px; } }

   /* ---------- Card ---------- */
   .projects-card {
      background: #fff;
      display: flex;
      flex-direction: column;
      transition: transform .35s ease;
   }
   .projects-card-image-link {
      display: block;
      text-decoration: none;
      color: inherit;
   }
   .projects-card-image-wrap {
      position: relative;
      overflow: hidden;
      aspect-ratio: 4 / 3;
      background: #f3efe9;
   }
   .projects-card-image-wrap img {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      transition: transform .8s ease;
   }
   .projects-card-image-placeholder {
      position: absolute; inset: 0;
      background: linear-gradient(135deg, #efe8df 0%, #d9cdc1 100%);
   }
   .projects-card:hover .projects-card-image-wrap img { transform: scale(1.05); }

   .projects-card-badge {
      position: absolute;
      top: 18px;
      left: 18px;
      padding: 7px 14px;
      font-size: 10px;
      font-weight: 600;
      letter-spacing: .18em;
      text-transform: uppercase;
      color: #fff;
      background: rgba(20,20,20,.55);
      backdrop-filter: blur(6px);
      -webkit-backdrop-filter: blur(6px);
      border-radius: 2px;
      z-index: 2;
   }
   .projects-card-badge-upcoming  { background: #c9a25a; }
   .projects-card-badge-ongoing   { background: #96796E; }
   .projects-card-badge-completed { background: #4a6e58; }

   .projects-card-content {
      padding: 22px 4px 8px;
      display: flex;
      flex-direction: column;
      gap: 10px;
   }
   .projects-card-subtitle {
      font-size: 11px;
      letter-spacing: .22em;
      text-transform: uppercase;
      color: var(--e-global-color-primary, #96796E);
      margin: 0;
   }
   .projects-card-title {
      margin: 0;
      font-size: 22px;
      line-height: 1.25;
      font-weight: 500;
      letter-spacing: .01em;
      color: #1a1a1a;
   }
   .projects-card-title a {
      color: #1a1a1a;
      text-decoration: none;
      transition: color .2s ease;
   }
   .projects-card-title a:hover { color: var(--e-global-color-primary, #96796E); }
   .projects-card-location {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      font-size: 13px;
      color: #777;
      letter-spacing: .02em;
   }
   .projects-card-location svg { color: var(--e-global-color-primary, #96796E); flex: 0 0 auto; }
   .projects-card-description {
      font-size: 14px;
      line-height: 1.65;
      color: #666;
      margin: 0;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
   }

   .projects-card-meta {
      list-style: none;
      margin: 6px 0 0;
      padding: 14px 0 0;
      border-top: 1px solid rgba(0,0,0,.08);
      display: flex;
      flex-wrap: wrap;
      gap: 0;
   }
   .projects-card-meta li {
      display: inline-flex;
      align-items: baseline;
      gap: 6px;
      padding-right: 16px;
      margin-right: 16px;
      border-right: 1px solid rgba(0,0,0,.08);
      font-size: 12px;
      color: #777;
      letter-spacing: .04em;
      text-transform: uppercase;
   }
   .projects-card-meta li:last-child { border-right: 0; margin-right: 0; padding-right: 0; }
   .projects-card-meta .meta-value {
      color: #1a1a1a;
      font-weight: 600;
      font-size: 14px;
   }

   .projects-card-link {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      margin-top: 14px;
      padding: 0;
      font-size: 12px;
      font-weight: 600;
      letter-spacing: .18em;
      text-transform: uppercase;
      color: #1a1a1a;
      text-decoration: none;
      align-self: flex-start;
      transition: color .25s ease, gap .25s ease;
   }
   .projects-card-link svg { transition: transform .3s ease; }
   .projects-card-link:hover {
      color: var(--e-global-color-primary, #96796E);
      gap: 14px;
   }
   .projects-card-link:hover svg { transform: translateX(4px); }

   /* ---------- Empty state ---------- */
   .projects-empty-state {
      text-align: center;
      padding: 80px 20px;
      color: #888;
      font-size: 14px;
      letter-spacing: .05em;
      background: #faf7f3;
      border-radius: 4px;
   }

   /* Small banner subtitle override on the breadcrumb */
   .breadcrumb .easto-subtitle {
      margin-top: 12px;
      margin-bottom: 0;
      color: #fff;
      opacity: .85;
      font-size: 15px;
      letter-spacing: .04em;
   }
</style>

<script>
(function () {
    var tabs = document.querySelectorAll('.projects-tab');
    var panels = document.querySelectorAll('.projects-tab-panel');
    if (!tabs.length) return;

    tabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            var target = tab.getAttribute('data-tab');
            tabs.forEach(function (t) {
                var active = t.getAttribute('data-tab') === target;
                t.classList.toggle('is-active', active);
                t.setAttribute('aria-selected', active ? 'true' : 'false');
            });
            panels.forEach(function (panel) {
                panel.classList.toggle('is-active', panel.getAttribute('data-tab-panel') === target);
            });
        });
    });
})();
</script>
