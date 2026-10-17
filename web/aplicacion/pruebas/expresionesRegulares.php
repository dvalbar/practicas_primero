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
            "nombre" => "Expresiones Regulares",
        ]
    ];

$cadena = "tienes 258 34 años";

// buscar años
$expresion ='/años/';
$resultado = [];

preg_match($expresion,$cadena,$resultado,PREG_OFFSET_CAPTURE);

// buscar numero
$expresion = '/[0123456789]+/';
$expresion = '/[0-9]+/';
$expresion = '/\d+/';
$expresion = '/\d{1,}/';
$expresion = '/[[:digit:]]+/';
preg_match($expresion, $cadena, $resultado, PREG_OFFSET_CAPTURE);

// busco un numero con 2 cifras
$expresion = '/\d{2}/';
preg_match($expresion, $cadena, $resultado, PREG_OFFSET_CAPTURE);

// buscar un numero real
$cadena="tienes 54 Años 258.34 años";
$expresion="/\d+\.\d+/";
preg_match($expresion, $cadena, $resultado, PREG_OFFSET_CAPTURE);

// modificadores
// no distingo entre mayus y minus
$expresion = '/años/i';
preg_match($expresion, $cadena, $resultado, PREG_OFFSET_CAPTURE);

// subpatrones
// quiero encontrar en un número real la parte decimal
$cadena = "tienes 54 Años 258.34 años";
$expresion = "/\d+\.(\d+)/";
preg_match($expresion, $cadena, $resultado, PREG_OFFSET_CAPTURE);

// cuantificador, como hacer perezoso
$cadena="/* primer comentario */ no comentario /* segundo comentario */";
$expresion="/[/]\*.*?\*[\]/"; // preguntar a vicente

//dibuja la plantilla de la vista
inicioCabecera("Prueba expresiones regulares");
cabecera();
finCabecera();
inicioCuerpo("PRUEBA EXPRESIONES REGULARES", $barraUbi);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera()
{
    // Fin del PHP
?>
    <!-- Esto va en el HEAD -->
<?php
    // Inicio del PHP
}

//vista
function cuerpo()
{
?>
    <br><br>
<?php

    

}

// Aqui escribiremos las funciones

// FUNCIONES