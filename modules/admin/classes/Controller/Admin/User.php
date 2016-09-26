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

	public function before()
	{
        $user = Auth::instance()->get_user();
        View::factory()->set_global('user', $user);
		parent::before();
        //$this->_user_auth();
	}

	public function action_index()
	{
		$this->template->title = "Admin Users ";
		$view = view::factory('admin/admin_users/home')
			->bind('user', $user)
			->bind('users', $users)
			->bind('count', $count)
			->bind('message', $message)
			->bind('pagination', $pagination);
		$message = Session::instance()->get_once('message');
		$count = ORM::factory('User')->count_all();
		$user = Auth::instance()->get_user();
		// count number of users
		$total_user = ORM::factory('User')->where('deleted', '=', 'false')->count_all();

		// set-up the pagination
		$pagination = Pagination::factory(array(
		    'total_items' => $total_user,
		    'items_per_page' => 100, // this will override the default set in your config
		));
		
		$users = ORM::factory('User')->where('deleted', '=', 'false')->offset($pagination->offset)->limit($pagination->items_per_page)->order_by('id', 'asc')->find_all();
		$this->template->user = $user;
		$this->template->content = $view;
	}

	public function action_viewDeleted()
	{
		// count number of users
		$total_user = ORM::factory('User')->where('deleted', '=', 'true')->count_all();

		// set-up the pagination
		$pagination = Pagination::factory(array(
		    'total_items' => $total_user,
		    'items_per_page' => 100, // this will override the default set in your config
		));

		$users = ORM::factory('User')->where('deleted','=', 'true')->offset($pagination->offset)->limit($pagination->items_per_page)->order_by('id','asc')->find_all();
		$view = view::factory('admin/admin_users/view_deleted')
			->bind('user', $user)
			->set('users', $users)
			->bind('count', $count)
			->bind('message', $message)
			->bind('pagination', $pagination);
		$message = Session::instance()->get_once('message');
		$user = Auth::instance()->get_user();
		$count = ORM::factory('User')->where('deleted', '=', 'true')->count_all();
		$this->template->user = $user;
		$this->template->title = "Admin Deleted Users ";
		$this->template->content = $view;
	}

	public function action_changePassword($id = '')
	{
		$user = Auth::instance()->get_user();
		$this->template->title = 'Admin Change User Password ';
		$this->template->user = $user;
		$view = View::factory('admin/admin_users/change_password')
			->bind('user', $user)
			->bind('errors', $errors)
			->bind('values', $_POST);
		if ($this->request->post()) {
			$data = $this->request->post();
			$validate = Validation::factory($data)
				->rule('password', 'not_empty')
	            ->rule('password', 'min_length', array(':value', '6'))
	            ->rule('password_confirm', 'matches', array(':validation', 'password_confirm', 'password'));
			if ($validate->check()) {
				$id = $this->request->param('id');
				$user = ORM::factory('User', $id);
				$data['username'] = $user->username;
				$data['email'] = $user->email;
				$user->update_user($data, array('username', 'password', 'email',));
				$success = "<strong>SUCCESS!!</strong><br /> User password has been changed successfully.";
				Session::instance()->set('message', $success);
				$this->redirect('admin/users', 302);
			} else {
				$errors = $validate->errors('general');
			}
		}
		$this->template->content = $view;
	}

	public function action_add()
	{
		$this->template->title = "Admin Add User ";
		$view = view::factory('admin/admin_users/add')
			->bind('values', $_POST)
			->bind('errors', $errors)
			->bind('user', $user);
		$user = Auth::instance()->get_user();
		$this->template->user = $user;
		if ($this->request->post()) {
			$data = $this->request->post();
			$validate = $user->validate($data);
			if ($validate->check()) {
				$user = ORM::factory('User');
				$user->create_user($data, array('username', 'password', 'email', ));
                $user->add('roles', ORM::factory('Role')->find(1));
                $user->deleted = 'false';
                $user->datetime = time();
                $user->save();
                $success = "<strong>SUCCESS!!</strong><br /> User has been added successfully.";
				Session::instance()->set('message', $success);
				$this->redirect('admin/users', 302);
			} else {
				$errors = $validate->errors('general');
			}
		}
		$this->template->content = $view;
	}

	//lets create delete User action
	public function action_delete($id = '')
	{
		$this->auto_render = false;
        $user = Auth::instance()->get_user();
        $id = $this->request->param('id');
        $user = ORM::factory('User',$id);
        $user->deleted = 'true';
        if ($user->save()) {
        	$success = "<strong>SUCCESS!!</strong><br /> User has been deleted successfully.";
        	Session::instance()->set('message',$success);
        	$this->redirect('admin/users', 302);
        } else {
        	$errors = "<strong>WARNING!!</strong><br /> Unable to delete User at this at moment. Please Try Later...";
	        Session::instance()->set('message',$errors);
	        $this->redirect('admin/users', 302);
    	}
	}

	//lets create restore User action
	public function action_restore($id = '')
	{
		$this->auto_render = false;
        $user = Auth::instance()->get_user();
        $id = $this->request->param('id');
        $user = ORM::factory('User',$id);
        $user->deleted = 'false';
        if ($user->save()) {
        	$success = "<strong>SUCCESS!!</strong><br /> User has been restored successfully.";
        	Session::instance()->set('message',$success);
        	$this->redirect('admin/users/viewDeleted', 302);
        } else {
        	$errors = "<strong>WARNING!!</strong><br /> Unable to restore User at this at moment. Please Try Later...";
	        Session::instance()->set('message',$errors);
	        $this->redirect('admin/users/viewDeleted', 302);
    	}
	}

	//lets create delete User action
	public function action_permenantDelete($id = NULL)
	{
		$this->auto_render = false;
        $user = Auth::instance()->get_user();
        $id = $this->request->param('id');
        $slider = ORM::factory('Slider',$id);
        if ($slider->delete()) {
        	$success = "<strong>SUCCESS!!</strong><br /> User has been permenantly deleted successfully.";
        	Session::instance()->set('message',$success);
        	$this->redirect('admin/users/viewDeleted', 302);
        } else {
        	$errors = "<strong>WARNING!!</strong><br /> Unable to delete User at this at moment. Please Try Later...";
	        Session::instance()->set('message',$errors);
	        $this->redirect('admin/users/viewDeleted', 302);
    	}
	}
}