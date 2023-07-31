<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Customer;
use App\Models\CustomerType;

class CustomersComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $customer_type = CustomerType::all();
        $gov_customers = Customer::select('image')->orderBy('id','desc')->where('customer_type_id',1)->get();
        $customers = Customer::select('image')->orderBy('id','desc')->where('customer_type_id',2)->paginate(32);
        return view('livewire.frontend.customers-component', compact('customers','customer_type','gov_customers'))
        ->layout('layouts.frontend.base-frontend');
    }
}
