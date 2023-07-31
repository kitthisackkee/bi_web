<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\News;
use App\Models\SolutionType;

class NewsDetailComponent extends Component
{
    public $hiddenId, $searchByType;

    public function mount($id)
    {
        $news = News::find($id);
        $this->hiddenId = $news->id;
        $this->searchByType;
    }

    public function render()
    {
        $news = News::where('id', $this->hiddenId)->first();
        $categorys = SolutionType::all();
        $random_news = News::inRandomOrder()->limit(15)->get();
        return view('livewire.frontend.news-detail-component', compact('news','categorys','random_news'))
        ->layout('layouts.frontend.base-frontend');
    }

    public function searchByType($id)
    {
        $singleData = SolutionType::find($id);
        $this->searchByType = $singleData->id;
    }
}
