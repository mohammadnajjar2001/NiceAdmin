<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class Nav3 extends Component
{
    public $items;
    public $active;

    public function __construct()
    {
        $this->items = config('nav3'); // استدعاء البيانات من ملف الإعدادات
        $this->active = Route::currentRouteName();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.nav3');
    }
}
