<?php
include_once(dirname(__FILE__) . "/cabecera.php");
//controlador


//dibuja la plantilla de la vista
inicioCabecera("Mi aplicacion");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION index.html");
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
    <a href="./aplicacion/pruebas/index.php">Acceso a pruebas.</a>
<?php
}

// Aqui escribiremos las funciones