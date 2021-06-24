<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS   

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$pagina = (isset($_POST['pagina'])) ? $_POST['pagina'] : '';
$contra = (isset($_POST['contra'])) ? $_POST['contra'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
//$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
session_start();   
    $conexion2 = mysqli_connect("localhost","root","","infraDB");
        $provemail = $_SESSION["email"];
        $consulta = "SELECT idUsuario FROM usuarios WHERE email='$provemail'";
        $resultado = $conexion2->query($consulta);
        $newemail = null;
        if($resultado->num_rows>0){
            $data = $resultado->fetch_assoc();
                $idusuario = $data['idUsuario'];
        }


switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO paginas (pagina, nombre, contra,idUsuario) VALUES('$pagina', '$nombre', '$contra','$idusuario') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT * FROM paginas WHERE idUsuario = '$idusuario' ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE paginas SET nombre='$nombre', pagina='$pagina', contra='$contra' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM paginas WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM paginas WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break; 
    case 4:    
        $consulta = "SELECT * FROM paginas WHERE idUsuario = '$idusuario'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;       
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
