@extends('layouts.admin')

@section('nav-title', "MODIFIER LES INFORMATIONS DE L'EPIDEMIE")

@section('content')
    <section class="section">
        <div class="container">

            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <p class="text-primary text-uppercase fw-bold mb-3">
                            Allakro - santé
                        </p>
                        <h2>Modifier une épidemie</h2>
                    </div>
                </div>
                @if (session('Success'))
                    <div class="alert alert-primary mx-4" role="alert">
                        {{ session('Success') }}
                    </div>
                @elseif(session('Error'))
                    <div class="alert alert-danger mx-4" role="alert">
                        {{ session('Error') }}
                    </div>
                @endif
                <div class="col-lg-10">
                    <div class="shadow rounded p-5 bg-white inherit-media">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="contact-form">
                                    <form action="{{ route('epidemies.update', $epidemy) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <input hidden name="form_type" value="form_edit">
                                        <div class="row">
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <label for="nom_epidemie" class="form-label">
                                                    Nom de l'épidemie
                                                    <span class="text-danger"> *</span></label>
                                                <input type="text" name="nom_epidemie"
                                                    placeholder="Entrez le Nom de l'épidemie"
                                                    class="form-control shadow-none" id="nom_epidemie" min="4"
                                                    value="{{ $epidemy->nom_epidemie }}" required>
                                                <div class="invalid-feedback">
                                                    @error('nom_epidemie')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <label for="zone_concernee" class="form-label">
                                                    Zones concernées <span class="text-danger">*</span></label>
                                                <input type="text" name="zone_concernee"
                                                    value="{{ $epidemy->zone_concernee }}"
                                                    class="form-control @error('zone_concernee') is-invalid @enderror shadow-none"
                                                    id="zone_concernee" required>
                                                <div class="invalid-feedback">
                                                    @error('zone_concernee')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <label for="debut_epidemie" class="form-label">
                                                    Date de début
                                                    <span class="text-danger"> *</span></label>
                                                <input type="date" name="debut_epidemie"
                                                    value="{{ $epidemy->debut_epidemie }}" class="form-control shadow-none"
                                                    id="debut_epidemie" min="4" value="{{ old('debut_epidemie') }}"
                                                    required>
                                                <div class="invalid-feedback">
                                                    @error('debut_epidemie')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <label for="fin_epidemie" class="form-label">
                                                    Date de fin</label>
                                                <input type="date" name="fin_epidemie"
                                                    value="{{ $epidemy->fin_epidemie }}"
                                                    class="form-control @error('fin_epidemie') is-invalid @enderror shadow-none"
                                                    id="fin_epidemie" required>
                                                <div class="invalid-feedback">
                                                    @error('fin_epidemie')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <label for="nombre_de_cas_epidemie" class="form-label">
                                                    nombre de cas trouvé <span class="text-danger">*</span></label>
                                                <input type="text" name="nombre_de_cas_epidemie" min="10"
                                                    placeholder="Entrer un nombre de cas détecté"
                                                    class="form-control shadow-none @error('nombre_de_cas_epidemie') is-invalid @enderror"
                                                    id="nombre_de_cas_epidemie"
                                                    value="{{ $epidemy->nombre_de_cas_epidemie }}" required>

                                                <div class="invalid-feedback">
                                                    @error('nombre_de_cas_epidemie')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <label for="nombre_de_deces_epidemie" class="form-label">
                                                    nombre de victime <span class="text-danger">*</span></label>
                                                <input type="text" name="nombre_de_deces_epidemie" min="10"
                                                    placeholder="Entrer un nombre de victime"
                                                    class="form-control shadow-none @error('nombre_de_deces_epidemie') is-invalid @enderror"
                                                    id="nombre_de_deces_epidemie"
                                                    value="{{ $epidemy->nombre_de_deces_epidemie }}" required>
                                                <div class="invalid-feedback">
                                                    @error('nombre_de_deces_epidemie')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12 mb-4 pb-2">
                                                <label for="mesure_preventive" class="form-label">
                                                    Mesures préventive <span class="text-danger">*</span></label>
                                                <textarea class="form-control shadow-none" name="mesure_preventive" value="{{ $epidemy->mesure_preventive }}"
                                                    id="mesure_preventive" required>{{ $epidemy->mesure_preventive }}"</textarea>
                                                <div class="invalid-feedback">
                                                    @error('mesure_preventive')
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
