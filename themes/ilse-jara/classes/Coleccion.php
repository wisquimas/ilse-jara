<?php

namespace IlseJara;

class Coleccion extends GafaObject
{
    const PostType = 'coleccion';

    public $imagenes_home_normal = '';
    public $imagenes_home_hover = '';

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
                'propiedad'      => 'imagenes_home_normal', //Propiedad interna
                'meta_slug'      => 'imagenes_home_normal', //meta slug referencia de la db
                'customFunction' => static::FuncionImagen(), //Funcion callback
            ),
            array(
                'propiedad'      => 'imagenes_home_hover', //Propiedad interna
                'meta_slug'      => 'imagenes_home_hover', //meta slug referencia de la db
                'customFunction' => static::FuncionImagen(), //Funcion callback
            ),
        );
    }
}