@extends('layouts.app')

@section('title', "Accueil - portail de'Allakro")

@section('content')
    <section class="banner position-relative overflow-hidden">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="block text-center text-lg-start pe-0 pe-xl-5">
                        <h1 class="text-capitalize mb-4">Bienvenue au village d'Allakro</h1>
                        <p class="mb-4">
                            Cette plateforme présente un portail de gestion<br />
                            pour les habitant d'Allakro.
                        </p>
                        <a type="button" class="btn btn-primary" href="{{ route('pageProposAllakro') }}">
                            Je m'informe
                            <span style="font-size: 14px;" class="ms-2 fa fa-arrow-right"></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ps-lg-5 text-center">
                        <img loading="lazy" decoding="async"
                            src="{{ asset('font_utilisateurs/images/banner/population.jpg') }}" alt="banner image"
                            class="w-100">
                    </div>
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

    <section class="section bg-tertiary">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="section-title pt-4">
                        <p class="text-primary text-uppercase fw-bold mb-3">Démarches </p>
                        <h1>En ligne </h1>
                        <p>Nous vous offrons tout type de démarche chez nous</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 service-item">
                    <a class="text-black" href="{{ route('pageEspaceAccueilFamille') }}">
                        <div class="block">
                            <span class="colored-box text-center h3 mb-4">01</span>
                            <h3 class="mb-3 service-title">Naissances</h3>
                            <p class="mb-0 service-description">Enregistrez légalement la naissance d'un enfant auprès des
                                autorités
                                afin d'attester de son existence légale.</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 service-item">
                    <a class="text-black" href="{{ route('pageEspaceAccueilFamille') }}">
                        <div class="block">
                            <span class="colored-box text-center h3 mb-4">02</span>
                            <h3 class="mb-3 service-title">Décès</h3>
                            <p class="mb-0 service-description">Déclarez légalement le décès d'une personne auprès des
                                autorités afin
                                d'officialiser juridiquement.</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 service-item">
                    <a class="text-black" href="{{ route('pageEspaceDeplacements') }}">
                        <div class="block">
                            <span class="colored-box text-center h3 mb-4">03</span>
                            <h3 class="mb-3 service-title">Aménagements</h3>
                            <p class="mb-0 service-description">egistrez-vous lorsque vous aménagez dans notre village afin
                                de
                                bénéficier du soutien de la communauté.</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 service-item">
                    <a class="text-black" href="{{ route('pageEspaceDeplacements') }}">
                        <div class="block">
                            <span class="colored-box text-center h3 mb-4">04</span>
                            <h3 class="mb-3 service-title">Déménagements</h3>
                            <p class="mb-0 service-description">Prévenez les autorités lorsque vous déménagez de votre
                                emplacement
                                actuellement au village d'Allakro. </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 service-item">
                    <a class="text-black" href="{{ route('pageEspaceRechercheEmploi') }}">
                        <div class="block">
                            <span class="colored-box text-center h3 mb-4">05</span>
                            <h3 class="mb-3 service-title">Emplois</h3>
                            <p class="mb-0 service-description">
                                Si vous êtes en quête d'emploi le village d'Allakro met à votre
                                disposition vos bésoins.
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="homepage_tab position-relative">
        <div class="section container">
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-4">
                    <div class="section-title text-center">
                        <p class="text-primary text-uppercase fw-bold mb-3">Accès rapides</p>
                        <h1>Des accès rapides pour avoir plus d'information </h1>
                    </div>
                </div>
                <div class="col-lg-10">
                    <ul class="payment_info_tab nav nav-pills justify-content-center mb-4" id="pills-tab" role="tablist">
                        <li class="nav-item m-2" role="presentation"> <a
                                class="nav-link btn btn-outline-primary effect-none text-dark active"
                                id="pills-how-much-can-i-recive-tab" data-bs-toggle="pill"
                                href="#pills-how-much-can-i-recive" role="tab"
                                aria-controls="pills-how-much-can-i-recive" aria-selected="true">Epidémies &
                                maladies</a>
                        </li>
                        <li class="nav-item m-2" role="presentation"> <a
                                class="nav-link btn btn-outline-primary effect-none text-dark "
                                id="pills-how-much-does-it-costs-tab" data-bs-toggle="pill"
                                href="#pills-how-much-does-it-costs" role="tab"
                                aria-controls="pills-how-much-does-it-costs" aria-selected="true">Pharmacies &
                                centres</a>
                        </li>
                        <li class="nav-item m-2" role="presentation"> <a
                                class="nav-link btn btn-outline-primary effect-none text-dark "
                                id="pills-how-do-i-repay-tab" data-bs-toggle="pill" href="#pills-how-do-i-repay"
                                role="tab" aria-controls="pills-how-do-i-repay" aria-selected="true">Projets de
                                la mairie</a>
                        </li>
                    </ul>
                    <div class="rounded shadow bg-white p-5 tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-how-much-can-i-recive" role="tabpanel"
                            aria-labelledby="pills-how-much-can-i-recive-tab">
                            <div class="row align-items-center">
                                <div class="col-md-6 order-1 order-md-0">
                                    <div class="content-block">
                                        <h3 class="mb-4">Soyez informé de tout</h3>
                                        <div class="content">
                                            <p>Dans la région d'Allakro, notre portail de gestion des acteurs vous offre
                                                un espace dédié aux
                                                "Epidémies & Maladies"
                                                afin de vous tenir informé(e) sur les problèmes de santé qui peuvent
                                                affecter la communauté.</p>
                                            <p>Nous croyons que la santé est une priorité essentielle et que la
                                                diffusion d'informations sur
                                                les épidémies et
                                                les maladies est fondamentale pour prévenir, contrôler et traiter les
                                                problèmes de santé de
                                                manière efficace.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 order-0 order-md-1 mb-5 mt-md-0">
                                    <div class="image-block text-center">
                                        <img loading="lazy" decoding="async"
                                            src="{{ asset('font_utilisateurs/images/3720816.jpg') }}"
                                            alt="Image Epidémies" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="pills-how-much-does-it-costs" role="tabpanel"
                            aria-labelledby="pills-how-much-does-it-costs-tab">
                            <div class="row align-items-center">
                                <div class="col-md-6 order-1 order-md-0">
                                    <div class="content-block">
                                        <h3 class="mb-4">La santé est une priorité</h3>
                                        <div class="content">
                                            <p>nous mettons à votre disposition une liste complète des pharmacies et
                                                centres de santé présents
                                                dans notre région,
                                                afin de vous faciliter l'accès aux soins de santé et aux services
                                                médicaux.</p>
                                            <p>Que ce soit pour vos besoins en médicaments, en consultations médicales,
                                                ou pour toute autre
                                                assistance médicale,
                                                vous trouverez ici les coordonnées et les adresses des établissements de
                                                santé les plus proches
                                                de chez vous.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 order-0 order-md-1 mb-5 mt-md-0">
                                    <div class="image-block text-center">
                                        <img loading="lazy" decoding="async"
                                            src="{{ asset('font_utilisateurs/images/Pharmacist in mask carrying pills to patient.jpg') }}"
                                            alt="Image pharmacies" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="pills-how-do-i-repay" role="tabpanel"
                            aria-labelledby="pills-how-do-i-repay-tab">
                            <div class="row align-items-center">
                                <div class="col-md-6 order-1 order-md-0">
                                    <div class="content-block">
                                        <h3 class="mb-4">Notre collaboration </h3>
                                        <div class="content">
                                            <p>Ensemble, construisons un avenir prometteur pour Allakro, en nous
                                                engageant dans des projets
                                                porteurs de valeurs, de progrès, et de développement durable. </p>
                                            <p>Nous sommes déterminés à travailler main dans la main avec notre
                                                communauté pour faire de nos
                                                projets une réussite collective.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 order-0 order-md-1 mb-5 mt-md-0">
                                    <div class="image-block text-center">
                                        <img loading="lazy" decoding="async"
                                            src="{{ asset('font_utilisateurs/images/28550.jpg') }}"
                                            alt="image projet mairie" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="has-shapes">
                <svg class="shape shape-left text-light" width="290" height="709" viewBox="0 0 290 709"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M-119.511 58.4275C-120.188 96.3185 -92.0001 129.539 -59.0325 148.232C-26.0649 166.926 11.7821 174.604 47.8274 186.346C83.8726 198.088 120.364 215.601 141.281 247.209C178.484 303.449 153.165 377.627 149.657 444.969C144.34 546.859 197.336 649.801 283.36 704.673"
                        stroke="currentColor" stroke-miterlimit="10" />
                    <path
                        d="M-141.434 72.0899C-142.111 109.981 -113.923 143.201 -80.9554 161.895C-47.9878 180.588 -10.1407 188.267 25.9045 200.009C61.9497 211.751 98.4408 229.263 119.358 260.872C156.561 317.111 131.242 391.29 127.734 458.631C122.417 560.522 175.414 663.463 261.437 718.335"
                        stroke="currentColor" stroke-miterlimit="10" />
                    <path
                        d="M-163.379 85.7578C-164.056 123.649 -135.868 156.869 -102.901 175.563C-69.9331 194.256 -32.086 201.934 3.9592 213.677C40.0044 225.419 76.4955 242.931 97.4127 274.54C134.616 330.779 109.296 404.957 105.789 472.299C100.472 574.19 153.468 677.131 239.492 732.003"
                        stroke="currentColor" stroke-miterlimit="10" />
                    <path
                        d="M-185.305 99.4208C-185.982 137.312 -157.794 170.532 -124.826 189.226C-91.8589 207.919 -54.0118 215.597 -17.9666 227.34C18.0787 239.082 54.5697 256.594 75.4869 288.203C112.69 344.442 87.3706 418.62 83.8633 485.962C78.5463 587.852 131.542 690.794 217.566 745.666"
                        stroke="currentColor" stroke-miterlimit="10" />
                </svg>
                <svg class="shape shape-right text-light" width="474" height="511" viewBox="0 0 474 511"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M601.776 325.899C579.043 348.894 552.727 371.275 520.74 375.956C478.826 382.079 438.015 355.5 412.619 321.6C387.211 287.707 373.264 246.852 354.93 208.66C336.584 170.473 311.566 132.682 273.247 114.593C220.12 89.5159 155.704 108.4 99.7772 90.3769C53.1531 75.3464 16.3392 33.2759 7.65012 -14.947"
                        stroke="currentColor" stroke-miterlimit="10" />
                    <path
                        d="M585.78 298.192C564.28 319.945 539.378 341.122 509.124 345.548C469.472 351.341 430.868 326.199 406.845 294.131C382.805 262.059 369.62 223.419 352.278 187.293C334.936 151.168 311.254 115.417 275.009 98.311C224.74 74.582 163.815 92.4554 110.913 75.3971C66.8087 61.1784 31.979 21.3767 23.7639 -24.2362"
                        stroke="currentColor" stroke-miterlimit="10" />
                    <path
                        d="M569.783 270.486C549.5 290.99 526.04 310.962 497.501 315.13C460.111 320.592 423.715 296.887 401.059 266.641C378.392 236.402 365.963 199.965 349.596 165.901C333.24 131.832 310.911 98.1265 276.74 82.0034C229.347 59.6271 171.895 76.4848 122.013 60.4086C80.419 47.0077 47.5905 9.47947 39.8431 -33.5342"
                        stroke="currentColor" stroke-miterlimit="10" />
                    <path
                        d="M553.787 242.779C534.737 262.041 512.691 280.809 485.884 284.722C450.757 289.853 416.568 267.586 395.286 239.173C373.993 210.766 362.308 176.538 346.945 144.535C331.581 112.533 310.605 80.8723 278.502 65.7217C233.984 44.6979 180.006 60.54 133.149 45.4289C94.0746 32.8398 63.2303 -2.41965 55.9568 -42.8233"
                        stroke="currentColor" stroke-miterlimit="10" />
                    <path
                        d="M537.791 215.073C519.964 233.098 499.336 250.645 474.269 254.315C441.41 259.126 409.422 238.286 389.513 211.704C369.594 185.13 358.665 153.106 344.294 123.17C329.923 93.2337 310.293 63.6078 280.258 49.4296C238.605 29.7646 188.105 44.5741 144.268 30.4451C107.714 18.6677 78.8538 -14.3229 72.0543 -52.1165"
                        stroke="currentColor" stroke-miterlimit="10" />
                </svg>
            </div>
        </div>
    </section>

@endsection
