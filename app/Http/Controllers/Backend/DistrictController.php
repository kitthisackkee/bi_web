<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\District;
use App\Models\Province;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $dis = DB::table('districts')
                ->join('provinces','districts.pro_id','=','provinces.id')
                ->select('districts.id','districts.name','districts.del','provinces.name as proname')
                ->where('districts.del',0)->get();
                */
        $dis = District::orderBy('id','desc')->get();
        return view('backend.settings.district.index', compact('dis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pro = DB::table('provinces')->get();
        return view('backend.settings.district.create',compact('pro'));
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
            'name' => 'required',
            'pro_id' => 'required'
        ],[
            'name.required' => 'ກະລຸນາເພີື່ມຊື່ເມືອງກ່ອນ!',
            'pro.required' => 'ທ່ານຍັງບໍ່ທັນໄດ້ເລືອກແຂວງ!'
        ]);
        District::create($request->all());
        return redirect()->route('district.index')->with('success','ເພີ່ມຂໍ້ມູນສຳເລັດ!');
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
        $dis = District::find($id);
        $pro = Province::orderBy('id','desc')->get();
        return view('backend.settings.district.edit', compact('dis','pro'));
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
        $dis = District::find($id);
        $request->validate([
            'name' => 'required',
            'pro_id' => 'required'
        ],[
            'name.required' => 'ກະລຸນາເພີື່ມຊື່ເມືອງກ່ອນ!',
            'pro.required' => 'ທ່ານຍັງບໍ່ທັນໄດ້ເລືອກແຂວງ!'
        ]);
        $dis->update($request->all());
        return redirect()->route('district.index')->with('success','ແກ້ໄຂຂໍ້ມູນສຳເລັດ!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dis = District::find($id);
        $dis->delete();
        return redirect()->route('district.index')->with('success','ທ່ານໄດ້ລຶບຂໍ້ມູນສຳເລັດ!');
    }
}
