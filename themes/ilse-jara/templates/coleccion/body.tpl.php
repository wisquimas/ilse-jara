<?php
/**
 * Vista de coleccion individual
 *
 * @var \IlseJara\Coleccion $coleccion
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
</div>