<?php

namespace App\Http\Controllers;

use App\Localizacion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Cita;
use App\Medico;
use App\Paciente;


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
        $hora_fin = Carbon::createFromDate(Cita::whereBetween('fecha_fin',[Carbon::today(),Carbon::tomorrow()])->orderBy('fecha_fin','desc')->first()->fecha_fin)->format('H:i');

        return view('citas/index',['citas'=>$citas,'hora_fin'=>$hora_fin]);
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



        return view('citas/create',['medicos'=>$medicos, 'pacientes'=>$pacientes,'localizaciones'=>$localizaciones]);
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
            'fecha_inicio' => 'required|date|after:now',
            'localizacion_id' => 'required|exists:localizacions,id',

        ]);

        $cita = new Cita($request->all());
        $cita->fecha_fin = Carbon::createFromDate($cita->fecha_inicio)->addMinutes(15)->format('Y-m-d\TH:i');
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
    public function edit($id)
    {

        $cita = Cita::find($id);

        $medicos = Medico::all()->pluck('full_name','id');

        $pacientes = Paciente::all()->pluck('full_name','id');

        $localizaciones = Localizacion::all()->pluck('full_name','id');


        return view('citas/edit',['cita'=> $cita, 'medicos'=>$medicos, 'pacientes'=>$pacientes,'localizaciones'=>$localizaciones]);
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
            'fecha_inicio' => 'required|date|after:now',
            'fecha_fin'=> 'required|date|after:fecha_inicio',
            'localizacion_id' => 'required|exists:localizacions,id',

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
