<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response([
            'data'=> DB::connection('mysql2')->table('products')
                    ->join('catalogs','products.catalog_id','=','catalogs.id')
                    ->select('products.id','products.name','products.price_online','products.image','products.unit_name','products.des','products.catalog_id','catalogs.name as catalogname')
                    ->orderBy('id','desc')
                    ->where('trash',0)
                    ->get()
        ],200);
    }
    //Get new products
    public function getNewProduct()
    {
        return response([
            'data'=> DB::connection('mysql2')->table('products')
                    ->join('catalogs','products.catalog_id','=','catalogs.id')
                    ->select('products.id','products.name','products.price_online','products.image','products.unit_name','products.des','products.catalog_id','catalogs.name as catalogname')
                    ->orderBy('id','desc')
                    ->where('trash',0)
                    ->get()->take(10)
        ],200);
    }
    //Get random product
    public function getRandomProduct()
    {
        return response([
            'data'=> DB::connection('mysql2')->table('products')
                    ->join('catalogs','products.catalog_id','=','catalogs.id')
                    ->select('products.id','products.name','products.price_online','products.image','products.unit_name','products.des','products.catalog_id','catalogs.name as catalogname')
                    ->where('trash',0)
                    ->inRandomOrder()->get()->take(10)
        ],200);
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
        return response([
            'data'=> DB::connection('mysql2')->table('products')
                    ->join('catalogs','products.catalog_id','=','catalogs.id')
                    ->select('products.id','products.name','products.price_online','products.image','products.unit_name','products.des','products.catalog_id','catalogs.name as catalogname')
                    ->orderBy('id','desc')
                    ->where('trash',0)->where('products.id',$id)
                    ->get()
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
