@php
    $services = DB::table('services')->where('is_active', 1)->get();
    $branches = DB::table('branches')->get();
@endphp

<style>
/* ============================================================
   FOOTER – Redesign based on image
   ============================================================ */
.modern-footer {
    background-color: #111;
    background-image: url('{{ asset("setting/banner/9099-scaled.jpg") }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    color: #e5e7eb;
    padding: 70px 0 0;
    position: relative;
    border-top: 4px solid #111;
}
.modern-footer::before {
    content: '';
    position: absolute;
    inset: 0;
    background: rgba(15, 15, 15, 0.7); /* Dark overlay to ensure text remains readable */
    z-index: 0;
}
.modern-footer > .container,
.modern-footer > .footer-bottom {
    position: relative;
    z-index: 1;
}

.footer-grid {
    display: grid;
    grid-template-columns: 1fr 1.4fr 1fr;
    gap: 60px;
    margin-bottom: 50px;
}

/* Col 1 */
.footer-logo-section {
    margin-bottom: 25px;
}
.footer-logo-section img {
    max-width: 100%;
    height: auto;
    max-height: 140px;
    display: block;
    border-radius: 12px; /* Rounded corners for footer logo */
}
.footer-social-label {
    font-size: 15px;
    font-weight: 700;
    color: #ffffff;
    margin-top: 25px;
    margin-bottom: 12px;
    text-transform: uppercase;
}
.footer-social-links {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}
.footer-social-links a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 38px;
    height: 38px;
    border-radius: 4px;
    color: #ffffff;
    font-size: 18px;
    text-decoration: none;
    transition: transform 0.2s, filter 0.2s;
}
.footer-social-links a:hover {
    transform: translateY(-2px);
    filter: brightness(1.15);
    color: #ffffff;
}
.social-fb { background: #3b5998; }
.social-tw { background: #1da1f2; }
.social-yt { background: #ff0000; }
.social-ig { background: #262626; }
.social-in { background: #0077b5; }

/* Col 2 & 3 */
.footer-col h3 {
    font-size: 24px;
    font-weight: 700;
    margin: 0 0 25px;
    color: #ffffff;
}

.footer-services-list {
    list-style: none;
    margin: 0;
    padding: 0;
}
.footer-services-list li {
    border-bottom: 1px solid rgba(255,255,255,0.4);
}
.footer-services-list li:first-child {
    border-top: 1px solid rgba(255,255,255,0.4);
}
.footer-services-list li a {
    color: #e5e7eb;
    text-decoration: none;
    font-size: 15px;
    transition: 0.3s;
    display: flex;
    align-items: center;
    padding: 12px 0;
}
.footer-services-list li a svg {
    width: 20px;
    height: 20px;
    stroke: #df5818;
    margin-right: 12px;
    flex-shrink: 0;
}
.footer-services-list li a:hover {
    color: #df5818;
}

.footer-contact-item {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 22px;
}
.footer-contact-item svg {
    width: 20px;
    height: 20px;
    stroke: #df5818;
    flex-shrink: 0;
}
.footer-contact-item .contact-text,
.footer-contact-item a {
    font-size: 15px;
    color: #ffffff;
    text-decoration: none;
    transition: 0.3s;
}
.footer-contact-item a:hover {
    color: #df5818;
}

/* Bottom Copyright */
.footer-bottom {
    background: #111111;
    padding: 20px 0;
    text-align: center;
    border-top: 1px solid rgba(255,255,255,0.1);
}
.footer-bottom p {
    margin: 0;
    font-size: 14px;
    color: #999;
}
.footer-bottom a {
    color: #df5818;
    text-decoration: none;
    font-weight: 600;
    transition: 0.3s;
}
.footer-bottom a:hover {
    color: #fff;
    text-decoration: underline;
}

/* Responsive */
@media (max-width: 991px) {
    .footer-grid {
        grid-template-columns: 1fr 1fr;
    }
}
@media (max-width: 767px) {
    .footer-grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }
}
</style>

<!-- Our Locations Section -->
<style>
    .col-lg-1-5 {
        flex: 0 0 20%;
        max-width: 20%;
        padding-right: 15px;
        padding-left: 15px;
    }

    @media (max-width: 991px) {
        .col-lg-1-5 {
            flex: 0 0 33.333333%;
            max-width: 33.333333%;
        }
    }

    @media (max-width: 767px) {
        .col-lg-1-5 {
            flex: 0 0 50%;
            max-width: 50%;
        }
    }

    @media (max-width: 575px) {
        .col-lg-1-5 {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }
</style>
<div class="locations-section" style="padding: 60px 0 30px; background-color: #fff;">
    <div class="container">
        <h2 class="locations-title mb-5" style="color: #ba231b; font-weight: 800; font-size: 32px;">Our Locations</h2>
        @if(isset($branches) && $branches->count() > 0)
        <div class="row">
            @foreach($branches as $branch)
            <div class="col-lg-1-5 mb-4">
                <div class="location-item d-flex">
                    <i class="ri-map-pin-2-fill" style="color: #ba231b; font-size: 22px; margin-right: 12px; margin-top: -2px;"></i>
                    <div class="location-text" style="font-size: 13.5px; font-weight: 700; color: #333; line-height: 1.5;">
                        {!! nl2br(e($branch->address)) !!}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>

<footer class="modern-footer">
    <div class="container">
        <div class="footer-grid">
            
            <!-- Column 1: Logo & Social -->
            <div class="footer-col">
                <div class="footer-logo-section">
                    <a href="/">
                        <img src="{{ asset(get_setting('frontend_logo_footer')) }}" alt="Logo">
                    </a>
                </div>
                
                <div class="footer-social-label">Follow Us On :</div>
                <div class="footer-social-links">
                    <a href="{{ get_setting('facebook') }}" target="_blank" class="social-fb" aria-label="Facebook"><i class="ri-facebook-fill"></i></a>
                    <a href="{{ get_setting('youtube', '#') }}" target="_blank" class="social-yt" aria-label="YouTube"><i class="ri-youtube-fill"></i></a>
                    <a href="{{ get_setting('instagram') }}" target="_blank" class="social-ig" aria-label="Instagram"><i class="ri-instagram-line"></i></a>
                    <a href="{{ get_setting('twitter') }}" target="_blank" class="social-tw" aria-label="Twitter"><i class="ri-twitter-fill"></i></a>
                </div>
            </div>

            <!-- Column 2: Our Services -->
            <div class="footer-col" style="max-width: 90%;">
                <h3>Our Services</h3>
                <ul class="footer-services-list">
                    @foreach ($services as $service)
                        <li>
                            <a href="/service/{{ $service->id }}">
                                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 16 16 12 12 8"></polyline>
                                    <line x1="8" y1="12" x2="16" y2="12"></line>
                                </svg>
                                {{ $service->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Column 3: Contact Info -->
            <div class="footer-col">
                <h3>Contact Us</h3>
                
                <div class="footer-contact-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                    </svg>
                    <div class="contact-text">
                        <a href="tel:{{ get_setting('office_phone') }}">{{ get_setting('office_phone') }}</a>
                    </div>
                </div>
                
                <div class="footer-contact-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    <div class="contact-text">
                        <a href="mailto:{{ get_setting('office_email') }}">{{ get_setting('office_email') }}</a>
                    </div>
                </div>
                
                {{-- Address (Optional) --}}
                @if(get_setting('office_address'))
                <div class="footer-contact-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <div class="contact-text">
                        {{ get_setting('office_address') }}
                    </div>
                </div>
                @endif
            </div>
            
        </div>
    </div>

    <!-- Copyright -->
    <div class="footer-bottom">
        <div class="container">
            <p>
                © {{ get_setting('copyright_text') }} |
                <a href="https://www.techwebdit.com" target="_blank">Developed by Techweb BD IT</a>
            </p>
        </div>
    </div>
</footer>

<div class="go-top">
     <i class="ri-arrow-up-s-line"></i>
     <i class="ri-arrow-up-s-line"></i>
 </div>
