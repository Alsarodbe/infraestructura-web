<?php

    $name =  $_POST["txtName"];
    $email_R =  $_POST["txtEmail_R"];
    $pass_R =  $_POST["txtPass_R"];
    $email_I =  $_POST["txtEmail_I"];
    $pass_I =  $_POST["txtPass_I"];

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnIniciasesion'])){
        
        header("Location: ../../dashboard/index.php");
    }	

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnRegistrar'])){
        
        header("Location: index.php");
    }
?>