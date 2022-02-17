<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expert;
use Auth;
use Session;
use Storage;

class ExpertsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experts = Expert::all();
        return view('admin.experts.index', Compact('experts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.experts.new');
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
            'icon'=>'required',
            'position'=>'required'
        ]);

        $expert = new Expert();
        $expert->name = $request->name;
        $expert->position = $request->position;
        $expert->user_id = Auth::user()->id;
        if($request->hasFile('icon')){
            $expert->icon = $request->icon->store('/public/experts');
        }

        if($expert->save()){
            Session::flash('success','Registro Insertado con Exito!!');
        }else{
            Session::flash('errors', 'Error el intentar realizar el Registro!!');
        }

        return redirect()->route('experts.index');
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
        $expert = Expert::findorfail($id);
        return view('admin.experts.edit',Compact('expert'));
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
            'position'=>'required'
        ]);

        $expert = Expert::findorfail($id);
        $expert->name = $request->name;
        $expert->position = $request->position;
        $expert->user_id = Auth::user()->id;

        if($request->hasFile('icon')){
            Storage::delete($expert->icon);
            $expert->icon = $request->icon->store('/public/experts');
        }

        if($expert->update()){
            Session::flash('success','Registro Actualizado con Exito!!');
        }else{
            Session::flash('errors', 'Error el intentar Actualizar el Registro!!');
        }

        return redirect()->route('experts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expert = Expert::findorfail($id);
        Storage::delete($expert->icon);
        if($expert->delete()){
            Session::flash('success','Registro Eliminado con Exito!!');
        }else{
            Session::flash('errors','Error al tratar de eliminar el Registro!!');
        }
        return redirect()->route('experts.index');
    }

}
