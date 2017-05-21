<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Unidades</title>
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
	<h1>Unidades </h1>
	<hr>
	<table border="1">
		<tr class="fondo">
			<!-- <td>Codigo</td> -->
			<th>Diagnostico</td>
			<th>Nombre</td>
			<th>Sub Temas</td>
			</tr>
		
			<tr>
				
				<td>{{$recetas->diagnosticos}}</td>
				
			</tr>
		
	</table>

</body>
</html>