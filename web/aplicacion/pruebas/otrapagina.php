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
            "nombre" => "Otra página"
        ]
    ];

$id = 0;
if (isset($_REQUEST["id"])) {
    $id = intval($_REQUEST["id"]);
}

$nombre = "";
if (isset($_REQUEST["nombre"])) {
    $nombre = mb_trim($_REQUEST["nombre"]);
}

$arrayDatos["id"] = $id;
$arrayDatos["nombre"] = $nombre;

//dibuja la plantilla de la vista
inicioCabecera("OTRA PÁGINA");
cabecera();
finCabecera();
inicioCuerpo("Otra página", $barraUbi);
cuerpo($arrayDatos); //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo($arrayDatos)
{
?>
    <br>
    <h3>Otra página.</h3>
<?php

    echo "Los datos vienen de _GET (enlace de arriba)<br>" . PHP_EOL;
    echo $arrayDatos["id"] . "<br>" . PHP_EOL;
    echo $arrayDatos["nombre"] . "<br>" . PHP_EOL;
}
