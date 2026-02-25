<?php
session_start();
require 'config.php';

$correo   = trim($_POST['correo'] ?? '');
$password = $_POST['contraseña'] ?? '';

if ($correo === '' || $password === '') {
    $_SESSION['login_error'] = 'Debes introducir correo y contraseña.';
    header('Location: login.php');
    exit;
}

// Buscar usuario por correo
$stmt = $pdo->prepare("SELECT usuario_id, nombre_usuario, contraseña FROM usuarios WHERE correo = ?");
$stmt->execute([$correo]);
$usuario = $stmt->fetch();

if (!$usuario || !password_verify($password, $usuario['contraseña'])) {
    $_SESSION['login_error'] = 'Credenciales incorrectas.';
    header('Location: login.php');
    exit;
}

// Login correcto
$_SESSION['usuario_id'] = $usuario['usuario_id'];
$_SESSION['nombre_usuario'] = $usuario['nombre_usuario'];

header('Location: home.php');
exit;
