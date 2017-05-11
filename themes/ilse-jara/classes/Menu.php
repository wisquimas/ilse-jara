<?php

namespace IlseJara;

use Gafa\GafaTemplate;

abstract class Menu
{
    /**
     * Imprime el menu de la web
     *
     * @return string
     */
    static public function ImprimirMenuHome()
    {
        return GafaTemplate::Imprimir('menu/body', array(
            'menu' => wp_nav_menu(array(
                'echo' => false,
                'menu' => 'navegador-principal',
            )),
        ));
    }
}