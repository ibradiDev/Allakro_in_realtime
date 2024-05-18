<div class="modal applayLoanModal fade" id="details_message{{ $message->id }}" tabindex="-1"
    aria-labelledby="details_message{{ $message->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalScrollableTitle" style='font-weight: 900;'>
                    Détails du mail &circledast;
                    <small>
                        Type:
                        <span class="badge bg-label-info">message {{ $message->type }}</span>
                    </small>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between">
                    <h5 class="text-end col-4">Auteur:</h5>
                    <h5 class="text-primary col-7 text-start">{{ $message->sender }}</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 class="text-end col-4">Adresse Email:</h5>
                    <h5 class="text-primary col-7 text-start">{{ $message->sender_email }}</h5>
                </div>  
                <div class="d-flex justify-content-between">
                    <h5 class="text-end col-4">Message:</h5>
                    <h5 class="text-primary col-7 text-start">{{ $message->message }}</h5>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-success text-white" href="{{ route('reply-to', $message->id) }}">
                    <i class="bx bx-reply me-1"></i>
                    Envoyer une réponse
                </a>
            </div>

            {{-- FORMULAIRE DE REPONSE --}}
            <div>

            </div>
        </div>
    </div>
</div>
