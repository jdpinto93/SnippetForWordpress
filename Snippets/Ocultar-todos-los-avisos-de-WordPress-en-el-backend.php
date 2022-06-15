<?php

//-
/* Ocultar todos los avisos admin de WP */
add_action('admin_head', 'eg_ocultar_avisos_wp');
function eg_ocultar_avisos_wp() {

?>
.notice { display: none;}
<?php
}