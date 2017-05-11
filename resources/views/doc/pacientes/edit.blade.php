  @extends('layouts.app')

  @section('content')
            <div class="panel panel-primary">
                  <div class="panel-heading">Editar Paciente </div>
                    
                  <div class="panel-body">
                   


                              <div class="alert alert-dismissible alert-warning">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <strong>Solo ingrese los campos que desee cambiar</strong> 
                              </div>

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

                          <div class="form-group">
                              <label for="Name">Nombre</label>
                              <input type="text" name="name" class="form-control"  value="{{old('name', $paciente->name)}}">
                          </div>

                         <label for="sexo">Sexo:</label>
                          <select name="sexo" class="form-control"  value="{{old('sexo', $paciente->sexo)}}">
                               <option value="" selected>Selecciona sexo</option>
                               <option value="1">Femenino</option>
                               <option value="2">Masculino</option>
                          </select>
          
                          <div class="form-group">
                              <label for="start">Fecha</label>
                              <input type="date" name="start" class="form-control" value="{{old('start', $paciente->start)}}">
                          </div>
                          
                          <div class="form-group">
                              <button class="btn btn-primary">Editar paciente</a> </button>
                              <a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
                          </div>

                            <table class="table table-striped table-hover" >
                              <thead>
                                      <tr class="info">                                        
                                          <th>Nombre</th>
                                          <th>Sexo</th>
                                          <th>Fecha de inicio</th>
                                          
                                      </tr>
                              </thead>
                                  <tbody>
                                     
                                      <tr>                                       
                                          <td>{{$paciente->name}}</td>
                                           <td>@if($paciente->sexo==1)
                                                Femenino
                                                @else
                                                Masculino
                                                @endif</td>
                                           <td>{{$paciente->start}}</td>     
                                           

                                           
                                          
                                      </tr>
                                      
                                  </tbody>
                          </table>
                  </div>
              </div>

              
          
  @endsection
