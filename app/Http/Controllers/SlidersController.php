<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Auth;
use Session;
use Storage;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index', Compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.new');
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
            'image'=>'required',
            'position'=>'required'
        ]);

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->user_id = Auth::user()->id;
        if($request->hasFile('image')){
            $slider->image = $request->image->store('/public/sliders');
        }else{
            $slider->image = null;
        }

        $slider->position = $request->position;

        if($slider->save()){
            Session::flash('success','Registro Insertado con Exito!!');
        }else{
            Session::flash('errors', 'Error el intentar realizar el Registro!!');
        }

        return redirect()->route('sliders.index');
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
        $slider = Slider::findorfail($id);
        return view('admin.sliders.edit',Compact('slider'));
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
            'image'=>'required',
            'position'=>'required'
        ]);

        $slider = Slider::findorfail($id);
        $slider->title = $request->title;
        $slider->user_id = Auth::user()->id;
        if($request->hasFile('image')){
            Storage::delete($slider->image);
            $slider->image = $request->image->store('/public/sliders');
        }

        $slider->position = $request->position;

        if($slider->save()){
            Session::flash('success','Registro Actualizado con Exito!!');
        }else{
            Session::flash('errors', 'Error el intentar Actualizar el Registro!!');
        }

        return redirect()->route('sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findorfail($id);
        Storage::delete($slider->image);
        if($slider->delete()){
            Session::flash('success','Registro Eliminado con Exito!!');
        }else{
            Session::flash('errors','Error al tratar de eliminar el Registro!!');
        }
        return redirect()->route('sliders.index');
    }
}
