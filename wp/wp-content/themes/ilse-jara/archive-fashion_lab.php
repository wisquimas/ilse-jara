<?php
/**
 * Vista de fashionLab
 * @return string
 */
$htmlFashionLab = function () {
    $html = '';
    $fashionLabs = \IlseJara\FashionLab::Get(array(
        'posts_per_page' => -1,
    ), true);

    if (count($fashionLabs)) {
        foreach ($fashionLabs as $lab) {
            $html .= \Gafa\GafaTemplate::Imprimir('fashion-lab/loop-fashion', array(
                'fashion' => $lab,
            ));
        }
    }

    return $html;
};

/*****************************************************
 * Impresion
 ****************************************************/
get_header();

echo \Gafa\GafaTemplate::Imprimir('fashion-lab/body', array(
    'htmlFashionLab'  => $htmlFashionLab(),
));

echo \IlseJara\Footer::Imprimir();

get_footer();