    @extends('layouts.app')

    @section('content') 
    <div class="panel panel-primary">
         <div class="panel-heading">Dashboard</div>
            <div class="panel-body">
                 <div class="container">                    
                    <!--IMG PERFIL -->
                    <div class="row">

                        <div class="col-md-10 col-md-offset-1">

                            <img src="/proyectogit/public/uploads/avatars/{{$user->avatar}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                            <h2>{{ $user->name }}'s Profile</h2>
                            <form enctype="multipart/form-data" action="profile" method="POST">
                                <label>Subir imagen</label>
                                <input type="file" name="avatar">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-sm btn-primary">
                            </form>
                        </div>
                    </div>
                    </div>
                    <div class="alert alert-dismissible alert-warning">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <strong>Solo ingrese los campos que desee cambiar</strong> 
                              </div>

                           <!--   <div class="btn-group btn-group-justified">
                                 <a href="#" class="btn btn-default">Left</a>
                                <a href="#" class="btn btn-default">Middle</a>
                                <a href="#" class="btn btn-default">Right</a>
                              </div>
                          -->



      
                     <form action="profileUpdate" method="POST">
                          {{csrf_field()}}

                          <div class="form-group">
                              <label for="Name">Nombre</label>
                              <input type="text" name="name" class="form-control"  value="{{old('name', $user->name)}}">
                          </div>

                        <div class="form-group">
                         <label for="sexo">Sexo:</label>
                          <select name="sexo" class="form-control"  value="{{old('sexo', $user->sexo)}}">
                               <option value="" selected>Selecciona sexo</option>
                               <option value="1">Femenino</option>
                               <option value="2">Masculino</option>
                          </select>
                      </div>


                      <div class="form-group">
                         <label for="background">Color De Fondo</label>
                          <select name="background" class="form-control" value="{{old('background', $user->background)}}">
                               <option value="" selected>Selecciona Color</option>
                               <option value="1">blanco</option>
                               <option value="2">Oscuro (darkly)</option>
                               <option value="3">lumen</option>
                           
                          </select>
                      </div>
          
                          

                           <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="text" name="password" class="form-control" value="{{old('password')}}">
                        </div>

                          
                          <div class="form-group">
                              <button class="btn btn-warning">Editar Perfil</a> </button>
                              
                          </div>



                </div>
            </div>
        </div>
    @endsection
