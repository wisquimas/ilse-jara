<?php
/**
 * Vista del loop de fashion lab
 *
 * @var \IlseJara\FashionLab $fashion
 */
?>
<a class="FashionLab--loop" href="/fashion-lab">
    <span class="FashionLab--loop--imagen FashionLab--loop--imagen1"
          style="background-image: url(<?= $fashion->imagenes_imagen1 ?>)"></span>
    <span class="FashionLab--loop--imagen FashionLab--loop--imagen2"
          style="background-image: url(<?= $fashion->imagenes_imagen2 ?>)"></span>
    <span class="FashionLab--loop--imagen FashionLab--loop--imagen3"
          style="background-image: url(<?= $fashion->imagenes_imagen3 ?>)"></span>
    <span class="FashionLab--loop--imagen FashionLab--loop--imagen4"
          style="background-image: url(<?= $fashion->imagenes_imagen4 ?>)"></span>
</a>