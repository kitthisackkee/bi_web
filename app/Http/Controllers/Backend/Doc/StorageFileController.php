<?php

namespace App\Http\Controllers\Backend\Doc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StorageFile;

class StorageFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $storage_file = StorageFile::all();
        return view('backend.document.storagefile.index', compact('storage_file'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.document.storagefile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ],[
            'name.required'=>'ໃສ່ຊື່ປະເພດເອກະສານກ່ອນ!'
        ]);
        StorageFile::create($request->all());
        return redirect()->route('storage_file.index')->with('success','ເພີ່ມຂໍ້ມູນສຳເລັດ!');
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
        $storage_file = StorageFile::find($id);
        return view('backend.document.storagefile.edit', compact('storage_file'));
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
        $storage_file = StorageFile::find($id);
        $request->validate([
            'name' => 'required'
        ],[
            'name.required'=>'ໃສ່ຊື່ປະເພດເອກະສານກ່ອນ!'
        ]);
        $storage_file->update($request->all());
        return redirect()->route('storage_file.index')->with('success','ແກ້ໄຂຂໍ້ມູນສຳເລັດ!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $storage_file = StorageFile::find($id);
        $storage_file->delete();
        return redirect()->route('storage_file.index')->with('success','ລຶບຂໍ້ມູນສຳເລັດ!');
    }
}
