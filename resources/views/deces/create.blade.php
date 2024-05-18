@extends('layouts.admin')

@section('content')

@section('nav-title', 'DECLARATION DE DECES')

<section class="section">
    <div class="container">
        @if (session('Success'))
            <div class="alert alert-primary mx-4" role="alert">
                {{ session('Success') }}
            </div>
        @elseif(session('Error'))
            <div class="alert alert-danger mx-4" role="alert">
                {{ session('Error') }}
            </div>
        @endif
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6">
                <div class="section-title text-center">
                    <p class="text-primary text-uppercase fw-bold mb-3">Allakro - Famille</p>
                    <h2>Enregistrer un décès</h2>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="shadow rounded p-5 bg-white inherit-media">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="contact-form">
                                <form action="{{ route('deces.store') }}" method="POST">
                                    @csrf

                                    <div class="row">
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="Entrer-nom-complet" class="form-label">Nom complet du décédé
                                                <span class="text-danger"> *</span></label>
                                            <input name="nom_complet" type="text"
                                                placeholder="Entrez le Nom et Prénom" class="form-control shadow-none"
                                                id="Entrer-nom-complet" value="{{ old('nom_complet') }}" required>

                                            <div class="invalid-feedback">
                                                @error('nom_complet')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="Entrer-sexe" class="form-label">Sexe <span class="text-danger">
                                                    *</span></label>
                                            <select name="sexe" id="Entrer-sexe"
                                                class="form-control shadow-none form-select" required>
                                                <option data-display=""></option>
                                                <option value="M">Masculin</option>
                                                <option value="F">Feminin</option>
                                            </select>

                                            <div class="invalid-feedback">
                                                @error('sexe')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="Entrer-fonction" class="form-label">Fonction <span
                                                    class="text-danger"> *</span></label>
                                            <input name="fonction" type="text" placeholder="Entrez la fonction"
                                                class="form-control shadow-none" id="Entrer-fonction"
                                                value="{{ old('fonction') }}" required>

                                            <div class="invalid-feedback">
                                                @error('fonction')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="date_de_naissance" class="form-label">Date de naissance
                                                <span class="text-danger"> *</span></label>
                                            <input name="date_de_naissance" type="date"
                                                class="form-control shadow-none" id="date_de_naissance"
                                                value="{{ old('date_de_naissance') }}" required>

                                            <div class="invalid-feedback">
                                                @error('date_de_naissance')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="date_de_deces" class="form-label">Date de décès <span
                                                    class="text-danger"> *</span></label>
                                            <input name="date_de_deces" type="date" class="form-control shadow-none"
                                                id="date_de_deces" value="{{ old('date_de_deces') }}" required>

                                            <div class="invalid-feedback">
                                                @error('date_de_deces')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="Entrer-mode-de-deces" class="form-label">Mode de décès <span
                                                    class="text-danger"> *</span></label>
                                            <input name="mode_de_deces" type="text"
                                                placeholder="Entrez le mode, exemple: hopital, quartier"
                                                class="form-control shadow-none" id="Entrer-mode-de-deces"
                                                value="{{ old('mode_de_deces') }}" required>

                                            <div class="invalid-feedback">
                                                @error('mode_de_deces')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="Entrer-nom-complet-referent" class="form-label">Nom complet
                                                référent <span class="text-danger"> *</span></label>
                                            <input name="nom_referent" type="text"
                                                placeholder="Entrez le Nom et Prénom" class="form-control shadow-none"
                                                id="Entrer-nom-complet-referent" value="{{ old('nom_referent') }}"
                                                required>

                                            <div class="invalid-feedback">
                                                @error('nom_referent')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="Entrer-lieu-habitation" class="form-label">Lieu d'habitation
                                                <span class="text-danger"> *</span></label>
                                            <input name="lieu_habitation" type="text"
                                                placeholder="Entrez le d'habitation, par exemple Allakro, quartier-palme"
                                                class="form-control shadow-none" id="Entrer-lieu-habitation"
                                                value="{{ old('lieu_habitation') }}" required>

                                            <div class="invalid-feedback">
                                                @error('lieu_habitation')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="Entrer-famille" class="form-label">Famille <span
                                                    class="text-danger"> *</span></label>
                                            <select name="famille" id="Entrer-famille"
                                                class="form-control shadow-none form-select">
                                                <option data-display=""></option>
                                                @foreach ($getFamilles as $val)
                                                    <option value="{{ $val->id }}">{{ $val->nom_famille }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <div class="invalid-feedback">
                                                @error('famille')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="Entrer-raison-de-deces" class="form-label">Raison du décès
                                                <span class="text-muted"> (Facultatif) </span></label>
                                            <input name="raison_de_deces" type="text"
                                                placeholder="Entrez une raison de décès"
                                                class="form-control shadow-none" id="Entrer-raison-de-deces"
                                                value="{{ old('raison_de_deces') }}">
                                        </div>
                                    </div>
                                    <button class="btn btn-primary w-100" type="submit"
                                        style="width: fit-content !important;">Enregistrer et
                                        terminer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
