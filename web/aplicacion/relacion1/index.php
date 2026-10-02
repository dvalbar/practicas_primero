<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//dibuja la plantilla de la vista
inicioCabecera("Relación 1");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 1");
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
function cuerpo() // Añadir aqui las variables
{
?>
    <br><br>
    <a href="/aplicacion/relacion1/ejercicio1.php">Ejercicio 1.</a>
<?php
    
}

// Aqui escribiremos las funciones

// FUNCIONES