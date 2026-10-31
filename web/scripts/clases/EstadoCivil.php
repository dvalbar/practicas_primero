<?php

/**
 * Enumerado EstadoCivil con valor entero asociado a cada caso.
 * Casos: Soltero (10), Casado (20), Pareja (30) y Viudo (40).
 */
enum EstadoCivil: int
{
    case Soltero = 10;
    case Casado = 20;
    case Pareja = 30;
    case Viudo = 40;

    // - Método descripcion que devuelve el nombre del caso concreto.
    /**
     * Devuelve el nombre del caso concreto (por ejemplo "Soltero").
     *
     * @return string
     */
    function descripcion(): string
    {
        // Devuelve el nombre del caso
        return $this->name;
    }

    // - Método valor que devuelve el valor del caso concreto.
    /**
     * Devuelve el valor numérico del caso concreto (por ejemplo 10).
     *
     * @return int
     */
    function valor(): int
    {
        // Devuelve el valor del caso
        return $this->value;
    }

    // - Método estático casos que devuelve un array con todos los casos.
    /**
     * Devuelve un array con todos los casos del enumerado.
     *
     * @return array
     */
    static function casos(): array
    {
        // Devuelve todos los casos del enumerado
        return self::cases();
    }
}
