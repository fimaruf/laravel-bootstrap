<?php

namespace Wovosoft\LaravelBootstrap\View\Components;

use Illuminate\View\Component;

class DashboardLayout extends Component
{
    public $sidebar;

    /**
     * Create a new component instance.
     *
     * @param null $sidebar
     */
    public function __construct($sidebar = null)
    {
        $this->sidebar = $sidebar;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravel-bootstrap::components.dashboard-layout');
    }
}
