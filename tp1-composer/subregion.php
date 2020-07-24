<?php

require_once '.\continente.php';

class Subregion extends Continente {
    protected $subRegion;

    public function __construct($nombreContinente, $subRegion)
    {
        parent::__construct($nombreContinente);
        $this->SetSubRegion($subRegion);
    }

    protected function MostrarDatos()
    {
       return parent::MostrarDatos()."Sub-Region: ".$this->subRegion.".<br>";
    }

    public function SetSubRegion($subRegion){
        $this->subRegion = $subRegion;
    }
}