<?php
global $post;


/*****************************************************
 * Impresion
 ****************************************************/
get_header();

echo get_the_title($post->ID);

get_footer();