<?php

namespace IlseJara;

class Universo extends GafaObject
{
    const PostType = 'universo';

    public $imagenes_normal = '';
    public $imagenes_hover = '';
    public $informacion_link = '';

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
                'propiedad'      => 'imagenes_normal', //Propiedad interna
                'meta_slug'      => 'imagenes_normal', //meta slug referencia de la db
                'customFunction' => static::FuncionImagen(), //Funcion callback
            ),
            array(
                'propiedad'      => 'imagenes_hover', //Propiedad interna
                'meta_slug'      => 'imagenes_hover', //meta slug referencia de la db
                'customFunction' => static::FuncionImagen(), //Funcion callback
            ),
            array(
                'propiedad' => 'informacion_link', //Propiedad interna
                'meta_slug' => 'informacion_link', //meta slug referencia de la db
            ),
        );
    }
}