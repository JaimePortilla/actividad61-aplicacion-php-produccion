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

$stmt = $pdo->prepare("DELETE FROM agentes WHERE agente_id = ?");
$stmt->execute([$id]);

header('Location: home.php');
exit;
