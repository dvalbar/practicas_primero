<?php

// 4.- Definir la clase Flauta que es un instrumento de viento que es fabricable y de la que no se puede
// heredar ninguna otra subclase.

class Flauta extends InstrumentoViento implements IFabricable
{
    // - El constructor se hará privado
    private function __construct()
    {
        throw new \Exception('Not implemented');
    }

    // Métodos de la interfaz IFabricable
    public function metodoFabricacion(): string
    {
        return "Moldeado por inyección de resina plástica de alta precisión y afinación por ultrasonido.";
    }

    public function metodoReciclado(): string
    {
        return "Triturado del material plástico para su posterior fundición y reutilización en nuevos productos plásticos.";
    }

    // - Se tiene el método estático CrearDesdeArray (constructor estatico) con parámetro un Array
    // con posiciones asociativas “material” y “edad” (pueden no aparecer por lo que se tienen en
    // cuenta valores por defecto) y que devuelve una instancia de Flauta con los valores
    // indicados.


    // - Definir el método de clonación para la clase flauta de forma que el nuevo objeto tenga los
    // mismos valores, salvo la edad que será 0 y el número de instancia (propiedad) /número de
    // instancias (propiedad de clase), ya que realmente he creado una nueva instancia.
}