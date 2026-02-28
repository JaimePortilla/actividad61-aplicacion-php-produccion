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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar agente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h1 class="mb-4">Editar agente #<?php echo $agente['agente_id']; ?></h1>
    <p><a href="home.php" class="btn btn-secondary mb-3">Volver al listado</a></p>

    <form action="edit_action.php?id=<?php echo $agente['agente_id']; ?>" method="post" class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo htmlspecialchars($agente['nombre']); ?>" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Rol:</label>
            <input type="text" name="rol" value="<?php echo htmlspecialchars($agente['rol']); ?>" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">País:</label>
            <input type="text" name="pais" value="<?php echo htmlspecialchars($agente['pais']); ?>" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Año de lanzamiento:</label>
            <input type="number" name="anio_lanzamiento" value="<?php echo $agente['anio_lanzamiento']; ?>" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Dificultad (1-5):</label>
            <input type="number" name="dificultad" value="<?php echo $agente['dificultad']; ?>" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Ultimate:</label>
            <input type="text" name="ultimate" value="<?php echo htmlspecialchars($agente['ultimate']); ?>" class="form-control" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
