<?php

namespace App\Http\Controllers\Backend\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\SolutionType;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('id','desc')->get();
        return view('backend.ecommerce.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $new_type = SolutionType::all();
        return view('backend.ecommerce.news.create',compact('new_type'));
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
            'name_la'=>'required'
        ],[
            'name_la.required'=>'ກະລຸນາໃສ່ຊື່ ໂຊລູຊັ່ນ ພາສາລາວກ່ອນ!',
            'image.image'=>'ກະລຸນາເລືອກຮູບ',
            'image.max'=>'ຮູບໃຫຍ່ກວ່າ 1024 px ກະລຸນາເລືອກໃໝ່!'
        ]);

        $image = $request->image;
        $filename = time().$image->getClientOriginalName();

        News::create([
            'news_type_id'=>$request->news_type_id,
            'name_la'=>$request->name_la,
            'name_en'=>$request->name_en,
            'short_des_la'=>$request->short_des_la,
            'short_des_en'=>$request->short_des_en,
            'des_la'=>$request->des_la,
            'des_en'=>$request->des_en,
            'image'=>'images/news/'.$filename,
            'status'=>$request->status,
            'user_id'=>auth()->user()->id,
        ]);
        $image->move('images/news/',$filename);
        return redirect()->route('post.index')->with('success','ເພີ່ມຂໍ້ມູນສຳເລັດ!');
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
        $news = News::find($id);
        $new_type = SolutionType::all();
        return view('backend.ecommerce.news.edit', compact('news','new_type'));
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
        $news = News::find($id);
        $request->validate([
            'name_la'=>'required',
        ],[
            'name_la.required' => 'ກະລຸນາໃສ່ຊື່ບໍລິການກ່ອນ!',
        ]);

        if($request->has('image'))
        {
            $image = $request->image;
            $filename = time().$image->getClientOriginalName();
            $image->move('images/news/',$filename);

            $news_data = [
                'news_type_id'=>$request->news_type_id,
                'name_la'=>$request->name_la,
                'name_en'=>$request->name_en,
                'short_des_la'=>$request->short_des_la,
                'short_des_en'=>$request->short_des_en,
                'des_la'=>$request->des_la,
                'des_en'=>$request->des_en,
                'image'=>'images/news/'.$filename,
                'status'=>$request->status,
                'user_id'=>auth()->user()->id,
            ];
        } else
        {
            $news_data = [
                'news_type_id'=>$request->news_type_id,
                'name_la'=>$request->name_la,
                'name_en'=>$request->name_en,
                'short_des_la'=>$request->short_des_la,
                'short_des_en'=>$request->short_des_en,
                'des_la'=>$request->des_la,
                'des_en'=>$request->des_en,
                'status'=>$request->status,
                'user_id'=>auth()->user()->id,
            ];
        }

        $news->update($news_data);
        return redirect()->route('post.index')->with('success','ແກ້ໄຂຂໍ້ມູນສຳເລັດ!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        if(file_exists($news->image)) {
            unlink($news->image);
            $news->delete();
        }
        else
        {
            $news->delete();
        }
        return redirect()->back()->with('success','ລຶບຂໍ້ມູນສຳເລັດ!'); 
    }
}
