<?php

namespace App\Http\Controllers\Doc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Paciente;
use App\User;
use App\Receta;
use DB;
use Validator;
use Auth;
use Image;
use File;
    class PacienteController extends Controller
    {
          public function index()
        {
            
        	$pacientes= Paciente::all();
        	return view ('doc.pacientes.index')->with(compact('pacientes'));
        }





         public function RecetaPacientes()
        {

             
         /*if ($request)
            {
            $query=trim($request->get('searchText'));
                $pacientes=DB::table('pacientes')->where('name','LIKE','%'.$query.'%')
                ->paginate(7);
            } */ 

        $id_doc=auth()->user()->id;
        $pacientes=Paciente::where('user_id',$id_doc)->get();

            return view ('doc.pacientes.recetasPacientes')->with(compact('pacientes'));;
        }

            public function search(Request $request)
            {
                $id_doc=auth()->user()->id;
                if ($request->ajax())
                    {
                        $output="";
                        $sexo="";
                        $pacientes=Paciente::where('name','LIKE','%'.$request->search.'%')
                        ->where('user_id','=', $id_doc)->get();

                        if($pacientes)
                        {
                            foreach($pacientes as $key => $paciente)
                               
                            {
                                 if($paciente->sexo==1)
                                {
                                    $sexo="Femenino";
                                }
                                else
                                {
                                    $sexo="Masculino";
                                }

                                $output.='<tr>'.
                                          '<td>'.$paciente->name.'</td>'.
                                          '<td>'.$sexo.'</td>'.
                                          '<td>'.$paciente->start.'</td>'.
                                          '<td>'.$paciente->edad.'</td>'.
                                          '<td>'.$paciente->email.'</td>'.
                                          '<td>'.$paciente->telefono.'</td>'.

                                          '<td>  <a href="Receta/'.$paciente->id.'" class="btn btn-sm btn-primary" title="Receta">
                                                <span class="glyphicon glyphicon-list-alt"></span>
                                            </a>
                                            
                                              </td>'.
                                          '</tr>';
                            } 
                           return Response($output) ;
                        }

                    } 
            }

            /* '<td>  <a href="{{url(eliminarpaciente)}}/{{$paciente->id}}" class="btn btn-sm btn-danger" title="Eliminar">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                            </td>'.
                                          '</tr>'; */




            public function searchConsulta(Request $request)
            {
                $id_doc=auth()->user()->id;
                if ($request->ajax())
                    {
                        $output="";
                        $sexo="";
                        $pacientes=Paciente::withTrashed()->where('name','LIKE','%'.$request->search.'%')
                        ->where('user_id','=', $id_doc)->get();

                        if($pacientes)
                        {
                            foreach($pacientes as $key => $paciente)
                               
                            {
                                 if($paciente->sexo==1)
                                {
                                    $sexo="Femenino";
                                }
                                else
                                {
                                    $sexo="Masculino";
                                }

                                $output.='<tr>'.
                                          '<td>'.$paciente->name.'</td>'.
                                          '<td>'.$sexo.'</td>'.
                                                                                   
                                          '<td>'.$paciente->start.'</td>'.
                                          '<td>'.$paciente->edad.'</td>'.
                                          '<td>'.$paciente->email.'</td>'.
                                          '<td>'.$paciente->telefono.'</td>'.

                                          '<td>
                                            

                                                <a href="paciente/'.$paciente->id.'" class="btn btn-sm btn-primary" title="editar">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a>

                                            </a>

                                                <a href="eliminarpaciente/'.$paciente->id.'" class="btn btn-sm btn-danger" title="Eliminar">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>

                                              <a href="restaurarpaciente/'.$paciente->id.'" class="btn btn-sm btn-success" title="Restaurar">
                                                <span class="glyphicon glyphicon-repeat"></span>
                                                
                                            </a>



                                            </td>'.


                                            '@endif'.
                                          '</tr>';




                            } 
                           return Response($output) ;
                        }

                    } 
            }









       
        public function consultarPacientes()
        {

           
                

             $id_doc=auth()->user()->id;
             $pacientes=Paciente::withTrashed()->where('user_id',$id_doc)->get();
           
            return view ('doc.pacientes.indexConsulta')->with(compact('pacientes'));
        }


        public function store(Request $request)
        {
        	$rules =[
        		'name'=>'required|max:255',
        		'email'=>'required|email|max:255|unique:pacientes',
        		'start'=>'date',
                'domicilio'=>'required|max:255',
                'telefono'=>'numeric|max:999999999999',

        	];

        	$messages=[
        			'name.required'=>'Es necesario ingresar el nombre del usuario',
        			'name.max'=>'El nombre es demasiado extenso',
        			'email.required'=>'Es necesario ingresar email',
        			'email.max'=>'Este email es demasiado extenso',
        			'email.unique'=>'El email ya se encuentra en uso',
        			'start.date'=>'La fecha no tiene un formato adecuado',
                    'domicilio.required'=>'Es necesario ingresar el domicilio',
                    'domicilio.max'=>'El domicilio es demasiado extenso',
                    'telefono.numeric'=>'El telefono no tiene un formato adecuado',
                    'telefono.max'=>'El telefono sobrepasa el numero permitido de digitos'
        		];

        	$this->validate($request,$rules, $messages);

        	$paciente= new Paciente();
            $paciente->user_id=$request->input('id_user');
            $paciente->paciente_id=$request->input('paciente_id');
        	$paciente->name=$request->input('name');
            $paciente->edad=$request->input('edad');
        	$paciente->sexo=$request->input('sexo');
        	$paciente->start=$request->input('start');
            $paciente->email=$request->input('email');
            $paciente->domicilio=$request->input('domicilio');
            $paciente->telefono=$request->input('telefono');
            $paciente->sangre=$request->input('sangre');
            $paciente->alergias=$request->input('alergias');
        	$paciente->save();

        	
        	return back()->with('notification', 'Paciente Registrado Exitosamente.');
        }


        public function edit($id)
        {
        	$paciente = Paciente::find($id);
        	return view('Doc.pacientes.edit')->with(compact('paciente'));
        }

        public function update($id, Request $request)
        {
            $rules =[
                'name'=>'required|max:255',
                'email'=>'email|max:255',
                'start'=>'date',
                'telefono'=>'numeric',
            ];

            $messages=[
                    'name.requiered'=>'Es necesario ingresar el nombre del usuario',
                    'name.max'=>'El nombre es demasiado extenso',
                    'email.max'=>'Este email es demasiado extenso',
                    'start.date'=>'La fecha no tiene un formato adecuado',
                    'telefono.numeric'=>'No tiene el formato adecuado'
                ];

            $this->validate($request,$rules, $messages);

            $paciente= Paciente::find($id);

            $name=$request->input('name');
            if($name)
                $paciente->name=($name);
            

             $edad=$request->input('edad');
            if($edad)
                $paciente->edad=($edad);
            
             $sexo=$request->input('sexo');
            if($sexo)
                $paciente->sexo=($sexo);

            $start=$request->input('start');
            if($start)
                $paciente->start=($start);
            
             $email=$request->input('email');
            if($email)
                $paciente->email=($email);

             $telefono=$request->input('telefono');
            if($telefono)
                $paciente->telefono=($telefono);

            $sangre=$request->input('sangre');
            if($sangre)
                $paciente->sangre=($sangre);

            $domicilio=$request->input('domicilio');
            if($domicilio)
                $paciente->domicilio=($domicilio);

            $alergias=$request->input('alergias');
            if($alergias)
                $paciente->alergias=($alergias);


            $paciente->save();




            $paciente = Paciente::find($id);
            return back()->with('notification', 'El usuario a sido Editado');
        }
        
        
           public function delete($id)
        {


            $paciente=Paciente::find($id);
            $paciente->delete();



            return redirect('/consultarPacientes')->with('notification', 'El usuario a sido eliminado');
        }



     public function restore($id)
        {
            
            Paciente::withTrashed()->find($id)->restore();
            return redirect('/consultarPacientes')->with('notification', 'El paciente se a  Restaurado');
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
            $paciente->paciente_id=$datos->input('paciente_id');
            $paciente->name=$datos->input('nombre');
            $paciente->edad=$datos->input('edad');
            $paciente->sexo=$datos->input('sexo');
            $paciente->start=$datos->input('start');
            $paciente->email=$datos->input('email');
            $paciente->save();
            return back()->with('usuario registrado exitosamente.');
         }   

      /*  public function consultarPacientes()
        {
            
            $pacientes= Paciente::all();
            return view ('doc.pacientes.consultarPacientes')->with(compact('pacientes'));
        }
         */

        public function pacienteHistorial()
        {
           return view('Doc.pacientes.pacienteHistorial');
        }


        public function recetas($id)
        {
             $id_doc=auth()->user()->id;
             $pacientes=Paciente::withTrashed()->where('id', '=', $id)->get();
        
            



            return view ('doc.pacientes.recetas')->with(compact('pacientes'));;
        }

         public function guardarReceta(Request $request)
        {
            $rules =[
                
            ];

            $messages=[
                    'name.requiered'=>'Es necesario ingresar el nombre del usuario',
                    'name.max'=>'El nombre es demasiado extenso',
                    'email.requiered'=>'Es necesario ingresar email',
                    'email.max'=>'Este email es demasiado extenso',
                    'email.unique'=>'El email ya se encuentra en uso',
                    'start.date'=>'La fecha no tiene un formato adecuado',
                ];

            $this->validate($request,$rules, $messages);
           
            $receta= new Receta();
            $receta->sintomas=$request->input('sintomas');
            $receta->paciente_id=$request->input('id_paciente');
            $receta->observaciones=$request->input('observaciones');
            $receta->tratamientos=$request->input('tratamientos');
            $receta->diagnosticos=$request->input('diagnosticos');
            $receta->save();

            
            return back()->with('notification', 'Receta Guardada Exitosamente.');
        }


    public function pacientePDF($id)
    {
       // $recetas=Receta::where('paciente_id','=',$id)->get();
       // $pacientes=Paciente::find($id);

        $recetas=Receta::find($id);
        $pacientes=Paciente::where('id','=',$id)->get();
        $vista=view('doc.pacientes.pacientePDF', compact('recetas','pacientes'));

        $dompdf=\App::make('dompdf.wrapper');
        $dompdf->loadHTML($vista);
        return $dompdf->stream('reporte.pdf');
    }
      public function PDF($id)
    {
       // $recetas=Receta::where('paciente_id','=',$id)->get();
       // $pacientes=Paciente::find($id);

        $id_doc=auth()->user()->id;

        $recetas=Receta::find($id);
        $pacientes=Paciente::where('id','=',$id)->get();
        $user = User::find(Auth::user()->id);
        $vista=view('doc.pacientes.PDF', compact('recetas','pacientes','user'));

        $dompdf=\App::make('dompdf.wrapper');
        $dompdf->loadHTML($vista);
        return $dompdf->stream('reporte.pdf');
    }



public function historialRecetas()
        {
            $id_doc=auth()->user()->id;
            $pacientes=DB::table('pacientes')->where('user_id',$id_doc)
            ->join('recetas', 'pacientes.id', '=', 'recetas.paciente_id')
            ->paginate(10);

            return view('doc.pacientes.historialRecetas', compact('pacientes'));

            

       /* 
        $pacientes=Paciente::->get();

            return view ('doc.pacientes.historialRecetas')->with(compact('pacientes'));;
*/



        }

            public function historialSearch(Request $request)
            {
                $id_doc=auth()->user()->id;

                if ($request->ajax())
                    {
                        $output="";
                        //$pacientes=Paciente::withTrashed()->where('user_id',$id_doc)->get(); 


                        $pacientes=Paciente::where('name','LIKE','%'.$request->search.'%')
                         ->where('user_id','=', $id_doc)->get();
                         $recetas=Receta::where('id','=','id_paciente')->get();
                      

                       // ->where('user_id','=', $id_doc)->get();

                        if($pacientes)
                        {
                            
                                foreach($pacientes as $key =>$paciente)

                               
                            {
                                 
                                $output.='<tr>'.
                                          
                                          '<td>'.$paciente->name.'</td>'.
                                          '<td>'.$receta->id.'</td>'.

                                          '<td> <a href="pacientePDF/'.$paciente->id.'" class="btn btn-sm btn-primary" title="PDF"> 
                                             <span class="glyphicon glyphicon-list-alt"></span>
                                              </td>'.
                                          '</tr>';
                            } 
                           return Response($output) ;
                        }

                    } 
            }



     }