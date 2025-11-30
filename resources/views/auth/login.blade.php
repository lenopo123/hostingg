@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card login-card">
                <div class="card-body">
                    <!-- Header dengan Logo -->
                    <div class="text-center mb-4 login-header">
                        <div class="logo-wrapper">
                            <img src="{{ asset('images/penus.png') }}" alt="SMK Plus Pelita Nusantara" class="login-logo" > 
                        </div>
                        <p class="login-subtitle">kasir untuk keperluan sekolah</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="login-form">
                        @csrf

                        <!-- Email Input -->
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">
                                <span class="input-label">📧 {{ __('Email Address') }}</span>
                            </label>

                            <div class="col-md-6">
                                <div class="input-wrapper">
                                    <input id="email" type="email" class="form-control login-input @error('email') is-invalid @enderror" 
                                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <div class="input-focus"></div>
                                </div>

                                @error('email')
                                    <div class="error-message">
                                        <span class="error-icon">⚠️</span>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">
                                <span class="input-label">🔒 {{ __('Password') }}</span>
                            </label>

                            <div class="col-md-6">
                                <div class="input-wrapper">
                                    <input id="password" type="password" class="form-control login-input @error('password') is-invalid @enderror" 
                                           name="password" required autocomplete="current-password">
                                    <div class="input-focus"></div>
                                    <button type="button" class="password-toggle" onclick="togglePassword()">
                                        <span class="toggle-icon">👁️</span>
                                    </button>
                                </div>

                                @error('password')
                                    <div class="error-message">
                                        <span class="error-icon">⚠️</span>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-options">
                                    <div class="form-check remember-me">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            <span class="check-icon">✅</span>
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link forgot-link" href="{{ route('password.request') }}">
                                            <span class="link-icon">🔗</span>
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary login-btn">
                                    <span class="btn-icon">🚀</span>
                                    <span class="btn-text">{{ __('Login') }}</span>
                                    <div class="btn-loader">
                                        <div class="loader"></div>
                                    </div>
                                    <div class="btn-shine"></div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Animasi Keyframes */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
        100% {
            transform: scale(1);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes shine {
        0% {
            left: -100%;
        }
        100% {
            left: 100%;
        }
    }

    @keyframes bounce {
        0%, 20%, 53%, 80%, 100% {
            transform: translateY(0);
        }
        40%, 43% {
            transform: translateY(-3px);
        }
        70% {
            transform: translateY(-2px);
        }
        90% {
            transform: translateY(-1px);
        }
    }

    @keyframes wiggle {
        0%, 7% {
            transform: rotateZ(0);
        }
        15% {
            transform: rotateZ(-3deg);
        }
        20% {
            transform: rotateZ(2deg);
        }
        25% {
            transform: rotateZ(-2deg);
        }
        30% {
            transform: rotateZ(1deg);
        }
        35% {
            transform: rotateZ(-1deg);
        }
        40%, 100% {
            transform: rotateZ(0);
        }
    }

    /* Login Card */
    .login-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        animation: fadeInUp 0.6s ease-out;
        margin-top: 20px;
    }

    .card-body {
        padding: 2rem;
    }

    /* Login Header */
    .login-header {
        animation: slideInLeft 0.6s ease-out 0.2s both;
    }

    .logo-wrapper {
        display: inline-block;
        animation: pulse 2s ease-in-out infinite;
    }

    .login-logo {
        height: 80px;
        transition: transform 0.3s ease;
    }

    .login-logo:hover {
        animation: bounce 0.5s ease;
    }

    .login-subtitle {
        color: #6c757d;
        font-size: 0.9rem;
        margin-top: 0.5rem;
        animation: slideInRight 0.6s ease-out 0.4s both;
    }

    /* Form Styles */
    .login-form {
        animation: fadeInUp 0.6s ease-out 0.6s both;
    }

    .input-label {
        display: flex;
        align-items: center;
        gap: 5px;
        font-weight: 500;
    }

    .input-wrapper {
        position: relative;
    }

    .login-input {
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 10px 15px;
        transition: all 0.3s ease;
        position: relative;
        z-index: 1;
    }

    .login-input:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.1);
        transform: translateY(-1px);
    }

    .input-focus {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 8px;
        background: linear-gradient(45deg, transparent, rgba(0, 123, 255, 0.1), transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 0;
    }

    .login-input:focus ~ .input-focus {
        opacity: 1;
        animation: shine 1.5s ease-in-out;
    }

    /* Password Toggle */
    .password-toggle {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        cursor: pointer;
        padding: 5px;
        border-radius: 4px;
        transition: all 0.3s ease;
        z-index: 2;
    }

    .password-toggle:hover {
        background-color: #f8f9fa;
        animation: wiggle 0.6s ease;
    }

    .toggle-icon {
        font-size: 0.9rem;
    }

    /* Error Messages */
    .error-message {
        display: flex;
        align-items: center;
        gap: 5px;
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 5px;
        padding: 8px 12px;
        background-color: #f8d7da;
        border: 1px solid #f5c6cb;
        border-radius: 4px;
        animation: slideInRight 0.3s ease-out;
    }

    .error-icon {
        font-size: 0.8rem;
    }

    /* Form Options */
    .form-options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
    }

    .remember-me {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .remember-me .form-check-input {
        margin-right: 5px;
    }

    .check-icon {
        font-size: 0.8rem;
        transition: transform 0.3s ease;
    }

    .remember-me:hover .check-icon {
        animation: bounce 0.5s ease;
    }

    .forgot-link {
        text-decoration: none;
        font-size: 0.875rem;
        display: flex;
        align-items: center;
        gap: 5px;
        transition: all 0.3s ease;
    }

    .forgot-link:hover {
        text-decoration: none;
        transform: translateX(3px);
    }

    .link-icon {
        font-size: 0.8rem;
    }

    /* Login Button */
    .login-btn {
        position: relative;
        overflow: hidden;
        border: none;
        border-radius: 8px;
        padding: 10px 25px;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }

    .login-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
        animation: pulse 0.5s ease-in-out;
    }

    .login-btn:active {
        transform: translateY(0);
    }

    .btn-icon {
        font-size: 0.9rem;
        transition: transform 0.3s ease;
    }

    .login-btn:hover .btn-icon {
        animation: bounce 0.5s ease;
    }

    .btn-text {
        font-weight: 500;
    }

    .btn-loader {
        display: none;
    }

    .loader {
        width: 16px;
        height: 16px;
        border: 2px solid transparent;
        border-top: 2px solid white;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    .btn-shine {
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.5s;
    }

    .login-btn:hover .btn-shine {
        animation: shine 1s ease-in-out;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .col-md-8 {
            max-width: 100%;
        }
        
        .form-options {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }
        
        .login-btn {
            width: 100%;
            justify-content: center;
        }
        
        .input-label {
            justify-content: flex-start;
        }
    }

    @media (max-width: 576px) {
        .card-body {
            padding: 1.5rem;
        }
        
        .login-logo {
            height: 60px;
        }
        
        .row.mb-3 .col-md-4 {
            text-align: left !important;
            margin-bottom: 5px;
        }
        
        .row.mb-3 .col-md-6 {
            width: 100%;
        }
    }
</style>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.querySelector('.toggle-icon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.textContent = '👁️‍🗨️';
        } else {
            passwordInput.type = 'password';
            toggleIcon.textContent = '👁️';
        }
    }

    // Add loading state to form submission
    document.querySelector('.login-form').addEventListener('submit', function(e) {
        const button = this.querySelector('.login-btn');
        const btnText = button.querySelector('.btn-text');
        const btnLoader = button.querySelector('.btn-loader');
        const btnIcon = button.querySelector('.btn-icon');
        
        btnText.textContent = 'Loading...';
        btnIcon.style.display = 'none';
        btnLoader.style.display = 'block';
        button.disabled = true;
        
        // Re-enable after 3 seconds (in case of error)
        setTimeout(() => {
            btnText.textContent = 'Login';
            btnIcon.style.display = 'block';
            btnLoader.style.display = 'none';
            button.disabled = false;
        }, 3000);
    });
</script>
@endsection