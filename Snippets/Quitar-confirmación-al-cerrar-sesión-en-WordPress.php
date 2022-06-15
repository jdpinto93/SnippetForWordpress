<?php

//Quitar confirmación al cerrar sesión en WordPress
// Añade un enlace en el menú con tu-url/wp-login.php?action=logout

add_action( 'login_form_logout', function () {
$user = wp_get_current_user();

wp_logout();

if ( ! empty( $_REQUEST['redirect_to'] ) ) {
$redirect_to = $requested_redirect_to = $_REQUEST['redirect_to'];
} else {
$redirect_to = 'url-a-redirigir';
$requested_redirect_to = '';
}

$redirect_to = apply_filters( 'logout_redirect', $redirect_to, $requested_redirect_to, $user );
wp_safe_redirect( $redirect_to );
exit;
});
