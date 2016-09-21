<?php defined('SYSPATH') or die('No direct script access!');
/**
* Slider controller
* 
*/
class Controller_Admin_Slider extends Controller_Authenticated
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
		$this->request->param('id');
		$this->template->title = "Admin Slider";
		$view = View::factory('admin/admin_sliders/home')
			->bind('user', $user)
			->bind('sliders', $sliders)
			->bind('count', $count)
			->bind('message', $message);
		$message = Session::instance()->get_once('message');
		$user = Auth::instance()->get_user();
		$sliders = ORM::factory('Slider')->where('deleted', '=', 'false')->order_by('sort', 'asc')->find_all();
		$count = ORM::factory('Slider')->where('deleted', '=', 'false')->count_all();
		$this->template->user = $user;
		$this->template->content = $view;
	}

	public function action_viewDeleted()
	{
		$sliders = ORM::factory('Slider')->where('deleted','=', 'true')->order_by('sort','asc')->find_all();
		$view = view::factory('admin/admin_sliders/view_deleted')
			->bind('user', $user)
			->set('sliders', $sliders)
			->bind('count', $count)
			->bind('message', $message);
		$message = Session::instance()->get_once('message');
		$user = Auth::instance()->get_user();
		$count = ORM::factory('Slider')->where('deleted', '=', 'true')->count_all();
		$this->template->user = $user;
		$this->template->title = "Admin Deleted Slides ";
		$this->template->content = $view;
	}

	public function action_add()
	{
		$this->template->title = "Admin Add Slide ";
		$user = Auth::instance()->get_user();
		$this->template->user = $user;
		$view = view::factory('admin/admin_sliders/add')
			->set('user', $user)
			->bind('values', $_POST)
			->bind('errors', $errors);
		$slider = new Model_Slider;
		if ($this->request->post() || $_FILES) {
			//lets merge the two arrays
            $data = array_merge($_POST, $_FILES);
			$validation = Validation::factory($data)
				->rule('header', 'not_empty')
				->rule('content', 'not_empty')
				->rule('sort', 'not_empty')
				->rule('sort', 'numeric')
				->rule('file', 'Upload::not_empty')
                ->rule('file', 'Upload::size', array(':value', '4M'))
                ->rule('file', 'Upload::type', array(':value', array('jpeg','jpg','png','gif')))
                ->rule('file', 'Upload::valid');
			if ($validation->check()) {
					$image = $_FILES['file'];
					$directory = Upload::$default_directory.'sliders/';
					//lets save the picture of the service
					if ($file = Upload::save($image, NULL, $directory))
			        {
			            $filename = 'slide_'. uniqid(). '_' . $_FILES['file']['name'];
						$filename = str_replace(" ", "_", $filename);
			 			$data['photo'] = $filename;
			            Image::factory($file)
			                //->resize(2000, 1202, Image::AUTO)
			                ->save($directory.$filename);
			 
			            // Delete the temporary file
			            unlink($file);
			        }

					//lets save the values to the database
					$slider->add_slider($data);
					$slider_fr = ORM::factory('Sliderfr');
					$slider_fr->add_slider($data);
					$success = "<strong>SUCCESS!!</strong><br /> Slide has been added successfully. Please you the form below to edit for french display.";
					Session::instance()->set('message', $success);
                    $this->redirect('admin/sliders/fr_edit/'.$slider->id, 302);
			}
			else {
				$errors = $validation->errors('general');
			}
		}
		$this->template->content = $view;
	}

	//english edit action
	public function action_edit($id = '')
	{
		$id = $this->request->param('id');
		$view = View::factory('admin/admin_sliders/edit')
			->bind('user', $user)
			->bind('slider', $slider)
			->bind('errors', $errors);
		$slider = ORM::factory('Slider')->where('id', '=', $id)->find();
		$user = Auth::instance()->get_user();
		$this->template->user = $user;
		$this->template->title = "Admin Edit Slide";
		if ($this->request->post()) {
			//lets merge the two arrays
            $data = $this->request->post();
			$validation = Validation::factory($data)
				->rule('header', 'not_empty')
				->rule('content', 'not_empty')
				->rule('sort', 'not_empty')
				->rule('sort', 'numeric');
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
						$directory = Upload::$default_directory.'sliders/';
						//lets update the picture of the service
						if ($file = Upload::save($image))
					    {
					       	$filename = 'slide_'. uniqid(). '_' . $_FILES['file']['name'];
							$filename = str_replace(" ", "_", $filename);
					        Image::factory($file)
					            //->resize(2000, 1202, Image::AUTO)
					            ->save($directory.$filename);
					            //save the file in db
					            $slider->update_photo($filename);
					            $slider_fr = ORM::factory('Sliderfr', $id);
					            $slider_fr->update_photo($filename);
					 
					            // Delete the temporary file
					            unlink($file);
					        }
	                    } else {
	                        $errors = $valFiles->errors('models/slider');
	                    }
	                }
	                if (empty($errors)) {
	                	$slider->update_slider($data);
		                $success = "<strong>SUCCESS!!</strong><br /> Slide has been updated successfully. Please use the form below to edit slide for french display.";
		                Session::instance()->set('message', $success);
	                    $this->redirect('admin/sliders/fr_edit/'.$slider->id, 302);
	                }
			}
			else {
				$errors = $validation->errors('general');
			}
		}
		$this->template->content = $view;
	}

	//french edit action
	public function action_fr_edit($id = Null)
	{
		$id = $this->request->param('id');
		$view = View::factory('admin/admin_sliders/edit_fr')
			->bind('user', $user)
			->bind('slider', $slider)
			->bind('errors', $errors)
			->bind('message', $message);
		$message = Session::instance()->get_once('message');
		$slider = ORM::factory('Sliderfr')->where('id', '=', $id)->find();
		$user = Auth::instance()->get_user();
		$this->template->user = $user;
		$this->template->title = "Admin Edit Slide";
		if ($this->request->post()) {
			//lets merge the two arrays
            $data = $this->request->post();
			$validation = Validation::factory($data)
				->rule('header', 'not_empty')
				->rule('content', 'not_empty')
				->rule('sort', 'not_empty')
				->rule('sort', 'numeric');
			if ($validation->check()) {
	            $slider->update_slider($data);
		        $success = "<strong>SUCCESS!!</strong><br /> French Slide has been updated successfully.";
		        Session::instance()->set('message', $success);
	            $this->redirect('admin/sliders', 302);
			}
			else {
				$errors = $validation->errors('general');
			}
		}
		$this->template->content = $view;
	}

	//lets create delete Slide action
	public function action_delete($id = '')
	{
		$this->auto_render = false;
        $user = Auth::instance()->get_user();
        $id = $this->request->param('id');
        $slider = ORM::factory('Slider',$id);
        $slider_fr = ORM::factory('Sliderfr', $id);
        $slider_fr->deleted = 'true';
        $slider->deleted = 'true';
        if ($slider->save() && $slider_fr->save()) {
        	$success = "<strong>SUCCESS!!</strong><br /> Slide has been deleted successfully.";
        	Session::instance()->set('message',$success);
        	$this->redirect('admin/sliders', 302);
        } else {
        	$errors = "<strong>WARNING!!</strong><br /> Unable to delete Slide at this at moment. Please Try Later...";
	        Session::instance()->set('message',$errors);
	        $this->redirect('admin/sliders', 302);
    	}
	}

	//lets create restore Slide action
	public function action_restore($id = '')
	{
		$this->auto_render = false;
        $user = Auth::instance()->get_user();
        $id = $this->request->param('id');
        $slider = ORM::factory('Slider',$id);
        $slider_fr = ORM::factory('Sliderfr', $id);
        $slider->deleted = 'false';
        $slider_fr->deleted = 'false';
        if ($slider->save() && $slider_fr->save()) {
        	$success = "<strong>SUCCESS!!</strong><br /> Slide has been restored successfully.";
        	Session::instance()->set('message',$success);
        	$this->redirect('admin/sliders/viewDeleted', 302);
        } else {
        	$errors = "<strong>WARNING!!</strong><br /> Unable to restore Slide at this at moment. Please Try Later...";
	        Session::instance()->set('message',$errors);
	        $this->redirect('admin/sliders/viewDeleted', 302);
    	}
	}

	//lets create delete Slide action
	public function action_permenantDelete($id = NULL)
	{
		$this->auto_render = false;
        $user = Auth::instance()->get_user();
        $id = $this->request->param('id');
        $slider = ORM::factory('Slider',$id);
        $slider_fr = ORM::factory('Sliderfr', $id);
        if ($slider->delete() && $slider_fr->delete()) {
        	$success = "<strong>SUCCESS!!</strong><br /> Slide has been permenantly deleted successfully.";
        	Session::instance()->set('message',$success);
        	$this->redirect('admin/sliders/viewDeleted', 302);
        } else {
        	$errors = "<strong>WARNING!!</strong><br /> Unable to delete Slide at this at moment. Please Try Later...";
	        Session::instance()->set('message',$errors);
	        $this->redirect('admin/sliders/viewDeleted', 302);
    	}
	}
}