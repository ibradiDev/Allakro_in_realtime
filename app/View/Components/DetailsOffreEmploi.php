<?php

namespace App\View\Components;

use App\Models\OffreEmploi;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DetailsOffreEmploi extends Component
{
    public OffreEmploi $offre;
    /**
     * Create a new component instance.
     */
    public function __construct(OffreEmploi $offre)
    {
        $this->offre = $offre;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.details-offre-emploi', ['offre' => $this->offre]);
    }
}