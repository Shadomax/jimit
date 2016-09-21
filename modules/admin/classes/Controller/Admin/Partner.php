<?php defined('SYSPATH') or die('No direct script access!');
/**
 * Default partner Controller
 *
 * @package    Admin/Partner
 * @author     Afrovision Group Team
 * @copyright  (c) 2016-2017 Afrovision Group Team
 * @license    http://www.afrovisiongroup.com
 */
class Controller_Admin_Partner extends Controller_Authenticated
{
	public $auth_required = 'admin';
	public $assert_auth_actions = array(
		'index' => array('login'),
		'add'	=> array('login'),
		'edit'	=> array('login'),
		'delete' => array('login'),
	);

	//dispay all articles in the database
	public function action_index()
	{
		$user = Auth::instance()->get_user();
		$this->template->title = "Admin Partner ";
		$view = view::factory('admin/admin_partners/home')
			->bind('partners', $partners)
			->bind('users', $users)
			->bind('count', $count)
			->bind('message', $message);
		$message = Session::instance()->get_once('message');
		$count = ORM::factory('Partner')->where('deleted', '=', 'false')->count_all();
		$partners = ORM::factory('Partner')->where('deleted', '=', 'false')->order_by('sort', 'asc')->find_all();
		$this->template->user = $user;
		$this->template->content = $view;
	}

	//display deleted partners
	public function action_viewDeleted()
	{
		$user = Auth::instance()->get_user();
		$this->template->title = "Admin Deleted Partners ";
		$view = view::factory('admin/admin_partners/view_deleted')
			->bind('partners', $partners)
			->bind('users', $users)
			->bind('count', $count)
			->bind('message', $message);
		$message = Session::instance()->get_once('message');
		$count = ORM::factory('Partner')->where('deleted', '=', 'true')->count_all();
		$partners = ORM::factory('Partner')->where('deleted', '=', 'true')->order_by('sort', 'asc')->find_all();
		$this->template->user = $user;
		$this->template->content = $view;
	}

	//add photo to the database
	public function action_add()
	{
		$user = Auth::instance()->get_user();
		$this->template->title = "Admin Add Partner ";
		$view = view::factory('admin/admin_partners/add')
			->bind('errors', $errors)
			->bind('user', $user)
			->bind('values', $_POST);
		if ($this->request->post()) {
			//assign the post data to a variable
			$post = array_merge($this->request->post(), $_FILES);
			$validate = Validation::factory($post)
				->rule('name', 'not_empty')
				->rule('sort', 'not_empty')
		    	->rule('file', 'Upload::not_empty')
				->rule('file', 'Upload::size', array(':value', '4M'))
				->rule('file', 'Upload::type', array(':value', array('jpeg','jpg','png','gif')))
				->rule('file', 'Upload::valid');
			if ($validate->check()) {
					try {
						$image = $_FILES['file'];
						$directory = Upload::$default_directory.'partners/logo/';
						if ($file = Upload::save($image))
						{
							$filename = 'logo_'. uniqid(). '_' . $_FILES['file']['name'];
							$filename = str_replace(" ", "_", $filename);

						    Image::factory($file)
						        ->save($directory.$filename);

						    //save the file in db
						    $post['photo'] = $filename;
						 
						    // Delete the temporary file
						    unlink($file);
						}
						$partner = ORM::factory('Partner');
						if ($partner->addPhoto($post) && $partner->addPartner($post)) {
							$success = "<strong>SUCCESS!!</strong><br /> Partner has been added succesfully.";
							Session::instance()->set('message', $success);
							$this->redirect('admin/partners');
						} else {
							$errors = "<strong>WARNING!!</strong><br /> Unable to add the partner at this moment. Please Try Later...";
							Session::instance()->set('message', $errors);
							$this->redirect('admin/partners');
						}
					} catch (ORM_Validation_Exception $e) {
						$errors = $e->errors('general');
					}
				} else {
					$errors = $validate->errors('general');
				}
		}

		$this->template->user = $user;
		$this->template->content = $view;
	}

	//edit photo action
	public function action_edit($id = '')
	{
		$this->template->title = "Admin Edit Partner ";
		$id = $this->request->param('id');
		$user = Auth::instance()->get_user();
		$this->template->user = $user;
		$view = View::factory('admin/admin_partners/edit')
			->bind('partner', $partner)
			->bind('user', $user)
			->bind('errors', $errors);
		$partner = ORM::factory('Partner')->where('id', '=', $id)->find();
		if ($this->request->post()) {
			//lets assign the posted data to a variable @var data
			$data = $this->request->post();
			//lets validate the the posted data for correctness
			$validate = Validation::factory($data)
				->rule('name', 'not_empty')
				->rule('sort', 'not_empty');
			if ($validate->check()) {
				try {
					//if there were files uploaded, validate them
		                if ($_FILES['file']['size'] > 0) {
		                    $valFiles = Model_Partner::validatePhoto($_FILES);
		                    if ($valFiles->check()) {
		                    	$image = $_FILES['file'];
								$directory = Upload::$default_directory.'partners/logo/';
								if ($file = Upload::save($image))
						        {
						        	$filename = 'logo_'. uniqid(). '_' . $_FILES['file']['name'];
									$filename = str_replace(" ", "_", $filename);

						            Image::factory($file)
						                ->save($directory.$filename);

						            //save the file in db
						            $data['photo'] = $filename;
						            $partner->addPhoto($data);
						            // Delete the temporary file
						            unlink($file);
						        }
		                    } else {
		                        $errors = $valFiles->errors('general');
		                    }
		                }
					if (empty($errors)) {
						$partner->updatePartner($data);
						$message = "<strong>SUCCESS!!</strong><br/> Partner information has been successfully updated.";
						Session::instance()->set('message', $message);
						$this->redirect('admin/partners');
					}
				} catch (ORM_Validation_Exception $e) {
					$errors = $e->errors('general');
				}
			} else {
				$errors = $validate->errors('general');
			}
		}
		$this->template->content = $view;
	}

	//photo delete action
	public function action_delete($id = '')
	{
		Auth::instance()->get_user();
		$this->auto_render = false;
		$id = $this->request->param('id');
		$partner = ORM::factory('Partner')->where('id', '=', $id)->find();
		$partner->deleted = 'true';
		if ($partner->save()) {
			$success = '<strong>SUCCESS!!</strong><br> Partner has been deleted successfully.';
			Session::instance()->set('message', $success);
			$this->redirect('admin/partners');
		} else {
			$errors = '<strong>WARNING!!</strong><br > Unable to delete the partner. Please Try Again Later...';
			Session::instance()->set('message', $errors);
			$this->redirect('admin/partners');
		}
	}

	//restore the deleted photos
	public function action_restore($id='')
	{
		Auth::instance()->get_user();
		$this->auto_render = false;
		$id = $this->request->param('id');
		$partner = ORM::factory('Partner')->where('id', '=', $id)->and_where('deleted', '=', 'true')->find();
		$partner->deleted = 'false';
		if ($partner->save()) {
			$success = '<strong>SUCCESS!</strong><br> Partner has been restored successfully.';
			Session::instance()->set('message', $success);
			$this->redirect('admin/partners/viewDeleted');
		} else {
			$errors = '<strong>WARNING!!</strong><br> Unable to restore the partner. Please Try Again Later...';
			Session::instance()->set('message', $errors);
			$this->redirect('admin/partners/viewDeleted');
		}

	}

	//permenant delete action
	public function action_permenantDelete($id = '')
	{
		Auth::instance()->get_user();
		$this->auto_render = false;
		$id = $this->request->param('id');
		$partner = ORM::factory('Partner')->where('id', '=', $id)->find();
		if ($partner->delete()) {
			$success = '<strong>SUCCESS!</strong><br> Partner has been permenantly deleted successfully.';
			Session::instance()->set('message', $success);
			$this->redirect('admin/partners/viewDeleted');
		} else {
			$errors = '<strong>WARNING!!</strong><br> Unable to permenantly delete the partner. Please Try Again Later...';
			Session::instance()->set('message', $errors);
			$this->redirect('admin/partners/viewDeleted');
		}
	}
}