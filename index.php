<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autogestión de Tareas</title>
    <link rel="stylesheet" href="views/styles.css">
</head>
<body>
    <form method="POST">
        <h3>Crear nueva Tarea</h3>
        <?php
        include "model/conexion.php";
        include "controller/crear_tarea.php";
        ?>

        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required><br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea><br>

        <label for="fechaEstimadaFinalizacion">Fecha Estimada de Finalización:</label>
        <input type="date" id="fechaEstimadaFinalizacion" name="fechaEstimadaFinalizacion" required><br>

        <label for="fechaFinalizacion">Fecha Finalización:</label>
        <input type="date" id="fechaFinalizacion" name="fechaFinalizacion"><br>

        <label for="creadorTarea">Creador de la Tarea:</label>
        <input type="text" id="creadorTarea" name="creadorTarea" required><br>

        <label for="observaciones">Observaciones:</label>
        <textarea id="observaciones" name="observaciones" required></textarea><br>
        
        <label for="idEmpleado">Responsable:</label>
        <select id="idEmpleado" name="idEmpleado">
            <option value="1">Juan Carlos Gomez</option>
            <option value="2">Ana María Blanco</option>
            <option value="3">Juan Fernando Perez</option>
            <option value="4">Angela Díaz</option>
        </select><br>

        <label for="idEstado">Estado:</label>
        <select id="idEstado" name="idEstado">
            <option value="1">Pendiente</option>
            <option value="2">En proceso</option>
            <option value="3">Terminada</option>
            <option value="4">En impedimento</option>
        </select><br>

        <label for="idPrioridad">Prioridad:</label>
        <select id="idPrioridad" name="idPrioridad">
            <option value="1">Alta</option>
            <option value="2">Media</option>
            <option value="3">Baja</option>
        </select><br>
       
        <input type="submit" name="Ok" value="Crear Tarea">
    </form>
    
    <div> 
    <h4>Lista de Tareas</h4>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Fecha Estimada</th>
                <th>Fecha Finalización</th>
                <th>Creador</th>
                <th>Observaciones</th>
                <th>Responsable</th>
                <th>Estado</th>
                <th>Prioridad</th>
                <th>Fecha creación tarea</th>
                <th>Fecha actualización tarea</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "model/conexion.php";
            $sql = $conexion->query("SELECT * FROM tareas");
            while ($datos = $sql->fetch_object()) {
            ?>
                <tr>
                    <td><?= $datos->id ?> </td>
                    <td><?= $datos->titulo ?></td>
                    <td><?= $datos->descripcion ?></td>
                    <td><?= $datos->fechaEstimadaFinalizacion ?></td>
                    <td><?= $datos->fechaFinalizacion ?></td>
                    <td><?= $datos->creadorTarea ?></td>
                    <td><?= $datos->observaciones ?></td>
                    <td><?= $datos->idEmpleado ?></td>
                    <td><?= $datos->idEstado ?></td>
                    <td><?= $datos->idPrioridad ?></td>
                    <td><?= $datos->created_at ?></td>
                    <td><?= $datos->updated_at ?></td>
                    <td>
                        <a href="controller/modificar_tarea.php?id=<?= $datos->id ?>">Modificar</a>
                        <a href="controller/eliminar_tarea.php?id=<?= $datos->id ?>" onclick="return confirm('¿Estás seguro de que quieres eliminar esta tarea?');">Borrar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
</body>
</html>
