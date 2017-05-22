@extends('layouts.app')

@section('content')





          <div class="panel panel-primary">
                <div class="panel-heading">Recetas</div>

                    <table class="table table-striped table-hover" >
                            <thead>
                                    <tr class="warning">                                        
                                        <th>Paciente</th>
                                        <th>Sexo</th>                                       
                                        <th>Edad</th>
                                        <th>Alergias</th>
                                        <th>Tipo sangre</th>
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
                                          
                                         <td>{{$paciente->edad}}</td>   
                                         <td>{{$paciente->alergias}}</td>        
                                         <td>{{$paciente->sangre}}</td>                                 
                                    <tr>
                              @endforeach
                        </table>

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


                              <input type="hidden" name="id_paciente" value="{{ $paciente->id }}">
                              <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">


                         <div class="form-group">                          
                          <div>
                            <label for="sintomas" >Sintomas:</label>
                            <textarea name="sintomas" class="form-control" rows="2" id="sintomas"></textarea>
                          </div>
                        </div>



                        <div class="form-group">                          
                          <div>
                            <label for="diagnosticos" >Diagnostico:</label>
                            <textarea name="diagnosticos" class="form-control"  rows="1" id="diagnosticos"></textarea>
                          </div>
                        </div>


                       

                        <div class="form-group">
                         
                          <div>


                            <label for="tratamientos" >Tratamiento:</label>
                            <textarea  name="tratamientos"  class="form-control"rows="3" id="tratamientos"></textarea>

                          </div>
                        </div>


                        <div class="form-group">
                          
                          <div>
                            <label for="observaciones" >Observaciones:</label>
                            <textarea name="observaciones" class="form-control"  rows="4" id="observaciones"></textarea>
                            <span class="help-block">Puede dejarce en blanco si no es necesario.</span>
                          </div>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
                        </div>
                </div>
            </div>

            <script type="text/javascript">
            setTimeout(function() {
                $("#alerta").fadeOut(3000);
            },2000);
      </script>
@endsection
