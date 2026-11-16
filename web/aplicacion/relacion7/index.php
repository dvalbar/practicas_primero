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
            "nombre" => "Relacion 7",
        ]
    ];

$arrayDatos = [];

$arrayErrores = [];

//dibuja la plantilla de la vista
inicioCabecera("RELACIÓN 7");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 7", $barraUbi);
cuerpo($arrayDatos, $arrayErrores);  //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo($arrayDatos, $arrayErrores) // Añadir aqui las variables
{
?>
    <br>
    <h3>Formulario de la relación 7.</h3>
<?php

    formulario($arrayDatos, $arrayErrores);
}

// Aqui escribiremos las funciones

// FUNCIONES

/**
 * Función que muestra el formulario por pantalla
 *
 * @param array $datos Array con todos los datos del formulario
 * @param array $errores Array con los mensajes de error del formulario
 * 
 * @return void No devuelve nada
 */
function formulario(array $datos, array $errores): void
{
    if ($errores) { //mostrar los errores
        echo "<div class='error'>";
        foreach ($errores as $clave => $valor) {
            foreach ($valor as $error)
                echo "$clave => $error<br>" . PHP_EOL;
        }
        echo "</div>";
    }
?>

    <form action="" method="POST">
        <!-- Coordenada X -->
        <label for="x">Coordenada X: </label>
        <input type="text" id="x" name="x" value="">
        <!-- Coordenada Y -->
        <label for="y">Coordenada Y: </label>
        <input type="text" id="y" name="y" value="">
        <br>
        <button type="submit" name="enviar">Enviar</button>
    </form>
<?php
}
