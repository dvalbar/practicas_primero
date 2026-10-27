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

$miInstrumento1 = new InstrumentoBase("Piano",5);

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
    echo "<h4>Clase InstrumentoBase</h4>".PHP_EOL;
    echo $miInstrumento1;


}

// Aqui escribiremos las funciones

// FUNCIONES