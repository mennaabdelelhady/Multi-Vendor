<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Nav extends Component
{
    public $items;

    public $active;
    /**
     * Create a new component instance.
     */
    public function __construct($context = 'side')
    {
        $this->items =config('nav');

        //$this->active = request()->route()->getName();
        $this->active = Route::currentRouteName();

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.nav');
    }
}
