<?php defined('SYSPATH') or die('No direct script access!');
/**
* Slider controller for admin management
* @author  Alain Mbeng
*/
class Controller_Admin_Sliders extends Controller_Dev
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
		$this->template->title = "Admin Sliders";
		$view = View::factory('admin_sliders/home')
			->bind('user', $user)
			->bind('sliders', $sliders)
			->bind('count', $count);
		$user = Auth::instance()->get_user();
		$sliders = ORM::factory('slider')->where('status', '=', 1)->order_by('id', 'asc')->find_all();
		$count = ORM::factory('slider')->where('status', '=', 1)->count_all();
		$this->template->user = $user;
		$this->template->content = $view;
	}

	public function action_add()
	{
		$this->template->title = "Admin Add Slider ";
		$user = Auth::instance()->get_user();
		$this->template->user = $user;
		$view = view::factory('admin_sliders/add')
			->set('user', $user)
			->bind('values', $_POST)
			->bind('errors', $errors);
		$slider = new Model_slider;
		if ($this->request->post() || $_FILES) {
			//lets merge the two arrays
            $data = array_merge($_POST, $_FILES);
			$validation = Validation::factory($data)
				->rule('title', 'not_empty')
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
			            $filename = 'sliders_'. uniqid(). '_' . $_FILES['file']['name'];
						$filename = str_replace(" ", "_", $filename);
			 
			            Image::factory($file)
			                ->resize(2000, 1202, Image::AUTO)
			                ->save($directory.$filename);
			 
			            // Delete the temporary file
			            unlink($file);
			        }

					//lets save the values to the database service table
					$slider->title = HTML::chars($data['title']);
					$slider->content = HTML::chars($data['content']);
					$slider->photo = HTML::chars($filename);
					$slider->status = 1;
					$slider->sort = HTML::chars($data['sort']);
					$slider->date_added = time();
					$slider->save();
                    $this->redirect('admin/sliders', 302);
			}
			else {
				$errors = $validation->errors('models/slider');
			}
		}
		$this->template->content = $view;
	}

	public function action_edit($id = Null)
	{
		$id = $this->request->param('id');
		$view = View::factory('admin_sliders/edit')
			->bind('user', $user)
			->bind('slider', $slider)
			->bind('errors', $errors);
		$slider = ORM::factory('slider')->where('id', '=', $id)->find();
		$user = Auth::instance()->get_user();
		$this->template->user = $user;
		$this->template->title = "Admin Edit Slider";
		if ($this->request->post()) {
			//lets merge the two arrays
            $data = $this->request->post();
			$validation = Validation::factory($data)
				->rule('title', 'not_empty')
				->rule('content', 'not_empty')
				->rule('sort', 'not_empty')
				->rule('sort', 'numeric');
			if ($validation->check()) {
					//lets save the values to the database service table
					$slider->title = HTML::chars($data['title']);
					$slider->content = HTML::chars($data['content']);
					$slider->status = 1;
					$slider->sort = HTML::chars($data['sort']);

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
					        	$filename = 'sliders_'. uniqid(). '_' . $_FILES['file']['name'];
								$filename = str_replace(" ", "_", $filename);
					            Image::factory($file)
					                ->resize(2000, 1202, Image::AUTO)
					                ->save($directory.'sliders_'.$filename);
					            //save the file in db
					            $slider->photo = "sliders_".$filename;
					 
					            // Delete the temporary file
					            unlink($file);
					        }
	                    } else {
	                        $fileNotice = "<br><br><br><b>File Upload Errors: </b><br>";
	                        $errors = $valFiles->errors('models/slider');
	                    }
	                }
	                $slider->save();
                    $this->redirect('admin/sliders', 302);
			}
			else {
				$formerror = "Form Errors:";
				$errors = $validation->errors('models/slider');
			}
		}
		$this->template->content = $view;
	}

	//lets delete english articles 
    public function action_delete($id = NULL){
        $this->auto_render = false;
        $user = Auth::instance()->get_user();
        $id = $this->request->param('id');
        $slider=ORM::factory('slider',$id);
        $slider->status = 0;
        $slider->save();
        //Session::instance()->set('notice',$notice);
        $this->redirect('admin/sliders', 302);
    }
}