@extends('layouts.admin')

@section('nav-title', 'CENTRES DE SANTE DANS LES ENVIRONTS')

@section('content')

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

    <!-- -->
    <div class="col-lg-4 col-md-6">
        <div class="mt-3">
            <!-- Modal -->
            <div class="modal applyLoanModal fade" id="addHealthCenterModal" tabindex="-1" aria-labelledby="authModal"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h4 class="modal-title" id="exampleModalLabel">Saisissez les informations du centre de santé
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('centres.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-lg-6 mb-4 pb-2">
                                        <div class="form-group">
                                            <label for="nom_centre" class="form-label">Nom du centre <span
                                                    class="text-danger">*</span></label>
                                            <input name="nom_centre" placeholder="Clinique Lorem" type="text"
                                                class="form-control shadow-none" id="nom_centre"
                                                value="{{ old('nom_centre') }}" required>
                                            <div class="invalid-feedback">
                                                @error('nom_centre')
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
                                            <label for="email" class="form-label">Adresse Email<span
                                                    class="text-danger">*</span></label>
                                            <input name="email" placeholder="lorem-health@gmail.com" type="email"
                                                class="form-control shadow-none" id="email" value="{{ old('email') }}"
                                                required>
                                            <div class="invalid-feedback">
                                                @error('email')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4 pb-2">
                                        <div class="form-group">
                                            <label for="telephone" class="form-label">Téléphone <span
                                                    class="text-danger">*</span></label>
                                            <input name="telephone" placeholder="+225 212030301" type="text"
                                                class="form-control shadow-none" id="telephone"
                                                value="{{ old('telephone') }}" required>
                                            <div class="invalid-feedback">
                                                @error('telephone')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-4 pb-2">
                                        <div class="form-group">
                                            <label for="service" class="form-label">Services disponibles <span
                                                    class="text-danger">*</span></label>
                                            <textarea name="service" id="service" placeholder="Pédiatrie - Ophtalmologie - Chirurgie ..."
                                                class="form-control shadow-none" required></textarea>

                                            <div class="invalid-feedback">
                                                @error('service')
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
                </div>
            </div>
        </div>
    </div>
    <!--Modal-->

    @foreach ($centres as $centre)
        <x-details-centre-de-sante :centre="$centre" />
    @endforeach


    <div class="row">
        <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <h5 class="text-nowrap mb-2 font-w700">
                            Centres opérationnels
                        </h5>
                    </div>
                    <h3 class="card-title mb-2" style="font-weight: bold;">{{ count($centres) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <h5 class="text-nowrap mb-2">
                            Centres non opérationnels
                        </h5>
                    </div>
                    <h3 class="card-title mb-2" style="font-weight: bold;">{{ count($centres_del) }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title">
                    TABLE DES CENTRES DE SANTE
                </h5>
                <div class="dropdown">
                    <button class="btn p-0" type="button" id="addNewsModal" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="addHealthCenterModal" style="">
                        <a class="dropdown-item" href="javascript:void(0);" type="button" data-bs-toggle="modal"
                            data-bs-target="#addHealthCenterModal"> Enregistrer un
                            centre</a>
                    </div>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Emplacement</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                    @if ($centres)
                        @foreach ($centres as $centre)
                            <tr>
                                <td>{{ $centre->nom_centre }}</td>
                                <td>{{ $centre->emplacement_centre }}</td>
                                <td>{{ $centre->email_centre }}</td>
                                <td>{{ $centre->telephone_centre }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" type="button" data-bs-toggle="modal"
                                                data-bs-target="#details_centre_{{ $centre->id }}">
                                                <i class="bx bx-show me-1"></i>
                                                Voir details
                                            </a>
                                            <a class="dropdown-item" href="{{ route('centres.edit', $centre) }}">
                                                <i class="bx bx-edit me-1"></i>
                                                Modifier les informations
                                            </a>
                                            <form action="{{ route('centres.update', $centre) }}" method="POST">
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
                <span>{!! $centres->links() !!}</span>
            </div>
        </div>
    </div>
@endsection
