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
$cadena = "cadena";
$cadena1 = "Esto es una <span style='color:{$color};'>{$cadena}</span> con comillas dobles (\"\"). Aquí ñ á";
$cadena2 = 'Esto es una <span style="color:{' . $color . '};">{$cadena}</span> con comillas simples (\'\'). Aquí ñ á';
$cadena3 = <<<fin
            Esto es una <span style="color:{'.$color.'};">{$cadena}</span> con HEREDOC (\'\'). Aquí ñ á
            fin;
$cadena4 = <<<'fin'
            Esto es una <span style="color:{'.$color.'};">{$cadena}</span> con NOWDOC (\'\'). Aquí ñ á
            fin;
$cadena5 = htmlspecialchars($cadena1);
$cadena6 = htmlentities($cadena2);
$cadena7 = htmlentities($cadena3);
$cadena8 = htmlentities($cadena4);

$misCadenas = [
    "cadena1" => $cadena1,
    "cadena2" => $cadena2,
    "cadena3" => $cadena3,
    "cadena4" => $cadena4,
    "cadena5" => $cadena5,
    "cadena6" => $cadena6,
    "cadena7" => $cadena7,
    "cadena8" => $cadena8
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
las etiquetas html (no se ejecuten)<br><br>".PHP_EOL;

    echo $misCadenas["cadena1"]."<br>".PHP_EOL;
    echo $misCadenas["cadena2"]."<br>".PHP_EOL;
    echo $misCadenas["cadena3"]."<br>".PHP_EOL;
    echo $misCadenas["cadena4"]."<br>".PHP_EOL;

    echo "<h4>Mostrando las etiquetas</h4>";
    echo $misCadenas["cadena5"] . "<br>" . PHP_EOL;
    echo $misCadenas["cadena6"] . "<br>" . PHP_EOL;
    echo $misCadenas["cadena7"] . "<br>" . PHP_EOL;
    echo $misCadenas["cadena8"] . "<br>" . PHP_EOL;
}

// Aqui escribiremos las funciones

// FUNCIONES