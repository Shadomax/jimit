<?php defined('SYSPATH') or die('No direct script access!');
/**
* Controller category
*/
class Controller_Admin_Certificate extends Controller_Authenticated
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
		$view = View::factory('admin/admin_certificates/home')
			->bind('user', $user)
			->bind('certificates', $certificates)
			->bind('count', $count)
			->bind('message', $message);
		$message = Session::instance()->get_once('message');
		$certificates = ORM::factory('Certificate')->where('deleted', '=', 'false')->order_by('id', 'asc')->find_all();
		$count = ORM::factory('Certificate')->where('deleted', '=', 'false')->count_all();
		$this->template->title = 'Admin Certificates ';
		$this->template->user = $user;
		$this->template->content = $view;
	}

	public function action_viewDeleted()
	{

		$view = View::factory('admin/admin_certificates/view_deleted')
			->bind('user', $user)
			->bind('certificates', $certificates)
			->bind('count', $count)
			->bind('message', $message);
		$message = Session::instance()->get_once('message');
		$user = Auth::instance()->get_user();
		$certificates = ORM::factory('Certificate')->where('deleted', '=', 'true')->find_all();
		$count = ORM::factory('Certificate')->where('deleted', '=', 'true')->count_all();
		$this->template->title = 'Admin Deleted Certificates ';
		$this->template->user = $user;
		$this->template->content = $view;
	}

	//lets add certificate action
	public function action_add()
	{
		$certificate = ORM::factory('Certificate');
		$user = Auth::instance()->get_user();
		$view = view::factory('admin/admin_certificates/add')
			->set('user', $user)
			->bind('errors', $errors)
			->bind('values', $_POST);
		$this->template->user = $user;
		$this->template->title = "Admin Add Certificate ";
		//lets check if the contact form has been submitted via $_POST
            if ($this->request->post()) {
                //lets assign the posted data to a variable @var data
				$data = $this->request->post();
				//lets validate the the posted data for correctness
				$validation = Validation::factory($data)
					->rule('name', 'not_empty')
					->rule('content', 'not_empty')
	                ->rule('length', 'not_empty');
                if ($validation->check())
                {
					//lets save the values to the database
					$certificate->name = $data['name'];
					$certificate->description = $data['content'];
					$certificate->deleted = 'false';
					$certificate->length = $data['length'];
					$certificate->datetime = time();
					$certificate->save();
					$success = "<strong>SUCCESS!!</strong><br /> Certificate has been added successfully.";
					Session::instance()->set('message', $success);
                    $this->redirect('admin/certificates', 302);
                } else {
                    // Validation failed, collect the errors
                    $errors = $validation->errors('general');
                    
                }
            }
		$this->template->content = $view;
	}

	//lets create edit certificate action
	public function action_edit($id = NULL)
	{
		$this->template->title = "Admin Edit Certificate ";
		$id = $this->request->param('id');
		$user = Auth::instance()->get_user();
		$this->template->user = $user;
		$view = view::factory('admin/admin_certificates/edit')
			->bind('certificate', $certificate)
			->set('user', $user)
			->bind('errors', $errors);
		$certificate = ORM::factory('Certificate')->where('id', '=', $id)->find();
		if ($this->request->post()) {
			//lets merge the two arrays
            $data = $this->request->post();
			$validation = Validation::factory($data)
				->rule('name', 'not_empty')
				->rule('content', 'not_empty')
	            ->rule('length', 'not_empty');
			if ($validation->check()) {
				//lets update the values to the database
				$certificate->name = $data['name'];
				$certificate->description = $data['content'];
				$certificate->length = $data['length'];
	            $certificate->save();
	            $success = "<strong>SUCCESS!!</strong><br /> Certificate has been updateed successfully.";
	            Session::instance()->set('message', $success);
                $this->redirect('admin/certificates', 302);
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
		$certificate = ORM::factory('Certificate')->where('id', '=', $id)->find();
		$certificate->deleted = 'true';
		if ($certificate->save()) {
			$success = "<strong>SUCCESS!!</strong><br /> Certificate has been deleted successfully.";
			Session::instance()->set('message', $success);
			$this->redirect('admin/certificates', 302);
		} else {
			$errors = "<strong>WARNING!!</strong><br /> Unable to delete certificate.";
			Session::instance()->set('message', $errors);
			$this->redirect('admin/certificates', 302);
		}
	}

	//lets create restore action
	public function action_restore($id = '')
	{
		$this->auto_render = 'false';
		Auth::instance()->get_user();
		$id = $this->request->param('id');
		$certificate = ORM::factory('Certificate')->where('id', '=', $id)->find();
		$certificate->deleted = 'false';
		if ($certificate->save()) {
			$success = "<strong>SUCCESS!!</strong><br /> Certificate has been restored successfully.";
			Session::instance()->set('message', $success);
			$this->redirect('admin/certificates/viewDeleted', 302);
		} else {
			$errors = "<strong>WARNING!!</strong><br /> Unable to restore certificate.";
			Session::instance()->set('message', $errors);
			$this->redirect('admin/certificates/viewDeleted', 302);
		}
	}

	//lets create restore action
	public function action_permenantDelete($id = '')
	{
		$this->auto_render = 'false';
		Auth::instance()->get_user();
		$id = $this->request->param('id');
		$certificate = ORM::factory('Certificate')->where('id', '=', $id)->find();
		if ($certificate->delete()) {
			$success = "<strong>SUCCESS!!</strong><br /> Certificate and its associated program has permenantly been deleted successfully.";
			Session::instance()->set('message', $success);
			$this->redirect('admin/certificates/viewDeleted', 302);
		} else {
			$errors = "<strong>WARNING!!</strong><br /> Unable to permenantly delete certificate and its associated programs.";
			Session::instance()->set('message', $errors);
			$this->redirect('admin/certificates/viewDeleted', 302);
		}
	}
}