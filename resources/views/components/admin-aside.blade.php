 <!-- Menu -->
 <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
     <div class="app-brand demo">
         <a href="{{ url('/') }}" class="app-brand justify-content-center">
             <img src="{{ asset('admin/assets/img/logos/logo-allakro.png') }}" class="app-brand-link" alt="logo-allakro">
         </a>

         <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
             <i class="bx bx-chevron-left bx-sm align-middle"></i>
         </a>
     </div>

     <div class="menu-inner-shadow"></div>

     <ul class="menu-inner py-1">
         <!-- Dashboard -->
         <li class="menu-item <?= request()->is('*dashboard*') ? 'active' : '' ?>">
             <a href="{{ route('dashboard') }}" class="menu-link">
                 <i class="menu-icon tf-icons fa fa-home"></i>
                 <div data-i18n="Analytics">Tableau de board</div>
             </a>
         </li>

         <li class="menu-header small text-uppercase">
             <span class="menu-header-text">Fil d'actualité</span>
         </li>

         <li class="menu-item <?= request()->is('*actualite*') || request()->is('*projet*') ? 'active' : '' ?>">
             <a href="{{ route('actualites.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons fa fa-info"></i>
                 <div data-i18n="Basic">Actualités</div>


             </a>
         </li>

         <li class="menu-header small text-uppercase">
             <span class="menu-header-text">Populations</span>
         </li>

         <li class="menu-item <?= request()->is('*famille*') ? 'active' : '' ?>">
             <a href="{{ route('familles.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons fa fa-users"></i>
                 <div data-i18n="Basic">Familles</div>
             </a>
         </li>

         <li class="menu-item <?= request()->is('*individu*') ? 'active' : '' ?>">
             <a href="{{ route('individus.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons fa fa-male"></i>
                 <div data-i18n="Basic">Individus</div>
             </a>
         </li>

         <li class="menu-item <?= request()->is('*naissance*') ? 'active' : '' ?>">
             <a href="{{ route('naissance.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons fa fa-baby"></i>
                 <div data-i18n="Basic">Naissances</div>
                 @if ($naissancebg > 0)
                 <span class="badge badge-center rounded-pill bg-success" style="margin-left: auto;font-weight:bold;">{{ $naissancebg }}</span>
                 @endif
             </a>
         </li>

         <li class="menu-item <?= request()->is('*deces*') ? 'active' : '' ?>">
             <a href="{{ route('deces.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons fa fa-cross"></i>
                 <div data-i18n="Boxicons">Décès</div>
                 @if ($decesbg > 0)
                 <span class="badge badge-center rounded-pill bg-success" style="margin-left: auto;font-weight:bold;">{{ $decesbg }}</span>
                 @endif
             </a>
         </li>


         <li class="menu-header small text-uppercase">
             <span class="menu-header-text">Santé</span>
         </li>
         <!-- Cards -->
         <li class="menu-item <?= request()->is('*pharmacie*') ? 'active' : '' ?>">
             <a href="{{ route('pharmacie.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons fa fa-plus"></i>
                 <div data-i18n="Basic">Pharmacies</div>

             </a>
         </li>

         <li class="menu-item  <?= request()->is('*centre*') ? 'active' : '' ?>">
             <a href="{{ route('centres.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons fa fa-clinic-medical"></i>
                 <div data-i18n="Boxicons">Centres de santé</div>
             </a>
         </li>

         <li class="menu-item  <?= request()->is('*maladie*') ? 'active' : '' ?>">
             <a href="{{ route('maladies.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons fa fa-pills"></i>
                 <div data-i18n="Boxicons">Maladies</div>
             </a>
         </li>

         <li class="menu-item  <?= request()->is('*epidemie*') ? 'active' : '' ?>">
             <a href="{{ route('epidemies.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons fa fa-virus"></i>
                 <div data-i18n="Boxicons">Epidemies</div>
             </a>
         </li>


         <li class="menu-header small text-uppercase">
             <span class="menu-header-text">Déplacements</span>
         </li>
         <li class="menu-item  <?= request()->is('*amenagement*') ? 'active' : '' ?>">
             <a href="{{ route('amenagement.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons fa fa-car"></i>
                 <div data-i18n="Boxicons">Aménagement</div>
                 @if ($amenagementsbg > 0)
                 <span class="badge badge-center rounded-pill bg-success" style="margin-left: auto;font-weight:bold;">{{ $amenagementsbg }}</span>
                 @endif
             </a>
         </li>

         <li class="menu-item  <?= request()->is('*demenagement*') ? 'active' : '' ?>">
             <a href="{{ route('demenagement.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-car"></i>
                 <div data-i18n="Boxicons">Déménagement</div>
                 @if ($demenagementsbg > 0)
                 <span class="badge badge-center rounded-pill bg-success" style="margin-left: auto;font-weight:bold;">{{ $demenagementsbg }}</span>
                 @endif
             </a>
         </li>

         <li class="menu-header small text-uppercase">
             <span class="menu-header-text">Services</span>
         </li>
         <li class="menu-item  <?= request()->is('*offre*') ? 'active' : '' ?>">
             <a href="{{ route('offre-emploi.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons fa fa-briefcase"></i>
                 <div data-i18n="Boxicons">Offre d'emploi</div>
                 @if ($offreEmploibg > 0)
                 <span class="badge badge-center rounded-pill bg-success" style="margin-left: auto;font-weight:bold;">{{ $offreEmploibg }}</span>
                 @endif
             </a>
         </li>

         <li class="menu-header small text-uppercase">
             <span class="menu-header-text">Messagerie</span>
         </li>
         <li class="menu-item  <?= request()->is('*messagerie*') ? 'active' : '' ?>">
             <a href="{{ route('messagerie.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons fa fa-inbox"></i>
                 <div data-i18n="Boxicons">Messages</div>
                 @if ($messageriebg > 0)
                 <span class="badge badge-center rounded-pill bg-success" style="margin-left: auto;font-weight:bold;">{{ $messageriebg }}
                 </span>
                 @endif
             </a>
         </li>
         <!-- Logout -->
         <li class="menu-header small text-uppercase">
             <span class="menu-header-text"><i class="bx bx-log-out"></i></span>
         </li>
         <li class="menu-item">
             <small class="menu-link py-0 mt-0 mb-2">
                 <a href="{{ route('new-user', 'sec-level-admin') }}">
                     {{__('Créer un administrateur')}}
                 </a>
             </small>

             <a href="{{ route('logout') }}" target="_blank" class="menu-link btn btn-xs text-danger btn-outline-danger" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                 <i class="menu-icon tf-icons bx bx-log-out-circle"></i>
                 <div data-i18n="Support">Déconnexion</div>
             </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
         </li>
     </ul>
 </aside>
 <!-- / Menu -->
