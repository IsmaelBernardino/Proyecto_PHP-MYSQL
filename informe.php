<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFORME</title>
    <link rel="shortcut icon" href="icon/investigacion.png">
    <link rel="stylesheet" href="css/informe.css">
    <link rel="stylesheet" href="css/alert.css">
    <link rel="stylesheet" href="css/llenado.css">
</head>
<?php 
    include "php/conexion.php";
    session_start();
    if (!isset($_SESSION["sesion"])) {
        header('Location: login.php');
    }else{
        $clave = $_SESSION['sesion'];
        $sql = "SELECT *FROM proyecto WHERE clave = '$clave'";
        $exesql = mysqli_query($conexion,$sql);
        $row = mysqli_fetch_row($exesql);

        //consulta si ya finalizo el proyecto
        $consulta = "SELECT opcion FROM cierreproyecto WHERE id_proyecto = '$row[0]' AND opcion = 'Si'";
        $res = mysqli_query($conexion, $consulta);
        $fila = mysqli_num_rows($res);
        if ($fila == 1) {
            echo'<div class="modalFin">
                    <div class="modalFin_caja">
                        <p class="modalFin__texto">Ya haz indicado anteriormente que finalizaste el proyecto</p>
                    </div>
                </div>';
            echo "<script>
                function redireccionar(){
                    window.location.href = 'login.php';
                  } 
                  setTimeout ('redireccionar()', 4000);
                </script>";
        }

        $sql2 = "SELECT * FROM informe WHERE id_proyecto = '$row[0]'";
        if ($result=mysqli_query($conexion,$sql2)) {
            $rowcount=mysqli_num_rows($result);
            $totalRow = $rowcount + 1;
        }
    }
    include "php/informeValidar.php";
    ?>
<body>
    <div class="container">
        <a href="php/cerrarSesion.php" class="linkicono"><img src="icon/salir.svg" class="iconoSalir"></a>
        <div class="header">Proyecto de investigación tesjo</div>
        <span class="requerido">(*) Campos requeridos</span>
        <div class="form-outer">
            <form action="informe.php" method="post" class="form" id="formulario">
            <!-- producto de investigacion -->
            <?php include "php/actualizarInforme.php" ?>
                <div class="page" id="page1">
                    <div class="page__input">
                        <label style="text-align: center;">Cambios en el proyecto</label>
                    </div>
                    <div class="view">
                        <?php include "php/informeActualizar.php" ?>
                    </div>
                    <div class="btn">
                        <button class="page__btn" type="submit" name="btnactualizar" id="btnactualizar">Actualizar</button>
                        <a href="#page2" class="page__btn page1">Siguiente</a>
                    </div>
                </div>
    <!-- alta de proyecto -->
    <?php
    $sql = "SELECT *FROM proyecto WHERE clave = '$clave'";
    $exesql = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_row($exesql);
    ?>
                <div class="page" id="page2">
                    <div class="page__input">
                    <label>Fecha de elaboracion: <span class="txtdefecto"><?php 
                        $fecha = date("d")."/".date("m")."/".date("Y");
                        echo $fecha;
                        ?></span></label>
                        <input type="date" value="<?php echo date('Y-m-d'); ?>" style="display:none" name="fechaElaboracion">
                    </div>
                    <div class="page__input">
                        <label>Nombre del proyecto: <span class="txtdefecto">
                            <?php if (isset($row[2])) {
                            echo $row[2];
                            } ?></span></label>
                        <input type="text" value="<?php echo $row[2] ?>" name="nombre" style="display:none">
                    </div>
                    <div class="page__input">
                        <label>Clave del proyecto: <span class="txtdefecto">
                            <?php if (isset($row[3])) {
                                echo $row[3];
                                } ?></span></label>
                        <input type="text" value="<?php echo $row[3] ?>" name="clave" style="display:none">
                    </div>
                    <div class="page__input">
                        <label>Informe numero: <span class="txtdefecto"><?php echo $totalRow; ?></span></label>
                        <input type="hidden" min="1" max="50" name="informe" value="<?php echo $totalRow; ?>">
                    </div>
                    <div class="page__input">
                        <label><span class="requerido">* </span>Del:</label>
                        <input type="date" name="fechaInicio">
                    </div>
                    <div class="page__input">
                        <label><span class="requerido">* </span>Al:</label>
                        <input type="date" name="fechaFin">
                    </div>
                    <div class="btn">
                        <a href="#page1" class="page__btn">Anterior</a>
                        <a href="#page3" class="page__btn">Siguiente</a>
                    </div>
                </div>
    <!-- linea de investigacion -->
                <div class="page" id="page3">
                    <div class="page__input">
                        <label class="tema"><span class="requerido">* </span>Resumen de las actividades realizadas en el periodo</label>
                        <textarea class="input__textarea" placeholder="Resumen" name="resumen"></textarea>
                    </div>
                    <label class="tema">Productos de investigacion obtenidos</label>
                    <table>
                        <tr>
                            <th>Producto (TecNM)</th>
                            <th>Cantidad</th>
                            <th>Fecha de obtencion</th>
                        </tr>
                        <tr>
                            <td>Articulo indizados<input type="text" value="Articulo indizados" name="producto1" hidden></td>
                            <td><input type="number" min="0" max="10" value="0" name="cantidad1"></td>
                            <td><input type="date" name="fecha1"></td>
                        </tr>
                        <tr>
                            <td>Articulo arbitrado<input type="text" value="Articulo arbitrado" name="producto2" hidden></td>
                            <td><input type="number" min="0" max="10" value="0" name="cantidad2"></td>
                            <td><input type="date" name="fecha2"></td>
                        </tr>
                        <tr>
                            <th>Otros</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="producto3"></td>
                            <td><input type="number" min="0" max="10" value="0" name="cantidad3"></td>
                            <td><input type="date" name="fecha3"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="producto4"></td>
                            <td><input type="number" min="0" max="10" value="0" name="cantidad4"></td>
                            <td><input type="date" name="fecha4"></td>
                        </tr>
                    </table>
                    <div class="btn">
                        <a href="#page2" class="page__btn">Anterior</a>
                        <a href="#page4" class="page__btn">Siguiente</a>
                    </div>
                </div>
    <!-- ingreso de usuarios -->
                <div class="page" id="page4">
                    <div class="page__input">
                        <label><span class="requerido">* </span>Seguimiento del cronograma</label>
                        <textarea class="input__textarea" placeholder="Anotar Actividad" name="seguimiento"></textarea>
                    </div>
                    <div class="page__input">
                        <label><span class="requerido">* </span>Fecha de realizacion</label>
                        <input type="date" name="fechaCronograma">
                    </div>
                    <div class="btn">
                        <a href="#page3" class="page__btn">Anterior</a>
                        <a href="#page5" class="page__btn">Siguiente</a>
                    </div>
                </div>
    <!-- requerimiento del proyecto -->
                <div class="page" id="page5">
                    <div class="page__input">
                        <label><span class="requerido">* </span>Impacto generado por el proyecto en el periodo</label><br>
                        <textarea class="input__textarea" placeholder="Anotar impacto" name="impacto"></textarea>
                    </div>
                    <div class="btn">
                        <a href="#page4" class="page__btn">Anterior</a>
                        <a href="#page6" class="page__btn">Siguiente</a>
                    </div>
                </div>
    <!-- cronograma -->
                <div class="page" id="page6">
                    <div class="page__input">
                        <label>Observaciones</label>
                        <textarea class="input__textarea" placeholder="observacion" name="observacion"></textarea>
                    </div>
                    <div class="page__input radio">
                        <label><span class="requerido">* </span>Cierre del proyecto</label>
                        <label>Si <input type="radio" name="cierre" value="Si"></label>
                        <label>No <input type="radio" name="cierre" value="No"></label>
                        <textarea class="input__textarea" placeholder="Si, si escriba la razon" name="razon"></textarea>
                    </div>
                    <div class="btn">
                        <a href="#page5" class="page__btn">Anterior</a>
                        <button class="page__btn" type="submit" name="btnenviar" id="btnenviar">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="js/conteo.js"></script>
</body>
</html>