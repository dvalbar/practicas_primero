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
            "nombre" => "Ejercicio 2",
            "enlace" => "/aplicacion/relacion1/ejercicio2.php"
        ]
    ];

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 2");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 2",$barraUbi);
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
    echo "2.- Simular el lanzamiento de un dado (6 veces) (usar un bucle for, mt_rand con parametros). Además
contar el número de veces que aparece cada lado si se hicieran N lanzamientos al estilo (N lo
definiremos como constante) (usar un bucle while, mt_rand sin parametros).
Se deben usar arrays para almacenar los datos de las tiradas. Los arrays deben obtenerse en la
parte del controlador y visualizarse los resultados en la vista. Los arrays se pasarán como parámetros a la
vista (nunca como variables globales)";

}

// Aqui escribiremos las funciones

// FUNCIONES