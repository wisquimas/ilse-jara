<?php
global $post;

$coleccion = \IlseJara\Coleccion::InstanceCached($post->ID);

/*
 * Logica de la galeria
 */
$htmlGaleria = function () use ($coleccion) {
    $html = '';
    $galerias = $coleccion->galeria;
    if (count($galerias)) {
        foreach ($galerias as $galeria) {
            $html .= \Gafa\GafaTemplate::Imprimir('coleccion/galeria', array(
                'galeria' => $galeria,
            ));
        }
    }

    return $html;
};

/*****************************************************
 * Impresion
 ****************************************************/
get_header();

echo \Gafa\GafaTemplate::Imprimir('coleccion/body', array(
    'coleccion'   => $coleccion,
    'htmlGaleria' => $htmlGaleria(),
));

get_footer();