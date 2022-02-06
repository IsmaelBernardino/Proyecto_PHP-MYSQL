<?php

include "conexion.php";

if (isset($_POST['btn_actualizar'])) {
    $id_revision = $_POST['id_revision'];
    $id_proyecto = $_POST['id_proyecto'];
    $lineaInvestigacion = $_POST['lineaInvestigacion'];
    $proyecto = $_POST['proyecto'];
    $campoFormacion = $_POST['campoFormacion'];
    $terminados = $_POST['terminados'];
    $presupuestoSolicitado = $_POST['presupuestoSolicitado'];
    $presupuestoAsignado = $_POST['presupuestoAsignado'];
    $fechaAsignacion = $_POST['fechaAsignacion'];
    $fuenteFinanciamiento = $_POST['fuenteFinanciamiento'];
    $totalProfesor = $_POST['totalProfesor'];
    $totalEstudiante = $_POST['totalEstudiante'];
    $vigente = $_POST['vigente'];
    $egoraciones = $_POST['egoraciones'];
    $articuloPublicado = $_POST['articuloPublicado'];
    $ponencia = $_POST['ponencia'];
    $tesisElaborada = $_POST['tesisElaborada'];
    $patentado = $_POST['patentado'];
    $sectorDestinatario = $_POST['sectorDestinatario'];
    $resultadoAlcanzado = $_POST['resultadoAlcanzado'];
    $registradoTec = $_POST['registradoTec'];
    $registradoOtro = $_POST['registradoOtro'];
    $proyectoFinanciado = $_POST['proyectoFinanciado'];
    $proyectoTecnologia = $_POST['proyectoTecnologia'];
    $proyectoRed = $_POST['proyectoRed'];

    $S = "<br>";

    echo $id_revision.$S.$id_proyecto.$S.$lineaInvestigacion.$S.$proyecto.$S.$campoFormacion.$S.$terminados.$S.$presupuestoSolicitado.$S.$presupuestoAsignado.$S.$fechaAsignacion.$S.$fuenteFinanciamiento.$S.$totalProfesor.$S.$totalEstudiante.$S.$vigente.$egoraciones.$S.$articuloPublicado.$S.$ponencia.$S.$tesisElaborada.$S.$patentado.$S.$sectorDestinatario.$S.$resultadoAlcanzado.$S.$registradoTec.$S.$registradoOtro.$S.$proyectoFinanciado.$S.$proyectoTecnologia.$S.$proyectoRed;
    
    $sql = "UPDATE revision SET id_revision='$id_revision',id_proyecto='$id_proyecto',lineaInvestigacion='$lineaInvestigacion',proyecto='$proyecto',campoFormacion='$campoFormacion',terminados='$terminados',presupuestoSolicitado='$presupuestoSolicitado',presupuestoAsignado='$presupuestoAsignado',fechaAsignacion='$fechaAsignacion',fuenteFinanciamiento='$fuenteFinanciamiento',totalProfesor='$totalProfesor',totalEstudiante='$totalEstudiante',vigente='$vigente',egoraciones='$egoraciones',articuloPublicado='$articuloPublicado',ponencia='$ponencia',tesisElaborada='$tesisElaborada',patentado='$patentado',sectorDestinatario='$sectorDestinatario',resultadoAlcanzado='$resultadoAlcanzado',registradoTecNM='$registradoTec',registradoOtro='$registradoOtro',proyectoFinanciado='$proyectoFinanciado',proyectoTecnologia='$proyectoTecnologia',proyectoRed='$proyectoRed' WHERE id_revision='$id_revision'";

    $bd2=mysqli_query($conexion, $sql);



    if ($bd2){
        header("Location: ../revision.php");
    }else {
        echo "error";
    }
}

?>