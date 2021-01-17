<?php
/*
* Plugin Name: Profit's Widget Bundle
* Description:  Widget
* Author: Luis Pinheiro
* Version: 1.0.0
* Author URI: http://profitcreations.wordpress.com
*/

function add_profit_widgets_bundle($folders){
    $folders[] = 'widgets';
    return $folders;
}
add_filter('siteorigin_widgets_widget_folders', 'add_profit_widgets_bundle');

?>