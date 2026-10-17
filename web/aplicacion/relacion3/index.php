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
            "nombre" => "Relacion 3",
        ]
    ];

//dibuja la plantilla de la vista
inicioCabecera("RELACIÓN 3");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 3", $barraUbi);
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
    <h3>Funciones de la relación 3.</h3>

<?php

}

// Aqui escribiremos las funciones

// FUNCIONES