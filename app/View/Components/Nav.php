<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class Nav extends Component
{
    public $items;
    public $active;

    public function __construct()
    {
        $this->items = config('nav'); // استدعاء البيانات من ملف الإعدادات
        $this->active = Route::currentRouteName(); 
    }

    public function render(): View|Closure|string
    {
        return view('components.nav');
    }
}
