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
            "nombre" => "Relacion 4",
        ]
    ];

// Clase Abstracta
// $miInstrumento1 = new InstrumentoBase("Piano", 5);
// $miInstrumento2 = new InstrumentoBase("Bajo", 7);

// Clase InstrumentoViento
$miInstrumentoViento1 = new InstrumentoViento();
$miInstrumentoViento2 = new InstrumentoViento(4, "latón");

// Clase Flauta
$miArray = [
    "material" => "plástico",
    "edad" => 6
];

$miArrayMal = [
    "marca" => "Hohner",
    "edad" => 14
];

// $miFlauta1 = new Flauta("plástico",6); // Constructor privado, no se puede
$miFlauta1 = Flauta::crearDesdeArray($miArray);
$miFlauta2 = Flauta::crearDesdeArray($miArrayMal);
$miFlauta3 = Flauta::crearDesdeArray(Flauta::$_miArray);

$flautaClonada = clone $miFlauta3;

// EstadoCivil
$arrayEstadosCiviles = EstadoCivil::casos();

// $estadoAleatorio = mt_rand(0,count($arrayEstadosCiviles)-1);
$estadoAleatorio = mt_rand(1, 4) * 10;

foreach ($arrayEstadosCiviles as $key => $value) {
    if ($value->valor() == $estadoAleatorio) {
        $miEstadoCivil = $value;
    }
}

// Persona
// $miPersona1 = Persona::registrarPersona("David","03/04/2006","Mi calle","Cuevas de San Marcos",$arrayEstadosCiviles[$estadoAleatorio]); // Otra forma de hacerlo
$miPersona1 = Persona::registrarPersona("David", "03/04/2006", "Mi calle", "Cuevas de San Marcos", $miEstadoCivil);

// Fibonacci
$miFibo = new SerieFibonacci(10);

// ClaseMisPropiedades
$Objeto = new ClaseMisPropiedades();

$Objeto->propPublica = "publica";
// $Objeto->_propPrivada="privada"; //no es valida al ser privada
$Objeto->propiedad1 = 25;
$Objeto->propiedad2 = "cadena de texto";

$misObjetos = [
    // "miInstrumento1" => $miInstrumento1,
    // "miInstrumento2" => $miInstrumento2,
    "miInstrumentoViento1" => $miInstrumentoViento1,
    "miInstrumentoViento2" => $miInstrumentoViento2,
    "miFlauta1" => $miFlauta1,
    "miFlauta2" => $miFlauta2,
    "miFlauta3" => $miFlauta3,
    "flautaClonada" => $flautaClonada,
    "miPersona1" => $miPersona1,
    "miFibo" => $miFibo,
    "Objeto" => $Objeto
];

//dibuja la plantilla de la vista
inicioCabecera("RELACIÓN 4");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 4", $barraUbi);
cuerpo($misObjetos);  //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo($misObjetos) // Añadir aqui las variables
{
?>
    <br>
    <h3>Clases de la relación 4.</h3>
<?php
    echo "<h4>Clase InstrumentoBase (Abstracta)</h4>" . PHP_EOL;

    // No tiene sobrecarga
    // $miInstrumento1->nombre = "hola";
    // echo $miInstrumento1->_edad;
    // if (isset($miInstrumento1->_edad)) {
    //     echo "Hola";
    // }
    // unset($miInstrumento1->_edad);

    // // toString
    // echo $misObjetos["miInstrumento1"] . "<br><br>" . PHP_EOL;

    // echo "Descripción del instrumento: " . $misObjetos["miInstrumento1"]->getDescripcion() . "<br>" . PHP_EOL;
    // echo "Edad del instrumento: " . $misObjetos["miInstrumento1"]->getEdad() . "<br><br>" . PHP_EOL;

    // // Modificar objeto
    // $misObjetos["miInstrumento1"]->setDescripcion("Guitarra");
    // $misObjetos["miInstrumento1"]->setEdad(10);

    // // toString despues de hacer cambios al objeto
    // echo $misObjetos["miInstrumento1"] . "<br><br>" . PHP_EOL;

    // // Aumenta el número de instancias creadas
    // echo $misObjetos["miInstrumento2"] . "<br>" . PHP_EOL;


    echo "<h4>Interfaz IFabricable</h4>" . PHP_EOL;

    // No se puede probar todavia, es una interfaz

    echo "<h4>Clase InstrumentoViento</h4>" . PHP_EOL;

    echo $misObjetos["miInstrumentoViento1"] . "<br><br>" . PHP_EOL;
    echo "Material del instrumento: " . $misObjetos["miInstrumentoViento1"]->getMaterial() . "<br><br>" . PHP_EOL;

    echo "Afinación:<br>" . $misObjetos["miInstrumentoViento1"]->afinar() . "<br><br>" . PHP_EOL;
    echo "Sonido del instrumento:<br>" . $misObjetos["miInstrumentoViento1"]->sonido() . "<br><br>" . PHP_EOL;

    echo $misObjetos["miInstrumentoViento2"] . "<br>" . PHP_EOL;

    echo "<h4>Clase Flauta</h4>" . PHP_EOL;

    echo $misObjetos["miFlauta1"] . "<br><br>" . PHP_EOL;
    echo $misObjetos["miFlauta2"] . "<br><br>" . PHP_EOL;
    echo $misObjetos["miFlauta3"] . "<br><br>" . PHP_EOL;

    echo $misObjetos["flautaClonada"] . "<br>" . PHP_EOL;

    echo "<h4>Clase Persona</h4>" . PHP_EOL;

    echo $misObjetos["miPersona1"] . "<br>" . PHP_EOL;

    echo "<h4>Clase SerieFibonacci</h4>" . PHP_EOL;

    foreach ($misObjetos["miFibo"] as $valor) {
        echo "$valor&nbsp;";
    }
    // Generaria 10 valores
    // 0 1 1 2 3 5 8 13 21 34 55

    echo "<br>" . PHP_EOL;

    foreach (SerieFibonacci::fFibonacci(10) as $valor) {
        echo "$valor&nbsp;";
    }

    echo "<h4>Clase ClaseMisPropiedades</h4>" . PHP_EOL;

    echo "la propiedad 1 vale " . $misObjetos["Objeto"]->propiedad1 . "<br><br>" . PHP_EOL;
    // echo $Objeto->propiedad3; // Esto debería dar un error al no haber asignado previamente la propiedad

    foreach ($misObjetos["Objeto"] as $key => $value) {
        echo "[$key] => $value<br>";
    }
}

// Aqui escribiremos las funciones

// FUNCIONES