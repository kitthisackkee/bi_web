<?php

namespace App\Http\Controllers\Backend\Doc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LocalDoc;
use App\Models\DocType;
use App\Models\StorageFile;
use Illuminate\Support\Facades\Auth;

class LocalDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $local_doc = LocalDoc::orderBy('id','desc')->get();
        return view('backend.document.localdoc.index', compact('local_doc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doc_type = DocType::all();
        $storage = StorageFile::all();
        return view('backend.document.localdoc.create', compact('doc_type','storage'));
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
            'date'=>'required',
            'doc_type'=>'required',
            'short_title'=>'required',
            'storage_file_id'=>'required',
            'file'=>'required'
        ],[
            'date.required'=>'ເລືອກວັນທີກ່ອນ!',
            'doc_type.required'=>'ເລືອກປະເພດເອກະສານກ່ອນ!',
            'short_title.required'=>'ກະລຸນາໃສ່ເນື້ອໃນເອກະສານ!',
            'storage_file_id.required'=>'ເລືອກບ່ອນເກັບມ້ຽນກ່ອນ!',
            'file.required'=>'ເລືອກຟາຍເອກະສານກ່ອນ!',
        ]);

        $file = $request->file;
        $filename = time().$file->getClientOriginalName();

        $local_doc = LocalDoc::create([
            'date'=>$request->date,
            'doc_type'=>$request->doc_type,
            'short_title'=>$request->short_title,
            'storage_file_id'=>$request->storage_file_id,
            'file'=>'images/doc/local/'.$filename,
            'user_id'=> Auth()->user()->id,
            //'branch_id'=> Auth()->user()->branchname->id
        ]);

        $file->move('images/doc/local/',$filename);

        return redirect()->route('local_doc.index')->with('success','ເພີ່ມຂໍ້ມູນສຳເລັດ!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $local_doc = LocalDoc::find($id);
        return view('backend.document.localdoc.show', compact('local_doc'));
    }

    public function download($id)
    {
        $dl_local = LocalDoc::find($id);
        return response()->file($dl_local->file);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $local_doc = LocalDoc::find($id);
        $doc_type = DocType::all();
        $storage = StorageFile::all();

        return view('backend.document.localdoc.edit', compact('local_doc','doc_type','storage'));
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
        $request->validate([
            'date'=>'required',
            'doc_type'=>'required',
            'short_title'=>'required',
            'storage_file_id'=>'required'
        ],[
            'date.required'=>'ເລືອກວັນທີກ່ອນ!',
            'doc_type.required'=>'ເລືອກປະເພດເອກະສານກ່ອນ!',
            'short_title.required'=>'ກະລຸນາໃສ່ເນື້ອໃນເອກະສານ!',
            'storage_file_id.required'=>'ເລືອກບ່ອນເກັບມ້ຽນກ່ອນ!'
        ]);
        $local_doc = LocalDoc::find($id);

        if($request->has('file'))
        {
        
            $file = $request->file;
            $filename = time().$file->getClientOriginalName();
            $file->move('images/doc/export/',$filename);

            $local_data = [
                'date'=>$request->date,
                'doc_type'=>$request->doc_type,
                'short_title'=>$request->short_title,
                'storage_file_id'=>$request->storage_file_id,
                'file'=>'images/doc/export/'.$filename,
                'user_id'=> Auth()->user()->id,
                //'branch_id'=> Auth()->user()->branchname->id
            ];
        } else
        {
            $local_data = [
                'date'=>$request->date,
                'doc_type'=>$request->doc_type,
                'short_title'=>$request->short_title,
                'storage_file_id'=>$request->storage_file_id,
                'user_id'=> Auth()->user()->id,
                //'branch_id'=> Auth()->user()->branchname->id
            ];
        }
        $local_doc->update($local_data);
        return redirect()->route('local_doc.index')->with('success','ບັນທຶກຂໍ້ມູນສຳເລັດ!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $local_doc = LocalDoc::find($id);
        $local_doc->delete();
        return redirect()->route('local_doc.index')->with('success','ລຶບຂໍ້ມູນສຳເລັດ!');
    }
}
