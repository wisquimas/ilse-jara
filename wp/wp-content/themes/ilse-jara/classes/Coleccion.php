<?php

namespace IlseJara;

class Coleccion extends GafaObject
{
    const PostType = 'coleccion';

    public $imagenes_home_normal = '';
    public $imagenes_home_hover = '';
    public $informacion_imagen_principal = '';
    /**
     * @var GaleriaColeccion[]
     */
    public $galeria = array();
    public $contenido = array();
    public $fecha = '';

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
            array(
                'propiedad'      => 'informacion_imagen_principal', //Propiedad interna
                'meta_slug'      => 'informacion_imagen_principal', //meta slug referencia de la db
                'customFunction' => static::FuncionImagen(), //Funcion callback
            ),
            array(
                'propiedad'      => 'galeria', //Propiedad interna
                'customFunction' => function ($clase, $propiedad) {
                    $respuesta = array();
                    $groupMf = get_group('galeria', $clase->ID);
                    static::LimpiarGrupo($groupMf);
                    if (count($groupMf)) {
                        foreach ($groupMf as $grupo) {
                            $imagen = isset($grupo['galeria_imagen']['original']) ? $grupo['galeria_imagen']['original'] : '';
                            $texto = isset($grupo['galeria_texto']) ? $grupo['galeria_texto'] : '';
                            $pie = isset($grupo['galeria_pie_de_foto']) ? $grupo['galeria_pie_de_foto'] : '';
                            if (!empty($imagen)) {
                                $respuesta[] = new GaleriaColeccion($imagen, $texto, $pie);
                            }
                        }
                    }

                    return $respuesta;
                }, //Funcion callback
            ),
            array(
                'propiedad'      => 'contenido', //Propiedad interna
                'customFunction' => static::FuncionContenido(), //Funcion callback
            ),
            array(
                'propiedad'      => 'fecha', //Propiedad interna
                'customFunction' => function ($class, $property) {
                    return get_the_date('d/m/Y', $class->ID);
                }, //Funcion callback
            ),
        );
    }
}