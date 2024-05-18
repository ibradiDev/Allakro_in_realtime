<?php

namespace App\View\Components;

use App\Models\Famille;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DetailsFamille extends Component
{
    public Famille $famille;
    /**
     * Create a new component instance.
     */
    public function __construct(Famille $famille)
    {
        $this->famille = $famille;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.details-famille', ['famille' => $this->famille]);
    }
}