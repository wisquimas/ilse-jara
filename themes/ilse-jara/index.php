<?php
$opciones = \IlseJara\HomeOptions::InstanceCachedLast();

/*
 * Logica Sliders
 */
$htmlSliders = function () use ($opciones) {
    $respuesta = '';

    if (count($opciones->sliders)) {
        $variables = '';
        $elementos = '';
        $acciones = '';

        foreach ($opciones->sliders as $slider) {
            $uid = uniqid();

            $variables .= \Gafa\GafaTemplate::Imprimir('slider_youtube/variable', array(
                'uid' => $uid,
            ));
            $elementos .= \Gafa\GafaTemplate::Imprimir('slider_youtube/elemento', array(
                'uid'  => $uid,
                'link' => isset($slider['slider_coleccion']) ? \IlseJara\Coleccion::InstanceCached($slider['slider_coleccion'])->link : '',
            ));
            $acciones .= \Gafa\GafaTemplate::Imprimir('slider_youtube/accion', array(
                'id'   => isset($slider['slider_id_video_de_youtube']) ? $slider['slider_id_video_de_youtube'] : '',
                'uid'  => $uid,
                'link' => isset($slider['slider_coleccion']) ? \IlseJara\Coleccion::InstanceCached($slider['slider_coleccion'])->link : '',
            ));
        }

        $respuesta = \Gafa\GafaTemplate::Imprimir('slider_youtube/body', array(
            'variables' => $variables,
            'elementos' => $elementos,
            'acciones'  => $acciones,
        ));
    }

    return $respuesta;
};
/*
 * Logica Colecciones
 */
$htmlColecciones = function () {
    $html = '';
    $colecciones = \IlseJara\Coleccion::Get(null, true);

    if ($colecciones) {
        foreach ($colecciones as $coleccion) {
            $html .= \Gafa\GafaTemplate::Imprimir('coleccion/loopHome', array(
                'coleccion' => $coleccion,
            ));
        }
    }

    return $html;
};
/*
 * Logica FashionLab
 */
$htmlFashionLab = function () {
    $html = '';
    $fashionLabs = \IlseJara\FashionLab::Get(array(
        'posts_per_page' => 3,
    ), true);

    if (count($fashionLabs)) {
        foreach ($fashionLabs as $lab) {
            $html .= \Gafa\GafaTemplate::Imprimir('fashion-lab/loop', array(
                'fashion' => $lab,
            ));
        }
    }

    return $html;
};
/*
 * Lógica Universo
 */
$htmlUniverso = function () {
    $html = '';
    $universo = \IlseJara\Universo::Get(null, true);
    if (count($universo)) {
        foreach ($universo as $redSocial) {
            $html .= \Gafa\GafaTemplate::Imprimir('universo/loop', array(
                'universo' => $redSocial,
            ));
        }
    }

    return $html;
};
/*
 * Lógica Testimonio
 */
$htmlTestimonio = function () {
    $html = '';
    $testimonios = \IlseJara\Testimonio::Get(array(
        'posts_per_page' => 3,
    ), true);
    if (count($testimonios)) {
        foreach ($testimonios as $testimonio) {
            $html .= \Gafa\GafaTemplate::Imprimir('testimonio/loop', array(
                'testimonio' => $testimonio,
            ));
        }
    }

    return $html;
};
/*
 * Lógica Contacto
 */
$htmlContacto = function () {
    return \Gafa\GafaTemplate::Imprimir('contacto/form');
};
/*****************************************************
 * Impresion
 ****************************************************/
get_header();

echo \Gafa\GafaTemplate::Imprimir('home/body', array(
    'opciones'        => $opciones,
    'menuHome'        => \IlseJara\Menu::ImprimirMenuHome(),
    'htmlSliders'     => $htmlSliders(),
    'htmlColecciones' => $htmlColecciones(),
    'htmlFashionLab'  => $htmlFashionLab(),
    'htmlUniverso'    => $htmlUniverso(),
    'htmlTestimonio'  => $htmlTestimonio(),
    'htmlContacto'    => $htmlContacto(),
    'htmlFooter'      => \IlseJara\Footer::Imprimir(),
));

get_footer();