<?php

if (!empty($_POST["Ok"])) {
    if (!empty($_POST["titulo"]) && !empty($_POST["descripcion"]) && !empty($_POST["fechaEstimadaFinalizacion"]) &&
        !empty($_POST["fechaFinalizacion"]) && !empty($_POST["creadorTarea"]) && !empty($_POST["observaciones"]) &&
        !empty($_POST["idEmpleado"]) && !empty($_POST["idEstado"]) && !empty($_POST["idPrioridad"])) {

        if (isset($_POST["id"])) {
            echo "Valor de ID recibido: " . $_POST["id"] . "<br>";
        } else {
            echo "ID no recibido<br>";
        }

        if (isset($_POST["id"]) && is_numeric($_POST["id"])) {
            $id = intval($_POST["id"]);
        } else {
            echo "ID inválido";
            exit;
        }

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

        $sql_query = "UPDATE tareas SET titulo='$titulo', descripcion='$descripcion', fechaEstimadaFinalizacion='$fechaEstimadaFinalizacion',
            fechaFinalizacion='$fechaFinalizacion', creadorTarea='$creadorTarea', observaciones='$observaciones', idEmpleado='$idEmpleado', 
            idEstado='$idEstado', idPrioridad='$idPrioridad', created_at='$created_at', updated_at='$updated_at' WHERE id=$id";

        echo $sql_query;

        $sql = $conexion->query($sql_query);

        if ($sql) {
            header("location:../index.php");
        } else {
            echo "Error al agregar la tarea: " . $conexion->error;
        }
    } else {
        echo "Por favor, complete todos los campos.";
    }
}
?>
