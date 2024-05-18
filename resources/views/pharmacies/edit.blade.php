@extends('layouts.admin')

@section('nav-title', 'MODIFIER LES INFORMATIONS D\'UNE PHARMACIE')

@section('content')
    <div class="container col-lg-10">
        <div class="mb-4">
            <h3>Saisissez les informations de modification</h3>
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

        <div class="">
            <form action="{{ route('pharmacie.update', $pharmacie->id) }}" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="form_type" value="modif_info">
                <div class="row">
                    <div class="col-lg-6 mb-4 pb-2">
                        <div class="form-group">
                            <label for="nom_pharmacie" class="form-label">Nom de la pharmacie <span
                                    class="text-danger">*</span></label>
                            <input name="nom_pharmacie" placeholder="Pharmacie St Lorem" type="text"
                                class="form-control shadow-none" id="nom_pharmacie" value="{{ $pharmacie->nom_pharmacie }}"
                                required>
                            <div class="invalid-feedback">
                                @error('nom_pharmacie')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4 pb-2">
                        <div class="form-group">
                            <label for="emplacement" class="form-label">Emplacement <span
                                    class="text-danger">*</span></label>
                            <input name="emplacement" placeholder="Cocody - Angré 7eme tranche" type="text"
                                class="form-control shadow-none" id="emplacement" value="{{ $pharmacie->emplacement }}"
                                required>
                            <div class="invalid-feedback">
                                @error('emplacement')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4 pb-2">
                        <div class="form-group">
                            <label for="email_pharmacie" class="form-label">Adresse Email<span
                                    class="text-danger">*</span></label>
                            <input name="email_pharmacie" placeholder="lorem-pharma@gmail.com" type="email"
                                class="form-control shadow-none" id="email_pharmacie"
                                value="{{ $pharmacie->email_pharmacie }}" required>
                            <div class="invalid-feedback">
                                @error('email_pharmacie')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4 pb-2">
                        <div class="form-group">
                            <label for="telephone" class="form-label">Téléphone <span class="text-danger">*</span></label>
                            <input name="telephone" placeholder="+225 212030301" type="text"
                                class="form-control shadow-none" id="telephone"
                                value="{{ $pharmacie->telephone_pharmacie }}" required>
                            <div class="invalid-feedback">
                                @error('telephone')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary w-100">
                            Valider les informations
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
