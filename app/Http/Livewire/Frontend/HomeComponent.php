<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Slide;
use App\Models\Service;
use App\Models\Customer;
use App\Models\News;
use App\Models\Page;
use DB;
use Cart;

class HomeComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $sliders = Slide::orderBy('id','desc')->where('active',1)->get();
        $services = Service::where('status',1)->take(4)->get();
        $news = News::orderBy('created_at','desc')->where('status',1)->take(9)->get();

        $history = Page::where('id',1)->first();
        $vision = Page::where('id',4)->first();

        return view('livewire.frontend.home-component', compact('sliders','services','news','history','vision'))
        ->layout('layouts.frontend.base-frontend');
    }
}
