<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Timezone Field Type
 *
 * @author		Ryan Thompson
 * @copyright	Copyright (c) 2008-2013, AI Web Systems, Inc.
 * @license		MIT
 * @link		http://aiwebsystems.com/
 */
class Field_timezone
{
	public $field_type_name 		= 'Timezone';
	
	public $field_type_slug			= 'timezone';
	
	public $db_col_type				= 'varchar';

	public $custom_parameters		= array('default_value');

	public $version					= '1.1';

	public $author					= array('name' => 'Ryan Thompson', 'url' => 'http://www.aiwebsystems.com/');
	
	// --------------------------------------------------------------------------

	/**
	 * Output form input
	 *
	 * @access 	public
	 * @param	array
	 * @return	string
	 */
	public function form_output($data, $entry_id, $field)
	{
		$choices = array();

		if ($field->is_required != 'yes')
		{
			$choices[null] = '---';
		}

		foreach (timezone_identifiers_list() as $key => $val)
		{
			$choices[$val] = $val;
		}

		return form_dropdown($data['form_slug'], $choices, empty($data['value']) ? $data['value'] : $field->field_data['default_value']);
	}
}