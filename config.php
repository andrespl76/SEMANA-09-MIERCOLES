<?php
// config.php
// Configuración básica de la aplicación

// Función para limpiar datos de entrada
function limpiar_dato($dato) {
    return htmlspecialchars(trim($dato), ENT_QUOTES, 'UTF-8');
}
?>