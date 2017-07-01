<?php

namespace IlseJara;

use Gafa\GafaTemplate;

abstract class Menu
{
    /**
     * Imprime el menu del home
     *
     * @return string
     */
    static public function ImprimirMenuHome()
    {
        return GafaTemplate::Imprimir('menu/body', array(
            'menu' => static::GetMenuWP(),
        ));
    }

    /**
     * Imprime menu pequeño de la web
     * @return string
     */
    static public function ImprimirMenuNormal()
    {
        return GafaTemplate::Imprimir('menu/flat', array(
            'menu' => static::GetMenuWP(),
        ));
    }

    /**
     * Devuelve el menu de wp
     * @return false|object
     */
    private function GetMenuWP()
    {
        return wp_nav_menu(array(
            'echo' => false,
            'menu' => 'navegador-principal',
        ));
    }
}