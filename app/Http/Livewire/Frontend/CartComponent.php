<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function render()
    {
        return view('livewire.frontend.cart-component')
        ->layout('layouts.frontend.base-frontend');
    }
    //Qty +1
    public function increaseQty($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId,$qty);
    }
    //Qty -1
    public function decreaseQty($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId,$qty);
    }
    //Remove product from list cart
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        session()->flash('success_message','ລຶບລາຍການສຳເລັດ!');
    }
}
