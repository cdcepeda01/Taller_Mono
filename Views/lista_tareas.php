<!-- app/views/lista_tareas.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Tareas</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <h1>Lista de Tareas</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Fecha Estimada</th>
                <th>Fecha Finalización</th>
                <th>Creador</th>
                <th>Responsable</th>
                <th>Estado</th>
                <th>Prioridad</th>
                <th>Observaciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tareas as $tarea): ?>
                <tr>
                    <td><?= $tarea['id'] ?></td>
                    <td><?= htmlspecialchars($tarea['titulo']) ?></td>
                    <td><?= htmlspecialchars($tarea['descripcion']) ?></td>
                    <td><?= $tarea['fechaEstimadaFinalizacion'] ?></td>
                    <td><?= $tarea['fechaFinalizacion'] ?></td>
                    <td><?= htmlspecialchars($tarea['creadorTarea']) ?></td>
                    <td><?= htmlspecialchars($tarea['responsable']) ?></td>
                    <td><?= htmlspecialchars($tarea['estado']) ?></td>
                    <td><?= htmlspecialchars($tarea['prioridad']) ?></td>
                    <td><?= htmlspecialchars($tarea['observaciones']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
