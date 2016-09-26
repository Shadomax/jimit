<?php defined('SYSPATH') or die('No direct script access');

/**
* 
*/
class Controller_Fr_About extends Controller_Site
{
	public function action_index()
	{
		$this->template->title = 'À Propos ';
		$view = View::factory($this->lang.'/about/about')
			->bind('page', $page);

		$page = ORM::factory('Pagefr')->where('deleted', '=', 'false')->and_where('title', '=', 'About')->find();

		$this->template->content = $view;
	}
}