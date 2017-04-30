@extends('layouts.app')

@section('content')
          <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form action="">
                        <div class="form-group">
                            <label for="category_id">Categoria</label>
                            <select name="category_id" class="form-control"> 
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="severity">Severidad</label>
                            <select name="severity" class="form-control">
                                <option value="M">menor</option>
                                <option value="N">normal</option>
                                <option value="A">Alta</option>
                            </select>
                        </div>

                        <di class="form-group">
                            <label for="title">Titulo</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="title" class="form-control">
                            <textarea name="description" class="form-control"></textarea>                            
                        </div>
                        <div class="form-group">
                            <a href="#" class="btn btn-primary">Primary</a>
                        </div>
                </div>
            </div>
@endsection
