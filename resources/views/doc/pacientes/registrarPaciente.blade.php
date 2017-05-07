@extends('layouts.app')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">Registro de Paciente</div>
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




        <form action="{{url('/guardarPaciente')}}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
         

       
            <input name="id_user" type="text" value="{{Auth::user()->id}}">

           <!--  <input name="paciente_id" type="text" value="00000{{Auth::user()->id}}"> -->
           
            
        
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input name="nombre" type="text" placeholder="Teclea nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="edad">Edad:</label>
                <input name="edad" type="number" placeholder="Teclea Edad" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="sexo">Sexo:</label>
                <select name="sexo" class="form-control" required>
                    <option value="" selected>Selecciona Sexo</option>
                    <option value="0">Femenino</option>
                    <option value="1">Masculino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="start">Fecha De Registro</label>
                <input type="date" name="start" class="form-control" required value="{{old('start', date('Y-m-d'))}}">
            </div>

            <div class="form-group">
                <label for="email">( Opcional) Correo:</label>
                <input name="email" type="email" placeholder="Teclea e-mail" class="form-control" >
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
            <a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>


    @endsection