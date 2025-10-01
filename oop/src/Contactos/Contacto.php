<?php

namespace Unicah\Oop\Contactos;

class Contacto
{
    private string $nombre;
    private string $correo;
    private string $telefono;
    private string $mensaje;
    private int $timestamp;

    // private 
    // protected 
    // public 
    public function __construct(
        string $pNombre,
        string $pCorreo,
        string $pTelefono,
        string $pMensaje
    ) {
        $this->nombre = $pNombre;
        $this->correo = $pCorreo;
        $this->telefono = $pTelefono;
        $this->mensaje = $pMensaje;
        $this->timestamp = time();
    }

    public function toJson(): string
    {
        $tmpJsonArray = [
            "nombre" => $this->nombre,
            "correo" => $this->correo,
            "telefono" => $this->telefono,
            "mensaje" => $this->mensaje,
            "created" => $this->timestamp
        ];
        return json_encode($tmpJsonArray);
    }
}
