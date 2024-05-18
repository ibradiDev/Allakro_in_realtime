<?php

namespace App\View\Components;

use App\Models\Actualite;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DetailsActualite extends Component
{
    public Actualite $actualite;
    /**
     * Create a new component instance.
     */
    public function __construct(Actualite $actualite)
    {
        $this->actualite = $actualite;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.details-actualite', ['actualite' => $this->actualite]);
    }
}