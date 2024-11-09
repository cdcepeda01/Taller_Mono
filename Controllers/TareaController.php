<?php
require_once __DIR__ . '/Taller/models/Tarea.php';
class TareaController {
    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tarea = new Tarea();
            $tarea->titulo = $_POST['titulo'];
            $tarea->descripcion = $_POST['descripcion'];
            $tarea->fechaCreacion = date('Y-m-d H:i:s');
            $tarea->idEmpleado = $_POST['idEmpleado'];
            $tarea->idEstado = $_POST['idEstado'];
            $tarea->idPrioridad = $_POST['idPrioridad'];
            $tarea->creadorTarea = $_POST['creadorTarea'];
            $tarea->fechaEstimadaFinalizacion = $_POST['fechaEstimadaFinalizacion'];

            if ($tarea->crearTarea()) {
                echo "Tarea creada exitosamente.";
            } else {
                echo "Error al crear la tarea.";
            }
        }
    }

    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tarea = new Tarea();
            $tarea->id = $_POST['id'];
            $tarea->titulo = $_POST['titulo'];
            $tarea->descripcion = $_POST['descripcion'];
            $tarea->idEmpleado = $_POST['idEmpleado'];
            $tarea->idEstado = $_POST['idEstado'];
            $tarea->idPrioridad = $_POST['idPrioridad'];
            $tarea->creadorTarea = $_POST['creadorTarea'];
            $tarea->fechaEstimadaFinalizacion = $_POST['fechaEstimadaFinalizacion'];
            $tarea->fechaFinalizacion = $_POST['fechaFinalizacion'];

            if ($tarea->actualizarTarea()) {
                echo "Tarea actualizada exitosamente.";
            } else {
                echo "Error al actualizar la tarea.";
            }
        }
    }

    public function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tarea = new Tarea();
            $tarea->id = $_POST['id'];

            if ($tarea->eliminarTarea()) {
                echo "Tarea eliminada exitosamente.";
            } else {
                echo "Error al eliminar la tarea.";
            }
        }
    }

    public function listar() {
        $tarea = new Tarea();
        $prioridad = isset($_GET['prioridad']) ? $_GET['prioridad'] : null;
        $fechaInicio = isset($_GET['fechaInicio']) ? $_GET['fechaInicio'] : null;
        $fechaFin = isset($_GET['fechaFin']) ? $_GET['fechaFin'] : null;
        $responsable = isset($_GET['responsable']) ? $_GET['responsable'] : null;

        $result = $tarea->listarTareas($prioridad, $fechaInicio, $fechaFin, $responsable);

        while ($row = $result->fetch_assoc()) {
            echo "<p>Tarea: " . $row['titulo'] . " - Estado: " . $row['idEstado'] . "</p>";
        }
    }

    public function cambiarEstado() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tarea = new Tarea();
            $tarea->id = $_POST['id'];
            $nuevoEstado = $_POST['nuevoEstado'];

            if ($tarea->cambiarEstadoTarea($nuevoEstado)) {
                echo "Estado de la tarea actualizado exitosamente.";
            } else {
                echo "Error al actualizar el estado de la tarea.";
            }
        }
    }
}
?>