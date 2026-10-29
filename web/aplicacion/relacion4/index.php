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
            "nombre" => "Relacion 4",
        ]
    ];

$miInstrumento1 = new InstrumentoBase("Piano", 5);

//dibuja la plantilla de la vista
inicioCabecera("RELACIÓN 4");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 4", $barraUbi);
cuerpo($miInstrumento1);  //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo($miInstrumento1) // Añadir aqui las variables
{
?>
    <br><br>
    <h3>Clases de la relación 4.</h3>
<?php
    echo "<h4>Clase InstrumentoBase</h4>" . PHP_EOL;

    // No tiene sobrecarga
    // $miInstrumento1->nombre = "hola";
    // echo $miInstrumento1->_edad;
    // if (isset($miInstrumento1->_edad)) {
    //     echo "Hola";
    // }
    // unset($miInstrumento1->_edad);

    // toString
    echo $miInstrumento1;


    echo "<h4>Interfaz IFabricable</h4>" . PHP_EOL;

    echo "<h4>Clase InstrumentoViento</h4>" . PHP_EOL;

    echo "<h4>Clase Flauta</h4>" . PHP_EOL;

    echo "<h4>Clase Persona</h4>" . PHP_EOL;

    echo "<h4>Clase SerieFibonacci</h4>" . PHP_EOL;

    echo "<h4>Clase ClaseMisPropiedades</h4>" . PHP_EOL;
}

// Aqui escribiremos las funciones

// FUNCIONES