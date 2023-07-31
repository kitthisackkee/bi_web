<?php

namespace App\Http\Controllers\Backend\Doc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExternalParts;

class ExternalPartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $external_parts = ExternalParts::all();
        return view('backend.document.external.index', compact('external_parts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.document.external.create');
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
            'name' => 'required'
        ],[
            'name.required'=>'ໃສ່ຊື່ພາກສ່ວນພາຍນອກກ່ອນ!'
        ]);
        ExternalParts::create($request->all());
        return redirect()->route('external_parts.index')->with('success','ເພີ່ມຂໍ້ມູນສຳເລັດ!');
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
        $external_parts = ExternalParts::find($id);
        return view('backend.document.external.edit', compact('external_parts'));
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
        $external_parts = ExternalParts::find($id);
        $request->validate([
            'name' => 'required'
        ],[
            'name.required'=>'ໃສ່ຊື່ປະເພດເອກະສານກ່ອນ!'
        ]);
        $external_parts->update($request->all());
        return redirect()->route('external_parts.index')->with('success','ແກ້ໄຂຂໍ້ມູນສຳເລັດ!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $external_parts = ExternalParts::find($id);
        $external_parts->delete();
        return redirect()->route('external_parts.index')->with('success','ລຶບຂໍ້ມູນສຳເລັດ!');
    }
}
