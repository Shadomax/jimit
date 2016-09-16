<?php defined('SYSPATH') or die('No direct script access');
/**
* Admin services controller
*/
class Controller_Admin_Services extends Controller_Dev
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
		$services = ORM::factory('service')->where('deleted','=', 'false')->order_by('sort','asc')->find_all();
		$view = view::factory('admin_services/home')
			->bind('user', $user)
			->set('services', $services)
			->bind('count', $count);
		$user = Auth::instance()->get_user();
		$count = ORM::factory('service')->where('deleted', '=', 'false')->count_all();
		$this->template->user = $user;
		$this->template->title = "Services";
		$this->template->content = $view;
	}

	//lets add services action
	public function action_add()
	{
		$service = ORM::factory('service');
		$user = Auth::instance()->get_user();
		$view = view::factory('admin_services/add')
			->set('user', $user)
			->bind('errors', $errors)
			->bind('values', $_POST);
		$this->template->user = $user;
		$this->template->title = "Add Services ";
		//lets check if the contact form has been submitted via $_POST
            if ($this->request->post() || $_FILES) {
                //lets assign the posted data to a variable @var data
				$data = array_merge($this->request->post(), $_FILES);
				//lets validate the the posted data for correctness
				$validation = Validation::factory($data)
					->rule('title', 'not_empty')

					->rule('feature', 'min_length', array(':value', '2'))
					->rule('feature', 'max_length', array(':value', '3'))

					->rule('content', 'not_empty')
	     
	                ->rule('file', 'Upload::not_empty')
	                ->rule('file', 'Upload::size', array(':value', '4M'))
	                ->rule('file', 'Upload::type', array(':value', array('jpeg','jpg','png','gif')))
	                ->rule('file', 'Upload::valid');

                if ($validation->check())
                {
						//lets save the picture of the service
						$image = $_FILES['file'];
						$directory = Upload::$default_directory.'services/';
						//lets save the picture of the service
						if ($file = Upload::save($image, NULL, $directory))
				        {
				            $filename = 'services_'. uniqid(). '_' . $_FILES['file']['name'];
							$filename = str_replace(" ", "_", $filename);
				 
				            Image::factory($file)
				                ->resize(2000, 1202, Image::AUTO)
				                ->save($directory.$filename);
				 
				            // Delete the temporary file
				            unlink($file);
				        }

						//lets save the values to the database service table
						$service->title = HTML::chars($data['title']);
						$service->feature = HTML::chars($data['feature']);
						$service->content = HTML::chars($data['content']);
						$service->photo = HTML::chars($filename);
						$service->seo_title = HTML::chars($data['seo_title']);
						$service->seo_description = HTML::chars($data['seo_description']);
						$service->seo_keyword = HTML::chars($data['seo_keywords']);
						$service->deleted = 'false';
						$service->sort = HTML::chars($data['sort']);
						$service->date_added = time();
						$service->save();
                        $this->redirect('admin/services', 302);
                } else {
                    // Validation failed, collect the errors
                    $errors = $validation->errors('models/service');
                    
                }
            }
		$this->template->content = $view;
	}

	//lets create edit service action
	public function action_edit($id = NULL)
	{
		$this->template->title = "Edit Service";
		$service_id = $this->request->param('id');
		$user = Auth::instance()->get_user();
		$this->template->user = $user;
		$view = view::factory('admin_services/edit_service')
			->bind('service', $service)
			->set('user', $user)
			->bind('errors', $errors);
		$service = ORM::factory('service')->where('id', '=', $service_id)->find();
		if ($this->request->post()) {
			//lets merge the two arrays
            $data = $this->request->post();
			$validation = Validation::factory($data)
				->rule('title', 'not_empty')
				->rule('content', 'not_empty');
			if ($validation->check()) {
					//lets save the values to the database service table
					$service->title = HTML::chars($data['title']);
					$service->content = HTML::chars($data['content']);
					$service->deleted = 'false';
					$service->sort = HTML::chars($data['sort']);

			        //if there were files uploaded, validate them
	                if ($_FILES['file']['size'] > 0) {

	                    $valFiles = new Validation($_FILES);
	                    $valFiles->rule('file', 'Upload::not_empty')
				                ->rule('file', 'Upload::size', array(':value', '4M'))
				                ->rule('file', 'Upload::type', array(':value', array('jpeg','jpg','png','gif')))
				                ->rule('file', 'Upload::valid');
	                    if ($valFiles->check()) {
	                    	$image = $_FILES['file'];
							$directory = Upload::$default_directory.'services/';
							//lets update the picture of the service
							if ($file = Upload::save($image))
					        {
					        	$filename = 'services_'. uniqid(). '_' . $_FILES['file']['name'];
								$filename = str_replace(" ", "_", $filename);
					            Image::factory($file)
					                ->resize(2000, 1202, Image::AUTO)
					                ->save($directory.'services_'.$filename);
					            //save the file in db
					            $service->photo = "services_".$filename;
					 
					            // Delete the temporary file
					            unlink($file);
					        }
	                    } else {
	                        $fileNotice = "<br><br><br><b>File Upload Errors: </b><br>";
	                        $errors = $valFiles->errors('models/service');
	                    }
	                }
	                $service->save();
                    $this->redirect('admin/services', 302);
			}
			else {
				$formerror = "Form Errors:";
				$errors = $validation->errors('models/service');
			}
		}
		//display the edit form
		$this->template->content = $view; 
	}

	//lets create delete service action
	public function action_delete($id = NULL)
	{
		$this->auto_render = false;
        $user = Auth::instance()->get_user();
        $id = $this->request->param('id');
        $service = ORM::factory('service',$id);
        $service->deleted = 'true';
        $service->save();
        //Session::instance()->set('notice',$notice);
        $this->redirect('admin/services', 302);
	}
}