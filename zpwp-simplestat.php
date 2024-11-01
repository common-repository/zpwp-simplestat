<?php
/*
Plugin Name: ZPWP SimpleStat
Plugin URI: http://zpik.ru/
Description: Display statistics MySQL, RAM and time for generated admin page.
Author: zPiK
Version: 1.3
Author URI: http://zpik.ru/
License: GPL2
Copyright: zPiK
Text Domain: zpwp-simplestat



*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/* 
 * Данные о количестве запросов к базе данных в подвале админки
 * Если использовать фильтр wp_footer, то эти данные появятся в подвале сайта (шаблона).  add_filter('wp_footer', 'wp_usage');
 */
function zpwp_usage(){
	printf( ('%d sql // %s sec. // '), get_num_queries(), timer_stop(0, 3) );
	if ( function_exists('memory_get_usage') ) echo round( memory_get_usage()/1024/1024, 2 ) . ' mb.';
}
add_filter('admin_footer_text', 'zpwp_usage');
