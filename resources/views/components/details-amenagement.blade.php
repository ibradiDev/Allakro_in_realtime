<div class="modal applayLoanModal fade" id="details_amenagement_{{ $amenage->id }}" tabindex="-1"
    aria-labelledby="details_amenagement_{{ $amenage->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalScrollableTitle" style='font-weight: 900;'>
                    Détails de l'enregistrement &circledast;

                    <small>
                        Status:
                        @if ($amenage->status === 0)
                            <span class="badge bg-label-warning">En attente </span>
                        @elseif($amenage->status === 1)
                            <span class="badge badge-success">Acceptée</span>
                        @elseif($amenage->status === 2)
                            <span class="badge bg-label-primary">Réfusée</span>
                        @elseif($amenage->status === 3)
                            <span class="badge bg-label-danger">Supprimée</span>
                        @endif
                    </small>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="d-flex justify-content-between">
                        <h5 class="text-end col-4">Aménagement De: </h5>
                        <h5 class="text-danger col-7 text-start">{{ $amenage->nom_complet_amg }}</h5>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5 class="text-end col-4">De la famille:</h5>
                        <h5 class="text-primary col-7 text-start">
                            {{ $amenage->FamilleAmenagement->nom_famille ?? 'ND' }}
                            &nbsp;
                            @if (isset($amenage->FamilleAmenagement->id))
                                <a href="{{ route('familles.show', $amenage->FamilleAmenagement->id) }}"
                                    class="href" style="color: #002a6a;font-size: 14px;font-weight: 900;">(Consulter)
                                </a>
                            @endif
                        </h5>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5 class="text-end col-4">Sexe:</h5>
                        <h5 class="text-primary col-7 text-start">{{ $amenage->sexe_amg }}</h5>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5 class="text-end col-4">Né(e) le:</h5>
                        <h5 class="text-primary col-7 text-start">{{ $amenage->date_de_naissance }}</h5>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5 class="text-end col-4">Aménagé(e) le:</h5>
                        <h5 class="text-primary col-7 text-start">{{ $amenage->date_amenagement }}</h5>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5 class="text-end col-4">Fonction:</h5>
                        <h5 class="text-primary col-7 text-start">{{ $amenage->fonction_amg }}</h5>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5 class="text-end col-4">Provenance:</h5>
                        <h5 class="text-primary col-7 text-start">{{ $amenage->provenance }}</h5>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5 class="text-end col-4">Demande Envoyé par:</h5>
                        <h5 class="text-primary col-7 text-start">
                            @if ($amenage->indiv_sended_id === null)
                                {{ Auth::user()->name }} (Administrateur)
                            @else
                                {{ $amenage->IndividusSendAmenagement->nom_individu }}&nbsp;{{ $amenage->IndividusSendAmenagement->prenom_individu }}
                                <a href="{{ route('individus.show', [$amenage->IndividusSendAmenagement->id]) }}"
                                    class="href" style="color: #002a6a;font-size: 14px;font-weight: 900;">(Voir)</a>
                            @endif
                        </h5>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5 class="text-end col-4">Enregistrée le:</h5>
                        <h5 class="text-primary col-7 text-start">{{ $amenage->created_at->format('d/m/Y à H:i') }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
