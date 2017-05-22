<?php
global $post;

$coleccion = \IlseJara\Coleccion::InstanceCached($post->ID);

/*****************************************************
 * Impresion
 ****************************************************/
get_header();

echo \Gafa\GafaTemplate::Imprimir('coleccion/body', array(
    'coleccion' => $coleccion,
));

get_footer();