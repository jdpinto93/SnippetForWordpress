<?php

//Redirigir a un usuario recién registrado a una URL

function redirigir_registro(){

return home_url( '/finished/' );

}

add_filter( 'registration_redirect', 'redirigir_registro' );