<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h1 class="mb-4">Registro</h1>

    <?php if (!empty($_SESSION['registro_error'])): ?>
        <div class="alert alert-danger">
            <?php echo $_SESSION['registro_error']; unset($_SESSION['registro_error']); ?>
        </div>
    <?php endif; ?>

    <form action="registro_action.php" method="post" class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Nombre de usuario:</label>
            <input type="text" name="nombre_usuario" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Correo:</label>
            <input type="email" name="correo" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Contraseña:</label>
            <input type="password" name="contraseña" class="form-control" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </div>
    </form>

    <p class="mt-3">¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
