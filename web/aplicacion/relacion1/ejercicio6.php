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
            "nombre" => "Ejercicio 6",
            "enlace" => "/aplicacion/relacion1/ejercicio6.php"
        ]
    ];

$vector = array(
    'primera' => 12.56,
    24 => true,
    67 => 23.76
);

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 6");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 6", $barraUbi);
cuerpo($vector);  //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo($vector) // Añadir aqui las variables
{
?>
    <br><br>
<?php
    echo "6.- Con el array \$vector=array('primera' =>12.56, 24=>true, 67 =>23.76);<br><br>
- Simular el funcionamiento de foreach (\$array as \$indice => \$valor) usando las funciones de
recorrido para mostrar tanto los índices como los valores del array anterior.<br>
<br>- Simular el funcionamiento de foreach usando las funciones array_keys y array_values para
mostrar tanto los índices como los valores del array anterior.
<br><br>El array se definirá en el controlador y se realizarán las operaciones en la vista.";

    echo "<h3>Recorrer array simulando foreach con funciones de recorrido</h3>";
    for ($i = 0; $i < count($vector); $i++) {
        echo "[" . key($vector) . "] " . current($vector) . "<br>";
        next($vector);
    }

    echo "<h3>Recorrer array simulando foreach con funciones array_keys y array_values</h3>";
    for ($i = 0; $i < count($vector); $i++) {
        $indices = array_keys($vector);
        $valores = array_values($vector);
        echo "[" . $indices[$i] . "] " . $valores[$i] . "<br>";
    }
}

// Aqui escribiremos las funciones

// FUNCIONES