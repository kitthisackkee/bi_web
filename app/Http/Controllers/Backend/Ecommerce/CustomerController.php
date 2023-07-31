<?php

namespace App\Http\Controllers\Backend\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CustomerType;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::orderBy('id','desc')->get();
        return view('backend.ecommerce.customer.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cutsomtertype = CustomerType::all();
        return view('backend.ecommerce.customer.create', compact('cutsomtertype'));
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
            'name_la'=>'required',
            'image'=>'required'
        ],[
            'name_la.required'=>'ກະລູນາໃສ່ຊື່ Slide ກ່ອນ!',
            'image.required'=>'ເລືອກຟາຍຮູບກ່ອນ!',
        ]);

        $image = $request->image;
        $filename = time().$image->getClientOriginalName();

        Customer::create([
            'name_la'=>$request->name_la,
            'name_en'=>$request->name_en,
            'image'=>'upload/customer/'.$filename,
            'customer_type_id'=> $request->customer_type_id,
        ]);

        $image->move('upload/customer/',$filename);

        return redirect()->route('customer_logo.index')->with('success','ເພີ່ມຂໍ້ມູນສຳເລັດ!');
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
        $customer = Customer::find($id);
        $cutsomtertype = CustomerType::all();
        return view('backend.ecommerce.customer.edit', compact('customer','cutsomtertype'));
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
        $customer = Customer::find($id);
        $request->validate([
            'name_la'=>'required',
        ],[
            'name_la.required'=>'ກະລູນາໃສ່ຊື່ Slide ກ່ອນ!',
        ]);

        if($request->has('image'))
        {
            $image = $request->image;
            $filename = time().$image->getClientOriginalName();
            $image->move('upload/customer/',$filename);

            $customer_data = [
                'name_la'=>$request->name_la,
                'name_en'=>$request->name_en,
                'image'=>'upload/customer/'.$filename,
                'customer_type_id'=> $request->customer_type_id,
            ];
        } else
        {
            $customer_data = [
                'name_la'=>$request->name_la,
                'name_en'=>$request->name_en,
                'customer_type_id'=> $request->customer_type_id,
            ];
        }
        $customer->update($customer_data);
        return redirect()->route('customer_logo.index')->with('success','ບັນທຶກຂໍ້ມູນສຳເລັດ!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('customer_logo.index')->with('success','ລຶບຂໍ້ມູນສຳເລັດ!');
    }
}
