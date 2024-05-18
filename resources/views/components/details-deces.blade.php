<div class="modal applayLoanModal fade" id="details_deces_{{ $mort->id }}" tabindex="-1"
    aria-labelledby="details_deces_{{ $mort->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalScrollableTitle" style='font-weight: 900;'>


                </h5>
                <h5 class="modal-title" id="modalScrollableTitle" style='font-weight: 900;'>
                    Détails de l'enregistrement &circledast;

                    <small>
                        Status:
                        @if ($mort->status === 0)
                        <span class="badge bg-label-warning">En attente </span>
                        @elseif($mort->status === 1)
                        <span class="badge badge-success">Acceptée</span>
                        @elseif($mort->status === 2)
                        <span class="badge bg-label-primary">Réfusée</span>
                        @elseif($mort->status === 3)
                        <span class="badge bg-label-danger">Supprimée</span>
                        @endif
                    </small>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-between col-12">
                <div class="col-md-5 text-end">
                    <h5>Décès de:</h5>
                    <h5>De la famille:</h5>
                    <h5>Sexe:</h5>
                    <h5>Né(e) le:</h5>
                    <h5>Décédé(e) le:</h5>
                    <h5>Lieu de décès:</h5>
                    <h5>Fonction:</h5>
                    <h5>Lieu de résidence:</h5>
                    <h5>Parent référent:</h5>
                    <h5>Raison du décès:</h5>
                    <h5>Demande Envoyé par:</h5>
                    <h5>Enregistrée le:</h5>
                </div>
                <div class="col-md-6">
                    <h5 class="text-danger">{{ $mort->nom_complet }}</h5>
                    <h5 class="text-primary">{{ $mort->FamilleDeces->nom_famille ?? 'ND' }} &nbsp;
                        @if (isset($mort->FamilleDeces->id))
                        <a href="{{ route('familles.show', $mort->FamilleDeces->id) }}" class="href"
                            style="color: #002a6a;font-size: 14px;font-weight: 900;">(Consulter)
                        </a>
                        @endif
                    </h5>
                    <h5 class="text-primary">{{ $mort->sexe_decede }}</h5>
                    <h5 class="text-primary">{{ $mort->date_de_naissance }}</h5>
                    <h5 class="text-primary">{{ $mort->date_deces }}</h5>
                    <h5 class="text-primary">{{ $mort->mode_deces }}</h5>
                    <h5 class="text-primary">{{ $mort->fonction }}</h5>
                    <h5 class="text-primary">{{ $mort->lieu_habitation }}</h5>
                    <h5 class="text-primary">{{ $mort->parents_referent }}</h5>
                    <h5 class="text-primary">{{ $mort->raison_deces }}</h5>
                    <h5 class="text-primary">
                        @if ($mort->individus_sended_id === null)
                        {{ Auth::user()->name }} (Administrateur)
                        @else
                        {{ $mort->IndividusSendDeces->nom_individu }}&nbsp;{{ $mort->IndividusSendDeces->prenom_individu }}
                        <a href="{{ route('individus.show', [$mort->IndividusSendDeces->id]) }}" class="href"
                            style="color: #002a6a;font-size: 14px;font-weight: 900;">(Voir)</a>
                        @endif
                    </h5>
                    <h5 class="text-primary">{{ $mort->created_at->format('d/m/Y à H:i') }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>