<?php

//- por un prefijo y un número incremental (basado en el número de posts existentes)

add_filter( 'wp_insert_post_data','cambiar_titulo','99',2);

function cambiar_titulo($datos)
{
if($datos['post_type'] == 'negocio' ) {
$cuenta_posts = wp_count_posts( 'nombre-de-tu-CPT' )->publish;
$datos['post_title'] = 'PREFIJO #'.$cuenta_posts++;
}
return $datos;
}