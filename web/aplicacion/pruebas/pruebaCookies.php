<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$barraUbi =
    [
        [
            "nombre" => "Inicio",
            "enlace" => "/index.php"
        ],
        [
            "nombre" => "Pruebas",
            "enlace" => "/aplicacion/pruebas/index.php"
        ],
        [
            "nombre" => "Cookies"
        ]
    ];

// Cookie con un número aleatorio entre 1 y 100 que expira en 2 días
setcookie("numRandom", mt_rand(1, 100), time() + 60 * 60 * 24 * 2);
// Se le pasa "nombre", "valor", "cuando caduca", "ruta" (en el ejemplo no hemos puesto ruta)

// $valor = intval($_COOKIE["numRandom"]); // Guardamos el número en una variable

$valor = 0;

session_start(); // Iniciar sesión

// $_SESSION["nombre"] = "David"; // Guardar en $_SESSION["nombre_campo"] = "nombre";

// session_abort(); // Descarta los cambios y cierra la sesión
session_destroy(); // Cierra la sesión

//dibuja la plantilla de la vista
inicioCabecera("PRUEBA COOKIES");
cabecera();
finCabecera();
inicioCuerpo("Prueba Cookies", $barraUbi);
cuerpo($valor); //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo(int $valor)
{

?>
    <br>
    <h3>Prueba cookies.</h3>

<?php

    echo "Leido la cookie con valor: " . $valor . PHP_EOL;
}
