<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Auth;
use Image;
use File;


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
    public function profile(){
        return view('profile', array('user' => Auth::user()) );
    }
    public function update_avatar(Request $request)
    {
        
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );


            //ELIMINAR IMG GUARDADA
             $user = User::find(Auth::user()->id);
             if ($user->avatar !== 'avatar.png') {
                $file = public_path('uploads/avatars/' . $user->avatar);

                if (File::exists($file)) {
                    unlink($file);
                }

            }

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return view('profile', array('user' => Auth::user()) );
    }



public function updateProfile(Request $request)
        {
            $rules =[
            'name'=>'max:255',
            'email'=>'email|max:255',
            'telefono'=>'numeric|max:999999999999',
                
            ];

            $messages=[
                    'name.requiered'=>'Es necesario ingresar el nombre del usuario',
                    'name.max'=>'El nombre es demasiado extenso',
                    'email.max'=>'Este email es demasiado extenso',
                    'email.unique'=>'El email ya se encuentra en uso',
                    'start.date'=>'La fecha no tiene un formato adecuado',
                    'telefono.numeric'=>'El telefono no tiene un formato adecuado',
                    'telefono.max'=>'El telefono sobrepasa el numero permitido de digitos'
                ];

            $this->validate($request,$rules, $messages);

            $user = User::find(Auth::user()->id);
            $name=$request->input('name');
            if($name)
                $user->name=($name);
            $user->name=$request->input('name');

             //$edad=$request->input('edad');
            //if($edad)
             //   $user->edad=($edad);
            
             $sexo=$request->input('sexo');
            if($sexo)
                $user->sexo=($sexo);

            //$start=$request->input('start');
            //if($start)
              //  $paciente->start=($start);
            
             $email=$request->input('email');
            if($email)
                $user->email=($email);

            $telefono=$request->input('telefono');
            if($telefono)
                $user->telefono=($telefono);

             $domicilio=$request->input('domicilio');
            if($domicilio)
                $user->domicilio=($domicilio);

            $background=$request->input('background');
            if($background)
                $user->background=($background);

             $especialidad=$request->input('especialidad');
            if($especialidad)
                $user->especialidad=($especialidad);

            $password=$request->input('password');
        if($password)
            $user->password=bcrypt($password);
        $user->save();
        return back()->with('notification', 'perfil modificado exitosamente');

}
}