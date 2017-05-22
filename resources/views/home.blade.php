@extends('layouts.app')

@section('content')
            <div class="panel panel-primary">
                <div class="panel-heading">Sistema</div>

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
                <div class="panel-body">
                    Estas logeado!
                </div>
            </div>

@endsection
