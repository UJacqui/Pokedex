<?php
session_start();

$usuario = isset( $_POST["usuario"])?$_POST["usuario"] : "";
$password = isset( $_POST["password"])?$_POST["password"] : "";

if (validarUsuario($usuario, $password) == TRUE){
    $_SESSION["usuario"] = $usuario;
    header("location:home.php");
    exit();
} else {
    header("location:index.php");
    exit();
}

function validarUsuario($usuario, $pass){
    return $usuario == "admin" && $pass == "1234";
}
