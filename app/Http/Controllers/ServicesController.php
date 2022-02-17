<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Auth;
use Session;
use Storage;

class ServicesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', Compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.new');
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
            'content'=>'required',
            'background_image'=>'required'
        ]);

        $service = new Service();
        $service->title = $request->title;
        $service->position = $request->position;
        $service->user_id = Auth::user()->id;
        $service->content = $request->content;
        if($request->hasFile('icon')){
            $service->icon = $request->icon->store('/public/services/icons');
        }

        if($request->hasFile('background_image')){
            $service->background_image = $request->background_image->store('/public/services/backgrounds');
        }

        if($service->save()){
            Session::flash('success','Registro Insertado con Exito!!');
        }else{
            Session::flash('errors', 'Error el intentar realizar el Registro!!');
        }

        return redirect()->route('services.index');
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
        $service = Service::findorfail($id);
        return view('admin.services.edit',Compact('service'));
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

        $service = Service::findorfail($id);
        $service->title = $request->title;
        $service->position = $request->position;
        $service->user_id = Auth::user()->id;
        $service->content = $request->content;
        if($request->hasFile('icon')){
            Storage::delete($service->icon);
            $service->icon = $request->icon->store('/public/services/icons');
        }

        if($request->hasFile('background_image')){
            Storage::delete($service->background_image);
            $service->background_image = $request->background_image->store('/public/services/backgrounds');
        }

        if($service->update()){
            Session::flash('success','Registro Actualizado con Exito!!');
        }else{
            Session::flash('errors', 'Error el intentar Actualizar el Registro!!');
        }

        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findorfail($id);
        Storage::delete($service->icon);
        Storage::delete($service->background_image);
        if($service->delete()){
            Session::flash('success','Registro Eliminado con Exito!!');
        }else{
            Session::flash('errors','Error al tratar de eliminar el Registro!!');
        }
        return redirect()->route('services.index');
    }
}
