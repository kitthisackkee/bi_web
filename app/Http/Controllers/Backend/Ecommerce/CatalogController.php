<?php

namespace App\Http\Controllers\Backend\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalog = DB::connection('mysql2')->table('catalogs')
                    ->select('id','name','image')->orderBy('id','desc')->paginate(12);
        return view('backend.ecommerce.catalog.index', compact('catalog'));
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
        $catalog = DB::connection('mysql2')->table('catalogs')->find($id);
        return view('backend.ecommerce.catalog.edit', compact('catalog'));
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
        $catalog = DB::connection('mysql2')->table('catalogs')->where('id',$id)->limit(1);
        if($request->has('file'))
        {
            $img = $request->file;
            $imagename = time().$img->getClientOriginalName();
            $img->move('upload/catalog/', $imagename);
            $cat_data = [
                'image' => 'upload/catalog/'.$imagename,
            ];
        }else{
            $cat_data = [

            ];
        }
        $catalog->update($cat_data);
        return redirect()->route('catalog.index')->with('success','ແກ້ໄຂຂໍ້ມູນສຳເລັດ!');
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
