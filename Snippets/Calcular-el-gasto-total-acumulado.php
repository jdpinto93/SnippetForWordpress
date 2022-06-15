<?php

//- de un cliente en tu tienda online WooCommerce

/* Mostrar cupon a clientes que acumulen más de 500 euros en gasto */

add_action( 'woocommerce_before_cart', 'mostrar_banner_gasto_acumulado_500' );
function mostrar_banner_gasto_acumulado_500() {
$current_user = wp_get_current_user();
// Si no está conectado no se aplica, no hay manera de calcularlo
if ( 0 == $current_user->ID ) return;

// Si el gasto acumulado en compras pasa de 500 mostramos el banner
if ( wc_get_customer_total_spent( $current_user->ID ) > 500 ) {
echo '

¡Gracias por tu fidelidad! - ¡Acabas de desvelar tu descuento de cliente PRO! Usa el código de cupón ZH47ZTEF y ahorra un 5% en tu siguiente compra.
';
	}
}