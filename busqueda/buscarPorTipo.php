<?php
if (empty($_SESSION['usuario'])){
    if (!empty($_GET['buscarPokemon'])) {
        $pokemonDevuelto = buscarPokemonPorTipo($_GET['buscarPokemon']);
        if ($pokemonDevuelto != null) {
            foreach ($pokemonDevuelto as $pokemon) {
                echo
                    "<tbody>
        <tr>
            <th scope='row'><a href=plantilla.php?nombre=".$pokemon["idPokemon"].">  <img style='width: 100px' src=" . $pokemon["imagen"] . "> </th>
            <td> <img style='width: 100px'  src=" . $pokemon['tipo'] . "></td>
            <td>" . $pokemon['idPokemon'] . "</td>
            <td>" . $pokemon['nombre'] . "</td>
        </tr>
        </tbody>";
            }
        }
    }
}if (!empty($_SESSION['usuario'])){
    if (!empty($_GET['buscarPokemon'])) {
        $pokemonDevuelto = buscarPokemonPorTipo($_GET['buscarPokemon']);
        if ($pokemonDevuelto != null) {
            foreach ($pokemonDevuelto as $pokemon) {
                echo
                    "<tbody>
        <tr>
            <th scope='row'><a href=plantilla.php?nombre=".$pokemon["idPokemon"].">  <img style='width: 100px' src=" . $pokemon["imagen"] . "> </th>
            <td> <img style='width: 100px'  src=" . $pokemon['tipo'] . "></td>
            <td>" . $pokemon['idPokemon'] . "</td>
            <td>" . $pokemon['nombre'] . "</td>
            <td>
                <button class='btn btn-warning'><a style='text-decoration: none; color:white' href=modificar.php?id=". $pokemon['idPokemon'].">Modificar</a></button>
                <button class='btn btn-danger '><a style='text-decoration: none; color:white' href=eliminar.php?id=". $pokemon['idPokemon'].">Eliminar</a></button>
            </td>
        </tr>
        </tbody>";
            }
        }
    }
}

