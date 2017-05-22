<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Recetas</title>
	<style>


		table
		{
			width:100%;
		}
		tr:nth-child(even) {background-color: #f911de }
		th,td 
		{
			border-bottom: 1px solid red; 
		}
		th
		{
			text:bold;
			background-color: #4c69af;
			color: #253323;
		}
	</style>
</head>
<body>

	<h1 align="left ">Receta</h1>

	<h3>Paciente</h3>
	<table border="1">
		
		
		<tr class="fondo">
			<!-- <td>Codigo</td> -->

			  							<th>Nombre</th>
                                        <th>@if($pacientes[0]->sexo==1)
                                              Femenino
                                              @else
                                              Masculino
                                              @endif</th>
                                        <th>Fecha de registro</th>
                                        <th>Edad</th>                                                                              
                                        <th>E-Mail</th>
                                        <th>Telefono</th>
                                        	
			</tr>
		
			<tr>
				
				<!--<td>{{$recetas->diagnosticos}}</td>-->

				<td>{{$pacientes[0]->name}}</td>
				<td>{{$pacientes[0]->sexo}}</td>
				<td>{{$pacientes[0]->start}}</td>
				<td>{{$pacientes[0]->edad}}</td>
				<td>{{$pacientes[0]->email}}</td>
				<td>{{$pacientes[0]->telefono}}</td>
				
			</tr>
		
	</table>

</body>
</html>