<?php

namespace App\View\Components;

use App\Models\CentreDeSante;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DetailsCentreDeSante extends Component
{
    public CentreDeSante $centre;
    /**
     * Create a new component instance.
     */
    public function __construct(CentreDeSante $centre)
    {
        $this->centre = $centre;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.details-centre-de-sante', ['centre' => $this->centre]);
    }
}