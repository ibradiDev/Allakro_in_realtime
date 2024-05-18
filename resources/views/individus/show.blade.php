@extends('layouts.admin')

@section('nav-title', 'INFORMATIONS SUR UN INDIVIDU')

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

    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title" style="font-weight: 900;font-size: 20px;">Plus d'information sur l'individu </h5>
        <div class="dropdown">
            <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <i class="bx bx-dots-vertical-rounded"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID" style="">
                <a class="dropdown-item" href="{{ route('individus.create') }}">
                    <i class="fa fa-new"></i>
                    Nouvel individu
                </a>
                @if ($individu->status_indiv === 0)
                    <a class="dropdown-item" href="{{ route('individus.edit', [$individu]) }}" type="button">Enregistrer
                    </a>
                @endif
                @if ($individu->status_indiv === 1)
                    <a class="dropdown-item" href="{{ route('individus.edit', $individu) }}" type="button">
                        <i class="bx bx-edit"></i>
                        Modifier les informations
                    </a>
                    <form action="{{ route('individus.update', [$individu]) }}" method="POST">
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
    </div>
    @if ($individu->status_indiv === 0)
        <div class="alert alert-warning mx-4 alert-dismissible" role="alert" style="font-weight: bold;">
            Cet individu n'est pas encore enregistré dans la communauté de Allakro. Certaines actions ne peuvent pas être
            autorisées. Veuillez enregistrer cette famille
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($individu->status_indiv === 2)
        <div class="alert alert-warning mx-4 alert-dismissible" role="alert" style="font-weight: bold;">
            Cet famille a été supprimé et n'est n'appartient plus à la communauté de Allakro. Certaines actions ne peuvent
            pas être autorisé.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container card">
        <h5 class="card-title pt-4">
            A propos de l'individu
            @if ($individu->status_indiv === 1)
                <span class="badge bg-label-success">Enregistré </span>
            @elseif($individu->status_indiv === 0)
                <span class="badge bg-label-warning">Pas encore enregistré</span>
            @else
                <span class="badge bg-label-danger">Supprimé</span>
            @endif
        </h5>
        <div class="card-body">
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">Nom complet</label>
                    <input class="form-control" value="{{ $individu->nom_individu }}&nbsp;{{ $individu->prenom_individu }}"
                        readonly="" style="font-weight: 900;color: var(--bs-dark);">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">Sexe</label>
                    <input class="form-control" value="{{ $individu->sexe_individu }}" readonly=""
                        style="font-weight: 900;color: var(--bs-dark);">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">Profession</label>
                    <input class="form-control" value="{{ $individu->profession_individu }}" readonly=""
                        style="font-weight: 900;color: var(--bs-dark);">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">Date de naissance</label>
                    <input class="form-control" value="{{ $individu->date_naissance }}" readonly=""
                        style="font-weight: 900;color: var(--bs-dark);">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">Numéro de téléphone</label>
                    <input class="form-control" value="{{ $individu->telephone }}" readonly=""
                        style="font-weight: 900;color: var(--bs-dark);">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">Situation matrimoniale</label>
                    <input class="form-control" value="{{ $individu->situation_matrimoniale }}" readonly=""
                        style="font-weight: 900;color: var(--bs-dark);">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">Ajouté le</label>
                    <input class="form-control" value="{{ $individu->created_at->format('d-m-Y, H:i') }}" readonly=""
                        style="font-weight: 900;color: var(--bs-dark);">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">famille suggérée</label>
                    <input class="form-control"
                        value="{{ $individu->FamilleIndividus->nom_famille ?? $individu->nom_individu }}" readonly=""
                        style="font-weight: 900;color: var(--bs-dark);">

                </div>
            </div>
        </div>
    </div>
    <div class="container card mt-4">
        <h5 class="card-title pt-4">Activités enregistrées </h5>
        <div class="card-body">
            <div class="col-lg-12 mb-4 mb-xl-0">
                <div class="mt-3">
                    <div class="row">
                        <div class="col-md-4 col-12 mb-3 mb-md-0">
                            <div class="list-group">
                                <a class="list-group-item list-group-item-action active" id="list-home-list"
                                    data-bs-toggle="list" href="#list-home">Naissances <span
                                        class="badge bg-success">{{ count($individuNaissance) }}</span></a>
                                <a class="list-group-item list-group-item-action" id="list-profile-list"
                                    data-bs-toggle="list" href="#list-profile">Décès <span
                                        class="badge bg-success">{{ count($individuDeces) }}</span></a>
                                <a class="list-group-item list-group-item-action" id="list-messages-list"
                                    data-bs-toggle="list" href="#list-messages">Aménagements <span
                                        class="badge bg-success">{{ count($individuAmenagement) }}</span></a>
                                <a class="list-group-item list-group-item-action" id="list-settings-list"
                                    data-bs-toggle="list" href="#list-settings">Déménagements <span
                                        class="badge bg-success">{{ count($individuDemenagement) }}</span></a>
                            </div>
                        </div>
                        <div class="col-md-8 col-12">
                            <div class="tab-content p-0">
                                <div class="tab-pane fade active show" id="list-home">
                                    <div class="list-group list-group-flush">
                                        @foreach ($individuNaissance as $naissance)
                                            <a class="list-group-item list-group-item-action"
                                                style="font-weight:650;">{{ $naissance->nom_complet }}, <small>Enregistré
                                                    le {{ $naissance->created_at->format('d-m-Y à H:i') }}</small></a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list-profile">
                                    <div class="list-group list-group-flush">
                                        @foreach ($individuDeces as $deces)
                                            <a class="list-group-item list-group-item-action"
                                                style="font-weight:650;">{{ $deces->nom_complet }}, <small>Enregistré le
                                                    {{ $deces->created_at->format('d-m-Y à H:i') }}</small></a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list-messages">
                                    <div class="list-group list-group-flush">
                                        @foreach ($individuAmenagement as $amenagement)
                                            <a class="list-group-item list-group-item-action"
                                                style="font-weight:650;">{{ $amenagement->nom_complet_amg }},
                                                <small>Enregistré le
                                                    {{ $amenagement->created_at->format('d-m-Y à H:i') }}</small></a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list-settings">
                                    <div class="list-group list-group-flush">
                                        @foreach ($individuDemenagement as $demenagement)
                                            <a class="list-group-item list-group-item-action"
                                                style="font-weight:650;">{{ $demenagement->nom_complet_dmg }},
                                                <small>Enregistré le
                                                    {{ $demenagement->created_at->format('d-m-Y à H:i') }}</small></a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
