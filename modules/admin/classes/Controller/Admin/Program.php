<?php defined('SYSPATH') or die('No direct script access');
/**
* Admin program controller
*/
class Controller_Admin_Program extends Controller_Authenticated
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
		// count number of programs
		$total_program = ORM::factory('Certificate_Program')->where('deleted', '=', 'false')->count_all();

		// set-up the pagination
		$pagination = Pagination::factory(array(
		    'total_items' => $total_program,
		    'items_per_page' => 100, // this will override the default set in your config
		));

		$programs = ORM::factory('Certificate_Program')->where('deleted','=', 'false')->offset($pagination->offset)->limit($pagination->items_per_page)->order_by('sort','asc')->find_all();
		$view = view::factory('admin/admin_programs/home')
			->bind('user', $user)
			->set('programs', $programs)
			->bind('count', $count)
			->bind('message', $message)
			->bind('pagination', $pagination);
		$message = Session::instance()->get_once('message');
		$user = Auth::instance()->get_user();
		$count = ORM::factory('Certificate_Program')->where('deleted', '=', 'false')->count_all();
		$this->template->user = $user;
		$this->template->title = "Admin Programs ";
		$this->template->content = $view;
	}

	public function action_viewDeleted()
	{
		// count number of programs
		$total_program = ORM::factory('Certificate_Program')->where('deleted', '=', 'true')->count_all();

		// set-up the pagination
		$pagination = Pagination::factory(array(
		    'total_items' => $total_program,
		    'items_per_page' => 100, // this will override the default set in your config
		));

		$programs = ORM::factory('Certificate_Program')->where('deleted','=', 'true')->offset($pagination->offset)->limit($pagination->items_per_page)->order_by('sort','asc')->find_all();
		$view = view::factory('admin/admin_programs/view_deleted')
			->bind('user', $user)
			->set('programs', $programs)
			->bind('count', $count)
			->bind('message', $message)
			->bind('pagination', $pagination);
		$message = Session::instance()->get_once('message');
		$user = Auth::instance()->get_user();
		$count = ORM::factory('Certificate_Program')->where('deleted', '=', 'true')->count_all();
		$this->template->user = $user;
		$this->template->title = "Admin Deleted Programs ";
		$this->template->content = $view;
	}

	//lets add program action
	public function action_add()
	{
		$program = ORM::factory('Certificate_Program');
		$user = Auth::instance()->get_user();
		$view = view::factory('admin/admin_programs/add')
			->set('user', $user)
			->bind('errors', $errors)
			->bind('values', $_POST)
			->bind('certificates', $certificates);
		$certificates = $program->certificate->find_all();
		$this->template->user = $user;
		$this->template->title = "Admin Add Program ";
		//lets check if the contact form has been submitted via $_POST
            if ($this->request->post()) {
                //lets assign the posted data to a variable @var data
				$data = array_merge($this->request->post(), $_FILES);
				//lets validate the the posted data for correctness
				$validation = Validation::factory($data)
					->rule('title', 'not_empty')
					->rule('certificate', 'not_empty')
					->rule('sort', 'not_empty')
					->rule('sort', 'numeric')
					->rule('explore', 'not_empty')
					->rule('learn', 'not_empty')
					->rule('cost', 'not_empty')
					->rule('requirement', 'not_empty')
					->rule('option', 'not_empty')
					->rule('fee', 'not_empty')
					->rule('location', 'not_empty')
	                ->rule('file', 'Upload::not_empty')
	                ->rule('file', 'Upload::size', array(':value', '4M'))
	                ->rule('file', 'Upload::type', array(':value', array('jpeg','jpg','png','gif')))
	                ->rule('file', 'Upload::valid');

                if ($validation->check())
                {
						//lets save the picture
						$image = $_FILES['file'];
						$directory = Upload::$default_directory.'programs/';
						//lets save the picture of the service
						if ($file = Upload::save($image, NULL, $directory))
				        {
				            $filename = 'program_'. uniqid(). '_' . $_FILES['file']['name'];
							$filename = str_replace(" ", "_", $filename);
				 
				            Image::factory($file)
				                ->save($directory.$filename);
				 			$data['photo'] = $filename;
				            // Delete the temporary file
				            unlink($file);
				        }

						//lets save the values to the database
						$program->create_program($data);
						//save the program to the french table too
						$program_fr = ORM::factory('Certificate_Programfr');
						$program_fr->create_program($data);
                        $success = "<strong>SUCCESS!!</strong><br /> Program has been added successfully. Please use the form below to edit program for french display.";
	                	Session::instance()->set('message', $success);
                    	$this->redirect('admin/programs/fr_edit/'.$program->id, 302);
                } else {
                    // Validation failed, collect the errors
                    $errors = $validation->errors('general');
                    
                }
            }
		$this->template->content = $view;
	}

	//lets create english edit program action
	public function action_edit($id = '')
	{
		$this->template->title = "Admin Edit Program ";
		$id = $this->request->param('id');
		$user = Auth::instance()->get_user();
		$this->template->user = $user;
		$view = view::factory('admin/admin_programs/edit')
			->bind('program', $program)
			->set('user', $user)
			->bind('errors', $errors)
			->bind('certificates', $certificates);
		$program = ORM::factory('Certificate_Program')->where('id', '=', $id)->find();
		$certificates = ORM::factory('Certificate')->where('deleted', '=', 'false')->find_all();
		if ($this->request->post()) {
			//lets merge the two arrays
            $data = $this->request->post();
			$validation = Validation::factory($data)
				->rule('title', 'not_empty')
				->rule('certificate', 'not_empty')
				->rule('sort', 'not_empty')
				->rule('sort', 'numeric')
				->rule('explore', 'not_empty')
				->rule('learn', 'not_empty')
				->rule('cost', 'not_empty')
				->rule('requirement', 'not_empty')
				->rule('option', 'not_empty')
				->rule('fee', 'not_empty')
				->rule('location', 'not_empty');
			if ($validation->check()) {
			        //if there were files uploaded, validate them
	                if ($_FILES['file']['size'] > 0) {

	                    $valFiles = new Validation($_FILES);
	                    $valFiles->rule('file', 'Upload::not_empty')
				                ->rule('file', 'Upload::size', array(':value', '4M'))
				                ->rule('file', 'Upload::type', array(':value', array('jpeg','jpg','png','gif')))
				                ->rule('file', 'Upload::valid');
	                    if ($valFiles->check()) {
	                    	$image = $_FILES['file'];
							$directory = Upload::$default_directory.'programs/';
							//lets update the picture of the service
							if ($file = Upload::save($image))
					        {
					        	$filename = 'program_'. uniqid(). '_' . $_FILES['file']['name'];
								$filename = str_replace(" ", "_", $filename);
					            Image::factory($file)
					                ->save($directory.$filename);
					            //save the file in db
					            $program->update_photo($filename);
					            //french program save
					            $program_fr = ORM::factory('Certificate_Programfr', $id);
					            $program_fr->update_photo($filename);
					 
					            // Delete the temporary file
					            unlink($file);
					        }
	                    } else {
	                        $errors = $valFiles->errors('general');
	                    }
	                }
	                if (empty($errors)) {
	                	$program->update_program($data);
	                	$success = "<strong>SUCCESS!!</strong><br /> Program has been updated successfully. Please use the form below to edit program for french display.";
	                	Session::instance()->set('message', $success);
                    	$this->redirect('admin/programs/fr_edit/'.$program->id, 302);
	                }
			}
			else {
				$errors = $validation->errors('general');
			}
		}
		//display the edit form
		$this->template->content = $view; 
	}

	//lets create french edit program action
	public function action_fr_edit($id = '')
	{
		$this->template->title = "Admin Edit Program ";
		$id = $this->request->param('id');
		$user = Auth::instance()->get_user();
		$this->template->user = $user;
		$view = view::factory('admin/admin_programs/edit_fr')
			->bind('program', $program)
			->bind('certificates', $certificates)
			->set('user', $user)
			->bind('errors', $errors)
			->bind('message', $message);
		$message = Session::instance()->get_once('message');
		$program = ORM::factory('Certificate_Programfr')->where('id', '=', $id)->find();
		$certificates = ORM::factory('Certificate')->where('deleted', '=', 'false')->find_all();
		if ($this->request->post()) {
			//lets merge the two arrays
            $data = $this->request->post();
			$validation = Validation::factory($data)
				->rule('title', 'not_empty')
				->rule('certificate', 'not_empty')
				->rule('sort', 'not_empty')
				->rule('sort', 'numeric')
				->rule('explore', 'not_empty')
				->rule('learn', 'not_empty')
				->rule('cost', 'not_empty')
				->rule('requirement', 'not_empty')
				->rule('option', 'not_empty')
				->rule('fee', 'not_empty')
				->rule('location', 'not_empty');
			if ($validation->check()) {
			    //save the edit program
	            $program->update_program($data);
	            $success = "<strong>SUCCESS!!</strong><br /> French program has been updated successfully.";
	            Session::instance()->set('message', $success);
                $this->redirect('admin/programs', 302);
			}
			else {
				$errors = $validation->errors('general');
			}
		}
		//display the edit form
		$this->template->content = $view; 
	}

	//lets create delete program action
	public function action_delete($id = '')
	{
		$this->auto_render = false;
        $user = Auth::instance()->get_user();
        $id = $this->request->param('id');
        $program = ORM::factory('Certificate_Program',$id);
        $program_fr = ORM::factory('Certificate_Programfr', $id);
        $program_fr->deleted = 'true';
        $program->deleted = 'true';
        if ($program->save() && $program_fr->save()) {
        	$success = "<strong>SUCCESS!!</strong><br /> Program has been deleted successfully.";
        	Session::instance()->set('message',$success);
        	$this->redirect('admin/programs', 302);
        } else {
        	$errors = "<strong>WARNING!!</strong><br /> Unable to delete Program at this at moment. Please Try Later...";
	        Session::instance()->set('message',$errors);
	        $this->redirect('admin/programs', 302);
    	}
	}

	//lets create restore program action
	public function action_restore($id = '')
	{
		$this->auto_render = false;
        $user = Auth::instance()->get_user();
        $id = $this->request->param('id');
        $program = ORM::factory('Certificate_Program',$id);
        $program_fr = ORM::factory('Certificate_Programfr', $id);
        $program->deleted = 'false';
        $program_fr->deleted = 'true';
        if ($program->save() && $program_fr->save()) {
        	$success = "<strong>SUCCESS!!</strong><br /> Program has been restored successfully.";
        	Session::instance()->set('message',$success);
        	$this->redirect('admin/programs/viewDeleted', 302);
        } else {
        	$errors = "<strong>WARNING!!</strong><br /> Unable to restore Program at this at moment. Please Try Later...";
	        Session::instance()->set('message',$errors);
	        $this->redirect('admin/programs/viewDeleted', 302);
    	}
	}

	//lets create delete program action
	public function action_permenantDelete($id = NULL)
	{
		$this->auto_render = false;
        $user = Auth::instance()->get_user();
        $id = $this->request->param('id');
        $program = ORM::factory('Certificate_Program',$id);
        $program_fr = ORM::factory('Certificate_Programfr', $id);
        if ($program->delete() && $program_fr->delete()) {
        	$success = "<strong>SUCCESS!!</strong><br /> Program has been permenantly deleted successfully.";
        	Session::instance()->set('message',$success);
        	$this->redirect('admin/programs/viewDeleted', 302);
        } else {
        	$errors = "<strong>WARNING!!</strong><br /> Unable to delete Program at this at moment. Please Try Later...";
	        Session::instance()->set('message',$errors);
	        $this->redirect('admin/programs/viewDeleted', 302);
    	}
	}
}