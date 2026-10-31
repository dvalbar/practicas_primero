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
            "nombre" => "Formulario",
        ]
    ];

header("refresh: 3, url=https:/www.iespedroespinosa.es"); // A los 3 segundos te lleva a la página del pedro espinosa

//inicializaciones
$datos = [
    "nombre" => "",
    "precio" => 0
];
$errores = [];

//comprobar si se ha dado a insertar
if (isset($_POST["crear"])) {
    // verifico nombre
    $nombre = "";
    if (isset($_POST["nombre"])) {
        $nombre = $_POST["nombre"];
        $nombre = mb_strtolower(mb_trim($nombre));
    }
    if ($nombre == "")
        $errores["nombre"][] = "Debe indicarse un nombre";
    if (mb_strlen($nombre) > 20)
        $errores["nombre"][] = "El nombre no puede tener mas de 20 caracteres";
    $datos["nombre"] = $nombre;

    // verifico precio
    $precio = 0;
    if (isset($_POST["precio"])) {
        $precio = floatval($_POST["precio"]);
    }
    if ($precio <= 0)
        $errores["precio"][] = "Debe indicarse un precio";
    $precio = 10;
    $datos["precio"] = $precio;


    if (!$errores) //no hay errores hago la insercion
    {
        //codigo para el nuevo articulo
        $codigo = 1; //codigo
        //se guarda el articulo
        //ir a ver el articulo insertado
        header("location: https:/www.iespedroespinosa.es");
        exit;
    }
}

//dibuja la plantilla de la vista
inicioCabecera("FORMULARIO");
cabecera();
finCabecera();
inicioCuerpo("FORMULARIO", $barraUbi);
cuerpo($datos, $errores); //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo($datos, $errores)
{
?>
    <br>

<?php
    formulario($datos, $errores);
}

function formulario($datos, $errores)
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
    <form action="" method="post"> <!-- get o post -->
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre"
            value="<?php echo $datos["nombre"]; ?>" size=21
            maxlength="20"><br>
        <label for="precio">Precio: </label>
        <input type="text" name="precio" id="precio"
            value="<?php echo $datos["precio"]; ?>" size=4
            maxlength="3"><br>
        <input type="submit" class="boton" value="Crear" name="crear">
    </form>
<?php
}
