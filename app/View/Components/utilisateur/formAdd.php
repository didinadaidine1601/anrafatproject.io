<?php

namespace App\View\Components\utilisateur;

use Illuminate\View\Component;

class formAdd extends Component
{
    public $titre;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($titre)
    {
        $this->titre=$titre;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.utilisateur.form-add');
    }
}
