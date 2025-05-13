<?php
/*
Plugin Name: affDhgate
Plugin URI: https://topbuyerspicks.com/
Description: DHgate affiliate auto-poster to Pinterest and Facebook.
Version: 1.6.0
Author: TopBuyersPicks
*/

defined('ABSPATH') or die('No script kiddies please!');

function affdhgate_menu() {
    add_menu_page('affDhgate', 'affDhgate', 'manage_options', 'affdhgate', 'affdhgate_dashboard_page');
}
add_action('admin_menu', 'affdhgate_menu');

function affdhgate_dashboard_page() {
    echo '<div class="wrap"><h1>affDhgate Dashboard</h1>';
    echo '<p>This plugin auto-posts DHgate affiliate products to Pinterest and Facebook with AI support.</p>';
    echo '</div>';
}
