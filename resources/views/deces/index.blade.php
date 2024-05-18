@extends('layouts.admin')

@section('nav-title', 'DECES DANS LA COMMUNAUTE')

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
    @foreach ($decedes->sortByDesc('created_at') as $decede)
        <x-details-deces :deces="$decede" />
    @endforeach

    <div class="modal applyLoanModal fade" id="ModalListeRefuse" tabindex="-1" aria-labelledby="authModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalScrollableTitle" style='font-weight: 900;'>Demande de décès réfusée
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (count($allRefuse) > 0)
                        <ul class="p-0 m-0">
                            @foreach ($allRefuse as $decede)
                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-danger"><i
                                                class="fa fa-cross"></i></span>
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <h6 class="mb-0"><b>décès de</b>&nbsp;&nbsp;{{ $decede->nom_complet }}</h6>
                                            <small class="text-muted">Envoyé par
                                                @if ($decede->individus_sended_id === null)
                                                    Administrateur(vous)
                                                @else
                                                    {{ $decede->IndividusSendDeces->nom_individu }}&nbsp;{{ $decede->IndividusSendDeces->prenom_individu }}
                                                @endif
                                            </small>
                                        </div>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('deces.show', $decede) }}">
                                                    <i class="bx bx-show me-1"></i>
                                                    Voir details
                                                </a>
                                                @if ($decede->status === 0 || $decede->status === 2)
                                                    <form action="{{ route('deces.update', [$decede]) }}" method="POST">
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
                                                @if ($decede->status === 0 || $decede->status === 1 || $decede->status === 2)
                                                    <form action="{{ route('deces.update', [$decede]) }}" method="POST">
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

    <div class="modal applyLoanModal fade" id="ModalListeSupprime" tabindex="-1"
        aria-labelledby="authModal"aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalScrollableTitle" style='font-weight: 900;'>Demande de décès supprimée
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (count($allSupprime) > 0)
                        <ul class="p-0 m-0">
                            @foreach ($allSupprime as $decede)
                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-danger"><i
                                                class="fa fa-cross"></i></span>
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <h6 class="mb-0"><b>décès de</b>&nbsp;&nbsp;{{ $decede->nom_complet }}</h6>
                                            <small class="text-muted">Envoyé par
                                                @if ($decede->individus_sended_id === null)
                                                    Administrateur(vous)
                                                @else
                                                    {{ $decede->IndividusSendDeces->nom_individu }}&nbsp;{{ $decede->IndividusSendDeces->prenom_individu }}
                                                @endif
                                            </small>
                                        </div>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <form action="{{ route('deces.update', [$decede]) }}" method="POST">
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

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title">TABLE DES DECES</h5>
            <div class="dropdown">
                <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID" style="">
                    <a class="dropdown-item" href="{{ route('deces.create') }}">Nouveau déces</a>
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
                    <th style="font-weight: bold;">Décès de</th>
                    <th style="font-weight: bold;">Parent référent</th>
                    <th style="font-weight: bold;">Date de décès</th>
                    <th style="font-weight: bold;">Status</th>
                    <th style="font-weight: bold;">Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @if ($decedes)
                    @foreach ($decedes as $decede)
                        <tr>
                            <td>{{ $decede->nom_complet }}</td>
                            <td>{{ $decede->parents_referent }}</td>
                            <td>{{ $decede->date_deces }}</td>
                            <td>
                                @if ($decede->status === 0)
                                    <span class="badge bg-label-danger me-1">
                                        Non enregistrée
                                    </span>
                                @else
                                    <span style="background: #fff;box-shadow: none;padding:0">
                                        <span class="badge badge-success">
                                            Enregistrée
                                            <i class="ms-1 fa fa-check-double"></i>
                                        </span>
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
                                        {{-- <a class="dropdown-item" href="{{ route('deces.show', $decede) }}"> --}}
                                        <a class="dropdown-item" type="button" data-bs-toggle="modal"
                                            data-bs-target="#details_deces_{{ $decede->id }}">
                                            <i class="bx bx-show me-1"></i>
                                            Voir details
                                        </a>

                                        @if ($decede->status === 0 || $decede->status === 2)
                                            <form action="{{ route('deces.update', [$decede]) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="1">
                                                <button type="submit" class="dropdown-item"
                                                    onclick="return confirm('Validez-vous l\'enregistrement ?');">
                                                    <i class="fa fa-save me-1"></i>
                                                    Enregistrer
                                                </button>
                                            </form>
                                        @endif

                                        @if ($decede->status === 0 /* || $decede->status === 1 */)
                                            <form action="{{ route('deces.update', [$decede]) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="2">
                                                <button type="submit" class="dropdown-item"
                                                    onclick="return confirm('Confirmez votre choix ?');">
                                                    <i class="fa fa-minus-circle me-1"></i>
                                                    Réfuser la demande
                                                </button>
                                            </form>
                                        @endif

                                        @if ($decede->status === 0 || $decede->status === 1 || $decede->status === 2)
                                            <form action="{{ route('deces.update', [$decede]) }}" method="POST">
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
                @endif
            </tbody>
        </table>

        <div class="mt-3 border-danger d-flex justify-content-center">
            <span>{!! $decedes->links() !!}</span>
        </div>
    </div>

@endsection
