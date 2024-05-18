<div class="modal applayLoanModal fade" id="details_naissance_{{ $enfant->id }}" tabindex="-1"
    aria-labelledby="details_naissance_{{ $enfant->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalScrollableTitle" style='font-weight: 900;'>
                    Détails de l'enregistrement &circledast;
                    <small>
                        Status:
                        @if ($enfant->status === 0)
                            <span class="badge bg-label-warning">En attente </span>
                        @elseif($enfant->status === 1)
                            <span class="badge badge-success">Acceptée</span>
                        @elseif($enfant->status === 2)
                            <span class="badge bg-label-primary">Réfusée</span>
                        @elseif($enfant->status === 3)
                            <span class="badge bg-label-danger">Supprimée</span>
                        @endif
                    </small>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-between col-12">
                <div class="col-md-5 text-end">
                    <h5>Naissance de:</h5>
                    <h5>De la famille:</h5>
                    <h5>Né(e) le:</h5>
                    <h5>Sexe:</h5>
                    <h5>Mode de naissance:</h5>
                    <h5>Nom du père:</h5>
                    <h5>Nom de la mère:</h5>
                    <h5>Lieu habitation parents:</h5>
                    <h5>Demande Envoyé par:</h5>
                    <h5>Enregistrée le:</h5>
                </div>

                <div class="col-md-6">
                    <h5 class="text-danger">{{ $enfant->nom_complet }}</h5>
                    <h5 class="text-primary">{{ $enfant->FamilleNaissance->nom_famille??'ND' }} &nbsp;
                        @if (isset($enfant->FamilleNaissance->id))
                            <a href="{{ route('familles.show', $enfant->FamilleNaissance->id) }}" class="href"
                                style="color: #002a6a;font-size: 14px;font-weight: 900;">(Consulter)
                            </a>
                        @endif
                    </h5>
                    <h5 class="text-primary">{{ $enfant->date_de_naissance }}</h5>
                    <h5 class="text-primary">{{ $enfant->sexe_nouveau_ne }}</h5>
                    <h5 class="text-primary">{{ $enfant->mode_naissance }}</h5>
                    <h5 class="text-primary">{{ $enfant->pere_nouveau_ne }}</h5>
                    <h5 class="text-primary">{{ $enfant->mere_nouveau_ne }}</h5>
                    <h5 class="text-primary">{{ $enfant->lieu_habitation_famille }}</h5>
                    <h5 class="text-primary">
                        @if ($enfant->individus_sended_id === null)
                            {{ Auth::user()->name }} (Administrateur)
                        @else
                            {{ $enfant->IndividusSendNaissance->nom_individu }}&nbsp;{{ $enfant->IndividusSendNaissance->prenom_individu }}
                            <a href="{{ route('individus.show', [$enfant->IndividusSendNaissance->id]) }}"
                                class="href" style="color: #002a6a;font-size: 14px;font-weight: 900;">(Voir)</a>
                        @endif
                    </h5>
                    <h5 class="text-primary">{{ $enfant->created_at->format('d/m/Y à H:i') }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
