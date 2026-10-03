<?php
include_once(dirname(__FILE__) . "/cabecera.php");
//controlador
$barraUbi =
    [
        [
            "nombre" => "Inicio",
            "enlace" => "/index.php"
        ]
    ];

//dibuja la plantilla de la vista
inicioCabecera("PROYECTO DAVID");
cabecera();
finCabecera();
inicioCuerpo("INICIO", $barraUbi);
cuerpo();  //llamo a la vista
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
function cuerpo()
{
?>
    <br><br>
    <p>Inicio del proyecto.</p>
<?php
}

// Aqui escribiremos las funciones