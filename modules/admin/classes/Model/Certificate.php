<?php defined('SYSPATH') or die('No direct script access!');
/**
 * Default certificate model for programs
 *
 * @package    Admin/Certificate
 * @author     Afrovision Group
 * @copyright  (c) 2016-2017 Afrovision Group
 * @license    http://www.afrovisiongroup.com/license.html
 */
class Model_Certificate extends ORM
{
	// Relationships
	protected $_has_many = array(
		'programs' => array('model' => 'Certificate_Program'),
	);

	//public $_table_name = '';

	/*public function rules()
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
	}*/
} // End Certificate Model