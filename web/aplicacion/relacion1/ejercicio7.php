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
            "nombre" => "Relacion 1",
            "enlace" => "/aplicacion/relacion1/index.php"
        ],
        [
            "nombre" => "Ejercicio 7",
        ]
    ];

// Cambiar la zona horaria a la de España
date_default_timezone_set("Europe/Madrid");

$diasSemana = ["domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado"];
$meses = [1 => "enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", 
"agosto", "septiembre", "octubre", "noviembre", "diciembre"];


//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 7");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 7", $barraUbi);
cuerpo($diasSemana, $meses);  //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo($diasSemana, $meses) // Añadir aqui las variables
{
?>
    <br><br>
<?php
    echo "7.- Mostrar el funcionamiento de las fechas. Se harán todos los apartados usando la serie de funciones
para gestión de fecha. Se repetirán todos los ejercicios usando la clase DateTime.

<br><br>- Mostrar la fecha actual en el formato “d/m/Y”
<br>- Mostrar la fecha actual en el formato “dia d, mes mmmm, año yyyy, dia de la semana dd”.
<br>- Mostrar la hora actual en el formato “hh:mm:ss”
<br>- Mostrar los tres apartados anteriores para la fecha 29/3/2024 a 12:45.
<br>- Mostrar los tres apartados anteriores para la fecha actual menos 12 días y 4 horas
<br><br>Se definirán las fechas y se visualizarán directamente en la vista. ( no se definirán en el
controlador)";

    $fechaConcreta = mktime(12, 45, 0, 3, 29, 2024);
    $fechaRestar = strtotime("-12 days -4 hours");

    echo "<h3>Funciones Fechas</h3>";

    //  Mostrar la fecha actual en el formato “d/m/Y”
    echo "Fecha actual en el formato 'd/m/Y' = " . date("d/m/Y") . "<br><br>";

    // Mostrar la fecha actual en el formato “dia d, mes mmmm, año yyyy, dia de la semana dd”
    echo "Fecha actual en el formato 'dia d, mes mmm, año yyy, dia de la semana dd' = Día " . date("j") . ", mes " .
        $meses[date("n")] . ", año " . date("Y") . ", día de la semana " . $diasSemana[date("w")] . "<br><br>";

    // Mostrar la hora actual en el formato “hh:mm:ss”
    echo "Hora actual en formato 'hh:mm:ss' = " . date("H:i:s") . "<br><br>";


    // ------------------------------------------------------------------------------------------------------------------------
    // Mostrar los tres apartados anteriores para la fecha 29/3/2024 a 12:45.
    echo "<h4>Mostrar los tres apartados anteriores para la fecha 29/3/2024 a 12:45</h4>";
    //  Mostrar la fecha actual en el formato “d/m/Y”
    echo "Fecha actual en el formato 'd/m/Y' = " . date("d/m/Y", $fechaConcreta) . "<br><br>";

    // Mostrar la fecha actual en el formato “dia d, mes mmmm, año yyyy, dia de la semana dd”
    echo "Fecha actual en el formato 'dia d, mes mmm, año yyy, dia de la semana dd' = Día " . date("j", $fechaConcreta) . ", mes " .
        $meses[date("n", $fechaConcreta)] . ", año " . date("Y", $fechaConcreta) . ", día de la semana " . $diasSemana[date("w", $fechaConcreta)] . "<br><br>";

    // Mostrar la hora actual en el formato “hh:mm:ss”
    echo "Hora actual en formato 'hh:mm:ss' = " . date("H:i:s", $fechaConcreta) . "<br><br>";


    // ------------------------------------------------------------------------------------------------------------------------
    // Mostrar los tres apartados anteriores para la fecha actual menos 12 días y 4 horas
    echo "<h4>Mostrar los tres apartados anteriores para la fecha actual menos 12 días y 4 horas</h4>";
    //  Mostrar la fecha actual en el formato “d/m/Y”
    echo "Fecha actual en el formato 'd/m/Y' = " . date("d/m/Y", $fechaRestar) . "<br><br>";

    // Mostrar la fecha actual en el formato “dia d, mes mmmm, año yyyy, dia de la semana dd”
    echo "Fecha actual en el formato 'dia d, mes mmm, año yyy, dia de la semana dd' = Día " . date("j", $fechaRestar) . ", mes " .
        $meses[date("n", $fechaRestar)] . ", año " . date("Y", $fechaRestar) . ", día de la semana " . $diasSemana[date("w", $fechaRestar)] . "<br><br>";

    // Mostrar la hora actual en el formato “hh:mm:ss”
    echo "Hora actual en formato 'hh:mm:ss' = " . date("H:i:s", $fechaRestar) . "<br><br>";


    echo "<h3>DateTime</h3>";

    //  Mostrar la fecha actual en el formato “d/m/Y”


    // Mostrar la fecha actual en el formato “dia d, mes mmmm, año yyyy, dia de la semana dd”


    // Mostrar la hora actual en el formato “hh:mm:ss”


    // Mostrar los tres apartados anteriores para la fecha 29/3/2024 a 12:45.


    // Mostrar los tres apartados anteriores para la fecha actual menos 12 días y 4 horas
}

// Aqui escribiremos las funciones

// FUNCIONES