<?php

namespace App\View\Components\Partial\Cards;

use Illuminate\View\Component;

class TopBorderCard extends Component
{
    public $logo;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($logo)
    {
        $this->logo = $logo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.partial.cards.top-border-card');
    }
}
