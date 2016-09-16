<?php defined('SYSPATH') or die('No direct script access!');
/**
 * Default type Controller
 *
 * @package    BLW/Member Type
 * @author     Glorious Inventor Team
 * @copyright  (c) 2016-2017 Kohana Team
 * @license    http://gloriousinventor.com/license.html
 */
class Controller_Admin_Type extends Controller_Authenticated
{
	public $auth_required = 'admin';
	public $assert_auth_actions = array(
		'index' => array('login'),
		'add'	=> array('login'),
		'edit'	=> array('login'),
		'delete' => array('login'),
		'permenantDelete' => array('login'),
	);

	//dispay all members in the database
	public function action_index()
	{
		$user = Auth::instance()->get_user();
		$this->template->title = "Types ";
		$view = view::factory($this->lang.'/admin/admin_members/types')
			->bind('types', $types)
			->bind('users', $users)
			->bind('count', $count);
		$count = ORM::factory('Type')->where('deleted', '=', 'false')->count_all();
		$types = ORM::factory('Type')->where('deleted', '=', 'false')->order_by('id', 'asc')->find_all();
		$this->template->user = $user;
		$this->template->content = $view;
	}

	//add members to the database
	public function action_add()
	{
		$user = Auth::instance()->get_user();
		$this->template->title = "Add Type ";
		$view = view::factory($this->lang.'/admin/admin_members/add_type')
			->bind('errors', $errors)
			->bind('user', $user)
			->bind('values', $_POST);
		if ($this->request->is_ajax()) {
			$this->auto_render = false;
			#assign the post value to a variable
			$post = $this->request->post();
			#run the validation class on the posted data
			$validate = Validation::factory($post)
				->rule('name', 'not_empty')
				->rule('description', 'not_empty')
				->rule('description', 'min_length', array(':value', 10));
			if ($validate->check()) {
				$type = ORM::factory('Type');
				try
                    {
                        $type->name = $post['name'];
                        $type->description = $post['description'];
                        $type->deleted = 'false';
                        $type->datetime = time();
                        $type->save();
                        $success = ($this->lang = 'en') ? '<strong>SUCCESS</strong><br />Type has been added successfully.' : '' ;
                        $responseArray = array('type' => 'success', 'message' => $success);
                    }
                    catch (ORM_Validation_Exception $e)
                    {
                        $errors = $e->errors($this->lang.'/general');
                        $responseArray = array('type' => 'warning', 'message' => $errors);
                    }
			} else {
				$errors = $validate->errors($this->lang.'/general');
				$responseArray = array('type' => 'warning', 'message' => $errors);
			}
                $encoded = json_encode($responseArray);
                
                header('Content-Type: application/json');
                
                echo $encoded;
		}
		$this->template->user = $user;
		$this->template->content = $view;
	}

	//edit action for type
	public function action_edit($id = '')
	{
		$id = $this->request->param('id');
		$user = Auth::instance()->get_user();
		$this->template->title = 'Edit Type ';
		$view = view::factory($this->lang.'/admin/admin_members/edit_type')
			->bind('values', $_POST)
			->bind('errors', $errors)
			->bind('type', $type)
			->bind('url', $this->url);
		$type = ORM::factory('Type')->where('id', '=', $id)->find();
		if ($this->request->is_ajax()) {
			$this->auto_render = false;
			$post = $this->request->post();
			$validate = Validation::factory($post)
				->rule('name', 'not_empty')
				->rule('description', 'not_empty')
				->rule('description', 'min_length', array(':value', 10));
			if ($validate->check()) {
				try {
					$type = ORM::factory('Type')->where('id', '=', $id)->find();
					$type->name = $post['name'];
					$type->description = $post['description'];
					$type->save();
					$success = ($this->lang = 'en') ? 'the type has been updated successfully.' : '' ;
                    $responseArray = array('type' => 'success', 'message' => $success);
				} catch (ORM_Validation_Exception $e) {
					$errors = $e->errors($this->lang.'/general');
					$responseArray = array('type' => 'warning', 'message' => $errors);
				}
			} else {
				$errors = $validate->errors($this->lang.'/general');
				$responseArray = array('type' => 'warning', 'message' => $errors);
			}

			$encoded = json_encode($responseArray);
			header('Content-Type: application/json');
			echo $encoded;
		}
		$this->template->user = $user;
		$this->template->content = $view;
	}

	//delete type action
	public function action_delete($id = '')
	{
		$this->auto_render = false;
		if ($this->request->is_ajax()) {
			$id = $this->request->param('id');
			$type = ORM::factory('Type', $id);
			$type->deleted = 'true';
			if ($type->save()) {
				$success = ($this->lang == 'en') ? '<strong>Success!</strong><br> Type has been deleted successfully.' : '' ;
				$responseArray = array('type' => 'success', 'message' => $success);
			} else {
				$errors = ($this->lang == 'en') ? '<strong>Sorry!</strong><br> some errors occured while attempting delete! Try again later.' : '' ;
				$responseArray = array('type' => 'warning', 'message' => $errors);
			}
			
			$encoded = json_encode($responseArray);
			header('Content-Type: application/json');
			echo $encoded;
		}
	}

	//view delete types action
	public function action_viewDeleted()
	{
		$user = Auth::instance()->get_user();
		$this->template->title = 'View Deleted Types ';
		$this->template->user = $user;
		$view = view::factory($this->lang.'/admin/admin_members/view_deleted_types')
			->bind('user', $user)
			->bind('types', $types)
			->bind('count', $count);
		$types = ORM::factory('Type')->where('deleted', '=', 'true')->find_all();
		$count = ORM::factory('Type')->where('deleted', '=', 'true')->count_all();
		$this->template->content = $view;
	}

	//restore deleted type action
	public function action_restore($id = '')
	{
		$user = Auth::instance()->get_user();
		$this->auto_render = false;
		if ($this->request->is_ajax()) {
			$id = $this->request->param('id');
			$type = ORM::factory('Type')->where('id', '=', $id)->and_where('deleted', '=', 'true')->find();
			$type->deleted = 'false';
			if ($type->save()) {
				$success = ($this->lang = 'en') ? '<strong>Success!</strong><br> The type has been restored successfully.' : '' ;
				$link = URL::site('admin/types/viewDeleted');
				$responseArray = array('type' => 'success', 'message' => $success, 'link' => $link);
			} else {
				$errors = ($this->lang = 'en') ? '<strong>Sorry!</strong><br> Some errors where encountered while trying to restore the type. Please try again later.' : '' ;
			}

			$encoded = json_encode($responseArray);
			header('Content-Type: application/json');
			echo $encoded;
		}
	}

	//permenant delete action
	public function action_permenantDelete($id = '')
	{
		$this->auto_render = false;
		if ($this->request->is_ajax()) {
			$id = $this->request->param('id');
			$type = ORM::factory('Type')->where('id', '=', $id)->find();
			if ($type->delete()) {
				$success = ($this->lang == 'en') ? '<strong>Success!</strong><br> The type has been permenantly deleted successfully.' : '' ;
				$link = URL::site('admin/types/viewDeleted');
				$responseArray = array('type' => 'success', 'message' => $success, 'link' => $link);
			} else {
				$errors = ($this->lang == 'en') ? '<strong>Sorry!</strong><br> Some errors where encountered while trying to permenantly delete the type. Please try again later' : '' ;
				$responseArray = array('type' => 'warning', 'message' => $errors);
			}
			
			$encoded = json_encode($responseArray);
			header('Content-Type: application/json');
			echo $encoded;
		}
	}
}