<?php

namespace App\Http\Controllers;

use App\Enfermedad;
use App\Especialidad;
use Illuminate\Http\Request;
use App\Paciente;
use App\Providers\AppServiceProvider;

class PacienteController extends Controller
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
        //

        $pacientes = Paciente::all();
        $especialidades = Especialidad::all();

        return view('pacientes/index',compact('pacientes','especialidades'));
    }

    /**
     * Display a listing of the resource from especialidad
     */
    public function getFromEspecialidad(Request $request){
        if ($request->especialidad != null){
            $enfermedades = Enfermedad::where('especialidad_id',$request->especialidad)->select('id')->get();
            $pacientes = Paciente::whereIn('enfermedad_id',$enfermedades)->get();
        }else{
            $pacientes = Paciente::all();
        }

        return view('pacientes/table',compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $enfermedades = Enfermedad::all()->pluck('name','id');

        return view('pacientes/create',['enfermedades'=>$enfermedades]);

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
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'nuhsa' => 'required|nuhsa|max:255',
            'enfermedad_id' => 'required|exists:enfermedads,id'
        ]);

        //TODO: crear validación propia para nuhsa
        //nusha válido: * AN0415331870
       /* public function nuhsa($nuhsa){

        $letra = substr($nuhsa, 3, 2);
        //$numero = substr($nuhsa, 3, 10);
        if(strlen($nuhsa)!=12 ) {
            return "Número de seguridad social incorrecto.";
        }
        if ($letra != 'AN'){
            return "Número de seguridad social incorrecto.";
        }
       }*/


        $paciente = new Paciente($request->all());
        $paciente->save();

        // return redirect('especialidades');

        flash('Paciente creado correctamente');

        return redirect()->route('pacientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // TODO: Mostrar las citas de un paciente
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente = Paciente::find($id);
        $enfermedades = Enfermedad::all()->pluck('name','id');

        return view('pacientes/edit',['paciente'=> $paciente, 'enfermedades'=>$enfermedades ]);
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
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'nuhsa' => 'required|nuhsa|max:255',
             'enfermedad_id' => 'required|exists:enfermedads,id'
        ]);

        $paciente = Paciente::find($id);
        $paciente->fill($request->all());

        $paciente->save();

        flash('Paciente modificado correctamente');

        return redirect()->route('pacientes.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paciente = Paciente::find($id);
        $paciente->delete();
        flash('Paciente borrado correctamente');

        return redirect()->route('pacientes.index');
    }
}
