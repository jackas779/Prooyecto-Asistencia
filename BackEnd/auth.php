<?php 
    session_start();
    
    include "Config/connect.php";

    $correo = $_POST['correo'];
    $password = $_POST['pass'];

    
    $password = sha1($password);
    $sql = $con->prepare("SELECT id,correo, password FROM usuarios WHERE correo='$correo'");
    $sql->execute();
    $result = $sql->fetchAll();
    foreach($result as $dato){
        if ($password==$dato['password']){
            header ("location: Connect.php");
        } else {
            $msg = "El correo electrónico o la contraseña es inválida.";
            header("location: index.php");
        }
    }
    

    