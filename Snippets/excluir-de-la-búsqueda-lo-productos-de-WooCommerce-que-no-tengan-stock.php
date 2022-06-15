<?php

//Excluir de la búsqueda lo productos de WooCommerce que no tengan stock
//Solo funciona con buscadores que usen el motor de WordPress | No funciona con el widget AJAX SEARCH

add_action( 'pre_get_posts', 'busca_solo_stock' );

function busca_solo_stock( $query ) {

if( $query->is_search() && $query->is_main_query() ) {
$query->set( 'meta_key', '_stock_status' );
$query->set( 'meta_value', 'instock' );
	}
}