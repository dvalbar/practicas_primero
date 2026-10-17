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
            "enlace" => "/aplicacion/relacion2/index.php"
        ],
        [
            "nombre" => "Ejercicio 3",
        ]
    ];

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 3");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 3", $barraUbi);
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
<?php
    echo "3.- Genera una cadena aleatoria de 20 caracteres (los caracteres permitidos son letras
minúsculas, letras mayúsculas y números)<br>
a) A partir de un array en el que están todos los caracteres posibles que cumplen la
condición. (tienes que rellenar el array con todos los caracteres validos)<br>
b) A partir del código ASCII (se puede indicar un rango mayor y eliminar aquellos
caracteres que no lo cumplan)." . PHP_EOL;


}

// Aqui escribiremos las funciones

// FUNCIONES