<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Value;
use Auth;
use Session;
use Storage;

class ValuesController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $values = Value::all();
        return view('admin.values.index', Compact('values'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.values.new');
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
            'key'=>'required',
            'label'=>'required',
            'type'=>'required'
        ]);

        $Value = new Value();
        $Value->key = $request->key;
        $Value->label = $request->label;
        $Value->type = $request->type;
        $Value->user_id = Auth::user()->id;

        if(isset($request->value) and !empty($request->value)){
            $Value->value = $request->value;
        }else{
            if($request->hasFile('file')){
                $Value->value = $request->file->store('public/values/file');
            }else{
                $Value->value = NULL;
            }
        }

        if($Value->save()){
            Session::flash('success','Registro Insertado con Exito!!');
        }else{
            Session::flash('errors', 'Error el intentar realizar el Registro!!');
        }

        return redirect()->route('values.index');
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
        $Value = Value::findorfail($id);
        return view('admin.values.edit',Compact('Value'));
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
            'key'=>'required',
            'label'=>'required',
            'type'=>'required'
        ]);

        $Value = Value::findorfail($id);
        $Value->key = $request->key;
        $Value->label = $request->label;
        $Value->user_id = Auth::user()->id;

        if(isset($request->value) and !empty($request->value)){
            if($Value->type == 'file'){
                 Storage::delete($Value->value);
            }
            $Value->type = $request->type;
            $Value->value = $request->value;
        }else{
            if($request->hasFile('file')){
                Storage::delete($Value->value);
                $Value->value = $request->file->store('public/values/file');
            }else{
                $Value->value = NULL;
            }
        }

        if($Value->save()){
            Session::flash('success','Registro Insertado con Exito!!');
        }else{
            Session::flash('errors', 'Error el intentar realizar el Registro!!');
        }

        return redirect()->route('values.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Value = Value::findorfail($id);
        if($Value->type == 'file'){
            Storage::delete($Value->value);
        }
        if($Value->delete()){
            Session::flash('success','Registro Eliminado con Exito!!');
        }else{
            Session::flash('errors','Error al tratar de eliminar el Registro!!');
        }
        return redirect()->route('values.index');
    }
}
