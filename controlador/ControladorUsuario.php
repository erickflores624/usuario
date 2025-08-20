<?php
require_once __DIR__ . '/../modelo/Database1.php';

class ControladorUsuario {

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getDb() {
        return $this->db;
    }

    // ================== LISTAR USUARIOS ==================
    public function obtenerUsuarios() {
        $sql = "SELECT u.id_usuario, u.apaterno, u.amaterno, u.nombres, u.usuario, u.password, c.cargo
                FROM usuarios u
                JOIN cargos c ON u.id_cargo_fk = c.id_cargo";

        $result = $this->getDb()->conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                echo "<tr>
                        <td>{$row['id_usuario']}</td>
                        <td>{$row['nombres']}</td>
                        <td>{$row['apaterno']}</td>
                        <td>{$row['amaterno']}</td>
                        <td>{$row['usuario']}</td>
                        <td>{$row['password']}</td>
                        <td>{$row['cargo']}</td>
                        <td>
                            <a href='editarUsuario.php?id={$row['id_usuario']}' class='btn btn-warning btn-sm'>Editar</a>
                            <a href='../../controlador/ControladorUsuario.php?eliminar={$row['id_usuario']}' 
                               class='btn btn-danger btn-sm'
                               onclick=\"return confirm('¿Seguro que deseas eliminar este usuario?');\">
                               Eliminar
                            </a>
                        </td>
                      </tr>";                              
            }         
        } else {
            echo "<tr><td colspan='8'>0 Resultados</td></tr>";
        }
    }

    // ================== REGISTRAR ==================
    public function registrarUsuario($nombres, $apaterno, $amaterno, $usuario, $password, $id_cargo_fk) {
        $sql = "INSERT INTO usuarios (nombres, apaterno, amaterno, usuario, password, id_cargo_fk)
                VALUES (?,?,?,?,?,?)";

        $stmt = $this->getDb()->conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sssssi", $nombres, $apaterno, $amaterno, $usuario, $password, $id_cargo_fk);
            
            if($stmt->execute()) {
                header('Location:../vista/public/vistaUsuarios.php?msg=' . urldecode('Usuario registrado exitosamente!!!!'));
            } else {
                header('Location:../vista/public/vistaUsuarios.php?msg=' . urldecode('Error al registrar el usuario: '));
            }

            $stmt->close();
        } else {
            echo "Error al preparar la consulta: " . $this->getDb()->conn->error;
        }
    }   

    // ================== OBTENER USUARIO POR ID (para editar) ==================
    public function obtenerUsuarioPorId($id_usuario) {
        $sql = "SELECT * FROM usuarios WHERE id_usuario = ?";
        $stmt = $this->getDb()->conn->prepare($sql);
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // ================== EDITAR ==================
    public function editarUsuario($id_usuario, $nombres, $apaterno, $amaterno, $usuario, $password, $id_cargo_fk) {
        $sql = "UPDATE usuarios 
                SET nombres=?, apaterno=?, amaterno=?, usuario=?, password=?, id_cargo_fk=? 
                WHERE id_usuario=?";
        $stmt = $this->getDb()->conn->prepare($sql);
        $stmt->bind_param("sssssii", $nombres, $apaterno, $amaterno, $usuario, $password, $id_cargo_fk, $id_usuario);
        
        if ($stmt->execute()) {
            header("Location: ../vista/public/vistaUsuarios.php?msg=" . urlencode("Usuario actualizado correctamente."));
        } else {
            header("Location: ../vista/public/vistaUsuarios.php?msg=" . urlencode("Error al actualizar usuario."));
        }
    }

    // ================== ELIMINAR ==================
    public function eliminarUsuario($id_usuario) {
        $sql = "DELETE FROM usuarios WHERE id_usuario = ?";
        $stmt = $this->getDb()->conn->prepare($sql);
        $stmt->bind_param("i", $id_usuario);

        if ($stmt->execute()) {
            header("Location: ../vista/public/vistaUsuarios.php?msg=" . urlencode("Usuario eliminado correctamente."));
        } else {
            header("Location: ../vista/public/vistaUsuarios.php?msg=" . urlencode("Error al eliminar usuario."));
        }
    }
}

# ================== MANEJO DE PETICIONES ==================

// Crear usuario
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['registrar'])) {
    $controlador = new ControladorUsuario();

    $nombres     = $_POST['nombres'];
    $apaterno    = $_POST['apaterno'];
    $amaterno    = $_POST['amaterno'];
    $usuario     = $_POST['usuario'];
    $password    = $_POST['password'];
    $id_cargo_fk = $_POST['id_cargo_fk'];

    if (empty($nombres) || empty($apaterno) || empty($amaterno) || empty($usuario) || empty($password) || empty($id_cargo_fk)) {
        header('Location:../vista/public/registrarUsuario.php?msg=' . urldecode('Todos los campos son obligatorios'));
    } else {
        $controlador->registrarUsuario($nombres, $apaterno, $amaterno, $usuario, $password, $id_cargo_fk);
    }
}

// Editar usuario
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['editar'])) {
    $controlador = new ControladorUsuario();
    $controlador->editarUsuario(
        $_POST['id_usuario'],
        $_POST['nombres'],
        $_POST['apaterno'],
        $_POST['amaterno'],
        $_POST['usuario'],
        $_POST['password'],
        $_POST['id_cargo_fk']
    );
}

// Eliminar usuario
if (isset($_GET['eliminar'])) {
    $controlador = new ControladorUsuario();
    $controlador->eliminarUsuario($_GET['eliminar']);
}
?>
