<?php

namespace App\View\Components;

use App\Models\Maladie;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DetailsMaladie extends Component
{
    public Maladie $maladie;
    /**
     * Create a new component instance.
     */
    public function __construct(Maladie $maladie)
    {
        $this->maladie = $maladie;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.details-maladie', ['maladie' => $this->maladie]);
    }
}