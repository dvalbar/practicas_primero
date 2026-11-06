<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once("val_normal.php"); // Importar val_normal.php
include_once("val_filter.php"); // Importar val_filter.php
include_once("../../scripts/librerias/validacion.php"); // Importar validacion.php

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
    echo "<h4>VAL_NORMAL</h4>" . PHP_EOL;

    /**
     * Función validaEntero()
     */
    echo "Función validaEntero()<br>" . PHP_EOL;

    $variableNumEntero = 2;

    // True
    echo \VALNORMAL\validaEntero($variableNumEntero, 0, 20, 0) ? "Válido" : "No es válido" . PHP_EOL;
    echo "<br>Número: " . $variableNumEntero . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $variableNumEntero = 21;

    // False
    echo \VALNORMAL\validaEntero($variableNumEntero, 0, 20, 0) ? "Válido" : "No es válido" . PHP_EOL;
    echo "<br>Número: " . $variableNumEntero . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $variableNumEntero = 0;

    // True
    echo \VALNORMAL\validaEntero($variableNumEntero, 0, 20, 0) ? "Válido" : "No es válido" . PHP_EOL;
    echo "<br>Número: " . $variableNumEntero . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $variableNumEntero = 20;

    // True
    echo \VALNORMAL\validaEntero($variableNumEntero, 0, 20, 0) ? "Válido" : "No es válido" . PHP_EOL;
    echo "<br>Número: " . $variableNumEntero . PHP_EOL;

    echo "<br><br><hr>" . PHP_EOL;

    // =============================================================================================

    /**
     * Función validaReal()
     */
    echo "Función validaReal()<br>" . PHP_EOL;

    $variableNumReal = 4.8;

    // True
    echo \VALNORMAL\validaReal($variableNumReal, 0.2, 20.5, 0.5) ? "Válido" : "No es válido" . PHP_EOL;
    echo "<br>Número: " . $variableNumReal . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $variableNumReal = 48.9;

    // False
    echo \VALNORMAL\validaReal($variableNumReal, 0.2, 20.5, 0.5) ? "Válido" : "No es válido" . PHP_EOL;
    echo "<br>Número: " . $variableNumReal . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $variableNumReal = 0.2;

    // True
    echo \VALNORMAL\validaReal($variableNumReal, 0.2, 20.5, 0.5) ? "Válido" : "No es válido" . PHP_EOL;
    echo "<br>Número: " . $variableNumReal . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $variableNumReal = 20.5;

    // True
    echo \VALNORMAL\validaReal($variableNumReal, 0.2, 20.5, 0.5) ? "Válido" : "No es válido" . PHP_EOL;
    echo "<br>Número: " . $variableNumReal . PHP_EOL;

    echo "<br><br><hr>" . PHP_EOL;

    // =============================================================================================

    /**
     * Función validaFecha()
     */
    echo "Función validaFecha()<br>" . PHP_EOL;

    $variableFecha = "05/11/2026";

    // True
    echo \VALNORMAL\validaFecha($variableFecha, "05/11/2026") ? "Válida" : "No es válida" . PHP_EOL;
    echo "<br>Fecha: " . $variableFecha . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $variableFecha = "99/99/2026";

    // False
    echo \VALNORMAL\validaFecha($variableFecha, "05/11/2026") ? "Válida" : "No es válida" . PHP_EOL;
    echo "<br>Fecha: " . $variableFecha . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $variableFecha = "5/1/2026";

    // True
    echo \VALNORMAL\validaFecha($variableFecha, "05/11/2026") ? "Válida" : "No es válida" . PHP_EOL;
    echo "<br>Fecha: " . $variableFecha . PHP_EOL;

    echo "<br><br><hr>" . PHP_EOL;

    // =============================================================================================

    /**
     * Función validaHora()
     */
    echo "Función validaHora()<br>" . PHP_EOL;

    $variableHora = "14:38:30";

    // True
    echo \VALNORMAL\validaHora($variableHora, "00:00:00") ? "Válida" : "No es válida" . PHP_EOL;
    echo "<br>Hora: " . $variableHora . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $variableHora = "99:99:99";

    // False
    echo \VALNORMAL\validaHora($variableHora, "00:00:00") ? "Válida" : "No es válida" . PHP_EOL;
    echo "<br>Hora: " . $variableHora . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $variableHora = "1:5:9";

    // True
    echo \VALNORMAL\validaHora($variableHora, "00:00:00") ? "Válida" : "No es válida" . PHP_EOL;
    echo "<br>Hora: " . $variableHora . PHP_EOL;

    echo "<br><br><hr>" . PHP_EOL;

    // =============================================================================================

    /**
     * Función validaEmail()
     */
    echo "Función validaEmail()<br>" . PHP_EOL;

    $varEmail = "davidvalverdebarea2006@gmail.com";

    // True
    echo \VALNORMAL\validaEmail($varEmail, "correo@pordefecto.es") ? "Válida" : "No es válida" . PHP_EOL;
    echo "<br>Correo: " . $varEmail . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $varEmail = "dvalbar0304@g.educaand.es";

    // True
    echo \VALNORMAL\validaEmail($varEmail, "correo@pordefecto.es") ? "Válida" : "No es válida" . PHP_EOL;
    echo "<br>Correo: " . $varEmail . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $varEmail = "contacto@empresa..com";

    // False
    echo \VALNORMAL\validaEmail($varEmail, "correo@pordefecto.es") ? "Válida" : "No es válida" . PHP_EOL;
    echo "<br>Correo: " . $varEmail . PHP_EOL;

    echo "<br><br><hr>" . PHP_EOL;

    // =============================================================================================

    /**
     * Función validaCadena()
     */
    echo "Función validaCadena()<br>" . PHP_EOL;

    $varCadena = "David Valverde Barea";

    // True
    echo \VALNORMAL\validaCadena($varCadena, 50, "Nombre Apellido1 Apellido2") ? "Válida" : "No es válida" . PHP_EOL;
    echo "<br>Nombre: " . $varCadena . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $varCadena = "David Valverde Barea";

    // False
    echo \VALNORMAL\validaCadena($varCadena, 10, "David") ? "Válida" : "No es válida" . PHP_EOL;
    echo "<br>Nombre: " . $varCadena . PHP_EOL;

    echo "<br><br><hr>" . PHP_EOL;

    // =============================================================================================

    /**
     * Función validaExpresion()
     */
    echo "Función validaExpresion()<br>" . PHP_EOL;

    $varExpCadena = "davidvalverdebarea2006@gmail.com";

    // True
    echo \VALNORMAL\validaExpresion($varExpCadena, '/^([\w.-]+)@([\w-]+(\.[\w-]+)*)\.([\w]{2,})$/', "defecto") ? "Válida" : "No es válida" . PHP_EOL;
    echo "<br>Expresión regular: " . $varExpCadena . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $varExpCadena = "9:54:00";

    // True
    echo \VALNORMAL\validaExpresion($varExpCadena, '/^(\d{1,2}):(\d{1,2}):(\d{1,2})$/', "00:00:00") ? "Válida" : "No es válida" . PHP_EOL;
    echo "<br>Expresión regular: " . $varExpCadena . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $varExpCadena = "100:20:00";

    // False
    echo \VALNORMAL\validaExpresion($varExpCadena, '/^(\d{1,2}):(\d{1,2}):(\d{1,2})$/', "00:00:00") ? "Válida" : "No es válida" . PHP_EOL;
    echo "<br>Expresión regular: " . $varExpCadena . PHP_EOL;

    echo "<br><br><hr>" . PHP_EOL;

    // =============================================================================================

    /**
     * Función validaRango()
     */
    echo "Función validaRango()<br>" . PHP_EOL;

    $varPalabraBuscar = "Lunes";
    $arrayDondeBuscar = ["lunes", "martes", "miercoles", "jueves", "viernes", "sabado", "domingo"];

    // True
    echo \VALNORMAL\validaRango($varPalabraBuscar, $arrayDondeBuscar) ? "Encontrada" : "No encontrada" . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $varPalabraBuscar = 10;
    $arrayDondeBuscar = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

    // True
    echo \VALNORMAL\validaRango($varPalabraBuscar, $arrayDondeBuscar, 1) ? "Encontrada" : "No encontrada" . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $varPalabraBuscar = "Lunes"; // Indice que no existe
    $arrayDondeBuscar = ["lunes", "martes", "miercoles", "jueves", "viernes", "sabado", "domingo"];

    // False
    echo \VALNORMAL\validaRango($varPalabraBuscar, $arrayDondeBuscar, 2) ? "Encontrada" : "No encontrada" . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $varPalabraBuscar = 0; // Indice en este caso
    $arrayDondeBuscar = ["lunes", "martes", "miercoles", "jueves", "viernes", "sabado", "domingo"];

    // True
    echo \VALNORMAL\validaRango($varPalabraBuscar, $arrayDondeBuscar, 2) ? "Encontrada" : "No encontrada" . PHP_EOL;

    echo "<br><br><hr><br>" . PHP_EOL;

    // ========================================================================================================
    // ========================================================================================================
    // ========================================================================================================

    // =======================
    // LIBRERIA VAL_FILTER.PHP
    // =======================
    echo "<h4>VAL_FILTER</h4>" . PHP_EOL;

    /**
     * Función validaEntero()
     */
    echo "Función validaEntero()<br>" . PHP_EOL;

    $variableNumEntero = 2;

    // True
    echo \VALFILTER\validaEntero($variableNumEntero, 0, 20, 0) ? "Válido" : "No es válido" . PHP_EOL;
    echo "<br>Número: " . $variableNumEntero . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $variableNumEntero = 21;

    // False
    echo \VALFILTER\validaEntero($variableNumEntero, 0, 20, 0) ? "Válido" : "No es válido" . PHP_EOL;
    echo "<br>Número: " . $variableNumEntero . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $variableNumEntero = 0;

    // True
    echo \VALFILTER\validaEntero($variableNumEntero, 0, 20, 0) ? "Válido" : "No es válido" . PHP_EOL;
    echo "<br>Número: " . $variableNumEntero . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $variableNumEntero = 20;

    // True
    echo \VALFILTER\validaEntero($variableNumEntero, 0, 20, 0) ? "Válido" : "No es válido" . PHP_EOL;
    echo "<br>Número: " . $variableNumEntero . PHP_EOL;

    echo "<br><br><hr>" . PHP_EOL;

    // =============================================================================================

    /**
     * Función validaReal()
     */
    echo "Función validaReal()<br>" . PHP_EOL;

    $variableNumReal = 4.8;

    // True
    echo \VALFILTER\validaReal($variableNumReal, 0.2, 20.5, 0.5) ? "Válido" : "No es válido" . PHP_EOL;
    echo "<br>Número: " . $variableNumReal . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $variableNumReal = 48.9;

    // False
    echo \VALFILTER\validaReal($variableNumReal, 0.2, 20.5, 0.5) ? "Válido" : "No es válido" . PHP_EOL;
    echo "<br>Número: " . $variableNumReal . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $variableNumReal = 0.2;

    // True
    echo \VALFILTER\validaReal($variableNumReal, 0.2, 20.5, 0.5) ? "Válido" : "No es válido" . PHP_EOL;
    echo "<br>Número: " . $variableNumReal . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $variableNumReal = 20.5;

    // True
    echo \VALFILTER\validaReal($variableNumReal, 0.2, 20.5, 0.5) ? "Válido" : "No es válido" . PHP_EOL;
    echo "<br>Número: " . $variableNumReal . PHP_EOL;

    echo "<br><br><hr>" . PHP_EOL;

    // =============================================================================================

    /**
     * Función validaFecha()
     */
    echo "Función validaFecha()<br>" . PHP_EOL;

    $variableFecha = "05/11/2026";

    // True
    echo \VALFILTER\validaFecha($variableFecha, "05/11/2026") ? "Válida" : "No es válida" . PHP_EOL;
    echo "<br>Fecha: " . $variableFecha . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $variableFecha = "99/99/2026";

    // False
    echo \VALFILTER\validaFecha($variableFecha, "05/11/2026") ? "Válida" : "No es válida" . PHP_EOL;
    echo "<br>Fecha: " . $variableFecha . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $variableFecha = "5/1/2026";

    // True
    echo \VALFILTER\validaFecha($variableFecha, "05/11/2026") ? "Válida" : "No es válida" . PHP_EOL;
    echo "<br>Fecha: " . $variableFecha . PHP_EOL;

    echo "<br><br><hr>" . PHP_EOL;

    // =============================================================================================

    /**
     * Función validaHora()
     */
    echo "Función validaHora()<br>" . PHP_EOL;

    $variableHora = "14:38:30";

    // True
    echo \VALFILTER\validaHora($variableHora, "00:00:00") ? "Válida" : "No es válida" . PHP_EOL;
    echo "<br>Hora: " . $variableHora . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $variableHora = "99:99:99";

    // False
    echo \VALFILTER\validaHora($variableHora, "00:00:00") ? "Válida" : "No es válida" . PHP_EOL;
    echo "<br>Hora: " . $variableHora . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $variableHora = "1:5:9";

    // True
    echo \VALFILTER\validaHora($variableHora, "00:00:00") ? "Válida" : "No es válida" . PHP_EOL;
    echo "<br>Hora: " . $variableHora . PHP_EOL;

    echo "<br><br><hr>" . PHP_EOL;

    // =============================================================================================

    /**
     * Función validaEmail()
     */
    echo "Función validaEmail()<br>" . PHP_EOL;

    $varEmail = "davidvalverdebarea2006@gmail.com";

    // True
    echo \VALFILTER\validaEmail($varEmail, "correo@pordefecto.es") ? "Válida" : "No es válida" . PHP_EOL;
    echo "<br>Correo: " . $varEmail . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $varEmail = "dvalbar0304@g.educaand.es";

    // True
    echo \VALFILTER\validaEmail($varEmail, "correo@pordefecto.es") ? "Válida" : "No es válida" . PHP_EOL;
    echo "<br>Correo: " . $varEmail . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $varEmail = "contacto@empresa..com";

    // False
    echo \VALFILTER\validaEmail($varEmail, "correo@pordefecto.es") ? "Válida" : "No es válida" . PHP_EOL;
    echo "<br>Correo: " . $varEmail . PHP_EOL;

    echo "<br><br><hr>" . PHP_EOL;

    // =============================================================================================

    /**
     * Función validaCadena()
     */
    echo "Función validaCadena()<br>" . PHP_EOL;

    $varCadena = "David Valverde Barea";

    // True
    echo \VALFILTER\validaCadena($varCadena, 50, "Nombre Apellido1 Apellido2") ? "Válida" : "No es válida" . PHP_EOL;
    echo "<br>Nombre: " . $varCadena . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $varCadena = "David Valverde Barea";

    // False
    echo \VALFILTER\validaCadena($varCadena, 10, "David") ? "Válida" : "No es válida" . PHP_EOL;
    echo "<br>Nombre: " . $varCadena . PHP_EOL;

    echo "<br><br><hr>" . PHP_EOL;

    // =============================================================================================

    /**
     * Función validaExpresion()
     */
    echo "Función validaExpresion()<br>" . PHP_EOL;

    $varExpCadena = "davidvalverdebarea2006@gmail.com";

    // True
    echo \VALFILTER\validaExpresion($varExpCadena, '/^([\w.-]+)@([\w-]+(\.[\w-]+)*)\.([\w]{2,})$/', "defecto") ? "Válida" : "No es válida" . PHP_EOL;
    echo "<br>Expresión regular: " . $varExpCadena . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $varExpCadena = "9:54:00";

    // True
    echo \VALFILTER\validaExpresion($varExpCadena, '/^(\d{1,2}):(\d{1,2}):(\d{1,2})$/', "00:00:00") ? "Válida" : "No es válida" . PHP_EOL;
    echo "<br>Expresión regular: " . $varExpCadena . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $varExpCadena = "100:20:00";

    // False
    echo \VALFILTER\validaExpresion($varExpCadena, '/^(\d{1,2}):(\d{1,2}):(\d{1,2})$/', "00:00:00") ? "Válida" : "No es válida" . PHP_EOL;
    echo "<br>Expresión regular: " . $varExpCadena . PHP_EOL;

    echo "<br><br><hr>" . PHP_EOL;

    // =============================================================================================

    /**
     * Función validaRango()
     */
    echo "Función validaRango()<br>" . PHP_EOL;

    $varPalabraBuscar = "Lunes";
    $arrayDondeBuscar = ["lunes", "martes", "miercoles", "jueves", "viernes", "sabado", "domingo"];

    // True
    echo \VALFILTER\validaRango($varPalabraBuscar, $arrayDondeBuscar) ? "Encontrada" : "No encontrada" . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $varPalabraBuscar = 10;
    $arrayDondeBuscar = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

    // True
    echo \VALFILTER\validaRango($varPalabraBuscar, $arrayDondeBuscar, 1) ? "Encontrada" : "No encontrada" . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $varPalabraBuscar = "Lunes"; // Indice que no existe
    $arrayDondeBuscar = ["lunes", "martes", "miercoles", "jueves", "viernes", "sabado", "domingo"];

    // False
    echo \VALFILTER\validaRango($varPalabraBuscar, $arrayDondeBuscar, 2) ? "Encontrada" : "No encontrada" . PHP_EOL;

    echo "<br><br>" . PHP_EOL;

    $varPalabraBuscar = 0; // Indice en este caso
    $arrayDondeBuscar = ["lunes", "martes", "miercoles", "jueves", "viernes", "sabado", "domingo"];

    // True
    echo \VALFILTER\validaRango($varPalabraBuscar, $arrayDondeBuscar, 2) ? "Encontrada" : "No encontrada" . PHP_EOL;

    echo "<br><br><hr><br>" . PHP_EOL;

    // ========================================================================================================
    // ========================================================================================================
    // ========================================================================================================

    // ==========
    // FORMULARIO
    // ==========
    echo "<h4>FORMULARIO</h4>" . PHP_EOL;

    ?>

    <!-- Crear aqui formulario -->
    <form action="" method="POST">
        <!-- Nombre -->
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre">
        <br>
        <!-- Contraseña -->
        <label for="password">Contraseña: </label>
        <input type="password" id="password" name="password">
        <br>
        <!-- Repetir Contraseña -->
        <label for="password">Repetir Contraseña: </label>
        <input type="password" id="password" name="password">
        <br>
        <!-- Fecha Nacimiento -->
        <label for="fecha_nac">Fecha de nacimiento: </label>
        <input type="text" id="fecha_nac" name="fecha_nac">
        <br>
        <!-- Fecha Carnet -->
        <label>Fecha de carnet: </label>
        <input type="text" name="carnet_dia">
        <input type="text" name="carnet_mes">
        <input type="text" name="carnet_anio">
        <br>
        <!-- Hora Levantarse -->
        <label for="hora_levantarse">Hora de levantarse: </label>
        <input type="text" id="hora_levantarse" name="hora_levantarse">
        <br>
        <!-- Estado -->
        <label>Estado: </label>
        <br><input type="radio" name="estado" value="1"> 1 - Estudiante
        <br><input type="radio" name="estado" value="2"> 2 - En paro
        <br><input type="radio" name="estado" value="3"> 3 - Trabajando
        <br><input type="radio" name="estado" value="4"> 4 - Jubilado
        <br><input type="radio" name="estado" value="5"> 5 - Incorrecta
        <br><br>
        <!-- Estudios -->
        <label>Estudios: </label>
        <br><input type="checkbox" name="estudios[]" value="0"> 0 - Sin estudios
        <br><input type="checkbox" name="estudios[]" value="1"> 1 - Primaria
        <br><input type="checkbox" name="estudios[]" value="2"> 2 - Secundaria
        <br><input type="checkbox" name="estudios[]" value="3"> 3 - Bachillerato
        <br><input type="checkbox" name="estudios[]" value="4"> 4 - Ciclo formativo
        <br><input type="checkbox" name="estudios[]" value="5"> 5 - Universitarios
        <br><input type="checkbox" name="estudios[]" value="6"> 6 - Incorrecta
        <br><br>
        <!-- Hermanos -->
        <label for="hermanos">Hermanos: </label>
        <input type="number" id="hermanos" name="hermanos" value="0">
        <br>
        <!-- Sueldo -->
        <label for="sueldo">Sueldo: </label>
        <input type="number" id="sueldo" name="sueldo" value="1100">
        <br>
        <button type="submit">Enviar</button>
    </form>

<?php
}

// Aqui escribiremos las funciones

// FUNCIONES