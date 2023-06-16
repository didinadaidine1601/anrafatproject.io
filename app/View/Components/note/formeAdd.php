<?php

namespace App\View\Components\note;

use Illuminate\View\Component;
use App\Models\Matiere;
use App\Models\Option;


class formeAdd extends Component
{

    public $titre;
    public $matiere;
    public $option;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($titre)
    {
         $this->titre=$titre;
         $this->matiere=Matiere::selectRaw('matieres.*')->get();
         $this->option=Option::selectRaw('options.*')->get();
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.note.forme-add');
    }
}
