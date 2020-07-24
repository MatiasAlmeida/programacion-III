<?php

abstract class Continente {
    protected $nombreContinente;

    public function __construct($nombreContinente)
    {
        $this->SetNombreContinente($nombreContinente); 
    }

    protected function MostrarDatos() {
        return "Nombre del continente: ".$this->nombreContinente.".<br>";
    }

    public function SetNombreContinente($nombreContinente){
        $this->nombreContinente = $nombreContinente;
    }
}