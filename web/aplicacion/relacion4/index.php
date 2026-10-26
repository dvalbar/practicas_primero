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
            "nombre" => "Relacion 4",
        ]
    ];

//dibuja la plantilla de la vista
inicioCabecera("RELACIÓN 4");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 4", $barraUbi);
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
    <h3>Ejercicios de la relación 4.</h3>
    <a href="/aplicacion/relacion4/ejercicio1.php">Ejercicio 1</a><br>
    <a href="/aplicacion/relacion4/ejercicio2.php">Ejercicio 2</a><br>
    <a href="/aplicacion/relacion4/ejercicio3.php">Ejercicio 3</a><br>
    <a href="/aplicacion/relacion4/ejercicio4.php">Ejercicio 4</a><br>
    <a href="/aplicacion/relacion4/ejercicio5.php">Ejercicio 5</a><br>
    <a href="/aplicacion/relacion4/ejercicio6.php">Ejercicio 6</a><br>
    <a href="/aplicacion/relacion4/ejercicio7.php">Ejercicio 7</a><br>
<?php

}

// Aqui escribiremos las funciones

// FUNCIONES