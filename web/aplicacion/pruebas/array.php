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
            "nombre" => "Prueba arrays",
        ]
    ];

//dibuja la plantilla de la vista
inicioCabecera("Prueba arrays");
cabecera();
finCabecera();
inicioCuerpo("PRUEBA ARRAYS", $barraUbi);
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
<?php

    $miArray[3] = 23;
    $miArray[7] = 1234;
    $miArray[] = 54;

    $total = 0;

    $final = count($miArray);

    for ($i = 0; $i < $final; $i++) {
        if (isset($miArray[$i]))
            $total += $miArray[$i];
        else
            $final++;
    }

    $miArray["nueva"] = 24;

    $total = 0;
    $total1 = 1;
    foreach ($miArray as $key => $value) {
        $total+=$miArray[$key];
        $total1 += $value;
    }

}

// Aqui escribiremos las funciones

// FUNCIONES