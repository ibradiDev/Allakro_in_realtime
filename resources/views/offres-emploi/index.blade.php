@extends('layouts.admin')


@section('nav-title', 'OFFRES D\'EMPLOI PUBLIES DANS LA COMMUNAUTE')


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

    {{-- DETAILS OFFRE PUBLIEES --}}
    @foreach ($offres->sortByDesc('created_at') as $offre)
        <x-details-offre-emploi :offre="$offre" />
    @endforeach

    {{-- DEMANDES DE PUBLICATION REFUSEES --}}
    <div class="modal applyLoanModal fade" id="ModalListeRefuse" tabindex="-1" aria-labelledby="authModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalScrollableTitle" style='font-weight: 900;'>Liste d'offre emploi réfusée
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (count($allRefuse) > 0)
                        <ul class="p-0 m-0">
                            @foreach ($allRefuse as $offre)
                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-danger"><i
                                                class="fa fa-briefcase"></i></span>
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <h6 class="mb-0"><b>Offre de</b>&nbsp;&nbsp;{{ $offre->nom_respo }}</h6>
                                            <small class="text-muted">Envoyé par
                                                @if ($offre->individus_sended_id === null)
                                                    Administrateur(vous)
                                                @else
                                                    {{ $offre->IndividusOffreEmploi->nom_individu }}&nbsp;{{ $offre->IndividusOffreEmploi->prenom_individu }}
                                                @endif
                                            </small>
                                        </div>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                @if ($offre->status === 0 || $offre->status === 2)
                                                    <form action="{{ route('offre-emploi.update', [$offre]) }}"
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
                                                @if ($offre->status === 0 || $offre->status === 1 || $offre->status === 2)
                                                    <form action="{{ route('offre-emploi.update', [$offre]) }}"
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

    {{-- DEMANDES DE PUBLICATION SUPPRIMEES --}}
    <div class="modal applyLoanModal fade" id="ModalListeSupprime" tabindex="-1"
        aria-labelledby="authModal"aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalScrollableTitle" style='font-weight: 900;'>Liste d'offre emploi
                        supprimée</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (count($allSupprime) > 0)
                        <ul class="p-0 m-0">
                            @foreach ($allSupprime as $offre)
                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-danger"><i
                                                class="fa fa-briefcase"></i></span>
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <h6 class="mb-0"><b>Offre de</b>&nbsp;&nbsp;{{ $offre->nom_respo }}</h6>
                                            <small class="text-muted">Envoyé par
                                                @if ($offre->individus_sended_id === null)
                                                    Administrateur(vous)
                                                @else
                                                    {{ $offre->IndividusOffreEmploi->nom_individu }}&nbsp;{{ $offre->IndividusOffreEmploi->prenom_individu }}
                                                @endif
                                            </small>
                                        </div>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">

                                                <form action="{{ route('offre-emploi.update', [$offre]) }}"
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

    {{-- TABLES DES OFFRES PUBLIEES --}}
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title">TABLE DES PROPOSITIONS D'OFFRES EMPLOI</h5>
            <div class="dropdown">
                <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID" style="">
                    <a class="dropdown-item" href="{{ route('offre-emploi.create') }}">Nouvelle offre</a>
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
                    <th style="font-weight: bold;">Service proposé</th>
                    <th style="font-weight: bold;">Responsable</th>
                    <th style="font-weight: bold;">Email</th>
                    <th style="font-weight: bold;">Status</th>
                    <th style="font-weight: bold;">Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($offres as $offre)
                    <tr>
                        <td>
                            <div class="d-flex" style="align-items: center;">
                                <div class="avatar mx-2">
                                    <img src="{{ asset('image/' . $offre->image) }}" alt=""
                                        style="width: 100% !important;height: 100% !important;"
                                        class="w-px-40 h-auto rounded-circle">
                                </div>
                                <div class="">
                                    {{ $offre->service_propose }}
                                </div>

                            </div>

                        </td>
                        <td>{{ $offre->nom_respo }}</td>
                        <td>{{ $offre->email_respo }}</td>
                        <td>
                            @if ($offre->status === 0)
                                <span class="badge bg-label-danger me-1">
                                    Non publié
                                </span>
                            @else
                                <span style="background: #fff;box-shadow: none;padding:0">
                                    <span class="badge badge-success">
                                        Publié
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
                                    <a class="dropdown-item" type="button" data-bs-toggle="modal"
                                        data-bs-target="#details_offre_{{ $offre->id }}">
                                        <i class="bx bx-show me-1"></i>
                                        Voir details
                                    </a>

                                    @if ($offre->status === 0 || $offre->status === 2)
                                        <form action="{{ route('offre-emploi.update', [$offre]) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <input type="hidden" name="status" value="1">
                                            <button type="submit" class="dropdown-item"
                                                onclick="return confirm('Validez-vous l\'enregistrement ?');">
                                                <i class="fa fa-save me-1"></i>
                                                Publier
                                            </button>
                                        </form>
                                    @endif

                                    @if ($offre->status === 0 || $offre->status === 1)
                                        <form action="{{ route('offre-emploi.update', [$offre]) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <input type="hidden" name="status" value="2">
                                            <button type="submit" class="dropdown-item"
                                                onclick="return confirm('Validez-vous l\'enregistrement ?');">
                                                Réfusé la demande
                                            </button>
                                        </form>
                                    @endif

                                    @if ($offre->status === 0 || $offre->status === 1 || $offre->status === 2)
                                        <form action="{{ route('offre-emploi.update', [$offre]) }}" method="POST">
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
            <span>{!! $offres->links() !!}</span>
        </div>
    </div>

@endsection

@section('autres-scripts')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
