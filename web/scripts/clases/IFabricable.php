<?php
// 2.- Se tiene la interfaz IFabricable que permite indicar el proceso de fabricación y como se recicla.
// Esta interfaz establece los métodos:

interface IFabricable {
    // - metodoFabricacion: Devuelve los pasos para fabricar el elemento
    public function metodoFabricacion():string;

    // - metodoReciclado: Devuelve el método de reciclado que se debe aplicar al elemento según
    // su fabricación.
    public function metodoReciclado():string;
}