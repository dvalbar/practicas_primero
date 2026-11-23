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
            "nombre" => "Relacion 8",
            "enlace" => "/aplicacion/relacion8/index.php"
        ],
        [
            "nombre" => "Personalizar"
        ]
    ];

setcookie("visitas", 1);

//dibuja la plantilla de la vista
inicioCabecera("PERSONALIZAR");
cabecera();
finCabecera();
inicioCuerpo("PERSONALIZAR", $barraUbi);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo() // Añadir aqui las variables
{
?>
    <br>
    <h3>Personalizar Página Principal de la Relación 8.</h3>
    <br>
    <h4>Colores de fondo</h4>
    <select name="fondo" id="fondo">
        <?php foreach (COLORESFONDO as $key => $value) {
            $color = mb_strtoupper($value["nombre"]);
            echo "<option value = '$key'>$color</option>";
        } ?>
    </select>
    <br>
    <h4>Colores de texto</h4>
    <select name="texto" id="texto">
        <?php foreach (COLORESTEXTO as $key => $value) {
            $color = mb_strtoupper($value["nombre"]);
            echo "<option value = '$key'>$color</option>";
        } ?>
    </select>
<?php
}

// Aqui escribiremos las funciones

// FUNCIONES
