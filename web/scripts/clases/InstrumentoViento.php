<?php

// 3.- Definir la clase InstrumentoViento que hereda de InstrumentoBase con el siguiente
// comportamiento:

/**
 * Instrumento de viento: hereda de InstrumentoBase y añade el material
 * del que está hecho. Implementa sonido() y afinar() (este último no se
 * puede redefinir en las clases hijas).
 */
class InstrumentoViento extends InstrumentoBase
{
    // - Tiene el atributo material con valor por defecto madera. Este atributo no es accesible
    // directamente desde el exterior aunque si desde las clases derivadas. No se tienen métodos
    /**
     * Material del instrumento (por defecto "madera").
     * Accesible desde las clases derivadas.
     */
    protected string $_material = "madera";

    // - La descripción es “instrumento de viento”.
    // - Al constructor se le pasa como parámetro el material y la edad (valor por defecto 15).
    // #[Override]
    /**
     * Constructor: llama al constructor de la clase base con la descripción
     * "instrumento de viento" y la edad, y asigna el material.
     *
     * @param int    $edad     Edad del instrumento (por defecto 15).
     * @param string $material Material del instrumento (por defecto "madera").
     */
    public function __construct(int $edad = 15, string $material = "madera")
    {
        parent::__construct("instrumento de viento", $edad);
        $this->_material = $material;
    }

    // set/get para esta propiedad.
    /**
     * Devuelve el material del instrumento.
     *
     * @return string
     */
    public function getMaterial(): string
    {
        // Devuelve el material guardado
        return $this->_material;
    }

    /**
     * Cambia el material del instrumento.
     *
     * @param string $nuevoMaterial Nuevo material.
     */
    public function setMaterial(string $nuevoMaterial): void
    {
        $this->_material = $nuevoMaterial;
    }

    // - El método afinar no debe ser redefinible en las clases derivadas de esta.
    /**
     * Devuelve los pasos para afinar un instrumento de viento.
     * Es final: las clases derivadas no pueden redefinirlo.
     *
     * @return string
     */
    #[Override]
    public final function afinar(): string
    {
        // Devuelve los pasos de afinado en formato HTML
        return
            "1. Calienta: Toca 5 minutos.<br>
        2. Sopla: Toca normal frente al afinador.<br>
        3. Ajusta:<br>
	        &nbsp;&nbsp;&nbsp;• Si está alto / agudo: Saca la boquilla o bomba (alarga).<br>
	        &nbsp;&nbsp;&nbsp;• Si está bajo / grave: Mete la boquilla o bomba (acorta).";
    }

    /**
     * Devuelve la frase que representa el sonido del instrumento de viento.
     *
     * @return string
     */
    #[Override]
    public function sonido(): string
    {
        // Devuelve el sonido del instrumento
        return "Tururú";
    }

    // - Cuando se muestre en un echo aparecerá, junto a todo lo indicado por la clase base, el texto
    // “Instrumento de material XXXX”.
    /**
     * Devuelve el texto de la clase base y le añade el material.
     *
     * @return string
     */
    #[Override]
    public function __toString(): string
    {
        // Devuelve el texto de la clase base más el material
        return parent::__toString() . " Instrumento de material " . $this->getMaterial();
    }
}
