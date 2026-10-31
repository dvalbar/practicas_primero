<?php

enum EstadoCivil: int
{
    case Soltero = 10;
    case Casado = 20;
    case Pareja = 30;
    case Viudo = 40;

    // - Método descripcion que devuelve el nombre del caso concreto.
    function descripcion(): string
    {
        return $this->name;
    }

    // - Método valor que devuelve el valor del caso concreto.
    function valor(): int
    {
        return $this->value;
    }

    // - Método estático casos que devuelve un array con todos los casos.
    static function casos(): array
    {
        return self::cases();
    }
}
