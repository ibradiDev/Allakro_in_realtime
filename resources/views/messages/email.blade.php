<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style layout-menu-fixed" dir="ltr"
    data-theme="theme-default" data-assets-path="{{ asset('public/admin/assets/') }}"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Allakro - Email') }}</title>

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
                        <a href="{{ url('/') }}" class="app-brand justify-content-center mb-auto">
                            <img src="{{ asset('admin/assets/img/logos/logo-allakro.png') }}"
                                class="app-brand-link"alt="logo-allakro">
                        </a>
                        <!-- /Logo -->
                        @if ($autor)
                            <h6 class="h5">Bonjour M/Mme/Mlle {{ $autor }}!</h6>
                        @else
                            <h6 class="h5">Bonjour cher(e) compatriote d'Allakro!</h6>
                        @endif

                        <div class="mb-3">
                            <h6 class="text-muted text-center">Votre requête</h6>
                            <p class="card-text">
                                {!! nl2br(e($requestMessage)) !!}
                            </p>
                        </div>

                        <div>
                            <h6 class="text-muted text-center">Réponse de la direction</h6>
                            <p class="card-text">
                                {!! nl2br(e($responseMessage)) !!}
                            </p>
                        </div>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

</body>

</html>
