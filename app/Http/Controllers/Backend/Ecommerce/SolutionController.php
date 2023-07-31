<?php

namespace App\Http\Controllers\Backend\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solution;
use App\Models\SolutionType;

class SolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solutions = Solution::orderBy('id','desc')->get();
        return view('backend.ecommerce.solutions.index', compact('solutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $solution_types = SolutionType::all();
        return view('backend.ecommerce.solutions.create', compact('solution_types'));
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
            'image'=>'required|image|max:1024',
            'name_la'=>'required'
        ],[
            'name_la.required'=>'ກະລຸນາໃສ່ຊື່ ໂຊລູຊັ່ນ ພາສາລາວກ່ອນ!',
            'image.image'=>'ກະລຸນາເລືອກຮູບ',
            'image.max'=>'ຮູບໃຫຍ່ກວ່າ 1024 px ກະລຸນາເລືອກໃໝ່!'
        ]);

        $image = $request->image;
        $filename = time().$image->getClientOriginalName();

        Solution::create([
            'name_la'=>$request->name_la,
            'name_en'=>$request->name_en,
            'solution_type_id'=>$request->solution_type_id,
            'short_des_la'=>$request->short_des_la,
            'short_des_en'=>$request->short_des_en,
            'des_la'=>$request->des_la,
            'des_en'=>$request->des_en,
            'image'=>'upload/solutions/'.$filename,
            'status'=>$request->status
        ]);
        $image->move('upload/solutions/',$filename);
        return redirect()->route('solutions.index')->with('success','ເພີ່ມຂໍ້ມູນສຳເລັດ!');
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
        $solutions = Solution::find($id);
        $solution_types = SolutionType::all();
        return view('backend.ecommerce.solutions.edit', compact('solutions','solution_types'));
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
        $solution = Solution::find($id);
        $request->validate([
            'name_la'=>'required',
        ],[
            'name_la.required' => 'ກະລຸນາໃສ່ຊື່ບໍລິການກ່ອນ!',
        ]);

        if($request->has('image'))
        {
            $image = $request->image;
            $filename = time().$image->getClientOriginalName();
            $image->move('upload/solutions/',$filename);

            $solution_data = [
                'name_la'=>$request->name_la,
                'name_en'=>$request->name_en,
                'solution_type_id'=>$request->solution_type_id,
                'short_des_la'=>$request->short_des_la,
                'short_des_en'=>$request->short_des_en,
                'des_la'=>$request->des_la,
                'des_en'=>$request->des_en,
                'image'=>'upload/solutions/'.$filename,
                'status'=>$request->status
            ];
        } else
        {
            $solution_data = [
                'name_la'=>$request->name_la,
                'name_en'=>$request->name_en,
                'solution_type_id'=>$request->solution_type_id,
                'short_des_la'=>$request->short_des_la,
                'short_des_en'=>$request->short_des_en,
                'des_la'=>$request->des_la,
                'des_en'=>$request->des_en,
                'status'=>$request->status
            ];
        }

        $solution->update($solution_data);
        return redirect()->route('solutions.index')->with('success','ແກ້ໄຂຂໍ້ມູນສຳເລັດ!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $solutions = Solution::find($id);
        if(file_exists($solutions->image)) {
            unlink($solutions->image);
            $solutions->delete();
        }
        else
        {
            $solutions->delete();
        }
        return redirect()->back()->with('success','ລຶບຂໍ້ມູນສຳເລັດ!');
    }
}
