<?php

//Conectar con el servidor de bases de datos
$conexion = new mysqli("localhost", "root", "root", "pokedex", 3306);

//Enviar la instrucción SQL a la base de datos
$sql = "select * from pokemons";

$result = $conexion->query($sql);

// Obtener y procesar los resultados

$resultAsArray = $result->fetch_all(MYSQLI_ASSOC);


//Cerramos conexión a la abse de datos
$conexion->close();

function buscarPokemonPorNombre($nombre){
    $conexion = new mysqli("localhost", "root", "", "pokedex", 3306);
    $sql1="select * from pokemon where nombre ='$nombre' ";
    $result = $conexion->query($sql1);
    $resultAsArray = $result->fetch_array(MYSQLI_ASSOC);
    return $resultAsArray;

}
function buscarPokemonPorTipo($tipo){
    $conexion = new mysqli("localhost", "root", "", "pokedex", 3306);
    $sql1="select * from pokemon where tipo ='img/tipo/$tipo.png' ";
    $result = $conexion->query($sql1);
    $resultAsArray = $result->fetch_all(MYSQLI_ASSOC);
    return $resultAsArray;

}
function buscarPokemonPorNumero($numero){
    $conexion = new mysqli("localhost", "root", "", "pokedex", 3306);
    $sql1="select * from pokemon where numero ='$numero'";
    $result = $conexion->query($sql1);
    $resultAsArray = $result->fetch_all(MYSQLI_ASSOC);
    return $resultAsArray;

}
