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
            "nombre" => "Relacion 2",
            "enlace" => "/aplicacion/relacion2/index.php"
        ],
        [
            "nombre" => "Ejercicio 2",
        ]
    ];

$cadena = 'Está la niña en casa';

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 2");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 2", $barraUbi);
cuerpo($cadena);  //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo($cadena) // Añadir aqui las variables
{
?>
    <br><br>
<?php
    echo "2.- Dada la cadena \"Está la niña en casa\" se pide:<br>
- Mostrar cada carácter en una línea separada y con tantos espacios en blanco como me
indica la posición del carácter mostrado. (quedaría algo así)<br>
NOTA: prueba si puedes hacerlo con [] para obtener los caracteres correctos. Prueba si
puedes hacerlo con substr para obtener los caracteres correctos. Prueba si puedes
hacerlo con mb_substr para obtener los caracteres correctos. Comenta las formas no
válidas para que pueda comprobar que lo has hecho.<br><br>";

    $cadena = mb_substr($cadena,0, mb_strlen($cadena),"UTF-8");

    for ($i=0;$i<mb_strlen($cadena);$i++) {
        echo $cadena[$i]."<br>";
    }
}

// Aqui escribiremos las funciones

// FUNCIONES