@extends('frontend.layouts.app')
@section('content')
@section('title', __('Projects'))

<title>{{ app_name() }} | @yield('title')</title>

@php
    $projects = $projects ?? \App\Models\Project::where('is_active', 1)->get();
@endphp

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

    :root {
        --brand: #b92019;
        --brand-dark: #A61B21;
        --brand-light: #FDECEA;
        --text-dark: #1A1A2E;
        --text-mid: #444;
        --text-light: #9CA3AF;
        --bg-light: #eff3ea;
        --white: #FFFFFF;
        --border: rgba(0, 0, 0, .07);
    }

    .sd-wrap * {
        font-family: 'Inter', sans-serif;
        box-sizing: border-box;
    }

    /* ── Hero ── */
    .sd-hero {
        position: relative;
        height: 500px;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        overflow: hidden;
        background-color: #f5f5f5;
        background-image: url('{{ asset('setting/banner/ENGINEERING-CONSULTANCY.jpg') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

    .sd-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: rgba(255, 255, 255, 0.7);
        z-index: 1;
    }

    .sd-hero-inner {
        position: relative;
        z-index: 2;
        max-width: 800px;
    }

    .sd-hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #000;
        font-size: 20px;
        font-weight: 500;
        margin-bottom: 25px;
    }

    .sd-hero-badge i {
        font-size: 24px;
        font-weight: 900;
    }

    .sd-hero h1 {
        font-size: clamp(32px, 5vw, 68px);
        font-weight: 800;
        color: var(--brand);
        margin: 0 0 15px;
        line-height: 1.1;
        letter-spacing: -1px;
    }

    .sd-hero p {
        font-size: 19px;
        color: #000;
        margin: 0;
        font-weight: 500;
    }

    /* ── Common Section ── */
    .sd-section {
        padding: 90px 0;
    }

    .sd-section-alt {
        padding: 90px 0;
        background: var(--bg-light);
    }

    /* ── Section Header ── */
    .sd-sh {
        margin-bottom: 50px;
        text-align: center;
    }

    .sd-sh h2 {
        font-size: clamp(28px, 3.5vw, 42px);
        font-weight: 800;
        color: var(--text-dark);
        margin: 0 0 10px;
    }

    .sd-sh p {
        font-size: 16px;
        color: var(--text-mid);
        margin: 0 auto;
        max-width: 620px;
    }

    /* ── Projects Grid ── */
    .sd-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(330px, 1fr));
        gap: 30px;
    }

    .sd-card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 12px;
        overflow: hidden;
        transition: all .35s ease;
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .sd-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, .08);
        border-color: rgba(185, 32, 25, .2);
    }

    .sd-card-img {
        height: 230px;
        overflow: hidden;
        position: relative;
    }

    .sd-card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .5s ease;
    }

    .sd-card:hover .sd-card-img img {
        transform: scale(1.05);
    }

    .sd-status-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        z-index: 2;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .sd-status-badge.status-pending {
        background: #f59e0b;
        color: #fff;
    }

    .sd-status-badge.status-running {
        background: #3b82f6;
        color: #fff;
    }

    .sd-status-badge.status-complete {
        background: #10b981;
        color: #fff;
    }

    .sd-card-body {
        padding: 30px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .sd-card-body h3 {
        font-size: 22px;
        font-weight: 800;
        color: var(--text-dark);
        margin: 0 0 12px;
        line-height: 1.3;
    }

    .sd-card-body p {
        font-size: 15px;
        color: var(--text-mid);
        line-height: 1.65;
        margin: 0 0 24px;
        flex: 1;
    }

    .sd-doc-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 26px;
        background: var(--text-mid);
        color: #fff !important;
        font-size: 14px;
        font-weight: 700;
        border-radius: 4px;
        text-decoration: none !important;
        transition: all .3s ease;
        align-self: flex-start;
    }

    .sd-doc-btn:hover {
        background: var(--brand);
        color: #fff !important;
    }

    /* ── Clients Slider ── */
    .uv-slider {
        max-width: 1200px;
        margin: 0 auto;
    }

    .uv-slider .owl-stage-outer {
        padding: 15px 5px 25px 5px;
    }

    .uv-slider .owl-nav,
    .uv-slider .owl-dots {
        display: none !important;
    }

    .uv-card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 30px 20px;
        text-align: center;
        transition: all 0.35s ease;
        text-decoration: none;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 180px;
        margin: 5px 0;
    }

    .uv-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, .08);
        border-color: rgba(185, 32, 25, .2);
    }

    .uv-card img {
        max-width: 100%;
        max-height: 75px;
        object-fit: contain;
        margin-bottom: 12px;
        transition: transform 0.3s ease;
    }

    .uv-card:hover img {
        transform: scale(1.05);
    }

    .uv-card span {
        font-size: 14px;
        font-weight: 600;
        color: var(--text-dark);
    }

    .uv-view-more {
        text-align: center;
        margin-top: 55px;
        padding-top: 15px;
        clear: both;
        position: relative;
        z-index: 10;
        display: flex;
        justify-content: center;
    }

    /* ── CTA Card Section ── */
    .sd-cta-card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 50px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
    }

    .sd-cta-text h2 {
        font-size: clamp(24px, 3vw, 36px);
        font-weight: 800;
        color: var(--brand);
        margin: 0 0 10px;
    }

    .sd-cta-text p {
        font-size: 16px;
        color: var(--text-mid);
        margin: 0;
    }

    .sd-cta-actions {
        display: flex;
        gap: 15px;
        flex-shrink: 0;
    }

    .sd-cta-btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 14px 28px;
        background: var(--brand);
        color: #fff !important;
        font-size: 15px;
        font-weight: 700;
        border-radius: 4px;
        text-decoration: none !important;
        transition: all .3s ease;
    }

    .sd-cta-btn-primary:hover {
        background: var(--brand-dark);
        color: #fff !important;
    }

    .sd-cta-btn-outline {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 14px 28px;
        background: var(--text-mid);
        color: #fff !important;
        font-size: 15px;
        font-weight: 700;
        border-radius: 4px;
        text-decoration: none !important;
        transition: all .3s ease;
    }

    .sd-cta-btn-outline:hover {
        background: var(--brand);
        color: #fff !important;
    }

    @media (max-width: 991px) {
        .sd-cta-card {
            flex-direction: column;
            text-align: center;
        }

        .sd-cta-actions {
            justify-content: center;
            width: 100%;
            flex-wrap: wrap;
        }
    }

    @media (max-width: 575px) {
        .sd-hero {
            height: 400px;
        }

        .sd-grid {
            grid-template-columns: 1fr;
        }

        .sd-cta-actions {
            flex-direction: column;
        }
    }
</style>

<div class="sd-wrap">

    {{-- ── Hero Section ── --}}
    <div class="sd-hero" style="background-image: url('{{ asset('setting/banner/ENGINEERING-CONSULTANCY.jpg') }}');">
        <div class="container">
            <div class="sd-hero-inner" data-aos="fade-up" data-aos-duration="1200">
                <div class="sd-hero-badge">
                    <i class="ri-check-line" style="font-weight: 900;"></i>
                    {{ get_setting('site_name', 'Imperial Engineering & Consultancy') }}
                </div>
                <h1>Our Projects Portfolio</h1>
                <p>Innovative, Reliable & Sustainable Structural & Engineering Landmark Projects</p>
            </div>
        </div>
    </div>

    {{-- ── Projects Grid Section ── --}}
    <div class="sd-section">
        <div class="container">
            <div class="sd-sh" data-aos="fade-up" data-aos-duration="1000">
                <h2>Featured Projects</h2>
                <p>Explore our successfully delivered and ongoing engineering consultancy projects</p>
            </div>

            <div class="sd-grid">
                @forelse ($projects as $project)
                @php
                    $imgSrc = null;
                    if(!empty($project->image) && file_exists(public_path('setting/banner/' . $project->image))) {
                        $imgSrc = asset('setting/banner/' . $project->image);
                    } elseif(!empty($project->banner) && file_exists(public_path('setting/banner/' . $project->banner))) {
                        $imgSrc = asset('setting/banner/' . $project->banner);
                    } else {
                        $imgSrc = asset('setting/banner/ENGINEERING-CONSULTANCY.jpg');
                    }
                @endphp
                <div class="sd-card" data-aos="fade-up" data-aos-duration="800" data-aos-delay="{{ min($loop->index * 80, 400) }}">
                    @if($project->status)
                        @if($project->status == 1)
                            <span class="sd-status-badge status-pending">Pending</span>
                        @elseif($project->status == 2)
                            <span class="sd-status-badge status-running">Running</span>
                        @elseif($project->status == 3)
                            <span class="sd-status-badge status-complete">Completed</span>
                        @endif
                    @endif

                    <div class="sd-card-img">
                        <img src="{{ $imgSrc }}" alt="{{ $project->title }}">
                    </div>

                    <div class="sd-card-body">
                        <h3>{{ $project->title }}</h3>
                        <p>{!! Str::limit(strip_tags($project->short_details ?? $project->details ?? ''), 140) !!}</p>
                        <a href="{{ route('project.show', $project->id) }}" class="sd-doc-btn">
                            View Details <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">No projects found at this time.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- ── Our Clients Section ── --}}
    @php
    $brands = $brands ?? \App\Models\Brand::where('is_active', 1)->get();
    @endphp
    @if(isset($brands) && $brands->count() > 0)
    <div class="sd-section-alt" data-aos="fade-up" data-aos-duration="1000">
        <div class="container">
            <div class="sd-sh">
                <h2>Our Valued Clients</h2>
                <p>Trusted partners and industry leaders we have had the privilege to collaborate with</p>
            </div>

            <div class="uv-slider owl-carousel owl-theme">
                @foreach($brands as $brand)
                <div class="uv-card">
                    <img src="{{ asset('/setting/brand/' . $brand->logo) }}" alt="{{ $brand->title ?? 'Client' }}">
                    @if(!empty($brand->title))
                    <span>{{ $brand->title }}</span>
                    @endif
                </div>
                @endforeach
            </div>

            <div class="uv-view-more">
                <a href="{{ route('clients.index') }}" class="sd-doc-btn" style="background: var(--brand);">
                    View All Clients <i class="ri-arrow-right-line"></i>
                </a>
            </div>
        </div>
    </div>
    @endif

    {{-- ── Call To Action Section ── --}}
    <div class="sd-section">
        <div class="container">
            <div class="sd-cta-card" data-aos="fade-up" data-aos-duration="1000">
                <div class="sd-cta-text">
                    <h2>Have a Project in Mind?</h2>
                    <p>Book a consultation with our experienced engineering consultants and structural designers today.</p>
                </div>
                <div class="sd-cta-actions">
                    <a href="{{ route('appointment.index') }}" class="sd-cta-btn-primary">
                        <i class="ri-calendar-event-line"></i> Book Appointment
                    </a>
                    <a href="{{ url('/contact') }}" class="sd-cta-btn-outline">
                        <i class="ri-customer-service-2-line"></i> Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var initClientSlider = function() {
            if (typeof $ !== 'undefined' && $.fn && $.fn.owlCarousel) {
                $('.uv-slider').owlCarousel({
                    loop: true,
                    margin: 25,
                    nav: false,
                    dots: false,
                    autoplay: true,
                    autoplayTimeout: 2500,
                    autoplayHoverPause: true,
                    smartSpeed: 800,
                    responsive: {
                        0: { items: 1 },
                        480: { items: 2 },
                        768: { items: 3 },
                        992: { items: 4 },
                        1200: { items: 5 }
                    }
                });
            }
        };
        if (typeof $ !== 'undefined') {
            $(document).ready(initClientSlider);
        } else {
            window.addEventListener('load', initClientSlider);
        }
    });
</script>
@endsection
