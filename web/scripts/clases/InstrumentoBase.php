<!-- 1.- Crear la clase abstracta IntrumentoBase con el siguiente comportamiento. Definirla inicialmente
como no abstracta para probar su funcionamiento. Una vez probado se pasará a abstracta: -->
<?php
class InstrumentoBase
{
    // - Tiene el atributo descripción de tipo cadena. La descripción se puede fijar mediante el
    // constructor o mediante métodos get/set públicos (ej para propiedad cadena, métodos
    // getCadena/setCadena, no confundir con lo que veremos después como método mágico __get
    // y __set). Directamente no puede ser accesible.
    private string $_descripcion;

    // - Tiene el atributo edad que no es accesible desde el exterior aunque si desde las clases
    // descendientes. Su valor por defecto será 10. Se tiene método get para devolver su valor. Se
    // asignará en el constructor.
    // Para definir los atributos con valor por defecto se declaran en la clase, con el valor por
    // defecto, se define un parámetro en el constructor con el valor por defecto y se asigna en el
    // constructor. Así garantizas que cuando se llame al constructor, si no se indica ningún valor,
    // se asigne el de por defecto.
    private int $_edad = 10; // Aquí he hecho pruebas al ponerlo public

    // - Se tiene una variable de clase protegida que controla cuantos elementos se han creado y una
    // propiedad de instancia para indicar cuál es el orden de creación de la instancia. Cada vez
    // que se crea un instrumento se le asigna a la instancia el número de orden de creación del
    // instrumento actual y se incrementa el valor de la variable de clase.
    protected static int $_elementosCreados = 0;

    private int $_ordenCreacion;

    // Constructor
    public function __construct(string $_descripcion, int $_edad = 10)
    {
        $this->_descripcion = $_descripcion;
        $this->_edad = $_edad;
        self::$_elementosCreados++;
        $this->_ordenCreacion = self::$_elementosCreados;

    }

    /**
     * Getter's y Setter's
     */
    public function getDescripcion(): string
    {
        return $this->_descripcion;
    }

    public function setDescripcion(string $nuevaDescripcion): void
    {
        $this->_descripcion = $nuevaDescripcion;
    }

    public function getEdad(): int
    {
        return $this->_edad;
    }

    public function setEdad(int $nuevaEdad): void
    {
        $this->_edad = $nuevaEdad;
    }

    // - Se definen dos métodos abstractos: sonido (devuelve una frase que representa el sonido) y
    // afinar (devuelve una cadena con los pasos necesarios para afinar el instrumento)
    // public abstract function sonido(): string;
    // public abstract function afinar(): string;

    // - Se define el método envejecer, que aumenta la edad del instrumento en un año.
    public function envejecer(int $edadInstrumento): void
    {
        $this->_edad += 1;
    }

    // - Cuando se muestre en un echo aparecerá “instrumento con descripción XXXXX, instancia
    // 9999 de un total de 999. Tiene 999 años. La clase es XXXX”. La clase debe ser obtenida
    // mediante get_class. (999 representa un numero, XXX representa una cadena)
    public function __toString(): string
    {
        return "Instrumento con descripción {$this->_descripcion}, instancia 9999 de un total de 999. Tiene {$this->_edad} años. La clase es ".get_class($this);
    }

    // - No tiene la sobrecarga de propiedades por defecto. 

    // - public function __set(string $nombre, mixed $valor):void Se ejecuta al escribir datos
    // sobre propiedades inaccesibles. Es llamado de forma automática cuando se actualiza el
    // valor de una propiedad que no es visible.
    // Métodos mágicos para control de la sobrecarga
    public function __set(string $name, mixed $value): void
    {
        throw new \Exception("La propiedad $name no existe");
    }

    // - Public function __get(string$nombre):mixed Se utiliza para consultar datos a partir de
    // propiedades inaccesibles. Se llama de forma automática cuando se lee el valor de una
    // propiedad que no es visible.
    public function __get(string $name): mixed
    {
        throw new \Exception("La propiedad $name no existe");
    }

    // - Public function __isset(string $nombre):bool Se lanza al llamar a isset() o a empty()
    // sobre propiedades inaccesibles.
    public function __isset(string $name): bool
    {
        return false;
    }

    // - public function __unset(string $nombre):void Se invoca cuando se usa unset() sobre
    // propiedades inaccesibles.
    public function __unset(string $name): void
    {
        ;
        // throw new \Exception('Not implemented');
    }
}