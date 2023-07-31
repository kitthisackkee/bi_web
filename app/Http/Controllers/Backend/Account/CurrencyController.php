<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Currency;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currency = Currency::where('del',0)->get();
        return view('backend.account.currency.index', compact('currency'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.account.currency.create');
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
            'symbol'=>'required|max:3',
            'name'=>'required'
        ],[
            'symbol.required'=>'ໃສ່ສັນຍາລັກກ່ອນ!',
            'symbol.max'=>'ສັນຍາລັກເກີນ 3 ຕົວ!',
            'name.required'=>'ໃສ່ຊື່ສະກຸນເງິນກ່ອນ!'
        ]);
        Currency::create($request->all());
        return redirect()->route('currency.index')->with('success','ເພີ່ມຂໍ້ມູນສຳເລັດ!');
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
        $currency = Currency::find($id);
        return view('backend.account.currency.edit', compact('currency'));
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
        $currency = Currency::find($id);
        $request->validate([
            'symbol'=>'required|max:3',
            'name'=>'required'
        ],[
            'symbol.required'=>'ໃສ່ສັນຍາລັກກ່ອນ!',
            'symbol.max'=>'ສັນຍາລັກເກີນ 3 ຕົວ!',
            'name.required'=>'ໃສ່ຊື່ສະກຸນເງິນກ່ອນ!'
        ]);
        $currency->update($request->all());
        return redirect()->route('currency.index')->with('success','ແກ້ໄຂຂໍ້ມູນສຳເລັດ!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currency = Currency::find($id);
        $currency->del = 1;
        $currency->save();
        return redirect()->route('currency.index')->with('success','ລຶບຂໍ້ມູນສຳເລັດ!');
    }
}
