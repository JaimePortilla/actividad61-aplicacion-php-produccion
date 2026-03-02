<?php
session_start();
require 'config.php';

$nombre   = trim($_POST['nombre_usuario'] ?? '');
$correo   = trim($_POST['correo'] ?? '');
$password = $_POST['contraseña'] ?? '';
 $password2 = $_POST['contraseña2'] ?? '';

if ($nombre === '' || $correo === '' || $password === '' || $password2 === '') {
    $_SESSION['registro_error'] = 'Todos los campos son obligatorios.';
    header('Location: registro.php');
    exit;
}

if ($password !== $password2) {
    $_SESSION['registro_error'] = 'Las contraseñas no coinciden.';
    header('Location: registro.php');
    exit;
}

// Comprobar si el correo ya existe
$stmt = $pdo->prepare("SELECT usuario_id FROM usuarios WHERE correo = ?");
$stmt->execute([$correo]);
if ($stmt->fetch()) {
    $_SESSION['registro_error'] = 'El correo ya está registrado.';
    header('Location: registro.php');
    exit;
}

// Hashear contraseña
$hash = password_hash($password, PASSWORD_DEFAULT);

// Insertar usuario
$stmt = $pdo->prepare("
    INSERT INTO usuarios (nombre_usuario, correo, contraseña)
    VALUES (?, ?, ?)
");
$stmt->execute([$nombre, $correo, $hash]);

// Opcional: iniciar sesión automáticamente tras registro
$_SESSION['usuario_id'] = $pdo->lastInsertId();
$_SESSION['nombre_usuario'] = $nombre;

header('Location: home.php');
exit;
