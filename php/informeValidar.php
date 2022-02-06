<?php

include "php/conexion.php";
if (isset($_POST['btnenviar'])) {
    $fechaElaboracion = $_POST['fechaElaboracion'];
    $clave = $_POST['clave'];
    $nombre = $_POST['nombre'];
    $informe = $_POST['informe'];
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFin = $_POST['fechaFin'];
    $resumen = $_POST['resumen'];
    $seguimiento = $_POST['seguimiento'];
    $fechaCronograma = $_POST['fechaCronograma'];
    $impacto = $_POST['impacto'];
    $observacion = $_POST['observacion'];
    $Razon = $_POST['razon'];
    
    //arreglo que almacenara errores
    $campos = array();
    
    if (isset($_POST['cierre'])) {
        $cierre = $_POST['cierre'];
    }else $cierre = "";

    if ($informe == "" || $fechaInicio == "" || $fechaFin == "" || $resumen == "" || $seguimiento == "" || $fechaCronograma == "" ||
    $impacto == "") {
        array_push($campos,'Llene los campos vacios!');
    }else {
        if (!is_numeric($informe)) {
            array_push($campos, "En el informe solo son numeros");
        }
        if ($cierre == "") {
            array_push($campos,'Seleccione si cierra el proyecto o no.');
        }
        if ($cierre == "Si" && $Razon ==""){
            array_push($campos, "Favor de indicar la razon del cierre del proyecto");
        }
    }
    if (isset($_POST['producto1']) || isset($_POST['cantidad1']) || isset($_POST['fecha1'])){
        $producto1 = $_POST['producto1'];
        $cantidad1 = $_POST['cantidad1'];
        $fecha1 = $_POST['fecha1'];
        if($cantidad1 == 0 && $fecha1 != ""){
            array_push($campos, "Complete los campos del producto Articulo indizados");
        }
        if($cantidad1 > 0 && $fecha1 == ""){
            array_push($campos, "Complete los campos del producto Articulo indizados");
        }
    }
    if (isset($_POST['producto2']) || isset($_POST['cantidad2']) || isset($_POST['fecha2'])){
        $producto2 = $_POST['producto2'];
        $cantidad2 = $_POST['cantidad2'];
        $fecha2 = $_POST['fecha2'];
        if($cantidad2 == 0 && $fecha2 != ""){
            array_push($campos, "Complete los campos del producto Articulo arbitrado");
        }
        if($cantidad2 > 0 && $fecha2 == ""){
            array_push($campos, "Complete los campos del producto Articulo arbitrado");
        }
    }
    if (isset($_POST['producto3']) || isset($_POST['cantidad3']) || isset($_POST['fecha3'])){
        $producto3 = $_POST['producto3'];
        $cantidad3 = $_POST['cantidad3'];
        $fecha3 = $_POST['fecha3'];
        if($producto3 == "" && $cantidad3 > 0 && $fecha3 != ""){//vacio,lleno,lleno
            array_push($campos, "Complete los campos de la primera fila de otros productos");
        }
        if($producto3 != "" && $cantidad3 == 0 && $fecha3 != ""){//lleno,vacio,lleno
            array_push($campos, "Complete los campos de la primera fila de otros productos");
        }
        if($producto3 != "" && $cantidad3 > 0 && $fecha3 == ""){//lleno,lleno,vacio
            array_push($campos, "Complete los campos de la primera fila de otros productos");
        }
        if($producto3 == "" && $cantidad3 == 0 && $fecha3 != ""){//vacio,vacio,lleno
            array_push($campos, "Complete los campos de la primera fila de otros productos");
        }
        if($producto3 != "" && $cantidad3 == 0 && $fecha3 == ""){//lleno,vacio,vacio
            array_push($campos, "Complete los campos de la primera fila de otros productos");
        }
        if($producto3 == "" && $cantidad3 > 0 && $fecha3 == ""){//vacio,lleno,vacio
            array_push($campos, "Complete los campos de la primera fila de otros productos");
        }
    }
    if (isset($_POST['producto4']) || isset($_POST['cantidad4']) || isset($_POST['fecha4'])){
        $producto4 = $_POST['producto4'];
        $cantidad4 = $_POST['cantidad4'];
        $fecha4 = $_POST['fecha4'];
        if($producto4 == "" && $cantidad4 > 0 && $fecha4 != ""){//vacio,lleno,lleno
            array_push($campos, "Complete los campos de la segunda fila de otros productos");
        }
        if($producto4 != "" && $cantidad4 == 0 && $fecha4 != ""){//lleno,vacio,lleno
            array_push($campos, "Complete los campos de la segunda fila de otros productos");
        }
        if($producto4 != "" && $cantidad4 > 0 && $fecha4 == ""){//lleno,lleno,vacio
            array_push($campos, "Complete los campos de la segunda fila de otros productos");
        }
        if($producto4 == "" && $cantidad4 == 0 && $fecha4 != ""){//vacio,vacio,lleno
            array_push($campos, "Complete los campos de la segunda fila de otros productos");
        }
        if($producto4 != "" && $cantidad4 == 0 && $fecha4 == ""){//lleno,vacio,vacio
            array_push($campos, "Complete los campos de la segunda fila de otros productos");
        }
        if($producto4 == "" && $cantidad4 > 0 && $fecha4 == ""){//vacio,lleno,vacio
            array_push($campos, "Complete los campos de la segunda fila de otros productos");
        }
    }
    if (count($campos) > 0) {
        echo "<div class='alert'><img src='icon/close.svg' class='alert__close' onClick='alertClose();'>";
        for ($i=0; $i < count($campos); $i++) { 
            echo "<div class='alert__msg'><img src='icon/advertencia.svg' class='alert__img'><p>".$campos[$i]."</p></div>";
        }
        echo "</div>";
        echo "<script>
        const alerta = document.querySelector('.alert');
        function alertClose() {
            alerta.style.display = 'none';
        }
        </script>";
    }else{
        include "php/conexion.php";

        $idProyecto = $_POST['idProyecto'];

        if (isset($_POST['id2']) && isset($_POST['nom2']) && isset($_POST['aP2']) && isset($_POST['aM2']) &&
        isset($_POST['r2']) && isset($_POST['c2'])) {
            $id2 = $_POST['id2'];
            $nombre2 = $_POST['nom2'];
            $apellidoP2 = $_POST['aP2'];
            $apellidoM2 = $_POST['aM2'];
            $rol2 = $_POST['r2'];
            $correo2 = $_POST['c2'];
            $update2 = "UPDATE responsables SET nombre_res = '$nombre2', apePa = '$apellidoP2', apeMa = '$apellidoM2', rol = '$rol2', 
            correo = '$correo2' WHERE id_responsable = '$id2'";
            $res2 = mysqli_query($conexion, $update2);
        }

        if (isset($_POST['id3']) && isset($_POST['nom3']) && isset($_POST['aP3']) && isset($_POST['aM3']) &&
        isset($_POST['r3']) && isset($_POST['c3'])) {
            $id3 = $_POST['id3'];
            $nombre3 = $_POST['nom3'];
            $apellidoP3 = $_POST['aP3'];
            $apellidoM3 = $_POST['aM3'];
            $rol3 = $_POST['r3'];
            $correo3 = $_POST['c3'];
            $update3 = "UPDATE responsables SET nombre_res = '$nombre3', apePa = '$apellidoP3', apeMa = '$apellidoM3', rol = '$rol3', correo = '$correo3' WHERE id_responsable = '$id3'";
            $res3 = mysqli_query($conexion, $update3);
        }
        if (isset($_POST['id4']) && isset($_POST['nom4']) && isset($_POST['aP4']) && isset($_POST['aM4']) &&
        isset($_POST['r4']) && isset($_POST['c4'])) {
            $id4 = $_POST['id4'];
            $nombre4 = $_POST['nom4'];
            $apellidoP4 = $_POST['aP4'];
            $apellidoM4 = $_POST['aM4'];
            $rol4 = $_POST['r4'];
            $correo4 = $_POST['c4'];
            $update4 = "UPDATE responsables SET nombre_res = '$nombre4', apePa = '$apellidoP4', apeMa = '$apellidoM4', rol = '$rol4', 
            correo = '$correo4' WHERE id_responsable = '$id4'";
            $res4 = mysqli_query($conexion, $update4);
        }
        if (isset($_POST['id5']) && isset($_POST['nom5']) && isset($_POST['aP5']) && isset($_POST['aM5']) &&
        isset($_POST['r5']) && isset($_POST['c5'])) {
            $id5 = $_POST['id5'];
            $nombre5 = $_POST['nom5'];
            $apellidoP5 = $_POST['aP5'];
            $apellidoM5 = $_POST['aM5'];
            $rol5 = $_POST['r5'];
            $correo5 = $_POST['c5'];
            $update5 = "UPDATE responsables SET nombre_res = '$nombre5', apePa = '$apellidoP5', apeMa = '$apellidoM5', rol = '$rol5', 
            correo = '$correo5' WHERE id_responsable = '$id5'";
            $res2 = mysqli_query($conexion, $update5);
        }
        
        $sql = "SELECT id_proyecto FROM proyecto WHERE clave = '$clave'";
        $exesql = mysqli_query($conexion,$sql);
        $row = mysqli_fetch_row($exesql);

        $sql1 = "INSERT INTO cierreproyecto(id_cierreproyecto,opcion,razon,id_proyecto) VALUES (null,'$cierre','$Razon','$row[0]')";
        $bd1 = mysqli_query($conexion, $sql1);

        $id = "SELECT max(id_cierreproyecto) FROM cierreproyecto WHERE id_proyecto = '$row[0]'";
        $bd = mysqli_query($conexion,$id);
        $idP = mysqli_fetch_row($bd);
        
        $sql2 = "INSERT INTO informe(id_informe,fecha,id_proyecto,numeroinforme,inicioinforme,
        fininforme,resumen,segumientocronograma,fechacronograma,impacto,observaciones,id_cierreproyecto) 
        VALUES (null,'$fechaElaboracion','$row[0]','$informe','$fechaInicio','$fechaFin','$resumen',
        '$seguimiento','$fechaCronograma','$impacto','$observacion','$idP[0]')";
        $bd2 = mysqli_query($conexion,$sql2);

        $consulta = "SELECT id_informe FROM informe WHERE id_proyecto = '$row[0]'";
        $res = mysqli_query($conexion, $consulta);
        $fila = mysqli_fetch_row($res);

        if (isset($_POST['producto1']) || isset($_POST['cantidad1']) || isset($_POST['fecha1'])){
            if($producto1 != "" && $cantidad1 > 0 && $fecha1 != ""){
                $sql3 = "INSERT INTO productoobtenido (id_productoobtenido,producto,cantidad,fecha,id_informe) VALUES (null,'$producto1','$cantidad1','$fecha1','$fila[0]')";
                $bd3 = mysqli_query($conexion, $sql3);
            }
        }
        if (isset($_POST['producto2']) || isset($_POST['cantidad2']) || isset($_POST['fecha2'])){
            if($producto2 != "" && $cantidad2 > 0 && $fecha2 != ""){
                $sql4 = "INSERT INTO productoobtenido (id_productoobtenido,producto,cantidad,fecha,id_informe) VALUES (null,'$producto2','$cantidad2','$fecha2','$fila[0]')";
                $bd4 = mysqli_query($conexion, $sql4);
            }
        }
        if (isset($_POST['producto3']) || isset($_POST['cantidad3']) || isset($_POST['fecha3'])){
            if($producto3 != "" && $cantidad3 > 0 && $fecha3 != ""){
                $sql5 = "INSERT INTO productoobtenido (id_productoobtenido,producto,cantidad,fecha,id_informe) VALUES (null,'$producto3','$cantidad3','$fecha3','$fila[0]')";
                $bd5 = mysqli_query($conexion, $sql5);
            }
        }
        if (isset($_POST['producto4']) || isset($_POST['cantidad4']) || isset($_POST['fecha4'])){
            if($producto4 != "" && $cantidad4 > 0 && $fecha4 != ""){
                $sql6 = "INSERT INTO productoobtenido (id_productoobtenido,producto,cantidad,fecha,id_informe) VALUES (null,'$producto4','$cantidad4','$fecha4','$fila[0]')";
                $bd6 = mysqli_query($conexion, $sql6);
            }
        }
    
        //fin de las consultas------------------
        mysqli_close($conexion);
        echo '
        <div class="modal">
            <div class="cajaModal">
                <img src="icon/close.svg" class="cajaModal__img" onClick="cerrar();">
                <p class="cajaModal__texto">Informe Enviado!</p>
            </div>
        </div>';
        echo "<script>
            function cerrar() {
                window.location.href = 'login.php';
            }</script>";
    }
}

?>