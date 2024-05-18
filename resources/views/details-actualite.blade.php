@extends('layouts.app')

@section('title', 'Allakro - Notre communauté - Actualité')

@section('content')
    <div class="section">
        <div class="container">
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
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="mb-5">
                        <h2 class="mb-4" style="line-height:1.5">{{ $getDatas->titre_actualite }}</h2>
                        <span>{{ $getDatas->created_at->format('d/m/Y, H:i') }} <span class="mx-2">/</span> </span>
                        <p class="list-inline-item">
                            Categorie : <a href="#!" class="ml-1">Actualité de Allakro </a>
                        </p>
                        <p class="list-inline-item">Tags : <a href="#!" class="ml-1">Photo </a> ,<a href="#!" class="ml-1">Image </a>
                        </p>
                    </div>
                    <div class="mb-5 text-center">
                        {{-- <div class="slick-track" style="opacity: 1; width: 6482px; transform: translate3d(-1852px, 0px, 0px);"> --}}
                            <img src="{{asset('font_utilisateurs/images/blog/post-1.jpg')}}" alt="Poste acrualité image" class="slick-slide slick-cloned" style="width: 50%;">
                        {{-- </div> --}}
                    </div>
                    <div class="content">
                        <p>{{ $getDatas->contenu }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('autres-scripts')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

@endsection
