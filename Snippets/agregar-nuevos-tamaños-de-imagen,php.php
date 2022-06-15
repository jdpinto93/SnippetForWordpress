<?php

//Añadir nuevos tamaños de imagen

add_theme_support( 'post-thumbnails' );

add_image_size( 'nombre-tamano', 800, 240, true ); /*Ancho máximo, Alto máximo, y el true o false es para
el parámetro CROPPED, es decir, si quieres que la recorte al tamaño exacto.*/