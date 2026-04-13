<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Laptop - Sistem Informasi Peminjaman Laptop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            const hamburger = document.getElementById('hamburger');
            mobileMenu.classList.toggle('hidden');
            hamburger.classList.toggle('active');
        }

        function closeMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            const hamburger = document.getElementById('hamburger');
            mobileMenu.classList.add('hidden');
            hamburger.classList.remove('active');
        }

        function handleMulaiPinjam() {
            const isAuthenticated = false;
            if (isAuthenticated) {
                window.location.href = "/dashboard";
            } else {
                window.location.href = "/login";
            }
        }

        function handleLogin() {
            window.location.href = "/login";
        }
    </script>
    <style>
        /* ===== ROOT & BASE ===== */
        :root {
            --navy-darkest: #060d1a;
            --navy-dark:    #0a1628;
            --navy-mid:     #0f2744;
            --navy-accent:  #1e3a5f;
            --blue-glow:    rgba(56, 139, 253, 0.18);
            --blue-border:  rgba(99, 179, 237, 0.22);
            --blue-bright:  #60a5fa;
            --blue-light:   #93c5fd;
            --blue-pale:    #bfdbfe;
            --text-main:    #e0f2fe;
            --text-muted:   rgba(186, 215, 251, 0.65);
            --text-faint:   rgba(147, 197, 253, 0.50);
            --glass-bg:     rgba(255, 255, 255, 0.055);
            --glass-hover:  rgba(255, 255, 255, 0.10);
            --glass-border: rgba(255, 255, 255, 0.10);
        }

        * { box-sizing: border-box; }

        html { scroll-padding-top: 80px; }

        body {
            background: linear-gradient(160deg, var(--navy-darkest) 0%, #0d1f3c 35%, var(--navy-mid) 65%, var(--navy-dark) 100%);
            color: var(--text-main);
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* ===== AMBIENT GLOW BLOBS ===== */
        body::before {
            content: '';
            position: fixed;
            top: -10%;
            left: -15%;
            width: 55%;
            height: 55%;
            background: radial-gradient(ellipse, rgba(56,139,253,0.13) 0%, transparent 70%);
            pointer-events: none;
            animation: blobFloat 9s ease-in-out infinite alternate;
            z-index: 0;
        }

        body::after {
            content: '';
            position: fixed;
            bottom: -10%;
            right: -10%;
            width: 45%;
            height: 50%;
            background: radial-gradient(ellipse, rgba(99,179,237,0.09) 0%, transparent 70%);
            pointer-events: none;
            animation: blobFloat 12s ease-in-out infinite alternate-reverse;
            z-index: 0;
        }

        @keyframes blobFloat {
            0%   { transform: scale(1) translate(0, 0); opacity: 0.7; }
            100% { transform: scale(1.12) translate(2%, 3%); opacity: 1; }
        }

        section, nav, footer { position: relative; z-index: 1; }

        /* ===== NAVBAR ===== */
        .navbar-fixed {
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            background: rgba(6, 13, 26, 0.82);
            border-bottom: 1px solid var(--blue-border);
            transition: all 0.3s ease;
        }

        .nav-logo-box {
            background: linear-gradient(135deg, #2563eb, #1e40af);
            box-shadow: 0 4px 16px rgba(37, 99, 235, 0.4);
            transition: all 0.3s ease;
        }

        .nav-logo-box:hover {
            transform: rotate(-6deg) scale(1.08);
            box-shadow: 0 6px 22px rgba(37, 99, 235, 0.6);
        }

        .nav-link {
            color: var(--text-muted);
            font-weight: 500;
            font-size: 14px;
            letter-spacing: 0.02em;
            transition: color 0.25s ease;
            position: relative;
            padding-bottom: 2px;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px; left: 0;
            width: 0; height: 2px;
            background: linear-gradient(90deg, #3b82f6, #93c5fd);
            border-radius: 2px;
            transition: width 0.3s ease;
        }

        .nav-link:hover { color: var(--blue-pale); }
        .nav-link:hover::after { width: 100%; }

        /* ===== HAMBURGER ===== */
        .hamburger {
            cursor: pointer;
            width: 28px;
            height: 22px;
            position: relative;
            z-index: 60;
        }

        .hamburger span {
            display: block;
            position: absolute;
            height: 2.5px;
            width: 100%;
            background: var(--blue-light);
            border-radius: 3px;
            left: 0;
            transform: rotate(0deg);
            transition: .25s ease-in-out;
        }

        .hamburger span:nth-child(1) { top: 0px; }
        .hamburger span:nth-child(2) { top: 9px; }
        .hamburger span:nth-child(3) { top: 18px; }

        .hamburger.active span:nth-child(1) { top: 9px; transform: rotate(135deg); }
        .hamburger.active span:nth-child(2) { opacity: 0; left: -60px; }
        .hamburger.active span:nth-child(3) { top: 9px; transform: rotate(-135deg); }

        /* ===== MOBILE MENU ===== */
        #mobileMenu {
            background: rgba(6, 13, 26, 0.96);
            border: 1px solid var(--blue-border);
            border-radius: 14px;
            backdrop-filter: blur(16px);
            transition: all 0.3s ease-in-out;
        }

        .mobile-link {
            color: var(--text-muted);
            font-weight: 500;
            font-size: 14px;
            padding: 10px 14px;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .mobile-link:hover {
            color: var(--blue-pale);
            background: var(--glass-bg);
        }

        /* ===== GLASS CARD ===== */
        .glass-card {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            position: relative;
            overflow: hidden;
            transition: all 0.35s cubic-bezier(0.23, 1, 0.32, 1);
            box-shadow:
                0 6px 24px rgba(0,0,0,0.35),
                0 1px 0 rgba(255,255,255,0.07) inset,
                0 -1px 0 rgba(0,0,0,0.2) inset;
        }

        .glass-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.055) 0%, transparent 55%);
            pointer-events: none;
            border-radius: inherit;
        }

        .glass-card:hover {
            transform: translateY(-7px) scale(1.015);
            background: var(--glass-hover);
            border-color: rgba(99,179,237,0.38);
            box-shadow:
                0 22px 52px rgba(0,0,0,0.45),
                0 8px 22px rgba(56,139,253,0.22),
                0 1px 0 rgba(255,255,255,0.11) inset;
        }

        /* ===== 3D TILT CARD (desktop) ===== */
        @media (min-width: 768px) {
            .card-tilt-left  { transform: perspective(1000px) rotateY(-3deg); }
            .card-tilt-right { transform: perspective(1000px) rotateY(3deg); }
            .card-tilt-left:hover,
            .card-tilt-right:hover { transform: perspective(1000px) rotateY(0deg) translateZ(10px) translateY(-7px); }
        }

        /* ===== BOX ITEM (step / feature boxes) ===== */
        .box-item {
            background: rgba(255,255,255,0.045);
            border: 1px solid rgba(99,179,237,0.15);
            border-radius: 14px;
            transition: all 0.3s ease;
        }

        .box-item:hover {
            background: rgba(56,139,253,0.10);
            border-color: rgba(99,179,237,0.35);
            transform: translateY(-4px);
            box-shadow: 0 10px 28px rgba(56,139,253,0.18);
        }

        /* ===== BUTTONS ===== */
        .btn-primary {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: #fff;
            font-weight: 600;
            border-radius: 12px;
            border: 1px solid rgba(99,179,237,0.3);
            box-shadow: 0 4px 18px rgba(37,99,235,0.4);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(37,99,235,0.55);
            background: linear-gradient(135deg, #3b82f6, #2563eb);
        }

        .btn-primary:active { transform: translateY(-1px); }

        .btn-outline {
            background: transparent;
            color: var(--blue-light);
            font-weight: 600;
            border-radius: 12px;
            border: 1.5px solid rgba(99,179,237,0.4);
            transition: all 0.3s ease;
        }

        .btn-outline:hover {
            background: rgba(56,139,253,0.12);
            border-color: rgba(99,179,237,0.65);
            color: var(--blue-pale);
            transform: translateY(-3px);
            box-shadow: 0 8px 22px rgba(56,139,253,0.2);
        }

        .btn-sm {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: #fff;
            font-size: 12px;
            font-weight: 600;
            padding: 7px 16px;
            border-radius: 8px;
            border: 1px solid rgba(99,179,237,0.25);
            box-shadow: 0 3px 12px rgba(37,99,235,0.35);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-sm:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(37,99,235,0.5);
        }

        /* ===== SECTION ===== */
        .section-height {
            min-height: 100vh;
            padding: 80px 0;
        }

        /* ===== HEADING GRADIENT ===== */
        .heading-grad {
            background: linear-gradient(135deg, #e0f2fe 0%, #93c5fd 55%, #60a5fa 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* ===== SECTION DIVIDER ===== */
        .section-alt {
            background: rgba(255,255,255,0.018);
            border-top:    1px solid rgba(99,179,237,0.10);
            border-bottom: 1px solid rgba(99,179,237,0.10);
        }

        /* ===== IMAGE CONTAINER ===== */
        .image-container {
            width: 100%;
            height: 200px;
            overflow: hidden;
            border-radius: 12px;
            background: linear-gradient(135deg, #1e3a5f, #0f2744);
            border: 1px solid var(--blue-border);
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            opacity: 0.9;
            transition: transform 0.4s ease, opacity 0.3s ease;
        }

        .glass-card:hover .image-container img {
            transform: scale(1.05);
            opacity: 1;
        }

        /* ===== ICON WRAP ===== */
        .icon-wrap {
            background: rgba(56,139,253,0.14);
            border: 1px solid rgba(56,139,253,0.28);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(56,139,253,0.2);
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .box-item:hover .icon-wrap,
        .glass-card:hover .icon-wrap {
            background: rgba(56,139,253,0.26);
            border-color: rgba(99,179,237,0.50);
            transform: rotate(-6deg) scale(1.1);
            box-shadow: 0 6px 20px rgba(56,139,253,0.38);
        }

        /* ===== NUMBER BADGE ===== */
        .num-badge {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            border: 1px solid rgba(99,179,237,0.3);
            box-shadow: 0 4px 14px rgba(37,99,235,0.4);
            border-radius: 12px;
            color: #fff;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }

        .box-item:hover .num-badge {
            box-shadow: 0 6px 20px rgba(37,99,235,0.6);
            transform: scale(1.08);
        }

        /* ===== STAT BOX ===== */
        .stat-box {
            background: rgba(56,139,253,0.08);
            border: 1px solid rgba(99,179,237,0.20);
            border-radius: 14px;
            transition: all 0.3s ease;
        }

        .stat-box:hover {
            background: rgba(56,139,253,0.16);
            border-color: rgba(99,179,237,0.40);
            transform: translateY(-4px);
            box-shadow: 0 10px 28px rgba(56,139,253,0.2);
        }

        /* ===== STATUS BADGE ===== */
        .status-green  { background: rgba(34,197,94,0.18); border: 1px solid rgba(34,197,94,0.35); color: #86efac; }
        .status-yellow { background: rgba(234,179,8,0.18);  border: 1px solid rgba(234,179,8,0.35);  color: #fde047; }
        .status-blue   { background: rgba(56,139,253,0.18); border: 1px solid rgba(56,139,253,0.35); color: #93c5fd; }

        .status-pill {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.04em;
            flex-shrink: 0;
        }

        /* ===== STATUS ROW ===== */
        .status-row {
            border-radius: 12px;
            padding: 14px 16px;
            transition: all 0.3s ease;
        }

        .status-row-green  { background: rgba(34,197,94,0.07);  border: 1px solid rgba(34,197,94,0.18); }
        .status-row-yellow { background: rgba(234,179,8,0.07);  border: 1px solid rgba(234,179,8,0.18); }
        .status-row-blue   { background: rgba(56,139,253,0.07); border: 1px solid rgba(56,139,253,0.18); }

        .status-row:hover { transform: translateX(4px); filter: brightness(1.15); }

        /* ===== FORM INPUTS ===== */
        .form-input {
            width: 100%;
            background: rgba(255,255,255,0.055);
            border: 1px solid rgba(99,179,237,0.22);
            border-radius: 10px;
            color: var(--text-main);
            font-size: 14px;
            transition: all 0.25s ease;
            outline: none;
        }

        .form-input::placeholder { color: var(--text-faint); }

        .form-input:focus {
            border-color: rgba(99,179,237,0.55);
            background: rgba(56,139,253,0.08);
            box-shadow: 0 0 0 3px rgba(56,139,253,0.12);
        }

        .form-label {
            display: block;
            color: var(--text-muted);
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 7px;
            letter-spacing: 0.02em;
        }

        /* ===== SHIMMER BAR ===== */
        .shimmer-bar {
            height: 3px;
            background: linear-gradient(90deg, #3b82f6, #60a5fa, #93c5fd);
            position: relative;
            overflow: hidden;
        }

        .shimmer-bar::after {
            content: '';
            position: absolute;
            top: 0; left: -100%;
            width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.55), transparent);
            animation: shimmer 3s ease-in-out infinite;
        }

        @keyframes shimmer {
            0%      { left: -100%; }
            60%,100%{ left: 100%; }
        }

        /* ===== ANIMATIONS ===== */
        @keyframes fadeSlideDown {
            0%   { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeSlideUp {
            0%   { opacity: 0; transform: translateY(24px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .anim-down { animation: fadeSlideDown 0.7s ease both; }
        .anim-up   { animation: fadeSlideUp  0.8s ease 0.15s both; }

        /* ===== BORDER-LEFT STEP ===== */
        .step-card {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-left: 3px solid #3b82f6;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .step-card:hover {
            background: rgba(56,139,253,0.10);
            border-left-color: #93c5fd;
            transform: translateX(5px);
            box-shadow: 0 6px 20px rgba(56,139,253,0.18);
        }

        /* ===== FOOTER ===== */
        footer {
            background: rgba(4, 9, 20, 0.95);
            border-top: 1px solid var(--blue-border);
        }

        .footer-link { color: var(--text-faint); font-size: 13px; transition: color 0.2s ease; }
        .footer-link:hover { color: var(--blue-pale); }

        /* ===== SCROLL BAR ===== */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--navy-dark); }
        ::-webkit-scrollbar-thumb { background: rgba(99,179,237,0.35); border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(99,179,237,0.6); }
    </style>
</head>
<body>

    <!-- ===== NAVBAR ===== -->
    <nav class="navbar-fixed fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-4">
            <div class="flex justify-between items-center">

                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div class="nav-logo-box w-10 h-10 sm:w-11 sm:h-11 rounded-xl flex items-center justify-center text-white font-bold text-lg">
                        L
                    </div>
                    <span class="text-xl sm:text-2xl font-bold heading-grad">E-Laptop</span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex space-x-6 xl:space-x-8">
                    <a href="#home"           class="nav-link">Home</a>
                    <a href="#about"          class="nav-link">About</a>
                    <a href="#barang"         class="nav-link">Barang</a>
                    <a href="#ketentuan"      class="nav-link">Ketentuan</a>
                    <a href="#pinjam-kembali" class="nav-link">Pinjam Kembali</a>
                    <a href="#kontak"         class="nav-link">Kontak</a>
                </div>

                <!-- Desktop Auth -->
                <div class="hidden lg:flex items-center space-x-3">
                    <button onclick="handleLogin()" class="btn-primary px-5 py-2 text-sm cursor-pointer">
                        Login
                    </button>
                </div>

                <!-- Hamburger -->
                <div class="lg:hidden">
                    <div id="hamburger" class="hamburger" onclick="toggleMobileMenu()">
                        <span></span><span></span><span></span>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobileMenu" class="hidden lg:hidden mt-4 pb-2">
                <div class="flex flex-col space-y-1 p-3">
                    <a href="#home"           onclick="closeMobileMenu()" class="mobile-link">Home</a>
                    <a href="#about"          onclick="closeMobileMenu()" class="mobile-link">About</a>
                    <a href="#barang"         onclick="closeMobileMenu()" class="mobile-link">Barang</a>
                    <a href="#ketentuan"      onclick="closeMobileMenu()" class="mobile-link">Ketentuan</a>
                    <a href="#pinjam-kembali" onclick="closeMobileMenu()" class="mobile-link">Pinjam Kembali</a>
                    <a href="#kontak"         onclick="closeMobileMenu()" class="mobile-link">Kontak</a>
                    <div class="border-t border-white/10 pt-3 mt-2">
                        <button onclick="handleLogin()" class="btn-primary w-full py-2 text-sm cursor-pointer">
                            Login
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- ===== SECTION 1: HOME ===== -->
    <section id="home" class="section-height flex items-center justify-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-14 items-center">

                <!-- Text -->
                <div class="space-y-5 sm:space-y-6 text-center lg:text-left order-2 lg:order-1 anim-down">
                    <div class="inline-block px-4 py-1.5 rounded-full text-xs font-semibold tracking-widest"
                         style="background:rgba(56,139,253,0.15); border:1px solid rgba(99,179,237,0.3); color:#93c5fd;">
                        SISTEM PEMINJAMAN LAPTOP
                    </div>
                    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-[3.4rem] font-extrabold leading-tight heading-grad">
                        Sistem Informasi Peminjaman Laptop
                    </h1>
                    <p class="text-base sm:text-lg" style="color:var(--text-muted); line-height:1.75;">
                        Kelola peminjaman laptop sekolah dengan mudah, cepat, dan terorganisir.
                        Platform modern untuk pengelolaan aset digital sekolah.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-3 justify-center lg:justify-start">
                        <button onclick="handleMulaiPinjam()" class="btn-primary px-8 py-3.5 text-base cursor-pointer w-full sm:w-auto">
                            Mulai Pinjam →
                        </button>
                        <button onclick="window.location.href='#about'" class="btn-outline px-8 py-3.5 text-base cursor-pointer w-full sm:w-auto">
                            Pelajari Lebih
                        </button>
                    </div>
                </div>

                <!-- Motivation Card -->
                <div class="flex justify-center order-1 lg:order-2 anim-up">
                    <div class="glass-card card-tilt-left p-7 sm:p-9 w-full max-w-md">
                        <p class="text-xs font-semibold tracking-widest mb-5" style="color:var(--text-faint);">NILAI PEMINJAMAN</p>
                        <div class="space-y-4">

                            <div class="box-item p-4 sm:p-5 flex items-center gap-4">
                                <div class="icon-wrap w-11 h-11">
                                    <svg class="w-5 h-5" style="color:var(--blue-light);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3l7 4v5c0 5-3.5 7.5-7 9-3.5-1.5-7-4-7-9V7l7-4z"/>
                                    </svg>
                                </div>
                                <span class="font-semibold text-sm sm:text-base" style="color:var(--text-main);">Gunakan fasilitas dengan bijak</span>
                            </div>

                            <div class="box-item p-4 sm:p-5 flex items-center gap-4">
                                <div class="icon-wrap w-11 h-11">
                                    <svg class="w-5 h-5" style="color:var(--blue-light);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5h6m-6 4h6m-6 4h6M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z"/>
                                    </svg>
                                </div>
                                <span class="font-semibold text-sm sm:text-base" style="color:var(--text-main);">Peminjaman tertib, kegiatan lancar</span>
                            </div>

                            <div class="box-item p-4 sm:p-5 flex items-center gap-4">
                                <div class="icon-wrap w-11 h-11">
                                    <svg class="w-5 h-5" style="color:var(--blue-light);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m-3-7a9 9 0 100 18 9 9 0 000-18z"/>
                                    </svg>
                                </div>
                                <span class="font-semibold text-sm sm:text-base" style="color:var(--text-main);">Jaga laptop untuk bersama</span>
                            </div>

                        </div>
                        <div class="shimmer-bar mt-6 rounded-full"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== SECTION 2: ABOUT ===== -->
    <section id="about" class="section-height flex items-center justify-center section-alt">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-14 items-center">

                <!-- Features Card -->
                <div class="flex justify-center order-2 lg:order-1">
                    <div class="glass-card card-tilt-right p-7 sm:p-9 w-full max-w-md">
                        <p class="text-xs font-semibold tracking-widest mb-6" style="color:var(--text-faint);">KEUNGGULAN PLATFORM</p>
                        <div class="space-y-5">

                            <div class="box-item p-4 sm:p-5 flex items-start gap-4">
                                <div class="num-badge w-12 h-12 text-base">1</div>
                                <div>
                                    <h3 class="font-bold text-sm sm:text-base mb-1" style="color:var(--text-main);">Mudah Digunakan</h3>
                                    <p class="text-xs sm:text-sm" style="color:var(--text-muted);">Interface intuitif dan user-friendly</p>
                                </div>
                            </div>

                            <div class="box-item p-4 sm:p-5 flex items-start gap-4">
                                <div class="num-badge w-12 h-12 text-base">2</div>
                                <div>
                                    <h3 class="font-bold text-sm sm:text-base mb-1" style="color:var(--text-main);">Real-time Tracking</h3>
                                    <p class="text-xs sm:text-sm" style="color:var(--text-muted);">Monitor status laptop secara langsung</p>
                                </div>
                            </div>

                            <div class="box-item p-4 sm:p-5 flex items-start gap-4">
                                <div class="num-badge w-12 h-12 text-base">3</div>
                                <div>
                                    <h3 class="font-bold text-sm sm:text-base mb-1" style="color:var(--text-main);">Laporan Lengkap</h3>
                                    <p class="text-xs sm:text-sm" style="color:var(--text-muted);">Data terorganisir dengan baik</p>
                                </div>
                            </div>

                        </div>
                        <div class="shimmer-bar mt-6 rounded-full"></div>
                    </div>
                </div>

                <!-- Text -->
                <div class="space-y-5 sm:space-y-6 text-center lg:text-left order-1 lg:order-2">
                    <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold heading-grad">
                        Tentang E-Laptop
                    </h2>
                    <p class="text-sm sm:text-base leading-relaxed" style="color:var(--text-muted);">
                        E-Laptop adalah sistem informasi modern yang dirancang khusus untuk memudahkan pengelolaan peminjaman laptop di lingkungan sekolah.
                    </p>
                    <p class="text-sm sm:text-base leading-relaxed" style="color:var(--text-muted);">
                        Dengan fitur-fitur canggih dan antarmuka yang mudah digunakan, sistem ini membantu meningkatkan efisiensi dan transparansi dalam proses peminjaman laptop sekolah.
                    </p>
                    <div class="grid grid-cols-2 gap-4 pt-2">
                        <div class="stat-box p-5 sm:p-6 text-center">
                            <div class="text-2xl sm:text-3xl font-extrabold heading-grad">99%</div>
                            <div class="text-xs sm:text-sm mt-1" style="color:var(--text-muted);">Kepuasan User</div>
                        </div>
                        <div class="stat-box p-5 sm:p-6 text-center">
                            <div class="text-2xl sm:text-3xl font-extrabold heading-grad">24/7</div>
                            <div class="text-xs sm:text-sm mt-1" style="color:var(--text-muted);">Akses Online</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== SECTION 3: BARANG ===== -->
    <section id="barang" class="section-height flex items-center justify-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">

            <div class="text-center mb-10 sm:mb-14">
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold heading-grad mb-3">Katalog Barang</h2>
                <p class="text-sm sm:text-lg" style="color:var(--text-muted);">Lihat dan pinjam berbagai sarana prasarana yang tersedia</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">

                <!-- Card 1 -->
                <div class="glass-card overflow-hidden">
                    <div class="image-container">
                        <img src="{{ asset('assets_public/laptop.jpg')}}" alt="Laptop" class="w-full h-full object-cover">
                    </div>
                    <div class="p-5 sm:p-6">
                        <h3 class="text-lg sm:text-xl font-bold mb-1" style="color:var(--text-main);">Laptop</h3>
                        <p class="text-xs sm:text-sm mb-4" style="color:var(--text-muted);">Koleksi Laptop tersedia</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs font-semibold px-3 py-1 rounded-full"
                                  style="background:rgba(56,139,253,0.15); border:1px solid rgba(99,179,237,0.28); color:#93c5fd;">
                                7 Items
                            </span>
                            <button class="btn-sm">Lihat →</button>
                        </div>
                    </div>
                    <div class="shimmer-bar"></div>
                </div>

                <!-- Card 2 -->
                <div class="glass-card overflow-hidden">
                    <div class="image-container">
                        <img src="{{ asset('assets_public/laptop1.jpg')}}" alt="Mic" class="w-full h-full object-cover">
                    </div>
                    <div class="p-5 sm:p-6">
                        <h3 class="text-lg sm:text-xl font-bold mb-1" style="color:var(--text-main);">Laptop ASus</h3>
                        <p class="text-xs sm:text-sm mb-4" style="color:var(--text-muted);">Koleksi Laptop tersedia</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs font-semibold px-3 py-1 rounded-full"
                                  style="background:rgba(56,139,253,0.15); border:1px solid rgba(99,179,237,0.28); color:#93c5fd;">
                                10 Items
                            </span>
                            <button class="btn-sm">Lihat →</button>
                        </div>
                    </div>
                    <div class="shimmer-bar"></div>
                </div>

                <!-- Card 3 -->
                <div class="glass-card overflow-hidden">
                    <div class="image-container">
                        <img src="{{ asset('assets_public/laptop2.jpg')}}" alt="Stop Kontak" class="w-full h-full object-cover">
                    </div>
                    <div class="p-5 sm:p-6">
                        <h3 class="text-lg sm:text-xl font-bold mb-1" style="color:var(--text-main);">Laptop Gamming</h3>
                        <p class="text-xs sm:text-sm mb-4" style="color:var(--text-muted);">Koleksi Laptop tersedia</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs font-semibold px-3 py-1 rounded-full"
                                  style="background:rgba(56,139,253,0.15); border:1px solid rgba(99,179,237,0.28); color:#93c5fd;">
                                10 Items
                            </span>
                            <button class="btn-sm">Lihat →</button>
                        </div>
                    </div>
                    <div class="shimmer-bar"></div>
                </div>

            </div>
        </div>
    </section>

    <!-- ===== SECTION 4: KETENTUAN ===== -->
    <section id="ketentuan" class="section-height flex items-center justify-center section-alt">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 w-full">

            <div class="text-center mb-10 sm:mb-14">
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold heading-grad mb-3">Ketentuan Peminjaman</h2>
                <p class="text-sm sm:text-lg" style="color:var(--text-muted);">Aturan dan prosedur yang harus dipatuhi dalam peminjaman laptop</p>
            </div>

            <div class="grid md:grid-cols-2 gap-6 sm:gap-8">

                <!-- Do's -->
                <div class="glass-card card-tilt-left p-6 sm:p-8">
                    <p class="text-xs font-semibold tracking-widest mb-5" style="color:rgba(99,235,147,0.6);">YANG HARUS DILAKUKAN</p>
                    <div class="space-y-4">

                        <div class="box-item p-4 flex items-start gap-4">
                            <div class="icon-wrap w-10 h-10" style="background:rgba(34,197,94,0.14); border-color:rgba(34,197,94,0.28); box-shadow:0 4px 12px rgba(34,197,94,0.2);">
                                <svg class="w-4 h-4" style="color:#86efac;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-sm mb-1" style="color:var(--text-main);">Kartu Identitas</h3>
                                <p class="text-xs" style="color:var(--text-muted);">Wajib menunjukkan kartu pelajar/guru yang masih berlaku</p>
                            </div>
                        </div>

                        <div class="box-item p-4 flex items-start gap-4">
                            <div class="icon-wrap w-10 h-10" style="background:rgba(34,197,94,0.14); border-color:rgba(34,197,94,0.28); box-shadow:0 4px 12px rgba(34,197,94,0.2);">
                                <svg class="w-4 h-4" style="color:#86efac;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-sm mb-1" style="color:var(--text-main);">Formulir Peminjaman</h3>
                                <p class="text-xs" style="color:var(--text-muted);">Mengisi formulir peminjaman dengan lengkap dan benar</p>
                            </div>
                        </div>

                        <div class="box-item p-4 flex items-start gap-4">
                            <div class="icon-wrap w-10 h-10" style="background:rgba(34,197,94,0.14); border-color:rgba(34,197,94,0.28); box-shadow:0 4px 12px rgba(34,197,94,0.2);">
                                <svg class="w-4 h-4" style="color:#86efac;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-sm mb-1" style="color:var(--text-main);">Persetujuan</h3>
                                <p class="text-xs" style="color:var(--text-muted);">Mendapat persetujuan dari penanggung jawab sarpras</p>
                            </div>
                        </div>

                    </div>
                    <div class="shimmer-bar mt-6 rounded-full" style="background:linear-gradient(90deg,#22c55e,#86efac,#bbf7d0);"></div>
                </div>

                <!-- Don'ts -->
                <div class="glass-card card-tilt-right p-6 sm:p-8">
                    <p class="text-xs font-semibold tracking-widest mb-5" style="color:rgba(252,165,165,0.7);">YANG DILARANG</p>
                    <div class="space-y-4">

                        <div class="box-item p-4 flex items-start gap-4">
                            <div class="icon-wrap w-10 h-10" style="background:rgba(239,68,68,0.14); border-color:rgba(239,68,68,0.28); box-shadow:0 4px 12px rgba(239,68,68,0.2);">
                                <svg class="w-4 h-4" style="color:#fca5a5;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-sm mb-1" style="color:var(--text-main);">Kondisi Barang</h3>
                                <p class="text-xs" style="color:var(--text-muted);">Bertanggung jawab atas kerusakan atau kehilangan laptop</p>
                            </div>
                        </div>

                        <div class="box-item p-4 flex items-start gap-4">
                            <div class="icon-wrap w-10 h-10" style="background:rgba(239,68,68,0.14); border-color:rgba(239,68,68,0.28); box-shadow:0 4px 12px rgba(239,68,68,0.2);">
                                <svg class="w-4 h-4" style="color:#fca5a5;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-sm mb-1" style="color:var(--text-main);">Waktu Pengembalian</h3>
                                <p class="text-xs" style="color:var(--text-muted);">Denda keterlambatan Rp 5.000/hari untuk setiap laptop</p>
                            </div>
                        </div>

                        <div class="box-item p-4 flex items-start gap-4">
                            <div class="icon-wrap w-10 h-10" style="background:rgba(239,68,68,0.14); border-color:rgba(239,68,68,0.28); box-shadow:0 4px 12px rgba(239,68,68,0.2);">
                                <svg class="w-4 h-4" style="color:#fca5a5;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-sm mb-1" style="color:var(--text-main);">Pemindahtanganan</h3>
                                <p class="text-xs" style="color:var(--text-muted);">Dilarang memindahtangankan laptop kepada pihak lain</p>
                            </div>
                        </div>

                    </div>
                    <div class="shimmer-bar mt-6 rounded-full" style="background:linear-gradient(90deg,#ef4444,#fca5a5,#fecaca);"></div>
                </div>

            </div>
        </div>
    </section>

    <!-- ===== SECTION 5: PINJAM KEMBALI ===== -->
    <section id="pinjam-kembali" class="section-height flex items-center justify-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-14 items-center">

                <!-- Steps -->
                <div class="space-y-5 order-2 lg:order-1">
                    <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold heading-grad text-center lg:text-left">
                        Prosedur Pinjam & Kembali
                    </h2>
                    <p class="text-sm sm:text-base leading-relaxed text-center lg:text-left" style="color:var(--text-muted);">
                        Ikuti langkah-langkah mudah untuk meminjam dan mengembalikan laptop sekolah
                    </p>

                    <div class="space-y-3">
                        <div class="step-card p-4 sm:p-5 flex items-center gap-4">
                            <div class="num-badge w-9 h-9 rounded-full text-sm flex-shrink-0">1</div>
                            <div>
                                <h3 class="font-bold text-sm" style="color:var(--text-main);">Login ke Sistem</h3>
                                <p class="text-xs" style="color:var(--text-muted);">Masuk menggunakan akun Anda</p>
                            </div>
                        </div>

                        <div class="step-card p-4 sm:p-5 flex items-center gap-4">
                            <div class="num-badge w-9 h-9 rounded-full text-sm flex-shrink-0">2</div>
                            <div>
                                <h3 class="font-bold text-sm" style="color:var(--text-main);">Pilih Laptop</h3>
                                <p class="text-xs" style="color:var(--text-muted);">Cari dan pilih laptop yang ingin dipinjam</p>
                            </div>
                        </div>

                        <div class="step-card p-4 sm:p-5 flex items-center gap-4">
                            <div class="num-badge w-9 h-9 rounded-full text-sm flex-shrink-0">3</div>
                            <div>
                                <h3 class="font-bold text-sm" style="color:var(--text-main);">Ajukan Peminjaman</h3>
                                <p class="text-xs" style="color:var(--text-muted);">Isi formulir dan tunggu persetujuan</p>
                            </div>
                        </div>

                        <div class="step-card p-4 sm:p-5 flex items-center gap-4">
                            <div class="num-badge w-9 h-9 rounded-full text-sm flex-shrink-0">4</div>
                            <div>
                                <h3 class="font-bold text-sm" style="color:var(--text-main);">Ambil & Kembalikan</h3>
                                <p class="text-xs" style="color:var(--text-muted);">Ambil laptop dan kembalikan tepat waktu</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Status Card -->
                <div class="flex justify-center order-1 lg:order-2">
                    <div class="glass-card card-tilt-right p-6 sm:p-8 w-full max-w-md">
                        <p class="text-xs font-semibold tracking-widest mb-5" style="color:var(--text-faint);">STATUS PEMINJAMAN ANDA</p>

                        <div class="space-y-3">
                            <div class="status-row status-row-green flex justify-between items-center gap-3">
                                <div class="min-w-0">
                                    <div class="font-bold text-sm truncate" style="color:#86efac;">Proyektor LCD</div>
                                    <div class="text-xs mt-0.5" style="color:rgba(134,239,172,0.65);">Kembali: 15 Feb 2026</div>
                                </div>
                                <span class="status-pill status-green">Aktif</span>
                            </div>

                            <div class="status-row status-row-yellow flex justify-between items-center gap-3">
                                <div class="min-w-0">
                                    <div class="font-bold text-sm truncate" style="color:#fde047;">Bola Basket</div>
                                    <div class="text-xs mt-0.5" style="color:rgba(253,224,71,0.65);">Kembali: 12 Feb 2026</div>
                                </div>
                                <span class="status-pill status-yellow">H-1</span>
                            </div>

                            <div class="status-row status-row-blue flex justify-between items-center gap-3">
                                <div class="min-w-0">
                                    <div class="font-bold text-sm truncate" style="color:#93c5fd;">Mikroskop</div>
                                    <div class="text-xs mt-0.5" style="color:rgba(147,197,253,0.65);">Menunggu persetujuan</div>
                                </div>
                                <span class="status-pill status-blue">Proses</span>
                            </div>
                        </div>

                        <button class="btn-primary w-full py-3 mt-5 text-sm cursor-pointer">
                            Lihat Semua Riwayat
                        </button>
                        <div class="shimmer-bar mt-5 rounded-full"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== SECTION 6: KONTAK ===== -->
    <section id="kontak" class="section-height flex items-center justify-center section-alt">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 w-full">

            <div class="text-center mb-10 sm:mb-14">
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold heading-grad mb-3">Hubungi Kami</h2>
                <p class="text-sm sm:text-lg" style="color:var(--text-muted);">Ada pertanyaan? Kami siap membantu Anda</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 sm:gap-12">

                <!-- Contact Info -->
                <div class="space-y-4">

                    <div class="glass-card p-5 flex items-start gap-4">
                        <div class="icon-wrap w-11 h-11 flex-shrink-0">
                            <svg class="w-5 h-5" style="color:var(--blue-light);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-sm mb-1" style="color:var(--text-main);">Alamat</h3>
                            <p class="text-xs leading-relaxed" style="color:var(--text-muted);">
                                Jalan Raya Laladon, Desa Laladon, Kecamatan Ciomas,<br>
                                Kabupaten Bogor, Jawa Barat
                            </p>
                        </div>
                    </div>

                    <div class="glass-card p-5 flex items-start gap-4">
                        <div class="icon-wrap w-11 h-11 flex-shrink-0">
                            <svg class="w-5 h-5" style="color:var(--blue-light);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-sm mb-1" style="color:var(--text-main);">Telepon</h3>
                            <p class="text-xs" style="color:var(--text-muted);">(0251) -7520933</p>
                            <p class="text-xs" style="color:var(--text-muted);">089123782646</p>
                        </div>
                    </div>

                    <div class="glass-card p-5 flex items-start gap-4">
                        <div class="icon-wrap w-11 h-11 flex-shrink-0">
                            <svg class="w-5 h-5" style="color:var(--blue-light);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-sm mb-1" style="color:var(--text-main);">Email</h3>
                            <p class="text-xs" style="color:var(--text-muted);">smkn1_ciomas@yahoo.co.id</p>
                        </div>
                    </div>

                </div>

                <!-- Contact Form -->
                <div class="glass-card card-tilt-right p-6 sm:p-8">
                    <p class="text-xs font-semibold tracking-widest mb-5" style="color:var(--text-faint);">KIRIM PESAN</p>
                    <form class="space-y-4">
                        <div>
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text"  class="form-input px-4 py-2.5" placeholder="Masukkan nama Anda">
                        </div>
                        <div>
                            <label class="form-label">Email</label>
                            <input type="email" class="form-input px-4 py-2.5" placeholder="email@example.com">
                        </div>
                        <div>
                            <label class="form-label">Pesan</label>
                            <textarea rows="4" class="form-input px-4 py-2.5" placeholder="Tulis pesan Anda..."></textarea>
                        </div>
                        <button type="submit" class="btn-primary w-full py-3 text-sm">Kirim Pesan →</button>
                    </form>
                    <div class="shimmer-bar mt-5 rounded-full"></div>
                </div>

            </div>
        </div>
    </section>

    <!-- ===== FOOTER ===== -->
    <footer class="py-10 sm:py-14">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">

                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="nav-logo-box w-10 h-10 rounded-xl flex items-center justify-center text-white font-bold text-lg">L</div>
                        <span class="text-lg font-bold heading-grad">E-Laptop</span>
                    </div>
                    <p class="text-xs leading-relaxed" style="color:var(--text-faint);">
                        SMKN 1 Ciomas<br>
                        Jalan Raya Laladon, Desa Laladon,<br>
                        Kecamatan Ciomas, Kabupaten Bogor,<br>
                        Jawa Barat
                    </p>
                </div>

                <div>
                    <h3 class="font-bold text-sm mb-4" style="color:var(--text-main);">Informasi Laptop</h3>
                    <ul class="space-y-2 text-xs" style="color:var(--text-faint);">
                        <li>Jam Operasional: 07:00 - 16:00</li>
                        <li>Hari Kerja: Senin - Jumat</li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-bold text-sm mb-4" style="color:var(--text-main);">Kontak</h3>
                    <ul class="space-y-2 text-xs" style="color:var(--text-faint);">
                        <li>📞 (0251)-7520933</li>
                        <li>📱 0896-1829-7321</li>
                        <li>✉️ smkn1_ciomas@yahoo.co.id</li>
                        <li>🌐 www.smkn1ciomas.sch.id</li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-bold text-sm mb-4" style="color:var(--text-main);">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#home"      class="footer-link">Home</a></li>
                        <li><a href="#about"     class="footer-link">About</a></li>
                        <li><a href="#barang"    class="footer-link">Katalog Barang</a></li>
                        <li><a href="#ketentuan" class="footer-link">Ketentuan</a></li>
                    </ul>
                </div>

            </div>

            <div class="border-t pt-6 text-center" style="border-color:var(--blue-border);">
                <p class="text-xs" style="color:var(--text-faint);">
                    &copy; 2026 E-Laptop — Sistem Informasi Peminjaman Laptop. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

</body>
</html>