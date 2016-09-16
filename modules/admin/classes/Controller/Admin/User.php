<?php defined('SYSPATH') or die('No direct script access!');
/**
* User controller for admin to add users
*/
class Controller_Admin_User extends Controller_Authenticated
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
		$this->template->title = "User ";
		$view = view::factory($this->lang.'/admin/admin_users/home')
			->bind('user', $user)
			->bind('users', $users)
			->bind('count', $count);
		$count = ORM::factory('user')->count_all();
		$user = Auth::instance()->get_user();
		$users = ORM::factory('user')->order_by('id', 'asc')->find_all();
		$this->template->user = $user;
		$this->template->content = $view;
	}

	public function action_add()
	{
		$this->template->title = "Add User ";
		$view = view::factory('admin_users/add')
			->bind('values', $_POST)
			->bind('errors', $errors)
			->bind('user', $user);
		$user = Auth::instance()->get_user();
		$this->template->user = $user;
		if ($this->request->post()) {
			//merge the two arrays for easy validation
			$data = array_merge($this->request->post(), $_FILES);
		}
		$this->template->content = $view;
	}
}