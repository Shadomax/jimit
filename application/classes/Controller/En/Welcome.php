<?php defined('SYSPATH') or die('No direct script access.');

class Controller_En_Welcome extends Controller_Application {

	public function action_index()
	{
		$content = View::factory($this->lang.'/home')
			->bind('partners', $partners)
			->bind('pages', $pages)
			->bind('programs', $programs)
			->bind('events', $events)
			->bind('articles', $articles);
		$today = date('Y-m-d');
		$events = ORM::factory('Event')->where('deleted', '=', 'false')->and_where('date', '>', $today)->order_by('sort', 'desc')->limit(4)->find_all();
		$articles = ORM::factory('Category_Article')->where('deleted', '=', 'false')->and_where('datetime', '>', 3628800)->order_by('sort', 'desc')->limit(4)->find_all();
		$programs = ORM::factory('Certificate_Program')->where('deleted', '=', 'false')->and_where('popular', '=', 'yes')->order_by('sort', 'asc')->limit(4)->find_all();
		$this->template->title = 'Home ';
		$this->template->content = $content;
	}

} // End Welcome
