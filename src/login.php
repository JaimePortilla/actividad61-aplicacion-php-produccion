<?php
session_start();

// Si ya está logueado, redirigir
if (!empty($_SESSION['usuario_id'])) {
    header('Location: home.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VALORANT // LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;700&family=Rajdhani:wght@500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --val-red: #ff4655;
            --val-dark: #0f1923;
            --val-black: #0b141a;
            --val-gray: #ece8e1;
            --val-blue: #00eeff;
        }

        body {
            background-color: var(--val-black);
            background-image: 
                linear-gradient(rgba(11, 20, 26, 0.8), rgba(11, 20, 26, 0.8)),
                url('img/valorant_bg.jpg'); 
            background-size: cover;
            background-position: center;
            color: var(--val-gray);
            font-family: 'Rajdhani', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .login-card {
            background: rgba(15, 25, 35, 0.9);
            backdrop-filter: blur(10px);
            padding: 40px;
            width: 100%;
            max-width: 400px;
            border-top: 4px solid var(--val-red);
            clip-path: polygon(0 0, 100% 0, 100% 92%, 92% 100%, 0 100%);
            box-shadow: 0 20px 50px rgba(0,0,0,0.5);
        }

        h1 {
            font-family: 'Oswald', sans-serif;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 2px;
            text-align: center;
            margin-bottom: 30px;
            color: white;
        }

        .form-label {
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 1px;
            font-size: 0.8rem;
            color: var(--val-blue);
        }

        .form-control {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 0;
            color: white;
            padding: 12px;
            transition: 0.3s;
        }

        .form-control:focus {
            background: rgba(255,255,255,0.1);
            border-color: var(--val-blue);
            box-shadow: none;
            color: white;
        }

        .btn-submit {
            background: var(--val-red);
            color: white;
            border: none;
            border-radius: 0;
            width: 100%;
            padding: 15px;
            font-family: 'Oswald', sans-serif;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 2px;
            margin-top: 20px;
            transition: 0.3s;
            position: relative;
        }

        .btn-submit:hover {
            background: white;
            color: var(--val-dark);
            transform: translateY(-2px);
        }

        .error-box {
            background: rgba(255, 70, 85, 0.1);
            border-left: 3px solid var(--val-red);
            padding: 10px;
            margin-bottom: 20px;
            font-size: 0.9rem;
            color: var(--val-red);
        }

        .footer-links {
            text-align: center;
            margin-top: 25px;
            font-size: 0.85rem;
        }

        .footer-links a {
            color: var(--val-blue);
            text-decoration: none;
            font-weight: 700;
            text-transform: uppercase;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-card">
    <h1>Acceso de Agente</h1>

    <?php if (!empty($_SESSION['login_error'])): ?>
        <div class="error-box">
            <span style="font-weight:bold;">SISTEMA //</span> <?php echo $_SESSION['login_error']; unset($_SESSION['login_error']); ?>
        </div>
    <?php endif; ?>

    <form action="login_action.php" method="post">
        <div class="mb-3">
            <label class="form-label">Correo Electrónico</label>
            <input type="email" name="correo" class="form-control" placeholder="nombre@protocolo.vlr" required>
        </div>

        <div class="mb-4">
            <label class="form-label">Contraseña</label>
            <input type="password" name="contraseña" class="form-control" placeholder="••••••••" required>
        </div>

        <button type="submit" class="btn-submit">Autorizar Entrada</button>
    </form>

    <div class="footer-links">
        <span style="opacity:0.6;">¿Nuevo en el protocolo?</span> <br>
        <a href="registro.php">Crear expediente de recluta</a>
    </div>
</div>

</body>
</html>