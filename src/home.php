<?php
session_start();
if (empty($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}
require 'config.php';

// Obtener todos los agentes
$stmt = $pdo->query("SELECT * FROM agentes ORDER BY agente_id DESC");
$agentes = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VALORANT / Protocolo de Agentes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;700&family=Rajdhani:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --val-red: #ff4655;
            --val-dark: #0f1923;
            --val-black: #0b141a;
            --val-gray: #ece8e1;
            --val-blue: #00eeff;
            --val-surface: rgba(26, 37, 46, 0.9);
        }

        body {
            background-color: var(--val-black);
            /* Imagen de fondo opcional con capa oscura */
            background-image: linear-gradient(rgba(11, 20, 26, 0.9), rgba(11, 20, 26, 0.9)), url('img/valorant_bg.jpg');
            background-size: cover;
            background-attachment: fixed;
            color: var(--val-gray);
            font-family: 'Rajdhani', sans-serif;
            padding: 2rem;
        }

        /* Cabecera */
        .header-main {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(255, 70, 85, 0.3);
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        h1 {
            font-family: 'Oswald', sans-serif;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 2px;
            margin: 0;
        }

        .btn-logout {
            color: var(--val-red);
            text-decoration: none;
            border: 1px solid var(--val-red);
            padding: 5px 15px;
            font-weight: 700;
            text-transform: uppercase;
            transition: 0.3s;
        }

        .btn-logout:hover {
            background: var(--val-red);
            color: white;
        }

        /* Botón Añadir */
        .btn-add-agent {
            background: var(--val-red);
            color: white;
            text-decoration: none;
            padding: 12px 25px;
            font-family: 'Oswald', sans-serif;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: inline-block;
            margin-bottom: 25px;
            transition: 0.3s;
            clip-path: polygon(0 0, 100% 0, 100% 70%, 90% 100%, 0 100%);
        }

        .btn-add-agent:hover {
            background: white;
            color: var(--val-dark);
            transform: translateY(-2px);
        }

        /* Tabla Estilo Valorant */
        .table-custom {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
        }

        .table-custom thead th {
            font-family: 'Oswald', sans-serif;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.8rem;
            letter-spacing: 2px;
            padding: 10px 20px;
            border: none;
        }

        .table-custom tbody tr {
            background-color: var(--val-surface);
            transition: 0.2s;
        }

        .table-custom tbody tr:hover {
            background-color: #24343f;
            outline: 1px solid var(--val-blue);
        }

        .table-custom td {
            padding: 20px;
            border: none;
        }

        /* Celdas específicas */
        .agent-name {
            color: var(--val-blue);
            font-weight: 700;
            font-size: 1.2rem;
            text-transform: uppercase;
        }

        .role-badge {
            border: 1px solid var(--val-gray);
            padding: 4px 10px;
            font-size: 0.7rem;
            text-transform: uppercase;
            font-weight: 700;
            color: var(--val-gray);
        }

        /* Barras de dificultad */
        .diff-container {
            width: 80px;
            height: 6px;
            background: #0b141a;
            border: 1px solid rgba(255,255,255,0.1);
        }

        .diff-bar {
            height: 100%;
            background: var(--val-red);
            box-shadow: 0 0 10px var(--val-red);
        }

        .ultimate-text {
            color: var(--val-blue);
            font-style: italic;
            font-weight: 500;
        }

        .action-links a {
            color: var(--val-gray);
            text-decoration: none;
            margin: 0 10px;
            font-size: 0.8rem;
            text-transform: uppercase;
            opacity: 0.6;
            transition: 0.3s;
        }

        .action-links a:hover {
            opacity: 1;
            color: var(--val-blue);
        }

        .link-delete:hover {
            color: var(--val-red) !important;
        }
    </style>
</head>
<body>

<div class="container-fluid px-5">
    <header class="header-main">
        <div>
            <h1>Protocolo Valorant // Agentes</h1>
            <span style="color: var(--val-red); font-size: 0.8rem; letter-spacing: 2px;">IDENTIFICADOR: <?php echo htmlspecialchars($_SESSION['nombre_usuario']); ?></span>
        </div>
        <a href="logout.php" class="btn-logout">Cerrar Sesión</a>
    </header>

    <a href="add.php" class="btn-add-agent">+ Reclutar Nuevo Agente</a>

    <table class="table-custom">
        <thead>
            <tr>
                <th>ID</th>
                <th>Agente</th>
                <th>Rol</th>
                <th>Origen</th>
                <th>Año</th>
                <th>Dificultad</th>
                <th>Definitiva</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($agentes as $a): ?>
                <tr>
                    <td style="opacity: 0.3; font-family: monospace;">#<?php echo $a['agente_id']; ?></td>
                    <td><span class="agent-name"><?php echo htmlspecialchars($a['nombre']); ?></span></td>
                    <td><span class="role-badge"><?php echo htmlspecialchars($a['rol']); ?></span></td>
                    <td><?php echo htmlspecialchars($a['pais']); ?></td>
                    <td><?php echo $a['anio_lanzamiento']; ?></td>
                    <td>
                        <div class="diff-container">
                            <div class="diff-bar" style="width: <?php echo ($a['dificultad'] * 33.3); ?>%;"></div>
                        </div>
                    </td>
                    <td><span class="ultimate-text">// <?php echo htmlspecialchars($a['ultimate']); ?></span></td>
                    <td class="action-links text-center">
                        <a href="edit.php?id=<?php echo $a['agente_id']; ?>">Editar</a>
                        <a href="delete.php?id=<?php echo $a['agente_id']; ?>" 
                           class="link-delete" 
                           onclick="return confirm('¿Seguro que quieres eliminar este agente?');">
                           Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>