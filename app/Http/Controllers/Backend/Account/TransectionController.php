<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transection;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;

class TransectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transection = Transection::orderBy('id','desc')->where('del',0)->get();
        return view('backend.account.transection.index', compact('transection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $acc_debit = Account::where('del',0)->where('debit',1)->get();
        $acc_credit = Account::where('del',0)->where('credit',1)->get();
        $transection = Transection::orderBy('id','desc')->where('del',0)->where('accept_id',0)->get();
        return view('backend.account.transection.create', compact('acc_debit','acc_credit','transection'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_tran_no = date("YmdHis");
        //$new_date = date("Y/m/d H:i:s");
        $request->validate([
            'acc_debit'=>'required',
            'acc_credit'=>'required',
            'des'=>'required'
        ],[
            'acc_debit.required'=>'ເລກບັນຊີໜີ້ຍັງບໍ່ທັນໄດ້ເລືອກ!',
            'acc_credit.required'=>'ເລກບັນຊີມີຍັງບໍ່ທັນໄດ້ເລືອກ!',
            'des.required'=>'ກະລຸນາໃສ່ລາຍລະອຽດ ທຸລະກຳກ່ອນ!'
        ]);
        Transection::create([
            'tran_no'=>$new_tran_no,
            'date'=>$request->date,
            'acc_debit'=>$request->acc_debit,
            'acc_credit'=>$request->acc_credit,
            'des'=>$request->des,
            'debit'=>str_replace(',','',$request->debit),
            'credit'=>str_replace(',','',$request->credit),
            'accept_id'=>0,
            'user_approved_id'=>Auth::user()->id,
            'status_acc_id'=>1,
            'branch_id'=>Auth::user()->branchname->id,
            'user_id'=>Auth::user()->id,
            'branch_id'=>Auth::user()->rolename->id,
            'del'=>0
        ]);
        return redirect()->back()->with('success','ສຳເລັດ!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $acc = Account::where('del',0)->get();
        $transection = Transection::find($id);
        return view('backend.account.transection.show', compact('acc','transection'));
    }
    public function approved(Request $request, $id)
    {
        $transection = Transection::find($id);
        $transection->date = $request->date;
        $transection->acc_debit = $request->acc_debit;
        $transection->acc_credit = $request->acc_credit;
        $transection->des = $request->des;
        $transection->debit = str_replace(',','',$request->debit);
        $transection->credit = str_replace(',','',$request->credit);
        $transection->user_approved_id = Auth::user()->id;
        $transection->role_id = Auth::user()->rolename->id;
        $transection->status_acc_id = 2;
        $transection->save();
        return redirect()->route('transection.index')->with('success','ລາຍການເຄື່ອນໄຫວນີ້ໄດ້ອານຸມັດສຳເລັດແລ້ວ!!');

    }
    public function rejected($id)
    {
        $transection = Transection::find($id);
        $transection->status_acc_id = 3;
        $transection->save();
        return redirect()->route('transection.index')->with('success','ລາຍການເຄື່ອນໄຫວນີ້ໄດ້ຖືກຍົກເລີກສຳເລັດແລ້ວ!!');
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
    public function update( $id)
    {
        $transection = Transection::find($id);
        $transection->accept_id = 1;
        $transection->save();
        return redirect()->route('transection.index')->with('success','ຍອມຮັບຂໍ້ມູນນີ້ສຳເລັດແລ້ວ!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transection = Transection::find($id);
        $transection->delete();
        return redirect()->back()->with('success','ລຶບຂໍ້ມູນນີ້ສຳເລັດ!');
    }
}
