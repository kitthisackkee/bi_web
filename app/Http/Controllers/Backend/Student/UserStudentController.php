<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\Role;
use App\Models\Branch;
use App\Models\Term;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use App\Models\ClassRoom;
use App\Imports\ImportUserStudent;
use Maatwebsite\Excel\Facades\Excel;

class UserStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('role_id', 5)->orderBy('id','desc')->get();
        return view('backend.userstudent.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $term = Term::where('status', 1)->orderBy('id','desc')->get();
        $branch = Branch::all();
        $vil = Village::where('del',1)->get();
        $dis = District::where('del',1)->get();
        $pro = Province::where('del',1)->get();
        $clr = ClassRoom::where('status',1)->get();

        return view('backend.userstudent.create', compact('branch','term','vil','dis','pro','clr'));
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
            'code' => 'required',
            'gender' => 'required',
            'name' => 'required',
            'lastname' => 'required',
            'birthday' => 'required',
            'phone'=>'required|unique:users,phone|min:8',
            'password'=>'required|min:6',
            'confirmpassword'=>'required|same:password',
            'term_id'=>'required',
        ],[
            'code.required'=>'ກະລຸນາປ້ອນລະຫັດນັກສຶກສາກ່ອນ!',
            'gender.required'=>'ກະລຸນາເລືອກເພດກ່ອນ!',
            'name.required'=>'ກະລຸນາປ້ອນຊື່ນັກສຶກສາກ່ອນ!',
            'lastname.required'=>'ກະລຸນາປ້ອນາມສະກຸນກ່ອນ!',
            'birthday.required' => 'required',
            'phone.required'=>'ກະລຸນາໃສ່ເບີໂທລະສັບກ່ອນ!',
            'phone.unique'=>'ເບີໂທນີ້ ໄດ້ມີໃນລະບົບແລ້ວ!',
            'phone.min'=>'ເບີໂທຕ້ອງແມ່ນ 8 ຕົວເລກ! ຕົວຢ່າງ: XXXXXXXX',
            'password.required'=>'ໃສ່ລະຫັດຜ່ານກ່ອນ!',
            'password.min'=>'ລະຫັດຜ່ານຕ້ອງແມ່ນ 6 ຕົວເລກຂື້ນໄປ!',
            'confirmpassword.required'=>'ກະລຸນາຢືນຢັນລະຫັດຜ່ານຄືນກ່ອນ!',
            'confirmpassword.same'=>'ຢືນຢືນລະຫັດຜ່ານ ບໍ່ຄືກັນກັບ ຫ້ອງລະຫັດຜ່ານຂ້າງເທິງ',
            'term_id.required'=>'ກະລຸນາເລືອກປີຮຽນກ່ອນ!',
        ]);
        // dd($request->code);
        if($request->has('picture'))
        {
            $file = $request->picture;
            $filename = time().$file->getClientOriginalName();
            $file->move('images/student/',$filename);
            User::create([
                'code'=> $request->code,
                'gender'=> $request->gender,
                'name'=> $request->name,
                'lastname'=> $request->lastname,
                'birthday'=>$request->birthday,
                'phone'=> $request->phone,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'vl_id'=>$request->vl_id,
                'dt_id'=>$request->dt_id,
                'pv_id'=>$request->pv_id,
                'last_vl_id'=>$request->last_vl_id,
                'last_dt_id'=>$request->last_dt_id,
                'last_pv_id'=>$request->last_pv_id,
                'term_id'=>$request->term_id,
                'classroom_id'=>$request->classroom_id,
                'role_id'=>5,
                'address'=>$request->note,
                'image'=>'images/student/'.$filename,
            ]);
        }else{
            User::create([
                'code'=> $request->code,
                'gender'=> $request->gender,
                'name'=> $request->name,
                'lastname'=> $request->lastname,
                'birthday'=>$request->birthday,
                'phone'=> $request->phone,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'vl_id'=>$request->vl_id,
                'dt_id'=>$request->dt_id,
                'pv_id'=>$request->pv_id,
                'last_vl_id'=>$request->last_vl_id,
                'last_dt_id'=>$request->last_dt_id,
                'last_pv_id'=>$request->last_pv_id,
                'term_id'=>$request->term_id,
                'classroom_id'=>$request->classroom_id,
                'role_id'=>5,
                'address'=>$request->note,
            ]);
        }
        return redirect()->route('user_for_student.index')->with('success','ເພີ່ມຂໍ້ມູນສຳເລັດ!');
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
        $user = User::find($id);
        $term = Term::where('status', 1)->orderBy('id','desc')->get();
        $branch = Branch::all();
        $vil = Village::where('del',1)->get();
        $dis = District::where('del',1)->get();
        $pro = Province::where('del',1)->get();
        $clr = ClassRoom::where('status',1)->get();
        return view('backend.userstudent.edit', compact('user','branch','term','vil','dis','pro','clr'));
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
        $user = User::find($id);
        $request->validate([
            'code' => 'required',
            'gender' => 'required',
            'name' => 'required',
            'lastname' => 'required',
            'birthday' => 'required',
            'phone'=>'required|min:8',
            'password'=>'required|min:6',
            'confirmpassword'=>'required|same:password',
            'term_id'=>'required',
        ],[
            'code.required'=>'ກະລຸນາປ້ອນລະຫັດນັກສຶກສາກ່ອນ!',
            'gender.required'=>'ກະລຸນາເລືອກເພດກ່ອນ!',
            'name.required'=>'ກະລຸນາປ້ອນຊື່ນັກສຶກສາກ່ອນ!',
            'lastname.required'=>'ກະລຸນາປ້ອນາມສະກຸນກ່ອນ!',
            'birthday.required' => 'required',
            'phone.required'=>'ກະລຸນາໃສ່ເບີໂທລະສັບກ່ອນ!',
            'phone.min'=>'ເບີໂທຕ້ອງແມ່ນ 8 ຕົວເລກ! ຕົວຢ່າງ: XXXXXXXX',
            'password.required'=>'ໃສ່ລະຫັດຜ່ານກ່ອນ!',
            'password.min'=>'ລະຫັດຜ່ານຕ້ອງແມ່ນ 6 ຕົວເລກຂື້ນໄປ!',
            'confirmpassword.required'=>'ກະລຸນາຢືນຢັນລະຫັດຜ່ານຄືນກ່ອນ!',
            'confirmpassword.same'=>'ຢືນຢືນລະຫັດຜ່ານ ບໍ່ຄືກັນກັບ ຫ້ອງລະຫັດຜ່ານຂ້າງເທິງ',
            'term_id.required'=>'ກະລຸນາເລືອກປີຮຽນກ່ອນ!',
        ]);

        if($request->has('picture'))
        {
            $file = $request->picture;
            $filename = time().$file->getClientOriginalName();
            $file->move('images/student/',$filename);
            if($request->input('password'))
            {
                $user_date = [
                    'code'=> $request->code,
                    'gender'=> $request->gender,
                    'name'=> $request->name,
                    'lastname'=> $request->lastname,
                    'birthday'=>$request->birthday,
                    'phone'=> $request->phone,
                    'email'=>$request->email,
                    'password'=>bcrypt($request->password),
                    'vl_id'=>$request->vl_id,
                    'dt_id'=>$request->dt_id,
                    'pv_id'=>$request->pv_id,
                    'last_vl_id'=>$request->last_vl_id,
                    'last_dt_id'=>$request->last_dt_id,
                    'last_pv_id'=>$request->last_pv_id,
                    'term_id'=>$request->term_id,
                    'classroom_id'=>$request->classroom_id,
                    'role_id'=>5,
                    'address'=>$request->note,
                    'image'=>'images/student/'.$filename,
                ];
            }else{
                $user_date = [
                    'code'=> $request->code,
                    'gender'=> $request->gender,
                    'name'=> $request->name,
                    'lastname'=> $request->lastname,
                    'birthday'=>$request->birthday,
                    'phone'=> $request->phone,
                    'email'=>$request->email,
                    'vl_id'=>$request->vl_id,
                    'dt_id'=>$request->dt_id,
                    'pv_id'=>$request->pv_id,
                    'last_vl_id'=>$request->last_vl_id,
                    'last_dt_id'=>$request->last_dt_id,
                    'last_pv_id'=>$request->last_pv_id,
                    'term_id'=>$request->term_id,
                    'classroom_id'=>$request->classroom_id,
                    'role_id'=>5,
                    'address'=>$request->note,
                    'image'=>'images/student/'.$filename,
                ];
            }
        }else{
            if($request->input('password'))
            {
                $user_date = [
                    'code'=> $request->code,
                    'gender'=> $request->gender,
                    'name'=> $request->name,
                    'lastname'=> $request->lastname,
                    'birthday'=>$request->birthday,
                    'phone'=> $request->phone,
                    'email'=>$request->email,
                    'password'=>bcrypt($request->password),
                    'vl_id'=>$request->vl_id,
                    'dt_id'=>$request->dt_id,
                    'pv_id'=>$request->pv_id,
                    'last_vl_id'=>$request->last_vl_id,
                    'last_dt_id'=>$request->last_dt_id,
                    'last_pv_id'=>$request->last_pv_id,
                    'term_id'=>$request->term_id,
                    'classroom_id'=>$request->classroom_id,
                    'role_id'=>5,
                    'address'=>$request->note,
                ];
            }else{
                $user_date = [
                    'code'=> $request->code,
                    'gender'=> $request->gender,
                    'name'=> $request->name,
                    'lastname'=> $request->lastname,
                    'birthday'=>$request->birthday,
                    'phone'=> $request->phone,
                    'email'=>$request->email,
                    'vl_id'=>$request->vl_id,
                    'dt_id'=>$request->dt_id,
                    'pv_id'=>$request->pv_id,
                    'last_vl_id'=>$request->last_vl_id,
                    'last_dt_id'=>$request->last_dt_id,
                    'last_pv_id'=>$request->last_pv_id,
                    'term_id'=>$request->term_id,
                    'classroom_id'=>$request->classroom_id,
                    'role_id'=>5,
                    'address'=>$request->note,
                ];
            }
        }
        $user->update($user_date);
        return redirect()->route('user_for_student.index')->with('success','ແກ້ໄຂຂໍ້ມູນສຳເລັດ!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user_for_student.index')->with('success','ລຶບຂໍ້ມູນສຳເລັດ!');
    }

    public function importStudent()
    {
        if(!empty(request()->file('file'))){
            Excel::import(new ImportUserStudent,request()->file('file'));
            return redirect(route('user_for_student.index'))->with('success','ບັນທຶກຂໍ້ມູນໃໝ່ສຳເລັດ!');
        }else{
            return redirect(route('user_for_student.index'))->with('error','ກະລຸນາເພີ່ມຟາຍຂໍ້ມູນນັກຮຽນ!');
        }

    }
}
