<?php

// 7.- Crear la clase ClaseMisPropiedades.

class ClaseMisPropiedades implements Iterator
{
    // En esta clase se define una propiedad privada llamada $_propiedades.
    // Se debe permitir añadir en tiempo de ejecución cualquier nueva propiedad
    // (propiedades dinámicas) a una instancia.
    private array $_propiedades = array();

    // Además tenemos las propiedades de instancia
    // $propPublica (publica, mixed) y $_propPrivada (privada, mixed, inicializada a 25).
    public mixed $_propPublica;
    private mixed $_propPrivada = 25;

    public function __get(string $nombre)
    {
        if (isset($this->_datos[$nombre]))
            return $this->_datos[$nombre];
        else
            // Si no existe lanza una excepción
            throw new Exception('No existe la propiedad.');
    }
    // Se llamará de forma automática cuando se escriba
    // una propiedad y no sea visible

    public function __set(string $nombre, mixed $valor)
    {
        // Se debe garantizar que no se pueda asignar un valor a una propiedad 
        // que llamemos _propPrivada (creada de forma dinámica).

        if ($nombre === "_propiedadPrivada")
            throw new Exception('No se puede modificar.');
        // Creo/actualizo la variable dinámica.
        $this->_datos[$nombre] = $valor;
    }


    //se llamará automáticamente al ejecutar isset o empty
    public function __isset(string $nombre): bool
    {
        return (isset($this->_datos[$nombre]));
    }


    // Se llamará automáticamente al ejecutar unset
    public function __unset(string $nombre)
    {
        unset($this->_datos[$nombre]);
    }


    // ===================
    // Métodos de Iterator
    // ===================

    // Pone el puntero al valor inicial
    public function rewind(): void {}

    // Mueve el puntero a la siguiente posicion
    public function next(): void {}

    // Devuelve el contenido correspondiente a la posición actual
    public function current(): mixed {}

    // Devuelve la clave correspondiente a la posicion actual
    public function key(): mixed {}

    // Comprueba si la posición actual es valida
    public function valid(): bool {}
}
