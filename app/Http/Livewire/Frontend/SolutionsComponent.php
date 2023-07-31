<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Solution;
use App\Models\SolutionType;

class SolutionsComponent extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
        
    public $search, $searchByType;

    public function mount()
    {
        $this->searchByType;
    }
        
    public function render()
    {
        $solutions = Solution::orderBy('id','desc')
            ->where('solution_type_id','like', '%'. $this->searchByType . '%')
            ->where('name_la','like', '%'. $this->search . '%')
            //->where('name_en','like', '%'. $this->search . '%')
            ->where('status',1)->paginate(20);

        $solution_type = SolutionType::all();

        return view('livewire.frontend.solutions-component', compact('solutions','solution_type'))
        ->layout('layouts.frontend.base-frontend');
    }

    public function searchByType($id)
    {
        $singleData = SolutionType::find($id);
        $this->searchByType = $singleData->id;
    }
}
