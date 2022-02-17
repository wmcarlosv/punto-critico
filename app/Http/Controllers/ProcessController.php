<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proces;
use Auth;
use Session;
use Storage;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $process = Proces::all();
        return view('admin.process.index', Compact('process'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.process.new');
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
            'title'=>'required',
            'icon'=>'required',
            'position'=>'required',
            'content'=>'required'
        ]);

        $proces = new Proces();
        $proces->title = $request->title;
        $proces->user_id = Auth::user()->id;
        $proces->position = $request->position;
        $proces->content = $request->content;

        if($request->hasFile('icon')){
            $proces->icon = $request->icon->store('/public/process');
        }

        if($proces->save()){
            Session::flash('success','Registro Insertado con Exito!!');
        }else{
            Session::flash('errors', 'Error el intentar realizar el Registro!!');
        }

        return redirect()->route('process.index');
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
        $proces = Proces::findorfail($id);
        return view('admin.process.edit',Compact('proces'));
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
            'title'=>'required',
            'position'=>'required',
            'content'=>'required'
        ]);

        $proces = Proces::findorfail($id);
        $proces->title = $request->title;
        $proces->user_id = Auth::user()->id;
        $proces->position = $request->position;
        $proces->content = $request->content;

        if($request->hasFile('icon')){
            $proces->icon = $request->icon->store('/public/process');
        }

        if($proces->update()){
            Session::flash('success','Registro Actualizado con Exito!!');
        }else{
            Session::flash('errors', 'Error el intentar actualizar el Registro!!');
        }

        return redirect()->route('process.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proces = Proces::findorfail($id);
        Storage::delete($proces->icon);
        if($proces->delete()){
            Session::flash('success','Registro Eliminado con Exito!!');
        }else{
            Session::flash('errors','Error al tratar de eliminar el Registro!!');
        }
        return redirect()->route('process.index');
    }
}
