<?php

/*
Widget Name: Profit Widget Title
Description: An example widget which displays 'Hello world!'.
Author: Me
Author URI: http://example.com
Widget URI: http://example.com/hello-world-widget-docs,
Video URI: http://example.com/hello-world-widget-video
*/
*
class Profit_Widget_Title extends SiteOrigin_Widget {

    function get_template_name($instance) {
        return '';
    }

    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('profit-widget-title', __FILE__, 'Profit_Widget_Title');