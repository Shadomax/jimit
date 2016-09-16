<?php defined('SYSPATH') or die('No direct script access');
/**
* 
*/
class Model_Blog extends ORM
{
	
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