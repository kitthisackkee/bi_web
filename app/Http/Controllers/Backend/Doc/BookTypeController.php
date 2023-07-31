<?php

namespace App\Http\Controllers\Backend\Doc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookType;

class BookTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booktype = BookType::orderBy('id','desc')->get();
        return view('backend.document.booktype.index', compact('booktype'));
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
        if(empty($request->book_type_id)){
            $request->validate([
                'name'=>'required',
            ],[
                'name.required'=>'ກະລຸນາເພີ່ມຊື່ ປະເພດໜັງສືກ່ອນ ກ່ອນ!',
            ]);
            $booktype = new BookType;
            $booktype->name = $request->name;
            $booktype->save();
            return redirect()->route('booktype.index')->with('success','ເພີ່ມຂໍ້ມູນສຳເລັດ!');
        }else{
            $request->validate([
                'edit_name'=>'required',
            ],[
                'edit_name.required'=>'ກະລຸນາເພີ່ມຊື່ ປະເພດໜັງສືກ່ອນ ກ່ອນ!',
            ]);
            $booktype = BookType::find($request->book_type_id);
            $booktype->name = $request->edit_name;
            $booktype->save();
            return redirect()->route('booktype.index')->with('success','ແກ້ໄຂຂໍ້ມູນສຳເລັດ!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booktype = BookType::find($id);
	    return response()->json($booktype);
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
        $booktype = BookType::find($id);
        $booktype->delete();
        return redirect()->route('booktype.index')->with('success','ລຶບຂໍ້ມູນສຳເລັດ!');
    }
}
