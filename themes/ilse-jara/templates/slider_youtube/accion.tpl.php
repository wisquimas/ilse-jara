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
playerVars: {'autoplay': 0, 'controls': 1, 'autohide': 1, 'wmode': 'opaque'},
videoId: '<?= $id ?>',
events: {
'onReady': onPlayerReady
}
});
