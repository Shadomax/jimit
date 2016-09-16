<?php defined('SYSPATH') or die('No direct script access!');
/**
 * Default gallery model
 *
 * @package    Admin/Gallery
 * @author     Afrovision Group
 * @copyright  (c) 2016-2017 Afrovision Group
 * @license    http://www.afrovisiongroup.com/license.html
 */
class Model_Gallery extends ORM
{
	public function getPicture()
	{
		if (empty($this->photo)) {
			return "http://placehold.it/100x100";
		} else {
			return url::base().'media/uploads/gallery/'.$this->photo;
		}
	}

	public static function getvalidate($data)
	{
		return Validation::factory($data)
		    ->rule('name', 'not_empty')
			->rule('sort', 'not_empty')
	    	->rule('file', 'Upload::not_empty')
			->rule('file', 'Upload::size', array(':value', '4M'))
			->rule('file', 'Upload::type', array(':value', array('jpeg','jpg','png','gif')))
			->rule('file', 'Upload::valid');
	}

	public static function getdatavalidate($data)
	{
		return Validation::factory($data)
		    ->rule('name', 'not_empty')
			->rule('sort', 'not_empty');
	}

	public static function validatePhoto($data)
	{
		return Validation::factory($data)
	    	->rule('file', 'Upload::not_empty')
			->rule('file', 'Upload::size', array(':value', '4M'))
			->rule('file', 'Upload::type', array(':value', array('jpeg','jpg','png','gif')))
			->rule('file', 'Upload::valid');
	}

	public function upload_photo($data)
	{
		$this->title = $data['name'];
		$this->photo = $data['photo'];
		$this->sort = $data['sort'];
		$this->deleted = 'false';
		$this->datetime = time();
		return $this->save();
	}

	public function update_data($data)
	{
		$this->title = $data['name'];
		$this->sort = $data['sort'];
		return $this->save();
	}

	public function update_photo($data)
	{
		$this->photo = $data['photo'];
		return $this->save();
	}
}