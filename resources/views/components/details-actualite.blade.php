<div class="modal applayLoanModal fade" id="details_actualite_{{ $actualite->id }}" tabindex="-1"
    aria-labelledby="details_actualite_{{ $actualite->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalScrollableTitle" style='font-weight: 900;'>
                    Détails de l'enregistrement &circledast;
                    <small>
                        Status:
                        @if ($actualite->status === 1)
                            <span class="badge bg-label-success">Valide</span>
                        @elseif($actualite->status === 0)
                            <span class="badge bg-label-danger">Expiré</span>
                        @endif
                    </small>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between">
                    <h5 class="text-end col-4">Titre:</h5>
                    <h5 class="text-primary col-7 text-start">{{ $actualite->titre_actualite }}</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 class="text-end col-4">Contenu:</h5>
                    <h5 class="text-primary col-7 text-start">{{ $actualite->contenu }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
