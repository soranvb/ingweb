<?php

namespace App\Http\Controllers\Doc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Paciente;
use App\User;

class PacienteController extends Controller
{
      public function index()
    {
        
    	$pacientes= Paciente::all();
    	return view ('doc.pacientes.index')->with(compact('pacientes'));
    }




    public function store(Request $request)
    {
    	$rules =[
    		'name'=>'required|max:255',
    		//'email'=>'required|email|max:255|unique:pacientes',
    		'start'=>'date',
    	];

    	$messages=[
    			'name.requiered'=>'Es necesario ingresar el nombre del usuario',
    			'name.max'=>'El nombre es demasiado extenso',
    			'email.requiered'=>'Es necesario ingresar email',
    			'email.max'=>'Este email es demasiado extenso',
    			'email.unique'=>'El email ya se encuentra en uso',
    			'password.requiered'=>'Olvido ingresar una contraseña',
    			'password.min'=>'La contraseña debe tener por lo menos 6 carracteres',
    			'start.date'=>'La fecha no tiene un formato adecuado',
    		];

    	$this->validate($request,$rules, $messages);

    	$paciente= new Paciente();
    	$paciente->name=$request->input('name');
    	$paciente->sexo=$request->input('sexo');
    	$paciente->start=$request->input('start');
    	$paciente->save();

    	
    	return back()->with('notification', 'usuario registrado exitosamente.');
    }


    public function edit($id)
    {
    	$paciente = Paciente::find($id);
    	return view('doc.pacientes.edit')->with(compact('paciente'));
    }

    public function update()
    {

    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
     public function registrarPacientes()
     {


        return view('Doc.pacientes.registrarPaciente');

    }
   public function guardarPaciente(Request $datos)
   {
        $paciente= new Paciente();
         $paciente->user_id=$datos->input('id_user');
        $paciente->name=$datos->input('nombre');
        $paciente->edad=$datos->input('edad');
        $paciente->sexo=$datos->input('sexo');
        $paciente->start=$datos->input('start');
        $paciente->email=$datos->input('email');
        $paciente->save();
        return Redirect('home');
     }   


     
}