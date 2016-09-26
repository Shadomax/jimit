<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Fr_Welcome extends Controller_Site {

	public function action_index()
	{
		$content = View::factory($this->lang.'/home')
			->bind('partners', $partners)
			->bind('page', $page)
			->bind('programs', $programs)
			->bind('events', $events)
			->bind('articles', $articles)
			->bind('certificates', $certificates);
		$today = date('Y-m-d');
		$certificates = ORM::factory('Certificate')->where('deleted', '=', 'false')->find_all();
		$events = ORM::factory('Eventfr')->where('deleted', '=', 'false')->and_where('date', '>', $today)->order_by('sort', 'desc')->limit(4)->find_all();
		$articles = ORM::factory('Category_Articlefr')->where('deleted', '=', 'false')->and_where('datetime', '>', 3628800)->order_by('sort', 'desc')->limit(4)->find_all();
		$programs = ORM::factory('Certificate_Programfr')->where('deleted', '=', 'false')->and_where('popular', '=', 'yes')->order_by('sort', 'asc')->limit(4)->find_all();
		$partners = ORM::factory('Partner')->where('deleted', '=', 'false')->order_by('sort', 'asc')->find_all();
		$page = ORM::factory('Pagefr')->where('deleted', '=', 'false')->and_where('title', '=', 'Home')->find();
		$this->template->title = 'Accueil ';
		$this->template->content = $content;
	}

	public function action_search($level = '', $program = '')
	{
		$level = @$_GET['level'];
		$course = @$_GET['program'];
		$level_id = ORM::factory('Certificate')->where('deleted', '=', 'false')->and_where('name', '=', $level)->find()->id;
		// count number of programs
		$total_program = ORM::factory('Certificate_Programfr')->where('deleted', '=', 'false')->and_where('certificate_id', '=', $level_id)->and_where('title', 'like', '%'.$course.'%')->count_all();

		// set-up the pagination
		$pagination = Pagination::factory(array(
		    'total_items' => $total_program,
		    'items_per_page' => 50, // this will override the default set in your config
		));

		$popular = ORM::factory('Certificate_Programfr')->where('deleted', '=', 'false')->and_where('popular', '=', 'yes')->order_by('sort', 'asc')->limit(4)->find_all();

		$programs = ORM::factory('Certificate_Programfr')->where('deleted', '=', 'false')->and_where('certificate_id', '=', $level_id)->and_where('title', 'like', '%'.$course.'%')->offset($pagination->offset)->limit($pagination->items_per_page)->order_by('sort', 'desc')->find_all();

		$this->template->title = 'Résultats de la recherche ';
		$view = View::factory($this->lang.'/search')
			->bind('programs', $programs)
			->bind('pagination', $pagination)
			->bind('popular', $popular);
		$this->template->content = $view;
	}

} // End Welcome
