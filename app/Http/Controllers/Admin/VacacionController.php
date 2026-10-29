<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Vacacion;
use App\Models\Profesional;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class VacacionController extends Controller
{
    public function index()
    {
        $vacaciones = Vacacion::all();

        return view('admin.vacaciones.index', compact('vacaciones'));
    }

    public function create()
    {
        $profesionales = Profesional::orderBy('nombre')->pluck('nombre', 'id')->all();

        return view('admin.vacaciones.edit', compact('profesionales'));
    }

    public function store(Request $request)
    {

        try {
            $vacacion = new Vacacion($request->all());

            $vacacion->save();


            session()->flash('alert-success', trans('message.successaction'));
            return redirect()->route('admin.vacaciones.index');
        } catch (QueryException  $ex) {
            session()->flash('alert-danger', $ex->getMessage());
            return redirect()->route('admin.vacaciones.index');
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $vacacion = Vacacion::findOrFail($id);

        $profesionales = Profesional::orderBy('nombre')->pluck('nombre', 'id')->all();
        $profesionales = array('' => trans('message.select')) + $profesionales;

        return view('admin.vacaciones.edit', compact('vacacion', 'profesionales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $vacacion = Vacacion::findOrFail($id);

            $vacacion->descripcion =  $request->descripcion;
            $vacacion->id_profesional =  $request->id_profesional;
            $vacacion->fecha_inicio =  $request->fecha_inicio;
            $vacacion->fecha_fin =  $request->fecha_fin;


            $vacacion->save();


            session()->flash('alert-success', trans('message.successaction'));
            return redirect()->route('admin.vacaciones.index');
        } catch (QueryException  $ex) {

            session()->flash('alert-danger', $ex->getMessage());
            return redirect()->route('admin.vacaciones.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request, $id)
    {
        try {
              Vacacion::destroy($id);

            session()->flash('alert-success', trans('message.successaction'));
            return redirect()->route('admin.vacaciones.index');
        } catch (QueryException  $ex) {
            session()->flash('alert-danger', $ex->getMessage());
            return redirect()->route('admin.vacaciones.index');
        }
    }
}
