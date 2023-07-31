<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class CheckoutComponent extends Component
{
    public function render()
    {
        return view('livewire.frontend.checkout-component')
        ->layout('layouts.frontend.base-frontend');
    }
}
