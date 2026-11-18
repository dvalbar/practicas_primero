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
            "nombre" => "Ficheros"
        ]
    ];

// Datos para escribir en el fichero

// $datos = [
//     ["nombre","David",20],
//     ["noemi","Ordenador",1234,12],
// ];

// Escribir en fichero

// if (!escribirFichero("datos.txt", $datos)) {
//     paginaError("No se han podido guardar los datos");
//     exit;
// }

$errores = [];

if (isset($_POST["descargar"])) {
    // Descarga al vuelo (la genero en el momento que me lo pide)
    $nombreSalida = "datos.pdf";
    // header('Content-Type:' . 'text/plain');
    header('Content-Type:' . 'application/pdf');

    // Si esto se comenta no se descarga de una
    header('Content-Disposition:attachment;filename="' . $nombreSalida . '"');

    $ruta = RUTABASE . "/ficheros/datos.txt";

    echo file_get_contents($ruta);

    // echo "Esto es lo que va en la respuesta y por tanto en el fichero" . PHP_EOL;
    exit; // exit; para que no descargue tambien lo de abajo
}

if (isset($_POST["subir"])) {
    // Recojo el nombre

    // Recojo el fichero
    $erroresFichero = false;

    if (!isset($_FILES["archivo"])) {
        $errores["archivo"][] = "No se ha indicado fichero";
        $erroresFichero = true;
    } else {
        // Compruebo que se ha subido un archivo correctamente
        if (!$erroresFichero && $_FILES["archivo"]["error"] != 0) {
            $errores["archivo"][] = "El fichero indicado no es correcto";
            $erroresFichero = true;
        }
    }

    if (!$erroresFichero) {
        // $extension = pathinfo();
    }

    if (!$errores) {
        $nombreSubida = RUTABASE . "/ficheros/";
        $nombreSubida = $nombreSubida . $_FILES['archivo']['name'];

        // Mover fichero de mi zona temporal a mi carpeta
        if (!move_uploaded_file($_FILES['archivo']['tmp_name'], $nombreSubida)) {
            $errores["archivo"][] = "El archivo no se ha podido subir";
        }
    }
}

$datos = ["2daw"];

leerDeFichero("datos.txt", $datos);

//dibuja la plantilla de la vista
inicioCabecera("PRUEBA FICHEROS");
cabecera();
finCabecera();
inicioCuerpo("Prueba ficheros", $barraUbi);
cuerpo($errores); //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo($errores)
{

    // Recorrer errores
    mostrarError($errores);

?>
    <br>
    <h3>Prueba ficheros.</h3>

    <!-- El tipo de codificación de datos, enctype, se DEBE especificar como a continuación-->
    <form enctype="multipart/form-data" action="" method="POST">
        <!--MAX_FILE_SIZE debe preceder al campo de entrada de archivo-->
        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
        <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES -->
        Enviar este archivo:
        <input name="archivo" type="file" /><br>
        <input type="text" name="nombre"><br><br>
        <input type="submit" value="Enviar fichero" name="subir" />
        <input type="submit" value="Descargar fichero" name="descargar" />
    </form>
<?php

}

/**
 * Función para escribir en un fichero
 * 
 * @param string $nombre Nombre del fichero
 * @param mixed $datos Valores
 * @return bool Devuelve true si ejecuta correctamente o false si hay algún error
 */
function escribirFichero(string $nombre, ?array $datos = null): bool
{
    // Ruta en la que se guardará el fichero
    $ruta = RUTABASE . "/ficheros";

    // Si no existe la ruta se crea
    if (!file_exists($ruta))
        mkdir($ruta);

    $ruta .= "/$nombre";

    // Provocar error para ir a página de error
    // if (!isset($datos)) {
    //     return false;
    // }

    // Se abre el fichero para escritura

    // Si existe se borra el contenido
    $fic = fopen($ruta, "w");
    if (!$fic) {
        return false;
    }

    // Se recorre el array con los datos
    foreach ($datos as $fila) {
        $linea = "";
        foreach ($fila as $columna) {
            $linea .= $columna . ",";
        }
        $linea .= "\r\n";

        // Se escribe en el fichero una linea
        fputs($fic, $linea);
    }

    // Se cierra el fichero
    fclose($fic);
    return true;
}

/**
 * Función para leer de un fichero
 * @param string $nombre Nombre del fichero
 * @param mixed $datos Valores
 * @return bool Devuelve true si ejecuta correctamente o false si hay algún error
 */
function leerDeFichero(string $nombre, array &$datos): bool
{
    // Ruta en la que se guardará el fichero
    $ruta = RUTABASE . "/ficheros";

    // Si no existe la ruta se crea
    if (!file_exists($ruta))
        mkdir($ruta);

    $ruta .= "/$nombre";

    // Se abre el fichero para lectura
    // Debe existir
    $fic = fopen($ruta, "r");
    if (!$fic) {
        return false;
    }

    // Borro el contenido del array
    foreach ($datos as $pos => $valor) {
        unset($datos[$pos]);
    }

    // Leo el fichero linea a linea
    while ($linea = fgets($fic)) {
        $linea = str_replace("\r", "", $linea);
        $linea = str_replace("\n", "", $linea);

        if ($linea != "") {
            $linea = explode(",", $linea);
            $datos[] = $linea;
        }
    }

    // Se cierra el fichero
    fclose($fic);
    return true;
}

/**
 * Función para mostrar errores
 *
 * @param array $error Array con los errores
 * @return void No devuelve nada
 */
function mostrarError(array $error)
{
    if ($error) { // Mostrar los errores
        echo "<div class='error'>";
        foreach ($error as $clave => $valor) {
            foreach ($valor as $err)
                echo "$clave => $err<br>" . PHP_EOL;
        }
        echo "</div>";
    }
}
