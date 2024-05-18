<header class="navigation bg-tertiary position-sticky sticky-top">
    <nav class="navbar navbar-expand-xl navbar-light text-center py-3">
        <div class="container">
            <a class="navbar-brand" href="{{ route('pageAccueil') }}">
                <img loading="prelaod" decoding="async" class="img-fluid" width="160"
                    src="{{ asset('font_utilisateurs/images/logo.png') }}" alt="Wallet">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('pageAccueil') }}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pageProposAllakro') }}">
                            Notre communauté
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pageNousContacter') }}">
                            Nos contacts
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('pageAccueilSante') }}">Espace Santé</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Plus d'options
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item " href="{{ route('pageEspaceAccueilFamille') }}">
                                    Espace famille
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item " href="{{ route('pageEspaceDeplacements') }}">
                                    Espace déplacement
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item " href="{{ route('pageEspaceRechercheEmploi') }}">
                                    Recherche d'emploi
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-primary">Se Connecter</a>
                @else
                    <ul class="navbar-nav dropdown">
                        <li class="nav-item">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                @if ($notification_bg > 0 and Auth::user()->role == 'admin')
                                    <i class="bx bx-bell text-danger me-1" id='blinking_icon'></i>
                                @endif

                                {{ Auth::user()->name }} {{ Auth::user()->prenom }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @if (Auth::user()->role == 'admin')
                                    <a href="{{ route('dashboard') }}" class="dropdown-item">
                                        <i class="menu-icon tf-icons bx bx-building"></i>
                                        {{ __('Administration') }}
                                        @if ($notification_bg > 0 and Auth::user()->role == 'admin')
                                            <span class="badge badge-center rounded-pill bg-danger"
                                                style="margin-left: auto;font-weight:bold;">{{ $notification_bg }}
                                            </span>
                                        @endif
                                    </a>
                                @endif
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                    <i class="menu-icon tf-icons bx bx-log-out-circle"></i>
                                    {{ __('Se déconnecter') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>

                        </li>
                    </ul>
                @endguest

            </div>
        </div>
    </nav>
</header>


{{-- MODAL INFOS PERSO --}}
<div class="modal applyLoanModal fade" id="authModal" tabindex="-1" aria-labelledby="authModal" aria-hidden="true">
    <div class="modal-content">
        <div class="modal-header border-bottom-0">
            <h4 class="modal-title" id="exampleModalLabel">Saisissez vos informations personnelles</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('reqInformationSaved') }}" method="POST">
                @csrf

                <input type="hidden" name="form_type" id="form_type" value="form_type">
                <input type="hidden" name="status_indiv" value="1">
                <div class="row">
                    <div class="col-lg-6 mb-4 pb-2">
                        <div class="form-group">
                            <label for="nom_individu" class="form-label">Nom de famille <span
                                    class="text-danger">*</span></label>
                            <input name="nom_individu" placeholder="Entrez votre nom de famille" type="text"
                                class="form-control shadow-none @error('nom_individu') is-invalid @enderror"
                                id="nom_individu" value="{{ old('nom_individu') }}" required>

                            <div class="invalid-feedback">
                                @error('nom_individu')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-4 pb-2">
                        <div class="form-group">
                            <label for="prenom_individu" class="form-label">Prenom
                                <span class="text-danger">*</span>
                            </label>
                            <input name="prenom_individu" placeholder="Entrez votre prenom" type="text"
                                class="form-control shadow-none @error('prenom_individu') is-invalid @enderror"
                                id="prenom_individu" value="{{ old('prenom_individu') }}" required>
                            <div class="invalid-feedback">
                                @error('prenom_individu')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-4 pb-2">
                        <div class="form-group">
                            <label for="sexe_individu" class="form-label">Sexe
                                <span class="text-danger">*</span>
                            </label>
                            <select name="sexe_individu"
                                class="form-control shadow-none @error('sexe_individu') is-invalid @enderror"
                                id="sexe_individu" required>
                                <option></option>
                                <option value="M">Masculin</option>
                                <option value="F">Féminin</option>
                            </select>
                            <div class="invalid-feedback">
                                @error('sexe_individu')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-4 pb-2">
                        <div class="form-group">
                            <label for="date_naissance" class="form-label">Date de naissance
                                <span class="text-danger">*</span>
                            </label>
                            <input name="date_naissance" type="date"
                                class="form-control shadow-none @error('date_naissance') is-invalid @enderror"
                                id="typeDateNaissance" value="{{ old('date_naissance') }}" required>
                            <div class="invalid-feedback">
                                @error('date_anissance')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-4 pb-2">
                        <div class="form-group">
                            <label for="telephone" class="form-label">Numéro de téléphone
                                <span class="text-danger">*</span>
                            </label>
                            <input name="telephone" placeholder="Entrez votre numéro de telephone" type="tel"
                                class="form-control shadow-none @error('telephone') is-invalid @enderror"
                                id="telephone" value="{{ old('telephone') }}" required>
                            <div class="invalid-feedback">
                                @error('telephone')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-4 pb-2">
                        <div class="form-group">
                            <label for="profession_individu" class="form-label">Profession
                                <span class="text-danger">*</span>
                            </label>
                            <input name="profession_individu" placeholder="Infographe" type="text"
                                class="form-control shadow-none @error('profession_individu') is-invalid @enderror"
                                id="profession_individu" value="{{ old('profession_individu') }}" required>
                            <div class="invalid-feedback">
                                @error('profession_individu')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 mb-4 pb-2 d-flex justify-content-center">
                        <div class="form-group col-lg-6 col-12">
                            <label for="situation_matrimoniale" class="form-label">Situation matrimoniale
                                <span class="text-danger">*</span>
                            </label>
                            <input name="situation_matrimoniale" placeholder="Marié(e)" type="text"
                                class="form-control shadow-none @error('situation_matrimoniale') is-invalid @enderror"
                                id="situation_matrimoniale" value="{{ old('situation_matrimoniale') }}" required>
                            <div class="invalid-feedback">
                                @error('situation_matrimoniale')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary w-100">Valider et continuer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
{{-- END --}}
