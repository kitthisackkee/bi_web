<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;

class DepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depart = Department::orderBy('id','desc')->where('del',0)->get();
        return view('backend.settings.depart.index', compact('depart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.settings.depart.create');
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
            'name'=>'required'
        ],[
            'name.required' => 'ກະລຸນາໃສ່ຊື່ພະແນກການກ່ອນ!'
        ]);
        Department::create($request->all());
        return redirect()->route('depart.index')->with('success','ເພີ່ມຂໍ້ມູນສຳເລັດ!');
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
        $depart = Department::find($id);
        return view('backend.settings.depart.edit', compact('depart'));
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
        $depart = Department::find($id);
        $request->validate([
            'name'=>'required'
        ],[
            'name.required' => 'ກະລຸນາໃສ່ຊື່ພະແນກການກ່ອນ!'
        ]);
        $depart->update($request->all());
        return redirect()->route('depart.index')->with('success','ແກ້ໄຂຂໍ້ມູນສຳເລັດ!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $depart = Department::find($id);
        $depart->del = 1;
        $depart->save();
        return redirect()->route('depart.index')->with('success','ທ່ານໄດ້ລຶບຂໍ້ມູນສຳເລັດ!');
    }
}
