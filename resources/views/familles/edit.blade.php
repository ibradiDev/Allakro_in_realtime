@extends('layouts.admin')

@section('nav-title', "MODIFIER LES INFORMATIONS D'UNE FAMILLE")

@section('content')
    <section class="section">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <p class="text-primary text-uppercase fw-bold mb-3">
                            Allakro - Population
                        </p>
                        <h2>Modification des informations</h2>
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

                <div class="col-lg-10">
                    <div class="shadow rounded p-5 bg-white inherit-media">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="contact-form">
                                    <form action="{{ route('familles.update', $famille) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <input hidden value="modificationInformation" name="form_type">
                                        <div class="row">
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <label for="Entrer-nom-complet" class="form-label">
                                                    Nom de la famille
                                                    <span class="text-danger"> *</span></label>
                                                <input type="text" name="nom_famille"
                                                    placeholder="Entrez le Nom de la famille"
                                                    class="form-control shadow-none" id="nom_famille" min="4"
                                                    value="{{ $famille->nom_famille }}" required>
                                                <div class="invalid-feedback">
                                                    @error('nom_famille')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mb-4 pb-2">
                                                <label for="prenom_invidivu" class="form-label">
                                                    Lieu de résidence <span class="text-danger">*</span></label>
                                                <input type="text" name="lieu_habitation"
                                                    placeholder="L'addresse email de la famille"
                                                    class="form-control @error('lieu_habitation') is-invalid @enderror shadow-none"
                                                    id="lieu_habitation" value="{{ $famille->lieu_habitation }}">
                                                <div class="invalid-feedback">
                                                    @error('lieu_habitation')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <label for="profession_invidivu" class="form-label">
                                                    Téléphone <span class="text-danger">*</span></label>
                                                <input type="tel" name="telephone_famille" min="10"
                                                    placeholder="0120200350"
                                                    class="form-control shadow-none @error('telephone_famille') is-invalid @enderror"
                                                    id="telephone_famille" value="{{ $famille->telephone_famille }}">
                                                <div class="invalid-feedback">
                                                    @error('telephone_famille')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mb-4 pb-2">
                                                <label for="profession_invidivu" class="form-label">
                                                    Addresse email <span class="text-danger">*</span></label>
                                                <input type="email" name="email_famille" placeholder="lorem@email.com"
                                                    class="form-control shadow-none" id="email_famille"
                                                    value="{{ $famille->email_famille }}">
                                                <div class="invalid-feedback">
                                                    @error('email_famille')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <button class="btn btn-primary w-100" type="submit"
                                            style="width: fit-content !important">
                                            Valider les modifications
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
