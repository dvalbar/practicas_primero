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
        ],
        [
            "nombre" => "Ejercicio 1",
            "enlace" => "/aplicacion/relacion1/ejercicio1.php"
        ]
    ];

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 1");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 1", $barraUbi);
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
    echo "1.- Mostrar el funcionamiento de diversas funciones Matemáticas (round, floor, pow, sqrt, entero a
hexadecimal, de base 4 a base 8 y al menos dos funciones mas distintas de las anteriores) (buscar la
información sobre las funciones matemáticas en http://php.net/manual/es/book.math.php). Definir
variables inicializadas con valores en binario, octal y hexadecimal. Mostrar el valor de esas variables
tanto en decimal como en la base en la que se han definido.
Hacer este ejercicio directamente en la vista (definiciones de las variables y visualización de las
mismas)";
}

// Aqui escribiremos las funciones

// FUNCIONES