@extends('layouts.admin')

@section('content')
@section('nav-title', 'DECLARATION D\'AMENAGEMENT')
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
                    <p class="text-primary text-uppercase fw-bold mb-3">Allakro - Déplacements</p>
                    <h2>Enregistrez un nouveau aménagement</h2>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="shadow rounded p-5 bg-white inherit-media">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="contact-form">
                                <form action="{{ route('amenagement.store') }}" method="POST">
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
                                            <label for="Entrer-date-de-naissance" class="form-label">Date de naissance
                                                <span class="text-danger"> *</span></label>
                                            <input name="date_de_naissance" type="date"
                                                class="form-control shadow-none" id="typeDateNaissance"
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
                                            <label for="Entrer-la-provenance" class="form-label">Provenance <span
                                                    class="text-danger"> *</span></label>
                                            <input name="provenance" type="text"
                                                placeholder="Entrez le Nom et Prénom" class="form-control shadow-none"
                                                id="Entrer-la-provenance" value="{{ old('provenance') }}" required>

                                            <div class="invalid-feedback">
                                                @error('provenance')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="Entrer-mode-hebergement" class="form-label">Mode d’hébergement
                                                <span class="text-danger"> *</span></label>
                                            <select name="mode_hebergement" id="Entrer-mode-hebergement"
                                                class="form-control shadow-none form-select" required>
                                                <option data-display=""></option>

                                                <option value="Nouvelle-Habitation">Nouvelle Habitation</option>
                                                <option value="Chez-Un-Parent">Chez Un Parent</option>
                                            </select>

                                            <div class="invalid-feedback">
                                                @error('mode_hebergement')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="Entrer-date-de-amenagement" class="form-label">Date de
                                                aménagement <span class="text-danger"> *</span></label>
                                            <input name="date_de_amenagement" type="date"
                                                class="form-control shadow-none" id="typeDateAmenagement"
                                                value="{{ old('date_de_amenagement') }}" required>

                                            <div class="invalid-feedback">
                                                @error('date_de_amenagement')
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
                                            <label for="Entrer-nom-parent" class="form-label">Si chez un parent,
                                                indiquer le nom du parent <span class="text-muted"> (Facultatif)
                                                </span></label>
                                            <input name="nom_parent" type="text"
                                                placeholder="Entrez le nom du parent" class="form-control shadow-none"
                                                id="Entrer-nom-parent" {{ old('nom_parent') }}>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary w-100" type="submit"
                                        style="width: fit-content !important;">
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

{{-- @section('autres-scripts')
<script>
    $(document).ready(function() {
        // Obtenir la date actuelle
        var currentDate = new Date();

        // Convertir la date actuelle en format compatible avec l'input de type date
        var formattedCurrentDate = currentDate.toISOString().split('T')[0];

        // Définir la valeur maximale de l'input de type date
        $('#typeDateNaissance').attr('max', formattedCurrentDate);
    });
</script>
@endsection --}}
