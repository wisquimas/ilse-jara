<?php
/**
 * Imprime el div del video
 *
 * @var string $uid
 * @var string $link
 */
?>
<div class="YoutubeSlider--slides" data-id="player_<?= $uid ?>">
    <div id="player_<?= $uid ?>"></div>
    <div class="YoutubeSlider--slides--botones">
        <a href="#" class="YoutubeSlider--slides--boton YoutubeSlider--slides--botones--mute"></a>
        <div class="YoutubeSlider--slides--boton YoutubeSlider--slides--botones--share">
            <div class="sharethis-inline-share-buttons" data-url="<?= $link ?>"></div>
        </div>
        <a href="<?= $link ?>" class="YoutubeSlider--slides--boton YoutubeSlider--slides--botones--discover"></a>
    </div>
</div>