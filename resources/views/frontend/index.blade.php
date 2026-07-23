@extends('frontend.layouts.app')
<meta name="viewport" content="width=device-width, initial-scale=1" />
@section('content')

@section('title', __('Homepage'))

<title>{{ app_name() }} | @yield('title')</title>

@php
$sliders = DB::table('sliders')
->where('is_active', 1)
->get();
@endphp

<div class="banner-area" style="position: relative; margin-top: 0; padding-top: 0;">
    <div class="container-fluid p-0">
        <div class="hero-slider owl-carousel owl-theme" data-slider-id="1">
            @foreach ($sliders as $key => $slider)
            <div class="slider-item">
                <div class="slider-bg" style="background-image: url('{{ asset('setting/banner/' . $slider->image) }}');"></div>

                <div class="slider-content-new container">
                    <!-- Top Left Round Button -->
                    <div class="slider-top-btn">
                        <a href="{{ route('appointment.index') }}">
                            <i class="ri-arrow-right-up-line"></i>
                        </a>
                    </div>

                    <!-- Bottom Left Info Box -->
                    <div class="hero-info-box">
                        <h3>{!! $slider->header_title !!}</h3>
                        <div class="hero-stars">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <span>5</span>
                        </div>
                        <p>{{ $slider->bottom_title }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<style>
    /* ── Base resets ── */
    html,
    body {
        overflow-x: hidden;
        max-width: 100%;
    }

    .banner-area {
        position: relative;
        overflow: visible;
        max-width: 100%;
    }

    .banner-area .container-fluid {
        overflow: hidden;
        max-width: 100%;
    }

    .hero-slider .owl-stage-outer {
        overflow: hidden;
        max-width: 100%;
    }

    /* ── Slide shell ── */
    .hero-slider .owl-item,
    .hero-slider .owl-item .slider-item {
        height: 700px !important;
        min-height: 700px !important;
        max-height: 700px !important;
    }

    .slider-item {
        position: relative;
        overflow: hidden;
        height: 700px !important;
        min-height: 700px !important;
        max-height: 700px !important;
        display: flex !important;
        align-items: center;
    }

    .slider-bg {
        position: absolute;
        inset: 0;
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        transform: scale(1.05);
        will-change: transform;
        transition: transform 8s ease, filter 1s ease;
        filter: blur(8px);
    }

    .hero-slider .owl-item.active .slider-bg {
        transform: scale(1);
        filter: blur(0px);
    }

    .hero-slider .owl-item .slider-bg {
        opacity: 0;
        transition: opacity 1s ease, transform 8s ease, filter 1s ease;
    }

    .hero-slider .owl-item.active .slider-bg {
        opacity: 1;
    }

    /* ── New Content Layout ── */
    .slider-content-new {
        position: absolute;
        inset: 0;
        z-index: 5;
        width: 100%;
        max-width: 1400px;
        margin: 0 auto;
        pointer-events: none;
    }

    /* Top Left Button */
    .slider-top-btn {
        position: absolute;
        top: 80px;
        left: 40px;
        pointer-events: auto;
    }

    .slider-top-btn a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 60px;
        height: 60px;
        background: #ffffff;
        border-radius: 50%;
        color: #df5818;
        font-size: 24px;
        text-decoration: none;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        transition: 0.3s;
    }

    .slider-top-btn a:hover {
        transform: scale(1.1);
        background: #df5818;
        color: #ffffff;
    }

    /* Bottom Left Info Box */
    .hero-info-box {
        position: absolute;
        bottom: 80px;
        left: 40px;
        background: #ffffff;
        padding: 30px 40px;
        max-width: 480px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        border-radius: 20px;
        pointer-events: auto;
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 0.8s ease 0.4s, transform 0.8s ease 0.4s;
    }

    .hero-slider .owl-item.active .hero-info-box {
        opacity: 1;
        transform: translateY(0);
    }

    .hero-info-box h3 {
        color: #9a1616;
        font-size: 20px;
        font-weight: 700;
        margin: 0 0 10px;
        line-height: 1.3;
    }

    .hero-stars {
        display: flex;
        align-items: center;
        gap: 4px;
        margin-bottom: 15px;
    }

    .hero-stars i {
        color: #4a5c6a;
        font-size: 14px;
    }

    .hero-stars span {
        color: #4a5c6a;
        font-size: 14px;
        font-weight: 500;
        margin-left: 5px;
    }

    .hero-info-box p {
        color: #666;
        font-size: 14px;
        margin: 0;
        line-height: 1.6;
    }

    /* ── Hide/Style default Owl nav / dots ── */
    .hero-slider.owl-theme .owl-nav {
        display: none !important;
    }

    .hero-slider.owl-theme .owl-dots {
        position: absolute;
        right: 40px;
        top: 50%;
        transform: translateY(-50%);
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .hero-slider.owl-theme .owl-dots .owl-dot span {
        width: 10px;
        height: 10px;
        background: rgba(255, 255, 255, 0.4);
        border-radius: 50%;
        margin: 0;
        transition: 0.3s;
    }

    .hero-slider.owl-theme .owl-dots .owl-dot.active span,
    .hero-slider.owl-theme .owl-dots .owl-dot:hover span {
        background: #df5818;
    }

    /* ── Responsive ── */
    @media (max-width: 991px) {

        .hero-slider .owl-item,
        .hero-slider .owl-item .slider-item,
        .slider-item {
            height: 500px !important;
            min-height: 500px !important;
            max-height: 500px !important;
        }

        .slider-top-btn {
            top: 40px;
            left: 20px;
        }

        .hero-info-box {
            bottom: 40px;
            left: 20px;
            right: 20px;
            max-width: none;
            padding: 20px;
        }

        .hero-info-box h3 {
            font-size: 18px;
        }

        .hero-slider.owl-theme .owl-dots {
            right: 20px;
        }
    }

    @media (max-width: 575px) {

        .hero-slider .owl-item,
        .hero-slider .owl-item .slider-item,
        .slider-item {
            height: 420px !important;
            min-height: 420px !important;
            max-height: 420px !important;
        }

        .slider-top-btn a {
            width: 50px;
            height: 50px;
            font-size: 20px;
        }
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof jQuery !== 'undefined') {
            var $hero = jQuery('.hero-slider');
            var prevBtn = document.getElementById('heroPrev');
            var nextBtn = document.getElementById('heroNext');
            if (prevBtn) {
                prevBtn.addEventListener('click', function() {
                    $hero.trigger('prev.owl.carousel');
                });
            }
            if (nextBtn) {
                nextBtn.addEventListener('click', function() {
                    $hero.trigger('next.owl.carousel');
                });
            }

            // Sync slide counter + dot indicators with the Owl Carousel
            var dots = document.querySelectorAll('#heroDots .hero-dot');
            var counter = document.getElementById('heroCurrentSlide');

            dots.forEach(function(dot) {
                dot.addEventListener('click', function() {
                    var index = parseInt(dot.getAttribute('data-index'), 10) || 0;
                    $hero.trigger('to.owl.carousel', [index, 300]);
                });
            });

            $hero.on('changed.owl.carousel', function(e) {
                if (!e.item || typeof e.item.index === 'undefined') return;
                var owl = $hero.data('owl.carousel');
                var total = dots.length || e.item.count || 1;
                var current = owl ? owl.relative(e.item.index) : (e.item.index % total);
                current = ((current % total) + total) % total;

                dots.forEach(function(dot, i) {
                    dot.classList.toggle('active', i === current);
                });
                if (counter) {
                    counter.textContent = String(current + 1).padStart(2, '0');
                }
            });
        }
    });
</script>

<!-- Process/Features Section -->
<div class="process-section" style="background-color: #fffaf8; padding: 60px 0;">
    <div class="container">
        <div class="row process-row">

            <div class="col process-col" data-aos="fade-up" data-aos-duration="800">
                <div class="process-card">
                    <div class="process-icon">
                        <i class="ri-lightbulb-flash-line"></i>
                    </div>
                    <h4>Concept</h4>
                    <!-- <span class="process-dot"></span> -->
                </div>
            </div>

            <div class="col process-col" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                <div class="process-card">
                    <div class="process-icon">
                        <i class="ri-pencil-ruler-2-line"></i>
                    </div>
                    <h4>Design</h4>
                </div>
            </div>

            <div class="col process-col" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                <div class="process-card">
                    <div class="process-icon">
                        <i class="ri-file-list-3-line"></i>
                    </div>
                    <h4>Planning</h4>
                </div>
            </div>

            <div class="col process-col" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
                <div class="process-card">
                    <div class="process-icon">
                        <i class="ri-computer-line"></i>
                    </div>
                    <h4>Execution</h4>
                </div>
            </div>

            <div class="col process-col" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
                <div class="process-card">
                    <div class="process-icon">
                        <i class="ri-settings-4-line"></i>
                    </div>
                    <h4>Monitoring</h4>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    .process-section .container {
        max-width: 1400px;
    }

    .process-row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .process-col {
        flex: 1;
        min-width: 200px;
        max-width: 250px;
    }

    .process-card {
        background: #ffffff;
        border: 1px solid #f0e6e4;
        border-radius: 8px;
        padding: 40px 20px;
        text-align: center;
        position: relative;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .process-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
    }

    .process-icon {
        font-size: 45px;
        color: #9a1616;
        margin-bottom: 20px;
    }

    .process-card h4 {
        font-size: 16px;
        font-weight: 700;
        color: #1a1a2e;
        margin: 0;
    }

    .process-dot {
        display: inline-block;
        width: 8px;
        height: 8px;
        background: #9a1616;
        border-radius: 50%;
        margin-top: 20px;
    }

    @media (max-width: 991px) {
        .process-col {
            min-width: calc(33.333% - 20px);
        }
    }

    @media (max-width: 767px) {
        .process-col {
            min-width: calc(50% - 20px);
        }
    }

    @media (max-width: 575px) {
        .process-col {
            min-width: 100%;
        }
    }
</style>

<!-- About Section -->
<div class="about-section" style="background-color: #f8f9fa; padding: 100px 0 80px; position: relative; overflow: hidden; background-image: url('{{ asset('setting/banner/ENGINEERING-CONSULTANCY.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed;">
    <!-- Overlay gradient for better text readability and floating effect -->
    <div style="position: absolute; inset: 0; background: linear-gradient(to right, rgba(255,255,255,0.92) 0%, rgba(255,255,255,0.65) 50%, rgba(255,255,255,0.2) 100%);"></div>

    <div class="container" style="position: relative; z-index: 1;">
        <div class="row">
            <div class="col-lg-10 col-xl-9" data-aos="fade-left" data-aos-duration="1000">
                <div class="about-content">
                    <p style="font-size: 16px; font-weight: 600; color: #1a1a2e; margin-bottom: 8px;">
                        Established On 2011 A.D.
                    </p>
                    <h2 style="font-size: 42px; font-weight: 700; color: #C72027; margin-bottom: 20px; line-height: 1.2;">
                        {{ $about->title ?? 'Imperial Engineering & Consultancy' }}
                    </h2>
                    <div style="font-size: 15px; color: #333; line-height: 1.8; margin-bottom: 0;">
                        {!! $about->short_description ?? $about->description ?? 'Engineering Excellence from Concept to Completion - At IEC, we provide end-to-end solutions in Architectural Design, Civil Construction, Electrical Engineering, Solar Energy Systems, and Fire Safety Consultancy—delivering both expert consultancy and full-scale implementation. Backed by a seasoned team and global expertise, we serve both residential and industrial clients with smart, sustainable, and safe engineering solutions. From design to execution, IEC is your trusted partner in building the future with precision and integrity.' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Core Values Section -->
<div class="core-values-section" style="padding: 40px 0; background-color: rgba(250, 250, 250, 0.75); position: relative;">
    <!-- Faint background pattern -->
    <div style="position: absolute; inset: 0; background-image: radial-gradient(#e5e5e5 1px, transparent 1px); background-size: 25px 25px; opacity: 0.4;"></div>

    <div class="container" style="position: relative; z-index: 1;">
        <div class="row text-center">
            <!-- Consulting -->
            <div class="col-lg-4 col-md-6 mb-5 mb-lg-0" data-aos="fade-up" data-aos-duration="800">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="ri-user-voice-line"></i>
                    </div>
                    <h3 class="value-title">Consulting</h3>
                    <p class="value-text">IEC helps organizations achieve their goals through expert-driven, performance-focused solutions.</p>
                </div>
            </div>

            <!-- Strategy -->
            <div class="col-lg-4 col-md-6 mb-5 mb-lg-0 position-relative" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="ri-hand-coin-line"></i>
                    </div>
                    <h3 class="value-title">Strategy</h3>
                    <p class="value-text">At IEC, we deliver strategic, unbiased guidance backed by deep industry expertise to drive smart, high-impact decisions.</p>
                </div>
            </div>

            <!-- Team Work -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="ri-team-line"></i>
                    </div>
                    <h3 class="value-title">Team Work</h3>
                    <p class="value-text">At IEC, our team unites with purpose—combining expertise and collaboration to deliver results with maximum efficiency and impact.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .value-card {
        padding: 25px 20px;
        position: relative;
        z-index: 2;
        transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        border-radius: 4px;
        height: 100%;
        cursor: pointer;
    }

    .value-card:hover {
        background-color: #dcdcdc;
    }

    .value-icon {
        font-size: 60px;
        color: #9a1616;
        margin-bottom: 15px;
        display: inline-block;
        transition: transform 0.3s ease;
    }

    .value-card:hover .value-icon {
        transform: scale(1.08);
    }

    .value-title {
        font-size: 22px;
        font-weight: 800;
        color: #1a1a2e;
        margin-bottom: 15px;
        transition: color 0.3s ease;
    }

    .value-card:hover .value-title {
        color: #ba231b;
    }

    .value-text {
        font-size: 15px;
        color: #555;
        line-height: 1.7;
        margin: 0 auto;
        max-width: 320px;
        transition: color 0.3s ease;
    }

    .value-card:hover .value-text {
        color: #333;
    }

    .value-dot {
        position: absolute;
        left: -10px;
        top: 50%;
        transform: translateY(-50%);
        width: 8px;
        height: 8px;
        background-color: #9a1616;
        border-radius: 50%;
    }

    @media (max-width: 991px) {
        .value-dot {
            display: none;
        }
    }
</style>


<!-- Our Services Section -->
<div class="services-accordion-section" style="background-color: #400a0b; padding: 100px 0;">
    <div class="container-fluid pl-lg-5 pr-lg-0">
        <div class="row align-items-center m-0">
            <!-- Left Text -->
            <div class="col-lg-3 col-xl-3 mb-5 mb-lg-0" data-aos="fade-right" data-aos-duration="1000">
                <div class="sa-header pl-lg-4 pr-4">
                    <h2 style="font-size: 42px; font-weight: 700; color: #ffffff; margin-bottom: 20px;">Our Services</h2>
                    <p style="font-size: 13px; font-weight: 700; color: #ffffff; margin-bottom: 0;">Your Vision, Our Teamwork, Shared Success</p>
                </div>
            </div>

            <!-- Right Accordion -->
            <div class="col-lg-9 col-xl-9 p-0" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                <div class="sa-accordion">
                    @if(isset($services) && $services->count() > 0)
                    @foreach($services->take(5) as $index => $service)
                    <div class="sa-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="sa-item-collapsed">
                            @if($service->image1)
                            <div class="sa-thumb" style="background-image: url('{{ asset('/setting/service/' . $service->image1) }}');"></div>
                            @endif
                            <h4 class="sa-vert-title">{{ Str::upper(Str::limit($service->title, 40)) }}</h4>
                        </div>
                        <div class="sa-item-expanded">
                            <div class="sa-expanded-content">
                                <h3 class="sa-exp-title">{{ Str::upper($service->title) }}</h3>
                                @if($service->image1)
                                <img src="{{ asset('/setting/service/' . $service->image1) }}" alt="{{ $service->title }}" class="sa-exp-img">
                                @endif
                                <div class="sa-exp-text">
                                    {!! Str::limit(strip_tags($service->details1), 120) !!}
                                </div>
                                <a href="{{ route('service.show', $service->id) }}" style="display:inline-block; margin-top:15px; color:#400a0b; font-weight:700; text-decoration:none;">Read More <i class="ri-arrow-right-line"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .services-accordion-section {
        overflow: hidden;
    }

    .sa-accordion {
        display: flex;
        height: 600px;
        width: 100%;
        border-radius: 20px;
        overflow: hidden;
    }

    .sa-item {
        position: relative;
        height: 100%;
        cursor: pointer;
        transition: all 0.6s cubic-bezier(0.25, 1, 0.5, 1);
        flex: 0 0 85px;
        background-color: #555555;
        border-right: 1px solid rgba(255, 255, 255, 0.1);
        overflow: hidden;
    }

    .sa-item:last-child {
        border-right: none;
    }

    .sa-item.active {
        flex: 1 1 500px;
        background-color: #ffffff;
        cursor: default;
    }

    .sa-item-collapsed {
        position: absolute;
        top: 0;
        left: 0;
        width: 85px;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 40px;
        opacity: 1;
        transition: opacity 0.3s;
        z-index: 2;
    }

    .sa-item.active .sa-item-collapsed {
        opacity: 0;
        pointer-events: none;
    }

    .sa-thumb {
        width: 45px;
        height: 45px;
        background-size: cover;
        background-position: center;
        margin-bottom: 30px;
        border: 2px solid #ffffff;
        filter: grayscale(100%);
    }

    .sa-vert-title {
        writing-mode: vertical-rl;
        transform: rotate(180deg);
        white-space: nowrap;
        color: #ffffff;
        font-size: 15px;
        font-weight: 600;
        letter-spacing: 1.5px;
    }

    .sa-item-expanded {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.5s 0.2s;
        padding: 50px;
        display: flex;
        flex-direction: column;
        background-color: #ffffff;
        overflow: hidden;
    }

    .sa-item.active .sa-item-expanded {
        opacity: 1;
        pointer-events: auto;
    }

    .sa-expanded-content {
        min-width: 320px;
    }

    .sa-exp-title {
        font-size: 26px;
        font-weight: 800;
        color: #000;
        margin-bottom: 25px;
        line-height: 1.3;
    }

    .sa-exp-img {
        width: 100%;
        height: 280px;
        object-fit: cover;
        margin-bottom: 25px;
    }

    .sa-exp-text {
        font-size: 15px;
        color: #444;
        line-height: 1.6;
    }

    @media (max-width: 991px) {
        .sa-accordion {
            flex-direction: column;
            height: auto;
            min-height: 600px;
            margin-top: 40px;
        }

        .sa-item {
            flex: 0 0 70px;
            border-right: none;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sa-item.active {
            flex: 1 1 500px;
        }

        .sa-item-collapsed {
            width: 100%;
            height: 70px;
            flex-direction: row;
            padding-top: 0;
            padding-left: 20px;
            align-items: center;
        }

        .sa-thumb {
            margin-bottom: 0;
            margin-right: 20px;
        }

        .sa-vert-title {
            writing-mode: horizontal-tb;
            transform: none;
        }

        .sa-item-expanded {
            padding: 30px 20px;
        }
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const saItems = document.querySelectorAll('.sa-item');

        function activateItem(item) {
            if (!item.classList.contains('active')) {
                saItems.forEach(i => i.classList.remove('active'));
                item.classList.add('active');
            }
        }

        saItems.forEach(item => {
            // Trigger on hover for desktop
            item.addEventListener('mouseenter', function() {
                activateItem(this);
            });
            // Trigger on click for touch devices
            item.addEventListener('click', function() {
                activateItem(this);
            });
        });
    });
</script>

<!-- Video Showcase Section -->
<div class="video-showcase-section" style="position: relative; width: 100%; overflow: hidden; background-color: #000; margin: 10px 0;">
    <div class="video-container" id="videoParallaxContainer" style="position: relative; width: 100%; height: 90vh; max-height: 90vh; overflow: hidden; background-image: url('{{ asset('setting/about/1731080394.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed;">

        <video id="iecMainVideo"
            src="{{ asset('setting/about/Engineering-Tomorrow-Designing-Today-1.mp4') }}"
            style="width: 100%; height: 100%; object-fit: contain; background-color: #000; display: none; position: relative; z-index: 2;"
            preload="metadata"
            playsinline></video>

        <!-- Video Overlay & Play Button -->
        <div class="video-overlay" id="videoOverlay" style="position: absolute; inset: 0; z-index: 3; background: rgba(0, 0, 0, 0.25); display: flex; align-items: center; justify-content: center; cursor: pointer; transition: opacity 0.3s ease;">
            <button type="button" class="video-play-trigger" aria-label="Play Video" style="background: #ffffff; border: none; width: 85px; height: 85px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4); transition: transform 0.3s ease, box-shadow 0.3s ease; outline: none; cursor: pointer; position: relative;">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="#000000" style="margin-left: 4px;">
                    <path d="M8 5v14l11-7z" />
                </svg>
            </button>
        </div>
    </div>
</div>

<style>
    .video-play-trigger::before {
        content: '';
        position: absolute;
        inset: -10px;
        border-radius: 50%;
        border: 2px solid rgba(255, 255, 255, 0.7);
        animation: videoPulse 2s infinite;
    }

    .video-overlay:hover .video-play-trigger {
        transform: scale(1.1);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.5);
    }

    @keyframes videoPulse {
        0% {
            transform: scale(0.95);
            opacity: 0.8;
        }

        50% {
            transform: scale(1.15);
            opacity: 0.2;
        }

        100% {
            transform: scale(0.95);
            opacity: 0.8;
        }
    }

    @media (max-width: 767px) {
        .video-container {
            height: 480px !important;
            max-height: 75vh !important;
            background-attachment: scroll !important;
        }

        .video-play-trigger {
            width: 65px !important;
            height: 65px !important;
        }

        .video-play-trigger svg {
            width: 22px !important;
            height: 22px !important;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var video = document.getElementById('iecMainVideo');
        var overlay = document.getElementById('videoOverlay');

        if (video && overlay) {
            overlay.addEventListener('click', function() {
                if (video.paused) {
                    video.style.display = 'block';
                    video.play();
                    video.controls = true;
                    overlay.style.opacity = '0';
                    overlay.style.pointerEvents = 'none';
                }
            });

            video.addEventListener('pause', function() {
                video.controls = false;
                overlay.style.opacity = '1';
                overlay.style.pointerEvents = 'auto';
            });

            video.addEventListener('ended', function() {
                video.controls = false;
                video.style.display = 'none';
                overlay.style.opacity = '1';
                overlay.style.pointerEvents = 'auto';
            });
        }
    });
</script>


<!-- Clients Section -->
<div class="clients-section" style="padding: 40px 0 0; background-color: #ffffff; position: relative;">
    <div class="container">
        <div class="row mb-3">
            <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                <h2 style="font-size: 38px; font-weight: 800; color: #ba231b; margin-bottom: 20px; font-family: 'Outfit', sans-serif;">Clients</h2>
            </div>
        </div>
    </div>

    <!-- Horizontal Shaded Strip Container -->
    <div class="clients-shaded-strip" style="position: relative; background: #eef0f2; padding: 40px 0; border-top: 1px solid #e1e3e7; margin-top: 10px;">
        <!-- Top Center Triangle Notch -->
        <div class="clients-notch" style="position: absolute; top: -14px; left: 50%; transform: translateX(-50%); width: 0; height: 0; border-left: 14px solid transparent; border-right: 14px solid transparent; border-bottom: 14px solid #eef0f2; z-index: 5;"></div>

        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="200">
                    <div class="client-marquee-wrapper">
                        <div class="client-marquee-track">
                            @if(isset($brands) && $brands->count() > 0)
                            @foreach($brands as $brand)
                            <div class="client-item">
                                <div class="client-card">
                                    <img src="{{ asset('/setting/brand/' . $brand->logo) }}" alt="{{ $brand->title }}">
                                </div>
                            </div>
                            @endforeach

                            {{-- Duplicate loop for seamless infinite marquee animation --}}
                            @foreach($brands as $brand)
                            <div class="client-item">
                                <div class="client-card">
                                    <img src="{{ asset('/setting/brand/' . $brand->logo) }}" alt="{{ $brand->title }}">
                                </div>
                            </div>
                            @endforeach

                            @if($brands->count() < 6)
                            @foreach($brands as $brand)
                            <div class="client-item">
                                <div class="client-card">
                                    <img src="{{ asset('/setting/brand/' . $brand->logo) }}" alt="{{ $brand->title }}">
                                </div>
                            </div>
                            @endforeach
                            @foreach($brands as $brand)
                            <div class="client-item">
                                <div class="client-card">
                                    <img src="{{ asset('/setting/brand/' . $brand->logo) }}" alt="{{ $brand->title }}">
                                </div>
                            </div>
                            @endforeach
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* ── Clients Infinite Marquee Carousel ── */
    .client-marquee-wrapper {
        overflow: hidden;
        width: 100%;
        position: relative;
        padding: 5px 0;
        mask-image: linear-gradient(to right, transparent, black 4%, black 96%, transparent);
        -webkit-mask-image: linear-gradient(to right, transparent, black 4%, black 96%, transparent);
    }

    .client-marquee-track {
        display: flex;
        gap: 24px;
        width: max-content;
        animation: clientMarqueeScroll 28s linear infinite;
        will-change: transform;
    }

    .client-marquee-track:hover {
        animation-play-state: paused;
    }

    .client-marquee-track .client-item {
        width: 230px;
        flex-shrink: 0;
        padding: 4px;
    }

    @keyframes clientMarqueeScroll {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-50%);
        }
    }

    .client-card {
        background: #ffffff;
        border: 1px solid #e1e3e7;
        border-radius: 8px;
        padding: 15px 20px;
        text-align: center;
        height: 110px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        transition: all 0.3s ease;
    }

    .client-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        border-color: #cbd5e1;
    }

    .client-card img {
        max-width: 85%;
        max-height: 60px;
        width: auto !important;
        height: auto !important;
        object-fit: contain;
        display: inline-block !important;
    }
</style>
<!-- Projects Section -->
<div class="projects-section" style="background-color: #eff3ea; padding: 90px 0;">
    <div class="container">
        <div class="ps-heading" data-aos="fade-up" data-aos-duration="1000">
            <div class="ps-subtitle"><i class="ri-check-line" style="font-weight: 900; margin-right: 5px;"></i>Your Projects, Under Expert Hand</div>
            <h2 class="ps-title">PROJECTS</h2>
        </div>

        <div class="ps-container">
            @if(isset($projects) && $projects->count() > 0)
            @foreach($projects->take(6) as $index => $project)
            <div class="ps-row">
                <div class="ps-col-img" data-aos="{{ $index % 2 == 0 ? 'zoom-in-right' : 'zoom-in-left' }}" data-aos-duration="1200" data-aos-easing="ease-out-cubic">
                    <div class="ps-img-wrapper">
                        @if($project->image)
                        <img src="{{ asset('/setting/banner/' . $project->image) }}" class="ps-img" alt="{{ $project->title }}">
                        @else
                        <div class="ps-img" style="background-color: #ddd;"></div>
                        @endif
                    </div>
                </div>
                <div class="ps-col-text" data-aos="{{ $index % 2 == 0 ? 'fade-left' : 'fade-right' }}" data-aos-duration="1200" data-aos-easing="ease-out-cubic" data-aos-delay="200">
                    <div class="ps-text-content">
                        <h3>{{ $project->title }}</h3>
                        <div class="ps-separator"></div>
                        <a href="{{ route('project.show', $project->id) }}" class="ps-btn"><span>READ MORE</span> <i class="ri-arrow-right-line"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>

        <div style="text-align: center; margin-top: 45px;" data-aos="fade-up" data-aos-duration="1000">
            <a href="{{ route('project.list') }}" class="ps-view-all-btn">
                <span>SEE ALL OUR PROJECTS</span> <i class="ri-arrow-right-line"></i>
            </a>
        </div>
    </div>
</div>

<style>
    .ps-view-all-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: #b92019;
        color: #ffffff !important;
        font-weight: 700;
        font-size: 15px;
        padding: 14px 32px;
        border-radius: 6px;
        text-decoration: none !important;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(185, 32, 25, 0.25);
    }

    .ps-view-all-btn:hover {
        background: #A61B21;
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(185, 32, 25, 0.35);
        color: #ffffff !important;
    }

    .ps-heading {
        text-align: center;
        margin-bottom: 50px;
    }

    .ps-subtitle {
        font-size: 11px;
        font-weight: 700;
        color: #444;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 5px;
    }

    .ps-title {
        font-size: 38px;
        font-weight: 800;
        color: #000;
        letter-spacing: 1.5px;
    }

    .ps-container {
        border: 1px solid #000;
        border-radius: 20px;
        overflow: hidden;
        background-color: transparent;
    }

    .ps-row {
        display: flex;
        flex-wrap: wrap;
        border-bottom: 1px solid #000;
        overflow: hidden;
    }

    .ps-row:last-child {
        border-bottom: none;
    }

    .ps-col-img,
    .ps-col-text {
        flex: 0 0 50%;
        max-width: 50%;
        padding: 30px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    /* Alternating Rows */
    .ps-row:nth-child(even) {
        flex-direction: row-reverse;
    }

    /* Image Hover Animation */
    .ps-img-wrapper {
        overflow: hidden;
        border-radius: 4px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }

    .ps-img {
        width: 100%;
        height: 280px;
        object-fit: cover;
        display: block;
        transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        will-change: transform;
    }

    .ps-row:hover .ps-img {
        transform: scale(1.05);
    }

    .ps-text-content {
        max-width: 400px;
        margin: 0 auto;
        width: 100%;
    }

    .ps-text-content h3 {
        font-size: 24px;
        font-weight: 800;
        color: #222;
        margin-bottom: 10px;
        text-transform: uppercase;
        line-height: 1.3;
        transition: color 0.3s ease;
    }

    .ps-row:hover .ps-text-content h3 {
        color: #b92019;
    }

    .ps-separator {
        width: 25px;
        height: 4px;
        background-color: #fff;
        margin-bottom: 25px;
        border-radius: 2px;
        transition: width 0.4s ease, background-color 0.4s ease;
    }

    .ps-row:hover .ps-separator {
        width: 50px;
        background-color: #b92019;
    }

    /* Modern Button Hover */
    .ps-btn {
        display: inline-flex;
        align-items: center;
        padding: 10px 24px;
        background-color: #b92019;
        color: #fff !important;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        text-decoration: none;
        letter-spacing: 1px;
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        box-shadow: 0 4px 15px rgba(185, 32, 25, 0.2);
        overflow: hidden;
        position: relative;
    }

    .ps-btn span {
        position: relative;
        z-index: 2;
    }

    .ps-btn i {
        margin-left: 6px;
        font-size: 14px;
        position: relative;
        z-index: 2;
        transition: transform 0.3s ease;
    }

    .ps-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #8c1711;
        transform: scaleX(0);
        transform-origin: right;
        transition: transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        z-index: 1;
    }

    .ps-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(185, 32, 25, 0.35);
    }

    .ps-btn:hover::before {
        transform: scaleX(1);
        transform-origin: left;
    }

    .ps-btn:hover i {
        transform: translateX(4px);
    }

    @media (max-width: 767px) {
        .ps-row {
            flex-direction: column !important;
        }

        .ps-col-img,
        .ps-col-text {
            flex: 0 0 100%;
            max-width: 100%;
            padding: 20px;
        }

        .ps-col-img {
            padding-bottom: 10px;
        }

        .ps-text-content h3 {
            font-size: 20px;
        }
    }
</style>


@endsection