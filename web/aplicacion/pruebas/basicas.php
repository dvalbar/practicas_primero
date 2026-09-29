<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Pruebas básicas");
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo()
{
?>
    <br><br> Esto es HTML. <!-- Esto es un comentario en HTML -->
    <?php
    $var1 = 25;
    $cadena = "Esto es una cadena";

    $var1 += 0b1000; // Octal

    echo 'Hola esto es PHP'; // Esto es un comentario en PHP

    #Otro tipo de comentario
    echo $var1;

    $una_cadena = "Hola";
    $unaCadena = "Adios";

    $var1 -= 17;
    echo $var1;

    $unaCadena = 45;

    echo $una_cadena.$unaCadena;
    if (isset($cadena2)) {
        echo $cadena2;
    };

    ?>

<?php
}
