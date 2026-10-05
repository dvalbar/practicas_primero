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

// --------------- ARRAY 1 ---------------
$miArray1 = array();
$miSegundoArray1 = array(1, 34, "nueva");

// Rellenamos la posicion 1, 16 y 54 con cualquier cosa
$miArray1[1] = 10;
$miArray1[16] = 20;
$miArray1[54] = 30;

// Añadimos al final del array el número 34
array_push($miArray1, 34);

// Añadimos a la posición 1, 2 y 3 del array nuevos valores
$miArray1["uno"] = "cadena";
$miArray1["dos"] = true;
$miArray1["tres"] = 1.345;

// Añadimos al final un nuevo array
$miArray1["ultima"] = $miSegundoArray1;

// --------------- ARRAY 2 ---------------
$miArray2 = array(
    // Rellenamos la posicion 1, 16 y 54 con cualquier cosa
    1 => 10,
    16 => 20,
    54 => 30,

    // Añadimos al final del array el número 34
    34,

    // Añadimos a la posición 1, 2 y 3 del array nuevos valores
    "uno" => "cadena",
    "dos" => true,
    "tres" => 1.345,

    // Añadimos al final un nuevo array
    "ultima" => $miSegundoArray2 = array(1, 34, "nueva")
);

// --------------- ARRAY 3 ---------------
$miArray3 = [
    // Rellenamos la posicion 1, 16 y 54 con cualquier cosa
    1 => 10,
    16 => 20,
    54 => 30,

    // Añadimos al final del array el número 34
    34,

    // Añadimos a la posición 1, 2 y 3 del array nuevos valores
    "uno" => "cadena",
    "dos" => true,
    "tres" => 1.345,

    // Añadimos al final un nuevo array
    "ultima" => $miSegundoArray3 = array(1, 34, "nueva")
];

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 3");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 3", $barraUbi);
cuerpo($miArray1, $miSegundoArray1, $miArray2, $miSegundoArray2, $miArray3, $miSegundoArray3);  //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo($miArray1, $miSegundoArray1, $miArray2, $miSegundoArray2, $miArray3, $miSegundoArray3) // Añadir aqui las variables
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

    echo "<h3>Array 1</h3>" . PHP_EOL;
    mostrarArray($miArray1, $miSegundoArray1);

    echo "<h3>Array 2</h3>" . PHP_EOL;
    mostrarArray($miArray2, $miSegundoArray2);

    echo "<h3>Array 3</h3>" . PHP_EOL;
    mostrarArray($miArray3, $miSegundoArray3);
}

// Aqui escribiremos las funciones

// FUNCIONES

/**
 * Función que muestra el array en la interfaz con su indice y valor
 *
 * @param [array] $miArray1
 * @return void
 */
function mostrarArray($miArray, $miSegundoArray)
{
    foreach ($miArray as $indice => $valor) {
        if ($indice == "ultima") {
            echo "[" . $indice . "] = " . PHP_EOL;
            for ($i = 0; $i < count($miSegundoArray); $i++) {
                echo "[" . $i . "] = " . $miSegundoArray[$i] . " " . PHP_EOL;
            }
        }
        else {
            echo "[" . $indice . "] = " . $valor . "<br>" . PHP_EOL;
        }
    }
}