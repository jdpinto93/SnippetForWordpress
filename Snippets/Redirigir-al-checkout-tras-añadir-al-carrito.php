<?php

//Redirigir al checkout tras añadir al carrito

// redirigir al checkout tras carrito
function wpcs_add_to_cart_redirect( $url ) {
global $woocommerce;
$checkout_url = $woocommerce->cart->get_checkout_url();
return $checkout_url;
}
add_filter( 'woocommerce_add_to_cart_redirect', 'wpcs_add_to_cart_redirect' );