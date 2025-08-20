<?php
require_once '../../controlador/ControladorUsuario.php';
$controlador = new ControladorUsuario();

if (isset($_GET['id'])) {
    $usuario = $controlador->obtenerUsuarioPorId($_GET['id']);
    if (!$usuario) {
        header("Location: vistaUsuarios.php?msg=" . urlencode("Usuario no encontrado."));
        exit;
    }
} else {
    header("Location: vistaUsuarios.php?msg=" . urlencode("Usuario no encontrado."));
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-dark bg-gradient vh-100">
    <div class="container bg-light p-5 rounded mt-4">
        <h2 class="mb-4">Editar Usuario</h2>
        <form method="POST" action="../../controlador/ControladorUsuario.php">
            <!-- ID oculto -->
            <input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario']; ?>">
            
            <div class="mb-3">
                <label>Nombres</label>
                <input type="text" name="nombres" class="form-control" 
                       value="<?php echo $usuario['nombres']; ?>" required>
            </div>
            <div class="mb-3">
                <label>Apellido Paterno</label>
                <input type="text" name="apaterno" class="form-control" 
                       value="<?php echo $usuario['apaterno']; ?>" required>
            </div>
            <div class="mb-3">
                <label>Apellido Materno</label>
                <input type="text" name="amaterno" class="form-control" 
                       value="<?php echo $usuario['amaterno']; ?>" required>
            </div>
            <div class="mb-3">
                <label>Usuario</label>
                <input type="text" name="usuario" class="form-control" 
                       value="<?php echo $usuario['usuario']; ?>" required>
            </div>
            <div class="mb-3">
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control" 
                       value="<?php echo $usuario['password']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="id_cargo_fk" class="form-label">Cargo:</label>
                <select class="form-select" name="id_cargo_fk" id="id_cargo_fk" required>
                    <option value="" disabled>Seleccione el cargo</option>
                    <option value="1" <?php echo ($usuario['id_cargo_fk'] == 1) ? 'selected' : ''; ?>>Administrador</option>
                    <option value="2" <?php echo ($usuario['id_cargo_fk'] == 2) ? 'selected' : ''; ?>>Colaborador</option>
                    <option value="3" <?php echo ($usuario['id_cargo_fk'] == 3) ? 'selected' : ''; ?>>Invitado</option>
                </select>
            </div>
            
            <button type="submit" name="editar" class="btn btn-primary">Guardar Cambios</button>
            <a href="vistaUsuarios.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
