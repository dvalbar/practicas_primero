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

    // =======================
    // LIBRERIA VAL_NORMAL.PHP
    // =======================
    echo "<h4>VAL_NORMAL</h4>";

    /**
     * Función validaEntero()
     */
    echo "Función validaEntero()<br>";

    $variableNumEntero = 02;

    // True
    echo \VALNORMAL\validaEntero($variableNumEntero, 0, 20, 0) ? "Válido" : "No es válido";
    echo "<br>Número: " . $variableNumEntero;

    echo "<br><br>";

    $variableNumEntero = 21;

    // False
    echo \VALNORMAL\validaEntero($variableNumEntero, 0, 20, 0) ? "Válido" : "No es válido";
    echo "<br>Número: " . $variableNumEntero;

    echo "<br><br>";

    $variableNumEntero = 0;

    // True
    echo \VALNORMAL\validaEntero($variableNumEntero, 0, 20, 0) ? "Válido" : "No es válido";
    echo "<br>Número: " . $variableNumEntero;

    echo "<br><br>";

    $variableNumEntero = 20;

    // True
    echo \VALNORMAL\validaEntero($variableNumEntero, 0, 20, 0) ? "Válido" : "No es válido";
    echo "<br>Número: " . $variableNumEntero;

    echo "<br><br><hr>";

    // =============================================================================================

    /**
     * Función validaReal()
     */
    echo "Función validaReal()<br>";

    $variableNumReal = 4.8;

    // True
    echo \VALNORMAL\validaReal($variableNumReal, 0.2, 20.5, 0.5) ? "Válido" : "No es válido";
    echo "<br>Número: " . $variableNumReal;

    echo "<br><br>";

    $variableNumReal = 48.9;

    // False
    echo \VALNORMAL\validaReal($variableNumReal, 0.2, 20.5, 0.5) ? "Válido" : "No es válido";
    echo "<br>Número: " . $variableNumReal;

    echo "<br><br>";

    $variableNumReal = 0.2;

    // True
    echo \VALNORMAL\validaReal($variableNumReal, 0.2, 20.5, 0.5) ? "Válido" : "No es válido";
    echo "<br>Número: " . $variableNumReal;

    echo "<br><br>";

    $variableNumReal = 20.5;

    // True
    echo \VALNORMAL\validaReal($variableNumReal, 0.2, 20.5, 0.5) ? "Válido" : "No es válido";
    echo "<br>Número: " . $variableNumReal;

    echo "<br><br><hr>";

    // =============================================================================================

    /**
     * Función validaFecha()
     */
    echo "Función validaFecha()<br>";

    $variableFecha = "05/11/2026";

    // True
    echo \VALNORMAL\validaFecha($variableFecha, "05/11/2026") ? "Válida" : "No es válida";
    echo "<br>Fecha: " . $variableFecha;

    echo "<br><br>";

    $variableFecha = "99/99/2026";

    // False
    echo \VALNORMAL\validaFecha($variableFecha, "05/11/2026") ? "Válida" : "No es válida";
    echo "<br>Fecha: " . $variableFecha;

    echo "<br><br>";

    $variableFecha = "5/1/2026";

    // True
    echo \VALNORMAL\validaFecha($variableFecha, "05/11/2026") ? "Válida" : "No es válida";
    echo "<br>Fecha: " . $variableFecha;

    echo "<br><br><hr>";

    // =============================================================================================

    /**
     * Función validaHora()
     */
    echo "Función validaHora()<br>";

    $variableHora = "14:38:30";

    // True
    echo \VALNORMAL\validaHora($variableHora, "00:00:00") ? "Válida" : "No es válida";
    echo "<br>Hora: " . $variableHora;

    echo "<br><br>";

    $variableHora = "99:99:99";

    // False
    echo \VALNORMAL\validaHora($variableHora, "00:00:00") ? "Válida" : "No es válida";
    echo "<br>Hora: " . $variableHora;

    echo "<br><br>";

    $variableHora = "1:5:9";

    // True
    echo \VALNORMAL\validaHora($variableHora, "00:00:00") ? "Válida" : "No es válida";
    echo "<br>Hora: " . $variableHora;

    echo "<br><br><hr>";

    // =============================================================================================

    /**
     * Función validaCadena()
     */
    echo "Función validaCadena()<br>";

    static $var4 = "David Valverde Barea";

    // True
    echo \VALNORMAL\validaCadena($var4, 50, "Nombre Apellido1 Apellido2") ? "Válida" : "No es válida";
    echo "<br>Nombre: " . $var4;

    echo "<br><br>";

    $var4 = "David Valverde Barea";

    // False
    echo \VALNORMAL\validaCadena($var4, 10, "David") ? "Válida" : "No es válida";
    echo "<br>Nombre: " . $var4;

    echo "<br><br><hr>";
}

// Aqui escribiremos las funciones

// FUNCIONES