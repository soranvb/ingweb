@extends('layouts.app')

@section('content')
          <div class="panel panel-primary">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    @if(session('notification'))
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

                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class="form-control" value="{{old('email')}}">
                        </div>

                        <div class="form-group">
                            <label for="Name">Nombre</label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña <em>Ingresar solo si se desea modificar</em></label>
                            <input type="text" name="password" class="form-control" value="{{old('password')}}">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary">Guardar usuario</a>
                        </div>



                        <table class="table table-striped table-hover" >
                            <thead>
                                    <tr class="info">    
                                        <th>Correo</th>
                                        <th>Nombre</th>
                                        
                                    </tr>
                            </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->name}}</td>
                                      
                                    </tr>
                                </tbody>
                        </table>
                </div>
            </div>
@endsection
