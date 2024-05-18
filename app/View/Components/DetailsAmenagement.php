<?php

namespace App\View\Components;

use App\Models\Amenagement;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DetailsAmenagement extends Component
{
    public Amenagement $amenagement;
    /**
     * Create a new component instance.
     */
    public function __construct(Amenagement $amenagement)
    {
        $this->amenagement = $amenagement;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.details-amenagement', ['amenage' => $this->amenagement]);
    }
}