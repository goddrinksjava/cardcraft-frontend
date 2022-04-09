<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RaibowCanvas extends Component
{
    /**
     * The url of an svg.
     *
     * @var string
     */
    public $mask;

    /**
     * CSS class of canvas.
     *
     * @var string
     */
    public $class;

    /**
     * Create a new component instance.
     *
     * @param  string  $mask
     * @param  string  $class
     * @return void
     */
    public function __construct($mask, $class = "")
    {
        $this->mask = $mask;
        $this->css = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.rainbow-canvas');
    }
}
