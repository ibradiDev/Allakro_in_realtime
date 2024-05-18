<?php

namespace App\View\Components;

use App\Models\ProjetMairie;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DetailsProjet extends Component
{
    public ProjetMairie $projet;
    /**
     * Create a new component instance.
     */
    public function __construct(ProjetMairie $projet)
    {
        $this->projet = $projet;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.details-projet', ['projet' => $this->projet]);
    }
}