<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;

class SettingAccController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acc = Account::orderBy('id','desc')->where('del',0)->get();
        return view('backend.account.settingacc.index', compact('acc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.account.settingacc.create');
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
            'code'=>'required',
            'name'=>'required'
        ],[
            'code.required' => 'ກະລຸນາໃສ່ເລກບັນຊີກ່ອນ!',
            'name.required' => 'ກະລຸນາໃສ່ຊື່ບັນຊີກ່ອນ!'
        ]);
        Account::create($request->all());
        return redirect()->route('settingacc.index')->with('success','ເພີ່ມຂໍ້ມູນສຳເລັດ!');
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
        $acc = Account::find($id);
        return view('backend.account.settingacc.edit', compact('acc'));
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
        $acc = Account::find($id);
        $request->validate([
            'code'=>'required',
            'name'=>'required'
        ],[
            'code.required' => 'ກະລຸນາໃສ່ເລກບັນຊີກ່ອນ!',
            'name.required' => 'ກະລຸນາໃສ່ຊື່ບັນຊີກ່ອນ!'
        ]);
        $acc->update([
            'code'=> $request->code,
            'name'=> $request->name,
            'debit'=> $request->has('debit'),
            'credit'=> $request->has('credit')
        ]);
        return redirect()->route('settingacc.index')->with('success','ແກ້ໄຂຂໍ້ມູນສຳເລັດ!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $acc = Account::find($id);
        $acc->del = 1;
        $acc->save();
        return redirect()->route('settingacc.index')->with('success','ລຶບຂໍ້ມູນສຳເລັດ!');
    }
}
