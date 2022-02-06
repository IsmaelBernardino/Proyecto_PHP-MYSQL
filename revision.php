<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="shortcut icon" href="icon/investigacion.png">
    <link rel="stylesheet" href="css/revision.css">
    <script src="https://unpkg.com/akar-icons-fonts"></script>
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
        <a href="php/cerrarSesion.php"><img src="icon/salir.svg" class="iconoSalir"></a>
    </div>
    <div class="busqueda">
        <form action="revision.php" method="post" class="buscador" id="formulario">
            <label class="buscadortxt">Buscador</label>
            <div class="cajabuscador">
                <input type="text" class="buscadorinput" name="busqueda" placeholder="Ingrese clave">
                <img src="icon/close.svg" class="clearbuscador" onclick="limpiar()">
            </div>
            <button type="submit" class="btnbuscar" name="btnbuscar"><img src="icon/search.svg"></button>
        </form>
        <?php include "php/busqueda.php" ?>
    </div>
    <div class="contenedor">
        <table>
            <tr>
                <th>Nombre</th>
                <th>Nombre de los Responsables</th>
                <th>Clave</th>
                <th>Objetivo</th>
                <th>área del proyecto(división)</th>
                <th>Línea de investigación(aplicada, desarrollo expermental, básica)</th>
                <th>Tipo de investigación</th>
                <th>proyecto(investigación, investigación cientifica, desarrollo tecnoogico e innovacion)</th>
                <th>Campo de formación académica</th>
                <th>terminados(colaboración nacional. en proceso, colaboración extranjera)</th>
                <th>Sector con el que se relaciona</th>
                <th>Fecha de inicio</th>
                <th>Fecha de terminación</th>
                <th>Presupuesto solicitado</th>
                <th>Presupuesto asignado</th>
                <th>Fecha de asignación de recurso</th>
                <th>fuente de financiamiento</th>
                <th>Total de profesores asignados</th>
                <th>Total de estudiantes asignados</th>
                <th>vigentes(si, no)</th>
                <th>porcentaje de avance</th>
                <th>egoraciones afectadas</th>
                <th>Artículo Publicado (Nacional, Interncional)</th>
                <th>Ponencia (Nacional, Internacional)</th>
                <th>Tesis elaborada (Licenciaura, Maestria, Doctorado)</th>
                <th>Patentado (SI, NO)</th>
                <th>Sector destinatario o beneficiario final (Público, Privado, Social, Productivo)</th>
                <th>Resultados alcanzados de impacto</th>
                <th>Registrado en el TecNM (SI, NO)</th>
                <th>Registrado en otro  organismo y/o fondos (CONACYT, FOMIX, etc)</th>
                <th>Proyecto financiado por convocatorias del TecNM (SI, NO)</th>
                <th>Proyecto con tecnologia transferida o licenciada</th>
                <th>Proyectos en red de atencion a problemas nacionales financiados por PRODEP</th>
                <th>Cronograma</th>
                <th><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ai ai-Info"><circle cx="12" cy="12" r="10"/><path d="M12 7h.01"/><path d="M10 11h2v5"/><path d="M10 16h4"/></svg><br>Informes</th>
            </tr>
            <?php include "php/selectRevision.php" ?>
        </table>
    </div>
    <script>
        function limpiar() {
            document.querySelector(".buscadorinput").value = "";
        }
    </script>
    <script src="js/revision.js"></script>
    <script src="js/pdf.js"></script>
</body>
</html>