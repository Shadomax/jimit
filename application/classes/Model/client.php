<?php defined('SYSPATH') or die('No direct script access');
/**
* 
*/
class Model_Client extends ORM
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

	//lets verify if is a client
	public function isClient($name)
	{
		// Check if the client exists in the clients table in the database
    	$n = $this->where('name', '=', $name)->count_all();
    	if ($n > 0) {
    		return True;
    	} else {
    		return False;
    	}
	}
}