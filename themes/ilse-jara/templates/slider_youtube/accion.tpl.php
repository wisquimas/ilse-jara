<?php
/**
 * Imprime el div del video
 *
 * @var string $uid
 * @var string $id
 * @var string $link
 */
?>
player_<?= $uid ?> = new YT.Player('player_<?= $uid ?>', {
playerVars: {'autoplay': 0, 'controls': 0, 'autohide': 0, 'wmode': 'opaque','loop' : 1,'volume':100},
videoId: '<?= $id ?>',
events: {
'onReady': onPlayerReady,
'onStateChange': onPlayerStateChange
}
});
