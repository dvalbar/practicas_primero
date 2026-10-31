<?php
// 4.- Definir la clase Flauta que es un instrumento de viento que es fabricable y de la que no se puede
// heredar ninguna otra subclase.

/**
 * Flauta: instrumento de viento fabricable. Es final, por lo que no se
 * puede heredar de ella. Su constructor es privado y se crea mediante
 * el método estático crearDesdeArray().
 */
final class Flauta extends InstrumentoViento implements IFabricable
{
    /**
     * Valores por defecto (material y edad) usados al crear una flauta
     * desde un array al que le faltan datos.
     */
    public static array $_miArray = [
        "material" => "madera",
        "edad" => 15
    ];

    // - El constructor se hará privado

    /**
     * Constructor privado: llama al constructor de InstrumentoViento
     * con la edad y el material indicados.
     *
     * @param string $material Material de la flauta.
     * @param int    $edad     Edad de la flauta.
     */
    private function __construct(string $material, int $edad)
    {
        parent::__construct($edad, $material);
    }

    // Métodos de la interfaz IFabricable

    /**
     * Devuelve los pasos para fabricar la flauta.
     *
     * @return string Devuelve los pasos para fabricar la flauta
     */
    public function metodoFabricacion(): string
    {
        // Devuelve el proceso de fabricación
        return "Moldeado por inyección de resina plástica de alta precisión y afinación por ultrasonido.";
    }

    /**
     * Devuelve el método de reciclado según cómo se ha fabricado la flauta.
     *
     * @return string Devuelve el método de reciclado según cómo se ha fabricado la flauta
     */
    public function metodoReciclado(): string
    {
        // Devuelve el proceso de reciclado
        return "Triturado del material plástico para su posterior fundición y reutilización en nuevos productos plásticos.";
    }

    // - Se tiene el método estático CrearDesdeArray (constructor estatico) con parámetro un Array
    // con posiciones asociativas “material” y “edad” (pueden no aparecer por lo que se tienen en
    // cuenta valores por defecto) y que devuelve una instancia de Flauta con los valores
    // indicados.

    /**
     * Constructor estático: crea una flauta a partir de un array con las
     * posiciones "material" y "edad". Si no aparecen ambas, usa los
     * valores por defecto de $_miArray.
     *
     * @param array $miArray Array asociativo con "material" y "edad".
     * @return static Nueva instancia de Flauta.
     */
    public static function crearDesdeArray(array $miArray): static
    {
        if (isset($miArray["material"]) && isset($miArray["edad"])) {
            $obj = new static($miArray["material"], $miArray["edad"]);
            // Devuelve la flauta con los valores del array
            return $obj;
        } else {
            $obj = new static(self::$_miArray["material"], self::$_miArray["edad"]);
            // Devuelve la flauta con los valores por defecto
            return $obj;
        }
    }

    // - Definir el método de clonación para la clase flauta de forma que el nuevo objeto tenga los
    // mismos valores, salvo la edad que será 0 y el número de instancia (propiedad) /número de
    // instancias (propiedad de clase), ya que realmente he creado una nueva instancia.

    /**
     * Se ejecuta al clonar la flauta: el clon tiene edad 0 y se le asigna
     * un nuevo número de orden, incrementando el contador de instancias.
     * @return void No devuelve nada
     */
    public function __clone(): void
    {
        $this->_edad = 0;
        self::$_elementosCreados++;
        $this->_ordenCreacion = self::$_elementosCreados;
    }
}
