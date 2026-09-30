<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

const NUM1 = 56;
define("NUMERO", 25);

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

    echo $una_cadena . $unaCadena;
    if (isset($cadena2)) {
        echo $cadena2;
    };
    $real = 1234.56789012345678901;
    $real += 0.432109876549;

    $real2 = 1234.5678901;
    $real2 += 0.4321099;

    // $real3 = ("2" + "1");
    echo "El número es {$var1}<br>" . PHP_EOL; // .PHP_EOL --> Saltos de linea visibles en "Ver codigo fuente"
    echo 'El número es {$var1}<br>' . PHP_EOL;
    echo "\\"; // Escapar caracteres con "\"

    $real = null;
    echo $real;

    $var = 125;
    $tipo = gettype($var);
    $var = (string)$var;
    $tipo = gettype($var);
    settype($var, "double");
    $tipo = gettype($var);
    $var = intval($var);
    $tipo = gettype($var);

    $var = "0";
    if ($var) {
        $cadena = "var no false";
    }

    $var = "";
    if ("0000") {
        $cadena = "var no false";
    }

    $var = 0;
    if ($var) {
        $cadena = "var no false";
    }

    $var = 1;
    if ($var) {
        $cadena = "var no false";
    }


    $var = 1 + true;
    $var = 1 + 1.5;
    // $var=1+"1Hola";
    // $var=1+"1.5Hola";
    //$var=1+"Hola";
    // $var=1+[];

    $aux = 125;
    $var = "Hola " . $aux;

    $aux = true;
    $var = "Hola " . $aux;

    $aux = [];
    // $var="Hola ".$aux;

    $aux = "adios";
    $var = "Hola " . $aux;

    // Referencia
    $var1 = 100;
    $var2 = $var1;
    $var3 = &$var1;
    $var2 = 150;
    $var3 = 200;

    unset($var1);

    $var1 = NUMERO;
    $var1 = NUM1;

    // Operadores
    $var = 15 / 2;

    if ("25" == 25) {
        $var = "Iguales";
    }

    if ("25hola" == 25) {
        $var = "Iguales";
    }

    if ("25" === 25) {
        $var = "Iguales";
    }

    if ("25" != 25) {
        $var = "Distintos";
    }

    if ("25" !== 25) {
        $var = "Distintos";
    }

    $var = 14 > 25;
    $var = 14 < 25;
    $var = 14 <=> 25;

    if (isset($var3)) {
        $var = $var3;
    } elseif (isset($mivar)) {
        $var = $mivar;
    } else {
        $var = 27;
    }

    $var = $var3 ?? $mivar ?? 27;

    // $var=intdiv();

    $var = 0b11111;
    $var = $var >> 1;
    $var = $var << 1;
    $var = 0b1010 & 0b0101;


    $var = 7;
    if ($var == 1)
        $cadena = "uno";
    else
        $cadena = "siete";

    $var = 1;
    switch ($var) {
        case 1:
            $cadena = "1";
            break;
        case 2:
            $cadena = "2";
            break;
        default:
            $cadena = "otro";
            break;
    }

    ?>




<?php
}
