<?php
/**
 * Vista de coleccion individual
 *
 * @var \IlseJara\Coleccion $coleccion
 * @var string              $htmlGaleria
 * @var string              $htmlFancys
 */
?>
<div class="Coleccion">
    <div class="Coleccion--cabecera">
        <div class="Coleccion--contenedor">
            <div class="Coleccion--cabecera--left">
                <img class="Coleccion--cabecera--imagen" src="<?= $coleccion->informacion_imagen_principal ?>" alt="">
            </div>
            <div class="Coleccion--cabecera--right">
                <header class="Coleccion--cabecera--title">
                    <h1 class="Coleccion--cabecera--title--h1"><?= $coleccion->title ?></h1>
                    <div class="Coleccion--cabecera--title--date"><?= $coleccion->fecha ?></div>
                </header>
            </div>
        </div>
    </div>
    <div class="Coleccion--cabecera--texto">
        <?= $coleccion->contenido ?>
    </div>
    <div class="Coleccion--galeria">
        <?= $htmlGaleria ?>
    </div>
    <div class="Coleccion--fancys">
        <?= $htmlFancys ?>
    </div>
    <script>
        $('.Coleccion--galeria').slick({
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 5,
            centerMode: true,
            centerPadding: '30px',
            autoplaySpeed: 2000,
            autoplay: true, //todo activar autoplay
            arrows: true,
        })
    </script>
</div>