<?php

if (isset($_POST['btnbuscar'])) {
    if (!empty($_POST['busqueda'])){
        $campoBuscar = $_POST['busqueda'];
        $sql = "SELECT *FROM revision a INNER JOIN proyecto b ON a.id_proyecto=b.id_proyecto INNER JOIN division d ON b.id_division=d.id_division INNER JOIN tipoinvestigacion e ON b.id_tipoinvestigacion=e.id_tipoinvestigacion INNER JOIN sector f ON b.id_sector=f.id_sector WHERE clave LIKE '$campoBuscar'";
        $bd = mysqli_query($conexion, $sql);
        ?>
        <div class="modal_busqueda">
            <div class="modal_caja">
                <img src="icon/close.svg" onclick="cerrarModal()" class="modalClose">
                <form action="php/revisionActualizar.php" method="POST" class="form_actualizar">
        <?php
        if (mysqli_num_rows($bd) > 0) {
            while ($res = mysqli_fetch_assoc($bd)) {
                $id = "SELECT id_proyecto FROM proyecto WHERE clave = '$campoBuscar'";
                $bd2 = mysqli_query($conexion, $id);
                $id_proyecto = mysqli_num_rows($bd2);
                $consulta = "SELECT opcion FROM cierreproyecto WHERE id_proyecto='$id_proyecto[1]'";
                $bd3 = mysqli_query($conexion, $consulta);
                $vigencia = mysqli_fetch_assoc($bd3);
                if ($vigencia['opcion'] == 'Si') {
                    $vigente = 'NO';
                }else {
                    $vigente = 'Si';
                }
                ?>
                <div class="block">
                    <input type="hidden" value="<?php echo $res['id_revision'] ?>" name="id_revision">
                    <input type="hidden" value="<?php echo $res['id_proyecto'] ?>" name="id_proyecto">
                    <p>Nombre del proyecto: <?php echo $res['nombre'] ?></p>
                    <p>Clave del proyecto: <?php echo $res['clave'] ?></p>
                    <p>Linea de investigacion: <input type="text" value="<?php echo $res['lineaInvestigacion'] ?>" name="lineaInvestigacion"></p>
                    <p>Tipo de investigacion: <?php echo $res['investigacion'] ?></p>
                    <p>Proyecto: 
                        <select name="proyecto">
                            <option value="<?php echo $res['proyecto'] ?>"><?php echo $res['proyecto'] ?></option>
                            <option value="Investigación">Investigación</option>
                            <option value="Invesigación cientifica">Invesigación cientifica</option>
                            <option value="Desarrollo tecnológico e inovación">Desarrollo tecnológico e inovación</option>
                        </select>
                    </p>
                    <p>Campo de formación acaémica: 
                        <select name="campoFormacion">
                            <option value="<?php echo $res['campoFormacion'] ?>"><?php echo $res['campoFormacion'] ?></option>
                            <option value="Educación, artes y humanidades">Educación, artes y humanidades</option>
                            <option value="Ciencia sociales y derecho">Ciencia sociales y derecho</option>
                            <option value="Administración y negocios">Administración y negocios</option>
                            <option value="Ciencias naturales">Ciencias naturales</option>
                            <option value="Matemáticas y estadisticas">Matemáticas y estadisticas</option>
                            <option value="Tecnologías de la información y la computación">Tecnologías de la información y la computación</option>
                            <option value="Ingeniería, manofactura y construcción, Aagronomia y veteriinari">Ingeniería, manofactura y construcción, Aagronomia y veteriinari</option>
                            <option value="Ciencias de la salud">Ciencias de la salud</option>
                            <option value="Servicios">Servicios</option>
                        </select>
                    </p>
                    <p>Terminados: 
                        <select name="terminados">
                            <option value="<?php echo $res['terminados'] ?>"><?php echo $res['terminados'] ?></option>
                            <option value="Colaboración nacional">Colaboración nacional</option>
                            <option value="En proceso">En proceso</option>
                            <option value="Colaboración extranjera">Colaboración extranjera</option>
                        </select>
                    </p>
                    <p>Sector en la que se relaciona: <?php echo $res['sector'] ?></p>
                    <p>Fecha de inicio: <?php echo $res['fechainicioproyecto'] ?></p>
                    <p>Fecha de terminacion: <?php echo $res['fechafinalproyecto'] ?></p>
                    <p>Presupuesto solicitado: <input type="text" value="<?php echo $res['presupuestoSolicitado'] ?>" name="presupuestoSolicitado"></p>
                    <p>Presupuesto Asignado: <input type="text" value="<?php echo $res['presupuestoAsignado'] ?>" name="presupuestoAsignado"></p>
                    <p>Fecha de asignacion de recurso: <input type="date" value="<?php echo $res['fechaAsignacion'] ?>" name="fechaAsignacion"></p>
                    <p>Fuente de financiamiento: 
                        <select name="fuenteFinanciamiento">
                            <option value="<?php echo $res['fuenteFinanciamiento'] ?>"><?php echo $res['fuenteFinanciamiento'] ?></option>
                            <option value="CONACyT">CONACyT</option>
                            <option value="Ingresos propios">Ingresos propios</option>
                            <option value="Apoyo privado">Apoyo privado</option>
                            <option value="Apoyo público">Apoyo público</option>
                            <option value="SES - TECNM">SES - TECNM</option>
                            <option value="Colaboracion extranjera">Colaboracion extranjera</option>
                        </select>
                    </p>
                    <p>Total de profesores asignados: <input type="text" value="<?php echo $res['totalProfesor'] ?>" name="totalProfesor"></p>
                    <p>Total de estudiantes asignados: <input type="text" value="<?php echo $res['totalEstudiante'] ?>" name="totalEstudiante"></p>
                    <p>Egoraciones afectadas: <input type="text" value="<?php echo $res['egoraciones'] ?>" name="egoraciones"></p>
                    <p>Artículo publicado: 
                        <select name="articuloPublicado">
                            <option value="<?php echo $res['articuloPublicado'] ?>"><?php echo $res['articuloPublicado'] ?></option>
                            <option value="Nacional">Nacional</option>
                            <option value="Internacional">Internacional</option>
                        </select>
                    </p>
                    <p>Ponencia: 
                        <select name="ponencia">
                            <option value="<?php echo $res['ponencia'] ?>"><?php echo $res['ponencia'] ?></option>
                            <option value="Nacional">Nacional</option>
                            <option value="Internacional">Internacional</option>
                        </select>
                    </p>
                    <p>Tesis elaborada: 
                        <select name="tesisElaborada">
                            <option value="<?php echo $res['tesisElaborada'] ?>"><?php echo $res['tesisElaborada'] ?></option>
                            <option value="Licienciatura">Licienciatura</option>
                            <option value="Maestría">Maestría</option>
                            <option value="Doctorado">Doctorado</option>
                        </select>
                    </p>
                    <p>Patentado: 
                        <select name="patentado">
                            <option value="<?php echo $res['patentado'] ?>"><?php echo $res['patentado'] ?></option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </p>
                    <p>Sector destinatario o beneficiario final: 
                        <select name="sectorDestinatario">
                            <option value="<?php echo $res['sectorDestinatario'] ?>"><?php echo $res['sectorDestinatario'] ?></option>
                            <option value="Público">Público</option>
                            <option value="Privado">Privado</option>
                            <option value="Social">Social</option>
                            <option value="Productivo">Productivo</option>
                        </select>
                    </p>
                    <p>Resultado alcanzado de impacto: <input type="text" value="<?php echo $res['resultadoAlcanzado'] ?>" name="resultadoAlcanzado"></p>
                    <p>Registrado en el TecNM: 
                        <select name="registradoTec">
                            <option value="<?php echo $res['registradoTecNM'] ?>"><?php echo $res['registradoTecNM'] ?></option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </p>
                    <p>Registrado en otro organismo y/o fondos: <input type="text" value="<?php echo $res['registradoOtro'] ?>" name="registradoOtro"></p>
                    <p>Proyecto financiado por convocatorias del TecNM: 
                        <select name="proyectoFinanciado">
                            <option value="<?php echo $res['proyectoFinanciado'] ?>"><?php echo $res['proyectoFinanciado'] ?></option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </p>
                    <p>Proyecto co tecnologia transferida o licenciada: <input type="text" value="<?php echo $res['proyectoTecnologia'] ?>" name="proyectoTecnologia"></p>
                    <p>Proyectos en red de atencion a problemas nacionales financiados por PRODEP: <input type="text" value="<?php echo $res['proyectoRed'] ?>" name="proyectoRed"></p>
                </div>
                <?php
            }
            ?>
                <button type="submit" name="btn_actualizar" class="btn_actualizar">Actualizar</button>
                </form>
            </div>
        </div>
            <?php
        }
    }
}
?>
