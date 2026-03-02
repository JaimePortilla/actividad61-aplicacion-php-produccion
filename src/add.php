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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir agente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h1 class="mb-4">Añadir agente</h1>
    <p><a href="home.php" class="btn btn-secondary mb-3">Volver al listado</a></p>

    <form action="add_action.php" method="post" class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Rol:</label>
            <input type="text" name="rol" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">País:</label>
            <input type="text" name="pais" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Año de lanzamiento:</label>
            <input type="number" name="anio_lanzamiento" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Dificultad (1-5):</label>
            <input type="number" name="dificultad" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Ultimate:</label>
            <input type="text" name="ultimate" class="form-control" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
