<?php

namespace App\View\Components;

use App\Models\Pharmacie;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DetailsPharmacie extends Component
{
    public Pharmacie $pharmacie;
    /**
     * Create a new component instance.
     */
    public function __construct(Pharmacie $pharmacie)
    {
        $this->pharmacie = $pharmacie;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.details-pharmacie', ['pharmacie' => $this->pharmacie]);
    }
}