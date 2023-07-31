<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Service;

class ServiceDetailComponent extends Component
{
    public $hiddenId;

    public function mount($id)
    {
        $service = Service::find($id);
        $this->hiddenId = $service->id;
    }

    public function render()
    {
        $service = Service::where('id', $this->hiddenId)->first();
        return view('livewire.frontend.service-detail-component', compact('service'))
        ->layout('layouts.frontend.base-frontend');
    }
}
