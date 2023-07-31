<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use App\Models\Position;
use App\Models\Department;
use App\Models\Marries;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::where('del',0)->get();
        return view('backend.employee.index', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vill = Village::where('del',0)->get();
        $dis = District::where('del',0)->get();
        $pro = Province::where('del',0)->get();
        $pos = Position::where('del',0)->get();
        $depart = Department::where('del',0)->get();
        $marries = Marries::where('del',0)->get();
        return view('backend.employee.create', compact('vill','dis','pro','pos','depart','marries'));
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
            'firstname'=>'required',
            'lastname'=>'required',
            'bod'=>'required',
            'sex'=>'required',
            'bvill_id'=>'required',
            'bdis_id'=>'required',
            'bpro_id'=>'required',
            'vill_id'=>'required',
            'dis_id'=>'required',
            'pro_id'=>'required',
            'phone'=>'required',
            'pos_id'=>'required',
            'dpart_id'=>'required',
            'mar_id'=>'required',
        ],[
            'firstname.required'=>'ໃສ່ຊື່ກ່ອນ!',
            'lastname.required'=>'ໃສ່ນາມສະກຸນກ່ອນ!',
            'bod.required'=>'ໃສ່ ວ,ດ,ປ ເກີດກ່ອນ!',
            'sex.required'=>'ເລືອກເພດກ່ອນ!',
            'bvill_id.required'=>'ເລືອກບ້ານເກີດກ່ອນ!',
            'bdis_id.required'=>'ເລືອກເມືອງເກີດກ່ອນ!',
            'bpro_id.required'=>'ເລືອກແຂວງເກີດກ່ອນ!',
            'vill_id.required'=>'ເລືອກບ້ານຢູ່ປະຈຸບັນກ່ອນ!',
            'dis_id.required'=>'ເລືອກເມືອງຢູ່ປະຈຸບັນກ່ອນ!',
            'pro_id.required'=>'ເລືອກບ້ານຢູ່ປະຈຸບັນກ່ອນ!',
            'phone.required'=>'ໃສ່ເບີ້ໂທຕິດຕໍ່ກ່ອນ!',
            'pos_id.required'=>'ເລືອກຕຳແໜ່ງງານກ່ອນ!',
            'dpart_id.required'=>'ເລືອກພະແນກການກ່ອນ!',
            'mar_id.required'=>'ເລືອກສະຖານະກ່ອນ!',
        ]);
        
        if($request->has('picture') || $request->has('file'))
        {
            $pic = $request->picture;
            $picname = time().$pic->getClientOriginalName();

            Employee::create([
                'firstname'=>$request->firstname,
                'lastname'=>$request->lastname,
                'bod'=>$request->bod,
                'sex'=>$request->sex,
                'bvill_id'=>$request->bvill_id,
                'bdis_id'=>$request->bdis_id,
                'bpro_id'=>$request->bpro_id,
                'address'=>$request->address,
                'vill_id'=>$request->vill_id,
                'dis_id'=>$request->dis_id,
                'pro_id'=>$request->pro_id,
                'pos_id'=>$request->pos_id,
                'phone'=>$request->phone,
                'dpart_id'=>$request->dpart_id,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'mar_id'=>$request->mar_id,
                'mar_name'=>$request->mar_name,
                'mar_work'=>$request->mar_work,
                'mar_address'=>$request->mar_address,
                'mar_phone'=>$request->mar_phone,
                'note'=>$request->note,
                'picture'=>'pictures/emp/'.$picname,
                //'file'=>'files/emp/'.$filename,
                'user_id'=> Auth()->user()->id
            ]);

            $pic->move('pictures/emp/',$picname);
            
        }elseif($request->has('file'))
        {
            $file = $request->file;
            $filename = time().$file->getClientOriginalName();

            Employee::create([
                'firstname'=>$request->firstname,
                'lastname'=>$request->lastname,
                'bod'=>$request->bod,
                'sex'=>$request->sex,
                'bvill_id'=>$request->bvill_id,
                'bdis_id'=>$request->bdis_id,
                'bpro_id'=>$request->bpro_id,
                'address'=>$request->address,
                'vill_id'=>$request->vill_id,
                'dis_id'=>$request->dis_id,
                'pro_id'=>$request->pro_id,
                'pos_id'=>$request->pos_id,
                'phone'=>$request->phone,
                'dpart_id'=>$request->dpart_id,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'mar_id'=>$request->mar_id,
                'mar_name'=>$request->mar_name,
                'mar_work'=>$request->mar_work,
                'mar_address'=>$request->mar_address,
                'mar_phone'=>$request->mar_phone,
                'note'=>$request->note,
                'file'=>'files/emp/'.$filename,
                'user_id'=> Auth()->user()->id
            ]);
            $file->move('files/emp/',$filename);
            
        }else
        {
            Employee::create([
                'firstname'=>$request->firstname,
                'lastname'=>$request->lastname,
                'bod'=>$request->bod,
                'sex'=>$request->sex,
                'bvill_id'=>$request->bvill_id,
                'bdis_id'=>$request->bdis_id,
                'bpro_id'=>$request->bpro_id,
                'address'=>$request->address,
                'vill_id'=>$request->vill_id,
                'dis_id'=>$request->dis_id,
                'pro_id'=>$request->pro_id,
                'pos_id'=>$request->pos_id,
                'phone'=>$request->phone,
                'dpart_id'=>$request->dpart_id,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'mar_id'=>$request->mar_id,
                'mar_name'=>$request->mar_name,
                'mar_work'=>$request->mar_work,
                'mar_address'=>$request->mar_address,
                'mar_phone'=>$request->mar_phone,
                'note'=>$request->note,
                'user_id'=> Auth()->user()->id
            ]);
        }

        return redirect()->route('employee.index')->with('success','ເພີ່ມຂໍ້ມູນສຳເລັດ!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emp = Employee::find($id);

        $vill = Village::where('del',0)->get();
        $dis = District::where('del',0)->get();
        $pro = Province::where('del',0)->get();
        $pos = Position::where('del',0)->get();
        $depart = Department::where('del',0)->get();
        $marries = Marries::where('del',0)->get();

        return view('backend.employee.show', compact('emp','vill','dis','pro','pos','depart','marries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emp = Employee::find($id);

        $vill = Village::where('del',0)->get();
        $dis = District::where('del',0)->get();
        $pro = Province::where('del',0)->get();
        $pos = Position::where('del',0)->get();
        $depart = Department::where('del',0)->get();
        $marries = Marries::where('del',0)->get();
        return view('backend.employee.edit', compact('emp','vill','dis','pro','pos','depart','marries'));
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
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'bod'=>'required',
            'sex'=>'required',
            'bvill_id'=>'required',
            'bdis_id'=>'required',
            'bpro_id'=>'required',
            'vill_id'=>'required',
            'dis_id'=>'required',
            'pro_id'=>'required',
            'phone'=>'required',
            'pos_id'=>'required',
            'dpart_id'=>'required',
            'mar_id'=>'required',
        ],[
            'firstname.required'=>'ໃສ່ຊື່ກ່ອນ!',
            'lastname.required'=>'ໃສ່ນາມສະກຸນກ່ອນ!',
            'bod.required'=>'ໃສ່ ວ,ດ,ປ ເກີດກ່ອນ!',
            'sex.required'=>'ເລືອກເພດກ່ອນ!',
            'bvill_id.required'=>'ເລືອກບ້ານເກີດກ່ອນ!',
            'bdis_id.required'=>'ເລືອກເມືອງເກີດກ່ອນ!',
            'bpro_id.required'=>'ເລືອກແຂວງເກີດກ່ອນ!',
            'vill_id.required'=>'ເລືອກບ້ານຢູ່ປະຈຸບັນກ່ອນ!',
            'dis_id.required'=>'ເລືອກເມືອງຢູ່ປະຈຸບັນກ່ອນ!',
            'pro_id.required'=>'ເລືອກບ້ານຢູ່ປະຈຸບັນກ່ອນ!',
            'phone.required'=>'ໃສ່ເບີ້ໂທຕິດຕໍ່ກ່ອນ!',
            'pos_id.required'=>'ເລືອກຕຳແໜ່ງງານກ່ອນ!',
            'dpart_id.required'=>'ເລືອກພະແນກການກ່ອນ!',
            'mar_id.required'=>'ເລືອກສະຖານະກ່ອນ!',
        ]);
        $emp = Employee::find($id);
        if($request->has('picture'))
        {
            $pic = $request->picture;
            $picname = time().$pic->getClientOriginalName();
            $pic->move('pictures/emp/',$picname);

            $emp_date = [
                'firstname'=>$request->firstname,
                'lastname'=>$request->lastname,
                'bod'=>$request->bod,
                'sex'=>$request->sex,
                'bvill_id'=>$request->bvill_id,
                'bdis_id'=>$request->bdis_id,
                'bpro_id'=>$request->bpro_id,
                'address'=>$request->address,
                'vill_id'=>$request->vill_id,
                'dis_id'=>$request->dis_id,
                'pro_id'=>$request->pro_id,
                'phone'=>$request->phone,
                'pos_id'=>$request->pos_id,
                'dpart_id'=>$request->dpart_id,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'mar_id'=>$request->mar_id,
                'mar_name'=>$request->mar_name,
                'mar_work'=>$request->mar_work,
                'mar_address'=>$request->mar_address,
                'mar_phone'=>$request->mar_phone,
                'note'=>$request->note,
                'picture'=>'pictures/emp/'.$picname,
                'status'=>$request->status,
                'user_id'=> 1
            ];
        } elseif($request->has('file'))
        {
               
            $file = $request->file;
            $filename = time().$file->getClientOriginalName();
            $file->move('files/emp/',$filename);

            $emp_date = [
                'firstname'=>$request->firstname,
                'lastname'=>$request->lastname,
                'bod'=>$request->bod,
                'sex'=>$request->sex,
                'bvill_id'=>$request->bvill_id,
                'bdis_id'=>$request->bdis_id,
                'bpro_id'=>$request->bpro_id,
                'address'=>$request->address,
                'vill_id'=>$request->vill_id,
                'dis_id'=>$request->dis_id,
                'pro_id'=>$request->pro_id,
                'phone'=>$request->phone,
                'pos_id'=>$request->pos_id,
                'dpart_id'=>$request->dpart_id,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'mar_id'=>$request->mar_id,
                'mar_name'=>$request->mar_name,
                'mar_work'=>$request->mar_work,
                'mar_address'=>$request->mar_address,
                'mar_phone'=>$request->mar_phone,
                'note'=>$request->note,
                'file'=>'files/emp/'.$filename,
                'status'=>$request->status,
                'user_id'=> 1
            ];
        } else
        {
            $emp_date = [
                'firstname'=>$request->firstname,
                'lastname'=>$request->lastname,
                'bod'=>$request->bod,
                'sex'=>$request->sex,
                'bvill_id'=>$request->bvill_id,
                'bdis_id'=>$request->bdis_id,
                'bpro_id'=>$request->bpro_id,
                'address'=>$request->address,
                'vill_id'=>$request->vill_id,
                'dis_id'=>$request->dis_id,
                'pro_id'=>$request->pro_id,
                'phone'=>$request->phone,
                'pos_id'=>$request->pos_id,
                'dpart_id'=>$request->dpart_id,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'mar_id'=>$request->mar_id,
                'mar_name'=>$request->mar_name,
                'mar_work'=>$request->mar_work,
                'mar_address'=>$request->mar_address,
                'mar_phone'=>$request->mar_phone,
                'note'=>$request->note,
                'status'=>$request->status,
                'user_id'=> 1
            ];
        }
        $emp->update($emp_date);
        return redirect()->route('employee.index')->with('success','ບັນທຶກຂໍ້ມູນສຳເລັດ!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp = Employee::find($id);
        $emp->delete();
        return redirect()->back()->with('success','ລຶບຂໍ້ມູນສຳເລັດ!');
    }
}
