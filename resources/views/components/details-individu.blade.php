<div class="modal applayLoanModal fade" id="details_individu_{{ $individu->id }}" tabindex="-1"
    aria-labelledby="details_individu_{{ $individu->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalScrollableTitle" style='font-weight: 900;'>
                    Détails de l'enregistrement &circledast;
                    <small>
                        Status:
                        @if ($individu->status_indiv === 1)
                            <span class="badge bg-label-success">Enregistré </span>
                        @elseif($individu->status_indiv === 0)
                            <span class="badge bg-label-danger">Supprimée</span>
                        @endif
                    </small>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between">
                    <h5 class="text-end col-4">Nom:</h5>
                    <h5 class="text-primary col-7 text-start">{{ $individu->nom_individu }}</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 class="text-end col-4">Prénom:</h5>
                    <h5 class="text-primary col-7 text-start">{{ $individu->prenom_individu }}</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 class="text-end col-4">Né(e) le:</h5>
                    <h5 class="text-primary col-7 text-start">{{ $individu->date_naissance }}</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 class="text-end col-4">Sexe:</h5>
                    <h5 class="text-primary col-7 text-start">{{ $individu->sexe_individu }}</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 class="text-end col-4">S. Matrimoniale:</h5>
                    <h5 class="text-primary col-7 text-start">{{ $individu->situation_matrimoniale }}</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 class="text-end col-4">Profession:</h5>
                    <h5 class="text-primary col-7 text-start">{{ $individu->profession_individu }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
