<?php
// index.php
session_start();
include_once("config.php");

if (isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VALORANT // AGENT HUB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&family=Rajdhani:wght@500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --val-red: #ff4655;
            --val-dark: #0f1923;
            --val-blue: #00eeff;
        }

        body {
            background: var(--val-dark);
            color: #ece8e1;
            font-family: 'Rajdhani', sans-serif;
            margin: 0;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        /* Capa de fondo con efecto de escaneo */
        body::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: linear-gradient(rgba(15, 25, 35, 0.7), rgba(15, 25, 35, 0.7)), url('img/valorant_bg.jpg');
            background-size: cover;
            background-position: center;
            z-index: -1;
        }

        .main-container {
            border: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(15, 25, 35, 0.85);
            backdrop-filter: blur(10px);
            padding: 50px;
            position: relative;
            max-width: 500px;
            width: 100%;
            clip-path: polygon(0 0, 100% 0, 100% 90%, 90% 100%, 0 100%); /* Esquina cortada estilo Riot */
        }

        .accent-line {
            position: absolute;
            top: 0;
            left: 0;
            width: 50px;
            height: 4px;
            background: var(--val-red);
        }

        .glitch-title {
            font-family: 'Oswald', sans-serif;
            font-size: 3rem;
            font-weight: 700;
            text-transform: uppercase;
            line-height: 1;
            margin-bottom: 5px;
            color: white;
            letter-spacing: -1px;
        }

        .subtitle {
            color: var(--val-blue);
            text-transform: uppercase;
            letter-spacing: 4px;
            font-size: 0.9rem;
            margin-bottom: 40px;
            display: block;
        }

        .btn-val {
            border-radius: 0;
            padding: 15px 25px;
            font-weight: 700;
            text-transform: uppercase;
            transition: 0.3s;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,0.2);
        }

        .btn-login {
            background: var(--val-red);
            color: white;
            border: none;
            width: 100%;
            margin-bottom: 15px;
        }

        .btn-login:hover {
            background: white;
            color: var(--val-dark);
        }

        .btn-reg {
            background: transparent;
            color: white;
            width: 100%;
        }

        .btn-reg:hover {
            background: rgba(255,255,255,0.1);
            color: var(--val-blue);
        }

        .footer-text {
            margin-top: 40px;
            font-size: 0.75rem;
            text-transform: uppercase;
            color: rgba(255,255,255,0.4);
            letter-spacing: 2px;
        }

        /* Elemento decorativo extra */
        .decor {
            position: absolute;
            bottom: 20px;
            right: 20px;
            font-size: 0.6rem;
            color: var(--val-red);
        }
    </style>
</head>
<body>

<div class="main-container">
    <div class="accent-line"></div>
    
    <header>
        <span class="subtitle">Secure Connection // Database</span>
        <h1 class="glitch-title">VALORANT<br>AG!!NTS</h1>
    </header>

    <div class="mt-4">
        <a href="login.php" class="btn btn-val btn-login">Iniciar Sesión</a>
        <a href="registro.php" class="btn btn-val btn-reg">Registrar Usuario</a>
    </div>

    <footer class="footer-text">
        Identificador: J.PORTILLA // ACCESO NIVEL 4
    </footer>

    <div class="decor">VLRNT_SYS_2026</div>
</div>

</body>
</html>