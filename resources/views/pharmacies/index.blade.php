@extends('layouts.admin')

@section('nav-title', 'PHARMACIES DANS LES ENVIRONTS')

@section('content')

    @if (session('Success'))
        <div class="alert alert-primary mx-4" role="alert">
            {{ session('Success') }}
        </div>
    @elseif(session('Error'))
        <div class="alert alert-danger mx-4" role="alert">
            {{ session('Error') }}
        </div>
    @endif

    <!-- ENREGISTRER UNE PHARMACIE -->
    <div class="col-lg-4 col-md-6">
        <div class="mt-3">
            <!-- Modal -->
            <div class="modal applyLoanModal fade" id="addPharmModal" tabindex="-1" aria-labelledby="authModal"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h4 class="modal-title" id="exampleModalLabel">Saisissez les informations de la Pharmacie</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('pharmacie.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-lg-6 mb-4 pb-2">
                                        <div class="form-group">
                                            <label for="nom_pharmacie" class="form-label">Nom de la pharmacie <span
                                                    class="text-danger">*</span></label>
                                            <input name="nom_pharmacie" placeholder="Pharmacie St Lorem" type="text"
                                                class="form-control shadow-none" id="nom_pharmacie"
                                                value="{{ old('nom_pharmacie') }}" required>

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
                                            <input name="emplacement" placeholder="Cocody - Angré 7eme tranche"
                                                type="text" class="form-control shadow-none" id="emplacement"
                                                value="{{ old('emplacement') }}" required>

                                            <div class="invalid-feedback">
                                                @error('emplacement')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4 pb-2">
                                        <div class="form-group">
                                            <label for="email_pharmacie" class="form-label">Adresse Email_pharmacie<span
                                                    class="text-danger">*</span></label>
                                            <input name="email_pharmacie" placeholder="lorem-pharma@gmail.com"
                                                type="email" class="form-control shadow-none" id="email_pharmacie"
                                                value="{{ old('email_pharmacie') }}" required>

                                            <div class="invalid-feedback">
                                                @error('email_pharmacie')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4 pb-2">
                                        <div class="form-group">
                                            <label for="telephone_pharmacie" class="form-label">Téléphone <span
                                                    class="text-danger">*</span></label>
                                            <input name="telephone_pharmacie" placeholder="+225 212030301" type="tel"
                                                class="form-control shadow-none" id="telephone_pharmacie"
                                                value="{{ old('telephone_pharmacie') }}" required>

                                            <div class="invalid-feedback">
                                                @error('telephone_pharmacie')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12 mb-4 pb-2">
                                        <label class="form-label">
                                            Autres informations par défaut
                                        </label>
                                        <div class="row">
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <div class="form-group">
                                                    <label for="debut_garde" class="form-label">Disponible jours
                                                        ouvrables</label>
                                                    <input value="Lundi-Vendredi de 08:30 à 20h"
                                                        class="form-control shadow-none col-2" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <div class="form-group">
                                                    <label for="fin_garde" class="form-label">Disponible autres
                                                        jours</label>
                                                    <input value="De 08:30 à 12h" class="form-control shadow-none col-2"
                                                        readonly>
                                                </div>
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
                </div>
            </div>
        </div>
    </div>


    @foreach ($pharmacies as $pharmacie)
        <!-- DEFINIR UNE PERIODE DE PHARMACIE -->
        <div class="col-lg-4 col-md-6">
            <div class="mt-3">
                <div class="modal applyLoanModal fade" id="defineGardeTime_{{ $pharmacie->id }}" tabindex="-1"
                    aria-labelledby="authModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0">
                                <h4 class="modal-title" id="exampleModalLabel">Définir la période de garde</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('pharmacie.update', $pharmacie->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <input type="hidden" name="form_type" value="modif_de_garde">
                                    <div class="col-lg-12 col-12 mb-4 pb-2">
                                        <label class="form-label">
                                            Période de garde
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="row">
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <div class="form-group">
                                                    <label for="debut_garde" class="form-label">Du</label>
                                                    <input type="datetime-local" name="debut_garde" id="debut_garde"
                                                        class="form-control shadow-none col-2" required>

                                                    <div class="invalid-feedback">
                                                        @error('debut_garde')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <div class="form-group">
                                                    <label for="fin_garde" class="form-label">AU</label>
                                                    <input type="datetime-local" name="fin_garde" id="fin_garde"
                                                        class="form-control shadow-none col-2" required>

                                                    <div class="invalid-feedback">
                                                        @error('fin_garde')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-primary w-100">
                                            Valider les informations
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- DETAILS DE PHARMACIE --}}
    @foreach ($pharmacies as $pharmacie)
        <x-details-pharmacie :pharmacie="$pharmacie" />
    @endforeach


    <div class="row">
        <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <h5 class="text-nowrap mb-2 font-w700">
                            Pharmacies opérationnelles
                        </h5>
                    </div>
                    <h3 class="card-title mb-2" style="font-weight: bold;">{{ count($pharmacies) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <h5 class="text-nowrap mb-2">
                            Pharmacies non opérationnelles
                        </h5>
                    </div>
                    <h3 class="card-title mb-2" style="font-weight: bold;">
                        {{-- {{ count($centres_sante_del) }} --}}
                        0
                    </h3>
                </div>
            </div>
        </div>
    </div>

    {{-- TABLE DES PHARMACIE --}}
    <div class="d-flex flex-column">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title">TABLE DES PHARMACIES</h5>
                <div class="dropdown">
                    <button class="btn p-0" type="button" id="addNewsModal" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="addHealthCenterModal" style="">
                        <a class="dropdown-item" href="javascript:void(0);" type="button" data-bs-toggle="modal"
                            data-bs-target="#addPharmModal"> Enregistrer une pharmacie</a>
                    </div>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Emplacement</th>
                        <th>Email_pharmacie</th>
                        <th>Téléphone</th>
                        <th>Disponibilité</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                    @if ($pharmacies)
                        @foreach ($pharmacies as $pharmacie)
                            <tr>
                                <td>{{ $pharmacie->nom_pharmacie }}</td>
                                <td>{{ $pharmacie->emplacement }}</td>
                                <td>{{ $pharmacie->email_pharmacie }}</td>
                                <td>{{ $pharmacie->telephone_pharmacie }}</td>
                                <td>
                                    @if ($pharmacie->de_garde == false)
                                        <span class="badge bg-label-danger me-1" style="line-height: 1.75;">
                                            Ouvert de 8h30 à 20h (Lundi - Vendredi)</span>
                                    @else
                                        <span style="background: #fff;box-shadow: none;padding:0;">
                                            <span class="badge badge-success text-center">
                                                De garde
                                                <i class="ms-1 fa fa-check-double"></i>
                                            </span>
                                            <i class="d-block">
                                                <small>
                                                    Du
                                                    <b>
                                                        {{ \Carbon\Carbon::parse($pharmacie->date_debut)->format('d/m/Y') }}
                                                    </b> au
                                                    <b>
                                                        {{ \Carbon\Carbon::parse($pharmacie->date_fin)->format('d/m/Y') }}
                                                    </b>
                                                </small>
                                            </i>
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" type="button" data-bs-toggle="modal"
                                                data-bs-target="#details_pharmacie_{{ $pharmacie->id }}">
                                                <i class="bx bx-show me-1"></i>
                                                Voir details
                                            </a>
                                            <a class="dropdown-item" href="{{ route('pharmacie.edit', $pharmacie) }}">
                                                <i class="bx bx-edit me-1"></i>
                                                Modifier les informations
                                            </a>

                                            @if ($pharmacie->de_garde == false)
                                                <a class="dropdown-item" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#defineGardeTime_{{ $pharmacie->id }}">
                                                    <i class="bx bx-check me-1"></i>
                                                    Activer période de garde
                                                </a>
                                            @else
                                                <form action="{{ route('pharmacie.update', $pharmacie) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <input type="hidden" name="de_garde" value="0">
                                                    <input type="hidden" name="form_type" value="modif_desactiv_garde">
                                                    <button type="submit" class="dropdown-item"
                                                        onclick="return confirm('Souhaitez-vous chhanger l\'état de garde de la pharmacie ?');">
                                                        <i class="bx bx-restore me-1"></i>
                                                        Désactiver période de garde
                                                    </button>
                                                </form>
                                            @endif

                                            <form action="{{ route('pharmacie.update', $pharmacie) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <input type="hidden" name="status" value="0">
                                                <button type="submit" class="dropdown-item text-danger"
                                                    onclick="return confirm('Validez-vous la suppression ?');">
                                                    <i class="fa fa-trash me-1"></i>
                                                    Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>

            <div class="mt-3 border-danger d-flex justify-content-center">
                <span>{!! $pharmacies->links() !!}</span>
            </div>
        </div>
    </div>
@endsection
