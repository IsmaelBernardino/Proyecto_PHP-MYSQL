<?php

include "php/conexion.php";

$clave = $_SESSION['sesion'];
$sql = "SELECT id_proyecto FROM proyecto WHERE clave = '$clave'";
$bd = mysqli_query($conexion,$sql);
$row = mysqli_fetch_row($bd);

$sql2 = "SELECT *FROM proyecto where id_proyecto = '$row[0]'";
$bd2 = mysqli_query($conexion, $sql2);
if ($bd2) {
    while ($fila = mysqli_fetch_assoc($bd2)) {
        ?>
        <div class="block">
            <label class="nombre_actualizar">Fecha final del proyecto:</label>
            <input type="hidden" value="<?php echo $fila['id_proyecto'] ?>" name="idProyecto">
            <input type="date" class="actualizar" value="<?php echo $fila['fechafinalproyecto'] ?>" name="fechaProyecto">
        </div>
        <?php
    }
}

$sql3 = "SELECT *FROM responsables WHERE id_proyecto = '$row[0]'";
$bd3 = mysqli_query($conexion, $sql3);
if ($bd3) {
    $i = 1;
    ?>
    <div class="responsables">
    <?php
    while ($fila2 = mysqli_fetch_assoc($bd3)) {
        ?>
        <div class="block">
            <input type="hidden" class="actualizar" value="<?php echo $fila2['id_responsable'] ?>" name="id<?php echo $i; ?>">
            <label class="nombre_actualizar">Nombre:</label>
            <input type="text" class="actualizar" value="<?php echo $fila2['nombre_res'] ?>" name="nom<?php echo $i; ?>">
            <label class="nombre_actualizar">Apellido Paterno:</label>
            <input type="text" class="actualizar" value="<?php echo $fila2['apePa'] ?>" name="aP<?php echo $i; ?>">
            <label class="nombre_actualizar">Apellido Materna</label>
            <input type="text" class="actualizar" value="<?php echo $fila2['apeMa'] ?>" name="aM<?php echo $i; ?>">
            <label class="nombre_actualizar">Rol:</label>
            <input type="text" class="actualizar" value="<?php echo $fila2['rol'] ?>" name="r<?php echo $i; ?>">
            <label class="nombre_actualizar">Correo:</label>
            <input type="email" class="actualizar" value="<?php echo $fila2['correo'] ?>" name="c<?php echo $i; ?>">
            <a href="php/borrar.php?id_responsable=<?php echo $fila2['id_responsable']?>" name="eliminar">Eliminar</a>
        </div>
        <?php
    $i++;
    }
    ?>
    </div>
    <button class="btnAgregar">Agregar Responsable</button>
    <script>
        <?php 
        echo "contador ='$i'";
        ?>

        const btnAgregar = document.querySelector(".btnAgregar");
        const contenedor = document.querySelector(".responsables")
        btnAgregar.addEventListener("click", function (e) {
            e.preventDefault();
            
            if (contador == 5) {
                btn.disabled = true
                btn.style.background = "#7F7C82"
            }
            
            var Block = document.createElement("div");
            Block.className = "block";
            var labelName = document.createElement("label");
            labelName.append('Nombre:');
            labelName.className = "nombre_actualizar";
            var inputName = document.createElement("input");
            inputName.type = "text";
            inputName.name = `nom${contador}`;
            inputName.className = "actualizar";
            var labelaP = document.createElement("label");
            labelaP.append('Apellido Paterno:');
            labelaP.className = "nombre_actualizar";
            var inputaP = document.createElement("input");
            inputaP.type = "text";
            inputaP.name = `aP${contador}`;
            inputaP.className = "actualizar";
            var labelaM = document.createElement("label");
            labelaM.append('Apellido Materna:');
            labelaM.className = "nombre_actualizar";
            var inputaM = document.createElement("input");
            inputaM.type = "text";
            inputaM.name = `aM${contador}`;
            inputaM.className = "actualizar";
            var labelRol = document.createElement("label");
            labelRol.append('Rol:');
            labelRol.className = "nombre_actualizar";
            var inputRol = document.createElement("input");
            inputRol.type = "text";
            inputRol.name = `r${contador}`;
            inputRol.className = "actualizar";
            var labelCorreo = document.createElement("label");
            labelCorreo.append('Correo:');
            labelCorreo.className = "nombre_actualizar";
            var inputCorreo = document.createElement("input");
            inputCorreo.type = "text";
            inputCorreo.name = `c${contador}`;
            inputCorreo.className = "actualizar";

            Block.appendChild(labelName);
            Block.appendChild(inputName);
            Block.appendChild(labelaP);
            Block.appendChild(inputaP);
            Block.appendChild(labelaM);
            Block.appendChild(inputaM);
            Block.appendChild(labelRol);
            Block.appendChild(inputRol);
            Block.appendChild(labelCorreo);
            Block.appendChild(inputCorreo);

            contenedor.appendChild(Block);
            ++contador;
        });
    </script>
    <?php
}

$sql4 = "SELECT *FROM  productoesperado WHERE id_proyecto = '$row[0]'";
$bd4 = mysqli_query($conexion, $sql4);
if ($bd4) {
    $j = 1;
    while ($fila3 = mysqli_fetch_assoc($bd4)) {
        ?>
        <div class="block">
            <input type="hidden" class="actualizar" value="<?php echo $fila3['id_Productoesperado'] ?>" name="idP<?php echo $j; ?>">
            <label for="" class="nombre_actualizar">Producto: </label>
            <input type="text" class="actualizar" value="<?php echo $fila3['productoE'] ?>" name="pro<?php echo $j; ?>">
            <label for="" class="nombre_actualizar">Cantidad: </label>
            <input type="number" class="actualizar" value="<?php echo $fila3['cantidad'] ?>" name="cantidadP<?php echo $j; ?>">
            <label for="" class="nombre_actualizar">Fecha: </label>
            <input type="date" class="actualizar" value="<?php echo $fila3['fecha'] ?>" name="fechaP<?php echo $j; ?>">
            <a href="php/borrar.php?id_Productoesperado=<?php echo $fila3['id_Productoesperado']?>" name="eliminar">Eliminar</a>
        </div>
        <?php
        $j++;
    }
    ?>
    <?php
}

?>