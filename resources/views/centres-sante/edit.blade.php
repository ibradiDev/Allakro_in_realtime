@extends('layouts.admin')

@section('nav-title', 'MODIFIER LES INFORMATIONS DU CENTRE')

@section('content')
    <div class="container col-lg-10">
        <div class="mb-4">
            <h3>Saisissez les informations de modification</h3>
        </div>
        <div class="">
            <form action="{{ route('centres.update', $centre) }}" method="POST">
                @csrf
                @method('PUT')
                <input name="form_edit" value="edit_info" hidden>
                <div class="row">
                    <div class="col-lg-6 mb-4 pb-2">
                        <div class="form-group">
                            <label for="nom_centre" class="form-label">Nom du centre <span
                                    class="text-danger">*</span></label>
                            <input name="nom_centre" placeholder="Clinique Lorem" type="text"
                                class="form-control shadow-none @error('nom_centre') is-invalid @enderror" id="nom_centre"
                                value="{{ $centre->nom_centre }}" required>
                            <div class="invalid-feedback">
                                @error('nom_centre')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-4 pb-2">
                        <div class="form-group">
                            <label for="emplacement_centre" class="form-label">Emplacement <span
                                    class="text-danger">*</span></label>
                            <input name="emplacement_centre" placeholder="Cocody - Angré 7eme tranche" type="text"
                                class="form-control shadow-none @error('emplacement_centre') is-invalid @enderror"
                                id="emplacement_centre" value="{{ $centre->emplacement_centre }}" required>
                            <div class="invalid-feedback">
                                @error('emplacement_centre')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-4 pb-2">
                        <div class="form-group">
                            <label for="email_centre" class="form-label">Adresse email<span
                                    class="text-danger">*</span></label>
                            <input name="email_centre" placeholder="lorem-health@gmail.com" type="email"
                                class="form-control shadow-none @error('email_centre') is-invalid @enderror"
                                id="email_centre" value="{{ $centre->email_centre }}" required>

                            <div class="invalid-feedback">
                                @error('email_centre')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-4 pb-2">
                        <div class="form-group">
                            <label for="telephone_centre" class="form-label">
                                Téléphone
                                <span class="text-danger">*</span>
                            </label>
                            <input name="telephone_centre" placeholder="+225 212030301" type="tel"
                                class="form-control shadow-none" id="telephone_centre"
                                value="{{ $centre->telephone_centre }}" required>
                            <div class="invalid-feedback">
                                @error('telephone_centre')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 mb-4 pb-2">
                        <div class="form-group">
                            <label for="offre_centre" class="form-label">
                                Services disponibles
                                <span class="text-danger">*</span>
                            </label>
                            <textarea name="offre_centre" id="offre_centre" placeholder="Pédiatrie - Chururgie - Maternité ..." required
                                class="form-control">{{ $centre->offre_centre }}</textarea>
                            <div class="invalid-feedback">
                                @error('offre_centre')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary w-100">
                            Valider les modifications
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
