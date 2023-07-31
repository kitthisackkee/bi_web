<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithPagination;
use DB;
use Cart;

class ShopComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $search_products, $searchByCatalog;

    public function mount()
    {
        $this->searchByCatalog;
    }
    public function render()
    {
        $all_catalogs = DB::connection('mysql2')->table('catalogs')->select('id','name')->get();
        $products = DB::connection('mysql2')->table('products')
                    ->select('id','name','image','price_online','catalog_id')
                    ->where('name','like', '%'. $this->search_products . '%')
                    ->where('catalog_id','like', '%'. $this->searchByCatalog . '%')
                    ->orderBy('price_online','desc')
                    ->where('trash',0)
                    //->where('image', '<>', '')
                    ->paginate(20);

        return view('livewire.frontend.shop-component', compact('all_catalogs','products'))
        ->layout('layouts.frontend.base-frontend');
    }

    //Search by Customer type
    public function searchByCatalog($id)
    {
        //dd($id);
        $singleData = DB::connection('mysql2')->table('catalogs')->select('id','name')->where('id', $id)->first();
        $this->searchByCatalog = $singleData->id;
        //dd($this->search_by_cat);
    }

    //Add to cart
    public function addtoCart($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message','ເພີ່ມເຂົ້າກະຕ່າສຳເລັດ!');
        return redirect()->route('cart');
    }
}
