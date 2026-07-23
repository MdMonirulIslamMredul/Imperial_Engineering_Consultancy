/**
 * Custom Red Mouse Follower Pointer JS
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

    // Static text selectors for magnifying lens trigger
    const textSelectors = 'h1, h2, h3, h4, h5, h6, p, blockquote, th, td, label';

    // Interactive element selectors (Buttons, links, inputs) - Magnification is DISABLED here
    const interactiveSelectors = 'a, button, .btn, [role="button"], input, textarea, select, .nav-link, .clickable, .go-top';

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

    // Hover Delegation for Text Elements & Interactive Buttons/Links
    document.body.addEventListener('mouseover', function (e) {
        if (!e.target) return;

        const isInteractive = e.target.closest(interactiveSelectors);
        const isHeaderFooter = e.target.closest(headerFooterSelectors);

        // If hovering over buttons or links, disable magnification completely so hover color changes are visible
        if (isInteractive) {
            container.classList.remove('iec-cursor-text-hover');
            container.classList.add('iec-cursor-link-hover');
            return;
        } else {
            container.classList.remove('iec-cursor-link-hover');
        }

        // Disable magnification in header and footer
        if (isHeaderFooter) {
            container.classList.remove('iec-cursor-text-hover');
            return;
        }

        // Apply magnifying lens ONLY to non-interactive static body text
        if (e.target.closest(textSelectors)) {
            container.classList.add('iec-cursor-text-hover');
        } else {
            container.classList.remove('iec-cursor-text-hover');
        }
    });

    document.body.addEventListener('mouseout', function (e) {
        if (!e.target) return;
        const related = e.relatedTarget;

        if (!related || related.closest(interactiveSelectors) || !related.closest(textSelectors) || related.closest(headerFooterSelectors)) {
            container.classList.remove('iec-cursor-text-hover');
        }

        if (!related || !related.closest(interactiveSelectors)) {
            container.classList.remove('iec-cursor-link-hover');
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
