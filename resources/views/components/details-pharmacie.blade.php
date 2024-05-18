<div class="modal applayLoanModal fade" id="details_pharmacie_{{ $pharmacie->id }}" tabindex="-1"
    aria-labelledby="details_pharmacie_{{ $pharmacie->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalScrollableTitle" style='font-weight: 900;'>
                    Détails de l'enregistrement &circledast;
                    <small>
                        Status:
                        @if ($pharmacie->status === 1)
                            <span class="badge bg-label-success">Opérationnelle </span>
                        @elseif($pharmacie->status === 0 || $pharmacie->status === null)
                            <span class="badge bg-label-danger">Non opérationnelle</span>
                        @endif
                    </small>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between">
                    <h5 class="text-end col-4">pharmacie:</h5>
                    <h5 class="text-primary col-7 text-start">{{ $pharmacie->nom_pharmacie }}</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 class="text-end col-4">Téléphone:</h5>
                    <h5 class="text-primary col-7 text-start">{{ $pharmacie->telephone_pharmacie }}</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 class="text-end col-4">Email:</h5>
                    <h5 class="text-primary col-7 text-start">{{ $pharmacie->email_pharmacie }}</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 class="text-end col-4">Emplacement:</h5>
                    <h5 class="text-primary col-7 text-start">{{ $pharmacie->emplacement }}</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 class="text-end col-4">Etat de garde:</h5>
                    <h5 class="text-danger col-7 text-start">Pas de garde cette semaine</h5>
                </div>
            </div>
        </div>
    </div>
</div>
