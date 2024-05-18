@extends('layouts.admin')

@section('nav-title', 'DECLARATION DE NAISSANCE')

@section('content')
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
                        Allakro - Population
                    </p>
                    <h2>Enregistrer une naissance</h2>
                </div>
            </div>
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

            {{-- FORMULAIRE DE NAISSANCE --}}
            <div class="col-lg-10">
                <div class="shadow rounded p-5 bg-white inherit-media">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="contact-form">
                                <form action="{{ route('naissance.store') }}" method="POST">
                                    @csrf

                                    <div class="row">
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="nom_complet" class="form-label">
                                                Nom complet du nouveau né
                                                <span class="text-danger"> *</span></label>
                                            <input type="text" name="nom_complet"
                                                placeholder="Entrez le Nom et Prénom de l'enfant"
                                                class="form-control shadow-none" id="nom_complet"
                                                value="{{ old('nom_complet') }}" required>
                                            <div class="invalid-feedback">
                                                @error('nom_complet')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="sexe_nouveau_ne" class="form-label">
                                                Sexe <span class="text-danger">*</span></label>
                                            <select name="sexe_nouveau_ne"aria-valuetext="{{ old('sexe_nouveau_ne') }}"
                                                id="sexe_nouveau_ne" class="form-control shadow-none form-select" required>
                                                <option data-display=""></option>
                                                <option value="M">Masculin</option>
                                                <option value="F">Feminin</option>
                                            </select>

                                            <div class="invalid-feedback">
                                                @error('sexe_nouveau_ne')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="date_de_naissance" class="form-label">Date de naissance
                                                <span class="text-danger"> *</span></label>
                                            <input type="date" name="date_de_naissance" class="form-control shadow-none"
                                                id="date_de_naissance" value="{{ old('date_de_naissance') }}" required>

                                            <div class="invalid-feedback">
                                                @error('date_de_naissance')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="mode_naissance" class="form-label">Mode de naissance
                                                <span class="text-danger"> *</span></label>
                                            <input type="text" name="mode_naissance"
                                                placeholder="Nom de l'hopital, quartier" class="form-control shadow-none"
                                                id="mode_naissance" value="{{ old('mode_naissance') }}" required>

                                            <div class="invalid-feedback">
                                                @error('mode_naissance')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="pere_nouveau_ne" class="form-label">Nom
                                                complet du père
                                                <span class="text-danger"> *</span></label>
                                            <input type="text" name="pere_nouveau_ne"
                                                placeholder="Entrez le Nom et Prénom de père"
                                                class="form-control shadow-none" id="pere_nouveau_ne"
                                                value="{{ old('pere_nouveau_ne') }}" required>

                                            <div class="invalid-feedback">
                                                @error('pere_nouveau_ne')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="mere_nouveau_ne" class="form-label">Nom complet de la mère
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="mere_nouveau_ne"
                                                placeholder="Entrez le Nom et Prénom de la mère"
                                                class="form-control shadow-none" id="mere_nouveau_ne"
                                                value="{{ old('mere_nouveau_ne') }}" required>

                                            <div class="invalid-feedback">
                                                @error('mere_nouveau_ne')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="lieu_habitation_famille" class="form-label">Lieu de résidence
                                                <span class="text-danger"> *</span></label>
                                            <input type="text" name="lieu_habitation_famille"
                                                placeholder="Entrez le d'habitation, par exemple Allakro, quartier-palme"
                                                class="form-control shadow-none" id="lieu_habitation_famille"
                                                value="{{ old('lieu_habitation_famille') }}" required>

                                            <div class="invalid-feedback">
                                                @error('lieu_habitation_famille')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="famille_ide" class="form-label">Famille <span
                                                    class="text-danger"> *</span></label>
                                            <select name="famille_id" aria-valuetext="{{ old('famille_id') }}"
                                                id="famille_ide" class="form-control shadow-none form-select">
                                                <option></option>
                                                @foreach ($allFamilies as $family)
                                                    <option value="{{ $family->id }}">
                                                        {{ $family->nom_famille }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <div class="invalid-feedback">
                                                @error('famille')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary w-100" type="submit"
                                        style="width: fit-content !important">
                                        Enregistrer et terminer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
