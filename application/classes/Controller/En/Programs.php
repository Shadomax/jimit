<?php defined('SYSPATH') or die('No direct script access');

/**
*  Programs controller
*/
class Controller_En_Programs extends Controller_Application
{

	public function action_index()
	{
		$programs = ORM::factory('Certificate_Program')->where('deleted', '=', 'false')->order_by('sort', 'asc')->find_all();
		//$page = ORM::factory('page')->where('title','=', 'Services')->and_where('status','=',1)->find();
		//$clients = ORM::factory('client')->where('feature','=','yes')->and_where('status','=',1)->order_by('sort','asc')->find_all();
		$view = new view($this->lang."/programs/home");
		//$view->page = $page;
		//$view->clients = $clients;
		$view->programs = $programs;
		//$view->title = $page->title;
		$this->template->title = 'Programs ';
		$this->template->content = $view;
	}

	public function action_program($id = '')
	{
		$id = $this->request->param('id');
		$program = ORM::factory('Certificate_Program')->where('id', '=', $id)->find();
		$view = View::factory($this->lang."/programs/program")
			->bind('program', $program);
		$this->template->title = $program->title;
		$this->template->content = $view;
	}
}