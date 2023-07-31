<?php

namespace App\Http\Livewire\Frontend\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CustomerRegisterComponent extends Component
{
    public $name, $phone, $email, $password, $confirmpassword;
    public function render()
    {
        return view('livewire.frontend.auth.customer-register-component')
        ->layout('layouts.frontend.base-frontend');
    }

    public function register()
    {
        $this->validate([
            'name'=>'required',
            'phone'=>'required|min:8|numeric|unique:users,phone',
            'email'=>'email',
            'password'=>'required|min:6',
            'confirmpassword'=>'required|same:password',
        ],[
            'name.required'=>'ໃສ່ຊື່ລູກຄ້າກ່ອນ',
            'phone.required'=>'ໃສ່ເບີ້ໂທລະສັບກ່ອນ',
            'phone.min'=>'ເບີ້ໂທລະສັບຕ້ອງ 8 ຕົວ',
            'phone.numeric'=>'ເບີ້ໂທຕ້ອງແມ່ນຕົວເລກ',
            'phone.unique'=>'ເບີ້ໂທນີ້ໄດ້ມີໃນລະບົບແລ້ວ',
            'email.email'=>'Email ບໍ່ຖືກຮູບແບບ',
            'password.required'=>'ໃສ່ລະຫັດຜ່ານກ່ອນ',
            'password.min'=>'ລະຫັດຜ່ານຕ້ອງຫຼາຍກວ່າ 6 ຕົວ',
            'confirmpassword.required'=>'ຢືນຢັນລະຫັດຜ່ານກ່ອນ',
            'confirmpassword.same'=>'ຢືນຢັນລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ'
        ]);
        $user = User::create([
            'name'=> $this->name,
            'phone'=> $this->phone,
            'email'=> $this->email,
            'password'=> bcrypt($this->password),
        ]);
        
        Auth::login($user);
        return redirect(route('customer.dashboard'));

    }
}
