@extends('layouts.admin')

@section('content')
@section('nav-title', 'DECLARATION DE DEMENAGEMENT')
<section class="section">
    <div class="container">
        @if (session('Success'))
            <div class="alert alert-success mx-4 alert-dismissible" role="alert" style="font-weight: bold;">
                {{ session('Success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(session('Error'))
            <div class="alert alert-danger mx-4 alert-dismissible" role="alert" style="font-weight: bold;">
                {{ session('Error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6">
                <div class="section-title text-center">
                    <p class="text-primary text-uppercase fw-bold mb-3">Allakro - Déplacements</p>
                    <h3>Enregistrez un Déménagement</h3>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="shadow rounded p-5 bg-white inherit-media">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="contact-form">
                                <form action="{{ route('demenagement.store') }}" method="POST">
                                    @csrf

                                    <div class="row">
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="Entrer-nom-complet" class="form-label">Nom complet<span
                                                    class="text-danger"> *</span></label>
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
                                            <label for="date_de_naissance" class="form-label">Date de naissance <span
                                                    class="text-danger"> *</span></label>
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
                                            <label for="Entrer-date-de-demenagement" class="form-label">Date de
                                                déménagement <span class="text-danger"> *</span></label>
                                            <input name="date_de_demenagement" type="date"
                                                class="form-control shadow-none" id="typeDateDemenagement"
                                                value="{{ old('date_de_demenagement') }}" required>

                                            <div class="invalid-feedback">
                                                @error('date_de_demenagement')
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
