<?php

namespace App\Http\Controllers\Backend\Payroll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salary;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salary = Salary::where('del',0)->get();
        return view('backend.employee.salary.index', compact('salary'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.employee.salary.create');
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
            'salary'=>'required',
        ],[
            'salary.required'=>'ກະລຸນາໃສ່ວົງເງິນກ່ອນ!',
        ]);
        Salary::create([
            'salary'=>str_replace(',','',$request->salary)
        ]);
        return redirect()->route('salary.index')->with('success','ເພີ່ມຂໍ້ມູນສຳເລັດ!');
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
        $salary = Salary::find($id);
        return view('backend.employee.salary.edit', compact('salary'));
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
        $salary = Salary::find($id);
        $request->validate([
            'salary'=>'required',
        ],[
            'salary.required'=>'ກະລຸນາໃສ່ວົງເງິນກ່ອນ!',
        ]);
        $salary->update([
            'salary'=>str_replace(',','',$request->salary)
        ]);
        return redirect()->route('salary.index')->with('success','ບັນທຶກຂໍ້ມູນສຳເລັດ!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $salary = Salary::find($id);
        $salary->del = 1;
        $salary->save();
        return redirect()->route('salary.index')->with('success','ລຶບຂໍ້ມູນສຳເລັດ!');
    }
}
