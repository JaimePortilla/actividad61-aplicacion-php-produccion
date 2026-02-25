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
        UPDATE agentes
        SET nombre = ?, rol = ?, pais = ?, anio_lanzamiento = ?, dificultad = ?, ultimate = ?
        WHERE agente_id = ?
    ");
    $stmt->execute([$nombre, $rol, $pais, $anio_lanzamiento, $dificultad, $ultimate, $id]);
} catch (PDOException $e) {
    die('Error al actualizar: ' . $e->getMessage());
}

header('Location: home.php');
exit;
