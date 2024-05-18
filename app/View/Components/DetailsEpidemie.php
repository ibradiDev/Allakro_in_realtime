<?php

namespace App\View\Components;

use App\Models\Epidemie;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DetailsEpidemie extends Component
{
    public Epidemie $epidemie;
    /**
     * Create a new component instance.
     */
    public function __construct(Epidemie $epidemie)
    {
        $this->epidemie = $epidemie;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.details-epidemie', ['epidemie' => $this->epidemie]);
    }
}