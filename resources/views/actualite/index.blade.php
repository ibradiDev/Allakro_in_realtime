@extends('layouts.admin')

@section('nav-title', 'FAIRE DES ACTUALITES DANS NOTRE COMMUNAUTE')

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

    <div class="col-lg-4 col-md-6">
        <div class="mt-3">
            <!-- ENREGISTRER UNE PROJET -->
            <div class="modal applyLoanModal fade" id="addProjectModal" tabindex="-1" aria-labelledby="projectModal"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h4 class="modal-title" id="exampleModalLabel">Saisissez les informations du Projet</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('projets.store') }}" method="POST">
                                @csrf

                                <input hidden name="status" value="1">
                                <div class="row">
                                    <div class="col-lg-12 col-12 mb-4 pb-2">
                                        <div class="form-group">
                                            <label for="titre" class="form-label">Titre du projet <span
                                                    class="text-danger">*</span></label>
                                            <input name="titre" placeholder="projet St Lorem" type="text"
                                                class="form-control shadow-none @error('titre') is-invalid @enderror"
                                                id="titre" actualite="{{ old('titre') }}" required>
                                            <div class="invalid-feedback">
                                                @error('titre')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-12 mb-4 pb-2">
                                        <div class="form-group">
                                            <label for="description_projet" class="form-label">Description du projet <span
                                                    class="text-danger">*</span></label>
                                            <textarea name="description_projet" id="description_projet"
                                                class="form-control shadow-none @error('description_projet') is-invalid @enderror" minlength="30" required></textarea>
                                            <div class="invalid-feedback">
                                                @error('description_projet')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-12 mb-4 pb-2">
                                        <label class="form-label">
                                            Période de déroulement du projet
                                        </label>
                                        <div class="row">
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <div class="form-group">
                                                    <label for="debut_projet" class="form-label">
                                                        Début fixé au <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="date" name="debut_projet"
                                                        class="form-control shadow-none col-2">
                                                    <div class="invalid-feedback">
                                                        @error('debut_projet')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mb-4 pb-2">
                                                <div class="form-group">
                                                    <label for="fin_projet" class="form-label">Fin prévu pour le
                                                    </label>
                                                    <input type="date" name="fin_projet"
                                                        class="form-control shadow-none col-2">
                                                    <div class="invalid-feedback">
                                                        @error('fin_projet')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
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

            <!-- PUBLIER UNE ACTUALITE -->
            <div class="modal applyLoanModal fade" id="addNewsModal" tabindex="-1" aria-labelledby="authModal"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h4 class="modal-title" id="exampleModalLabel">Saisissez les informations de l'actualite</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('actualites.store') }}" method="POST">
                                @csrf

                                <input hidden name="status" value="1">
                                <div class="row">
                                    <div class="col-lg-12 col-12 mb-4 pb-2">
                                        <div class="form-group">
                                            <label for="titre" class="form-label">Titre de l'actualite <span
                                                    class="text-danger">*</span></label>
                                            <input name="titre" placeholder="projet St Lorem" type="text"
                                                class="form-control shadow-none  @error('titre') is-invalid @enderror"
                                                id="titre" value="{{ old('titre') }}" required>
                                            <div class="invalid-feedback">
                                                @error('titre')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12 mb-4 pb-2">
                                        <div class="form-group">
                                            <label for="contenu" class="form-label">Contenu de l'actualite
                                                <span class="text-danger">*</span></label>
                                            <textarea name="contenu" id="contenu" minlength="30"
                                                class="form-control shadow-none @error('contenu') is-invalid @enderror"></textarea>
                                            <div class="invalid-feedback">
                                                @error('contenu')
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

            {{-- MODAL LISTE PROJET --}}
            <div class="modal applyLoanModal fade" id="listProjetModal" tabindex="-1" aria-labelledby="authModal"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalScrollableTitle" style='font-weight: 900;'>
                                Liste des projet de la mairie publié
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            @if (count($projets) > 0)
                                <ul class="p-0 m-0">
                                    @foreach ($projets as $projet)
                                        <div class="card mb-3">
                                            <div class="row g-0">
                                                <div class="col-md-12">
                                                    <div class="card-body">
                                                        <h5 class="card-title"
                                                            style="display: flex;align-items: center;justify-content: space-between;font-weight:900;">
                                                            {{ $projet->titre }}

                                                            <div class="dropdown">
                                                                <button class="btn p-0" type="button" id=""
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-end"
                                                                    aria-labelledby="transactionID" style="">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('projets.edit', $projet) }}">
                                                                        <i class="bx bx-edit me-1"></i>
                                                                        Modifier
                                                                    </a>
                                                                    <form action="{{ route('projets.update', $projet) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('PUT')

                                                                        <input type="hidden"
                                                                            name="status"value="0">
                                                                        <button type="submit"
                                                                            class="dropdown-item text-danger"
                                                                            onclick="return confirm('Validez-vous la suppression ?');">
                                                                            <i class="fa fa-trash me-1"></i>
                                                                            Supprimer
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </h5>
                                                        <p class="card-text">
                                                            {{ $projet->description_projet }}
                                                        </p>
                                                        <p class="card-text">
                                                            <small class="text-muted">
                                                                Début prévu le :
                                                                {{ $projet->debut_projet }} ET prend fin le :
                                                                {{ $projet->fin_projet }}
                                                            </small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </ul>
                            @else
                                <div class="alert alert-warning" role="alert">Aucun projet de la mairie enregistré pour
                                    le moment !</div>
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
        </div>
    </div>


    <div class="row  justify-content-between">
        <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <h5 class="text-wrap mb-2 font-w700">
                            Annonces faites dans la communauté
                        </h5>
                    </div>
                    <h3 class="card-title mb-2" style="font-weight: bold;">{{ count($actualites) }}</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <h5 class="text-wrap mb-2">
                            Projets initialisés pour la communauté
                        </h5>
                    </div>
                    <h3 class="card-title mb-2" style="font-weight: bold;">
                        {{ count($projets) }}
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="text-align: end;">
        <div class="dropdown">
            <button class="btn p-2 btn-primary mb-4" type="button" id="" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"> Plus d'option
                <i class="bx bx-dots-vertical-rounded"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID" style="">
                <a class="dropdown-item" href="javascript:void(0);" type="button" data-bs-toggle="modal"
                    data-bs-target="#addProjectModal">
                    Nouveau projet mairie
                </a>
                <a class="dropdown-item" href="javascript:void(0);" type="button" data-bs-toggle="modal"
                    data-bs-target="#addNewsModal">
                    Enregistrer une actualité
                </a>
                <a class="dropdown-item" href="javascript:void(0);" type="button" data-bs-toggle="modal"
                    data-bs-target="#listProjetModal">
                    Liste des projet mairie
                </a>
            </div>
        </div>
    </div>


    <div class="row mb-5">
        <div class="col-md">
            @foreach ($actualites as $actualite)
                <div class="card mb-3">
                    <div class="row g-0">
                        {{-- <div class="col-md-4">
                            <img class="card-img card-img-left" src="../assets/img/elements/12.jpg" alt="Card image">
                        </div> --}}
                        <div class="col-md-12">
                            <div class="card-body">
                                <h5 class="card-title"
                                    style="display: flex;align-items: center;justify-content: space-between;font-weight:900;">
                                    {{ $actualite->titre }}

                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID"
                                            style="">
                                            <a class="dropdown-item" href="{{ route('actualites.edit', $actualite) }}">
                                                <i class="bx bx-edit me-1"></i>
                                                Modifier
                                            </a>
                                            <form action="{{ route('actualites.update', $actualite) }}" method="POST">
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
                                    {{ $actualite->contenu }}
                                </p>
                                <p class="card-text text-muted">
                                    <small class="text-danger"> publié le :
                                        {{ $actualite->created_at->format('d/m/Y à H:i') }}
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- <table class="table table-stiped">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Début prévu</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($projets as $projet)
                    <tr>
                        <td>{{ $projet->titre }}</td>
                        <td>{{ $projet->debut_projet }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" type="button" data-bs-toggle="modal"
                                        data-bs-target="#details_projet_{{ $projet->id }}">
                                        <i class="bx bx-show me-1"></i>
                                        Consulter le projet
                                    </a>
                                    <a class="dropdown-item" href="{{ route('projets.edit', $projet) }}">
                                        <i class="bx bx-edit me-1"></i>
                                        Modifier les informations
                                    </a>

                                    <form action="{{ route('projets.update', $projet) }}" method="POST">
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
            </tbody>
        </table> --}}

        <div class="mt-3 border-danger d-flex justify-content-center">
            <span>{!! $actualites->links() !!}</span>
        </div>
    </div>

@endsection
