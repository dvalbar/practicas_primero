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
            "nombre" => "Relacion 7",
        ]
    ];

// Array con los datos del formulario, inicializado
$arrayDatos = [
    "x" => "",
    "y" => "",
    "color" => "",
    "grosor" => "",
];

// Array con los errores del formulario
$arrayErrores = [];

// Ruta donde se guardará la imagen
$rutaImagen = RUTABASE . "/imagenes/puntos/imagen_" . obtenerIp() . "_" . obtenerNavegador() . ".jpg";

// Ruta donde se guardará el fichero de puntos
$miFicheroPuntos = "puntos_" . obtenerIp() . "_" . obtenerNavegador() . ".dat";

// 3. Se trabajará con el fichero puntos_dirip_navegador.dat (dirip es la dirección IP del cliente y
// navegador es una cadena que indica tipo de navegador). Como veis este fichero será distinto
// dependiendo del cliente y el ordenador con el que se hace el acceso a la página web.
// Este fichero contiene una línea por cada punto disponible. El formato de la línea será “x ; y ;
// color ; grosor “.
// Lo primero que se hará cuando se accede a una página, será cargar los puntos de este fichero al
// array Puntos. Así lo tendremos disponible en todos los ficheros php (index.php, imagen.php,
// etc)

// Leer el fichero y cargar los puntos al arrayPuntos
leerDeFichero($miFicheroPuntos, $arrayPuntos);

// Al pulsar el botón de guardar se debe llamar al fichero index.php indicándole todos los valores
// anteriores. Se comprobará si las coordenadas están entre 0 y 500, se ha indicado un color y se
// ha seleccionado un grosor. En caso de que no se cumpla lo anterior se mostrará en el elemento
// de formulario correspondiente el valor introducido. Si hay errores, no se muestra resumen de los
// errores sino que junto a cada elemento se pondrá el error correspondiente.

if (isset($_POST["guardar"])) {

    // Coordenada X
    if (isset($_POST["x"])) {
        $coordX = trim($_POST["x"]);
        if ($coordX === "") {
            $arrayErrores["x"][] = "La coordenada X no puede estar vacía";
        } else if (filter_var($coordX, FILTER_VALIDATE_INT) === false) {
            $arrayErrores["x"][] = "La coordenada debe ser un número entero";
        } else if (!validaEntero($coordX, 0, 500, 0)) {
            $arrayErrores["x"][] = "La coordenada debe estar entre 0 y 500";
        }
        $arrayDatos["x"] = $coordX;
    }

    // Coordenada Y
    if (isset($_POST["y"])) {
        $coordY = trim($_POST["y"]);
        if ($coordY === "") {
            $arrayErrores["y"][] = "La coordenada Y no puede estar vacía";
        } else if (filter_var($coordY, FILTER_VALIDATE_INT) === false) {
            $arrayErrores["y"][] = "La coordenada debe ser un número entero";
        } else if (!validaEntero($coordY, 0, 500, 0)) {
            $arrayErrores["y"][] = "La coordenada debe estar entre 0 y 500";
        }
        $arrayDatos["y"] = $coordY;
    }


    // Color
    if (isset($_POST["color"])) {
        $color = mb_trim($_POST["color"]);
        if (!array_key_exists($color, Punto::COLORES)) {
            $arrayErrores["color"][] = "No se ha elegido un color";
        }
        $arrayDatos["color"] = $color;
    }

    // Grosor
    if (isset($_POST["grosor"])) {
        $grosor = intval($_POST["grosor"]);
        if (!array_key_exists($grosor, Punto::GROSORES)) {
            $arrayErrores["grosor"][] = "El grosor debe ser un entero entre 1 y 3";
        }
        $arrayDatos["grosor"] = $grosor;
    } else {
        // Si no existe grosor es que no se ha seleccionado
        $arrayErrores["grosor"][] = "No se ha seleccionado ningún grosor";
    }
}

// 4. Se tendrá un formulario que muestre un combo con una entrada por cada punto existente y un
// botón borrar que al pulsarse recarga la página index.php y se encarga de borrar de la lista el
// punto indicado. Debe actualizarse el fichero de puntos y la imagen para que refleje el borrado.
// Posteriormente se recargará la página index.php.

if (isset($_POST["borrar"])) {

    // Si existe y se ha seleccionado una opción válida
    if (isset($_POST["puntoBorrar"]) && $_POST["puntoBorrar"] !== "") {
        $posicion = intval($_POST["puntoBorrar"]);

        if (isset($arrayPuntos[$posicion])) {
            unset($arrayPuntos[$posicion]); // Borrar punto

            // Reindexamos el array para que no queden huecos en las posiciones
            $arrayPuntos = array_values($arrayPuntos);

            // Actualizamos el fichero y regeneramos la imagen
            escribirFichero($miFicheroPuntos, $arrayPuntos);
            crearImg($rutaImagen, $arrayPuntos);
        }
    } else {
        $arrayErrores["borrar"][] = "Debes seleccionar un punto para borrar";
    }
}

// 6. Aparecerá un formulario que nos permitirá subir un fichero .txt de puntos en el mismo formato
// del indicado en el apartado 3. Al subirlo se procederá a añadir los puntos correctos (que
// cumplen las condiciones) a los que ya tenemos y actualizará el fichero puntos_
// dirip_navegador.dat. También se actualizará la imagen.

if (isset($_POST['subir'])) {
    $erroresFichero = false;

    // Si no subo ningun fichero da error
    if (!isset($_FILES['archivo'])) {
        $arrayErrores['archivo'][] = 'No se ha indicado fichero';
        $erroresFichero = true; // Errores a true
    } else {
        // Compruebo que se ha subido un archivo correctamente
        if ($_FILES['archivo']['error'] != 0) {
            $arrayErrores['archivo'][] = 'El fichero indicado no es correcto';
            $erroresFichero = true;
        }
    }

    // Si no hay errores
    if (!$erroresFichero) {
        $extension = strtolower(pathinfo($_FILES['archivo']['name'], PATHINFO_EXTENSION)); // Extensión .txt

        // Si la extensión del fichero no es .txt da error
        if ($extension !== 'txt') {
            $arrayErrores['archivo'][] = 'Solo se permiten archivos .txt';
            $erroresFichero = true;
        }
    }

    // Ahora si no hay ni un solo error si que subimos el fichero y hacemos las comprobaciones
    if (!$erroresFichero && empty($arrayErrores)) {

        $nombreFichero = basename($_FILES['archivo']['name']); // Nombre del fichero subido

        $carpeta = RUTABASE . '/ficheros'; // Ruta donde se guardará este fichero

        if (!file_exists($carpeta)) { // Si la ruta no existe se crea
            mkdir($carpeta);
        }

        // Comprobamos si se puede subir el fichero
        if (!move_uploaded_file($_FILES['archivo']['tmp_name'], "$carpeta/$nombreFichero")) {
            // Si no se puede subir da error
            $arrayErrores['archivo'][] = 'El archivo no se ha podido subir';
        } else {
            // Si se sube hacemos comprobaciones

            $puntosAntes = count($arrayPuntos); // Puntos que hay antes de agregar los nuevos

            // false = No borra los puntos anteriores (nos sirve para agregar nuevos puntos sin perder los anteriores)
            leerDeFichero($nombreFichero, $arrayPuntos, false);

            // Si hay más puntos que antes se escribe en el fichero de puntos y se vuelve a crear la imagen
            if (count($arrayPuntos) > $puntosAntes) {
                escribirFichero($miFicheroPuntos, $arrayPuntos);
                crearImg($rutaImagen, $arrayPuntos);
            } else {
                // Si no es capaz de meter puntos dará error porque el formato de los puntos está mal
                $arrayErrores['archivo'][] = 'No se han encontrado puntos válidos en el fichero';
            }
        }
    }
}


// ===================
// GUARDAR UN PUNTO
// ===================

// Si no hay errores al guardar un punto, $correcto será true
$correcto = isset($_POST["guardar"]) && empty($arrayErrores);

// Si no hay errores en el formulario, se crea un punto,  se guarda en el array de puntos, 
// se escribe ese punto en el fichero y se recrea la imagen

if ($correcto) {
    // Crear punto y añadirlo al array
    $arrayPuntos[] = new Punto($arrayDatos["x"], $arrayDatos["y"], $arrayDatos["color"], $arrayDatos["grosor"]);

    // Escribir en el fichero
    escribirFichero($miFicheroPuntos, $arrayPuntos);

    // Y recrear imagen
    crearImg($rutaImagen, $arrayPuntos);
}

// Si la imagen no existe, se crea la imagen en blanco (esto se ejecuta en caso de no encontrar una 
// imagen con puntos, por ejemplo si entras desde un navegador diferente)
if (!file_exists($rutaImagen)) {
    crearImg($rutaImagen, $arrayPuntos);
}

//dibuja la plantilla de la vista
inicioCabecera("RELACIÓN 7");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 7", $barraUbi);
cuerpo($arrayDatos, $arrayErrores, $arrayPuntos);  //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo(array $arrayDatos, array $arrayErrores, array $arrayPuntos) // Añadir aqui las variables
{
?>
    <br>
    <h3>Formulario de la relación 7.</h3>
    <?php

    formulario($arrayDatos, $arrayErrores, $arrayPuntos); // Mostrar formulario

    // 2. Se mostrará una caja de tipo textarea en la que aparecerán todos los puntos que tenemos
    // almacenados, una línea por punto, y un img con la imagen generada.

    ?>
    <br>
    <h3>Subir archivo .txt de puntos</h3>
    <!-- El tipo de codificación de datos, enctype, se DEBE especificar como a continuación-->
    <form enctype="multipart/form-data" action="" method="POST">
        <!--MAX_FILE_SIZE debe preceder al campo de entrada de archivo-->
        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
        <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES -->
        Subir fichero:
        <input name="archivo" type="file" /><br>
        <br>
        <input type="submit" value="Subir fichero" name="subir" />
        <?php
        // Mostrar error en subir fichero
        if (isset($arrayErrores["archivo"])) {
            foreach ($arrayErrores["archivo"] as $error) {
                echo " <span class='error'>$error</span>";
            }
        }
        ?>
    </form>
    <br>
    <h3>Puntos almacenados</h3>
    <textarea name="puntos" rows="10" cols="40" readonly><?php
                                                            foreach ($arrayPuntos as $punto) {
                                                                echo $punto->getCoordX() . ";" . $punto->getCoordY() . ";" . $punto->getColor() . ";" . $punto->getGrosor() . PHP_EOL;
                                                            }
                                                            ?></textarea>
    <br>
    <img src="/imagenes/puntos/imagen_<?php echo obtenerIp() . "_" . obtenerNavegador(); ?>.jpg" alt="Imagen de los puntos">
<?php
}

// Aqui escribiremos las funciones

// FUNCIONES

/**
 * Función que muestra el formulario por pantalla
 *
 * @param array $datos Array con todos los datos del formulario
 * @param array $errores Array con los mensajes de error del formulario
 * @param array $errores Array con los puntos de la página
 * 
 * @return void No devuelve nada
 */
function formulario(array $datos, array $errores, array $puntos): void
{
?>

    <!-- 1. Aparecerá un formulario en el que se recogerán dos números enteros (coordenadas x-y), se
    seleccionará desde un combo un color (los definidos en la constante colores de la clase punto) y
    aparecerán tres cajas radio para seleccionar el grosor (fino, medio, gordo). Aparecerá también
    un botón de guardar. -->

    <form action="/aplicacion/relacion7/index.php" method="POST"> <!-- Redirecciona a la misma página -->
        <!-- Coordenada X -->
        <label for="x">Coordenada X: </label>
        <input type="text" id="x" name="x" value="<?php echo $datos["x"]; ?>">
        <?php
        // Mostrar error en el campo coordenada X
        if (isset($errores["x"])) {
            foreach ($errores["x"] as $error) {
                echo " <span class='error'>$error</span>";
            }
        }
        ?>
        <br><br>
        <!-- Coordenada Y -->
        <label for="y">Coordenada Y: </label>
        <input type="text" id="y" name="y" value="<?php echo $datos["y"]; ?>">
        <?php
        // Mostrar error en el campo coordenada Y
        if (isset($errores["y"])) {
            foreach ($errores["y"] as $error) {
                echo " <span class='error'>$error</span>";
            }
        }
        ?>
        <br><br>
        <!-- Color -->
        <label for="color">Color: </label>
        <select name="color" id="color">
            <option value="">Selecciona un color</option>
            <?php
            foreach (Punto::COLORES as $key => $value) {
                $color = mb_strtoupper($value["nombre"]);
                if ($datos["color"] === $key) {
                    echo "<option value='$key' selected>$color</option>" . PHP_EOL;
                } else {
                    echo "<option value='$key'>$color</option>" . PHP_EOL;
                }
            }
            ?>
        </select>
        <?php
        // Mostrar error en el campo color
        if (isset($errores["color"])) {
            foreach ($errores["color"] as $error) {
                echo " <span class='error'>$error</span>";
            }
        }
        ?>
        <br><br>
        <!-- Grosor -->
        <label>Grosor: </label>
        <?php
        // Mostrar error en el campo grosor
        if (isset($errores["grosor"])) {
            foreach ($errores["grosor"] as $error) {
                echo " <span class='error'>$error</span>";
            }
        }
        ?>
        <br><input type="radio" name="grosor" value="1" <?php if (intval($datos["grosor"]) === 1) echo "checked"; ?>> Fino
        <br><input type="radio" name="grosor" value="2" <?php if (intval($datos["grosor"]) === 2) echo "checked"; ?>> Medio
        <br><input type="radio" name="grosor" value="3" <?php if (intval($datos["grosor"]) === 3) echo "checked"; ?>> Grueso
        <br><input type="radio" name="grosor" value="4" <?php if (intval($datos["grosor"]) === 4) echo "checked"; ?>> Muy grueso
        <br><br>
        <!-- Borrar puntos -->
        <label>Borrar punto: </label>
        <select name="puntoBorrar" id="puntoBorrar">
            <option value="">Selecciona un punto</option>
            <?php
            foreach ($puntos as $key => $punto) {
                // Texto que muestra cada opción
                $textoPunto = "Punto " . ($key + 1) . ": " . $punto->getCoordX() . "; " . $punto->getCoordY() . "; " . $punto->getColor() . "; " . $punto->getGrosor();

                echo "<option value='$key'>$textoPunto</option>" . PHP_EOL;
            }
            ?>
        </select>
        <?php
        // Mostrar error en el campo Borrar punto
        if (isset($errores["borrar"])) {
            foreach ($errores["borrar"] as $error) {
                echo " <span class='error'>$error</span>";
            }
        }
        ?>
        <br><br>
        <button type="submit" name="guardar">Guardar</button>
        <button type="submit" name="borrar">Borrar</button>
        <button type="submit" name="descargar" formaction="imagen.php">Descargar</button>
    </form>
<?php
}

/**
 * Función para sacar desde que navegador web se ha entrado a la página web
 *
 * @return string Cadena con el nombre del navegador web
 */
function obtenerNavegador(): string
{
    $navegador = $_SERVER["HTTP_USER_AGENT"] ?? "";

    if (stripos($navegador, "Edg") !== false) {
        return "edge";
    }
    if (stripos($navegador, "Firefox") !== false) {
        return "firefox";
    }
    if (stripos($navegador, "Chrome") !== false) {
        return "chrome";
    }
    if (stripos($navegador, "Safari") !== false) {
        return "safari";
    }
    return "otro";
}

/**
 * Función para sacar la ip
 *
 * @return string Cadena con la ip
 */
function obtenerIp(): string
{
    $ip = $_SERVER["REMOTE_ADDR"]; // IP
    return str_replace(".", "_", $ip); // Cambiar los puntos por guiones bajos
}

// El fichero de imagen se personalizará para que el
// nombre refleje información del cliente. Esto es, se tendrá un archivo dentro de
// /imagenes/puntos/ con el nombre en el formato: imagen_dirip_navegador.jpg (dirip es la
// dirección IP del cliente y navegador es una cadena que indica tipo de navegador, ej
// 192_168_2_101_chrome.png) que se creará inicialmente (vacío, solo fondo de color blanco con
// un marco) cuando se conecte un usuario y se recreará solo cuando se añada/borre un punto (no
// estar recreándolo siempre). 

/**
 * Crea la imagen .jpg con los puntos y la guarda en la ruta indicada
 *
 * @param string $ruta Ruta del fichero de imagen
 * @param array $arrayPuntos Array de objetos Punto a dibujar
 *
 * @return void No devuelve nada
 */
function crearImg(string $ruta, array $arrayPuntos): void
{
    $img = imagecreatetruecolor(500, 500); // Crear imagen 500 x 500

    $blanco = imagecolorallocate($img, 255, 255, 255); // Color blanco
    $negro = imagecolorallocate($img, 0, 0, 0); // Color negro

    imagefill($img, 0, 0, $blanco); // Rellenar el fondo de la imagen de color blanco

    imagerectangle($img, 0, 0, 499, 499, $negro); // Rectangulo negro (borde) que se coloca al borde de la imagen

    // Si el array de puntos tiene puntos se muestran en la imagen
    if (!empty($arrayPuntos)) {
        foreach ($arrayPuntos as $miPunto) { // Recorro mis puntos
            $miRgb = Punto::COLORES[$miPunto->getColor()]["rgb"];
            $grosorPunto = $miPunto->getGrosor() * 10;
            $punto = imagecolorallocate($img, $miRgb[0], $miRgb[1], $miRgb[2]);
            imagefilledellipse($img, $miPunto->getCoordX(), $miPunto->getCoordY(), $grosorPunto, $grosorPunto, $punto);
        }
    }

    imagestring($img, 3, 250, 480, "David Valverde Barea", $negro);

    imagejpeg($img, $ruta); // Crea la imagen en la ruta especificada
}

/**
 * Función para escribir en un fichero
 * 
 * @param string $nombre Nombre del fichero
 * @param mixed $datos Valores
 * 
 * @return bool Devuelve true si ejecuta correctamente o false si hay algún error
 */
function escribirFichero(string $nombre, array $datos): bool
{
    // Ruta en la que se guardará el fichero
    $ruta = RUTABASE . "/ficheros";

    // Si no existe la ruta se crea
    if (!file_exists($ruta))
        mkdir($ruta);

    $ruta .= "/$nombre";

    // Se abre el fichero para escritura

    // Si existe se borra el contenido
    $fic = fopen($ruta, "w");
    if (!$fic) {
        return false;
    }

    // Se recorre el array con los datos
    foreach ($datos as $punto) {
        $linea = $punto->getCoordX() . ";" . $punto->getCoordY() . ";" . $punto->getColor() . ";" . $punto->getGrosor();

        // Se escribe
        fputs($fic, $linea . PHP_EOL);
    }

    // Se cierra el fichero
    fclose($fic);
    return true;
}

/**
 * Función para leer de un fichero
 * @param string $nombre Nombre del fichero
 * @param mixed $datos Valores
 * @param bool $vaciar true si queremos vaciar nuestros puntos, false si queremos mantenerlos (para añadir a los actuales)
 * 
 * @return bool Devuelve true si ejecuta correctamente o false si hay algún error
 */
function leerDeFichero(string $nombre, array &$datos, bool $vaciar = true): bool
{
    // Ruta en la que se guardará el fichero
    $ruta = RUTABASE . "/ficheros";

    // Si no existe la ruta se crea
    if (!file_exists($ruta))
        mkdir($ruta);

    $ruta .= "/$nombre"; // Se añade a la ruta el nombre del fichero (con su extensión)

    // Si hubiera algun problema con la ruta devuelve false
    if (!file_exists($ruta)) {
        return false;
    }

    // Se abre el fichero para lectura
    // Debe existir el fichero
    $fic = fopen($ruta, "r");
    if (!$fic) {
        // Si no existe el fichero devuelve falso
        return false;
    }

    // Por defecto $vaciar es true, y los puntos se borrarian para leer puntos nuevos
    // Si se indica false, no entra aquí, no borra los puntos anteriores y nos permite
    // añadir más puntos a los actuales
    if ($vaciar) {
        $datos = [];
    }

    // Leo el fichero linea a linea
    while ($linea = fgets($fic)) {
        $linea = str_replace("\r", "", $linea);
        $linea = str_replace("\n", "", $linea);

        // Si la linea no está vacía
        if ($linea != "") {
            // Separo por ; y quito los espacios de cada trozo
            $trozos = array_map("trim", explode(";", $linea));

            // Solo si la línea tiene los 4 datos (coordX, coordY, color, grosor)
            if (count($trozos) === 4) {
                try {
                    // Añadimos el nuevo punto a nuestro array de puntos
                    $datos[] = new Punto($trozos[0], $trozos[1], $trozos[2], $trozos[3]);
                } catch (Throwable $e) {
                    // Si no se pudiera crear un punto entra aquí

                    // Línea no válida: se salta y se sigue con la siguiente

                    // Si la siguiente si es buena si que se añade un punto
                }
            }
        }
    }

    // Se cierra el fichero
    fclose($fic);
    return true;
}
