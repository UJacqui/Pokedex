<?php

session_start();

if(isset($_SESSION["usuario"]) ){

    $usuario = $_SESSION["usuario"];
}

include_once ("conexionBD.php");

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
                        <h4>
                            <?php if(isset($_SESSION["usuario"]) ){

                                $usuario = $_SESSION["usuario"];
                                echo "Bienvenido:".$usuario."
                            
                        </h4>
                    </div>
                    <div class='col'>
                        <button type='button'  class='btn btn-warning btn-sm boton_logeo'> <a style='text-decoration: none' href='logout.php'>Cerrar sesión</a> </button>
                    </div>";
                    }else{echo"
                                <div class='col'>
                <form action='login.php' method='post'>
                   <div class='row g-3'>
                       <div class='col'>
                           <input type='text' name='usuario' class='form-control form-control-sm' placeholder='Usuario'>
                       </div>
                       <div class='col'>
                           <input type='password' name='password' class='form-control form-control-sm' placeholder='Password'>
                       </div>
                       <div class='col'>
                           <button type='submit' name='ingresar' class='btn btn-primary btn-sm boton_logeo'>Ingresar</button>
                       </div>
                   </div>
                </form>
            </div>
                            ";}?>
                </div>
            </div>
        </div>
    </div>
</header>

<main class="p-5 container">
    <div class="row contenido">
    <?php
    $nombre_enviado = $_GET['nombre'];
    $sql="SELECT * from pokemon where pokemon.idPokemon = $nombre_enviado ;"; //Consulta de SQL por numero o nombre.
        if($result = mysqli_query($conexion, $sql)){
            while($registro = $result->fetch_assoc()){
                ?>
                <div class="col img-pokemon">
                    <img src="<?php echo $registro['imagen']; ?>"/>
                </div>
                <div class="col">
                    <div>
                        <h1><?php echo $registro['nombre'];?> <span>N.º<?php echo $registro['idPokemon'];?></span></h1>
                        <h3>Tipo: <img src="<?php echo $registro['tipo']; ?>" /> </h3>
                    </div>
                    <div class="descripcion-pokemon">
                        <p><?php echo $registro['descripcion'];?></p>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
</main>

<footer>
    <div class="nav justify-content-center border-bottom pb-3 mb-3"></div>
    <p class="text-center">BuscaPoke Company- 2023</p>
</footer>


</body>