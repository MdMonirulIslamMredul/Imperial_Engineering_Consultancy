@extends('frontend.layouts.app')
@section('content')
@section('title', __('About Us'))

<title>{{ app_name() }} | @yield('title')</title>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

    :root {
        --brand:      #b92019;
        --brand-dark: #A61B21;
        --brand-light:#FDECEA;
        --text-dark:  #1A1A2E;
        --text-mid:   #444;
        --text-light: #9CA3AF;
        --bg-light:   #eff3ea;
        --white:      #FFFFFF;
        --border:     rgba(0,0,0,.07);
    }

    .ab-wrap * { font-family: 'Inter', sans-serif; box-sizing: border-box; }

    /* ── Hero ── */
    .ab-hero {
        position: relative;
        height: 500px;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        overflow: hidden;
        background-color: #f5f5f5;
        background-image: url('{{ asset('/setting/banner/9099-scaled.jpg') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
    
    .ab-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: rgba(255, 255, 255, 0.88);
        z-index: 1;
    }

    .ab-hero-inner {
        position: relative;
        z-index: 2;
        max-width: 800px;
    }

    .ab-hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #000;
        font-size: 20px;
        font-weight: 500;
        margin-bottom: 25px;
    }
    
    .ab-hero-badge i {
        font-size: 24px;
        font-weight: 900;
    }

    .ab-hero h1 {
        font-size: clamp(32px, 5vw, 68px);
        font-weight: 800;
        color: var(--brand);
        margin: 0 0 15px;
        line-height: 1.1;
        letter-spacing: -1px;
    }

    .ab-hero p {
        font-size: 19px;
        color: #000;
        margin: 0;
        font-weight: 500;
    }

    /* ── Common Section ── */
    .ab-section { padding: 90px 0; }
    .ab-section-alt { padding: 90px 0; background: var(--bg-light); }

    /* ── About Intro: Two-column ── */
    .ab-intro-grid {
        display: grid;
        grid-template-columns: 1fr 1.5fr;
        gap: 60px;
        align-items: flex-start;
    }
    .ab-intro-logo {
        max-width: 100%;
        height: auto;
    }

    .ab-intro-content p {
        font-size: 16px;
        color: var(--text-mid);
        line-height: 1.8;
        margin: 0 0 20px;
    }

    /* ── Why Choose IEC ── */
    .ab-why-content h2 {
        font-size: clamp(28px, 4vw, 42px);
        font-weight: 800;
        color: var(--brand);
        margin: 0 0 30px;
    }
    
    .ab-why-content .description-body {
        font-size: 16px;
        color: var(--text-mid);
        line-height: 1.8;
    }

    /* ── Mission & Vision ── */
    .ab-mv-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 50px;
        margin-bottom: 70px;
    }
    .ab-mv-card h3 {
        font-size: 36px;
        font-weight: 800;
        color: var(--brand);
        margin: 0 0 15px;
    }
    .ab-mv-card p {
        font-size: 16px;
        color: #000;
        line-height: 1.8;
        margin: 0;
    }
    
    /* Process Grid */
    .ab-process-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 20px;
    }
    .ab-process-card {
        background: transparent;
        border: 1px solid rgba(0,0,0,0.1);
        border-radius: 8px;
        padding: 40px 20px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .ab-process-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        background: #fff;
    }
    .ab-process-card i {
        font-size: 42px;
        color: var(--brand);
        margin-bottom: 20px;
        display: block;
    }
    .ab-process-card h4 {
        font-size: 18px;
        font-weight: 700;
        color: var(--text-dark);
        margin: 0;
    }

    /* ── License & Portfolio ── */
    .ab-doc-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
    }
    .ab-doc-card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 40px;
        text-align: center;
        transition: all .35s ease;
    }
    .ab-doc-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,.08);
        border-color: rgba(185,32,25,.2);
    }
    .ab-doc-card h3 {
        font-size: 22px;
        font-weight: 800;
        color: var(--text-dark);
        margin: 0 0 12px;
    }
    .ab-doc-card p {
        font-size: 15px;
        color: var(--text-mid);
        line-height: 1.65;
        margin: 0 0 24px;
    }
    .ab-doc-btn {
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
    }
    .ab-doc-btn:hover {
        background: var(--brand);
        color: #fff !important;
    }

    /* ── Section heading helpers ── */
    .ab-sh { margin-bottom: 40px; }
    .ab-sh h2 {
        font-size: clamp(28px, 3.5vw, 42px);
        font-weight: 800;
        color: var(--text-dark);
        margin: 0 0 10px;
    }
    .ab-sh p {
        font-size: 16px;
        color: var(--text-mid);
        margin: 0;
        max-width: 620px;
    }

    /* ── Responsive ── */
    @media (max-width: 991px) {
        .ab-intro-grid { grid-template-columns: 1fr; gap: 40px; }
        .ab-process-grid { grid-template-columns: repeat(3, 1fr); }
    }
    @media (max-width: 767px) {
        .ab-process-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 575px) {
        .ab-process-grid { grid-template-columns: 1fr; }
        .ab-hero { height: 400px; }
    }
</style>

<div class="ab-wrap">

    {{-- ── Hero ── --}}
    <div class="ab-hero">
        <div class="container">
            <div class="ab-hero-inner" data-aos="fade-up" data-aos-duration="1200">
                <div class="ab-hero-badge">
                    <i class="ri-check-line" style="font-weight: 900;"></i>
                    Welcome To IEC
                </div>
                <h1>{{ $about->title ?? 'Engineering. Energy. Safety. Solutions.' }}</h1>
                <p>Engineering Tomorrow, Designing Today</p>
            </div>
        </div>
    </div>

    {{-- ── About Intro ── --}}
    <div class="ab-section">
        <div class="container">
            <div class="ab-intro-grid">
                <div class="ab-intro-img-wrap" data-aos="zoom-in-right" data-aos-duration="1200">
                    <img src="{{ asset(get_setting('frontend_logo_footer')) }}" alt="IEC Logo" class="ab-intro-logo" style="background:var(--brand); padding: 40px; border-radius: 4px;">
                </div>
                <div class="ab-intro-content" data-aos="fade-left" data-aos-duration="1200">
                    <p>{!! nl2br(e($about->short_description)) !!}</p>
                    <p>Choose IEC—your trusted partner for smart, secure, and sustainable development.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ── Why Choose Us ── --}}
    <div class="ab-section-alt">
        <div class="container">
            <div class="ab-why-content" data-aos="fade-up" data-aos-duration="1200">
                <h2>Why Choose IEC</h2>
                <div class="description-body">{!! $about->description !!}</div>
            </div>
        </div>
    </div>

    {{-- ── Mission & Vision & Process ── --}}
    <div class="ab-section" style="background-color: #f7f9fc;">
        <div class="container">
            <div class="ab-mv-grid">
                <div class="ab-mv-card mission" data-aos="fade-up" data-aos-duration="1200">
                    <h3>Mission</h3>
                    {!! $mission->mission_vision ?? '<p>To deliver innovative, reliable, and sustainable engineering solutions through expert design, precision implementation, and client-focused consultancy. At IEC, we are committed to exceeding expectations by combining global expertise with local insight, empowering businesses and communities through safe, efficient, and future-ready infrastructure.</p>' !!}
                </div>
                <div class="ab-mv-card vision" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="150">
                    <h3>Vision</h3>
                    {!! $mission->text ?? '<p>To be a leading force in engineering and renewable energy across Bangladesh and beyond recognized for excellence in project delivery, trusted partnerships, and a lasting impact on sustainable development.</p>' !!}
                </div>
            </div>
            
            <div class="ab-process-grid">
                <div class="ab-process-card" data-aos="zoom-in-up" data-aos-duration="800" data-aos-delay="0">
                    <i class="ri-lightbulb-flash-line"></i>
                    <h4>Concept</h4>
                </div>
                <div class="ab-process-card" data-aos="zoom-in-up" data-aos-duration="800" data-aos-delay="100">
                    <i class="ri-pencil-ruler-2-line"></i>
                    <h4>Design</h4>
                </div>
                <div class="ab-process-card" data-aos="zoom-in-up" data-aos-duration="800" data-aos-delay="200">
                    <i class="ri-file-list-3-line"></i>
                    <h4>Planning</h4>
                </div>
                <div class="ab-process-card" data-aos="zoom-in-up" data-aos-duration="800" data-aos-delay="300">
                    <i class="ri-tools-line"></i>
                    <h4>Execution</h4>
                </div>
                <div class="ab-process-card" data-aos="zoom-in-up" data-aos-duration="800" data-aos-delay="400">
                    <i class="ri-settings-4-line"></i>
                    <h4>Monitoring</h4>
                </div>
            </div>
        </div>
    </div>

    {{-- ── License & Portfolio (Retained & Restyled) ── --}}
    <div class="ab-section-alt">
        <div class="container">
            <div class="ab-sh" data-aos="fade-up" data-aos-duration="1000">
                <h2>License & Portfolio</h2>
                <p>Official credentials and a showcase of our work</p>
            </div>
            <div class="ab-doc-grid">
                <div class="ab-doc-card" data-aos="fade-up" data-aos-duration="1000">
                    <i class="ri-file-paper-2-line" style="font-size:48px; color:var(--brand); display:block; margin-bottom:15px;"></i>
                    <h3>Our License</h3>
                    <p>Official government-recognized license for authorized operations.</p>
                    @if($mission->pdf_file)
                        <a href="{{ asset('setting/mission/' . $mission->pdf_file) }}" target="_blank" class="ab-doc-btn">
                            View Official License <i class="ri-external-link-line"></i>
                        </a>
                    @else
                        <span style="color:var(--text-light);font-size:14px;">No License File Available</span>
                    @endif
                </div>
                <div class="ab-doc-card" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="150">
                    <i class="ri-briefcase-4-line" style="font-size:48px; color:var(--brand); display:block; margin-bottom:15px;"></i>
                    <h3>Our Portfolio</h3>
                    <p>Explore our showcase of work, achievements, and successful projects.</p>
                    @if($mission->portfolio)
                        <a href="{{ asset('setting/mission/' . $mission->portfolio) }}" target="_blank" class="ab-doc-btn">
                            View Portfolio <i class="ri-external-link-line"></i>
                        </a>
                    @else
                        <span style="color:var(--text-light);font-size:14px;">No Portfolio File Available</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
