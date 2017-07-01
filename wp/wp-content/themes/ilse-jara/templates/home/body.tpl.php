<?php
/**
 * Vista del cuerpo del home
 *
 * @var \IlseJara\HomeOptions $opciones
 * @var string                $menuHome
 * @var string                $htmlSliders
 * @var string                $htmlColecciones
 * @var string                $htmlFashionLab
 * @var string                $htmlUniverso
 * @var string                $htmlTestimonio
 * @var string                $htmlContacto
 * @var string                $htmlFooter
 */
?>
<div class="Home ParallaxEspecial">
    <section class="Home--Sliders">
        <div class="contenedor">
            <?= $menuHome ?>
            <?= $htmlSliders ?>
        </div>
    </section>
    <section id="colecciones" class="Home--Colecciones">
        <div class="contenedor">
            <div class="Home--titulo">Colecciones</div>
            <?= $htmlColecciones ?>
        </div>
    </section>
    <section id="fashion-lab" class="Home--FashionLab">
        <div class="contenedor">
            <div class="Home--titulo">Fashion Lab</div>
            <?= $htmlFashionLab; ?>
        </div>
    </section>
    <section id="universo" class="Home--Colecciones">
        <div class="contenedor">
            <div class="Home--titulo">Universo</div>
            <?= $htmlUniverso ?>
        </div>
    </section>
    <section id="testimonio" class="Home--Colecciones">
        <div class="contenedor">
            <div class="Home--titulo">Testimonio</div>
            <?= $htmlTestimonio ?>
        </div>
    </section>
    <section id="contacto" class="Home--Colecciones">
        <div class="contenedor">
            <div class="Home--titulo">Contacto</div>
            <?= $htmlContacto ?>
            <?= $htmlFooter ?>
        </div>
    </section>
</div>