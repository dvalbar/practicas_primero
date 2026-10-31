<?php
// 7.- Crear la clase ClaseMisPropiedades.

/**
 * Clase con propiedades dinámicas (se pueden añadir en tiempo de ejecución)
 * que además es iterable con foreach. Las claves que devuelve el foreach
 * llevan el prefijo "oi_".
 */
class ClaseMisPropiedades implements Iterator
{
    // En esta clase se define una propiedad privada llamada $_propiedades.

    /**
     * Array asociativo donde se guardan las propiedades dinámicas.
     */
    private array $_propiedades = array();

    /**
     * Lista con los nombres de las propiedades en el orden del recorrido
     * (dinámicas primero, luego propPublica y _propPrivada).
     */
    private array $_claves = array();

    /**
     * Posición actual del recorrido del foreach.
     */
    private int $_posicion;

    // Además tenemos las propiedades de instancia
    // $propPublica (publica, mixed) y 
    // $_propPrivada (privada, mixed, inicializada a 25).

    /**
     * Propiedad pública de la clase.
     */
    public mixed $propPublica;

    /**
     * Propiedad privada de la clase (inicializada a 25).
     */
    private mixed $_propPrivada = 25;

    // Se debe permitir añadir en tiempo de ejecución cualquier nueva propiedad
    // (propiedades dinámicas) a una instancia.

    /**
     * Se ejecuta al leer una propiedad inaccesible o inexistente.
     * Devuelve el valor de la propiedad dinámica o lanza una excepción
     * si no existe.
     *
     * @param string $nombre Nombre de la propiedad.
     * @return mixed Devuelve el valor de la propiedad dinámica o lanza una excepción si no existe
     * @throws Exception Si la propiedad no existe.
     */
    public function __get(string $nombre)
    {
        if (!isset($this->_propiedades[$nombre]))
            throw new Exception("La propiedad $nombre no existe.");

        // Devuelve el valor de la propiedad dinámica
        return $this->_propiedades[$nombre];
    }

    /**
     * Se ejecuta al escribir en una propiedad inaccesible o inexistente.
     * Crea o actualiza la propiedad dinámica, salvo que se llame
     * _propPrivada, que lanza una excepción.
     *
     * @param string $nombre Nombre de la propiedad.
     * @param mixed  $valor  Valor a asignar.
     * @throws Exception Si el nombre es _propPrivada.
     */
    public function __set(string $nombre, mixed $valor)
    {
        // Se debe garantizar que no se pueda asignar un valor a una propiedad 
        // que llamemos _propPrivada (creada de forma dinámica).

        if ($nombre === "_propPrivada") {
            throw new Exception('No se puede modificar.');
        }

        // Creo/actualizo la variable dinámica.
        $this->_propiedades[$nombre] = $valor;
    }

    // Se llamará automáticamente al ejecutar isset o empty

    /**
     * Se ejecuta al usar isset() o empty() sobre una propiedad inaccesible.
     *
     * @param string $nombre Nombre de la propiedad.
     * @return bool
     */
    public function __isset(string $nombre): bool
    {
        // Devuelve true si la propiedad dinámica existe
        return (isset($this->_propiedades[$nombre]));
    }


    // Se llamará automáticamente al ejecutar unset

    /**
     * Se ejecuta al usar unset() sobre una propiedad inaccesible.
     * Elimina la propiedad dinámica.
     *
     * @param string $nombre Nombre de la propiedad.
     */
    public function __unset(string $nombre)
    {
        unset($this->_propiedades[$nombre]);
    }

    // ===================
    // Métodos de Iterator
    // ===================

    // Pone el puntero al valor inicial

    /**
     * Reinicia el recorrido: posición 0 y construye la lista de nombres
     * (dinámicas + propPublica + _propPrivada).
     */
    public function rewind(): void
    {
        $this->_posicion = 0;
        $this->_claves = array_keys($this->_propiedades);
        $this->_claves[] = "propPublica";
        $this->_claves[] = "_propPrivada";
    }

    // Mueve el puntero a la siguiente posicion

    /**
     * Avanza el puntero a la siguiente posición.
     */
    public function next(): void
    {
        $this->_posicion++;
    }

    // Devuelve el contenido correspondiente a la posición actual

    /**
     * Devuelve el valor de la propiedad de la posición actual.
     *
     * @return mixed
     */
    public function current(): mixed
    {
        $nombre = $this->_claves[$this->_posicion];

        // Devuelve el valor de propPublica
        if ($nombre === "propPublica") return $this->propPublica;
        // Devuelve el valor de _propPrivada
        if ($nombre === "_propPrivada") return $this->_propPrivada;

        // Devuelve el valor de la propiedad dinámica
        return $this->_propiedades[$nombre];
    }

    // Devuelve la clave correspondiente a la posicion actual

    /**
     * Devuelve la clave de la posición actual: el nombre de la propiedad
     * con el prefijo "oi_".
     *
     * @return mixed Devuelve la clave de la posición actual: el nombre de la propiedad con el prefijo "oi_".
     */
    public function key(): mixed
    {
        // Devuelve el nombre de la propiedad con el prefijo oi_
        return "oi_" . $this->_claves[$this->_posicion];
    }

    // Comprueba si la posición actual es valida

    /**
     * Comprueba si la posición actual existe en la lista de nombres.
     *
     * @return bool Devuelve true si puede seguir recorriendo, false si no puede
     */
    public function valid(): bool
    {
        // Devuelve true mientras queden elementos por recorrer
        return $this->_posicion < count($this->_claves);
    }
}
