<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informes Realizados</title>
    <link rel="stylesheet" href="css/informeView.css">
    <link rel="shortcut icon" href="icon/investigacion.png">
</head>
<?php 
    include "php/conexion.php";
    session_start();
    if (!isset($_SESSION["admin"])) {
        header('Location: login.php');
    }
?>
<body>
    <div class="header">
        <div class="logo_name">Proyecto de investigación tesjo</div>
        <a href="revision.php"><img src="icon/back.svg" class="iconoSalir"></a>
    </div>
<table>
    <tr>
        <th>Fecha</th>
        <th>Numero de informe</th>
        <th>Inicio del informe</th>
        <th>Fin el informe</th>
        <th>Resumen</th>
        <th>Seguimiento del cronograma</th>
        <th>Fecha del cronograma</th>
        <th>Impacto</th>
        <th>Observaciones</th>
        <th>Vigente</th>
        <th>Razon</th>
    </tr>
    <?php

include "php/conexion.php";
if (isset($_GET['id_proyecto'])) {
    $id_proyecto = $_GET['id_proyecto'];

    $sql = "SELECT * FROM informe i INNER JOIN cierreproyecto c ON c.id_cierreproyecto=i.id_cierreproyecto INNER JOIN proyecto p ON p.id_proyecto=i.id_proyecto WHERE i.id_proyecto='$id_proyecto'";
    $bd = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($bd) > 0) {
        while ($file = mysqli_fetch_assoc($bd)) {
            if ($file['opcion'] == "Si") {
                $vigente = "No";
            }else {
                $vigente = "Si";
            }
            ?>
            <tr>
                <td><?php echo $file['fecha'] ?></td>
                <td><?php echo $file['numeroinforme'] ?></td>
                <td><?php echo $file['inicioinforme'] ?></td>
                <td><?php echo $file['fininforme'] ?></td>
                <td><?php echo $file['resumen'] ?></td>
                <td><?php echo $file['segumientocronograma'] ?></td>
                <td><?php echo $file['fechacronograma'] ?></td>
                <td><?php echo $file['impacto'] ?></td>
                <td><?php echo $file['observaciones'] ?></td>
                <td><?php echo $vigente ?></td>
                <td><?php echo $file['razon'] ?></td>
                
            </tr>
        <?php
        }
    }
}
?>
</table>
</body>
</html>