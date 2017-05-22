@extends('layouts.app')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


          <div class="panel panel-primary">
                <div class="panel-heading">Registro de Paciente</div>
                  </div> 

                <div class="input-group input-group">
                    <span class="input-group-addon">Buscador</span>
                        <input type="text" class="form-control" id="search" name="search" placeholder="INGRESE NOMBRE DEL PACIENTE" value=""></input>
                  </div>


                    
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    </div>


                    {!! Form::close() !!}
                <div class="panel-body">


                 @if(session('notification'))
                        <div class="alert alert-success" id="alerta">
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

<!--
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
                        <table class="table table-striped table-hover" >
                            <thead>
                                    <tr class="info">                                        
                                        <th>Nombre</th>
                                        <th>Sexo</th>
                                        <th>Fecha de registro</th>
                                        <th>Edad</th>                                                                              
                                        <th>E-Mail</th>
                                        <th>Telefono</th>
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
                                         <td>{{$paciente->edad}}</td>                                           
                                         <td>{{$paciente->email}}</td>
                                         <td>{{$paciente->telefono}}</td>
                                         
                                        <td>


                                             @if($paciente->trashed())

                                             <a href="{{url('restaurarpaciente')}}/{{$paciente->id}}" class="btn btn-sm btn-success" title="Restaurar">
                                                <span class="glyphicon glyphicon-repeat"></span>
                                            </a>

                                            @else



                                            <a href="paciente/{{$paciente->id}}" class="btn btn-sm btn-primary" title="editar">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                            <a href="{{url('eliminarpaciente')}}/{{$paciente->id}}" class="btn btn-sm btn-danger" title="Eliminar">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                            @endif






                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    
                </div>
            </div>

            <script type="text/javascript">
              $('#search').on('keyup',function()
              {
                 $value=$(this).val();
                 $.ajax({
                  type : 'get',
                  url  : '{{URL::to('searchConsulta')}}',
                  data : {'search':$value},
                  success:function(data){
                    $('tbody').html(data);
                  }
                 });
              })
              </script>

               <script type="text/javascript">
            setTimeout(function() {
                $("#alerta").fadeOut(3000);
            },2000);
      </script>

               <script type="text/javascript">
            setTimeout(function() {
                $("#alerta").fadeOut(3000);
            },2000);
      </script>
        
@endsection
