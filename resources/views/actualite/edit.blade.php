@extends('layouts.admin')

@if (isset($projet))
    @section('nav-title', 'MOFICATION DES INFORMATIONS DU PROJET')

    @section('content')
        <div class="container col-8 rounded bg-white inherit-media">
            <div class="modal-header border-bottom-0">
                <h4 class="modal-title" id="exampleModalLabel">Saisissez les données de modification</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('projets.update', $projet) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <input name="form_type" value="form_edit" hidden>
                    <div class="row">
                        <div class="col-lg-12 col-12 mb-4 pb-2">
                            <div class="form-group">
                                <label for="titre" class="form-label">Titre du projet <span
                                        class="text-danger">*</span></label>
                                <input name="titre" placeholder="projet St Lorem" type="text"
                                    class="form-control shadow-none @error('titre') is-invalid @enderror" id="titre"
                                    value="{{ $projet->titre }}" required>
                                <div class="invalid-feedback">
                                    @error('titre')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-12 mb-4 pb-2">
                            <div class="form-group">
                                <label for="description_projet" class="form-label">Description du projet <span
                                        class="text-danger">*</span></label>
                                <textarea name="description_projet" id="description_projet"
                                    class="form-control shadow-none @error('description_projet') is-invalid @enderror" minlength="30" required>{{ $projet->description_projet }}</textarea>

                                <div class="invalid-feedback">
                                    @error('description_projet')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-12 mb-4 pb-2">
                            <label class="form-label">
                                Période de déroulement du projet
                            </label>
                            <div class="row">
                                <div class="col-lg-6 mb-4 pb-2">
                                    <div class="form-group">
                                        <label for="debut_projet" class="form-label">
                                            Début fixé au <span class="text-danger">*</span>
                                        </label>
                                        <input type="date" name="debut_projet" value="{{ $projet->debut_projet }}""
                                            class="form-control shadow-none col-2">
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-4 pb-2">
                                    <div class="form-group">
                                        <label for="fin_projet" class="form-label">Fin prévu pour le
                                        </label>
                                        <input type="date" name="fin_projet" value="{{ $projet->fin_projet }}"
                                            class="form-control shadow-none col-2">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <button type="submit" class="btn btn-primary w-100">
                                Valider les informations
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
@elseif (isset($actualite))
    @section('nav-title', 'MODIFICATION DES DONNEES DE L\'INFORMATION')

    @section('content')
        <div class="container col-8 rounded bg-white inherit-media">
            <div class="modal-header border-bottom-0">
                <h4 class="modal-title" id="exampleModalLabel">Saisissez les informations de modification</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('actualites.update', $actualite) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <input name="form_type" value="form_edit" hidden>
                    <div class="row">
                        <div class="col-lg-12 col-12 mb-4 pb-2">
                            <div class="form-group">
                                <label for="titre" class="form-label">Titre de l'actualite <span
                                        class="text-danger">*</span></label>
                                <input name="titre" placeholder="projet St Lorem" type="text"
                                    class="form-control shadow-none  @error('titre') is-invalid @enderror" id="titre"
                                    value="{{ $actualite->titre }}" required>
                                <div class="invalid-feedback">
                                    @error('titre')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12 mb-4 pb-2">
                            <div class="form-group">
                                <label for="contenu" class="form-label">Contenu de l'actualite
                                    <span class="text-danger">*</span></label>
                                <textarea name="contenu" id="contenu" minlength="30"
                                    class="form-control shadow-none @error('contenu') is-invalid @enderror">{{ $actualite->contenu }}</textarea>
                                <div class="invalid-feedback">
                                    @error('contenu')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <button type="submit" class="btn btn-primary w-100">
                                Valider les informations
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
@endif
