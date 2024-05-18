<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style layout-menu-fixed" dir="ltr"
    data-theme="theme-default" data-assets-path="{{ asset('public/admin/assets/') }}"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Allakro - Authentification') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['public/admin/assets/vendor/fonts/boxicons.css', 'public/admin/assets/vendor/css/core.css', 'public/admin/assets/vendor/css/theme-default.css', 'public/admin/assets/css/demo.css', 'public/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css', 'public/admin/assets/vendor/css/pages/page-auth.css', 'public/admin/assets/vendor/libs/apex-charts/apex-charts.css', 'public/admin/assets/vendor/js/helpers.js', 'public/admin/assets/js/config.js', 'public/admin/assets/vendor/libs/jquery/jquery.js', 'public/admin/assets/vendor/libs/popper/popper.js', 'public/admin/assets/vendor/js/bootstrap.js', 'public/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js', 'public/admin/assets/vendor/js/menu.js', 'public/admin/assets/vendor/libs/apex-charts/apexcharts.js', 'public/admin/assets/js/main.js', 'public/admin/assets/js/dashboards-analytics.js'])
</head>

<body>

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <a href="{{ url('/') }}" class="app-brand justify-content-center">
                            <img src="{{ asset('admin/assets/img/logos/logo-allakro.png') }}"
                                class="app-brand-link"alt="logo-allakro">
                        </a>
                        <!-- /Logo -->
                        <h4 class="mb-2 text-center">Bienvenue au portail de Allakro!👋</h4>
                        <p class="mb-4 text-center">
                            SVP connectez-vous à votre compte pour administer la plateforme
                        </p>

                        <form id="formAuthentication" class="mb-3" {{ route('login') }} method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>

                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus />

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Mot de passe</label>
                                    <small>
                                        @if (Route::has('password.request'))
                                            <a class=" btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </small>
                                </div>

                                <div class="input-group input-group-merge">
                                    <input type="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" required autocomplete="current-password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }} />
                                    <label class="form-check-label" for="remember">
                                        Se souvenir de moi
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">
                                    {{ __('Se connecter') }}
                                </button>
                            </div>

                            <small class="center">
                                Vous n'avez de compte?
                                <a class=" btn-link" href="{{ route('new-user', 'guest') }}">
                                    {{ __('S\'inscrire') }}
                                </a>
                            </small>
                        </form>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

</body>

</html>
