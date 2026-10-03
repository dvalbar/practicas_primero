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
            "nombre" => "Ejercicio 3",
            "enlace" => "/aplicacion/relacion1/ejercicio3.php"
        ]
    ];

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 3");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 3",$barraUbi);
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
    echo "3.- Se quiere:
a) Crear una variable de tipo array.
b) Rellenar las posiciones 1, 16, 54 con valores cualquiera.
c) Añadir el valor 34 al final
d) Añadir los valores “cadena”, true, 1.345 en las posiciones “uno”, “dos” y “tres”
e) Rellenar la posición “ultima” con el array (1,34,”nueva”);
- Hacer lo anterior creando y rellenando el array usando varias sentencias.
- Hacer lo anterior usando una sola sentencia con array;
- Hacer lo anterior usando una sola sentencia con []
- Recorrer los tres arrays usando foreach mostrando todos los valores de los arrays creados
Los arrays se definirán en el controlador y se visualizarán en la vista.
";

}

// Aqui escribiremos las funciones

// FUNCIONES