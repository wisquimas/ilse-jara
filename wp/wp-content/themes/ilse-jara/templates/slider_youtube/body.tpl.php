<?php
/**
 * Vista del slider de youtube
 *
 * @var string $variables
 * @var string $elementos
 * @var string $acciones
 */
?>
<div class="YoutubeSlider">
    <div class="YoutubeSlider--cont">
        <?= $elementos ?>
    </div>
    <div class="YoutubeSlider--flechas YoutubeSlider--flechas--prev"></div>
    <div class="YoutubeSlider--flechas YoutubeSlider--flechas--next"></div>
</div>
<script>
    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/player_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    //lista variables
    <?= $variables ?>
    function onYouTubePlayerAPIReady() {
        //lista acciones
        <?= $acciones ?>
    }
    function onPlayerReady(event) {
        event.target.mute();
    }
    function onPlayerStateChange(event) {
        if (event.data === YT.PlayerState.ENDED) {
            event.target.playVideo();
        }
    }
</script>