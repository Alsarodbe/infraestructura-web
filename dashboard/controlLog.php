<?php
    session_start();
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnRegistrar'])){
        $name =  $_POST["txtName"];
        $email_R =  $_POST["txtEmail_R"];
        $pass_R =  $_POST["txtPass_R"];
        
        $conexion = mysqli_connect("localhost","root","","infraDB");
        $consulta = "INSERT INTO usuarios (email, pass,nombre) VALUES('$email_R', '$pass_R','$name') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
            echo '<div class = "formulario-div" style ="color:green">';
            echo '<h1 style = "text-align:center">'."Usuario Agregado".'</h1>';
            echo '<p></p>';
            echo '<h4 style = "text-align:center">Redireccionando...</h4>';
            echo '</div>';
            header('refresh:2,url =index.php');
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnIniciasesion'])){
        $email =  $_POST["txtEmail"];
        $pass =  $_POST["txtPass"];

        $conexion = mysqli_connect("localhost","root","","infraDB");
        $consulta = "SELECT email,pass FROM usuarios WHERE email='$email' AND pass='$pass' ";
        $resultado = $conexion->query($consulta);
        $newemail = null;
        $newpass = null;
        if($resultado->num_rows>0){
            $data = $resultado->fetch_assoc();
                $newemail = $data['email'];
                $newpass = $data['pass'];
        }
            
        if($newemail == $email && $newpass == $pass){
            $_SESSION["email"] = $email;
            echo '<div class = "formulario-div" style ="color:green">';
            echo '<h1 style = "text-align:center">'."Iniciando sesión".'</h1>';
            echo '<p></p>';
            echo '<h4 style = "text-align:center">Redireccionando...</h4>';
            echo '</div>';
            header('refresh:2,url =dashboard.php');
            
        }else{
            echo '<div class = "formulario-div" style ="color:red">';
            echo '<h1 style = "text-align:center">'."Correo y/o contraseña incorrectos".'</h1>';
            echo '<p></p>';
            echo '<h4 style = "text-align:center">Redireccionando...</h4>';
            echo '</div>';
            header('refresh:2,url =index.php');
        }
        
    }
?>