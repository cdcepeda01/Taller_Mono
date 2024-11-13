<?php
require_once "../model/conexion.php";
$id = $_GET["id"];

if (!is_numeric($id)) {
    die("ID inválido");
}

$sql = $conexion->query("SELECT * FROM tareas WHERE id = $id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
    <link rel="stylesheet" href="../views/style_modificar.css">
</head>
<body>
<form method="POST">
    <h3>Modificar Tarea</h3>
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">

    <?php
    include "../controller/modificar_controller.php";
    while ($datos = $sql->fetch_object()) { ?>
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="<?= htmlspecialchars($datos->titulo) ?>" required><br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required><?= htmlspecialchars($datos->descripcion) ?></textarea><br>

        <label for="fechaEstimadaFinalizacion">Fecha Estimada de Finalización:</label>
        <input type="date" id="fechaEstimadaFinalizacion" name="fechaEstimadaFinalizacion" value="<?= htmlspecialchars($datos->fechaEstimadaFinalizacion) ?>" required><br>

        <label for="fechaFinalizacion">Fecha Finalización:</label>
        <input type="date" id="fechaFinalizacion" name="fechaFinalizacion" value="<?= htmlspecialchars($datos->fechaFinalizacion) ?>"><br>

        <label for="creadorTarea">Creador de la Tarea:</label>
        <input type="text" id="creadorTarea" name="creadorTarea" value="<?= htmlspecialchars($datos->creadorTarea) ?>" required><br>

        <label for="observaciones">Observaciones:</label>
        <textarea id="observaciones" name="observaciones" required><?= htmlspecialchars($datos->observaciones) ?></textarea><br>

        <label for="idEmpleado">Responsable:</label>
        <select id="idEmpleado" name="idEmpleado">
            <option value="1" <?= $datos->idEmpleado == 1 ? 'selected' : '' ?>>Juan Carlos Gomez</option>
            <option value="2" <?= $datos->idEmpleado == 2 ? 'selected' : '' ?>>Ana María Blanco</option>
            <option value="3" <?= $datos->idEmpleado == 3 ? 'selected' : '' ?>>Juan Fernando Perez</option>
            <option value="4" <?= $datos->idEmpleado == 4 ? 'selected' : '' ?>>Angela Díaz</option>
        </select><br>

        <label for="idEstado">Estado:</label>
        <select id="idEstado" name="idEstado">
            <option value="1" <?= $datos->idEstado == 1 ? 'selected' : '' ?>>Pendiente</option>
            <option value="2" <?= $datos->idEstado == 2 ? 'selected' : '' ?>>En proceso</option>
            <option value="3" <?= $datos->idEstado == 3 ? 'selected' : '' ?>>Terminada</option>
            <option value="4" <?= $datos->idEstado == 4 ? 'selected' : '' ?>>En impedimento</option>
        </select><br>

        <label for="idPrioridad">Prioridad:</label>
        <select id="idPrioridad" name="idPrioridad">
            <option value="1" <?= $datos->idPrioridad == 1 ? 'selected' : '' ?>>Alta</option>
            <option value="2" <?= $datos->idPrioridad == 2 ? 'selected' : '' ?>>Media</option>
            <option value="3" <?= $datos->idPrioridad == 3 ? 'selected' : '' ?>>Baja</option>
        </select><br>
    <?php } ?>

    <input type="submit" name="Ok" value="Modificar Tarea">
</form>
</body>
</html>
