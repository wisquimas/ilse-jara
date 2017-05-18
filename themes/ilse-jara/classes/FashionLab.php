<?php

namespace IlseJara;

class FashionLab extends GafaObject
{
    const PostType = 'fashion_lab';

    public $imagenes_imagen1 = '';
    public $imagenes_imagen2 = '';
    public $imagenes_imagen3 = '';
    public $imagenes_imagen4 = '';

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
                'propiedad'      => 'imagenes_imagen1', //Propiedad interna
                'meta_slug'      => 'imagenes_imagen1', //meta slug referencia de la db
                'customFunction' => static::FuncionImagen(), //Funcion callback
            ),
            array(
                'propiedad'      => 'imagenes_imagen2', //Propiedad interna
                'meta_slug'      => 'imagenes_imagen2', //meta slug referencia de la db
                'customFunction' => static::FuncionImagen(), //Funcion callback
            ),
            array(
                'propiedad'      => 'imagenes_imagen3', //Propiedad interna
                'meta_slug'      => 'imagenes_imagen3', //meta slug referencia de la db
                'customFunction' => static::FuncionImagen(), //Funcion callback
            ),
            array(
                'propiedad'      => 'imagenes_imagen4', //Propiedad interna
                'meta_slug'      => 'imagenes_imagen4', //meta slug referencia de la db
                'customFunction' => static::FuncionImagen(), //Funcion callback
            ),
        );
    }
}