<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Crear Tarea</title>
</head>
<body>
    <h1>Crear Nueva Tarea</h1>
    <form action="/public/index.php?action=crear" method="POST">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required><br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea><br>

        <label for="idEmpleado">Responsable:</label>
        <input type="number" id="idEmpleado" name="idEmpleado" required><br>

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

        <label for="fechaEstimadaFinalizacion">Fecha Estimada de Finalización:</label>
        <input type="date" id="fechaEstimadaFinalizacion" name="fechaEstimadaFinalizacion" required><br>

        <label for="creadorTarea">Creador de la Tarea:</label>
        <input type="text" id="creadorTarea" name="creadorTarea" required><br>

        <input type="submit" value="Crear Tarea">
    </form>
</body>
</html>
```

### 5. Punto de Entrada (`public/index.php`) ###

El archivo de entrada se encarga de enrutar la solicitud a la acción correspondiente en el controlador.

```php
<?php
require_once '../controllers/TareaController.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$tareaController = new TareaController();

switch ($action) {
    case 'crear':
        $tareaController->crear();
        break;
    case 'actualizar':
        $tareaController->actualizar();
        break;
    case 'eliminar':
        $tareaController->eliminar();
        break;
    case 'listar':
        $tareaController->listar();
        break;
    case 'cambiarEstado':
        $tareaController->cambiarEstado();
        break;
    default:
        include '../views/crear_tarea.php';
        break;
}
?>