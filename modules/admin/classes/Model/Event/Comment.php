<?php defined('SYSPATH') or die('No direct script access');
/**
* 
*/
class Model_Event_Comment extends ORM
{
	protected $_belongs_to = array(
		'event' => array('model' => 'Event'),
	);

	public function getThumb()
	{
		if (empty($this->thumb)) {
			return "http://placehold.it/100x100";
		} else {
			return url::base()."media/upload/thumb/".$this->thumb;
		}
	}

	public function getPicture()
	{
		if (empty($this->photo)) {
			return "http://placehold.it/100x100";
		} else {
			return url::base()."media/upload/".$this->photo;
		}
	}
}