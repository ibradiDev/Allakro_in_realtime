@extends('layouts.admin')

@section('content')

@section('nav-title', 'TABLEAU DE BORD')

<div class="row">
    <div class="col-lg-8 mb-4 order-0">
        <div class="row">
            <div class="card mb-4">
                <div class="d-flex align-items-end row py-1">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h1 class="card-title fw-bold text-dark text-center">
                                ALLAKRO STATISTIQUES
                            </h1>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ asset('admin/assets/img/illustrations/man-with-laptop-light.png') }}"
                                height="140" alt="View Badge User"
                                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Aménagements -->
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <h5 class="text-wrap mb-2">
                                Aménagements enregistrés
                                <small class="text-info fw-semibold">
                                    <i class="fa fa-car"></i>
                                </small>
                            </h5>
                        </div>
                        <h3 class="card-title mb-2" style="font-weight: bold;">{{ $total_amenagements }}</h3>
                    </div>
                </div>
            </div>
            <!-- Déménagements -->
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <h5 class="text-wrap mb-2">
                                Déménagements enregistrés
                                <small class="text-info fw-semibold">
                                    <i class="bx bx-car"></i>
                                </small>
                            </h5>
                        </div>
                        <h3 class="card-title mb-2" style="font-weight: bold;">{{ $total_demenagements }}</h3>
                    </div>
                </div>
            </div>
            {{-- Offre emploi --}}
            <div class="row d-flex justify-content-between col-lg-12 col-md-6 col-12 mb-4">
                <div class="card col-lg-4 col-md-6 col-4">
                    <div class="card-body">
                        <div
                            class="card-title d-flex flex-column align-items-start justify-content-between text-center">
                            <h5 class="text-wrap text-center mb-2">
                                Offres d'emploi publiés <br />
                                <i class="text-primary fa fa-briefcase p-2"></i>
                            </h5>
                        </div>
                        <div class="mt-sm-auto">
                            <h3 class="mb-0" style="font-weight: bold;">{{ $total_emplois }}</h3>
                        </div>
                    </div>
                </div>
                {{-- Pharmacie --}}
                <div class="card col-lg-3 col-md-6 col-4">
                    <div class="card-body">
                        <div
                            class="card-title d-flex flex-column align-items-start justify-content-between text-center">
                            <h5 class="text-wrap text-center mb-2">
                                Pharmacies
                                <i class="fa fa-pills text-primary py-3"></i>
                            </h5>
                            <h3 class="card-title mb-2" style="font-weight: bold;">{{ $total_pharmacies }}</h3>
                        </div>
                    </div>
                </div>

                <div class="card col-lg-4 col-md-6 col-4">
                    <div class="card-body">
                        <div
                            class="card-title d-flex flex-column align-items-start justify-content-between text-center">
                            <h5 class="text-wrap text-center mb-2">
                                Centres de santé <br />
                                <i class="fa fa-clinic-medical text-primary pt-2"></i>
                            </h5>
                        </div>
                        <h3 class="card-title mb-2" style="font-weight: bold;">{{ $total_centre_de_sante }}</h3>
                    </div>
                </div>
            </div>
            <!--/ Total Revenue -->
        </div>
    </div>
    <div class="col-lg-4 col-md-4 order-1">
        <div class="row">
            <!-- Population totale -->
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                <div class="card-title">
                                    <h5 class="text-nowrap mb-2">
                                        Nombre total de la population
                                    </h5>
                                    <small>
                                        <span class="badge bg-label-danger rounded-pill">
                                            <i class="bx bx-male"></i>
                                        </span>
                                        <i class="bx bx-plus"></i>
                                        <span class="badge bg-label-success rounded-pill">
                                            <i class="bx bx-female"></i>
                                        </span>
                                    </small>
                                </div>
                                <div class="mt-sm-auto">
                                    <h3 class="mb-0" style="font-weight: bold;">{{ $total_individus }}</h3>
                                </div>
                            </div>
                            <!-- <div id="profileReportChart"></div> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Hommes -->
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <h5 class="text-nowrap mb-2">
                                Hommes <i class="bx bx-male-sign text-danger"></i>
                            </h5>
                        </div>
                        <h3 class="card-title mb-2" style="font-weight: bold;">{{ $total_hommes }}</h3>
                        <small class="text-danger fw-semibold">
                            <i class="bx bx-male"></i>
                            {{ $pourcentage_hommes }}
                        </small>
                    </div>
                </div>
            </div>
            <!-- Femmes -->
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <h5 class="text-nowrap mb-2">
                                Femmes
                                <i class="bx bx-female-sign text-success"></i>
                            </h5>
                        </div>
                        <h3 class="card-title mb-2" style="font-weight: bold;">{{ $total_femmes }}</h3>
                        <small class="text-success fw-semibold">
                            <i class="bx bx-female"></i>
                            {{ $pourcentage_femmes }}
                        </small>
                    </div>
                </div>
            </div>
            <!-- Naissances -->
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div
                            class="card-title d-flex flex-column align-items-start justify-content-between text-center">
                            <h5 class="text-wrap mb-2">
                                Naissances enregistrées
                                <i class="fa fa-baby text-primary p-2"></i>
                            </h5>
                            {{-- <small class="text-success fw-semibold"> </small> --}}
                        </div>
                        <h3 class="card-title mb-2" style="font-weight: bold;">{{ $total_naissances }}</h3>
                    </div>
                </div>
            </div>
            <!-- Décès -->
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between text-center">
                            <h5 class="text-wrap mb-2">
                                Décès enregistrés
                                <i class="fa fa-cross text-danger p-2"></i>
                            </h5>
                        </div>
                        <h3 class="card-title mb-2" style="font-weight: bold;">{{ $total_deces }}</h3>
                        <small class="text-success fw-semibold">
                            <!-- <i class="bx bx-analyse"></i> 32% -->
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
