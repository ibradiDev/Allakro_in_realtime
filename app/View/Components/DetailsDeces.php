<?php

namespace App\View\Components;

use App\Models\Deces;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DetailsDeces extends Component
{
    public Deces $deces;
    /**
     * Create a new component instance.
     */
    public function __construct(Deces $deces)
    {
        $this->deces = $deces;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.details-deces', ['mort' => $this->deces]);
    }
}