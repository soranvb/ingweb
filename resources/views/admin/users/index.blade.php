@extends('layouts.app')

@section('content')
          <div class="panel panel-primary">
                <div class="panel-heading">Dashboard</div>

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

                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class="form-control" value="{{old('email')}}">
                        </div>

                        <div class="form-group">
                            <label for="Name">Nombre</label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="text" name="password" class="form-control" value="{{old('password')}}"> <!--('password',str_random(8)-->
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary">Registrar</a>
                        </div>


                        <table class="table table-striped table-hover" >
                            <thead>
                                    <tr class="info">    
                                        <th >Correo</th>
                                        <th>Nombre</th>
                                        <th>Opciones</th>
                                    </tr>
                            </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        @if($user->role==1)
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->name}}</td>

                                        <td>
                                            
                                            @if($user->trashed())

                                             <a href="usuario/{{$user->id}}/restaurar" class="btn btn-sm btn-success" title="Restaurar">
                                                <span class="glyphicon glyphicon-repeat"></span>
                                            </a>

                                            @else

                                            <a href="usuario/{{$user->id}}" class="btn btn-sm btn-primary" title="editar">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                            
                                            <a href="usuario/{{$user->id}}/eliminar" class="btn btn-sm btn-danger" title="Eliminar">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                            @endif

                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table>
                </div>
            </div>
               <script type="text/javascript">
            setTimeout(function() {
                $("#alerta").fadeOut(3000);
            },2000);
      </script>
@endsection
