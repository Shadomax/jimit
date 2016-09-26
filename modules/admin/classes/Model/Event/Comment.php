<?php defined('SYSPATH') or die('No direct script access');
/**
* 
*/
class Model_Event_Comment extends ORM
{
	protected $_belongs_to = array(
		'event' => array('model' => 'Event'),
		'eventfr' => array(
			'model' => 'Eventfr',
			'foreign_key' => 'event_id',
			),
	);

	public function getThumb()
	{
		if (empty($this->thumb)) {
			return url::base().'admin_assets/dist/img/avatar5.png';
		} else {
			return url::base()."media/upload/thumb/".$this->thumb;
		}
	}

	public function getPicture()
	{
		if (empty($this->photo)) {
			return url::base().'admin_assets/dist/img/avatar5.png';
		} else {
			return url::base()."media/upload/".$this->photo;
		}
	}
}