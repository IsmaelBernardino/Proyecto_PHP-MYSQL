<?php

if (isset($_POST['btnProyecto'])) {
    // varables de input
    $fecha = $_POST['fechaElaboracion'];
    $nombreProyecto = $_POST['nombreProyecto'];
    $claveProyecto = $_POST['claveProyecto'];
    $password = $_POST['password'];
    $division = $_POST['division'];
    $fechaInicioProyecto = $_POST['fechainicio'];
    $objetivo = $_POST['objetivo'];
    $duracion = $_POST['duracion'];
    $instituciones = $_POST['instituciones'];
    $nombre1 = $_POST['nombre1'];
    $apellidoP1 = $_POST['apellidoP1'];
    $apellidoM1 = $_POST['apellidoM1'];
    $rol1 = $_POST['rol1'];
    $correo1 = $_POST['correo1'];
    $requerimiento = $_POST['requerimiento'];
    
    //arreglo que almacena los errores
    $campos = array();
    $validarCaracteres = "/^([a-z ñáéíóúÑÁÉÍÓÚ]{2,60})$/i";

    if (isset($_POST['tipo'])) {
        $tipoInvestigacion = $_POST['tipo'];
    }else $tipoInvestigacion = "";
    if (isset($_POST['sector'])) {
        $sector = $_POST['sector'];
    }else $sector = "";
    
    if ($password == "" || $fechaInicioProyecto == "" || $objetivo == "" || $duracion == "" ||
    $nombre1 == "" || $apellidoP1 == "" || $apellidoM1 == "" || $rol1 == "" || $correo1 == "" || $requerimiento == "") {
        array_push($campos, "Llene los campos vacios!");
    }else{
        if (!is_string($nombreProyecto)) {
            array_push($campos, "El nombre del proyecto solo son letras");
        }
        if (strlen($nombreProyecto) < 4) {
            array_push($campos, "El nombre del proyecto es demasiado corto");
        }
        if (!is_numeric($claveProyecto)) {
            array_push($campos, "La clave no son dígitos");
        }
        if (!ctype_alnum($password)){
            array_push($campos, "La contraseña solo consta de letras y dígitos");
        }
        if (strlen($password) < 4 || strlen($password) > 12) {
            array_push($campos, "La contraseña debe ser mayor de 4 y menor de 12 dígitos");
        }
        if ($division == "") {
            array_push($campos, "Seleccione una division");
        }
        if ($tipoInvestigacion == "") {
            array_push($campos, "Seleccione un tipo de investigacion");
        }
        if (!is_numeric($duracion)) {
            array_push($campos, "La duracion solo son dijitos");
        }
        if (!preg_match($validarCaracteres, $apellidoP1) ||
        !preg_match($validarCaracteres, $apellidoM1)) {
            array_push($campos, "El Nombre o Apellido del responsable es invalido");
        }
        if (!preg_match($validarCaracteres, $rol1)) {
            array_push($campos, "El rol del responsable es invalido");
        }
        if (!filter_var($correo1, FILTER_VALIDATE_EMAIL)) {
            array_push($campos, "El correo del responsable es invalido");
        }
        //-------------Cronograma-------
        $dir = "files/";//DIRECCION DE CARPETA
        $archivo = $dir . basename($_FILES['cronograma']['name']);//DIRECCION DE CARPETA CON NOMBRE DE ARCHIVO
        $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));//OBTIENE EL TIPO DE EXTENSION
        if ($_FILES['cronograma']['name'] != null) {
            if ($tipoArchivo != "pdf") {
                array_push($campos, "El archivo debe ser un pdf");
            }
            if (file_exists($archivo)) {
                array_push($campos,"Ya exsiste un archivo con ese nombre");
            }
        }
        if ($sector == "") {
            array_push($campos, "Seleccione un sector");
        }
    }
    // si se agrega mas usuarios
    if (isset($_POST['nombre2']) || isset($_POST['apellidoP2']) || isset($_POST['apellidoM2']) || isset($_POST['rol2']) || isset($_POST['correo2'])) {
        $nombre2 = $_POST['nombre2'];
        $apellidoP2 = $_POST['apellidoP2'];
        $apellidoM2 = $_POST['apellidoM2'];
        $rol2 = $_POST['rol2'];
        $correo2 = $_POST['correo2'];
        if ($nombre2 == "" || $apellidoP2 == "" || $apellidoM2 == "" || $rol2 == "" || $correo2 == "") {
            array_push($campos, "Llene los campos del segundo responsable");
        }
        if (!preg_match($validarCaracteres, $apellidoP2) ||
        !preg_match($validarCaracteres, $apellidoM2)) {
            array_push($campos, "El Nombre o Apellido del segundo responsable es invalido");
        }
        if (!preg_match($validarCaracteres, $rol2)) {
            array_push($campos, "El rol del segundo responsable es invalido");
        }
        if (!filter_var($correo2, FILTER_VALIDATE_EMAIL)) {
            array_push($campos, "El correo del segundo responsable es invalido");
        }
    }
    if (isset($_POST['nombre3']) || isset($_POST['apellidoP3']) || isset($_POST['apellidoM3']) || isset($_POST['rol3']) || isset($_POST['correo3'])) {
        $nombre3 = $_POST['nombre3'];
        $apellidoP3 = $_POST['apellidoP3'];
        $apellidoM3 = $_POST['apellidoM3'];
        $rol3 = $_POST['rol3'];
        $correo3 = $_POST['correo3'];
        if ($nombre3 == "" || $apellidoP3 == "" || $apellidoM3 == "" || $rol3 == "" || $correo3 == "") {
            array_push($campos, "Llene los campos del tercer responsable");
        }
        if (!preg_match($validarCaracteres, $apellidoP3) ||
        !preg_match($validarCaracteres, $apellidoM3)) {
            array_push($campos, "El Nombre o Apellido del responsable es invalido");
        }
        if (!preg_match($validarCaracteres, $rol3)) {
            array_push($campos, "El rol del responsable es invalido");
        }
        if (!filter_var($correo3, FILTER_VALIDATE_EMAIL)) {
            array_push($campos, "El correo del responsable es invalido");
        }
    }
    if (isset($_POST['nombre4']) || isset($_POST['apellidoP4']) || isset($_POST['apellidoM4']) || isset($_POST['rol4']) || isset($_POST['correo4'])) {
        $nombre4 = $_POST['nombre4'];
        $apellidoP4 = $_POST['apellidoP4'];
        $apellidoM4 = $_POST['apellidoM4'];
        $rol4 = $_POST['rol4'];
        $correo4 = $_POST['correo4'];
        if ($nombre4 == "" || $apellidoP4 == "" || $apellidoM4 == "" || $rol4 == "" || $correo4 == "") {
            array_push($campos, "Llene los campos del cuarto responsable");
        }
        if (!preg_match($validarCaracteres, $apellidoP4) ||
        !preg_match($validarCaracteres, $apellidoM4)) {
            array_push($campos, "El Nombre o Apellido del responsable es invalido");
        }
        if (!preg_match($validarCaracteres, $rol4)) {
            array_push($campos, "El rol del responsable es invalido");
        }
        if (!filter_var($correo4, FILTER_VALIDATE_EMAIL)) {
            array_push($campos, "El correo del responsable es invalido");
        }
    }
    if (isset($_POST['nombre5']) || isset($_POST['apellidoP5']) || isset($_POST['apellidoM5']) || isset($_POST['rol5']) || isset($_POST['correo5'])) {
        $nombre5 = $_POST['nombre5'];
        $apellidoP5 = $_POST['apellidoP5'];
        $apellidoM5 = $_POST['apellidoM5'];
        $rol5 = $_POST['rol5'];
        $correo5 = $_POST['correo5'];
        if ($nombre5 == "" || $apellidoP5 == "" || $apellidoM5 == "" || $rol5 == "" || $correo5 == "") {
            array_push($campos, "Llene los campos del quinto responsable");
        }
        if (!preg_match($validarCaracteres, $apellidoP5) ||
        !preg_match($validarCaracteres, $apellidoM5)) {
            array_push($campos, "El Nombre o Apellido del responsable es invalido");
        }
        if (!preg_match($validarCaracteres, $rol5)) {
            array_push($campos, "El rol del responsable es invalido");
        }
        if (!filter_var($correo5, FILTER_VALIDATE_EMAIL)) {
            array_push($campos, "El correo del responsable es invalido");
        }
    }
    if (isset($_POST['producto1']) || isset($_POST['Pcantidad1']) || isset($_POST['Pfecha1'])){
        $producto1 = $_POST['producto1'];
        $productoCantidad1 = $_POST['Pcantidad1'];
        $productoFecha1 = $_POST['Pfecha1'];
        if($productoCantidad1 == 0 && $productoFecha1 != ""){
            array_push($campos, "Complete los campos del producto Articulo indizados");
        }
        if($productoCantidad1 > 0 && $productoFecha1 == ""){
            array_push($campos, "Complete los campos del producto Articulo indizados");
        }
    }
    if (isset($_POST['producto2']) || isset($_POST['Pcantidad2']) || isset($_POST['Pfecha2'])){
        $producto2 = $_POST['producto2'];
        $productoCantidad2 = $_POST['Pcantidad2'];
        $productoFecha2 = $_POST['Pfecha2'];
        if($productoCantidad2 == 0 && $productoFecha2 != ""){
            array_push($campos, "Complete los campos del producto Articulo arbitrados");
        }
        if($productoCantidad2 > 0 && $productoFecha2 == ""){
            array_push($campos, "Complete los campos del producto Articulo arbitrados");
        }
    }
    if (isset($_POST['producto3']) || isset($_POST['Pcantidad3']) || isset($_POST['Pfecha3'])){
        $producto3 = $_POST['producto3'];
        $productoCantidad3 = $_POST['Pcantidad3'];
        $productoFecha3 = $_POST['Pfecha3'];
        if($productoCantidad3 == 0 && $productoFecha3 != ""){
            array_push($campos, "Complete los campos del producto Libro");
        }
        if($productoCantidad3 > 0 && $productoFecha3 == ""){
            array_push($campos, "Complete los campos del producto Libro");
        }
    }
    if (isset($_POST['producto4']) || isset($_POST['Pcantidad4']) || isset($_POST['Pfecha4'])){
        $producto4 = $_POST['producto4'];
        $productoCantidad4 = $_POST['Pcantidad4'];
        $productoFecha4 = $_POST['Pfecha4'];
        if($productoCantidad4 == 0 && $productoFecha4 != ""){
            array_push($campos, "Complete los campos del producto Capitulo del libro");
        }
        if($productoCantidad4 > 0 && $productoFecha4 == ""){
            array_push($campos, "Complete los campos del producto Capitulo del libro");
        }
    }
    if (isset($_POST['producto5']) || isset($_POST['Pcantidad5']) || isset($_POST['Pfecha5'])){
        $producto5 = $_POST['producto5'];
        $productoCantidad5 = $_POST['Pcantidad5'];
        $productoFecha5 = $_POST['Pfecha5'];
        if($productoCantidad5 == 0 && $productoFecha5 != ""){
            array_push($campos, "Complete los campos del producto Patentes/ modelo de utilidad/ Diseño industrial");
        }
        if($productoCantidad5 > 0 && $productoFecha5 == ""){
            array_push($campos, "Complete los campos del producto Patentes/ modelo de utilidad/ Diseño industrial");
        }
    }
    if (isset($_POST['producto6']) || isset($_POST['Pcantidad6']) || isset($_POST['Pfecha6'])){
        $producto6 = $_POST['producto6'];
        $productoCantidad6 = $_POST['Pcantidad6'];
        $productoFecha6 = $_POST['Pfecha6'];
        if($productoCantidad6 == 0 && $productoFecha6 != ""){
            array_push($campos, "Complete los campos del producto Transferencia tecnológica");
        }
        if($productoCantidad6 > 0 && $productoFecha6 == ""){
            array_push($campos, "Complete los campos del producto Transferencia tecnológica");
        }
    }
    if (isset($_POST['producto7']) || isset($_POST['Pcantidad7']) || isset($_POST['Pfecha7'])){
        $producto7 = $_POST['producto7'];
        $productoCantidad7 = $_POST['Pcantidad7'];
        $productoFecha7 = $_POST['Pfecha7'];
        if($productoCantidad7 == 0 && $productoFecha7 != ""){
            array_push($campos, "Complete los campos del producto Marcas simbolos ó imagenes utilizados en el comercio");
        }
        if($productoCantidad7 > 0 && $productoFecha7 == ""){
            array_push($campos, "Complete los campos del producto Marcas simbolos ó imagenes utilizados en el comercio");
        }
    }
    if (isset($_POST['producto8']) || isset($_POST['Pcantidad8']) || isset($_POST['Pfecha8'])){
        $producto8 = $_POST['producto8'];
        $productoCantidad8 = $_POST['Pcantidad8'];
        $productoFecha8 = $_POST['Pfecha8'];
        if($productoCantidad8 == 0 && $productoFecha8 != ""){
            array_push($campos, "Complete los campos del producto Prototipos");
        }
        if($productoCantidad8 > 0 && $productoFecha8 == ""){
            array_push($campos, "Complete los campos del producto Prototipos");
        }
    }
    if (isset($_POST['otroproducto1']) || isset($_POST['otrocantidad1']) || isset($_POST['otrofecha1'])){
        $otroproducto1 = $_POST['otroproducto1'];
        $otrocantidad1 = $_POST['otrocantidad1'];
        $otrofecha1 = $_POST['otrofecha1'];
        if($otroproducto1 == "" && $otrocantidad1 > 0 && $otrofecha1 != ""){//vacio,lleno,lleno
            array_push($campos, "Complete los campos de la primera fila de otros productos");
        }
        if($otroproducto1 != "" && $otrocantidad1 == 0 && $otrofecha1 != ""){//lleno,vacio,lleno
            array_push($campos, "Complete los campos de la primera fila de otros productos");
        }
        if($otroproducto1 != "" && $otrocantidad1 > 0 && $otrofecha1 == ""){//lleno,lleno,vacio
            array_push($campos, "Complete los campos de la primera fila de otros productos");
        }
        if($otroproducto1 == "" && $otrocantidad1 == 0 && $otrofecha1 != ""){//vacio,vacio,lleno
            array_push($campos, "Complete los campos de la primera fila de otros productos");
        }
        if($otroproducto1 != "" && $otrocantidad1 == 0 && $otrofecha1 == ""){//lleno,vacio,vacio
            array_push($campos, "Complete los campos de la primera fila de otros productos");
        }
        if($otroproducto1 == "" && $otrocantidad1 > 0 && $otrofecha1 == ""){//vacio,lleno,vacio
            array_push($campos, "Complete los campos de la primera fila de otros productos");
        }
    }
    if (isset($_POST['otroproducto2']) && isset($_POST['otrocantidad2']) && isset($_POST['otrofecha2'])){
        $otroproducto2 = $_POST['otroproducto2'];
        $otrocantidad2 = $_POST['otrocantidad2'];
        $otrofecha2 = $_POST['otrofecha2'];
        if($otroproducto2 == "" && $otrocantidad2 > 0 && $otrofecha2 != ""){//vacio,lleno,lleno
            array_push($campos, "Complete los campos de la segunda fila de otros productos");
        }
        if($otroproducto2 != "" && $otrocantidad2 == 0 && $otrofecha2 != ""){//lleno,vacio,lleno
            array_push($campos, "Complete los campos de la segunda fila de otros productos");
        }
        if($otroproducto2 != "" && $otrocantidad2 > 0 && $otrofecha2 == ""){//lleno,lleno,vacio
            array_push($campos, "Complete los campos de la segunda fila de otros productos");
        }
        if($otroproducto2 == "" && $otrocantidad2 == 0 && $otrofecha2 != ""){//vacio,vacio,lleno
            array_push($campos, "Complete los campos de la segunda fila de otros productos");
        }
        if($otroproducto2 != "" && $otrocantidad2 == 0 && $otrofecha2 == ""){//lleno,vacio,vacio
            array_push($campos, "Complete los campos de la segunda fila de otros productos");
        }
        if($otroproducto2 == "" && $otrocantidad2 > 0 && $otrofecha2 == ""){//vacio,lleno,vacio
            array_push($campos, "Complete los campos de la segunda fila de otros productos");
        }
    }
    if (isset($_POST['otroproducto3']) && isset($_POST['otrocantidad3']) && isset($_POST['otrofecha3'])){
        $otroproducto3 = $_POST['otroproducto3'];
        $otrocantidad3 = $_POST['otrocantidad3'];
        $otrofecha3 = $_POST['otrofecha3'];
        if($otroproducto3 == "" && $otrocantidad3 > 0 && $otrofecha3 != ""){//vacio,lleno,lleno
            array_push($campos, "Complete los campos de la primera fila de otros productos");
        }
        if($otroproducto3 != "" && $otrocantidad3 == 0 && $otrofecha3 != ""){//lleno,vacio,lleno
            array_push($campos, "Complete los campos de la primera fila de otros productos");
        }
        if($otroproducto3 != "" && $otrocantidad3 > 0 && $otrofecha3 == ""){//lleno,lleno,vacio
            array_push($campos, "Complete los campos de la primera fila de otros productos");
        }
        if($otroproducto3 == "" && $otrocantidad3 == 0 && $otrofecha3 != ""){//vacio,vacio,lleno
            array_push($campos, "Complete los campos de la primera fila de otros productos");
        }
        if($otroproducto3 != "" && $otrocantidad3 == 0 && $otrofecha3 == ""){//lleno,vacio,vacio
            array_push($campos, "Complete los campos de la primera fila de otros productos");
        }
        if($otroproducto3 == "" && $otrocantidad3 > 0 && $otrofecha3 == ""){//vacio,lleno,vacio
            array_push($campos, "Complete los campos de la primera fila de otros productos");
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
        $tiempo = $duracion." month";
        $fechafinaproyecto = date("Y-m-d",strtotime($fechaInicioProyecto."+".$tiempo));
        $errorbd = array();
        // !CONSULTAS
        $sql1 = "INSERT INTO proyecto (id_proyecto,fecha,nombre,clave,contraseña,fechainicioproyecto,fechafinalproyecto,objetivo,duracion,
        instituciones,requerimiento,cronograma,id_division,id_tipoinvestigacion,id_sector) VALUES (null,'$fecha',
        '$nombreProyecto','$claveProyecto','$password','$fechaInicioProyecto','$fechafinaproyecto','$objetivo','$duracion','$instituciones',
        '$requerimiento','$archivo','$division','$tipoInvestigacion','$sector')";
        $bd1 = mysqli_query($conexion, $sql1);
        if (!$bd1) {
            array_push($errorbd, "Error al registrar el proyecto");
        }else{
            if ($_FILES['cronograma']['name'] != null) {
                if (!move_uploaded_file($_FILES['cronograma']['tmp_name'], $archivo)) {
                    array_push($errorbd, "Error al subir el cronograma");
                }
            }
        }
        
        $id = "SELECT id_proyecto FROM proyecto WHERE clave = '$claveProyecto'";
        $res = mysqli_query($conexion, $id);
        $row = mysqli_fetch_row($res);
        if (!$row) {
            array_push($errorbd, "Error al obtener la clave");
        }
        
        // !primer responsable
        $sql2 = "INSERT INTO responsables (id_responsable,nombre_res,apePa,apeMa,rol,correo,id_proyecto) VALUES (null,'$nombre1','$apellidoP1','$apellidoM1','$rol1','$correo1','$row[0]')";
        $bd2 = mysqli_query($conexion, $sql2);
        if(!$bd2){
            array_push($errorbd, "Error al registrar el primer responsable");
        }

        // !segundo responsable
        if (isset($_POST['nombre2']) && isset($_POST['apellidoP2']) && isset($_POST['apellidoM2']) && isset($_POST['rol2']) 
        && isset($_POST['correo2'])){
            $sql3 = "INSERT INTO responsables (id_responsable,nombre_res,apePa,apeMa,rol,correo,id_proyecto) VALUES (null,'$nombre2','$apellidoP2','$apellidoM2','$rol2','$correo2','$row[0]')";
            $bd3 = mysqli_query($conexion, $sql3);
            if(!$bd3){
                array_push($errorbd, "Error al registrar el segundo responsable");
            }
        }
        // !tercer responsable
        if (isset($_POST['nombre3']) && isset($_POST['apellidoP3']) && isset($_POST['apellidoM3']) && isset($_POST['rol3']) && isset($_POST['correo3'])){
            $sql4 = "INSERT INTO responsables (id_responsable,nombre_res,apePa,apeMa,rol,correo,id_proyecto) VALUES (null,'$nombre3','$apellidoP3','$apellidoM3','$rol3','$correo3','$row[0]')";
            $bd4 = mysqli_query($conexion, $sql4);
            if(!$bd4){
                array_push($errorbd, "Error al registrar el tercer responsable");
            }
        }
        // !cuarto responsable
        if (isset($_POST['nombre4']) && isset($_POST['apellidoP4']) && isset($_POST['apellidoM4']) && isset($_POST['rol4']) && 
        isset($_POST['correo4'])){
        $sql5 = "INSERT INTO responsables (id_responsable,nombre_res,apePa,apeMa,rol,correo,id_proyecto) VALUES (null,'$nombre4','$apellidoP4','$apellidoM4','$rol4','$correo4','$row[0]')";
        $bd5 = mysqli_query($conexion, $sql5);
            if(!$bd5){
                array_push($errorbd, "Error al registrar el cuarto responsable");
            }
        }
        // !quinto responsable
        if (isset($_POST['nombre5']) && isset($_POST['apellidoP5']) && isset($_POST['apellidoM5']) && isset($_POST['rol5']) && 
        isset($_POST['correo5'])){
            $sql6 = "INSERT INTO responsables (id_responsable,nombre_res,apePa,apeMa,rol,correo,id_proyecto) VALUES (null,'$nombre5','$apellidoP5','$apellidoM5','$rol5','$correo5','$row[0]')";
            $bd6 = mysqli_query($conexion, $sql6);
            if(!$bd6){
                array_push($errorbd, "Error al registrar el quinto responsable");
            }
        }
        //!VALIDACIÓN DEL PRODUCTO 1
        if (isset($_POST['producto1']) || isset($_POST['Pcantidad1']) || isset($_POST['Pfecha1'])){
            if($productoCantidad1 > 0 && $productoFecha1 != ""){
                array_push($campos, "Complete los campos del producto Articulo indizados");
                $sql7 = "INSERT INTO productoesperado (id_Productoesperado,productoE,cantidad,fecha,id_proyecto) VALUES (null,'$producto1','$productoCantidad1','$productoFecha1','$row[0]')";
                $bd7 = mysqli_query($conexion, $sql7);
                if(!$bd7){
                    array_push($errorbd, "Error al subir el producto Articulo indizados");
                }
            }
        }
        //!VALIDACIÓN DEL PRODUCTO 2
        if (isset($_POST['producto2']) || isset($_POST['Pcantidad2']) || isset($_POST['Pfecha2'])){
            if($productoCantidad2 > 0 && $productoFecha2 != ""){
                $sql8 = "INSERT INTO productoesperado (id_Productoesperado,productoE,cantidad,fecha,id_proyecto) VALUES (null,'$producto2','$productoCantidad2','$productoFecha2','$row[0]')";
                $bd8 = mysqli_query($conexion, $sql8);
                if(!$bd8){
                    array_push($errorbd, "Error al subir el producto Articulos arbitrados");
                }
            }
        }
        //!VALIDACIÓN DEL PRODUCTO 3
        if (isset($_POST['producto3']) || isset($_POST['Pcantidad3']) || isset($_POST['Pfecha3'])){
            if($productoCantidad3 > 0 && $productoFecha3 != ""){
                $sql9 = "INSERT INTO productoesperado (id_Productoesperado,productoE,cantidad,fecha,id_proyecto) VALUES (null,'$producto3','$productoCantidad3','$productoFecha3','$row[0]')";
                $bd9 = mysqli_query($conexion, $sql9);
                if(!$bd9){
                    array_push($errorbd, "Error al subir el producto Libro");
                }
            }
        }
        //!VALIDACIÓN DEL PRODUCTO 4
        if (isset($_POST['producto4']) || isset($_POST['Pcantidad4']) || isset($_POST['Pfecha4'])){
            if($productoCantidad4 > 0 && $productoFecha4 != ""){
                $sql10 = "INSERT INTO productoesperado (id_Productoesperado,productoE,cantidad,fecha,id_proyecto) VALUES (null,'$producto4','$productoCantidad4','$productoFecha4','$row[0]')";
                $bd10 = mysqli_query($conexion, $sql10);
                if(!$bd10){
                    array_push($errorbd, "Error al subir el producto Capitulo del libro");
                }
            }
        }
        //!VALIDACIÓN DEL PRODUCTO 5
        if (isset($_POST['producto5']) || isset($_POST['Pcantidad5']) || isset($_POST['Pfecha5'])){
            if($productoCantidad5 > 0 && $productoFecha5 != ""){
                $sql11 = "INSERT INTO productoesperado (id_Productoesperado,productoE,cantidad,fecha,id_proyecto) VALUES (null,'$producto5','$productoCantidad5','$productoFecha5','$row[0]')";
                $bd11 = mysqli_query($conexion, $sql11);
                if(!$bd11){
                    array_push($errorbd, "Error al subir el producto Patentes/ modelo de utilidad/ Diseño industrial");
                }
            }
        }
        //!VALIDACIÓN DEL PRODUCTO 6
        if (isset($_POST['producto6']) || isset($_POST['Pcantidad6']) || isset($_POST['Pfecha6'])){
            if($productoCantidad6 > 0 && $productoFecha6 != ""){
                $sql12 = "INSERT INTO productoesperado (id_Productoesperado,productoE,cantidad,fecha,id_proyecto) VALUES (null,'$producto6','$productoCantidad6','$productoFecha6','$row[0]')";
                $bd12 = mysqli_query($conexion, $sql12);
                if(!$bd12){
                    array_push($errorbd, "Error al subir el producto Transferencia tecnológica");
                }
            }
        }
        //!VALIDACIÓN DEL PRODUCTO 7
        if (isset($_POST['producto7']) || isset($_POST['Pcantidad7']) || isset($_POST['Pfecha7'])){
            if($productoCantidad7 > 0 && $productoFecha7 != ""){
                $sql13 = "INSERT INTO productoesperado (id_Productoesperado,productoE,cantidad,fecha,id_proyecto) VALUES (null,'$producto7','$productoCantidad7','$productoFecha7','$row[0]')";
                $bd13 = mysqli_query($conexion, $sql13);
                if(!$bd13){
                    array_push($errorbd, "Error al subir el producto Marcas simbolos ó imagenes utilizados en el comercio");
                }
            }
        }
        //!VALIDACIÓN DEL PRODUCTO 8
        if (isset($_POST['producto8']) || isset($_POST['Pcantidad8']) || isset($_POST['Pfecha8'])){
            if($productoCantidad8 > 0 && $productoFecha8 != ""){
                $sql14 = "INSERT INTO productoesperado (id_Productoesperado,productoE,cantidad,fecha,id_proyecto) VALUES (null,'$producto8','$productoCantidad8','$productoFecha8','$row[0]')";
                $bd14 = mysqli_query($conexion, $sql14);
                if(!$bd14){
                    array_push($errorbd, "Error al subir el producto Prototipos");
                }
            }
        }
        //!VALIDACIÓN DE OTROS PRODUCTOS 1
        if (isset($otroproducto1) || isset($otrocantidad1) || isset($otrofecha1)){
            if($otroproducto1 != "" && $otrocantidad1 > 0 && $otrofecha1 != ""){
                $sql15 = "INSERT INTO productoesperado (id_Productoesperado,productoE,cantidad,fecha,id_proyecto) VALUES (null,'$otroproducto1','$otrocantidad1','$otrofecha1','$row[0]')";
                $bd15 = mysqli_query($conexion, $sql15);
                if(!$bd15){
                    array_push($errorbd, "Error al subir otro producto");
                }
            }
        }
        //!VALIDACIÓN DE OTROS PRODUCTOS 2
        if (isset($_POST['otroproducto2']) || isset($_POST['otrocantidad2']) || isset($_POST['otrofecha2'])){
            if($otroproducto2 != "" && $otrocantidad2 > 0 && $otrofecha2 != ""){
                $sql16 = "INSERT INTO productoesperado (id_Productoesperado,productoE,cantidad,fecha,id_proyecto) VALUES (null,'$otroproducto2','$otrocantidad2','$otrofecha2','$row[0]')";
                $bd16 = mysqli_query($conexion, $sql16);
                if(!$bd16){
                    array_push($errorbd, "Error al subir otro producto");
                }
            }
        }
        //!VALIDACIÓN DE OTROS PRODUCTOS 3
        if (isset($_POST['otroproducto3']) || isset($_POST['otrocantidad3']) || isset($_POST['otrofecha3'])){
            if($otroproducto3 != "" && $otrocantidad3 > 0 && $otrofecha3 != ""){
                $sql17 = "INSERT INTO productoesperado (id_Productoesperado,productoE,cantidad,fecha,id_proyecto) VALUES (null,'$otroproducto3','$otrocantidad3','$otrofecha3','$row[0]')";
                $bd17 = mysqli_query($conexion, $sql17);
                if(!$bd17){
                    array_push($errorbd, "Error al subir otro producto");
                }
            }
        }
        $sql18 = "INSERT INTO revision (id_revision, id_proyecto, lineaInvestigacion, proyecto, campoFormacion, terminados, presupuestoSolicitado, presupuestoAsignado, fechaAsignacion, fuenteFinanciamiento, totalProfesor, totalEstudiante, vigente, egoraciones, articuloPublicado, ponencia, tesisElaborada, patentado, sectorDestinatario, resultadoAlcanzado, registradoTecNM, registradoOtro, proyectoFinanciado, proyectoTecnologia, proyectoRed) VALUES (null,'$row[0]',' ',' ',' ',' ',' ',' ','0000-00-00',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ')";
        $bd18 = mysqli_query($conexion, $sql18);
        if (!$bd18) {
            echo "<script>alert('error en insertar a revision')</script>";
        }
        
        //fin de las consultas y cierre de conexion------------------
        if (count($errorbd) == 0) {
            mysqli_close($conexion);
            echo '<div class="modal">
                <div class="cajaModal">
                    <img src="icon/close.svg" class="cajaModal__img" onClick="cerrar();">
                    <p class="cajaModal__texto">Proyecto Enviado!</p>
                    <p class="clave">CLAVE: '. $claveProyecto .'</p>
                </div>
            </div>';
            echo "<script>
            function cerrar() {
                window.location.href = 'login.php';
            }</script>";
        }else {
            echo "<div class='   red_alert'><img src='icon/close.svg' class='alert__close' onClick='alertClose();'>";
            for ($j=0; $j < count($errorbd); $j++) { 
                echo "<div class='alert__msg'>
                        <img src='icon/advertencia.svg' class='alert__img red_img'>
                        <p>".$errorbd[$j]."</p>
                    </div>";
            }
            echo "</div>";
            echo "<script>
            const alerta = document.querySelector('.alert');
            function alertClose() {
                alerta.style.display = 'none';
            }</script>";
        }
    }
}

?>