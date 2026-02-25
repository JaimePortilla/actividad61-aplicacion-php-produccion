<?php
session_start();
if (empty($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}
require 'config.php';

$id = (int)($_GET['id'] ?? 0);
if ($id <= 0) {
    die('ID inválido.');
}

$stmt = $pdo->prepare("SELECT * FROM agentes WHERE agente_id = ?");
$stmt->execute([$id]);
$agente = $stmt->fetch();

if (!$agente) {
    die('Agente no encontrado.');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar agente</title>
</head>
<body>
    <h1>Editar agente #<?php echo $agente['agente_id']; ?></h1>
    <p><a href="home.php">Volver al listado</a></p>

    <form action="edit_action.php?id=<?php echo $agente['agente_id']; ?>" method="post">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($agente['nombre']); ?>" required><br><br>

        <label>Rol:</label><br>
        <input type="text" name="rol" value="<?php echo htmlspecialchars($agente['rol']); ?>" required><br><br>

        <label>País:</label><br>
        <input type="text" name="pais" value="<?php echo htmlspecialchars($agente['pais']); ?>" required><br><br>

        <label>Año de lanzamiento:</label><br>
        <input type="number" name="anio_lanzamiento" value="<?php echo $agente['anio_lanzamiento']; ?>" required><br><br>

        <label>Dificultad (1-5):</label><br>
        <input type="number" name="dificultad" value="<?php echo $agente['dificultad']; ?>" required><br><br>

        <label>Ultimate:</label><br>
        <input type="text" name="ultimate" value="<?php echo htmlspecialchars($agente['ultimate']); ?>" required><br><br>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
