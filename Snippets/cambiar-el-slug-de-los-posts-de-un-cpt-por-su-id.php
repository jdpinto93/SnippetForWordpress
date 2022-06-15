<?php

//Cambiar el slug de los posts de un CPT por su ID

function cambia_slug_por_id($post_link, $post = 0) {
if($post->post_type === 'incidencias') {
return home_url('incidencias/' . $post->ID . '/');
}
else{
return $post_link;
}
}
add_filter('post_type_link', 'cambia_slug_por_id', 1, 3);

function rewrite_post_id(){
add_rewrite_rule('incidencias/([0-9]+)?$', 'index.php?post_type=incidencias&p=$matches[1]', 'top');
}
add_action('init', 'rewrite_post_id');