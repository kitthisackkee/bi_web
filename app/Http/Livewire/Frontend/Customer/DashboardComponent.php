<?php

namespace App\Http\Livewire\Frontend\Customer;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;

class DashboardComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search, $searchExam;

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
        $book = Book::where('term_id', Auth::user()->term_id)->paginate(10);

        $book_1 = Book::where('term_id', 1)->count();
        $book_2 = Book::where('term_id', 2)->count();
        $book_3 = Book::where('term_id', 3)->count();
        $book_4 = Book::where('term_id', 4)->count();

        return view('livewire.frontend.customer.dashboard-component', compact('book','book_1','book_2','book_3','book_4'))
        ->layout('layouts.frontend.base-frontend');
    }

    public function updateProfile()
    {
        $updateId = auth()->user()->id;

        if($updateId > 0)
        {
            $this->validate([
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
        try
        {
            $user_data = [
                'name'=> $this->name,
                'phone'=> $this->phone,
                'email'=> $this->email,
                'address'=> $this->address,
                'password'=> bcrypt($this->password),
            ];
        }
        catch(Throwable $e)
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

    public function download($id)
    {
        $book = Book::find($id);
        return response()->file($book->file);
    }
}
