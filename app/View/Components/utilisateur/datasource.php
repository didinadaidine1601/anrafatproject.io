<?php

namespace App\View\Components\utilisateur;

use Illuminate\View\Component;

class datasource extends Component
{

    public $titre;
    public $list;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($titre,$list)
    {
        $this->titre=$titre;
        $this->list=$list;
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.utilisateur.datasource');
    }
}
