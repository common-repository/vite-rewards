<?php
/**
 * Its used for dependacy check
 *
 * @since: 21/09/2021
 * @author: Sarwar Hasan
 * @version 1.0.0
 * @package VitePos\Libs
 */

namespace Vite_Reward_Lite\Libs;

use Appsbd_Lite\V2\libs\WP_Loader;

if ( ! class_exists( __NAMESPACE__ . '\Reward_Loader' ) ) {
	/**
	 * Class Vitepos_Loader
	 *
	 * @package VitePos\Libs
	 */
	class Vite_Reward_Loader extends WP_Loader {

		/**
		 * The set details is generated by appsbd
		 *
		 * @return mixed|void
		 */
		public function set_details() {
			$this->plugin_file     = 'vite-rewards/vite-rewards.php';
			$this->pro_plugin_file = 'vite-rewards-pro/vite-rewards-pro.php';
		}

		/**
		 * The load before ready is generated by appsbd
		 *
		 * @param bool $result Its a result.
		 *
		 * @return bool
		 */
		public function load_before_ready( $result ) {

			return parent::load_before_ready( $result );
		}
	}
}
