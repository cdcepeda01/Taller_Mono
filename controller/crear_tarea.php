<?php

if(!empty($_POST["Ok"])){
    if(!empty($_POST["titulo"]) && !empty($_POST["descripcion"]) && !empty($_POST["fechaEstimadaFinalizacion"]) && 
    !empty($_POST["fechaFinalizacion"]) && !empty($_POST["creadorTarea"]) && !empty($_POST["observaciones"]) 
    && !empty($_POST["idEmpleado"]) && !empty($_POST["idEstado"]) 
    && !empty($_POST["idPrioridad"])){
        
        $titulo = mysqli_real_escape_string($conexion, $_POST["titulo"]);
        $descripcion = mysqli_real_escape_string($conexion, $_POST["descripcion"]);
        $fechaEstimadaFinalizacion = mysqli_real_escape_string($conexion, $_POST["fechaEstimadaFinalizacion"]);
        $fechaFinalizacion = mysqli_real_escape_string($conexion, $_POST["fechaFinalizacion"]);
        $creadorTarea = mysqli_real_escape_string($conexion, $_POST["creadorTarea"]);
        $observaciones = mysqli_real_escape_string($conexion, $_POST["observaciones"]);
        $idEmpleado = mysqli_real_escape_string($conexion, $_POST["idEmpleado"]);
        $idEstado = mysqli_real_escape_string($conexion, $_POST["idEstado"]);
        $idPrioridad = mysqli_real_escape_string($conexion, $_POST["idPrioridad"]);
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');

        $sql = $conexion->query("INSERT INTO tareas (titulo, descripcion, fechaEstimadaFinalizacion, fechaFinalizacion, creadorTarea, observaciones, idEmpleado, idEstado, idPrioridad, created_at, updated_at) VALUES ('$titulo', '$descripcion', '$fechaEstimadaFinalizacion', '$fechaFinalizacion', '$creadorTarea', '$observaciones', '$idEmpleado', '$idEstado', '$idPrioridad', '$created_at', '$updated_at')") or die(mysqli_error($conexion));

        if ($sql) {
            echo "Tarea agregada con éxito.";
        } else {
            echo "Error al agregar la tarea: " . $conexion->error;
        }
    } else {
        echo "Por favor, complete todos los campos.";
    }
}
?>
