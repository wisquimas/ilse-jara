<?php

namespace IlseJara;

class HomeOptions extends GafaObject
{
    const PostType = 'homeoptions';

    public $sliders = array();

    /**
     * Seteamos las opciones
     *
     * array(
     * 'propiedad'      => 'settings_logo', //Propiedad interna
     * 'meta_slug'      => 'settings_logo', //meta slug referencia de la db
     * 'customFunction' => static::FuncionImagen(), //Funcion callback
     * ),
     *
     * @return array
     */
    static public
    function GetOptions()
    {
        return array(
            array(
                'propiedad'      => 'sliders', //Propiedad interna
                'customFunction' => static::FuncionDeGrupo('slider'), //Funcion callback
            ),
        );
    }
}