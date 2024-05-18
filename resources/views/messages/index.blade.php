@php
    use App\Http\Middleware\Helpers\Text;
@endphp
@extends('layouts.admin')

@section('nav-title', 'MESSAGERIE')

@section('content')

    <!-- ENVOYER UN NOUVEAU MAIL-->
    <x-mail.send-to />

    <!-- DETAILS D'UN MAIL -->
    @foreach ($messages as $message)
        <x-details-message :message="$message" />
    @endforeach

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

    @if (session('ReplyError'))
        <div class="alert alert-danger mx-4 alert-dismissible" role="alert" style="font-weight: bold;">
            {{ session('ReplyError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('EmailDeleted'))
        <div class="alert alert-danger mx-4 alert-dismissible" role="alert" style="font-weight: bold;">
            {{ session('EmailDeleted') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('EmailViewed'))
        <span id="viewed" hidden>{{ session('EmailViewed') }}</span>
    @endif


    {{-- MODAL DES MESSAGES SORTANT --}}
    <div class="modal applyLoanModal fade" id="listMessagesSortant" tabindex="-1" aria-labelledby="authModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalScrollableTitle" style='font-weight: 900;'>
                        Liste des messages envoyés
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    @if (count($sendedMessages) > 0)
                        <ul class="p-0 m-0">
                            @foreach ($sendedMessages as $sendedMessage)
                                <div class="card mb-3">
                                    <div class="row g-0">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <h5 class="card-title"
                                                    style="display: flex;align-items: center;justify-content: space-between;font-weight:900;">
                                                    Envoyé à {{ $sendedMessage->receiver }}

                                                    <div class="dropdown">
                                                        <button class="btn p-0" type="button" id=""
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end"
                                                            aria-labelledby="transactionID" style="">

                                                            <form action="{{ route('messagerie.update', $sendedMessage) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')

                                                                <input type="hidden" name="status"value="0">
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
                                                    {{ \App\Http\Middleware\Helpers\Text::excerpt($sendedMessage->message, 30) }}
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </ul>
                    @else
                        <div class="alert alert-warning" role="alert">Aucun message envoyé pour le moment !</div>
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

    {{-- MODAL DES MESSAGES SUPPRIMES --}}
    <div class="modal applyLoanModal fade" id="listMessagesSupprimes" tabindex="-1" aria-labelledby="authModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalScrollableTitle" style='font-weight: 900;'>
                        Liste des messages supprimés
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    @if (count($deletedMessages) > 0)
                        <ul class="p-0 m-0">
                            @foreach ($deletedMessages as $deletedMessage)
                                <div class="card mb-3">
                                    <div class="row g-0">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <h5 class="card-title"
                                                    style="display: flex;align-items: center;justify-content: space-between;font-weight:900;">
                                                    Envoyé à {{ $deletedMessage->receiver }}

                                                    <div class="dropdown">
                                                        <button class="btn p-0" type="button" id=""
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end"
                                                            aria-labelledby="transactionID" style="">

                                                            <form
                                                                action="{{ route('messagerie.update', $deletedMessage) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')

                                                                <input type="hidden" name="status"value="0">
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
                                                    {{ \App\Http\Middleware\Helpers\Text::excerpt($deletedMessage->message, 30) }}
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </ul>
                    @else
                        <div class="alert alert-warning" role="alert">
                            Aucun message supprimé pour l'instant !
                        </div>
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

    {{-- COMPTEURS DE MESSAGES --}}
    <div class="row  justify-content-between">
        <div class="col-lg-4 col-md-12 col-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <h5 class="text-nowrap mb-2 font-w700">
                            Messages réçus
                        </h5>
                    </div>
                    <h3 class="card-title mb-2" style="font-weight: bold;">{{ count($messages) }}</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12 col-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <h5 class="text-nowrap mb-2">
                            Messages envoyés
                        </h5>
                    </div>
                    <h3 class="card-title mb-2" style="font-weight: bold;">
                        {{ count($sendedMessages) }}
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12 col-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <h5 class="text-nowrap mb-2">
                            Messages supprimés
                        </h5>
                    </div>
                    <h3 class="card-title mb-2" style="font-weight: bold;">
                        {{ count($deletedMessages) }}
                    </h3>
                </div>
            </div>
        </div>
    </div>

    {{-- TABLE DES MESSAGES ENTRANT --}}
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title">TABLE DES MESSAGES REÇU</h5>
            <div class="dropdown">
                <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID" style="">
                    <a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#addMailModal"
                        {{-- href="{{ route('messagerie.create') }}" --}}>Nouveau message</a>
                    <a class="dropdown-item" href="javascript:void(0);" type="button" data-bs-toggle="modal"
                        data-bs-target="#listMessagesSortant">Messages envoyés
                    </a>
                    <a class="dropdown-item" href="javascript:void(0);" type="button" data-bs-toggle="modal"
                        data-bs-target="#listMessagesSupprimes">Messages supprimés
                    </a>
                </div>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="font-weight: bold;">Envoyé par</th>
                    <th style="font-weight: bold;">Adresse email</th>
                    <th style="font-weight: bold;">Contenu</th>
                    <th style="font-weight: bold;">Etat</th>
                    <th style="font-weight: bold;">Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($messages as $message)
                    <tr>
                        <td>{{ $message->sender }}</td>
                        <td>{{ $message->sender_email }}</td>
                        <td>
                            {{ Text::excerpt($message->message) }}
                        </td>
                        <td>
                            @if ($message->message_state === 'non repondu')
                                <span class="badge bg-label-danger me-1">
                                    Non répondu
                                </span>
                            @else
                                <span class="badge bg-label-primary me-1">
                                    Déja répondu
                                </span>
                            @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" type="button" data-bs-toggle="modal"
                                        data-bs-target="#details_message{{ $message->id }}">
                                        <i class="bx bx-show me-1"></i>
                                        Consulter le mail
                                    </a>

                                    <a class="dropdown-item" href="{{ route('reply-to', $message->id) }}">
                                        <i class="bx bx-reply me-1"></i>
                                        Envoyer une réponse
                                    </a>

                                    @if ($message->status === 1)
                                        <form action="{{ route('messagerie.update', [$message]) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <input type="hidden" name="status" value="0">
                                            <button type="submit" class="dropdown-item text-danger"
                                                onclick="return confirm('Validez-vous la suppression ?');">
                                                <i class="fa fa-trash me-1"></i>
                                                Supprimer
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3 border-danger d-flex justify-content-center">
            <span>{!! $messages->links() !!}</span>
        </div>
    </div>

@endsection

@section('autres-scripts')
    <script>
        var v = document.getElementById('viewed');

        if (v != null && v.innerHTML == 'Email Viewed') {
            var s = document.getElementById('show_mail');
            s.click();
            // s.classList.add('');
        }

        /* $(document).ready(function() {
                $('#viewed').text == 'Email Viewed' ?
                    console.log('Vu') : console.log('Non vu');
            }); */
    </script>
@endsection
