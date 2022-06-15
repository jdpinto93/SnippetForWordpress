<?php

//Establecer un pedido mínimo en WooCommerce

add_action( 'woocommerce_check_cart_items', 'required_min_cart_subtotal_amount' );
function required_min_cart_subtotal_amount() {

if ( WC()->cart->get_cart_contents_count() == 0 ) {
return;
}

// COLOCA AQUÍ LA CANTIDAD MÍNIMA
$minimum_amount = 10;

// Total (antes de gastos de envío e impuestos)
$cart_subtotal = WC()->cart->subtotal;

// Error que aparece si la cantidad no se cumple
if( $cart_subtotal < $minimum_amount ) {
// Mostrar el mensaje
wc_add_notice( sprintf( __("El importe mínimo para poder hacer el pedido es de %s."), wc_price($minimum_amount) ) , 'error' );
remove_action( 'woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20 );

	}
}