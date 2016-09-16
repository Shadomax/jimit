<?php defined('SYSPATH') or die('No direct script access');

/**
*  Service model to pull platform services from the database table
* 	@param 	services
*/
class Model_Type_Program extends ORM
{
	public function getThumb() {
		if (empty($this->thumb)) {
			return "http://placehold.it/440x350";
		} else {
			return url::base()."media/images/projects/thumb/".$this->thumb;
		}
	}

	public function getPicture() {
		if (empty($this->photo)) {
			return "http://placehold.it/100x100";
		} else {
			return url::base()."media/images/projects/".$this->photo;
		}
	}

	//lets check if one option has been selected from the let's chat option
	public function isSelect($web = NULL, $seo = NULL, $adverb = NULL)
	{
		if ($web == 'web' || $seo == 'seo' || $adverb == 'adverb') {
			return True;
		}
		elseif ($web == '' && $seo == '' && $adverb == '') {
		 	return False;
		 } else {
			return False;
		}
	}	
}
