@extends('layouts.app')

@section('content')
@section('title', 'Allakro - Formulaire d\'enregistrement des déménagements')
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
                    <p class="text-primary text-uppercase fw-bold mb-3">
                        Allakro - Déplacements
                    </p>
                    <h2>Enregistrez un Déménagement</h2>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="shadow rounded p-5 bg-white inherit-media">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="contact-form">
                                <form action="{{ route('reqInformationDemenagementSaved') }}" method="POST">
                                    @csrf

                                    <input hidden name="indiv_sended_id" value="{{ Auth::user()->id }}">
                                    <input hidden name="status" value="0">
                                    <div class="row">
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="Entrer-nom-complet" class="form-label">Nom complet<span
                                                    class="text-danger"> *</span></label>
                                            <input name="nom_complet_dmg" type="text"
                                                placeholder="Entrez le Nom et Prénom" class="form-control shadow-none"
                                                id="Entrer-nom-complet" value="{{ old('nom_complet_dmg') }}" required>

                                            <div class="invalid-feedback">
                                                @error('nom_complet_dmg')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="Entrer-sexe_dmg" class="form-label">Sexe<span
                                                    class="text-danger">
                                                    *</span></label>
                                            <select name="sexe_dmg" id="Entrer-sexe_dmg"
                                                class="form-control shadow-none form-select" required>
                                                <option data-display=""></option>
                                                <option value="M">Masculin</option>
                                                <option value="F">Feminin</option>
                                            </select>

                                            <div class="invalid-feedback">
                                                @error('sexe_dmg')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="Entrer-fonction_dmg" class="form-label">Fonction <span
                                                    class="text-danger"> *</span></label>
                                            <input name="fonction_dmg" type="text" placeholder="Entrez la fonction"
                                                class="form-control shadow-none" id="Entrer-fonction_dmg"
                                                value="{{ old('fonction_dmg') }}" required>

                                            <div class="invalid-feedback">
                                                @error('fonction_dmg')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="Entrer-date-de-naissance" class="form-label">Date de naissance
                                                <span class="text-danger"> *</span></label>
                                            <input name="date_de_naissance" type="date"
                                                class="form-control shadow-none" id="typeDateNaissance4"
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
                                            <label for="Entrer-date-de-demenagement" class="form-label">Date de
                                                déménagement <span class="text-danger"> *</span></label>
                                            <input name="date_demenagement" type="date"
                                                class="form-control shadow-none" id="typeDateDemenagement"
                                                value="{{ old('date_demenagement') }}" required>

                                            <div class="invalid-feedback">
                                                @error('date_demenagement')
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
                                            <label for="Entrer-nouvelle-habitation" class="form-label">Nouvelle
                                                Destination <span class="text-danger"> *</span></label>
                                            <input name="destination" type="text"
                                                placeholder="Entrez le d'habitation, par exemple Allakro, quartier-palme"
                                                class="form-control shadow-none" id="Entrer-nouvelle-habitation"
                                                value="{{ old('destination') }}" required>

                                            <div class="invalid-feedback">
                                                @error('destination')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary w-100" type="submit"
                                        style="width: fit-content !important;">Enregistrer et terminer</button>
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

