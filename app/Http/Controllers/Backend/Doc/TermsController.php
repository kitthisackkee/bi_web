<?php

namespace App\Http\Controllers\Backend\Doc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Term;

class TermsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $term = Term::where('status', 1)->orderBy('id','desc')->get();
        return view('backend.document.term.index', compact('term'));
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

        if(empty($request->term_id)){
            $request->validate([
                'name'=>'required',
            ],[
                'name.required'=>'ກະລຸນາເພີ່ມຊື່ ປີຮຽນ ກ່ອນ!',
            ]);
            $term = new Term;
            $term->name = $request->name;
            $term->note = $request->note;
            $term->save();
            return redirect()->route('term.index')->with('success','ເພີ່ມຂໍ້ມູນສຳເລັດ!');
        }else{
            $request->validate([
                'edit_name'=>'required',
            ],[
                'edit_name.required'=>'ກະລຸນາເພີ່ມຊື່ ປີຮຽນ ກ່ອນ!',
            ]);
            $term = Term::find($request->term_id);
            $term->name = $request->edit_name;
            $term->note = $request->edit_note;
            $term->save();
            return redirect()->route('term.index')->with('success','ແກ້ໄຂຂໍ້ມູນສຳເລັດ!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $term = Term::find($id);
	    return response()->json($term);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $term = Term::find($id);
        $term->delete();
        return redirect()->route('term.index')->with('success','ລຶບຂໍ້ມູນສຳເລັດ!');
    }

}
