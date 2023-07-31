<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use View;
use App\Models\Branch;
use App\Models\SolutionType;
use App\Models\Page;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        $generals = Branch::where('id',1)->first();
        $news_type = SolutionType::all();
        $pages = Page::where('status',1)->get();
        View::share(compact('generals','news_type','pages'));
    }
}
