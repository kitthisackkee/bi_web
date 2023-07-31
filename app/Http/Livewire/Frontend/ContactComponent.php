<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Message;

class ContactComponent extends Component
{
    public $name, $phone, $email, $subject, $message, $status;
    public function render()
    {
        return view('livewire.frontend.contact-component')
        ->layout('layouts.frontend.base-frontend');
    }

    public function resetField()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->subject = '';
        $this->message = '';
    }

    public function sendMessage()
    {
        $this->validate([
            'name'=>'required',
            'phone'=> 'required',
            'subject'=>'required',
        ],[
            'name.required'=>'ໃສ່ຊື່ ແລະ ນາມສະກຸນ ທ່ານກ່ອນ!',
            'phone.required'=>'ໃສ່ເບີ້ໂທລະສັບທ່ານກ່ອນ!',
            'subject.required'=>'ໃສ່ຫົວເລື່ອງທີ່ທ່ານຕ້ອງການພົວພັນກ່ອນ!',
        ]);

        $message = new Message();
        $message->name = $this->name;
        $message->phone = $this->phone;
        $message->email = $this->email;
        $message->subject = $this->subject;
        $message->message = $this->message;
        $message->save();

        $this->emit('alert', ['type' => 'success', 'message' => 'Your message sent!']);
        $this->resetField();
    }
}
