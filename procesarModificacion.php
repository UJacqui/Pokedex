<?php
session_start();

if( !isset($_SESSION["usuario"]) ){
    header("location:index.php");
    exit();
}
$usuario = $_SESSION["usuario"];


//conecto la base de datos y recibo los datos para modificar al pokemon
include_once("conexionBD.php");
$id = (isset($_POST["id"]) ? $_POST["id"] : "");
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
$tipo = isset($_POST["tipo"]) ? "imgPoke/".$_POST["tipo"] .".png": "";
$idPokemon = isset($_POST["idPokemon"]) ? $_POST["idPokemon"] : "";
$imagen = isset($_POST["imagen"]) ? "imgPoke/".$_POST["imagen"]. ".png": "";
$descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";


// genero la consulta del UPDATE y la ejecuto, si no hay error, redirigo a la pagina de inicio
$sql = "UPDATE pokemon SET descripcion='$descripcion', nombre='$nombre', idPokemon='$idPokemon', tipo='$tipo' WHERE idPokemon ='$id'";
if(mysqli_query($conexion, $sql)){
    header('Location: home.php');
}
else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
}