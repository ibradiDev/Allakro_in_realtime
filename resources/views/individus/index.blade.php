@extends('layouts.admin')

@section('nav-title', 'HABITANTS DE NOTRE COMMUNAUTE')

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


    {{-- LISTE DES HABITANTS RETIRES --}}
    <div class="modal applyLoanModal fade" id="ModalListeUnreg" tabindex="-1"
        aria-labelledby="authModal"aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalScrollableTitle" style='font-weight: 900;'>
                        Suggestion d'individu
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (count($allUnreg) > 0)
                        <ul class="p-0 m-0">
                            @foreach ($allUnreg->sortByDesc('created_at') as $individu)
                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-danger"><i
                                                class="fa fa-user"></i></span>
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <h6 class="mb-0">
                                                Individu :
                                                <b>{{ $individu->nom_individu . ' ' . $individu->prenom_individu }}</b>
                                            </h6>
                                            <small class="text-muted mb-0">Famille suggérée:
                                                @if ($individu->famille_id === null)
                                                    <b>---.</b>
                                                @else
                                                    {{ $individu->FamilleIndividu->nom_famille }} (
                                                    @if ($individu->FamilleIndividu->status === 1)
                                                        <a class="href" href=""><b>Voir</b></a>
                                                    @else
                                                        Non enregistrée
                                                    @endif
                                                    )
                                                @endif
                                            </small>
                                        </div>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">

                                                <a class="dropdown-item" href="{{ route('individus.edit', [$individu]) }}">
                                                    <i class="fa fa-save me-1"></i>
                                                    Enregistrer
                                                </a>
                                                <form action="{{ route('individus.update', [$individu]) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="2">
                                                    <button type="submit" class="dropdown-item text-danger"
                                                        onclick="return confirm('Validez-vous l\'enregistrement ?');">
                                                        <i class="fa fa-trash me-1"></i>
                                                        Supprimer
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


    {{-- DETAILS INDIVIDU ENREGISTRE --}}
    @foreach ($individus->sortByDesc('created_at') as $individu)
        <x-details-individu :individu="$individu" />
    @endforeach


    {{-- STATISTICS CARDS --}}
    <div class="row">
        <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <h5 class="text-nowrap mb-2 font-w700">
                            Individus enregistés
                        </h5>
                    </div>
                    <h3 class="card-title mb-2" style="font-weight: bold;">{{ count($individus) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <h5 class="text-nowrap mb-2">
                            Individu non enregistré
                        </h5>
                    </div>
                    <h3 class="card-title mb-2" style="font-weight: bold;">{{ count($allUnreg) }}</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- TABLE DES HABITANTS --}}
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title">TABLE DES INDIVIDUS</h5>
            <div class="dropdown">
                <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID" style="">
                    <a class="dropdown-item" href="{{ route('individus.create') }}">Nouvel individu</a>
                    <a class="dropdown-item" href="javascript:void(0);" type="button" data-bs-toggle="modal"
                        data-bs-target="#ModalListeUnreg">Habitants non enregistré</a>
                </div>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="font-weight: bold;">Nom</th>
                    <th style="font-weight: bold;">Prenom</th>
                    <th style="font-weight: bold;">sexe</th>
                    <th style="font-weight: bold;">Telephone</th>
                    <th style="font-weight: bold;">S. matrimoniale</th>
                    <th style="font-weight: bold;">Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($individus as $individu)
                    <tr>
                        <td>{{ $individu->nom_individu }}</td>
                        <td>{{ $individu->prenom_individu }}</td>
                        <td>{{ $individu->sexe_individu }}</td>
                        <td>{{ $individu->telephone }}</td>
                        <td>{{ $individu->situation_matrimoniale }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('individus.show', $individu) }}">

                                        {{-- <a class="dropdown-item" type="button" data-bs-toggle="modal"
                                            data-bs-target="#details_individu_{{ $individu->id }}">
                                             --}}<i class="bx bx-show me-1"></i>
                                        Voir details
                                        </>
                                        <a class="dropdown-item" href="{{ route('individus.edit', $individu) }}"> <i
                                                class="fa fa-edit me-1"></i>
                                            Modifier les informations
                                        </a>

                                        <form action="{{ route('individus.update', [$individu]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status_indiv" value="0">
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
            </tbody>
        </table>

        <div class="mt-3 border-danger d-flex justify-content-center">
            <span>{!! $individus->links() !!}</span>
        </div>
    </div>
@endsection
