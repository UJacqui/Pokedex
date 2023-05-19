<?php
session_start();

if( !isset($_SESSION["usuario"]) ){
    header("location:index.php");
    exit();
}
$usuario = $_SESSION["usuario"];
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pokedex - Alta Pokemon</title>
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
    <h1 class="text-center">Ingrese los datos del pokemon</h1>
    <div class="container">
        <form action="procesarAlta.php" class="col" method="POST" enctype="multipart/form-data">
            <div class="row">
                Numero ID: <input required type="text" name="idPokemon">
            </div>
            <div class="row">
                Nombre: <input required type="text" name="nombre">
            </div>
            <div class="row">
                Tipo: <input required type="text" name="tipo">
            </div>
            <div class="row">
                Descripcion: <input required type="text" name="descripcion">
            </div>
            <div class="row">
            Añadir imagen: <input required name="archivo" id="archivo" type="file"/>
            </div>
            <br>
            <input type="submit" name="subir" class="btn btn-warning" value="Enviar">
            <button class='btn btn-secondary'><a style='text-decoration: none; color:white' href="index.php">Cancelar</a></button>
        </form>
    </div>
</main>
<footer>
    <div class="nav justify-content-center border-bottom pb-3 mb-3"></div>
    <p class="text-center text-muted">BuscaPoke Company- 2023</p>
</footer>
</body>
</html>
