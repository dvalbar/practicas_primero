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
        ]
    ];

//dibuja la plantilla de la vista
inicioCabecera("PRUEBAS");
cabecera();
finCabecera();
inicioCuerpo("PRUEBAS", $barraUbi);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo()
{
?>
    <br><br>
    <h3>Páginas de pruebas.</h3>
    <a href="./basicas.php">Funcionamiento básico</a><br>
    <a href="./pasopar.php">Paso parámetros</a><br>
    <a href="./array.php">Prueba arrays</a>
<?php
}
