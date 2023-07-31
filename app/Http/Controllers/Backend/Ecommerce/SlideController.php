<?php

namespace App\Http\Controllers\Backend\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide = Slide::orderBy('id','desc')->get();
        return view('backend.ecommerce.slide.index', compact('slide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.ecommerce.slide.create');
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
            'name_la'=>'required',
            'image'=>'required'
        ],[
            'name_la.required'=>'ກະລູນາໃສ່ຊື່ Slide ກ່ອນ!',
            'image.required'=>'ເລືອກຟາຍຮູບກ່ອນ!',
        ]);

        $image = $request->image;
        $filename = time().$image->getClientOriginalName();

        Slide::create([
            'name_la'=>$request->name_la,
            'name_en'=>$request->name_en,
            'image'=>'images/slide/'.$filename,
            'active'=>$request->active
        ]);

        $image->move('images/slide/',$filename);

        return redirect()->route('slide.index')->with('success','ເພີ່ມຂໍ້ມູນສຳເລັດ!');
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
        $slide = Slide::find($id);
        return view('backend.ecommerce.slide.edit', compact('slide'));
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
        $slide = Slide::find($id);
        $request->validate([
            'name_la'=>'required',
        ],[
            'name_la.required'=>'ກະລູນາໃສ່ຊື່ Slide ກ່ອນ!',
        ]);

        if($request->has('image'))
        {
            $image = $request->image;
            $filename = time().$image->getClientOriginalName();
            $image->move('images/slide/',$filename);

            $slide_data = [
                'name_la'=>$request->name_la,
                'name_en'=>$request->name_en,
                'image'=>'images/slide/'.$filename,
                'active'=>$request->active
            ];
        } else
        {
            $slide_data = [
                'name_la'=>$request->name_la,
                'name_en'=>$request->name_en,
                'active'=>$request->active
            ];
        }
        $slide->update($slide_data);
        return redirect()->route('slide.index')->with('success','ບັນທຶກຂໍ້ມູນສຳເລັດ!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::find($id);
        if(file_exists($slide->image)) {
            unlink($slide->image);
            $slide->delete();
        }
        else
        {
            $slide->delete();
        }
        return redirect()->back()->with('success','ລຶບຂໍ້ມູນສຳເລັດ!'); 
    }
}
