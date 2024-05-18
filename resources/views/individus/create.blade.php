@extends('layouts.admin')

@section('nav-title', 'ENREGISTRER UN INDIVIDU')

@section('content')
    <section class="section">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <p class="text-primary text-uppercase fw-bold mb-3">
                            Allakro - Population
                        </p>
                        <h2>Enregistrer un individu</h2>
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
                                    <form action="{{ route('individus.store') }}" method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <label for="Entrer-nom-complet" class="form-label">
                                                    Nom
                                                    <span class="text-danger"> *</span></label>
                                                <input type="text" name="nom_individu"
                                                    placeholder="Entrez le Nom de l'habitant"
                                                    class="form-control shadow-none" id="nom_individu"
                                                    value="{{ old('nom_individu') }}" required>
                                                <div class="invalid-feedback">
                                                    @error('nom_individu')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <label for="prenom_invidivu" class="form-label">
                                                    Prénom <span class="text-danger">*</span></label>
                                                <input type="text" name="prenom_individu"
                                                    placeholder="Le prénom de l'habitant" class="form-control shadow-none"
                                                    id="prenom_individu" value="{{ old('prenom_individu') }}">
                                                <div class="invalid-feedback">
                                                    @error('prenom_individu')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <label for="sexe_individu" class="form-label">
                                                    Sexe
                                                    <span class="text-danger"> *</span></label>
                                                <select name="sexe_individu" id="sexe_invidivu"
                                                    class="form-control shadow-none form-select" required>
                                                    <option data-display="">
                                                    </option>
                                                    <option value="M">Masculin</option>
                                                    <option value="F">Feminin</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    @error('sexe_individu')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <label for="profession_invidivu" class="form-label">
                                                    Profession <span class="text-danger">*</span></label>
                                                <input type="text" name="profession_individu"
                                                    placeholder="Le profession de l'habitant"
                                                    class="form-control shadow-none" id="profession_individu" value="{{ old('profession_individu') }}">
                                                <div class="invalid-feedback">
                                                    @error('profession_individu')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <label for="Entrer-date-de-naissance" class="form-label">Date de naissance
                                                    <span class="text-danger"> *</span></label>
                                                <input type="date" name="date_naissance" class="form-control shadow-none"
                                                    id="typeDateNaissance" value="{{ old('date_naissance') }}" required>

                                                <div class="invalid-feedback">
                                                    @error('date_naissance')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <label for="Entrer-mode-de-naissance" class="form-label">Téléphone
                                                    <span class="text-danger"> *</span></label>
                                                <input type="tel" name="telephone" placeholder="+225 1556484546"
                                                    class="form-control shadow-none"
                                                    id="telephone"
                                                    value="{{ old('telephone') }}" required>
                                                <div class="invalid-feedback">
                                                    @error('telephone')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <label for="situation_matrimoniale" class="form-label">Situation
                                                    matrimoniale
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" name="situation_matrimoniale"
                                                    placeholder="Marié(e) ou Célibataire" class="form-control shadow-none"
                                                    id="situation_matrimoniale"
                                                    value="{{ old('situation_matrimoniale') }}" required>
                                                <div class="invalid-feedback">
                                                    @error('situation_matrimoniale')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <label for="famille" class="form-label">De la famille
                                                   <span class="text-muted">(Facultatif)</span></label>

                                                <select name="familleSelected" id="Entrer-famille" class="form-control shadow-none form-select">
                                                    <option data-display=""></option>
                                                    @foreach($getFamilles as $val)
    
                                                        <option value="{{$val->id}}">{{$val->nom_famille}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    @error('familleSelected')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mb-4 pb-2">
                                            <label for="famille" class="form-label">Saisi du nom de famille <span class="text-muted">(Facultatif)</span>
                                                </label>
                                            <input type="text" name="famille"
                                                placeholder="Le famille de l'individu"
                                                class="form-control shadow-none" id="famille"
                                                value="{{ old('famille') }}">
                                            <div class="invalid-feedback">
                                                @error('famille')
                                                    {{ $message }}
                                                @enderror
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
