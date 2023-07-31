<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Service;

class ServiceComponent extends Component
{
    public function render()
    {
        $courses = Service::where('status',1)->get();
        return view('livewire.frontend.service-component', compact('courses'))
        ->layout('layouts.frontend.base-frontend');
    }
}
