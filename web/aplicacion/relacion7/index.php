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
// Si no hay errores, $correcto será true
$correcto = isset($_POST["guardar"]) && empty($arrayErrores);

// Si no hay errores en el formulario se crea un Punto
if ($correcto) {
    $arrayPuntos[] = new Punto($arrayDatos["x"], $arrayDatos["y"], $arrayDatos["color"], $arrayDatos["grosor"]);
}

// Ruta de la imagen (depende del navegador desde donde se accede)
$rutaImagen = RUTABASE . "/imagenes/puntos/imagen_" . obtenerIp() . "_" . obtenerNavegador() . ".jpg";

// Si la imagen no existe ya se crea
if (!file_exists($rutaImagen)) {
    crearImg($rutaImagen, $arrayPuntos); // Crear imagen al cargar la página (Si no hay puntos guardados se crea en blanco)
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

    formulario($arrayDatos, $arrayErrores);

    // 2. Se mostrará una caja de tipo textarea en la que aparecerán todos los puntos que tenemos
    // almacenados, una línea por punto, y un img con la imagen generada.

    ?>
    <br>
    <h3>Puntos almacenados</h3>
    <textarea name="puntos" rows="10" cols="40" readonly><?php
                                                            foreach ($arrayPuntos as $punto) {
                                                                echo $punto->getCoordX() . " ; " . $punto->getCoordY() . " ; " . $punto->getColor() . " ; " . $punto->getGrosor() . PHP_EOL;
                                                            }
                                                            ?></textarea>
    <br>
    <img src="/imagenes/puntos/imagen_<?php echo obtenerIp() . "_" . obtenerNavegador(); ?>.jpg" alt="Imagen de los puntos">;
<?php
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
?>

    <!-- 1. Aparecerá un formulario en el que se recogerán dos números enteros (coordenadas x-y), se
    seleccionará desde un combo un color (los definidos en la constante colores de la clase punto) y
    aparecerán tres cajas radio para seleccionar el grosor (fino, medio, gordo). Aparecerá también
    un botón de guardar. -->

    <form action="" method="POST">
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
        <br>
        <button type="submit" name="guardar">Guardar</button>
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
    $navegador = $_SERVER["HTTP_USER_AGENT"];
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

function crearImg(string $ruta, array $arrayPuntos): void
{
    // Si el array de puntos tiene puntos se muestran en la imagen
    if (!empty($arrayPuntos)) {
        foreach ($arrayPuntos as $key => $value) {
        }
    } else { // Si el array esta vacio solo se mostrara la imagen en blanco
        $img = imagecreatetruecolor(500, 500);
        $blanco = imagecolorallocate($img, 255, 255, 255);
        $negro = imagecolorallocate($img, 0, 0, 0);
        imagefill($img, 0, 0, $blanco);
        imagerectangle($img, 0, 0, 499, 499, $negro);
        imagejpeg($img, $ruta);
        imagedestroy($img);
    }
}
