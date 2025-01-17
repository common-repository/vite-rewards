<?php
/**
 * Pos Warehouse Database Model
 *
 * @package Vite_Reward_Lite\Models\Database
 */

namespace Vite_Reward_Lite\Models\Database;

use AIOSEO\Vendor\Monolog\Handler\NullHandler;
use Vite_Reward_Lite\Core\Vite_Reward_Lite_Model;


/**
 * Class Mapbd_pos_cash_drawer_log
 *
 * @package Vitepos\Models\Database
 */
class Mapbd_Reward_Log extends Vite_Reward_Lite_Model {
	/**
	 * Its property id
	 *
	 * @var int
	 */
	public $id;
	/**
	 * Its property cash_drawer_id
	 *
	 * @var int
	 */
	public $user_id;
	/**
	 * Its property ref_id
	 *
	 * @var double
	 */
	public $point_val;
	/**
	 * Its property ref_id
	 *
	 * @var double
	 */
	public $prev_point;
	/**
	 * Its property ref_id
	 *
	 * @var string
	 */
	 public $ref_val;
	/**
	 * Its property note
	 *
	 * @var String
	 */
	public $msg;
	/**
	 * Its property type
	 *
	 * @var String
	 */
	public $type;
	/**
	 * Its property ref_type
	 *
	 * @var String
	 */
	public $ref_type;
	/**
	 * Its property entry_time
	 *
	 * @var String
	 */
	public $entry_date;

	/**
	 * Its property ex param
	 *
	 * @var String
	 */
	public $ex1_param;

	/**
	 * Its property ex2 param
	 *
	 * @var String
	 */
	public $ex2_param;

	/**
	 * Mapbd_pos_cash_drawer_log constructor.
	 */
	public function __construct() {
		parent::__construct();
		$this->set_validation();
		$this->table_name     = 'apbd_reward_log';
		$this->primary_key    = 'id';
		$this->unique_key     = array();
		$this->multi_key      = array();
		$this->auto_inc_field = array( 'id' );
		$this->app_base_name  = 'reward-point';
	}


	/**
	 * The set validation is generated by appsbd
	 */
	public function set_validation() {
		$this->validations = array(
			'id'          => array(
				'Text' => 'Id',
				'Rule' => 'max_length[10]|integer',
			),
			'point_val'   => array(
				'Text' => 'Point value',
				'Rule' => 'max_length[11]',
			),
			'prev_point'  => array(
				'Text' => 'Previous Point',
				'Rule' => 'max_length[11]',
			),
			'user_id'     => array(
				'Text' => 'User Id',
				'Rule' => 'max_length[50]',
			),
			'msg'         => array(
				'Text' => 'Note',
				'Rule' => 'max_length[255]',
			),
			'ref_val'     => array(
				'Text' => 'Note',
				'Rule' => 'max_length[100]',
			),
			'type'        => array(
				'Text' => 'Log Type',
				'Rule' => 'max_length[1]',
			),
			'ref_type'    => array(
				'Text' => 'Ref Type',
				'Rule' => 'max_length[2]',
			),
			'entry_date'  => array(
				'Text' => 'Entry Time',
				'Rule' => 'max_length[20]',
			),
			'mature_date' => array(
				'Text' => 'Mature Date',
				'Rule' => 'max_length[20]',
			),

		);
	}

	/**
	 * The get property raw options is generated by appsbd
	 *
	 * @param mixed   $property Its the property.
	 * @param boolean $is_with_select False if with select.
	 *
	 * @return array|string[]
	 */
	public function get_property_raw_options( $property, $is_with_select = false ) {
		$return_obj = array();
		switch ( $property ) {
			case 'type':
				$return_obj = array(
					'I' => 'In',
					'O' => 'Out',
				);
				break;
			case 'ref_type':
				$return_obj = array(
					'O' => 'Order',
					'U' => 'User Id',
					'P' => 'Product ID',
				);
				break;
			case 'is_mature':
				$return_obj = array(
					'Y' => 'Yes',
					'N' => 'No',
				);
				break;
			default:
		}
		if ( $is_with_select ) {
			return array_merge( array( '' => 'Select' ), $return_obj );
		}
		return $return_obj;
	}

	/**
	 * The AddLog is generated by appsbd
	 *
	 * @param mixed  $type Its type.
	 * @param mixed  $user_id Its user_id.
	 * @param mixed  $prev_point Its prev_point.
	 * @param mixed  $point_val Its point_val.
	 * @param mixed  $msg Its msg.
	 * @param string $ref_val Its msg.
	 * @param string $ref_type Its ref_type.
	 * @param string $is_mature Its is_mature.
	 * @param string $ex1_param Its ex1_param.
	 * @param string $ex2_param Its ex2_param.
	 *
	 * @return Mapbd_Reward_Log|null
	 */
	public static function AddLog( $type, $user_id, $prev_point, $point_val, $msg, $ref_val = '', $ref_type = '', $is_mature = 'Y', $ex1_param = '', $ex2_param = '' ) {
		$newobj = new self();
		$newobj->user_id( $user_id );
		$newobj->point_val( $point_val );
		$newobj->prev_point( $prev_point );
		$newobj->msg( $msg );
		$newobj->ref_val( $ref_val );
		$newobj->ref_type( $ref_type );
		$newobj->type( $type );
		$newobj->entry_date( gmdate( 'Y-m-d' ) );
		$newobj->is_mature( $is_mature );
		$newobj->ex1_param( $ex1_param );
		$newobj->ex2_param( $ex2_param );
		if ( $newobj->save() ) {
			return $newobj;
		}
		return null;
	}
	/**
	 * The create db table is generated by appsbd
	 */
	public static function create_db_table() {
		$this_obj = new static();
		$table    = $this_obj->db->prefix . $this_obj->table_name;
		if ( $this_obj->db->get_var( "show tables like '{$table}'" ) != $table ) {
			$sql = "CREATE TABLE `{$table}` (
					`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  					`user_id` int(11) unsigned NOT NULL,
  					`ref_val` varchar(100)  NOT NULL DEFAULT '',
  					`ref_type` char(2) NOT NULL DEFAULT 'O' COMMENT 'radio(U=User,O=Order,P=Product)',
  					`type` char(1) NOT NULL COMMENT 'radio(I=In,O=Out)',
  					`entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  					`msg` char(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  					`prev_point` decimal (10,2)  NOT NULL DEFAULT 0,
  					`point_val` decimal (10,2) unsigned NOT NULL DEFAULT 0,
  					`is_mature` char(1) NOT NULL DEFAULT 'N' COMMENT 'radio(Y=Yes,N=No)',
					`mature_date` timestamp(0) NULL,
  					`ex1_param` char(64) NOT NULL DEFAULT '' COMMENT 'extra fields',
  					`ex2_param` char(64) NOT NULL DEFAULT '' COMMENT 'extra fields',  					
  					PRIMARY KEY (`id`)
					)";
			require_once ABSPATH . 'wp-admin/includes/upgrade.php';
			dbDelta( $sql );
		}
	}
}
