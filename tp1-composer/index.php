<?php
require_once '.\pais.php';

use NNV\RestCountries;

use function GuzzleHttp\json_decode;

$restCountries = new RestCountries;

try{
    $nuevoPais = new Pais("europe","eu","london","eng");

    if(!is_null($nuevoPais->pais))
        echo Pais::ToString($nuevoPais);
}catch(Exception $e){
    echo "Los parametros cargados no coinciden con ningun pais.<br>";
}
