<div class="modal applayLoanModal fade" id="details_demenagement_{{ $demenage->id }}" tabindex="-1"
    aria-labelledby="details_demenagement_{{ $demenage->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalScrollableTitle" style='font-weight: 900;'>
                    Détails de l'enregistrement &circledast;

                    <small>
                        Status:
                        @if ($demenage->status === 0)
                            <span class="badge bg-label-warning">En attente </span>
                        @elseif($demenage->status === 1)
                            <span class="badge badge-success">Acceptée</span>
                        @elseif($demenage->status === 2)
                            <span class="badge bg-label-primary">Réfusée</span>
                        @elseif($demenage->status === 3)
                            <span class="badge bg-label-danger">Supprimée</span>
                        @endif
                    </small>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="d-flex justify-content-between">
                        <h5 class="text-end col-4">Déménagement De:</h5>
                        <h5 class="text-danger col-7 text-start">{{ $demenage->nom_complet_dmg }}</h5>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5 class="text-end col-4">De la famille:</h5>
                        <h5 class="text-primary col-7 text-start">
                            {{ $demenage->FamilleDemenagement->nom_famille ?? 'ND' }}
                            &nbsp;
                            @if (isset($demenage->FamilleDemenagement->id))
                                <a href="{{ route('familles.show', [$demenage->FamilleDemenagement->id]) }}"
                                    class="href" style="color: #002a6a;font-size: 14px;font-weight: 900;">(Consulter)
                                </a>
                            @endif
                        </h5>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5 class="text-end col-4">Sexe:</h5>
                        <h5 class="text-primary col-7 text-start">{{ $demenage->sexe_dmg }}</h5>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5 class="text-end col-4">Né(e) le:</h5>
                        <h5 class="text-primary col-7 text-start">{{ $demenage->date_de_naissance }}</h5>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5 class="text-end col-4">Déménagé(e) le:</h5>
                        <h5 class="text-primary col-7 text-start">{{ $demenage->date_demenagement }}</h5>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5 class="text-end col-4">Fonction:</h5>
                        <h5 class="text-primary col-7 text-start">{{ $demenage->fonction_dmg }}</h5>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5 class="text-end col-4">Destination:</h5>
                        <h5 class="text-primary col-7 text-start">{{ $demenage->destination }}</h5>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5 class="text-end col-4">Demande Envoyé par:</h5>
                        <h5 class="text-primary col-7 text-start">
                            @if ($demenage->individu_sended_id === null)
                                {{ Auth::user()->name }} (Administrateur)
                            @else
                                {{ $demenage->IndividusSendDemenagement->nom_individu }}&nbsp;{{ $demenage->IndividusSendDemenagement->prenom_individu }}
                                <a href="{{ route('individus.show', [$demenage->IndividusSendDemenagement->id]) }}"
                                    class="href" style="color: #002a6a;font-size: 14px;font-weight: 900;">(Voir)</a>
                            @endif
                        </h5>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5 class="text-end col-4">Enregistrée le:</h5>
                        <h5 class="text-primary col-7 text-start">{{ $demenage->created_at->format('d/m/Y à H:i') }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
