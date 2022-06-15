<?php

//Ocultar un post type en el backend

function eliminar_item_menu() {
if( !current_user_can( 'administrator' ) ):
remove_menu_page( 'edit.php?post_type=your_post_type' );
endif;
}
add_action( 'admin_menu', 'eliminar_item_menu' );