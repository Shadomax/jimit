<?php defined('SYSPATH') or die('No direct script access!');
/**
 * Default gallery Controller
 *
 * @package    Admin/Gallery
 * @author     Afrovision Group Team
 * @copyright  (c) 2016-2017 Afrovision Group Team
 * @license    http://www.afrovisiongroup.com
 */
class Controller_Admin_Gallery extends Controller_Authenticated
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

	//dispay all articles in the database
	public function action_index()
	{
		$user = Auth::instance()->get_user();
		$this->template->title = "Admin Gallery ";
		$view = view::factory('admin/admin_gallery/home')
			->bind('galleries', $galleries)
			->bind('users', $users)
			->bind('count', $count)
			->bind('message', $message)
			->bind('pagination', $pagination);
		$message = Session::instance()->get_once('message');
		$count = ORM::factory('Gallery')->where('deleted', '=', 'false')->count_all();
		// count number of galleries
		$total_gallery = ORM::factory('Gallery')->where('deleted', '=', 'false')->count_all();

		// set-up the pagination
		$pagination = Pagination::factory(array(
		    'total_items' => $total_gallery,
		    'items_per_page' => 100, // this will override the default set in your config
		));
		$galleries = ORM::factory('Gallery')->where('deleted', '=', 'false')->offset($pagination->offset)->limit($pagination->items_per_page)->order_by('sort', 'asc')->find_all();
		$this->template->user = $user;
		$this->template->content = $view;
	}

	//display deleted galleries
	public function action_viewDeleted()
	{
		$user = Auth::instance()->get_user();
		$this->template->title = "Admin Delete Photo ";
		$view = view::factory('admin/admin_gallery/view_deleted')
			->bind('galleries', $galleries)
			->bind('users', $users)
			->bind('count', $count)
			->bind('message', $message)
			->bind('pagination', $pagination);
		$message = Session::instance()->get_once('message');
		$count = ORM::factory('Gallery')->where('deleted', '=', 'true')->count_all();
		// count number of galleries
		$total_gallery = ORM::factory('Gallery')->where('deleted', '=', 'true')->count_all();

		// set-up the pagination
		$pagination = Pagination::factory(array(
		    'total_items' => $total_gallery,
		    'items_per_page' => 100, // this will override the default set in your config
		));

		$galleries = ORM::factory('Gallery')->where('deleted', '=', 'true')->offset($pagination->offset)->limit($pagination->items_per_page)->order_by('sort', 'asc')->find_all();
		$this->template->user = $user;
		$this->template->content = $view;
	}

	//add photo to the database
	public function action_add()
	{
		$user = Auth::instance()->get_user();
		$this->template->title = "Admin Add Photo ";
		$view = view::factory('admin/admin_gallery/add')
			->bind('errors', $errors)
			->bind('user', $user)
			->bind('values', $_POST);
		if ($this->request->post()) {
			//assign the post data to a variable
			$post = array_merge($this->request->post(), $_FILES);
			$validate = Model_Gallery::getvalidate($post);
			if ($validate->check()) {
					try {
						$image = $_FILES['file'];
						$directory = Upload::$default_directory.'gallery/';
						if ($file = Upload::save($image))
						{
							$filename = 'gallery_'. uniqid(). '_' . $_FILES['file']['name'];
							$filename = str_replace(" ", "_", $filename);

						    Image::factory($file)
						        ->save($directory.$filename);

						    //save the file in db
						    $post['photo'] = $filename;
						 
						    // Delete the temporary file
						    unlink($file);
						}
						$gallery = ORM::factory('Gallery');
						if ($gallery->upload_photo($post)) {
							$success = "<strong>SUCCESS!!</strong><br /> The photo has been added to the gallery succesfully.";
							Session::instance()->set('message', $success);
							$this->redirect('admin/gallery');
						} else {
							$errors = "<strong>WARNING!!</strong><br /> Unable to add the photo at this moment. Please Try Later...";
							Session::instance()->set('message', $errors);
							$this->redirect('admin/gallery');
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
		$this->template->title = "Admin Edit Photo ";
		$photo_id = $this->request->param('id');
		$user = Auth::instance()->get_user();
		$this->template->user = $user;
		$view = View::factory('admin/admin_gallery/edit')
			->bind('gallery', $gallery)
			->bind('user', $user)
			->bind('errors', $errors);
		$gallery = ORM::factory('Gallery')->where('id', '=', $photo_id)->find();
		if ($this->request->post()) {
			//lets assign the posted data to a variable @var data
			$data = $this->request->post();
			//lets validate the the posted data for correctness
			$validate = Model_Gallery::getdatavalidate($data);
			if ($validate->check()) {
				try {
					//if there were files uploaded, validate them
		                if ($_FILES['file']['size'] > 0) {
		                    $valFiles = Model_Gallery::validatePhoto($_FILES);
		                    if ($valFiles->check()) {
		                    	$image = $_FILES['file'];
								$directory = Upload::$default_directory.'gallery/';
								if ($file = Upload::save($image))
						        {
						        	$filename = 'gallery_'. uniqid(). '_' . $_FILES['file']['name'];
									$filename = str_replace(" ", "_", $filename);

						            Image::factory($file)
						                ->save($directory.$filename);

						            //save the file in db
						            $data['photo'] = $filename;
						            $gallery_->update_photo($data);
						            // Delete the temporary file
						            unlink($file);
						        }
		                    } else {
		                        $errors = $valFiles->errors('general');
		                    }
		                }
					if (empty($errors)) {
						$gallery->update_data($data);
						$message = "<strong>SUCCESS!!</strong><br/> The photo information has been successfully updated.";
						Session::instance()->set('message', $message);
						$this->redirect('admin/gallery');
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
		$gallery = ORM::factory('Gallery')->where('id', '=', $id)->find();
		$gallery->deleted = 'true';
		if ($gallery->save()) {
			$success = '<strong>SUCCESS!!</strong><br> The photo has been deleted successfully.';
			Session::instance()->set('message', $success);
			$this->redirect('admin/gallery');
		} else {
			$errors = '<strong>SORRY!!</strong><br > Unable to delete the photo. Please Try Again Later...';
			Session::instance()->set('message', $errors);
			$this->redirect('admin/gallery');
		}
	}

	//restore the deleted photos
	public function action_restore($id='')
	{
		Auth::instance()->get_user();
		$this->auto_render = false;
		$id = $this->request->param('id');
		$gallery = ORM::factory('Gallery')->where('id', '=', $id)->and_where('deleted', '=', 'true')->find();
		$gallery->deleted = 'false';
		if ($gallery->save()) {
			$success = '<strong>SUCCESS!</strong><br> The photo has been restored successfully.';
			Session::instance()->set('message', $success);
			$this->redirect('admin/gallery/viewDeleted');
		} else {
			$errors = '<strong>SORRY!!</strong><br> Unable to restore the photo. Please Try Again Later...';
			Session::instance()->set('message', $errors);
			$this->redirect('admin/gallery/viewDeleted');
		}

	}

	//permenant delete action
	public function action_permenantDelete($id = '')
	{
		Auth::instance()->get_user();
		$this->auto_render = false;
		$id = $this->request->param('id');
		$gallery = ORM::factory('Gallery')->where('id', '=', $id)->find();
		if ($gallery->delete()) {
			$success = '<strong>SUCCESS!</strong><br> The photo has been permenantly deleted successfully.';
			Session::instance()->set('message', $success);
			$this->redirect('admin/gallery/viewDeleted');
		} else {
			$errors = '<strong>SORRY!!</strong><br> Unable to permenantly delete the photo. Please Try Again Later...';
			Session::instance()->set('message', $errors);
			$this->redirect('admin/gallery/viewDeleted');
		}
	}
}