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

                          <div class="form-group">
                              <label for="edad">Edad:</label>
                              <input name="edad" type="number" placeholder="Teclea Edad" class="form-control" value="{{old('edad', $paciente->edad)}}">
                          </div>

                          <div class="form-group">
                              <label for="telefono">Telefono:</label>
                              <input name="telefono" type="telefono" placeholder="Teclea Telefono" class="form-control" value="{{old('telefono', $paciente->telefono)}}">
                          </div>

                          <div class="form-group">
                              <label for="sangre">Tipo De Sangre:</label>
                              <input name="sangre" type="sangre" placeholder="Teclea Telefono" class="form-control" value="{{old('sangre', $paciente->sangre)}}">
                          </div>

                          <div class="form-group">
                              <label for="domicilio">Domicilio:</label>
                              <input name="domicilio" type="domicilio" placeholder="Teclea Domicilio" class="form-control" value="{{old('domicilio', $paciente->domicilio)}}">
                          </div>

                          <div class="form-group">
                              <label for="email">E-Mail:</label>
                              <input name="email" type="email" placeholder="Teclea E-Mail" class="form-control" value="{{old('email', $paciente->email)}}">
                          </div>



                      
                        <div class="form-group">
                          <label for="sexo">Sexo:</label>
                            <select name="sexo" class="form-control"  value="{{old('sexo', $paciente->sexo)}}">
                                 <option value="" selected>Selecciona sexo</option>
                                 <option value="1">Femenino</option>
                                 <option value="2">Masculino</option>
                            </select>
                        </div>

                         
          
                          <div class="form-group">
                              <label for="start">Fecha</label>
                              <input type="date" name="start" class="form-control" value="{{old('start', $paciente->start)}}">
                          </div>

                             <div class="form-group">                          
                          <div>
                            <label for="alergias" >Alergias:</label>
                            <textarea name="alergias" class="form-control"  rows="3" id="alergias" value="{{old('alergias', $paciente->alergias)}}" >{!! old('alergias'),$paciente->alergias !!}</textarea>
                          </div>
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
                                          <th>Fecha de registro</th>
                                          <th>Telefono</th>
                                          <th>Tipo Sangre</th>
                                          <th>E-mail</th>
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
                                           <td>{{$paciente->telefono}}</td>  
                                           <td>{{$paciente->sangre}}</td> 
                                           <td>{{$paciente->email}}</td>                                    
                                        
                                         
                                      </tr>
                                      
                                  </tbody>
                          </table>
                           <table class="table table-striped table-hover" >
                              <thead>
                                      <tr class="info">                                        
                                          <th>Domicilio</th> 
                                          <th>alergias</th>
                                      </tr>
                              </thead>
                                  <tbody>
                                     
                                      <tr>                                       
                                           <td>{{$paciente->domicilio}}</td>   
                                           <td>{{$paciente->alergias}}</td>                                                                   
                                        
                                      </tr>
                                      
                                  </tbody>
                          </table>
                  </div>
              </div>

              
          
  @endsection
