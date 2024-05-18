<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    {{-- <title>Accueil - portail de'Allakro</title> --}}
    {{-- <title>{{ config('app.name', 'Allakro') }}</title> --}}
    <title>
        @yield('title')
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="description" content="This is meta description">
    <meta name="author" content="Themefisher">
    <link rel="shortcut icon" href="{{ asset('user/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('user/images/favicon.png') }}" type="image/x-icon">
    <!-- theme meta -->
    <meta name="theme-name" content="Allakro" />
    <!-- # Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- # HEADER LINKS -->
    @include('layouts._headerLinks')
</head>

<body>

    <style>
        @keyframes blinking {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        #blinking_icon {
            animation: blinking 0.8s linear infinite;
        }
    </style>

    <!-- navigation -->
    @include('layouts._header')
    <!-- /navigation -->

    <!-- PAGE CONTENT -->
    <div id="app">
        @yield('content')
    </div>
    <!-- /PAGE CONTENT -->

    {{-- FOOTER PAGE  --}}
    @include('layouts._footer')

    {{-- FOOTER LINKS  --}}
    @include('layouts._footerLinks')


    {{-- SCRIPTS ADDITIONELS --}}
    @yield('autres-scripts')


</body>

</html>