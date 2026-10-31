<?php

/**
 * Persona: guarda nombre, fecha de nacimiento, domicilio, localidad
 * y estado civil. El constructor es privado y se crea con registrarPersona().
 */
class Persona
{
    // propiedades nombre (string), fecha_nacimiento (string), domicilio (string), localidad (string)
    // y estado (EstadoCivil). Todas las propiedades son privadas.

    /**
     * Nombre de la persona.
     */
    private string $_nombre;

    /**
     * Fecha de nacimiento de la persona.
     */
    private string $_fecha_nacimiento;

    /**
     * Domicilio de la persona.
     */
    private string $_domicilio;

    /**
     * Localidad donde vive la persona.
     */
    private string $_localidad;

    /**
     * Estado civil de la persona (enumerado EstadoCivil).
     */
    private EstadoCivil $_estadoCivil;

    // - Constructor privado al que no se indica ningún parámetro y que rellena las propiedades con
    // valores nombre “prueba”, fecha_nacimiento “01/01/2000”, domicilio “carrera 12”, localidad
    // “antequera” y estado “soltero”.
    /**
     * Constructor privado: rellena las propiedades con valores por defecto.
     */
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
    /**
     * Devuelve el nombre de la persona.
     *
     * @return string
     */
    public function getNombre(): string
    {
        // Devuelve el nombre
        return $this->_nombre;
    }

    /**
     * Cambia el nombre de la persona.
     *
     * @param string $nuevoNombre Nuevo nombre.
     */
    public function setNombre(string $nuevoNombre): void
    {
        $this->_nombre = $nuevoNombre;
    }

    // Fecha nacimiento
    /**
     * Devuelve la fecha de nacimiento.
     *
     * @return string
     */
    public function getFechaNacimiento(): string
    {
        // Devuelve la fecha de nacimiento
        return $this->_fecha_nacimiento;
    }

    /**
     * Cambia la fecha de nacimiento.
     *
     * @param string $nuevaFechaNacimiento Nueva fecha de nacimiento.
     */
    public function setFechaNacimiento(string $nuevaFechaNacimiento): void
    {
        $this->_fecha_nacimiento = $nuevaFechaNacimiento;
    }

    // Domicilio
    /**
     * Devuelve el domicilio.
     *
     * @return string
     */
    public function getDomicilio(): string
    {
        // Devuelve el domicilio
        return $this->_domicilio;
    }

    /**
     * Cambia el domicilio.
     *
     * @param string $nuevoDomicilio Nuevo domicilio.
     */
    public function setDomicilio(string $nuevoDomicilio): void
    {
        $this->_domicilio = $nuevoDomicilio;
    }

    // Localidad
    /**
     * Devuelve la localidad.
     *
     * @return string
     */
    public function getLocalidad(): string
    {
        // Devuelve la localidad
        return $this->_localidad;
    }

    /**
     * Cambia la localidad.
     *
     * @param string $nuevaLocalidad Nueva localidad.
     */
    public function setLocalidad(string $nuevaLocalidad): void
    {
        $this->_localidad = $nuevaLocalidad;
    }

    // Estado Civil
    /**
     * Devuelve el estado civil.
     *
     * @return EstadoCivil
     */
    public function getEstadoCivil(): EstadoCivil
    {
        // Devuelve el estado civil
        return $this->_estadoCivil;
    }

    /**
     * Cambia el estado civil.
     *
     * @param EstadoCivil $nuevoEstadoCivil Nuevo estado civil.
     */
    public function setEstadoCivil(EstadoCivil $nuevoEstadoCivil): void
    {
        $this->_estadoCivil = $nuevoEstadoCivil;
    }

    // - Constructor estático registrarPersona, que recibe parámetros para todas las propiedades
    /**
     * Constructor estático: crea una persona con los valores indicados
     * para todas las propiedades.
     *
     * @param string      $nombre           Nombre.
     * @param string      $fecha_nacimiento Fecha de nacimiento.
     * @param string      $domicilio        Domicilio.
     * @param string      $localidad        Localidad.
     * @param EstadoCivil $estadoCivil      Estado civil.
     * @return static Nueva instancia de Persona.
     */
    public static function registrarPersona(string $nombre, string $fecha_nacimiento, string $domicilio, string $localidad, EstadoCivil $estadoCivil): static
    {
        $obj = new static();
        $obj->setNombre($nombre);
        $obj->setFechaNacimiento($fecha_nacimiento);
        $obj->setDomicilio($domicilio);
        $obj->setLocalidad($localidad);
        $obj->setEstadoCivil($estadoCivil);
        // Devuelve la persona ya rellenada
        return $obj;
    }

    // - Método toString que devuelve la cadena “Nombre es una persona estado nacida en
    // fecha_nacimiento y que vive en localidad”
    /**
     * Devuelve la persona como texto: nombre, estado civil, fecha de
     * nacimiento y localidad.
     *
     * @return string
     */
    public function __toString()
    {
        // Devuelve la frase con los datos de la persona
        return $this->getNombre() . " es una persona " . $this->getEstadoCivil()->descripcion() . " nacida en " . $this->getFechaNacimiento() . " y que vive en " . $this->getLocalidad();
    }
}
