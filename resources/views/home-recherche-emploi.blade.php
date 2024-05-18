@extends('layouts.app')

@section('title', 'Accueil - Espace emploi Allakro')

@section('content')

    <section class="page-header">
        <div class="container">
            @if (session('Success'))
                <div class="alert alert-primary mx-4" role="alert">
                    {{ session('Success') }}
                </div>
            @elseif(session('Error'))
                <div class="alert alert-danger mx-4" role="alert">
                    {{ session('Error') }}
                </div>
            @endif
            <div class="row">
                <div class="col-8 mx-auto text-center">
                    <h2 class="mb-3 text-capitalize">Espace recherche d'emploi</h2>
                    <ul class="list-inline breadcrumbs text-capitalize" style="font-weight:500">
                        <li class="list-inline-item"><a href="{{ route('pageAccueil') }}">Accueil</a>
                        </li>
                        <li class="list-inline-item">/ &nbsp; <a href="#">page actuelle</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="has-shapes">
            <svg class="shape shape-left text-light" viewBox="0 0 192 752" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M-30.883 0C-41.3436 36.4248 -22.7145 75.8085 4.29154 102.398C31.2976 128.987 65.8677 146.199 97.6457 166.87C129.424 187.542 160.139 213.902 172.162 249.847C193.542 313.799 149.886 378.897 129.069 443.036C97.5623 540.079 122.109 653.229 191 728.495"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M-55.5959 7.52271C-66.0565 43.9475 -47.4274 83.3312 -20.4214 109.92C6.58466 136.51 41.1549 153.722 72.9328 174.393C104.711 195.064 135.426 221.425 147.449 257.37C168.829 321.322 125.174 386.42 104.356 450.559C72.8494 547.601 97.3965 660.752 166.287 736.018"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M-80.3302 15.0449C-90.7909 51.4697 -72.1617 90.8535 -45.1557 117.443C-18.1497 144.032 16.4205 161.244 48.1984 181.915C79.9763 202.587 110.691 228.947 122.715 264.892C144.095 328.844 100.439 393.942 79.622 458.081C48.115 555.123 72.6622 668.274 141.552 743.54"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M-105.045 22.5676C-115.506 58.9924 -96.8766 98.3762 -69.8706 124.965C-42.8646 151.555 -8.29436 168.767 23.4835 189.438C55.2615 210.109 85.9766 236.469 98.0001 272.415C119.38 336.367 75.7243 401.464 54.9072 465.604C23.4002 562.646 47.9473 675.796 116.838 751.063"
                    stroke="currentColor" stroke-miterlimit="10" />
            </svg>
            <svg class="shape shape-right text-light" viewBox="0 0 731 746" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M12.1794 745.14C1.80036 707.275 -5.75764 666.015 8.73984 629.537C27.748 581.745 80.4729 554.968 131.538 548.843C182.604 542.703 234.032 552.841 285.323 556.748C336.615 560.64 391.543 557.276 433.828 527.964C492.452 487.323 511.701 408.123 564.607 360.255C608.718 320.353 675.307 307.183 731.29 327.323"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M51.0253 745.14C41.2045 709.326 34.0538 670.284 47.7668 635.783C65.7491 590.571 115.623 565.242 163.928 559.449C212.248 553.641 260.884 563.235 309.4 566.931C357.916 570.627 409.887 567.429 449.879 539.701C505.35 501.247 523.543 426.331 573.598 381.059C615.326 343.314 678.324 330.853 731.275 349.906"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M89.8715 745.14C80.6239 711.363 73.8654 674.568 86.8091 642.028C103.766 599.396 150.788 575.515 196.347 570.054C241.906 564.578 287.767 573.629 333.523 577.099C379.278 580.584 428.277 577.567 465.976 551.423C518.279 515.172 535.431 444.525 582.62 401.832C621.964 366.229 681.356 354.493 731.291 372.46"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M128.718 745.14C120.029 713.414 113.678 678.838 125.837 648.274C141.768 608.221 185.939 585.788 228.737 580.659C271.536 575.515 314.621 584.008 357.6 587.282C400.58 590.556 446.607 587.719 482.028 563.16C531.163 529.111 547.275 462.733 591.612 422.635C628.572 389.19 684.375 378.162 731.276 395.043"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M167.564 745.14C159.432 715.451 153.504 683.107 164.863 654.519C179.753 617.046 221.088 596.062 261.126 591.265C301.164 586.452 341.473 594.402 381.677 597.465C421.88 600.527 464.95 597.872 498.094 574.896C544.061 543.035 559.146 480.942 600.617 443.423C635.194 412.135 687.406 401.817 731.276 417.612"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M817.266 289.466C813.108 259.989 787.151 237.697 759.261 227.271C731.372 216.846 701.077 215.553 671.666 210.904C642.254 206.24 611.795 197.156 591.664 175.224C555.853 136.189 566.345 75.5336 560.763 22.8649C552.302 -56.8256 498.487 -130.133 425 -162.081"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M832.584 276.159C828.427 246.683 802.469 224.391 774.58 213.965C746.69 203.539 716.395 202.246 686.984 197.598C657.573 192.934 627.114 183.85 606.982 161.918C571.172 122.883 581.663 62.2275 576.082 9.55873C567.62 -70.1318 513.806 -143.439 440.318 -175.387"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M847.904 262.853C843.747 233.376 817.789 211.084 789.9 200.659C762.011 190.233 731.716 188.94 702.304 184.292C672.893 179.627 642.434 170.544 622.303 148.612C586.492 109.577 596.983 48.9211 591.402 -3.74766C582.94 -83.4382 529.126 -156.746 455.638 -188.694"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M863.24 249.547C859.083 220.07 833.125 197.778 805.236 187.353C777.347 176.927 747.051 175.634 717.64 170.986C688.229 166.321 657.77 157.237 637.639 135.306C601.828 96.2707 612.319 35.6149 606.738 -17.0538C598.276 -96.7443 544.462 -170.052 470.974 -202"
                    stroke="currentColor" stroke-miterlimit="10" />
            </svg>
        </div>
    </section>

    <section class="about-section section bg-tertiary position-relative overflow-hidden">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="section-title">
                        <p class="text-primary text-uppercase fw-bold mb-3">Emploi à Allakro</p>
                        <h1>Une communauté professionnelle !</h1>
                        <p class="">
                            Contribuez au développement de notre communauté en partageant des opportunités
                            professionnelles locales !
                            Si vous avez une offre d'emploi à proposer aux personnes compétantes de notre communauté, nous
                            vous invitons à partager les détails dès maintenant.<br />
                            Ensemble, construisons un avenir professionnel solide pour notre communauté.
                            Enregistrez vos offres d'emploi ici et laissez notre communauté prospérer.
                        </p>
                        <a class="btn btn-primary mt-4" href="{{ route('pageFormulaireRechercheEmploi') }}"
                            data-form-type="offreEmploi">
                            Proposer une Offre
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 text-center text-lg-end">
                    <img loading="lazy" decoding="async" src="{{ asset('font_utilisateurs/images/about-us.png') }}"
                        alt="image offre emploi" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="has-shapes">
            <svg class="shape shape-left text-light" width="381" height="443" viewBox="0 0 381 443" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M334.266 499.007C330.108 469.108 304.151 446.496 276.261 435.921C248.372 425.346 218.077 424.035 188.666 419.32C159.254 414.589 128.795 405.375 108.664 383.129C72.8533 343.535 83.3445 282.01 77.7634 228.587C69.3017 147.754 15.4873 73.3967 -58.0001 40.9907"
                    stroke="currentColor" stroke-miterlimit="10"></path>
                <path
                    d="M349.584 485.51C345.427 455.611 319.469 433 291.58 422.425C263.69 411.85 233.395 410.538 203.984 405.823C174.573 401.092 144.114 391.878 123.982 369.632C88.1716 330.038 98.6628 268.513 93.0817 215.09C84.62 134.258 30.8056 59.8999 -42.6819 27.494"
                    stroke="currentColor" stroke-miterlimit="10"></path>
                <path
                    d="M364.904 472.013C360.747 442.114 334.789 419.503 306.9 408.928C279.011 398.352 248.716 397.041 219.304 392.326C189.893 387.595 159.434 378.381 139.303 356.135C103.492 316.541 113.983 255.016 108.402 201.593C99.9403 120.76 46.1259 46.4028 -27.3616 13.9969"
                    stroke="currentColor" stroke-miterlimit="10"></path>
                <path
                    d="M380.24 458.516C376.083 428.617 350.125 406.006 322.236 395.431C294.347 384.856 264.051 383.544 234.64 378.829C205.229 374.098 174.77 364.884 154.639 342.638C118.828 303.044 129.319 241.519 123.738 188.096C115.276 107.264 61.4619 32.906 -12.0255 0.500103"
                    stroke="currentColor" stroke-miterlimit="10"></path>
            </svg>
            <svg class="shape shape-right text-light" width="406" height="433" viewBox="0 0 406 433" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M101.974 -86.77C128.962 -74.8992 143.467 -43.2447 146.175 -12.7857C148.883 17.6734 142.273 48.1263 139.087 78.5816C135.916 109.041 136.681 141.702 152.351 167.47C180.247 213.314 240.712 218.81 289.413 238.184C363.095 267.516 418.962 340.253 430.36 421.687"
                    stroke="currentColor" stroke-miterlimit="10"></path>
                <path
                    d="M118.607 -98.5031C145.596 -86.6323 160.101 -54.9778 162.809 -24.5188C165.517 5.94031 158.907 36.3933 155.72 66.8486C152.549 97.3082 153.314 129.969 168.985 155.737C196.881 201.581 257.346 207.077 306.047 226.451C379.729 255.783 435.596 328.52 446.994 409.954"
                    stroke="currentColor" stroke-miterlimit="10"></path>
                <path
                    d="M135.241 -110.238C162.23 -98.3675 176.735 -66.7131 179.443 -36.254C182.151 -5.79492 175.541 24.6581 172.354 55.1134C169.183 85.573 169.948 118.234 185.619 144.002C213.515 189.846 273.98 195.342 322.681 214.716C396.363 244.048 452.23 316.785 463.627 398.219"
                    stroke="currentColor" stroke-miterlimit="10"></path>
                <path
                    d="M151.879 -121.989C178.867 -110.118 193.373 -78.4638 196.081 -48.0047C198.789 -17.5457 192.179 12.9074 188.992 43.3627C185.821 73.8223 186.586 106.483 202.256 132.251C230.153 178.095 290.618 183.591 339.318 202.965C413.001 232.297 468.867 305.034 480.265 386.468"
                    stroke="currentColor" stroke-miterlimit="10"></path>
            </svg>
        </div>
    </section>

    <section class="section tertiary">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="section-title">
                        <p class="text-primary text-uppercase fw-bold mb-3">Offres déjà disponible</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable" class="display  mb-5 pt-3" style="margin-bottom: 1.5rem;min-width: 845px;">
                            <thead>
                                <tr>
                                    <th
                                        style="width: 15rem;background-color: #DAEFFE;box-shadow: inset 0 1px 0 0 #C1E4FE,inset 0 -1px 0 0 #C1E4FE;text-align: initial;height: 18px;color: #162D3D;font-size: 16px;border: none !important;font-weight: 600;padding:0.6rem 0.6rem !important;padding-inline-end: 12px;">
                                        Nom du poste</th>
                                    <th
                                        style="width: 30rem;background-color: #DAEFFE;box-shadow: inset 0 1px 0 0 #C1E4FE,inset 0 -1px 0 0 #C1E4FE;text-align: initial;height: 18px;color: #162D3D;font-size: 16px;border: none !important;font-weight: 600;padding:0.6rem 0.6rem !important;padding-inline-end: 12px;">
                                        Description</th>
                                    <th
                                        style="width: 8rem;background-color: #DAEFFE;box-shadow: inset 0 1px 0 0 #C1E4FE,inset 0 -1px 0 0 #C1E4FE;text-align: initial;height: 18px;color: #162D3D;font-size: 16px;border: none !important;font-weight: 600;padding:0.6rem 0.6rem !important;padding-inline-end: 12px;">
                                        Ajouté le</th>
                                    <th
                                        style="width: 16rem;background-color: #DAEFFE;box-shadow: inset 0 1px 0 0 #C1E4FE,inset 0 -1px 0 0 #C1E4FE;text-align: initial;height: 18px;color: #162D3D;font-size: 16px;border: none !important;font-weight: 600;padding:0.6rem 0.6rem !important;padding-inline-end: 12px;">
                                        Actions </th>
                                </tr>
                            </thead>
                            <tbody style="border: none;">
                                @foreach ($getData as $val)
                                    <tr style="background: #fff;box-shadow: none;border: none;color: var(--bs-gray);">
                                        <td style="background: #fff;box-shadow: none;border: none;">
                                            {{ $val->service_propose }}
                                        </td>
                                        <td style="background: #fff;box-shadow: none;border: none;">
                                            {{ Str::limit($val->description_offre, 150) }}

                                        </td>
                                        <td style="background: #fff;box-shadow: none;border: none;">
                                            {{ $val->created_at->format('d/m/Y') }} à
                                            &nbsp;{{ strftime('%Hh%M', strtotime($val->created_at)) }}

                                        </td>
                                        <td style="background: #fff;box-shadow: none;border: none;">

                                            <a class="mx-3" type="button"
                                                style="font-size: 14px;font-weight: 700;text-decoration: !important;"
                                                href="{{ route('pageDetailsEmploi', $val->id) }}">
                                                Voir les détails <i class="bx bx-show"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('autres-scripts')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();

            $('#authModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Bouton qui a déclenché l'ouverture du modal
                var formType = button.data('form-type'); // Type de formulaire (naissance ou décès)

                // Mettez à jour la valeur du champ caché
                $('#form_type').val(formType);
            });

        });
    </script>
@endsection
