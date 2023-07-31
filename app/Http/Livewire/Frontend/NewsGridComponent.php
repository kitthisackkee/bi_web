<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\News;
use App\Models\SolutionType;

class NewsGridComponent extends Component
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
        $news = News::orderBy('id','desc')
            ->where('news_type_id','like', '%'. $this->searchByType . '%')
            ->where('name_la','like', '%'. $this->search . '%')
            //->where('name_en','like', '%'. $this->search . '%')
            ->where('status',1)->paginate(20);

        $categorys = SolutionType::all();
        $random_news = News::inRandomOrder()->limit(10)->get();

        return view('livewire.frontend.news-grid-component', compact('news','categorys','random_news'))
        ->layout('layouts.frontend.base-frontend');
    }

    public function searchByType($id)
    {
        $singleData = SolutionType::find($id);
        $this->searchByType = $singleData->id;
    }
}
