<?php

/**
 * Serie de Fibonacci iterable: se puede recorrer con foreach hasta
 * un límite de posiciones. También incluye una versión con generador.
 */
class SerieFibonacci implements Iterator
{
    /**
     * Última posición de la serie que se recorre.
     */
    private int $_limite;

    /**
     * Posición actual (clave que devuelve el foreach).
     */
    private int $_claveActual;

    /**
     * Variables auxiliares para calcular el siguiente valor.
     */
    private int $_aux1;
    private int $_aux2;

    /**
     * Valor actual de la serie.
     */
    private int $_fibo;

    /**
     * Constructor: guarda el límite de la serie.
     *
     * @param int $limite Última posición que se recorrerá.
     */
    public function __construct(int $limite)
    {
        $this->_limite = $limite;
    }

    // Pone el puntero al valor inicial
    /**
     * Reinicia la serie: posición 0 y valores iniciales.
     */
    public function rewind(): void
    {
        $this->_claveActual = 0;
        $this->_aux1 = 0;
        $this->_aux2 = 1;
        $this->_fibo = 0;
    }

    // Mueve el puntero a la siguiente posicion
    /**
     * Calcula el siguiente valor de la serie y avanza una posición.
     */
    public function next(): void
    {
        $this->_aux1 = $this->_aux2;
        $this->_aux2 = $this->_fibo;
        $this->_fibo = $this->_aux1 + $this->_aux2;

        $this->_claveActual++;
    }

    // Devuelve el contenido correspondiente a la posición actual
    /**
     * Devuelve el valor de Fibonacci de la posición actual.
     *
     * @return mixed
     */
    public function current(): mixed
    {
        // Devuelve el valor actual de la serie
        return $this->_fibo;
    }

    // Devuelve la clave correspondiente a la posicion actual
    /**
     * Devuelve la posición actual de la serie.
     *
     * @return mixed
     */
    public function key(): mixed
    {
        // Devuelve la posición actual
        return $this->_claveActual;
    }

    // Comprueba si la posición actual es valida
    /**
     * Comprueba si la posición actual no supera el límite.
     *
     * @return bool
     */
    public function valid(): bool
    {
        if ($this->_claveActual <= $this->_limite) {
            // Posición válida: se sigue recorriendo
            return true;
        }
        // Posición fuera del límite: termina el recorrido
        return false;
    }

    // Crear la función fFibonacci($ultimo) como función estática dentro de la clase
    // SerieFibonacci, que debe implementar la serie de Fibonacci usando para ello un generador.
    /**
     * Generador estático de la serie de Fibonacci: va devolviendo (yield)
     * cada valor desde la posición 0 hasta la posición indicada.
     *
     * @param int $ultimo Última posición de la serie que se generará.
     */
    public static function fFibonacci(int $ultimo)
    {
        $_aux1 = 0;
        $_aux2 = 1;
        $_fibo = 0;

        for ($i = 0; $i <= $ultimo; $i++) {
            yield $_fibo;
            $_aux1 = $_aux2;
            $_aux2 = $_fibo;
            $_fibo = $_aux1 + $_aux2;
        }
    }
}
