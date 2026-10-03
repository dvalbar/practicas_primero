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
            "nombre" => "Relacion 1",
            "enlace" => "/aplicacion/relacion1/index.php"
        ]
    ];

//dibuja la plantilla de la vista
inicioCabecera("RELACIÓN 1");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 1", $barraUbi);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo() // Añadir aqui las variables
{
?>
    <br><br>
    Ejercicios de la relación 1.
    <br><br>
    <a href="/aplicacion/relacion1/ejercicio1.php">Ejercicio 1</a><br>
    <a href="/aplicacion/relacion1/ejercicio2.php">Ejercicio 2</a><br>
    <a href="/aplicacion/relacion1/ejercicio3.php">Ejercicio 3</a><br>
    <a href="/aplicacion/relacion1/ejercicio4.php">Ejercicio 4</a><br>
    <a href="/aplicacion/relacion1/ejercicio5.php">Ejercicio 5</a><br>
    <a href="/aplicacion/relacion1/ejercicio6.php">Ejercicio 6</a><br>
    <a href="/aplicacion/relacion1/ejercicio7.php">Ejercicio 7</a><br>
<?php

}

// Aqui escribiremos las funciones

// FUNCIONES