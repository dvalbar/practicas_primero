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

// Variables
const LANZAMIENTOS = 1000;
$lanzamientos = LANZAMIENTOS;
$numDados = [
    $numVeces1 = 0,
    $numVeces2 = 0,
    $numVeces3 = 0,
    $numVeces4 = 0,
    $numVeces5 = 0,
    $numVeces6 = 0
];

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 2");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 2", $barraUbi);
cuerpo($lanzamientos, $numDados);  //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo($lanzamientos, $numDados) // Añadir aqui las variables
{
?>
    <br><br>
<?php
    echo "2.- Simular el lanzamiento de un dado (6 veces) (usar un bucle for, mt_rand con parametros). Además
contar el número de veces que aparece cada lado si se hicieran N lanzamientos al estilo (N lo
definiremos como constante) (usar un bucle while, mt_rand sin parametros).
Se deben usar arrays para almacenar los datos de las tiradas. Los arrays deben obtenerse en la
parte del controlador y visualizarse los resultados en la vista. Los arrays se pasarán como parámetros a la
vista (nunca como variables globales)<br>" . PHP_EOL;

    echo "<h3>Lanzamiento de un dado 6 veces</h3>" . PHP_EOL;

    // Bucle for() usando mt_rand() con parámetros
    for ($i = 0; $i < 6; $i++) {
        echo "Lanzamiento " . $i + 1 . " del dado: " . mt_rand(1, 6) . "<br>";
    }

    echo "<h3>Número de veces que aparece cada lado en N lanzamientos</h3>" . PHP_EOL;
    echo "El dado se ha lanzado " . $lanzamientos . " veces<br>" . PHP_EOL; // $lanzamientos es una constante

    // Bucle while() usando mt_rand() sin parámetros
    $i = 0;
    while ($i < $lanzamientos) {
        // El resto de cualquier num entre 6 es siempre un valor entre 0 y 5
        switch ((mt_rand() % 6) + 1) {
            case 1:
                $numDados[0]++;
                break;
            case 2:
                $numDados[1]++;
                break;
            case 3:
                $numDados[2]++;
                break;
            case 4:
                $numDados[3]++;
                break;
            case 5:
                $numDados[4]++;
                break;
            case 6:
                $numDados[5]++;
                break;
        }
        $i++;
    }

    echo "<br>El 1 ha salido " . $numDados[0] . " veces con un porcentaje de " . $numDados[0] / 10 . "%" . PHP_EOL;
    echo "<br>El 2 ha salido " . $numDados[1] . " veces con un porcentaje de " . $numDados[1] / 10 . "%" . PHP_EOL;
    echo "<br>El 3 ha salido " . $numDados[2] . " veces con un porcentaje de " . $numDados[2] / 10 . "%" . PHP_EOL;
    echo "<br>El 4 ha salido " . $numDados[3] . " veces con un porcentaje de " . $numDados[3] / 10 . "%" . PHP_EOL;
    echo "<br>El 5 ha salido " . $numDados[4] . " veces con un porcentaje de " . $numDados[4] / 10 . "%" . PHP_EOL;
    echo "<br>El 6 ha salido " . $numDados[5] . " veces con un porcentaje de " . $numDados[5] / 10 . "%" . PHP_EOL;
}

// Aqui escribiremos las funciones

// FUNCIONES