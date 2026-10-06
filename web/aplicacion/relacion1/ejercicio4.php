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
            "nombre" => "Ejercicio 4",
            "enlace" => "/aplicacion/relacion1/ejercicio4.php"
        ]
    ];

// Constante FILAS con el número de filas que queremos mostrar
const FILAS = 5;
$filas = FILAS;

$miArray = array(array(), array());

for ($i = 0; $i <= $filas; $i++) {
    for ($j = 0; $j < $i; $j++) {
        $miArray[$i][$j] = $i;
    }
}

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 4");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 4", $barraUbi);
cuerpo($miArray);  //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo($miArray) // Añadir aqui las variables
{
?>
    <br><br>
<?php
    echo "4- Generar un array con los siguientes valores mostrándolos posteriormente con foreach. El array se
debe generar usando bucles for.<br>
<br>1
<br>2 2
<br>3 3 3
<br>4 4 4 4
<br>5 5 5 5 5<br>
<br>Declarar la constante FILAS que se rellenará con el número de filas que se deben crear. Repetir
lo anterior usando FILAS para crear el array y visualizarlo.
<br>Los datos se definirán en el controlador y se visualizarán en la vista." . PHP_EOL;

    foreach ($miArray as $fila) {
        echo "<br>";
        foreach ($fila as $valor) {
            echo $valor . " ";
        }
    }
}

// Aqui escribiremos las funciones

// FUNCIONES