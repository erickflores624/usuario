<?php
require_once __DIR__ . '/../modelo/Database.php';

class ControladorVenta {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getDb() {
        return $this->db;
    }

    // Función para obtener todas las ventas con información del cliente, producto, vendedor, etc.
    public function obtenerVentas() {
        $sql = "SELECT v.id, c.nombre AS nombre_cliente, p.nombre AS nombre_producto, v.cantidad, v.fecha, 
                       ve.nombre AS nombre_vendedor 
                FROM ventas v
                JOIN clientes c ON v.id_cliente = c.id
                JOIN productos p ON v.id_producto = p.id
                JOIN vendedores ve ON v.id_vendedor = ve.id";
        $result = $this->getDb()->conn->query($sql);
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['nombre_cliente']}</td>
                        <td>{$row['nombre_producto']}</td>
                        <td>{$row['cantidad']}</td>
                        <td>{$row['nombre_vendedor']}</td>
                        <td>{$row['fecha']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No hay ventas registradas</td></tr>";
        }
    }

    // Función para registrar una venta
    public function registrarVenta($id_vendedor, $id_cliente, $id_producto, $cantidad, $fecha) {
        $sql = "INSERT INTO ventas (id_vendedor, id_cliente, id_producto, cantidad, fecha) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->getDb()->conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("iiiss", $id_vendedor, $id_cliente, $id_producto, $cantidad, $fecha);
            if($stmt->execute()) {
                header('Location:../vista/public/vistaVentas.php?msg=' . urlencode('Venta registrada exitosamente.'));
            } else {
                header('Location:../vista/public/vistaVentas.php?msg=' . urlencode('Error al registrar la venta.'));
            }
            $stmt->close();
        } else {
            echo "Error al preparar la consulta: " . $this->getDb()->conn->error;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $controlador = new ControladorVenta();

    // Obtener datos del formulario
    $id_vendedor  = $controlador->getDb()->conn->real_escape_string($_POST['id_vendedor']);
    $id_cliente   = $controlador->getDb()->conn->real_escape_string($_POST['id_cliente']);
    $id_producto  = $controlador->getDb()->conn->real_escape_string($_POST['id_producto']);
    $cantidad     = $controlador->getDb()->conn->real_escape_string($_POST['cantidad']);
    $fecha        = $controlador->getDb()->conn->real_escape_string($_POST['fecha']);

    if (empty($id_vendedor) || empty($id_cliente) || empty($id_producto) || empty($cantidad) || empty($fecha)) {
        header('Location:../vista/public/registrarVenta.php?msg=' . urlencode('Todos los campos son obligatorios.'));
    } else {
        $controlador->registrarVenta($id_vendedor, $id_cliente, $id_producto, $cantidad, $fecha);
    }
}
?>
