<?php
session_start();

if( !isset($_SESSION["usuario"]) ){
    header("location:index.php");
    exit();
}
$usuario = $_SESSION["usuario"];
include_once("conexionBD.php");

?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pokedex - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="icon" type="image/x-icon" href="faviconpokemon.ico">
</head>
<body>
<header class="p-3 bg-danger text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <a href="index.php"><img src="img/pokemon.png" style="width:150px;"/></a>
            </div>
            <div class="col">
                <h2>POKEDEX</h2>
            </div>
            <div class="col">
                <div class="row g-3">
                    <div class="col">
                        <h4>Bienvenido:  <?php echo"$usuario"?></h4>
                    </div>
                    <div class="col">
                        <button type="button"  class="btn btn-warning btn-sm boton_logeo"> <a style="text-decoration: none" href="logout.php">Cerrar sesión</a> </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<main>
    <!-- <form class="d-flex mt-5">
        <input class="form-control me-2" type="search" placeholder="Ingrese el nombre,tipo o número de pokémon">
        <button class="btn btn-outline-success boton_color" type="submit">Quien es este pokemon?</button>
    </form> -->
    <form class="input-group seccion_busqueda">
        <input type="search" class="form-control rounded" name="buscarPokemon" placeholder="Ingrese el nombre, tipo o número de pokemon" aria-label="Search" aria-describedby="search-addon" />
        <button type="submit" class="btn btn-outline-primary boton_color">Quién es este pokemon?</button>
    </form>

        <?php

$sql = "SELECT * FROM pokemon ORDER BY idPokemon ASC";
$result = mysqli_query($conexion, $sql);

while ($mostrar=mysqli_fetch_array($result)){
    
?>
    <div class="table-responsive">
        <?php
        include_once("busqueda/buscarPokemonHome.php");
        ?>
        </table>
    </div>
<?php
}
?>

    <!-- boton de alta -->
    <form action="altaPokemon.php" method="POST" class="d-flex justify-content-center">
        <button type="submit" class="btn btn-success">Alta</button>
    </form>
</main>
<footer>
    <div class="nav justify-content-center border-bottom pb-3 mb-3"></div>
    <p class="text-center ">BuscaPoke Company- 2023</p>
</footer>
</body>
</html>
