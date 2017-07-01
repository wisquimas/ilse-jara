<?php

namespace IlseJara;

class Redes
{
    public $logo = '';
    public $link = '';


    public function __construct($logo, $link)
    {
        $this->logo = $logo;
        $this->link = $link;
    }
}