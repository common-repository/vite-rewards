<?php
/**
 * Reward Badge Module
 *
 * @package Vite_Reward_Lite\Modules
 */

namespace Vite_Reward_Lite\Modules;

use Appsbd_Lite\V2\libs\Ajax_Confirm_Response;
use Appsbd_Lite\V2\libs\Ajax_Data_Response;
use Appsbd_Lite\V2\libs\AppInput;
use Vite_Reward_Lite\Core\Vite_Reward_Module_Lite;
use Vite_Reward_Lite\Models\Database\Mapbd_Reward_Badge;


/**
 * Class Reward_Badge
 *
 * @package Vite_Reward_Lite\Modules
 */
class Vite_Reward_Badge extends Vite_Reward_Module_Lite {


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
		$this->add_ajax_action( 'add-badge', array( $this, 'add_badge' ) );
		$this->add_ajax_action( 'get-badge-details', array( $this, 'get_badge_details' ) );
		$this->add_ajax_action( 'update-badge', array( $this, 'update_badge' ) );
		$this->add_ajax_action( 'delete-badge', array( $this, 'delete_badge' ) );
	}


	/**
	 * The data is generated by appsbd
	 */
	public function data() {
		$response = new Ajax_Data_Response();
		$mainobj  = new Mapbd_Reward_Badge();
		$records  = $mainobj->count_all();
		if ( $records > 0 ) {
			$data = $mainobj->select_all_grid_data();
			$response->set_grid_data( $data );
		}
		$response->display_grid_response();
	}

	/**
	 * The add badge is generated by appsbd
	 */
	public function add_badge() {
		$response = new Ajax_Confirm_Response();
		if ( APPSBD_IS_POST_BACK ) {
			$uobject = new Mapbd_Reward_Badge();
			if ( $uobject->set_from_post_data( true ) ) {
				if ( $uobject->save() ) {
					$this->add_info( 'Successfully added' );
					$response->display_with_response( true );

					return;
				}
			}
		}
		$response->display_with_response( false );
	}


	/**
	 * The get badge details is generated by appsbd
	 */
	public function get_badge_details() {
		$response = new Ajax_Confirm_Response();
		$badge_id = AppInput::post_value( 'id' );
		if ( empty( $badge_id ) ) {
			$this->add_error( 'Invalid request' );
			$response->display_with_response( false );

			return;
		}
		$details = new Mapbd_Reward_Badge();
		$details->id( $badge_id );
		if ( $details->select() ) {
			$details->img_url = wp_get_attachment_image_url( $details->img_id );
			$response->display_with_response( true, $details );
		} else {
			$this->add_error( 'No Badge found with this id' );
			$response->display_with_response( false, null );
		}
	}


	/**
	 * The update badge details is generated by appsbd
	 */
	public function update_badge() {
		$response = new Ajax_Confirm_Response();
		$id       = AppInput::post_value( 'id' );
		if ( empty( $id ) ) {
			$this->add_error( 'invalid update request' );
			$response->display_with_response( false );

			return;
		}
		if ( APPSBD_IS_POST_BACK ) {
			$uobject = new Mapbd_Reward_Badge();
			if ( $uobject->set_from_post_data( false ) ) {
				$props = 'name,desc,threshold_points,welcome_points,cal_val,cal_type,is_additional,img_id,status';
				$uobject->unset_all_excepts( $props );
				$uobject->set_where_update( 'id', $id );
				if ( $uobject->update() ) {
					$this->add_info( 'Successfully updated' );
					$response->display_with_response( true );

					return;
				}
			}
		}
		$response->display_with_response( false );
	}


	/**
	 * The delete badge details is generated by appsbd
	 */
	public function delete_badge() {
		$response = new Ajax_Confirm_Response();
		$id       = AppInput::post_value( 'id' );
		if ( empty( $id ) ) {
			$this->add_error( 'Invalid delete request' );
			$response->display_with_response( false );

			return;
		}
		$uobject = new Mapbd_Reward_Badge();
		$uobject->id( $id );
		if ( $uobject->select() ) {
			if ( $uobject->delete_by_id( $id ) ) {
				$this->add_info( 'Successfully Deleted' );
				$response->display_with_response( true );
			} else {
				$this->add_error( 'Delete failed' );
				$response->display_with_response( false );
			}
		}
	}
}
