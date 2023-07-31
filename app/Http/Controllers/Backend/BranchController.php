<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branch = Branch::all();
        return view('backend.settings.branch.index', compact('branch'));
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
        $branch = Branch::find($id);
        return view('backend.settings.branch.edit', compact('branch'));
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
        $branch = Branch::find($id);
        $request->validate([
            'name_la'=>'required'
        ],[
            'name_la.required'=>'ກະລຸນາໃສ່ຊື່ສາຂາ ພາສາລາວ ກ່ອນ!'
        ]);
        if($request->has('logo'))
        {
            $logo = $request->logo;
            $logoname = time().$logo->getClientOriginalName();
            $logo->move('images/', $logoname);
            $branch_data = [
                'logo'=>'images/'.$logoname,
                'name_la'=>$request->name_la,
                'name_en'=>$request->name_en,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'address_la'=>$request->address_la,
                'address_en'=>$request->address_en,
                'whatsapps'=>$request->whatsapps,
                'fanpage'=>$request->fanpage,
                'youtube'=>$request->youtube,
                'play_store'=>$request->play_store,
                'app_store'=>$request->app_store,
                'app_gallery'=>$request->app_gallery,
                'director_sign'=>$request->director_sign,
                'chechker_sign'=>$request->chechker_sign,
                'customer_sign'=>$request->customer_sign,
                'staff_sign'=>$request->staff_sign,
                'bill_header'=>$request->bill_header,
                'bill_footer'=>$request->bill_footer,
                'active'=>$request->active,
            ];
        }
        elseif($request->has('company_photo'))
        {
            $company_photo = $request->company_photo;
            $company_photoName = time().$company_photo->getClientOriginalName();
            $company_photo->move('images/', $company_photoName);
            $branch_data = [
                'company_photo'=>'images/'.$company_photoName,
                'name_la'=>$request->name_la,
                'name_en'=>$request->name_en,
                'address_la'=>$request->address_la,
                'address_en'=>$request->address_en,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'whatsapps'=>$request->whatsapps,
                'fanpage'=>$request->fanpage,
                'youtube'=>$request->youtube,
                'google_map'=>$request->google_map,
                'play_store'=>$request->play_store,
                'app_store'=>$request->app_store,
                'app_gallery'=>$request->app_gallery,
                'director_sign'=>$request->director_sign,
                'chechker_sign'=>$request->chechker_sign,
                'customer_sign'=>$request->customer_sign,
                'staff_sign'=>$request->staff_sign,
                'bill_header'=>$request->bill_header,
                'bill_footer'=>$request->bill_footer,
                'active'=>$request->active,
            ];
            //dd($branch_data);
        }
        elseif($request->has('structure_photo'))
        {
            $structure_photo = $request->structure_photo;
            $structure_photoName = time().$structure_photo->getClientOriginalName();
            $structure_photo->move('images/', $structure_photoName);
            $branch_data = [
                'structure_photo'=>'images/'.$structure_photoName,
                'name_la'=>$request->name_la,
                'name_en'=>$request->name_en,
                'address_la'=>$request->address_la,
                'address_en'=>$request->address_en,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'whatsapps'=>$request->whatsapps,
                'fanpage'=>$request->fanpage,
                'youtube'=>$request->youtube,
                'google_map'=>$request->google_map,
                'play_store'=>$request->play_store,
                'app_store'=>$request->app_store,
                'app_gallery'=>$request->app_gallery,
                'director_sign'=>$request->director_sign,
                'chechker_sign'=>$request->chechker_sign,
                'customer_sign'=>$request->customer_sign,
                'staff_sign'=>$request->staff_sign,
                'bill_header'=>$request->bill_header,
                'bill_footer'=>$request->bill_footer,
                'active'=>$request->active,
            ];
        }
        else
        {
            $branch_data = [
                'name_la'=>$request->name_la,
                'name_en'=>$request->name_en,
                'address_la'=>$request->address_la,
                'address_en'=>$request->address_en,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'whatsapps'=>$request->whatsapps,
                'fanpage'=>$request->fanpage,
                'youtube'=>$request->youtube,
                'google_map'=>$request->google_map,
                'play_store'=>$request->play_store,
                'app_store'=>$request->app_store,
                'app_gallery'=>$request->app_gallery,
                'director_sign'=>$request->director_sign,
                'chechker_sign'=>$request->chechker_sign,
                'customer_sign'=>$request->customer_sign,
                'staff_sign'=>$request->staff_sign,
                'bill_header'=>$request->bill_header,
                'bill_footer'=>$request->bill_footer,
                'active'=>$request->active,
            ];
        }
        $branch->update($branch_data);
        return redirect(route('branch.index'))->with('success','ບັນທຶກຂໍ້ມູນໃໝ່ສຳເລັດ!');
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
