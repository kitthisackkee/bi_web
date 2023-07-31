<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\News;

class NewsComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
        
    public $search;

    public function render()
    {
        $news = News::orderBy('created_at','desc')
            ->where('name_la','like', '%'. $this->search . '%')
            ->Orwhere('name_en','like', '%'. $this->search . '%')
            ->where('status',1)->paginate(20);
            
        return view('livewire.frontend.news-component', compact('news'))
        ->layout('layouts.frontend.base-frontend');
    }
}
