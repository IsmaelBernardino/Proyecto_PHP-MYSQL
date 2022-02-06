<?php
include "conexion.php";

if (isset($_GET['id_responsable'])) {
    $idR = $_GET['id_responsable'];
    $borrar = "DELETE FROM responsables WHERE id_responsable = '$idR'";
    $con = mysqli_query($conexion, $borrar);
    if ($con) {
        header("Location: ../informe.php");
    }else{
        echo "error";   
    }
}
if (isset($_GET['id_Productoesperado'])) {
    $idR = $_GET['id_Productoesperado'];
    $borrar = "DELETE FROM productoesperado WHERE id_Productoesperado = '$idR'";
    $con = mysqli_query($conexion, $borrar);
    if ($con) {
        header("Location: ../informe.php");
    }else{
        echo "error";   
    }
}

?>