<?php 
session_start();

if( !isset($_SESSION["usuario"]) ){
    header("location:index.php");
    exit();
}
$usuario = $_SESSION["usuario"];

//subo al servidor la imagen
if(isset($_POST['subir'])){
    //recibo el archivo subido en el form
    $archivo = $_FILES['archivo']['name'];
    //si el archivo contiene algo y es diferente de vacio
    if(isset($archivo) && $archivo != ""){
        //obtengo datos del archivo
        $tipo = $_FILES['archivo']['type'];
        $tamano = $_FILES['archivo']['size'];
        $temp = $_FILES['archivo']['tmp_name'];

        //validamos la extension y el tamaño
        if(!((strpos($tipo, "gif") || strpos($tipo, "jpg") || strpos($tipo, "jpeg") || strpos($tipo, "png")))){
            // si la imagen es incorrecta
            echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>';
        }
        else{
            //si la imagen es correcta
            //la intento subir al servidor
            if(move_uploaded_file($temp, "imgPoke/".$archivo)){
                //Cambiamos los permisos a 777
                chmod('imgPoke/'.$archivo, 0777);
                

            }
            else {
                //Si no se ha podido subir la imagen, mostramos un mensaje de error
                echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
             }
        }
    }
}


// conecto la base de datos y obtengo los datos del pokemon a insertar
include_once("conexionBD.php");
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
$tipo = isset($_POST["tipo"]) ? "imgPoke/".$_POST["tipo"] .".png": "";
$idPokemon = isset($_POST["idPokemon"]) ? $_POST["idPokemon"] : "";
$imagen = isset($_FILES["archivo"]["name"]) ? "imgPoke/".$_FILES["archivo"]["name"] : "";
$descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";

//genero la consulta y la ejecuto, si no hay error, redirigo a la pagina de inicio
$sql = "INSERT INTO pokemon ( idPokemon , nombre, tipo, descripcion, imagen) VALUES ('".$idPokemon."','".$nombre."','".$tipo."','".$descripcion."','".$imagen."')";

if(mysqli_query($conexion, $sql)){
    header('Location: home.php');
}
else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
}

