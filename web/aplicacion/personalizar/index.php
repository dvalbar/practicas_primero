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

//dibuja la plantilla de la vista
inicioCabecera("PÁGINA PRINCIPAL");
cabecera();
finCabecera();
inicioCuerpo("PÁGINA PRINCIPAL", $barraUbi);
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
    <h3>Página Principal de la Relación 8.</h3>

    <!-- Información cualquiera -->
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis officia excepturi ipsa veritatis corrupti error maiores aliquam magni dolorum doloribus quod dolor quae repellendus eveniet non iusto ut, deserunt aut!</p>
    <br>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo tenetur iusto quas vitae fuga perspiciatis exercitationem aspernatur, eius architecto ea ducimus, dolorum iste, provident nostrum pariatur et accusamus nisi reprehenderit?</p>
    <br>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum, ab, voluptates pariatur consequuntur neque odio illo iste amet suscipit incidunt, deleniti iure non nam? Consectetur, reprehenderit. Iste magni dignissimos explicabo!</p>
    <br>
<?php

    if (isset($_COOKIE["visitas"])) {
        echo "Esta es tu visita número: " . $_COOKIE["visitas"];
    }
}

// Aqui escribiremos las funciones

// FUNCIONES
