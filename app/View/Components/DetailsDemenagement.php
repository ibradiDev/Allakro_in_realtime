<?php

namespace App\View\Components;

use App\Models\Demenagement;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DetailsDemenagement extends Component
{
    public Demenagement $demenagement;
    /**
     * Create a new component instance.
     */
    public function __construct(Demenagement $demenagement)
    {
        $this->demenagement = $demenagement;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.details-demenagement', ['demenage' => $this->demenagement]);
    }
}