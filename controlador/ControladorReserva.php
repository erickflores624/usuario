<?php
require_once __DIR__ . '/../modelo/Database3.php';

class ControladorReserva {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getDb() {
        return $this->db;
    }

    public function obtenerReservas() {
        $sql = "SELECT r.id_reserva, c.nombre_cliente, h.numero_habitacion, r.fecha_reserva
                FROM Reservas r
                JOIN Clientes c ON r.id_cliente = c.id_cliente
                JOIN Habitaciones h ON r.id_habitacion = h.id_habitacion";
        $result = $this->getDb()->conn->query($sql);
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id_reserva']}</td>
                        <td>{$row['nombre_cliente']}</td>
                        <td>{$row['numero_habitacion']}</td>
                        <td>{$row['fecha_reserva']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No hay reservas registradas</td></tr>";
        }
    }

    public function registrarReserva($id_cliente, $id_habitacion, $fecha_reserva) {
        $sql = "INSERT INTO Reservas (id_cliente, id_habitacion, fecha_reserva) VALUES (?, ?, ?)";
        $stmt = $this->getDb()->conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("iis", $id_cliente, $id_habitacion, $fecha_reserva);
            if($stmt->execute()) {
                header('Location:../vista/public/vistaReservas.php?msg=' . urlencode('Reserva registrada exitosamente!!!!'));
            } else {
                header('Location:../vista/public/vistaReservas.php?msg=' . urlencode('Error al registrar la reserva'));
            }
            $stmt->close();
        } else {
            echo "Error al preparar la consulta: " . $this->getDb()->conn->error;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $controlador = new ControladorReserva();

    // Obtener datos del formulario
    $id_cliente      = $controlador->getDb()->conn->real_escape_string($_POST['id_cliente']);
    $id_habitacion   = $controlador->getDb()->conn->real_escape_string($_POST['id_habitacion']);
    $fecha_reserva   = $controlador->getDb()->conn->real_escape_string($_POST['fecha_reserva']);

    if (empty($id_cliente) || empty($id_habitacion) || empty($fecha_reserva)) {
        header('Location:../vista/public/registrarReserva.php?msg=' . urlencode('Todos los campos son obligatorios'));
    } else {
        $controlador->registrarReserva($id_cliente, $id_habitacion, $fecha_reserva);
    }
}
?>
