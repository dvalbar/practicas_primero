<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once("libreria_funciones.php"); // Añadir libreria de funciones

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
            "nombre" => "Funciones",
        ]
    ];

// Variables
$numEjemplo = doble(2);

// Controlar lo que devuelve la función para 
// mostrar errores o mostrar el resultado de la función
if ($numEjemplo === false) { // Si el num es menor de 10 return false (error)
    $numEjemplo = -1;
}

//dibuja la plantilla de la vista
inicioCabecera("FUNCIONES");
cabecera();
finCabecera();
inicioCuerpo("Funciones", $barraUbi);
cuerpo($numEjemplo); //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo($numEjemplo)
{
?>
    <br><br>
    <?php

    echo "<h3>Funciones de ejemplo</h3><br>" . PHP_EOL;

    echo "Función doble(\$num): " . PHP_EOL;

    echo ($numEjemplo<0)?"Error: El número es menor":$numEjemplo;

    ?>

<?php
}