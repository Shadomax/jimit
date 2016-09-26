<?php defined('SYSPATH') or die('No direct script access');

/**
* 
*/
class Controller_Fr_Events extends Controller_Site
{
	
	public function action_index()
	{
		// count number of events
		$total_event = ORM::factory('Eventfr')->where('deleted', '=', 'false')->count_all();

		// set-up the pagination
		$pagination = Pagination::factory(array(
		    'total_items' => $total_event,
		    'items_per_page' => 12, // this will override the default set in your config
		));

		$week = time();

		$articles = ORM::factory('Category_Articlefr')->where('deleted', '=', 'false')->and_where('datetime', '>', $week)->limit(6)->order_by('sort','desc')->find_all();

		$events = ORM::factory('Eventfr')->where('deleted', '=', 'false')->offset($pagination->offset)->limit($pagination->items_per_page)->order_by('sort', 'desc')->find_all();
		$view = View::factory($this->lang.'/events/home')
			->bind('articles', $articles)
			->bind('count', $count)
			->bind('pagination', $pagination)
			->bind('events', $events);
		$this->template->title = "Événements ";
		$this->template->content = $view;
	}

	//get the blog individual item
	public function action_event($id = '')
	{
		$id = $this->request->param('id');
		$event = ORM::factory('Eventfr')->where('id', '=', $id)->find();
		$today = time();
		$articles = ORM::factory('Category_Articlefr')->where('deleted', '=', 'false')->and_where('datetime', '>', $today)->order_by('sort','desc')->limit(5)->find_all();
		$count = $event->comments->count_all();
		$view = new view($this->lang.'/events/event');
		$view->event = $event;
		$view->timestamp = strtotime($event->date);
		$view->articles = $articles;
		if ($this->request->post()) {
			$data = $this->request->post();
			$validate = Validation::factory($data)
				->rule('name', 'not_empty')
				->rule('email', 'not_empty')
				->rule('email', 'email')
				->rule('comment', 'not_empty');
			if ($validate->check()) {
				$comment = ORM::factory('Event_Comment');
				$comment->event_id = $id;
				$comment->name = $data['name'];
				$comment->email = $data['email'];
				$comment->comment = $data['comment'];
				$comment->deleted = 'false';
				$comment->datetime = time();
				$comment->save();
				$this->redirect('fr/events/event/'.$id.'/'.URL::title($event->title, '_'));
			} else {
				$errors = $validate->errors('general');
				View::factory()->set_global('errors', $errors);
			}
		}
		$view->count = $count;
		$this->template->title = $event->title;
		$this->template->content = $view;
	}
}