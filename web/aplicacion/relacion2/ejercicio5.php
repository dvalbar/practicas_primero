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
            "nombre" => "Ejercicio 5",
        ]
    ];

$color = "blue";
$cadena = <<<fin
            <br>Esto es una <span style="color:{'.$color.'};">cadena</span> con HEREDOC (\'\').
            <br>
            Aquí ñ á <span style="color:{'.$color.'};"> 1234.56 45 HOLA 3333</span> <h4>dvalbar0304@geducaand.es</h4>
            <H5>davidvalverdebarea@gmail.com</H5>
            fin;

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 5");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 5", $barraUbi);
cuerpo($cadena);  //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo($cadena) // Añadir aqui las variables
{
?>
    <br><br>
<?php

    echo "5.- Crea una cadena que ocupe varias líneas (usa nowdoc o heredoc). En líneas distintas debe
aparecer: varias etiquetas html (<>), varios números (de 1 o varias cifras) y varias direcciones
de correo electrónico (formato aaaa@aaaa.aa).<br>
Define expresiones regulares apropiadas para localizar los distintos elementos creados
(etiqueta, numero y dirección de email) en la cadena.<br>
Muestra la posición/elemento encontrado usando las expresiones regulares definidas y la
función preg_match.<br><br>" . PHP_EOL;

    echo $cadena . PHP_EOL;

    $resultado = [];

    // Etiqueta
    $expresion = '/<.+?>/';

    echo "<br>Número de etiquetas en el texto: " . preg_match_all($expresion, $cadena, $resultado, PREG_OFFSET_CAPTURE) . "<br><br>" . PHP_EOL;

    foreach ($resultado[0] as $value) {
        echo "Posición: " . $value[1] . " Etiqueta: " . htmlspecialchars($value[0]) . "<br>" . PHP_EOL;
    }

    // Número
    $expresion = "/\d+\.\d+|\d+/";

    echo "<br>Número de números en el texto: " . preg_match_all($expresion, $cadena, $resultado, PREG_OFFSET_CAPTURE) . "<br><br>" . PHP_EOL;

    foreach ($resultado[0] as $value) {
        echo "Posición: " . $value[1] . " Número: " . htmlspecialchars($value[0]) . "<br>" . PHP_EOL;
    }

    // Dirección de email
    $expresion = "/[\w.-]+@[\w.-]+\.[a-zA-z]{2,6}/"; // Expresión regular email

    echo "<br>Número de correos en el texto: " . preg_match_all($expresion, $cadena, $resultado, PREG_OFFSET_CAPTURE) . "<br><br>" . PHP_EOL;

    foreach ($resultado[0] as $value) {
        echo "Posición: " . $value[1] . " Correo: " . htmlspecialchars($value[0]) . "<br>" . PHP_EOL;
    }
}

// Aqui escribiremos las funciones

// FUNCIONES