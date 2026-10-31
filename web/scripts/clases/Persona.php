<?php

class Persona
{
    // propiedades nombre (string), fecha_nacimiento (string), domicilio (string), localidad (string)
    // y estado (EstadoCivil). Todas las propiedades son privadas.

    private string $_nombre;
    private string $_fecha_nacimiento;
    private string $_domicilio;
    private string $_localidad;
    private EstadoCivil $_estadoCivil;

    // - Constructor privado al que no se indica ningún parámetro y que rellena las propiedades con
    // valores nombre “prueba”, fecha_nacimiento “01/01/2000”, domicilio “carrera 12”, localidad
    // “antequera” y estado “soltero”.
    private function __construct()
    {
        $this->_nombre = "prueba";
        $this->_fecha_nacimiento = "01/01/2000";
        $this->_domicilio = "carrera 12";
        $this->_localidad = "antequera";
        $this->_estadoCivil = EstadoCivil::Soltero;
    }

    // - Un conjunto de sentencias get/set para devolver/poner su valor.

    // Nombre
    public function getNombre(): string
    {
        return $this->_nombre;
    }

    public function setNombre(string $nuevoNombre): void
    {
        $this->_nombre = $nuevoNombre;
    }

    // Fecha nacimiento
    public function getFechaNacimiento(): string
    {
        return $this->_fecha_nacimiento;
    }

    public function setFechaNacimiento(string $nuevaFechaNacimiento): void
    {
        $this->_fecha_nacimiento = $nuevaFechaNacimiento;
    }

    // Domicilio
    public function getDomicilio(): string
    {
        return $this->_domicilio;
    }

    public function setDomicilio(string $nuevoDomicilio): void
    {
        $this->_domicilio = $nuevoDomicilio;
    }

    // Localidad
    public function getLocalidad(): string
    {
        return $this->_localidad;
    }

    public function setLocalidad(string $nuevaLocalidad): void
    {
        $this->_localidad = $nuevaLocalidad;
    }

    // Estado Civil
    public function getEstadoCivil(): EstadoCivil
    {
        return $this->_estadoCivil;
    }

    public function setEstadoCivil(EstadoCivil $nuevoEstadoCivil): void
    {
        $this->_estadoCivil = $nuevoEstadoCivil;
    }

    // - Constructor estático registrarPersona, que recibe parámetros para todas las propiedades
    public static function registrarPersona(string $nombre,string $fecha_nacimiento,string $domicilio,string $localidad,EstadoCivil $estadoCivil): static
    {
        $obj = new static();
        $obj->setNombre($nombre);
        $obj->setFechaNacimiento($fecha_nacimiento);
        $obj->setDomicilio($domicilio);
        $obj->setLocalidad($localidad);
        $obj->setEstadoCivil($estadoCivil);
        return $obj;
    }

    // - Método toString que devuelve la cadena “Nombre es una persona estado nacida en
    // fecha_nacimiento y que vive en localidad”
    public function __toString()
    {
        return $this->getNombre() . " es una persona " . $this->getEstadoCivil()->descripcion() . " nacida en " . $this->getFechaNacimiento() . " y que vive en " . $this->getLocalidad();
    }
}
