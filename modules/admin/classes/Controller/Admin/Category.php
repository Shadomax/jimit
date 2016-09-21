<?php defined('SYSPATH') or die('No direct script access!');

/**
* Controller category
*/
class Controller_Admin_Category extends Controller_Authenticated
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
		$user = Auth::instance()->get_user();
		$view = View::factory('admin/admin_category/home')
			->bind('user', $user)
			->bind('categories', $categories)
			->bind('count', $count)
			->bind('message', $message);
		$message = Session::instance()->get_once('message');
		$categories = ORM::factory('Category')->where('deleted', '=', 'false')->order_by('sort', 'asc')->find_all();
		$count = ORM::factory('Category')->where('deleted', '=', 'false')->count_all();
		$this->template->title = 'Admin Category ';
		$this->template->user = $user;
		$this->template->content = $view;
	}

	public function action_viewDeleted()
	{

		$view = View::factory('admin/admin_category/view_deleted')
			->bind('user', $user)
			->bind('categories', $categories)
			->bind('count', $count)
			->bind('message', $message);
		$message = Session::instance()->get_once('message');
		$user = Auth::instance()->get_user();
		$categories = ORM::factory('Category')->where('deleted', '=', 'true')->find_all();
		$count = ORM::factory('Category')->where('deleted', '=', 'true')->count_all();
		$this->template->title = 'Admin Deleted Category ';
		$this->template->user = $user;
		$this->template->content = $view;
	}

	//lets add category action
	public function action_add()
	{
		$category = ORM::factory('Category');
		$user = Auth::instance()->get_user();
		$view = view::factory('admin/admin_category/add')
			->set('user', $user)
			->bind('errors', $errors)
			->bind('values', $_POST);
		$this->template->user = $user;
		$this->template->title = "Admin Add Category ";
		//lets check if the contact form has been submitted via $_POST
            if ($this->request->post()) {
                //lets assign the posted data to a variable @var data
				$data = $this->request->post();
				//lets validate the the posted data for correctness
				$validation = Validation::factory($data)
					->rule('name', 'not_empty')
					->rule('content', 'not_empty')
					->rule('sort', 'numeric')
	                ->rule('sort', 'not_empty');

                if ($validation->check())
                {
					//lets save the values to the database
					$category->name = $data['name'];
					$category->content = $data['content'];
					$category->deleted = 'false';
					$category->sort = $data['sort'];
					$category->datetime = time();
					$category->save();
					$success = "<strong>SUCCESS!!</strong><br /> Category has been added successfully.";
					Session::instance()->set('message', $success);
                    $this->redirect('admin/category', 302);
                } else {
                    // Validation failed, collect the errors
                    $errors = $validation->errors('general');
                    
                }
            }
		$this->template->content = $view;
	}

	//lets create edit category action
	public function action_edit($id = NULL)
	{
		$this->template->title = "Admin Edit Category ";
		$id = $this->request->param('id');
		$user = Auth::instance()->get_user();
		$this->template->user = $user;
		$view = view::factory('admin/admin_category/edit')
			->bind('category', $category)
			->set('user', $user)
			->bind('errors', $errors);
		$category = ORM::factory('Category')->where('id', '=', $id)->find();
		if ($this->request->post()) {
			//lets merge the two arrays
            $data = $this->request->post();
			$validation = Validation::factory($data)
				->rule('name', 'not_empty')
				->rule('sort', 'numeric')
				->rule('sort', 'not_empty')
				->rule('content', 'not_empty');
			if ($validation->check()) {
				//lets update the values to the database
				$category->name = $data['name'];
				$category->content = $data['content'];
				$category->sort = $data['sort'];
	            $category->save();
	            $success = "<strong>SUCCESS!!</strong><br /> Category has been updateed successfully.";
	            Session::instance()->set('message', $success);
                $this->redirect('admin/category', 302);
			}
			else {
				$errors = $validation->errors('general');
			}
		}
		//display the edit form
		$this->template->content = $view; 
	}

	//lets create delete action
	public function action_delete($id = '')
	{
		$this->auto_render = 'false';
		Auth::instance()->get_user();
		$id = $this->request->param('id');
		$category = ORM::factory('Category')->where('id', '=', $id)->find();
		$category->deleted = 'true';
		if ($category->save()) {
			$success = "<strong>SUCCESS!!</strong><br /> Category has been deleted successfully.";
			Session::instance()->set('message', $success);
			$this->redirect('admin/category', 302);
		} else {
			$errors = "<strong>WARNING!!</strong><br /> Unable to delete category.";
			Session::instance()->set('message', $errors);
			$this->redirect('admin/category', 302);
		}
	}

	//lets create restore action
	public function action_restore($id = '')
	{
		$this->auto_render = 'false';
		Auth::instance()->get_user();
		$id = $this->request->param('id');
		$category = ORM::factory('Category')->where('id', '=', $id)->find();
		$category->deleted = 'false';
		if ($category->save()) {
			$success = "<strong>SUCCESS!!</strong><br /> Category has been restored successfully.";
			Session::instance()->set('message', $success);
			$this->redirect('admin/category/viewDeleted', 302);
		} else {
			$errors = "<strong>WARNING!!</strong><br /> Unable to restore category.";
			Session::instance()->set('message', $errors);
			$this->redirect('admin/category/viewDeleted', 302);
		}
	}

	//lets create restore action
	public function action_permenantDelete($id = '')
	{
		$this->auto_render = 'false';
		Auth::instance()->get_user();
		$id = $this->request->param('id');
		$category = ORM::factory('Category')->where('id', '=', $id)->find();
		if ($category->delete()) {
			$success = "<strong>SUCCESS!!</strong><br /> Category and its associated articles has permenantly been deleted successfully.";
			Session::instance()->set('message', $success);
			$this->redirect('admin/category/viewDeleted', 302);
		} else {
			$errors = "<strong>WARNING!!</strong><br /> Unable to permenantly delete category and its associated articles.";
			Session::instance()->set('message', $errors);
			$this->redirect('admin/category/viewDeleted', 302);
		}
	}
}