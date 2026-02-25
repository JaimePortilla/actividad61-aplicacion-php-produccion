<?php
session_start();
if (empty($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir agente</title>
</head>
<body>
    <h1>Añadir agente</h1>
    <p><a href="home.php">Volver al listado</a></p>

    <form action="add_action.php" method="post">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Rol:</label><br>
        <input type="text" name="rol" required><br><br>

        <label>País:</label><br>
        <input type="text" name="pais" required><br><br>

        <label>Año de lanzamiento:</label><br>
        <input type="number" name="anio_lanzamiento" required><br><br>

        <label>Dificultad (1-5):</label><br>
        <input type="number" name="dificultad" required><br><br>

        <label>Ultimate:</label><br>
        <input type="text" name="ultimate" required><br><br>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>
