<?php 

use NNV\RestCountries;
require_once '.\subregion.php';
require_once '.\IMostrarDatos.php';
require_once __DIR__.'\vendor\autoload.php';

class Pais extends Subregion implements IMostrarDatos{
    private $capital;
    private $idioma;
    public $pais;

    public function __construct($nombreContinente, $subRegion, $capital, $idioma=null)
    {
        $this->pais = null;
        parent::__construct($this->SetNombreContinente($nombreContinente), $this->SetSubRegion($subRegion));
        $this->SetCapital($capital);
        $this->SetIdioma($idioma);
    }

    public function SetNombreContinente($nombreContinente)
    {
        $auxCountries = new RestCountries;
        if(!is_null($nombreContinente)) {
            try{
                $aux = json_encode($auxCountries->byRegion($nombreContinente));
            }catch(Exception $e){
                throw $e;
            }

            $this->nombreContinente = $nombreContinente;
            $this->pais = $auxCountries->byRegion($nombreContinente);
        }
    }

    public function SetSubRegion($subRegion){
        $auxCountries = new RestCountries;
        if(!is_null($subRegion)) {
            try{
                $aux = json_encode($auxCountries->byRegionalBloc($subRegion));
            }catch(Exception $e){
                throw $e;
            }

            $this->subRegion = $subRegion;
            $this->pais = $auxCountries->byRegionalBloc($subRegion);
        }
    }

    public function SetCapital($capital){
        $auxCountries = new RestCountries;
        if(!is_null($capital)) {
            try{
                $aux = json_encode($auxCountries->byCapitalCity($capital));
            }catch(Exception $e){
                throw $e;
            }

            $this->capital = $capital;
            $this->pais = $auxCountries->byCapitalCity($capital);
        }
    }

    public function SetIdioma($idioma){
        $auxCountries = new RestCountries;
        if(!is_null($idioma)) {
            try{
                $aux = json_encode($auxCountries->byLanguage($idioma));
            }catch(Exception $e){
                throw $e;
            }

            $this->idioma = $idioma;
            $this->pais = $auxCountries->byLanguage($idioma);
        }
    }

    public function GetPais(){
        return $this->pais;
    }

    protected function MostrarDatos()
    {
        return parent::MostrarDatos()."Capital: ".$this->capital.".<br>Idioma: ".$this->idioma.".<br>";
    }

    public static function ToString($pais)
    {
        if($pais instanceof Pais && !is_null($pais))
            echo $pais->MostrarDatos();

        echo "<br><br>Datos completos del pais:<br>".json_encode($pais->pais);
    }
}