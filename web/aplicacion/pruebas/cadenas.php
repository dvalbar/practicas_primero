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
            "nombre" => "Prueba cadenas",
        ]
    ];

//dibuja la plantilla de la vista
inicioCabecera("Prueba cadenas");
cabecera();
finCabecera();
inicioCuerpo("PRUEBA CADENAS", $barraUbi);
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
    <br>

    El niñ&ntilde;o me ha escrito una carta.
    Qué&eacute; &lt;&gt; bonita

<?php

}

// Aqui escribiremos las funciones

// FUNCIONES