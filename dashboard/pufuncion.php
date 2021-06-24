<?php
session_start();
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['guardar'])){
        $email = $_SESSION["email"];
        $pass =  $_POST['pass'];
        $nombre =  $_POST['nombre'];
        $apellidos =  $_POST['apellidos'];
        $telefono =  $_POST['telefono'];
        $pais =  $_POST['pais'];


        $conexion = mysqli_connect("localhost","root","","infraDB");
        $consulta = "UPDATE usuarios SET nombre = '$nombre',apellido = '$apellidos',telefono = '$telefono',pais = '$pais',pass = '$pass' WHERE email='$email'";
        $resultado = mysqli_query ($conexion,$consulta);

        echo '<div class = "formulario-div" style ="color:green">';
            echo '<h1 style = "text-align:center">'."Datos Actualizados".'</h1>';
            echo '<p></p>';
            echo '<h4 style = "text-align:center">Redireccionando...</h4>';
            echo '</div>';
            header('refresh:2,url =perfilusuario.php');
    }
?>