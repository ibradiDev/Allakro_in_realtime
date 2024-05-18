<div class="modal applayLoanModal fade" id="details_centre_{{ $centre->id }}" tabindex="-1"
    aria-labelledby="details_centre_{{ $centre->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalScrollableTitle" style='font-weight: 900;'>
                    Détails de l'enregistrement &circledast;
                    <small>
                        Status:
                        @if ($centre->status === 1)
                            <span class="badge bg-label-success">Opérationnelle </span>
                        @elseif($centre->status === 0)
                            <span class="badge bg-label-danger">Non opérationnelle</span>
                        @endif
                    </small>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between">
                    <h5 class="text-end col-4">Nom:</h5>
                    <h5 class="text-primary col-7 text-start">{{ $centre->nom_centre }}</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 class="text-end col-4">Téléphone:</h5>
                    <h5 class="text-primary col-7 text-start">{{ $centre->telephone_centre }}</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 class="text-end col-4">Email:</h5>
                    <h5 class="text-primary col-7 text-start">{{ $centre->email_centre }}</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 class="text-end col-4">Emplacement:</h5>
                    <h5 class="text-primary col-7 text-start">{{ $centre->emplacement_centre }}</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 class="text-end col-4">Services offerts:</h5>
                    <h5 class="text-primary col-7 text-start">{{ $centre->offre_centre }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
