
@extends('layouts.app')

@section('title', 'UNIQUE — Center for All | Beauty & Care')

@section('content')

<style>
    /* Landing-page-specific styles; works offline */
    .unique-home {
        overflow: hidden;
        color: #30212a;
        background: #fffafc;
    }

    .unique-home * {
        box-sizing: border-box;
    }

    .home-wrap {
        width: min(1160px, calc(100% - 44px));
        margin: 0 auto;
    }

    .home-hero {
        position: relative;
        padding: 76px 0 86px;
        background:
            radial-gradient(ellipse at 85% 20%, rgba(244, 190, 216, .48), transparent 38%),
            linear-gradient(135deg, #fffafc 0%, #fff0f6 52%, #fbe3ef 100%);
    }

    .hero-grid {
        display: grid;
        grid-template-columns: 1.05fr .95fr;
        align-items: center;
        gap: 65px;
    }

    .hero-label {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        padding: 9px 14px;
        margin-bottom: 24px;
        color: #a51e60;
        background: #fff;
        border: 1px solid #f0d1e1;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1.8px;
        text-transform: uppercase;
    }

    .hero-label span {
        width: 7px;
        height: 7px;
        background: #cf4287;
        border-radius: 50%;
    }

    .hero-copy h1 {
        max-width: 650px;
        font-family: Georgia, "Times New Roman", serif;
        font-size: clamp(43px, 5.4vw, 72px);
        font-weight: 500;
        line-height: 1.09;
        letter-spacing: -2px;
    }

    .hero-copy h1 em {
        color: #c72c78;
        font-weight: 500;
    }

    .hero-copy > p {
        max-width: 490px;
        margin: 23px 0 30px;
        color: #796c74;
        font-size: 16px;
        line-height: 1.9;
    }

    .hero-actions {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 13px;
    }

    .hero-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 53px;
        padding: 0 23px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 750;
        transition: transform .2s, box-shadow .2s, background .2s;
    }

    .hero-button:hover {
        transform: translateY(-3px);
    }

    .hero-button.primary {
        color: white;
        background: #c72c78;
        box-shadow: 0 12px 26px rgba(199, 44, 120, .22);
    }

    .hero-button.primary:hover {
        background: #a51e60;
    }

    .hero-button.secondary {
        color: #a51e60;
        background: white;
        border: 1px solid #f0d1e1;
    }

    .hero-button.secondary:hover {
        box-shadow: 0 8px 20px rgba(111, 33, 73, .08);
    }

    .hero-note {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 30px;
        color: #796c74;
        font-size: 12px;
    }

    .hero-note strong {
        color: #493440;
    }

    .hero-note-mark {
        display: grid;
        place-items: center;
        width: 31px;
        height: 31px;
        color: #c72c78;
        background: white;
        border-radius: 50%;
        font-size: 16px;
    }

    .hero-visual {
        position: relative;
        min-height: 450px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .hero-orbit {
        position: absolute;
        width: 390px;
        height: 390px;
        border: 1px solid rgba(199, 44, 120, .18);
        border-radius: 50%;
    }

    .hero-orbit::before {
        content: "";
        position: absolute;
        inset: 22px;
        border: 1px dashed rgba(199, 44, 120, .17);
        border-radius: 50%;
    }

    .hero-art {
        position: relative;
        z-index: 1;
        width: min(360px, 85%);
        aspect-ratio: 4 / 5;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border: 9px solid rgba(255, 255, 255, .88);
        border-radius: 48% 48% 25px 25px;
        background:
            radial-gradient(ellipse at 50% 38%, #f9dce9 0%, #f0b7d1 44%, #d982ad 100%);
        box-shadow: 0 30px 70px rgba(125, 39, 83, .17);
    }

    .hero-art::before {
        content: "";
        position: absolute;
        width: 230px;
        height: 290px;
        bottom: -75px;
        border-radius: 50% 50% 12% 12%;
        background: linear-gradient(145deg, #fff8fb, #e8b0cc);
        transform: rotate(-9deg);
    }

    .hero-art::after {
        content: "U";
        position: relative;
        z-index: 1;
        color: rgba(177, 40, 103, .82);
        font-family: Georgia, "Times New Roman", serif;
        font-size: 190px;
        font-style: italic;
        text-shadow: 0 12px 30px rgba(133, 27, 77, .12);
    }

    .hero-stamp {
        position: absolute;
        z-index: 2;
        right: -5px;
        bottom: 37px;
        width: 125px;
        height: 125px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #a51e60;
        background: #fff;
        border: 1px solid #f2d8e5;
        border-radius: 50%;
        box-shadow: 0 12px 35px rgba(111, 33, 73, .1);
        text-align: center;
    }

    .hero-stamp strong {
        font-family: Georgia, "Times New Roman", serif;
        font-size: 24px;
    }

    .hero-stamp span {
        margin-top: 4px;
        font-size: 9px;
        font-weight: 800;
        letter-spacing: 1.4px;
    }

    .hero-floating {
        position: absolute;
        z-index: 3;
        top: 50px;
        left: -10px;
        padding: 15px 18px;
        color: #493440;
        background: white;
        border: 1px solid #f5dce8;
        border-radius: 13px;
        box-shadow: 0 12px 35px rgba(111, 33, 73, .08);
        font-size: 12px;
    }

    .hero-floating strong {
        display: block;
        margin-bottom: 3px;
        color: #c72c78;
        font-size: 14px;
    }

    .home-trust {
        padding: 27px 0;
        background: white;
        border-top: 1px solid #f4e4ec;
        border-bottom: 1px solid #f4e4ec;
    }

    .trust-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .trust-item {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 13px;
        padding: 8px;
    }

    .trust-icon {
        display: grid;
        place-items: center;
        flex-shrink: 0;
        width: 43px;
        height: 43px;
        color: #c72c78;
        background: #fff0f6;
        border-radius: 13px;
        font-size: 20px;
    }

    .trust-item strong {
        display: block;
        color: #493440;
        font-size: 13px;
    }

    .trust-item span {
        display: block;
        margin-top: 2px;
        color: #796c74;
        font-size: 11px;
    }

    .home-section {
        padding: 95px 0;
    }

    .home-heading {
        max-width: 680px;
        margin: 0 auto 45px;
        text-align: center;
    }

    .home-eyebrow {
        display: inline-block;
        margin-bottom: 13px;
        color: #c72c78;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 2.4px;
        text-transform: uppercase;
    }

    .home-heading h2,
    .about-copy h2 {
        color: #30212a;
        font-family: Georgia, "Times New Roman", serif;
        font-size: clamp(32px, 4vw, 46px);
        font-weight: 500;
        line-height: 1.2;
        letter-spacing: -1px;
    }

    .home-heading p {
        max-width: 560px;
        margin: 15px auto 0;
        color: #796c74;
        font-size: 14px;
        line-height: 1.9;
    }

    .service-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 23px;
    }

    .service-card-home {
        position: relative;
        padding: 29px 25px;
        overflow: hidden;
        background: white;
        border: 1px solid #f0dce6;
        border-radius: 19px;
        transition: transform .25s, box-shadow .25s;
    }

    .service-card-home:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 45px rgba(111, 33, 73, .09);
    }

    .service-card-home .service-icon {
        display: grid;
        place-items: center;
        width: 55px;
        height: 55px;
        margin-bottom: 24px;
        color: #b52269;
        background: #fff0f6;
        border-radius: 16px;
        font-size: 24px;
    }

    .service-card-home h3 {
        margin-bottom: 10px;
        font-family: Georgia, "Times New Roman", serif;
        font-size: 23px;
        font-weight: 500;
    }

    .service-card-home p {
        min-height: 70px;
        color: #796c74;
        font-size: 13px;
        line-height: 1.9;
    }

    .service-card-home a {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-top: 20px;
        color: #b52269;
        font-size: 12px;
        font-weight: 800;
    }

    .service-card-home a:hover {
        color: #7f1548;
    }

    .home-about {
        background: #fff0f6;
    }

    .about-grid {
        display: grid;
        grid-template-columns: .9fr 1.1fr;
        align-items: center;
        gap: 75px;
    }

    .about-art {
        position: relative;
        min-height: 390px;
        display: grid;
        place-items: center;
        overflow: hidden;
        background:
            radial-gradient(circle at 30% 30%, #fff 0%, transparent 40%),
            linear-gradient(145deg, #f5c9dc, #e9a9c9);
        border-radius: 180px 180px 22px 22px;
    }

    .about-art::before,
    .about-art::after {
        content: "";
        position: absolute;
        border: 1px solid rgba(165, 30, 96, .2);
        border-radius: 50%;
    }

    .about-art::before {
        width: 260px;
        height: 260px;
    }

    .about-art::after {
        width: 210px;
        height: 210px;
    }

    .about-letter {
        position: relative;
        z-index: 1;
        color: #b52269;
        font-family: Georgia, "Times New Roman", serif;
        font-size: 190px;
        font-style: italic;
    }

    .about-copy > p {
        margin: 20px 0;
        color: #796c74;
        font-size: 14px;
        line-height: 2;
    }

    .about-points {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        margin: 27px 0 30px;
    }

    .about-point {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        color: #493440;
        font-size: 12px;
        font-weight: 700;
    }

    .about-point span {
        color: #c72c78;
        font-size: 17px;
    }

    .account-section {
        padding: 90px 0;
        background: white;
    }

    .account-panel {
        position: relative;
        padding: 58px 45px;
        overflow: hidden;
        background: linear-gradient(120deg, #a91d61, #d64a91 65%, #e987b8);
        border-radius: 25px;
        text-align: center;
        color: white;
    }

    .account-panel::before,
    .account-panel::after {
        content: "";
        position: absolute;
        width: 230px;
        height: 230px;
        border: 1px solid rgba(255, 255, 255, .18);
        border-radius: 50%;
    }

    .account-panel::before {
        top: -140px;
        left: -45px;
    }

    .account-panel::after {
        right: -70px;
        bottom: -160px;
    }

    .account-panel > * {
        position: relative;
        z-index: 1;
    }

    .account-panel .home-eyebrow {
        color: #ffe3f0;
    }

    .account-panel h2 {
        max-width: 650px;
        margin: 0 auto;
        font-family: Georgia, "Times New Roman", serif;
        font-size: clamp(30px, 4vw, 44px);
        font-weight: 500;
        line-height: 1.25;
    }

    .account-panel > p {
        max-width: 570px;
        margin: 15px auto 28px;
        color: #ffe9f3;
        font-size: 14px;
    }

    .account-actions {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 12px;
    }

    .account-actions a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 47px;
        padding: 12px 20px;
        border: 1px solid rgba(255, 255, 255, .5);
        border-radius: 9px;
        color: white;
        font-size: 12px;
        font-weight: 800;
        transition: background .2s, color .2s;
    }

    .account-actions a:first-child {
        color: #a51e60;
        background: white;
    }

    .account-actions a:hover {
        color: #a51e60;
        background: #ffeaf3;
    }

    .admin-note {
        display: inline-block;
        margin-top: 23px;
        color: #ffe9f3;
        font-size: 12px;
    }

    .admin-note a {
        color: white;
        text-decoration: underline;
        text-underline-offset: 4px;
        font-weight: 800;
    }

    @media (max-width: 850px) {
        .home-hero { padding: 60px 0; }

        .hero-grid {
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .hero-copy { text-align: center; }

        .hero-copy > p {
            margin-inline: auto;
        }

        .hero-actions,
        .hero-note {
            justify-content: center;
        }

        .hero-visual { min-height: 390px; }

        .hero-orbit {
            width: 320px;
            height: 320px;
        }

        .hero-art { width: 290px; }

        .hero-floating { left: 5%; }

        .hero-stamp { right: 5%; }

        .service-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }

        .about-grid {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .about-art {
            width: min(100%, 420px);
            margin: 0 auto;
        }
    }

    @media (max-width: 560px) {
        .home-wrap { width: calc(100% - 34px); }

        .home-hero { padding: 46px 0 55px; }

        .hero-copy h1 { letter-spacing: -1px; }

        .hero-copy > p { font-size: 14px; }

        .hero-actions { flex-direction: column; }

        .hero-button { width: 100%; }

        .hero-visual { min-height: 330px; }

        .hero-orbit {
            width: 275px;
            height: 275px;
        }

        .hero-art { width: 240px; }

        .hero-art::after { font-size: 145px; }

        .hero-floating {
            top: 15px;
            left: 0;
            padding: 11px 13px;
            font-size: 10px;
        }

        .hero-stamp {
            right: 0;
            bottom: 8px;
            width: 95px;
            height: 95px;
        }

        .hero-stamp strong { font-size: 19px; }

        .hero-stamp span { font-size: 8px; }

        .trust-grid { grid-template-columns: 1fr; gap: 8px; }

        .trust-item { justify-content: flex-start; }

        .home-section,
        .account-section { padding: 65px 0; }

        .service-grid { grid-template-columns: 1fr; }

        .service-card-home p { min-height: 0; }

        .about-art { min-height: 300px; }

        .about-letter { font-size: 145px; }

        .about-points { grid-template-columns: 1fr; }

        .account-panel { padding: 42px 20px; }

        .account-actions { flex-direction: column; }

        .account-actions a { width: 100%; }
    }

    @media (prefers-reduced-motion: reduce) {
        .hero-button,
        .service-card-home,
        .account-actions a {
            transition: none;
        }
    }
</style>

<div class="unique-home">

    <!-- HERO -->
    <section class="home-hero">
        <div class="home-wrap hero-grid">

            <div class="hero-copy">
                <div class="hero-label">
                    <span></span>
                    Welcome to UNIQUE
                </div>

                <h1>
                    Your beauty.<br>
                    Your confidence.<br>
                    <em>Your UNIQUE touch.</em>
                </h1>

                <p>
                    Step into a space created for beauty, care and confidence.
                    Discover salon services designed to help you look good,
                    feel wonderful and make time for yourself.
                </p>

                <div class="hero-actions">
                    <a href="{{ route('customer.register') }}" class="hero-button primary">
                        Book Your Experience <span aria-hidden="true">→</span>
                    </a>

                    <a href="#services" class="hero-button secondary">
                        Explore Our Services
                    </a>
                </div>

                <div class="hero-note">
                    <span class="hero-note-mark" aria-hidden="true">♡</span>
                    <span><strong>A little time for you.</strong> A feeling worth keeping.</span>
                </div>
            </div>

            <div class="hero-visual" aria-label="UNIQUE salon brand artwork">
                <div class="hero-orbit"></div>

                <div class="hero-art"></div>

                <div class="hero-floating">
                    <strong>Feel beautiful</strong>
                    Your moment. Your style.
                </div>

                <div class="hero-stamp">
                    <strong>UNIQUE</strong>
                    <span>CENTER FOR ALL</span>
                </div>
            </div>

        </div>
    </section>

    <!-- SERVICE PROMISES -->
    <section class="home-trust">
        <div class="home-wrap trust-grid">

            <div class="trust-item">
                <div class="trust-icon" aria-hidden="true">♡</div>
                <div>
                    <strong>Care That Comes First</strong>
                    <span>Your comfort matters to us</span>
                </div>
            </div>

            <div class="trust-item">
                <div class="trust-icon" aria-hidden="true">✧</div>
                <div>
                    <strong>Your Style, Your Way</strong>
                    <span>Beauty that feels like you</span>
                </div>
            </div>

            <div class="trust-item">
                <div class="trust-icon" aria-hidden="true">◷</div>
                <div>
                    <strong>Easy Appointment Booking</strong>
                    <span>Plan your salon visit online</span>
                </div>
            </div>

        </div>
    </section>

    <!-- SERVICES -->
    <section class="home-section" id="services">
        <div class="home-wrap">

            <div class="home-heading">
                <span class="home-eyebrow">The UNIQUE experience</span>
                <h2>A little luxury in your everyday</h2>
                <p>
                    Make room for yourself. Explore our salon offerings
                    and choose the service that suits your next look.
                </p>
            </div>

            <div class="service-grid">

                <article class="service-card-home">
                    <div class="service-icon" aria-hidden="true">✧</div>
                    <h3>Hair Styling</h3>
                    <p>
                        Refresh your look and express your personality
                        with a style that makes you feel confident.
                    </p>
                    <a href="{{ route('customer.register') }}">
                        Explore &amp; Book <span aria-hidden="true">→</span>
                    </a>
                </article>

                <article class="service-card-home">
                    <div class="service-icon" aria-hidden="true">♡</div>
                    <h3>Beauty &amp; Care</h3>
                    <p>
                        Take a moment for yourself with salon care
                        focused on your personal beauty experience.
                    </p>
                    <a href="{{ route('customer.register') }}">
                        Explore &amp; Book <span aria-hidden="true">→</span>
                    </a>
                </article>

                <article class="service-card-home">
                    <div class="service-icon" aria-hidden="true">❀</div>
                    <h3>Your Next Look</h3>
                    <p>
                        Planning a fresh look? Choose an available
                        salon service and arrange your next visit.
                    </p>
                    <a href="{{ route('customer.register') }}">
                        Explore &amp; Book <span aria-hidden="true">→</span>
                    </a>
                </article>

            </div>
        </div>
    </section>

    <!-- ABOUT -->
    <section class="home-section home-about" id="about">
        <div class="home-wrap about-grid">

            <div class="about-art" aria-hidden="true">
                <span class="about-letter"><img src=""></span>
            </div>

            <div class="about-copy">
                <span class="home-eyebrow">A space for you</span>

                <h2>Beauty is personal. Your experience should be too.</h2>

                <p>
                    At UNIQUE — Center for All, we believe that taking care
                    of yourself should feel special. Our goal is to offer
                    a welcoming salon experience where you can make time
                    for your beauty and leave feeling refreshed.
                </p>

                <div class="about-points">
                    <div class="about-point">
                        <span aria-hidden="true">✓</span>
                        A welcoming experience
                    </div>

                    <div class="about-point">
                        <span aria-hidden="true">✓</span>
                        Convenient online booking
                    </div>

                    <div class="about-point">
                        <span aria-hidden="true">✓</span>
                        Services to suit your style
                    </div>

                    <div class="about-point">
                        <span aria-hidden="true">✓</span>
                        Your time matters
                    </div>
                </div>

                <a href="{{ route('customer.register') }}" class="hero-button primary">
                    Make Your Appointment <span aria-hidden="true">→</span>
                </a>
            </div>

        </div>
    </section>

    <!-- CUSTOMER ACCOUNT CTA -->
    <section class="account-section">
        <div class="home-wrap">
            <div class="account-panel">

                <span class="home-eyebrow">Your next visit starts here</span>

                <h2>Ready to make time for yourself?</h2>

                <p>
                    Create your customer account to book a salon appointment,
                    or sign in if you already have an account with UNIQUE.
                </p>

                <div class="account-actions">
                    <a href="{{ route('customer.register') }}">
                        Create Customer Account
                    </a>

                    <a href="{{ route('customer.login') }}">
                        Customer Login
                    </a>
                </div>

                <div class="admin-note">
                    Salon administrator?
                    <a href="{{ route('admin.login') }}">Access the Admin Portal</a>
                </div>

            </div>
        </div>
    </section>

</div>

@endsection
