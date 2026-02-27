/* Home Page JavaScript */

// Lazyload Observer for Background Images
const lazyloadRunObserver = () => {
    const lazyloadBackgrounds = document.querySelectorAll(`.e-con.e-parent:not(.e-lazyloaded)`);
    const lazyloadBackgroundObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                let lazyloadBackground = entry.target;
                if (lazyloadBackground) {
                    lazyloadBackground.classList.add('e-lazyloaded');
                }
                lazyloadBackgroundObserver.unobserve(entry.target);
            }
        });
    }, { rootMargin: '200px 0px 200px 0px' });
    lazyloadBackgrounds.forEach((lazyloadBackground) => {
        lazyloadBackgroundObserver.observe(lazyloadBackground);
    });
};

const events = [
    'DOMContentLoaded',
    'elementor/lazyload/observe',
];

events.forEach((event) => {
    document.addEventListener(event, lazyloadRunObserver);
});

// Contact Form 7 Configuration
var wpcf7 = {
    "api": {
        "root": "./",
        "namespace": "contact-form-7/v1"
    }
};

// WP Util Settings
var _wpUtilSettings = {
    "ajax": {
        "url": "./admin-ajax.php"
    }
};

// Easto Ajax Settings
var eastoAjax = {
    "ajaxurl": "./admin-ajax.php",
    "i18n": {
        "sale_text": "Save"
    }
};

// Elementor Frontend Config
var elementorFrontendConfig = {
    "environmentMode": {
        "edit": false,
        "wpPreview": false,
        "isScriptDebug": false
    },
    "i18n": {
        "shareOnFacebook": "Share on Facebook",
        "shareOnTwitter": "Share on Twitter",
        "pinIt": "Pin it",
        "download": "Download",
        "downloadImage": "Download image",
        "fullscreen": "Fullscreen",
        "zoom": "Zoom",
        "share": "Share",
        "playVideo": "Play Video",
        "previous": "Previous",
        "next": "Next",
        "close": "Close",
        "a11yCarouselWrapperAriaLabel": "Carousel | Horizontal scrolling: Arrow Left & Right",
        "a11yCarouselPrevSlideMessage": "Previous slide",
        "a11yCarouselNextSlideMessage": "Next slide",
        "a11yCarouselFirstSlideMessage": "This is the first slide",
        "a11yCarouselLastSlideMessage": "This is the last slide",
        "a11yCarouselPaginationBulletMessage": "Go to slide"
    },
    "is_rtl": false,
    "breakpoints": {
        "xs": 0,
        "sm": 480,
        "md": 768,
        "lg": 1025,
        "xl": 1440,
        "xxl": 1600
    },
    "responsive": {
        "breakpoints": {
            "mobile": {
                "label": "Mobile Portrait",
                "value": 767,
                "default_value": 767,
                "direction": "max",
                "is_enabled": true
            },
            "mobile_extra": {
                "label": "Mobile Landscape",
                "value": 880,
                "default_value": 880,
                "direction": "max",
                "is_enabled": true
            },
            "tablet": {
                "label": "Tablet Portrait",
                "value": 1024,
                "default_value": 1024,
                "direction": "max",
                "is_enabled": true
            },
            "tablet_extra": {
                "label": "Tablet Landscape",
                "value": 1200,
                "default_value": 1200,
                "direction": "max",
                "is_enabled": true
            },
            "laptop": {
                "label": "Laptop",
                "value": 1366,
                "default_value": 1366,
                "direction": "max",
                "is_enabled": true
            },
            "widescreen": {
                "label": "Widescreen",
                "value": 2400,
                "default_value": 2400,
                "direction": "min",
                "is_enabled": false
            }
        }
    },
    "version": "3.22.1",
    "is_static": false,
    "experimentalFeatures": {
        "e_optimized_assets_loading": true,
        "e_optimized_css_loading": true,
        "e_font_icon_svg": true,
        "additional_custom_breakpoints": true,
        "container": true,
        "container_grid": true,
        "e_swiper_latest": true,
        "e_onboarding": true,
        "home_screen": true,
        "ai-layout": true,
        "landing-pages": true,
        "nested-elements": true,
        "e_lazyload": true
    },
    "urls": {
        "assets": "assets/"
    },
    "swiperClass": "swiper",
    "settings": {
        "page": [],
        "editorPreferences": []
    },
    "kit": {
        "active_breakpoints": ["viewport_mobile", "viewport_mobile_extra", "viewport_tablet", "viewport_tablet_extra", "viewport_laptop"],
        "global_image_lightbox": "yes",
        "lightbox_enable_counter": "yes",
        "lightbox_enable_fullscreen": "yes",
        "lightbox_enable_zoom": "yes",
        "lightbox_enable_share": "yes",
        "lightbox_title_src": "title",
        "lightbox_description_src": "description"
    },
    "post": {
        "id": 36,
        "title": "Easto – Single Property",
        "excerpt": "",
        "featuredImage": false
    }
};

// Amenities Swiper + Icon List Sync
document.addEventListener('DOMContentLoaded', function() {
    var amenitiesSwiperEl = document.querySelector('.amenities-swiper');
    var navItems = document.querySelectorAll('.amenities-nav-item');

    if (amenitiesSwiperEl && navItems.length > 0 && typeof Swiper !== 'undefined') {
        var amenitiesSwiper = new Swiper('.amenities-swiper', {
            slidesPerView: 1,
            loop: true,
            speed: 500,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.amenities-swiper-pagination',
                clickable: true,
                renderBullet: function (index, className) {
                    return '<span class="' + className + '" data-number="' + String(index + 1).padStart(2, '0') + '" tabindex="0"></span>';
                },
            },
        });

        function updateActiveNavItem(realIndex) {
            navItems.forEach(function(item) {
                item.classList.remove('active');
            });
            if (navItems[realIndex]) {
                navItems[realIndex].classList.add('active');
            }
        }

        // Click icon list item → slide swiper
        navItems.forEach(function(item) {
            item.addEventListener('click', function() {
                var slideIndex = parseInt(this.getAttribute('data-slide-index'), 10);
                amenitiesSwiper.slideToLoop(slideIndex);
                updateActiveNavItem(slideIndex);
            });
        });

        // Swiper slide change → update active list item
        amenitiesSwiper.on('slideChange', function() {
            updateActiveNavItem(amenitiesSwiper.realIndex);
        });
    }
});

// Counter Animation on Scroll
document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('.elementor-counter-number');

    if (counters.length > 0) {
        // Function to animate a single counter
        function animateCounter(counter) {
            if (counter.classList.contains('counter-animated')) return;

            const target = parseInt(counter.getAttribute('data-to-value')) || 0;
            const start = parseInt(counter.getAttribute('data-from-value')) || 0;
            const duration = parseInt(counter.getAttribute('data-duration')) || 2000;
            const delimiter = counter.getAttribute('data-delimiter') || ',';

            counter.classList.add('counter-animated');

            const startTime = performance.now();

            function updateCounter(currentTime) {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);

                // Easing function (ease-out)
                const easeOut = 1 - Math.pow(1 - progress, 3);

                const current = Math.floor(start + (target - start) * easeOut);

                // Format number with delimiter
                counter.textContent = current.toLocaleString('en-US');

                if (progress < 1) {
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target.toLocaleString('en-US');
                }
            }

            // Start from 0
            counter.textContent = start.toLocaleString('en-US');
            requestAnimationFrame(updateCounter);
        }

        // Intersection Observer to trigger animation when in view
        const counterObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    counterObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.5,
            rootMargin: '0px 0px -50px 0px'
        });

        counters.forEach(function(counter) {
            // Set initial value to 0
            counter.textContent = '0';
            counterObserver.observe(counter);
        });
    }
});

// Hero Slider Initialization
document.addEventListener('DOMContentLoaded', function() {
    const heroSwiperEl = document.querySelector('.hero-swiper');

    if (heroSwiperEl && typeof Swiper !== 'undefined') {
        // Get settings from data attribute
        let swiperSettings = {
            slidesPerView: 1,
            effect: 'fade',
            speed: 1000,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            fadeEffect: {
                crossFade: true
            },
            pagination: {
                el: '.hero-swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.hero-swiper-button-next',
                prevEl: '.hero-swiper-button-prev',
            },
        };

        // Parse custom settings from data attribute
        const dataSettings = heroSwiperEl.getAttribute('data-settings');
        if (dataSettings) {
            try {
                const customSettings = JSON.parse(dataSettings);
                swiperSettings = { ...swiperSettings, ...customSettings };

                // Ensure pagination and navigation are always included
                swiperSettings.pagination = {
                    el: '.hero-swiper-pagination',
                    clickable: true,
                };
                swiperSettings.navigation = {
                    nextEl: '.hero-swiper-button-next',
                    prevEl: '.hero-swiper-button-prev',
                };
            } catch (e) {
                console.error('Error parsing hero slider settings:', e);
            }
        }

        // Initialize Swiper
        const heroSwiper = new Swiper('.hero-swiper', swiperSettings);

        // Function to reset and replay animations on slide change
        function resetSlideAnimations(swiper) {
            // Get all animated elements in the active slide
            const activeSlide = swiper.slides[swiper.activeIndex];
            if (activeSlide) {
                const animatedElements = activeSlide.querySelectorAll('.hero-animate');
                animatedElements.forEach(function(el) {
                    // Remove animation by briefly removing the class
                    el.style.animation = 'none';
                    // Trigger reflow
                    el.offsetHeight;
                    // Re-add animation
                    el.style.animation = '';
                });
            }
        }

        // Trigger animations on slide change
        heroSwiper.on('slideChangeTransitionStart', function() {
            resetSlideAnimations(heroSwiper);
        });

        // Also trigger on init for the first slide
        resetSlideAnimations(heroSwiper);

        // Initialize background videos in slides
        const videoEmbeds = heroSwiperEl.querySelectorAll('.elementor-background-video-embed[data-video-url]');
        videoEmbeds.forEach(function(embed) {
            const videoUrl = embed.getAttribute('data-video-url');
            if (videoUrl) {
                // Check if it's a Vimeo URL
                if (videoUrl.includes('vimeo.com')) {
                    const vimeoId = videoUrl.match(/vimeo\.com\/(\d+)/);
                    if (vimeoId && vimeoId[1]) {
                        embed.innerHTML = '<iframe src="https://player.vimeo.com/video/' + vimeoId[1] + '?background=1&autoplay=1&loop=1&muted=1" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>';
                    }
                }
                // Check if it's a YouTube URL
                else if (videoUrl.includes('youtube.com') || videoUrl.includes('youtu.be')) {
                    let youtubeId = '';
                    if (videoUrl.includes('youtu.be/')) {
                        youtubeId = videoUrl.split('youtu.be/')[1].split('?')[0];
                    } else {
                        const match = videoUrl.match(/[?&]v=([^&]+)/);
                        if (match) youtubeId = match[1];
                    }
                    if (youtubeId) {
                        embed.innerHTML = '<iframe src="https://www.youtube.com/embed/' + youtubeId + '?autoplay=1&mute=1&loop=1&playlist=' + youtubeId + '&controls=0&showinfo=0&rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
                    }
                }
            }
        });
    }
});

// Neighborhood Accordion Toggle
document.addEventListener('DOMContentLoaded', function() {
    var accordionHeaders = document.querySelectorAll('.neighborhood-accordion-header');

    if (accordionHeaders.length > 0) {
        accordionHeaders.forEach(function(header) {
            header.addEventListener('click', function() {
                var accordion = this.parentElement;
                var body = accordion.querySelector('.neighborhood-accordion-body');
                var isActive = accordion.classList.contains('active');

                // Close all accordions
                document.querySelectorAll('.neighborhood-accordion').forEach(function(item) {
                    item.classList.remove('active');
                    item.querySelector('.neighborhood-accordion-body').style.display = 'none';
                });

                // Open clicked one if it was closed
                if (!isActive) {
                    accordion.classList.add('active');
                    body.style.display = 'block';
                }
            });
        });
    }
});
