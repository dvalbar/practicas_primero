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
            "nombre" => "Ejercicio 4",
            "enlace" => "/aplicacion/relacion1/ejercicio4.php"
        ]
    ];

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 4");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 4",$barraUbi);
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
    echo "4- Generar un array con los siguientes valores mostrándolos posteriormente con foreach. El array se
debe generar usando bucles for.
1
2 2
3 3 3
4 4 4 4
5 5 5 5 5
Declarar la constante FILAS que se rellenará con el número de filas que se deben crear. Repetir
lo anterior usando FILAS para crear el array y visualizarlo.
Los datos se definirán en el controlador y se visualizarán en la vista.";

}

// Aqui escribiremos las funciones

// FUNCIONES