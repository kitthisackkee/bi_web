<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ExportDoc;
use App\Models\ImportDoc;
use App\Models\LocalDoc;
use App\Models\Employee;
use App\Models\Payroll;
use App\Models\User;
use App\Models\News;
use App\Models\Service;
use App\Models\Page;
use App\Models\Slide;
use App\Models\Role;
use App\Models\Message;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $im_count = ImportDoc::count();
        $ex_count = ExportDoc::count();
        $local_count = LocalDoc::count();

        $user_count = User::count();
        $role_count = Role::count();

        $posts = News::where('status',1)->count();
        $courses = Service::where('status',1)->count();
        $pages = Page::where('status',1)->count();
        $slide = Slide::where('active',1)->count();

        $messages = Message::orderBy('id','desc')->where('status',1)->paginate(5);

        $book = Book::where('term_id', Auth::user()->term_id)->get();

        return view('backend.dashboard', compact('im_count','ex_count','local_count','user_count',
        'posts','courses','pages','slide','role_count','messages','book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
