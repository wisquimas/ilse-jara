<?php

namespace IlseJara;

class GaleriaColeccion
{
    public $foto = '';
    public $texto = '';
    public $pie = '';

    public function __construct($foto, $texto, $pie)
    {
        $this->foto = $foto;
        $this->texto = $texto;
        $this->pie = $pie;
    }
}