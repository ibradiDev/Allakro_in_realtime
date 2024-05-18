@extends('layouts.app')

@section('content')
@section('title', 'Allakro - Formulaire d\'enregistrement de naissance')
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
                        Allakro - Famille
                    </p>
                    <h2>Enregistrez une naissance</h2>
                </div>
            </div>

            <div class="col-lg-10">
                <div class="shadow rounded p-5 bg-white inherit-media">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="contact-form">
                                <form action="{{ route('reqInformationNaissanceSaved') }}" method="POST">
                                    @csrf

                                    <input hidden name="indiv_sended_id" value="{{ Auth::user()->id }}">
                                    <input hidden name="status" value="0">
                                    <div class="row">
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="Entrer-nom-complet" class="form-label">
                                                Nom complet du nouveau-né
                                                <span class="text-danger"> *</span></label>
                                            <input type="text" name="nom_complet"
                                                placeholder="Entrez le Nom et Prénom de l'enfant"
                                                class="form-control shadow-none" id="Entrer-nom-complet"
                                                value="{{ old('nom') }}" required>
                                            <div class="invalid-feedback">
                                                @error('nom')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="Entrer-sexe" class="form-label">
                                                Sexe <span class="text-danger">*</span></label>
                                            <select name="sexe_nouveau_ne" id="Entrer-sexe"
                                                class="form-control shadow-none form-select" required>
                                                <option data-display="">

                                                </option>
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
                                            <label for="Entrer-date-de-naissance" class="form-label">Date de naissance
                                                <span class="text-danger"> *</span></label>
                                            <input type="date" name="date_de_naissance"
                                                class="form-control shadow-none" id="typeDateNaissance1"
                                                value="{{ old('date_de_naissance') }}" required>

                                            <div class="invalid-feedback">
                                                @error('date_de_naissance')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="Entrer-mode-de-naissance" class="form-label">Mode de naissance
                                                <span class="text-danger"> *</span></label>
                                            <input type="text" name="mode_naissance"
                                                placeholder="Nom de l'hopital, quartier"
                                                class="form-control shadow-none" id="Entrer-mode-de-naissance"
                                                value="{{ old('mode_naissance') }}" required>

                                            <div class="invalid-feedback">
                                                @error('mode_naissance')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="Entrer-nom-du-pere" class="form-label">Nom
                                                complet du père
                                                <span class="text-danger"> *</span></label>
                                            <input type="text" name="pere_nouveau_ne"
                                                placeholder="Entrez le Nom et Prénom de père"
                                                class="form-control shadow-none" id="Entrer-nom-du-pere"
                                                value="{{ old('pere_nouveau_ne') }}" required>

                                            <div class="invalid-feedback">
                                                @error('pere_nouveau_ne')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="Entrer-nom-de-la-mere" class="form-label">Nom complet de la mère
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="mere_nouveau_ne"
                                                placeholder="Entrez le Nom et Prénom de la mère"
                                                class="form-control shadow-none" id="Entrer-nom-de-la-mere"
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
                                            <label for="Entrer-lieu-de-residence" class="form-label">Lieu de résidence
                                                <span class="text-danger"> *</span></label>
                                            <input type="text" name="lieu_habitation_famille"
                                                placeholder="Entrez le d'habitation, par exemple Allakro, quartier-palme"
                                                class="form-control shadow-none" id="Entrer-lieu-de-residence"
                                                value="{{ old('lieu_habitation_famille') }}" required>

                                            <div class="invalid-feedback">
                                                @error('lieu_habitation_famille')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="Entrer-famille" class="form-label">Famille <span
                                                    class="text-danger"> *</span></label>
                                            <select name="famille_id" id="Entrer-famille"
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
</section>
@endsection
