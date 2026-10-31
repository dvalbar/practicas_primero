<?php

// 3.- Definir la clase InstrumentoViento que hereda de InstrumentoBase con el siguiente
// comportamiento:

class InstrumentoViento extends InstrumentoBase
{
    // - Tiene el atributo material con valor por defecto madera. Este atributo no es accesible
    // directamente desde el exterior aunque si desde las clases derivadas. No se tienen métodos
    protected string $_material = "madera";

    // - La descripción es “instrumento de viento”.
    // - Al constructor se le pasa como parámetro el material y la edad (valor por defecto 15).
    // #[Override]
    public function __construct(int $edad = 15, string $material = "madera")
    {
        parent::__construct("instrumento de viento", $edad);
        $this->_material = $material;
    }

    // set/get para esta propiedad.
    public function getMaterial(): string
    {
        return $this->_material;
    }

    public function setMaterial(string $nuevoMaterial): void
    {
        $this->_material = $nuevoMaterial;
    }

    // - El método afinar no debe ser redefinible en las clases derivadas de esta.
    #[Override]
    public final function afinar(): string
    {
        return
            "1. Calienta: Toca 5 minutos.<br>
        2. Sopla: Toca normal frente al afinador.<br>
        3. Ajusta:<br>
	        &nbsp;&nbsp;&nbsp;• Si está alto / agudo: Saca la boquilla o bomba (alarga).<br>
	        &nbsp;&nbsp;&nbsp;• Si está bajo / grave: Mete la boquilla o bomba (acorta).";
    }

    #[Override]
    public function sonido(): string
    {
        return "Tururú";
    }

    // - Cuando se muestre en un echo aparecerá, junto a todo lo indicado por la clase base, el texto
    // “Instrumento de material XXXX”.
    #[Override]
    public function __toString(): string
    {
        return parent::__toString() . " Instrumento de material " . $this->getMaterial();
    }
}
