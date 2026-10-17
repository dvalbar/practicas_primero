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
            "nombre" => "Ejercicio 4",
        ]
    ];

$num1 = 17.5;
$num2 = 379987.24;

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 4");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 4", $barraUbi);
cuerpo($num1, $num2);  //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo($num1, $num2) // Añadir aqui las variables
{
?>
    <br><br>
<?php

    echo "4.- Tengo unas variables con valores 17.5 (float), 379987.24 (float)
Mostrarlas de forma que resulte 'el primer valor -0000000000017,5-, el segundo valor -
379.987,24-' (usar number format para obtener el formateo de los números, los números se
muestran con 15 caracteres en total, el primero relleno con 0 y el segundo con espacios-debe
aparecer el espacio))<br><br>";

    $primer_formato = number_format($num1, 1, ',', '.');
    $primer_resultado = str_pad($primer_formato, 15, "0", STR_PAD_LEFT);

    $segundo_formato = number_format($num2, 2, ',', '.');
    $segundo_resultado = str_pad($segundo_formato, 15, " ", STR_PAD_LEFT);

    echo "El primer valor -" . $primer_resultado . "-, el segundo valor -" . $segundo_resultado . "-";
}

// Aqui escribiremos las funciones

// FUNCIONES