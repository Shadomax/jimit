<?php defined('SYSPATH') or die('No direct script access');
/**
 * Default partner model
 *
 * @package    Admin/Partner
 * @author     Afrovision Group
 * @copyright  (c) 2016-2017 Afrovision Group
 * @license    http://www.afrovisiongroup.com/license.html
 */
class Model_Partner extends ORM
{
	
	public function getLogo()
	{
		if (empty($this->logo)) {
			return "http://placehold.it/100x100";
		} else {
			return url::base()."media/uploads/partners/logo/".$this->logo;
		}
	}

	public function getPicture()
	{
		if (empty($this->photo)) {
			return "http://placehold.it/100x100";
		} else {
			return url::base()."media/uploads/partners/".$this->photo;
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

	public function addPartner($data)
	{
		$this->name = $data['name'];
		$this->content = $data['content'];
		$this->sort = $data['sort'];
		$this->deleted = 'false';
		$this->datetime = time();
		return $this->save();
	}

	public function updatePartner($data)
	{
		$this->name = $data['name'];
		$this->content = $data['content'];
		$this->sort = $data['sort'];
		return $this->save();
	}

	//add photo action
	public function addPhoto($data)
	{
		$this->logo = $data['photo'];
		return $this->save();
	}
}