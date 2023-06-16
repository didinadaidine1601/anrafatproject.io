<?php

namespace App\View\Components\matiere;

use Illuminate\View\Component;

class formAdd extends Component
{
    public $titre;
    public $listProf;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($titres, $listProf)
    {
        $this->titre=$titres;
        $this->listProf=$listProf;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.matiere.form-add');
    }
}
