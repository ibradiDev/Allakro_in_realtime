<div class="modal applayLoanModal fade" id="details_projet_{{ $projet->id }}" tabindex="-1"
    aria-labelledby="details_projet_{{ $projet->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalScrollableTitle" style='font-weight: 900;'>
                    Détails de l'enregistrement &circledast;
                    <small>
                        Status:
                        @if ($projet->status === 1)
                            <span class="badge bg-label-success">En cours </span>
                        @elseif($projet->status === 0)
                            <span class="badge bg-label-danger">Terminé</span>
                        @endif
                    </small>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between">
                    <h5 class="text-end col-4">Titre:</h5>
                    <h5 class="text-primary col-7 text-start">{{ $projet->titre }}</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 class="text-end col-4">Début:</h5>
                    <h5 class="text-primary col-7 text-start">{{ $projet->debut_projet }}</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 class="text-end col-4">Fin prévu:</h5>
                    <h5 class="text-primary col-7 text-start">{{ $projet->fin_projet }}</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 class="text-end col-4">Description:</h5>
                    <h5 class="text-primary col-7 text-start">{{ $projet->description_projet }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
