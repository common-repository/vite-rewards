<?php
/**
 * It helper of current plugin.
 *
 * @package  vitepos
 */

/**
 *  It is a default helper to get user title.
 */
if ( ! function_exists( 'apbd_get_user_title_by_user' ) ) {
	/**
	 * This function is for getting user name.
	 *
	 * @param WP_User $user wp_user.
	 * @return string
	 */
	function apbd_get_user_title_by_user( $user ) {
		$title = '';
		if ( $user instanceof WP_User ) {
			if ( ! empty( $user->first_name ) && property_exists( $user, 'last_name' ) ) {
				$title = $user->first_name . ' ' . $user->last_name;
				if ( empty( trim( $title ) ) ) {
					$title = $user->display_name;
				}
			} elseif ( ! empty( $user->display_name ) ) {
				$title = $user->display_name;
			}
		}
		return $title;
	}
}
