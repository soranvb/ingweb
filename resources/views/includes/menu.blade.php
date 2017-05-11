<div class="panel panel-primary">
	<div class="panel-heading">Menu</div>

	<div class="panel-body">
		<ul class="nav nav-pills nav-stacked">

			



			@if (auth()->check())

			@if(auth()->user()->role ==0)
			 <li @if(request()->is('register')) class="active" @endif ><a href="{{ route('register') }}">Registrar Doct</a></li> 
			 <li @if(request()->is('usuarios')) class="active" @endif ><a href="{{url('/usuarios')}}">CRUD</a> </li>
			@endif

			@if(auth()->user()->role==1)
			<li @if(request()->is('pacientes')) class="active" @endif ><a href="{{url('/pacientes')}}">Registerar Pacientes</a></li> 
<!--
			 <li role="presentation" class="dropdown">
   			 <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
   		     Pacientes <span class="caret"></span>
   		 	 </a>
  	  			<ul class="dropdown-menu">
      	 			<li><a href="{{url('/registrarPacientes')}}"> Registrar Paciente</a> </li>
      	 			<li><a href="{{url('/consultarPacientes')}}"> Consultar Pacientes</a> </li> VERIFICAR RUTA
     	 			<li><a href="#"> 3 </a> </li>
      			</ul> -->

<!--
             <li role="presentation" class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
           Pacientes V2Y <span class="caret"></span>
         </a>
            <ul class="dropdown-menu">
              <li><a href="{{url('/pacientes')}}"> Registrar Paciente</a> </li>

-->
              
                <li @if(request()->is('consultarPacientes')) class="active" @endif ><a href="{{url('/consultarPacientes')}}">Consultar Pacientes</a> </li>
               
  
      @if(auth()->user()->role==1)
      <li @if(request()->is('Recetas')) class="active" @endif ><a href="{{url('/Recetas')}}">Recetas</a></li>
      @endif


      @if(auth()->user()->role==1)
      <li @if(request()->is('recetasPacientes')) class="active" @endif ><a href="{{url('/recetasPacientes')}}">RePAcientes</a></li>
      @endif
            <!--
      	 			<li><a href="{{url('/pacientesConsulta')}}/{{Auth::user()->id}}"> Consultar Pacientes</a> </li>
     	 			<li><a href="#"> 3 </a> </li>
      			</ul>
          -->
      		@endif





			@else
			<li><a href="#"> Es necesario logear </a> </li>
			@endif
		</ul>
	</div>
</div>