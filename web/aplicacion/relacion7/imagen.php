<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

// 5. Tendremos el botón/enlace descargar que llamará a la página imagen.php. Esta página se
// encargará de descargar la imagen correspondiente a los puntos actuales. La imagen se devolverá
// como jpg y se creará al vuelo (es decir, no la recogeremos de un fichero sino que la crearemos
// en el momento mediante la librería GD).

// Ruta donde se guardará la imagen
$rutaImagen = RUTABASE . "/imagenes/puntos/imagen_" . obtenerIp() . "_" . obtenerNavegador() . ".jpg";

// Descarga al vuelo (la genero en el momento que me lo pide)
$nombreSalida = obtenerIp() . "_" . obtenerNavegador() . ".jpg";

// header('Content-Type:' . 'text/plain');
header('Content-Type:' . 'image/jpeg');

// Si esto se comenta no se descarga de una
header('Content-Disposition:attachment;filename="' . $nombreSalida . '"');

// Ruta donde se encuentra la imagen
$rutaImagen = RUTABASE . "/imagenes/puntos/imagen_" . obtenerIp() . "_" . obtenerNavegador() . ".jpg";

echo file_get_contents($rutaImagen);

exit; // exit; para que no descargue tambien lo de abajo


// Aqui escribiremos las funciones

// FUNCIONES

/**
 * Función para sacar desde que navegador web se ha entrado a la página web
 *
 * @return string Cadena con el nombre del navegador web
 */
function obtenerNavegador(): string
{
    $navegador = $_SERVER["HTTP_USER_AGENT"] ?? "";

    if (stripos($navegador, "Edg") !== false) {
        return "edge";
    }
    if (stripos($navegador, "Firefox") !== false) {
        return "firefox";
    }
    if (stripos($navegador, "Chrome") !== false) {
        return "chrome";
    }
    if (stripos($navegador, "Safari") !== false) {
        return "safari";
    }
    return "otro";
}

/**
 * Función para sacar la ip
 *
 * @return string Cadena con la ip
 */
function obtenerIp(): string
{
    $ip = $_SERVER["REMOTE_ADDR"]; // IP
    return str_replace(".", "_", $ip); // Cambiar los puntos por guiones bajos
}
