<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class WhyChoose extends Component
{
    public function render(): View|Closure|string
    {
        return view('components.why-choose');
    }
}
