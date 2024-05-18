<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style layout-menu-fixed" dir="ltr"
    data-theme="theme-default" data-assets-path="{{ asset('public/admin/assets/') }}"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Allakro - Administration') }}</title>
    {{-- <title>@yield('titre')</title> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">


    @vite([
        // ICONS
        'public/admin/assets/vendor/fonts/boxicons.css',
        'public/font_utilisateurs/plugins/font-awesome/fontawesome.min.css',
        'public/font_utilisateurs/plugins/font-awesome/solid.css',
        'public/font_utilisateurs/plugins/font-awesome/brands.css',
        // PAGES
        'public/admin/assets/vendor/css/core.css',
        'public/admin/assets/vendor/css/theme-default.css',
        'public/admin/assets/css/demo.css',
        'public/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css',
        'public/admin/assets/vendor/css/pages/page-auth.css',
        'public/admin/assets/vendor/libs/apex-charts/apex-charts.css',
        // SCRIPTS
        'public/admin/assets/vendor/js/helpers.js',
        'public/admin/assets/js/config.js',
        'public/admin/assets/vendor/libs/jquery/jquery.js',
        'public/admin/assets/vendor/libs/popper/popper.js',
        'public/admin/assets/vendor/js/bootstrap.js',
        'public/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js',
        'public/admin/assets/vendor/js/menu.js',
        'public/admin/assets/vendor/libs/apex-charts/apexcharts.js',
        'public/admin/assets/js/main.js',
        'public/admin/assets/js/ui-modals.js',
        'public/admin/assets/js/dashboards-analytics.js',
    ])

</head>

<body>

    @yield('header')

    <div>

        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->
                <x-Admin-Aside></x-Admin-Aside>
                <!-- / Menu -->

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Navbar -->
                    <nav class="position-sticky sticky-top bg-light text-dark layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                        id="layout-navbar">
                        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                                <i class="bx bx-menu bx-sm"></i>
                            </a>
                        </div>

                        <div class="ms-auto">
                            @yield('nav-title')
                        </div>
                    </nav>
                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Content -->
                        <div class="container-xxl flex-grow-1 container-p-y">

                            @yield('content')

                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
                                $(document).ready(function() {
                                    $('#confirmModal').on('show.bs.modal', function(event) {
                                        var button = $(event.relatedTarget); // Bouton qui a déclenché l'ouverture du modal
                                        console.log("Cest le button ", button);
                                        var formType = button.data('form-type'); // Type de formulaire (naissance ou décès)

                                        // Mettez à jour la valeur du champ caché
                                        $('#form_type').val(formType);
                                    });
                                });
                            </script>
                        </div>
                        <!-- / Content -->

                        <!-- Footer -->
                        <footer class="content-footer footer bg-footer-theme">
                            <div class="container row align-items-center mt-5 text-center text-md-start">
                                <div class="col-lg-4">
                                    {{-- <a href="{{ route('pageAccueil') }}">
                                        <img loading="prelaod" decoding="async" class="img-fluid" width="160"
                                            src="{{ asset('font_utilisateurs/images/logo.png') }}" alt="image site">
                                    </a> --}}
                                </div>
                                <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
                                    <small>
                                        Copyright © 2023 Uvci. Tous droits réservés.<br>
                                        Conçu et développé par le <b>Sous-Groupe-03</b>
                                    </small>
                                </div>
                                <div class="col-lg-4 col-md-6 text-md-end mt-4 mt-md-0">
                                    <ul class="list-unstyled list-inline mb-0 social-icons">
                                        <li class="list-inline-item me-3"><a title="Explorer Facebook Profile"
                                                class="text-black" href="https://facebook.com/"><i
                                                    class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li class="list-inline-item me-3"><a title="Explorer Twitter Profile"
                                                class="text-black" href="https://twitter.com/"><i
                                                    class="fab fa-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item me-3"><a title="Explorer Instagram Profile"
                                                class="text-black" href="https://instagram.com/"><i
                                                    class="fab fa-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            {{-- <div
                                class="container-xxl d-flex flex-wrap justify-content-center py-2 flex-md-row flex-column">
                                <div class="mb-2 mb-md-0">
                                    ©
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script>
                                    - PCT-RAS-BD-DAS
                                </div>
                            </div> --}}
                        </footer>
                        <!-- / Footer -->

                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>

    </div>

    {{-- SCRIPTS ADDITIONELS --}}
    @yield('autres-scripts')

</body>

</html>
