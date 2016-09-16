<?php defined('SYSPATH') or die('No direct script access!');
/**
 * Default article model
 *
 * @package    Jimit/Category Article
 * @author     Afrovision Group
 * @copyright  (c) 2016-2017 Afrovision Group
 * @license    http://www.afrovisiongroup.com/license.html
 */
class Model_Category_Article extends ORM
{
	//public $_table_name = 'cell_members';

	protected $_belongs_to = array(
		'category' => array('model' => 'Category'),
	);

	public function labels()
	{
		return array();
	}

	//get the cell member role
	public function getRole($cell = '', $member = '')
	{
		return ORM::factory('Cell_Member')->where('member_id', '=', $member)->and_where('cell_id', '=', $cell)->find()->role;
	}

	//get leaders
	public static function getLeader($cell = '')
	{
		return ORM::factory('Cell_Member')->where('cell_id', '=', $cell)->and_where('role', '=', 'leader')->find();
	}

	//get all members
	public static function getMembers($cell = '')
	{
		return ORM::factory('Cell_Member')->where('cell_id', '=', $cell)->find_all();
	}

	//get the cell member information
	
} // End BLW Cell Member Model