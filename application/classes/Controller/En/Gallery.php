<?php defined('SYSPATH') or die('No direct script access');

/**
* 
*/
class Controller_En_Gallery extends Controller_Application
{
	public function action_index()
	{
		$this->template->title = 'Gallery ';
		$view = View::factory($this->lang.'/gallery/home')
			->bind('galleries', $galleries);
		$galleries = ORM::factory('Gallery')->where('deleted', '=', 'false')->order_by('sort', 'asc')->find_all();
		$this->template->content = $view;
	}
}