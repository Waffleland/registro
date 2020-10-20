<?php
if(array_key_exists('username',$_POST) OR array_key_exists('password',$_POST)){
    $enlace=mysqli_connect("shareddb-x.hosting.stackcp.net","usuarios-31353714b3", "julieta123", "usuarios-31353714b3");
    if(mysqli_connect_error()){
        die("Hubo un error en la conexión");
    }
    if($_POST['username']==''){
        echo"<p>El nombre de usuario es obligario</p>";
    }
    else if($_POST['password']==''){
        echo"<p>La contraseña es obligaria</p>";
    }
    else{
        $query="SELECT username FROM usuarios WHERE username='".$_POST['username']."'";
        $result = mysqli_query($enlace,$query);
        if(mysqli_num_rows($result)>0){
            echo"<p>Ese nombre de usuario ya está registrado, intenta con otro</p>";
        }
        else{
            //añadir a nuestro usuario a la BD
            $query="INSERT INTO usuarios(username,password) VALUES('".$_POST['username']."','".$_POST['password']."')";
            if (mysqli_query($enlace,$query)){
                echo"<p>Bienvenido, has registrado tu cuenta</p>";
            }
            else{
                echo"<p>Hubo un problema al registrar el usuario</p>";
            }
        }
    }
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="jquery-.min.js"></script>
        <style type="text/css">
        body{
            font-family: Helvetica, sans-serif;
            font-size:150%;
        }
        input{
            height:40px;
            padding:5px 5px 12px 5px;
            font-size:25px;
            border-radius: 5px;
            border:1px solid grey;
            width:300px;
        }
        label{
            position:relative;
            top:5px;
            width:220px;
            float: left;
        }
        #contenedor{
            width:550px;
            margin:0 auto;
        }
        .elemento-formulario{
            margin-bottom: 10px;
        }
        #botonenviar{
            width:200px;
            margin-left: 220px;
            margin-top: 5px;
        }
        #mensajeErrorCampos{
            color:red;
            font-size: 110% !important;
        }
        #titulo{
            display:flex;
            justify-content:center;
        }
        </style>
    </head>
    <body>
        <form method="POST">
        <h1 id="titulo">Registro de usuarios</h1>
        <div id="contenedor">
            <div id="mensajeErrorCampos"></div>
            <div class="elemento-formulario">
        <label for="username">Usuario</label>
        <input type="text" name="username" id="username" placeholder="Pepe Lopez">
           </div>
           <div class="elemento-formulario">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="contraseña">
</div>
<div class="elemento-formulario">
        <label for="confirmar">Confirmar contraseña</label>
        <input type="password" name="confirmar" id="confirmar">
                </div>
<div class="elemento-formulario">
    <input type="submit" id="botonenviar" value="Registrarse">
</div>
<div id="mensajeExito"></div>
    </div>
    </form>
        <script type="text/javascript">
/*
  $("#botonenviar").click(function(){
      var campoVacio="";
      var mensajeError="";
      /*verificación de campos no vacíos*/
     /* if($("#username").val() == ""){
          campoVacio=campoVacio+"Username<br>";
      }
      if($("#contraseña").val() == ""){
          campoVacio=campoVacio+"Contraseña<br>";
      }
      if($("#confirmar").val() == ""){
          campoVacio=campoVacio+"Confirmar contraseña<br>";
      }
      if (campoVacio!=""){
mensajeError="<p>Los siguientes campos están vacíos: </p>" + campoVacio + mensajeError;
      }
      //validamos que las contraseñas sean iguales
      if ($("#contraseña").val() != $("#confirmar").val()){
        mensajeError = mensajeError+"<p>Las contraseñas no coinciden. </p>";
      }

      if (mensajeError!=""){
          $("#mensajeErrorCampos").html(mensajeError);
      }
      else{
          $("#mensajeExito").html("<p>Enhorabuena</p>");
      }
  })*/
            </script>
    </body>
</html>