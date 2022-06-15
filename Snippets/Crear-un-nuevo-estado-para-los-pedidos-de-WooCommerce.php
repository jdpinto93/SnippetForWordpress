<?php

//Crear un nuevo estado para los pedidos de WooCommerce

// Añadir nuevos estados a un pedido en Woocommerce, por ejemplo: ENVIADO
// Registrar Estado del pedido Enviado - hello-elementor es el text_domain

function wpex_wc_register_post_statuses_enviado() {
register_post_status( 'wc-order-sent', array(
'label' => _x( 'Enviado', 'WooCommerce Order status', 'hello-elementor' ),
'public' => true,
'exclude_from_search' => false,
'show_in_admin_all_list' => true,
'show_in_admin_status_list' => true,
'label_count' => _n_noop( 'Enviado (%s)', 'Enviados (%s)', 'hello-elementor' )
) );
}
add_filter( 'init', 'wpex_wc_register_post_statuses_enviado' );

// Añadir Estado del pedido Enviado a WooCommerce
function wpex_wc_add_order_statuses_enviado( $order_statuses ) {
$order_statuses['wc-order-sent'] = _x( 'Enviado', 'WooCommerce Order status', 'hello-elementor' );
return $order_statuses;
}
add_filter( 'wc_order_statuses', 'wpex_wc_add_order_statuses_enviado' );

// Email que se envía cuando el estado del pedido está en Enviado

function email_shipping_notification( $order_id, $checkout=null ) {
global $woocommerce;

$order = new WC_Order( $order_id );

//error_log( $order->status );

if($order->status === 'order-sent' ) {

// Mensaje del email.
$mailer = $woocommerce->mailer();

$message_body = __( 'Su pedido se encuentra listo y ha sido enviado en estos momentos.
Si quiere puede acceder a su cuenta y ver sus pedidos en el siguiente enlace:

Acceso a su cuenta.', 'hello-elementor' );

$message = $mailer->wrap_message(
// Mensaje en header.
sprintf( __( 'Su pedido ha sido enviado', 'hello-elementor' ), $order->get_order_number() ), $message_body );

// Asunto del mensaje.
$result = $mailer->send( $order->billing_email, sprintf( __( 'Su pedido ha sido enviado desde Catando Vino', 'text_domain' ), $order->get_order_number() ), $message );

//error_log( $result );
}

}
add_action( 'woocommerce_order_status_changed', 'email_shipping_notification');