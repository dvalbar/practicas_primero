<?php
// 2.- Se tiene la interfaz IFabricable que permite indicar el proceso de fabricación y como se recicla.
// Esta interfaz establece los métodos:

/**
 * Interfaz para los elementos que se pueden fabricar y reciclar.
 * Obliga a indicar cómo se fabrica el elemento y cómo se recicla.
 */
interface IFabricable
{
    // - metodoFabricacion: Devuelve los pasos para fabricar el elemento

    /**
     * Devuelve los pasos para fabricar el elemento.
     *
     * @return string Devuelve los pasos para fabricar el elemento.
     */
    public function metodoFabricacion(): string;

    // - metodoReciclado: Devuelve el método de reciclado que se debe aplicar al elemento según
    // su fabricación.

    /**
     * Devuelve el método de reciclado que se debe aplicar al elemento
     * según cómo se ha fabricado.
     *
     * @return string Devuelve el método de reciclado
     */
    public function metodoReciclado(): string;
}
