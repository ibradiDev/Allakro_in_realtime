@extends('layouts.admin')

@section('nav-title', 'EPIDEMIES CONCERNANT NOTRE COMMUNAUTE')

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

    <div class="row" style="text-align: end;">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title">EPIDEMIES RECEMMENTS ENREGISTREES (<b>{{ count($epidemies) }}</b>)</h5>
            <div class="dropdown">
                <button class="btn p-2 btn-primary mb-4" type="button" id="" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"> Plus d'option
                    <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID" style="">
                    <a class="dropdown-item" href="{{ route('epidemies.create') }}" type="button">
                        Nouvelle épidemie
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md">
            @foreach ($epidemies as $epidemie)
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-12">
                            <div class="card-body">
                                <h5 class="card-title"
                                    style="display: flex;align-items: center;justify-content: space-between;font-weight:900;">
                                    {{ $epidemie->nom_epidemie }}

                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID"
                                            style="">
                                            <a class="dropdown-item" href="{{ route('epidemies.edit', $epidemie) }}">
                                                <i class="bx bx-edit me-1"></i>
                                                Modifier
                                            </a>
                                            @if ($epidemie->is_active === 1)
                                                <form action="{{ route('epidemies.update', $epidemie) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="form_active" value="is_active_form">
                                                    <input type="hidden" name="is_active" value="0">
                                                    <button type="submit" class="dropdown-item"
                                                        onclick="return confirm('Validez-vous cette action ?');">
                                                        N'est plus active
                                                    </button>
                                                </form>
                                            @elseif($epidemie->is_active === 0)
                                                <form action="{{ route('epidemies.update', $epidemie) }}" method="POST">
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

                                            <form action="{{ route('epidemies.update', $epidemie) }}" method="POST">
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
                                    {{ $epidemie->mesure_preventive }}
                                </p>
                                <p class="card-text">
                                    <small class="text-muted"> <b>Zones concernées</b> :
                                        {{ $epidemie->zone_concernee }}</small> <br>
                                    <small class="text-muted"> <b>Nombre de cas</b> :
                                        {{ $epidemie->nombre_de_cas_epidemie }}</small> |
                                    <small class="text-muted"> <b>Nombre de victime</b> :
                                        {{ $epidemie->nombre_de_deces_epidemie }}</small> <br>
                                    <small class="text-muted"> <b>Sévi dépuis le</b> :
                                        {{ $epidemie->debut_epidemie }}</small> |
                                    <small class="text-muted"> <b>Date de fin</b> : {{ $epidemie->fin_epidemie }}</small>
                                    <br>
                                    <small class="text-muted" style="color:  #00a6a6 !important;"> <b>Etat de l'épidemie</b>
                                        :
                                        @if ($epidemie->is_active === 1)
                                            Active en ce moment
                                        @else
                                            Epidemie passée
                                        @endif
                                    </small> <br>
                                </p>
                                <p class="card-text">
                                    <small class="text-muted"> publié le :
                                        {{ $epidemie->created_at->format('d/m/Y, H:i') }}</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-3 border-danger d-flex justify-content-center">
            <span>{!! $epidemies->links() !!}</span>
        </div>
    </div>

@endsection
