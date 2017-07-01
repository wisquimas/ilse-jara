<?php

namespace IlseJara;

class GaleriaColeccion
{
    public $foto = '';
    public $texto = '';

    public function __construct($foto, $texto)
    {
        $this->foto = $foto;
        $this->texto = $texto;
    }
}