<?php defined('SYSPATH') or die('No direct access allowed!');
/**
 * Default event french model
 *
 * @package    Jimit/Event
 * @author     Afrovision Group
 * @copyright  (c) 2016-2017 Afrovision Group
 * @license    http://www.afrovisiongroup.com/license.html
 */
class Model_Eventfr extends ORM
{
	protected $_has_many = array(
            'comments' => array(
            	'model' => 'Event_Comment',
            	'foreign_key' => 'event_id',
            	),
        );

	public $_table_name = 'events_fr';

	public function getPicture()
	{
		if (empty($this->photo)) {
			return "http://placehold.it/100x100";
		} else {
			return url::base().'media/images/events/'.$this->photo;
		}
	}

	public static function  getValidate($data)
	{
		return Validation::factory($data)
			->rule('name', 'not_empty')
			->rule('date', 'not_empty')
			->rule('time', 'not_empty')
			->rule('location', 'not_empty')
			->rule('content', 'not_empty')
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

	public function create_event($data)
	{
		$this->title = $data['name'];
		$this->content = $data['content'];
		$this->location = $data['location'];
		$this->date = $data['date'];
		$this->time = $data['time'];
		$this->sort = $data['sort'];
		$this->deleted = 'false';
		$this->datetime = time();
		return $this->save();
	}

	public function update_event($data)
	{
		$this->title = $data['name'];
		$this->content = $data['content'];
		$this->location = $data['location'];
		$this->date = $data['date'];
		$this->time = $data['time'];
		$this->sort = $data['sort'];
		return $this->save();
	}

	public function update_photo($data)
	{
		$this->photo = $data['photo'];
		return $this->save();
	}

} //End of Event model