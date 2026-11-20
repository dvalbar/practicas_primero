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
            "nombre" => "Carga página"
        ]
    ];

//dibuja la plantilla de la vista
inicioCabecera("CARGAR PÁGINA");
cabecera();
finCabecera();
inicioCuerpo("Cargar página", $barraUbi);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() {}

//vista
function cuerpo()
{
?>
    <br>
    <h3>Cargar página.</h3>
    <?php

    $id = 15;

    echo "<h2>Primera forma: ENLACE</h2>";
    ?>
    <a href="<?php echo "otrapagina.php?id=$id&nombre=David"; ?>">Ir a la otra página</a>

    <!-- Formulario POST -->
    <form method="POST" action="otrapagina.php?id=<?= $id + 5 ?>">
        <input type="hidden" name="id" value="<?= $id ?>">

        <select name="id" id="">
            <option value="1">Primero</option>
            <option value="2">Segundo</option>
            <option value="3">Tercero</option>
        </select>

        <label for="">Nombre: </label>
        <input type="text" value="" name="nombre">
        <br>
        <input type="submit" name="enviar" value="Enviar">
        <input type="submit" name="enviar" value="E1">
        <input type="submit" name="enviar" value="E3">
    </form>
<?php

}
