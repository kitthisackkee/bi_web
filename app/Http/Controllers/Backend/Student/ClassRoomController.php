<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassRoom;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classroom = ClassRoom::orderBy('id','desc')->get();
        return view('backend.settings.classroom.index', compact('classroom'));
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
        if(empty($request->class_room_id)){
            $request->validate([
                'name'=>'required',
            ],[
                'name.required'=>'ກະລຸນາເພີ່ມຊື່ ຫ້ອງຮຽນ ກ່ອນ!',
            ]);
            $classroom = new ClassRoom;
            $classroom->name = $request->name;
            $classroom->save();
            return redirect()->route('classroom.index')->with('success','ເພີ່ມຂໍ້ມູນສຳເລັດ!');
        }else{
            $request->validate([
                'edit_name'=>'required',
            ],[
                'edit_name.required'=>'ກະລຸນາເພີ່ມຊື່ ປະເພດໜັງສືກ່ອນ ກ່ອນ!',
            ]);
            $classroom = ClassRoom::find($request->class_room_id);
            $classroom->name = $request->edit_name;
            $classroom->save();
            return redirect()->route('classroom.index')->with('success','ແກ້ໄຂຂໍ້ມູນສຳເລັດ!');
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
        $classroom = ClassRoom::find($id);
	    return response()->json($classroom);
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
        $classroom = ClassRoom::find($id);
        $classroom->delete();
        return redirect()->route('classroom.index')->with('success','ລຶບຂໍ້ມູນສຳເລັດ!');
    }
}
