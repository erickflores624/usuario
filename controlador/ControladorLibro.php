<?php
require_once __DIR__ . '/../modelo/Database2.php';

class ControladorLibro {

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getDb() {
        return $this->db;
    }

    public function obtenerLibros() {
        $sql = "SELECT l.id_libro, l.titulo, a.nombre AS autor, c.categoria AS genero, l.año_publicacion 
                FROM Libros l
                JOIN Autores a ON l.id_autor = a.id_autor
                JOIN Categorias c ON l.id_categoria = c.id_categoria";

        $result = $this->getDb()->conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                echo "<tr>
                        <td>{$row['id_libro']}</td>
                        <td>{$row['titulo']}</td>
                        <td>{$row['autor']}</td>
                        <td>{$row['genero']}</td>
                        <td>{$row['año_publicacion']}</td>
                      </tr>";                              
            }         
        } else {
            echo "<tr><td colspan='5'>No hay libros registrados</td></tr>";
        }
    }

    public function registrarLibro($titulo, $anio_publicacion, $id_autor, $id_categoria) {
        $sql = "INSERT INTO Libros (titulo, año_publicacion, id_autor, id_categoria)
                VALUES (?, ?, ?, ?)";

        $stmt = $this->getDb()->conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssii", $titulo, $anio_publicacion, $id_autor, $id_categoria);

            if($stmt->execute()) {
                header('Location:../vista/public/vistaLibros.php?msg=' . urldecode('Libro registrado exitosamente!!!!'));
            } else {
                header('Location:../vista/public/vistaLibros.php?msg=' . urldecode('Error al registrar el libro'));
                echo "Error al registrar el libro: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error al preparar la consulta: " . $this->getDb()->conn->error;
        }
    }   
}

if ($_SERVER["REQUEST_METHOD"] === "POST"){

    $controlador = new ControladorLibro();

    // Asumiendo que estos datos provienen del formulario:
    $titulo          = $controlador->getDb()->conn->real_escape_string($_POST['titulo']);
    $anio_publicacion= $controlador->getDb()->conn->real_escape_string($_POST['anio_publicacion']);
    $id_autor        = $controlador->getDb()->conn->real_escape_string($_POST['id_autor']);
    $id_categoria    = $controlador->getDb()->conn->real_escape_string($_POST['id_categoria']);

    if (empty($titulo) || empty($anio_publicacion) || empty($id_autor) || empty($id_categoria)) {
        header('Location:../vista/public/registrarLibro.php?msg=' . urldecode('Todos los campos son obligatorios'));
    } else {
        $controlador->registrarLibro($titulo, $anio_publicacion, $id_autor, $id_categoria);
    }
}
?>
