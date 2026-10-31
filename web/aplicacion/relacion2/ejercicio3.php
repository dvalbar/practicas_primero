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

$caracteres = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
'0','1','2','3','4','5','6','7','8','9'
];

$caracteresAscii = [];

foreach ($caracteres as $value) {
    $caracteresAscii[]=dechex(ord($value));
}

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 3");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 3", $barraUbi);
cuerpo($caracteres, $caracteresAscii);  //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo($caracteres, $caracteresAscii) // Añadir aqui las variables
{
?>
    <br>
<?php
    echo "3.- Genera una cadena aleatoria de 20 caracteres (los caracteres permitidos son letras
minúsculas, letras mayúsculas y números)<br>
a) A partir de un array en el que están todos los caracteres posibles que cumplen la
condición. (tienes que rellenar el array con todos los caracteres validos)<br>
b) A partir del código ASCII (se puede indicar un rango mayor y eliminar aquellos
caracteres que no lo cumplan).<br><br>".PHP_EOL;

    for ($i = 0; $i < 20; $i++) {
        $numAleatorio = mt_rand(0, count($caracteres)-1);
        echo $caracteres[$numAleatorio];
    }

    echo "<br><br>";

    for ($i = 0; $i < 20; $i++) {
        $numAleatorio = mt_rand(0, count($caracteres) - 1);
        echo mb_chr(hexdec($caracteresAscii[$numAleatorio]));
        //echo mb_chr(0x00.$caracteresAscii[$numAleatorio]);
    }
}

// Aqui escribiremos las funciones

// FUNCIONES