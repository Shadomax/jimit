<?php defined('SYSPATH') or die('No direct script access!');
/**
 * Default member type
 *
 * @package    BLW/Type
 * @author     Glorious Inventor Team
 * @copyright  (c) 2016-2017 Kohana Team
 * @license    http://gloriousinventor.com/license.html
 */
class Model_Type extends ORM
{
	// Relationships
	/*protected $_has_many = array(
		'members' => array('model' => 'Member','through' => 'members_types'),
	);*/

	//public $_table_name = 'account_types';

	public function rules()
	{
		return array(
			'name' => array(
				array('not_empty'),
				array('min_length', array(':value', 4)),
				array('max_length', array(':value', 32)),
			),
			'description' => array(
				array('max_length', array(':value', 255)),
			)
		);
	}
} // End Auth Type Model