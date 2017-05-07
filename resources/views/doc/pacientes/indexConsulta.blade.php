@extends('layouts.app')

@section('content')
          <div class="panel panel-primary">
                <div class="panel-heading">Registro de Paciente</div>

                <div class="panel-body">


          <!--          @if(session('notification'))
                        <div class="alert alert-success">
                            {{session('notification')}}
                        </div>
                    @endif



                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        </div>
                    @endif


                    <form action="" method="POST">
                        {{csrf_field() }}

                        <input name="id_user" type="text" value="{{Auth::user()->id}}">

                        <div class="form-group">
                            <label for="Name">Nombre</label>
                            <input type="text" name="name" placeholder="Teclea Nombre" class="form-control" required value="{{old('name')}}">
                        </div>

                        <div class="form-group">
                <label for="edad">Edad:</label>
                <input name="edad" type="number" placeholder="Teclea Edad" class="form-control" required value="{{old('edad')}}">
            </div>

                       <label for="sexo">Sexo:</label>
                        <select name="sexo" class="form-control" required value="{{old('sexo')}}">
                             <option value="" selected>Selecciona sexo</option>
                             <option value="1">Femenino</option>
                             <option value="2">Masculino</option>
                        </select>
        
                        <div class="form-group">
                            <label for="start">Fecha</label>
                            <input type="date" name="start" class="form-control" required value="{{old('start', date('Y-m-d'))}}">
                        </div>

                    
            <div class="form-group">
                <label for="email"> Correo:</label>
                <input name="email" type="email" placeholder="Teclea e-mail" class="form-control" >
            </div>

                        
                        <div class="form-group">
                            <button class="btn btn-primary">Registrar pacientes</a>
                        </div>
            -->
                        <table class="table table-bordered">
                            <thead>
                                    <tr>                                        
                                        <th>Nombre</th>
                                        <th>Sexo</th>
                                        <th>Fecha de registro</th>
                                        <th>Doctor</th>
                                        <th>Opciones</th>
                                    </tr>
                            </thead>
                                <tbody>
                                    @foreach($pacientes as $paciente)
                                    <tr>                                       
                                        <td>{{$paciente->name}}</td>
                                         <td>@if($paciente->sexo==1)
                                              Femenino
                                              @else
                                              Masculino
                                              @endif</td>
                                         <td>{{$paciente->start}}</td>  
                                         <td>{{$paciente->user_id}}</td>   
                                         

                                         
                                        <td>
                                            <a href="paciente/{{$paciente->id}}" class="btn btn-sm btn-primary" title="editar">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                            <a href="usuario/{{$paciente->id}}/eliminar" class="btn btn-sm btn-danger" title="Eliminar">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    
                </div>
            </div>
        
@endsection
