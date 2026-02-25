<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de usuario</title>
</head>
<body>
    <h1>Registro</h1>

    <?php if (!empty($_SESSION['registro_error'])): ?>
        <p style="color:red;"><?php echo $_SESSION['registro_error']; unset($_SESSION['registro_error']); ?></p>
    <?php endif; ?>

    <form action="registro_action.php" method="post">
        <label>Nombre de usuario:</label><br>
        <input type="text" name="nombre_usuario" required><br><br>

        <label>Correo:</label><br>
        <input type="email" name="correo" required><br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="contraseña" required><br><br>

        <button type="submit">Registrarse</button>
    </form>

    <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
</body>
</html>
