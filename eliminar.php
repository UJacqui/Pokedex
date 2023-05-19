<?php
session_start();

if( !isset($_SESSION["usuario"]) ){
    header("location:index.php");
    exit();
}
$usuario = $_SESSION["usuario"];
$id = $_GET["id"];

//conecto la base de datos y elimino el pokemon con el id recibido
include_once("conexionBD.php");
$sql = "DELETE FROM pokemon WHERE idPokemon = '$id'";
mysqli_query($conexion, $sql);
header("location: home.php");