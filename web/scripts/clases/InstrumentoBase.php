<?php
// 1.- Crear la clase abstracta IntrumentoBase con el siguiente comportamiento. Definirla inicialmente
// como no abstracta para probar su funcionamiento. Una vez probado se pasará a abstracta:

/**
 * Clase base abstracta para cualquier instrumento musical.
 *
 * Guarda la descripción y la edad del instrumento, y cuenta cuántos
 * instrumentos se han creado. Las clases hijas deben implementar
 * los métodos sonido() y afinar().
 */
abstract class InstrumentoBase
{
    // - Tiene el atributo descripción de tipo cadena. La descripción se puede fijar mediante el
    // constructor o mediante métodos get/set públicos (ej para propiedad cadena, métodos
    // getCadena/setCadena, no confundir con lo que veremos después como método mágico __get
    // y __set). Directamente no puede ser accesible.

    /**
     * Descripción del instrumento (privada, se accede con get/set).
     */
    private string $_descripcion;

    // - Tiene el atributo edad que no es accesible desde el exterior aunque si desde las clases
    // descendientes. Su valor por defecto será 10. Se tiene método get para devolver su valor. Se
    // asignará en el constructor.
    // Para definir los atributos con valor por defecto se declaran en la clase, con el valor por
    // defecto, se define un parámetro en el constructor con el valor por defecto y se asigna en el
    // constructor. Así garantizas que cuando se llame al constructor, si no se indica ningún valor,
    // se asigne el de por defecto.

    /**
     * Edad del instrumento en años (por defecto 10).
     * Accesible desde las clases hijas.
     */
    protected int $_edad = 10; // Aquí he hecho pruebas al ponerlo public

    // - Se tiene una variable de clase protegida que controla cuantos elementos se han creado y una
    // propiedad de instancia para indicar cuál es el orden de creación de la instancia. Cada vez
    // que se crea un instrumento se le asigna a la instancia el número de orden de creación del
    // instrumento actual y se incrementa el valor de la variable de clase.

    /**
     * Variable de clase: número total de instrumentos creados.
     */
    protected static int $_elementosCreados = 0;

    /**
     * Número de orden de creación de esta instancia.
     */
    protected int $_ordenCreacion;

    // ============
    // Constructor
    // ============

    /**
     * Constructor: asigna la descripción y la edad, e incrementa el
     * contador de instrumentos creados para fijar el orden de esta instancia.
     *
     * @param string $descripcion Descripción del instrumento.
     * @param int    $edad        Edad del instrumento (por defecto 10).
     */
    public function __construct(string $descripcion, int $edad = 10)
    {
        $this->_descripcion = $descripcion;
        $this->_edad = $edad;
        self::$_elementosCreados++;
        $this->_ordenCreacion = self::$_elementosCreados;
    }

    /**
     * Getter's y Setter's
     */

    /**
     * Devuelve la descripción del instrumento.
     *
     * @return string Devuelve la descripción
     */
    public function getDescripcion(): string
    {
        // Devuelve la descripción guardada
        return $this->_descripcion;
    }

    /**
     * Cambia la descripción del instrumento.
     *
     * @param string $nuevaDescripcion Nueva descripción.
     * @return void No devuelve nada
     */
    public function setDescripcion(string $nuevaDescripcion): void
    {
        $this->_descripcion = $nuevaDescripcion;
    }

    /**
     * Devuelve la edad del instrumento.
     *
     * @return int Devuelve la edad
     */
    public function getEdad(): int
    {
        // Devuelve la edad en años
        return $this->_edad;
    }

    /**
     * Cambia la edad del instrumento.
     *
     * @param int $nuevaEdad Nueva edad en años.
     * @param void No devuelve nada
     */
    public function setEdad(int $nuevaEdad): void
    {
        $this->_edad = $nuevaEdad;
    }

    // - Se definen dos métodos abstractos: sonido (devuelve una frase que representa el sonido) y
    // afinar (devuelve una cadena con los pasos necesarios para afinar el instrumento)

    /**
     * Método abstracto: devuelve una frase que representa el sonido
     * del instrumento. Lo implementan las clases hijas.
     *
     * @return string Devuelve el sonido del instrumento
     */
    abstract public function sonido(): string;

    /**
     * Método abstracto: devuelve una cadena con los pasos necesarios
     * para afinar el instrumento. Lo implementan las clases hijas.
     *
     * @return string Devuelve los pasos para afinar el insrumento
     */
    abstract public function afinar(): string;

    // - Se define el método envejecer, que aumenta la edad del instrumento en un año.

    /**
     * Aumenta en un año la edad del instrumento.
     *
     * @param int $edadInstrumento Parámetro recibido (no se utiliza).
     * @return void No devuelve nada
     */
    public function envejecer(int $edadInstrumento): void
    {
        $this->_edad += 1;
    }

    // - Cuando se muestre en un echo aparecerá “instrumento con descripción XXXXX, instancia
    // 9999 de un total de 999. Tiene 999 años. La clase es XXXX”. La clase debe ser obtenida
    // mediante get_class. (999 representa un numero, XXX representa una cadena)

    /**
     * Devuelve el instrumento como texto: descripción, número de instancia,
     * total de instrumentos creados, edad y nombre de la clase (get_class).
     *
     * @return string Devuelve la información del instrumento
     */
    public function __toString(): string
    {
        // Devuelve la frase con todos los datos del instrumento
        return "Instrumento con descripción " . $this->getDescripcion() . ", 
        instancia " . $this->_ordenCreacion . " de un total de " . self::$_elementosCreados . ". 
        Tiene {$this->_edad} años. La clase es " . get_class($this);
    }

    // - No tiene la sobrecarga de propiedades por defecto. 

    // - public function __set(string $nombre, mixed $valor):void Se ejecuta al escribir datos
    // sobre propiedades inaccesibles. Es llamado de forma automática cuando se actualiza el
    // valor de una propiedad que no es visible.
    // Métodos mágicos para control de la sobrecarga

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

    // - Public function __get(string$nombre):mixed Se utiliza para consultar datos a partir de
    // propiedades inaccesibles. Se llama de forma automática cuando se lee el valor de una
    // propiedad que no es visible.
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

    // - Public function __isset(string $nombre):bool Se lanza al llamar a isset() o a empty()
    // sobre propiedades inaccesibles.

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

    // - public function __unset(string $nombre):void Se invoca cuando se usa unset() sobre
    // propiedades inaccesibles.

    /**
     * Se ejecuta al usar unset() sobre una propiedad inaccesible.
     * No hace nada.
     *
     * @param string $name Nombre de la propiedad.
     * @return void No devuelve nada
     */
    public function __unset(string $name): void
    {
        ;
        // throw new \Exception('Not implemented');
    }
}
