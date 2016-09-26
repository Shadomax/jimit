<?php defined('SYSPATH') or die('No direct script access');

/**
* 
*/
class Controller_En_About extends Controller_Application
{
	public function action_index()
	{
		$this->template->title = 'About Us ';
		$view = View::factory($this->lang.'/about/about')
			->bind('page', $page);

		$page = ORM::factory('Page')->where('deleted', '=', 'false')->and_where('title', '=', 'About')->find();

		$this->template->content = $view;
	}
}