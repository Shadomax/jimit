<?php defined('SYSPATH') or die('No direct script access');

/**
* 
*/
class Controller_Blog extends Controller_Site
{
	
	public function action_index()
	{
		if ($this->lang == 'fr') {
			# code...
		}

		elseif ($this->lang == 'en') {
			$blogs = ORM::factory('blog')->where('status','=',1)->order_by('date_added','desc')->find_all();
			$view = new view($this->lang.'/blogs/blogs');
			$view->blogs = $blogs;
			$this->template->title = "Our Blog";
		}
		$this->template->content = $view;
	}

	//get the blog individual item
	public function action_blog_item()
	{
		$id = $this->request->param('id');
		if ($this->lang == 'fr') {
			# code...
		}

		elseif ($this->lang == 'en') {
			$blog = ORM::factory('blog')->where('status','=',1)->find();
			$comments = ORM::factory('comment')->where('blog_id','=',$blog->id)->and_where('status','=',1)->order_by('date_added','desc')->find_all();
			$count = ORM::factory('comment')->where('blog_id','=',$blog->id)->and_where('status','=',1)->order_by('date_added','desc')->count_all();
			$view = new view($this->lang.'/blogs/blog');
			$view->blog = $blog;
			$view->count = $count;
			$view->comments = $comments;
			$this->template->title = $blog->title;
		}
		$this->template->content = $view;
	}
}