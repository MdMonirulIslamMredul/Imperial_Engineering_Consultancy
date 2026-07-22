/**
 * Custom Red Mouse Follower Pointer JS with Text Magnifying Lens Effect
 * Imperial Engineering Consultancy
 */

document.addEventListener('DOMContentLoaded', function () {
    // Disable on touch devices or screens smaller than 768px
    if (window.matchMedia('(pointer: coarse)').matches || window.innerWidth <= 768) {
        return;
    }

    const container = document.getElementById('iec-mouse-follower');
    if (!container) return;

    const dot = container.querySelector('.iec-cursor-dot');
    if (!dot) return;

    let targetX = window.innerWidth / 2;
    let targetY = window.innerHeight / 2;

    let currentX = targetX;
    let currentY = targetY;

    let isVisible = false;

    // Linear interpolation helper
    function lerp(start, end, amt) {
        return (1 - amt) * start + amt * end;
    }

    // Text & interactive element selectors for magnifying lens trigger
    const textSelectors = 'h1, h2, h3, h4, h5, h6, p, span, a, li, label, strong, em, b, i, th, td, blockquote, input, textarea, select, button, .btn, .nav-link, [role="button"], .card, .go-top, .title, .tx-title, .tx-description, .clickable';

    // Header & Footer Exclusion Selectors (Disable magnification in Header & Footer)
    const headerFooterSelectors = 'header, footer, .header, .footer, .navbar-area, .modern-footer, .site-header, .site-footer, #header, #footer, .footer-area, .copy-right-area';

    // Mouse Movement Listener
    document.addEventListener('mousemove', function (e) {
        targetX = e.clientX;
        targetY = e.clientY;

        if (!isVisible) {
            isVisible = true;
            container.classList.remove('iec-cursor-hidden');
            currentX = targetX;
            currentY = targetY;
        }
    });

    // Mouse Leave Window
    document.addEventListener('mouseleave', function () {
        isVisible = false;
        container.classList.add('iec-cursor-hidden');
    });

    // Mouse Enter Window
    document.addEventListener('mouseenter', function () {
        isVisible = true;
        container.classList.remove('iec-cursor-hidden');
    });

    // Mouse Down (Click Press)
    document.addEventListener('mousedown', function () {
        container.classList.add('iec-cursor-active');
    });

    // Mouse Up (Click Release)
    document.addEventListener('mouseup', function () {
        container.classList.remove('iec-cursor-active');
    });

    // Hover Delegation for Text Elements & Magnifying Lens (Excluding Header & Footer)
    document.body.addEventListener('mouseover', function (e) {
        if (e.target) {
            // Disable magnification feature in header and footer
            if (e.target.closest(headerFooterSelectors)) {
                container.classList.remove('iec-cursor-text-hover');
                return;
            }

            if (e.target.closest(textSelectors)) {
                container.classList.add('iec-cursor-text-hover');
            }
        }
    });

    document.body.addEventListener('mouseout', function (e) {
        if (e.target) {
            if (e.target.closest(headerFooterSelectors) || e.target.closest(textSelectors)) {
                const related = e.relatedTarget;
                if (!related || related.closest(headerFooterSelectors) || !related.closest(textSelectors)) {
                    container.classList.remove('iec-cursor-text-hover');
                }
            }
        }
    });

    // 60 FPS Render Loop with Smooth Physics (Lerp)
    function animate() {
        if (isVisible) {
            // Smoothly interpolate dot position towards mouse coordinates
            currentX = lerp(currentX, targetX, 0.22);
            currentY = lerp(currentY, targetY, 0.22);

            // Apply transform using translate3d for hardware acceleration
            dot.style.transform = `translate3d(${currentX}px, ${currentY}px, 0) translate(-50%, -50%)`;
        }

        requestAnimationFrame(animate);
    }

    // Start animation loop
    requestAnimationFrame(animate);
});
