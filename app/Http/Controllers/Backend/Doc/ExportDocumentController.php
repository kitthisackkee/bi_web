<?php

namespace App\Http\Controllers\Backend\Doc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExportDoc;
use App\Models\DocType;
use App\Models\ExternalParts;
use App\Models\StorageFile;
use Illuminate\Support\Facades\Auth;

class ExportDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $export_doc = ExportDoc::orderBy('id','desc')->get();
        return view('backend.document.export.index', compact('export_doc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doc_type = DocType::all();
        $external_parts = ExternalParts::all();
        $storage = StorageFile::all();

        return view('backend.document.export.create', compact('doc_type','external_parts','storage'));
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
            'doc_no'=>'required',
            'date'=>'required',
            'doc_type'=>'required',
            'short_title'=>'required',
            'external_parts_id'=>'required',
            'storage_file_id'=>'required',
            'file'=>'required'
        ],[
            'doc_no.required'=>'ກະລຸນາໃສ່ເລກທີຂາອອກກ່ອນ!',
            'date.required'=>'ເລືອກວັນທີກ່ອນ!',
            'doc_type.required'=>'ເລືອກປະເພດເອກະສານກ່ອນ!',
            'short_title.required'=>'ກະລຸນາໃສ່ເນື້ອໃນເອກະສານ!',
            'external_parts_id.required'=>'ເລືອກພາກສ່ວນສົ່ງກ່ອນ!',
            'storage_file_id.required'=>'ເລືອກບ່ອນເກັບມ້ຽນກ່ອນ!',
            'file.required'=>'ເລືອກຟາຍເອກະສານກ່ອນ!',
        ]);

        $file = $request->file;
        $filename = time().$file->getClientOriginalName();

        $export_doc = ExportDoc::create([
            'doc_no'=>$request->doc_no,
            'date'=>$request->date,
            'doc_type'=>$request->doc_type,
            'short_title'=>$request->short_title,
            'external_parts_id'=>$request->external_parts_id,
            'storage_file_id'=>$request->storage_file_id,
            'file'=>'images/doc/export/'.$filename,
            'showweb'=>$request->showweb,
            'user_id'=> Auth()->user()->id,
            //'branch_id'=> Auth()->user()->branchname->id
        ]);

        $file->move('images/doc/export/',$filename);

        return redirect()->route('export_doc.index')->with('success','ເພີ່ມຂໍ້ມູນສຳເລັດ!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $export_doc = ExportDoc::find($id);
        return view('backend.document.export.show', compact('export_doc'));
    }

    public function download($id)
    {
        $dl_export = ExportDoc::find($id);
        return response()->file($dl_export->file);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $export_doc = ExportDoc::find($id);
        $doc_type = DocType::all();
        $external_parts = ExternalParts::all();
        $storage = StorageFile::all();

        return view('backend.document.export.edit', compact('export_doc','doc_type','external_parts','storage'));
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
            'doc_no'=>'required',
            'date'=>'required',
            'doc_type'=>'required',
            'short_title'=>'required',
            'external_parts_id'=>'required',
            'storage_file_id'=>'required'
        ],[
            'doc_no.required'=>'ກະລຸນາໃສ່ເລກທີຂາອອກກ່ອນ!',
            'date.required'=>'ເລືອກວັນທີກ່ອນ!',
            'doc_type.required'=>'ເລືອກປະເພດເອກະສານກ່ອນ!',
            'short_title.required'=>'ກະລຸນາໃສ່ເນື້ອໃນເອກະສານ!',
            'external_parts_id.required'=>'ເລືອກພາກສ່ວນສົ່ງກ່ອນ!',
            'storage_file_id.required'=>'ເລືອກບ່ອນເກັບມ້ຽນກ່ອນ!'
        ]);
        $export_doc = ExportDoc::find($id);

        if($request->has('file'))
        {
        
            $file = $request->file;
            $filename = time().$file->getClientOriginalName();
            $file->move('images/doc/export/',$filename);

            $export_data = [
                'doc_no'=>$request->doc_no,
                'date'=>$request->date,
                'doc_type'=>$request->doc_type,
                'short_title'=>$request->short_title,
                'external_parts_id'=>$request->external_parts_id,
                'storage_file_id'=>$request->storage_file_id,
                'file'=>'images/doc/export/'.$filename,
                'showweb'=>$request->showweb,
                'user_id'=> Auth()->user()->id,
                //'branch_id'=> Auth()->user()->branchname->id
            ];
        } else
        {
            $export_data = [
                'doc_no'=>$request->doc_no,
                'date'=>$request->date,
                'doc_type'=>$request->doc_type,
                'short_title'=>$request->short_title,
                'external_parts_id'=>$request->external_parts_id,
                'storage_file_id'=>$request->storage_file_id,
                'showweb'=>$request->showweb,
                'user_id'=> Auth()->user()->id,
                //'branch_id'=> Auth()->user()->branchname->id
            ];
        }
        $export_doc->update($export_data);
        return redirect()->route('export_doc.index')->with('success','ບັນທຶກຂໍ້ມູນສຳເລັດ!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $export_doc = ExportDoc::find($id);
        $export_doc->delete();
        return redirect()->route('export_doc.index')->with('success','ລຶບຂໍ້ມູນສຳເລັດ!');
    }
}
