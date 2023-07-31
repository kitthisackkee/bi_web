<?php

namespace App\Http\Controllers\Backend\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SolutionType;

class SolutionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solution_type = SolutionType::all();
        return view('backend.ecommerce.solution_type.index', compact('solution_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.ecommerce.solution_type.create');
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
            'name_la'=>'required'
        ],[
            'name_la.required'=>'ກະລຸນາເພີ່ມຊື່ພາສາລາວກ່ອນ!'
        ]);
        SolutionType::create([
            'name_la'=>$request->name_la,
            'name_en'=>$request->name_en
        ]);
        return redirect()->route('solution_type.index')->with('success','ເພີ່ມຂໍ້ມູນສຳເລັດ!');
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
        $solution_type = SolutionType::find($id);
        return view('backend.ecommerce.solution_type.edit', compact('solution_type'));
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
        $solution_type = SolutionType::find($id);
        $request->validate([
            'name_la'=>'required'
        ],[
            'name_la.required'=>'ກະລຸນາເພີ່ມຊື່ພາສາລາວກ່ອນ!'
        ]);
        $solution_type->update($request->all());
        return redirect()->route('solution_type.index')->with('success','ບັນທຶກຂໍ້ມູນສຳເລັດ!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $solution_type = SolutionType::find($id);
        $solution_type->delete();
        return redirect()->back()->with('success','ລຶບຂໍ້ມູນສຳເລັດ!');
    }
}
