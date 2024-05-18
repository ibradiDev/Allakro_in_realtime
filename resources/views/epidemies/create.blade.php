@extends('layouts.admin')

@section('nav-title', "ENREGISTRER UN EPIDEMIE")

@section('content')
    <section class="section">
        <div class="container">
            
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <p class="text-primary text-uppercase fw-bold mb-3">
                            Allakro - santé
                        </p>
                        <h2>Enregistrer une épidemie</h2>
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
                                    <form action="{{ route('epidemies.store') }}" method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <label for="nom_epidemie" class="form-label">
                                                    Nom de l'épidemie
                                                    <span class="text-danger"> *</span></label>
                                                <input type="text" name="nom_epidemie"
                                                    placeholder="Entrez le Nom de l'épidemie"
                                                    class="form-control shadow-none" id="nom_epidemie" min="4"
                                                    value="{{ old('nom_epidemie') }}" required>
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
                                                    placeholder="zones concernées par cette épidemie"
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
                                                <label for="date_debut" class="form-label">
                                                    Date de début
                                                    <span class="text-danger"> *</span></label>
                                                <input type="date" name="date_debut"
                                                    placeholder="Date de début de l'épidemie"
                                                    class="form-control shadow-none" id="date_debut" min="4"
                                                    value="{{ old('date_debut') }}" required>
                                                <div class="invalid-feedback">
                                                    @error('date_debut')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <label for="date_fin" class="form-label">
                                                    Date de fin</label>
                                                <input type="date" name="date_fin"
                                                    placeholder="Date de fin de l'épidemie"
                                                    class="form-control @error('date_fin') is-invalid @enderror shadow-none"
                                                    id="date_fin" required>
                                                <div class="invalid-feedback">
                                                    @error('date_fin')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <label for="nombre_de_cas" class="form-label">
                                                    nombre de cas trouvé <span class="text-danger">*</span></label>
                                                <input type="text" name="nombre_de_cas" min="10"
                                                    placeholder="Entrer un nombre de cas détecté"
                                                    class="form-control shadow-none @error('nombre_de_cas') is-invalid @enderror"
                                                    id="nombre_de_cas" required>
                                                <div class="invalid-feedback">
                                                    @error('nombre_de_cas')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <label for="nombre_de_victime" class="form-label">
                                                    nombre de victime <span class="text-danger">*</span></label>
                                                <input type="text" name="nombre_de_victime" min="10"
                                                    placeholder="Entrer un nombre de victime"
                                                    class="form-control shadow-none @error('nombre_de_victime') is-invalid @enderror"
                                                    id="nombre_de_victime" required>
                                                <div class="invalid-feedback">
                                                    @error('nombre_de_victime')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-12 mb-4 pb-2">
                                                <label for="mesure_preventive" class="form-label">
                                                    Mesures préventive <span class="text-danger">*</span></label>
                                                <textarea class="form-control shadow-none" name="mesure_preventive" placeholder="Entrer des mésures de prévention contre cette épidemie" id="mesure_preventive" required>{{ old('mesure_preventive') }}</textarea>
                                                <div class="invalid-feedback">
                                                    @error('mesure_preventive')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <input name="checkbox" class="form-check-input" type="checkbox" @if(old('checkbox')) checked @endif id="defaultCheck2">
                                                <label class="form-check-label" for="defaultCheck2"> Cette épidemie est en activité actuellement </label>
                                                <div class="invalid-feedback">
                                                    @error('checkbox')
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
