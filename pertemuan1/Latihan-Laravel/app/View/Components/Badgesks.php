<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BadgeSks extends Component
{

    public function __construct(public int $sks)
    {}

    public function render()
    {
        return view('components.badge-sks');
    }
}