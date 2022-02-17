<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Auth;
use Storage;
use Session;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customers.index', Compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.new');
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
            'name'=>'required',
            'url'=>'required',
            'icon'=>'required',
            'position'=>'required'
        ]);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->user_id = Auth::user()->id;
        $customer->url = $request->url;
        $customer->position = $request->position;

        if($request->hasFile('icon')){
            $customer->icon = $request->icon->store('/public/customers');
        }

        if($customer->save()){
            Session::flash('success','Registro Insertado con Exito!!');
        }else{
            Session::flash('errors', 'Error el intentar realizar el Registro!!');
        }

        return redirect()->route('customers.index');
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
        $customer = Customer::findorfail($id);
        return view('admin.customers.edit',Compact('customer'));
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
            'name'=>'required',
            'url'=>'required',
            'position'=>'required'
        ]);

        $customer = Customer::findorfail($id);
        $customer->name = $request->name;
        $customer->user_id = Auth::user()->id;
        $customer->url = $request->url;
        $customer->position = $request->position;

        if($request->hasFile('icon')){
            $customer->icon = $request->icon->store('/public/customers');
        }

        if($customer->update()){
            Session::flash('success','Registro Actualizado con Exito!!');
        }else{
            Session::flash('errors', 'Error el intentar actualizar el Registro!!');
        }

        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findorfail($id);
        Storage::delete($customer->icon);
        if($customer->delete()){
            Session::flash('success','Registro Eliminado con Exito!!');
        }else{
            Session::flash('errors','Error al tratar de eliminar el Registro!!');
        }
        return redirect()->route('customers.index');
    }
}
