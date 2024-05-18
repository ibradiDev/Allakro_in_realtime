@extends('layouts.admin')

@section('nav-title', 'INFORMATIONS D\'UNE FAMILLE')

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
        <h5 class="card-title" style="font-weight: 900;font-size: 20px;">Détails de la famille <b style="color: blue">
                {{ $famille->nom_famille }} </b>
        </h5>
        <div class="dropdown">
            <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <i class="bx bx-dots-vertical-rounded"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID" style="">
                <a class="dropdown-item" href="{{ route('familles.create') }}">Nouvelle famille</a>
                @if ($famille->status === 0)
                    <a class="dropdown-item" href="{{ route('familles.edit', [$famille]) }}" type="button">Enregistrer la
                        famille</a>
                @endif

                @if ($famille->status === 1)
                    <a class="dropdown-item" href="{{ route('familles.edit', $famille) }}" type="button">Modifier les
                        informations</a>
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
    </div>

    @if ($famille->status === 0)
        <div class="alert alert-warning mx-4 alert-dismissible" role="alert" style="font-weight: bold;">
            Cette famille n'est pas encore enregistrée dans la communauté de Allakro. Certaines actions ne peuvent pas être
            autorisé. Veuillez enregistrer cette famille
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($famille->status === 2)
        <div class="alert alert-warning mx-4 alert-dismissible" role="alert" style="font-weight: bold;">
            Cette famille a été supprimée et n'appartient plus à la communauté de Allakro. Certaines actions ne peuvent pas
            être autorisé.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container card">
        <h5 class="card-title pt-4">Coordonnées de la famille </h5>
        <div class="card-body">
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">Nom de famille</label>
                    <input class="form-control" value="{{ $famille->nom_famille }}" readonly>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">E-mail</label>
                    <input class="form-control" value="{{ $famille->email_famille ?? 'ND' }}" readonly>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">Téléphone principal</label>
                    <input class="form-control" value="{{ $famille->telephone_famille ?? 'ND' }}" readonly>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">Lieu de résidence</label>
                    <input class="form-control" value="{{ $famille->lieu_habitation ?? 'ND' }}" readonly>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">Ajouté le</label>
                    <input class="form-control" value="{{ $famille->created_at->format('d-m-Y, H:i') }}" readonly>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">Status</label>
                    <div class="d-block">
                        @if ($famille->status === 1)
                            <span class="badge bg-label-success">Enregistrée </span>
                        @elseif($famille->status === 0)
                            <span class="badge bg-label-warning">Pas encore enregistrée</span>
                        @else
                            <span class="badge bg-label-danger">Supprimée</span>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container card mt-4">
        <h5 class="card-title pt-4">Activités enregistrées </h5>
        <div class="card-body">
            <div class="d-flex mb-5">
                <div class="flex-shrink-0" style="margin-right: 14px;font-size: 27px;">
                    <i class="fa fa-baby"></i>
                </div>
                <div class="flex-grow-1 row">
                    <div class="col-9 mb-sm-0 mb-2">
                        <h6 class="mb-0">Naissances</h6>
                        <small class="text-muted">Naissances enregistrées à Allakro</small>
                    </div>
                    <div class="col-3 text-end">
                        <b>{{ count($getNaissance) }}</b>
                    </div>
                    @if (count($getNaissance) > 0)
                        <div class="card accordion-item mt-3">
                            <h2 class="accordion-header" id="headingOne">
                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#Naissances" aria-expanded="false" aria-controls="Naissances">
                                    Voir la liste
                                </button>
                            </h2>

                            <div id="Naissances" class="accordion-collapse collapse" data-bs-parent="#accordionExample"
                                style="">
                                <div class="accordion-body">
                                    <div class="demo-inline-spacing mt-3">
                                        <ol class="list-group list-group-numbered">
                                            @foreach ($getNaissance as $val)
                                                <li class="list-group-item"> <b>{{ $val->nom_complet }}
                                                        <small>, Ajouté dépuis le
                                                            {{ $val->created_at->format('d/m/Y à H:i') }}
                                                        </small></b>
                                                </li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
            <div class="d-flex mb-5">
                <div class="flex-shrink-0" style="margin-right: 14px;font-size: 27px;">
                    <i class="fa fa-cross"></i>
                </div>
                <div class="flex-grow-1 row">
                    <div class="col-9 mb-sm-0 mb-2">
                        <h6 class="mb-0">Décès</h6>
                        <small class="text-muted">Décès enregistrés dans famille</small>
                    </div>
                    <div class="col-3 text-end">
                        <b>{{ count($getDeces) }}</b>
                    </div>
                    @if (count($getDeces) > 0)
                        <div class="card accordion-item mt-3">
                            <h2 class="accordion-header" id="headingOne">
                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#Deces" aria-expanded="false" aria-controls="Deces">
                                    Voir la liste
                                </button>
                            </h2>

                            <div id="Deces" class="accordion-collapse collapse" data-bs-parent="#accordionExample"
                                style="">
                                <div class="accordion-body">
                                    <div class="demo-inline-spacing mt-3">
                                        <ol class="list-group list-group-numbered">
                                            @foreach ($getDeces as $val)
                                                <li class="list-group-item"> <b>{{ $val->nom_complet }}, Ajouté dépuis le
                                                        {{ $val->created_at->format('d/m/Y à H:i') }}</b> </li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="d-flex mb-5">
                <div class="flex-shrink-0" style="margin-right: 14px;font-size: 27px;">
                    <i class="fa fa-car"></i>
                </div>
                <div class="flex-grow-1 row">
                    <div class="col-9 mb-sm-0 mb-2">
                        <h6 class="mb-0">Aménagements</h6>
                        <small class="text-muted">Aménagements enregistrés dans famille</small>
                    </div>
                    <div class="col-3 text-end">
                        <b>{{ count($getamenagemennt) }}</b>
                    </div>
                    @if (count($getamenagemennt) > 0)
                        <div class="card accordion-item mt-3">
                            <h2 class="accordion-header" id="headingOne">
                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#Amenagements" aria-expanded="false" aria-controls="Aménagements">
                                    Voir la liste
                                </button>
                            </h2>

                            <div id="Amenagements" class="accordion-collapse collapse" data-bs-parent="#accordionExample"
                                style="">
                                <div class="accordion-body">
                                    <div class="demo-inline-spacing mt-3">
                                        <ol class="list-group list-group-numbered">
                                            @foreach ($getamenagemennt as $val)
                                                <li class="list-group-item"><b>{{ $val->nom_complet_amg }}, Ajouté dépuis
                                                        le {{ $val->created_at->format('d/m/Y à H:i') }}</b></li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="d-flex mb-5">
                <div class="flex-shrink-0" style="margin-right: 14px;font-size: 27px;">
                    <i class="fa fa-car"></i>
                </div>
                <div class="flex-grow-1 row">
                    <div class="col-9 mb-sm-0 mb-2">
                        <h6 class="mb-0">Déménagements</h6>
                        <small class="text-muted">Déménagements enregistrés dans famille</small>
                    </div>
                    <div class="col-3 text-end">
                        <b>{{ count($getDemenagement) }}</b>
                    </div>
                    @if (count($getDemenagement) > 0)
                        <div class="card accordion-item mt-3">
                            <h2 class="accordion-header" id="headingOne">
                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#Demenagements" aria-expanded="false" aria-controls="Demenagements">
                                    Voir la liste
                                </button>
                            </h2>

                            <div id="Demenagements" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample" style="">
                                <div class="accordion-body">
                                    <div class="demo-inline-spacing mt-3">
                                        <ol class="list-group list-group-numbered">
                                            @foreach ($getDemenagement as $val)
                                                <li class="list-group-item"><b>{{ $val->nom_complet_dmg }}, Ajouté dépuis
                                                        le {{ $val->created_at->format('d/m/Y à H:i') }}</b></li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
