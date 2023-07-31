<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;

class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vill = Village::orderBy('id','desc')->get();
        return view('backend.settings.village.index', compact('vill'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dis = District::all();
        $pro = Province::all();
        return view('backend.settings.village.create', compact('dis','pro'));
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
            'name'=> 'required',
            'dis_id'=> 'required',
            'pro_id'=> 'required'
        ],[
            'name.required' => 'ກະລຸນາເພີ່ມຊື່ບ້ານກ່ອນ!',
            'dis_id.required'=> 'ກະລຸນາເລືອກເມືອງກ່ອນ!',
            'pro_id.required'=> 'ກະລຸນາເລືອກແຂວງກ່ອນ!'
        ]);
        Village::create($request->all());
        return redirect()->route('village.index')->with('success','ເພີ່ມຂໍ້ມູນສຳເລັດ!');
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
        $vill = Village::find($id);
        $dis = District::all();
        $pro = Province::all();
        return view('backend.settings.village.edit', compact('vill','dis','pro'));
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
        $vill = Village::find($id);
        $request->validate([
            'name'=> 'required',
            'dis_id'=> 'required',
            'pro_id'=> 'required'
        ],[
            'name.required' => 'ກະລຸນາເພີ່ມຊື່ບ້ານກ່ອນ!',
            'dis_id.required'=> 'ກະລຸນາເລືອກເມືອງກ່ອນ!',
            'pro_id.required'=> 'ກະລຸນາເລືອກແຂວງກ່ອນ!'
        ]);
        $vill->update($request->all());
        return redirect()->route('village.index')->with('success','ແກ້ໄຂຂໍ້ມູນສຳເລັດ!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vill = Village::find($id);
        $vill->delete();
        return redirect()->route('village.index')->with('success','ທ່ານໄດ້ລຶບຂໍ້ມູນສຳເລັດ!');
    }
}
