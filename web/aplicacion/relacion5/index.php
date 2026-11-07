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

// ==========
// FORMULARIO
// ==========

// Datos del formulario
$arrayDatos = [
    "nombre" => "",
    "password" => "",
    "fecha_nac" => "",
    "carnet_dia" => "",
    "carnet_mes" => "",
    "carnet_anio" => "",
    "fecha_carnet" => "",
    "hora_levantarse" => "",
    "estado" => 0,
    "estado_texto" => "",
    "estudios" => [],
    "hermanos" => 0,
    "sueldo" => 1100
];

// Errores del formulario
$arrayErrores = [];


if (isset($_POST["enviar"])) {

    // Nombre
    if (isset($_POST["nombre"])) {
        $nombre = mb_strtoupper($_POST["nombre"]);
        if (validaCadena($nombre, 25, "Usuario")) {
            if (mb_strlen($nombre) === 0) {
                $arrayErrores["nombre"][] = "El nombre no puede estar vacio";
            } else if (mb_substr($nombre, 0, 1) === "H") {
                $arrayErrores["nombre"][] = "El nombre no puede empezar por 'H'";
            }
        } else {
            $arrayErrores["nombre"][] = "El nombre es mayor de 25 letras";
        }
        $arrayDatos["nombre"] = $nombre;
    }

    // Password
    if (isset($_POST["password"])) {
        $password = $_POST["password"];
        if (validaCadena($password, 15, "Nombre")) {
            if (mb_strlen($password) < 8) {
                $arrayErrores["password"][] = "La contraseña debe tener minimo 8 caracteres";
            } else if (!validaExpresion($password, '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@!%*?&\-_+])[A-Za-z\d$@!%*?&\-_+]{8,15}$/', "usuario@2026")) {
                $arrayErrores["password"][] = "La contraseña debe contener al menos una mayúscula, una minúscula, una cifra y un carácter especial (\$_-;<>@)";
            }
        } else {
            $arrayErrores["password"][] = "La contraseña es mayor de 15 caracteres";
        }
    }

    // Repetir Password (Lo dijo Vicente en clase)
    if (isset($_POST["repetir_password"])) {
        $repetir_password = $_POST["repetir_password"];
        if ($_POST["password"] !== $_POST["repetir_password"]) {
            $arrayErrores["repetir_password"][] = "Las contraseñas no coinciden";
        }
    }

    // Fecha Nacimiento
    if (isset($_POST["fecha_nac"])) {
        $fecha_nac = $_POST["fecha_nac"];
        if (!validaFecha($fecha_nac, date("d/m/Y"))) {
            $arrayErrores["fecha_nac"][] = "La fecha no es una fecha válida";
        }
        $arrayDatos["fecha_nac"] = $fecha_nac;
    }

    // Fecha Carnet
    if (isset($_POST["carnet_dia"]) && isset($_POST["carnet_mes"]) && isset($_POST["carnet_anio"])) {
        $dia = $_POST["carnet_dia"];
        $mes = $_POST["carnet_mes"];
        $anio = $_POST["carnet_anio"];

        $arrayDatos["carnet_dia"] = $dia;
        $arrayDatos["carnet_mes"] = $mes;
        $arrayDatos["carnet_anio"] = $anio;

        $fecha_nac = $arrayDatos["fecha_nac"];
        $fecha_carnet = $dia . "/" . $mes . "/" . $anio;

        if (!validaFecha($fecha_carnet, date("d/m/Y"))) {
            $arrayErrores["fecha_carnet"][] = "La fecha no es una fecha válida";
        } else {
            $nacimiento = DateTime::createFromFormat('d/m/Y', $fecha_nac);
            $carnet = DateTime::createFromFormat('d/m/Y', $fecha_carnet);

            if ($nacimiento && $carnet) {
                $carnetMenos18 = clone $carnet;
                $carnetMenos18->sub(new DateInterval('P18Y'));

                if ($nacimiento > $carnetMenos18) {
                    $arrayErrores["fecha_carnet"][] = "Debes ser mayor de edad para tener este carnet";
                }
            } else {
                $arrayErrores["fecha_carnet"][] = "No se puede validar el carnet sin una fecha de nacimiento válida";
            }
        }
        $arrayDatos["fecha_carnet"] = $fecha_carnet;
    }

    // Hora Levantarse
    if (isset($_POST["hora_levantarse"])) {
        $hora_levantarse = $_POST["hora_levantarse"];
        if (!validaHora($hora_levantarse, "00:00:00")) {
            $arrayErrores["hora_levantarse"][] = "La hora no es una hora válida";
        }
        $arrayDatos["hora_levantarse"] = $hora_levantarse;
    }

    // Estado
    if (isset($_POST["estado"])) {
        $idEstado = intval($_POST["estado"]);
        $estado = "";

        switch ($idEstado) {
            case 1:
                $estado = "Estudiante";
                break;
            case 2:
                $estado = "En paro";
                break;
            case 3:
                $estado = "Trabajando";
                break;
            case 4:
                $estado = "Jubilado";
                break;
            default:
                $arrayErrores["estado"][] = "Se ha seleccionado una opción incorrecta";
                break;
        }

        if (!isset($arrayErrores["estado"])) {
            $arrayDatos["estado"] = $idEstado;
            $arrayDatos["estado_texto"] = $estado;
        }
    } else {
        $arrayErrores["estado"][] = "No se ha seleccionado ningún estado";
    }

    // Estudios
    if (isset($_POST["estudios"]) && is_array($_POST["estudios"])) {

        $recibidos = array_map('intval', $_POST["estudios"]);
        $codigosValidos = array(0, 1, 2, 3, 4, 5);

        if (in_array(0, $recibidos, true)) {
            $recibidos = array(0);
        }

        $incorrectos = array_diff($recibidos, $codigosValidos);

        if (!empty($incorrectos)) {
            $arrayErrores["estudios"][] = "Se ha seleccionado una opción incorrecta";
        } else {
            $arrayDatos["estudios"] = $recibidos;
        }
    } else {
        $arrayErrores["estudios"][] = "No se ha seleccionado ningún estudio";
    }


    // Hermanos
    if (isset($_POST["hermanos"])) {
        $hermanos = $_POST["hermanos"];
        if (!validaEntero($hermanos, 0, 20, 0)) {
            $arrayErrores["hermanos"][] = "El número de hermanos no es válido";
        }
        $arrayDatos["hermanos"] = $hermanos;
    }

    // Sueldo
    if (isset($_POST["sueldo"])) {
        $sueldo = $_POST["sueldo"];
        if (!validaReal($sueldo, 1000, 150000, 1100)) {
            $arrayErrores["sueldo"][] = "El sueldo no es válido";
        }
        $arrayDatos["sueldo"] = $sueldo;
    }
}

// Si no hay errores, $correcto será true
$correcto = isset($_POST["enviar"]) && empty($arrayErrores);

//dibuja la plantilla de la vista
inicioCabecera("RELACIÓN 5");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 5", $barraUbi);
cuerpo($arrayDatos, $arrayErrores, $correcto);  //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo($arrayDatos, $arrayErrores, $correcto) // Añadir aqui las variables
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
    echo "<h3>Formulario de la relación 5.</h3>" . PHP_EOL;

    if ($correcto) { // Si no hay errores muestra el resumen
        resumen($arrayDatos);
    } else { // Si hay errores, vuelve a mostrar el formulario con los datos actualizados
        formulario($arrayDatos, $arrayErrores);
    }
}

// Aqui escribiremos las funciones

// FUNCIONES

/**
 * Función que muestra el formulario por pantalla
 *
 * @param array $datos Array con todos los datos del formulario
 * @param array $errores Array con los mensajes de error del formulario
 * 
 * @return void No devuelve nada
 */
function formulario(array $datos, array $errores): void
{
    if ($errores) { //mostrar los errores
        echo "<div class='error'>";
        foreach ($errores as $clave => $valor) {
            foreach ($valor as $error)
                echo "$clave => $error<br>" . PHP_EOL;
        }
        echo "</div>";
    }
    ?>

    <form action="" method="POST">
        <!-- Nombre -->
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($datos["nombre"]) ?>">
        <br>
        <!-- Contraseña -->
        <label for="password">Contraseña: </label>
        <input type="password" id="password" name="password">
        <br>
        <!-- Repetir Contraseña -->
        <label for="repetir_password">Repetir Contraseña: </label>
        <input type="password" id="repetir_password" name="repetir_password">
        <br>
        <!-- Fecha Nacimiento -->
        <label for="fecha_nac">Fecha de nacimiento: </label>
        <input type="text" id="fecha_nac" name="fecha_nac" value="<?php echo htmlspecialchars($datos["fecha_nac"]) ?>">
        <br>
        <!-- Fecha Carnet -->
        <label>Fecha de carnet: </label>
        <input type="text" name="carnet_dia" value="<?php echo htmlspecialchars($datos["carnet_dia"]) ?>">
        <input type="text" name="carnet_mes" value="<?php echo htmlspecialchars($datos["carnet_mes"]) ?>">
        <input type="text" name="carnet_anio" value="<?php echo htmlspecialchars($datos["carnet_anio"]) ?>">
        <br>
        <!-- Hora Levantarse -->
        <label for="hora_levantarse">Hora de levantarse: </label>
        <input type="text" id="hora_levantarse" name="hora_levantarse" value="<?php echo htmlspecialchars($datos["hora_levantarse"]) ?>">
        <br>
        <!-- Estado -->
        <label>Estado: </label>
        <br><input type="radio" name="estado" value="1" <?php echo $datos["estado"] === 1 ? "checked" : "" ?>> 1 - Estudiante
        <br><input type="radio" name="estado" value="2" <?php echo $datos["estado"] === 2 ? "checked" : "" ?>> 2 - En paro
        <br><input type="radio" name="estado" value="3" <?php echo $datos["estado"] === 3 ? "checked" : "" ?>> 3 - Trabajando
        <br><input type="radio" name="estado" value="4" <?php echo $datos["estado"] === 4 ? "checked" : "" ?>> 4 - Jubilado
        <br><input type="radio" name="estado" value="5"> 5 - Incorrecta
        <br><br>
        <!-- Estudios -->
        <label>Estudios: </label>
        <br><input type="checkbox" name="estudios[]" value="0" <?php echo in_array(0, $datos["estudios"]) ? "checked" : "" ?>> 0 - Sin estudios
        <br><input type="checkbox" name="estudios[]" value="1" <?php echo in_array(1, $datos["estudios"]) ? "checked" : "" ?>> 1 - Primaria
        <br><input type="checkbox" name="estudios[]" value="2" <?php echo in_array(2, $datos["estudios"]) ? "checked" : "" ?>> 2 - Secundaria
        <br><input type="checkbox" name="estudios[]" value="3" <?php echo in_array(3, $datos["estudios"]) ? "checked" : "" ?>> 3 - Bachillerato
        <br><input type="checkbox" name="estudios[]" value="4" <?php echo in_array(4, $datos["estudios"]) ? "checked" : "" ?>> 4 - Ciclo formativo
        <br><input type="checkbox" name="estudios[]" value="5" <?php echo in_array(5, $datos["estudios"]) ? "checked" : "" ?>> 5 - Universitarios
        <br><input type="checkbox" name="estudios[]" value="6"> 6 - Incorrecta
        <br><br>
        <!-- Hermanos -->
        <label for="hermanos">Hermanos: </label>
        <input type="number" id="hermanos" name="hermanos" value="<?php echo $datos["hermanos"] ?>">
        <br>
        <!-- Sueldo -->
        <label for="sueldo">Sueldo: </label>
        <input type="number" id="sueldo" name="sueldo" value="<?php echo $datos["sueldo"] ?>">
        <br>
        <button type="submit" name="enviar">Enviar</button>
    </form>
<?php
}

/**
 * Función que recorre el array de datos del formulario y muestra los datos finales por pantalla
 *
 * @param array $datos Array con los datos finales del formulario
 * 
 * @return void No devuelve nada
 */
function resumen(array $datos): void
{
    $nombresEstudios = [
        0 => "Sin estudios",
        1 => "Primaria",
        2 => "Secundaria",
        3 => "Bachillerato",
        4 => "Ciclo formativo",
        5 => "Universitarios"
    ];

    $estudios = [];
    foreach ($datos["estudios"] as $codigo) {
        $estudios[] = $nombresEstudios[$codigo];
    }

    echo "<h4>Resumen de los datos</h4>" . PHP_EOL;
    echo "Nombre: " . htmlspecialchars($datos["nombre"]) . "<br>" . PHP_EOL;
    echo "Fecha de nacimiento: " . $datos["fecha_nac"] . "<br>" . PHP_EOL;
    echo "Fecha de carnet: " . $datos["fecha_carnet"] . "<br>" . PHP_EOL;
    echo "Hora de levantarse: " . $datos["hora_levantarse"] . "<br>" . PHP_EOL;
    echo "Estado: " . $datos["estado_texto"] . "<br>" . PHP_EOL;
    echo "Estudios: " . implode(", ", $estudios) . "<br>" . PHP_EOL;
    echo "Hermanos: " . $datos["hermanos"] . "<br>" . PHP_EOL;
    echo "Sueldo: " . $datos["sueldo"] . " €<br>" . PHP_EOL;
}
