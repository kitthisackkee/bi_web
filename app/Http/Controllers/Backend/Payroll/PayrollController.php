<?php

namespace App\Http\Controllers\Backend\Payroll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Salary;
use App\Models\Payroll;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payroll = Payroll::orderBy('id','desc')->where('del',0)->where('accept_id',1)->get();
        $emp = Employee::where('del',0)->get();
        $salary = Salary::where('del',0)->get();
        return view('backend.employee.payroll.index', compact('payroll','emp','salary'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $payroll = Payroll::where('del',0)->where('accept_id',0)->get();
        //$payrolltotal = Payroll::select(DB::raw('sum(salary + bonus + overtime)'))->where('del',0)->where('accept_id',0)->get();
        $emp = Employee::where('del',0)->get();
        $salary = Salary::where('del',0)->get();
        return view('backend.employee.payroll.create', compact('payroll','emp','salary'));
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
            'month'=>'required',
            'year'=>'required',
            'emp_id'=>'required',
            'salary'=>'required',
        ],[
            'month.required'=>'ກະລູນາເລືອກເດືອນກ່ອນ!',
            'year.required'=>'ກະລູນາເລືອກປີກ່ອນ!',
            'emp_id.required'=>'ກະລຸນາເລືອກພະນັກງານກ່ອນ!',
            'salary.required'=>'ກະລຸນາເລືອກເງິນເດືອນກ່ອນ!',
        ]);
        Payroll::create([
            'month'=>$request->month,
            'year'=>$request->year,
            'emp_id'=>$request->emp_id,
            'salary'=>str_replace(',','',$request->salary),
            'bonus'=>str_replace(',','',$request->bonus),
            'overtime'=>str_replace(',','',$request->overtime),
            'total'=>str_replace(',','',$request->salary) + str_replace(',','',$request->bonus) + str_replace(',','',$request->overtime),
            'note'=>$request->note,
            'user_id'=>Auth::user()->id,
        ]);
        return redirect()->back()->with('success','ເພີ່ມຂໍ້ມູນສຳເລັດ!');
    }

    public function aceptedpayroll($id)
    {
        $payroll = Payroll::find($id);
        $payroll->accept_id = 1;
        $payroll->status = 1;
        $payroll->save();
        return redirect()->route('payroll.index')->with('success','ຍອມຮັບຂໍ້ມູນສຳເລັດ!');
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payroll = Payroll::find($id);
        $payroll->status = 2;
        $payroll->save();
        return redirect()->route('payroll.index')->with('success','ທ່ານໄດ້ເບີກເງິນສຳເລັດແລ້ວ!');
    }
    public function deletepayroll($id)
    {
        $payroll = Payroll::find($id);
        $payroll->delete();
        return redirect()->back()->with('success','ທ່ານໄດ້ລຶບຂໍ້ມູນສຳເລັດ!');
    }
}
