<?php

namespace App\Http\Controllers\Backend\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = DB::connection('mysql2')->table('products')
                    ->join('catalogs','products.catalog_id','=','catalogs.id')
                    ->select('products.*','catalogs.name as catalogname')
                    ->orderBy('products.id','desc')
                    ->where('trash',0)
                    ->paginate(15);
        return view('backend.ecommerce.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::connection('mysql2')->table('products')->find($id);
        return view('backend.ecommerce.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = DB::connection('mysql2')->table('products')->find($id);
        return view('backend.ecommerce.product.edit', compact('product'));
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
        $product = DB::connection('mysql2')->table('products')->where('products.id',$id)->limit(1);
        $this->validate($request,[
            'price_online' => 'required',
        ],[
            'price_online.required' => 'ກະລຸນາໃສ່ລາຄາຂາຍອອນລາຍກ່ອນ!'
        ]);
        
        if($request->has('file'))
        {
            $img = $request->file;
            $imagename = time().$img->getClientOriginalName();
            $img->move('upload/product/', $imagename);
            $pro_data = [
                'price_online'=>str_replace(',','',$request->price_online),
                'des' => $request->des,
                'image' => 'upload/product/'.$imagename,
                'long_des'=> $request->long_des
            ];
        }else{
            $pro_data = [
                'price_online'=>str_replace(',','',$request->price_online),
                'des' => $request->des,
                'long_des'=> $request->long_des
            ];
        }
        $product->update($pro_data);
        return redirect()->route('product.index')->with('success','ແກ້ໄຂຂໍ້ມູນສຳເລັດ!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
