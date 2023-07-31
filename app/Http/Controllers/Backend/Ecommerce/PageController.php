<?php

namespace App\Http\Controllers\Backend\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('backend.ecommerce.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.ecommerce.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'=>'required|image|max:1024',
            'title_la'=>'required',
            'title_en'=>'required'
        ],[
            'image.image'=>'ກະລຸນາເລືອກຮູບ',
            'image.max'=>'ຮູບໃຫຍ່ກວ່າ 1024 px ກະລຸນາເລືອກໃໝ່!',
            'title_la.required'=>'ໃສ່ຊື່ໜ້າເວັບໄຊພາສາລາວກ່ອນ!',
            'title_en.required'=>'ໃສ່ຊື່ໜ້າເວັບໄຊພາສາອັງກິດກ່ອນ!',
        ]);

        $image = $request->image;
        $filename = time().$image->getClientOriginalName();

        Page::create([
            'image'=>'images/pages/'.$filename,
            'title_la'=>$request->title_la,
            'title_en'=>$request->title_en,
            'slug'=>$request->slug,
            'des_la'=>$request->des_la,
            'des_en'=>$request->des_en,
            'status'=>$request->status,
            'user_id'=> auth()->user()->id,
        ]);
        $image->move('images/pages/',$filename);
        return redirect()->route('page.index')->with('success','ເພີ່ມຂໍ້ມູນສຳເລັດ!');
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
        $page = Page::find($id);
        return view('backend.ecommerce.pages.edit', compact('page'));
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
        $request->validate([
            'title_la'=>'required'
        ],[
            'title_la.required'=>'ກະລຸນາໃສ່ຊື່ໜ້າເວັບ ພາສາສາລາວ ກ່ອນ!'
        ]);

        $page = Page::find($id);
        if($request->has('image'))
        {
            $image = $request->image;
            $filename = time().$image->getClientOriginalName();
            $image->move('images/pages/',$filename);
            
            $pages_data = [
                'image'=>'images/pages/'.$filename,
                'title_la'=>$request->title_la,
                'title_en'=>$request->title_en,
                'slug'=>$request->slug,
                'des_la'=>$request->des_la,
                'des_en'=>$request->des_en,
                'status'=>$request->status,
                'user_id'=> auth()->user()->id,
            ];
        } 
        else
        {
            $pages_data = [
                'title_la'=>$request->title_la,
                'title_en'=>$request->title_en,
                'slug'=>$request->slug,
                'des_la'=>$request->des_la,
                'des_en'=>$request->des_en,
                'status'=>$request->status,
                'user_id'=> auth()->user()->id,
            ];
        }

        $page->update($pages_data);
        
        return redirect()->route('page.index')->with('success','ບັນທຶກຂໍ້ມູນສຳເລັດ!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();
        return redirect()->back()->with('success','ລຶບຂໍ້ມູນສຳເລັດ!');
    }
}
