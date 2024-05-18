@extends('layouts.admin')

@section('nav-title', 'ENREGISTRER UNE MALADIE')

@section('content')
    <section class="section">
        <div class="container">
            
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <p class="text-primary text-uppercase fw-bold mb-3">
                            Allakro - santé
                        </p>
                        <h2>Enregistrer une maladie</h2>
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
                                    <form action="{{ route('maladies.store') }}" method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <label for="Entrer-nom-complet" class="form-label">
                                                    Nom de la maladie
                                                    <span class="text-danger"> *</span></label>
                                                <input type="text" name="nom_maladie"
                                                    placeholder="Entrez le Nom de la maladie"
                                                    class="form-control shadow-none" id="nom_maladie" min="4"
                                                    value="{{ old('nom_maladie') }}" required>
                                                <div class="invalid-feedback">
                                                    @error('nom_maladie')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <label for="prenom_invidivu" class="form-label">
                                                    Mode de transmission <span class="text-danger">*</span></label>
                                                <input type="text" name="mode_transmission"
                                                    placeholder="Mode de transmission de la maladie"
                                                    class="form-control @error('mode_transmission') is-invalid @enderror shadow-none"
                                                    id="mode_transmission" required>
                                                <div class="invalid-feedback">
                                                    @error('mode_transmission')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 mb-4 pb-2">
                                                <label for="profession_invidivu" class="form-label">
                                                    Caractéristiques <span class="text-danger">*</span></label>
                                                <input type="text" name="caracteristique" min="10"
                                                    placeholder="Caractéristique de la maladie"
                                                    class="form-control shadow-none @error('caracteristique') is-invalid @enderror"
                                                    id="caracteristique" required>
                                                <div class="invalid-feedback">
                                                    @error('caracteristique')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-12 mb-4 pb-2">
                                                <label for="profession_invidivu" class="form-label">
                                                    Description <span class="text-danger">*</span></label>
                                                <textarea class="form-control shadow-none" name="description" placeholder="Entrer une description de la maladie" id="" required>{{ old('Description') }}</textarea>
                                                <div class="invalid-feedback">
                                                    @error('description')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <input name="checkbox" class="form-check-input" type="checkbox" @if(old('checkbox')) checked @endif id="defaultCheck2">
                                                <label class="form-check-label" for="defaultCheck2"> La maladie est en activité actuellement </label>
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
