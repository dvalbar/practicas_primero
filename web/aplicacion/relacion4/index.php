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

// Clase Abstracta
// $miInstrumento1 = new InstrumentoBase("Piano", 5);
// $miInstrumento2 = new InstrumentoBase("Bajo", 7);
$miInstrumentoViento1 = new InstrumentoViento();
$miInstrumentoViento2 = new InstrumentoViento(4, "latón");

$misObjetos = [
    // "miInstrumento1" => $miInstrumento1,
    // "miInstrumento2" => $miInstrumento2,
    "miInstrumentoViento1" => $miInstrumentoViento1,
    "miInstrumentoViento2" => $miInstrumentoViento2,
];

//dibuja la plantilla de la vista
inicioCabecera("RELACIÓN 4");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 4", $barraUbi);
cuerpo($misObjetos);  //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo($misObjetos) // Añadir aqui las variables
{
?>
    <br><br>
    <h3>Clases de la relación 4.</h3>
<?php
    echo "<h4>Clase InstrumentoBase (Abstracta)</h4>" . PHP_EOL;

    // No tiene sobrecarga
    // $miInstrumento1->nombre = "hola";
    // echo $miInstrumento1->_edad;
    // if (isset($miInstrumento1->_edad)) {
    //     echo "Hola";
    // }
    // unset($miInstrumento1->_edad);

    // // toString
    // echo $misObjetos["miInstrumento1"] . "<br><br>" . PHP_EOL;

    // echo "Descripción del instrumento: " . $misObjetos["miInstrumento1"]->getDescripcion() . "<br>" . PHP_EOL;
    // echo "Edad del instrumento: " . $misObjetos["miInstrumento1"]->getEdad() . "<br><br>" . PHP_EOL;

    // // Modificar objeto
    // $misObjetos["miInstrumento1"]->setDescripcion("Guitarra");
    // $misObjetos["miInstrumento1"]->setEdad(10);

    // // toString despues de hacer cambios al objeto
    // echo $misObjetos["miInstrumento1"] . "<br><br>" . PHP_EOL;

    // // Aumenta el número de instancias creadas
    // echo $misObjetos["miInstrumento2"] . "<br>" . PHP_EOL;


    echo "<h4>Interfaz IFabricable</h4>" . PHP_EOL;

    // No se puede probar todavia, es una interfaz

    echo "<h4>Clase InstrumentoViento</h4>" . PHP_EOL;

    echo $misObjetos["miInstrumentoViento1"] . "<br><br>" . PHP_EOL;
    echo "Material del instrumento: " . $misObjetos["miInstrumentoViento1"]->getMaterial() . "<br><br>" . PHP_EOL;

    echo "Afinación: " . $misObjetos["miInstrumentoViento1"]->afinar() . "<br><br>" . PHP_EOL;
    echo "Sonido del instrumento: " . $misObjetos["miInstrumentoViento1"]->sonido() . "<br><br>" . PHP_EOL;

    echo $misObjetos["miInstrumentoViento2"] . "<br>" . PHP_EOL;

    echo "<h4>Clase Flauta</h4>" . PHP_EOL;

    echo "<h4>Clase Persona</h4>" . PHP_EOL;

    echo "<h4>Clase SerieFibonacci</h4>" . PHP_EOL;

    echo "<h4>Clase ClaseMisPropiedades</h4>" . PHP_EOL;
}

// Aqui escribiremos las funciones

// FUNCIONES