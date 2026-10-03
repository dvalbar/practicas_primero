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
            "nombre" => "Ejercicio 5",
            "enlace" => "/aplicacion/relacion1/ejercicio5.php"
        ]
    ];

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 5");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 5",$barraUbi);
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
    echo "5.- Rellenar un array con el siguiente contenido.
\$vector=array();
\$vector[1]='esto es una cadena';
\$vector['posi1']=25.67;
\$vector[]=false;
\$vector['ultima']=array(2,5,96);
\$vector[56]=23;
Mostrar mediante bucles foreach el contenido del array con la siguiente salida:
- posicion XXX contenido (tipo) YYYYY
- Según el tipo del contenido
o Si es un array mostrarlo mediante un foreach.
o Si es un entero poner Entero con valor DDD, en binario BBB
o Si es un real DDD que al cuadrado es DDD
o Si es una cadena -CCCCo Si es un booleano BBB y su opuesto XXX
Las palabras en mayúscula representan un valor concreto de lo pedido
El array se definirá en el controlador y se visualizará en la vista.";

}

// Aqui escribiremos las funciones

// FUNCIONES