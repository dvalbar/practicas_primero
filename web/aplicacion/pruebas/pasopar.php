<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

// Datos basicos
$nombre = "David";
$edad = 20;

$basicos = [
    // Vamos a usar posiciones asociativas
    "nombre"=>$nombre,
    "edad"=>$edad
];

// Relleno otras
$otras = rellenarOtras();

//dibuja la plantilla de la vista
inicioCabecera("Mi aplicacion");
cabecera();
finCabecera();
inicioCuerpo("PASO PARAMENTROS");
cuerpo($basicos, $otras);  //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera()
{
    // Fin del PHP
?>
    <!-- Esto va en el HEAD -->
<?php
    // Inicio del PHP
}

//vista
function cuerpo($bas, $or)
{
?>
    <br><br>
    <!-- <a href="./aplicacion/pruebas/index.php">Acceso a pruebas.</a> -->
<?php
    echo "Mi nombre es {$bas["nombre"]} de {$bas["edad"]} años<br>".PHP_EOL;
    echo "Con otros datos {$or}";
}

// Aqui escribiremos las funciones

// FUNCIONES
function rellenarOtras() {
    return "De 2º DAW";
}