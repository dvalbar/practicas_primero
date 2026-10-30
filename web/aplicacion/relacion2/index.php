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
            "nombre" => "Relacion 2",
        ]
    ];

//dibuja la plantilla de la vista
inicioCabecera("RELACIÓN 2");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 2", $barraUbi);
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
    <h3>Ejercicios de la relación 2.</h3>
    <a href="/aplicacion/relacion2/ejercicio1.php">Ejercicio 1</a><br>
    <a href="/aplicacion/relacion2/ejercicio2.php">Ejercicio 2</a><br>
    <a href="/aplicacion/relacion2/ejercicio3.php">Ejercicio 3</a><br>
    <a href="/aplicacion/relacion2/ejercicio4.php">Ejercicio 4</a><br>
    <a href="/aplicacion/relacion2/ejercicio5.php">Ejercicio 5</a><br>
<?php

}

// Aqui escribiremos las funciones

// FUNCIONES