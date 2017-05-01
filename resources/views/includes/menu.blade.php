<div class="panel panel-primary">
	<div class="panel-heading">menu</div>

	<div class="panel-body">
		<ul class="nav nav-pills nav-stacked">

			



			@if (auth()->check())

			@if(auth()->user()->role ==0)
			 <li @if(request()->is('register')) class="active" @endif ><a href="{{ route('register') }}">Registerar Doct</a></li> 
			 @endif


			<li @if(request()->is('usuarios')) class="active" @endif ><a href="{{url('/usuarios')}}">CRUD</a> </li>
			<li><a href="#"> insidencias </a> </li>

			<li role="presentation" class="dropdown">
   			 <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
   		   Dropdown <span class="caret"></span>
   		 </a>
  	  <ul class="dropdown-menu">
      <li><a href="#"> 1</a> </li>
      <li><a href="#"> 2 </a> </li>
      <li><a href="#"> 3 </a> </li>
    </ul>





			@else
			<li><a href="#"> Es necesario logear </a> </li>
			@endif
		</ul>
	</div>
</div>