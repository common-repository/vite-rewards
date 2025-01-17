<?php
/**
 * Reward Points Table Module
 *
 * @package Vite_Reward_Lite\Modules
 */

namespace Vite_Reward_Lite\Modules;

use Appsbd_Lite\V2\libs\Ajax_Confirm_Response;
use Appsbd_Lite\V2\libs\Ajax_Data_Response;
use Appsbd_Lite\V2\libs\AppInput;
use Vite_Reward_Lite\Core\Vite_Reward_Module_Lite;
use Vite_Reward_Lite\Models\Database\Mapbd_Reward_Log;


/**
 * Class Points_Table
 *
 * @package Vite_Reward_Lite\Modules
 */
class Vite_Reward_Points_Table extends Vite_Reward_Module_Lite {


	/**
	 * The on initialize is generated by appsbd
	 */
	public function initialize() {
	}

	/**
	 * The on init is generated by appsbd
	 */
	public function on_init() {
		parent::on_init();
		$this->add_ajax_action( 'update-user-points', array( $this, 'update_user_points' ) );
	}

	/**
	 * The data is generated by appsbd
	 */
	public function data() {
		$page          = AppInput::get_value( 'page', 1 );
		$limit         = AppInput::get_value( 'limit', 20 );
		$response      = new Ajax_Data_Response();
		$response_user = array();
						$args = array(
							'count_total' => true,
							'number'      => $limit,
							'paged'       => $page,
						);

						$args        = wp_parse_args( $args );
						$user_search = new \WP_User_Query( $args );
						$total_user  = $user_search->get_total();
						$users       = $user_search->get_results();
						foreach ( $users as $user ) {
							$customer_obj               = new \stdClass();
							$customer_obj->id           = $user->ID;
							$customer_obj->username     = $user->user_nicename;
							$customer_obj->email        = $user->user_email;
							$customer_obj->contact_no   = $user->user_phone;
							$customer_obj->total_points = $this->get_current_points( $customer_obj->id );
							$response_user[]            = $customer_obj;
						}
						if ( $response->set_grid_records( $total_user ) ) {
							$response->set_grid_data( $response_user );
						}
						$response->display_grid_response();
	}

	/**
	 * The get current points is generated by appsbd
	 *
	 * @param mixed $user_id User Id.
	 *
	 * @return float|int
	 */
	public function get_current_points( $user_id ) {

		$logs = new Mapbd_Reward_Log();
		$logs->user_id( $user_id );
		$records = $logs->select_all_grid_data();
		if ( count( $records ) > 0 ) {
			$last_record    = end( $records );
			$current_points = 'I' == $last_record->type ? $last_record->prev_point + $last_record->point_val : $last_record->prev_point - $last_record->point_val;
			return $current_points;
		}
		return 0;
	}

	/**
	 * The update user points is generated by appsbd
	 */
	public function update_user_points() {
		$response = new Ajax_Confirm_Response();
		if ( APPSBD_IS_POST_BACK ) {
			$data_object          = new Mapbd_Reward_Log();
			$data_object->ref_val = get_current_user_id();
			if ( $data_object->set_from_post_data( true ) ) {
				$is_added = Vite_Reward_Settings::update_user_points( $data_object->user_id, 'U', $data_object->ref_val, $data_object->point_val, $data_object->msg, $data_object->type, $key = '' );
				if ( $is_added ) {
					$this->add_info( 'Successfully updated' );
					$response->display_with_response( true );
					return;
				} else {
					$this->add_error( 'Failed to update' );
				}
			}
		}
		$response->display_with_response( false );
	}
}
