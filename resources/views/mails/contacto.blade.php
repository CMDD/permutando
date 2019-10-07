<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    .btn{
        color: blue;
    }
    </style>
</head>
<body>
    
     <p>¡ Buenas Noticias !</p> 
     @if($request->tipo =='Venta')
    <p>Estás muy cerca de Vender  tu inmueble.</p>  
    @endif
     @if($request->tipo =='Permuto')
    <p>Estás muy cerca de Permutar  tu inmueble.</p>  
    @endif


<p>Has click en el siguiente botón para contactarte con el interesado .</p>
<a href="http://localhost:8000/perfil-mensajes"><Button  class="btn" >Ver</Button></a>


<p>Permutado: cambiamos la forma de hacer tus negocios !</p>

</body>
</html>