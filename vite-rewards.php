<?php
/**
 * Plugin Name: Vite Rewards
 * Plugin URI: https://appsbd.com
 * Description: It's a plugin for WooCommerce and vitepos reward calculation.
 * Version: 1.0.0
 * Author: appsbd
 * Author URI: http://www.appsbd.com
 * Text Domain: vite-rewards
 * Tested up to: 6.6
 * wc require:3.2.0
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package Reward_Lite
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once ABSPATH . 'wp-admin/includes/plugin.php';
require_once 'vendor/autoload.php';


use Vite_Reward_Lite\Core\Vite_Reward_Lite;


if ( true === \Vite_Reward_Lite\Libs\Vite_Reward_Loader::is_ready_to_load( __FILE__ ) ) {



	$o_reward = new Vite_Reward_Lite( __FILE__ );
	$o_reward->start_plugin();
}
