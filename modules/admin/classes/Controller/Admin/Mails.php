<?php defined('SYSPATH') or die('No direct script access!');
/**
* Mail Controller
*/
class Controller_Admin_Mails extends Controller_Dev
{
	public $auth_required = 'admin';
	public $assert_auth_actions = array(
		'index' => array('login'),
		'add'	=> array('login'),
		'edit'	=> array('login'),
		'delete' => array('login'),
	);

	public function action_index()
	{
		$this->template->title = "Admin Mailbox ";
		$mails = ORM::factory('mail')->where('status', '=', 1)->order_by('date_added', 'asc')->find_all();
		$view = view::factory('admin_mails/home')
			->set('mails', $mails)
			->bind('user', $user)
			->bind('count', $count);
		$user = Auth::instance()->get_user();
		$count = ORM::factory('mail')->where('status', '=', 1)->and_where('filter', '=', 'inbox')->count_all();
		$this->template->user = $user;
		$this->template->content = $view;
	}
}