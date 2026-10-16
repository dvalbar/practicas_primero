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
            "nombre" => "Ejercicio 1",
        ]
    ];
$color = "blue";
$cadena1 = "Esto es una <span style='color:{$color};'>cadena</span> con comillas dobles (\"\"). Aquí ñ á";
$cadena2 = 'Esto es una <span style="color:{' . $color . '};">cadena</span> con comillas simples (\'\'). Aquí ñ á';
$cadena3 = <<<fin
            Esto es una <span style="color:{'.$color.'};">cadena</span> con HEREDOC (\'\'). Aquí ñ á
            fin;
$cadena4 = <<<'fin'
            Esto es una <span style="color:{'.$color.'};">cadena</span> con NOWDOC (\'\'). Aquí ñ á
            fin;

$misCadenas = [
    "cadena1" => $cadena1,
    "cadena2" => $cadena2,
    "cadena3" => $cadena3,
    "cadena4" => $cadena4
];

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 1");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 1", $barraUbi);
cuerpo($misCadenas);  //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo($misCadenas) // Añadir aqui las variables
{
?>
    <br><br>
<?php
    echo "1.- Escribe distintas cadenas usando “, ‘, HEREDOC y NOWDOC incluyendo variables,
etiquetas html y caracteres especiales como ‘, “, á, é, ñ. Muestra las cadenas y comprueba que
el código fuente es legible (no se tiene una sola línea con todo seguido). Haz que se muestren
las etiquetas html (no se ejecuten)<br><br>";

    echo $misCadenas["cadena1"]."<br>";
    echo $misCadenas["cadena2"]."<br>";
    echo $misCadenas["cadena3"]."<br>";
    echo $misCadenas["cadena4"]."<br>";
}

// Aqui escribiremos las funciones

// FUNCIONES