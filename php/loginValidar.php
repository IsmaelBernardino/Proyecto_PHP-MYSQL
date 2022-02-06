<?php

include "conexion.php";

if (isset($_POST['btninvestigador'])) {
    $clave = $_POST['claveProyecto'];
    $pass = $_POST['password'];
    $campos = array();
    if ($clave == "" || $pass == "") {
        array_push($campos, "Llene los campos vacios!");
    }else{
        if (strlen($clave) < 6 || strlen($clave) > 6) {
            array_push($campos, "La clave consta de solo 6 dígitos");
        }
        if (!is_numeric($clave)) {
            array_push($campos, "La clave solo son numeros");
        }
        if (strlen($pass) < 4 || strlen($pass) > 12) {
            array_push($campos, "La contraseña debe ser de 4 o 12 dígitos");
        }
        if (!ctype_alnum($pass)) {
            array_push($campos, "La contraseña solo consiste en letras y dígitos");
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
        $sql = "SELECT clave,contraseña FROM proyecto WHERE clave='$clave' AND contraseña='$pass'";
        $exe = mysqli_query($conexion,$sql);
        $filas = mysqli_num_rows($exe);
        if ($filas) {
            session_start();
            $_SESSION["sesion"] = $clave;
            header('Location: informe.php');
        }else echo '<div class="alert">
                        <img src="icon/close.svg" class="alert__close" onClick="alertClose();">
                        <div class="alert__msg">
                            <img src="icon/advertencia.svg" class="alert__img">
                            <p>Clave o Contraseña incorrecta!</p>
                        </div>
                    </div>';
    }
}

if (isset($_POST['btnadmin'])) {
    $usu = $_POST['usuario'];
    $usupass = $_POST['usuarioPass'];
    $campo = array();
    if ($usu == "" || $usupass == "") {
        array_push($campo, "Llene los campos vacios!");
    }else{
        if (strlen($usu) < 4 || strlen($usu) > 20) {
            array_push($campo, "El usuario debe ser de 4 a 20 caracteres");
        }
        if (strlen($usupass) < 4 || strlen($usupass) > 12) {
            array_push($campo, "La contraseña debe ser de 4 o 12 dígitos");
        }
        if (!ctype_alnum($usu)) {
            array_push($campo, "El usuario solo consiste en letras y dígitos");
        }
        if (!ctype_alnum($usupass)) {
            array_push($campo, "La contraseña solo consiste en letras y dígitos");
        }
    }
    if (count($campo) > 0) {
        echo "<div class='alert'><img src='icon/close.svg' class='alert__close' onClick='alertClose();'>";
        for ($i=0; $i < count($campo); $i++) { 
            echo "<div class='alert__msg'><img src='icon/advertencia.svg' class='alert__img'><p>".$campo[$i]."</p></div>";
        }
        echo "</div>";
        echo "<script>
        const alerta = document.querySelector('.alert');
        function alertClose() {
            alerta.style.display = 'none';
        }
        </script>";
    }else{
        $sql2 = "SELECT * FROM login WHERE usuario='$usu' AND contraseña='$usupass'";
        $exe2 = mysqli_query($conexion,$sql2);
        $filas2 = mysqli_num_rows($exe2);
        if ($filas2) {
            session_start();
            $_SESSION['admin'] = $usu;
            header('Location: revision.php');
        }else echo '<div class="alert">
                        <img src="icon/close.svg" class="alert__close" onClick="alertClose();">
                        <div class="alert__msg">
                            <img src="icon/advertencia.svg" class="alert__img">
                            <p>Usuario o Contraseña incorrecta!</p>
                        </div>
                    </div>';
    }
}

?>