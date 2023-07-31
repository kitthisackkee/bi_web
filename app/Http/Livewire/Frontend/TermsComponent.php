<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Page;

class TermsComponent extends Component
{
    public function render()
    {
        $terms = Page::select('des_la','des_en')->where('id',2)->first();
        return view('livewire.frontend.terms-component', compact('terms'))
        ->layout('layouts.frontend.base-frontend');
    }
}
