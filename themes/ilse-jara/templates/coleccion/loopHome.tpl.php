<?php
/**
 * Vista de coleccion en Home
 *
 * @var \IlseJara\Coleccion $coleccion
 */
?>
<a href="<?= $coleccion->link ?>" class="ColeccionEnHome"
   style="background-image: url(<?= $coleccion->imagenes_home_normal ?>)">
    <span class="ColeccionEnHome--title"><?= $coleccion->title ?></span>
    <div class="ColeccionEnHome_hover" style="background-image: url(<?= $coleccion->imagenes_home_hover ?>)"></div>
    <img src="<?= $coleccion->imagenes_home_hover ?>" alt="" style="display: none"/>
</a>