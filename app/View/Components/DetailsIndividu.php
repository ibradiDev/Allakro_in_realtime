<?php

namespace App\View\Components;

use App\Models\Individus;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DetailsIndividu extends Component
{
    public Individus $individu;
    /**
     * Create a new component instance.
     */
    public function __construct(Individus $individu)
    {
        $this->individu = $individu;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.details-individu', ['individu' => $this->individu]);
    }
}