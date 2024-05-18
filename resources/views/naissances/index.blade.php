@extends('layouts.admin')

@section('nav-title', 'NAISSANCES DANS LA COMMUNAUTE')

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
    <!-- Modal -->

    {{-- DETAILS NAISSANCE ENREGISTREE --}}
    @foreach ($naissances->sortByDesc('created_at') as $nouveau_ne)
        <x-details-nouveau-ne :naissance="$nouveau_ne" />
    @endforeach

    {{-- LISTE DES REFUS --}}
    <div class="modal applyLoanModal fade" id="ModalListeRefuse" tabindex="-1" aria-labelledby="ModalListeRefuse"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalScrollableTitle" style='font-weight: 900;'>
                        Demande de naissance réfusée
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (count($allRefuse) > 0)
                        <ul class="p-0 m-0">
                            @foreach ($allRefuse->sortByDesc('created_at') as $nouveau_ne_refuse)
                                {{-- DETAILS NAISSANCE REFUSEES --}}
                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-danger"><i
                                                class="fa fa-baby"></i></span>
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <h6 class="mb-0"><b>Né</b>&nbsp;&nbsp;{{ $nouveau_ne_refuse->nom_complet }}
                                            </h6>
                                            <small class="text-muted">Envoyé par
                                                @if ($nouveau_ne_refuse->individus_sended_id === null)
                                                    {{ Auth::user()->name }} (Administrateur)
                                                @else
                                                    {{ $nouveau_ne_refuse->IndividusSendNaissance->nom_individu }}&nbsp;{{ $nouveau_ne_refuse->IndividusSendNaissance->prenom_individu }}
                                                @endif
                                            </small>
                                        </div>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                {{-- <a class="dropdown-item" href="{{ route('naissance.show', $nouveau_ne) }}"> --}}
                                                <a class="dropdown-item" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#details_naissance_{{ $nouveau_ne_refuse->id }}">
                                                    <i class="bx bx-show me-1"></i>
                                                    Voir details
                                                </a>
                                                @if ($nouveau_ne_refuse->status === 0 || $nouveau_ne_refuse->status === 2)
                                                    <form action="{{ route('naissance.update', [$nouveau_ne_refuse]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="status" value="1">
                                                        <button type="submit" class="dropdown-item"
                                                            onclick="return confirm('Validez-vous l\'enregistrement ?');">
                                                            <i class="fa fa-save me-1"></i>
                                                            Accepter
                                                        </button>
                                                    </form>
                                                @endif
                                                @if ($nouveau_ne_refuse->status === 0 || $nouveau_ne_refuse->status === 1 || $nouveau_ne_refuse->status === 2)
                                                    <form action="{{ route('naissance.update', [$nouveau_ne_refuse]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="status" value="3">
                                                        <button type="submit" class="dropdown-item text-danger"
                                                            onclick="return confirm('Validez-vous la suppression ?');">
                                                            <i class="fa fa-trash me-1"></i>
                                                            Supprimer
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="alert alert-warning" role="alert">Aucune démande réfusée pour le moment !</div>
                    @endif

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Retour
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- LISTE DES SUPPRIMES --}}
    <div class="modal applyLoanModal fade" id="ModalListeSupprime" tabindex="-1"
        aria-labelledby="authModal"aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalScrollableTitle" style='font-weight: 900;'>
                        Demande de naissance supprimée
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (count($allSupprime) > 0)
                        <ul class="p-0 m-0">
                            @foreach ($allSupprime->sortByDesc('created_at') as $nouveau_ne_sup)
                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-danger"><i
                                                class="fa fa-baby"></i></span>
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <h6 class="mb-0">
                                                Informations de naissance de:
                                                <b>{{ $nouveau_ne_sup->nom_complet }}</b>
                                            </h6>
                                            <small class="text-muted mb-0">Posté par:
                                                @if ($nouveau_ne_sup->individus_sended_id === null)
                                                    {{ Auth::user()->name }} (Administrateur)
                                                @else
                                                    {{ $nouveau_ne_sup->IndividusSendNaissance->nom_individu }}&nbsp;{{ $nouveau_ne_sup->IndividusSendNaissance->prenom_individu }}
                                                @endif
                                            </small><br />
                                            <small class="text-muted">
                                                Supprimée le:
                                                {{ $nouveau_ne_sup->updated_at }}
                                            </small>
                                        </div>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <form action="{{ route('naissance.update', [$nouveau_ne_sup]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="0">
                                                    <button type="submit" class="dropdown-item"
                                                        onclick="return confirm('Validez-vous l\'enregistrement ?');">
                                                        <i class="fa fa-save me-1"></i>
                                                        Restorer
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="alert alert-warning" role="alert">Aucune démande réfusée pour le moment !</div>
                    @endif

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Retour
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--Modal-->

    {{-- STATISTICS CARDS --}}
    <div class="row">
        <div class="col-lg-3 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <h5 class="text-nowrap mb-2 font-w700">
                            Demandes acceptées
                        </h5>
                    </div>
                    <h3 class="card-title mb-2" style="font-weight: bold;">{{ count($allAccepte) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <h5 class="text-nowrap mb-2">
                            Demandes réfusées
                        </h5>
                    </div>
                    <h3 class="card-title mb-2" style="font-weight: bold;"> {{ count($allRefuse) }} </h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <h5 class="text-nowrap mb-2">
                            Demandes supprimées
                        </h5>
                    </div>
                    <h3 class="card-title mb-2" style="font-weight: bold;">{{ count($allSupprime) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <h5 class="text-nowrap mb-2">
                            Demandes en attente
                        </h5>
                    </div>
                    <h3 class="card-title mb-2" style="font-weight: bold;"> {{ count($allAttente) }} </h3>
                </div>
            </div>
        </div>
    </div>

    {{-- TABLE DES NAISSANCES --}}
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title">TABLE DES NAISSANCES</h5>
            <div class="dropdown">
                <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID" style="">
                    <a class="dropdown-item" href="{{ route('naissance.create') }}">Nouvelle Naissance</a>
                    <a class="dropdown-item" href="javascript:void(0);" type="button" data-bs-toggle="modal"
                        data-bs-target="#ModalListeRefuse">Liste demandes réfusées</a>
                    <a class="dropdown-item" href="javascript:void(0);" type="button" data-bs-toggle="modal"
                        data-bs-target="#ModalListeSupprime">Liste demandes supprimées</a>
                </div>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="font-weight: bold;">Naissance de</th>
                    <th style="font-weight: bold;">Mère</th>
                    <th style="font-weight: bold;">Date de naissance</th>
                    <th style="font-weight: bold;">Status</th>
                    <th style="font-weight: bold;">Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($naissances->sortByDesc('created_at') as $nouveau_ne)
                    <tr>
                        <td>{{ $nouveau_ne->nom_complet }}</td>
                        <td>{{ $nouveau_ne->mere_nouveau_ne }}</td>
                        <td>{{ $nouveau_ne->date_de_naissance }}</td>
                        <td>
                            @if ($nouveau_ne->status === 0)
                                <span class="badge bg-label-danger me-1">
                                    Non enregistrée
                                </span>
                            @elseif($nouveau_ne->status === 1)
                                <span style="background: #fff;box-shadow: none;padding:0">
                                    <span class="badge badge-success">
                                        Enregistrée
                                        <i class="ms-1 fa fa-check-double"></i>
                                    </span>
                                    {{-- <i class="d-block"><small>le 11/07/2023</small></i> --}}
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
                                    {{-- <a class="dropdown-item" href="{{ route('naissance.show', $nouveau_ne) }}"> --}}
                                    <a class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#details_naissance_{{ $nouveau_ne->id }}" type="button"> <i
                                            class="bx bx-show me-1"></i>
                                        Voir details
                                    </a>
                                    @if ($nouveau_ne->status === 0 || $nouveau_ne->status === 2)
                                        <form action="{{ route('naissance.update', [$nouveau_ne]) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <input type="hidden" name="status" value="1">
                                            <button type="submit" class="dropdown-item"
                                                onclick="return confirm('Validez-vous l\'enregistrement ?');">
                                                <i class="fa fa-save me-1"></i>
                                                Accepter
                                            </button>
                                        </form>
                                    @endif

                                    @if ($nouveau_ne->status === 0 /*  || $nouveau_ne->status === 1 */)
                                        <form action="{{ route('naissance.update', [$nouveau_ne]) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <input type="hidden" name="status" value="2">
                                            <button type="submit" class="dropdown-item"
                                                onclick="return confirm('Validez-vous l\'enregistrement ?');">
                                                <i class="fa fa-minus-circle me-1"></i>
                                                Réfuser la demande
                                            </button>
                                        </form>
                                    @endif

                                    @if ($nouveau_ne->status === 0 || $nouveau_ne->status === 1 || $nouveau_ne->status === 2)
                                        <form action="{{ route('naissance.update', [$nouveau_ne]) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <input type="hidden" name="status" value="3">
                                            <button type="submit" class="dropdown-item text-danger"
                                                onclick="return confirm('Validez-vous la suppression ?');">
                                                <i class="fa fa-trash me-1"></i>
                                                Supprimer
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <div class="mt-3 border-danger d-flex justify-content-center">
            <span>{!! $naissances->links() !!}</span>
        </div>
    </div>
@endsection
