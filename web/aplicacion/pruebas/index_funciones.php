<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once("libreria_funciones.php"); // Añadir libreria de funciones

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
            "nombre" => "Funciones",
        ]
    ];

// Variables
$numEjemplo = doble(2);

// Controlar lo que devuelve la función para 
// mostrar errores o mostrar el resultado de la función
if ($numEjemplo === false) { // Si el num es menor de 10 return false (error)
    $numEjemplo = -1;
}

$numero = variosParametros(25, "2aaa8769", 56);
$numero = variosParametros(25, "2");
//par2 debe tener un valor por defecto porque si no, dará fallo, ya que no le hemos
//indicado ningún valor en la llamada
$numero = variosParametros(25, par3: 100);
//los demás parámetros no son accesibles porque no se 
//ha definido una forma de trabajar con ellos
$numero = variosParametros(25, "2aaa8769", 56, 2, 5, 6, 8);
$numero = suma(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
//$numero = suma1(1,2,3,4,5,6,7,8,9,10);
$r = [3, 4, 5, 6, 7, 8, 9, 10];
$numero = suma(1, 2, ...$r);
$numero = suma(...$r);

$n1=15;
$otra="n1";

// variable-variable
$numero=$$otra;

// variable-funcion
$otra="suma";
$numero=$otra(1,2,3,4);

//dibuja la plantilla de la vista
inicioCabecera("FUNCIONES");
cabecera();
finCabecera();
inicioCuerpo("Funciones", $barraUbi);
cuerpo($numEjemplo); //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo($numEjemplo) {
?>
    <br><br>
    <?php

    echo "<h3>Funciones de ejemplo</h3><br>" . PHP_EOL;

    echo "Función doble(\$num): " . PHP_EOL;

    echo ($numEjemplo < 0) ? "Error: El número es menor" : $numEjemplo;

    ?>

<?php
}