<?php

namespace App\View\Components\Partial\Cards;

use Illuminate\View\Component;

class BookCard extends Component
{
    public $image;
    public $bookType;
    public $link;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($image = null, $bookType = null, $link = null)
    {
        $this->image = $image;
        $this->bookType = $bookType;
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.partial.cards.book-card');
    }
}
