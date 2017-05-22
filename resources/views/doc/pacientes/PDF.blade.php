<!DOCTYPE html>
<html>
<head>
<title>Receta</title>

<meta name="viewport" content="width=device-width"/>
<meta name="description" content="Receta"/>
<meta charset="UTF-8"> 

<link type="text/css" rel="stylesheet" href="style.css">


<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body id="top">
<div id="cv" class="instaFade">
  <div class="mainDetails">
    <div id="headshot" class="quickFade">
      <img src="headshot.jpg" alt="" />
    </div>
    
    <div id="name">
      <h1 class="quickFade delayTwo">Receta {{$pacientes[0]->name}}</h1>
      <h2 class="quickFade delayThree">Doctor</h2>
    </div>
    
    <div id="contactDetails" class="quickFade delayFour">
      <ul>
        <li>Nombre : {{$user->name}}</a></li>
        <li>Direcion : {{$user->domicilio}} </a></li>
        <li>E-Mail : {{$user->email}}</li>
        <li>Especialidad : {{$user->especialidad}}</li>
        <li>Telefono : {{$user->telefono}}</li>
      </ul>
    </div>
    <div class="clear"></div>
  </div>
  


    <section>
      <div class="sectionTitle">
        <h1>Paciente</h1>
      </div>
      
      <div class="sectionContent">
        <ul class="keySkills">
          <li>Nombre: {{$pacientes[0]->name}}</li>
          <li>Edad: {{$pacientes[0]->edad}}</li>
          <li>Telefono :{{$pacientes[0]->telefono}}</li>
          <li>Tipo Sangre: {{$pacientes[0]->sangre}}</li>
          <li>Domicilio: {{$pacientes[0]->domicilio}}</li>
          <li>Sexo: @if($pacientes[0]->sexo==1)
                                              Femenino
                                              @else
                                              Masculino
                                              @endif</li>
          <li>Fecha De La Receta: {{$recetas->created_at}}</li>
          <li>Correo: {{$pacientes[0]->email}} </li>
           <li>alergias: {{$pacientes[0]->alergias}} </li>
        </ul>
      </div>
      <div class="clear"></div>
    </section>
    
    
      <div class="Sintomas">
        <article>
          <h2>Sintomas</h2>
          <p class="subDetails">{{$recetas->sintomas}}</p></article>

          <h2>Diagnostico</h2>
          <p class="subDetails">{{$recetas->diagnosticos}}</p></article>

          <h2>Tratamiento</h2>
          <p class="subDetails">{{$recetas->tratamientos}}</p></article>

          <h2>Observaciones</h2>
          <p class="subDetails">{{$recetas->observaciones}}</p></article>
    
  
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-3753241-1");
pageTracker._initData();
pageTracker._trackPageview();
</script>
</body>
</html>