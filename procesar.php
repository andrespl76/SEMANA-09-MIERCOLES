<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo "<h2>Método no permitido.</h2><p>Debe usar POST.</p>";
    exit;
}

$nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if (!$nombre || !$email) {
    echo "<h2>Error de validación</h2><p>Datos inválidos.</p>";
    exit;
}

$nombre_limpio = limpiar_dato($nombre);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado PHP</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); display: flex; justify-content: center; align-items: center; height: 100vh; }
        .card { background: rgba(255, 255, 255, 0.95); padding: 40px; border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.2); text-align: center; max-width: 420px; width: 100%; backdrop-filter: blur(10px); }
        .icon { font-size: 50px; color: #11998e; margin-bottom: 15px; }
        h2 { color: #333; margin-bottom: 10px; font-weight: 600; }
        p { color: #555; font-size: 15px; margin-bottom: 8px; }
        .highlight { font-weight: 600; color: #11998e; }
        .btn { display: inline-block; margin-top: 25px; padding: 12px 25px; background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); color: white; text-decoration: none; border-radius: 10px; font-weight: 600; transition: all 0.3s; }
        .btn:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(17, 153, 142, 0.4); }
    </style>
</head>
<body>
    <div class="card">
        <div class="icon">✅</div>
        <h2>¡Registro Exitoso!</h2>
        <p>Hola, <span class="highlight"><?php echo $nombre_limpio; ?></span></p>
        <p>Hemos guardado tu correo: <span class="highlight"><?php echo $email; ?></span></p>
        <a href="index.html" class="btn">Volver al formulario</a>
    </div>
</body>
</html>