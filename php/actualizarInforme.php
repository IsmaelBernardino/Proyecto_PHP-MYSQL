<?php

if (isset($_POST['btnactualizar'])) {
    $id_proyecto = $_POST['idProyecto'];
    $fecha_final = $_POST['fechaProyecto'];

    $updfech = "UPDATE proyecto SET fechafinalproyecto='$fecha_final' WHERE id_proyecto='$id_proyecto'";
    $bdf = mysqli_query($conexion, $updfech);

    // validacion de exsistencia de responsables
    if (isset($_POST['nom2']) || isset($_POST['aP2']) || isset($_POST['aM2']) || isset($_POST['r2']) || isset($_POST['c2'])) {
        $nombre_res2 = $_POST['nom2'];
        $paterno_res2 = $_POST['aP2'];
        $materna_res2 = $_POST['aM2'];
        $rol_res2 = $_POST['r2'];
        $correo_res2 = $_POST['c2'];
        if (isset($_POST['id2'])) {
            $id_res2 = $_POST['id2'];
            $updt = "UPDATE responsables SET nombre_res='$nombre_res2', apePa='$paterno_res2',
            apeMa='$materna_res2', rol='$rol_res2',correo='$correo_res2' WHERE id_responsable ='$id_res2'";
            $bd1 = mysqli_query($conexion,$updt);
        }else {
            $sql = "INSERT INTO responsables (id_responsable,nombre_res,apePa,apeMa,rol,correo,id_proyecto) VALUES (null, '$nombre_res2',
            '$paterno_res2','$materna_res2','$rol_res2','$correo_res2','$id_proyecto')";
            $bd1 = mysqli_query($conexion, $sql);
        }
    }
    if (isset($_POST['nom3']) || isset($_POST['aP3']) || isset($_POST['aM3']) || isset($_POST['r3']) || isset($_POST['c3'])) {
        $nombre_res3 = $_POST['nom3'];
        $paterno_res3 = $_POST['aP3'];
        $materna_res3 = $_POST['aM3'];
        $rol_res3 = $_POST['r3'];
        $correo_res3 = $_POST['c3'];
        if (isset($_POST['id3'])) {
            $id_res3 = $_POST['id3'];
            $updt2 = "UPDATE responsables SET nombre_res='$nombre_res3', apePa='$paterno_res3',
            apeMa='$materna_res3', rol='$rol_res3',correo='$correo_res3' WHERE id_responsable ='$id_res3'";
            $bd2 = mysqli_query($conexion,$updt2);
        }else{
            $sql2 = "INSERT INTO responsables (id_responsable,nombre_res,apePa,apeMa,rol,correo,id_proyecto) VALUES (null, '$nombre_res3',
            '$paterno_res3','$materna_res3','$rol_res3','$correo_res3','$id_proyecto')";
            $bd2 = mysqli_query($conexion, $sql2);
        }
    }
    if (isset($_POST['nom4']) || isset($_POST['aP4']) || isset($_POST['aM4']) || isset($_POST['r4']) || isset($_POST['c4'])) {
        $nombre_res4 = $_POST['nom4'];
        $paterno_res4 = $_POST['aP4'];
        $materna_res4 = $_POST['aM4'];
        $rol_res4 = $_POST['r4'];
        $correo_res4 = $_POST['c4'];
        if (isset($_POST['id4'])) {
            $id_res4 = $_POST['id4'];
            $id_res3 = $_POST['id4'];
            $updt3 = "UPDATE responsables SET nombre_res='$nombre_res4', apePa='$paterno_res4',
            apeMa='$materna_res4', rol='$rol_res4',correo='$correo_res4' WHERE id_responsable ='$id_res4'";
            $bd3 = mysqli_query($conexion,$updt3);
        }else{
            $sql3 = "INSERT INTO responsables (id_responsable,nombre_res,apePa,apeMa,rol,correo,id_proyecto) VALUES (null, '$nombre_res4',
            '$paterno_res4','$materna_res4','$rol_res4','$correo_res4','$id_proyecto')";
            $bd3 = mysqli_query($conexion, $sql3);
        }
    }
    if (isset($_POST['nom5']) || isset($_POST['aP5']) || isset($_POST['aM5']) || isset($_POST['r5']) || isset($_POST['c5'])) {
        $nombre_res5 = $_POST['nom5'];
        $paterno_res5 = $_POST['aP5'];
        $materna_res5 = $_POST['aM5'];
        $rol_res5 = $_POST['r5'];
        $correo_res5 = $_POST['c5'];
        if (isset($_POST['id5'])) {
            $id_res5 = $_POST['id5'];
            $updt4 = "UPDATE responsables SET nombre_res='$nombre_res5', apePa='$paterno_res5',
            apeMa='$materna_res5', rol='$rol_res5',correo='$correo_res5' WHERE id_responsable ='$id_res5'";
            $bd4 = mysqli_query($conexion,$updt4);
        }else {
            $sql4 = "INSERT INTO responsables (id_responsable,nombre_res,apePa,apeMa,rol,correo,id_proyecto) VALUES (null, '$nombre_res5',
            '$paterno_res5','$materna_res5','$rol_res5','$correo_res5','$id_proyecto')";
            $bd4 = mysqli_query($conexion, $sql4);
        }
    }

    // productos
    if (isset($_POST['pro1']) || isset($_POST['cantidadP1']) || isset($_POST['fechaP1'])) {
        if (isset($_POST['idP1'])) {
            $id_producto1 = $_POST['idP1'];
            $producto1 = $_POST['pro1'];
            $cantidad_pro1 = $_POST['cantidadP1'];
            $fecha_pro1 = $_POST['fechaP1'];
            $upd = "UPDATE productoesperado SET productoE='$producto1',cantidad='$cantidad_pro1',fecha='$fecha_pro1',id_proyecto='$id_proyecto' WHERE id_Productoesperado ='$id_producto1'";
            $ubd = mysqli_query($conexion,$upd);
        }
    }
    
    if (isset($_POST['pro2']) || isset($_POST['cantidadP2']) || isset($_POST['fechaP2'])) {
        if (isset($_POST['idP2'])) {
            $id_producto2 = $_POST['idP2'];
            $producto2 = $_POST['pro2'];
            $cantidad_pro2 = $_POST['cantidadP2'];
            $fecha_pro2 = $_POST['fechaP2'];
            $upd2 = "UPDATE productoesperado SET productoE='$producto2',cantidad='$cantidad_pro2',fecha='$fecha_pro2' WHERE id_Productoesperado ='$id_producto2'";
            $ubd2 = mysqli_query($conexion,$upd2);
        }
    }
    if (isset($_POST['pro3']) || isset($_POST['cantidadP3']) || isset($_POST['fechaP3'])) {
        if (isset($_POST['idP3'])) {
            $id_producto3 = $_POST['idP3'];
            $producto3 = $_POST['pro3'];
            $cantidad_pro3 = $_POST['cantidadP3'];
            $fecha_pro3 = $_POST['fechaP3'];
            $upd3 = "UPDATE productoesperado SET productoE='$producto3', cantidad='$cantidad_pro3',fecha='$fecha_pro3', id_proyecto='$id_proyecto' WHERE id_Productoesperado ='$id_producto3'";
            $ubd3 = mysqli_query($conexion,$upd3);
        }
    }
    if (isset($_POST['pro4']) || isset($_POST['cantidadP4']) || isset($_POST['fechaP4'])) {
        if (isset($_POST['idP4'])) {
            $id_producto4 = $_POST['idP4'];
            $producto4 = $_POST['pro4'];
            $cantidad_pro4 = $_POST['cantidadP4'];
            $fecha_pro4 = $_POST['fechaP4'];
            $upd4 = "UPDATE productoesperado SET productoE='$producto4', cantidad='$cantidad_pro4',fecha='$fecha_pro4', id_proyecto='$id_proyecto' WHERE id_Productoesperado ='$id_producto4'";
            $ubd4 = mysqli_query($conexion,$upd4);
        }
    }
    if (isset($_POST['pro5']) || isset($_POST['cantidadP5']) || isset($_POST['fechaP5'])) {
        if (isset($_POST['idP5'])) {
            $id_producto5 = $_POST['idP5'];
            $producto5 = $_POST['pro5'];
            $cantidad_pro5 = $_POST['cantidadP5'];
            $fecha_pro5 = $_POST['fechaP5'];
            $upd5 = "UPDATE productoesperado SET productoE='$producto5', cantidad='$cantidad_pro5',fecha='$fecha_pro5', id_proyecto='$id_proyecto' WHERE id_Productoesperado ='$id_producto5'";
            $ubd5 = mysqli_query($conexion,$upd5);
        }
    }
    if (isset($_POST['pro6']) || isset($_POST['cantidadP6']) || isset($_POST['fechaP6'])) {
        if (isset($_POST['idP6'])) {
            $id_producto6 = $_POST['idP6'];
            $producto6 = $_POST['pro6'];
            $cantidad_pro6 = $_POST['cantidadP6'];
            $fecha_pro6 = $_POST['fechaP6'];
            $upd6 = "UPDATE productoesperado SET productoE='$producto6', cantidad='$cantidad_pro6',fecha='$fecha_pro6', id_proyecto='$id_proyecto' WHERE id_Productoesperado ='$id_producto6'";
            $ubd6 = mysqli_query($conexion,$upd6);
        }
    }
    if (isset($_POST['pro7']) || isset($_POST['cantidadP7']) || isset($_POST['fechaP7'])) {
        if (isset($_POST['idP7'])) {
            $id_producto7 = $_POST['idP7'];
            $producto7 = $_POST['pro7'];
            $cantidad_pro7 = $_POST['cantidadP7'];
            $fecha_pro7 = $_POST['fechaP7'];
            $upd7 = "UPDATE productoesperado SET productoE='$producto7', cantidad='$cantidad_pro7',fecha='$fecha_pro7', id_proyecto='$id_proyecto' WHERE id_Productoesperado ='$id_producto7'";
            $ubd7 = mysqli_query($conexion,$upd7);
        }
    }
    if (isset($_POST['pro8']) || isset($_POST['cantidadP8']) || isset($_POST['fechaP8'])) {
        if (isset($_POST['idP8'])) {
            $id_producto8 = $_POST['idP8'];
            $producto8 = $_POST['pro8'];
            $cantidad_pro8 = $_POST['cantidadP8'];
            $fecha_pro8 = $_POST['fechaP8'];
            $upd8 = "UPDATE productoesperado SET productoE='$producto8', cantidad='$cantidad_pro8',fecha='$fecha_pro8', id_proyecto='$id_proyecto' WHERE id_Productoesperado ='$id_producto8'";
            $ubd8 = mysqli_query($conexion,$upd8);
        }
    }
    if (isset($_POST['pro9']) || isset($_POST['cantidadP9']) || isset($_POST['fechaP9'])) {
        if (isset($_POST['idP9'])) {
            $id_producto9 = $_POST['idP9'];
            $producto9 = $_POST['pro9'];
            $cantidad_pro9 = $_POST['cantidadP9'];
            $fecha_pro9 = $_POST['fechaP9'];
            $upd9 = "UPDATE productoesperado SET productoE='$producto9', cantidad='$cantidad_pro9',fecha='$fecha_pro9', id_proyecto='$id_proyecto' WHERE id_Productoesperado ='$id_producto9'";
            $ubd9 = mysqli_query($conexion,$upd9);
        }
    }
    if (isset($_POST['pro10']) || isset($_POST['cantidadP10']) || isset($_POST['fechaP10'])) {
        if (isset($_POST['idP10'])) {
            $id_producto10 = $_POST['idP10'];
            $producto10 = $_POST['pro10'];
            $cantidad_pro10 = $_POST['cantidadP10'];
            $fecha_pro10 = $_POST['fechaP10'];
            $upd10 = "UPDATE productoesperado SET productoE='$producto10', cantidad='$cantidad_pro10',fecha='$fecha_pro10', id_proyecto='$id_proyecto' WHERE id_Productoesperado ='$id_producto10'";
            $ubd10 = mysqli_query($conexion,$upd10);
        }
    }
    if (isset($_POST['pror11']) || isset($_POST['cantidadP11']) || isset($_POST['fechaP11'])) {
        if (isset($_POST['idP3'])) {
            $id_producto11 = $_POST['idP11'];
            $producto11 = $_POST['pro11'];
            $cantidad_pro11 = $_POST['cantidadP11'];
            $fecha_pro11 = $_POST['fechaP11'];
            $upd11 = "UPDATE productoesperado SET productoE='$producto11', cantidad='$cantidad_pro11',fecha='$fecha_pro11', id_proyecto='$id_proyecto' WHERE id_Productoesperado ='$id_producto11'";
            $ubd11 = mysqli_query($conexion,$upd11);
        }
    }

}

?>