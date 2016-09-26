<?php defined('SYSPATH') or die('No direct script access');

/**
*  Programs controller
*/
class Controller_Fr_Programs extends Controller_Site
{

	public function action_index()
	{
		// count number of programs
		$total_program = ORM::factory('Certificate_Programfr')->where('deleted', '=', 'false')->count_all();

		// set-up the pagination
		$pagination = Pagination::factory(array(
		    'total_items' => $total_program,
		    'items_per_page' => 12, // this will override the default set in your config
		));
		$programs = ORM::factory('Certificate_Programfr')->where('deleted', '=', 'false')->offset($pagination->offset)->limit($pagination->items_per_page)->order_by('sort', 'asc')->find_all();
		$view = new view($this->lang."/programs/home");
		$view->pagination = $pagination;
		//$view->clients = $clients;
		$view->programs = $programs;
		//$view->title = $page->title;
		$this->template->title = 'Programmes ';
		$this->template->content = $view;
	}

	public function action_program($id = '')
	{
		$id = $this->request->param('id');
		$program = ORM::factory('Certificate_Programfr')->where('id', '=', $id)->find();
		$view = View::factory($this->lang."/programs/program")
			->bind('program', $program);
		$this->template->title = $program->title;
		$this->template->content = $view;
	}
}