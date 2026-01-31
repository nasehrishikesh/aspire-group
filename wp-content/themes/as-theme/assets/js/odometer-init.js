/**
 * Odometer Counter Initialization
 * Initializes and animates odometer counters when they come into viewport
 */
(function($) {
    'use strict';

    // Initialize odometer counters
    function initOdometer() {
        // Check if Odometer is available
        if (typeof Odometer === 'undefined') {
            console.warn('Odometer library not loaded');
            return;
        }

        // Find all odometer elements
        var odometerElements = document.querySelectorAll('.odometer');

        if (odometerElements.length === 0) {
            return;
        }

        // Set up Intersection Observer for viewport detection
        var observerOptions = {
            threshold: 0.5, // Trigger when 50% of element is visible
            rootMargin: '0px'
        };

        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting && !entry.target.classList.contains('odometer-animated')) {
                    animateOdometer(entry.target);
                    entry.target.classList.add('odometer-animated');
                }
            });
        }, observerOptions);

        // Initialize each odometer
        odometerElements.forEach(function(element) {
            // Get target value from data-count attribute
            var targetValue = parseInt(element.getAttribute('data-count')) || 0;

            // Clear existing content
            element.innerHTML = '';

            // Set initial value to 0
            element.textContent = '0';

            // Create Odometer instance
            var od = new Odometer({
                el: element,
                value: 0,
                format: '',
                theme: 'default',
                duration: 2000,
                animation: 'count'
            });

            // Store target value
            element.setAttribute('data-target', targetValue);

            // Observe element for viewport entry
            observer.observe(element);
        });
    }

    // Animate odometer to target value
    function animateOdometer(element) {
        var targetValue = parseInt(element.getAttribute('data-target')) || 0;

        // Small delay to ensure smooth animation
        setTimeout(function() {
            if (window.Odometer) {
                // Update to target value - this triggers the animation
                element.innerHTML = targetValue;
            }
        }, 100);
    }

    // Initialize on document ready
    $(document).ready(function() {
        // Wait a bit for odometer library to be fully loaded
        setTimeout(initOdometer, 300);
    });

    // Also initialize on Elementor frontend init (if Elementor is present)
    $(window).on('elementor/frontend/init', function() {
        setTimeout(initOdometer, 300);
    });

})(jQuery);
