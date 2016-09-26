<?php defined('SYSPATH') or die('No direct script access');

/**
* 
*/
class Controller_En_Articles extends Controller_Application
{
	
	public function action_index()
	{
		// count number of articles
		$total_article = ORM::factory('Category_Article')->where('deleted', '=', 'false')->count_all();

		// set-up the pagination
		$pagination = Pagination::factory(array(
		    'total_items' => $total_article,
		    'items_per_page' => 12, // this will override the default set in your config
		));

		$articles = ORM::factory('Category_Article')->where('deleted', '=', 'false')->offset($pagination->offset)->limit($pagination->items_per_page)->order_by('sort','desc')->find_all();
		$today = date('Y-m-d');
		$events = ORM::factory('Event')->where('deleted', '=', 'false')->and_where('date', '>', $today)->order_by('sort', 'desc')->limit(6)->find_all();
		$view = View::factory($this->lang.'/articles/home')
			->bind('articles', $articles)
			->bind('count', $count)
			->bind('pagination', $pagination)
			->bind('events', $events);
		$this->template->title = "Articles ";
		$this->template->content = $view;
	}

	//get the blog individual item
	public function action_article($id = '')
	{
		$id = $this->request->param('id');
		$article = ORM::factory('Category_Article')->where('id', '=', $id)->find();
		$articles = ORM::factory('Category_Article')->where('deleted', '=', 'false')->order_by('sort','desc')->limit(5)->find_all();
		$today = date('Y-m-d');
		$events = ORM::factory('Event')->where('deleted', '=', 'false')->and_where('date', '>', $today)->order_by('sort', 'desc')->limit(6)->find_all();
		$count = $article->comments->count_all();
		$view = new view($this->lang.'/articles/article');
		$view->article = $article;
		if ($this->request->post()) {
			$data = $this->request->post();
			$validate = Validation::factory($data)
				->rule('name', 'not_empty')
				->rule('email', 'not_empty')
				->rule('email', 'email')
				->rule('comment', 'not_empty');
			if ($validate->check()) {
				$comment = ORM::factory('Article_Comment');
				$comment->category_article_id = $id;
				$comment->name = $data['name'];
				$comment->email = $data['email'];
				$comment->comment = $data['comment'];
				$comment->deleted = 'false';
				$comment->datetime = time();
				$comment->save();
				$this->redirect('articles/article/'.$id.'/'.URL::title($article->title, '_'));
			} else {
				$errors = $validate->errors('general');
				View::factory()->set_global('errors', $errors);
			}
		}
		$view->events = $events;
		$view->articles = $articles;
		$view->cats = ORM::factory('Category_Article')->where('deleted', '=', 'false')->and_where('category_id', '=', $article->category_id)->and_where('id', '!=', $id)->order_by('sort','desc')->limit(3)->find_all();
		$view->count = $count;
		$this->template->title = $article->title;
		$this->template->content = $view;
	}
}