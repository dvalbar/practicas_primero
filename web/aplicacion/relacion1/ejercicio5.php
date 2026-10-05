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
            "nombre" => "Ejercicio 5",
            "enlace" => "/aplicacion/relacion1/ejercicio5.php"
        ]
    ];

$vector = array();
$vector[1] = 'esto es una cadena';
$vector['posi1'] = 25.67;
$vector[] = false;
$vector['ultima'] = array(2, 5, 96);
$vector[56] = 23;

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 5");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 5", $barraUbi);
cuerpo($vector);  //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo($vector) // Añadir aqui las variables
{
?>
    <br><br>
<?php
    echo "5.- Rellenar un array con el siguiente contenido.
<br>\$vector=array();
<br>\$vector[1]='esto es una cadena';
<br>\$vector['posi1']=25.67;
<br>\$vector[]=false;
<br>\$vector['ultima']=array(2,5,96);
<br>\$vector[56]=23;

<br><br>Mostrar mediante bucles foreach el contenido del array con la siguiente salida:
<br>- Posicion XXX contenido (tipo) YYYYY
<br>- Según el tipo del contenido
<br>o Si es un array mostrarlo mediante un foreach.
<br>o Si es un entero poner Entero con valor DDD, en binario BBB
<br>o Si es un real DDD que al cuadrado es DDD
<br>o Si es una cadena -CCCC
<br>o Si es un booleano BBB y su opuesto XXX
<br>Las palabras en mayúscula representan un valor concreto de lo pedido
<br><br>El array se definirá en el controlador y se visualizará en la vista.<br>";

    echo "<h3>Array</h3>";
    foreach ($vector as $key => $value) {
        echo "Posición [" . $key . "] contenido (" . gettype($value) . ") ";
        switch (gettype($value)) {
            // Si es un array mostrarlo mediante un foreach
            case "array":
                foreach ($value as $key => $datosArray) {
                    echo $datosArray . "  ";
                }
                echo "<br>";
                break;
            // Si es un entero poner Entero con valor DDD, en binario BBB
            case "integer":
                echo "ENTERO con valor " . $value . ", en binario " . base_convert($value, 10, 2) . "<br>" . PHP_EOL;
                break;
            // Si es un real DDD que al cuadrado es DDD
            case "double":
                echo $value . " que al cuadrado es " . pow($value, 2) . "<br>" . PHP_EOL;
                break;
            // Si es una cadena -CCCC
            case "string":
                echo "-" . $value . "-<br>" . PHP_EOL;
                break;
            // Si es un booleano BBB y su opuesto XXX
            case "boolean":
                echo ($value == 0 ? "false" : "true") . " y su opuesto " . (!$value == 0 ? "false" : "true") . "<br>" . PHP_EOL;
                break;
            default:
                echo "Error";
                break;
        }
    }
}

// Aqui escribiremos las funciones

// FUNCIONES