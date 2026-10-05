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
<br>\$vector=array();
<br>\$vector[1]='esto es una cadena';
<br>\$vector['posi1']=25.67;
<br>\$vector[]=false;
<br>\$vector['ultima']=array(2,5,96);
<br>\$vector[56]=23;
<br><br>Mostrar mediante bucles foreach el contenido del array con la siguiente salida:
<br>- posicion XXX contenido (tipo) YYYYY
<br>- Según el tipo del contenido
<br>o Si es un array mostrarlo mediante un foreach.
<br>o Si es un entero poner Entero con valor DDD, en binario BBB
<br>o Si es un real DDD que al cuadrado es DDD
<br>o Si es una cadena -CCCCo Si es un booleano BBB y su opuesto XXX
<br>Las palabras en mayúscula representan un valor concreto de lo pedido
<br><br>El array se definirá en el controlador y se visualizará en la vista.";

}

// Aqui escribiremos las funciones

// FUNCIONES