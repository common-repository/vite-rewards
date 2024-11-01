<?php
/**
 * Its for Rule Item
 *
 * @since: 01/11/2023
 * @package Vite_Reward_Lite\Libs
 */

namespace Vite_Reward_Lite\Libs;

use Automattic\WooCommerce\Admin\Overrides\Order;

/**
 * Class Rule_Item
 *
 * @package Vite_Reward_Lite\Libs
 */
class Vite_Rule_Item {
	/**
	 * Its property id
	 *
	 * @var string
	 */
	public $id;
	/**
	 * Its property label
	 *
	 * @var string
	 */
	public $label = '';
	/**
	 * Its property group
	 *
	 * @var string
	 */
	public $group_id = '';
	/**
	 * Its property group_title
	 *
	 * @var string
	 */
	public $group_title = '';
	/**
	 * Its property tooltip
	 *
	 * @var string
	 */
	public $tooltip = '';
	/**
	 * Its property points
	 *
	 * @var int
	 */
	public $points = 0;
	/**
	 * Its property status
	 *
	 * @var string
	 */
	public $status = 'I';
	/**
	 * Its property is_pro
	 *
	 * @var string
	 */
	public $is_pro = 'N';
	/**
	 * Its property fields
	 *
	 * @var Vite_Custom_Field []
	 */
	public $fields = array();


	/**
	 * Rule_Item constructor.
	 *
	 * @param string $id Its id param.
	 * @param string $label Its label param.
	 * @param string $tooltip Its tooltip param.
	 * @param string $is_pro Its for pro rule.
	 */
	public function __construct( $id, $label, $tooltip = '', $is_pro = 'N' ) {
		$this->id      = $id;
		$this->label   = $label;
		$this->tooltip = $tooltip;
		$this->is_pro = $is_pro;
	}

	/**
	 * The set point is generated by appsbd
	 *
	 * @param mixed $points Its points param.
	 */
	public function set_point( $points ) {
		$this->points = $points;
	}

	/**
	 * The set group is generated by appsbd
	 *
	 * @param mixed $group_id Its group_id param.
	 * @param mixed $group_title Its group_title param.
	 */
	public function set_group( $group_id, $group_title ) {
		$this->group_id    = $group_id;
		$this->group_title = $group_title;
	}

	/**
	 * The add field is generated by appsbd
	 *
	 * @param mixed $custom_field Its custom_field param.
	 */
	public function add_field( $custom_field ) {
		$this->fields[] = $custom_field;
	}

	/**
	 * The get field value is generated by appsbd
	 *
	 * @param mixed  $fld_id Its field id.
	 * @param string $default_value Its default value.
	 *
	 * @return mixed|string
	 */
	public function get_field_value( $fld_id, $default_value = '' ) {
		foreach ( $this->fields as $field ) {
			if ( $field->get_id() == $fld_id ) {
				return $field->val;
			}
		}
		return $default_value;
	}

	/**
	 * The set field values is generated by appsbd
	 *
	 * @param mixed $vals Its vals param.
	 */
	public function set_field_values( $vals ) {
		if ( isset( $vals['status'] ) ) {
			$this->status = $vals['status'];
		}
		if ( isset( $vals['points'] ) ) {
			$this->set_point( $vals['points'] );
		}
		foreach ( $this->fields as $field ) {
			$id = $field->get_id();
			if ( isset( $vals['field_data'] ) && isset( $vals['field_data'][ $id ] ) ) {
				$field->set_val( $vals['field_data'][ $id ] );
			}
		}
	}
}