<?php

namespace App\Http\Controllers\Backend\Doc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImportDoc;
use App\Models\DocType;
use App\Models\Department;
use App\Models\StorageFile;
use Illuminate\Support\Facades\Auth;

class ImportDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $import_doc = ImportDoc::orderBy('id','desc')->get();
        return view('backend.document.import.index', compact('import_doc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doc_type = DocType::all();
        $depart = Department::all();
        $storage = StorageFile::all();
        return view('backend.document.import.create', compact('doc_type','depart','storage'));
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
            'depart_id'=>'required',
            'storage_file_id'=>'required',
            'file'=>'required'
        ],[
            'doc_no.required'=>'ກະລຸນາໃສ່ເລກທີຂາອອກກ່ອນ!',
            'date.required'=>'ເລືອກວັນທີກ່ອນ!',
            'doc_type.required'=>'ເລືອກປະເພດເອກະສານກ່ອນ!',
            'short_title.required'=>'ກະລຸນາໃສ່ເນື້ອໃນເອກະສານ!',
            'depart_id.required'=>'ເລືອກພາກສ່ວນສົ່ງກ່ອນ!',
            'storage_file_id.required'=>'ເລືອກບ່ອນເກັບມ້ຽນກ່ອນ!',
            'file.required'=>'ເລືອກຟາຍເອກະສານກ່ອນ!',
        ]);

        $file = $request->file;
        $filename = time().$file->getClientOriginalName();

        $import_doc = ImportDoc::create([
            'doc_no'=>$request->doc_no,
            'date'=>$request->date,
            'doc_type'=>$request->doc_type,
            'no_doc'=>$request->no_doc,
            'date_doc'=>$request->date_doc,
            'short_title'=>$request->short_title,
            'depart_id'=>$request->depart_id,
            'storage_file_id'=>$request->storage_file_id,
            'file'=>'images/doc/import/'.$filename,
            'user_id'=> Auth()->user()->id,
            //'branch_id'=> Auth()->user()->branchname->id
        ]);

        $file->move('images/doc/import/',$filename);

        return redirect()->route('import_doc.index')->with('success','ເພີ່ມຂໍ້ມູນສຳເລັດ!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $import_doc = ImportDoc::find($id);
        return view('backend.document.import.show', compact('import_doc'));
    }

    public function download($id)
    {
        $dl_import = ImportDoc::find($id);
        return response()->file($dl_import->file);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $import_doc = ImportDoc::find($id);
        $doc_type = DocType::all();
        $depart = Department::all();
        $storage = StorageFile::all();

        return view('backend.document.import.edit', compact('import_doc','doc_type','depart','storage'));
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
            'depart_id'=>'required',
            'storage_file_id'=>'required'
        ],[
            'doc_no.required'=>'ກະລຸນາໃສ່ເລກທີຂາອອກກ່ອນ!',
            'date.required'=>'ເລືອກວັນທີກ່ອນ!',
            'doc_type.required'=>'ເລືອກປະເພດເອກະສານກ່ອນ!',
            'short_title.required'=>'ກະລຸນາໃສ່ເນື້ອໃນເອກະສານ!',
            'depart_id.required'=>'ເລືອກພາກສ່ວນສົ່ງກ່ອນ!',
            'storage_file_id.required'=>'ເລືອກບ່ອນເກັບມ້ຽນກ່ອນ!'
        ]);
        $import_doc = ImportDoc::find($id);

        if($request->has('file'))
        {
        
            $file = $request->file;
            $filename = time().$file->getClientOriginalName();
            $file->move('images/doc/import/',$filename);

            $import_data = [
                'doc_no'=>$request->doc_no,
                'date'=>$request->date,
                'doc_type'=>$request->doc_type,
                'no_doc'=>$request->no_doc,
                'date_doc'=>$request->date_doc,
                'short_title'=>$request->short_title,
                'depart_id'=>$request->depart_id,
                'storage_file_id'=>$request->storage_file_id,
                'file'=>'images/doc/import/'.$filename,
                'user_id'=> Auth()->user()->id,
                //'branch_id'=> Auth()->user()->branchname->id
            ];
        } else
        {
            $import_data = [
                'doc_no'=>$request->doc_no,
                'date'=>$request->date,
                'doc_type'=>$request->doc_type,
                'no_doc'=>$request->no_doc,
                'date_doc'=>$request->date_doc,
                'short_title'=>$request->short_title,
                'depart_id'=>$request->depart_id,
                'storage_file_id'=>$request->storage_file_id,
                'user_id'=> Auth()->user()->id,
                //'branch_id'=> Auth()->user()->branchname->id
            ];
        }
        $import_doc->update($import_data);
        return redirect()->route('import_doc.index')->with('success','ບັນທຶກຂໍ້ມູນສຳເລັດ!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $import_doc = ImportDoc::find($id);
        $import_doc->delete();
        return redirect()->route('import_doc.index')->with('success','ລຶບຂໍ້ມູນສຳເລັດ!');
    }
}
