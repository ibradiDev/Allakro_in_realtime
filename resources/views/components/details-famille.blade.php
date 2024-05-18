<div class="modal applayLoanModal fade" id="details_famille_{{ $famille->id }}" tabindex="-1"
    aria-labelledby="details_famille_{{ $famille->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalScrollableTitle" style='font-weight: 900;'>
                    Détails de l'enregistrement &circledast;
                    <small>
                        Status:
                        @if ($famille->status === 1)
                            <span class="badge bg-label-success">Enregistré </span>
                        @elseif($famille->status === 0)
                            <span class="badge bg-label-danger">Supprimée</span>
                        @endif
                    </small>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between">
                    <h5 class="text-end col-4">Famille:</h5>
                    <h5 class="text-primary col-7 text-start">{{ $famille->nom_famille }}</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 class="text-end col-4">Téléphone:</h5>
                    <h5 class="text-primary col-7 text-start">{{ $famille->telephone_famille }}</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 class="text-end col-4">Email:</h5>
                    <h5 class="text-primary col-7 text-start">{{ $famille->email_famille }}</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 class="text-end col-4">Lieu habitation:</h5>
                    <h5 class="text-primary col-7 text-start">{{ $famille->lieu_habitation }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
