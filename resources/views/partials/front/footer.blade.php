<style>
    .footer {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        color: #ffffff;
        border-top: 3px solid var(--secondary);
        padding: 5rem 0 0 0;
        font-family: inherit;
    }
    @media (min-width: 768px) {
        .footer-content {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1.2fr;
            gap: 3rem;
        }
    }
    .footer-logo img {
        max-width: 220px;
        margin-bottom: 1.5rem;
        display: block;
    }
    .footer-description {
        line-height: 1.8;
        color: #ffffff;
        margin-bottom: 2rem;
        font-size: 0.95rem;
        max-width: 400px;
    }
    .footer-heading {
        color: #ffffff;
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        letter-spacing: 0.5px;
        position: relative;
        padding-bottom: 0.75rem;
    }
    .footer-heading::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        height: 2px;
        width: 40px;
        background: var(--secondary);
        border-radius: 2px;
    }
    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .footer-links li {
        margin-bottom: 0.8rem;
    }
    .footer-link {
        color: #ffffff;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        font-size: 0.95rem;
    }
    .footer-link::before {
        content: '→';
        color: var(--secondary);
        margin-right: 8px;
        opacity: 0;
        transform: translateX(-10px);
        transition: all 0.3s ease;
    }
    .footer-link:hover {
        color: var(--secondary);
        transform: translateX(5px);
    }
    .footer-link:hover::before {
        opacity: 1;
        transform: translateX(0);
    }
    .footer-contact {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .footer-contact li {
        display: flex;
        align-items: flex-start;
        margin-bottom: 1.2rem;
        color: #ffffff;
        line-height: 1.6;
        font-size: 0.95rem;
    }
    .footer-contact svg {
        color: var(--secondary);
        margin-right: 12px;
        margin-top: 4px;
        flex-shrink: 0;
    }
    .footer-social {
        display: flex;
        gap: 1rem;
        margin-top: 1.5rem;
    }
    .social-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        background: rgba(255, 255, 255, 0.05);
        color: #fff;
        border-radius: 50%;
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    .social-link:hover {
        background: var(--secondary);
        color: #0f172a;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(8, 145, 178, 0.3);
        border-color: var(--secondary);
    }
    .footer-bottom {
        background: rgba(0, 0, 0, 0.2);
        padding: 1.5rem 0;
        margin-top: 4rem;
        border-top: 1px solid rgba(255, 255, 255, 0.05);
    }
    .footer-bottom-inner {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 1rem;
    }
    @media (min-width: 768px) {
        .footer-bottom-inner {
            flex-direction: row;
            justify-content: space-between;
            text-align: left;
        }
    }
    .footer-bottom p {
        margin: 0;
        color: #ffffff;
        font-size: 0.9rem;
    }
    .footer-bottom-links {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .footer-bottom-link {
        color: #ffffff;
        text-decoration: none;
        font-size: 0.85rem;
        transition: color 0.3s ease;
    }
    .footer-bottom-link:hover {
        color: var(--secondary);
    }
    .footer-bottom .separator {
        color: rgba(255,255,255,0.1);
        display: inline-block;
    }
</style>
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <!-- Left Side: Logo & Description -->
            <div class="footer-left" itemscope itemtype="https://schema.org/Organization">
                <div class="footer-logo">
                    <a href="{{ route('home') }}" itemprop="url" aria-label="Home">
                        <img src="{{ asset('assets/img/footer_logo.png') }}" alt="{{ config('settings.company.name') }} - Precision Manufacturing Solutions" class="logo-image" itemprop="logo" loading="lazy">
                    </a>
                    <meta itemprop="name" content="{{ config('settings.company.name') }}">
                </div>
                <p class="footer-description" itemprop="description">
                    <strong>For over 12 years</strong>, we've been delivering <strong>precision-engineered manufacturing solutions</strong>. Our commitment to quality and innovation sets us apart in the industrial manufacturing world.
                </p>
                <div class="footer-social">
                    @if(config('settings.social_media.facebook'))
                    <a href="{{ config('settings.social_media.facebook') }}" class="social-link" aria-label="Facebook" target="_blank" rel="noopener">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    @endif
                    @if(config('settings.social_media.twitter'))
                    <a href="{{ config('settings.social_media.twitter') }}" class="social-link" aria-label="Twitter" target="_blank" rel="noopener">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                    </a>
                    @endif
                    @if(config('settings.social_media.linkedin'))
                    <a href="{{ config('settings.social_media.linkedin') }}" class="social-link" aria-label="LinkedIn" target="_blank" rel="noopener">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                    @endif
                    @if(config('settings.social_media.instagram'))
                    <a href="{{ config('settings.social_media.instagram') }}" class="social-link" aria-label="Instagram" target="_blank" rel="noopener">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                        </svg>
                    </a>
                    @endif
                </div>
            </div>

            <!-- Middle & Right Columns -->
            <div class="footer-links-group">
                    <h3 class="footer-heading">Quick Links</h3>
                    <ul class="footer-links">
                        @foreach (config('settings.navigation.footer_quick_links') as $link)
                        <li>
                            <a href="{{ $link['route'] ? route($link['route']) : $link['url'] }}" class="footer-link">
                                {{ $link['label'] }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="footer-links-group" itemscope itemtype="https://schema.org/LocalBusiness">
                    <meta itemprop="name" content="{{ config('settings.company.name') }}">
                    <h3 class="footer-heading">Contact Info</h3>
                    <ul class="footer-contact">
                        @if(config('settings.contact.address'))
                        <li itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                            <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                            </svg>
                            <span itemprop="streetAddress">{{ config('settings.contact.address') }}</span>
                        </li>
                        @endif
                        @if(config('settings.contact.phone'))
                        <li>
                            <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                            </svg>
                            <span itemprop="telephone">
                                @php $phones = explode(',', config('settings.contact.phone')); @endphp
                                @foreach($phones as $phone)
                                    <a href="tel:{{ trim(str_replace(' ', '', $phone)) }}" style="color: inherit; text-decoration: none;">{{ trim($phone) }}</a>@if(!$loop->last), @endif
                                @endforeach
                            </span>
                        </li>
                        @endif
                        @if(config('settings.contact.email'))
                        <li>
                            <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                            <span itemprop="email"><a href="mailto:{{ config('settings.contact.email') }}" style="color: inherit; text-decoration: none;">{{ config('settings.contact.email') }}</a></span>
                        </li>
                        @endif
                    </ul>
                </div>
        </div>

        </div>
    </div> <!-- End Main Container -->

    <!-- Full-Width Copyright Bar -->
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-inner">
                <p>&copy; {{ config('settings.footer.copyright_text') }}</p>
                <p class="developed-by">Developed by <strong>Next3 Digital</strong></p>
                <div class="footer-bottom-links">
                    @if(config('settings.footer.show_privacy_policy'))
                    <a href="{{ config('settings.footer.privacy_policy_url') }}" class="footer-bottom-link">Privacy Policy</a>
                    @endif
                    @if(config('settings.footer.show_privacy_policy') && config('settings.footer.show_terms_of_service'))
                    <span class="separator">|</span>
                    @endif
                    @if(config('settings.footer.show_terms_of_service'))
                    <a href="{{ config('settings.footer.terms_of_service_url') }}" class="footer-bottom-link">Terms of Service</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</footer>
