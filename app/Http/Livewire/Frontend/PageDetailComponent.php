<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Page;
use App\Models\SolutionType;
use App\Models\News;

class PageDetailComponent extends Component
{
    public $hiddenId;

    public function mount($id)
    {
        $pages = Page::find($id);
        $this->hiddenId = $pages->id;
    }

    public function render()
    {
        $pages = Page::where('id', $this->hiddenId)->first();
        $categorys = SolutionType::all();
        $random_news = News::inRandomOrder()->limit(20)->get();
        return view('livewire.frontend.page-detail-component', compact('pages','categorys','random_news'))
        ->layout('layouts.frontend.base-frontend');
    }
}
