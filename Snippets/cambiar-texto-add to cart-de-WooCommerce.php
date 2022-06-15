<?php

//Cambiar texto "Add to cart" de WooCommerce

// Para cambiarlo en la single
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' );
function woocommerce_custom_single_add_to_cart_text() {
return __( 'Comprar', 'woocommerce' );
}

// Para cambiarlo en el archive
add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );
function woocommerce_custom_product_add_to_cart_text() {
return __( 'Comprar', 'woocommerce' );
}
