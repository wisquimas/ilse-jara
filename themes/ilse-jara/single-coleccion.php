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
        foreach ($galerias as $indice => $galeria) {
            $html .= \Gafa\GafaTemplate::Imprimir('coleccion/galeria', array(
                'galeria' => $galeria,
                'indice'  => $indice,
            ));
        }
    }

    return $html;
};

$htmlFancys = function () use ($coleccion) {
    $html = '';
    $galerias = $coleccion->galeria;
    if (count($galerias)) {
        foreach ($galerias as $indice => $galeria) {
            $html .= \Gafa\GafaTemplate::Imprimir('coleccion/fancy', array(
                'galeria' => $galeria,
                'indice'  => $indice,
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
    'htmlFancys'  => $htmlFancys(),
));

echo \IlseJara\Footer::Imprimir();

get_footer();