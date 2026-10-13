<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin') | UNIQUE</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f8f5f7;
            color: #292229;
        }

        a {
            text-decoration: none;
        }

        .admin-container {
            display: flex;
            min-height: 100vh;
        }

        /* =========================
           SIDEBAR
        ========================== */

        .sidebar {
            width: 255px;
            background: #211a20;
            color: white;
            padding: 28px 18px;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 1000;
            overflow-y: auto;
            transition: transform .3s ease;
        }

        .brand {
            padding: 5px 12px 35px;
        }

        .brand h1 {
            font-size: 27px;
            letter-spacing: 5px;
        }

        .brand p {
            color: #dca0b7;
            font-size: 12px;
            margin-top: 5px;
            letter-spacing: 1px;
        }

        .menu-title {
            color: #81777d;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 18px 12px 10px;
        }

        .nav-link {
            display: block;
            color: #d8d1d5;
            padding: 13px 14px;
            margin-bottom: 5px;
            border-radius: 10px;
            font-size: 14px;
            transition: .25s;
        }

        .nav-link:hover,
        .nav-link.active {
            background: #d98ba5;
            color: white;
        }

        /* =========================
           MOBILE MENU BUTTON
        ========================== */

        .admin-menu-toggle {
            display: none;
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1100;
            border: none;
            background: #211a20;
            color: white;
            width: 44px;
            height: 44px;
            border-radius: 10px;
            font-size: 23px;
            cursor: pointer;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .15);
        }

        .admin-menu-toggle:hover {
            background: #d98ba5;
        }

        .sidebar-close {
            display: none;
            position: absolute;
            top: 18px;
            right: 18px;
            border: none;
            background: transparent;
            color: white;
            font-size: 25px;
            cursor: pointer;
        }

        .admin-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .45);
            z-index: 900;
        }

        .admin-overlay.show {
            display: block;
        }

        /* =========================
           MAIN CONTENT
        ========================== */

        .main-content {
            margin-left: 255px;
            width: calc(100% - 255px);
            padding: 30px;
            transition: .3s ease;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .topbar h2 {
            font-size: 28px;
            font-weight: 700;
        }

        .topbar p {
            color: #8b8087;
            margin-top: 6px;
            font-size: 14px;
        }

        .admin-profile {
            background: white;
            padding: 10px 17px;
            border-radius: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .05);
            font-size: 13px;
        }

        /* =========================
           DASHBOARD STATS
        ========================== */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            padding: 23px;
            border-radius: 18px;
            box-shadow: 0 8px 30px rgba(35, 25, 32, .06);
            position: relative;
            overflow: hidden;
        }

        .stat-card::after {
            content: "";
            position: absolute;
            width: 70px;
            height: 70px;
            background: #f6dce5;
            border-radius: 50%;
            right: -25px;
            top: -25px;
        }

        .stat-title {
            color: #8d8389;
            font-size: 13px;
        }

        .stat-value {
            font-size: 31px;
            font-weight: 700;
            margin-top: 10px;
        }

        /* =========================
           PANELS
        ========================== */

        .panel {
            background: white;
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 8px 30px rgba(35, 25, 32, .06);
            margin-bottom: 25px;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
        }

        .panel-header h3 {
            font-size: 18px;
        }

        .panel-header p {
            color: #8d8389;
            font-size: 13px;
            margin-top: 4px;
        }

        /* =========================
           BUTTONS
        ========================== */

        .btn {
            border: none;
            padding: 11px 17px;
            border-radius: 9px;
            cursor: pointer;
            font-size: 13px;
            transition: .2s;
        }

        .btn-primary {
            background: #d889a4;
            color: white;
        }

        .btn-primary:hover {
            background: #c96e8d;
            transform: translateY(-1px);
        }

        .btn-light {
            background: #f2eef0;
            color: #453b42;
        }

        .btn-danger {
            background: #fbe7e7;
            color: #b94a4a;
        }

        /* =========================
           TABLES
        ========================== */

        .table-wrapper {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        th {
            text-align: left;
            color: #8c8288;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .7px;
            padding: 13px;
            border-bottom: 1px solid #eee8eb;
        }

        td {
            padding: 16px 13px;
            border-bottom: 1px solid #f1ecee;
            font-size: 14px;
        }

        .status {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .active-status {
            background: #e7f6eb;
            color: #348047;
        }

        .inactive-status {
            background: #f3eeee;
            color: #8d7777;
        }

        /* =========================
           ALERT
        ========================== */

        .alert {
            padding: 13px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            background: #e8f7ec;
            color: #327344;
            font-size: 14px;
        }

        /* =========================
           QUICK ACTIONS
        ========================== */

        .quick-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }

        .quick-action {
            display: block;
            padding: 20px;
            background: #faf7f8;
            border: 1px solid #eee5e9;
            border-radius: 14px;
            color: #302830;
            transition: .2s;
        }

        .quick-action:hover {
            transform: translateY(-3px);
            border-color: #e2a3b8;
        }

        .quick-action strong {
            display: block;
            margin-bottom: 6px;
        }

        .quick-action span {
            color: #8b8087;
            font-size: 12px;
        }

        /* =========================
           TABLET
        ========================== */

        @media (max-width: 1050px) {

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* =========================
           MOBILE SIDEBAR
        ========================== */

        @media (max-width: 750px) {

            .sidebar {
                width: 270px;
                transform: translateX(-100%);
                box-shadow: 10px 0 35px rgba(0, 0, 0, .18);
                padding: 25px 16px;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .sidebar-close {
                display: block;
            }

            .admin-menu-toggle {
                display: flex;
                position: fixed;
                top: 15px;
                right: 15px;
                z-index: 1100;
            }

            .main-content {
                margin-left: 0;
                width: 100%;
                padding: 20px;
                padding-top: 75px;
            }

            .quick-grid {
                grid-template-columns: 1fr;
            }

            .topbar {
                align-items: flex-start;
            }

            .topbar-left {
                align-items: flex-start;
            }

            .brand {
                padding-right: 45px;
            }

            .nav-link {
                padding: 13px 14px;
                margin-bottom: 7px;
            }
        }

        /* =========================
           SMALL MOBILE
        ========================== */

        @media (max-width: 600px) {

            .main-content {
                padding: 70px 15px 25px;
            }

            .topbar {
                flex-direction: column;
                gap: 15px;
            }

            .topbar-left {
                width: 100%;
            }

            .admin-profile {
                align-self: flex-end;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .panel {
                padding: 18px;
                border-radius: 14px;
            }

            .panel-header {
                align-items: flex-start;
                gap: 12px;
            }

            .topbar h2 {
                font-size: 24px;
            }

            .brand h1 {
                font-size: 24px;
            }

            .brand p {
                font-size: 11px;
            }
        }

    </style>
</head>

<body>

    <div class="admin-container">

        <!-- Mobile overlay -->
        <div class="admin-overlay" id="adminOverlay"></div>

        <!-- Sidebar -->
        <aside class="sidebar" id="adminSidebar">

            <button class="sidebar-close" id="sidebarClose" type="button" aria-label="Close menu">
                &times;
            </button>

            <div class="brand">
                <h1>UNIQUE</h1>
                <p>Center for All</p>
            </div>

            <div class="menu-title">
                Main
            </div>

            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                Dashboard
            </a>

            <a href="{{ route('admin.services.index') }}" class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                Services
            </a>

            <a href="{{ route('admin.appointments.index') }}" class="nav-link {{ request()->routeIs('admin.appointments.*') ? 'active' : '' }}">
                Appointments
            </a>

            
            <a href="{{ route('admin.customers') }}" class="nav-link {{ request()->routeIs('admin.customers') ? 'active' : '' }}">
                Customers
            </a>

            <a href="{{ route('admin.time-slots') }}" class="nav-link {{ request()->routeIs('admin.time-slots') ? 'active' : '' }}">
                Time Slots
            </a>

            <div class="menu-title">
                System
            </div>

            <a href="{{ route('admin.settings') }}" class="nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                Settings
            </a>

            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link" style="width:100%;text-align:left;border:none;background:transparent;cursor:pointer;font-family:inherit;">
                    Logout
                </button>
            </form>
            ```
        </aside>

        <!-- Main content -->
        <main class="main-content">

            <!-- Mobile menu button -->
            <button class="admin-menu-toggle" id="adminMenuToggle" type="button" aria-label="Open menu">
                ☰
            </button>

            @yield('content')

        </main>

    </div>

    <script>
        const sidebar = document.getElementById('adminSidebar');
        const overlay = document.getElementById('adminOverlay');
        const sidebarClose = document.getElementById('sidebarClose');
        const adminMenuToggle = document.getElementById('adminMenuToggle');

        function openAdminSidebar() {
            sidebar.classList.add('open');
            overlay.classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closeAdminSidebar() {
            sidebar.classList.remove('open');
            overlay.classList.remove('show');
            document.body.style.overflow = '';
        }

        adminMenuToggle.addEventListener('click', openAdminSidebar);

        sidebarClose.addEventListener('click', closeAdminSidebar);

        overlay.addEventListener('click', closeAdminSidebar);

        document
            .querySelectorAll('.nav-link')
            .forEach(function(link) {

                link.addEventListener('click', function() {

                    if (window.innerWidth <= 750) {
                        closeAdminSidebar();
                    }

                });

            });

        window.addEventListener('resize', function() {

            if (window.innerWidth > 750) {
                closeAdminSidebar();
            }

        });

    </script>

</body>
</html>
