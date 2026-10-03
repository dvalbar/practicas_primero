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

$misNumeros = [9.55, 9, 255, "32", -56, 0b11111111, 0123, 0x1A];

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 1");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 1", $barraUbi);
cuerpo($misNumeros);  //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo($misNumeros) // Añadir aqui las variables
{
?>
    <br><br>
<?php
    echo "1.- Mostrar el funcionamiento de diversas funciones Matemáticas (round, floor, pow, sqrt, entero a
    hexadecimal, de base 4 a base 8 y al menos dos funciones mas distintas de las anteriores) (buscar la
    información sobre las funciones matemáticas en <a href='http://php.net/manual/es/book.math.php'>http://php.net/manual/es/book.math.php</a>). Definir
    variables inicializadas con valores en binario, octal y hexadecimal. Mostrar el valor de esas variables
    tanto en decimal como en la base en la que se han definido.
    Hacer este ejercicio directamente en la vista (definiciones de las variables y visualización de las
    mismas)<br>" . PHP_EOL;

    echo "<h3>Variables</h3>" . PHP_EOL;
    echo "Número decimal = " . $misNumeros[0] . PHP_EOL;
    echo "<br>Número entero = " . $misNumeros[1] . PHP_EOL;
    echo "<br>Número entero para pasar a hexadecimal = " . $misNumeros[2] . PHP_EOL;
    echo "<br>Número en base 4 = " . $misNumeros[3] . PHP_EOL;

    echo "<h3>Variables binario, octal y hexadecimal</h3>" . PHP_EOL;
    echo "Número binario = " . $misNumeros[5] . PHP_EOL;
    echo "<br>Número binario (en decimal) = " . base_convert($misNumeros[5], 10, 2) . PHP_EOL;
    echo "<br>Número octal = " . base_convert($misNumeros[6], 10, 8) . PHP_EOL;
    echo "<br>Número octal (en decimal) = " . $misNumeros[6] . PHP_EOL;
    echo "<br>Número hexadecimal = " . base_convert($misNumeros[7], 10, 16) . PHP_EOL;
    echo "<br>Número hexadecimal (en decimal) = " . $misNumeros[7] . PHP_EOL;

    echo "<h3>Funciones</h3>" . PHP_EOL;
    echo "Función round({$misNumeros[0]}): " . round($misNumeros[0]) . PHP_EOL;
    echo "<br>Función floor(): " . floor($misNumeros[0]) . PHP_EOL;
    echo "<br>Función pow(): " . pow($misNumeros[0], 2) . PHP_EOL;
    echo "<br>Función sqrt(): " . sqrt($misNumeros[0]) . PHP_EOL;
    echo "<br>Función de entero a hexadecimal (dechex()): " . dechex($misNumeros[2]) . PHP_EOL;
    echo "<br>Función de base 4 a base 8 (base_convert()): " . base_convert($misNumeros[3], 4, 8) . PHP_EOL;
    echo "<br>Función abs(): " . abs($misNumeros[4]) . PHP_EOL;
    echo "<br>Función pi(): " . pi() . PHP_EOL;
}

// Aqui escribiremos las funciones

// FUNCIONES