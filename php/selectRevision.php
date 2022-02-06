<?php   
include "conexion.php";
            $sql = "SELECT * FROM revision re INNER JOIN proyecto pro ON pro.id_proyecto=re.id_proyecto INNER JOIN division d ON d.id_division=pro.id_division INNER JOIN tipoinvestigacion i ON i.id_tipoinvestigacion=pro.id_tipoinvestigacion INNER JOIN sector s ON s.id_sector=pro.id_sector";
            $bd = mysqli_query($conexion, $sql);
            if (mysqli_num_rows($bd) > 0) {
                while ($file = mysqli_fetch_assoc($bd)) {
                    
                    $fechaHoy = new DateTime(date("Y-m-d"));
                    $fechaInicio = new DateTime($file['fechainicioproyecto']);
                    $fechaTermino = new DateTime($file['fechafinalproyecto']);
                    $dias = $fechaHoy->diff($fechaInicio);
                    $txt =  $dias->days;
                    $dias2 = $fechaTermino->diff($fechaInicio);
                    $txt2 =  $dias2->days;
                    $porcentaje = round(($txt/$txt2)*100,1);

                    if ($file['vigente'] == "Si") {
                        $vigencia = "No";
                    }else {
                        $vigencia = "Si";
                    }
                    $id_pro = $file['id_proyecto'];
                    $res = "SELECT *FROM responsables where id_proyecto = '$id_pro'";
                    $exe = mysqli_query($conexion, $res);
                    ?>
                    <tr>
                        <td><?php echo $file['nombre'] ?></td>
                        <td><?php //echo $file['nombre_res'] 
                        while ($responsable = mysqli_fetch_assoc($exe)){
                            echo "<p class='nombre'>".$responsable['nombre_res']." ".$responsable['apePa']." ".$responsable['apeMa']."</p>";
                        }
                        ?></td>
                        <td><?php echo $file['clave'] ?></td>
                        <td><?php echo $file['objetivo'] ?></td>
                        <td><?php echo $file['division'] ?></td>
                        <td><?php echo $file['lineaInvestigacion'] ?></td>
                        <td><?php echo $file['investigacion'] ?></td>
                        <td><?php echo $file['proyecto'] ?></td>
                        <td><?php echo $file['campoFormacion'] ?></td>
                        <td><?php echo $file['terminados'] ?></td>
                        <td><?php echo $file['sector'] ?></td>
                        <td><?php echo $file['fechainicioproyecto'] ?></td>
                        <td><?php echo $file['fechafinalproyecto'] ?></td>
                        <td><?php echo "$".$file['presupuestoSolicitado'] ?></td>
                        <td><?php echo "$".$file['presupuestoAsignado'] ?></td>
                        <td><?php echo $file['fechaAsignacion'] ?></td>
                        <td><?php echo $file['fuenteFinanciamiento'] ?></td>
                        <td><?php echo $file['totalProfesor'] ?></td>
                        <td><?php echo $file['totalEstudiante'] ?></td>
                        <td><?php echo $vigencia ?></td>
                        <td><?php echo $porcentaje ?>%</td>
                        <td><?php echo $file['egoraciones'] ?></td>
                        <td><?php echo $file['articuloPublicado'] ?></td>
                        <td><?php echo $file['ponencia'] ?></td>
                        <td><?php echo $file['tesisElaborada'] ?></td>
                        <td><?php echo $file['patentado'] ?></td>
                        <td><?php echo $file['sectorDestinatario'] ?></td>
                        <td><?php echo $file['resultadoAlcanzado'] ?></td>
                        <td><?php echo $file['registradoTecNM'] ?></td>
                        <td><?php echo $file['registradoOtro'] ?></td>
                        <td><?php echo $file['proyectoFinanciado'] ?></td>
                        <td><?php echo $file['proyectoTecnologia'] ?></td>
                        <td><?php echo $file['proyectoRed'] ?></td>
                        <td><img src="icon/file.svg" class="iconPDF btn_view"></td>
                        <div class="modalpdf">
                            <div class="contenido">
                            <h1>CRONOGRAMA</h1>
                            <div class="cierre">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z" fill="#fff"/></svg>
                            </div>
                            <?php
                            if ($file["cronograma"] != 'files/') {
                                ?>
                               <iframe src="<?php echo $file["cronograma"] ?>" frameborder="0"></iframe>
                               <?php
                            }
                            ?>
                            </div>
                        </div>
                        <td><a href="informeView.php?id_proyecto=<?php echo $file['id_proyecto']?>" name="id_proyecto">Ver informes</a></td>
                    </tr>
                <?php
                }
            }
            ?>