<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - E-Laptop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        * { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --navy-darkest: #060d1a;
            --navy-dark:    #0a1628;
            --navy-mid:     #0f2744;
            --blue-glow:    rgba(56,139,253,0.18);
            --blue-border:  rgba(99,179,237,0.22);
            --blue-bright:  #60a5fa;
            --blue-light:   #93c5fd;
            --blue-pale:    #bfdbfe;
            --text-main:    #e0f2fe;
            --text-muted:   rgba(186,215,251,0.65);
            --text-faint:   rgba(147,197,253,0.50);
            --glass-bg:     rgba(255,255,255,0.055);
            --glass-hover:  rgba(255,255,255,0.09);
            --glass-border: rgba(255,255,255,0.10);
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            background: linear-gradient(160deg, var(--navy-darkest) 0%, #0d1f3c 35%, var(--navy-mid) 65%, var(--navy-dark) 100%);
            overflow: hidden;
        }

        html, body { height: 100%; }

        /* ===== AMBIENT BLOBS ===== */
        body::before {
            content: '';
            position: fixed;
            top: -15%;
            left: -15%;
            width: 55%;
            height: 60%;
            background: radial-gradient(ellipse, rgba(56,139,253,0.14) 0%, transparent 70%);
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
            0%   { transform: scale(1) translate(0,0); opacity: 0.7; }
            100% { transform: scale(1.1) translate(2%,3%); opacity: 1; }
        }

        /* ===== LAYOUT ===== */
        .container-wrapper {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 16px;
            position: relative;
            z-index: 1;
            overflow: auto;
        }

        .login-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 3rem;
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
        }

        .left-section {
            flex: 0 0 auto;
            max-width: 420px;
            width: 100%;
        }

        .right-section {
            flex: 0 0 auto;
            max-width: 420px;
            width: 100%;
        }

        @media (max-width: 768px) {
            .left-section { display: none !important; }
            .right-section { max-width: 100%; }
        }

        /* ===== IMAGE FLOAT ===== */
        .image-float {
            animation: float 6s ease-in-out infinite;
            filter: drop-shadow(0 20px 40px rgba(56,139,253,0.3));
        }

        @keyframes float {
            0%,100% { transform: translateY(0px); }
            50%      { transform: translateY(-18px); }
        }

        /* ===== GLASS CARD ===== */
        .glass-card {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            position: relative;
            overflow: hidden;
            box-shadow:
                0 8px 32px rgba(0,0,0,0.4),
                0 1px 0 rgba(255,255,255,0.08) inset,
                0 -1px 0 rgba(0,0,0,0.2) inset;
        }

        .glass-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.18), transparent);
        }

        .glass-card::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.05) 0%, transparent 55%);
            pointer-events: none;
            border-radius: inherit;
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
            0%       { left: -100%; }
            60%,100% { left: 100%; }
        }

        /* ===== HEADING GRADIENT ===== */
        .heading-grad {
            background: linear-gradient(135deg, #e0f2fe 0%, #93c5fd 55%, #60a5fa 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* ===== FORM INPUTS ===== */
        .form-input {
            width: 100%;
            background: rgba(255,255,255,0.055);
            border: 1px solid rgba(99,179,237,0.22);
            border-radius: 12px;
            color: var(--text-main);
            font-size: 14px;
            padding: 11px 14px 11px 42px;
            outline: none;
            transition: all 0.25s ease;
            font-family: 'Inter', sans-serif;
        }

        .form-input::placeholder { color: var(--text-faint); }

        .form-input:focus {
            border-color: rgba(99,179,237,0.55);
            background: rgba(56,139,253,0.09);
            box-shadow: 0 0 0 3px rgba(56,139,253,0.13);
        }

        .form-input-pr { padding-right: 42px; }

        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            color: var(--blue-light);
            pointer-events: none;
            transition: color 0.25s ease;
        }

        .form-group:focus-within .input-icon { color: var(--blue-pale); }

        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: var(--text-muted);
            margin-bottom: 6px;
            letter-spacing: 0.03em;
        }

        /* ===== TOGGLE PASSWORD BTN ===== */
        .eye-btn {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: var(--text-faint);
            transition: color 0.2s ease;
            padding: 2px;
            display: flex;
            align-items: center;
        }

        .eye-btn:hover { color: var(--blue-light); }

        /* ===== CHECKBOX ===== */
        .custom-check {
            width: 15px;
            height: 15px;
            accent-color: #3b82f6;
            cursor: pointer;
            border-radius: 4px;
        }

        /* ===== BUTTONS ===== */
        .btn-primary {
            width: 100%;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: #fff;
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 0.03em;
            border: 1px solid rgba(99,179,237,0.3);
            border-radius: 12px;
            padding: 13px 20px;
            cursor: pointer;
            box-shadow: 0 4px 20px rgba(37,99,235,0.45);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-family: 'Inter', sans-serif;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 32px rgba(37,99,235,0.6);
            background: linear-gradient(135deg, #3b82f6, #2563eb);
        }

        .btn-primary:active { transform: translateY(-1px); }

        /* ===== LEFT SIDE INFO BOXES ===== */
        .info-box {
            background: rgba(255,255,255,0.045);
            border: 1px solid rgba(99,179,237,0.15);
            border-radius: 14px;
            padding: 14px 16px;
            display: flex;
            align-items: center;
            gap: 14px;
            transition: all 0.3s ease;
        }

        .info-box:hover {
            background: rgba(56,139,253,0.10);
            border-color: rgba(99,179,237,0.35);
            transform: translateX(5px);
            box-shadow: 0 6px 20px rgba(56,139,253,0.18);
        }

        .info-icon {
            width: 38px; height: 38px;
            background: rgba(56,139,253,0.14);
            border: 1px solid rgba(56,139,253,0.28);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }

        .info-box:hover .info-icon {
            background: rgba(56,139,253,0.26);
            box-shadow: 0 4px 14px rgba(56,139,253,0.35);
            transform: rotate(-6deg) scale(1.08);
        }

        /* ===== LOGO BOX ===== */
        .logo-box {
            width: 42px; height: 42px;
            background: linear-gradient(135deg, #2563eb, #1e40af);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 800;
            font-size: 18px;
            box-shadow: 0 4px 16px rgba(37,99,235,0.45);
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .logo-box:hover {
            transform: rotate(-6deg) scale(1.1);
            box-shadow: 0 6px 22px rgba(37,99,235,0.65);
        }

        /* ===== ANIMATIONS ===== */
        @keyframes fadeSlideUp {
            0%   { opacity: 0; transform: translateY(22px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeSlideLeft {
            0%   { opacity: 0; transform: translateX(-20px); }
            100% { opacity: 1; transform: translateX(0); }
        }

        .anim-up   { animation: fadeSlideUp  0.7s ease both; }
        .anim-left { animation: fadeSlideLeft 0.7s ease 0.1s both; }

        /* ===== SCROLLBAR ===== */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--navy-dark); }
        ::-webkit-scrollbar-thumb { background: rgba(99,179,237,0.35); border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(99,179,237,0.6); }
    </style>
</head>
<body>

    <div class="container-wrapper">
        <div class="login-container">

            <!-- ===== LEFT: Illustration + Info ===== -->
            <div class="left-section hidden md:block anim-left">

                <!-- Logo & Brand -->

                <!-- Floating Illustration -->
                <div style="margin-bottom:28px; padding:0 8px;">
                    <img src="{{ asset('assets_public/login.png')}}" alt="Login Illustration" class="image-float" style="width:100%; filter:drop-shadow(0 20px 40px rgba(56,139,253,0.28));">
                </div>

                <!-- Info Boxes -->
              
            </div>

            <!-- ===== RIGHT: Login Card ===== -->
            <div class="right-section anim-up">

                <div class="glass-card">

                    <!-- Top Shimmer Bar -->
                    <div class="shimmer-bar"></div>

                    <div style="padding: 32px 32px 28px;">

                        <!-- Mobile Logo (only visible on mobile) -->
                        <div class="md:hidden" style="display:none; align-items:center; gap:10px; margin-bottom:20px;">
                            <div class="logo-box" style="width:36px;height:36px;font-size:15px;border-radius:10px;">L</div>
                            <span style="font-size:18px; font-weight:800;" class="heading-grad">E-Laptop</span>
                        </div>
                        <style>@media(max-width:768px){.mobile-logo-show{display:flex!important;}}</style>
                        <div class="mobile-logo-show" style="display:none; align-items:center; gap:10px; margin-bottom:20px;">
                            <div class="logo-box" style="width:36px;height:36px;font-size:15px;border-radius:10px;">L</div>
                            <span style="font-size:18px; font-weight:800;" class="heading-grad">E-Laptop</span>
                        </div>

                        <!-- Header -->
                        <div style="margin-bottom:24px;">
                            <p style="font-size:11px; font-weight:600; letter-spacing:0.08em; color:var(--text-faint); margin-bottom:6px;">SELAMAT DATANG</p>
                            <h2 style="font-size:28px; font-weight:800; line-height:1.2;" class="heading-grad">Masuk ke Akun</h2>
                            <p style="font-size:13px; color:var(--text-muted); margin-top:6px;">Silakan login untuk mengakses sistem peminjaman laptop</p>
                        </div>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-3" :status="session('status')" />

                        <form method="POST" action="{{ route('login') }}" style="display:flex; flex-direction:column; gap:16px;">
                            @csrf

                            <!-- Email -->
                            <div class="form-group">
                                <label class="form-label">Alamat Email</label>
                                <div style="position:relative;">
                                    <svg class="input-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                    </svg>
                                    <input
                                        id="email"
                                        name="email"
                                        type="email"
                                        required
                                        autofocus
                                        autocomplete="username"
                                        value="{{ old('email') }}"
                                        class="form-input"
                                        placeholder="nama@email.com">
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-1" />
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <div style="position:relative;">
                                    <svg class="input-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                    <input
                                        id="password"
                                        name="password"
                                        type="password"
                                        required
                                        autocomplete="current-password"
                                        class="form-input form-input-pr"
                                        placeholder="••••••••">
                                    <button type="button" onclick="togglePassword()" class="eye-btn">
                                        <svg id="eye-open" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                        <svg id="eye-closed" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="display:none;">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                                        </svg>
                                    </button>
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-1" />
                            </div>

                            <!-- Remember + Forgot -->
                            <div style="display:flex; align-items:center; justify-content:space-between;">
                                <label style="display:flex; align-items:center; gap:8px; cursor:pointer;">
                                    <input id="remember_me" name="remember" type="checkbox" class="custom-check">
                                    <span style="font-size:12px; color:var(--text-muted);">Ingat saya</span>
                                </label>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                   style="font-size:12px; font-weight:600; color:var(--blue-light); text-decoration:none; transition:color 0.2s ease;"
                                   onmouseover="this.style.color='var(--blue-pale)'"
                                   onmouseout="this.style.color='var(--blue-light)'">
                                    Lupa password?
                                </a>
                                @endif
                            </div>

                            <!-- Submit -->
                            <div style="padding-top:4px;">
                                <button type="submit" class="btn-primary">
                                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                    </svg>
                                    Masuk Sekarang
                                </button>
                            </div>

                        </form>
                    </div>

                    <!-- Card Footer -->
                    <div style="padding: 14px 32px 18px; border-top: 1px solid rgba(99,179,237,0.12); background: rgba(56,139,253,0.04); text-align:center;">
                        <p style="font-size:12px; color:var(--text-muted);">
                            Belum punya akun?
                            <a href="{{ route('register') }}"
                               style="font-weight:700; color:var(--blue-light); text-decoration:none; margin-left:4px; transition:color 0.2s;"
                               onmouseover="this.style.color='var(--blue-pale)'"
                               onmouseout="this.style.color='var(--blue-light)'">
                                Daftar sekarang →
                            </a>
                        </p>
                    </div>

                    <!-- Bottom Shimmer Bar -->
                    <div class="shimmer-bar"></div>
                </div>

                <!-- Copyright -->
                <p style="text-align:center; font-size:11px; color:var(--text-faint); margin-top:14px; letter-spacing:0.02em;">
                    © 2026 E-Laptop — SMKN 1 Ciomas. Semua hak dilindungi.
                </p>

            </div>

        </div>
    </div>

    <script>
        function togglePassword() {
            const input    = document.getElementById('password');
            const eyeOpen  = document.getElementById('eye-open');
            const eyeClosed= document.getElementById('eye-closed');
            if (input.type === 'password') {
                input.type = 'text';
                eyeOpen.style.display  = 'none';
                eyeClosed.style.display= 'block';
            } else {
                input.type = 'password';
                eyeOpen.style.display  = 'block';
                eyeClosed.style.display= 'none';
            }
        }
    </script>

</body>
</html>