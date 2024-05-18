@extends('layouts.admin')

@section('nav-title', 'LES FAMILLES DANS NOTRE COMMUNAUTE')

@section('content')

    {{-- DETAILS HABITANT ENREGISTREE --}}
    {{--  @foreach ($familles /*->sortByDesc('created_at') */ as $famille)
        <x-details-famille :famille="$famille" />
    @endforeach --}}

    {{-- LISTE DES HABITANTS RETIRES --}}
    <div class="modal applyLoanModal fade" id="ModalListeUnreg" tabindex="-1" aria-labelledby="authModal"aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalScrollableTitle" style='font-weight: 900;'>
                        Suggestion de famille non enregistré
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (count($famillesUnreg) > 0)
                        <ul class="p-0 m-0">
                            @foreach ($famillesUnreg->sortByDesc('created_at') as $famille)
                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-danger"><i
                                                class="fa fa-users"></i></span>
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <h6 class="mb-0">
                                                Famille:
                                                <b>{{ $famille->nom_famille }}</b>
                                            </h6>
                                            <small class="text-muted mb-0">suggéré le:
                                                @if ($famille->status === 0)
                                                    {{ $famille->created_at->format('d/m/Y à H:i') }}
                                                @endif
                                            </small>
                                        </div>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('familles.edit', [$famille]) }}">
                                                    <i class="fa fa-save me-1"></i>
                                                    Enregistrer
                                                </a>
                                                <form action="{{ route('familles.update', [$famille]) }}" method="POST">
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

    {{-- STATISTICS CARDS --}}
    <div class="row">
        <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <h5 class="text-nowrap mb-2 font-w700">
                            Familles enregistés
                        </h5>
                    </div>
                    <h3 class="card-title mb-2" style="font-weight: bold;">{{ count($familles) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <h5 class="text-nowrap mb-2">
                            familles non enregistré
                        </h5>
                    </div>
                    <h3 class="card-title mb-2" style="font-weight: bold;">{{ count($famillesUnreg) }}</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- TABLE DES FAMILLES RESIDENTES --}}
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title">TABLE DES FAMILLES RESIDENTES</h5>
            <div class="dropdown">
                <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID" style="">
                    <a class="dropdown-item" href="{{ route('familles.create') }}">Nouvelle famille</a>
                    <a class="dropdown-item" href="javascript:void(0);" type="button" data-bs-toggle="modal"
                        data-bs-target="#ModalListeUnreg">Familles non enregistré</a>
                </div>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="font-weight: bold;">Famille</th>
                    <th style="font-weight: bold;">Téléphone</th>
                    <th style="font-weight: bold;">Email</th>
                    <th style="font-weight: bold;">Résidence</th>
                    <th style="font-weight: bold;">Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($familles /*->sortByDesc('created_at') */ as $famille)
                    <tr>
                        <td>{{ $famille->nom_famille ?? 'ND' }}</td>
                        <td>{{ $famille->telephone_famille ?? 'ND' }}</td>
                        <td>{{ $famille->email_famille ?? 'ND' }}</td>
                        <td>{{ $famille->lieu_habitation ?? 'ND' }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">

                                    <a class="dropdown-item" href="{{ route('familles.show', $famille) }}">
                                        <i class="bx bx-show me-1"></i>
                                        Voir details
                                    </a>
                                    <a class="dropdown-item" href="{{ route('familles.edit', $famille) }}"> <i
                                            class="fa fa-edit me-1"></i>
                                        Modifier les informations
                                    </a>

                                    @if ($famille->status_indiv !== 1)
                                        <form action="{{ route('familles.update', [$famille]) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <input type="hidden" name="status_indiv" value="2">
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
            <span>{!! $familles->links() !!}</span>
        </div>
    </div>
@endsection
