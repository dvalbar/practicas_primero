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
            "nombre" => "Pruebas",
            "enlace" => "/aplicacion/pruebas/index.php"
        ],
        [
            "nombre" => "Prueba clases",
        ]
    ];

//dibuja la plantilla de la vista
inicioCabecera("CLASES");
cabecera();
finCabecera();
inicioCuerpo("PRUEBA CLASES", $barraUbi);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo()
{
?>
    <br><br>

<?php
}

/********* CLASES ********* */

/**
 * Clase prueba usada para mostrar el funcionamiento de los
 * distintos elementos
 */
class ClasePrueba {
    //definición de constantes
    public const PI = 2.14;

    //definición de propiedad
    public int $propPublica = 1;
    private string $_propPrivada = "hola";
    protected float $_propProtegida = 1.234;

    //definición de propiedad estática
    public static $propEstatica = array(1, 2, 3);

    //definición de método
    public function metodo() {
        
        //acceso a las propiedades desde el propio objeto
        $this->propPublica = 13;
        $this->_propPrivada = 100;
        $this->_propProtegida = "adios";

        //acceso a la propiedad estática
        self::$propEstatica[0] = "otra";

        return true;
    }
}

//se crea una instancia de la clase prueba
$instancia = new ClasePrueba();

//accede a la propiedad pública de la instancia
$instancia->propPublica = 50;

//se accede a la propiedad de clase (estática)
ClasePrueba::$propEstatica[1] = 10;