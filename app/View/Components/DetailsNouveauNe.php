<?php

namespace App\View\Components;

use App\Models\Naissance;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DetailsNouveauNe extends Component
{
    public Naissance $naissance;
    /**
     * Create a new component instance.
     */
    public function __construct(Naissance $naissance)
    {
        $this->naissance = $naissance;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // dd($this->naissance);
        return view('components.details-nouveau-ne', ['enfant' => $this->naissance]);
    }
}