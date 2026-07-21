<style>
    /* ============================================================
       NAVBAR – Redesign based on reference image
       ============================================================ */
    .navbar-area {
        position: relative;
        width: 100%;
        z-index: 999;
        background: #9a1616; /* Dark red matching the image */
        padding-top: 0 !important;
        padding-bottom: 0 !important;
    }

    .nt-nav-inner {
        display: flex;
        align-items: stretch; 
        justify-content: space-between;
        height: 80px;
        padding: 0 2rem;
        max-width: 1600px;
        margin: 0 auto;
    }

    /* Left Section */
    .nav-left {
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }

    .grid-btn {
        background: transparent;
        border: none;
        padding: 0;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .grid-btn svg {
        width: 24px;
        height: 24px;
        fill: #ffffff;
    }

    .nt-logo {
        display: flex;
        align-items: center;
        text-decoration: none;
        background: transparent;
    }

    .nt-logo img {
        max-height: 55px;
        width: auto;
        border-radius: 8px; /* Rounded corners for header logo */
    }

    /* Center Section: Navigation */
    .nav-center {
        display: flex;
        align-items: stretch;
        flex: 1;
        justify-content: center;
    }

    .nt-nav-links {
        display: flex;
        align-items: stretch;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .nt-nav-links .nt-nav-item {
        display: flex;
        align-items: stretch;
        position: relative;
    }

    .nt-nav-links .nt-nav-link {
        display: flex;
        align-items: center;
        color: #ffffff !important;
        font-size: 1.05rem;
        font-weight: 500;
        padding: 0 1.5rem;
        text-decoration: none;
        transition: background 0.2s ease, color 0.2s ease;
    }

    .nt-nav-links .nt-nav-item.active .nt-nav-link,
    .nt-nav-links .nt-nav-link:hover,
    .nt-nav-links .nt-nav-link:focus {
        background: #df5818; /* Bright Orange */
        color: #ffffff !important;
    }

    /* Dropdown Arrow */
    .nt-nav-item.has-dropdown .nt-nav-link::after {
        content: "";
        display: inline-block;
        margin-left: 8px;
        width: 0;
        height: 0;
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
        border-top: 5px solid rgba(255,255,255,0.7);
        transition: transform 0.2s;
    }
    .nt-nav-item.has-dropdown:hover .nt-nav-link::after {
        border-top-color: #ffffff;
        transform: rotate(180deg);
    }

    /* Dropdown Menu */
    .nt-dropdown {
        position: absolute;
        top: 100%;
        left: 0;
        background: #ffffff;
        border-top: 3px solid #df5818;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        min-width: 220px;
        padding: 0.5rem 0;
        opacity: 0;
        visibility: hidden;
        transform: translateY(10px);
        transition: all 0.25s ease;
        list-style: none;
        margin: 0;
        z-index: 1000;
    }

    .nt-nav-item.has-dropdown:hover .nt-dropdown {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .nt-dropdown li a {
        display: block;
        padding: 0.6rem 1.2rem;
        color: #333333;
        font-size: 0.95rem;
        text-decoration: none;
        transition: background 0.2s, color 0.2s;
    }

    .nt-dropdown li a:hover {
        background: rgba(223, 88, 24, 0.08);
        color: #df5818;
    }

    /* Right Section: Search & Hamburger */
    .nav-right {
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }

    .search-btn {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: rgba(255, 255, 255, 0.6);
        background: transparent;
        border: none;
        cursor: pointer;
        font-size: 1rem;
        padding: 0.5rem;
        transition: color 0.2s;
    }
    
    .search-btn:hover {
        color: #ffffff;
    }

    .search-btn svg {
        width: 20px;
        height: 20px;
        fill: currentColor;
    }

    /* Mobile Menu Icon */
    .nt-hamburger {
        display: none;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 5px;
        width: 40px;
        height: 40px;
        border: none;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 5px;
        cursor: pointer;
    }

    .nt-hamburger .line {
        display: block;
        width: 22px;
        height: 2px;
        background: #ffffff;
        transition: 0.3s;
    }

    .nt-hamburger:not(.collapsed) .line1 { transform: translateY(7px) rotate(45deg); }
    .nt-hamburger:not(.collapsed) .line2 { opacity: 0; }
    .nt-hamburger:not(.collapsed) .line3 { transform: translateY(-7px) rotate(-45deg); }

    /* Responsive adjustments */
    @media only screen and (max-width: 1250px) {
        .nt-nav-links .nt-nav-link {
            padding: 0 1rem;
            font-size: 0.95rem;
        }
    }

    @media only screen and (max-width: 1024px) {
        .nt-nav-inner {
            padding: 0 1rem;
        }
        .nav-center {
            display: none !important;
        }
        
        .nt-hamburger {
            display: flex;
        }

        .search-btn span {
            display: none;
        }
    }
    
    /* Mobile Panel */
    .nt-mobile-panel {
        background: #9a1616;
        border-top: 1px solid rgba(255,255,255,0.1);
    }
    .nt-mobile-list {
        list-style: none;
        margin: 0;
        padding: 1rem;
    }
    .nt-mobile-link {
        display: block;
        padding: 0.8rem 1rem;
        color: #ffffff !important;
        font-size: 1rem;
        font-weight: 500;
        text-decoration: none;
        border-bottom: 1px solid rgba(255,255,255,0.05);
    }
    .nt-mobile-link:hover,
    .nt-mobile-link.active {
        background: #df5818;
    }
</style>

@php
$pendingProjects = DB::table('projects')->where('is_active', 1)->where('status', 1)->latest()->get();
$runningProjects = DB::table('projects')->where('is_active', 1)->where('status', 2)->latest()->get();
$completeProjects = DB::table('projects')->where('is_active', 1)->where('status', 3)->latest()->get();
$services = DB::table('services')->where('is_active', 1)->latest()->get();
@endphp

<div class="navbar-area">
    <div class="container-fluid p-0">
        <div class="nt-nav-inner">
            
            {{-- Left: Logo --}}
            <div class="nav-left">
                <a class="nt-logo" href="/">
                    <img src="{{ asset(get_setting('frontend_logo_menu')) }}" alt="logo">
                </a>
            </div>

            {{-- Center: Desktop Nav Links --}}
            <div class="nav-center">
                <ul class="nt-nav-links">
                    <li class="nt-nav-item">
                        <a class="nt-nav-link" href="/">Home</a>
                    </li>
                    <li class="nt-nav-item {{ request()->is('about*') ? 'active' : '' }}">
                        <a class="nt-nav-link" href="{{ route('about.index') }}">About Us</a>
                    </li>
                    <li class="nt-nav-item has-dropdown {{ request()->is('service*') ? 'active' : '' }}">
                        <a class="nt-nav-link" href="/service">Services</a>
                        @if(isset($services) && count($services) > 0)
                        <ul class="nt-dropdown">
                            @foreach($services as $service)
                                <li><a href="/service">{{ $service->title ?? $service->name ?? 'Service' }}</a></li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    <li class="nt-nav-item {{ request()->is('destination*') ? 'active' : '' }}">
                        <a class="nt-nav-link" href="/destination">Destination</a>
                    </li>
                    <li class="nt-nav-item {{ request()->is('testimonial*') ? 'active' : '' }}">
                        <a class="nt-nav-link" href="/testimonial">Testimonials</a>
                    </li>
                    <li class="nt-nav-item {{ request()->is('blog*') ? 'active' : '' }}">
                        <a class="nt-nav-link" href="/blogs">Blogs &amp; Events</a>
                    </li>
                    <li class="nt-nav-item {{ request()->is('team*') ? 'active' : '' }}">
                        <a class="nt-nav-link" href="/teams">Our Team</a>
                    </li>
                    <li class="nt-nav-item {{ request()->is('contact*') ? 'active' : '' }}">
                        <a class="nt-nav-link" href="/contact">Contact Us</a>
                    </li>
                </ul>
            </div>

            {{-- Right: Search, Grid Icon & Mobile Toggle --}}
            <div class="nav-right">
                <button class="search-btn" aria-label="Search">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                    </svg>
                    <span>Search</span>
                </button>
                
                <button class="grid-btn" aria-label="Menu">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="5" cy="5" r="2.5"/>
                        <circle cx="12" cy="5" r="2.5"/>
                        <circle cx="19" cy="5" r="2.5"/>
                        <circle cx="5" cy="12" r="2.5"/>
                        <circle cx="12" cy="12" r="2.5"/>
                        <circle cx="19" cy="12" r="2.5"/>
                        <circle cx="5" cy="19" r="2.5"/>
                        <circle cx="12" cy="19" r="2.5"/>
                        <circle cx="19" cy="19" r="2.5"/>
                    </svg>
                </button>
                
                <button class="nt-hamburger collapsed" type="button"
                    data-bs-toggle="collapse" data-bs-target="#ntMobileNav"
                    aria-controls="ntMobileNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="line line1"></span>
                    <span class="line line2"></span>
                    <span class="line line3"></span>
                </button>
            </div>

        </div>

        {{-- Mobile Menu Panel --}}
        <div class="collapse nt-mobile-panel" id="ntMobileNav">
            <ul class="nt-mobile-list">
                <li><a class="nt-mobile-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a></li>
                <li><a class="nt-mobile-link {{ request()->is('about*') ? 'active' : '' }}" href="{{ route('about.index') }}">About Us</a></li>
                <li><a class="nt-mobile-link {{ request()->is('service*') ? 'active' : '' }}" href="/service">Services</a></li>
                <li><a class="nt-mobile-link {{ request()->is('destination*') ? 'active' : '' }}" href="/destination">Destination</a></li>
                <li><a class="nt-mobile-link {{ request()->is('testimonial*') ? 'active' : '' }}" href="/testimonial">Testimonials</a></li>
                <li><a class="nt-mobile-link {{ request()->is('blog*') ? 'active' : '' }}" href="/blogs">Blogs &amp; Events</a></li>
                <li><a class="nt-mobile-link {{ request()->is('team*') ? 'active' : '' }}" href="/teams">Our Team</a></li>
                <li><a class="nt-mobile-link {{ request()->is('contact*') ? 'active' : '' }}" href="/contact">Contact Us</a></li>
            </ul>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var mobileNav = document.getElementById('ntMobileNav');
        var toggler = document.querySelector('.nt-hamburger');
        
        if (mobileNav && toggler) {
            mobileNav.addEventListener('show.bs.collapse', function() {
                toggler.classList.remove('collapsed');
            });
            mobileNav.addEventListener('hide.bs.collapse', function() {
                toggler.classList.add('collapsed');
            });
        }

        window.addEventListener('resize', function() {
            if (window.innerWidth > 1024 && typeof bootstrap !== 'undefined' && mobileNav) {
                var instance = bootstrap.Collapse.getInstance(mobileNav);
                if (instance) instance.hide();
                else mobileNav.classList.remove('show');
            }
        });
    });
</script>