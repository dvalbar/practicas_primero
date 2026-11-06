<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once("val_normal.php"); // Importar val_normal.php
include_once("val_filter.php"); // Importar val_filter.php

//controlador
$barraUbi =
    [
        [
            "nombre" => "Inicio",
            "enlace" => "/index.php"
        ],
        [
            "nombre" => "Relacion 5",
        ]
    ];

//dibuja la plantilla de la vista
inicioCabecera("RELACIÓN 5");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 5", $barraUbi);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo() // Añadir aqui las variables
{
?>
    <br>
    <h3>Librerías de la relación 5.</h3>
<?php

    // =======================
    // LIBRERIA VAL_NORMAL.PHP
    // =======================
    echo "<h4>VAL_NORMAL</h4>";

    /**
     * Función validaEntero()
     */
    echo "Función validaEntero()<br>";

    $variableNumEntero = 2;

    // True
    echo \VALNORMAL\validaEntero($variableNumEntero, 0, 20, 0) ? "Válido" : "No es válido";
    echo "<br>Número: " . $variableNumEntero;

    echo "<br><br>";

    $variableNumEntero = 21;

    // False
    echo \VALNORMAL\validaEntero($variableNumEntero, 0, 20, 0) ? "Válido" : "No es válido";
    echo "<br>Número: " . $variableNumEntero;

    echo "<br><br>";

    $variableNumEntero = 0;

    // True
    echo \VALNORMAL\validaEntero($variableNumEntero, 0, 20, 0) ? "Válido" : "No es válido";
    echo "<br>Número: " . $variableNumEntero;

    echo "<br><br>";

    $variableNumEntero = 20;

    // True
    echo \VALNORMAL\validaEntero($variableNumEntero, 0, 20, 0) ? "Válido" : "No es válido";
    echo "<br>Número: " . $variableNumEntero;

    echo "<br><br><hr>";

    // =============================================================================================

    /**
     * Función validaReal()
     */
    echo "Función validaReal()<br>";

    $variableNumReal = 4.8;

    // True
    echo \VALNORMAL\validaReal($variableNumReal, 0.2, 20.5, 0.5) ? "Válido" : "No es válido";
    echo "<br>Número: " . $variableNumReal;

    echo "<br><br>";

    $variableNumReal = 48.9;

    // False
    echo \VALNORMAL\validaReal($variableNumReal, 0.2, 20.5, 0.5) ? "Válido" : "No es válido";
    echo "<br>Número: " . $variableNumReal;

    echo "<br><br>";

    $variableNumReal = 0.2;

    // True
    echo \VALNORMAL\validaReal($variableNumReal, 0.2, 20.5, 0.5) ? "Válido" : "No es válido";
    echo "<br>Número: " . $variableNumReal;

    echo "<br><br>";

    $variableNumReal = 20.5;

    // True
    echo \VALNORMAL\validaReal($variableNumReal, 0.2, 20.5, 0.5) ? "Válido" : "No es válido";
    echo "<br>Número: " . $variableNumReal;

    echo "<br><br><hr>";

    // =============================================================================================

    /**
     * Función validaFecha()
     */
    echo "Función validaFecha()<br>";

    $variableFecha = "05/11/2026";

    // True
    echo \VALNORMAL\validaFecha($variableFecha, "05/11/2026") ? "Válida" : "No es válida";
    echo "<br>Fecha: " . $variableFecha;

    echo "<br><br>";

    $variableFecha = "99/99/2026";

    // False
    echo \VALNORMAL\validaFecha($variableFecha, "05/11/2026") ? "Válida" : "No es válida";
    echo "<br>Fecha: " . $variableFecha;

    echo "<br><br>";

    $variableFecha = "5/1/2026";

    // True
    echo \VALNORMAL\validaFecha($variableFecha, "05/11/2026") ? "Válida" : "No es válida";
    echo "<br>Fecha: " . $variableFecha;

    echo "<br><br><hr>";

    // =============================================================================================

    /**
     * Función validaHora()
     */
    echo "Función validaHora()<br>";

    $variableHora = "14:38:30";

    // True
    echo \VALNORMAL\validaHora($variableHora, "00:00:00") ? "Válida" : "No es válida";
    echo "<br>Hora: " . $variableHora;

    echo "<br><br>";

    $variableHora = "99:99:99";

    // False
    echo \VALNORMAL\validaHora($variableHora, "00:00:00") ? "Válida" : "No es válida";
    echo "<br>Hora: " . $variableHora;

    echo "<br><br>";

    $variableHora = "1:5:9";

    // True
    echo \VALNORMAL\validaHora($variableHora, "00:00:00") ? "Válida" : "No es válida";
    echo "<br>Hora: " . $variableHora;

    echo "<br><br><hr>";

    // =============================================================================================

    /**
     * Función validaEmail()
     */
    echo "Función validaEmail()<br>";

    $varEmail = "davidvalverdebarea2006@gmail.com";

    // True
    echo \VALNORMAL\validaEmail($varEmail, "correo@pordefecto.es") ? "Válida" : "No es válida";
    echo "<br>Correo: " . $varEmail;

    echo "<br><br>";

    $varEmail = "dvalbar0304@g.educaand.es";

    // True
    echo \VALNORMAL\validaEmail($varEmail, "correo@pordefecto.es") ? "Válida" : "No es válida";
    echo "<br>Correo: " . $varEmail;

    echo "<br><br>";

    $varEmail = "contacto@empresa..com";

    // False
    echo \VALNORMAL\validaEmail($varEmail, "correo@pordefecto.es") ? "Válida" : "No es válida";
    echo "<br>Correo: " . $varEmail;

    echo "<br><br><hr>";

    // =============================================================================================

    /**
     * Función validaCadena()
     */
    echo "Función validaCadena()<br>";

    $varCadena = "David Valverde Barea";

    // True
    echo \VALNORMAL\validaCadena($varCadena, 50, "Nombre Apellido1 Apellido2") ? "Válida" : "No es válida";
    echo "<br>Nombre: " . $varCadena;

    echo "<br><br>";

    $varCadena = "David Valverde Barea";

    // False
    echo \VALNORMAL\validaCadena($varCadena, 10, "David") ? "Válida" : "No es válida";
    echo "<br>Nombre: " . $varCadena;

    echo "<br><br><hr>";

    // =============================================================================================

    /**
     * Función validaExpresion()
     */
    echo "Función validaExpresion()<br>";

    $varExpCadena = "davidvalverdebarea2006@gmail.com";

    // True
    echo \VALNORMAL\validaExpresion($varExpCadena, '/^([\w.-]+)@([\w-]+(\.[\w-]+)*)\.([\w]{2,})$/', "defecto") ? "Válida" : "No es válida";
    echo "<br>Expresión regular: " . $varExpCadena;

    echo "<br><br>";

    $varExpCadena = "9:54:00";

    // True
    echo \VALNORMAL\validaExpresion($varExpCadena, '/^(\d{1,2}):(\d{1,2}):(\d{1,2})$/', "00:00:00") ? "Válida" : "No es válida";
    echo "<br>Expresión regular: " . $varExpCadena;

    echo "<br><br>";

    $varExpCadena = "100:20:00";

    // False
    echo \VALNORMAL\validaExpresion($varExpCadena, '/^(\d{1,2}):(\d{1,2}):(\d{1,2})$/', "00:00:00") ? "Válida" : "No es válida";
    echo "<br>Expresión regular: " . $varExpCadena;

    echo "<br><br><hr>";

    // =============================================================================================

    /**
     * Función validaRango()
     */
    echo "Función validaRango()<br>";

    $varPalabraBuscar = "Lunes";
    $arrayDondeBuscar = ["lunes", "martes", "miercoles", "jueves", "viernes", "sabado", "domingo"];

    // True
    echo \VALNORMAL\validaRango($varPalabraBuscar, $arrayDondeBuscar) ? "Encontrada" : "No encontrada";

    echo "<br><br>";

    $varPalabraBuscar = 10;
    $arrayDondeBuscar = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

    // True
    echo \VALNORMAL\validaRango($varPalabraBuscar, $arrayDondeBuscar, 1) ? "Encontrada" : "No encontrada";

    echo "<br><br>";

    $varPalabraBuscar = "Lunes"; // Indice que no existe
    $arrayDondeBuscar = ["lunes", "martes", "miercoles", "jueves", "viernes", "sabado", "domingo"];

    // False
    echo \VALNORMAL\validaRango($varPalabraBuscar, $arrayDondeBuscar, 2) ? "Encontrada" : "No encontrada";

    echo "<br><br>";

    $varPalabraBuscar = 0; // Indice en este caso
    $arrayDondeBuscar = ["lunes", "martes", "miercoles", "jueves", "viernes", "sabado", "domingo"];

    // True
    echo \VALNORMAL\validaRango($varPalabraBuscar, $arrayDondeBuscar, 2) ? "Encontrada" : "No encontrada";

    echo "<br><br><hr><br>";

    // ========================================================================================================
    // ========================================================================================================
    // ========================================================================================================

    // =======================
    // LIBRERIA VAL_FILTER.PHP
    // =======================
    echo "<h4>VAL_FILTER</h4>";

    /**
     * Función validaEntero()
     */
    echo "Función validaEntero()<br>";

    $variableNumEntero = 2;

    // True
    echo \VALFILTER\validaEntero($variableNumEntero, 0, 20, 0) ? "Válido" : "No es válido";
    echo "<br>Número: " . $variableNumEntero;

    echo "<br><br>";

    $variableNumEntero = 21;

    // False
    echo \VALFILTER\validaEntero($variableNumEntero, 0, 20, 0) ? "Válido" : "No es válido";
    echo "<br>Número: " . $variableNumEntero;

    echo "<br><br>";

    $variableNumEntero = 0;

    // True
    echo \VALFILTER\validaEntero($variableNumEntero, 0, 20, 0) ? "Válido" : "No es válido";
    echo "<br>Número: " . $variableNumEntero;

    echo "<br><br>";

    $variableNumEntero = 20;

    // True
    echo \VALFILTER\validaEntero($variableNumEntero, 0, 20, 0) ? "Válido" : "No es válido";
    echo "<br>Número: " . $variableNumEntero;

    echo "<br><br><hr>";

    // =============================================================================================

    /**
     * Función validaReal()
     */
    echo "Función validaReal()<br>";

    $variableNumReal = 4.8;

    // True
    echo \VALFILTER\validaReal($variableNumReal, 0.2, 20.5, 0.5) ? "Válido" : "No es válido";
    echo "<br>Número: " . $variableNumReal;

    echo "<br><br>";

    $variableNumReal = 48.9;

    // False
    echo \VALFILTER\validaReal($variableNumReal, 0.2, 20.5, 0.5) ? "Válido" : "No es válido";
    echo "<br>Número: " . $variableNumReal;

    echo "<br><br>";

    $variableNumReal = 0.2;

    // True
    echo \VALFILTER\validaReal($variableNumReal, 0.2, 20.5, 0.5) ? "Válido" : "No es válido";
    echo "<br>Número: " . $variableNumReal;

    echo "<br><br>";

    $variableNumReal = 20.5;

    // True
    echo \VALFILTER\validaReal($variableNumReal, 0.2, 20.5, 0.5) ? "Válido" : "No es válido";
    echo "<br>Número: " . $variableNumReal;

    echo "<br><br><hr>";

    // =============================================================================================

    /**
     * Función validaFecha()
     */
    echo "Función validaFecha()<br>";

    $variableFecha = "05/11/2026";

    // True
    echo \VALFILTER\validaFecha($variableFecha, "05/11/2026") ? "Válida" : "No es válida";
    echo "<br>Fecha: " . $variableFecha;

    echo "<br><br>";

    $variableFecha = "99/99/2026";

    // False
    echo \VALFILTER\validaFecha($variableFecha, "05/11/2026") ? "Válida" : "No es válida";
    echo "<br>Fecha: " . $variableFecha;

    echo "<br><br>";

    $variableFecha = "5/1/2026";

    // True
    echo \VALFILTER\validaFecha($variableFecha, "05/11/2026") ? "Válida" : "No es válida";
    echo "<br>Fecha: " . $variableFecha;

    echo "<br><br><hr>";

    // =============================================================================================

    /**
     * Función validaHora()
     */
    echo "Función validaHora()<br>";

    $variableHora = "14:38:30";

    // True
    echo \VALFILTER\validaHora($variableHora, "00:00:00") ? "Válida" : "No es válida";
    echo "<br>Hora: " . $variableHora;

    echo "<br><br>";

    $variableHora = "99:99:99";

    // False
    echo \VALFILTER\validaHora($variableHora, "00:00:00") ? "Válida" : "No es válida";
    echo "<br>Hora: " . $variableHora;

    echo "<br><br>";

    $variableHora = "1:5:9";

    // True
    echo \VALFILTER\validaHora($variableHora, "00:00:00") ? "Válida" : "No es válida";
    echo "<br>Hora: " . $variableHora;

    echo "<br><br><hr>";

    // =============================================================================================

    /**
     * Función validaEmail()
     */
    echo "Función validaEmail()<br>";

    $varEmail = "davidvalverdebarea2006@gmail.com";

    // True
    echo \VALFILTER\validaEmail($varEmail, "correo@pordefecto.es") ? "Válida" : "No es válida";
    echo "<br>Correo: " . $varEmail;

    echo "<br><br>";

    $varEmail = "dvalbar0304@g.educaand.es";

    // True
    echo \VALFILTER\validaEmail($varEmail, "correo@pordefecto.es") ? "Válida" : "No es válida";
    echo "<br>Correo: " . $varEmail;

    echo "<br><br>";

    $varEmail = "contacto@empresa..com";

    // False
    echo \VALFILTER\validaEmail($varEmail, "correo@pordefecto.es") ? "Válida" : "No es válida";
    echo "<br>Correo: " . $varEmail;

    echo "<br><br><hr>";

    // =============================================================================================

    /**
     * Función validaCadena()
     */
    echo "Función validaCadena()<br>";

    $varCadena = "David Valverde Barea";

    // True
    echo \VALFILTER\validaCadena($varCadena, 50, "Nombre Apellido1 Apellido2") ? "Válida" : "No es válida";
    echo "<br>Nombre: " . $varCadena;

    echo "<br><br>";

    $varCadena = "David Valverde Barea";

    // False
    echo \VALFILTER\validaCadena($varCadena, 10, "David") ? "Válida" : "No es válida";
    echo "<br>Nombre: " . $varCadena;

    echo "<br><br><hr>";

    // =============================================================================================

    /**
     * Función validaExpresion()
     */
    echo "Función validaExpresion()<br>";

    $varExpCadena = "davidvalverdebarea2006@gmail.com";

    // True
    echo \VALFILTER\validaExpresion($varExpCadena, '/^([\w.-]+)@([\w-]+(\.[\w-]+)*)\.([\w]{2,})$/', "defecto") ? "Válida" : "No es válida";
    echo "<br>Expresión regular: " . $varExpCadena;

    echo "<br><br>";

    $varExpCadena = "9:54:00";

    // True
    echo \VALFILTER\validaExpresion($varExpCadena, '/^(\d{1,2}):(\d{1,2}):(\d{1,2})$/', "00:00:00") ? "Válida" : "No es válida";
    echo "<br>Expresión regular: " . $varExpCadena;

    echo "<br><br>";

    $varExpCadena = "100:20:00";

    // False
    echo \VALFILTER\validaExpresion($varExpCadena, '/^(\d{1,2}):(\d{1,2}):(\d{1,2})$/', "00:00:00") ? "Válida" : "No es válida";
    echo "<br>Expresión regular: " . $varExpCadena;

    echo "<br><br><hr>";

    // =============================================================================================

    /**
     * Función validaRango()
     */
    echo "Función validaRango()<br>";

    $varPalabraBuscar = "Lunes";
    $arrayDondeBuscar = ["lunes", "martes", "miercoles", "jueves", "viernes", "sabado", "domingo"];

    // True
    echo \VALFILTER\validaRango($varPalabraBuscar, $arrayDondeBuscar) ? "Encontrada" : "No encontrada";

    echo "<br><br>";

    $varPalabraBuscar = 10;
    $arrayDondeBuscar = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

    // True
    echo \VALFILTER\validaRango($varPalabraBuscar, $arrayDondeBuscar, 1) ? "Encontrada" : "No encontrada";

    echo "<br><br>";

    $varPalabraBuscar = "Lunes"; // Indice que no existe
    $arrayDondeBuscar = ["lunes", "martes", "miercoles", "jueves", "viernes", "sabado", "domingo"];

    // False
    echo \VALFILTER\validaRango($varPalabraBuscar, $arrayDondeBuscar, 2) ? "Encontrada" : "No encontrada";

    echo "<br><br>";

    $varPalabraBuscar = 0; // Indice en este caso
    $arrayDondeBuscar = ["lunes", "martes", "miercoles", "jueves", "viernes", "sabado", "domingo"];

    // True
    echo \VALFILTER\validaRango($varPalabraBuscar, $arrayDondeBuscar, 2) ? "Encontrada" : "No encontrada";

    echo "<br><br><hr><br>";

    // ========================================================================================================
    // ========================================================================================================
    // ========================================================================================================


}

// Aqui escribiremos las funciones

// FUNCIONES