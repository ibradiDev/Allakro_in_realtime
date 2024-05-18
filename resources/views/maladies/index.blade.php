@extends('layouts.admin')

@section('nav-title', 'MALADIES CONCERNANT NOTRE COMMUNAUTE')

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

    <div class="row">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title">MALADIES RECEMMENTS ENREGISTREES (<b>{{ count($maladies) }}</b>)</h5>
            <div class="dropdown">
                <button class="btn p-2 btn-primary mb-4" type="button" id="" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"> Plus d'option
                    <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID" style="">
                    <a class="dropdown-item" href="{{ route('maladies.create') }}" type="button">
                        Nouvelle maladie
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md">
            @foreach ($maladies as $maladie)
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-12">
                            <div class="card-body">
                                <h5 class="card-title"
                                    style="display: flex;align-items: center;justify-content: space-between;font-weight:900;">
                                    {{ $maladie->nom_maladie }}

                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID"
                                            style="">
                                            <a class="dropdown-item" href="{{ route('maladies.edit', $maladie) }}">
                                                <i class="bx bx-edit me-1"></i>
                                                Modifier
                                            </a>
                                            @if ($maladie->is_active === 1)
                                                <form action="{{ route('maladies.update', $maladie) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="form_active" value="is_active_form">
                                                    <input type="hidden" name="is_active" value="0">
                                                    <button type="submit" class="dropdown-item"
                                                        onclick="return confirm('Validez-vous cette action ?');">
                                                        N'est plus active
                                                    </button>
                                                </form>
                                            @elseif($maladie->is_active === 0)
                                                <form action="{{ route('maladies.update', $maladie) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="form_active" value="is_active_form">
                                                    <input type="hidden" name="is_active" value="1">
                                                    <button type="submit" class="dropdown-item"
                                                        onclick="return confirm('Validez-vous cette action ?');">
                                                        Sévi en ce moment
                                                    </button>
                                                </form>
                                            @endif

                                            <form action="{{ route('maladies.update', $maladie) }}" method="POST">
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
                                </h5>
                                <p class="card-text">
                                    {{ $maladie->description_maladie }}
                                </p>
                                <p class="card-text">
                                    <small class="text-muted"> <b>Mode de transmission</b> :
                                        {{ $maladie->mode_transmission_maladie }}</small> <br>
                                    <small class="text-muted"> <b>Caractéristiques</b> :
                                        {{ $maladie->caracteristique_maladie }}</small> <br>
                                    <small class="text-muted" style="color:  #00a6a6 !important;"> <b>Etat de la maladie</b>
                                        :
                                        @if ($maladie->is_active === 1)
                                            Active en ce moment
                                        @else
                                            En voie de disparution
                                        @endif
                                    </small> <br>
                                </p>
                                <p class="card-text">
                                    <small class="text-muted"> publié le :
                                        {{ $maladie->created_at->format('d/m/Y, H:i') }}</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

@endsection
