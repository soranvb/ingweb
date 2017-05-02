<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::withTrashed()->get();
    	//$users= User::all();
    	return view('admin.users.index')->with(compact('users'));
    }

    public function store(Request $request)
    {
    	$rules =[
    		'name'=>'required|max:255',
    		'email'=>'required|email|max:255|unique:users',
    		'password'=>'required|min:6',
    	];

    	$messages=[
    			'name.requiered'=>'Es necesario ingresar el nombre del usuario',
    			'name.max'=>'El nombre es demasiado extenso',
    			'email.requiered'=>'Es necesario ingresar email',
    			'email.max'=>'Este email es demasiado extenso',
    			'email.unique'=>'El email ya se encuentra en uso',
    			'password.requiered'=>'Olvido ingresar una contraseña',
    			'password.min'=>'La contraseña debe tener por lo menos 6 carracteres',
    		];

    	$this->validate($request,$rules, $messages);

    	$user= new User();
    	$user->name=$request->input('name');
    	$user->email=$request->input('email');
    	$user->password= bcrypt($request->input('password'));
    	$user->role=1;
    	$user->save();

    	
    	return back()->with('notification', 'usuario registrado exitosamente.');
    }

    public function edit($id)
    {
    	$user= User::find($id);
    	return view('admin.users.edit')->with(compact ('user'));
    }

    public function update($id, Request $request)
    {
    	

    	$rules=[
    		'name'=>'required|max:255',
    		'password'=>'nullable|min:6',
    	];

    	$messages=[
    	'name.required'=>'Es Necesario ingresar el nombre del usuario',
    	'name.max'=>'El no,bre es demasiado extenso',
    	'password.min'=>'la contraseña debe tener por lo menos 6 caracteres',
    	];



    	$this->validate($request, $rules,$messages);

    	$user= User::find($id);
    	$user->name=$request->input('name');
    	$password=$request->input('password');
    	if($password)
    		$user->password=bcrypt($password);
    	$user->save();
    	return back()->with('notification', 'usuario modificado exitosamente');
    }


    public function delete($id)
    {
    	$user=User::find($id);
    	$user->delete();



    	return back()->with('notification', 'El usuario a sido eliminado');
    }


 public function restore($id)
    {
        
        User::withTrashed()->find($id)->restore();



        return back()->with('notification', 'El usuario se a  Restaurado');
    }




}
