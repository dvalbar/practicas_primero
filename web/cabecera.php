<?php
error_reporting(0);

date_default_timezone_set("Europe/Madrid");

define("RUTABASE", dirname(__FILE__));
//define("MODO_TRABAJO","produccion"); //en "produccion o en desarrollo
define("MODO_TRABAJO", "desarrollo"); //en "produccion o en desarrollo

if (MODO_TRABAJO == "produccion")
    error_reporting(0);
else
    error_reporting(E_ALL);

// Clases
spl_autoload_register(function ($clase) {
    $ruta = RUTABASE . "/scripts/clases/";
    $fichero = $ruta . "$clase.php";

    if (file_exists($fichero)) {
        require_once($fichero);
    } else {
        throw new Exception("La clase $clase no se ha encontrado.");
    }
});

include(RUTABASE . "/aplicacion/plantilla/plantilla.php");

// Creo todos los objetos que necesita mi aplicación

include_once(RUTABASE . "/scripts/librerias/validacion.php");

// Array de objetos Punto, aquí se guardaran todos nuestros puntos
$arrayPuntos = [];

// Para consultar los colores posibles se crearán dos constantes (COLORESTEXTO y
// COLORESFONDO) en cabecera.php. Cada constante contendrá un array de los colores posibles para
// el texto y el fondo. Con cada color guardaremos una cadena que representa su valor en CSS (nombre
// en inglés o para la función RGB). 

const COLORESTEXTO = [];

const COLORESFONDO = [];