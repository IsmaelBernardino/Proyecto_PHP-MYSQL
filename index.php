<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creacion del proyecto</title>
    <link rel="shortcut icon" href="icon/investigacion.png">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/alert.css">
    <link rel="stylesheet" href="css/llenado.css">
</head>
<body>
    <?php
    include "php/indexValidar.php";
    $fecha = date("d/m/Y");
    $inicioClave = date("y").date("m");
    $finClave = rand(0,99);
    if ($finClave < 10) {
        $finClave = "0$finClave";
    }
    $claveCompleto = $inicioClave . $finClave
    ?>
    <div class="container">
        <a href="php/cerrarSesion.php" class="linkicono"><img src="icon/salir.svg" class="iconoSalir"></a>
        <div class="header">Proyecto de investigación tesjo</div>
        <span class="requerido">(*) Campos requeridos</span>
        <div class="form-outer">
            <form action="index.php" method="post" enctype="multipart/form-data" class="form">
    <!-- alta de proyecto -->
                <div class="page" id="page1">
                    <div class="page__input">
                        <label>Fecha de elaboracion:<span class="txtdefecto"><?php echo " $fecha" ?></span></label>
                        <input type="date" value="<?php echo date('Y-m-d'); ?>" style="display:none" name="fechaElaboracion">
                    </div>
                    <div class="page__input">
                        <label><span class="requerido">* </span>Nombre del proyecto:</label>
                        <input type="text" name="nombreProyecto">
                    </div>
                    <div class="page__input">
                        <label>Clave del proyecto:<span class="txtdefecto"><?php  echo " $claveCompleto " ?></span><span class="reminder">¡Recordar para la realizacion del informe!</span></label>
                        <input type="text" name="claveProyecto" value="<?php echo $claveCompleto ?>" style="display:none">
                    </div>
                    <div class="page__input">
                        <label><span class="requerido">* </span>Contraseña:  <span class="reminder">¡Recordar para la realizacion del informe!</span></label>
                        <input type="password" name="password" maxlength="18">
                    </div>
                    <div class="page__input">
                        <label class="tema"><span class="requerido">* </span>Division:</label>
                        <select name="division">
                            <option value="">Seleccione valor</option>
                            <option value="1">Arquitectura</option>
                            <option value="2">Contador Público</option>
                            <option value="3">Ingeniería Electromecánica</option>
                            <option value="4">Ingeniería en Gestión empresarial</option>
                            <option value="5">Ingeniería Industrial</option>
                            <option value="6">Ingeniería en Materiales</option>
                            <option value="7">Ingeniería Mecatrónica</option>
                            <option value="8">Ingeniería Química</option>
                            <option value="9">Ingeniería en Sistemas Computacionales</option>
                        </select>
                    </div>
                    <div class="page__input">
                        <label><span class="requerido">* </span>Tipo de investigacion</label>
                        <div class="page__input radio">
                            <label>Básica<input type="radio" name="tipo" value="1"></label>
                            <label>Aplicada <input type="radio" name="tipo" value="2"></label>
                            <label>Desarrollo Tecnologico <input type="radio" name="tipo" value="3"></label>
                        </div>
                    </div>
                    <div class="btn"><a href="#page2" class="page__btn">Siguiente</a></div>
                </div>
    <!-- linea de investigacion -->
                <div class="page" id="page2">
                    <label class="tema">Linea de investigación</label>
                    <div class="page__input">
                        <label><span class="requerido">* </span>Fecha de inicio del proyecto:</label>
                        <input type="date" name="fechainicio">
                    </div>
                    <div class="page__input">
                        <label><span class="requerido">* </span>Objetivo del proyecto:</label>
                        <textarea class="input__textarea" placeholder="Anotar objetivos" name="objetivo"></textarea>
                    </div>
                    <div class="page__input">
                        <label><span class="requerido">* </span>Duracion estimada del proyecto (meses): </label>
                        <input type="number" value="1" name="duracion">
                    </div>
                    <div class="page__input">
                        <label>Instituciones colaboradores:</label>
                        <input type="text" name="instituciones">
                    </div>
                    <div class="btn">
                        <a href="#page1" class="page__btn">Anterior</a>
                        <a href="#page3" class="page__btn">Siguiente</a>
                    </div>
                </div>
    <!-- ingreso de usuarios -->
                <div class="page" id="page3">
                    <p class="tema">Responsable del proyecto (en orden de responsabilidad)</p>
                    <button class="btnres">Agregar responsable</button>
                    <button class="Eliminar">Eliminar</button>
                    <div class="usuario" id="usuario">
                        <div class="responsable">
                            <div class="page__input">
                                <label><span class="requerido">* </span>Nombre:</label>
                                <input type="text" name="nombre1">
                                <label><span class="requerido">* </span>Apellido Paterno:</label>
                                <input type="text" name="apellidoP1">
                                <label><span class="requerido">* </span>Apellido Materna:</label>
                                <input type="text" name="apellidoM1">
                            </div>
                            <div class="page__input">
                                <label><span class="requerido">* </span>Rol de institución:</label>
                                <input type="text" name="rol1">
                            </div>
                            <span class="msj">Rol en la institución: PTC, Profesor de asignatura, Estudiante o Externo</span>
                            <div class="page__input">
                                <label><span class="requerido">* </span>Correo electrónico:</label>
                                <input type="email" name="correo1">
                            </div>
                        </div>
                    </div>
                    <img src="icon/scroll.svg" alt="scroll" class="iconScroll">
                    <div class="btn">
                        <a href="#page2" class="page__btn">Anterior</a>
                        <a href="#page4" class="page__btn">Siguiente</a>
                    </div>
                </div>
    <!-- requerimiento del proyecto -->
                <div class="page" id="page4">
                    <div class="page__input">
                        <label class="tema"><span class="requerido">* </span>Requerimiento del proyecto:</label>
                        <textarea class="input__textarea" placeholder="Anotar requerimientos" name="requerimiento"></textarea>
                    </div>
                    <div class="btn">
                        <a href="#page3" class="page__btn">Anterior</a>
                        <a href="#page5" class="page__btn">Siguiente</a>
                    </div>
                </div>
    <!-- producto de investigacion -->
                <div class="page" id="page5">
                    <table>
                        <tbody>
                            <tr>
                                <th>Producto de investigación esperados</th>
                                <th>Cantidad</th>
                                <th>Fecha planeada</th>
                            </tr>
                            <tr>
                                <td>Articulo indizados<input type="text" value="Articulo indizado" name="producto1" hidden></td>
                                <td><input type="number" min="0" max="10" value="0" name="Pcantidad1"></td>
                                <td><input type="date" name="Pfecha1"></td>
                            </tr>
                            <tr>
                                <td>Articulos arbitrados<input type="text" value="Articulos arbitrados" name="producto2" hidden></td>
                                <td><input type="number" min="0" max="10" value="0" name="Pcantidad2"></td>
                                <td><input type="date" name="Pfecha2"></td>
                            </tr>
                            <tr>
                                <td>Libro<input type="text" value="Libro" name="producto3" hidden></td>
                                <td><input type="number" min="0" max="10" value="0" name="Pcantidad3"></td>
                                <td><input type="date" name="Pfecha3"></td>
                            </tr>
                            <tr>
                                <td>Capitulo del libro<input type="text" value="Capitulo del libro" name="producto4" hidden></td>
                                <td><input type="number" min="0" max="10" value="0" name="Pcantidad4"></td>
                                <td><input type="date" name="Pfecha4"></td>
                            </tr>
                            <tr>
                                <td>Patentes/ modelo de utilidad/ Diseño industrial<input type="text" value="Patentes/modelo de utilidad/Diseño industrial" name="producto5" hidden></td>
                                <td><input type="number" min="0" max="10" value="0" name="Pcantidad5"></td>
                                <td><input type="date" name="Pfecha5"></td>
                            </tr>
                            <tr>
                                <td>Transferencia tecnológica<input type="text" value="Transferencia tecnológica" name="producto6" hidden></td>
                                <td><input type="number" min="0" max="10" value="0" name="Pcantidad6"></td>
                                <td><input type="date" name="Pfecha6"></td>
                            </tr>
                            <tr>
                                <td>Marcas simbolos ó imagenes utilizados en el comercio<input type="text" value="Marcas simbolos ó imagenes utilizados en el comercio" name="producto7" hidden></td>
                                <td><input type="number" min="0" max="10" value="0" name="Pcantidad7"></td>
                                <td><input type="date" name="Pfecha7"></td>
                            </tr>
                            <tr>
                                <td>Prototipos<input type="text" value="Prototipos" name="producto8" hidden></td>
                                <td><input type="number" min="0" max="10" value="0" name="Pcantidad8"></td>
                                <td><input type="date" name="Pfecha8"></td>
                            </tr>
                            <tr>
                                <th>Otros</th>
                            </tr>
                            <tr>
                                <td><input type="text" name="otroproducto1"></td>
                                <td><input type="number" min="0" max="10" value="0" name="otrocantidad1"></td>
                                <td><input type="date" name="otrofecha1"></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="otroproducto2"></td>
                                <td><input type="number" min="0" max="10" value="0" name="otrocantidad2"></td>
                                <td><input type="date" name="otrofecha2"></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="otroproducto3"></td>
                                <td><input type="number" min="0" max="5" value="0" name="otrocantidad3"></td>
                                <td><input type="date" name="otrofecha3"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="btn">
                        <a href="#page4" class="page__btn">Anterior</a>
                        <a href="#page6" class="page__btn">Siguiente</a>
                    </div>
                </div>
    <!-- cronograma -->
                <div class="page" id="page6">
                    <div class="page__input">
                        <label class="tema">Cronograma de actividades (mensual) PDF</label>
                        <input type="file" name= "cronograma" accept="application/pdf">
                    </div>
                    <div class="page__input radio">
                        <label><span class="requerido">* </span>Sector con el que se relaciona:</label>
                            <label>Público <input type="radio" name="sector" value="1"></label>
                            <label>Privado <input type="radio" name="sector" value="2"></label>
                            <label>Social <input type="radio" name="sector" value="3"></label>
                            <label>Productivo <input type="radio" name="sector" value="4"></label>
                    </div>
                    <div class="btn">
                        <a href="#page5" class="page__btn">Anterior</a>
                        <button type="submit" class="page__btn" id="btnenviar" name="btnProyecto">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<script src="js/app.js"></script>
</body>
</html>