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

    echo "<h4>Función cuentaVeces()</h4>";

    cuentaVeces($arrayCuentaVeces, "posicion1", 4, $contadorCuentaVeces) . "<br>";

    echo "Número de veces que se ha llamado a la función: " . $contadorCuentaVeces . "<br>";

    cuentaVeces($arrayCuentaVeces, "posicion2", 6, $contadorCuentaVeces) . "<br>";

    echo "Número de veces que se ha llamado a la función: " . $contadorCuentaVeces . "<br>";

    cuentaVeces($arrayCuentaVeces, "posicion3", 5, $contadorCuentaVeces) . "<br>";

    echo "Número de veces que se ha llamado a la función: " . $contadorCuentaVeces . "<br>";

    cuentaVeces($arrayCuentaVeces, "2daw", 4, $contadorCuentaVeces) . "<br>";

    echo "Número de veces que se ha llamado a la función: " . $contadorCuentaVeces . "<br><br>";

    foreach ($arrayCuentaVeces as $key => $value) {
        echo "[".$key."] => ".$value."<br>";
    }
}

// Aqui escribiremos las funciones

// FUNCIONES