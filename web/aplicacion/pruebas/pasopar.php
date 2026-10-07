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
            "nombre" => "Pruebas",
            "enlace" => "/aplicacion/pruebas/index.php"
        ],
        [
            "nombre" => "Paso parámetros",
        ]
    ];

// Datos basicos
$nombre = "David";
$edad = 20;

$basicos = [
    // Vamos a usar posiciones asociativas
    "nombre" => $nombre,
    "edad" => $edad
];

// Relleno otras
$otras = rellenarOtras();

//dibuja la plantilla de la vista
inicioCabecera("Paso parámetros");
cabecera();
finCabecera();
inicioCuerpo("PASO PARÁMETROS", $barraUbi);
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
    echo "Mi nombre es {$bas["nombre"]} de {$bas["edad"]} años<br>" . PHP_EOL;
    echo "Con otros datos {$or}";
}

// Aqui escribiremos las funciones

// FUNCIONES
function rellenarOtras()
{
    return "de 2º DAW";
}