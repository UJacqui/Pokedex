<?php
$conexion = mysqli_connect("localhost", "root", "root", "pokedex", 3306) or die ("No se puede conectar con el servidor");
//Enviar la instrucción SQL a la base de datos
$sql = "select * from pokemon";

$result = $conexion->query($sql);

// Obtener y procesar los resultados

$resultAsArray = $result->fetch_all(MYSQLI_ASSOC);


//Cerramos conexión a la abse de datos
function buscarPokemonPorNombre($nombre){
    $conexion = new mysqli("localhost", "root", "root", "pokedex", 3306);
    $sql1="select * from pokemon where nombre ='$nombre' ";
    $result = $conexion->query($sql1);
    $resultAsArray = $result->fetch_array(MYSQLI_ASSOC);
    return $resultAsArray;

}
function buscarPokemonPorTipo($nombre){
    $conexion = new mysqli("localhost", "root", "root", "pokedex", 3306);
    $sql1="select * from pokemon where tipo ='imgPoke/$nombre.png' ";
    $result = $conexion->query($sql1);
    $resultAsArray = $result->fetch_all(MYSQLI_ASSOC);
    return $resultAsArray;

}
function buscarPokemonPorNumero($nombre){
    $conexion = new mysqli("localhost", "root", "root", "pokedex", 3306);
    $sql1="select * from pokemon where idPokemon ='$nombre'";
    $result = $conexion->query($sql1);
    $resultAsArray = $result->fetch_all(MYSQLI_ASSOC);
    return $resultAsArray;

}