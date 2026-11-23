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
            "nombre" => "Página Principal"
        ]
    ];

// Preguntar si existe la cookie de visitas, si existe contador es igual a el valor de la cookie
if (isset($_COOKIE['visitas'])) {
    $contadorVisitas = (int)$_COOKIE['visitas'];
} else { // Si no existe la cookie, el contador será 0
    $contadorVisitas = 0;
}

// Aumentamos en uno el contador por cada visita
$contadorVisitas++;

// Y se crea la cookie con el contador como valor
setcookie("visitas", (string)$contadorVisitas);

// Color de fondo
if (isset($_COOKIE['fondo'])) {
    $fondo = $_COOKIE['fondo'];
} else {
    $fondo = "white";
}

// Color de texto
if (isset($_COOKIE['texto'])) {
    $texto = $_COOKIE['texto'];
} else {
    $texto = "black";
}

//dibuja la plantilla de la vista
inicioCabecera("PÁGINA PRINCIPAL");
cabecera($fondo, $texto);
finCabecera();
inicioCuerpo("PÁGINA PRINCIPAL", $barraUbi);
cuerpo($contadorVisitas);  //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera(string $fondo, string $texto)
{
?>
    <style>
        #documento {
            background-color: <?= $fondo ?>;
            color: <?= $texto ?>;
        }
    </style>
<?php
}

//vista
function cuerpo(int $contadorVisitas) // Añadir aqui las variables
{
?>
    <br>
    <h3>Página Principal de la Relación 8.</h3>
    <a href="../personalizar/personalizar.php">← Ir a Personalizar</a>
    <br>
    <!-- Información cualquiera -->
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis officia excepturi ipsa veritatis corrupti error maiores aliquam magni dolorum doloribus quod dolor quae repellendus eveniet non iusto ut, deserunt aut!</p>
    <br>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo tenetur iusto quas vitae fuga perspiciatis exercitationem aspernatur, eius architecto ea ducimus, dolorum iste, provident nostrum pariatur et accusamus nisi reprehenderit?</p>
    <br>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum, ab, voluptates pariatur consequuntur neque odio illo iste amet suscipit incidunt, deleniti iure non nam? Consectetur, reprehenderit. Iste magni dignissimos explicabo!</p>
    <br>
<?php

    // Contador de visitas a la página
    echo "Esta es tu visita número: " . $contadorVisitas;
}

// Aqui escribiremos las funciones

// FUNCIONES
