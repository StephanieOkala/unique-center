
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="theme-color" content="#fff5f9">
    <meta name="description" content="UNIQUE — Center for All. Discover your beauty and book your salon appointment with us.">

    <title>@yield('title', 'UNIQUE — Center for All')</title>

    <link rel="stylesheet" href="{{ asset('css/unique.css') }}">
</head>
<body>

<header class="site-header" id="siteHeader">
    <nav class="navbar">

        <a href="{{ route('home') }}" class="brand">
            <span class="brand-symbol">U</span>
            <span class="brand-text">
                <span class="brand-name">UNIQUE<span>.</span></span>
                <span class="brand-tagline">CENTER FOR ALL</span>
            </span>
        </a>

        <button
            class="menu-toggle"
            id="menuToggle"
            type="button"
            aria-label="Toggle navigation"
            aria-expanded="false"
            aria-controls="navLinks">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <ul class="nav-links" id="navLinks">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('home') }}#services">Our Services</a></li>
            <li><a href="{{ route('home') }}#about">About Us</a></li>
            <li><a href="{{ route('home') }}#contact">Contact</a></li>

            <li class="nav-mobile-divider"></li>

            <li>
                <a href="{{ route('customer.login') }}" class="nav-login">
                    Customer Login
                </a>
            </li>

            <li>
                <a href="{{ route('customer.register') }}" class="nav-register">
                    Create Account
                </a>
            </li>

            <li>
                <a href="{{ route('admin.login') }}" class="nav-admin">
                    Admin Portal <span aria-hidden="true">↗</span>
                </a>
            </li>
        </ul>

    </nav>
</header>

<main>
    @yield('content')
</main>

<footer class="site-footer" id="contact">
    <div class="footer-top">
        <div class="footer-brand-block">
            <a href="{{ route('home') }}" class="brand footer-brand">
                <span class="brand-symbol">U</span>
                <span class="brand-text">
                    <span class="brand-name">UNIQUE<span>.</span></span>
                    <span class="brand-tagline">CENTER FOR ALL</span>
                </span>
            </a>

            <p>Beauty, confidence and care — all in one place.</p>
        </div>

        <div class="footer-column">
            <h3>Explore</h3>
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('home') }}#services">Our Services</a>
            <a href="{{ route('home') }}#about">About Us</a>
        </div>

        <div class="footer-column">
            <h3>Your Account</h3>
            <a href="{{ route('customer.login') }}">Customer Login</a>
            <a href="{{ route('customer.register') }}">Create Account</a>
            <a href="{{ route('admin.login') }}">Admin Portal</a>
        </div>
    </div>

    <div class="footer-bottom">
        <p>© {{ date('Y') }} UNIQUE — Center for All. All rights reserved.</p>
        <span>Made with care. Designed for your beauty.</span>
    </div>
</footer>

<script>
    const header = document.getElementById('siteHeader');
    const menuToggle = document.getElementById('menuToggle');
    const navLinks = document.getElementById('navLinks');

    window.addEventListener('scroll', function () {
        header.classList.toggle('scrolled', window.scrollY > 15);
    });

    menuToggle.addEventListener('click', function () {
        const isOpen = navLinks.classList.toggle('active');

        menuToggle.classList.toggle('open', isOpen);
        menuToggle.setAttribute('aria-expanded', isOpen);
        menuToggle.setAttribute(
            'aria-label',
            isOpen ? 'Close navigation' : 'Open navigation'
        );
    });

    navLinks.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', function () {
            navLinks.classList.remove('active');
            menuToggle.classList.remove('open');
            menuToggle.setAttribute('aria-expanded', 'false');
        });
    });
</script>

</body>
</html>
