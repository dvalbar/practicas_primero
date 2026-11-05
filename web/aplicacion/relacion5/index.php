<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once("val_normal.php"); // Importar val_normal.php
include_once("val_filter.php"); // Importar val_filter.php

//controlador
$barraUbi =
    [
        [
            "nombre" => "Inicio",
            "enlace" => "/index.php"
        ],
        [
            "nombre" => "Relacion 5",
        ]
    ];

//dibuja la plantilla de la vista
inicioCabecera("RELACIÓN 5");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 5", $barraUbi);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo() // Añadir aqui las variables
{
?>
    <br>
    <h3>Librerías de la relación 5.</h3>
<?php

    echo "<h4>VAL_NORMAL</h4>";

    echo "Función validaEntero()<br>";
    static $var1 = 2;
    echo \VALNORMAL\validaEntero($var1, 0, 20, 0) ? "True" : "Falso";
    echo "<br>Número: " . $var1;

    echo "<br>";

    $var1 = 21;
    echo \VALNORMAL\validaEntero($var1, 0, 20, 0) ? "True" : "Falso";
    echo "<br>Número: " . $var1;

    echo "<br><br>";

    echo "Función validaReal()<br>";
    static $var2 = 4.8;
    echo \VALNORMAL\validaReal($var2, 0.2, 20.5, 0.5) ? "True" : "Falso";
    echo "<br>Número: " . $var2;

    echo "<br>";

    $var2 = 48.9;
    echo \VALNORMAL\validaReal($var2, 0.2, 20.5, 0.5) ? "True" : "Falso";
    echo "<br>Número: " . $var2;
}

// Aqui escribiremos las funciones

// FUNCIONES