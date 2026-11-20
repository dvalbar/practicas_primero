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
            "nombre" => "Imagen"
        ]
    ];

$nombreFichero = RUTABASE . "/imagenes/pruebaImagen.jpg";

// Imagen vacia en negro
$img = imagecreatetruecolor(250, 250);

// Color azul
$color = imagecolorallocate($img, 0, 0, 255);

// Rectangulo relleno de azul
imagefilledrectangle($img, 10, 10, 190, 190, $color);

// Color blanco para la linea
$color = imagecolorallocate($img, 255, 255, 255);

// Linea
imageline($img, 10, 10, 100, 15, $color);

// Imagen final
imagejpeg($img, $nombreFichero);

//dibuja la plantilla de la vista
inicioCabecera("PRUEBA IMAGEN");
cabecera();
finCabecera();
inicioCuerpo("Prueba imagen", $barraUbi);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo()
{

?>
    <br>
    <h3>Prueba ficheros.</h3>

<?php

    echo "<img src='/imagenes/pruebaImagen.jpg' alt='Imagen de prueba'>";
}
