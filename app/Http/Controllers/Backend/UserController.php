<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\Role;
use App\Models\Branch;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::orderBy('id','desc')->get();
        return view('backend.settings.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $emp = Employee::where('del',0)->get();
        $role = Role::where('del',0)->get();
        $branch = Branch::all();
        return view('backend.settings.user.create', compact('emp','role','branch'));
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
            'phone'=>'required|unique:users,phone|min:8',
            'email'=>'required|email',
            'password'=>'required|min:6',
            'confirmpassword'=>'required|same:password',
            'emp_id'=>'required',
            'role_id'=>'required'
        ],[
            'name.required'=>'ກະລຸນາໃສ່ຊື່ຜູ້ໃຊ່ກ່ອນ!',
            'phone.required'=>'ກະລຸນາໃສ່ເບີໂທລະສັບກ່ອນ!',
            'phone.unique'=>'ເບີໂທນີ້ ໄດ້ມີໃນລະບົບແລ້ວ!',
            'phone.min'=>'ເບີໂທຕ້ອງແມ່ນ 8 ຕົວເລກ! ຕົວຢ່າງ: XXXXXXXX',
            'email.required'=>'ກະລຸນາໃສ່ Email ກ່ອນ!',
            'email.email'=>'ຮູບແບບ Email ບໍ່ຖືກຕ້ອງ!',
            'password.required'=>'ໃສ່ລະຫັດຜ່ານກ່ອນ!',
            'password.min'=>'ລະຫັດຜ່ານຕ້ອງແມ່ນ 6 ຕົວເລກຂື້ນໄປ!',
            'confirmpassword.required'=>'ກະລຸນາຢືນຢັນລະຫັດຜ່ານຄືນກ່ອນ!',
            'confirmpassword.same'=>'ຢືນຢືນລະຫັດຜ່ານ ບໍ່ຄືກັນກັບ ຫ້ອງລະຫັດຜ່ານຂ້າງເທິງ',
            'emp_id.required'=>'ກະລຸນາເລືອກພະນັກງານກ່ອນ!',
            'role_id.required'=>'ກະລຸນາເລືອກສິດນຳໃຊ້ກ່ອນ!'
        ]);
        User::create([
            'name'=> $request->name,
            'phone'=> $request->phone,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'emp_id'=>$request->emp_id,
            'branch_id'=>$request->branch_id,
            'role_id'=>$request->role_id
        ]);
        return redirect()->route('user.index')->with('success','ເພີ່ມຂໍ້ມູນສຳເລັດ!');
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
        $emp = Employee::where('del',0)->get();
        $role = Role::where('del',0)->get();
        $branch = Branch::all();
        return view('backend.settings.user.edit', compact('emp','role','user','branch'));
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
            'name' => 'required',
            'phone'=>'required|min:8',
            'email'=>'required|email',
            'emp_id'=>'required',
            'role_id'=>'required'
        ],[
            'name.required'=>'ກະລຸນາໃສ່ຊື່ຜູ້ໃຊ່ກ່ອນ!',
            'phone.required'=>'ກະລຸນາໃສ່ເບີໂທລະສັບກ່ອນ!',
            'phone.min'=>'ເບີໂທຕ້ອງແມ່ນ 8 ຕົວເລກ! ຕົວຢ່າງ: XXXXXXXX',
            'email.required'=>'ກະລຸນາໃສ່ Email ກ່ອນ!',
            'email.email'=>'ຮູບແບບ Email ບໍ່ຖືກຕ້ອງ!',
            'confirmpassword.required'=>'ກະລຸນາຢືນຢັນລະຫັດຜ່ານຄືນກ່ອນ!',
            'confirmpassword.same'=>'ຢືນຢືນລະຫັດຜ່ານ ບໍ່ຄືກັນກັບ ຫ້ອງລະຫັດຜ່ານຂ້າງເທິງ',
            'emp_id.required'=>'ກະລຸນາເລືອກພະນັກງານກ່ອນ!',
            'role_id.required'=>'ກະລຸນາເລືອກສິດນຳໃຊ້ກ່ອນ!'
        ]);
        if($request->input('password'))
        {
            $user_date = [
                'name'=> $request->name,
                'phone'=> $request->phone,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'emp_id'=>$request->emp_id,
                'branch_id'=>$request->branch_id,
                'role_id'=>$request->role_id
            ];
        }
        else
        {
            $user_date = [
                'name'=> $request->name,
                'phone'=> $request->phone,
                'email'=>$request->email,
                'emp_id'=>$request->emp_id,
                'branch_id'=>$request->branch_id,
                'role_id'=>$request->role_id
            ];
        }
        $user->update($user_date);
        return redirect()->route('user.index')->with('success','ແກ້ໄຂຂໍ້ມູນສຳເລັດ!');
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
        return redirect()->back()->with('success','ລຶບຂໍ້ມູນສຳເລັດ!');
    }

}
