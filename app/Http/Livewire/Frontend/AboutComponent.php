<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Page;

class AboutComponent extends Component
{
    public function render()
    {
        $about = Page::select('des_la','des_en')->where('id',1)->first();
        return view('livewire.frontend.about-component', compact('about'))
        ->layout('layouts.frontend.base-frontend');
    }
}
