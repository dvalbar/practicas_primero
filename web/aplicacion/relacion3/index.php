<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once("libreria.php");

//controlador
$barraUbi =
    [
        [
            "nombre" => "Inicio",
            "enlace" => "/index.php"
        ],
        [
            "nombre" => "Relacion 3",
        ]
    ];

$contadorCuentaVeces = 0;
$arrayCuentaVeces = [];

//dibuja la plantilla de la vista
inicioCabecera("RELACIÓN 3");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 3", $barraUbi);
cuerpo($contadorCuentaVeces, $arrayCuentaVeces);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo($contadorCuentaVeces, $arrayCuentaVeces) // Añadir aqui las variables
{
?>
    <br><br>
    <h3>Funciones de la relación 3.</h3>
<?php

    // Ejercicio 1
    echo "<h4>Función cuentaVeces()</h4>" . PHP_EOL;

    cuentaVeces($arrayCuentaVeces, "posicion1", 4, $contadorCuentaVeces) . "<br>";

    echo "Número de veces que se ha llamado a la función: " . $contadorCuentaVeces . "<br>" . PHP_EOL;

    cuentaVeces($arrayCuentaVeces, "posicion2", 6, $contadorCuentaVeces) . "<br>";

    echo "Número de veces que se ha llamado a la función: " . $contadorCuentaVeces . "<br>" . PHP_EOL;

    cuentaVeces($arrayCuentaVeces, "posicion3", 5, $contadorCuentaVeces) . "<br>";

    echo "Número de veces que se ha llamado a la función: " . $contadorCuentaVeces . "<br>" . PHP_EOL;

    cuentaVeces($arrayCuentaVeces, "2daw", 4, $contadorCuentaVeces) . "<br>";

    echo "Número de veces que se ha llamado a la función: " . $contadorCuentaVeces . "<br><br>" . PHP_EOL;

    foreach ($arrayCuentaVeces as $key => $value) {
        echo "[" . $key . "] => " . $value . "<br>";
    }

    // Ejercicio 2
    echo "<br><h4>Función generarCadena()</h4>" . PHP_EOL;
    echo generarCadena(5) . "<br>" . PHP_EOL;
    echo generarCadena() . "<br>" . PHP_EOL;
    if (generarCadena(-3) === false)
        echo "La cadena no puede tener longitud negativa<br>" . PHP_EOL;
    else
        echo generarCadena(-3) . PHP_EOL;

    // Ejercicio 3
    echo "<br><h4>Función operaciones()</h4>" . PHP_EOL;

}

// Aqui escribiremos las funciones

// FUNCIONES