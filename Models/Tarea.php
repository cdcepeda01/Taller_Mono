<?php
require_once 'config/database.php';

class Tarea {
    private $conn;
    private $table_name = "tareas";

    public $id;
    public $titulo;
    public $descripcion;
    public $fechaCreacion;
    public $fechaModificacion;
    public $fechaEstimadaFinalizacion;
    public $fechaFinalizacion;
    public $creadorTarea;
    public $observaciones;
    public $idEmpleado;
    public $idEstado;
    public $idPrioridad;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function crearTarea() {
        $query = "INSERT INTO " . $this->table_name . " (titulo, descripcion, fechaCreacion, idEmpleado, idEstado, idPrioridad, creadorTarea, fechaEstimadaFinalizacion) VALUES ('" . $this->titulo . "', '" . $this->descripcion . "', '" . $this->fechaCreacion . "', '" . $this->idEmpleado . "', '" . $this->idEstado . "', '" . $this->idPrioridad . "', '" . $this->creadorTarea . "', '" . $this->fechaEstimadaFinalizacion . "')";

        if ($this->conn->query($query) === TRUE) {
            return true;
        } else {
            echo "Error al crear la tarea: " . $this->conn->error;
            return false;
        }
    }

    public function actualizarTarea() {
        $query = "UPDATE " . $this->table_name . " SET titulo='" . $this->titulo . "', descripcion='" . $this->descripcion . "', fechaModificacion='" . date('Y-m-d H:i:s') . "', idEmpleado='" . $this->idEmpleado . "', idEstado='" . $this->idEstado . "', idPrioridad='" . $this->idPrioridad . "', creadorTarea='" . $this->creadorTarea . "', fechaEstimadaFinalizacion='" . $this->fechaEstimadaFinalizacion . "', fechaFinalizacion='" . $this->fechaFinalizacion . "' WHERE id='" . $this->id . "'";

        if ($this->conn->query($query) === TRUE) {
            return true;
        } else {
            echo "Error al actualizar la tarea: " . $this->conn->error;
            return false;
        }
    }

    public function eliminarTarea() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id='" . $this->id . "'";

        if ($this->conn->query($query) === TRUE) {
            return true;
        } else {
            echo "Error al eliminar la tarea: " . $this->conn->error;
            return false;
        }
    }

    public function listarTareas($prioridad = null, $fechaInicio = null, $fechaFin = null, $responsable = null) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE 1=1";

        if ($prioridad) {
            $query .= " AND idPrioridad='" . $prioridad . "'";
        }

        if ($fechaInicio && $fechaFin) {
            $query .= " AND fechaEstimadaFinalizacion BETWEEN '" . $fechaInicio . "' AND '" . $fechaFin . "'";
        }

        if ($responsable) {
            $query .= " AND idEmpleado='" . $responsable . "'";
        }

        $query .= " ORDER BY idPrioridad, fechaEstimadaFinalizacion";

        $result = $this->conn->query($query);
        return $result;
    }

    public function cambiarEstadoTarea($nuevoEstado) {
        $query = "UPDATE " . $this->table_name . " SET idEstado='" . $nuevoEstado . "', fechaModificacion='" . date('Y-m-d H:i:s') . "' WHERE id='" . $this->id . "'";

        if ($this->conn->query($query) === TRUE) {
            return true;
        } else {
            echo "Error al cambiar el estado de la tarea: " . $this->conn->error;
            return false;
        }
    }
}
?>