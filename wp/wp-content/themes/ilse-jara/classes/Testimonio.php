<?php

namespace IlseJara;

class Testimonio extends GafaObject
{
    const PostType = 'post';

    public $informacion_nombre_en_loop_home = '';

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
                'propiedad' => 'informacion_nombre_en_loop_home', //Propiedad interna
                'meta_slug' => 'informacion_nombre_en_loop_home', //meta slug referencia de la db
            ),
        );
    }
}