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
$espacioEnBlanco = "&nbsp;";

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 2");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 2", $barraUbi);
cuerpo($cadena, $espacioEnBlanco);  //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo($cadena, $espacioEnBlanco) // Añadir aqui las variables
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
válidas para que pueda comprobar que lo has hecho.<br><br>".PHP_EOL;

    $cadenaConcat = "";

    // Primera forma (MAL)
    for ($i = 0; $i < strlen($cadena); $i++) {
        $cadenaConcat .= $espacioEnBlanco;
        echo $cadenaConcat . $cadena[$i] . "<br>".PHP_EOL;
    }

    $cadenaConcat = "";

    // Segunda forma (MAL)

    for ($i = 0; $i < strlen($cadena); $i++) {
        $cadenaConcat .= $espacioEnBlanco;
        echo $cadenaConcat . substr($cadena, $i, 1) . "<br>".PHP_EOL;
    }

    $cadenaConcat = "";

    // Tercera forma (BIEN)

    for ($i = 0; $i < strlen($cadena); $i++) {
        $cadenaConcat .= $espacioEnBlanco;
        echo $cadenaConcat . mb_substr($cadena, $i, 1) . "<br>".PHP_EOL;
    }

    echo "<br>- Mostrar la cadena en orden inverso, (usar índices negativos, no invertir la cadena)
con cada carácter en una línea distinta y con los espacios en blanco
correspondientes (desde 0 hasta n espacios en blanco), los caracteres pares en
mayúscula (0, 2, …) y los impares en minúscula (1, 3, 5, …), y extrayendo los
caracteres con mb_substr.".PHP_EOL;

    $cadenaConcat = "";

    for ($i = strlen($cadena); $i >= 0; $i--) {
        $cadenaConcat .= $espacioEnBlanco;
        if ($i % 2 == 0)
            echo $cadenaConcat . mb_strtoupper(mb_substr($cadena, $i, 1)) . "<br>" . PHP_EOL;
        else
            echo $cadenaConcat . mb_substr($cadena, $i, 1) . "<br>".PHP_EOL;
    }

    echo "<br><br>- Separa la cadena en partes usando el carácter a, y mostrar cada parte en una línea
distinta<br><br>".PHP_EOL;

    $array = mb_split("a", $cadena);

    for ($i = 0; $i < count($array); $i++) {
        echo $array[$i]."<br>";
    }

    echo "<br>- Localiza en la cadena la palabra niña y cambia el siguiente carácter a niña (el
espacio en blanco) por \"/mujer \"<br><br>".PHP_EOL;

    $palabraBuscar = "niña";
    $posicion = mb_strpos($cadena,$palabraBuscar);

    $posEspacioEnBlanco = $posicion+mb_strlen($palabraBuscar);
    $cadena1 = mb_substr($cadena,0,$posEspacioEnBlanco,"UTF-8");

    $cadena2 = mb_substr($cadena,$posEspacioEnBlanco+1,mb_strlen($cadena));

    $miNuevaCadena = $cadena1."/mujer ".$cadena2;

    echo $miNuevaCadena.PHP_EOL;
}

// Aqui escribiremos las funciones

// FUNCIONES