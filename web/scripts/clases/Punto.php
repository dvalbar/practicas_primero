<?php

class Punto
{
    // Constante pública de clase COLORES con los colores posibles (mínimo 4 colores) donde
    // cada fila será de la forma nombre_color_inglés => [“nombre”=> “nombre color español”,
    // “rgb” => [entero rojo, entero azul, entero verde]],

    // (ej “black”=>[“nombre”=>”negro”, “rgb” =>[0,0,0]]).

    // nombre_color_inglés => [“nombre”=> “nombre color español”

    public const COLORES = [
        "black" => ["nombre" => "negro",  "rgb" => [0, 0, 0]],
        "green" => ["nombre" => "verde", "rgb" => [0, 255, 0]],
        "red"   => ["nombre" => "rojo",   "rgb" => [255, 0, 0]],
        "blue"  => ["nombre" => "azul",   "rgb" => [0, 0, 255]],
        "yellow"  => ["nombre" => "amarillo",   "rgb" => [255, 255, 0]],
    ];

    // Constante pública de clase GROSORES con los grosores posibles ([1 =>”fino”, 2 =>
    // “medio”, 3 => “grueso”]

    public const GROSORES = [
        1 => "fino",
        2 => "medio",
        3 => "grueso",
        4 => "muy grueso",
    ];

    // Propiedades x (entero, entre 0 y 20000), y (entero, entre 0 y 20000), color (cadena, valor
    // en inglés – según constante COLORES) y grosor (entero, valores según la constante
    // GROSORES – 1, 2, 3- ). Las propiedades son privadas y se acceden con métodos set/get.

    private int $_coordX; // Entero, entre 0 y 20000
    private int $_coordY; // Entero, entre 0 y 20000
    private string $_color; // Cadena, valor en inglés ("black")
    private int $_grosor; // Entero (1, 2, 3)

    // En el constructor se pasan parámetros para todas las propiedades. Si no se cumple
    // alguna restricción se lanza una excepción.
    public function __construct(int $coordX, int $coordY, string $color, int $grosor)
    {
        if (!$this->setCoordX($coordX)) throw new \Exception('Coordenada X no válida');
        if (!$this->setCoordY($coordY)) throw new \Exception('Coordenada Y no válida');
        if (!$this->setColor($color)) throw new \Exception('Color no válido');
        if (!$this->setGrosor($grosor)) throw new \Exception('Grosor no válido');
    }

    // ===================
    // Setter's y getter's
    // ===================

    // Los set devuelven true/false si es correcto el valor. Si es correcto se actualiza el valor de
    // la propiedad.

    /**
     * Devuelve la coordenada X.
     *
     * @return int Devuelve la coordenada X
     */
    public function getCoordX(): int
    {
        return $this->_coordX;
    }

    /**
     * Cambia la coordenada X.
     *
     * @param int $nuevaCoordX Nueva coordenada X
     * @return bool Devuelve true si las condiciones son válidas
     */
    public function setCoordX(int $nuevaCoordX): bool
    {
        if (validaEntero($nuevaCoordX, 0, 20000, 0)) {
            $this->_coordX = $nuevaCoordX;
            $resultado = true;
        } else {
            $resultado = false;
        }
        return $resultado;
    }

    /**
     * Devuelve la coordenada Y.
     *
     * @return int Devuelve la coordenada Y
     */
    public function getCoordY(): int
    {
        return $this->_coordY;
    }

    /**
     * Cambia la coordenada Y.
     *
     * @param int $nuevaCoordY Nueva coordenada Y
     * @return bool Devuelve true si las condiciones son válidas
     */
    public function setCoordY(int $nuevaCoordY): bool
    {
        if (validaEntero($nuevaCoordY, 0, 20000, 0)) {
            $this->_coordY = $nuevaCoordY;
            $resultado = true;
        } else {
            $resultado = false;
        }
        return $resultado;
    }

    /**
     * Devuelve el color.
     *
     * @return string Devuelve el color
     */
    public function getColor(): string
    {
        return $this->_color;
    }

    /**
     * Cambia el color.
     *
     * @param string $nuevoColor Nuevo color (se pasa en inglés)
     * @return bool Devuelve true si las condiciones son válidas
     */
    public function setColor(string $nuevoColor): bool
    {
        if (array_key_exists($nuevoColor, self::COLORES)) {
            $this->_color = $nuevoColor;
            $resultado = true;
        } else {
            $resultado = false;
        }
        return $resultado;
    }

    /**
     * Devuelve el grosor.
     *
     * @return int Devuelve el grosor
     */
    public function getGrosor(): int
    {
        return $this->_grosor;
    }

    /**
     * Cambia el grosor.
     *
     * @param int $nuevoGrosor Nuevo grosor
     * @return bool Devuelve true si las condiciones son válidas
     */
    public function setGrosor(int $nuevoGrosor): bool
    {
        if (array_key_exists($nuevoGrosor, self::GROSORES)) {
            $this->_grosor = $nuevoGrosor;
            $resultado = true;
        } else {
            $resultado = false;
        }
        return $resultado;
    }

    // =========================================
    // No se pueden crear propiedades dinámicas.
    // =========================================

    /**
     * Se ejecuta al escribir en una propiedad inaccesible o inexistente.
     * Lanza una excepción para evitar la sobrecarga de propiedades.
     *
     * @param string $name  Nombre de la propiedad.
     * @param mixed  $value Valor que se intentaba asignar.
     * @throws \Exception Siempre.
     * @return void No devuelve nada
     */
    public function __set(string $name, mixed $value): void
    {
        throw new \Exception("La propiedad $name no existe");
    }

    /**
     * Se ejecuta al leer una propiedad inaccesible o inexistente.
     * Lanza una excepción para evitar la sobrecarga de propiedades.
     *
     * @param string $name Nombre de la propiedad.
     * @return mixed
     * @throws \Exception Siempre.
     * @return mixed No devuelve nada
     */
    public function __get(string $name): mixed
    {
        throw new \Exception("La propiedad $name no existe");
    }

    /**
     * Se ejecuta al usar isset() o empty() sobre una propiedad inaccesible.
     * Siempre devuelve false porque no hay propiedades dinámicas.
     *
     * @param string $name Nombre de la propiedad.
     * @return bool Siempre devolverá falso
     */
    public function __isset(string $name): bool
    {
        // Ninguna propiedad inaccesible "existe"
        return false;
    }

    /**
     * Se ejecuta al usar unset() sobre una propiedad inaccesible.
     * No hace nada.
     *
     * @param string $name Nombre de la propiedad.
     * @return void No devuelve nada
     */
    public function __unset(string $name): void
    {;
        // throw new \Exception('Not implemented');
    }
}
