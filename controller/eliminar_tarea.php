<?php
require_once __DIR__ . '/../model/conexion.php';

if (!empty($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = intval($_GET["id"]);

    $sql = $conexion->query("DELETE FROM tareas WHERE id = $id");

    if ($sql) {
        header("Location: ../index.php");
    } else {
        echo "Error al eliminar: " . $conexion->error;
    }
} else {
    echo "ID inválido";
}
?>
