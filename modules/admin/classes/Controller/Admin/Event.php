<?php defined('SYSPATH') or die('No direct script access');
/**
 * Default event Controller
 *
 * @package    Admin/Event
 * @author     Afrovision Group Team
 * @copyright  (c) 2016-2017 Afrovision Group Team
 * @license    http://www.afrovisiongroup.com
 */
class Controller_Admin_Event extends Controller_Authenticated
{
	public $auth_required = 'admin';
	public $assert_auth_actions = array(
	'index' => array('login'),
	'add'	=> array('login'),
	'edit'	=> array('login'),
	'delete' => array('login'),
	'members' => array('login'),
	'profile' => array('login'),
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
		$user = Auth::instance()->get_user();
		// count number of events
		$total_event = ORM::factory('Event')->where('deleted', '=', 'false')->count_all();

		// set-up the pagination
		$pagination = Pagination::factory(array(
		    'total_items' => $total_event,
		    'items_per_page' => 100, // this will override the default set in your config
		));
		$events = ORM::factory('Event')->where('deleted','=', 'false')->offset($pagination->offset)->limit($pagination->items_per_page)->order_by('sort','asc')->find_all();
		//get the success message if any
		$message = Session::instance()->get_once('message');
		View::factory()->set_global('message', $message);
		$view = View::factory('admin/admin_events/home')
			->bind('user', $user)
			->set('events', $events)
			->bind('count', $count)
			->bind('pagination', $pagination);
		$count = ORM::factory('Event')->where('deleted', '=', 'false')->count_all();
		$this->template->user = $user;
		$this->template->title = "Admin Events ";
		$this->template->content = $view;
	}

	//action to display all deleted events
	public function action_viewDeleted()
	{
		$user = Auth::instance()->get_user();
		// count number of events
		$total_event = ORM::factory('Event')->where('deleted', '=', 'true')->count_all();

		// set-up the pagination
		$pagination = Pagination::factory(array(
		    'total_items' => $total_event,
		    'items_per_page' => 100, // this will override the default set in your config
		));
		$events = ORM::factory('Event')->where('deleted','=', 'true')->offset($pagination->offset)->limit($pagination->items_per_page)->order_by('sort','asc')->find_all();
		//get the success message if any
		$message = Session::instance()->get_once('message');
		View::factory()->set_global('message', $message);
		$view = View::factory('admin/admin_events/view_deleted')
			->bind('user', $user)
			->set('events', $events)
			->bind('count', $count)
			->bind('pagination', $pagination);
		$count = ORM::factory('Event')->where('deleted', '=', 'true')->count_all();
		$this->template->user = $user;
		$this->template->title = "Admin Deleted Events ";
		$this->template->content = $view;
	}

	//action to display all deleted event comments
	public function action_deletedComments()
	{
		$user = Auth::instance()->get_user();
		// count number of comments
		$total_comment = ORM::factory('Event_Comment')->where('deleted', '=', 'true')->count_all();

		// set-up the pagination
		$pagination = Pagination::factory(array(
		    'total_items' => $total_comment,
		    'items_per_page' => 100, // this will override the default set in your config
		));
		$comments = ORM::factory('Event_Comment')->where('deleted','=', 'true')->offset($pagination->offset)->limit($pagination->items_per_page)->order_by('id','asc')->find_all();
		//get the success message if any
		$message = Session::instance()->get_once('message');
		View::factory()->set_global('message', $message);
		$view = View::factory('admin/admin_events/deleted_comments')
			->bind('user', $user)
			->set('comments', $comments)
			->bind('count', $count)
			->bind('pagination', $pagination);
		$count = ORM::factory('Event_Comment')->where('deleted', '=', 'true')->count_all();
		$this->template->user = $user;
		$this->template->title = "Admin Event Deleted Comments";
		$this->template->content = $view;
	}

	//all events comments action
	public function action_all_comments()
	{
		$user = Auth::instance()->get_user();
		$id = $this->request->param('id');
		// count number of comments
		$total_comment = ORM::factory('Event_Comment')->where('deleted', '=', 'false')->count_all();

		// set-up the pagination
		$pagination = Pagination::factory(array(
		    'total_items' => $total_comment,
		    'items_per_page' => 100, // this will override the default set in your config
		));
		$comments = ORM::factory('Event_Comment')->where('deleted', '=', 'false')->offset($pagination->offset)->limit($pagination->items_per_page)->find_all();
		$view = View::factory('admin/admin_events/all_comments')
			->bind('user', $user)
			->bind('comments', $comments)
			->bind('count', $count)
			->bind('message', $message)
			->bind('pagination', $pagination);
		$message = Session::instance()->get_once('message');
		$count = ORM::factory('Event_Comment')->where('deleted', '=', 'false')->count_all();
		$this->template->user = $user;
		$this->template->title = "Admin Event Comments ";
		$this->template->content = $view;
	}

	//lets add an event
	public function action_add()
	{
		$user = Auth::instance()->get_user();
		$this->template->title = "Admin Add Event ";
		$view = View::factory('/admin/admin_events/add')
			->bind('user', $user)
			->bind('values', $_POST)
			->bind('errors', $errors);
		if ($this->request->post()) {
			$event = ORM::factory('Event');
			$event_fr = ORM::factory('Eventfr');
			//lets assign the posted data to a variable @var data
			$data = $this->request->post();
			//lets validate the the posted data for correctness
			$validate = Model_Event::getValidate($data);
			if ($validate->check()) {
				$event->create_event($data);
				//French event creation function call
				$event_fr->create_event($data);
				$message = "<strong>SUCCESS!!</strong><br/> The event has been added successfully.<br /> Edit the form below for French display.";
				Session::instance()->set('message', $message);
				$this->redirect('admin/events/fr_edit'.'/'.$event->id);
			} else {
				$errors = $validate->errors('general');
			}

		}
		$this->template->user = $user;
		$this->template->content = $view;
	}

	public function action_edit($id = '')
	{
		$this->template->title = "Admin Edit Event ";
		$id = $this->request->param('id');
		$user = Auth::instance()->get_user();
		$this->template->user = $user;
		$view = view::factory('admin/admin_events/edit_event')
			->bind('event', $event)
			->set('user', $user)
			->bind('errors', $errors);
		$event = ORM::factory('Event')->where('id', '=', $id)->find();
		$event_fr = ORM::factory('Eventfr', $id);
		if ($this->request->post()) {
				$data = array_merge($_POST, $_FILES);
				$validate = Validation::factory($data)
					->rule('name', 'not_empty')
					->rule('date', 'not_empty')
					->rule('time', 'not_empty')
					->rule('location', 'not_empty')
					->rule('content', 'not_empty')
					->rule('sort', 'not_empty')
					->rule('sort', 'numeric');
				if ($validate->check()) {
					$event->update_event($data);
	                $message = "<strong>SUCCESS!!</strong><br/> The event information has been successfully updated. Update the french section too.";
	                Session::instance()->set('message', $message);
					$this->redirect('admin/events/fr_edit'.'/'.$event->id);
						
				} else {
					$errors = $validate->errors('general');
				}
			}
		//display the edit form
		$this->template->content = $view; 
	}

	//lets create edit event french action
	public function action_fr_edit($id = '')
	{
		$this->template->title = "Admin French Edit Event ";
		$event_id = $this->request->param('id');
		$user = Auth::instance()->get_user();
		$this->template->user = $user;
		$view = View::factory('admin/admin_events/edit_event_fr')
			->bind('event', $event)
			->bind('user', $user)
			->bind('errors', $errors)
			->bind('message', $message);
		$message = Session::instance()->get_once('message');
		$event = ORM::factory('Eventfr')->where('id', '=', $event_id)->find();
		if ($this->request->post()) {
			//lets assign the posted data to a variable @var data
			$data = $this->request->post();
			//lets validate the the posted data for correctness
			$validate = Model_Event::getValidate($data);
			if ($validate->check()) {
				try {
					$event->update_event($data);
					$message = "<strong>SUCCESS!!</strong><br/> Event French display has been successfully updated.";
					Session::instance()->set('message', $message);
					$this->redirect('admin/events');
				} catch (ORM_Validation_Exception $e) {
					$errors = $e->errors($this->lang.'/general');
				}
			} else {
				$errors = $validate->errors('general');
			}
		}
		//display the edit form
		$this->template->content = $view; 
	}

	//individual event comments action
	public function action_comment($id = '')
	{
		$user = Auth::instance()->get_user();
		$event_id = $this->request->param('id');
		$comments = ORM::factory('Event_Comment')->where('deleted', '=', 'false')->and_where('event_id', '=', $evnt_id)->order_by('id', 'asc')->find_all();
		$this->template->user = $user;
		$this->template->title = ($this->lang == 'en') ? "Cell Members " : "" ;
		$view = View::factory('admin/admin_events/comments')
			->bind('comments', $comments)
			->bind('user', $user)
			->bind('count', $count);
		$count = ORM::factory('Event_Comment')->where('deleted', '=', 'false')->and_where('event_id', '=', $event_id)->count_all();
		$this->template->content = $view;
	}

	//lets create delete event action
	public function action_delete($id='')
	{
		$this->auto_render = 'false';
		$event_id = $this->request->param('id');
		$event = ORM::factory('Event')->where('id', '=', $event_id)->find();
		$event->deleted = 'true';
		if ($event->save()) {
			$success = "<strong>SUCCESS!!</strong><br /> Event Deleted Successfully.";
			Session::instance()->set('message', $success);
			$this->redirect('admin/events');
		}
		else {
			$errors = "<strong>WARNING!!</strong><br /> Unable To Delete Event At the Moment. Please Try Later...";
			Session::instance()->set('message', $errors);
			$this->redirect('admin/events');
		}
	}

	//lets create permenant delete event action
	public function action_permenantDelete($id='')
	{
		$this->auto_render = 'false';
		$event_id = $this->request->param('id');
		$event = ORM::factory('Event')->where('id', '=', $event_id)->find();
		$event_fr = ORM::factory('Eventfr')->where('id', '=', $event_id)->find();
		$event_fr->delete();
		if ($event->delete()) {
			$success = "<strong>SUCCESS!!</strong><br /> Event Has Been Successfully Deleted Permenantly.";
			Session::instance()->set('message', $success);
			$this->redirect('admin/events/viewDeleted');
		}
		else {
			$errors = "<strong>WARNING!!</strong><br /> Unable To Permenantly Delete Event At the Moment. Please Try Later...";
			Session::instance()->set('message', $errors);
			$this->redirect('admin/events/viewDeleted');
		}
	}

	//lets create restore event action
	public function action_restore($id='')
	{
		$this->auto_render = 'false';
		$event_id = $this->request->param('id');
		$event = ORM::factory('Event')->where('id', '=', $event_id)->find();
		$event->deleted = 'false';
		if ($event->save()) {
			$success = "<strong>SUCCESS!!</strong><br /> Event Restored Successfully.";
			Session::instance()->set('message', $success);
			$this->redirect('admin/events');
		}
		else {
			$errors = "<strong>WARNING!!</strong><br /> Unable To Restore Event At the Moment. Please Try Later...";
			Session::instance()->set('message', $errors);
			$this->redirect('admin/events/view_deleted');
		}
	}

	//lets create delete event action
	public function action_deleteComment($id='')
	{
		$this->auto_render = 'false';
		$comment_id = $this->request->param('id');
		$comment = ORM::factory('Event_Comment')->where('id', '=', $comment_id)->find();
		$comment->deleted = 'true';
		if ($comment->save()) {
			$success = "<strong>SUCCESS!!</strong><br /> Comment Deleted Successfully.";
			Session::instance()->set('message', $success);
			$this->redirect('admin/events/all_comments');
		}
		else {
			$errors = "<strong>SUCCESS!!</strong><br /> Unable To Delete Comment At the Moment. Please Try Later...";
			Session::instance()->set('message', $errors);
			$this->redirect('admin/events/all_comments');
		}
	}

	//lets create restore comment action
	public function action_restoreComment($id='')
	{
		$this->auto_render = 'false';
		$comment_id = $this->request->param('id');
		$comment = ORM::factory('Event_Comment')->where('id', '=', $comment_id)->find();
		$comment->deleted = 'false';
		if ($comment->save()) {
			$success = "<strong>SUCCESS!!</strong><br /> Comment Restored Successfully.";
			Session::instance()->set('message', $success);
			$this->redirect('admin/events/deletedComments');
		}
		else {
			$errors = "<strong>WARNING!!</strong><br /> Unable To Restore Event At the Moment. Please Try Later...";
			Session::instance()->set('message', $errors);
			$this->redirect('admin/events/deletedComments');
		}
	}

	//lets create permenant delete comment action
	public function action_permenantDeleteComment($id='')
	{
		$this->auto_render = 'false';
		$comment_id = $this->request->param('id');
		$comment = ORM::factory('Event_Comment')->where('id', '=', $comment_id)->find();
		if ($comment->delete()) {
			$success = "<strong>SUCCESS!!</strong><br /> Comment Has Been Successfully Deleted Permenantly.";
			Session::instance()->set('message', $success);
			$this->redirect('admin/events/deletedComments');
		}
		else {
			$errors = "<strong>WARNING!!</strong><br /> Unable To Permenantly Delete Comment At the Moment. Please Try Later...";
			Session::instance()->set('message', $errors);
			$this->redirect('admin/events/deletedComments');
		}
	}
}