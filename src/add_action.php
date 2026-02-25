<?php
session_start();
if (empty($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}
require 'config.php';

$nombre    = trim($_POST['nombre'] ?? '');
$rol       = trim($_POST['rol'] ?? '');
$pais      = trim($_POST['pais'] ?? '');
$anio_lanzamiento = (int)($_POST['anio_lanzamiento'] ?? 0);
$dificultad = (int)($_POST['dificultad'] ?? 0);
$ultimate  = trim($_POST['ultimate'] ?? '');

if ($nombre === '' || $rol === '' || $pais === '' || !$anio_lanzamiento || !$dificultad || $ultimate === '') {
    die('Faltan datos obligatorios.');
}

try {
    $stmt = $pdo->prepare("
        INSERT INTO agentes (nombre, rol, pais, anio_lanzamiento, dificultad, ultimate)
        VALUES (?, ?, ?, ?, ?, ?)
    ");
    $stmt->execute([$nombre, $rol, $pais, $anio_lanzamiento, $dificultad, $ultimate]);
} catch (PDOException $e) {
    // Por ejemplo, nombre duplicado (ya que es UNIQUE)
    die('Error al insertar: ' . $e->getMessage());
}

header('Location: home.php');
exit;
