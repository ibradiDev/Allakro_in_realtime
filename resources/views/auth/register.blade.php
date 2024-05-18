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

    <div class="container-lg">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card col-12">
                    <div class="card-body">
                        <!-- Logo -->
                        <a href="{{ url('/') }}" class="app-brand justify-content-center m-auto">
                            <img src="{{ asset('admin/assets/img/logos/logo-allakro.png') }}" class="app-brand-link"
                                alt="logo-allakro">
                        </a>
                        <!-- /Logo -->
                        <h4 class="mb-2 text-center">Bienvenue au portail de Allakro!👋</h4>
                        <p class="text-center">
                            Renseignez les champs pour vous enregistrer<br />
                            Les champs avec <span class="text-danger">*</span> sont obligatoires
                        </p>

                        <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
                            @csrf

                            <div style="height: 320px; overflow-y: auto;" class="pe-2 mb-1">
                                <input type="hidden" name="role"
                                    value="<?= !request()->is('*sec-level-admin*') ? 'guest' : 'admin' ?>">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nom <span class="text-danger">*</span>
                                    </label>
                                    <input id="name" type="text" placeholder="John"
                                        class="form-control @error('nom') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus />

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="prenom" class="form-label">Prenom <span class="text-danger">*</span>
                                    </label>
                                    <input id="prenom" type="text" placeholder="Doe"
                                        class="form-control @error('prenom') is-invalid @enderror" name="prenom"
                                        value="{{ old('prenom') }}" required autocomplete="prenom" />

                                    @error('prenom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('Email') }} <span
                                            class="text-danger">*</span> </label>

                                    <input id="email" type="email" placeholder="ex: john@example.com"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus />

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="naissance" class="form-label">Date de naissance <span
                                            class="text-danger">*</span> </label>
                                    <input type="date" name="naissance" value="{{ old('naissance') }}"
                                        id="naissance" class="form-control @error('naissance') is-invalid @enderror"
                                        required>

                                    @error('naissance')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="sexe" class="form-label">Sexe <span class="text-danger">*</span>
                                    </label>
                                    <select name="sexe" id="sexe"
                                        class="form-control @error('sexe') is-invalid @enderror" required>
                                        <option selected value="M">Homme</option>
                                        <option value="F">Femme</option>
                                    </select>
                                    @error('sexe')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="profession" class="form-label">{{ __('Profession') }} <span
                                            class="text-muted">(facultatif)</span> </label>
                                    <input id="profession" type="text" placeholder="ex: Infirmier"
                                        class="form-control @error('profession') is-invalid @enderror"
                                        name="profession" value="{{ old('profession') }}"
                                        autocomplete="profession" />

                                    @error('profession')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="telephone" class="form-label">{{ __('Téléphone') }} <span
                                            class="text-muted">(facultatif)</span> </label>
                                    <input id="telephone" type="tel" maxlength="10" placeholder="ex: 0145721568"
                                        class="form-control @error('telephone') is-invalid @enderror" name="telephone"
                                        value="{{ old('telephone') }}" required autocomplete="telephone" />

                                    @error('telephone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="matrimoniale" class="form-label">{{ __('Situation matrimoniale') }}
                                        <span class="text-muted">(facultatif)</span> </label>

                                    <select name="matrimoniale" id="matrimoniale"
                                        class="form-control @error('matrimoniale') is-invalid @enderror" required>
                                        <option selected value="celibataire">Célibataire</option>
                                        <option value="en couple">Marié(e)</option>
                                    </select>
                                    @error('telephone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3 form-password-toggle">
                                    <label for="password" class="form-label">{{ __('Mot de passe') }} <span
                                            class="text-danger">*</span> </label>

                                    <div class="input-group input-group-merge">
                                        <input id="password" type="password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="new-password">
                                        <span class="input-group-text cursor-pointer">
                                            <i class="bx bx-hide"></i>
                                        </span>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 form-password-toggle">
                                    <label for="password-confirm"
                                        class="form-label">{{ __('Confirmez mot de passe') }}
                                        <span class="text-danger">*</span> </label>

                                    <div class="input-group input-group-merge">

                                        <input id="password-confirm" type="password" class="form-control"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            name="password_confirmation" required autocomplete="new-password">
                                        <span class="input-group-text cursor-pointer"><i
                                                class="bx bx-hide"></i></span>

                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mt-1">
                                <button class="btn btn-primary d-grid w-100" type="submit">
                                    {{ __("S'inscrire") }}
                                </button>
                            </div>

                            <small class="text-center">
                                {{ __('Vous avez déjà un compte?') }}
                                <a class=" btn-link" href="{{ route('login') }}">
                                    {{ __('Se connecter') }}
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
