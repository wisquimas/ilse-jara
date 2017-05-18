<?php
/**
 * Vista del cuerpo del home
 *
 * @var \IlseJara\HomeOptions $opciones
 * @var string                $menuHome
 * @var string                $htmlSliders
 * @var string                $htmlColecciones
 * @var string                $htmlFashionLab
 */
?>
<div class="Home ParallaxEspecial">
    <section class="Home--Sliders">
        <div class="contenedor">
            <?= $menuHome ?>
            <?= $htmlSliders ?>
        </div>
    </section>
    <section class="Home--Colecciones">
        <div class="contenedor">
            <div class="Home--titulo">Colecciones</div>
            <?= $htmlColecciones ?>
        </div>
    </section>
    <section class="Home--FashionLab">
        <div class="contenedor">
            <div class="Home--titulo">Fashion Lab</div>
            <?= $htmlFashionLab; ?>
        </div>
    </section>
    <section class="Home--Colecciones">
        <div class="contenedor">
            <div class="Home--titulo">3</div>
            3
        </div>
    </section>
</div>