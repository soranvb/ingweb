<div class="panel panel-primary">
	<div class="panel-heading">menu</div>

	<div class="panel-body">
		<ul class="nav nav-pills nav-stacked">

			



			@if (auth()->check())

			@if(auth()->user()->role ==0)
			 <li @if(request()->is('register')) class="active" @endif ><a href="{{ route('register') }}">Registerar Doct</a></li> 
			 <li @if(request()->is('usuarios')) class="active" @endif ><a href="{{url('/usuarios')}}">CRUD</a> </li>
			@endif

			@if(auth()->user()->role==1)
			<li @if(request()->is('register')) class="active" @endif ><a href="{{url('/pacientes')}}">Registerar Pacientes</a></li> 

			 <li role="presentation" class="dropdown">
   			 <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
   		     Pacientes <span class="caret"></span>
   		 	 </a>
  	  			<ul class="dropdown-menu">
      	 			<li><a href="{{url('/registrarPacientes')}}"> Registrar Paciente</a> </li>
      	 			<li><a href="{{url('/consultarPacientes')}}"> Consultar Pacientes</a> </li> VERIFICAR RUTA
     	 			<li><a href="#"> 3 </a> </li>
      			</ul>


      			 <li role="presentation" class="dropdown">
   			 <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
   		     Pacientes V2Y <span class="caret"></span>
   		 	 </a>
  	  			<ul class="dropdown-menu">
      	 			<li><a href="{{url('/pacientes')}}"> Registrar Paciente</a> </li>

              <form action="{{url('/consultarPacientes2')}}" method="POST">
                <input type="hidden" id="token" name="_token" value="{{csrf_token()}}">
                <input name="id_doc" type="hidden" value="{{Auth::user()->id}}">
                <button type="submit">Consultar</button>
              </form>
      	 			<li><a href="{{url('/pacientesConsulta')}}/{{Auth::user()->id}}"> Consultar Pacientes</a> </li>
     	 			<li><a href="#"> 3 </a> </li>
      			</ul>
      		@endif





			@else
			<li><a href="#"> Es necesario logear </a> </li>
			@endif
		</ul>
	</div>
</div>