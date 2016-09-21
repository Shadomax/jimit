<?php defined('SYSPATH') or die('No direct script access');
/**
 * Default french slider model
 *
 * @package    Admin/Slider
 * @author     Afrovision Group
 * @copyright  (c) 2016-2017 Afrovision Group
 * @license    http://www.afrovisiongroup.com/license.html
 */
class Model_Sliderfr extends ORM
{
	public $_table_name = 'sliders_fr';

	public function getPicture()
	{
		if (empty($this->photo)) {
			return "http://placehold.it/100x100";
		} else {
			return url::base().'media/uploads/sliders/'.$this->photo;
		}
	}

	public function add_slider($data)
	{
		$this->header = $data['header'];
		$this->content = $data['content'];
		$this->photo = $data['photo'];
		$this->link = $data['location'];
		$this->sort = $data['sort'];
		$this->deleted = 'false';
		$this->datetime = time();
		return $this->save();
	}

	public function update_slider($data)
	{
		$this->header = $data['header'];
		$this->content = $data['content'];
		$this->link = $data['location'];
		$this->sort = $data['sort'];
		return $this->save();
	}

	public function update_photo($data)
	{
		$this->photo = $data;
		return $this->save();
	}
}