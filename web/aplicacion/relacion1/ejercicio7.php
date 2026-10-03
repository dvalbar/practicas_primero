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
            "enlace" => "/aplicacion/relacion1/ejercicio7.php"
        ]
    ];

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 7");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 7",$barraUbi);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera()
{
    
}

//vista
function cuerpo() // Añadir aqui las variables
{
?>
    <br><br>
<?php
    echo "7.- Mostrar el funcionamiento de las fechas. Se harán todos los apartados usando la serie de funciones
para gestión de fecha. Se repetirán todos los ejercicios usando la clase DateTime.
- Mostrar la fecha actual en el formato “d/m/Y”
- Mostrar la fecha actual en el formato “dia d, mes mmmm, año yyyy, dia de la semana dd”.
- Mostrar la hora actual en el formato “hh:mm:ss”
- Mostrar los tres apartados anteriores para la fecha 29/3/2024 a 12:45.
- Mostrar los tres apartados anteriores para la fecha actual menos 12 días y 4 horas
Se definirán las fechas y se visualizarán directamente en la vista. ( no se definirán en el
controlador)";

}

// Aqui escribiremos las funciones

// FUNCIONES