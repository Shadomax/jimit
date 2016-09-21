<?php defined('SYSPATH') or die('No direct script access!');
/**
* admin pages controller for managing pages
*/
class Controller_Admin_Page extends Controller_Authenticated
{
	//public $template = "admin_template";
	public $auth_required = 'admin';
	public $assert_auth_actions = array(
		'index' => array('login'),
		'add'	=> array('login'),
		'edit'	=> array('login'),
		'delete' => array('login'),
	);

	public function action_index()
	{
		$this->template->title = "Admin Pages";
		$view = view::factory('admin/admin_pages/home')
			->bind('user', $suer)
			->bind('pages', $pages)
			->bind('count', $count)
			->bind('message', $message);
		$message = Session::instance()->get_once('message');
		$user = Auth::instance()->get_user();
		$pages = ORM::factory('Page')->where('deleted', '=', 'false')->order_by('id','asc')->find_all();
		$count = ORM::factory('Page')->where('deleted', '=', 'false')->count_all();
		$this->template->user = $user;
		$this->template->content = $view;
	}

	public function action_viewDeleted()
	{
		$this->template->title = "Admin Deleted Pages";
		$view = view::factory('admin/admin_pages/view_deleted')
			->bind('user', $suer)
			->bind('pages', $pages)
			->bind('count', $count)
			->bind('message', $message);
		$message = Session::instance()->get_once('message');
		$user = Auth::instance()->get_user();
		$pages = ORM::factory('Page')->where('deleted', '=', 'true')->order_by('id','asc')->find_all();
		$count = ORM::factory('Page')->where('deleted', '=', 'true')->count_all();
		$this->template->user = $user;
		$this->template->content = $view;
	}

	//lets create add page
	public function action_add()
	{
		$this->template->title = "Admin add Page";
		$page = ORM::factory('Page');
		$page_fr = ORM::factory('Pagefr');
		$view = view::factory('admin/admin_pages/add')
			->bind('user', $user)
			->bind('values', $_POST)
			->bind('errors', $errors);
		$user = Auth::instance()->get_user();
		$this->template->user = $user;
		if ($this->request->post()) {
			//lets validate the values
			$data = $this->request->post();
			$validation = Validation::factory($data)
				->rule('title', 'not_empty')
				->rule('content', 'not_empty');
			if ($validation->check()) {
				//if there were files uploaded, validate them
		        if ($_FILES['file']['size'] > 0) {
		            $valFiles = Model_Page::validatePhoto($_FILES);
		            if ($valFiles->check()) {
		                $image = $_FILES['file'];
						$directory = Upload::$default_directory.'pages/';
						if ($file = Upload::save($image))
						{
						    $filename = 'page_'. uniqid(). '_' . $_FILES['file']['name'];
							$filename = str_replace(" ", "_", $filename);

						    Image::factory($file)
						       	->save($directory.$filename);

						    //save the file in db
						    $page->addPhoto($filename);
						    //french photo
						    $page_fr->addPhoto($filename);
						    // Delete the temporary file
						    unlink($file);
						}
		            } else {
		                $errors = $valFiles->errors('general');
		            }
		        }
				if (empty($errors)) {
					$page->addPage($data);
					//french add page
					$page_fr->addPage($data);
					$success = "<strong>SUCCESS!!</strong><br /> The page has been successfully added. <br />Please use the form below to edit the page content for french display";
					Session::instance()->set('message', $success);
					$this->redirect('admin/pages/fr_edit/'.$page->id, 302);
				}
			} else {
				$errors = $validation->errors('general');
			}
		}
		$this->template->content = $view;
	}

	//lets edit the english pages
	public function action_edit($id = '')
	{
		$id = $this->request->param('id');
		$page = ORM::factory('Page')->where('id','=',$id)->find();
		$view = view::factory('admin/admin_pages/edit_page')
			->bind('user', $user)
			->set('page', $page)
			->bind('errors', $errors);
		$user = Auth::instance()->get_user();
		$this->template->user = $user;
		$this->template->title = "Admin Edit English Page";
		if ($this->request->post()) {
			$data = $this->request->post();
			$validation = Validation::factory($data)
				->rule('title', 'not_empty')
				->rule('content', 'not_empty');
			if ($validation->check()){
				//if there were files uploaded, validate them
		        if ($_FILES['file']['size'] > 0) {
		            $valFiles = Model_Page::validatePhoto($_FILES);
		            if ($valFiles->check()) {
		                $image = $_FILES['file'];
						$directory = Upload::$default_directory.'pages/';
						if ($file = Upload::save($image))
						{
						    $filename = 'page_'. uniqid(). '_' . $_FILES['file']['name'];
							$filename = str_replace(" ", "_", $filename);

						    Image::factory($file)
						       	->save($directory.$filename);

						    //save the file in db
						    $page->addPhoto($filename);
						    $page_fr = ORM::factory('Pagefr', $id);
						    $page_fr->addPhoto($filename);
						    // Delete the temporary file
						    unlink($file);
						}
		            } else {
		                $errors = $valFiles->errors('general');
		            }
		        }
				if (empty($errors)) {
					$page->addPage($data);
					$success = "<strong>SUCCESS!!</strong><br /> English page has been updated successfully. Please use the form below to update the French page.";
					Session::instance()->set('message', $success);
					//lets redirect to to the french edit action
					$this->redirect('admin/pages/fr_edit'.'/'.$page->id, 302);
				}
			}
			else {
				$errors = $validation->errors('models/page');
			}
		}
		$this->template->content = $view;
	}

	//lets edit the french pages
	public function action_fr_edit($id = Null)
	{
		$id = $this->request->param('id');
		$page = ORM::factory('Pagefr')->where('id','=',$id)->find();
		$view = view::factory('admin/admin_pages/edit_fr')
			->bind('user', $user)
			->set('page', $page)
			->bind('message', $message)
			->bind('errors', $errors);
		$message = Session::instance()->get_once('message');
		$user = Auth::instance()->get_user();
		$this->template->user = $user;
		$this->template->title = "Admin Edit French Page";
		if ($this->request->post()) {
			$data = $this->request->post();
			$validation = Validation::factory($data)
				->rule('title', 'not_empty')
				->rule('content', 'not_empty');
			if ($validation->check()){
				$page->addPage($data);
				$success = "<strong>SUCCESS!!</strong><br /> The French page has been successfully updated.";
				Session::instance()->set('message', $success);
				$this->redirect('admin/pages', 302);
			}
			else {
				$errors = $validation->errors('models/page');
			}
		}
		$this->template->content = $view;
	}

	//lets create delete page
	public function action_delete($id = Null)
	{
		Auth::instance()->get_user();
		$this->auto_render = false;
        $id = $this->request->param('id');
        $page = ORM::factory('Page', $id);
        $page->deleted = 'true';
        if ($page->save()) {
        	$success = "<strong>SUCCESS!!</strong><br /> The page has been successfully deleted.";
	        Session::instance()->set('message', $success);
	        $this->redirect('admin/pages', 302);
        } else {
        	$errors = "<strong>WARNING!!</strong><br /> Unable to delete the page at the moment. Try Again Later...";
	        Session::instance()->set('message', $success);
	        $this->redirect('admin/pages', 302);
        }
	}

	//lets create restore page
	public function action_restore($id = Null)
	{
		Auth::instance()->get_user();
		$this->auto_render = false;
        $id = $this->request->param('id');
        $page = ORM::factory('Page', $id);
        $page->deleted = 'false';
        if ($page->save()) {
        	$success = "<strong>SUCCESS!!</strong><br /> The page has been successfully restored.";
	        Session::instance()->set('message', $success);
	        $this->redirect('admin/pages/viewDeleted', 302);
        } else {
        	$errors = "<strong>WARNING!!</strong><br /> Unable to restore the page at the moment. Try Again Later...";
	        Session::instance()->set('message', $success);
	        $this->redirect('admin/pages/viewDeleted', 302);
        }
	}

	//lets create permenant delete page
	public function action_PermenantDelete($id = Null)
	{
		Auth::instance()->get_user();
		$this->auto_render = false;
        $id = $this->request->param('id');
        $page = ORM::factory('Page', $id);
        $page_fr = ORM::factory('Pagefr', $id);
        if ($page->delete() && $page_fr->delete()) {
        	$success = "<strong>SUCCESS!!</strong><br /> The page has been permenantly deleted successfully.";
	        Session::instance()->set('message', $success);
	        $this->redirect('admin/pages/viewDeleted', 302);
        } else {
        	$errors = "<strong>WARNING!!</strong><br /> Unable to permenantly delete the page at the moment. Try Again Later...";
	        Session::instance()->set('message', $success);
	        $this->redirect('admin/pages/viewDeleted', 302);
        }
	}
}