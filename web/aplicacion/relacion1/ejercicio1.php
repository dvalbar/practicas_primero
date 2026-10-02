<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 1");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 1");
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