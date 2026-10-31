<?php

class SerieFibonacci implements Iterator
{
    private int $_limite;
    private int $_claveActual;
    private int $_aux1;
    private int $_aux2;
    private int $_fibo;

    public function __construct(int $limite)
    {
        $this->_limite = $limite;
    }

    // Pone el puntero al valor inicial
    public function rewind(): void
    {
        $this->_claveActual = 0;
        $this->_aux1 = 0;
        $this->_aux2 = 1;
        $this->_fibo = 0;
    }

    // Mueve el puntero a la siguiente posicion
    public function next(): void
    {
        $this->_aux1 = $this->_aux2;
        $this->_aux2 = $this->_fibo;
        $this->_fibo = $this->_aux1 + $this->_aux2;

        $this->_claveActual++;
    }

    // Devuelve el contenido correspondiente a la posición actual
    public function current(): mixed
    {
        return $this->_fibo;
    }

    // Devuelve la clave correspondiente a la posicion actual
    public function key(): mixed
    {
        return $this->_claveActual;
    }

    // Comprueba si la posición actual es valida
    public function valid(): bool
    {
        if ($this->_claveActual <= $this->_limite) {
            return true;
        }
        return false;
    }

    // Crear la función fFibonacci($ultimo) como función estática dentro de la clase
    // SerieFibonacci, que debe implementar la serie de Fibonacci usando para ello un generador.
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
