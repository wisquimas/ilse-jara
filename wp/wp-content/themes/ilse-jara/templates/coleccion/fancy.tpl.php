<?php
/**
 * Vista de un elemento de galeria de coleccion
 *
 * @var \IlseJara\GaleriaColeccion $galeria
 * @var int                        $indice
 */
?>
<div class="Coleccion--fancy" data-indice="<?= $indice ?>">
    <div class="Coleccion--contenedor">
        <div class="Coleccion--cabecera--left">
            <img id="Coleccion--cabecera--imagen--<?= $indice ?>" class="Coleccion--cabecera--imagen"
                 src="<?= $galeria->foto ?>" alt="">
        </div>
        <div class="Coleccion--cabecera--right">
            <div id="Coleccion--fancy--zoom--<?= $indice ?>" class="Coleccion--fancy--zoom"
                 style="background-image: url(<?= $galeria->foto ?>)"></div>
            <div class="Coleccion--fancy--texto"><?= $galeria->texto ?></div>
        </div>
    </div>
    <script>
        $("#Coleccion--cabecera--imagen--<?= $indice ?>").elevateZoom({
            easing: true,
            borderSize: 0,
            zoomWindowPosition: "Coleccion--fancy--zoom--<?= $indice ?>",
            callback: function (self) {
                var ancho = self.externalContainer.outerWidth();
                var alto = self.externalContainer.outerHeight();
                self.zoomWindow.outerWidth(ancho);
                self.zoomWindow.outerHeight(alto);
            }
        });
    </script>
</div>