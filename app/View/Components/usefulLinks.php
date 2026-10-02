<?php

namespace App\View\Components;

use Illuminate\View\Component;

class usefulLinks extends Component
{
    public $class = null;
    public $contactLink = null;
    public $privacyLink = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($class=null, $contactLink=false, $privacyLink=false)
    {
        $this->class = $class;
        $this->contactLink = $contactLink;
        $this->privacyLink = $privacyLink;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.useful-links');
    }
}
