<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

// 5. Tendremos el botón/enlace descargar que llamará a la página imagen.php. Esta página se
// encargará de descargar la imagen correspondiente a los puntos actuales. La imagen se devolverá
// como jpg y se creará al vuelo (es decir, no la recogeremos de un fichero sino que la crearemos
// en el momento mediante la librería GD).

// Mi fichero donde guardo mis puntos
$miFicheroPuntos = "puntos_" . obtenerIp() . "_" . obtenerNavegador() . ".dat";

// Leo los puntos del fichero y los meto en el array de puntos
leerDeFichero($miFicheroPuntos, $arrayPuntos);

// Descarga al vuelo (la genero en el momento que me lo pide)
$nombreSalida = obtenerIp() . "_" . obtenerNavegador() . ".jpg";

// header("Content-Type: " . "text/plain");
header("Content-Type: " . "image/jpeg"); // Si esto se comenta no se descarga de una
header("Content-Disposition:attachment;filename=" . $nombreSalida);

// Llamamos directamente a la función para que cree y envíe la imagen al vuelo
crearImg($arrayPuntos);
exit; // exit; Para que no descargue tambien lo de abajo


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

/**
 * Crea la imagen .jpg con los puntos al vuelo
 *
 * @param array $arrayPuntos Array de objetos Punto a dibujar
 *
 * @return void No devuelve nada
 */
function crearImg(array $arrayPuntos): void
{
    $img = imagecreatetruecolor(500, 500); // Crear imagen 500 x 500
    $blanco = imagecolorallocate($img, 255, 255, 255); // Color blanco
    $negro = imagecolorallocate($img, 0, 0, 0); // Color negro

    imagefill($img, 0, 0, $blanco); // Rellenar el fondo de la imagen de color blanco
    imagerectangle($img, 0, 0, 499, 499, $negro); // Rectangulo negro (borde) que se coloca al borde de la imagen

    // Si el array de puntos tiene puntos se muestran en la imagen
    if (!empty($arrayPuntos)) {
        foreach ($arrayPuntos as $miPunto) { // Recorro mis puntos
            $miRgb = Punto::COLORES[$miPunto->getColor()]["rgb"];
            $grosorPunto = $miPunto->getGrosor() * 10;
            $punto = imagecolorallocate($img, $miRgb[0], $miRgb[1], $miRgb[2]);
            imagefilledellipse($img, $miPunto->getCoordX(), $miPunto->getCoordY(), $grosorPunto, $grosorPunto, $punto);
        }
    }

    imagestring($img, 3, 250, 480, "David Valverde Barea", $negro);
    imagejpeg($img); // Al no poner ruta, envía la imagen directamente al navegador (al vuelo)
}

/**
 * Función para leer de un fichero
 * @param string $nombre Nombre del fichero
 * @param mixed $datos Valores
 * @param bool $vaciar true si queremos vaciar nuestros puntos, false si queremos mantenerlos (para añadir a los actuales)
 * 
 * @return bool Devuelve true si ejecuta correctamente o false si hay algún error
 */
function leerDeFichero(string $nombre, array &$datos, bool $vaciar = true): bool
{
    // Ruta en la que se guardará el fichero
    $ruta = RUTABASE . "/ficheros";

    // Si no existe la ruta se crea
    if (!file_exists($ruta))
        mkdir($ruta);

    $ruta .= "/$nombre"; // Se añade a la ruta el nombre del fichero (con su extensión)

    // Si hubiera algun problema con la ruta devuelve false
    if (!file_exists($ruta)) {
        return false;
    }

    // Se abre el fichero para lectura
    // Debe existir el fichero
    $fic = fopen($ruta, "r");
    if (!$fic) {
        // Si no existe el fichero devuelve falso
        return false;
    }

    // Por defecto $vaciar es true, y los puntos se borrarian para leer puntos nuevos
    // Si se indica false, no entra aquí, no borra los puntos anteriores y nos permite
    // añadir más puntos a los actuales
    if ($vaciar) {
        $datos = [];
    }

    // Leo el fichero linea a linea
    while ($linea = fgets($fic)) {
        $linea = str_replace("\r", "", $linea);
        $linea = str_replace("\n", "", $linea);

        // Si la linea no está vacía
        if ($linea != "") {
            // Separo por ; y quito los espacios de cada trozo
            $trozos = array_map("trim", explode(";", $linea));

            // Solo si la línea tiene los 4 datos (coordX, coordY, color, grosor)
            if (count($trozos) === 4) {
                try {
                    // Añadimos el nuevo punto a nuestro array de puntos
                    $datos[] = new Punto($trozos[0], $trozos[1], $trozos[2], $trozos[3]);
                } catch (Throwable $e) {
                    // Si no se pudiera crear un punto entra aquí

                    // Línea no válida: se salta y se sigue con la siguiente

                    // Si la siguiente si es buena si que se añade un punto
                }
            }
        }
    }

    // Se cierra el fichero
    fclose($fic);
    return true;
}
