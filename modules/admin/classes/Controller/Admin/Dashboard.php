<?php defined('SYSPATH') or die('No direct script access!');

/**
* 
*/
class Controller_Admin_Dashboard extends Controller_Authenticated
{
	public $auth_required = 'admin';
	public $assert_auth_actions = array(
	'dashboard' => array('login')
	);

	//get the date of today then multiply by seconds, minutes, and days to get time in a month
	public $past_date;

	public function action_index()
	{
		$this->redirect();
	}

	public function action_dashboard()
	{
		$this->request->param('id');
		$view = View::factory('/admin/admin_dashboard')
			->bind('user', $user)
			->bind('programs', $programs)
			->bind('articles', $articles)
			->bind('events', $events)
			->bind('event_comments', $event_comments)
			->bind('article_comments', $article_comments)
			->bind('users', $users)
			->bind('partners', $partners);

		$users = ORM::factory('User')->where('deleted', '=', 'false')->count_all();
		$programs = ORM::factory('Certificate_Program')->where('deleted', '=', 'false')->count_all();
		$articles = ORM::factory('Category_Article')->where('deleted', '=', 'false')->count_all();
		$events = ORM::factory('Event')->where('deleted', '=', 'false')->count_all();
		$partners = ORM::factory('Partner')->where('deleted', '=', 'false')->count_all();
		$event_comments = ORM::factory('Event_Comment')->where('deleted', '=', 'false')->and_where('datetime', '>', 3628800)->find_all();
		$article_comments = ORM::factory('Article_Comment')->where('deleted', '=', 'false')->and_where('datetime', '>', 3628800)->find_all();
		$user = Auth::instance()->get_user();
		$this->template->user = $user;
		$this->template->title = "Admin Dashboard";
		$this->template->content = $view;
	}
}