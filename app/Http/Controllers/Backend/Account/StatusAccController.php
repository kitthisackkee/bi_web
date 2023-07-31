<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StatusAcc;

class StatusAccController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statusacc = StatusAcc::where('del',0)->get();
        return view('backend.account.statusacc.index', compact('statusacc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.account.statusacc.create');
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
            'name.required'=>'ກະລຸນາໃສ່ຊື່ສະຖານະກ່ອນ!'
        ]);
        StatusAcc::create($request->all());
        return redirect()->route('statusacc.index')->with('success','ເພີ່ມຂໍ້ມູນສຳເລັດ!');
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
        $statusacc = StatusAcc::find($id);
        return view('backend.account.statusacc.edit', compact('statusacc'));
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
        $statusacc = StatusAcc::find($id);
        $request->validate([
            'name'=>'required'
        ],[
            'name.required'=>'ກະລຸນາໃສ່ຊື່ສະຖານະກ່ອນ!'
        ]);
        $statusacc->update($request->all());
        return redirect()->route('statusacc.index')->with('success','ແກ້ໄຂຂໍ້ມູນສຳເລັດ!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $statusacc = StatusAcc::find($id);
        $statusacc->del = 1;
        $statusacc->save();
        return redirect()->back()->with('success','ລຶບຂໍ້ມູນສຳເລັດ!');
    }
}
