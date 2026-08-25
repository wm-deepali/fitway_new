@extends('layouts.admin-app')

@section('content')

<style>
    :root {
        --bg:#f6f1ec; --surface:#ffffff; --border:#e8ddd3; --text-primary:#2b211b; --text-secondary:#77685c;
        --accent:#a8724e; --accent-dark:#8a5c3d; --accent-light:#c6aa92;
        --radius-sm:8px; --radius-md:16px;
        --shadow-card:0 10px 40px rgba(43,33,27,.12);
        --font:'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    }

    body {
        background: var(--bg);
        font-family: var(--font);
    }

    .login-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .login-card {
        width: 100%;
        max-width: 950px;
        display: flex;
        border-radius: var(--radius-md);
        overflow: hidden;
        box-shadow: var(--shadow-card);
        background: var(--surface);
        border: 1px solid var(--border);
    }

    .login-left {
        width: 45%;
        background: linear-gradient(135deg, var(--accent), var(--accent-dark));
        color: #fff;
        text-align: center;
        padding: 50px 30px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .logo-box {
        background: rgba(0, 0, 0, 0.2);
        padding: 20px 28px;
        border-radius: var(--radius-sm);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 22px;
        box-shadow: 0 4px 14px rgba(43,33,27,.18);
    }

    .logo-box img {
        max-width: 200px;
        max-height: 70px;
        width: auto;
        height: auto;
        object-fit: contain;
        display: block;
    }

    .login-left h2 {
        font-weight: 650;
        font-size: 22px;
        margin-bottom: 8px;
        letter-spacing: .01em;
    }

    .login-left p {
        font-size: 13.5px;
        opacity: .9;
        margin: 0;
        color: var(--accent-light);
    }

    .login-right {
        width: 55%;
        padding: 44px 44px;
    }

    .login-title {
        font-weight: 650;
        font-size: 20px;
        margin-bottom: 26px;
        color: var(--text-primary);
    }

    .login-right label {
        font-size: 12px;
        font-weight: 600;
        color: var(--text-secondary);
        letter-spacing: .03em;
        text-transform: uppercase;
        margin-bottom: 6px;
        display: block;
    }

    .form-control {
        border-radius: var(--radius-sm);
        padding: 12px 14px;
        background: var(--bg);
        border: 1px solid var(--border);
        font-size: 14px;
        color: var(--text-primary);
    }

    .form-control:focus {
        box-shadow: 0 0 0 3px rgba(168,114,78,.15);
        border-color: var(--accent);
        background: var(--surface);
    }

    .btn-login {
        width: 100%;
        padding: 12px;
        border-radius: var(--radius-sm);
        border: none;
        background: var(--accent);
        color: #fff;
        font-weight: 600;
        font-size: 14px;
        box-shadow: 0 1px 3px rgba(168,114,78,.35);
    }

    .btn-login:hover {
        background: var(--accent-dark);
    }

    .form-check-label {
        font-size: 13.5px;
        color: var(--text-secondary);
    }

    .forgot-link {
        font-size: 13.5px;
        text-decoration: none;
        color: var(--accent);
        font-weight: 600;
    }

    .forgot-link:hover {
        text-decoration: underline;
        color: var(--accent-dark);
    }

    @media (max-width: 768px) {
        .login-card {
            flex-direction: column;
        }
        .login-left, .login-right {
            width: 100%;
        }
        .login-left {
            padding: 34px 24px;
        }
    }
</style>

<div class="login-wrapper">
    <div class="login-card">

        <!-- LEFT SIDE -->
        <div class="login-left">

            <div class="logo-box">
                <img src="{{ $siteLogo?->image_url ?? asset('front/img/logo.png') }}" alt="Sri Harihar Ply">
            </div>

            <h2>Sri Harihar Ply</h2>
            <p>Admin Panel</p>
        </div>

        <!-- RIGHT SIDE -->
        <div class="login-right">
            <h4 class="login-title">Admin Login</h4>

            <form method="POST" action="{{ route('login.post') }}">
                @csrf

                <!-- EMAIL -->
                <div class="mb-3">
                    <label>Email Address</label>
                    <input id="email" type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}"
                        required autofocus>

                    @error('email')
                        <span class="invalid-feedback d-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- PASSWORD -->
                <div class="mb-3">
                    <label>Password</label>
                    <input id="password" type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        name="password" required>

                    @error('password')
                        <span class="invalid-feedback d-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- REMEMBER -->
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"
                            name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label">
                            Remember Me
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                        <a class="forgot-link" href="{{ route('password.request') }}">
                            Forgot Password?
                        </a>
                    @endif
                </div>

                <!-- BUTTON -->
                <button type="submit" class="btn btn-login">
                    Login
                </button>

            </form>
        </div>

    </div>
</div>

@endsection