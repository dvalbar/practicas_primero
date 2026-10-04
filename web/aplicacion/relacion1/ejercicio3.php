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
            "nombre" => "Ejercicio 3",
            "enlace" => "/aplicacion/relacion1/ejercicio3.php"
        ]
    ];

$miArray = array();
$segundoArray = array(1, 34, "nueva");

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 3");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 3", $barraUbi);
cuerpo($miArray, $segundoArray);  //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo($miArray, $segundoArray) // Añadir aqui las variables
{
?>
    <br><br>
<?php
    echo "3.- Se quiere:
    <br>a) Crear una variable de tipo array.
    <br>b) Rellenar las posiciones 1, 16, 54 con valores cualquiera.
    <br>c) Añadir el valor 34 al final
    <br>d) Añadir los valores “cadena”, true, 1.345 en las posiciones “uno”, “dos” y “tres”
    <br>e) Rellenar la posición “ultima” con el array (1,34,”nueva”);
    <br><br>- Hacer lo anterior creando y rellenando el array usando varias sentencias.
    <br>- Hacer lo anterior usando una sola sentencia con array;
    <br>- Hacer lo anterior usando una sola sentencia con []
    <br>- Recorrer los tres arrays usando foreach mostrando todos los valores de los arrays creados
    <br><br>Los arrays se definirán en el controlador y se visualizarán en la vista.<br>" . PHP_EOL;

    // Rellenamos la posicion 1, 16 y 54 con cualquier cosa
    echo "<h3>Rellenamos la posición 1, 16, 54</h3>" . PHP_EOL;
    $miArray[1] = 10;
    $miArray[16] = 20;
    $miArray[54] = 30;

    mostrarArray($miArray, $segundoArray);

    // Añadimos al final del array el número 34
    echo "<h3>Añadimos 34 al final del array</h3>" . PHP_EOL;
    array_push($miArray, 34);

    mostrarArray($miArray, $segundoArray);

    // Añadimos a la posición 1, 2 y 3 del array nuevos valores
    echo "<h3>Añadir 'cadena', true, 1.345 en las posiciones 'uno', 'dos' y 'tres'</h3>" . PHP_EOL;
    $miArray["uno"] = "cadena";
    $miArray["dos"] = true;
    $miArray["tres"] = 1.345;

    mostrarArray($miArray, $segundoArray);

    // Añadimos al final un nuevo array
    echo "<h3>Rellenar la posición “ultima” con el array (1,34,”nueva”)</h3>" . PHP_EOL;
    $miArray["ultima"] = $segundoArray;

    mostrarArray($miArray, $segundoArray);
}

// Aqui escribiremos las funciones

// FUNCIONES

/**
 * Función que muestra el array en la interfaz con su indice y valor
 *
 * @param [array] $miArray
 * @return void
 */
function mostrarArray($miArray, $segundoArray)
{
    foreach ($miArray as $indice => $valor) {
        if ($indice == "ultima") {
            echo "[" . $indice . "] = " . PHP_EOL;
            for ($i = 0; $i < count($segundoArray); $i++) {
                echo "[" . $i . "] = " . $segundoArray[$i] . " " . PHP_EOL;
            }
        }
        else {
            echo "[" . $indice . "] = " . $valor . "<br>" . PHP_EOL;
        }
    }
}