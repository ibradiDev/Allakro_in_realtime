<div class="modal applayLoanModal fade" id="details_offre_{{ $offre->id }}" tabindex="-1"
    aria-labelledby="details_offre_{{ $offre->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalScrollableTitle" style='font-weight: 900;'>
                    Détails sur l'offre publiée par <span class="text-danger">{{ $offre->nom_respo }}</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body nav-scrollbar">
                <div>
                    <div class="d-flex justify-content-between">
                        <h5 class="text-end col-4">Service proposé:</h5>
                        <h5 class="text-primary col-7 text-start">{{ $offre->service_propose }}</h5>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5 class="text-end col-4">Téléphone:</h5>
                        <h5 class="text-primary col-7 text-start">{{ $offre->telephone_respo }}</h5>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5 class="text-end col-4">Addresse email:</h5>
                        <h5 class="text-primary col-7 text-start">{{ $offre->email_respo }}</h5>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5 class="text-end col-4">Niveau d'étude:</h5>
                        <h5 class="text-primary col-7 text-start">{{ $offre->competance_requise }}</h5>
                        {{-- <h5 class="text-primary">{{ $offre->mode_offre }}</h5> --}}
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5 class="text-end col-4">Description:</h5>
                        <h5 class="text-primary col-7 text-start">{{ $offre->description_offre }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
