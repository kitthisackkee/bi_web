<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Solution;

class SolutionsDetailComponent extends Component
{
    public $hiddenId;

    public function mount($id)
    {
        $solutions = Solution::find($id);
        $this->hiddenId = $solutions->id;
    }

    public function render()
    {
        $solutions = Solution::where('id', $this->hiddenId)->first();
        return view('livewire.frontend.solutions-detail-component', compact('solutions'))
        ->layout('layouts.frontend.base-frontend');
    }
}
