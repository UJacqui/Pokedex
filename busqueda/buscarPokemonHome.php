
<table class="table table-bordered mt-5 text-center">
    <thead>
    <tr>
        <th scope="col">Imagen</th>
        <th scope="col">Tipo</th>
        <th scope="col">Número</th>
        <th scope="col">Nombre</th>
        <th scope="col">Acciones</th>
    </tr>
    </thead>


<?php
if (!empty($_GET['buscarPokemon'])) {
    $pokemonDevueltoPorNombre = buscarPokemonPorNombre($_GET['buscarPokemon']);
    $pokemonDevueltoPorTipo=buscarPokemonPorTipo($_GET['buscarPokemon']);
    $pokemonDevueltoPorNumero=buscarPokemonPorNumero($_GET['buscarPokemon']);
    if ($pokemonDevueltoPorNombre != null) {
        echo
            "<tbody>
        <tr>
            <th scope='row' class='hover-imagen'><a href=plantilla.php?nombre=".$pokemonDevueltoPorNombre["idPokemon"]."> <img style='width: 80px' src=" . $pokemonDevueltoPorNombre["imagen"] . "> </th>
            <td> <img style='width: 100px'  src=" . $pokemonDevueltoPorNombre['tipo'] . "></td>
            <td>" . $pokemonDevueltoPorNombre['idPokemon'] . "</td>
            <td>" . $pokemonDevueltoPorNombre['nombre'] . "</td>
            <td>
        <!-- Botones de modificar y eliminar -->
        <button class='btn btn-warning'><a style='text-decoration: none; color:white' href=modificar.php?id=".$pokemonDevueltoPorNombre['idPokemon'].">Modificar</a></button>
    <button class='btn btn-danger '><a style='text-decoration: none; color:white' href=eliminar.php?id=".$pokemonDevueltoPorNombre['idPokemon'].">Eliminar</a></button>
    </td>
        </tr>
        </tbody>";
    }
    if($pokemonDevueltoPorTipo!=null){
        include_once("buscarPorTipo.php");
    }
    if($pokemonDevueltoPorNumero!=null){
        include_once("buscarPokemonPorNumero.php");
    }
    if ($pokemonDevueltoPorNombre == null && $pokemonDevueltoPorTipo==null && $pokemonDevueltoPorNumero==null ) {
        echo '<br><h3 style="color:red">El pokemon '.$_GET['buscarPokemon'].' no fue encontrado</h3>';
        foreach ($resultAsArray as $pokemon) {
            echo
                "<tbody>
        <tr>
            <th scope='row' class='hover-imagen'><a href=plantilla.php?nombre=".$pokemon["idPokemon"]."> <img style='width: 80px' src=" . $pokemon["imagen"] . "> </th>
            <td> <img style='width: 100px'  src=" . $pokemon['tipo'] . "></td>
            <td>" . $pokemon['idPokemon'] . "</td>
            <td>" . $pokemon['nombre'] . "</td>
            <td>
        <!-- Botones de modificar y eliminar -->
        <button class='btn btn-warning'><a style='text-decoration: none; color:white' href=modificar.php?id=".$pokemon['idPokemon'].">Modificar</a></button>
    <button class='btn btn-danger '><a style='text-decoration: none; color:white' href=eliminar.php?id=".$pokemon['idPokemon'].">Eliminar</a></button>
    </td>
        </tr>
        </tbody>";
        }
    }
} else {
    foreach ($resultAsArray as $pokemon) {
        echo
            "<tbody>
        <tr>
            <th scope='row' class='hover-imagen'><a href=plantilla.php?nombre=".$pokemon["idPokemon"]."> <img style='width: 80px' src=" . $pokemon["imagen"] . "> </th>
            <td> <img style='width: 100px'  src=" . $pokemon['tipo'] . "></td>
            <td>" . $pokemon['idPokemon'] . "</td>
            <td>" . $pokemon['nombre'] . "</td>
            <td>
        <!-- Botones de modificar y eliminar -->
        <button class='btn btn-warning'><a style='text-decoration: none; color:white' href=modificar.php?id=".$pokemon['idPokemon'].">Modificar</a></button>
    <button class='btn btn-danger '><a style='text-decoration: none; color:white' href=eliminar.php?id=".$pokemon['idPokemon'].">Eliminar</a></button>
    </td>
        </tr>
        </tbody>";
    }
}


?>
</table>