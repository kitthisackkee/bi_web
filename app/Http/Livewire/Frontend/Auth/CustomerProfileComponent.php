<?php

namespace App\Http\Livewire\Frontend\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;

class CustomerProfileComponent extends Component
{
    public $name, $phone, $email, $address, $password, $confirmpassword;

    public function mount()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $this->name = $user->name;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->address = $user->address;
    }

    public function render()
    {
        return view('livewire.frontend.auth.customer-profile-component')
        ->layout('layouts.frontend.base-frontend');
    }

    public function updateProfile()
    {
        $updateId = auth()->user()->id;

        if($updateId > 0)
        {
            $validator = $this->validate([
                'name'=>'required',
                'phone'=>'required|min:8|numeric|',
                'email'=>'email',
            ],[
                'name.required'=>'ໃສ່ຊື່ລູກຄ້າກ່ອນ',
                'phone.required'=>'ໃສ່ເບີ້ໂທລະສັບກ່ອນ',
                'phone.min'=>'ເບີ້ໂທລະສັບຕ້ອງ 8 ຕົວ',
                'phone.numeric'=>'ເບີ້ໂທຕ້ອງແມ່ນຕົວເລກ',
                'email.email'=>'Email ບໍ່ຖືກຮູບແບບ',
            ]);
        }
        if(!empty($this->password))
        {
            $user_data = [
                'name'=> $this->name,
                'phone'=> $this->phone,
                'email'=> $this->email,
                'address'=> $this->address,
                'password'=> bcrypt($this->password),
            ];
        }
        else
        {
            $user_data = [
                'name'=> $this->name,
                'phone'=> $this->phone,
                'email'=> $this->email,
                'address'=> $this->address,
            ];
        }
        DB::table('users')->where('id', $updateId)->update($user_data);
        session()->flash('message', 'ແກ້ໄຂຂໍ້ມູນສຳເລັດ!');
    }
}
