@extends('layouts.admin')

@section('nav-title', "MODIFIER LES INFORMATIONS D'UNE MALADIE")

@section('content')
    <section class="section">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <p class="text-primary text-uppercase fw-bold mb-3">
                            Allakro - Santé
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
                                    <form action="{{ route('maladies.update', $malady) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <input hidden name="form_type" value="form_edit">
                                        <div class="row">
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <label for="nom_maladie" class="form-label">
                                                    Nom de la maladie
                                                    <span class="text-danger"> *</span></label>
                                                <input type="text" name="nom_maladie"
                                                    placeholder="Entrez le Nom de la maladie"
                                                    class="form-control shadow-none" id="nom_maladie" min="4"
                                                    value="{{ $malady->nom_maladie }}" required>
                                                <div class="invalid-feedback">
                                                    @error('nom_maladie')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <label for="prenom_invidivu" class="form-label">
                                                    Mode de transmission <span class="text-danger">*</span></label>
                                                <input type="text" name="mode_transmission_maladie"
                                                    placeholder="Mode de transmission de la maladie"
                                                    class="form-control @error('mode_transmission_maladie') is-invalid @enderror shadow-none"
                                                    id="mode_transmission_maladie"
                                                    value="{{ $malady->mode_transmission_maladie }}">
                                                <div class="invalid-feedback">
                                                    @error('mode_transmission_maladie')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 mb-4 pb-2">
                                                <label for="profession_invidivu" class="form-label">
                                                    Caractéristiques <span class="text-danger">*</span></label>
                                                <input type="text" name="caracteristique_maladie" min="10"
                                                    placeholder="Caractéristique de la maladie"
                                                    class="form-control shadow-none @error('caracteristique_maladie') is-invalid @enderror"
                                                    id="caracteristique_maladie"
                                                    value="{{ $malady->caracteristique_maladie }}">
                                                <div class="invalid-feedback">
                                                    @error('caracteristique_maladie')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 mb-4 pb-2">
                                                <label for="description_maladie" class="form-label">
                                                    Description <span class="text-danger">*</span></label>
                                                <textarea class="form-control shadow-none" name="description_maladie" id="description_maladie" required>{{ $malady->description_maladie }}</textarea>

                                                <div class="invalid-feedback">
                                                    @error('description_maladie')
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
