@extends('layouts.admin')

@section('content')
@section('nav-title', "OFFRE D'EMPLOI")

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
                    <p class="text-primary text-uppercase fw-bold mb-3">Allakro - Emploi</p>
                    <h2>Publier une offre</h2>
                </div>
            </div>

            <div class="col-lg-10">
                <div class="shadow rounded p-5 bg-white inherit-media">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="contact-form">
                                <form action="{{ route('offre-emploi.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="nom_respo" class="form-label">
                                                Nom du responsable
                                                <span class="text-danger"> *</span>
                                            </label>
                                            <input name="nom_respo" type="text" placeholder="Entrez le Nom et Prénom"
                                                class="form-control shadow-none @error('nom_respo') is-invalid @enderror"
                                                id="nom_respo" value="{{ old('nom_respo') }}" required>

                                            <div class="invalid-feedback">
                                                @error('nom_respo')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="domaine_service" class="form-label">Domaine d'exercice <span
                                                    class="text-danger"> *</span></label>
                                            <input name="domaine_service" type="text" placeholder="Aéronotique"
                                                class="form-control shadow-none @error('domaine_service') is-invalid @enderror"
                                                id="domaine_service" value="{{ old('service') }}" required>

                                            <div class="invalid-feedback">
                                                @error('domaine_service')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="service_propose" class="form-label">Service proposé <span
                                                    class="text-danger"> *</span></label>
                                            <input name="service_propose" type="text" placeholder="Le nom du post"
                                                class="form-control shadow-none @error('service_propose') is-invalid @enderror"
                                                id="service_propose" value="{{ old('service_propose') }}" required>

                                            <div class="invalid-feedback">
                                                @error('service_propose')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="type_contrat" class="form-label">Type de contrat<span
                                                    class="text-danger"> *</span>
                                            </label>
                                            <select name="type_contrat"
                                                class="form-control shadow-none @error('type_contrat') is-invalid @enderror"
                                                id="type_contrat" required>
                                                <option></option>
                                                <option value="CDD">CDD</option>
                                                <option value="CDI">CDI</option>
                                            </select>

                                            <div class="invalid-feedback">
                                                @error('type_contrat')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="competance_requise" class="form-label">
                                                Qualifications & Compétences
                                                <span class="text-danger"> *</span></label>
                                            <textarea name="competance_requise" class="form-control shadow-none" placeholder="Les critères pour le poste"
                                                id="competance_requise" resize="false" required>{{ old('competance_requise') }}</textarea>


                                            <div class="invalid-feedback">
                                                @error('competance_requise')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="telephone_respo" class="form-label">Numéro de téléphone
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input name="telephone_respo" type="tel"
                                                placeholder="exemple: +225 0556368816"
                                                class="form-control shadow-none @error('telephone_respo') is-invalid @enderror"
                                                id="telephone_respo" value="{{ old('telephone_respo') }}" required>

                                            <div class="invalid-feedback">
                                                @error('telephone_respo')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="image" class="form-label">Une Image d'activité <span
                                                    class="text-muted"> (Facultative) </span></label>
                                            <input name="image" type="file" class="form-control shadow-none"
                                                id="Entrer-image" value="{{ old('image') }}">

                                            <div class="invalid-feedback">
                                                @error('image')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb-4 pb-2">
                                            <label for="email_respo" class="form-label">E-mail
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input name="email_respo" type="email"
                                                placeholder="Entrez votre adresse e-mail"
                                                class="form-control shadow-none @error('email_respo') is-invalid @enderror"
                                                id="email_respo" value="{{ old('email_respo') }}" required>

                                            <div class="invalid-feedback">
                                                @error('email_respo')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mb-4 pb-2">
                                        <label for="description_offre" class="form-label">Description <span
                                                class="text-danger">
                                                *</span></label>
                                        <textarea name="description_offre" class="form-control shadow-none"
                                            placeholder="Ecrire votre message de publication ici ..." id="form-text" resize="false" required>{{ old('Description_offre') }}</textarea>

                                        <div class="invalid-feedback">
                                            @error('description_offre')
                                                {{ $message }}
                                            @enderror
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
@section('autres-scripts')
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
@endsection
