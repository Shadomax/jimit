<?php defined('SYSPATH') or die('No direct script access');
/**
 * Default program model
 *
 * @package    Admin/Program
 * @author     Afrovision Group
 * @copyright  (c) 2016-2017 Afrovision Group
 * @license    http://www.afrovisiongroup.com/license.html
 */
class Model_Certificate_Program extends ORM
{
	protected $_belongs_to = array(
		'certificate' => array('model' => 'Certificate'),
	);

	public function getPicture()
	{
		if (empty($this->photo)) {
			return "http://placehold.it/100x100";
		} else {
			return url::base().'media/uploads/programs/'.$this->photo;
		}
	}

	public static function validatePhoto($data)
	{
		return Validation::factory($data)
	    	->rule('file', 'Upload::not_empty')
			->rule('file', 'Upload::size', array(':value', '4M'))
			->rule('file', 'Upload::type', array(':value', array('jpeg','jpg','png','gif')))
			->rule('file', 'Upload::valid');
	}

	public function create_program($data)
	{
		$this->title = $data['title'];
		$this->certificate_id = $data['certificate'];
		$this->explore = $data['explore'];
		$this->learn = $data['learn'];
		$this->cost = $data['cost'];
		$this->requirement = $data['requirement'];
		$this->location = $data['location'];
		$this->code = $data['code'];
		$this->options = $data['option'];
		$this->tution_fee = $data['fee'];
		$this->photo = $data['photo'];
		$this->sort = $data['sort'];
		$this->deleted = 'false';
		$this->datetime = time();
		return $this->save();
	}

	public function update_program($data)
	{
		$this->title = $data['title'];
		$this->certificate_id = $data['certificate'];
		$this->explore = $data['explore'];
		$this->learn = $data['learn'];
		$this->cost = $data['cost'];
		$this->requirement = $data['requirement'];
		$this->location = $data['location'];
		$this->code = $data['code'];
		$this->options = $data['option'];
		$this->tution_fee = $data['fee'];
		$this->sort = $data['sort'];
		return $this->save();
	}

	public function update_photo($data)
	{
		$this->title = $data;
		return $this->save();
	}
}
