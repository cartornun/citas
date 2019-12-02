<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Cita;
use App\Medico;
use App\Paciente;
use App\Localizacion;


class CitaController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas = Cita::all();

        return view('citas/index',['citas'=>$citas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos = Medico::all()->pluck('full_name','id');

        $pacientes = Paciente::all()->pluck('full_name','id');
        $localizaciones = Localizacion::all()->pluck('full_name','id');


        return view('citas/create',['medicos'=>$medicos, 'pacientes'=>$pacientes ,'localizaciones'=>$localizaciones]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'localizacion_id' => 'required|exists:localizacions,id'
           // 'duracion_id' => 'required|exists:duracions,id'

        ]);

        $cita = new Cita($request->all());
        $cita->save();


        flash('Cita creada correctamente');

        return redirect()->route('citas.index');
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

    /*
     * $this->validate($request, [
            'fecha_inicio' => Carbon::now(), //'required|date|after:now', //Carbon::create('','required|max:2','required|max:2','required|max:2','required|max:4','null','null')
            'fecha_fin' => Carbon::now()->addMinute(15),
            'cita_id' => 'required|exists:citas,id'
        ]);
    */
    public function edit($id)
    {

        $cita = Cita::find($id);

        $medicos = Medico::all()->pluck('full_name','id');

        $pacientes = Paciente::all()->pluck('full_name','id');


        return view('citas/edit',['cita'=> $cita, 'medicos'=>$medicos, 'pacientes'=>$pacientes]);
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
        $this->validate($request, [
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'localizacion_id' => 'required|exists:localizacions,id'
            //'fecha_hora' => 'required|date|after:now',

        ]);
        $cita = Cita::find($id);
        $cita->fill($request->all());

        $cita->save();

        flash('Cita modificada correctamente');

        return redirect()->route('citas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cita = Cita::find($id);
        $cita->delete();
        flash('Cita borrada correctamente');

        return redirect()->route('citas.index');
    }
}
