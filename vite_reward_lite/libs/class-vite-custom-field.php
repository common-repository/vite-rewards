<?php
/**
 * Its custom field
 *
 * @since: 01/11/2023
 * @package Vite_Reward_Lite\Libs
 *
 * Its form Custom field
 */

namespace Vite_Reward_Lite\Libs;

/**
 * Class Custom_Field
 *
 * @package Vite_Reward_Lite\Libs
 */
class Vite_Custom_Field {
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
	public $label;
	/**
	 * Its property help_text
	 *
	 * @var string
	 */
	public $help_text = '';

	/**
	 * Its property help_text
	 *
	 * @var string
	 */
	public $placeholder = '';

	/**
	 * Its property is_required
	 *
	 * @var string
	 */
	public $is_required = '';
	/**
	 * Its property type
	 *
	 * @var string
	 * T=Textbox, N=Numeric, D=Date,C=Checkbox, S=Switch, R=Radio, W=Dropdown, E=Textarea, U=URL Input,I=Instruction, H=Hidden
	 */
	public $type = 'T';
	/**
	 * Its property options
	 *
	 * @var array
	 */
	public $options = array();
	/**
	 * Its property opt_limit
	 *
	 * @var string
	 */
	public $opt_limit = '';
	/**
	 * Its property status
	 *
	 * @var string
	 */
	public $status = 'A';
	/**
	 * Its property des
	 *
	 * @var string
	 */
	public $des = '';
	/**
	 * Its property val
	 *
	 * @var string
	 */
	public $val = '';
	/**
	 * Its property is_pro
	 *
	 * @var string
	 */
	public $is_pro = 'N';

	/**
	 * The get input is generated by appsbd
	 *
	 * @param mixed  $id Its id param.
	 * @param mixed  $label Its label param.
	 * @param string $val Its val param.
	 * @param string $placeholder Its placeholder param.
	 * @param mixed  $help_text Its help_text param.
	 * @param string $is_required Its is_required param.
	 * @param string $type Its type param.
	 * @param array  $options Its options param.
	 * @param string $opt_limit Its opt_limit param.
	 * @param string $des Its des param.
	 * @param string $status Its status param.
	 * @param string $is_pro Its is_pro param.
	 *
	 * @return Vite_Custom_Field
	 */
	public static function get_input( $id, $label, $val = '', $placeholder = '', $help_text = '', $is_required = 'Y', $type = 'T', $options = array(), $opt_limit = '', $des = '', $status = 'A', $is_pro = 'N' ) {
		$obj              = new self();
		$obj->id          = $id;
		$obj->label       = $label;
		$obj->is_pro      = $is_pro;
		$obj->placeholder = $placeholder;
		$obj->help_text   = $help_text;
		$obj->val         = $val;
		$obj->is_required = $is_required;
		$obj->type        = $type;
		$obj->options     = $options;
		$obj->opt_limit   = $opt_limit;
		$obj->status      = $status;
		$obj->des         = $des;
		return $obj;
	}

	/**
	 * The get textbox is generated by appsbd
	 *
	 * @param mixed  $id Its id param.
	 * @param mixed  $label Its label param.
	 * @param string $val Its the value.
	 * @param string $is_pro Checking if pro or not.
	 * @param string $is_required Its is_required param.
	 * @param string $placeholder Its the placeholder param.
	 * @param string $help_text Its help_text param.
	 * @param string $des Its des param.
	 * @param string $status Its status param.
	 *
	 * @return Vite_Custom_Field
	 */
	public static function get_textbox( $id, $label, $val = '', $is_pro = 'N', $is_required = 'Y', $placeholder = '', $help_text = '', $des = '', $status = 'A' ) {
		return self::get_input( $id, $label, $val, $placeholder, $help_text, $is_required, 'T', array(), '', $des, $status, $is_pro );
	}

	/**
	 * The get url is generated by appsbd
	 *
	 * @param mixed  $id Its id param.
	 * @param mixed  $label Its label param.
	 * @param string $val Its val param.
	 * @param string $is_pro Checking if pro or not.
	 * @param string $is_required Its is_required param.
	 * @param string $placeholder Its the placeholder param.
	 * @param string $help_text Its help_text param.
	 * @param string $des Its des param.
	 * @param string $status Its status param.
	 *
	 * @return Vite_Custom_Field
	 */
	public static function get_url( $id, $label, $val = '', $is_pro = 'N', $is_required = 'Y', $placeholder = '', $help_text = '', $des = '', $status = 'A' ) {
		return self::get_input( $id, $label, $val, $placeholder, $help_text, $is_required, 'U', array(), '', $des, $status, $is_pro );
	}

	/**
	 * The get hidden is generated by appsbd
	 *
	 * @param mixed  $id Its id param.
	 * @param string $val Its val param.
	 * @param string $is_pro Checking if pro or not.
	 * @param string $status Its status param.
	 *
	 * @return Vite_Custom_Field
	 */
	public static function get_hidden( $id, $val = '', $is_pro = 'N', $status = 'A' ) {
		return self::get_input( $id, '', $val, '', 'Y', 'U', array(), '', '', $status, $is_pro );
	}

	/**
	 * The get textarea is generated by appsbd
	 *
	 * @param mixed  $id Its id param.
	 * @param mixed  $label Its label param.
	 * @param string $val Its val param.
	 * @param string $is_pro Checking if pro or not.
	 * @param string $is_required Its is_required param.
	 * @param string $placeholder Its the placeholder param.
	 * @param string $help_text Its help_text param.
	 * @param string $des Its des param.
	 * @param string $status Its status param.
	 *
	 * @return Vite_Custom_Field
	 */
	public static function get_textarea( $id, $label, $val = '', $is_pro = 'N', $is_required = 'Y', $placeholder = '', $help_text = '', $des = '', $status = 'A' ) {
		return self::get_input( $id, $label, $val, $placeholder, $help_text, $is_required, 'E', array(), '', $des, $status, $is_pro );
	}

	/**
	 * The get instruction is generated by appsbd
	 *
	 * @param string $des Its des param.
	 * @param string $class Its class param.
	 *
	 * @return Vite_Custom_Field
	 */
	public static function get_instruction( $des = '', $class = '' ) {
		return self::get_input( 'IN', $class, '', '', 'Y', 'N', 'I', array(), '', $des, 'A' );
	}

	/**
	 * The get numeric is generated by appsbd
	 *
	 * @param mixed  $id Its id param.
	 * @param mixed  $label Its label param.
	 * @param string $val Its val param.
	 * @param string $is_pro Checking if pro or not.
	 * @param string $is_required Its is_required param.
	 * @param string $placeholder Its the placeholder param.
	 * @param string $help_text Its help_text param.
	 * @param string $des Its des param.
	 * @param string $status Its status param.
	 *
	 * @return Vite_Custom_Field
	 */
	public static function get_numeric( $id, $label, $val = '', $is_pro = 'N', $is_required = 'Y', $placeholder = '', $help_text = '', $des = '', $status = 'A' ) {
		return self::get_input( $id, $label, $val, $placeholder, $help_text, $is_required, 'N', array(), '', $des, $status, $is_pro );
	}

	/**
	 * The get date is generated by appsbd
	 *
	 * @param mixed  $id Its id param.
	 * @param mixed  $label Its label param.
	 * @param string $val Its val param.
	 * @param string $is_pro Checking if pro or not.
	 * @param string $is_required Its is_required param.
	 * @param string $placeholder Its the placeholder param.
	 * @param string $help_text Its help_text param.
	 * @param string $des Its des param.
	 * @param string $status Its status param.
	 *
	 * @return Vite_Custom_Field
	 */
	public static function get_date( $id, $label, $val = '', $is_pro = 'N', $is_required = 'Y', $placeholder = '', $help_text = '', $des = '', $status = 'A' ) {
		return self::get_input( $id, $label, $val, $placeholder, $help_text, $is_required, 'D', array(), '', $des, $status, $is_pro );
	}

	/**
	 * The get switch is generated by appsbd
	 *
	 * @param mixed  $id Its id param.
	 * @param mixed  $label Its label param.
	 * @param string $val Its val param.
	 * @param string $is_pro Checking if pro or not.
	 * @param string $true_val Its true_val param.
	 * @param string $false_val Its false_val param.
	 * @param string $help_text Its help_text param.
	 * @param string $des Its des param.
	 * @param string $status Its status param.
	 *
	 * @return Vite_Custom_Field
	 */
	public static function get_switch( $id, $label, $val = '', $is_pro = 'N', $true_val = 'Y', $false_val = 'N', $help_text = '', $des = '', $status = 'A' ) {
		return self::get_input(
			$id,
			$label,
			$val,
			'',
			$help_text,
			'Y',
			'S',
			array(
				'true_val'  => $true_val,
				'false_val' => $false_val,
			),
			'',
			$des,
			$status,
			$is_pro
		);
	}

	/**
	 * The get radio is generated by appsbd
	 *
	 * @param mixed  $id Its id param.
	 * @param mixed  $label Its label param.
	 * @param string $val Its val param.
	 * @param string $is_pro Checking if pro or not.
	 * @param array  $options Its options param.
	 * @param string $help_text Its help_text param.
	 * @param string $des Its des param.
	 * @param string $status Its status param.
	 *
	 * @return Vite_Custom_Field
	 */
	public static function get_radio( $id, $label, $val = '', $is_pro = 'N', $options = array(), $help_text = '', $des = '', $status = 'A' ) {
		return self::get_input( $id, $label, $val, '', $help_text, 'Y', 'R', $options, '', $des, $status, $is_pro );
	}

	/**
	 * The get checkbox is generated by appsbd
	 *
	 * @param mixed  $id Its id param.
	 * @param mixed  $label Its label param.
	 * @param string $val Its val param.
	 * @param string $is_pro Checking if pro or not.
	 * @param string $is_required Its is_required param.
	 * @param array  $options Its options param.
	 * @param string $option_limit Its option_limit param.
	 * @param string $help_text Its help_text param.
	 * @param string $des Its des param.
	 * @param string $status Its status param.
	 *
	 * @return Vite_Custom_Field
	 */
	public static function get_checkbox( $id, $label, $val = '', $is_pro = 'N', $is_required = 'Y', $options = array(), $option_limit = '', $help_text = '', $des = '', $status = 'A' ) {
		return self::get_input( $id, $label, $val, '', $help_text, $is_required, 'C', $options, $option_limit, $des, $status, $is_pro );
	}

	/**
	 * The get dropdown is generated by appsbd
	 *
	 * @param mixed  $id Its id param.
	 * @param mixed  $label Its label param.
	 * @param string $val Its val param.
	 * @param string $is_pro Checking if pro or not.
	 * @param string $select_text Its the select_text param.
	 * @param string $is_required Its is_required param.
	 * @param array  $options Its options param.
	 * @param int    $option_limit Its option_limit param.
	 * @param string $help_text Its help_text param.
	 * @param string $des Its des param.
	 * @param string $status Its status param.
	 *
	 * @return Vite_Custom_Field
	 */
	public static function get_dropdown( $id, $label, $val = '', $is_pro = 'N', $select_text = '', $is_required = 'Y', $options = array(), $option_limit = 1, $help_text = '', $des = '', $status = 'A' ) {
		return self::get_input( $id, $label, $val, $select_text, $help_text, $is_required, 'W', $options, $option_limit, $des, $status, $is_pro );
	}

	/**
	 * The set val is generated by appsbd
	 *
	 * @param mixed $val Its val param.
	 */
	public function set_val( $val ) {
		$this->val = $val;
	}

	/**
	 * The get id is generated by appsbd
	 *
	 * @return mixed
	 */
	public function get_id() {
		return $this->id;
	}
}
