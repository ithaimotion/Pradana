<?php

namespace App\View\Components;

use App\Models\FooterLink;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    public $footerLinksByType;

    public function __construct()
    {
        $this->footerLinksByType = FooterLink::where('aktif', true)
            ->orderBy('tipe')
            ->orderBy('urutan')
            ->get()
            ->groupBy('tipe');
    }

    public function render(): View|Closure|string
    {
        return view('components.footer');
    }
}
