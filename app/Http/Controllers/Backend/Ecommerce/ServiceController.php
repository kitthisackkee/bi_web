<?php

namespace App\Http\Controllers\Backend\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::orderBy('id','desc')->get();
        return view('backend.ecommerce.service.index', compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.ecommerce.service.create');
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
            //'image'=>'required',
            'icon'=>'required',
            'name_la'=>'required',
        ],[
            //'image.required' => 'ໃສ່ຮູບແບບໄອຄ່ອນກ່ອນ!',
            'icon.required'=>'ໃສ່ສັນຍາລັກກ່ອນ!',
            'name_la.required' => 'ກະລຸນາໃສ່ຊື່ບໍລິການກ່ອນ!',
        ]);
        //$image = $request->image;
        //$filename = time().$image->getClientOriginalName();

        Service::create([
            'icon'=>$request->icon,
            'name_la'=>$request->name_la,
            'name_en'=>$request->name_en,
            'short_des_la'=>$request->short_des_la,
            'short_des_en'=>$request->short_des_en,
            'des_la'=>$request->des_la,
            'des_en'=>$request->des_en,
            //'image'=>'upload/service/'.$filename,
            'status'=>$request->status
        ]);
        //$image->move('upload/service/',$filename);
        return redirect()->route('service.index')->with('success','ເພີ່ມຂໍ້ມູນສຳເລັດ!');
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
        $service = Service::find($id);
        return view('backend.ecommerce.service.edit', compact('service'));
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
        $service = Service::find($id);
        $request->validate([
            'name_la'=>'required',
        ],[
            'name_la.required' => 'ກະລຸນາໃສ່ຊື່ບໍລິການກ່ອນ!',
        ]);

        if($request->has('image'))
        {
            //$image = $request->image;
            //$filename = time().$image->getClientOriginalName();
            //$image->move('upload/service/',$filename);

            $service_data = [
                'icon'=>$request->icon,
                'name_la'=>$request->name_la,
                'name_en'=>$request->name_en,
                'short_des_la'=>$request->short_des_la,
                'short_des_en'=>$request->short_des_en,
                'des_la'=>$request->des_la,
                'des_en'=>$request->des_en,
                //'image'=>'upload/service/'.$filename,
                'status'=>$request->status
            ];
        } else
        {
            $service_data = [
                'icon'=>$request->icon,
                'name_la'=>$request->name_la,
                'name_en'=>$request->name_en,
                'short_des_la'=>$request->short_des_la,
                'short_des_en'=>$request->short_des_en,
                'des_la'=>$request->des_la,
                'des_en'=>$request->des_en,
                'status'=>$request->status
            ];
        }

        $service->update($service_data);
        return redirect()->route('service.index')->with('success','ແກ້ໄຂຂໍ້ມູນສຳເລັດ!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        if(file_exists($service->image)) {
            unlink($service->image);
            $service->delete();
        }
        else
        {
            $service->delete();
        }
        return redirect()->back()->with('success','ລຶບຂໍ້ມູນສຳເລັດ!');
    }
}
