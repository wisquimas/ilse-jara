<?php

namespace IlseJara;

class HomeOptions extends GafaObject
{
    const PostType = 'homeoptions';

    public $sliders = array();
    public $contacto_email = '';
    public $redes = array();
    //Redes
    public $idiomas_nombre_actual = '';
    public $idiomas_nombre_otra = '';
    public $idiomas_link_otra = '';

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
                'propiedad' => 'sliders', //Propiedad interna
                'customFunction' => static::FuncionDeGrupo('slider'), //Funcion callback
            ),
            array(
                'propiedad' => 'contacto_email', //Propiedad interna
                'meta_slug' => 'contacto_email', //meta slug referencia de la db
            ),
            array(
                'propiedad' => 'redes', //Propiedad interna
                'customFunction' => static::FuncionDeGrupo('redes'), //Funcion callback
            ),
            array(
                'propiedad' => 'idiomas_nombre_actual', //Propiedad interna
                'meta_slug' => 'idiomas_nombre_actual', //meta slug referencia de la db
            ),
            array(
                'propiedad' => 'idiomas_nombre_otra', //Propiedad interna
                'meta_slug' => 'idiomas_nombre_otra', //meta slug referencia de la db
            ),
            array(
                'propiedad' => 'idiomas_link_otra', //Propiedad interna
                'meta_slug' => 'idiomas_link_otra', //meta slug referencia de la db
            ),
        );
    }
}