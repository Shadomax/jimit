<?php defined('SYSPATH') or die('No direct script access');
/**
* Admin services controller
*/
class Controller_Admin_Teams extends Controller_Dev
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
		$teams = ORM::factory('team')->where('deleted','=', 'false')->order_by('sort','asc')->find_all();
		$view = view::factory('admin_teams/home')
			->bind('user', $user)
			->set('teams', $teams)
			->bind('count', $count);
		$user = Auth::instance()->get_user();
		$count = ORM::factory('team')->where('deleted', '=', 'false')->count_all();
		$this->template->user = $user;
		$this->template->title = "Teams ";
		$this->template->content = $view;
	}

	//lets add team action
	public function action_add()
	{
		$team = ORM::factory('team');
		$user = Auth::instance()->get_user();
		$view = view::factory('admin_teams/add')
			->set('user', $user)
			->bind('errors', $errors)
			->bind('values', $_POST);
		$this->template->user = $user;
		$this->template->title = "Add Team ";
		//lets check if the contact form has been submitted via $_POST
            if ($this->request->post() || $_FILES) {
                //lets assign the posted data to a variable @var data
				$data = array_merge($this->request->post(), $_FILES);
				//lets validate the the posted data for correctness
				$validation = Validation::factory($data)
					->rule('name', 'not_empty')

					->rule('position', 'not_empty')

	                ->rule('file', 'Upload::not_empty')
	                ->rule('file', 'Upload::size', array(':value', '4M'))
	                ->rule('file', 'Upload::type', array(':value', array('jpeg','jpg','png','gif')))
	                ->rule('file', 'Upload::valid');

                if ($validation->check())
                {
						//lets save the picture of the service
						$image = $_FILES['file'];
						$directory = Upload::$default_directory.'teams/';
						$path = Upload::$default_directory.'teams/thumb/';
						//lets save the picture of the service
						if ($file = Upload::save($image, NULL, $directory))
				        {
				            $filename = 'teams_'. uniqid(). '_' . $_FILES['file']['name'];
							$filename = str_replace(" ", "_", $filename);
							$thumb_filename = 'thumb_'. uniqid(). '_'. $_FILES['file']['name'];
							$thumb_filename = str_replace(" ", "_", $thumb_filename);

							Image::factory($file)
								->resize(440, 400, Image::AUTO)
								->save($path.$thumb_filename);
				 
				            Image::factory($file)
				            	->resize(440, 360, Image::AUTO)
				                ->save($directory.$filename);
				 
				            // Delete the temporary file
				            unlink($file);
				        }

						//lets save the values to the database team table
						$team->name = HTML::chars($data['name']);
						$team->position = HTML::chars($data['position']);
						$team->bio = HTML::chars($data['bio']);
						$team->twitter_link = HTML::chars($data['twitter_link']);
						$team->facebook_link = HTML::chars($data['facebook_link']);
						$team->linkedIn_link = HTML::chars($data['linkedIn_link']);
						$team->seo_title = HTML::chars($data['seo_title']);
						$team->seo_description = HTML::chars($data['seo_description']);
						$team->seo_keywords = HTML::chars($data['seo_keywords']);
						$team->deleted = 'false';
						$team->sort = HTML::chars($data['sort']);
						$team->photo = HTML::chars($filename);
						$team->thumb = Html::chars($thumb_filename);
						$team->date_added = time();
						$team->save();
                        $this->redirect('admin/teams', 302);
                } else {
                    // Validation failed, collect the errors
                    $errors = $validation->errors('models/team');
                    
                }
            }
		$this->template->content = $view;
	}

	//lets create edit team action
	public function action_edit($id = NULL)
	{
		$this->template->title = "Edit Team ";
		$team_id = $this->request->param('id');
		$user = Auth::instance()->get_user();
		$this->template->user = $user;
		$view = view::factory('admin_teams/edit')
			->bind('team', $team)
			->set('user', $user)
			->bind('errors', $errors);
		$team = ORM::factory('team')->where('id', '=', $team_id)->find();
		if ($this->request->post()) {
			//lets merge the two arrays
            $data = $this->request->post();
			$validation = Validation::factory($data)
				->rule('name', 'not_empty')
				->rule('position', 'not_empty');
			if ($validation->check()) {
					//lets save the values to the database team table
					//lets save the values to the database team table
						$team->name = HTML::chars($data['name']);
						$team->position = HTML::chars($data['position']);
						$team->bio = HTML::chars($data['bio']);
						$team->twitter_link = HTML::chars($data['twitter_link']);
						$team->facebook_link = HTML::chars($data['facebook_link']);
						$team->linkedIn_link = HTML::chars($data['linkedIn_link']);
						$team->seo_title = HTML::chars($data['seo_title']);
						$team->seo_description = HTML::chars($data['seo_description']);
						$team->seo_keywords = HTML::chars($data['seo_keywords']);
						$team->deleted = 'false';
						$team->sort = HTML::chars($data['sort']);

			        //if there were files uploaded, validate them
	                if ($_FILES['file']['size'] > 0) {

	                    $valFiles = new Validation($_FILES);
	                    $valFiles->rule('file', 'Upload::not_empty')
				                ->rule('file', 'Upload::size', array(':value', '4M'))
				                ->rule('file', 'Upload::type', array(':value', array('jpeg','jpg','png','gif')))
				                ->rule('file', 'Upload::valid');
	                    if ($valFiles->check()) {
	                    	$image = $_FILES['file'];
							$directory = Upload::$default_directory.'teams/';
							$path = Upload::$default_directory.'teams/thumb/';
							//lets update the picture of the team
							if ($file = Upload::save($image))
					        {
					        	$filename = 'teams_'. uniqid(). '_' . $_FILES['file']['name'];
								$filename = str_replace(" ", "_", $filename);
								$thumb_filename = 'thumb_'. uniqid(). '_'. $_FILES['file']['name'];
								$thumb_filename = str_replace(" ", "_", $thumb_filename);

								Image::factory($file)
									->resize(440, 400, Image::AUTO)
									->save($path.'thumb_'.$thumb_filename);

					            Image::factory($file)
					            	->resize(440, 360, Image::AUTO)
					                ->save($directory.'teams_'.$filename);

					            //save the file in db
					            $team->photo = "teams_".$filename;
								$team->thumb = "thumb_".$thumb_filename;
					 
					            // Delete the temporary file
					            unlink($file);
					        }
	                    } else {
	                        $fileNotice = "<br><br><br><b>File Upload Errors: </b><br>";
	                        $errors = $valFiles->errors('models/team');
	                    }
	                }
	                $team->save();
                    $this->redirect('admin/teams', 302);
			}
			else {
				$formerror = "Form Errors:";
				$errors = $validation->errors('models/team');
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
        $team = ORM::factory('team',$id);
        $team->deleted = 'true';
        $team->save();
        //Session::instance()->set('notice',$notice);
        $this->redirect('admin/teams', 302);
	}
}