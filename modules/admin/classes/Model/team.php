<?php defined('SYSPATH') or die('No direct script access');

/**
*  get platform team members
*/
class Model_Team extends ORM
{
	public function getThumb() {
		if (empty($this->thumb)) {
			return "http://placehold.it/100x100";
		} else {
			return url::base()."media/images/teams/thumb/".$this->thumb;
		}
	}

	public function getPicture() {
		if (empty($this->photo)) {
			return "http://placehold.it/100x100";
		} else {
			return url::base()."media/images/teams/".$this->photo;
		}
	}	
}